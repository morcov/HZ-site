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

	/**
	 * @param $id
	 * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
	public static function getByProductID($id){
		return Comment::select('comments.*', 'users.first_name')->
				leftJoin('users', 'users.id', '=', 'comments.user_id')->
				where('product_id', '=', $id)->
				where('comments.enabled', '=', 1)->
				orderBy('comments.created_at', 'DESC')->
				get();
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
			$comment = new Comment();
			foreach($data as $key=>$value)
				$comment->$key = $value;
			$comment->save();

			return 1;
		}catch (Exception $e){
			return 'error';
		}
	}

	/**
	 * @param $id
	 * @return int
     */
	public static function remove($id){
		$comment = Comment::find($id);
		$comment->enabled = 0;
		$comment->save();
		return 1;
	}

	public static function test(){
		$query = Comment::select('comments.*', 'users.first_name')->
		from(DB::raw('users, comments'))->
		where('users.id', '=', 'comments.user_id')->
		where('product_id', '=', 4)->
		where('comments.enabled', '=', 1)->
		orderBy('comments.created_at', 'DESC');
		return $query->get();
	}

}
