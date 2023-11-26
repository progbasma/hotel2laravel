@extends('layouts.backend')

@section('title', __('Subscribe Settings'))

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
					<div class="card-header">{{ __('Subscribe Settings') }}</div>
					<div class="card-body">
						<!--/Data Entry Form-->
						<form novalidate="" data-validate="parsley" id="subscribe_popup_formId">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="subscribe_title">{{ __('Title') }}<span class="red">*</span></label>
										<input type="text" value="{{ $datalist['subscribe_title'] }}" name="subscribe_title" id="subscribe_title" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
								<div class="col-md-6"></div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="subscribe_popup_desc">{{ __('Description') }}<span class="red">*</span></label>
										<textarea name="subscribe_popup_desc" id="subscribe_popup_desc" class="form-control" rows="3">{{ $datalist['subscribe_popup_desc'] }}</textarea>
									</div>
								</div>
								<div class="col-md-6"></div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="bg_image_popup">{{ __('Background Image') }} For Popup Modal<span class="red">*</span></label>
										<div class="tp-upload-field">
											<input type="text" value="{{ $datalist['bg_image_popup'] }}" name="bg_image_popup" id="bg_image_popup" class="form-control" readonly>
											<a id="on_bg_image_popup" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<em>Recommended background image size (width: 500px and height: 400px).</em>
										<div id="remove_bg_image_popup" class="select-image">
											<div class="inner-image" id="view_bg_image_popup"></div>
											<a onClick="onMediaImageRemove('bg_image_popup')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="background_image">{{ __('Background Image') }} For Footer<span class="red">*</span></label>
										<div class="tp-upload-field">
											<input type="text" value="{{ $datalist['background_image'] }}" name="background_image" id="background_image" class="form-control" readonly>
											<a id="on_background_image" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<em>Recommended background image size (width: 2400px and height: 575px).</em>
										<div id="remove_background_image" class="select-image">
											<div class="inner-image" id="view_background_image"></div>
											<a onClick="onMediaImageRemove('background_image')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label>{{ __('Subscribe Popup') }}</label>
									<div class="tw_checkbox checkbox_group">
										<input id="is_subscribe_popup" name="is_subscribe_popup" type="checkbox" {{ $datalist['is_subscribe_popup'] == 1 ? 'checked' : '' }}>
										<label for="is_subscribe_popup">{{ __('Enable/Disable') }}</label>
										<span></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label>{{ __('Footer Subscribe Section') }}</label>
									<div class="tw_checkbox checkbox_group">
										<input id="is_subscribe_footer" name="is_subscribe_footer" type="checkbox" {{ $datalist['is_subscribe_footer'] == 1 ? 'checked' : '' }}>
										<label for="is_subscribe_footer">{{ __('Enable/Disable') }}</label>
										<span></span>
									</div>
								</div>
							</div>
							<div class="row tabs-footer mt-15">
								<div class="col-lg-12">
									<a id="subscribe_popup_submit_form" href="javascript:void(0);" class="btn blue-btn mr-10">{{ __('Save') }}</a>
								</div>
							</div>
						</form>
						<!--/Data Entry Form-->
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
<!-- /main Section -->

<!--Global Media-->
@include('backend.partials.global_media')
<!--/Global Media/-->

@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var media_type = 'Thumbnail';

var bg_image_popup = "{{ $datalist['bg_image_popup'] }}";
if(bg_image_popup == ''){
	$("#remove_bg_image_popup").hide();
	$("#bg_image_popup").html('');
}
if(bg_image_popup != ''){
	$("#remove_bg_image_popup").show();
	$("#view_bg_image_popup").html('<img src="'+public_path+'/media/'+bg_image_popup+'">');
}

var background_image = "{{ $datalist['background_image'] }}";
if(background_image == ''){
	$("#remove_background_image").hide();
	$("#background_image").html('');
}
if(background_image != ''){
	$("#remove_background_image").show();
	$("#view_background_image").html('<img src="'+public_path+'/media/'+background_image+'">');
}
</script>
<script src="{{asset('public/backend/pages/newsletters.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush