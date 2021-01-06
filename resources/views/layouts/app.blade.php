<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posty Application</title>
</head>

<body class="bg-gray-800 ">
    <nav class="p-6 bg-white flex justify-between ">

        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{route('dashboard')}}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{route('posts')}}" class="p-3">Post</a>
            </li>
        </ul>
        <ul class="flex items-center">

            @auth
            <li>
                <a href="" class="p-3">{{auth()->user()->username}}</a>
            </li>
            <li>
                <form action="{{route('logout')}}" method="post" class="inline p-3">
                    @csrf
                    <button type=="submit">LogOut</button>
                </form>
            </li>
            @endauth
            @guest
            <li>
                <a href="{{route('login')}}" class="p-3">LogIn</a>
            </li>
            <li>
                <a href="{{route('register')}}" class="p-3">Register</a>
            </li>
            @endguest
        </ul>
    </nav>

    <div class="flex flex-col md:flex-row">
        <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            <div
                class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">

                    <li class="mr-3 flex-1 mt-8">
                        <a href="{{route('mpesa.logs')}}"
                            class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                            <i class="fa fa-wallet pr-0 md:pr-3"></i><span
                                class="pb-1 mt-12 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Payments</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1 mt-8">
                        <a href="#"
                            class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                            <i class="fa fa-wallet pr-0 md:pr-3"></i><span
                                class="pb-1 mt-12 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">SMS(Africas
                                Talking)</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>
        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5 ">
            @yield('content')

        </div>
    </div>
</body>

</html>