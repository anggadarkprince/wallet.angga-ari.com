<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wallet') }} - @yield('title', 'Home')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing.index') }}">
                    <img class="mr-2" src="{{ asset('storage/img/logo-wallet.png') }}" width="35" height="35" alt="Logo">
                    <span>{{ config('app.name') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item{{ preg_match('/^home/', Route::currentRouteName()) ? ' active' : '' }}">
                                <a class="nav-link" href="{{ '/home' }}">
                                    <i class="mdi mdi-speedometer-slow mr-1"></i>Home <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item{{ preg_match( '/^categories/', Route::currentRouteName()) ? ' active' : '' }}">
                                <a class="nav-link" href="{{ url('/categories') }}">
                                    <i class="mdi mdi-layers-outline mr-1"></i>Categories
                                </a>
                            </li>
                            <li class="nav-item{{ preg_match('/^savings/', Route::currentRouteName()) ? ' active' : '' }}">
                                <a class="nav-link" href="{{ url('/savings') }}">
                                    <i class="mdi mdi-wallet-outline mr-1"></i>Savings
                                </a>
                            </li>
                            <li class="nav-item{{ preg_match('/^transactions/', Route::currentRouteName()) ? ' active' : '' }}">
                                <a class="nav-link" href="{{ url('/transactions') }}">
                                    <i class="mdi mdi-shopping-outline mr-1"></i>Transactions
                                </a>
                            </li>
                            <li class="nav-item{{ preg_match('/^setting/', Route::currentRouteName()) ? ' active' : '' }}">
                                <a class="nav-link" href="{{ url('/settings') }}">
                                    <i class="mdi mdi-cog-outline mr-1"></i>Setting
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('account') }}">
                                        <i class="mdi mdi-account-outline mr-1"></i> {{ __('My Account') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="mdi mdi-logout-variant mr-1"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}" defer></script>
    <script src="{{ mix('js/vendor.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
