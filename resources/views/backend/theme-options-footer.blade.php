@extends('layouts.backend')

@section('title', __('Footer'))

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
								{{ __('Footer') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.theme_options_tabs_nav')
						<div class="tabs-body">
							<!--Data Entry Form-->
							<form novalidate="" data-validate="parsley" id="DataEntry_formId">
								<div class="divider_heading">{{ __('About Us') }}</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="about_logo">{{ __('Logo') }}</label>
											<div class="tp-upload-field">
												<input type="text" value="{{ $datalist['payment_gateway_icon'] }}" name="about_logo" id="about_logo" class="form-control" readonly>
												<a id="on_about_logo" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<div id="remove_about_logo" class="select-image dnone">
												<div class="inner-image" id="view_about_logo">
												</div>
												<a onClick="onMediaImageRemove('about_logo')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="about_desc">{{ __('About Us') }}</label>
											<textarea name="about_desc" id="about_desc" class="form-control" rows="2">{{ $datalist['about_desc'] }}</textarea>
										</div>
									</div>
								</div>

								<div class="row">	
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish_about">{{ __('Status') }}</label>
											<select name="is_publish_about" id="is_publish_about" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish_about'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div>
							
							
								<div class="divider_heading">{{ __('Contact Us') }}</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('Address') }}</label>
											<input value="{{ $datalist['address'] }}" type="text" name="address" id="address" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="email">{{ __('Email') }}</label>
											<input value="{{ $datalist['email'] }}" type="text" name="email" id="email" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('Phone') }}</label>
											<input value="{{ $datalist['phone'] }}" type="text" name="phone" id="phone" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">	
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish_contact">{{ __('Status') }}</label>
											<select name="is_publish_contact" id="is_publish_contact" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish_contact'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div>
								
								<div class="divider_heading">{{ __('Copyright') }}</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="copyright">{{ __('Copyright') }}</label>
											<input value="{{ $datalist['copyright'] }}" type="text" name="copyright" id="copyright" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish_copyright">{{ __('Status') }}</label>
											<select name="is_publish_copyright" id="is_publish_copyright" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish_copyright'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div>
								
								<div class="divider_heading">{{ __('Payment Gateway Icon') }}</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="payment_gateway_icon">{{ __('Payment Gateway Icon') }}</label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['payment_gateway_icon'] }}" type="text" name="payment_gateway_icon" id="payment_gateway_icon" class="form-control" readonly>
												<a id="on_payment_gateway_icon" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended image size height:22px.</em>
											<div id="remove_payment_gateway_icon" class="select-image dnone">
												<div class="inner-image" id="view_payment_gateway_icon">
												</div>
												<a onClick="onMediaImageRemove('payment_gateway_icon')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish_payment">{{ __('Status') }}</label>
											<select name="is_publish_payment" id="is_publish_payment" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish_payment'] ? "selected=selected" : '' }} value="{{ $row->id }}">
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

<!--Global Media-->
@include('backend.partials.global_media')
<!--/Global Media/-->

@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var media_type = 'Thumbnail';

var about_logo = "{{ $datalist['about_logo'] }}";
if(about_logo == ''){
	$("#remove_about_logo").hide();
	$("#about_logo").html('');
}
if(about_logo != ''){
	$("#remove_about_logo").show();
	$("#view_about_logo").html('<img src="'+public_path+'/media/'+about_logo+'">');
}

var payment_gateway_icon = "{{ $datalist['payment_gateway_icon'] }}";
if(payment_gateway_icon == ''){
	$("#remove_payment_gateway_icon").hide();
	$("#payment_gateway_icon").html('');
}
if(payment_gateway_icon != ''){
	$("#remove_payment_gateway_icon").show();
	$("#view_payment_gateway_icon").html('<img src="'+public_path+'/media/'+payment_gateway_icon+'">');
}
</script>
<script src="{{asset('public/backend/pages/theme_option_footer.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush