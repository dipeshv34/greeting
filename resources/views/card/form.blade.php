@extends('layouts.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h3>{{isset($card) ? 'Update' : 'Create'}} Card</h3>
        </div>
        <div class="card-body">
            <div class="row p-3">
                <div class="col-lg-6">
                    @if(isset($errors))
                    @foreach($errors as $error)
                        <p>{{$error}}</p>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="row p-3">
                <div class="col-lg-6">
                    <form action="{{isset($card) ? route('cards.update',$card->id) : route('cards.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="col-form-label">Title</label>
                            <input type="text" name="title" class="form-control" value=" {{isset($card) ? $card->title : '' }}">
                        </div>
                        <div>
                            <label class="col-form-label" for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                              @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="col-form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" value=" {{isset($card) ? $card->cover_image : '' }}">
                        </div>
                        <div>
                            <label class="col-form-label">Background Image</label>
                            <input type="file" name="back_image" class="form-control" value=" {{isset($card) ? $card->back_image : '' }}">
                        </div>
                        <div>
                            <label class="col-form-label">Center Image</label>
                            <input type="file" name="center_image" class="form-control" value=" {{isset($card) ? $card->center_image : '' }}">
                        </div>
                        <div>
                            <label class="col-form-label">Bottom Image</label>
                            <input type="file" name="bottom_image" class="form-control" value=" {{isset($card) ? $card->bottom_image : '' }}">
                        </div>
                        <div>
                            <label class="col-form-label">Content</label>
                            <textarea name="content" class="form-control"  rows="3">{{isset($card) ? $card->content : ''}}</textarea>
                        </div>
                        <div>
                            <label class="col-form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{isset($card) && $card->status=='active' ? 'selected' :''}}>Active</option>
                                <option value="inactive" {{isset($card) && $card->status=='inactive' ? 'selected' :''}}>Inactive</option>
                            </select>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{route('cards.index')}}"><button class="btn btn-sm btn-warning" type="button">Cancel</button></a>
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
