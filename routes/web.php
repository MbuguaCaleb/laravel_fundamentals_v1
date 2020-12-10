<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/register',[RegisterController::class,'index'])->name('register');

//! POST ROUTE INHERITS NAME FROM THE REGISTER THUS THERES NO NEED OF TAGGING THE ROUTE NAME
Route::post('/register',[RegisterController::class,'store']);


Route::get('/posts', function () {
   return view('posts.index');
});

