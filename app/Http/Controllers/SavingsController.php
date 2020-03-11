<?php

namespace App\Http\Controllers;

use App\Category;
use App\Saving;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $savings = $request->user()->userSavings;

        return view('savings.index', compact('savings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('savings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $savingData = $request->validate([
            'saving_title' => ['required', 'max:50'],
            'saving_type' => ['required', 'max:50', 'in:CASH,BANK,OTHER'],
            'account_name' => ['nullable', 'present', 'max:50'],
            'account_number' => ['nullable', 'present', 'max:50'],
            'currency' => ['required', 'max:50'],
            'currency_symbol' => ['required', 'max:3'],
        ]);

        try {
            $request->user()->userSavings()->create($savingData);

            return redirect()->route('savings.index')->with([
                'status' => 'success',
                'message' => 'Saving book successfully stored'
            ]);
        } catch (QueryException $ex) {
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'message' => 'Something went wrong'
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
        $saving = Saving::findOrFail($id);

        return view('savings.view', compact('saving'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $saving = Saving::findOrFail($id);

        return view('savings.edit', compact('saving'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Saving $saving
     * @return Response
     */
    public function update(Request $request, Saving $saving)
    {
        $savingData = $request->validate([
            'saving_title' => ['required', 'max:50'],
            'saving_type' => ['required', 'max:50'],
            'account_name' => ['nullable', 'present', 'max:50'],
            'account_number' => ['nullable', 'present', 'max:50'],
            'currency' => ['required', 'max:50'],
            'currency_symbol' => ['required', 'max:3'],
        ]);

        try {
            $saving->fill($savingData);
            $saving->save();

            return redirect()->route('savings.index')->with([
                'status' => 'success',
                'message' => 'Saving book successfully updated'
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
     * @param Saving $saving
     * @return Response
     */
    public function destroy(Saving $saving)
    {
        try {
            if ($saving->delete()) {
                return redirect()->route('savings.index')->with([
                    'status' => 'success',
                    'message' => "Category {$saving->saving_title} successfully updated"
                ]);
            }
            throw new Exception("Delete saving {$saving->saving_title} failed");
        } catch (Exception $e) {
            return redirect()->route('savings.index')->with([
                'status' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }
}
