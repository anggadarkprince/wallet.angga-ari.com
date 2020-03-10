@extends('layouts.app')

@section('title', 'Create new categories')

@section('content')
    <div class="col-md-6 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="font-weight-bold">Create Category</h3>
                <p>Group of expense or income</p>
            </div>
        </div>

        @if(Session::has('message'))
            <p class="alert alert-{{ Session::get('status') }}">{{ Session::get('message') }}</p>
        @endif

        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" id="category" placeholder="Category title" value="{{ old('category') }}">
                @error('category')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="type_income">Type</label>
                <div class="@error('type') is-invalid @enderror">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type_income" name="type" class="custom-control-input" value="INCOME"{{ old('type', 'INCOME') == 'INCOME' ? ' checked' : '' }}>
                        <label class="custom-control-label" for="type_income">Income</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type_expense" name="type" class="custom-control-input" value="EXPENSE"{{ old('type') == 'EXPENSE' ? ' checked' : '' }}>
                        <label class="custom-control-label" for="type_expense">Expense</label>
                    </div>
                </div>
                @error('type')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Category description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection
