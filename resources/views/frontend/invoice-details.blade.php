@extends('layouts.frontend')

@section('title', __('Invoice Details'))
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
	<section class="breadcrumb-section" style="background-image: url({{ $gtext['booking_bg'] ? asset('public/media/'.$gtext['booking_bg']) : '' }});">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-card">
						<h2>{{ __('Invoice Details') }}</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ __('Invoice Details') }}</li>
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
			<div class="row my-dashbord">
				<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
					@include('frontend.partials.my-dashbord-sidebar')
				</div>
				<div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
					<div class="my_card">
						<div class="row">
							<div class="col-lg-12">
								<div class="row mb10">
									<div class="col-lg-6 mb10">
										<h5>{{ __('BILL TO') }}:</h5>
										<p class="mb5"><strong>{{ $mdata['customer_name'] }}</strong></p>
										<p class="mb5">{{ $mdata['customer_address'] }}</p>
										<p class="mb5">{{ $mdata['city'] }}, {{ $mdata['state'] }}, {{ $mdata['country'] }}</p>
										<p class="mb5">{{ $mdata['customer_email'] }}</p>
										<p class="mb5">{{ $mdata['customer_phone'] }}</p>
									</div>
									<div class="col-lg-6 mb10 order_status">
										<p class="mb10"><strong>{{ __('Booking No') }}</strong>: {{ $mdata['booking_no'] }}</p>
										<p class="mb10"><strong>{{ __('Booking Date') }}</strong>: {{ date('d-m-Y', strtotime($mdata['created_at'])) }}</p>
										<p class="mb10"><strong>{{ __('Payment Method') }}</strong>: {{ $mdata['method_name'] }}</p>
										<p class="mb10"><strong>{{ __('Payment Status') }}</strong>: <span class="status_btn pstatus_{{ $mdata['payment_status_id'] }}">{{ $mdata['pstatus_name'] }}</span></p>
										<p class="mb10"><strong>{{ __('Booking Status') }}</strong>: <span class="status_btn ostatus_{{ $mdata['booking_status_id'] }}">{{ $mdata['bstatus_name'] }}</span></p>
									</div>
								</div>
								<div class="row mt15">
									<div class="col-lg-12">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th>{{ __('Room Type') }}</th>
														<th class="text-center">{{ __('Total Room') }}</th>
														<th class="text-center">{{ __('Price') }}</th>
														<th class="text-center">{{ __('In / Out Date') }}</th>
														<th class="text-center">{{ __('Total Days') }}</th>
														<th class="text-center">{{ __('Total') }}</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>{{ $mdata['title'] }}</td>
														<td class="text-center">{{ $mdata['total_room'] }}</td>
														<td class="text-center">@php echo $pdata['total_price']; @endphp @php echo $pdata['old_price']; @endphp</td>
														<td class="text-center">@php echo date('d-m-Y', strtotime($mdata['in_date'])); @endphp <br>to<br> @php echo date('d-m-Y', strtotime($mdata['out_date'])); @endphp</td>
														<td class="text-center">{{ $pdata['total_days'] }}</td>
														<td class="text-center">@php echo $pdata['subtotal']; @endphp @php echo $pdata['cal_old_price']; @endphp</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-7 mt10">
										<p><strong>{{ $pdata['assign_rooms'] }}</strong></p>
									</div>
									<div class="col-lg-5 mt10">
										<table class="table total-price-card">
											<tbody>
												<tr><td class="border_none"><span class="title">{{ __('Subtotal') }}</span><span class="price">{{ $pdata['subtotal'] }}</span></td></tr>
												<tr><td><span class="title">{{ __('Tax') }}</span><span class="price">{{ $pdata['tax'] }}</span></td></tr>
												<tr><td><span class="title">{{ __('Discount') }}</span><span class="price">{{ $pdata['discount'] }}</span></td></tr>
												<tr><td><span class="title">{{ __('Grand Total') }}</span><span class="price">{{ $pdata['total_amount'] }}</span></td></tr>
											</tbody>
										</table>
									</div>
								</div>
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
<script type="text/javascript">
	var my_dashbord_href = location.href;
	var my_dashbord_elem = '.sidebar-nav li a[href="' + my_dashbord_href + '"]';
	$('ul.sidebar-nav li').parent().removeClass('active');
	$('ul.sidebar-nav li a').parent().removeClass('active');
	$(my_dashbord_elem).addClass('active');
</script>
@endpush	