@extends('layouts.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Cards</h3>
                <a href="{{route('cards.create')}}"><button class="btn btn-md btn-primary">Create</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10">
                    <table class="table table-bordered table-responsive-md">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Cover Image</th>
                            <th>Background</th>
                            <th>Center Image</th>
                            <th>Bottom Image</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($cards))
                        @foreach($cards as $k=>$card )
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$card->title}}</td>
                                <td>{{$card->category->title}}</td>
                                <td><img src="{{asset('storage/coverImages/'.$card->cover_image)}}" alt="" height="75px" width="75px"></td>
                                <td><img src="{{asset('storage/centerImages/'.$card->center_image)}}" alt="" height="75px" width="75px"></td>
                                <td><img src="{{asset('storage/backgroundsImages/'.$card->back_image)}}" alt="" height="75px" width="75px"></td>
                                <td><img src="{{asset('storage/bottomImages/'.$card->bottom_image)}}" alt="" height="75px" width="75px"></td>
                                <td>{{$card->content}}</td>
                                <td>{{$card->status}}</td>
                                <td><a href="{{route('cards.edit',$card->id)}}"><button class="btn btn-sm btn-primary">Edit</button></a></td>
                                <td><a href="{{route('cards.delete',$card->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a></td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
