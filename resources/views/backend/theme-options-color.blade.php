@extends('layouts.backend')

@section('title', __('Color'))

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
								{{ __('Color') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.theme_options_tabs_nav')
						<div class="tabs-body">
							<!--Data Entry Form-->
							<form novalidate="" data-validate="parsley" id="DataEntry_formId">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group">
											<label>{{ __('Theme color') }}<span class="red">*</span></label>
											<div id="theme_color_picker" class="input-group tw-picker">
												<input name="theme_color" id="theme_color" type="text" value="{{ $datalist['theme_color'] == '' ? '#fd5056' : $datalist['theme_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('Light Color') }}<span class="red">*</span></label>
											<div id="light_color_picker" class="input-group tw-picker">
												<input name="light_color" id="light_color" type="text" value="{{ $datalist['light_color'] == '' ? '#f9353d' : $datalist['light_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('Blue Color') }}<span class="red">*</span></label>
											<div id="blue_color_picker" class="input-group tw-picker">
												<input name="blue_color" id="blue_color" type="text" value="{{ $datalist['blue_color'] == '' ? '#2d1268' : $datalist['blue_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('Gray Color') }}<span class="red">*</span></label>
											<div id="gray_color_picker" class="input-group tw-picker">
												<input name="gray_color" id="gray_color" type="text" value="{{ $datalist['gray_color'] == '' ? '#8d949d' : $datalist['gray_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('Dark Gray Color') }}<span class="red">*</span></label>
											<div id="dark_gray_color_picker" class="input-group tw-picker">
												<input name="dark_gray_color" id="dark_gray_color" type="text" value="{{ $datalist['dark_gray_color'] == '' ? '#595959' : $datalist['dark_gray_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('Gray 400 Color') }}<span class="red">*</span></label>
											<div id="gray400_color_picker" class="input-group tw-picker">
												<input name="gray400_color" id="gray400_color" type="text" value="{{ $datalist['gray400_color'] == '' ? '#e7e7e7' : $datalist['gray400_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('Gray 500 Color') }}<span class="red">*</span></label>
											<div id="gray500_color_picker" class="input-group tw-picker">
												<input name="gray500_color" id="gray500_color" type="text" value="{{ $datalist['gray500_color'] == '' ? '#fbfbfb' : $datalist['gray500_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('Black Color') }}<span class="red">*</span></label>
											<div id="black_color_picker" class="input-group tw-picker">
												<input name="black_color" id="black_color" type="text" value="{{ $datalist['black_color'] == '' ? '#232424' : $datalist['black_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('White Color') }}<span class="red">*</span></label>
											<div id="white_color_picker" class="input-group tw-picker">
												<input name="white_color" id="white_color" type="text" value="{{ $datalist['white_color'] == '' ? '#ffffff' : $datalist['white_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

										<div class="form-group">
											<label>{{ __('Backend Theme color') }}<span class="red">*</span></label>
											<div id="backend_theme_color_picker" class="input-group tw-picker">
												<input name="backend_theme_color" id="backend_theme_color" type="text" value="{{ $datalist['backend_theme_color'] == '' ? '#2d1268' : $datalist['backend_theme_color'] }}" class="form-control"/>
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>

									</div>
									<div class="col-lg-4"></div>
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

@endsection

@push('scripts')
<!-- css/js -->
<link rel="stylesheet" href="{{asset('public/backend/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
<script src="{{asset('public/backend/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('public/backend/pages/theme_option_color.js')}}"></script>
@endpush
