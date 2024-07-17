@extends('Dashboard.layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">

 <!--Internal   Notify -->
 <link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/doctor.doctor')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/doctor.add')}}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
                <!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									{{trans('Dashboard/doctor.add')}}
								</div>
								<p class="mg-b-20"></p>
								<div class="pd-30 pd-sm-40 bg-gray-200">
                               <form action ="{{route('doctors.store')}}" method="post"  autocomplete="off" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
									<div class="col-lg-12">
										<div class="bg-gray-200 p-4">
											<div class="form-group">
												<input class="form-control" placeholder="{{trans('Dashboard/doctor.enter_name')}}" type="name"  name = "name" required autofocus >
											</div>
                                            <div class="form-group">
												<input class="form-control" placeholder="{{trans('Dashboard/doctor.enter_password')}}" type="password" name="password">
											</div>
											<div class="form-group">
												<input class="form-control" placeholder="{{trans('Dashboard/doctor.enter_email')}}" type="email" name="email" >
											</div>
                                       <div class="row row-xs">
                                            <div class=" form-group col-md-4">
											<div class="input-group">
											<div class="input-group-prepend">

											</div><!-- input-group-prepend -->
											<input class="form-control" id="phone" placeholder="{{trans('Dashboard/doctor.enter_tele')}}" type="phone" name="phone">
										</div><!-- input-group -->
										</div>

                                        <div class="col-lg-6">
                                            <select multiple="multiple"  name="Appointments" class="form-control select"  >
                                            <option label="{{trans('doctor.Appointments')}}" disabled>
                                                </option>
                                                @foreach ($Appointments as $Appointment)
                                                </option>
                                                <option value="{{$Appointment->id}}">
                                                    {{$Appointment->name}}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-8">

										</div>
                                    </div>

                                   <div class="row row-xs">
                                	<div class="form-group col-md-4">
                                        <select name="status" class="form-control select" >
                                        <option label="{{trans('Dashboard/doctor.enter_status')}}">
											</option >

											<option label="{{trans('Dashboard/doctor.status_1')}}"value="1">
											</option>

                                            <option label="{{trans('Dashboard/doctor.status_0')}}"value="0">
											</option>

										</select>
									</div>

                                    <div class="col-lg-6">
										<select name="section_id" class="form-control select"  >
                                        <option label="{{trans('Dashboard/doctor.enter_section')}}">
											</option>
                                            @foreach ($Sections as $section)
											</option>
											<option value="{{$section->id}}">
												{{$section->name}}
											</option>
										@endforeach
										</select>
									</div><!-- col-4 -->




							<div class="row row-xs align-items-center mg-b-20 border border-secondary rounded">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{ trans('Dashboard/doctor.upload') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                    <img style="border-radius:50%" width="150px" height="150px" id="output"/>
                                </div>
                            </div>
                              </div>

                                      {{-- button  --}}

										<button type="submit" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{trans('Dashboard/doctor.save')}} </button>
                                     </form>

										</div>
									</div>
								</div>

							 </div>
							</div>
						</div>
					</div>

				</div>



				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
            @include('Dashboard.messages_alert')
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script>
      var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
</script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('Dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('Dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('Dashboard/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('Dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('Dashboard/js/form-elements.js')}}"></script>

  <!--Internal  Notify js -->
  <script src="{{URL::asset('Dashboard/plugins/notify/js/notifIt.js')}}"></script>
  <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
