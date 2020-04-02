@extends('layouts.landing')

@section('content')
    <div class="container landing-hero">
        <div class="text-center mb-5">
            <h3 class="text-teal">Wallet.app is simple, sophisticated, secure personal financial manager</h3>
            <h1 class="display-3 font-weight-bold mb-3">
                {{ __('Wealthiness comes from right control and decision') }}
            </h1>
            <h4 class="text-fade font-weight-normal mb-5">
                {{ __('We dream how people can manage their money in simple way') }}
                <br>
                <small>{{ __('We believe with right tool could encourage people to be managed') }}.</small>
            </h4>
            <div class="row justify-content-center mb-5">
                <div class="col-md-3 text-center">
                    <h2 class="numbers">+1000 <span class="small font-weight-light">/ users</span></h2>
                    <p class="text-uppercase text-teal">managed SKUs</p>
                </div>
                <div class="col-md-3 text-center">
                    <h2 class="numbers">+200M <span class="small font-weight-light">/ mo</span></h2>
                    <p class="text-uppercase text-teal">transaction by the API</p>
                </div>
                <div class="col-md-3 text-center">
                    <h3 class="numbers">99.9%</h3>
                    <p class="text-uppercase text-teal">system’s uptime</p>
                </div>
            </div>
        </div>
    </div>

    @include('landing.partials._featured-register')
@endsection