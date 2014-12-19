<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Cartalyst\Sentry\Sentry;


/**
 * User
 *
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	public static function registration($data){
		try
		{
			// Create the user
			$user = (new Sentry())->createUser(array(
				'first_name'     => $data['name'],
				'email'     => $data['email'],
				'password'  => md5($data['password']),
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

}
