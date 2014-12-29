<?php

namespace App\Modules\Product\Models;

use Eloquent, Exception, Validator;
use \Illuminate\Pagination\Paginator;
use \Illuminate\Support\Collection;

/**
 * Class Product
 * @package App\Modules\Product\Models
 */
class Product extends Eloquent
{

    /**
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'name_en' => '',
        'name_ua' => '',
        'year' => 'integer',
        'time' => '',
        'series' => 'integer',
        'description' => '',
    ];

    /**
     * @return Paginator
     */
    public static function getAll()
    {
        return Product::orderBy('updated_at', 'DESC')->paginate(8);
    }

    /**
     * @param $id
     * @return Collection|null|static
     */
    public static function getByID($id)
    {
        return Product::find($id);
    }

    /**
     * @param $data
     * @return object
     */
    public static function add($data)
    {
        try {
            $validator = Validator::make($data, Product::$rules);

            if ($validator->fails()) {
                return (object)['status' => false, 'errors' => $validator->messages()];
            }

            $product = new Product();
            $product->name = $data['name'];
            $product->name_en = $data['name_en'];
            $product->name_ua = $data['name_ua'];
            $product->year = $data['year'];
            $product->time = $data['time'];
            $product->series = $data['series'];
            $product->description = $data['description'];
            $product->save();

            return (object)['status' => true, 'productID' => $product->id];
        } catch (Exception $e) {
            return (object)['status' => false, 'errors' => ['name' => 'Fatal ERROR']];
        }
    }

    /**
     * @param $id
     * @param $data
     * @return object
     */
    public static function edit($id, $data)
    {
        try {
            $validator = Validator::make($data, Product::$rules);

            if ($validator->fails()) {
                return (object)['status' => false, 'errors' => $validator->messages()];
            }

            $product = Product::find($id);
            $product->name = $data['name'];
            $product->name_en = $data['name_en'];
            $product->name_ua = $data['name_ua'];
            $product->year = $data['year'];
            $product->time = $data['time'];
            $product->series = $data['series'];
            $product->description = $data['description'];
            $product->save();

            return (object)['status' => true, 'productID' => $id];
        } catch (Exception $e) {
            return (object)['status' => false, 'errors' => ['name' => 'Fatal ERROR']];
        }
    }

}
