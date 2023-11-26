<div class="table-responsive">
	<table class="table table-borderless table-theme" style="width:100%;">
		<thead>
			<tr>
				<th class="text-left" style="width:90%">{{ __('Room Number') }}</th>
				<th class="text-center" style="width:10%">{{ __('Action') }}</th>
			</tr>
		</thead>
		<tbody>
			@if (count($room_list)>0)
			@foreach($room_list as $row)
			<tr>
				<td class="text-left">{{ $row->room_no }}</td>
				<td class="text-center">
					<a onclick="onAssignRoom({{ $row->id }})" class="editIconBtn" title="{{ __('Assign Room') }}" href="javascript:void(0);"><i class="fa fa-plus"></i></a>
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td class="text-center" colspan="2">{{ __('No data available') }}</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>
<div class="row mt-15 mb-15">
	<div class="col-lg-12 tp_pagination_modal">
		{{ $room_list->links() }}
	</div>
</div>