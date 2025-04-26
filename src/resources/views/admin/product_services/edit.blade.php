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
                    <div class="card-title">Edit Product or Service</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('product-services.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="hidden" name="business_id" value="@if(Auth::check() && Auth::user()->role_id == 3){{Auth::user()->id}}@endif">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image"
                                   class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @isset($product->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$product->image) }}" width="100">
                                </div>
                            @endisset
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $product->name ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="product_service_subcategory" class="form-label">Product or Service Subcategory</label>
                            <select name="product_service_subcategory_id" class="form-select @error('product_service_subcategory_id') is-invalid @enderror" id="product_service_subcategory-{{$product->product_service_subcategory_id}}">
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" @if($subcategory->id == $product->product_service_subcategory_id ){{'selected'}}@endif>{{$subcategory->name}}</option>
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
                                        {{ old('price_tag_id', $product->price_tag_id ?? '') == $priceTag->id ? 'selected' : '' }}>
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
                            <input name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price', $product->price ?? '') }}">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" value="{{ old('quantity', $product->quantity ?? '') }}">
                            @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="size" class="form-label">Size</label>
                            <input name="size" class="form-control @error('size') is-invalid @enderror" id="size" value="{{ old('size', $product->size ?? '') }}">
                            @error('size')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="health_benefits">Health Benefits *</label>
                            <textarea name="health_benefits" id="health_benefits" rows="3"
                                      class="form-control @error('health_benefits') is-invalid @enderror" required>{{ old('health_benefits', $product->health_benefits ?? '') }}</textarea>
                            @error('health_benefits')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="3"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? '') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Quick Example-->
        </div>
        <!--end::Col-->
    </div>
    </div>
@endsection
