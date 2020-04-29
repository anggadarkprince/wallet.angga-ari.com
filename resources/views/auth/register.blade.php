@extends('layouts.landing')

@section('content')
<div class="container content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body px-5 py-4">
                    <div class="text-center mb-3">
                        <h3 class="mb-0">{{ __('Register now') }}</h3>
                        <p class="text-fade">Let's join with us</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   placeholder="Your name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   placeholder="Email address" value="{{ old('email') }}" required autocomplete="email">
                            @error('email') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                   placeholder="Password" required autocomplete="new-password">
                            @error('password') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                   placeholder="Confirm the password" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-teal btn-block btn-lg">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <p class="text-center">
                            {{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Login now') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
