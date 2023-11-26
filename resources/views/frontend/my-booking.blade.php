@extends('layouts.frontend')

@section('title', __('My Booking'))
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
						<h2>{{ __('My Booking') }}</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ __('My Booking') }}</li>
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
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="text-left" style="width:15%">{{ __('Booking No') }}</th>
												<th class="text-center" style="width:12%">{{ __('Booking Date') }}</th>
												<th class="text-center" style="width:23%">{{ __('In / Out Date') }}</th>
												<th class="text-center" style="width:10%">{{ __('Total Room') }}</th>
												<th class="text-center" style="width:15%">{{ __('Payment Status') }}</th>
												<th class="text-center" style="width:15%">{{ __('Booking Status') }}</th>
												<th class="text-center" style="width:10%">{{ __('Action') }}</th>
											</tr>
										</thead>
										<tbody>
											@if (count($datalist)>0)
											@foreach($datalist as $row)

											<tr>
												<td class="text-left">
													<p><a href="{{ route('frontend.invoice-details', [$row->id, $row->booking_no]) }}">{{ $row->booking_no }}</a></p>
													@if($row->booking_status_id == 2)
													<p class="status_card"><span class="in_running"></span>{{ __('Running') }}</p>
													@elseif($row->booking_status_id == 3)
													<p class="status_card"><span class="in_checked_out"></span>{{ __('Checked Out') }}</p>
													@else
													@endif
												</td>
												<td class="text-center">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
												<td class="text-center">{{ date('d-m-Y', strtotime($row->in_date)) }} <strong>to</strong> {{ date('d-m-Y', strtotime($row->out_date)) }}</td>
												<td class="text-center">{{ $row->total_room }}</td>
												<td class="text-center"><span class="status_btn pstatus_{{ $row->payment_status_id }}">{{ $row->pstatus_name }}</span></td>
												<td class="text-center"><span class="status_btn ostatus_{{ $row->booking_status_id }}">{{ $row->bstatus_name }}</span></td>
												<td class="text-center">
													<a title="{{ __('Invoice') }}" class="mr10" href="{{ route('frontend.invoice', [$row->id, $row->booking_no]) }}"><i class="bi bi-cloud-arrow-down"></i></a>
													<a title="{{ __('View') }}" href="{{ route('frontend.invoice-details', [$row->id, $row->booking_no]) }}"><i class="bi bi-eye"></i></a>
												</td>
											</tr>
											@endforeach
											@else
											<tr>
												<td class="text-center" colspan="7">{{ __('No data available') }}</td>
											</tr>
											@endif
										</tbody>
									</table>
								</div>
								<div class="row mt-15">
									<div class="col-lg-12">
										{{ $datalist->links() }}
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