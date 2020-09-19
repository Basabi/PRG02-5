<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scae=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>{{config('app.name', 'Laravel')}}</title>
        <link rel="dns-prefetch" ref="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
<body>
<main>
    @if (route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{url('/home')}}">Home</a>
            @else
                <a href="{{route('login')}}">Login</a>

                @if(Route::has('register'))
                    <a href="{{route('register')}}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    @yield('content')
</main>
<script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>
