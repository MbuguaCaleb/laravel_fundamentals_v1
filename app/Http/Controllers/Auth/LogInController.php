<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogInController extends Controller
{
    public function index() {

        return view('auth.login');
    }

    public function store(Request $request){

        //validating the request
        $this->validate($request,[
            'email'=>'required|email',
            'password' =>'required'
        ]);


        //cathcing error for failed login attempt
        //first executes the attempt and if it does not pass it execures whats in the if block
       if(!auth()->attempt($request->only('email','password'))){
        return back()->with('status','Invalid LogIn Credentials');
       };

       //if the attempt passes
       return redirect()->route('dashboard');

    }
}
