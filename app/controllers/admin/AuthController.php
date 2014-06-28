<?php namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Redirect, View, Notification, Validator;

class AuthController extends BaseController {

        /**
         * Display the login page
         * @return View
         */
        public function getLogin()
        {
                return View::make('admin.auth.login');
        }


        /**
         * Login action
         * @return Redirect
         */
        public function postLogin()
        {
                // validate the info, create rules for the inputs
                $rules = array(
                        'email'    => 'required|email', // make sure the email is an actual email
                        'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
                );

                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                        Notification::error($validator);
                        return Redirect::back()
                                ->withErrors($validator) // send back all errors to the login form
                                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form

                } else {

                        // create our user data for the authentication
                        $userdata = array(
                                'email'         => Input::get('email'),
                                'password'      => Input::get('password')
                        );

                        // attempt to do the login
                        if (Auth::attempt($userdata)) {
                                return Redirect::route('admin.pages.index');

                        } else {

                        // validation not successful, send back to form
                        return Redirect::back()->withInput(Input::except('password'))->withErrors(array('login' => 'Login information incorrect!'));
                        }

                }
        }

        /**
         * Logout action
         * @return Redirect
         */
        public function getLogout()
        {
                Auth::logout();

                return Redirect::route('admin.login');
        }

}