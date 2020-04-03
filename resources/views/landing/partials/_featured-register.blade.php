<hr>

<div class="container-fluid">
    <div class="row py-5 text-center">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2>{{ __('Discover the magic of the App with our product management consultants') }}</h2>
            <p class="text-fade mb-5">{{ __('Learn how a Wallet.app can fit your personal financial') }}</p>
            @auth
                <a href="{{ route('home') }}" class="btn btn-lg btn-primary rounded-pill">
                    <i class="mdi mdi-arrow-left mr-2"></i> {{ __('Back to Dashboard') }}
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-lg btn-teal">{{ __('Register Now') }}</a>
            @endauth
        </div>
    </div>
</div>

<hr>