<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img class="mr-2" src="{{ asset('storage/img/logo-wallet.png') }}" width="35" height="35" alt="Logo">
            <span>Wallet.app</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-landing-menu" aria-controls="navbar-landing-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-landing-menu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item{{ request()->is('/') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('landing.index') }}">{{ __('Home') }} <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown{{ request()->is('features*') ? ' active' : '' }}">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Features') }} <i class="mdi mdi-chevron-down d-inline-block align-middle"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item{{ request()->is('features') ? ' active' : '' }}" href="{{ route('features') }}">{{ __('Overview') }}</a>
                        <a class="dropdown-item{{ Route::currentRouteName() == 'features.saving' ? ' active' : '' }}" href="{{ route('features.saving') }}">{{ __('Saving Book') }}</a>
                        <a class="dropdown-item{{ Route::currentRouteName() == 'features.transaction' ? ' active' : '' ? ' active' : '' }}" href="{{ route('features.transaction') }}">{{ __('Organize Transactions') }}</a>
                        <a class="dropdown-item{{ Route::currentRouteName() == 'features.budgeting' ? ' active' : '' ? ' active' : '' }}" href="{{ route('features.budgeting') }}">{{ __('Control Expanses') }}</a>
                        <a class="dropdown-item{{ Route::currentRouteName() == 'features.insight' ? ' active' : '' ? ' active' : '' }}" href="{{ route('features.insight') }}">{{ __('Invest Your Coin') }}</a>
                    </div>
                </li>
                <li class="nav-item{{ request()->is('pricing') ? ' active' : '' }}">
                    <a class="nav-link" href="#">{{ __('Pricing') }}</a>
                </li>
                <li class="nav-item dropdown{{ request()->is('contact') || request()->is('help') || request()->is('brand-asset') ? ' active' : '' }}">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Resources') }} <i class="mdi mdi-chevron-down d-inline-block align-middle"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item{{ request()->is('contact') ? ' active' : '' }}" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                        <a class="dropdown-item{{ request()->is('help') ? ' active' : '' }}" href="{{ route('help') }}">{{ __('Help') }}</a>
                        <a class="dropdown-item{{ request()->is('brand-asset') ? ' active' : '' }}" href="{{ route('brand-asset') }}">{{ __('Brand Asset') }}</a>
                    </div>
                </li>
                <li class="nav-item{{ request()->is('about') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="mdi mdi-speedometer-slow mr-1"></i> {{ __('Dashboard') }}
                                </a>
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
                    @else
                        <li class="nav-item{{ request()->is('login') ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="btn btn-outline-teal btn-round my-2 ml-md-2 px-3 my-sm-0">
                                    {{ __('Get Started') }}
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>