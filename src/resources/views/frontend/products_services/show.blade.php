@extends('layouts.frontend')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <img
                    src="{{ $productDetails->image ? asset('storage/'.$productDetails->image) : $productDetails->getImageUrl() }}"
                    id="product-image"
                    class="img-fluid zoomable-image"
                    alt="Product Image"
                />
            </div>

            <div class="col-md-6">
                <h4 id="product-title">{{$productDetails->name}}</h4>
                <h5 class="text-success" id="product-price">£ {{$productDetails->price}}</h5>
                <h6 class="mt-3 fw-bold">Health Benefits:</h6>
                <ul id="product-features" class="list-unstyled">
                    {{$productDetails->health_benefits}}
                </ul>
                <div id="product-tags" class="btn btn-outline-success" style="padding:5px 10px;">
                    {{ucfirst($productDetails->priceTag->name)}}
                </div>

                <h6 class="fw-bold mt-4">Vote Now</h6>
                <button class="btn btn-success me-2">
                    👍 <span id="yes-votes">0</span> Yes
                </button>
                <button class="btn btn-danger">
                    👎 <span id="no-votes">0</span> No
                </button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h5 class="fw-bold">Details</h5>
                <p id="product-description">
                    {{$productDetails->description}}
                </p>
                <h5 class="fw-bold">Certificates</h5>
                <ul id="product-certificates" class="list-unstyled">
                    {{$productDetails->certificates}}
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

<style>
    /* Makes buttons more compact */
    .btn-group-sm .btn {
        padding-top: 0.15rem;
        padding-bottom: 0.15rem;
        font-size: 0.75rem;
        line-height: 1.2;
    }

    /* Better icon alignment */
    .btn i.fas {
        vertical-align: middle;
        margin-right: 2px;
    }

    .voting-section {
        position: relative;
    }

    .login-prompt {
        position: absolute;
        z-index: 100;
        width: 100%;
        margin-top: 5px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .voting-buttons {
        width: 100%;
    }

    .voting-buttons .btn {
        flex: 1;
        text-align: center;
    }
</style>

