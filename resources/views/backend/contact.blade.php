@extends('layouts.backend')

@section('title', __('Contact'))

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
								<span>{{ __('Contact') }}</span>
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
							<div class="col-lg-9 mb-10">
								<div class="group-button">
									<button type="button" onClick="onDataViewByStatus(0)" id="viewstatus_0" class="btn btn-theme viewstatus active">{{ __('All') }} ({{ $AllCount }})</button>
									<button type="button" onClick="onDataViewByStatus(1)" id="viewstatus_1" class="btn btn-theme viewstatus">{{ __('Published') }} ({{ $PublishedCount }})</button>
									<button type="button" onClick="onDataViewByStatus(2)" id="viewstatus_2" class="btn btn-theme viewstatus">{{ __('Draft') }} ({{ $DraftCount }})</button>
								</div>
								<input type="hidden" id="ViewByPostStatus" value="0"/>
							</div>
							<div class="col-lg-3 mb-10">
								<div class="form-group">
									<select name="language_code" id="language_code" class="chosen-select form-control">
										<option value="0" selected="selected">{{ __('All Language') }}</option>
										@foreach($languageslist as $row)
											<option value="{{ $row->language_code }}">
												{{ $row->language_name }}
											</option>
										@endforeach
									</select>
								</div>
							</div>
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
						<div id="page_datalist">
							@include('backend.partials.contact_table')
						</div>
					</div>
					<!--/Data grid/-->
					
					<!--Data Entry Form-->
					<div id="form-panel" class="card-body dnone">
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="title">{{ __('Title') }}<span class="red">*</span></label>
										<input type="text" name="title" id="title" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="lan">{{ __('Language') }}<span class="red">*</span></label>
										<select name="lan" id="lan" class="chosen-select form-control">
											@foreach($languageslist as $row)
												<option value="{{ $row->language_code }}">
													{{ $row->language_name }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
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
							</div>
							<div class="divider_heading">{{ __('Contact Info') }}</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="email">{{ __('Email') }}<span class="red">*</span></label>
										<input type="text" name="email" id="email" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="phone">{{ __('Phone') }}<span class="red">*</span></label>
										<input type="text" name="phone" id="phone" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="address">{{ __('Address') }}<span class="red">*</span></label>
										<textarea name="address" id="address" class="form-control parsley-validated" data-required="true" rows="2"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="short_desc">{{ __('Short Description') }}</label>
										<textarea name="short_desc" id="short_desc" class="form-control" rows="2"></textarea>
									</div>
								</div>
							</div>

							<div class="divider_heading">{{ __('Google Map') }}</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="latitude">{{ __('Latitude') }}</label>
										<input type="text" name="latitude" id="latitude" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="longitude">{{ __('Longitude') }}</label>
										<input type="text" name="longitude" id="longitude" class="form-control">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="zoom">{{ __('Zoom') }}</label>
										<input type="text" name="zoom" id="zoom" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<p class="mb0">If you are not yet added Google Map API key. <strong><a href="{{ route('backend.google-map') }}">Click Here</a></strong></p>
									<div class="tw_checkbox checkbox_group">
										<input id="is_google_map" name="is_google_map" type="checkbox">
										<label for="is_google_map">{{ __('Enable/Disable') }}</label>
										<span></span>
									</div>
								</div>
							</div>
							
							<div class="divider_heading">{{ __('Contact Form') }}</div>
							
							<div id="FormElementId"></div>

							<div class="row">
								<div class="col-lg-12">
									<div class="form-builder">
										<a onclick="onAddField()" class="add_field_btn" href="javascript:void(0);" title="{{ __('Add Field') }}"><i class="fa fa-plus"></i></a>
									</div>
								</div>
							</div>
							
							<div class="row mt-25" id="mailSubjectHideShow">
								<div class="col-md-3">
									<div class="form-group">
										<label for="mail_subject">{{ __('Select Mail Subject Field') }}<span class="red">*</span></label>
										<select name="mail_subject" id="mail_subject" class="chosen-select form-control">
										</select>
									</div>
								</div>
								<div class="col-md-9"></div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<p class="mt-15 mb0"><strong>{{ __('Google reCAPTCHA') }}</strong> (If you are not yet added Google reCAPTCHA key. <strong><a href="{{ route('backend.google-recaptcha') }}">Click Here</a></strong>)</p>
									<div class="tw_checkbox checkbox_group">
										<input id="is_recaptcha" name="is_recaptcha" type="checkbox">
										<label for="is_recaptcha">{{ __('Enable/Disable') }}</label>
										<span></span>
									</div>
								</div>
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

<div class="modal page-builder-modal" id="element_forms_modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header tp-modal-header">
				<h5 class="modal-title">{{ __('Add Field') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form novalidate="" data-validate="parsley" id="Element_DataEntry_formId">
				<div class="modal-body tp-modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="field_label">{{ __('Label') }}<span class="red">*</span></label>
									<input type="text" name="field_label" id="field_label" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="field_type">{{ __('Type') }}<span class="red">*</span></label>
									<select name="field_type" id="field_type" class="chosen-select form-control">
										<option value="text">Text</option>
										<option value="email">Email</option>
										<option value="textarea">Textarea</option>
										<option value="dropdown">Dropdown</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="field_name">{{ __('Name') }}<span class="red">*</span></label>
									<input type="text" name="field_name" id="field_name" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="field_placeholder">{{ __('Placeholder') }}</label>
									<input type="text" name="field_placeholder" id="field_placeholder" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="is_label">{{ __('Label Show/Hide') }}<span class="red">*</span></label>
									<select name="is_label" id="is_label" class="chosen-select form-control">
										<option value="no">No</option>
										<option value="yes">Yes</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="field_mandatory">{{ __('Mandatory') }}<span class="red">*</span></label>
									<select name="field_mandatory" id="field_mandatory" class="chosen-select form-control">
										<option value="no">No</option>
										<option value="yes">Yes</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row dnone" id="dropdown_values_id">
							<div class="col-md-12">
								<div class="form-group">
									<label for="dropdown_values">{{ __('Dropdown Values') }}</label>
									<textarea name="dropdown_values" id="dropdown_values" class="form-control" rows="2" placeholder="value1|value2|value3"></textarea>
									<span>Example dropdown value (value1|value2|value3). separator ( | )</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a onclick="onSaveChanges()" href="javascript:void(0);" class="btn blue-btn">{{ __('Save changes') }}</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var TEXT = [];
	TEXT['Do you really want to edit this record'] = "{{ __('Do you really want to edit this record') }}";
	TEXT['Do you really want to delete this record'] = "{{ __('Do you really want to delete this record') }}";
	TEXT['Do you really want to publish this records'] = "{{ __('Do you really want to publish this records') }}";
	TEXT['Do you really want to draft this records'] = "{{ __('Do you really want to draft this records') }}";
	TEXT['Do you really want to delete this records'] = "{{ __('Do you really want to delete this records') }}";
	TEXT['Please select action'] = "{{ __('Please select action') }}";
	TEXT['Please select record'] = "{{ __('Please select record') }}";
	TEXT['Please fill up all mandatory fields'] = "{{ __('Please fill up all mandatory fields') }}";
</script>
<script src="{{asset('public/backend/pages/contacts_page.js')}}"></script>
@endpush