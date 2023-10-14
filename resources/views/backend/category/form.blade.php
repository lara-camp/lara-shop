
@extends('backend.layouts.master')
@section('title', (isset($categoryEdit) ? 'Lara Shop :: Category Edit Page' : 'Lara Shop :: Category Create Page') )
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
                        @if (isset($categoryEdit))
                            <form action="{{ route('categoryUpdate')}}" method="post" id="create-form" class="needs-validation" novalidate>
                        @else
                            <form action="{{ route('categoryCreate')}}" method="post" id="create-form" class="needs-validation" novalidate>
                        @endif
                                @csrf
                                @if (isset($categoryEdit))
                                    <span class="section">Edit Category</span>
                                    <input type="hidden" name="id" value="{{ $categoryEdit->id}}">
                                @else
                                    <span class="section">Create Category</span>
                                @endif
                                <div class="field item ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align ">Name<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control " name="name" id="name" placeholder="Please fill category name" value="{{ old('name',isset($categoryEdit) ? $categoryEdit : '')}}"  />
                                        </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide" ><span class="name-text"></span></label>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary " >{{ isset($categoryEdit) ? 'Update' : 'Submit' }}</button>
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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
