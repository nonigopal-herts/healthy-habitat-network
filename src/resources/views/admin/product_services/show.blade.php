@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Product or Services</li>
@endsection

@section('content')
    <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Product or Service Details</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->

                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="image">Thumbnail</label>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @isset($productService->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$productService->image) }}" width="100">
                            </div>
                        @endisset
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $productService->name ?? '') }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="product_service_subcategory" class="form-label">Product or Service Subcategory</label>
                        <select name="product_service_subcategory_id" class="form-select @error('product_service_subcategory_id') is-invalid @enderror" id="product_service_subcategory">
                            @foreach($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}" @if($subcategory->id == $productService->product_service_subcategory_id ){{'selected'}}@endif>{{$subcategory->name}}</option>
                            @endforeach

                        </select>
                        @error('product_service_subcategory_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price-tag" class="form-label">Price Tags</label>
                        <select name="price_tag_id" class="form-select @error('price_tag_id') is-invalid @enderror" id="price-tag">
                            @foreach($priceTags as $priceTag)
                                <option value="{{ $priceTag->id }}"
                                    {{ old('price_tag_id', $productService->price_tag_id ?? '') == $priceTag->id ? 'selected' : '' }}>
                                    {{ $priceTag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('price_tag_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price', $productService->price ?? '') }}" readonly>
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" value="{{ old('quantity', $productService->quantity ?? '') }}" readonly>
                        @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input name="size" class="form-control @error('size') is-invalid @enderror" id="size" value="{{ old('size', $productService->size ?? '') }}" readonly>
                        @error('size')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="health_benefits">Health Benefits *</label>
                        <textarea name="health_benefits" id="health_benefits" rows="3"
                                  class="form-control @error('health_benefits') is-invalid @enderror" required readonly>{{ old('health_benefits', $productService->health_benefits ?? '') }}</textarea>
                        @error('health_benefits')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror" readonly>{{ old('description', $productService->description ?? '') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--end::Body-->

        </div>
        <!--end::Col-->
    </div>
    </div>
@endsection
