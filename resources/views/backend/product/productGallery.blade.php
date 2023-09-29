@extends('backend.layouts.master')
@section('title', (isset($galleryEdit) ? 'Lara Shop :: Product Gallery Edit Page' : 'Lara Shop :: Product Galleryy Create Page') )
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h4>Lara Shop Product Gallery Managemnet</h4>&nbsp;
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                @if (isset($gallery) && count($gallery) > 0 )
                <div class="row">
                    @foreach ($gallery as $gall)
                    <div class="col-md-3" >
                        <div class="room-gallery-preview">
                            <img src="{{URL::asset('assets/upload/'.$id.'/'.$gall->image)}}" class="room-gallery">
                        </div>
                        <div class="gallery-btn d-flex ">
                            <a href="{{URL::to('admin-backend/product/gallery/edit/'.$gall->id)}}" class="btn btn-info btn-xs w-50"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="{{URL::to('admin-backend/product/gallery/delete/'.$gall->id)}}" class="btn btn-danger btn-xs w-50"onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash-o"></i> Delete </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (isset($galleryEdit))
                        <form class="" action="{{route('galleryUpdate')}}" method="post" id="create-form" enctype = "multipart/form-data">
                        @else
                        <form class="" action="{{route('galleryStore')}}" method="post" id="create-form" enctype = "multipart/form-data">
                        @endif

                            @csrf
                            <span class="section">Gallery Info</span>
                            <div class="field item form-group">
                                <input type="hidden" value="{{isset($galleryEdit)? $galleryEdit->id : ''}}" name="id">
                                <label for="" class="col-form-label col-md-3 col-sm-3  label-align">Image<span class="">*</span></label>
                                <div class="file-upload">
                                    <div class="image-upload-wrap" style="display: {{ isset($galleryEdit) ? 'none' : 'block' }}">
                                        <input name="file" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content"  style="display: {{ isset($galleryEdit) ? 'block' : 'none' }}">
                                        @if (isset($galleryEdit))
                                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Change Image</button>
                                        <img class="file-upload-image" src="{{URL::asset('assets/upload/'.$galleryEdit->product_id.'/'.$galleryEdit->image)}}" alt="your image" />
                                        @else
                                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Change Image</button>
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        @endif
                                    </div>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide view-name-errror" id="view-name-error"><span class="name-error"></span></label>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary" id="submit-btn" onclick="formSubmit()">Submit</button>
                                        <button type='reset' class="btn btn-success" id="reset-btn">Reset</button>
                                        <input type="hidden" name = "product_id" value="{{isset($galleryEdit)? $galleryEdit->product_id : $id}}">

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
<!-- /page content -->
<script src="{{URL::asset('/assets/backend/js/pages/product_img_upload.js?v=20230926')}}"></script>
@if ($errors->has('room_id'))
<script>
    new PNotify({
         title: 'Sticky Danger',
         text: '{{ $errors->first('room_id')}}',
         type: 'error',
         hide: false,
         styling: 'bootstrap3'
     })
   </script>
@endif
@if ($errors->has('file'))
<script>
    new PNotify({
         title: 'Sticky Danger',
         text: '{{ $errors->first('file')}}',
         type: 'error',
         hide: false,
         styling: 'bootstrap3'
     })
   </script>
@endif
</body>
</html>
@endsection

