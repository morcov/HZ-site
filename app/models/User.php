<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


/**
 * User
 *
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	/**
	 * @param $data
	 * @return int|string
     */
	public static function registration($data){
		try
		{
			// Create the user
			$user = Sentry::createUser(array(
				'first_name'     => $data['name'],
				'email'     => $data['email'],
				'password'  => $data['password'],
				'activated' => true,
			));

			return 1;

//			// Find the group using the group id
//			$adminGroup = Sentry::findGroupById(1);
//
//			// Assign the group to the user
//			$user->addGroup($adminGroup);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			return 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			return 'Group was not found.';
		}
	}

	/**
	 * @param $data
	 * @return int|string
     */
	public static function login($data) {
		try
		{
			// Authenticate the user
			$user = Sentry::authenticate($data, true);

//			$sentry->login($user, false);
			return 1;
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			return 'User is not activated.';
		}

// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			return 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			return 'User is banned.';
		}
	}

	/**
	 *
     */
	public static function logout(){
//		unset($_SESSION['cartalyst_sentry']);
		Sentry::logout();
	}

	/**
	 * @return bool
     */
	public static function isLogin(){
		if(Sentry::getUser())
			return true;
		else
			return false;
	}

	public static function getCurrentUser(){
		return Sentry::getUser();
	}

}
