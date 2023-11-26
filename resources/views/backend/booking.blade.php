@extends('layouts.backend')

@section('title', __('Booking'))
@php $gtext = gtext(); @endphp
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
					<div class="card-body">
					<ul class="status_list">
						<li class="order_no_date"><strong>{{ __('Booking No') }}</strong>: {{ $mdata->booking_no }}</li>
						<li class="order_no_date"><strong>{{ __('Booking Date') }}</strong>: {{ date('d-m-Y', strtotime($mdata->created_at)) }}</li>
						<li class="order_no_date"><strong>{{ __('Payment Method') }}</strong>: {{ $mdata->method_name }}</li>
						<li id="payment_status_class" class="pstatus_{{ $mdata->payment_status_id }}"><strong>{{ __('Payment Status') }}</strong>: <span id="pstatus_name">{{ $mdata->pstatus_name }}</span></li>
						<li id="order_status_class" class="ostatus_{{ $mdata->booking_status_id }}"><strong>{{ __('Booking Status') }}</strong>: <span id="ostatus_name">{{ $mdata->bstatus_name }}</span></li>
					</ul>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row mt-25">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table order">
								<thead>
									<tr>
										<th class="text-left" style="width:30%">{{ __('Room Type') }}</th>
										<th class="text-center" style="width:15%">{{ __('Total Room') }}</th>
										<th class="text-center" style="width:10%">{{ __('Price') }}</th>
										<th class="text-center" style="width:25%">{{ __('In / Out Date') }}</th>
										<th class="text-center" style="width:10%">{{ __('Total Days') }}</th>
										<th class="text-right" style="width:10%">{{ __('Total') }}</th>
									</tr>
								</thead>
								<tbody>

									@php
										$total_days = DateDiffInDays($mdata->in_date, $mdata->out_date);

										$totalPrice = 0;
										if($mdata->total_price !=''){
											$totalPrice = $mdata->total_price;
										}
										
										$oldPrice = 0;
										if($mdata->old_price !=''){
											$oldPrice = $mdata->old_price;
										}
										
										$sub_total = 0;
										if($mdata->subtotal !=''){
											$sub_total = $mdata->subtotal;
										}
										
										$totalTax = 0;
										if($mdata->tax !=''){
											$totalTax = $mdata->tax;
										}
										
										$totalDiscount = 0;
										if($mdata->discount !=''){
											$totalDiscount = $mdata->discount;
										}
										
										$totalAmount = 0;
										if($mdata->total_amount !=''){
											$totalAmount = $mdata->total_amount;
										}
										
										$calOldPrice = $oldPrice*$mdata->total_room*$total_days;
										
										if($gtext['currency_position'] == 'left'){
											$oPrice = $gtext['currency_icon'].NumberFormat($oldPrice);
											$caloPrice = $gtext['currency_icon'].NumberFormat($calOldPrice);
											$total_price = $gtext['currency_icon'].NumberFormat($totalPrice);
											$subtotal = $gtext['currency_icon'].NumberFormat($sub_total);
											$tax = $gtext['currency_icon'].NumberFormat($totalTax);
											$discount = $gtext['currency_icon'].NumberFormat($totalDiscount);
											$total_amount = $gtext['currency_icon'].NumberFormat($totalAmount);
											
										}else{
											$oPrice = NumberFormat($oldPrice).$gtext['currency_icon'];
											$caloPrice = NumberFormat($calOldPrice).$gtext['currency_icon'];
											$total_price = NumberFormat($totalPrice).$gtext['currency_icon'];
											$subtotal = NumberFormat($sub_total).$gtext['currency_icon'];
											$tax = NumberFormat($totalTax).$gtext['currency_icon'];
											$discount = NumberFormat($totalDiscount).$gtext['currency_icon'];
											$total_amount = NumberFormat($totalAmount).$gtext['currency_icon'];
										}
										
										$old_price = '';
										$cal_old_price = '';
										if($mdata->is_discount == 1){
											$old_price = $oPrice;
											$cal_old_price = $caloPrice;
										}
									@endphp

									<tr>
										<td class="text-left" style="width:30%;">{{ $mdata->title }}</td>
										<td class="text-center" style="width:15%;">{{ $mdata->total_room }}</td>
										<td class="text-center" style="width:10%;">{{ $total_price }} @php if($old_price !=''){ @endphp<br><span style="text-decoration:line-through;color:#ee0101;">{{ $old_price }}</span>@php } @endphp</td>
										<td class="text-center" style="width:25%;">@php echo date('d-m-Y', strtotime($mdata->in_date)).'<br><strong>to</strong><br>'.date('d-m-Y', strtotime($mdata->out_date)); @endphp</td>
										<td class="text-center" style="width:10%;">{{ $total_days }}</td>
										<td class="text-right" style="width:10%;">{{ $subtotal }} @php if($cal_old_price !=''){ @endphp<br><span style="text-decoration:line-through;color:#ee0101;">{{ $cal_old_price }}</span>@php } @endphp</td>
									</tr>
									<tr>
										<td colspan="5" class="text-right"><strong>{{ __('Subtotal') }}: </strong></td>
										<td class="text-right"><strong>{{ $subtotal }}</strong></td>
									</tr>
									<tr>
										<td colspan="5" class="text-right border-none"><strong>{{ __('Tax') }}: </strong></td>
										<td class="text-right border-none"><strong>{{ $tax }}</strong></td>
									</tr>
									<tr>
										<td colspan="5" class="text-right border-none"><strong>{{ __('Discount') }}: </strong></td>
										<td class="text-right border-none"><strong>{{ $discount }}</strong></td>
									</tr>
									<tr>
										<td colspan="5" class="text-right border-none"><strong>{{ __('Grand Total') }}: </strong></td>
										<td class="text-right border-none"><strong>{{ $total_amount }}</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<div class="row mt-25 mb-30">
							<div class="col-lg-12">
								<a onClick="onRoomListModalView()" href="javascript:void(0);" class="btn btn-theme"><i class="fa fa-plus"></i> {{ __('Assign Room') }}</a>
								<div class="row mt-10">
									<div class="col-lg-12" id="assign_room_data"></div>
								</div>
							</div>
						</div>
						
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							<div class="row mt-25">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="payment_status_id">{{ __('Payment Status') }}<span class="red">*</span></label>
										<select name="payment_status_id" id="payment_status_id" class="chosen-select form-control">
										@foreach($payment_status_list as $row)
											<option {{ $row->id == $mdata->payment_status_id ? "selected=selected" : '' }} value="{{ $row->id }}">
												{{ $row->pstatus_name }}
											</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="booking_status_id">{{ __('Booking Status') }}<span class="red">*</span></label>
										<select name="booking_status_id" id="booking_status_id" class="chosen-select form-control">
										@foreach($booking_status_list as $row)
											<option {{ $row->id == $mdata->booking_status_id ? "selected=selected" : '' }} value="{{ $row->id }}">
												{{ $row->bstatus_name }}
											</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-4"></div>
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
							<div class="row mt-25">
								<div class="col-lg-12">
									<input class="dnone" id="booking_id" name="booking_id" type="text" value="{{ $mdata->id }}" />
									<a id="submit-form" href="javascript:void(0);" class="btn btn-theme mr-10 update_btn">{{ __('Update') }}</a>
									<a href="{{ route('frontend.invoice', [$mdata->id, $mdata->booking_no]) }}" class="btn btn-theme mr-10">{{ __('Invoice Download') }}</a>
									<a href="{{ route('backend.all-booking') }}" class="btn warning-btn"><i class="fa fa-reply"></i> {{ __('Back to List') }}</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header">{{ __('Merge Room and Date') }}</div>
					<div class="card-body">
						<form novalidate="" data-validate="parsley" id="RoomDateFormId">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="checkin_date">{{ __('Check In') }}<span class="red">*</span></label>
										<input type="text" name="checkin_date" id="checkin_date" class="form-control parsley-validated" data-required="true" placeholder="yyyy-mm-dd" value="{{ $mdata->in_date }}">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="checkout_date">{{ __('Check Out') }}<span class="red">*</span></label>
										<input type="text" name="checkout_date" id="checkout_date" class="form-control parsley-validated" data-required="true" placeholder="yyyy-mm-dd" value="{{ $mdata->out_date }}">
									</div>
								</div>	
							</div>
						
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="room">{{ __('Room') }}<span class="red">*</span></label>
										<input type="number" name="room" id="room" class="form-control parsley-validated" data-required="true" min="1" max="{{ $total_room }}" value="{{ $mdata->total_room }}">
									</div>
								</div>
								<div class="col-lg-6"></div>	
							</div>
							
							<div class="row">
								<div class="col-lg-12 mb-10">
									<div class="r_extra">
										<strong>{{ __('Availability') }}:</strong>
										@if($total_room > 0)
										<span class="instock">{{ $total_room }} {{ __('Room') }}</span>
										@else
										<span class="stockout">{{ $total_room }} {{ __('Room') }}</span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<input class="dnone" id="bookingid" name="bookingid" type="text" value="{{ $mdata->id }}" />
									<input class="dnone" id="roomtype_id" name="roomtype_id" type="text" value="{{ $mdata->roomtype_id }}" />
									<a id="submit-roomdateid" href="javascript:void(0);" class="btn btn-theme">{{ __('Update') }}</a>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card mt-25">
					<div class="card-header">{{ __('Customer Information') }}</div>
					<div class="card-body">
						@if ($mdata->name != '')
						<p><strong>{{ __('Name') }}</strong>: {{ $mdata->name }}</p>
						@endif
						
						@if ($mdata->email != '')
						<p><strong>{{ __('Email') }}</strong>: {{ $mdata->email }}</p>
						@endif
						
						@if ($mdata->phone != '')
						<p><strong>{{ __('Phone') }}</strong>: {{ $mdata->phone }}</p>
						@endif
						
						@if ($mdata->country != '')
						<p><strong>{{ __('Country') }}</strong>: {{ $mdata->country }}</p>
						@endif
						
						@if ($mdata->state != '')
						<p><strong>{{ __('State') }}</strong>: {{ $mdata->state }}</p>
						@endif
						
						@if ($mdata->zip_code != '')
						<p><strong>{{ __('Zip Code') }}</strong>: {{ $mdata->zip_code }}</p>
						@endif
						
						@if ($mdata->city != '')
						<p><strong>{{ __('City') }}</strong>: {{ $mdata->city }}</p>
						@endif
						
						@if ($mdata->address != '')
						<p><strong>{{ __('Address') }}</strong>: {{ $mdata->address }}</p>
						@endif
						
						@if ($mdata->comments != '')
						<p><strong>{{ __('Note') }}</strong>: {{ $mdata->comments }}</p>
						@endif
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>

