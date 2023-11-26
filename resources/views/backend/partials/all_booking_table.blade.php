<div class="table-responsive">
	<table class="table table-borderless table-theme" style="width:100%;">
		<thead>
			<tr>
				<th class="checkboxlist text-center" style="width:5%"><input class="tp-check-all checkAll" type="checkbox"></th>
				<th class="text-left" style="width:9%">{{ __('Booking No') }}</th>
				<th class="text-left" style="width:9%">{{ __('Booking Date') }}</th>
				<th class="text-left" style="width:10%">{{ __('Customer') }}</th>
				<th class="text-left" style="width:15%">{{ __('Room Type') }}</th>
				<th class="text-center" style="width:10%">{{ __('In / Out Date') }}</th>
				<th class="text-center" style="width:5%">{{ __('Total Room') }}</th>
				<th class="text-center" style="width:9%">{{ __('Payment Method') }}</th>
				<th class="text-center" style="width:9%">{{ __('Payment Status') }}</th>
				<th class="text-center" style="width:12%">{{ __('Booking Status') }}</th>
				<th class="text-center" style="width:7%">{{ __('Action') }}</th>
			</tr>
		</thead>
		<tbody>
			@if (count($datalist)>0)
			@foreach($datalist as $row)
			<tr>
				<td class="checkboxlist text-center"><input name="item_ids[]" value="{{ $row->id }}" class="tp-checkbox selected_item" type="checkbox"></td>
				<td class="text-left"><a href="{{ route('backend.booking', [$row->id, 'all-booking']) }}">{{ $row->booking_no }}</a></td>
				<td class="text-left">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
				<td class="text-left">{{ $row->name }}</td>
				<td class="text-left">{{ $row->title }}</td>
				<td class="text-center">{{ date('d-m-Y', strtotime($row->in_date)) }} <strong>to</strong> {{ date('d-m-Y', strtotime($row->out_date)) }}</td>
				<td class="text-center">{{ $row->total_room }}</td>
				<td class="text-center">{{ $row->method_name }}</td>
				<td class="text-center"><span class="status_btn pstatus_{{ $row->payment_status_id }}">{{ $row->pstatus_name }}</span></td>
				<td class="text-center"><span class="status_btn ostatus_{{ $row->booking_status_id }}">{{ $row->bstatus_name }}</span></td>
				
				<td class="text-center">
					<div class="btn-group action-group">
						<a class="action-btn" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="{{ route('backend.booking', [$row->id, 'all-booking']) }}">{{ __('Edit') }}</a>
							<a class="dropdown-item" onClick="onCheckOutModalView({{ $row->payment_status_id }}, {{ $row->booking_status_id }}, {{ $row->id }})" href="javascript:void(0);">{{ __('Check Out') }}</a>
							<a class="dropdown-item" href="{{ route('frontend.invoice', [$row->id, $row->booking_no]) }}">{{ __('Invoice') }}</a>
							<a onclick="onDelete({{ $row->id }})" class="dropdown-item" href="javascript:void(0);">{{ __('Delete') }}</a>
						</div>
					</div>
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td class="text-center" colspan="11">{{ __('No data available') }}</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>
<div class="row mt-15">
	<div class="col-lg-12">
		{{ $datalist->links() }}
	</div>
</div>