<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


/**
 * User
 *
 */
class Comment extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static function getByProductID($id){
		return Comment::select('comments.*', 'users.first_name')->
				leftJoin('users', 'users.id', '=', 'comments.user_id')->
				where('product_id', '=', $id)->
				orderBy('comments.created_at', 'DESC')->
				get();
	}


	public static function getByID($id){
		return Product::find($id);
	}

	public static function add($data){
		try{
			$comment = new Comment();
			foreach($data as $key=>$value)
				$comment->$key = $value;
			$comment->save();

			return 1;
		}catch (Exception $e){
			return 'error';
		}
	}

}
