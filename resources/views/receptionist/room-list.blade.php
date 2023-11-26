@extends('layouts.backend')

@section('title', __('Room List'))

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
								<span>{{ __('Room List') }}</span>
							</div>
							<div class="col-lg-6"></div>
						</div>
					</div>

					<!--Data grid-->
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group mb-10">
									<select name="roomtype_id" id="roomtype_id" class="chosen-select form-control">
										<option value="0" selected="selected">{{ __('All Room Type') }}</option>
										@foreach($room_list as $row)
										<option value="{{ $row->id }}">
											{{ $row->title }}
										</option>
										@endforeach
									</select>
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
							@include('receptionist.partials.room_list_table')
						</div>
					</div>
					<!--/Data grid/-->
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
<script src="{{asset('public/backend/pages/receptionist_room_list.js')}}"></script>
@endpush