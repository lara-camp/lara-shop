@extends('backend.layouts.master')
@section('title','Hotel Booking::Amenity Create')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                @if (isset($upadateSize))
                    <h3>Size Update Form</h3>
                @else
                    <h3>Size Create Form</h3>
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
                        @if (isset($updateSize))
                            <form class="" action="{{route('sizeUpdate')}}" method="post" id="create-form">
                        @else
                        <form class="" action="{{route('sizeCreate')}}" method="post" id="create-form">
                        @endif
                            @csrf
                            <span class="section">Size Info</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Size<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" class="form-control" id="view-name" name="name" placeholder="42"  value = "{{old('name',isset($updateSize->name)? $updateSize->name : '')}}"/>
                                </div>
                                <label class="col-form-label col-md-3 col-sm-3  label-align label-error hide view-name-errror" id="view-name-error"><span class="name-error"></span></label>

                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        @if (isset($updateSize->id))
                                            <input type="hidden" value="{{$updateSize->id}}" name="id">
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
<!-- /page content -->
@endsection

