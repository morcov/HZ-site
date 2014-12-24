<?php

/**
 * Class UserController
 */
class UserController extends BaseController {

	/**
	 * @return \Illuminate\View\View
     */
	public function registration() {
		if(User::isLogin())
			header('location: /');

		return View::make('user.registration');
	}

	/**
	 * @return \Illuminate\View\View
     */
	public function login() {
		if(User::isLogin())
			header('location: /');

		return View::make('user.login');
	}

	/**
	 *
     */
	public function logout() {
		User::logout();
		header('location: /');
	}


	/**
	 * @return array|\Illuminate\Support\MessageBag|int|string
     */
	public function registrationUser() {
		$data = Input::all();
		$validator = Validator::make(
			$data,
			array(
				'name' => 'required',
				'email' => 'required|email|unique:users',
				'password' => 'required|min:6|confirmed',
        		'password_confirmation' => 'required|min:6'
			)
		);

		if ($validator->fails()) {
			return $validator->messages();
		} else {
			$result = User::registration($data);
			if($result == 1)
				return $result;
			else
				return array('password' => [$result]);
		}

	}

	/**
	 * @return array|\Illuminate\Support\MessageBag|int|string
     */
	public function loginUser() {
		$data = Input::all();
		$validator = Validator::make(
			$data,
			array(
				'email' => 'required|email',
				'password' => 'required|min:6',
			)
		);

		if ($validator->fails()) {
			return $validator->messages();
		} else {
			$result = User::login($data);
			if($result == 1)
				return $result;
			else
				return array('password' => [$result]);
		}

	}

}
