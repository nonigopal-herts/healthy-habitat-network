@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Edit Business</li>
@endsection

@section('content')
    <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Edit Business</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('businesses.update', $business->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image"
                                   class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @isset($business->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$business->image) }}" width="100">
                                </div>
                            @endisset
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $business->name ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="3"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $business->description ?? '') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $business->email ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="contact_info" class="form-label">Contact Info</label>
                            <input name="contact_info" class="form-control @error('contact_info') is-invalid @enderror" id="contact_info" value="{{ old('price', $business->contact_info ?? '') }}" readonly>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address', $business->address ?? '') }}">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Business</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Quick Example-->
        </div>
        <!--end::Col-->
    </div>
@endsection
