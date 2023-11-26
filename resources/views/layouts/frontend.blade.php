<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! $gtext['is_rtl'] == 1 ? 'dir="rtl"' : '' !!}>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@php 
	$PageVariation = PageVariation();
	$gtext = gtext(); 
	@endphp
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>@yield('title')</title>
	@yield('meta-content')
	@if($gtext['fb_pixel_publish'] == 1)
	<!-- Facebook Pixel Code -->
	<script>
	  !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', '{{ $gtext["fb_pixel_id"] }}');
	  fbq('track', 'PageView');
	</script>
	<noscript>
	  <img height="1" width="1" style="display:none" 
		   src="https://www.facebook.com/tr?id={{ $gtext['fb_pixel_id'] }}&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
	@endif
	
	@if($gtext['ga_publish'] == 1)
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtext['tracking_id'] }}"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '{{ $gtext["tracking_id"] }}');
	</script>
	@endif

	@if($gtext['gtm_publish'] == 1)
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','{{ $gtext["google_tag_manager_id"] }}');</script>
	<!-- End Google Tag Manager -->	
	@endif
	<!--favicon-->
	<link rel="shortcut icon" href="{{ $gtext['favicon'] ? asset('public/media/'.$gtext['favicon']) : asset('public/backend/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ $gtext['favicon'] ? asset('public/media/'.$gtext['favicon']) : asset('public/backend/images/favicon.ico') }}" type="image/x-icon">
	<!-- css -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&family=Spartan:wght@400;500;700;800;900&display=swap" rel="stylesheet">

	@if($gtext['is_rtl'] == 1)
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&family=Spartan:wght@400;500;700;800;900&display=swap" rel="stylesheet">
	<link href="{{asset('public/frontend/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/rtl.css')}}" rel="stylesheet">
	@else
	<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	@endif
	<link href="{{asset('public/frontend/css/bootstrap-icons.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/slick.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/jquery.gritter.min.css')}}" rel="stylesheet">
	<style type="text/css">
		:root {
			--theme-color: {{ $gtext['theme_color'] }};
			--color-light: {{ $gtext['light_color'] }};
			--color-blue: {{ $gtext['blue_color'] }};
			--color-gray: {{ $gtext['gray_color'] }};
			--color-gray-dark: {{ $gtext['dark_gray_color'] }};
			--color-gray-400: {{ $gtext['gray400_color'] }};
			--color-gray-500: {{ $gtext['gray500_color'] }};
			--color-black: {{ $gtext['black_color'] }};
			--color-white: {{ $gtext['white_color'] }};
			--primary-font-family: 'Roboto', sans-serif;
			--secondary-font-family: 'Spartan', sans-serif;
			--arabic-font-family: 'Noto Kufi Arabic', sans-serif;
		}
	</style>
	<link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	@stack('style')
	@if($gtext['custom_css'] != '')
	<style type="text/css">
	@php echo $gtext['custom_css']; @endphp
	</style>
	@endif
</head>
<body {!! $gtext['is_rtl'] == 1 ? 'class="rtl"' : '' !!}>
	@if($gtext['gtm_publish'] == 1)
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtext['google_tag_manager_id'] }}"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	@endif
	<!--loader-->
	<div class="tw-loader">
		<div class="tw-ellipsis">
			<div></div><div></div><div></div><div></div>
		</div>						
	</div>
	<!--/loader/--> 
	<!-- scrollToTop -->	
	<a href="#top" class="scroll-to-top">
		<i class="bi bi-arrow-up"></i>
	</a>
	<!-- /scrollToTop -->

	@yield('header')
	@yield('content')
	@include('frontend.partials.footer')

	@if($gtext['is_publish_cookie_consent'] == 1)
	<div class="cookie_consent_card {{ $gtext['cookie_style'] }} {{ $gtext['cookie_position'] }}">
		@if($gtext['cookie_title'] != '')
		<h4 class="cookie_consent_head">{{ $gtext['cookie_title'] }} </h4>
		@endif
		@if($gtext['cookie_message'] != '')
		<div class="cookie_consent_text">{{ $gtext['cookie_message'] }} 
			@if($gtext['learn_more_text'] != '')
			<a href="{{ $gtext['learn_more_url'] }}">{{ $gtext['learn_more_text'] }}</a>
			@endif
		</div>
		@endif
		@if($gtext['button_text'] != '')
		<button class="btn accept_btn">{{ $gtext['button_text'] }}</button>
		@endif
	</div>
	@endif

	<!-- js -->
	<script src="{{ asset('public/frontend/js/jquery-3.6.3.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/popper.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/plugins.js') }}"></script>
	<script>
		var is_rtl = "{{ $gtext['is_rtl'] }}";
		if(is_rtl == 1){
			var isRTL = true;
		}else{
			var isRTL = false;
		}

		var theme_color = "{{ $gtext['theme_color'] }}";
		var base_url = "{{ url('/') }}";
		var public_path = "{{ asset('public') }}";
		
		//Cookie Consent
		var is_publish_cookie_consent = "{{ $gtext['is_publish_cookie_consent'] }}";
		if(is_publish_cookie_consent == 1){
			let cookieModal = document.querySelector(".cookie_consent_card");
			let acceptCookieBtn = document.querySelector(".accept_btn");

			acceptCookieBtn.addEventListener("click", function (){
				cookieModal.classList.remove("active");
				localStorage.setItem("cookie_consent", 1);
			});

			let cookieAccepted = localStorage.getItem("cookie_consent");
			if (cookieAccepted == 1){
				cookieModal.classList.remove("active");
			}else{
				cookieModal.classList.add("active");
			}
		}
	</script>
	<script src="{{ asset('public/frontend/js/scripts.js')}}"></script>
	<div class="custom-popup light width-100 dnone" id="lightCustomModal">
		<div class="padding-md">
			<h4 class="m-top-none"></h4>
		</div>
		<div class="text-center">
			<a href="javascript:void(0);" class="btn blue-btn lightCustomModal_close mr-10" onClick="onConfirm()">{{ __('Confirm') }}</a>
			<a href="javascript:void(0);" class="btn danger-btn lightCustomModal_close">{{ __('Cancel') }}</a>
		</div>
	</div>
	<a href="#lightCustomModal" class="btn btn-warning btn-small lightCustomModal_open dnone">{{ __('Edit') }}</a>
	@stack('scripts')
	@if($gtext['custom_js'] != '')
	<script>
	@php echo $gtext['custom_js']; @endphp
	</script>
	@endif
</body>
</html>
	