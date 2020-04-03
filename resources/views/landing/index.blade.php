@extends('layouts.landing')

@section('content')

    <div class="container landing-hero">
        <div class="text-center mb-5">
            <h1 class="display-4 font-weight-bold mb-3">
                {{ __('One stop control of your money') }}
            </h1>
            <p class="lead">
                {{ __('This app tacks your credit and debit transaction') }}
                <br>
                {{ __('Organize your money into specific account and saving plan') }}.
            </p>
            <div class="d-flex flex-column align-items-center">
                @auth
                    <a href="{{ route('home') }}" class="btn btn-lg btn-primary rounded-pill mt-3">
                        <i class="mdi mdi-arrow-left mr-2"></i> {{ __('Back to Dashboard') }}
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-lg btn-teal rounded-pill mt-3">
                        {{ __('Try now for free') }}
                    </a>
                @endauth
                <a href="{{ route('help') }}" class="text-teal mt-4 font-weight-bold d-flex align-items-center text-uppercase">
                    <i class="mdi mdi-help-circle-outline mr-2 text-teal lead"></i> {{ __('Learn More') }}
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 mx-auto">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link color-tab-1 d-flex align-items-center justify-content-center active" id="saving-tab" data-toggle="tab" href="#saving-tab-section" role="tab" aria-controls="saving" aria-selected="true">
                            <i class="mdi mdi-package-variant mr-2"></i> {{ __('Saving Plan') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-tab-2 d-flex align-items-center justify-content-center" id="transaction-tab" data-toggle="tab" href="#transaction-tab-section" role="tab" aria-controls="transaction" aria-selected="false">
                            <i class="mdi mdi-cart-outline mr-2"></i> {{ __('Transaction Data') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-tab-3 d-flex align-items-center justify-content-center" id="budgeting-tab" data-toggle="tab" href="#budgeting-tab-section" role="tab" aria-controls="budgeting" aria-selected="false">
                            <i class="mdi mdi-clipboard-check-outline mr-2"></i> {{ __('Monthly Budgeting') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-tab-4 d-flex align-items-center justify-content-center" id="investing-tab" data-toggle="tab" href="#investing-tab-section" role="tab" aria-controls="investing" aria-selected="false">
                            <i class="mdi mdi-finance mr-2"></i> {{ __('Investing Future') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="landing-tab-feature py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="tab-content mb-4">
                        <div class="tab-pane fade show active" id="saving-tab-section" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <i class="display-1 mdi mdi-wallet-plus-outline mr-4" style="line-height: 1"></i>
                                        <div>
                                            <h4>{{ __('Multiple Saving Books') }}</h4>
                                            <p class="text-muted">
                                                {{ __('Shared, independent, transparent saving account. Give you freedom of personal finance management and do whatever you want.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <ul>
                                        <li>{{ __('Multiple Data Saving') }}</li>
                                        <li>{{ __('Independent Transactions') }}</li>
                                        <li>{{ __('Shared Saving Book') }}</li>
                                        <li>{{ __('Encrypted Feature Access') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="transaction-tab-section" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <i class="display-1 mdi mdi-storefront-outline mr-4" style="line-height: 1"></i>
                                        <div>
                                            <h4>{{ __('Track Your Transaction') }}</h4>
                                            <p class="text-muted">
                                                {{ __('Capture every movement of your transaction in every categories of accounts. Give you raw balance and feel free to organize your money into effective cash flow.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <ul>
                                        <li>{{ __('Grouping Categories') }}</li>
                                        <li>{{ __('Capture Location') }}</li>
                                        <li>{{ __('Multiple Attachment') }}</li>
                                        <li>{{ __('Carry-over Balance') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="budgeting-tab-section" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <i class="display-1 mdi mdi-coffee-off-outline mr-4" style="line-height: 1"></i>
                                        <div>
                                            <h4>{{ __('Set Budget Periodically') }}</h4>
                                            <p class="text-muted">
                                                {{ __('Keep your money on track. Distribute every coin into right account and remind the limit. This is a control of what you want to bring you awareness of transaction activity.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <ul>
                                        <li>{{ __('Monthly Limit') }}</li>
                                        <li>{{ __('Category Budgeting') }}</li>
                                        <li>{{ __('Distribution Calculation') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="investing-tab-section" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <i class="display-1 mdi mdi-clock-fast mr-4" style="line-height: 1"></i>
                                        <div>
                                            <h4>{{ __('Plan Your Money') }}</h4>
                                            <p class="text-muted">
                                                {{ __('Learn your curve balance each period to see your future wealth. Give you deep insight about your pass transaction and give you calculation of your improvement.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <ul>
                                        <li>{{ __('Saving Plan') }}</li>
                                        <li>{{ __('Saving Reminder') }}</li>
                                        <li>{{ __('Saving Goal Control') }}</li>
                                        <li>{{ __('Intuitive Insight') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ url('features') }}" class="btn btn-primary rounded-pill">
                    {{ __('Explore all features') }}
                </a>
            </div>
        </div>
    </div>

    <div class="container py-5 text-center">
        <h2 class="mt-4">{{ __('Create your transaction, as easy as copy-paste') }}</h2>
        <div class="row">
            <div class="col-md-4 p-sm-5 quick-step">
                <i class="display-1 mdi mdi-inbox-full-outline zoom-in"></i>
                <h4>{{ __('Step One') }}</h4>
                <p class="text-fade">{{ __('Create saving book and organize category accounts to separate each transaction type.') }}</p>
            </div>
            <div class="col-md-4 p-sm-5 quick-step">
                <i class="display-1 mdi mdi-file-compare zoom-in"></i>
                <h4>{{ __('Step Two') }}</h4>
                <p class="text-fade">{{ __('Import any excel, CSV or XML formatted file or manually input your daily transaction.') }}</p>
            </div>
            <div class="col-md-4 p-sm-5 quick-step">
                <i class="display-1 mdi mdi-safe-square-outline zoom-in"></i>
                <h4>{{ __('Step Three') }}</h4>
                <p class="text-fade">{{ __('Done! Your transaction record is in the cloud. You can manage your cash flow even with your partner.') }}</p>
            </div>
        </div>
    </div>

    <div class="container mb-7">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-5">
                <h2 class="mb-3">Quality Score</h2>
                <p class="text-fade">Track the evolution of the quality of your product information with our graphic reports. Enrich your product information automatically and improve the ranking of your product listings. All this in clear, visual charts and graphics.</p>
                <a href="{{ url('features/insight') }}" class="button-arrow">
                    Show more
                </a>
            </div>
            <div class="col-md-6">
                <img class="align-self-center img-fluid" src="assets/images/quality-score.png" srcset="assets/images/quality-score@2x.png 2x" alt="Quality Score">
            </div>
        </div>
    </div>

    <div class="container mb-7">
        <div class="row justify-content-between align-items-center flex-row-reverse">
            <div class="col-md-5">
                <h2 class="color-blue">Track your changes</h2>
                <p>Keep track of users’ daily activity. Check the dates and authoring of each change made. Retrieve previous versions to recover any changes.</p>
                <a href="{{ route('features.transaction') }}" class="button-arrow">
                    Show more
                </a>
            </div>
            <div class="col-md-6 margin-illustration">
                <img class="align-self-center img-fluid" src="assets/images/time-layer.png" srcset="assets/images/time-layer@2x.png 2x" alt="Track your changes">
            </div>
        </div>
    </div>

    <div class="container mb-7">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-5">
                <h2 class="mb-3">Flexibility</h2>
                <p class="text-fade">Catalogs are living content and require constant updates. With Sales Layer a wide range of options are at your fingertips: customize data sheets, use pre-designed formulas, bulk edit... in up to 156 different languages.</p>
                <a href="{{ route('features.budgeting') }}" class="button-arrow">
                    Show more
                </a>
            </div>
            <div class="col-md-6">
                <img class="align-self-center img-fluid" src="assets/images/quality-score.png" srcset="assets/images/quality-score@2x.png 2x" alt="Flexibility">
            </div>
        </div>
    </div>

    <div class="container mb-7">
        <div class="p-5 bg-fade">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 p-md-4">
                    <h2 class="mb-4 font-weight-bold">Share your secure, personalised saving book catalogs with anyone</h2>
                    <a href="{{ route('features.saving') }}" class="btn btn-lg btn-teal rounded-pill">More info</a>
                </div>
                <div class="col-lg-6">
                    <img id="instant-catalog-box-img" src="assets/videos/instant_catalogs.png" alt="Create and share online catalogs">
                </div>
            </div>
        </div>
    </div>

    @include('landing.partials._featured-register')
@endsection