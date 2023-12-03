@extends('layouts.backend')

@section('title', __('About Us'))

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
								<span>{{ __('About Us') }}</span>
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
									<label for="page_type_filter">{{ __('Manage Page') }}</label>
									<select name="page_type_filter" id="page_type_filter" class="chosen-rtl form-control">
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
							@include('backend.partials.about_us_table')
						</div>
					</div>
					<!--/Data grid/-->
					<!--Data Entry Form-->
					<div id="form-panel" class="card-body dnone">
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="page_type">{{ __('Manage Page') }}<span class="red">*</span></label>
										<select name="page_type" id="page_type" class="chosen-rtl form-control">
											<option value="home_1">Home Page 1</option>
										</select>
									</div>
								</div>
								<div class="col-md-9"></div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="about_title">{{ __('Title') }}<span class="red">*</span></label>
										<input type="text" name="about_title" id="about_title" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="description">{{ __('Description') }}</label>
										<textarea name="description" id="description" class="form-control" rows="3"></textarea>
									</div>
								</div>
							</div>

							<div class="row rcapHideShow">
								<div class="col-md-3">
									<div class="form-group">
										<label for="total_rooms">{{ __('Rooms') }}</label>
										<input type="text" name="total_rooms" id="total_rooms" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="total_customers">{{ __('Customers') }}</label>
										<input type="text" name="total_customers" id="total_customers" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="total_amenities">{{ __('Amenities') }}</label>
										<input type="text" name="total_amenities" id="total_amenities" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="total_packages">{{ __('Packages') }}</label>
										<input type="text" name="total_packages" id="total_packages" class="form-control">
									</div>
								</div>
							</div>

							<div class="row ynpHideShow">
								<div class="col-md-4">
									<div class="form-group">
										<label for="year">{{ __('Year') }}</label>
										<input type="text" name="year" id="year" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="tp_name">{{ __('Name') }}</label>
										<input type="text" name="tp_name" id="tp_name" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="position">{{ __('Position') }}</label>
										<input type="text" name="position" id="position" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="button_text">{{ __('Button Text') }}</label>
										<input type="text" name="button_text" id="button_text" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="target">{{ __('Target Window') }}</label>
										<select name="target" id="target" class="chosen-rtl form-control">
											<option value="">None</option>
											<option value="_self">Self</option>
											<option value="_blank">Blank</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="image_url">{{ __('URL') }}</label>
										<input type="text" name="image_url" id="image_url" class="form-control">
									</div>
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="about_image1">{{ __('Thumbnail Image') }}<span class="red">*</span></label>
										<div class="tp-upload-field">
											<input type="text" name="image" id="about_image1" class="form-control" readonly>
											<a id="on_about_image1" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<em>Recommended image size width: 900px and height: 700px.</em>
										<div id="remove_about_image1" class="select-image">
											<div class="inner-image" id="view_about_image1"></div>
											<a onClick="onMediaImageRemove('about_image1')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group image2HideShow">
										<label for="about_image2">{{ __('Thumbnail Image') }} ({{ __('Optional') }})</label>
										<div class="tp-upload-field">
											<input type="text" name="image2" id="about_image2" class="form-control" readonly>
											<a id="on_about_image2" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<em id="RecommendedText">Recommended image size width: 900px and height: 700px.</em>
										<div id="remove_about_image2" class="select-image">
											<div class="inner-image" id="view_about_image2"></div>
											<a onClick="onMediaImageRemove('about_image2')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group image3HideShow">
										<label for="about_image3">{{ __('Thumbnail Image') }} ({{ __('Optional') }})</label>
										<div class="tp-upload-field">
											<input type="text" name="image3" id="about_image3" class="form-control" readonly>
											<a id="on_about_image3" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<em>Recommended image size width: 900px and height: 700px.</em>
										<div id="remove_about_image3" class="select-image">
											<div class="inner-image" id="view_about_image3"></div>
											<a onClick="onMediaImageRemove('about_image3')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
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
                                
							<div class="row">
								<div class="col-md-3">
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
<script src="{{asset('public/backend/pages/about_us.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush
