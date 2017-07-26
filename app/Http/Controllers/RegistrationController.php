<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create(){
    	return  csrf_field();
    }
    public function store(){
    	//Validate the form
    	$this->Validate(request(),[
    			'name'=>'required',
    			'email'=>'required|email',
    			'password'=>'required|confirmed'

    		]);

    	//Create and save the user.
    	$user = User::create(request(['name','email','password']));

    	//Sign them in.
    	auth()->login($user);

    	//Redirect to the home page
    	return $user->id;
    }
}
