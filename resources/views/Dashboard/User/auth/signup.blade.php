@extends('dashboard.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">{{ config('app.name') }}</h1></div>
										<div class="main-signup-header">
											<h2 class="text-primary">Get Started</h2>
											<h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h5>
											<form method="POST" action="{{ route('register') }}">
												@csrf
												<div class="form-group">
													<label>Firstname &amp; Lastname</label>
													 <input class="form-control"  id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
													<x-input-error :messages="$errors->get('name')" class="mt-2" />
												</div>
												<div class="form-group">
													<label>Email</label>
													<input class="form-control" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" >
													<x-input-error :messages="$errors->get('email')" class="mt-2" />
												</div>
												<div class="form-group">
													<label>Password</label>
													<input class="form-control" id="password" class="block mt-1 w-full"
													type="password"
													name="password"
													required autocomplete="new-password" >
													<x-input-error :messages="$errors->get('password')" class="mt-2" />
												</div>
												<!-- Confirm Password -->

													<div class="form-group">
														<label>password confirmat</label>
														 <input class="form-control" id="password_confirmation" class="block mt-1 w-full"
																	type="password"
																	name="password_confirmation" required autocomplete="new-password" />

													<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
												</div>


												</div>
												<button class="btn btn-main-primary btn-block">Create Account</button>

											</form>
											<div class="main-signup-footer mt-5">
												<p>Already have an account ? <a href="{{ route ('login') }}">Sign In</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection
