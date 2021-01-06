<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogInController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\UserPostController;
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



//returing view via route closure
Route::get('/', function() {
return view('home');
})->name('home');


Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/register',[RegisterController::class,'index'])->name('register');

//POST ROUTE INHERITS NAME FROM THE REGISTER THUS THERES NO NEED OF TAGGING THE ROUTE NAME
Route::post('/register',[RegisterController::class,'store']);


Route::get('/login',[LogInController::class,'index'])->name('login');
Route::post('/login',[LogInController::class,'store']);


Route::post('/logout',[LogOutController::class,'logout'])->name('logout');

Route::get('/users/{user:username}/posts',[UserPostController::class,'index'])->name('users.posts');

//Post Routes
Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/posts',[PostController::class,'store']);
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

//Post Likes
//1.Without Root Model Binding
//Route::post('/posts/{id}/likes',[PostLikesController::class,'store'])->name('post.likes');

//2.With Root Model Binding
Route::post('/posts/{post}/likes',[PostLikesController::class,'store'])->name('post.likes');
Route::delete('/posts/{post}/likes',[PostLikesController::class,'destroy'])->name('post.likes');



//MPESA Payments
Route::get('/mpesa_payments', function() {
    return view('payments.mpesa.index');
    })->name('mpesa.logs');