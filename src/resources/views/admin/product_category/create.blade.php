    @extends('layouts.app')

    @section('title', 'Dashboard')

    @section('breadcrumbs')
        <li class="breadcrumb-item active">Product Category</li>
    @endsection

    @section('content')
    <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-12">
        <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Product Category</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('productservicecategories.store')}}" method="post">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="product-service-types" class="form-label">Product or Service Type</label>
                            <select name="product_service_type_id" class="form-select" id="product-service-types">
                                @foreach($productServiceType as $type)
                                <option value="{{$type->id}}">{{ucfirst($type->name)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="5"></textarea>
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
