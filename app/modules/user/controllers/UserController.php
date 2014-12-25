<?php

/**
 * Class UserController
 */
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
		header('location: /');
	}


	/**
	 * @return array|\Illuminate\Support\MessageBag|int|string
     */
	public function registration() {
		$data = Input::all();
		$validator = Validator::make(
			$data,
			[
				'name' => 'required',
				'email' => 'required|email|unique:users',
				'password' => 'required|min:6|confirmed',
        		'password_confirmation' => 'required|min:6'
			]
		);

		if ($validator->fails()) {
			return Redirect::to('/registration')->withInput($data)->withErrors($validator);
		} else {
			$result = User::registration($data);
			if($result == 1)
				return Redirect::to('/');
			else
				return Redirect::to('/registration')->withInput($data)->withErrors(['password_confirmation' => $result]);
		}

	}

	/**
	 * @return array|\Illuminate\Support\MessageBag|int|string
     */
	public function login() {
		$data = Input::all();
		$validator = Validator::make(
			$data,
			[
				'email' => 'required|email',
				'password' => 'required|min:6',
			]
		);

		if ($validator->fails()) {
			return Redirect::to('/login')->withInput($data)->withErrors($validator);
		} else {
			$result = User::login($data);
			if($result == 1)
				return Redirect::to('/');
			else
				return Redirect::to('/login')->withInput($data)->withErrors(['password' => $result]);
		}

	}

}
