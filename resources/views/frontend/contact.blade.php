@extends('layouts.frontend')

@section('title', $data['title'])
@php $gtext = gtext(); @endphp

@section('meta-content')
	<meta name="keywords" content="{{ $gtext['og_keywords'] }}" />
	<meta name="description" content="{{ $gtext['og_description'] }}" />
	<meta property="og:title" content="{{ $gtext['og_title'] }}" />
	<meta property="og:site_name" content="{{ $gtext['site_name'] }}" />
	<meta property="og:description" content="{{ $gtext['og_description'] }}" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:image" content="{{ asset('public/media/'.$gtext['og_image']) }}" />
	<meta property="og:image:width" content="600" />
	<meta property="og:image:height" content="315" />
	@if($gtext['fb_publish'] == 1)
	<meta name="fb:app_id" property="fb:app_id" content="{{ $gtext['fb_app_id'] }}" />
	@endif
	<meta name="twitter:card" content="summary_large_image">
	@if($gtext['twitter_publish'] == 1)
	<meta name="twitter:site" content="{{ $gtext['twitter_id'] }}">
	<meta name="twitter:creator" content="{{ $gtext['twitter_id'] }}">
	@endif
	<meta name="twitter:url" content="{{ url()->current() }}">
	<meta name="twitter:title" content="{{ $gtext['og_title'] }}">
	<meta name="twitter:description" content="{{ $gtext['og_description'] }}">
	<meta name="twitter:image" content="{{ asset('public/media/'.$gtext['og_image']) }}">
@endsection

@section('header')
@include('frontend.partials.header')
@endsection

@section('content')
<main class="main">
	<!-- Page Breadcrumb -->
	<section class="breadcrumb-section" style="background-image: url({{ $gtext['contact_bg'] ? asset('public/media/'.$gtext['contact_bg']) : '' }});">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-card">
						<h2>{{ $data['title'] }}</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ $data['title'] }}</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Page Breadcrumb/ -->

	<!-- Inner Section -->
	@if($data['is_publish'] == 1)
	@php $contact_form = $data['contact_form']; @endphp
	<section class="inner-section contact_card">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<h3 class="heading text-center">{{ __('Contact Info') }}</h3>
					@php $contact_info = $data['contact_info']; @endphp
					@if($contact_info->short_desc != '')
					<p>{{ $contact_info->short_desc }}</p>
					@endif
				</div>
			</div>
			<div class="contact-info">
				<div class="row">
					@if($contact_info->email != '')
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
						<div class="info">
							<span class="icon">
								<i class="bi bi-envelope-paper"></i>
							</span>
							<div class="desc">
								<span>{{ __('Email') }}</span>
								<p><a href="mailto:{{ $contact_info->email }}">{{ $contact_info->email }}</a></p>
							</div>
						</div>
					</div>
					@endif

					@if($contact_info->phone != '')
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
						<div class="info">
							<span class="icon">
								<i class="bi bi-telephone"></i>
							</span>
							<div class="desc">
								<span>{{ __('Phone') }}</span>
								<p>{{ $contact_info->phone }}</p>
							</div>
						</div>
					</div>
					@endif

					@if($contact_info->address != '')
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
						<div class="info">
							<span class="icon">
								<i class="bi bi-geo-alt"></i>
							</span>
							<div class="desc">
								<span>{{ __('Address') }}</span>
								<p>{{ $contact_info->address }}</p>
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>

			<div class="row">
				@if(count($contact_form)>0)
				@if($gtext['is_googlemap'] == 0)
				<div class="col-lg-12">
				@else
				<div class="col-lg-5">
				@endif
					<div class="contact-form">
						<h3 class="heading">{{ __('Get In Touch') }}</h3>
						<form novalidate="" data-validate="parsley" id="contact-form">
							@foreach($contact_form as $row)
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										@if($row->is_label == 'yes')
										<label for="{{ str_slug($row->name) }}">{{ $row->label }} @php echo $row->mandatory == 'yes' ? '<span class="red">*</span>' : ''; @endphp</label>
										@endif
										@if($row->type == 'text')
										<input type="text" name="{{ str_slug($row->name) }}" id="{{ str_slug($row->name) }}" placeholder="{{ $row->placeholder }}"  class="form-control {{ $row->mandatory == 'yes' ? 'parsley-validated' : '' }}" {{ $row->mandatory == 'yes' ? 'data-required="true"' : '' }} >
										@elseif($row->type == 'email')
										<input type="email" name="{{ str_slug($row->name) }}" id="{{ str_slug($row->name) }}" placeholder="{{ $row->placeholder }}" class="form-control {{ $row->mandatory == 'yes' ? 'parsley-validated' : '' }}" {{ $row->mandatory == 'yes' ? 'data-required="true"' : '' }}>
										@elseif($row->type == 'dropdown')
										<select name="{{ str_slug($row->name) }}" id="{{ str_slug($row->name) }}" class="chosen-rtl form-control {{ $row->mandatory == 'yes' ? 'parsley-validated' : '' }}" {{ $row->mandatory == 'yes' ? 'data-required="true"' : '' }}>
											@if($row->dropdown_values != '')
											@php $dropdown_array = explode('|', $row->dropdown_values); @endphp
											@foreach($dropdown_array as $option)
											<option value="{{ $option }}">{{ $option }}</option>
											@endforeach
											@endif
										</select>
										@elseif($row->type == 'textarea')
										<textarea name="{{ str_slug($row->name) }}" id="{{ str_slug($row->name) }}" placeholder="{{ $row->placeholder }}" class="form-control {{ $row->mandatory == 'yes' ? 'parsley-validated' : '' }}" {{ $row->mandatory == 'yes' ? 'data-required="true"' : '' }}></textarea>
										@endif
									</div>
								</div>
							</div>
							@endforeach

							@if($gtext['is_recaptcha'] == 1)
							@if($data['is_recaptcha'] == 1)
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<div class="g-recaptcha" data-sitekey="{{ $gtext['sitekey'] }}"></div>
									</div>
								</div>
							</div>
							@endif
							@endif
							<input type="hidden" name="contact_id" value="{{ $contact_id }}" />
							<input type="hidden" name="is_captcha" value="{{ $data['is_recaptcha'] }}" />
							<a id="submit_contact_form" href="javascript:void(0);" class="btn theme-btn">
							{{ __('Send Message') }}</a>
						</form>
						<div id="sent_message"></div>
					</div>
				</div>
				@endif

				@php $contact_map = $data['contact_map']; @endphp
				@if($gtext['is_googlemap'] == 1)
				<div class="col-lg-7">
					@if($contact_map->is_google_map == 1)
						<div class="contact-map">
							<div class="google_map" id="google_map"></div>
						</div>
					@endif
				</div>
				@endif
			</div>
		</div>
	</section>
	@endif
	<!-- /Inner Section/ -->
