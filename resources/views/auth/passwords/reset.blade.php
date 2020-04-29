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

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   placeholder="Your email address" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                   placeholder="New password" required autocomplete="new-password">
                            @error('password') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                   placeholder="Confirm the password" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block btn-lg">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
