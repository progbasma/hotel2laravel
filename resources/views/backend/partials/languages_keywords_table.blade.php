<div class="table-responsive">
	<table class="table table-borderless table-theme" style="width:100%;">
		<thead>
			<tr>
				<th width="45%">{{ __('Language Key') }}</th>
				<th width="45%">{{ __('Language Value') }}</th>
				<th class="text-center" width="10%">{{ __('Action') }}</th>
			</tr>
		</thead>
		<tbody>
			@if (count($datalist)>0)
			@foreach($datalist as $row)
			<tr>
				<td class="text-left">{{ $row->language_key }}</td> 
				<td class="text-left">{{ $row->language_value }}</td> 
				<td class="text-center">
					<div class="btn-group action-group">
						<a class="action-btn" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a onclick="onEdit({{ $row->id }})" class="dropdown-item" href="javascript:void(0);">{{ __('Edit') }}</a>
							<a onclick="onDelete({{ $row->id }}, '{{ $row->language_code }}')" class="dropdown-item" href="javascript:void(0);">{{ __('Delete') }}</a>
						</div>
					</div>
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td class="text-center" colspan="3">{{ __('No data available') }}</td>
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