@extends('layouts.landing')

@section('content')
<div class="container content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body px-5 py-4">
                    <div class="text-center mb-3">
                        <h3 class="mb-0">{{ __('Login') }}</h3>
                        <p class="text-fade">Start capture transaction easy way</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">
                                {{ __('Email address') }}
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Your email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">
                                {{ __('Password') }}
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Your password" name="password" required autocomplete="current-password">
                            @error('password') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-teal btn-block btn-lg">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Register now</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