</main>
@endsection

@push('scripts')
<script src="{{asset('public/frontend/js/parsley.min.js')}}"></script>
@if($data['is_publish'] == 1)
@if($gtext['is_googlemap'] == 1)
@if($contact_map->is_google_map == 1)
<script type="text/javascript">
function initMap(){
	var latitude = {{ $contact_map->latitude }};
	var longitude = {{ $contact_map->longitude }};
	var zoom = {{ $contact_map->zoom }};

	var email = "{{ $contact_info->email }}";
	var EmailText = "{{ __('Email') }}";
	var phone = "{{ $contact_info->phone }}";
	var PhoneText = "{{ __('Phone') }}";
	var address = "{{ $contact_info->address }}";
	var AddressText = "{{ __('Address') }}";

	var latlng = {lat: latitude, lng: longitude};
	var map = new google.maps.Map(document.getElementById('google_map'), {
		zoom: zoom,
		center: latlng,
		zoomControl: true,
		scaleControl: false,
		scrollwheel: false,
		disableDoubleClickZoom: true
	});
	var contentString = '<div class="map-tooltip">'+
		'<ul class="map-tooltip-content">'+
			'<li><h2>'+EmailText+'</h2><p>'+email+'</p></li>'+
			'<li><h2>'+PhoneText+'</h2><p>'+phone+'</p></li>'+
			'<li><h2>'+AddressText+'</h2><p>'+address+'</p></li>'+
		'</ul>'+
	'</div>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	var marker = new google.maps.Marker({
		position: latlng,
		map: map
	});

	marker.addListener('click', function() {
		infowindow.open(map, marker);
	});
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{$gtext['googlemap_apikey']}}&callback=initMap"></script>
@endif
@endif

@if($data['is_recaptcha'] == 1)
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
@endif
@endif
<script type="text/javascript">
var isreCaptcha = "{{ $data['is_recaptcha'] }}";
</script>
<script src="{{asset('public/frontend/pages/contact_us.js')}}"></script>
@endpush
