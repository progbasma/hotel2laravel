@extends('layouts.backend')

@section('title', __('Section Manage'))

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
								<span>{{ __('Section Manage') }}</span>
							</div>
							<div class="col-lg-6">
								<div class="float-right">
									<a onClick="onFormPanel()" href="javascript:void(0);" class="btn blue-btn btn-form float-right"><i class="fa fa-plus"></i> {{ __('Add New') }}</a>
									<a onClick="onListPanel()" href="javascript:void(0);" class="btn warning-btn btn-list float-right dnone"><i class="fa fa-reply"></i> {{ __('Back to List') }}</a>
								</div>
							</div>
						</div>
					</div>
					<!--Data grid-->
					<div id="list-panel" class="card-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="manage_type_filter">{{ __('Manage Page') }}</label>
									<select name="manage_type_filter" id="manage_type_filter" class="chosen-select form-control">
										<option value="0" selected="selected">{{ __('All Manage Page') }}</option>
										<option value="home_1">Home Page 1</option>
										<!--<option value="home_2">Home Page 2</option>
										<option value="home_3">Home Page 3</option>
										<option value="home_4">Home Page 4</option>-->
									</select>
								</div>
							</div>
							<div class="col-md-9"></div>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group bulk-box">
									<select id="bulk-action" class="form-control">
										<option value="">{{ __('Select Action') }}</option>
										<option value="publish">{{ __('Publish') }}</option>
										<option value="draft">{{ __('Draft') }}</option>
										<option value="delete">{{ __('Delete Permanently') }}</option>
									</select>
									<button type="submit" onClick="onBulkAction()" class="btn bulk-btn">{{ __('Apply') }}</button>
								</div>
							</div>
							<div class="col-lg-3"></div>
							<div class="col-lg-5">
								<div class="form-group search-box">
									<input id="search" name="search" type="text" class="form-control" placeholder="{{ __('Search') }}...">
									<button type="submit" onClick="onSearch()" class="btn search-btn">{{ __('Search') }}</button>
								</div>
							</div>
						</div>
						<div id="tp_datalist">
							@include('backend.partials.section_manage_table')
						</div>
					</div>
					<!--/Data grid/-->
					<!--Data Entry Form-->
					<div id="form-panel" class="card-body dnone">
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="manage_type">{{ __('Manage Page') }}<span class="red">*</span></label>
										<select name="manage_type" id="manage_type" class="chosen-select form-control">
											<option value="home_1">Home Page 1</option>
											<!--<option value="home_2">Home Page 2</option>
											<option value="home_3">Home Page 3</option>
											<option value="home_4">Home Page 4</option>-->
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="section">{{ __('Section') }}<span class="red">*</span></label>
										<select name="section" id="section" class="chosen-select form-control">
											<option value="slider_hero">Slider/Hero</option>
											<option value="about_us">About Us</option>
											<option value="offer_ads">Offer & Ads</option>
											<option value="featured_rooms">Featured Rooms</option>
											<option value="our_services">Our Services</option>
											<option value="testimonial">Testimonial</option>
											<option value="our_blogs">Our Blogs</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="section_title">{{ __('Title') }}<span class="red">*</span></label>
										<input type="text" name="title" id="section_title" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="sub_title">{{ __('Sub Title') }}</label>
										<input type="text" name="desc" id="sub_title" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="section_image">{{ __('Image') }}</label>
										<div class="tp-upload-field">
											<input type="text" name="image" id="section_image" class="form-control" readonly>
											<a onClick="onGlobalMediaModalView()" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<div id="remove_section_image" class="select-image">
											<div class="inner-image" id="view_section_image"></div>
											<a onClick="onMediaImageRemove('section_image')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="is_publish">{{ __('Status') }}<span class="red">*</span></label>
										<select name="is_publish" id="is_publish" class="chosen-select form-control">
										@foreach($statuslist as $row)
											<option value="{{ $row->id }}">
												{{ $row->status }}
											</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-9"></div>
							</div>
							<input type="text" name="RecordId" id="RecordId" class="dnone">
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

<!--Global Media-->
@include('backend.partials.global_media')
<!--/Global Media/-->

@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var media_type = 'Thumbnail';
var TEXT = [];
	TEXT['Do you really want to edit this record'] = "{{ __('Do you really want to edit this record') }}";
	TEXT['Do you really want to delete this record'] = "{{ __('Do you really want to delete this record') }}";
	TEXT['Do you really want to publish this records'] = "{{ __('Do you really want to publish this records') }}";
	TEXT['Do you really want to draft this records'] = "{{ __('Do you really want to draft this records') }}";
	TEXT['Do you really want to delete this records'] = "{{ __('Do you really want to delete this records') }}";
	TEXT['Please select action'] = "{{ __('Please select action') }}";
	TEXT['Please select record'] = "{{ __('Please select record') }}";
</script>
<script src="{{asset('public/backend/pages/section_manage.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush