@extends('layouts.backend')

@section('title', __('Slider/Hero Section'))

@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">

		<div class="row mt-25">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-6">
								<span>{{ __('Slider/Hero Section') }}</span>
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
									<label for="slider_type_filter">{{ __('Manage Page') }}</label>
									<select name="slider_type_filter" id="slider_type_filter" class="chosen-rtl form-control">
										<option value="0" selected="selected">{{ __('All Manage Page') }}</option>
										<option value="home_1">Home Page 1</option>
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
							@include('backend.partials.slider_table')
						</div>
					</div>
					<!--/Data grid/-->
					<!--Data Entry Form-->
					<div id="form-panel" class="card-body dnone">
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="slider_type">{{ __('Manage Page') }}<span class="red">*</span></label>
										<select name="slider_type" id="slider_type" class="chosen-rtl form-control">
											<option value="home_1">Home Page 1</option>
										</select>
									</div>
								</div>
								<div class="col-md-9"></div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="slider_title">{{ __('Title') }}<span class="red">*</span></label>
										<input type="text" name="slider_title" id="slider_title" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="sub_title">{{ __('Sub Title') }}</label>
										<input type="text" name="sub_title" id="sub_title" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="slider_image">{{ __('Thumbnail Image') }}<span class="red">*</span></label>
										<div class="tp-upload-field">
											<input type="text" name="image" id="slider_image" class="form-control" readonly>
											<a id="on_slider_image" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<em>Recommended image size width: 1000px and height: 675px.</em>
										<div id="remove_slider_image" class="select-image">
											<div class="inner-image" id="view_slider_image"></div>
											<a onClick="onMediaImageRemove('slider_image')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="button_text">{{ __('Button Text') }}</label>
										<input type="text" name="button_text" id="button_text" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="target">{{ __('Target Window') }}</label>
										<select name="target" id="target" class="chosen-rtl form-control">
											<option value="">None</option>
											<option value="_self">Self</option>
											<option value="_blank">Blank</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="image_url">{{ __('URL') }}</label>
										<input type="text" name="image_url" id="image_url" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lan">{{ __('Language') }}<span class="red">*</span></label>
                                        <select name="lan" id="lan" class="chosen-rtl form-control">
                                        @foreach($languageslist as $row)
                                            <option value="{{ $row->language_code }}">
                                                {{ $row->language_name }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="is_publish">{{ __('Status') }}<span class="red">*</span></label>
										<select name="is_publish" id="is_publish" class="chosen-rtl form-control">
										@foreach($statuslist as $row)
											<option value="{{ $row->id }}">
												{{ $row->status }}
											</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-8"></div>
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
<script src="{{asset('public/backend/pages/slider.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush
