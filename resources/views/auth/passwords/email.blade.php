@extends('layouts.landing')

@section('content')
<div class="container content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body px-5 py-4">
                    <div class="text-center mb-3">
                        <h3 class="mb-0">{{ __('Reset Password') }}</h3>
                        <p class="text-fade">Recover your password</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   placeholder="Registered email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                        <p class="text-center">
                            {{ __('Remember your password?') }} <a href="{{ route('login') }}">{{ __('Login now') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
