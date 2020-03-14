@extends('layouts.app')

@section('title', 'Transaction ' . $transaction->transaction_title)

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="font-weight-bold">Transaction</h3>
            <p>View transaction data</p>
        </div>
        <div>
            <a href="{{ route('transactions.edit', ['transaction' => $transaction->id]) }}" class="btn btn-dark btn-sm">
                <i class="mdi mdi-square-edit-outline"></i>
            </a>
            <a href="{{ route('transactions.destroy', ['transaction' => $transaction->id]) }}" class="btn btn-danger btn-sm btn-delete" data-label="{{ $transaction->saving_title }}">
                <i class="mdi mdi-trash-can-outline"></i>
            </a>
        </div>
    </div>
    <form>
        <div class="form-group row">
            <label for="transaction_title" class="col-sm-2 col-form-label">Transaction Title</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="transaction_title">{{ $transaction->transaction_title }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Transaction Type</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="type">{{ $transaction->category->type }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="category">{{ $transaction->category->category }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="transaction_date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="transaction_date">{{ $transaction->transaction_date->format('d F Y') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="amount">{{ numerical($transaction->amount) }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="description">{{ $transaction->description }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="location">{{ $transaction->location }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="attchment" class="col-sm-2 col-form-label">Attachment</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="attchment">{{ $transaction->attchment }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="created_at" class="col-sm-2 col-form-label">Created At</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="created_at">{{ $transaction->created_at->format('d F Y H:i:s') }}</p>
            </div>
        </div>
    </form>
    @include('layouts.modals._delete')
@endsection
