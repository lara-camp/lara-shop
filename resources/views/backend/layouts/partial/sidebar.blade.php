
<div class="col-md-3 left_col ">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="" class="site_title">
        {{ (getSiteSetting() !== '')? getSiteSetting()->name : '' }}
      </a>
    </div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{ URL::asset('images')}}/{{ (getSiteSetting() !== '')? getSiteSetting()->logo_path : '' }}
        " alt="..." class="img-circle profile_img" style="width:50px;">
        </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>
            {{ Auth::guard('Admin')->user()->name }}
        </h2>
      </div>
    </div>
    <!-- /menu profile quick info -->
    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="{{ route('backendIndex') }}"><i class="fa fa-home"></i>Home</a></li>

          <li><a><i class="fa fa-laptop"></i>Category<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ URL::asset('admin-backend/category/create')}}">Create</a></li>
                <li><a href="{{ URL::asset('admin-backend/category/list')}}">Listing</a></li>
              </ul>
          </li>

          <li><a><i class="fa fa-laptop"></i>Made<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ URL::asset('admin-backend/made/create')}}">Create</a></li>
              <li><a href="{{ URL::asset('admin-backend/made/list')}}">Listing</a></li>
            </ul>
        </li>

          <li><a><i class="fa fa-edit"></i>Product<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{route('productForm')}}">Create</a></li>
                <li><a href="{{route('productLists')}}">Listing</a></li>
              </ul>
          </li>


          <li><a><i class="fa fa-edit"></i>Order<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Listing</a></li>
              </ul>
          </li>

          <li>
            <a href=""><i class="fa fa-home"></i>Site Setting</a>
          </li>

        </ul>
      </div>
    </div>
  </div>
</div>
