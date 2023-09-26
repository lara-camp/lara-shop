<!-- footer content -->
<footer>
    <div class="pull-right">
        Web development Team by <a style="color:green;">Team LARA.</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<!-- Flot plugins -->
<!-- DateJS -->

<!-- bootstrap-daterangepicker -->
<script src="{{ URL::asset('assets/backend/js/min/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- data table  -->

<script src="{{ URL::asset('assets/backend/js/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/buttons.flash.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/dataTables.keyTable.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/responsive.bootstrap.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/dataTables.scroller.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/data-table/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ URL::asset('assets/backend/js/custom/custom.min.js') }}"></script>

<!-- PNotify -->
<script src="{{ URL::asset('assets/backend/js/pnotify/pnotify.js')}}"></script>
<script src="{{ URL::asset('assets/backend/js/pnotify/pnotify.buttons.js')}}"></script>
<script src="{{ URL::asset('assets/backend/js/pnotify/pnotify.nonblock.js')}}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/upload_img.js')}}"></script>

@if ($errors->has('name'))
    <script>
        new PNotify({
                    title: 'Error!',
                    text: '{{ $errors->first("name") }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@endif
@if ( session('successMsg') )
    <script>
        new PNotify({
                    title: 'success!',
                    text: '{{ session('successMsg') }}',
                    type: 'success',
                    styling: 'bootstrap3'
                    })
    </script>
@endif
@if ( session('errorMsg') )
    <script>
        new PNotify({
                    title: 'error!',
                    text: '{{ session('errorMsg') }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@endif
@if ( session('deleteMsg') )
    <script>
        new PNotify({
                    title: 'error!',
                    text: '{{ session('deleteMsg') }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@endif
</body>
</html>
