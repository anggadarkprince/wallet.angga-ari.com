@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="font-weight-bold">Saving Book</h3>
            <p>Group of financial journal</p>
        </div>
        <a href="{{ route('savings.create') }}" class="btn btn-primary">Create</a>
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
                <th>Saving</th>
                <th>Type</th>
                <th>Currency</th>
                <th>Owner</th>
                <th style="width: 130px"></th>
            </tr>
        </thead>
        <tbody>
        @forelse($savings as $saving)
            <tr>
                <td>{{ $saving->saving_title }}</td>
                <td>{{ $saving->saving_type }}</td>
                <td>{{ $saving->currency }} - {{ $saving->currency_symbol }}</td>
                <td>{{ $saving->account_name }} - {{ $saving->account_number }}</td>
                <td>
                    <a href="{{ route('savings.show', ['saving' => $saving->id]) }}" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-eye-outline"></i>
                    </a>
                    <a href="{{ route('savings.edit', ['saving' => $saving->id]) }}" class="btn btn-dark btn-sm">
                        <i class="mdi mdi-square-edit-outline"></i>
                    </a>
                    <a href="{{ route('savings.destroy', ['saving' => $saving->id]) }}" class="btn btn-danger btn-sm btn-delete" data-label="{{ $saving->saving_title }}">
                        <i class="mdi mdi-trash-can-outline"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No saving data available</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @include('layouts.modals._delete')
@endsection
