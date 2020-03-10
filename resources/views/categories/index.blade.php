@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="font-weight-bold">Transaction Category</h3>
            <p>Group of expense or income</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>
    </div>
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('status') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Category</th>
                <th>Description</th>
                <th style="width: 130px"></th>
            </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>
                    <span class="badge badge-{{ $category->type == 'EXPENSE' ? 'danger' : 'success' }}">
                        {{ $category->type }}
                    </span>
                </td>
                <td>{{ $category->category }}</td>
                <td>{{ $category->description ?? 'No description' }}</td>
                <td>
                    <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-eye-outline"></i>
                    </a>
                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-dark btn-sm">
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
                    <a href="{{ route('categories.destroy', ['category' => $category->id]) }}" class="btn btn-danger btn-sm btn-delete" data-label="{{ $category->category }}">
                        <i class="mdi mdi-trash-can-outline"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No category data available</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @include('layouts.modals._delete')
@endsection
