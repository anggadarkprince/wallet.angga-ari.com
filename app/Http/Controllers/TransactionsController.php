<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $transactions = $request->user()->transactions()->orderBy('transaction_date', 'desc')
            ->with(['category', 'userSaving'])->get()
            ->groupBy([function ($transaction) {
                return $transaction->transaction_date->format('Y-m-d');
            }]);
        $transactions = collect($transactions)->map(function ($transactionList, $key) {
            $collection['total_amount_expense'] = collect($transactionList)->reduce(function ($carry, $item) {
                return $carry + ($item->category->type == 'EXPENSE' ? $item->amount : 0);
            });
            $collection['total_amount_income'] = collect($transactionList)->reduce(function ($carry, $item) {
                return $carry + ($item->category->type == 'INCOME' ? $item->amount : 0);
            });
            $collection['transactions'] = $transactionList;
            return $collection;
        });

        /*
            ->groupBy([function ($transaction) {
                return $transaction->transaction_date->format('Y-m-d');
            }, function ($transaction) {
                return (string)$transaction->category->type;
            }])->toArray();
        */

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $categories = $request->user()->categories;
        $savings = $request->user()->userSavings;

        return view('transactions.create', compact('categories', 'savings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $transaction = $request->validate([
            'saving_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'transaction_title' => ['required', 'max:50'],
            'transaction_date' => ['required', 'date'],
            'location' => ['nullable', 'max:200'],
            'attachment' => ['nullable', 'file'],
            'amount' => ['required', 'max:50'],
            'description' => ['nullable', 'max:500'],
        ]);

        try {
            if ($request->has('attachment')) {
                $path = $request->file('attachment')->storePublicly('attachment');
                $transaction['attachment'] = $path;
            }

            $request->user()->transactions()->create($transaction);

            return redirect()->route('transactions.index')->with([
                'status' => 'success',
                'message' => 'Transaction successfully stored'
            ]);
        } catch (QueryException $ex) {
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'message' => $ex->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $transaction = Transaction::with(['userSaving', 'category'])->findOrFail($id);
        $url = asset('storage/' . $transaction['attachment']);
        dd($url);
        return view('transactions.view', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $transaction = Transaction::with(['saving', 'category'])->findOrFail($id);

        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $transactionData = $request->validate([
            'saving' => ['required', 'numeric'],
            'category' => ['required', 'numeric'],
            'transaction_title' => ['required', 'max:50'],
            'transaction_date' => ['required', 'date'],
            'location' => ['nullable', 'max:200'],
            'attachment' => ['nullable', 'file'],
            'amount' => ['required', 'max:50'],
            'description' => ['nullable', 'max:500'],
        ]);

        try {
            $transaction = Transaction::findOrFail($id);
            $transaction->fill($transactionData);
            $transaction->save();

            return redirect()->route('transactions.index')->with([
                'status' => 'success',
                'message' => 'Transaction successfully updated'
            ]);
        } catch (QueryException $ex) {
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'message' => 'Something went wrong'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        if ($transaction->delete()) {
            return redirect()->route('transactions.index')->with([
                'status' => 'success',
                'message' => "Transaction {$transaction->category} successfully updated"
            ]);
        } else {
            return redirect()->route('transactions.index')->with([
                'status' => 'danger',
                'message' => "Delete transaction {$transaction->category} failed"
            ]);
        }
    }
}
