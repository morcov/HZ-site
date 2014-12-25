<?php
/**
 * Created by PhpStorm.
 * User: morcov
 * Date: 22.12.14
 * Time: 13:12
 */

class ProductController extends BaseController {

    /**
     * @return $this
     */
    public function indexAction() {
		return View::make('product::index')->with('products', Product::getAll());
	}

    /**
     * @return \Illuminate\View\View
     */
    public function addAction(){
        return View::make('product::add');
    }

    /**
     * @param $id
     * @return $this
     */
    public function detailAction($id){
        return View::make('product::detail')
            ->with('product', Product::getByID($id))
            ->nest('comments', 'product::comments', array('comments' => Comment::getByProductID($id)));
    }

    /**
     * @return array|\Illuminate\Support\MessageBag|int|string
     */
    public function addProduct(){
        $data = Input::all();
        $validator = Validator::make(
            $data,
            [
                'name' => 'required',
                'name_en' => '',
                'name_ua' => '',
                'year' => 'integer',
                'time' => '',
                'series' => 'integer',
                'description' => '',
            ]
        );

        if ($validator->fails()) {
            return Redirect::action('ProductController@addAction')->withInput($data)->withErrors($validator);
        } else {
            Product::add($data);
            return Redirect::to('/');
        }
    }

    /**
     * @return array|\Illuminate\Support\MessageBag|int|string
     */
    public function addComment(){
        $data = Input::all();
        $validator = Validator::make(
            $data,
            [
                'product_id' => 'integer|required',
                'comment' => 'required',
            ]
        );

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $data['user_id'] = User::getCurrentUser()->getId();
            $result = Comment::add($data);
            return $result;
        }
    }

    /**
     * @return $this|null
     */
    public function getComments(){
        $data = Input::all();
        $validator = Validator::make(
            $data,
            [
                'product_id' => 'integer|required',
            ]
        );

        if ($validator->fails()) {
            return null;
        } else {
            return View::make('product::comments')->with('comments', Comment::getByProductID($data['product_id']));
        }
    }

    /**
     * @return int
     */
    public function deleteComment(){
        $data = Input::all();
        $validator = Validator::make(
            $data,
            [
                'comment_id' => 'integer|required',
            ]
        );

        if ($validator->fails()) {
            return 0;
        } else {
            return Comment::remove($data['comment_id']);
        }
    }
}