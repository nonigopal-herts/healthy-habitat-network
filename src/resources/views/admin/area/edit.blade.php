@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Areas</li>
@endsection

@section('content')
    <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header"><div class="card-title">Edit Area</div></div>
                <!--end::Header-->
                    <!--begin::Form-->
                    <form action="{{route('areas.update', $area->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="name" value="{{isset($area->name) ? $area->name : ''}}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="text" class="form-control" id="email" value="{{$area->email ?? $area->email}}" readonly>
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Area</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Horizontal Form-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Col-->
    </div>
@endsection
