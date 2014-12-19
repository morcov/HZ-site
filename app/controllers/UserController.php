<?php

class UserController extends BaseController {

	public function registration() {
		return View::make('user.registration');
	}


	public function ajaxRegistrationUser() {
		$validator = Validator::make(
			$_POST,
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
			$result = User::registration($_POST);
			return $result;
		}

	}

}
