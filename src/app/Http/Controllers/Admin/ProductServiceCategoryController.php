<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductServiceCategoryRequest;
use App\Http\Requests\UpdateProductServiceCategoryRequest;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceType;
use Illuminate\Http\Request;

class ProductServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('Product category list');
        $productServiceCategory = ProductServiceCategory::latest()->paginate(10);
        //$categories = Category::all();
        return view('admin.product_category.index', compact('productServiceCategory'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productServiceType = ProductServiceType::all();
        return view('admin.product_category.create', compact('productServiceType'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductServiceCategoryRequest $request)
    {
        //dd($request->validated());
        ProductServiceCategory::create($request->validated());
        return redirect()->route('productservicecategories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productServiceCategory = ProductServiceCategory::findOrFail($id);
        $productServiceType = ProductServiceType::findOrFail($productServiceCategory->product_service_type_id);

        return view('admin.product_category.show', compact('productServiceCategory', 'productServiceType'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productServiceCategory = ProductServiceCategory::findOrFail($id);
        $allProductServiceType = ProductServiceType::all();

        return view('admin.product_category.edit', compact('productServiceCategory', 'allProductServiceType'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductServiceCategoryRequest $request, $id)
    {
        $productServiceCategory = ProductServiceCategory::findOrFail($id);
        $productServiceCategory->update($request->validated());
        return redirect()->route('productservicecategories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productServiceCategory = ProductServiceCategory::findOrFail($id);
        $productServiceCategory->delete();

        return redirect()->route('productservicecategories.index')->with('success', 'Category deleted successfully.');
    }
}
