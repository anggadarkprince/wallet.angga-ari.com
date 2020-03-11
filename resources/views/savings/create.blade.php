@extends('layouts.app')

@section('title', 'Create new saving')

@section('content')
    <div class="col-md-6 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="font-weight-bold">Create Saving</h3>
                <p>Group of financial journal</p>
            </div>
        </div>

        @if(Session::has('message'))
            <p class="alert alert-{{ Session::get('status') }}">{{ Session::get('message') }}</p>
        @endif

        <form action="{{ route('savings.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="saving_title">Saving Title</label>
                <input type="text" name="saving_title" class="form-control @error('saving_title') is-invalid @enderror" id="saving_title" placeholder="Saving title" value="{{ old('saving_title') }}">
                @error('saving_title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="type_bank">Saving Type</label>
                <div class="@error('saving_type') is-invalid @enderror">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type_bank" name="saving_type" class="custom-control-input" value="BANK"{{ old('saving_type') == 'BANK' ? ' checked' : '' }}>
                        <label class="custom-control-label" for="type_bank">Bank</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type_cash" name="saving_type" class="custom-control-input" value="CASH"{{ old('saving_type') == 'CASH' ? ' checked' : '' }}>
                        <label class="custom-control-label" for="type_cash">Cash</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type_other" name="saving_type" class="custom-control-input" value="OTHER"{{ old('saving_type') == 'OTHER' ? ' checked' : '' }}>
                        <label class="custom-control-label" for="type_other">Other</label>
                    </div>
                </div>
                @error('type')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="account_name">Account Name</label>
                <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror" id="account_name" placeholder="Owner name" value="{{ old('account_name') }}">
                @error('saving_title')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="account_number">Account Number</label>
                <input type="text" name="account_number" class="form-control @error('account_name') is-invalid @enderror" id="account_number" placeholder="Reference number" value="{{ old('account_number') }}">
                @error('account_number')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <input type="text" name="currency" class="form-control @error('currency') is-invalid @enderror" id="currency" placeholder="Currency eg. Dollar" value="{{ old('currency') }}">
                        @error('currency')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="currency_symbol">Currency Symbol</label>
                        <input type="text" name="currency_symbol" class="form-control @error('currency_symbol') is-invalid @enderror" id="currency_symbol" placeholder="Symbol eg. $" value="{{ old('currency_symbol') }}">
                        @error('currency_symbol')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Saving</button>
        </form>
    </div>
@endsection
