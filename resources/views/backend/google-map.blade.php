@extends('layouts.backend')

@section('title', __('Google Map'))

@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">
		@php $vipc = vipc(); @endphp
		@if($vipc['bkey'] == 0) 
		@include('backend.partials.vipc')
		@else
		<div class="row mt-25">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">{{ __('Settings') }}</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.settings_tabs_nav')
						<div class="tabs-body">
							<!--Google Map Setting-->
							<div id="GoogleRecaptchaSetting">
								<form novalidate="" data-validate="parsley" id="GoogleMap_formId">
									<div class="row">
										<div class="col-lg-8">
											<div class="tw_checkbox checkbox_group">
												<input id="is_googlemap" name="is_googlemap" type="checkbox" {{ $datalist['is_googlemap'] == 1 ? 'checked' : '' }}>
												<label for="is_googlemap">{{ __('Enable/Disable') }}</label>
												<span></span>
											</div>
											<div class="form-group">
												<label for="googlemap_apikey">{{ __('Site Key') }}<span class="red">*</span></label>
												<input type="text" name="googlemap_apikey" id="googlemap_apikey" class="form-control parsley-validated" data-required="true" value="{{ $datalist['googlemap_apikey'] }}">
											</div>
										</div>
										<div class="col-lg-4"></div>
									</div>
									<div class="row tabs-footer mt-15">
										<div class="col-lg-12">
											<a id="map_submit_form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a>
										</div>
									</div>
								</form>
							</div>
							<!--/Google Map Setting-->
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
<!-- /main Section -->
@endsection

@push('scripts')
<script src="{{asset('public/backend/pages/google-map.js')}}"></script>
@endpush