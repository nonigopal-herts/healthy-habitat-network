<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSubcategoryRequest;
use App\Http\Requests\UpdateProductServiceCategoryRequest;
use App\Http\Requests\UpdateProductSubcategoryRequest;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceSubcategory;
use Illuminate\Http\Request;

class ProductServiceSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = ProductServiceSubcategory::with('category')->latest()->paginate(10);
        return view('admin.product-subcategories.index', compact('subcategories'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductServiceCategory::all();
        //dd($categories);
        return view('admin.product-subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductSubcategoryRequest $request)
    {
        //dd($request->validated());
        ProductServiceSubcategory::create($request->validated());

        return redirect()->route('product-subcategories.index')
            ->with('success', 'Subcategory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productServiceSubcategory = ProductServiceSubcategory::with('category')->findOrFail($id);
        //dd($productServiceSubcategory->category->name);
        return view('admin.product-subcategories.show', compact('productServiceSubcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = ProductServiceCategory::all();
        $productServiceSubcategory = ProductServiceSubcategory::findOrFail($id);
        return view('admin.product-subcategories.edit', compact('productServiceSubcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductSubcategoryRequest $request, $id)
    {
        $productServiceSubcategory = ProductServiceSubcategory::findOrFail($id);
        $productServiceSubcategory->update($request->validated());

        return redirect()->route('product-subcategories.index')
            ->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productServiceSubcategory = ProductServiceSubcategory::findOrFail($id);
        $productServiceSubcategory->delete();

        return redirect()->route('product-subcategories.index')
            ->with('success', 'Subcategory deleted successfully.');
    }
}
