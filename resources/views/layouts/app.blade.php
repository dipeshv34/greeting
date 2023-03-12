<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ App\Models\Customization::get()->first()->title ?? 'Greetings' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ !empty(App\Models\Customization::get()->first()->favicon) ? asset('storage/favicon/'.App\Models\Customization::get()->first()->favicon) : '' }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

{{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">--}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('links')
</head>
@yield('styles')
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        <ul class="navbar-nav me-auto">
                            <li><a class="navbar-brand" href="{{ route('category.index') }}">
                                    Categories
                                </a></li>
                            <li>   <a class="navbar-brand" href="{{ route('cards.index') }}">
                                    Cards
                                </a></li>
                            <li>
                                <a class="navbar-brand" href="{{ route('custom.form') }}">
                                    Customizations
                                </a>
                            </li>

                        </ul>
                        <ul class="navbar-nav ms-auto rightto">
                            <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('change-password') }}">
                                        {{ __('Change Password') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav me-auto">
                            <li><a class="navbar-brand" href="{{ route('front.view') }}">
                                    Greetings
                                </a></li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
@yield('scripting')
</body>
</html>
