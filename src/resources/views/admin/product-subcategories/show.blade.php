@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">View Product Subcategory</li>
@endsection

@section('content')
    <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header"><div class="card-title">View Product Subcategory</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="" method="post">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Or Service Category</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{$productServiceSubcategory->category->name ?? ucfirst($productServiceSubcategory->category->name)}}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{$productServiceSubcategory->name ?? $productServiceSubcategory->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="5" readonly>
                                {{$productServiceSubcategory->description ?? trim($productServiceSubcategory->description)}}
                            </textarea>
                        </div>
                    </div>
                    <!--end::Body-->
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Horizontal Form-->
    </div>
@endsection
