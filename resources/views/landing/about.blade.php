@extends('layouts.landing')

@section('content')
    <div class="container landing-hero">
        <div class="text-center mb-5">
            <h3 class="text-primary">{{ __(':app is simple, sophisticated, secure personal financial manager', ['app' => config('app.name')]) }}</h3>
            <h1 class="display-3 font-weight-bold mb-3">
                {{ __('Wealthiness comes from right control and decision') }}
            </h1>
            <h4 class="text-fade font-weight-normal mb-5">
                {{ __('We dream how people can manage their money in simple way') }}
                <br>
                <small>{{ __('We believe with right tool could encourage people to be managed') }}</small>
            </h4>
            <div class="row justify-content-center mb-5">
                <div class="col-md-3 text-center">
                    <h2 class="numbers">+1.000 <span class="small font-weight-light">/ {{ __('Users') }}</span></h2>
                    <p class="text-uppercase text-teal">{{ __('Managed') }}</p>
                </div>
                <div class="col-md-3 text-center">
                    <h2 class="numbers">+200M <span class="small font-weight-light">/ {{ __('Mo') }}</span></h2>
                    <p class="text-uppercase text-teal">{{ __('Transaction by the API') }}</p>
                </div>
                <div class="col-md-3 text-center">
                    <h3 class="numbers">99.9%</h3>
                    <p class="text-uppercase text-teal">{{ __('System’s uptime') }}</p>
                </div>
            </div>
        </div>
        <div class="content-wrapper text-center">
            <p class="lead text-fade">{{ __(':app is created by', ['app' => config('app.name')]) }}</p>
            <img src="{{ asset('storage/img/author.jpg') }}" alt="Author" class="rounded-circle mb-3" style="width: 150px">
            <h3>Angga Ari Wijaya</h3>
            <p class="text-fade">Full stack developer</p>
        </div>
    </div>

    @include('landing.partials._featured-register')
@endsection