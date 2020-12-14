<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

      
        //gets a list of all the posts in form of a collecti
        //$posts = Post::get();
        //pagination
        $posts = Post::paginate(2);

        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function store(Request $request){

       //validation using laravel helper
       $this->validate($request,[
         'body' =>'required'
       ]);

       /*Shorthand One*/
        // Post::create([
        //     'user_id'=>auth()->id(),
        //     'body'=>$request->body
        // ]);
    //    //creating a Post through a User
    //    /*Shorthand Two*/
    //    $request->user()->posts()->create([
    //        'body' =>$request->body
    //    ]);

    //   /*shorthand Three*/
       $request->user()->posts()->create($request->only('body'));

       return back();
    }
}
