<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;



class PostController extends Controller
{

    public function __construct() {
        $this->middleware(['auth'])->only(['store','destroy']);
    }
    public function index(){  
        //gets a list of all the posts in form of a collecti
        //$posts = Post::get();
        //pagination
        //Eager Loading Posts with Users.
        //This makes querying from relationships much faster.
        $posts = Post::latest()->with(['user','likes'])->paginate(20);

        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function show(Post $post){

     return view('posts.show',[
            'post' =>$post          
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

    public function destroy(Post $post){
 
       //implementing policies for authorization
        
       //delete is the name of the method in  my policy
       $this->authorize('delete', $post);
       //if my policy returns true i may go ahead and implement
        $post->delete();
        return back();
    }

}