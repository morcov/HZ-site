<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Models\User;
use BaseController, View, Redirect, Input;

class UserController extends BaseController {

	/**
	 * @return \Illuminate\View\View
     */
	public function registrationAction() {
		return View::make('user::registration');
	}

	/**
	 * @return \Illuminate\View\View
     */
	public function loginAction() {
		return View::make('user::login');
	}

	/**
	 *
     */
	public function logoutAction() {
		User::logout();
		return Redirect::to('/');
	}

	/**
	 * @return array|\Illuminate\Support\MessageBag|int|string
     */
	public function registration() {
		$data = Input::all();
		$result = User::registration($data);

		if($result->status){
			return Redirect::to('/');
		}else{
			return Redirect::to('/registration')->withInput($data)->withErrors($result->errors);
		}
	}

	/**
	 * @return array|\Illuminate\Support\MessageBag|int|string
     */
	public function login() {
		$data = Input::all();
		$result = User::login($data);

		if($result->status){
			return Redirect::to('/');
		}else{
			return Redirect::to('/login')->withInput($data)->withErrors($result->errors);
		}
	}

}
