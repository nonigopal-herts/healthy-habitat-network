@extends('layouts.frontend')
@section('content')
    <!-- Services Section -->
    <section id="services" class="bg-white py-5">
        <div class="container">
            <h2 class="text-center text-success mb-4">{{$catDetails->name}}</h2>
            <div class="row">
                @foreach($serviceSubcategories as $subcat)
                <div class="col-md-6 mb-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-success text-center">{{$subcat->name}}</h5>
                            <p class="card-text text-center">
                                {{$subcat->description}}
                            </p>
                        </div>
                        <p class="text-center">
                            <a href="{{route('products-services', $subcat->id)}}" class="btn btn-outline-success">View Products</a>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
