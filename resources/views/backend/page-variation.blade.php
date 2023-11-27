@extends('layouts.backend')

@section('title', __('Page Variation'))

@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">

		<div class="row mt-25">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								{{ __('Page Variation') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.theme_options_tabs_nav')
						<div class="tabs-body">
							<div class="divider_heading">{{ __('Homepage Variation') }}</div>
							<div class="row">
								<div class="col-lg-3 mb-30">
									<div class="theme-view-card">
										<div class="theme-image">
											<img src="{{asset('public/backend/images/home-1.jpg')}}" />
										</div>
										<div class="theme-footer">
											<div class="theme-title">Home Page 1</div>
											<a id="home_variation_home_1" onclick="onHomepageVariations('home_1', 'home')" href="javascript:void(0);" class="active-btn home_variation {{ $datalist['home_variation'] =='home_1' ? 'active' : '' }}">{{ $datalist['home_variation'] =='home_1' ? __('Activated') : __('Activate') }}</a>
										</div>
									</div>
								</div>
								<div class="col-lg-3 mb-30">
									<div class="theme-view-card dnone">
										<div class="theme-image">
											<img src="{{asset('public/backend/images/home-2.jpg')}}" />
										</div>
										<div class="theme-footer">
											<div class="theme-title">Home Page 2</div>
											<a id="home_variation_home_2" onclick="onHomepageVariations('home_2', 'home')" href="javascript:void(0);" class="active-btn home_variation {{ $datalist['home_variation'] =='home_2' ? 'active' : '' }}">{{ $datalist['home_variation'] =='home_2' ? __('Activated') : __('Activate') }}</a>
										</div>
									</div>
								</div>

								<div class="col-lg-3 mb-30">
									<div class="theme-view-card dnone">
										<div class="theme-image">
											<img src="{{asset('public/backend/images/home-3.jpg')}}" />
										</div>
										<div class="theme-footer">
											<div class="theme-title">Home Page 3</div>
											<a id="home_variation_home_3" onclick="onHomepageVariations('home_3', 'home')" href="javascript:void(0);" class="active-btn home_variation {{ $datalist['home_variation'] =='home_3' ? 'active' : '' }}">{{ $datalist['home_variation'] =='home_3' ? __('Activated') : __('Activate') }}</a>
										</div>
									</div>
								</div>
								<div class="col-lg-3 mb-30">
									<div class="theme-view-card dnone">
										<div class="theme-image">
											<img src="{{asset('public/backend/images/home-4.jpg')}}" />
										</div>
										<div class="theme-footer">
											<div class="theme-title">Home Page 4</div>
											<a id="home_variation_home_4" onclick="onHomepageVariations('home_4', 'home')" href="javascript:void(0);" class="active-btn home_variation {{ $datalist['home_variation'] =='home_4' ? 'active' : '' }}">{{ $datalist['home_variation'] =='home_4' ? __('Activated') : __('Activate') }}</a>
										</div>
									</div>
								</div>
							</div>
							<input id="home_page_variation" type="hidden" class="dnone" value="{{ $datalist['home_variation'] }}" />
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var Activated = "{{ __('Activated') }}";
var Activate = "{{ __('Activate') }}";
</script>
<script src="{{asset('public/backend/pages/page_variation.js')}}"></script>
@endpush
