@extends('backend.layouts.master')
@section('title','Admin::Product Create Page')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Product Create Form</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{-- @if (isset($room)) --}}
                            {{-- <form class="" action="{{route('roomUpdate')}}" method="post" id="create-form" enctype="multipart/form-data">
                        @else --}}
                        <form class="" action="" method="post" id="create-form" enctype="multipart/form-data">
                        {{-- @endif --}}
                            @csrf
                            <span class="section">Product Info</span>
                            <div class="field item form-group">
                                <label for="" class="col-form-label col-md-3 col-sm-3  label-align">Image<span class="">*</span></label>
                                <div class="file-upload">
                                    <div class="image-upload-wrap">
                                        <input name="file" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Change Image</button>
                                        <img class="file-upload-image" src="#" alt="" />
                                    </div>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide view-name-errror" id="view-name-error"><span class="name-error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-name" class="col-form-label col-md-3 col-sm-3 label-align">Product Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="product-name" class="form-control" name="name" value=""/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="room-name-error"><span class="name-error"></span></label>

                            </div>
                            <div class="field item form-group">
                                <label for="product-price" class="col-form-label col-md-3 col-sm-3 label-align">Product Price<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="product-price" class="form-control" name="price" value=""/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="occupation-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-stock" class="col-form-label col-md-3 col-sm-3 label-align">Product stock<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="product-stock" class="form-control" name="stock" value=""/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="size-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-made" class="col-form-label col-md-3 col-sm-3  label-align">Product Made in<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="product-made" class="form-control" name="made" value=""/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="bed-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-description" class="col-form-label col-md-3 col-sm-3  label-align">Product Description<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="product-description" class="form-control" name="description" value = ""/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="name-error"><span class="error"></span></label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        {{-- @if (isset($room->id))
                                            <input type="hidden" value="{{$room->id}}" name="id">
                                        @endif --}}
                                        <input type='submit' class="btn btn-primary" id="submit-btn" value="Submit" />
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
<script src="{{URL::asset('/assets/backend/js/pages/product_img_upload.js?v=20230926')}}"></script>
@endsection
