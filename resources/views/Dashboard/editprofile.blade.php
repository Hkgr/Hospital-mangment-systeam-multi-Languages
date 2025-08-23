@extends('Dashboard.layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">{{ $user->name ?? '' }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @if(auth('admin')->check())
				{{ __('مسؤول') }}
				@elseif(auth('doctor')->check())
				{{ __('دكتور') }}
				@elseif(auth('patient')->check())
				{{ __('مريض') }}
				@elseif(auth('laboratorie_employee')->check())
				{{ __('موظف مخبر') }}
				@elseif(auth('ray_employee')->check())
				{{ __('موظف أشعة') }}
				@else
				{{ __('User') }}
				@endif</span>
		</div>
	</div>
</div>
<!-- <div class="d-flex my-xl-auto right-content">
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
</div> -->
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
	<!-- Col -->
	<div class="col-lg-4">
		<div class="card mg-b-20">
			<div class="card-body">
				<div class="pl-0">
					<div class="main-profile-overview">
						@php
						$user = null;
						$folder = '';
						if(auth('admin')->check()){
						$user = auth('admin')->user();
						$folder = 'admins';
						}elseif(auth('doctor')->check()){
						$user = auth('doctor')->user();
						$folder = 'doctors';
						}elseif(auth('patient')->check()){
						$user = auth('patient')->user();
						$folder = 'patients';
						}elseif(auth('laboratorie_employee')->check()){
						$user = auth('laboratorie_employee')->user();
						$folder = 'laboratorie_employees';
						}elseif(auth('ray_employee')->check()){
						$user = auth('ray_employee')->user();
						$folder = 'ray_employees';
						}elseif(auth()->check()){
						$user = auth()->user();
						$folder = 'users';
						}
						@endphp
						<div class="main-img-user profile-user">
							@if($user && $user->image)
							<img alt="" src="{{URL::asset('Dashboard/img/'.$folder.'/'.$user->image->filename)}}">
							@else
							<img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}">
							@endif
							<a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
						</div>
						<div class="d-flex justify-content-between mg-b-20">
							<div>
								<h5 class="main-profile-name">{{ $user->name ?? '' }}</h5>
								<p class="main-profile-name-text">
									@if(auth('admin')->check())
									{{ __('مسؤول') }}
									@elseif(auth('doctor')->check())
									{{ __('دكتور') }}
									@elseif(auth('patient')->check())
									{{ __('مريض') }}
									@elseif(auth('laboratorie_employee')->check())
									{{ __('موظف مخبر') }}
									@elseif(auth('ray_employee')->check())
									{{ __('موظف أشعة') }}
									@else
									{{ __('User') }}
									@endif
								</p>
							</div>
						</div>
						<h6>توصيف</h6>
						<div class="main-profile-bio">
							{{ $user->description ?? __('No description available.') }}
						</div><!-- main-profile-bio -->
						<!-- <div class="row">
							<div class="col-md-4 col mb20">
								<h5>947</h5>
								<h6 class="text-small text-muted mb-0">Followers</h6>
							</div>
							<div class="col-md-4 col mb20">
								<h5>583</h5>
								<h6 class="text-small text-muted mb-0">Tweets</h6>
							</div>
							<div class="col-md-4 col mb20">
								<h5>48</h5>
								<h6 class="text-small text-muted mb-0">Posts</h6>
							</div>
						</div> -->
						<hr class="mg-y-30">
						<label class="main-content-label tx-13 mg-b-20">وسائل التواصل الاجتماعي</label>
						<div class="main-profile-social-list">
							<div class="media">
								<div class="media-icon bg-primary-transparent text-primary">
									<i class="icon ion-logo-facebook"></i>
								</div>
								<div class="media-body">
									<span>Facebook</span> <a href="{{ $user->facebook_url }}">{{ $user->facebook_url }}</a>
								</div>
							</div>
							<div class="media">
								<div class="media-icon bg-success-transparent text-success">
									<i class="icon ion-logo-twitter"></i>
								</div>
								<div class="media-body">
									<span>Twitter</span> <a href="{{ $user->twitter_url }}">{{ $user->twitter_url }}</a>
								</div>
							</div>
							<div class="media">
								<div class="media-icon bg-info-transparent text-info">
									<i class="icon ion-logo-linkedin"></i>
								</div>
								<div class="media-body">
									<span>Linkedin</span> <a href="{{ $user->linkedin_url }}">{{ $user->linkedin_url }}</a>
								</div>
							</div>
							<div class="media">
								<div class="media-icon bg-danger-transparent text-danger">
									<i class="icon ion-md-call"></i>
								</div>
								<div class="media-body">
									<span>Whats App</span> <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
								</div>
							</div>
						</div>
						<hr class="mg-y-30">
						<h6>الخصائص</h6>
						<!-- skill bar -->
						<div class="skill-bar mb-4 clearfix mt-3">
							<span>التواصل الاجتماعي</span>
							<div class="progress mt-2">
								<div class="progress-bar bg-primary-gradient"
									role="progressbar"
									aria-valuenow="{{ (int)($socialScore ?? 0) }}"
									aria-valuemin="0"
									aria-valuemax="100"
									data-width="{{ (int)($socialScore ?? 0) }}">
								</div>
							</div>
						</div>

						<!-- skill bar -->
						<div class="skill-bar mb-4 clearfix">
							<span>الصحة الجسدية</span>
							<div class="progress mt-2">
								<div class="progress-bar bg-danger-gradient"
									role="progressbar"
									aria-valuenow="{{ (int)($physicalScore ?? 0) }}"
									aria-valuemin="0"
									aria-valuemax="100"
									data-width="{{ (int)($physicalScore ?? 0) }}">
								</div>
							</div>
						</div>

						<!-- skill bar -->
						<div class="skill-bar mb-4 clearfix">
							<span>الصحة النفسية</span>
							<div class="progress mt-2">
								<div class="progress-bar bg-success-gradient"
									role="progressbar"
									aria-valuenow="{{ (int)($psychologicalScore ?? 0) }}"
									aria-valuemin="0"
									aria-valuemax="100"
									data-width="{{ (int)($psychologicalScore ?? 0) }}">
								</div>
							</div>
						</div>

						<!-- skill bar -->
						<div class="skill-bar clearfix">
							<span>الصحة العقلية</span>
							<div class="progress mt-2">
								<div class="progress-bar bg-info-gradient"
									role="progressbar"
									aria-valuenow="{{ (int)($mentalScore ?? 0) }}"
									aria-valuemin="0"
									aria-valuemax="100"
									data-width="{{ (int)($mentalScore ?? 0) }}">
								</div>
							</div>
						</div>

					</div><!-- main-profile-overview -->
				</div>
			</div>
		</div>
		<div class="card mg-b-20">
			<!-- 	<div class="card-body">
