<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BusinessProduct;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceSubcategory;
use App\Models\ProductServiceVote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $productCategories = ProductServiceCategory::all();
        return view('frontend.index', compact('productCategories'));
    }

    public function serviceSubcategories($id){
        $catDetails = ProductServiceCategory::where('id', $id)->first();
        $serviceSubcategories = ProductServiceSubcategory::where('product_service_category_id', $id)->get();
        return view('frontend.product_service_category.index', compact('serviceSubcategories', 'catDetails'));
    }

    public function productSubcategories($id){
        $catDetails = ProductServiceCategory::where('id', $id)->first();
        $serviceSubcategories = ProductServiceSubcategory::where('product_service_category_id', $id)->get();
        return view('frontend.product_service_category.index', compact('serviceSubcategories', 'catDetails'));
    }

    public function services($id){
        $catDetails = ProductServiceSubcategory::where('id', $id)->first();
        $services = ProductService::where('id', $id)->get();
        //dd($services, $catDetails);
        return view('frontend.products_services.index', compact('services', 'catDetails'));
    }

//    public function productServices($id){
//        //dd('hello');
//        // Build product query
//        $categories = ProductServiceCategory::all();
//        $products = ProductService::where('product_service_subcategory_id', $id)->with(['category', 'subcategory'])->paginate(10);
//
//        return view('frontend.products_services.index', compact('products', 'categories'));
//    }

    public function productsServicesDetails($id){
        $productDetails = ProductService::where('id', $id)->with('priceTag')->first();
        $businessDetails = BusinessProduct::where('product_service_id', $productDetails->id)->first();

        $voteCounts = [
            'yes' => ProductServiceVote::where('product_service_id', $productDetails->id)
                ->sum('yes_vote'),
            'no' => ProductServiceVote::where('product_service_id', $productDetails->id)
                ->sum('no_vote')
        ];

        //dd($voteCounts);
        //dd($productDetails);
        return view('frontend.products_services.show', compact('productDetails', 'businessDetails', 'voteCounts'));
    }


    public function productServices(Request $request, $id = null)
    {
        $query = ProductService::query();

        // Search filter
        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        // ✅ Category filter (This is where you need to add it)
        if ($request->filled('category')) {
            $query->whereHas('subcategory', function ($subQuery) use ($request) {
                $subQuery->where('product_service_category_id', $request->category);
            });
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Pagination
        $products = $query->paginate(10)->appends($request->query());

        // Load categories
        $categories = ProductServiceCategory::all();

        return view('frontend.products_services.index', compact('products', 'categories'));
    }



}
