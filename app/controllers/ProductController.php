<?php
/**
 * Created by PhpStorm.
 * User: morcov
 * Date: 22.12.14
 * Time: 13:12
 */

class ProductController extends BaseController {

    /**
     * @return \Illuminate\View\View
     */
    public function add(){
        if(!User::isLogin())
            header('location: /');

        return View::make('product.add');
    }

    /**
     * @param $id
     * @return $this
     */
    public function detail($id){
        return View::make('product.detail')->with('product', Product::getByID($id));
    }

    /**
     * @return array|\Illuminate\Support\MessageBag|int|string
     */
    public function addProduct(){

        $validator = Validator::make(
            $_POST,
            array(
                'name' => 'required',
                'name_en' => '',
                'name_ua' => '',
                'year' => 'integer',
                'time' => '',
                'series' => 'integer',
                'description' => '',
            )
        );

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $result = Product::add($_POST);
            return $result;
        }
    }

    /**
     * @return array|\Illuminate\Support\MessageBag|int|string
     */
    public function addComment(){

        $validator = Validator::make(
            $_REQUEST,
            array(
                'product_id' => 'integer|required',
                'comment' => 'required',
            )
        );

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $data = $_REQUEST;
            $data['user_id'] = User::getCurrentUser()->getId();
            $result = Comment::add($data);
            return $result;
        }
    }

    /**
     * @return $this|null
     */
    public function getComments(){
        $validator = Validator::make(
            $_REQUEST,
            array(
                'product_id' => 'integer|required',
            )
        );

        if ($validator->fails()) {
            return null;
        } else {
            return View::make('product.comments')->with('comments', Comment::getByProductID($_REQUEST['product_id']));
        }
    }

    /**
     * @return int
     */
    public function deleteComment(){
        $data = Input::all();
        $validator = Validator::make(
            $data,
            array(
                'comment_id' => 'integer|required',
            )
        );

        if ($validator->fails()) {
            return 0;
        } else {
            return Comment::remove($data['comment_id']);
        }
    }
}