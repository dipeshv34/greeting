@extends('layouts.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h3>{{isset($category) ? 'Update' : 'Create'}} Category</h3>
        </div>
        <div class="card-body">
            <div class="row p-3">
                <div class="col-lg-6">
                    <form action="{{isset($category) ? route('category.update',$category->id) : route('category.store')}}" method="post">
                        @csrf
<div>
    <label class="col-form-label">Title</label>
    <input type="text" name="title" class="form-control" value=" {{isset($category) ? $category->title : '' }}">
</div>
                        <div>
                            <label class="col-form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{isset($category) && $category->status=='active' ? 'selected' :''}}>Active</option>
                                <option value="inactive" {{isset($category) && $category->status=='inactive' ? 'selected' :''}}>Inactive</option>
                            </select>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{route('category.index')}}"><button class="btn btn-sm btn-warning" type="button">Cancel</button></a>
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
