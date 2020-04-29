@extends('layouts.landing')

@section('content')
<div class="container content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body px-5 py-4">
                    <div class="text-center mb-3">
                        <h3 class="mb-0">{{ __('Confirm Password') }}</h3>
                    </div>
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Your current password" name="password" required autocomplete="current-password">
                            @error('password') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block btn-lg">
                                {{ __('Confirm Password') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <p class="text-center">
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
