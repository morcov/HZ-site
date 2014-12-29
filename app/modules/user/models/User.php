<?php

namespace App\Modules\User\Models;

use Eloquent, Validator, Sentry;
use \Cartalyst\Sentry\Users\UserInterface;
use Cartalyst\Sentry\Groups\GroupNotFoundException;
use Cartalyst\Sentry\Throttling\UserBannedException;
use Cartalyst\Sentry\Throttling\UserSuspendedException;
use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotActivatedException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Cartalyst\Sentry\Users\WrongPasswordException;

/**
 * Class User
 * @package App\Modules\User\Models
 */
class User extends Eloquent
{

    /**
     * @var array
     */
    private static $registrationRules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6'
    ];

    /**
     * @var array
     */
    private static $loginRules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    /**
     * @param $data
     * @return object
     */
    public static function registration($data)
    {
        try {
            $validator = Validator::make($data, User::$registrationRules);

            if ($validator->fails()) {
                return (object)['status' => false, 'errors' => $validator->messages()];
            }

            // Create the user
            $user = Sentry::createUser(array(
                'first_name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'activated' => true,
            ));

            return (object)['status' => true, 'userID' => $user->getId()];

//			// Find the group using the group id
//			$adminGroup = Sentry::findGroupById(1);
//
//			// Assign the group to the user
//			$user->addGroup($adminGroup);
        } catch (LoginRequiredException $e) {
            $registrationError = 'Login field is required.';
        } catch (PasswordRequiredException $e) {
            $registrationError = 'Password field is required.';
        } catch (UserExistsException $e) {
            $registrationError = 'User with this login already exists.';
        } catch (GroupNotFoundException $e) {
            $registrationError = 'Group was not found.';
        }

        return (object)['status' => false, 'errors' => ['password_confirmation' => $registrationError]];
    }

    /**
     * @param $data
     * @return object
     */
    public static function login($data)
    {
        try {
            $validator = Validator::make($data, User::$loginRules);

            if ($validator->fails()) {
                return (object)['status' => false, 'errors' => $validator->messages()];
            }
            // Authenticate the user
            $user = Sentry::authenticate($data, true);

            return (object)['status' => true, 'user' => Sentry::getUser()];
        } catch (LoginRequiredException $e) {
            $loginError = 'Login field is required.';
        } catch (PasswordRequiredException $e) {
            $loginError = 'Password field is required.';
        } catch (WrongPasswordException $e) {
            $loginError = 'Wrong password, try again.';
        } catch (UserNotFoundException $e) {
            $loginError = 'User was not found.';
        } catch (UserNotActivatedException $e) {
            $loginError = 'User is not activated.';
        } // The following is only required if the throttling is enabled
        catch (UserSuspendedException $e) {
            $loginError = 'User is suspended.';
        } catch (UserBannedException $e) {
            $loginError = 'User is banned.';
        }

        return (object)['status' => false, 'errors' => ['password' => $loginError]];
    }

    /**
     *
     */
    public static function logout()
    {
        Sentry::logout();
    }

    /**
     * @return bool
     */
    public static function isLogin()
    {
        return Sentry::check();
    }

    /**
     * @return UserInterface
     */
    public static function getCurrentUser()
    {
        return Sentry::getUser();
    }

    /**
     * @return mixed|null
     */
    public static function getUserID()
    {
        if (User::isLogin()) {
            return User::getCurrentUser()->getId();
        } else {
            return null;
        }
    }

}
