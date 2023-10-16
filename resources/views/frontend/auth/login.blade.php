@extends('frontend.layouts.master')
@section('title','LARA Shop::Login Page')
@section('content')

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							{{-- <a class="primary-btn" href="#">Create an Account</a> --}}
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Register in to enter</h3>
						<form class="row login_form" action="{{ route('registerStore') }}" method="post" id="register-form" >
							@csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                               
							</div>
                            <div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                                
							</div>
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" name="address" id="" cols="30" rows="2" placeholder="Address">{{ old('address') }}</textarea>
                                
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" class="primary-btn">Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('script')
{{-- {!! JsValidator::formRequest('App\Http\Requests\Login\UserRegisterRequest'), 'register-form' !!} --}}
{!! JsValidator::formRequest('App\Http\Requests\Login\UserRegisterRequest', '#register-form') !!}
<script>
	
</script>
@endsection