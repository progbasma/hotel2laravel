@extends('layouts.backend')

@section('title', __('Offer & Ads'))

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
								<span>{{ __('Offer & Ads') }}</span>
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
							@include('backend.partials.offer_ads_table')
						</div>
					</div>
					<!--/Data grid/-->
					<!--Data Entry Form-->
					<div id="form-panel" class="card-body dnone">
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="offer_ad_type">{{ __('Offer & Ads Position') }}<span class="red">*</span></label>
										<select name="offer_ad_type" id="offer_ad_type" class="chosen-rtl form-control">
											<option value="homepage1">Homepage 1</option>
											<option value="homepage2_small">Homepage 2 (For small size)</option>
											<option value="homepage2_large">Homepage 2 (For large size)</option>
											<option value="homepage3_small">Homepage 3 (For small size)</option>
											<option value="homepage3_large">Homepage 3 (For large size)</option>
											<option value="homepage4">Homepage 4</option>
										</select>
									</div>
								</div>
								<div class="col-md-9"></div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="text_1">Text 1<span class="red">*</span></label>
										<input type="text" name="text_1" id="text_1" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="text_2">Text 2<span class="red">*</span></label>
										<input type="text" name="text_2" id="text_2" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="offer_ads_image">{{ __('Image') }}<span class="red">*</span></label>
										<div class="tp-upload-field">
											<input type="text" name="image" id="offer_ads_image" class="form-control" readonly>
											<a onClick="onGlobalMediaModalView()" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<div id="remove_offer_ads_image" class="select-image">
											<div class="inner-image" id="view_offer_ads_image"></div>
											<a onClick="onMediaImageRemove('offer_ads_image')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="button_text">{{ __('Button Text') }}<span class="red">*</span></label>
										<input type="text" name="button_text" id="button_text" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="target">{{ __('Target Window') }}<span class="red">*</span></label>
										<select name="target" id="target" class="chosen-rtl form-control">
											<option value="">None</option>
											<option value="_self">Self</option>
											<option value="_blank">Blank</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="url">{{ __('URL') }}<span class="red">*</span></label>
										<input type="text" name="url" id="url" class="form-control parsley-validated" data-required="true">
									</div>
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
								<div class="col-md-7"></div>
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
<script src="{{asset('public/backend/pages/offer-ads.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush
