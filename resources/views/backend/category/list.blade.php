@extends('backend.layouts.master')
@section('title','Lara Shop :: Category Page')
@section('content')
    <!-- page content -->

    <div class="right_col" role="main">
        <div class="title_left">
            <h3>Category List</h3>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table  id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Updated Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categoryStore as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->updated_at->format('d/m/Y  H:i:s') }}</td>
                                                <td style="text-align:center;">
                                                    <a href="{{ URL::to('admin/bed/edit')}}/{{ $item->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                    <a href="{{ URL::to('admin/bed/delete')}}/{{ $item->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
