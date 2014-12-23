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
//        print_r('<pre>');
//        print_r(Comment::getByProductID(4));
//        print_r('</pre>');
        return View::make('product.detail')->with('product', Product::getByID($id));
    }

    /**
     * @return array|\Illuminate\Support\MessageBag|int|string
     */
    public function ajaxAddProduct(){

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
            if($result == 1)
                return $result;
            else
                return array('password' => [$result]);
        }
    }

    /**
     * @return array|\Illuminate\Support\MessageBag|int|string
     */
    public function ajaxAddComment(){

        $validator = Validator::make(
            $_POST,
            array(
                'product_id' => 'integer|required',
                'comment' => '',
            )
        );

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $data = $_POST;
            $data['user_id'] = User::getCurrentUser()->getId();
            $result = Comment::add($data);
            return $result;
            if($result == 1)
                return $result;
            else
                return array('password' => [$result]);
        }
    }

    /**
     * @return $this|null
     */
    public function ajaxGetComments(){
        $validator = Validator::make(
            $_POST,
            array(
                'product_id' => 'integer|required',
            )
        );

        if ($validator->fails()) {
            return null;
        } else {
            return View::make('product.comments')->with('comments', Comment::getByProductID($_POST['product_id']));
        }
    }

    /**
     * @return int
     */
    public function ajaxDeleteComment(){
        $validator = Validator::make(
            $_POST,
            array(
                'comment_id' => 'integer|required',
            )
        );

        if ($validator->fails()) {
            return 0;
        } else {
            return Comment::remove($_POST['comment_id']);
        }
    }
}