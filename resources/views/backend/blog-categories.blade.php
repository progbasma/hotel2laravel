@extends('layouts.backend')

@section('title', __('Categories'))

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
								<span>{{ __('Categories') }}</span>
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
						<div class="row mb-10">
							<div class="col-md-3">
								<div class="form-group mb-10">
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
							@include('backend.partials.blog_categories_table')
						</div>
					</div>
					<!--/Data grid/-->
					<!--Data Entry Form-->
					<div id="form-panel" class="card-body dnone">
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">{{ __('Category Name') }}<span class="red">*</span></label>
										<input type="text" name="name" id="name" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">{{ __('Slug') }}<span class="red">*</span></label>
										<input type="text" name="slug" id="slug" class="form-control parsley-validated" data-required="true">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
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
								<div class="col-md-6">
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
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="description">{{ __('Description') }}</label>
										<textarea name="description" id="description" class="form-control" rows="3"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="category_thumbnail">{{ __('Subheader Image') }}</label>
										<div class="tp-upload-field">
											<input type="text" name="thumbnail" id="category_thumbnail" class="form-control" readonly>
											<a id="on_thumbnail" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<em>Recommended subheader image size width: 1920px and height: 400px.</em>
										<div id="remove_category_thumbnail" class="select-image">
											<div class="inner-image" id="view_category_thumbnail"></div>
											<a onClick="onMediaImageRemove('category_thumbnail')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
							</div>
							
							<div class="divider_heading">{{ __('SEO') }}</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="og_title">{{ __('SEO Title') }}</label>
										<input type="text" name="og_title" id="og_title" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="og_keywords">{{ __('SEO Keywords') }}</label>
										<input type="text" name="og_keywords" id="og_keywords" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="og_description">{{ __('SEO Description') }}</label>
										<textarea name="og_description" id="og_description" class="form-control" rows="3"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="og_image">{{ __('Open Graph Image') }}</label>
										<div class="tp-upload-field">
											<input type="text" name="og_image" id="og_image" class="form-control" readonly>
											<a id="on_og_image" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
										</div>
										<em>e.g. Facebook share image. Recommended image size width: 600px and height: 315px.</em>
										<div id="remove_og_image" class="select-image">
											<div class="inner-image" id="view_og_image"></div>
											<a onClick="onMediaImageRemove('og_image')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
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
var media_type = 'Subheader';
var TEXT = [];
	TEXT['Do you really want to edit this record'] = "{{ __('Do you really want to edit this record') }}";
	TEXT['Do you really want to delete this record'] = "{{ __('Do you really want to delete this record') }}";
	TEXT['Do you really want to publish this records'] = "{{ __('Do you really want to publish this records') }}";
	TEXT['Do you really want to draft this records'] = "{{ __('Do you really want to draft this records') }}";
	TEXT['Do you really want to delete this records'] = "{{ __('Do you really want to delete this records') }}";
	TEXT['Please select action'] = "{{ __('Please select action') }}";
	TEXT['Please select record'] = "{{ __('Please select record') }}";
</script>
<script src="{{asset('public/backend/pages/blog-categories.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush