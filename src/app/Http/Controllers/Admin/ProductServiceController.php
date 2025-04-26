<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessProduct;
use App\Models\PriceTag;
use App\Models\ProductService;
use App\Http\Requests\StoreProductServiceRequest;
use App\Http\Requests\UpdateProductServiceRequest;
use App\Models\ProductServiceSubcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductServiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        //dd($user);
        $products = BusinessProduct::where('business_id', $user->id)->with('productService')->paginate(10);//
        //dd($businessProducts);
        return view('admin.product_services.index', compact('products'))->with('i');
    }

    public function create()
    {
        $subcategories = ProductServiceSubcategory::all();
        $priceTags = PriceTag::all();
        return view('admin.product_services.create', compact('subcategories', 'priceTags'));
    }

    //StoreProductServiceRequest
//

    public function store(StoreProductServiceRequest $request)
    {
        // Start database transaction for atomic operations
        DB::beginTransaction();

        try {
            $data = $request->validated();


            // Validate business_id exists first
            $business = User::where('id', $request->input('business_id'))->first();
            //dd($business);
            if (!$business) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Selected business does not exist');
            }

            // Handle image upload if present
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('product_services', 'public');
            }
            //dd($request->input('business_id'));


            // Create the product service
            $product = ProductService::create($data);
            //dd($product->id, $business->id);


            // Create the business product relationship
            $businessProduct = BusinessProduct::create([
                'business_id' => $business->id, // Use the validated business ID
                'product_service_id' => $product->id,
                // Add any default values you need
                //'is_active' => true,
            ]);
            //dd($businessProduct);

            // Commit the transaction if everything succeeds
            DB::commit();

            return redirect()->route('product-services.index')
                ->with('success', 'Product/Service created successfully');

        } catch (\Exception $e) {
            // Rollback on any error
            //DB::rollBack();

            // Handle specific constraint violation
//            if ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] == 1452) {
//                return redirect()->back()
//                    ->withInput()
//                    ->with('error', 'Invalid business reference. Please select a valid business.');
//            }

            // Generic error handling
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the product: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $subcategories = ProductServiceSubcategory::all();
        $priceTags = PriceTag::all();
        $productService  = ProductService::with(['subcategory', 'priceTag'])->findOrFail($id);
        //dd('productService', $productService);
        return view('admin.product_services.show', compact('productService', 'subcategories', 'priceTags'));
    }

    public function edit($id)
    {
        $productService  = ProductService::with(['subcategory', 'priceTag'])->findOrFail($id);

        return view('admin.product_services.edit', [
            'product' => $productService,
            'subcategories' => ProductServiceSubcategory::all(),
            'priceTags' => PriceTag::all()
        ]);
    }

    public function update(UpdateProductServiceRequest $request, ProductService $productService)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($productService->image) {
                Storage::disk('public')->delete($productService->image);
            }
            $data['image'] = $request->file('image')->store('product_services', 'public');
        }

        $productService->update($data);

        return redirect()->route('product-services.index')
            ->with('success', 'Product/Service updated successfully');
    }

    public function destroy(ProductService $productService)
    {
        if ($productService->image) {
            Storage::disk('public')->delete($productService->image);
        }

        $productService->delete();

        return redirect()->route('product-services.index')
            ->with('success', 'Product/Service deleted successfully');
    }
}
