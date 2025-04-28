<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use Illuminate\Http\Request;

class ProductsServicesController extends Controller
{
    public function index(Request $request)
    {
        // Get categories for filter dropdown
        $categories = ProductServiceCategory::all();

        // Build product query
        $products = ProductService::with(['category', 'subcategory'])
            ->when($request->search, function($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($request->category, function($query, $category) {
                return $query->where('product_service_category_id', $category);
            })
            ->when($request->rating, function($query, $rating) {
                return $query->where('average_rating', '>=', $rating);
            })
            ->when($request->price_tag, function($query, $priceTag) {
                return $this->applyPriceTagFilter($query, $priceTag);
            })
            ->when($request->filled(['min_price', 'max_price']), function($query) use ($request) {
                return $query->whereBetween('price', [$request->min_price, $request->max_price]);
            })
            ->paginate(10);

        return view('frontend.products_services.index', compact('products', 'categories'));
    }

    protected function applyPriceTagFilter($query, $priceTag)
    {
        return match($priceTag) {
            'affordable' => $query->where('price', '<', 50),
            'moderate' => $query->whereBetween('price', [50, 150]),
            'premium' => $query->where('price', '>', 150),
            default => $query
        };
    }
}
