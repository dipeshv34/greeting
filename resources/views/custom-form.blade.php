@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Customizations') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('custom.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="logo" class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}</label>
                                <div class="col-md-5">
                                    <input id="logo" type="file" class="form-control" name="logo">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{asset('storage/logo/'.!empty($customization) && isset($customization->logo)? 'storage/logo/'.$customization->logo : '')}}" height="60px" width="60px">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="header-text" class="col-md-4 col-form-label text-md-end">{{ __('Header Text') }}</label>

                                <div class="col-md-6">
                                    <input id="header-text" type="text" class="form-control" name="header_text" value="{{!empty($customization) && isset($customization->header_text)? $customization->header_text : ''}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="footer-text" class="col-md-4 col-form-label text-md-end">{{ __('Footer Text') }}</label>
                                <div class="col-md-6">
                                    <textarea id="footer-text" type="text" rows="3" name="footer_text" class="form-control">{{!empty($customization) && isset($customization->footer_text)? $customization->footer_text : ''}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">{{ __('Header Script') }}</label>
                                <div class="col-md-6">
                                    <textarea type="text" rows="3" name="header_script" class="form-control">{{!empty($customization) && isset($customization->header_script) ? $customization->header_script : ''}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">{{ __('Desktop Sidebar Script') }}</label>
                                <div class="col-md-6">
                                    <textarea type="text" rows="3" name="desktop_sidebar_script" class="form-control">{{!empty($customization) && isset($customization->desktop_sidebar_script)? $customization->desktop_sidebar_script : ''}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">{{ __('Mobile Sidebar Script') }}</label>
                                <div class="col-md-6">
                                    <textarea type="text" rows="3" name="mobile_sidebar_script" class="form-control">{{!empty($customization) && isset($customization->mobile_sidebar_script)? $customization->mobile_sidebar_script : ''}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">{{ __('Before Content Script') }}</label>
                                <div class="col-md-6">
                                    <textarea type="text" rows="3" name="before_content_script" class="form-control">{{!empty($customization) && isset($customization->before_content_script)? $customization->before_content_script : ''}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">{{ __('After Content Script') }}</label>
                                <div class="col-md-6">
                                    <textarea type="text" rows="3" name="after_content_script" class="form-control">{{!empty($customization) && isset($customization->after_content_script)? $customization->after_content_script : ''}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

