<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){

        //!dd(auth()->user()); Helps us output logged in userDetails.
        return view('dashboard');
    }
}
