<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posty Application</title>
</head>
<body  class="bg-gray-200">
<nav class="p-6 bg-white flex justify-between mb-3">

<ul class="flex items-center">
<li>
<a href="" class="p-3">Home</a>
</li>
<li>
<a href="" class="p-3">Dashboard</a>
</li>
<li>
<a href="" class="p-3">Post</a>
</li>
</ul>
<ul class="flex items-center">

@if(auth()->user())
<li>
<a href="" class="p-3">Mbugua Caleb</a>
</li>
<li>
<a href="" class="p-3">Log Out</a>
</li>
@else
<li>
<a href="" class="p-3">LogIn</a>
</li>
<li>
<a href="" class="p-3">Register</a>
</li>
@endif
</ul>
 </nav>
    @yield('content')
</body>
</html>