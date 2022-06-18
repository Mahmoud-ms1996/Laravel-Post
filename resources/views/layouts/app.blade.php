<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Post</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-10">
        <ul class="flex items-center">
            <li><a href="/" class="p-3">Home</a></li>
            <li><a href="{{ route('posts') }}" class="p-3">Post</a></li>
            @auth
            <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
            @endauth
        </ul>
        <ul class="flex items-center">
            @auth {{-- @if(auth()->user()) --}}
                <li><a href="" class="p-3">{{ auth()->user()->name }}</a></li>
                <li><a href="{{ route('logout') }}" class="p-3 bg-red-600 border-none w-full p-2.5 pt-2 ml-5 rounded-lg text-white"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            @endauth {{-- @else --}}
            @guest
                <li><a href="{{ route('login') }}" class="p-3 bg-blue-600 border-none w-full p-2.5 pt-2 rounded-lg text-white"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                <li><a href="{{ route('register') }}" class="p-3 bg-green-600 border-none w-full p-2.5 pt-2 ml-1 rounded-lg text-white"><i class="fa-solid fa-circle-right"></i> Register</a></li>
            @endguest {{-- @endif --}}

        </ul>
    </nav>
        @yield('content')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
