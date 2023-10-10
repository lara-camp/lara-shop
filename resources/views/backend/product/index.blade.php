@extends('backend.layouts.master')
@section('title','Admin::Lara Shop::Product Lists Page')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Lists</h3>
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
                          <th>Thumbnail</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th>Stock</th>
                          <th>Made in</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach ($products as $product )
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><img src="{{URL::asset('assets/upload/'.$product->id.'/thumb/'.$product->thumbnail)}}" alt="" style="width: 85px;height:50px"></td>
                                        <td>{{$product->name}}
                                        <td>
                                            @if($product->getCategory())
                                                {{$product->getCategory->name}}
                                            @endif
                                        </td>
                                        <td>{{$product->price}} {{(getSiteSetting() != null) ? getSiteSetting()->price_unit: "" }}</td>
                                        <td>{{$product->stock}} </td>
                                        <td>{{$product->made}} </td>
                                        <td>{{$product->description}} </td>
                                        <td>
                                            <a href="{{URL::to('admin-backend/product/edit/'.$product->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="{{URL::to('admin-backend/product/delete/'.$product->id)}}" class="btn btn-danger btn-xs"onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash-o"></i> Delete </a>
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
