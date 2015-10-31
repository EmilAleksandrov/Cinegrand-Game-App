<?php

/**
 * Description of UserController
 *
 */
class UserController extends Controller {

//    public function getCreate() {
//        return View::make('user.register');
//    }
//
//    public function getLogin() {
//        return View::make('user.login');
//    }
//
    public function postCreate() {

        $validate = Validator::make(Input::all(), array(
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'email' => 'required|unique:users',
                    'facebook_id' => 'required',
                    'register_agreement' => 'required'
        ));
        if ($validate->fails()) {
            return Redirect::route('home')->withErrors($validate)->withInput();
        } else {
            $user = new User();
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->facebook_id = Input::get('facebook_id');

            if ($user->save()) {
                Auth::loginUsingId($user->id);
                return Redirect::route('startGame');
            } else {
                return Redirect::route('home');
            }
        }
    }

//
    public function postLogin($id) {

        $auth = Auth::attempt(array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                        ), $remember);

        if ($auth) {
            return Redirect::intended('/');
        } else {
            return Redirect::route('getLogin')->with('fail', 'You entered the wrong login credentials. Please try again. ');
        }
    }

//}
//
    public function getLogout() {
        Auth::logout();
        return Redirect::route('home');
    }

    public function apply() {
        $validate = Validator::make(Input::all(), array(
                    'user_first_name' => 'required',
                    'user_last_name' => 'required',
                    'user_email' => 'required'
        ));
//TODO: get facebook id with php 
        if ($validate->fails()) {
            return Redirect::route('home')->withErrors($validate)->withInput();
        } else {
            $remember = (Input::has('register_agreement')) ? true : false;
        }
    }

}
