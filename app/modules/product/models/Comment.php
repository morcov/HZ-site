<?php

namespace App\Modules\Product\Models;

use DB, Eloquent, Exception, Validator;
use \Illuminate\Database\Eloquent\Collection;

/**
 * Class Comment
 * @package App\Modules\Product\Models
 */
class Comment extends Eloquent
{
    /**
     * @var array
     */
    private static $commentRules = [
        'product_id' => 'integer|required',
        'comment' => 'required',
        'user_id' => 'integer|required'
    ];

    /**
     * @param $id
     * @return array|Collection
     */
    public static function getByProductID($id)
    {
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'integer|required']
        );

        if ($validator->fails()) {
            return [];
        }

        return Comment::select('comments.*', 'users.first_name')
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->where('product_id', '=', $id)
            ->where('comments.enabled', '=', 1)
            ->orderBy('comments.created_at', 'DESC')
            ->get();
    }

    /**
     * @param $data
     * @return object
     */
    public static function add($data)
    {
        try {
            $validator = Validator::make($data, Comment::$commentRules);

            if ($validator->fails()) {
                return (object)['status' => false, 'errors' => $validator->messages()];
            }

            $comment = new Comment();
            $comment->product_id = $data['product_id'];
            $comment->comment = $data['comment'];
            $comment->user_id = $data['user_id'];
            $comment->save();

            return (object)['status' => true, 'commentID' => $comment->id];
        } catch (Exception $e) {
            return (object)['status' => false, 'errors' => ['comment' => 'Fatal ERROR']];
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public static function remove($id)
    {
        try {
            $validator = Validator::make(
                array('id' => $id),
                array('id' => 'integer|required')
            );

            if ($validator->fails()) {
                return false;
            }

            $comment = Comment::find($id);
            $comment->enabled = 0;
            $comment->save();

            return true;
        } catch (Exception $e) {
            return false;
        }


    }

    public static function test()
    {
        $query = Comment::select('comments.*', 'users.first_name')->
        from(DB::raw('users, comments'))->
        where('users.id', '=', 'comments.user_id')->
        where('product_id', '=', 4)->
        where('comments.enabled', '=', 1)->
        orderBy('comments.created_at', 'DESC');
        return $query->get();
    }

}
