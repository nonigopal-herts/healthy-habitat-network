@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Edit Product Subcategory</li>
@endsection

@section('content')
    <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Edit Product Subcategory</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->

                <form action="{{ route('product-subcategories.update', $productServiceSubcategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="product_category_id" class="form-label">Product or Service Category</label>
                            <select name="product_service_category_id" id="product_category_id"
                                    class="form-select @error('product_service_category_id') is-invalid @enderror" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                    @if($productServiceSubcategory->product_service_category_id == $category->id){{'selected'}} @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_service_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-select @error('name') is-invalid @enderror"
                                   value="{{ old('name', $productServiceSubcategory->name ?? '') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $productServiceSubcategory->description ?? '') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Subcategory</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Col-->
    </div>
@endsection
