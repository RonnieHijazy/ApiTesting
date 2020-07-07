<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
		
		$login = $request->validate([
			'email' => 'required|string',
			'password' => 'required|string'
		]);
		
		if( !Auth::attempt($login)){
			return response(['message' => 'Invalid Login Credentails']);
		}
		
		$accessToken = Auth::user()->createToken('authToken')->accessToken;
		
		return response(['user' => Auth::user() , 'access_token' => $accessToken]);
	}
	
	public function register(Request $request){
		$register = $request->validate([
			'name' => 'required|string',
			'email' => 'required|string',
			'password' => 'required|string'
		]);
		
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->save();
		
		$accessToken = $user->createToken('authToken')->accessToken;
		
		return response(['user' => $user , 'access_token' => $accessToken]);
	}
}
