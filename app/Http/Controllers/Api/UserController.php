<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Auth;

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
    	$request->validate([
    		'email' => ['required', 'unique:users'],
    	]);

    	$request['password'] = bcrypt($request->password);
        
        User::create($request->all());

    	return response([
            'message' => 'User has been registered successfully'
        ]);
    }

	/**
	 *
	 * Method: Login
	 * Notes: Method to create access token for user. 
	 *
	 */
    public function login(Request $request)
    {
    	$credentials = $request->validate([
    		'email' => ['required'],
    		'password' => ['required'],
    	]);

    	// Checking user credentials
    	if (!Auth::attempt($credentials)) {
    		return response(['message' => 'Invalid credentials!']);
    	}

    	$token = Auth::user()->createToken('authToken')->accessToken;

    	return response([
    		'user' => Auth::user(),
    		'accessToken' => 'Bearer '.$token
    	]);

    }

	/**
	 *
	 * Method: Forgot password
	 * Notes: Method to send reset link to user.
	 *
	 */
    public function forgotPassword(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
        ]);

    	$user = User::where('email', $request->email)->first();

        if ($user != NULL) {
            Password::sendResetLink($credentials);
            return response([
                'message' => 'Email with reset password link has been sent.'
            ]);
        }

        return response([
            'message' => 'User does not exist in our database'
        ]);
    }

}