<!-- Room List modal -->
<div id="room_list_modal_view" class="modal bd-example-modal-lg">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ __('Rooms') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body media-content padding-no">
				<div class="container-fluid">
					<div class="row mt-15">
						<div class="col-lg-7"></div>
						<div class="col-lg-5">
							<div class="form-group search-box">
								<input id="search_modal" name="search_modal" type="text" class="form-control" placeholder="{{ __('Search') }}...">
								<button type="submit" onClick="onSearchModal()" class="btn search-btn">{{ __('Search') }}</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="tp_datalist_modal">
								@include('backend.partials.room_list_for_assign_room')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/Room List modal/-->

<!-- /main Section -->
@endsection

@push('scripts')
<!-- css/js -->
<link rel="stylesheet" href="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-fonticon.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-datetimepicker.css')}}">
<script src="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>

<script type="text/javascript">
var booking_id = "{{ $mdata->id }}";
var roomtype_id = "{{ $mdata->roomtype_id }}";
var total_room = "{{ $mdata->total_room }}";
var maxRoom = "{{ $total_room }}";
var currentPath = "{{ url()->current() }}";

var TEXT = [];
	TEXT['Do you really want to edit this record'] = "{{ __('Do you really want to edit this record') }}";
	TEXT['Do you really want to delete this record'] = "{{ __('Do you really want to delete this record') }}";
	TEXT['Do you really want to delete this records'] = "{{ __('Do you really want to delete this records') }}";
	TEXT['Please select action'] = "{{ __('Please select action') }}";
	TEXT['Please select record'] = "{{ __('Please select record') }}";
	TEXT['All Category'] = "{{ __('All Category') }}";
	TEXT['Room Number'] = "{{ __('Room Number') }}";
	TEXT['Not found assign room'] = "{{ __('Not found assign room') }}";
	TEXT['Already Assigned'] = "{{ __('Already Assigned') }}";
	TEXT['Room'] = "{{ __('Room') }}";
</script>
<script src="{{asset('public/backend/pages/booking.js')}}"></script>
@endpush