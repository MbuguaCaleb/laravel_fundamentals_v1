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

**Notes by Mbugua caleb**
