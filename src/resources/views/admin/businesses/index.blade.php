
@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Businesses</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header">
                    <a class="btn btn-outline-primary mb-3" href="{{route('businesses.create')}}">Add New Businesses</a>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="card-header"><h3 class="card-title">Businesses</h3></div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th><strong>#</strong></th>
                            <th><strong>Name</strong></th>
                            <th><strong>Email</strong></th>
                            <th><strong>Address</strong></th>
                            <th><strong>Contact Info</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($businesses as $business)
                            <tr class="align-middle">
                                <td>{{ ++$i }}</td>
                                <td>
                                    @if($business->image)
                                        <img src="{{ asset('storage/'.$business->image) }}" width="50" class="mr-2">
                                    @endif
                                    {{ $business->name }}
                                </td>
                                <td>{{ $business->email }}</td>
                                <td>{{ $business->address }}</td>
                                <td>{{ $business->contact_info }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm mr-5" href="{{ route('businesses.show', $business->id) }}"><i class="bi bi-eye"></i></a>
                                    <a class="btn btn-primary btn-sm mr-5" href="{{ route('businesses.edit', $business->id) }}"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('businesses.destroy', $business->id) }}" method="POST" style="display: inline-block;">
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
                    {!! $businesses->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
@endsection

