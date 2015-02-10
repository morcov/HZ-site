<?php

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Models\Product;
use BaseController, View, Input, Redirect;

/**
 * Class ProductController
 * @package App\Modules\Product\Controllers
 */
class ProductController extends BaseController
{
    /**
     * Home page
     *
     * @return View
     */
    public function indexAction()
    {
        return View::make('product::index')->with('products', Product::getAll());
    }

    /**
     * Form add product
     *
     * @return View
     */
    public function addAction()
    {
        return View::make('product::add');
    }

    /**
     * Form edit product
     *
     * @return View
     */
    public function editAction($id)
    {
        return View::make('product::edit')->with('product', Product::getByID($id));
    }


    /**
     * Page view product by id
     *
     * @param $id
     * @return View
     */
    public function detailAction($id)
    {
        return View::make('product::detail')
            ->with('product', Product::getByID($id))
            ->with('comments', (new CommentController())->getComments($id));
    }


    /**
     * Add product
     *
     * @return Redirect
     */
    public function addProduct()
    {
        $data = Input::all();
        $result = Product::add($data);
        if ($result->status) {
            return Redirect::to('/product/' . $result->productID);
        } else {
            return Redirect::to('/product/add')->withInput($data)->withErrors($result->errors);
        }
    }

    /**
     * Edit product
     *
     * @return Redirect
     */
    public function editProduct($id)
    {
        $data = Input::all();
        $result = Product::edit($id, $data);
        if ($result->status) {
            return Redirect::to('/product/' . $result->productID);
        } else {
            return Redirect::to('/product/' . $id . '/edit')->withInput($data)->withErrors($result->errors);
        }
    }


}