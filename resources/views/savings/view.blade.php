@extends('layouts.app')

@section('title', 'Savings')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="font-weight-bold">Saving Book</h3>
            <p>Group of financial journal</p>
        </div>
        <div>
            <a href="{{ route('savings.edit', ['saving' => $saving->id]) }}" class="btn btn-dark btn-sm">
                <i class="mdi mdi-square-edit-outline"></i>
            </a>
            <a href="{{ route('savings.destroy', ['saving' => $saving->id]) }}" class="btn btn-danger btn-sm btn-delete" data-label="{{ $saving->saving_title }}">
                <i class="mdi mdi-trash-can-outline"></i>
            </a>
        </div>
    </div>
    <form>
        <div class="form-group row">
            <label for="saving_title" class="col-sm-2 col-form-label">Saving Title</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="saving_title">{{ $saving->saving_title }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="saving_type" class="col-sm-2 col-form-label">Saving Type</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="type">{{ $saving->saving_type }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="account_name" class="col-sm-2 col-form-label">Account Name</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="account_name">{{ $saving->account_name }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="account_number" class="col-sm-2 col-form-label">Account Number</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="account_number">{{ $saving->account_number }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="currency" class="col-sm-2 col-form-label">Currency</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="currency">{{ $saving->currency }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="currency_symbol" class="col-sm-2 col-form-label">Symbol</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="currency_symbol">{{ $saving->currency_symbol }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="created_at" class="col-sm-2 col-form-label">Created At</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="created_at">{{ $saving->created_at->format('d F Y H:i:s') }}</p>
            </div>
        </div>
    </form>
    @include('layouts.modals._delete')
@endsection
