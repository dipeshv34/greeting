@extends('layouts.app')
@section('links')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
@section('styles')
    <style>
        .rightto{
            float: right!important;
        }
    </style>
@endsection
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h3>{{isset($card) ? 'Update' : 'Create'}} Card</h3>
        </div>
        <div class="card-body">
            <div class="row">
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
                       <div style="display: flex" class="mt-4">
                           <label class="">Wishing Title &nbsp;&nbsp;</label>
                           <div class="form-check">
                               <input class="form-check-input" type="radio" value="wish_you" id="wish_title" name="wishing_title">
                               <label class="form-check-label" for="wish_title">
                                   Wish You
                               </label>
                           </div>
                           <div class="form-check" style="margin-left: 10px">
                               <input class="form-check-input" type="radio" value="wishing_you" id="wishing_you" name="wishing_title">
                               <label class="form-check-label" for="wishing_you">
                                   Wishing You
                               </label>
                           </div>
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
                            <label  class="col-form-label">{{ __('Bottom Contents') }}</label>
                                <textarea type="text" rows="3" name="bottom_contents" class="form-control summernote">{{!empty($card) && isset($card->bottom_contents) ? $card->bottom_contents : ''}}</textarea>
                        </div>

                        <div>
                            <label class="col-form-label">Content</label>
                            <textarea name="content" class="form-control"  rows="3">{{isset($card) ? $card->content : ''}}</textarea>
                        </div>
                        <div>
                            <label class="col-form-label">Content color</label>
                            <input type="color" name="content_color" class="form-control w-50" value=" {{isset($card) ? $card->content_color : '' }}">
                        </div>
                        <div>
                            <label class="col-form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{isset($card) && $card->status=='active' ? 'selected' :''}}>Active</option>
                                <option value="inactive" {{isset($card) && $card->status=='inactive' ? 'selected' :''}}>Inactive</option>
                            </select>
                        </div>

                        <div class="">
                            <label  class="col-form-label">{{ __('SEO Content') }}</label>
                                <textarea type="text" rows="5" name="seo_content" class="form-control">{{!empty($card) && isset($card->seo_content)? $card->seo_content : ''}}</textarea>
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

@section('scripting')
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
            $('.note-editor .note-btn.btn.dropdown-toggle').on('click', function() {
                $(this).toggleClass('show');
                $(this).next().toggleClass('show');
            });

            $('.note-editor .dropdown-item, .note-editor .note-color-btn, .note-editor .note-btn-group.note-align .note-btn.btn')
                .on('click', function() {
                    $('.note-editor .show').removeClass('show');
                });
        });


    </script>
@endsection
