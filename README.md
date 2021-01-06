**NOTES**

```
(a)Laravel Mix helps us manage our assets.In this project laravel mix helps us have
tailwind css assets.

We must

(i)npm install tailwind

(ii)npm install laravel -Laravel NPM Packages.

(iii)npm run dev.Starts Laravel mix.

(b)In resources folder ./resources/css/app.css is where i put the tailwind css classes to be compiled.

(c){{asset()}} is a laravel helper function that helps you maps to the base path of our application
```

**Adding a Migration**

```
2 options

(a)php artisan make:migration add_username_to_users_table
You must specify table name inside your statement so that laravel knows which table you are referring to.

(b)php artisan make:migration add_username_to_users_table --table=users

Add a table flag and the table name which informs laravel about
the table you are adding to.


```

**Models**

```
Are a representation of data inside your database via eleoquent ORM.

Each database table has a corresponding "Model" which is used to interact with that table.

Models allow you to query for data in your tables, as well as insert new records into the table.

```

**Controllers**

```
Where i write my logic.
Writing logic under the routes file is not maitainalble thus
we use controllers which are tied to methods and which we call in our routes.

Creating a controller inside a directory:

php artisan make:controller Auth\\RegisterController

```

**Facade**

```
Shorthand to accessing underlying functionality really nicely.

Hash::make()

There is a lot underlying in this function but its hidden from use.
```

**Mass Assingment**

```
When you have permission to put an array of values into a model all at once.

For instance

$user = new User(request()->all());

You may use protected fillable or protected guarded so as to guard against this.

protected $guarded = ['*'];

or

$fillable = ['name', 'password', 'email'];

Means that these are the only fields in the model which are mass assignable.

It is very imporant to protect important fields from mass assignment.


```

**Facades and helpers**

```
I May either user the Auth::user() facade or the auth()->user() helper so as to retrieve the details of
a logged in user.

```

**Authentication sessions**

```
There are two alternatives:

(a)
    if(auth()->user)

    @else

    @endif

(b)Auth and guest directives.

@auth

@endauth


@guest

@endguest

N/B ONE WAYS TO EASILY LOGOUT IS CLEAR THE COOKIES.
```

**SHORT NOTES**

```
(a)Creating a Controller into a new folder/directory

php artisan make:controller Auth\\LoginController


(b)Whenever errors occur they are flashed to the session and your blade template using the session()  helper helps to display these errors.

(c)Before any of your requests are made in Laravel, middleware must first  of all be run..Whether in web or in api.Middleware comes in between your request and your response.

(d)Creating a model together with a factory or migration

php artisan make:model Post -m -f

Getting help with regards to a particular command is as follows:

php artisan make:model Post --help

(e)Learn about constraints and cascading.Cascading means if we delete a user all of their posts are as well deleted.

$table->foreignId('user_id')->constrained()->onDelete('cascade');


Relationships
There is no need to reference the id, and user_id since they were referenced from the migrations


//User Model Relatioship with Posts.
public function posts(){
       return $this->hasMany(Post::class);
       }

You may howeever put them if yo wish.

return $this->hasMany(Post::class, 'foreign_key', 'owner_key');

Extracting Posts Belonging to a User.

 dd(auth()->user()->posts);

The Above returns the Posts belonging to a user as a collection which are much more powerful than
 normal arrays in Laravel.

Fethcing from reltationship

  public function user(){
      return $this->belongsTo(User::class);
}

{{$post->user->name}}

N/B
The method is always accessed as an attribute.

(f)Dates in Laravel are returned as Carbon Objects...These means wa can be able to do a lot of manipulations.

(g)In a production environment app debug should be set to false always so that the clients do not get to see the
errors that we make.


php -d memory_limit=-1  require barryvdh/laravel-debugbar --dev

composer require barryvdh/laravel-debugbar --dev

(h)Auth and EndAuth really does help in avoiding complex if statements.

@auth

@endauth

(i)Passing parameters to named routes

<form action="{{route('posts',$post)}}" method="post">

(j)Method Spoofing.
<form action="{{route('posts',$post)}}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="text-blue-500">Delete</button>
</form>

(k)String helper to Singluarize/Pluralize.

{{$posts->count()}} {{Str::plural('post', $posts->count())}}


```

**Laravel Factories**

```
STEPS

1.php artisan tinker.

2.Make sure you have prototyped your factory.

3.Generate fake datat with below command.
 App\Models\Post::factory()->times(200)->create(['user_id'=>1])

```

**Laravel Route Model binding**

```

Most of the time when i pass an ID i normally want to query from a model.

Laravel has simpified this process even further in that i can get the ID and
the model can be queried now at the Request Level Simplifying the work you would have done as below

Route::post('/posts/{post}/likes',[PostLikesController::class,'store'])->name('post.likes');

{post} is the id parameter received from the blade template.

I may now be directly able to query it with no query at all.

  public function store(Post $post){
        return $post;
    }

The above returns for me the object of the Post directly.


```

**Laravel Auth helper/facade**

```
1. auth()->user()->id is same as auth()->id();


```

**ORDER BY**

```
$posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(20);

Lastest is a scope that the same above
$posts = Post::latest()->with(['user','likes'])->paginate(20);

```

**Policies and Gates**

```
Authorizations in Laravel may either be performed through policies and gates.

This prevents a user who is logged in from doing certain actions.

For Larger applications policies should be employed for authorization since they do their protection at
the controller level.

Protection at controller level works way better.

delete is the policy name
$this->authorize('delete', $post);

@can('delete', $post)
<form action="{{route('posts.destroy',$post)}}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="text-blue-500">Delete</button>
</form>
@endcan
```

**SOFTDELETING**

```
iT Allows me not to delete a record permanently...

Comes in handy with a lot of functionalities such as

$post->likes()->onlyTrashed()

(sorts out the deleted records)
```

**Notes by**

```
 Mbugua caleb

```
