@extends('layouts.frontend')

@section('title', __('Booking Request'))
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
	<section class="breadcrumb-section" style="background-image: url({{ $rtdata->cover_img ? asset('public/media/'.$rtdata->cover_img) : '' }});">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-card">
						<h2>{{ __('Booking Request') }}</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ __('Booking Request') }}</li>
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
			<form novalidate="" data-validate="parsley" id="checkout_formid">
				@csrf
				<div class="row">
					<div class="col-lg-7">
						<h5>{{ __('Booking Request Information') }}</h5>
						@auth
						@else
						<p>{{ __('Already have an account?') }} <strong><a href="{{ route('frontend.login') }}">{{ __('login') }}</a></strong></p>
						@endauth
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<input id="name" name="name" type="text" placeholder="{{ __('Name') }}" value="@if(isset(Auth::user()->name)) {{ Auth::user()->name }} @endif" class="form-control parsley-validated" data-required="true">
									<span class="text-danger error-text name_error"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<input id="email" name="email" type="email" placeholder="{{ __('Email Address') }}" value="@if(isset(Auth::user()->email)) {{ Auth::user()->email }} @endif" class="form-control parsley-validated" data-required="true">
									<span class="text-danger error-text email_error"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<input id="phone" name="phone" type="text" placeholder="{{ __('Phone') }}" value="@if(isset(Auth::user()->phone)) {{ Auth::user()->phone }} @endif" class="form-control parsley-validated" data-required="true">
									<span class="text-danger error-text phone_error"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<select id="country" name="country" class="form-control parsley-validated" data-required="true">
									<option value="">{{ __('Country') }}</option>
									@foreach($country_list as $row)
									<option value="{{ $row->country_name }}">
										{{ $row->country_name }}
									</option>
									@endforeach
									</select>
									<span class="text-danger error-text country_error"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<input id="state" name="state" type="text" placeholder="{{ __('State') }}" class="form-control parsley-validated" data-required="true">
									<span class="text-danger error-text state_error"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<input id="zip_code" name="zip_code" type="text" placeholder="{{ __('Zip Code') }}" class="form-control parsley-validated" data-required="true">
									<span class="text-danger error-text zip_code_error"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<input id="city" name="city" type="text" placeholder="{{ __('City') }}" class="form-control parsley-validated" data-required="true">
									<span class="text-danger error-text city_error"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<textarea id="address" name="address" placeholder="{{ __('Address') }}" rows="2" class="form-control parsley-validated" data-required="true">@if(isset(Auth::user()->address)) {{ Auth::user()->address }} @endif</textarea>
									<span class="text-danger error-text address_error"></span>
								</div>
							</div>
						</div>
						
						@auth
						@else
						<div class="row">
							<div class="col-md-12">
								<div class="checkboxlist">
									<label class="checkbox-title">
										<input id="new_account" name="new_account" type="checkbox">{{ __('Register an account with above information?') }} 
									</label>
								</div>
								@if ($errors->has('password'))
								<span class="text-danger">{{ $errors->first('password') }}</span>
								@endif
							</div>
						</div>
						
						<div class="row hideclass" id="new_account_pass">
							<div class="col-md-6">
								<div class="mb-3">
									<input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}">
									<span class="text-danger error-text password_error"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm password') }}">
								</div>
							</div>
						</div>
						@endauth
						
						<h5 class="mt10">{{ __('Payment Method') }}</h5>
						<div class="row">
							<div class="col-md-12">
								<span class="text-danger error-text payment_method_error"></span>
								@if($gtext['stripe_isenable'] == 1)
								<div class="payment_card">
									<div class="checkboxlist">
										<label class="checkbox-title">
											<input id="payment_method_stripe" name="payment_method" type="radio" value="3"><img src="{{ asset('public/frontend/images/stripe.png') }}" alt="Stripe" />
										</label>
									</div>
									<div id="pay_stripe" class="row hideclass">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-12">
													<div class="mb-3">
														<div class="form-control" id="card-element"></div>
														<span class="card-errors" id="card-errors"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if($gtext['isenable_paypal'] == 1)
								<div class="payment_card">
									<div class="checkboxlist">
										<label class="checkbox-title">
											<input id="payment_method_paypal" name="payment_method" type="radio" value="4"><img src="{{ asset('public/frontend/images/paypal.png') }}" alt="Paypal" />
										</label>
									</div>
									<p id="pay_paypal" class="hideclass">{{ __('Pay online via Paypal') }}</p>
								</div>
								@endif
								
								@if($gtext['isenable_razorpay'] == 1)
								<div class="payment_card">
									<div class="checkboxlist">
										<label class="checkbox-title">
											<input id="payment_method_razorpay" name="payment_method" type="radio" value="5"><img src="{{ asset('public/frontend/images/razorpay.png') }}" alt="Razorpay" />
										</label>
									</div>
									<p id="pay_razorpay" class="hideclass">{{ __('Pay online via Razorpay') }}</p>
								</div>
								@endif
								
								@if($gtext['isenable_mollie'] == 1)
								<div class="payment_card">
									<div class="checkboxlist">
										<label class="checkbox-title">
											<input id="payment_method_mollie" name="payment_method" type="radio" value="6"><img src="{{ asset('public/frontend/images/mollie.png') }}" alt="Mollie" />
										</label>
									</div>
									<p id="pay_mollie" class="hideclass">{{ __('Pay online via Mollie') }}</p>
								</div>
								@endif
								
								@if($gtext['cod_isenable'] == 1)
								<div class="payment_card">
									<div class="checkboxlist">
										<label class="checkbox-title">
											<input id="payment_method_cod" name="payment_method" type="radio" value="1"><img src="{{ asset('public/frontend/images/cash_on_delivery.png') }}" alt="Cash on Delivery" />
										</label>
									</div>
									<p id="pay_cod" class="hideclass">{{ $gtext['cod_description'] }}</p>
								</div>
								@endif
								
								@if($gtext['bank_isenable'] == 1)
								<div class="payment_card">
									<div class="checkboxlist">
										<label class="checkbox-title">
											<input id="payment_method_bank" name="payment_method" type="radio" value="2"><img src="{{ asset('public/frontend/images/bank_transfer.png') }}" alt="Bank Transfer" />
										</label>
									</div>
									<p id="pay_bank" class="hideclass">{{ $gtext['bank_description'] }}</p>
								</div>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3 mt10">
									<textarea name="comments" class="form-control" placeholder="{{ __('Note') }}" rows="2"></textarea>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-5">
						<div class="sidebar">
							<div class="widget-card">
								<div class="widget-title">{{ __('Booking Summary') }}</div>
								<div class="widget-body">
									<div class="row">
										<div class="room-book-card">
											<div class="room-book-img">
												<a href="{{ route('frontend.room', [$rtdata->id, $rtdata->slug]) }}">
													<img src="{{ asset('public/media/'.$rtdata->thumbnail) }}" alt="{{ $rtdata->title }}" />
												</a>
											</div>
											<div class="room-book-content">
												<div class="room-title">
													<a href="{{ route('frontend.room', [$rtdata->id, $rtdata->slug]) }}">{{ $rtdata->title }}</a>
												</div>
												<div class="room-price">
													@if($rtdata->price != '')
														@if($gtext['currency_position'] == 'left')
														<div class="new-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($rtdata->price) }}</div>
														@else
														<div class="new-price">{{ NumberFormat($rtdata->price) }}{{ $gtext['currency_icon'] }}</div>
														@endif
													@endif
													@if(($rtdata->is_discount == 1) && ($rtdata->old_price !=''))
														@if($gtext['currency_position'] == 'left')
														<div class="old-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($rtdata->old_price) }}</div>
														@else
														<div class="old-price">{{ NumberFormat($rtdata->old_price) }}{{ $gtext['currency_icon'] }}</div>
														@endif
													@endif
													<div class="per-day-night">/ {{ __('Night') }}</div>
												</div>
												<ul class="room-meta">
													<li>{{ __('Adult') }} {{ $rtdata->total_adult }}</li>
													<li>{{ __('Child') }} {{ $rtdata->total_child }}</li>
												</ul>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-12 mb15">
											<label for="checkin_date" class="form-label">{{ __('Check In') }}</label>
											<input type="text" name="checkin_date" id="checkin_date" class="form-control parsley-validated" data-required="true" placeholder="yyyy-mm-dd">
											<span class="text-danger error-text checkin_date_error"></span>
										</div>
										<div class="col-12 mb15">
											<label for="checkout_date" class="form-label">{{ __('Check Out') }}</label>
											<input type="text" name="checkout_date" id="checkout_date" class="form-control parsley-validated" data-required="true" placeholder="yyyy-mm-dd">
											<span class="text-danger error-text checkout_date_error"></span>
										</div>
										<div class="col-12 mb15">
											<label for="room" class="form-label">{{ __('Room') }}</label>
											<input type="number" name="room" id="room" class="form-control parsley-validated" data-required="true" min="1" max="{{ $total_room }}" value="1">
											<span class="text-danger error-text room_error"></span>
										</div>
										<div class="col-12 mb15">
											<div class="r_extra">
												<strong>{{ __('Availability') }}:</strong>
												@if($total_room > 0)
												<span class="instock">{{ $total_room }} {{ __('Room') }}</span>
												@else
												<span class="stockout">{{ $total_room }} {{ __('Room') }}</span>
												@endif
											</div>
										</div>
										<div class="col-12 mb15" id="TotalPrice">
											<table class="table total-price-card">
												<tbody>
													<tr><td><span class="title">{{ __('Subtotal') }}</span><span class="price">0</span></td></tr>
													<tr><td><span class="title">{{ __('Tax') }}</span><span class="price">0</span></td></tr>
													<tr><td><span class="title">{{ __('Discount') }}</span><span class="price">0</span></td></tr>
													<tr><td><span class="title">{{ __('Total') }}</span><span class="price">0</span></td></tr>
												</tbody>
											</table>
										</div>
										<div class="col-12">
											<input name="roomtype_id" id="roomtype_id" type="hidden" value="{{ $rtdata->id }}" />
											<input name="customer_id" type="hidden" value="@if(isset(Auth::user()->id)) {{ Auth::user()->id }} @endif" />
											<input name="razorpay_payment_id" id="razorpay_payment_id" type="hidden" />
											<a id="checkout_submit_form" href="javascript:void(0);" class="btn theme-btn mt10 checkout_btn">{{ __('Send Booking Request') }}</a>

											@if(Session::has('pt_payment_error'))
											<div class="alert alert-danger">
												{{Session::get('pt_payment_error')}}
											</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							
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
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
	<!-- /Inner Section/ -->	
</main>
@endsection

@push('scripts')
<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap-fonticon.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap-datetimepicker.css')}}">
<script src="{{asset('public/frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('public/frontend/js/parsley.min.js')}}"></script>
<script type="text/javascript">
var maxRoom = "{{ $total_room }}";
var theme_color = "{{ $gtext['theme_color'] }}";
var site_name = "{{ $gtext['site_name'] }}";
var validCardNumer = 0;
var TEXT = [];
	TEXT['Please type valid card number'] = "{{ __('Please type valid card number') }}";
</script>
@if($gtext['stripe_isenable'] == 1)
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
	var isenable_stripe = "{{ $gtext['stripe_isenable'] }}";
	var stripe_key = "{{ $gtext['stripe_key'] }}";
</script>
<script src="{{asset('public/frontend/pages/payment_method.js')}}"></script>
@endif

@if($gtext['isenable_razorpay'] == 1)
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
	var isenable_razorpay = "{{ $gtext['isenable_razorpay'] }}";
	var razorpay_key_id = "{{ $gtext['razorpay_key_id'] }}";
	var razorpay_currency = "{{ $gtext['razorpay_currency'] }}";
</script>
@endif
<script src="{{asset('public/frontend/pages/checkout.js')}}"></script>
@endpush
	