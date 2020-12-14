<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(){
        //middleware
        $this->middleware(['auth']);
    }
    
    public function index(){

        //!dd(auth()->user()); Helps us output logged in userDetails.

        //extracting Posts belonging to a user

        return view('dashboard');
    }
}
