<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers\Auth\AuthenticatedSessionController;
#use Auth;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use 

class UserController extends Controller{




	public function logout(Request $request){

		//dd(Session());
		//session()->forget('id', 0);
		//Session::flash();
		//Auth::logout();
		$logout = new AuthenticatedSessionController();
		$logout->destroy();


	}
   
}
