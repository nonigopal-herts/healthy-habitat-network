@extends('layouts.frontend')

@section('content')
    <div class="container my-5">
        <div class="row">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    {{ session('error') }}
                </div>
            @endif

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
                @if(Session::has('resident_role_id') && Session::get('resident_role_id')  == 4)
                    <!-- Voting form for logged-in residents -->
                    {{--{{ route('products.vote', $product) }}--}}
                    <form action="{{ route('products.vote', $productDetails->id) }}" method="POST">
                        @csrf
                        <div class="btn-group" role="group">
                            <input type="hidden" name="product_service_id" value="{{$productDetails->id}}">
                            <input type="hidden" name="business_id" value="{{$businessDetails->id}}">
                            <input type="hidden" name="user_id" value="{{Session::get('resident_id')}}">

                            <button type="submit" name="vote_type" value="yes" class="btn btn-sm btn-success">
                            {{ $voteCounts['yes'] }}
                                <i class="fas fa-thumbs-up"></i>
                            </button>
                            <button type="submit" name="vote_type" value="no" class="btn btn-sm btn-danger">
                                {{ $voteCounts['no'] }}
                                <i class="fas fa-thumbs-down"></i>
                            </button>
                        </div>
                    </form>
                @else
                    <!-- Display for non-residents -->
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-success" onclick="showLoginAlert()">
                            <i class="fas fa-thumbs-up"></i> 10
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="showLoginAlert()">
                            <i class="fas fa-thumbs-down"></i> 5
                        </button>
                    </div>
                    <div class="alert alert-warning mt-2" id="loginAlert" style="display: none;">
                        Please login as a resident to vote.
                        <a href="{{ route('resident.login') }}" class="btn btn-sm btn-primary ms-2">Login</a>
                    </div>
                @endif
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
    <script>
        function showLoginAlert() {
            document.getElementById('loginAlert').style.display = 'block';
        }
    </script>
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

