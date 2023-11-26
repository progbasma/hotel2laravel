@extends('layouts.backend')

@section('title', __('Multiple Images'))

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
								{{ __('Multiple Images') }}
							</div>
							<div class="col-lg-6">
								<div class="float-right">
									<a href="{{ route('backend.room-type') }}" class="btn warning-btn"><i class="fa fa-reply"></i> {{ __('Back to List') }}</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.room_tabs_nav')
						<div class="tabs-body">
							<!--Data Entry Form-->
							<form novalidate="" data-validate="parsley" id="DataEntry_formId">
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="pro_thumbnail">{{ __('Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input type="text" name="thumbnail" id="pro_thumbnail" class="form-control" readonly>
												<a onClick="onGlobalMediaModalView()" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<input type="text" name="large_image" id="pro_large_image" class="dnone">
											<em>Recommended image size width: 900px and height: 700px.</em>
										</div>
									</div>
									<div class="col-md-4"></div>
								</div>
								<div class="row mt-15">
									<div class="col-lg-12">
										<a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a>
									</div>
								</div>
							</form>
							<!--/Data Entry Form/-->
							
							<!--Image list-->
							<div id="tp_datalist">
								@include('backend.partials.room_images_list')
							</div>
							<!--/Image list/-->
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
var media_type = 'Product_Multiple_Image';
var room_id = "{{ $datalist['id'] }}";
var TEXT = [];
	TEXT['Do you really want to delete this record'] = "{{ __('Do you really want to delete this record') }}";
</script>
<script src="{{asset('public/backend/pages/room_images.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush