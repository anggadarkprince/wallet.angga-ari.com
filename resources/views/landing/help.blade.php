@extends('layouts.landing')

@section('content')
    <div class="help-search">
        <div class="container">
            <form action="help" method="get">
                <div class="input-group">
                    <input type="search" name="q" id="q" class="form-control form-control-lg"
                           placeholder="{{ __('Have a question? Ask or enter a search term.') }}" value="{{ request()->get('q') }}">
                    <div class="input-group-append">
                        <button class="btn btn-teal btn-lg" type="button">
                            <i class="mdi mdi-magnify mr-2"></i> {{ __('Search') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container content-wrapper">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h4 class="mb-4">{{ __('Article Categories') }}</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-teal"><i class="mdi mdi-account-outline mr-2"></i>Account</h4>
                        <ul class="list-group list-group-flush lead mb-5">
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">I can't login with my credential</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Deactivate my account</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">No longer receive notification</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Change email address</a></li>
                        </ul>

                        <h4 class="text-teal"><i class="mdi mdi-wallet-outline mr-2"></i>Wallet</h4>
                        <ul class="list-group list-group-flush lead mb-5">
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Sharing my wallet with another user</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Create new category</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Use same category for income and expense</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Carry over balance into next month</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Set limit category expense each month</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-teal"><i class="mdi mdi-cash-usd-outline mr-2"></i>Payment</h4>
                        <ul class="list-group list-group-flush lead mb-5">
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Cancel subscription member</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Publish invoice early</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Payment not received</a></li>
                        </ul>

                        <h4 class="text-teal"><i class="mdi mdi-notebook-outline mr-2"></i>Other</h4>
                        <ul class="list-group list-group-flush lead mb-5">
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Export data to file</a></li>
                            <li class="list-group-item"><a href="{{ url('help') }}" class="text-link">Reset all wallet data</a></li>
                        </ul>
                    </div>
                </div>

                <p class="my-5 text-center">
                    <i class="mdi mdi-help-circle-outline mr-2"></i>{{ __('Not found what you are looking for?') }} contact
                    <a href="{{ route('contact') }}">our support</a> here.
                </p>
            </div>
        </div>
    </div>

    @include('landing.partials._featured-register')
@endsection