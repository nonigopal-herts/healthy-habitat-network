
@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Areas</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header">
                    <a class="btn btn-outline-primary" href="{{route('areas.create')}}">Add Area</a>
                </div>

                <div class="card-header"><h3 class="card-title">Areas</h3></div>
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
                            @forelse ($areas as $area)
                                <tr class="align-middle">
                                    <td>{{ ++$i }}</td>
                                    <td>{{$area->name}}</td>
                                    <td>
                                        {{$area->description}}
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm mr-5" href="{{ route('areas.show', $area->id) }}"><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-primary btn-sm mr-5" href="{{ route('areas.edit', $area->id) }}"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-archive-fill"></i></button>
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
                    {!! $areas->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
@endsection

