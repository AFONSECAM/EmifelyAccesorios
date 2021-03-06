<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(StoreRequest $request, Category $category)
    {
        $category->my_store($request);
        return back();
        // return redirect()->route('categories.index');
    }
    public function show(Category $category)
    {
        $subcategories = $category->subcategories;
        return view('admin.category.show', compact('category', 'subcategories'));
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(UpdateRequest $request, Category $category)
    {
        $category->my_update($request);
        return redirect()->route('categories.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
        // return redirect()->route('categories.index');
    }
}
