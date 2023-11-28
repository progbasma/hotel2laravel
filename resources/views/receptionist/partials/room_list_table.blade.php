<div class="table-responsive">
	<table class="table table-borderless table-theme" style="width:100%;">
		<thead>
			<tr>
				<th class="checkboxlist text-center" style="width:5%">{{ __('SL') }}</th>
				<th class="text-left" style="width:10%">{{ __('Room Number') }}</th>
				<th class="text-left" style="width:18%">{{ __('Room Type') }}</th>
				<th class="text-center" style="width:10%">{{ __('Booking Status') }}</th>
				<th class="text-left" style="width:15%">{{ __('In / Out Date') }}</th>
				<th class="text-left" style="width:10%">{{ __('Booking No') }}</th>
				<th class="text-left" style="width:12%">{{ __('Customer') }}</th>
				<th class="text-left" style="width:10%">{{ __('Phone') }}</th>
				<th class="text-center" style="width:10%">{{ __('Status') }}</th>
			</tr>
		</thead>
		<tbody>
			@if (count($datalist)>0)
			@php $i = 1; @endphp
			@foreach($datalist as $row)
			<tr>
				<td class="text-center">{{ $i++; }}</td>
				<td class="text-left">{{ $row->room_no }}</td>
				<td class="text-left">{{ $row->title }}</td>
				@if ($row->book_status == 1)
				<td class="text-center"><span class="disable_btn">{{ __('Booked') }}</span></td>
				@else
				<td class="text-center"><span class="enable_btn">{{ __('Available') }}</span></td>
				@endif
				<td class="text-left">
				@if ($row->in_date == '')
				@else
				{{ date('d-m-Y', strtotime($row->in_date)) }} <strong>to</strong> {{ date('d-m-Y', strtotime($row->out_date)) }}
				@endif
				</td>
				<td class="text-left">
				@if ($row->book_status == 1)
					{{ $row->booking_no }}
				@else
				@endif
				</td>
				<td class="text-left">
				@if ($row->book_status == 1)
					{{ $row->name }}
				@else
				@endif
				</td>
				<td class="text-left">
				@if ($row->book_status == 1)
					{{ $row->phone }}
				@else
				@endif
				</td>
				@if ($row->is_publish == 1)
				<td class="text-center"><span class="enable_btn">{{ __($row->status) }}</span></td>
				@else
				<td class="text-center"><span class="disable_btn">{{ __($row->status) }}</span></td>
				@endif
			</tr>
			@endforeach
			@else
			<tr>
				<td class="text-center" colspan="9">{{ __('No data available') }}</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>
<div class="row mt-15">
	<div class="col-lg-12 RoomList">
		{{ $datalist->links() }}
	</div>
</div>
