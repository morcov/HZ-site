<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Models\User;
use BaseController, View, Redirect, Input;

/**
 * Class UserController
 * @package App\Modules\User\Controllers
 */
class UserController extends BaseController
{

    /**
     * Registration user form
     *
     * @return View
     */
    public function registrationAction()
    {
        return View::make('user::registration');
    }

    /**
     * Login form
     *
     * @return View
     */
    public function loginAction()
    {
        return View::make('user::login');
    }

    /**
     * Logout
     *
     */
    public function logoutAction()
    {
        User::logout();
        return Redirect::to('/');
    }

    /**
     * Registration user
     *
     * @return Redirect
     */
    public function registration()
    {
        $data = Input::all();
        $result = User::registration($data);

        if ($result->status) {
            return Redirect::to('/');
        } else {
            return Redirect::to('/registration')->withInput($data)->withErrors($result->errors);
        }
    }


    /**
     * Login user
     *
     * @return Redirect
     */
    public function login()
    {
        $data = Input::all();
        $result = User::login($data);

        if ($result->status) {
            return Redirect::to('/');
        } else {
            return Redirect::to('/login')->withInput($data)->withErrors($result->errors);
        }
    }

}
