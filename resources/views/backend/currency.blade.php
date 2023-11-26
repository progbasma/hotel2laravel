@extends('layouts.backend')

@section('title', __('Currency'))

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
							<div class="col-lg-6">
								<span>{{ __('Currency') }}</span>
							</div>
							<div class="col-lg-6"></div>
						</div>
					</div>

					<!--Data Entry Form-->
					<div class="card-body">
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="currency_name">{{ __('Currency Name') }}<span class="red">*</span></label>
										<input value="{{ $datalist['currency_name'] }}" type="text" name="currency_name" id="currency_name" class="form-control parsley-validated" data-required="true" placeholder="USD">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="currency_icon">{{ __('Currency Icon') }}<span class="red">*</span></label>
										<input value="{{ $datalist['currency_icon'] }}" type="text" name="currency_icon" id="currency_icon" class="form-control parsley-validated" data-required="true" placeholder="$">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="currency_position">{{ __('Currency Position') }}<span class="red">*</span></label>
										<select name="currency_position" id="currency_position" class="chosen-select form-control">
											<option {{ 'left' == $datalist['currency_position'] ? "selected=selected" : '' }} value="left">Left</option>
											<option {{ 'right' == $datalist['currency_position'] ? "selected=selected" : '' }} value="right">Right</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="thousands_separator">{{ __('Thousands Separator') }}<span class="red">*</span></label>
										<select name="thousands_separator" id="thousands_separator" class="chosen-select form-control">
											<option {{ 'comma' == $datalist['thousands_separator'] ? "selected=selected" : '' }} value="comma">Comma (,)</option>
											<option {{ 'point' == $datalist['thousands_separator'] ? "selected=selected" : '' }} value="point">Point (.)</option>
											<option {{ 'space' == $datalist['thousands_separator'] ? "selected=selected" : '' }} value="space">Space ( )</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="decimal_separator">{{ __('Decimal Separator') }}<span class="red">*</span></label>
										<select name="decimal_separator" id="decimal_separator" class="chosen-select form-control">
											<option {{ 'point' == $datalist['decimal_separator'] ? "selected=selected" : '' }} value="point">Point (.)</option>
											<option {{ 'comma' == $datalist['decimal_separator'] ? "selected=selected" : '' }} value="comma">Comma (,)</option>
											<option {{ 'space' == $datalist['decimal_separator'] ? "selected=selected" : '' }} value="space">Space ( )</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="decimal_digit">{{ __('Decimal Digit') }}<span class="red">*</span></label>
										<select name="decimal_digit" id="decimal_digit" class="chosen-select form-control">
											<option {{ '0' == $datalist['decimal_digit'] ? "selected=selected" : '' }} value="0">Digit (0)</option>
											<option {{ '1' == $datalist['decimal_digit'] ? "selected=selected" : '' }} value="1">Digit (1)</option>
											<option {{ '2' == $datalist['decimal_digit'] ? "selected=selected" : '' }} value="2">Digit (2)</option>
											<option {{ '3' == $datalist['decimal_digit'] ? "selected=selected" : '' }} value="3">Digit (3)</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="row tabs-footer mt-15">
								<div class="col-lg-12">
									<a id="submit-form" href="javascript:void(0);" class="btn blue-btn mr-10">{{ __('Save') }}</a>
								</div>
							</div>
						</form>
					</div>
					<!--/Data Entry Form/-->
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
<script src="{{asset('public/backend/pages/currency.js')}}"></script>
@endpush