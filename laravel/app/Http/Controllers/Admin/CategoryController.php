<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Create;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();
        return view('admin.categories.index', [
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
//
       $category = new Category($request->validated());
       if ($category->save()){
           return redirect('admin/categories')->with('success', 'Save was successful');
       }
       return back()->with('error', 'Failed to save');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return \view('admin.categories.edit', [
            'categories' => $category
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->title=$request->input('title');
        $category->description=$request->input('description');
        $category->save();
        return redirect('admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        try{
            $category->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
