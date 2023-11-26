@extends('layouts.frontend')

@section('title', __('Search'))
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
	<section class="breadcrumb-section" style="background-image: url({{ $gtext['login_bg'] ? asset('public/media/'.$gtext['login_bg']) : '' }});">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-card">
						<h2>{{ __('Search') }}</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ __('Search') }}</li>
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
				@if(count($datalist)>0)
				@foreach ($datalist as $row)
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="item-card">
						<div class="item-image">
							<a href="{{ route('frontend.room', [$row->id, $row->slug]) }}">
								<img src="{{ asset('public/media/'.$row->thumbnail) }}" alt="{{ $row->title }}" />
							</a>
							@if(($row->is_discount == 1) && ($row->old_price !=''))
								@php 
									$discount = number_format((($row->old_price - $row->price)*100)/$row->old_price);
								@endphp
							<span class="item-label">{{ $discount }}% {{ __('Off') }}</span>
							@endif
						</div>
						<div class="item-content">
							<div class="item-title">
								<a href="{{ route('frontend.room', [$row->id, $row->slug]) }}">{{ str_limit($row->title) }}</a>
							</div>
							<div class="pric-card">
								@if($row->price != '')
									@if($gtext['currency_position'] == 'left')
									<div class="new-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($row->price) }}</div>
									@else
									<div class="new-price">{{ NumberFormat($row->price) }}{{ $gtext['currency_icon'] }}</div>
									@endif
								@endif
								@if(($row->is_discount == 1) && ($row->old_price !=''))
									@if($gtext['currency_position'] == 'left')
									<div class="old-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($row->old_price) }}</div>
									@else
									<div class="old-price">{{ NumberFormat($row->old_price) }}{{ $gtext['currency_icon'] }}</div>
									@endif
								@endif
								<div class="per-day-night">/ {{ __('Night') }}</div>
							</div>
						</div>
						<a href="{{ route('frontend.room', [$row->id, $row->slug]) }}" class="btn theme-btn book-now-btn">{{ __('Details') }}</a>
						<ul class="item-meta">
							<li>{{ __('Adult') }} {{ $row->total_adult }}</li>
							<li>{{ __('Child') }} {{ $row->total_child }}</li>
						</ul>
					</div>
				</div>
				@endforeach
				@else
				<div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 col-xl-4 offset-xl-4 col-xxl-4 offset-xxl-4">
					<div class="empty_card">
						<div class="empty_img">
							<img src="{{ asset('public/frontend/images/empty.png') }}" />
						</div>
						<h3>{{ __('Oops! Not found.') }}</h3>
					</div>
				</div>
				@endif
			</div>
		</div>
	</section>
	<!-- /Inner Section/ -->	
</main>
@endsection

@push('scripts')

@endpush	