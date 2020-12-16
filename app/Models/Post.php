<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];


    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    //checking whether user has liked a post.
    //post has a relationship with likes thus i can query from
    //that relationship.
    public function likedBy(User $user){
     return $this->likes->contains('user_id', $user->id);   
    }

    //remember a post has an user id 
    //I am creating this function as part of the POST Model
    //and therefore i can be able to call it.
 

}
