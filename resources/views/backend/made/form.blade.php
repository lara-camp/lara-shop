@extends('backend.layouts.master')
@section('title', (isset($categoryEdit) ? 'Lara Shop :: Made Edit Page' : 'Lara Shop :: Made Create Page') )
@section('content')
    <!-- /page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="title_left">
                <h3>Made Page</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">

                        <div class="x_content">
                        @if (isset($made))
                            <form action="{{ route('madeUpdate')}}" method="post" id="create-form" novalidate>
                        @else
                            <form action="{{ route('madeCreate')}}" method="post" id="create-form" novalidate>
                        @endif
                                @csrf
                                @if (isset($made))
                                    <span class="section">Edit Made</span>
                                    <input type="hidden" name="id" value="{{isset($made)? $made->id : ''}}">
                                @else
                                    <span class="section">Create Category</span>
                                @endif
                                <div class="field item ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align ">Name<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="name" id="name" placeholder="ex.Japan" value="{{old('name',isset($made->name)? $made->name : '')}}"  />
                                        </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide" ><span class="name-text"></span></label>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary " >{{ isset($made) ? 'Update' : 'Submit' }}</button>
                                            <button type='reset' class="btn btn-success" id="reset">Reset</button>
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
