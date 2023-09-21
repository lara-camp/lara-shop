@extends('backend.layouts.master')
@section('title','Lara Shop :: Category Page')
@section('content')
    <!-- /page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="title_left">
                <h3>Category Page</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">

                        <div class="x_content">
                        {{-- @if (isset($bedData))
                            <form action="" method="post" id="create-form" novalidate>
                        @else --}}
                            <form action="{{ route('categoryCreate')}}" method="post" id="create-form" novalidate>
                        {{-- @endif --}}
                                @csrf
                                <span class="section">Create Category</span>
                                <div class="field item ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align ">Name<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="name" id="name" placeholder="Please fill category name" value=""  />
                                        </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide" ><span class="name-text"></span></label>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary " >Submit</button>
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
