@extends('layouts.landing')

@section('content')
    <div class="container content-wrapper">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <h3>{{ __('Download') }} assets</h3>
                <p class="text-fade">
                    {{ __('We have copyright of images or any resources that downloadable below.') }}
                </p>

                <div class="mb-4">
                    <h4>Icon and Logo</h4>
                    <a href="{{ asset('storage/img/logo-wallet.png') }}">
                        {{ __('Download') }}
                    </a>
                </div>

                <div class="mb-4">
                    <h4>Author</h4>
                    <a href="{{ asset('storage/img/author.jpg') }}">
                        {{ __('Download') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection