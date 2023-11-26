@extends('layouts.frontend')

@section('title', __('404 - Not Found'))
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
	<section class="breadcrumb-section" style="background-image: url({{ asset('public/frontend/images/breadcrumb_bg.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-card">
						<h2>{{ __('404 - Not Found') }}</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ __('404 - Not Found') }}</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Page Breadcrumb/ -->	
	<!-- Inner Section -->
	<section class="inner-section inner-section-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="error_card">
						<div class="error_img">
							<img src="{{ asset('public/frontend/images/404.png') }}" />
						</div>
						<p>{{ __('This page you are looking for could not be found!') }}</p>
						<a class="btn theme-btn" href="{{ url('/') }}">{{ __('Back to Home Page') }}</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Inner Section/ -->
</main>

@endsection

@push('scripts')

@endpush	