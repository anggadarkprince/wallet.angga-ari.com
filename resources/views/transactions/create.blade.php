@extends('layouts.app')

@section('title', 'Create new transaction')

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="font-weight-bold">Create Transaction</h3>
                <p>Your financial activity</p>
            </div>
        </div>

        @if(Session::has('message'))
            <p class="alert alert-{{ Session::get('status') }}">{{ Session::get('message') }}</p>
        @endif

        <form action="{{ route('transactions.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('saving_id') is-invalid @enderror">
                        <label for="saving_id">Saving</label>
                        <select class="custom-control custom-select" name="saving_id" id="saving_id">
                            @foreach($savings as $saving)
                                <option value="{{ $saving->id }}">
                                    {{ $saving->saving_title }} - {{ $saving->saving_type }}
                                </option>
                            @endforeach
                        </select>
                        @error('saving_id')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group @error('category_id') is-invalid @enderror">
                        <label for="category_id">Category</label>
                        <select class="custom-control custom-select" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->type }} - {{ $category->category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="transaction_title">Transaction Title</label>
                <input type="text" name="transaction_title" class="form-control @error('transaction_title') is-invalid @enderror" id="transaction_title"
                       placeholder="Transaction title" value="{{ old('transaction_title') }}">
                @error('transaction_title') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="transaction_date">Transaction Date</label>
                        <input type="date" name="transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" id="transaction_date"
                               placeholder="Transaction date" value="{{ old('transaction_date') }}">
                        @error('transaction_date') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount"
                               placeholder="Amount" value="{{ old('amount') }}">
                        @error('amount') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Transaction description">{{ old('description') }}</textarea>
                @error('description') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Transaction location" value="{{ old('location') }}">
                        @error('location') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="attachment">Attachment</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="attachment" name="attachment">
                            <label class="custom-file-label" for="attachment">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Create Transaction</button>
        </form>
    </div>
@endsection
