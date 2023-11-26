@extends('layouts.backend')

@section('title', __('Room Type'))

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
								{{ __('Room Type') }}
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
									<div class="col-lg-6">
										<div class="form-group">
											<label for="room_name">{{ __('Room Type') }}<span class="red">*</span></label>
											<input value="{{ $datalist['title'] }}" type="text" name="title" id="product_name" class="form-control parsley-validated" data-required="true">
										</div>
									</div>	
									<div class="col-lg-6">
										<div class="form-group">
											<label for="slug">{{ __('Slug') }}<span class="red">*</span></label>
											<input value="{{ $datalist['slug'] }}" type="text" name="slug" id="slug" class="form-control parsley-validated" data-required="true">
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-lg-12">
										<div class="form-group tpeditor">
											<label for="description">{{ __('Description') }}</label>
											<textarea name="description" id="description" class="form-control" rows="4">{{ $datalist['description'] }}</textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="cat_id">{{ __('Category') }}<span class="red">*</span></label>
											<select name="cat_id" id="cat_id" class="chosen-select form-control">
											@foreach($categorylist as $row)
												<option {{ $row->id == $datalist['cat_id'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->name }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label for="total_adult">{{ __('Total Adult') }}<span class="red">*</span></label>
											<input value="{{ $datalist['total_adult'] }}" name="total_adult" id="total_adult" type="number" class="form-control parsley-validated" data-required="true">
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label for="total_child">{{ __('Total Child') }}<span class="red">*</span></label>
											<input value="{{ $datalist['total_child'] }}" name="total_child" id="total_child" type="number" class="form-control parsley-validated" data-required="true">
										</div>
									</div>
								</div>

								<div class="row">	
									<div class="col-lg-6">
										<div class="form-group">
											<label for="price">{{ __('Price') }}<span class="red">*</span></label>
											<input value="{{ $datalist['price'] }}" name="price" id="price" type="text" class="form-control parsley-validated" data-required="true">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="tax_id">{{ __('Tax') }}<span class="red">*</span></label>
											<select name="tax_id" id="tax_id" class="chosen-select form-control">
											@foreach($taxlist as $row)
												<option {{ $row->id == $datalist['tax_id'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->title }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="amenities">{{ __('Amenities') }}</label>
											<select data-placeholder="{{ __('Select Amenities') }}" name="amenities[]" id="amenities" class="chosen-select form-control" multiple>
											@foreach($amenity_list as $row)
												<option {{ $row->id == $datalist['amenities'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->name }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="complements">{{ __('Complements') }}</label>
											<select data-placeholder="{{ __('Select Complements') }}" name="complements[]" id="complements" class="chosen-select form-control" multiple>
											@foreach($complement_list as $row)
												<option {{ $row->id == $datalist['complements'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->name }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="beds">{{ __('Beds') }}</label>
											<select data-placeholder="{{ __('Select beds') }}" name="beds[]" id="beds" class="chosen-select form-control" multiple>
											@foreach($bedtype_list as $row)
												<option {{ $row->id == $datalist['beds'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->name }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label for="is_featured">{{ __('Is Featured') }}</label>
											<select name="is_featured" id="is_featured" class="chosen-select form-control">
												<option {{ 1 == $datalist['is_featured'] ? "selected=selected" : '' }} value="1">{{ __('YES') }}</option>
												<option {{ 0 == $datalist['is_featured'] ? "selected=selected" : '' }} value="0">{{ __('NO') }}</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label for="lan">{{ __('Language') }}<span class="red">*</span></label>
											<select name="lan" id="lan" class="chosen-select form-control">
											@foreach($languageslist as $row)
												<option {{ $row->language_code == $datalist['lan'] ? "selected=selected" : '' }} value="{{ $row->language_code }}">
													{{ $row->language_name }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="f_thumbnail_thumbnail">{{ __('Featured image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['thumbnail'] }}" type="text" name="f_thumbnail" id="f_thumbnail_thumbnail" class="form-control" readonly>
												<a id="on_f_thumbnail" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended image size width: 900px and height: 700px.</em>
											<div id="remove_f_thumbnail" class="select-image dnone">
												<div class="inner-image" id="view_thumbnail_image"></div>
												<a onClick="onMediaImageRemove('f_thumbnail_thumbnail')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="cover_img_thumbnail">{{ __('Subheader Image') }}<span class="red">*</span></label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['cover_img'] }}" type="text" name="cover_img" id="cover_img_thumbnail" class="form-control" readonly>
												<a id="on_cover_img" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended subheader image size width: 1920px and height: 400px.</em>
											<div id="remove_cover_img" class="select-image dnone">
												<div class="inner-image" id="view_cover_img"></div>
												<a onClick="onMediaImageRemove('cover_img_thumbnail')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
										<div class="form-group">
											<label for="is_publish">{{ __('Status') }}<span class="red">*</span></label>
											<select name="is_publish" id="is_publish" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6"></div>
								</div>
								<input value="{{ $datalist['id'] }}" type="text" name="RecordId" id="RecordId" class="dnone">
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
var media_type = 'Product_Thumbnail';
var amenityIds = "{{ $datalist['amenities'] }}";
if(amenityIds !=''){
	var idsArr1 = amenityIds.split("|");
	$("#amenities").val(idsArr1).trigger("chosen:updated");
}

var complementIds = "{{ $datalist['complements'] }}";
if(complementIds !=''){
	var idsArr2 = complementIds.split("|");
	$("#complements").val(idsArr2).trigger("chosen:updated");
}

var bedIds = "{{ $datalist['beds'] }}";
if(bedIds !=''){
	var idsArr3 = bedIds.split("|");
	$("#beds").val(idsArr3).trigger("chosen:updated");
}

var f_thumbnail = "{{ $datalist['thumbnail'] }}";
if(f_thumbnail == ''){
	$("#remove_f_thumbnail").hide();
	$("#f_thumbnail_thumbnail").html('');
}
if(f_thumbnail != ''){
	$("#remove_f_thumbnail").show();
	$("#view_thumbnail_image").html('<img src="'+public_path+'/media/'+f_thumbnail+'">');
}

var cover_img = "{{ $datalist['cover_img'] }}";
if(cover_img == ''){
	$("#remove_cover_img").hide();
	$("#cover_img_thumbnail").html('');
}
if(cover_img != ''){
	$("#remove_cover_img").show();
	$("#view_cover_img").html('<img src="'+public_path+'/media/'+cover_img+'">');
}

var TEXT = [];
	TEXT['Select Category'] = "{{ __('Select Category') }}";

</script>
<link href="{{asset('public/backend/editor/summernote-lite.min.css')}}" rel="stylesheet">
<script src="{{asset('public/backend/editor/summernote-lite.min.js')}}"></script>
<script src="{{asset('public/backend/pages/room.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>
@endpush