@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header">
                    <a class="btn btn-outline-primary mb-3" href="{{route('product-subcategories.create')}}">Add Product Subcategory</a>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="card-header">
                    <h3 class="card-title">Product or Service Subcategories</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($subcategories as $subcategory)
                            <tr class="align-middle">
                                <td>{{ ++$i }}</td>
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $subcategory->category->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm mr-5" href="{{ route('product-subcategories.show', $subcategory->id) }}"><i class="bi bi-eye"></i></a>
                                    <a class="btn btn-primary btn-sm mr-5" href="{{ route('product-subcategories.edit', $subcategory->id) }}"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('product-subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline-block;">
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
                    {!! $subcategories->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
