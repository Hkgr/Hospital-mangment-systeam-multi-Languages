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
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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
                                <div class="mb-4 main-content-label">{{ trans('Dashboard/Profile.EditInfo') }}</div>
				<form class="form-horizontal" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

                                        <div class="mb-4 main-content-label">{{ trans('Dashboard/Profile.PersonalDetails') }}</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.Name') }}</label>
							</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_name" class="keep-toggle" data-target="name" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.Description') }}</label>
							</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="description" value="{{ old('description', $user->description) }}" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_description" class="keep-toggle" data-target="description" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

                                        <div class="mb-4 main-content-label">{{ trans('Dashboard/Profile.SocialMedia') }}</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.Facebook') }}</label>
							</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="facebook_url" value="{{ old('facebook_url', $user->facebook_url) }}" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_facebook_url" class="keep-toggle" data-target="facebook_url" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.Twitter') }}</label>
							</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="twitter_url" value="{{ old('twitter_url', $user->twitter_url) }}" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_twitter_url" class="keep-toggle" data-target="twitter_url" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.LinkedIn') }}</label>
							</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="linkedin_url" value="{{ old('linkedin_url', $user->linkedin_url) }}" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_linkedin_url" class="keep-toggle" data-target="linkedin_url" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
                                                        <div class="col-md-3"><label class="form-label">{{ trans('Dashboard/Profile.WhatsApp') }}</label></div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="phone"
									value="{{ old('phone', $user->phone) }}" disabled>
							</div>
							<div class="col-md-2">
								<label class="ckbox">
									<input type="checkbox" name="keep_phone" class="keep-toggle" data-target="phone" checked>
                                                                        <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span>
								</label>
							</div>
						</div>
					</div>

                                        <div class="mb-4 main-content-label">{{ trans('Dashboard/Profile.SecurityInfo') }}</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.Email') }}</label>
							</div>
							<div class="col-md-7">
								<input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_email" class="keep-toggle" data-target="email" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.Password') }}</label>
							</div>
							<div class="col-md-7">
								<input type="password" class="form-control" name="password" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_password" class="keep-toggle" data-target="password" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.PasswordConfirmation') }}</label>
							</div>
							<div class="col-md-7">
								<input type="password" class="form-control" name="password_confirmation" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_password_confirmation" class="keep-toggle" data-target="password_confirmation" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
                                                                <label class="form-label">{{ trans('Dashboard/Profile.Photo') }}</label>
							</div>
							<div class="col-md-7">
								<input type="file" class="form-control" name="photo" accept="image/*" disabled>
							</div>
							<div class="col-md-2">
                                                                <label class="ckbox"><input type="checkbox" name="keep_photo" class="keep-toggle" data-target="photo" checked> <span>{{ trans('Dashboard/Profile.KeepUnchanged') }}</span></label>
							</div>
						</div>
					</div>

					<div class="card-footer text-left">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">{{ trans('Dashboard/Profile.Update') }}</button>
					</div>
				</form>
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

		document.querySelectorAll('.keep-toggle').forEach(function(cb) {
			var target = document.querySelector('[name="' + cb.dataset.target + '"]');
			if (cb.checked) target.setAttribute('disabled', true);
			cb.addEventListener('change', function() {
				if (this.checked) {
					target.setAttribute('disabled', true);
				} else {
					target.removeAttribute('disabled');
				}
			});
		});

		// Validate that selected file is an image
		var photoInput = document.querySelector('input[name="photo"]');
		if (photoInput) {
			// Ensure the accept attribute is set even if HTML changed later
			photoInput.setAttribute('accept', 'image/*');
			photoInput.addEventListener('change', function() {
				var file = this.files && this.files[0];
				if (!file) return;
				var isImageMime = file.type && file.type.toLowerCase().startsWith('image/');
				var isImageExt = /\.(png|jpe?g|gif|bmp|webp|svg)$/i.test(file.name || '');
				if (!(isImageMime || isImageExt)) {
                                        alert('{{ trans('Dashboard/Profile.ImageFileAlert') }}');
					this.value = '';
				}
			});
		}
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
