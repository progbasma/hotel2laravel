@extends('layouts.backend')

@section('title', __('Rooms'))

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
								{{ __('Rooms') }}
							</div>
							<div class="col-lg-6">
								<div class="float-right">
									<a href="{{ route('backend.room-type') }}" class="btn warning-btn btn-form float-right"><i class="fa fa-reply"></i> {{ __('Back to List') }}</a>
									<a onClick="onFormPanel()" href="javascript:void(0);" class="btn blue-btn btn-form float-right mr-10"><i class="fa fa-plus"></i> {{ __('Add New') }}</a>
									<a onClick="onListPanel()" href="javascript:void(0);" class="btn warning-btn btn-list float-right dnone"><i class="fa fa-reply"></i> {{ __('Back to List') }}</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0">
						@include('backend.partials.room_tabs_nav')
						<div class="tabs-body">
							<!--Data grid-->
							<div id="list-panel">
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
									@include('backend.partials.rooms_table')
								</div>
							</div>
							<!--/Data grid/-->

							<!--Data Entry Form-->
							<div id="form-panel" class="dnone">
								<form novalidate="" data-validate="parsley" id="DataEntry_formId">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label for="room_no">{{ __('Room No') }}<span class="red">*</span></label>
												<input type="text" name="room_no" id="room_no" class="form-control parsley-validated" data-required="true">
											</div>
										</div>
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
										<div class="col-md-6"></div>
									</div>
									<input type="text" name="roomtype_id" id="roomtype_id" class="dnone" value="{{ $datalist['id'] }}">
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
		@endif
	</div>
</div>

<!-- /main Section -->
@endsection

@push('scripts')
<!-- css/js -->
<script type="text/javascript">
var roomtype_id = "{{ $datalist['id'] }}";
var TEXT = [];
	TEXT['Do you really want to edit this record'] = "{{ __('Do you really want to edit this record') }}";
	TEXT['Do you really want to delete this record'] = "{{ __('Do you really want to delete this record') }}";
	TEXT['Do you really want to publish this records'] = "{{ __('Do you really want to publish this records') }}";
	TEXT['Do you really want to draft this records'] = "{{ __('Do you really want to draft this records') }}";
	TEXT['Do you really want to delete this records'] = "{{ __('Do you really want to delete this records') }}";
	TEXT['Please select action'] = "{{ __('Please select action') }}";
	TEXT['Please select record'] = "{{ __('Please select record') }}";
</script>
<script src="{{asset('public/backend/pages/rooms.js')}}"></script>
@endpush
