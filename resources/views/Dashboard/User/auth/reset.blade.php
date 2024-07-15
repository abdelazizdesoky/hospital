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
							<img src="{{URL::asset('dashboard/img/media/reset.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-50p ht-xl-60p mx-auto" alt="logo">
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
									<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
									<div class="main-card-signin d-md-flex">
										<div class="wd-100p">
											<div class="main-signin-header">
												<div class="">
													<h2>Welcome back!</h2>
													<h4 class="text-left">Reset Your Password</h4>
													<form method="POST" action="{{ route('password.store') }}">
														@csrf
												<!-- Password Reset Token -->
                                                <input type="hidden" name="token" value="{{ $request->route('token') }}">


														<div class="form-group text-left">
															<label>Email</label>
															<input class="form-control"id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
															<x-input-error :messages="$errors->get('email')" class="mt-2" />
														</div>
														<div class="form-group text-left">
															<label>New Password</label>
															<input class="form-control" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
															<x-input-error :messages="$errors->get('password')" class="mt-2" />
														</div>
														<div class="form-group text-left">
															<label>Confirm Password</label>
															<input class="form-control"id="password_confirmation" class="block mt-1 w-full"
															type="password"
															name="password_confirmation" required autocomplete="new-password" />
							
										<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
														</div>
														<button class="btn ripple btn-main-primary btn-block">Reset Password</button>
													</form>
												</div>
											</div>
											<div class="main-signup-footer mg-t-20">
												<p>Already have an account? <a href="{{ url('/' . $page='signin') }}">Sign In</a></p>
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