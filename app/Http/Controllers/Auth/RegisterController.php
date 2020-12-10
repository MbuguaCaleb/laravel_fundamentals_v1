<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        
        return view('auth.register');
    }

    public function store(Request $request){

        //!dd($request);
        //todo  stepone->validating the request
        /* 
          if validation fails an exception is thrown and you are
          redirected back .There is no need of an if statement since
          it automatically throws an exception.
         */
        $this->validate($request,[
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password' =>'required|confirmed'
        ]);
        
        //store user
        User::create ([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);  


        //sign in
        //dd($request->only('email','password') is a shorter way of gettting the request details.
        auth()->attempt($request->only('email','password'));

        //redirect to dashboard after signing in
        //!Its always advisable to use route names.
        return redirect()->route('dashboard');        
    }


} 
