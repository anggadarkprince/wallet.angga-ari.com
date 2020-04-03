@extends('layouts.landing')

@section('content')
    <div class="container content-wrapper">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <h3>Contact Us</h3>
                <p>If you have any question and need further assistance about our service, please don't hesitate to get in touch with us.</p>
                @if(Session::has('message'))
                    <div class="alert alert-{{ Session::get('status') }} alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                       placeholder="Full name" required maxlength="50" value="{{ old('name') }}">
                                @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                       placeholder="Your email address" required maxlength="50" value="{{ old('email') }}">
                                @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message"
                                  placeholder="Input your message" rows="5" required maxlength="2000">{{ old('message') }}</textarea>
                        @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-wide rounded-pill">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('landing.partials._featured-register')
@endsection