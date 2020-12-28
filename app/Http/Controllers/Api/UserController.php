<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
	/**
	 *
	 * Method: Registration
	 * Notes: Method to create new user. 
	 *
	 */
    public function register(Request $request)
    {
    	return $request->all();
    }

	/**
	 *
	 * Method: Login
	 * Notes: Method to create access token for user. 
	 *
	 */
    public function login(Request $request)
    {
    	return $request->all();
    }

	/**
	 *
	 * Method: Forgot password
	 * Notes: Method to send reset link to user.
	 *
	 */
    public function forgotPassword(Request $request)
    {
    	return $request->all();
    }

}
