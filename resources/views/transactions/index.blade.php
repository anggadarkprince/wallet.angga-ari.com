@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="font-weight-bold">Transactions</h3>
            <p>List of transaction activity</p>
        </div>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">Create</a>
    </div>
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('status') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('message') }}
        </div>
    @endif
    @forelse($transactions as $date => $transactionList)
        <div class="card border-0 mb-3 shadow">
            <div class="card-header border-bottom-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h2 class="mr-3 mb-0">{{ Carbon\Carbon::parse($date)->format('d') }}</h2>
                        <div class="d-flex flex-column align-items-start">
                            {{ Carbon\Carbon::parse($date)->format('F Y') }}
                            <span class="badge badge-primary">
                                {{ \Carbon\Carbon::parse($date)->format('l') }}
                            </span>
                        </div>
                    </div>
                    <div class="text-right d-flex">
                        <div>
                            <h5 class="mb-0 font-weight-bold text-success">{{ numerical($transactionList['total_amount_income']) }}</h5>
                            <small class="text-muted">INCOME</small>
                        </div>
                        <div class="ml-4">
                            <h5 class="mb-0 font-weight-bold text-danger">{{ numerical($transactionList['total_amount_expense']) }}</h5>
                            <small class="text-muted">EXPENSE</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @foreach($transactionList['transactions'] as $transaction)
                        <a class="list-group-item list-group-item-action px-0 d-flex justify-content-between btn-link px-4"
                           href="{{ route('transactions.show', ['transaction' => $transaction->id]) }}">
                            <div>
                                <p class="mb-0">{{ $transaction->transaction_title }}</p>
                                <small class="text-muted">{{ $transaction->category->category }} - {{ $transaction->location }}</small>
                            </div>
                            <div class="text-right">
                                <p class="lead mb-0 text-{{ $transaction->category->type == 'INCOME' ? 'success' : 'danger' }}">
                                    {{ $transaction->getFormattedAmount() }}
                                </p>
                                <small class="text-muted">
                                    {{ $transaction->transaction_date->format('d F, Y') }}
                                </small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @empty
        <tr>
            <td colspan="3">No category data available</td>
        </tr>
    @endforelse

    @include('layouts.modals._delete')
@endsection
