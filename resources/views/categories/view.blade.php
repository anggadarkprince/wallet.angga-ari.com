@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="font-weight-bold">Transaction Category</h3>
            <p>Group of expense or income</p>
        </div>
        <div>
            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-dark btn-sm">
                <i class="mdi mdi-square-edit-outline"></i>
            </a>
            <a href="{{ route('categories.destroy', ['category' => $category->id]) }}" class="btn btn-danger btn-sm btn-delete" data-label="{{ $category->category }}">
                <i class="mdi mdi-trash-can-outline"></i>
            </a>
        </div>
    </div>
    <form>
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="category">{{ $category->category }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="type">{{ $category->type }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext" id="description">{{ $category->description }}</p>
            </div>
        </div>
    </form>
    @include('layouts.modals._delete')
@endsection
