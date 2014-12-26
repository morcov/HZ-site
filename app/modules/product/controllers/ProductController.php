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
     * @return \Illuminate\View\View
     */
    public function editAction($id){
        return Redirect::to('/');
        return View::make('product::edit')->with('input', Product::getByID($id));
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
        $result = Product::add($data);
        if($result->status){
            return Redirect::to('/product/'.$result->productID);
        }else{
            return Redirect::to('/product/add')->withInput($data)->withErrors($result->errors);
        }
    }

    /**
     * @return array|\Illuminate\Support\MessageBag|int|string
     */
    public function editProduct(){
        $data = Input::all();
        return $data;
    }

    /**
     * @return array|\Illuminate\Support\MessageBag|int|string
     */
    public function addComment(){
        $data = Input::all();
        $data['user_id'] = User::getUserID();

        $result = Comment::add($data);
        if($result->status){
            return $result->commentID;
        }else{
            return $result->errors;
        }
    }

    /**
     * @return $this|null
     */
    public function getComments(){
        $data = Input::all();
        $result = Comment::getByProductID($data['product_id']);
        return View::make('product::comments')->with('comments', $result);
    }

    /**
     * @return int
     */
    public function deleteComment(){
        $data = Input::all();
        Response::json(Comment::remove($data['comment_id']));
    }
}