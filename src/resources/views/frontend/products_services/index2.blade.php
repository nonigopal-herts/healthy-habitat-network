@extends('layouts.frontend')
@section('content')
    <!-- Services Section -->
    <section id="services" class="bg-white py-5">
        <div class="container">
            <h2 class="text-center text-success mb-4">{{$catDetails->name}}</h2>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-success text-center">{{$service->name}}</h5>
                                <p class="card-text text-center">
                                    {{$service->description}}
                                </p>
                            </div>
                            <p class="text-center">
                                <a href="{{route('services', $service->id)}}" class="btn btn-outline-success">View Products</a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
