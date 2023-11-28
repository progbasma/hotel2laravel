@extends('layouts.frontend')

@section('title', $data->title)
@php $gtext = gtext(); @endphp

@section('meta-content')
	<meta name="keywords" content="{{ $data->og_keywords }}" />
	<meta name="description" content="{{ $data->og_description ? $data->og_description : $data->short_desc }}" />
	<meta property="og:title" content="{{ $data->og_title ? $data->og_title : $data->title }}" />
	<meta property="og:site_name" content="{{ $gtext['site_name'] }}" />
	<meta property="og:description" content="{{ $data->og_description ? $data->og_description : $data->short_desc }}" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:image" content="{{ $data->og_image ? asset('public/media/'.$data->og_image) : asset('public/media/'.$data->thumbnail) }}" />
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
	<meta name="twitter:title" content="{{ $data->og_title ? $data->og_title : $data->title }}">
	<meta name="twitter:description" content="{{ $data->og_description ? $data->og_description : $data->short_desc }}">
	<meta name="twitter:image" content="{{ $data->og_image ? asset('public/media/'.$data->og_image) : asset('public/media/'.$data->thumbnail) }}">
@endsection

@section('header')
@include('frontend.partials.header')
@endsection

@section('content')
<main class="main">
	<!-- Page Breadcrumb -->
	<section class="breadcrumb-section" style="background-image: url({{ $data->cover_img ? asset('public/media/'.$data->cover_img) : '' }});">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-card">
						<h2>{{ $data->title }}</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
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
				<div class="col-12 col-md-12 col-lg-8">
					<div class="room-details-slider pd-slider-for">
						@if(count($room_images)>0)
						@foreach ($room_images as $key => $row)
						<div class="item">
							<img src="{{ asset('public/media/'.$row->thumbnail) }}" alt="{{ $key }}" />
						</div>
						@endforeach
						@else
						<div class="item">
							<img src="{{ asset('public/media/'.$data->thumbnail) }}" alt="{{ $data->title }}" />
						</div>
						@endif
					</div>
					<div class="thumbnail-card pd-slider-nav">
						@if(count($room_images)>0)
						@foreach ($room_images as $key => $row)
						<img src="{{ asset('public/media/'.$row->thumbnail) }}" alt="{{ $key }}" />
						@endforeach
						@else
						<img src="{{ asset('public/media/'.$data->thumbnail) }}" alt="{{ $data->title }}" />
						@endif
					</div>
					<div class="room-details-card">
						<div class="item-title">
							<h3>{{ $data->title }}</h3>
						</div>
						<div class="pric-card">
							@if($data->price != '')
								@if($gtext['currency_position'] == 'left')
								<div class="new-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($data->price) }}</div>
								@else
								<div class="new-price">{{ NumberFormat($data->price) }}{{ $gtext['currency_icon'] }}</div>
								@endif
							@endif
							@if(($data->is_discount == 1) && ($data->old_price !=''))
								@if($gtext['currency_position'] == 'left')
								<div class="old-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($data->old_price) }}</div>
								@else
								<div class="old-price">{{ NumberFormat($data->old_price) }}{{ $gtext['currency_icon'] }}</div>
								@endif
							@endif
							<div class="per-day-night">/ {{ __('Night') }}</div>
						</div>
						<ul class="item-meta">
							<li>{{ __('Adult') }} {{ $data->total_adult }}</li>
							<li>{{ __('Child') }} {{ $data->total_child }}</li>
						</ul>
						<div class="item-cat">
							<strong>{{ __('Category') }}:</strong> <a href="{{ route('frontend.category', [$data->cat_id, $data->category_slug]) }}">{{ $data->category_name }}</a>
						</div>
						<a href="{{ route('frontend.checkout', [$data->id, md5($data->slug)]) }}" class="btn theme-btn booknow-btn">{{ __('Book Now') }}</a>
						<div class="share_this">
							<h4 class="details-title">{{ __('Share this') }}</h4>
							<div class="social-media">
								<a href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.room', [$data->id, $data->slug]) }}" target="_blank"><i class="bi bi-facebook"></i></a>
								<a href="https://twitter.com/intent/tweet?text={{ $data->title }}&url={{ route('frontend.room', [$data->id, $data->slug]) }}" target="_blank"><i class="bi bi-twitter"></i></a>
								<a href="http://www.linkedin.com/shareArticle?mini=true&url={{ route('frontend.room', [$data->id, $data->slug]) }}&title={{ $data->title }}&summary={{ $data->title }}" target="_blank"><i class="bi bi-linkedin"></i></a>
								<a href="https://wa.me/?text={{ route('frontend.room', [$data->id, $data->slug]) }}" target="_blank"><i class="bi bi-whatsapp"></i></a>
							</div>
						</div>
					</div>
					@if($data->description != '')
					<div class="room-details-card">
						<h4 class="details-title">{{ __('Description') }}</h4>
						<div class="entry">
							@php echo $data->description; @endphp
						</div>
					</div>
					@endif

					@if($data->amenities != '')
					<div class="room-details-card">
						<h4 class="details-title">{{ __('Amenities') }}</h4>
						<ul class="details-list">@php echo $data->amenities; @endphp</ul>
					</div>
					@endif

					@if($data->complements != '')
					<div class="room-details-card">
						<h4 class="details-title">{{ __('Complements') }}</h4>
						<ul class="details-list">@php echo $data->complements; @endphp</ul>
					</div>
					@endif

					@if($data->beds != '')
					<div class="room-details-card">
						<h4 class="details-title">{{ __('Beds') }}</h4>
						<ul class="details-list">@php echo $data->beds; @endphp</ul>
					</div>
					@endif
				</div>

				<div class="col-12 col-md-12 col-lg-4">
					<div class="sidebar">
						@if($gtext['is_publish_contact'] == 1)
						<div class="widget-card">
							<div class="widget-title">{{ __('Contact') }}</div>
							<div class="widget-body">
								<p>{{ __('If you need any help, feel free to contact us.') }}</p>

								@if($gtext['phone_footer'] != '')
								<p><strong>{{ __('Phone') }}:</strong> {{ $gtext['phone_footer'] }}</p>
								@endif

								@if($gtext['email_footer'] != '')
								<p><strong>{{ __('Email') }}:</strong> {{ $gtext['email_footer'] }}</p>
								@endif

								@if($gtext['address_footer'] != '')
								<p class="mb0"><strong>{{ __('Address') }}:</strong> {{ $gtext['address_footer'] }}</p>
								@endif
							</div>
						</div>
						@endif

						@if(count($room_images)>0)
						<div class="widget-card">
							<div class="widget-title">Gallery View</div>
							<div class="widget-body">
								<ul class="gallery-card room_gallery_view">
								@foreach ($room_images as $key => $row)
									<li>
										<a href="{{ asset('public/media/'.$row->thumbnail) }}">
											<img src="{{ asset('public/media/'.$row->thumbnail) }}" alt="{{ $key }}" />
										</a>
									</li>
								@endforeach
								</ul>
							</div>
						</div>
						@endif
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
