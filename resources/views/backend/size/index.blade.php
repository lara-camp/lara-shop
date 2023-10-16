@extends('backend.layouts.master')
@section('title','Lara Shop::Size List')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Size List</h3>
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
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach ($sizes as $size )


                                    <tr>
                                        <td>{{$size->id}}</td>
                                        <td>{{$size->name}}</td>
                                        <td>  <a href="{{URL::to('admin-backend/size/edit/'.$size->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="{{URL::to('admin-backend/size/delete/'.$size->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
    </div>
</div>
@endsection

