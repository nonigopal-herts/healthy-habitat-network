<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::latest()->paginate(10);
        return view('admin.businesses.index', compact('businesses'))->with('i');
    }

    public function create()
    {
        return view('admin.businesses.create');
    }

    public function store(StoreBusinessRequest $request)
    {
        //dd($request->all());
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('businesses', 'public');
        }

        Business::create($data);

        return redirect()->route('businesses.index')
            ->with('success', 'Business created successfully.');
    }

    public function show(Business $business)
    {
        return view('admin.businesses.show', compact('business'));
    }

    public function edit(Business $business)
    {
        return view('admin.businesses.edit', compact('business'));
    }

    public function update(UpdateBusinessRequest $request, Business $business)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($business->image) {
                Storage::disk('public')->delete($business->image);
            }
            $data['image'] = $request->file('image')->store('businesses', 'public');
        }

        $business->update($data);

        return redirect()->route('businesses.index')
            ->with('success', 'Business updated successfully.');
    }

    public function destroy(Business $business)
    {
        if ($business->image) {
            Storage::disk('public')->delete($business->image);
        }

        $business->delete();

        return redirect()->route('businesses.index')
            ->with('success', 'Business deleted successfully.');
    }
}
