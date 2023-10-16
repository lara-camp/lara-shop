@extends('backend.layouts.master')
@section('title', (isset($product) ? 'Lara Shop :: Product  Edit Page' : 'Lara Shop :: Product  Create Page') )
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                @if (isset($product))
                <h3>Product Update Form</h3>
                @else
                <h3>Product Create Form</h3>
                @endif
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
                            @if (isset($product))
                                <form class="" action="{{route('productUpdate')}}" method="post" id="create-form" enctype="multipart/form-data">
                            @else
                                <form class="" action="{{route('productCreate')}}" method="post" id="create-form" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <span class="section">Product Info</span>
                            <div class="field item form-group">
                                <label for="" class="col-form-label col-md-3 col-sm-3  label-align">Image<span class="">*</span></label>
                                <div class="file-upload">
                                    <div class="image-upload-wrap" style="display: {{isset($product) ? 'none' : 'block'}}">
                                        <input name="file" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content" style="display: {{isset($product) ? 'block' : 'none'}}">
                                        @if (isset($product))
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Change Image</button>
                                            <img class="file-upload-image" src="{{URL::asset('assets/upload/'.$product->id.'/thumb/'.$product->thumbnail)}}" />
                                        @else
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Change Image</button>
                                            <img class="file-upload-image" src="#" alt="your image" />
                                        @endif
                                    </div>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide view-name-errror" id="name-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-name" class="col-form-label col-md-3 col-sm-3 label-align">Product Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="product-name" class="form-control" name="name" value="{{old('name',isset($product->name)? $product->name : '')}}"/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="room-name-error"><span class="name-error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-categoy" class="col-form-label col-md-3 col-sm-3  label-align">Product Category<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" id="room-bed" name="category_id">
                                        <option value="">Choose Category</option>
                                          @foreach ($categories as $category)
                                            <option value="{{$category->id}}"{{ old('category_id') == $category->id || (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>{{$category->name}}</option>
                                          @endforeach

                                    </select>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="bed-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-size" class="col-form-label col-md-3 col-sm-3  label-align">Product Size<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" id="product-size" name="size">
                                        <option value="">Choose Size</option>
                                          @foreach ($sizes as $size)
                                            <option value="{{$size->id}}"{{ old('size') == $size->id || (isset($product) && $product->size == $size->id) ? 'selected' : '' }}>{{$size->name}}</option>
                                          @endforeach

                                    </select>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="bed-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-price" class="col-form-label col-md-3 col-sm-3 label-align">Product Price<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="product-price" class="form-control" name="price" value="{{old('price',isset($product->price)? $product->price : '')}}"/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="occupation-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-width" class="col-form-label col-md-3 col-sm-3 label-align">Product Width<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="product-width" class="form-control" name="width" value="{{old('width',isset($product->width)? $product->width : '')}}"/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="occupation-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-height" class="col-form-label col-md-3 col-sm-3 label-align">Product Height<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="product-height" class="form-control" name="height" value="{{old('height',isset($product->height)? $product->height : '')}}"/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="occupation-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-depth" class="col-form-label col-md-3 col-sm-3 label-align">Product Depth<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="product-depth" class="form-control" name="depth" value="{{old('depth',isset($product->depth)? $product->depth : '')}}"/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="occupation-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-weight" class="col-form-label col-md-3 col-sm-3 label-align">Product Weight<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="product-weight" class="form-control" name="weight" value="{{old('weight',isset($product->weight)? $product->weight : '')}}"/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="occupation-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-stock" class="col-form-label col-md-3 col-sm-3 label-align">Product stock<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="product-stock" class="form-control" name="stock" value="{{old('stock',isset($product->stock)? $product->stock : '')}}"/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="size-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-made" class="col-form-label col-md-3 col-sm-3  label-align">Product Made in<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" id="product-made" name="made">
                                        <option value="">Choose Made</option>
                                          @foreach ($mades as $made)
                                            <option value="{{$made->id}}"{{ old('made') == $made->id || (isset($product) && $product->made == $made->id) ? 'selected' : '' }}>{{$made->name}}</option>
                                          @endforeach

                                    </select>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="bed-error"><span class="error"></span></label>
                            </div>
                            <div class="field item form-group">
                                <label for="product-description" class="col-form-label col-md-3 col-sm-3  label-align">Product Description<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea id="product-description" class="form-control" name="description" rows="4">{{old('description',isset($product->description)? $product->description : '')}}</textarea>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide name-errror" id="name-error"><span class="error"></span></label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        @if (isset($product->id))
                                            <input type="hidden" value="{{$product->id}}" name="id">
                                        @endif
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