<div class="main-content-label tx-13 mg-b-25">
					Conatct
				</div>
				<div class="main-profile-contact-list">
					<div class="media">
						<div class="media-icon bg-primary-transparent text-primary">
							<i class="icon ion-md-phone-portrait"></i>
						</div>
						<div class="media-body">
							<span>Mobile</span>
							<div>
								+245 354 654
							</div>
						</div>
					</div>
					<div class="media">
						<div class="media-icon bg-success-transparent text-success">
							<i class="icon ion-logo-slack"></i>
						</div>
						<div class="media-body">
							<span>Slack</span>
							<div>
								@spruko.w
							</div>
						</div>
					</div>
					<div class="media">
						<div class="media-icon bg-info-transparent text-info">
							<i class="icon ion-md-locate"></i>
						</div>
						<div class="media-body">
							<span>Current Address</span>
							<div>
								San Francisco, CA
							</div>
						</div>
					</div>
				</div>main-profile-contact-list 
			</div>-->
		</div>
	</div>

	<!-- Col -->
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<div class="mb-4 main-content-label">تعديل المعلومات</div>
				<form class="form-horizontal">
					<div class="form-group ">
						<!-- <div class="row">
							<div class="col-md-3">
								<label class="form-label">Language</label>
							</div>
							<div class="col-md-9">
								<select class="form-control select2">
									<option>Us English</option>
									<option>Arabic</option>
									<option>Korean</option>
								</select>
							</div>
						</div> -->
					</div>
					<div class="mb-4 main-content-label">التفاصيل الشخصية</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">الاسم</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="User Name" value="Petey Cruiser">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">الوصف</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="First Name" value="Petey">
							</div>
						</div>
					</div>
					<!-- <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">last Name</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="Last Name" value="Pechon">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Nick Name</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="Nick Name" value="Petey">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Designation</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="Designation" value="Web Designer">
							</div>
						</div>
					</div> -->
					<div class="mb-4 main-content-label">وسائل التواصل الاجتماعي</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">فيسبوك<i>(مطلوب)</i></label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="Email" value="info@Valex.in">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">تويتر</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="Website" value="@spruko.w">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">ليكد إن</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="phone number" value="+245 354 654">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">الرقم</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" name="example-textarea-input" rows="2" placeholder="Address">San Francisco, CA</textarea>
							</div>
						</div>
					</div>
					<div class="mb-4 main-content-label">معلومات الامان</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">البريد الإلكتروني</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="twitter" value="twitter.com/spruko.me">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">كلمة المرور</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="facebook" value="https://www.facebook.com/Redash">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">تأكيد كلمة المرور</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="google" value="spruko.com">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-1">
								<label for="exampleInputEmail1">الصورة</label>
							</div>
							<div class="col-md-11 mg-t-5 mg-md-t-0">
								<input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
								<img style="border-radius:50%" width="150px" height="150px" id="output" />
							</div>
						</div>
					</div>
					<!-- <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Linked in</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="linkedin" value="linkedin.com/in/spruko">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Github</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="github" value="github.com/sprukos">
							</div>
						</div>
					</div>
					<div class="mb-4 main-content-label">About Yourself</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Biographical Info</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" name="example-textarea-input" rows="4" placeholder="">pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure..</textarea>
							</div>
						</div>
					</div>
					<div class="mb-4 main-content-label">Email Preferences</div>
					<div class="form-group mb-0">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Verified User</label>
							</div>
							<div class="col-md-9">
								<div class="custom-controls-stacked">
									<label class="ckbox mg-b-10"><input checked="" type="checkbox"><span> Accept to receive post or page notification emails</span></label>
									<label class="ckbox"><input checked="" type="checkbox"><span> Accept to receive email sent to multiple recipients</span></label>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div> -->
					<div class="card-footer text-left">
						<button type="submit" class="btn btn-primary waves-effect waves-light">تحديث</button>
					</div>
			</div>
		</div>
		<!-- /Col -->
	</div>
	<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		document.querySelectorAll('.progress-bar[data-width]').forEach(function(el) {
			var v = parseInt(el.getAttribute('data-width'), 10);
			if (isNaN(v) || v < 0) v = 0;
			if (v > 100) v = 100;
			el.style.width = v + '%';
		});
	});
</script>

@endsection
@section('js')

<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
