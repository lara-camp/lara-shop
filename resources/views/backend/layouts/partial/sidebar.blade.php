
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
              
          <li><a><i class="fa fa-laptop"></i>View<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Create</a></li>
                <li><a href="#">Listing</a></li>
              </ul>
          </li>

          <li><a><i class="fa fa-edit"></i>Bed<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Create</a></li>
                <li><a href="#">Listing</a></li>
              </ul>
          </li>

          <li><a><i class="fa fa-bank"></i> Amenities<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Create</a></li>
                <li><a href="#">Listing</a></li>
              </ul>
            </li>

          <li><a><i class="fa fa-beer"></i>Special Feature<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Create</a></li>
                <li><a href="#">Listing</a></li>
              </ul>
            </li>
            
          <li><a><i class="fa fa-dashboard"></i> Room<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Create</a></li>
                <li><a href="#">Listing</a></li>
              </ul>
          </li>
            
          <li><a><i class="fa fa-edit"></i>Reservation<span class="fa fa-chevron-down"></span></a>
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