<?php

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Models\Product;
use BaseController, View, Input, Redirect;

class ProductController extends BaseController
{
    /**
     * @return $this
     */
    public function indexAction()
    {
		return View::make('product::index')->with('products', Product::getAll());
	}

    /**
     * @return \Illuminate\View\View
     */
    public function addAction()
    {
        return View::make('product::add');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function editAction($id){
        return View::make('product::edit')->with('product', Product::getByID($id));
    }


    /**
     * @param $id
     * @return $this|int
     */
    public function detailAction($id){
        return View::make('product::detail')
            ->with('product', Product::getByID($id))
            ->with('comments', (new CommentController())->getComments($id));
    }


    /**
     * @return $this|\Illuminate\Http\RedirectResponse
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
     * @return array
     */
    public function editProduct($id){
        $data = Input::all();
        $result = Product::edit($id, $data);
        if($result->status){
            return Redirect::to('/product/'.$result->productID);
        }else {
            return Redirect::to('/product/' . $id . '/edit')->withInput($data)->withErrors($result->errors);
        }
    }


}