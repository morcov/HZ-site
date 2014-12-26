<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


/**
 * User
 *
 */
class User extends Eloquent {

	private static $registrationRules = [
		'name' => 'required',
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6|confirmed',
		'password_confirmation' => 'required|min:6'
	];

	private static $loginRules = [
		'email' => 'required|email',
		'password' => 'required|min:6',
	];

	/**
	 * @param $data
	 * @return int|string
     */
	public static function registration($data){
		try
		{
			$validator = Validator::make( $data, User::$registrationRules);

			if ($validator->fails()) {
				return (object)['status' => false, 'errors' => $validator->messages()];
			}

			// Create the user
			$user = Sentry::createUser(array(
				'first_name'     => $data['name'],
				'email'     => $data['email'],
				'password'  => $data['password'],
				'activated' => true,
			));

			return (object)['status' => true, 'userID' => $user->getId()];

//			// Find the group using the group id
//			$adminGroup = Sentry::findGroupById(1);
//
//			// Assign the group to the user
//			$user->addGroup($adminGroup);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			$registrationError = 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			$registrationError = 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			$registrationError = 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			$registrationError = 'Group was not found.';
		}

		return (object)['status' => false, 'errors' => ['password_confirmation' => $registrationError]];
	}

	/**
	 * @param $data
	 * @return int|string
     */
	public static function login($data) {
		try
		{
			$validator = Validator::make( $data, User::$loginRules);

			if ($validator->fails()) {
				return (object)['status' => false, 'errors' => $validator->messages()];
			}
			// Authenticate the user
			$user = Sentry::authenticate($data, true);

			return (object)['status' => true, 'user' => Sentry::getUser()];
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			$loginError = 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			$loginError = 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			$loginError = 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			$loginError = 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			$loginError = 'User is not activated.';
		}

// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			$loginError = 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			$loginError = 'User is banned.';
		}

		return (object)['status' => false, 'errors' => ['password' => $loginError]];
	}

	/**
	 *
     */
	public static function logout(){
		Sentry::logout();
	}

	/**
	 * @return bool
     */
	public static function isLogin(){
		return Sentry::check();
	}

	/**
	 * @return \Cartalyst\Sentry\Users\UserInterface
     */
	public static function getCurrentUser(){
		return Sentry::getUser();
	}

	/**
	 * @return \Cartalyst\Sentry\Users\UserInterface
     */
	public static function getUserID(){
		if(User::isLogin()){
			return User::getCurrentUser()->getId();
		}else{
			return null;
		}
	}

}
