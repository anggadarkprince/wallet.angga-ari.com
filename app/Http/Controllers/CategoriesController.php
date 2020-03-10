<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $categories = $request->user()->categories()->orderBy('created_at', 'desc')->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category = $request->validate([
            'category' => ['required', 'max:50'],
            'type' => ['required', Rule::in(['INCOME', 'EXPENSE']),],
            'description' => ['required', 'max:500'],
        ]);

        try {
            $request->user()->categories()->create($category);

            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'message' => 'Category successfully stored'
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
        $category = Category::findOrFail($id);

        return view('categories.view', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
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
        $categoryData = $request->validate([
            'category' => ['required', 'max:50'],
            'type' => ['required', Rule::in(['INCOME', 'EXPENSE']),],
            'description' => ['required', 'max:500'],
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->fill($categoryData);
            $category->save();

            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'message' => 'Category successfully updated'
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
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'message' => "Category {$category->category} successfully updated"
            ]);
        } else {
            return redirect()->route('categories.index')->with([
                'status' => 'danger',
                'message' => "Delete category {$category->category} failed"
            ]);
        }
    }
}
