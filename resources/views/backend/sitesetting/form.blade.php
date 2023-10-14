@extends('backend.layouts.master')
@section('title','Site Setting::Edit Page')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Hotel Setting</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form action="{{ route('settingUpdate') }}" method="POST" id="createForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="field item form-group">
                                <label for="" class="col-form-label col-md-3 col-sm-3  label-align">Image<span class="">*</span></label>
                                <div class="file-upload">
                                    <div class="file-upload-content" style="display:block">
                                        @if (isset($setting))
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Change Image</button>
                                            <img class="file-upload-image" src="{{ asset('images/' . (isset($setting) ? $setting->logo_path : '')) }}" />
                                        @else
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Change Image</button>
                                            <img class="file-upload-image" src="#" alt="your image" />
                                        @endif
                                    </div>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide view-name-errror" id="name-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="name">Shop
                                    Name<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name', isset($setting) ? $setting->name : '') }}"
                                        autofocus />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="email">Shop
                                    Email<span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6">
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', isset($setting) ? $setting->email : '') }}"
                                        />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="address">Shop
                                    Address<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6">
                                    <textarea name="address" class="form-control" id="address" cols="30" rows="4"
                                       >{{ old('address', isset($setting) ? $setting->address : '') }}</textarea>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide" id=""></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="phone">
                                   Online Phone<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="online_phone" id="online_phone"
                                        value="{{ old('online_phone', isset($setting) ? $setting->online_phone : '') }}"
                                        type="text" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id=""></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="outline_phone">
                                   Outline Phone<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="outline_phone" id="phone"
                                        value="{{ old('outline_phone', isset($setting) ? $setting->outline_phone : '') }}"
                                         type="text" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id=""></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="size_unit">
                                    Product Size Unit<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="size_unit" id="size_unit"
                                        value="{{ old('size_unit', isset($setting) ? $setting->size_unit : '') }}"
                                         type="text" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id=""></label>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="price_unit">
                                    Price Unit<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="price_unit" id="price_unit"
                                        value="{{ old('price_unit', isset($setting) ? $setting->price_unit : '') }}"
                                        type="text" />
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3 label-error hide"
                                    id=""></label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <input type="hidden" name="id"
                                            value="{{ old('id', isset($setting) ? $setting->id : '') }}">
                                        <button type='submit' class="btn btn-primary"
                                            id="submit-btn">Submit</button>
                                        <button type='reset' class="btn btn-success" id="reset-btn">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{URL::asset('/assets/backend/js/pages/product_img_upload.js?v=20231014')}}"></script>
    <script>
        $(document).ready(function() {
            $('#check_in_time').datetimepicker({
                format: 'hh:mm A'
            });
            $('#check_out_time').datetimepicker({
                format: 'hh:mm A'
            });
        })
    </script>
    {{-- @if (session()->has('error_msg'))
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ session()->get('error_msg') }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @endif --}}
    @error('name')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('email')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('address')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('check_in_time')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('check_out_time')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('phone')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('size_unit')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('occupancy')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('price_unit')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
    @error('file')
        <script>
            new PNotify({
                title: 'Error!',
                text: "{{ $message }}",
                type: 'error',
                styling: 'bootstrap3'
            })
        </script>
    @enderror
@endsection
