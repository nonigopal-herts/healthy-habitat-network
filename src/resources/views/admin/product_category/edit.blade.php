@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Edit Product Category</li>
@endsection

@section('content')
    <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Edit Product Category</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->

                <form action="{{route('productservicecategories.update', $productServiceCategory->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="product-service-types" class="form-label">Product or Service Type</label>
                            <select name="product_service_type_id" class="form-select" id="product-service-types">
                                @foreach($allProductServiceType as $type)
                                    <option value="{{$type->id}}" @if($type->id == $productServiceCategory->id){{'selected'}} @endif>{{ucfirst($type->name)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{$productServiceCategory->name ?? $productServiceCategory->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="5">
                                {{$productServiceCategory->description ?? $productServiceCategory->description}}
                            </textarea>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    <!--end::Col-->
    </div>
@endsection
