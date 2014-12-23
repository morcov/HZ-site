<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


/**
 * User
 *
 */
class Product extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
	public static function getAll(){
		return Product::orderBy('updated_at', 'DESC')->paginate(8);
	}

	/**
	 * @param $id
	 * @return \Illuminate\Support\Collection|null|static
     */
	public static function getByID($id){
		return Product::find($id);
	}

	/**
	 * @param $data
	 * @return int|string
     */
	public static function add($data){
		try{
			$product = new Product();
			foreach($data as $key=>$value)
				$product->$key = $value;
			$product->save();

			return 1;
		}catch (Exception $e){
			return 'error';
		}
	}

}
