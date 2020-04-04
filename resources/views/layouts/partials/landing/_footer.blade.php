<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img class="mb-5" src="{{ asset('storage/img/logo-wallet.png') }}" width="50" alt="Logo">
            </div>
            <div class="col-md-9">
                <ul class="footer-section list-unstyled mb-5">
                    <li class="footer-list">
                        <h6 class="mb-3">{{ __('About') }}</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('about') }}">{{ __('What is :app', ['app' => config('app.name')]) }}</a></li>
                            <li><a href="{{ route('disclaimer') }}">{{ __('Legal Notice') }}</a></li>
                            <li><a href="{{ route('privacy') }}">{{ __('Privacy policy') }}</a></li>
                            <li><a href="{{ route('sla') }}">{{ __('SLA') }}</a></li>
                        </ul>
                    </li>

                    <li class="footer-list">
                        <h6 class="mb-3">{{ __('Wallet') }}</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('features') }}">{{ __('Features') }}</a></li>
                            <li><a href="{{ route('features.transaction') }}">{{ __('Transaction') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            <li><a href="{{ route('pricing') }}">{{ __('Pricing') }}</a></li>
                        </ul>
                    </li>

                    <li class="footer-list">
                        <h6 class="mb-3">{{ __('Resources') }}</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('help') }}">{{ __('Help center') }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                            <li><a href="{{ route('brand-asset') }}">{{ __('Brand Assets') }}</a></li>
                        </ul>
                    </li>

                    <li class="footer-list">
                        <h6 class="mb-3">{{ __('Social') }}</h6>
                        <ul class="list-unstyled">
                            <li><a href="https://twitter.com/anggadarkprince" target="_blank">Twitter</a></li>
                            <li><a href="https://linkedin.com/in/angga-ari-wijaya-b9a84486" target="_blank">Linkedin</a></li>
                            <li><a href="https://instagram.com/anggadarkprince" target="_blank">Instagram</a></li>
                            <li><a href="https://facebook.com/anggadarkprince" target="_blank">Facebook</a></li>
                        </ul>
                    </li>

                    <li class="footer-list logos-footer">
                        <ul>
                            <li><img src="assets/images/amazon-webservices.svg" alt="Amazon"></li>
                            <li><img src="assets/images/google-manufacture.svg" alt="Google"></li>
                            <li><img src="assets/images/ivace.svg" alt="Digital Ocean"></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-sm-flex justify-content-between">
            <p>&copy {{ date('Y') }} Copyright <a href="{{ url('/') }}">{{ config('app.name') }} all</a> rights reserved</p>
            <ul class="list-inline">
                <li class="list-inline-item" title="Language"><i class="mdi mdi-earth text-fade"></i></li>
                <li class="list-inline-item">
                    <a href="{{ url('/en') }}">English</a>
                </li>
                <li class="list-inline-item border-right">
                    &nbsp;
                </li>
                <li class="list-inline-item">
                    <a href="{{ url('/id') }}">Indonesia</a>
                </li>
            </ul>
        </div>
    </div>
</footer>