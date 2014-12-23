<?php

use Cartalyst\Sentry\Sentry;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index() {
		return View::make('home.index')->with('products', Product::getAll());
	}

	public function test() {
		$f = "select comments.*, users.first_name
				from users, comments
				where users.id = comments.user_id and product_id = 4 and comments.enabled = 1
				order by comments.created_at desc";

		print_r(Comment::test());
	}


}
