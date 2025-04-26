
@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Product or Services</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header">
                    <a class="btn btn-outline-primary mb-3" href="{{route('product-services.create')}}">Add Product/Services</a>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="card-header"><h3 class="card-title">Product or Services</h3></div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th><strong>#</strong></th>
                            <th><strong>Name</strong></th>
                            <th><strong>Subcategory</strong></th>
                            <th><strong>Price</strong></th>
                            <th><strong>Quantity</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($products as $product)
                            <tr class="align-middle">
                                <td>{{ ++$i }}</td>
                                <td>
                                    @if($product->productService->image)
                                        <img src="{{ asset('storage/'.$product->productService->image) }}" width="50" class="mr-2">
                                    @endif
                                    {{ $product->name }}
                                </td>
                                <td>{{ $product->productService->subcategory->name }}</td>
                                <td>{{ number_format($product->productService->price, 2) }}</td>
                                <td>{{ $product->productService->quantity ?? 'N/A' }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm mr-5" href="{{ route('product-services.show', $product->productService->id) }}"><i class="bi bi-eye"></i></a>
                                    <a class="btn btn-primary btn-sm mr-5" href="{{ route('product-services.edit', $product->productService->id) }}"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('product-services.destroy', $product->productService->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-archive-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">There are no data.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {!! $products->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
@endsection

