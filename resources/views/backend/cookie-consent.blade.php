@extends('layouts.backend')

@section('title', __('Cookie Consent'))

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
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								{{ __('Cookie Consent') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.theme_options_tabs_nav')
						<div class="tabs-body">
							<!--Data Entry Form-->
							<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="title">{{ __('Title') }}</label>
											<input value="{{ $datalist['title'] }}" type="text" name="title" id="title" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="message">{{ __('Message') }}</label>
											<input value="{{ $datalist['message'] }}" type="text" name="message" id="message" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="button_text">{{ __('Button Text') }}</label>
											<input value="{{ $datalist['button_text'] }}" type="text" name="button_text" id="button_text" class="form-control">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="learn_more_url">{{ __('Learn More URL') }}</label>
											<input value="{{ $datalist['learn_more_url'] }}" type="text" name="learn_more_url" id="learn_more_url" class="form-control">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="learn_more_text">{{ __('Learn More Text') }}</label>
											<input value="{{ $datalist['learn_more_text'] }}" type="text" name="learn_more_text" id="learn_more_text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-md-4">
										<div class="form-group">
											<label for="position">{{ __('Position') }}</label>
											<select name="position" id="position" class="chosen-select form-control">
												<option {{ 'left' == $datalist['position'] ? "selected=selected" : '' }} value="left">Left</option>
												<option {{ 'right' == $datalist['position'] ? "selected=selected" : '' }} value="right">Right</option>
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div>
								<div class="row">	
									<div class="col-md-4">
										<div class="form-group">
											<label for="style">{{ __('Style') }}</label>
											<select name="style" id="style" class="chosen-select form-control">
												<option {{ 'fullwidth' == $datalist['style'] ? "selected=selected" : '' }} value="fullwidth">Full width</option>
												<option {{ 'minimal' == $datalist['style'] ? "selected=selected" : '' }} value="minimal">Minimal</option>
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div>
								<div class="row">	
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish">{{ __('Status') }}</label>
											<select name="is_publish" id="is_publish" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div>
								<div class="row tabs-footer mt-15">
									<div class="col-lg-12">
										<a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a>
									</div>
								</div>
							</form>
							<!--/Data Entry Form/-->
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
<!-- css/js -->
<script src="{{asset('public/backend/pages/cookie_consent.js')}}"></script>
@endpush