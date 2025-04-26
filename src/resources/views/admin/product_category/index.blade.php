
@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Product Category</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header">
                    <a class="btn btn-outline-primary mb-3" href="{{route('productservicecategories.create')}}">Add Product Category</a>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="card-header"><h3 class="card-title">Bordered Table</h3></div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><strong>#</strong></th>
                                <th><strong>Name</strong></th>
                                <th><strong>Description</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productServiceCategory as $category)
                                <tr class="align-middle">
                                    <td>{{ ++$i }}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        {{$category->description}}
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm mr-5" href="{{ route('productservicecategories.show', $category->id) }}"><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-primary btn-sm mr-5" href="{{ route('productservicecategories.edit', $category->id) }}"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('productservicecategories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
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
                    {!! $productServiceCategory->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
@endsection

