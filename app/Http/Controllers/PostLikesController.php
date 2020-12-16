<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function store(Post $post ,Request $request ){
        
        if($post->likedBy($request->user())){
            return response(null,409);
        }

        //creating a post like
        //when you insert via the relationship 
        //Laravel automatically inserts the post id into the likes table
        //And we therefore must not add the post id as a fillable
        //The below is shorthand syntax.
        $post->likes()->create([
            'user_id'=>$request->user()->id,

        ]);
        //shorthand for return redirect back()
        return back();
    }

    public function destroy(Post $post, Request $request){

    //Making sure that its only the user who made the likes may delete
    $request->user()->likes()->where('post_id', $post->id)->delete();

    return back();

    }
}
