@extends('layouts.frontend')

@section('title', $data->title)
@php $gtext = gtext(); @endphp

@section('meta-content')
	<meta name="keywords" content="{{ $data->og_keywords }}" />
	<meta name="description" content="{{ $data->og_description }}" />
	<meta property="og:title" content="{{ $data->og_title ? $data->og_title : $data->title }}" />
	<meta property="og:site_name" content="{{ $gtext['site_name'] }}" />
	<meta property="og:description" content="{{ $data->og_description }}" />
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
	<meta name="twitter:description" content="{{ $data->og_description }}">
	<meta name="twitter:image" content="{{ $data->og_image ? asset('public/media/'.$data->og_image) : asset('public/media/'.$data->thumbnail) }}">
@endsection

@section('header')
@include('frontend.partials.header')
@endsection

@section('content')
<main class="main">
	<!-- Page Breadcrumb -->
	<section class="breadcrumb-section" style="background-image:  url({{ $data->thumbnail ? asset('public/media/'.$data->thumbnail) : asset('public/frontend/images/breadcrumb_bg.jpg') }});">
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
					<div class="blog-details-card">
						<div class="blog-img">
							<img src="{{ asset('public/media/'.$data->thumbnail) }}" alt="{{ $data->title }}" />
						</div>
						<div class="blog-content">
							<div class="blog-meta-card">
								<div class="blog-date"><i class="bi bi-alarm"></i>{{ date('d M , Y', strtotime($data->created_at)) }}</div>
								<div class="blog-meta"><i class="bi bi-person"></i>{{ __('By') }}, {{ $data->name }}</div>
							</div>
							<div class="blog-title">
								<h3>{{ $data->title }}</h3>
							</div>
							<div class="articles">
								<div class="entry">
									@php echo $data->description; @endphp
								</div>
							</div>
						</div>
						<div class="share_this">
							<div class="share-title">
								<h5>{{ __('Share this') }}</h5>
							</div>
							<div class="social-media">
								<a href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.article', [$data->id, $data->slug]) }}" target="_blank"><i class="bi bi-facebook"></i></a>
								<a href="https://twitter.com/intent/tweet?text={{ $data->title }}&url={{ route('frontend.article', [$data->id, $data->slug]) }}" target="_blank"><i class="bi bi-twitter"></i></a>
								<a href="http://www.linkedin.com/shareArticle?mini=true&url={{ route('frontend.article', [$data->id, $data->slug]) }}&title={{ $data->title }}&summary={{ $data->title }}" target="_blank"><i class="bi bi-linkedin"></i></a>
								<a href="https://wa.me/?text={{ route('frontend.article', [$data->id, $data->slug]) }}" target="_blank"><i class="bi bi-whatsapp"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-4">
					<div class="sidebar">
						<div class="widget-card">
							<div class="widget-title">{{ __('Blog Categories') }}</div>
							<div class="widget-body">
								<ul class="widget-list">
									@foreach ($blog_categories_list as $row)
									<li>
										<div class="desc">
											<a href="{{ route('frontend.blog-category', [$row->id, $row->slug]) }}">{{ $row->name }}</a>
										</div>
										<div class="count">{{ $row->TotalProduct }}</div>
									</li>
									@endforeach
								</ul>
							</div>	
						</div>
						
						<div class="widget-card">
							<div class="widget-title">{{ __('Latest Blog') }}</div>
							<div class="widget-body">
								@foreach ($datalist as $row)
								<div class="latest_blog_card">
									<div class="blog_img">
										<a href="{{ route('frontend.article', [$row->id, $row->slug]) }}">
											<img src="{{ asset('public/media/'.$row->thumbnail) }}" alt="{{ $row->title }}">
										</a>
									</div>
									<div class="blog_content">
										<h6><a href="{{ route('frontend.article', [$row->id, $row->slug]) }}">{{ $row->title }}</a></h6>
										<div class="blog_date">{{ date('d M , Y', strtotime($row->created_at)) }}</div>
									</div>
								</div>
								@endforeach
							</div>	
						</div>
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