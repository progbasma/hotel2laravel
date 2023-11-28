@extends('layouts.backend')

@section('title', __('All Booking'))

@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">
		@php $vipc = vipc(); @endphp
		@if($vipc['bkey'] == 0)
		@include('receptionist.partials.vipc')
		@else
		<div class="row mt-25">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-6">
								<span>{{ __('All Booking') }}</span>
							</div>
							<div class="col-lg-6">
								<div class="group-button float-right">
									<button type="button" onClick="onExcelExport()" class="btn btn-theme mb0 btn-padding"><i class="fa fa-download"></i> {{ __('Excel') }}</button>
									<button type="button" onClick="onCSVExport()" class="btn btn-theme mb0 btn-padding"><i class="fa fa-download"></i> {{ __('CSV') }}</button>
								</div>
							</div>
						</div>
					</div>
					<!--Data grid-->
					<div class="card-body">
						<div class="row mb-10">
							<div class="col-lg-8">
								<div class="group-button">
									<button id="orderstatus_0" type="button" onClick="onDataViewByStatus(0)" class="btn btn-theme orderstatus active">{{ __('All') }} (@php echo BookingCount(0); @endphp)</button>
									@foreach($booking_status_list as $row)
									<button id="orderstatus_{{ $row->id }}" type="button" onClick="onDataViewByStatus({{ $row->id }})" class="btn btn-theme orderstatus">{{ $row->bstatus_name }} (@php echo BookingCount($row->id); @endphp)</button>
									@endforeach
								</div>
								<input type="hidden" id="view_by_status" value="0"/>
							</div>

							<div class="col-lg-4">
								<div class="filter-form-group pull-right">
									<input name="start_date" id="start_date" type="text" class="form-control" placeholder="yyyy-mm-dd">
									<input name="end_date" id="end_date" type="text" class="form-control" placeholder="yyyy-mm-dd">
									<button type="submit" onClick="onFilterAction()" class="btn btn-theme">{{ __('Filter') }}</button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 mb-5">
								<div class="form-group bulk-box">
									<select id="bulk-action" class="form-control">
										<option value="">{{ __('Select Action') }}</option>
										<option value="delete">{{ __('Delete Permanently') }}</option>
									</select>
									<button type="submit" onClick="onBulkAction()" class="btn bulk-btn">{{ __('Apply') }}</button>
								</div>
							</div>
							<div class="col-lg-5 mb-5">
							</div>
							<div class="col-lg-4 mb-5">
								<div class="form-group search-box">
									<input id="search" name="search" type="text" class="form-control" placeholder="{{ __('Search') }}...">
									<button type="submit" onClick="onSearch()" class="btn search-btn">{{ __('Search') }}</button>
								</div>
							</div>
						</div>
						<div id="tp_datalist">
							@include('receptionist.partials.all_booking_table')
						</div>
					</div>
					<!--/Data grid/-->
				</div>
			</div>
		</div>
		@endif
	</div>
</div>

<!-- Check Out modal -->
<div id="CheckOutModalView" class="modal bd-example-modal-md">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ __('Check Out') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body media-content">
				<div class="container-fluid">
					<form novalidate="" data-validate="parsley" id="DataEntry_formId">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="payment_status_id">{{ __('Payment Status') }}<span class="red">*</span></label>
									<select name="payment_status_id" id="payment_status_id" class="chosen-rtl form-control">
									@foreach($payment_status_list as $row)
									<option value="{{ $row->id }}">
										{{ $row->pstatus_name }}
									</option>
									@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="booking_status_id">{{ __('Booking Status') }}<span class="red">*</span></label>
									<select name="booking_status_id" id="booking_status_id" class="chosen-rtl form-control">
									@foreach($booking_status_list as $row)
									<option value="{{ $row->id }}">
										{{ $row->bstatus_name }}
									</option>
									@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="tw_checkbox checkbox_group">
									<input id="isnotify" name="isnotify" type="checkbox">
									<label for="isnotify">{{ __('Send confirmation email to customer') }}</label>
									<span></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input class="dnone" id="booking_id" name="booking_id" type="text"/>
								<a id="SubmitBookingCheckOutForm" href="javascript:void(0);" class="btn btn-theme update_btn">{{ __('Update') }}</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/Check Out modal/-->

<!-- /main Section -->
@endsection

@push('scripts')
<!-- css/js -->
<link rel="stylesheet" href="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-fonticon.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-datetimepicker.css')}}">
<script src="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>

<script type="text/javascript">
var TEXT = [];
	TEXT['Do you really want to edit this record'] = "{{ __('Do you really want to edit this record') }}";
	TEXT['Do you really want to delete this record'] = "{{ __('Do you really want to delete this record') }}";
	TEXT['Do you really want to delete this records'] = "{{ __('Do you really want to delete this records') }}";
	TEXT['Please select action'] = "{{ __('Please select action') }}";
	TEXT['Please select record'] = "{{ __('Please select record') }}";
	TEXT['All Category'] = "{{ __('All Category') }}";
$(function () {
	"use strict";
	$("#start_date").datetimepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayBtn: true,
		minView: 2
	});

	$("#end_date").datetimepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayBtn: true,
		minView: 2
	});
});
</script>
<script src="{{asset('public/backend/pages/receptionist_all_booking.js')}}"></script>
@endpush
