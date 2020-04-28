@extends('layouts.landing')

@section('content')
    <div class="container content-wrapper">
        <div class="text-center mb-4">
            <h3>{{ __('Choose you subscription') }}</h3>
            <p class="text-fade">
                {{ __('Below is our simple, cheap and transparent premium member, no hidden surprise charges.') }}
            </p>
        </div>
        <div class="d-sm-flex align-items-center justify-content-center text-center mb-5">
            <div class="card border-0 pricing-plan">
                <div class="card-body p-4">
                    <p class="lead text-fade mb-0 text-uppercase">{{ __('Basic Plan') }}</p>
                    <h3>{{ __('Free Forever') }}</h3>
                    <hr>
                    <ul class="list-unstyled">
                        <li><strong>1</strong> {{ __('Wallet') }}</li>
                        <li><strong>1K</strong> {{ __('Transactions / Mo') }}</li>
                        <li class="text-fade">{{ __('No location') }}</li>
                        <li class="text-fade">{{ __('No attachment') }}</li>
                        <li class="text-fade">{{ __('Contain ads') }}</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn btn-wide btn-light rounded-pill">
                        {{ __('Register') }}
                    </a>
                </div>
            </div>
            <div class="card border-0 shadow pricing-plan">
                <div class="card-body p-4">
                    <p class="lead text-fade mb-0 text-uppercase">{{ __('Small plan') }}</p>
                    <h3 class="text-primary">IDR 5K / Mo</h3>
                    <ul class="list-unstyled list-group-flush mx-2">
                        <li class="list-group-item"><strong>5</strong> {{ __('Wallets') }}</li>
                        <li class="list-group-item"><strong>Unlimited</strong> {{ __('Transactions') }}</li>
                        <li class="list-group-item">{{ __('Capture location') }}</li>
                        <li class="list-group-item text-fade">{{ __('No attachment') }}</li>
                        <li class="list-group-item border-bottom-0">{{ __('Contain ads') }}</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn btn-wide btn-outline-primary rounded-pill mb-2">
                        {{ __('Get Started') }}
                    </a>
                </div>
            </div>
            <div class="card border-0 shadow-lg pricing-plan">
                <div class="card-body p-5">
                    <p class="lead text-fade mb-0 text-uppercase">{{ __('Premium plan') }}</p>
                    <h3 class="text-teal font-weight-bold">IDR 20K / Mo</h3>
                    <ul class="list-unstyled list-group-flush">
                        <li class="list-group-item"><strong>Unlimited</strong> {{ __('Wallets') }}</li>
                        <li class="list-group-item"><strong>Unlimited</strong> {{ __('Transactions') }}</li>
                        <li class="list-group-item">{{ __('Capture location') }}</li>
                        <li class="list-group-item">{{ __('Include attachment') }}</li>
                        <li class="list-group-item border-bottom-0">{{ __('No ads') }}</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn btn-wide btn-lg btn-teal rounded-pill">
                        {{ __('Get Started') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('landing.partials._featured-register')
@endsection