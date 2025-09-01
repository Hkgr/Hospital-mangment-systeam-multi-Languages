@extends('Dashboard.layouts.master')
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
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">{{ $user->name ?? '' }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @if(auth('admin')->check())
                                {{ trans('Dashboard/Profile.Admin') }}
                                @elseif(auth('doctor')->check())
                                {{ trans('Dashboard/Profile.Doctor') }}
                                @elseif(auth('patient')->check())
                                {{ trans('Dashboard/Profile.Patient') }}
                                @elseif(auth('laboratorie_employee')->check())
                                {{ trans('Dashboard/Profile.LaboratorieEmployee') }}
                                @elseif(auth('ray_employee')->check())
                                {{ trans('Dashboard/Profile.RayEmployee') }}
                                @else
                                {{ trans('Dashboard/Profile.User') }}
                                @endif</span>
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
							@php
							$path = $user && $user->image && $user->image->filename !== 'default.png'
							? 'Dashboard/img/'.$folder.'/'.$user->image->filename
							: 'Dashboard/img/default.png';
							@endphp
							<img alt="" src="{{ URL::asset($path) }}">
							<a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
						</div>
						<div class="d-flex justify-content-between mg-b-20">
							<div>
								<h5 class="main-profile-name">{{ $user->name ?? '' }}</h5>
                                                                <p class="main-profile-name-text">
                                                                        @if(auth('admin')->check())
                                                                        {{ trans('Dashboard/Profile.Admin') }}
                                                                        @elseif(auth('doctor')->check())
                                                                        {{ trans('Dashboard/Profile.Doctor') }}
                                                                        @elseif(auth('patient')->check())
                                                                        {{ trans('Dashboard/Profile.Patient') }}
                                                                        @elseif(auth('laboratorie_employee')->check())
                                                                        {{ trans('Dashboard/Profile.LaboratorieEmployee') }}
                                                                        @elseif(auth('ray_employee')->check())
                                                                        {{ trans('Dashboard/Profile.RayEmployee') }}
                                                                        @else
                                                                        {{ trans('Dashboard/Profile.User') }}
                                                                        @endif
                                                                </p>
							</div>
						</div>
                                                <h6>{{ trans('Dashboard/Profile.DescriptionHeading') }}</h6>
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
                                                <label class="main-content-label tx-13 mg-b-20">{{ trans('Dashboard/Profile.SocialMedia') }}</label>
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
                                                <h6>{{ trans('Dashboard/Profile.Attributes') }}</h6>
						@php
						$socialScore = min(100, max(0, $user->social_score ?? 0));
						$physicalScore = min(100, max(0, $user->physical_health_score ?? 0));
						$psychologicalScore = min(100, max(0, $user->psychological_health_score ?? 0));
						$mentalScore = min(100, max(0, $user->mental_health_score ?? 0));
						@endphp
						<!-- skill bar -->
						<div class="skill-bar mb-4 clearfix mt-3">
                                                        <span>{{ trans('Dashboard/Profile.SocialCommunication') }}</span>
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
                                                        <span>{{ trans('Dashboard/Profile.PhysicalHealth') }}</span>
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
                                                        <span>{{ trans('Dashboard/Profile.PsychologicalHealth') }}</span>
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
                                                        <span>{{ trans('Dashboard/Profile.MentalHealth') }}</span>
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
	</div>
	<div class="col-lg-8">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
				<div class="card ">
					<div class="card-body">
						<div class="counter-status d-flex md-mb-0">
							<div class="counter-icon bg-primary-transparent">
								<i class="icon-layers text-primary"></i>
							</div>
							<div class="mr-auto">
                                                                <h5 class="tx-13">{{ trans('Dashboard/Profile.NumberDoctors') }}</h5>
								<h2 class="mb-0 tx-22 mb-1 mt-1">{{\App\Models\Doctor::count()}}</h2>
                                                                <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> {{ trans('Dashboard/Profile.Increase') }} </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
				<div class="card ">
					<div class="card-body">
						<div class="counter-status d-flex md-mb-0">
							<div class="counter-icon bg-danger-transparent">
								<i class="icon-paypal text-danger"></i>
							</div>
							<div class="mr-auto">
                                                                <h5 class="tx-13">{{ trans('Dashboard/Profile.NumberPatients') }}</h5>
								<h2 class="mb-0 tx-22 mb-1 mt-1">{{\App\Models\Patient::count()}}</h2>
                                                                <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> {{ trans('Dashboard/Profile.Increase') }} </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
				<div class="card ">
					<div class="card-body">
						<div class="counter-status d-flex md-mb-0">
							<div class="counter-icon bg-success-transparent">
								<i class="icon-rocket text-success"></i>
							</div>
							<div class="mr-auto">
                                                                <h5 class="tx-13">{{ trans('Dashboard/Profile.NumberSections') }}</h5>
								<h2 class="mb-0 tx-22 mb-1 mt-1">{{\App\Models\Section::count()}}</h2>
                                                                <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> {{ trans('Dashboard/Profile.Increase') }} </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="tabs-menu ">
					<!-- Tabs -->
					<ul class="nav nav-tabs profile navtab-custom panel-tabs">
						<li class="active">
                                                        <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">{{ trans('Dashboard/Profile.AboutMe') }}</span> </a>
						</li>
						<!-- <li class="">
							<a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">GALLERY</span> </a>
						</li>
						<li class="">
							<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">SETTINGS</span> </a>
						</li> -->
					</ul>
				</div>
				<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
					<div class="tab-pane active" id="home">
						<h4 class="tx-15 text-uppercase mb-3">{{ $user->name ?? '' }}</h4>
						<p class="m-b-5">{{ $user->description ?? __('No description available.') }}</p>
						<!-- <div class="m-t-30">
							<h4 class="tx-15 text-uppercase mt-3">Experience</h4>
							<div class=" p-t-10">
								<h5 class="text-primary m-b-5 tx-14">Lead designer / Developer</h5>
								<p class="">websitename.com</p>
								<p><b>2010-2015</b></p>
								<p class="text-muted tx-13 m-b-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
							<hr>
							<div class="">
								<h5 class="text-primary m-b-5 tx-14">Senior Graphic Designer</h5>
								<p class="">coderthemes.com</p>
								<p><b>2007-2009</b></p>
								<p class="text-muted tx-13 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div> -->
					</div>
					<div class="tab-pane" id="profile">
						<div class="row">
							<div class="col-sm-4">
								<div class="border p-1 card thumb">
									<a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/7.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
									<h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
									<div class="ga-border"></div>
									<p class="text-muted text-center"><small>Photography</small></p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class=" border p-1 card thumb">
									<a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/8.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
									<h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
									<div class="ga-border"></div>
									<p class="text-muted text-center"><small>Photography</small></p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class=" border p-1 card thumb">
									<a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/9.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
									<h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
									<div class="ga-border"></div>
									<p class="text-muted text-center"><small>Photography</small></p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class=" border p-1 card thumb  mb-xl-0">
									<a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/10.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
									<h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
									<div class="ga-border"></div>
									<p class="text-muted text-center"><small>Photography</small></p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class=" border p-1 card thumb  mb-xl-0">
									<a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/6.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
									<h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
									<div class="ga-border"></div>
									<p class="text-muted text-center"><small>Photography</small></p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class=" border p-1 card thumb  mb-xl-0">
									<a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/5.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
									<h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
									<div class="ga-border"></div>
									<p class="text-muted text-center"><small>Photography</small></p>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="settings">
						<form role="form">
							<div class="form-group">
								<label for="FullName">Full Name</label>
								<input type="text" value="John Doe" id="FullName" class="form-control">
							</div>
							<div class="form-group">
								<label for="Email">Email</label>
								<input type="email" value="first.last@example.com" id="Email" class="form-control">
							</div>
							<div class="form-group">
								<label for="Username">Username</label>
								<input type="text" value="john" id="Username" class="form-control">
							</div>
							<div class="form-group">
								<label for="Password">Password</label>
								<input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
							</div>
							<div class="form-group">
								<label for="RePassword">Re-Password</label>
								<input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
							</div>
							<div class="form-group">
								<label for="AboutMe">About Me</label>
								<textarea id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
							</div>
							<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
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
@endsection