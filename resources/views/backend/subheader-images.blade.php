@extends('layouts.backend')

@section('title', __('Subheader BG Images'))

@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">
		@php $vipc = vipc(); @endphp
		@if($vipc['bkey'] == 0) 
		@include('backend.partials.vipc')
		@else
		<div class="row mt-25">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								{{ __('Subheader BG Images') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.theme_options_tabs_nav')
						<div class="tabs-body">
							<!--Data Entry Form-->
							<form novalidate="" data-validate="parsley" id="DataEntry_formId">
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="blog_bg">{{ __('Blog Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['blog_bg'] }}" name="blog_bg" id="blog_bg" type="text" class="form-control" readonly>
												<a id="on_blog_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_blog_bg" class="select-image dnone">
												<div class="inner-image" id="view_blog_bg"></div>
												<a onClick="onMediaImageRemove('blog_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
										<div class="form-group">
											<label for="contact_bg">{{ __('Contact Us Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['contact_bg'] }}" name="contact_bg" id="contact_bg" type="text" class="form-control" readonly>
												<a id="on_contact_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_contact_bg" class="select-image dnone">
												<div class="inner-image" id="view_contact_bg"></div>
												<a onClick="onMediaImageRemove('contact_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
										<div class="form-group">
											<label for="register_bg">{{ __('Register Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['register_bg'] }}" name="register_bg" id="register_bg" type="text" class="form-control" readonly>
												<a id="on_register_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_register_bg" class="select-image dnone">
												<div class="inner-image" id="view_register_bg"></div>
												<a onClick="onMediaImageRemove('register_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
										<div class="form-group">
											<label for="login_bg">{{ __('Login Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['login_bg'] }}" name="login_bg" id="login_bg" type="text" class="form-control" readonly>
												<a id="on_login_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_login_bg" class="select-image dnone">
												<div class="inner-image" id="view_login_bg"></div>
												<a onClick="onMediaImageRemove('login_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
										<div class="form-group">
											<label for="reset_password_bg">{{ __('Reset Password Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['reset_password_bg'] }}" name="reset_password_bg" id="reset_password_bg" type="text" class="form-control" readonly>
												<a id="on_reset_password_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_reset_password_bg" class="select-image dnone">
												<div class="inner-image" id="view_reset_password_bg"></div>
												<a onClick="onMediaImageRemove('reset_password_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
										<div class="form-group">
											<label for="dashboard_bg">{{ __('Dashboard Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['dashboard_bg'] }}" name="dashboard_bg" id="dashboard_bg" type="text" class="form-control" readonly>
												<a id="on_dashboard_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_dashboard_bg" class="select-image dnone">
												<div class="inner-image" id="view_dashboard_bg"></div>
												<a onClick="onMediaImageRemove('dashboard_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
										<div class="form-group">
											<label for="profile_bg">{{ __('Profile Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['profile_bg'] }}" name="profile_bg" id="profile_bg" type="text" class="form-control" readonly>
												<a id="on_profile_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_profile_bg" class="select-image dnone">
												<div class="inner-image" id="view_profile_bg"></div>
												<a onClick="onMediaImageRemove('profile_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
										<div class="form-group">
											<label for="change_password_bg">{{ __('Change Password Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['change_password_bg'] }}" name="change_password_bg" id="change_password_bg" type="text" class="form-control" readonly>
												<a id="on_change_password_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_change_password_bg" class="select-image dnone">
												<div class="inner-image" id="view_change_password_bg"></div>
												<a onClick="onMediaImageRemove('change_password_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
										<div class="form-group">
											<label for="booking_bg">{{ __('Booking Subheader Background Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['booking_bg'] }}" name="booking_bg" id="booking_bg" type="text" class="form-control" readonly>
												<a id="on_booking_bg" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader background image size width: 1920px and height: 400px.</em>
											<div id="remove_booking_bg" class="select-image dnone">
												<div class="inner-image" id="view_booking_bg"></div>
												<a onClick="onMediaImageRemove('booking_bg')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										
									</div>
									<div class="col-md-4"></div>
								</div>
								
								<div class="row tabs-footer mt-15">
									<div class="col-lg-12">
										<a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a>
									</div>
								</div>
							</form>
							<!--/Data Entry Form/-->
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
<!-- /main Section -->

<!--Global Media-->
@include('backend.partials.global_media')
<!--/Global Media/-->

@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var media_type = 'Subheader';

var blog_bg = "{{ $datalist['blog_bg'] }}";
if(blog_bg == ''){
	$("#remove_blog_bg").hide();
	$("#blog_bg").html('');
}
if(blog_bg != ''){
	$("#remove_blog_bg").show();
	$("#view_blog_bg").html('<img src="'+public_path+'/media/'+blog_bg+'">');
}

var contact_bg = "{{ $datalist['contact_bg'] }}";
if(contact_bg == ''){
	$("#remove_contact_bg").hide();
	$("#contact_bg").html('');
}
if(contact_bg != ''){
	$("#remove_contact_bg").show();
	$("#view_contact_bg").html('<img src="'+public_path+'/media/'+contact_bg+'">');
}

var register_bg = "{{ $datalist['register_bg'] }}";
if(register_bg == ''){
	$("#remove_register_bg").hide();
	$("#register_bg").html('');
}
if(register_bg != ''){
	$("#remove_register_bg").show();
	$("#view_register_bg").html('<img src="'+public_path+'/media/'+register_bg+'">');
}

var login_bg = "{{ $datalist['login_bg'] }}";
if(login_bg == ''){
	$("#remove_login_bg").hide();
	$("#login_bg").html('');
}
if(login_bg != ''){
	$("#remove_login_bg").show();
	$("#view_login_bg").html('<img src="'+public_path+'/media/'+login_bg+'">');
}

var reset_password_bg = "{{ $datalist['reset_password_bg'] }}";
if(reset_password_bg == ''){
	$("#remove_reset_password_bg").hide();
	$("#reset_password_bg").html('');
}
if(reset_password_bg != ''){
	$("#remove_reset_password_bg").show();
	$("#view_reset_password_bg").html('<img src="'+public_path+'/media/'+reset_password_bg+'">');
}

var dashboard_bg = "{{ $datalist['dashboard_bg'] }}";
if(dashboard_bg == ''){
	$("#remove_dashboard_bg").hide();
	$("#dashboard_bg").html('');
}
if(dashboard_bg != ''){
	$("#remove_dashboard_bg").show();
	$("#view_dashboard_bg").html('<img src="'+public_path+'/media/'+dashboard_bg+'">');
}

var profile_bg = "{{ $datalist['profile_bg'] }}";
if(profile_bg == ''){
	$("#remove_profile_bg").hide();
	$("#profile_bg").html('');
}
if(profile_bg != ''){
	$("#remove_profile_bg").show();
	$("#view_profile_bg").html('<img src="'+public_path+'/media/'+profile_bg+'">');
}

var change_password_bg = "{{ $datalist['change_password_bg'] }}";
if(change_password_bg == ''){
	$("#remove_change_password_bg").hide();
	$("#change_password_bg").html('');
}
if(change_password_bg != ''){
	$("#remove_change_password_bg").show();
	$("#view_change_password_bg").html('<img src="'+public_path+'/media/'+change_password_bg+'">');
}

var booking_bg = "{{ $datalist['booking_bg'] }}";
if(booking_bg == ''){
	$("#remove_booking_bg").hide();
	$("#booking_bg").html('');
}
if(booking_bg != ''){
	$("#remove_booking_bg").show();
	$("#view_booking_bg").html('<img src="'+public_path+'/media/'+booking_bg+'">');
}

</script>
<script src="{{asset('public/backend/pages/subheader-images.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush