@extends('layouts.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Categories</h3>
                <a href="{{route('category.create')}}"><button class="btn btn-md btn-primary">Create</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-bordered table-responsive-md">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $k=>$category )
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->status}}</td>
                                <td><a href="{{route('category.edit',$category->id)}}"><button class="btn btn-sm btn-primary">Edit</button></a></td>
                                <td><a href="{{route('category.delete',$category->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
