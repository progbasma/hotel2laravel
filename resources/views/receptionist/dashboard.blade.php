@extends('layouts.backend')

@section('title', __('Dashboard'))
@php $gtext = gtext(); @endphp
@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">
		@php $vipc = vipc(); @endphp
		@if($vipc['bkey'] == 0) 
		@include('receptionist.partials.vipc')
		@else
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-success">
						<i class="fa fa-check"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total Booking Completed') }}</div>
						<div class="count">{{ $TotalBookingCompleted }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('receptionist.all-booking') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-success">
						<i class="fa fa-id-badge"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total Running Booking') }}</div>
						<div class="count">{{ $TotalRunningBooking }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('receptionist.all-booking') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-warning">
						<i class="fa fa-hourglass-end"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total Booking Request') }}</div>
						<div class="count">{{ $TotalBookingRequest }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('receptionist.all-booking') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-danger">
						<i class="fa fa-ban"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total Booking Canceled') }}</div>
						<div class="count">{{ $TotalBookingCanceled }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('receptionist.all-booking') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-success">
						<i class="fa fa-check-square-o"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __("Today's Booked Room") }}</div>
						<div class="count">{{ $TodaysBookedRoom[0]->TodaysBookedRoom }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('receptionist.room-list') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-info">
						<i class="fa fa-window-restore"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __("Today's Available Room") }}</div>
						<div class="count">{{ $TotalTodaysAvailableRoom }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('receptionist.room-list') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-success">
						<i class="fa fa-bed"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total Booked Room') }}</div>
						<div class="count">{{ $TotalBookedRoom }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('receptionist.room-list') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-info">
						<i class="fa fa-bed"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total Room') }}</div>
						<div class="count">{{ $TotalRoom }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('receptionist.room-list') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="divider_heading">{{ __('Todays Booked Rooms') }}</div>
			</div>
		</div>
		<div class="row">
			@if (count($BookedRooms)>0)
			@foreach($BookedRooms as $row)
			<div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
				<div class="ds-room-card">
					<div class="title">{{ $row->room_no }}</div>
					<div class="desc">
						<p><strong><a href="{{ route('receptionist.booking', [$row->booking_id, 'all-booking']) }}">{{ $row->booking_no }}</a></strong></p>
						<p>{{ $row->title }}</p>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<h6>{{ __('No data available') }}</h6>
			</div>
			@endif
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="divider_heading">{{ __('Available Room for Booking') }}</div>
			</div>
		</div>
		<div class="row">
			@if (count($TodaysAvailableRoom)>0)
			@foreach($TodaysAvailableRoom as $row)
			<div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
				<div class="ds-room-card">
					<div class="title">{{ $row->room_no }}</div>
					<div class="desc">
						<p>{{ $row->title }}</p>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<h6>{{ __('No data available') }}</h6>
			</div>
			@endif
		</div>
		@endif
	</div>
</div>
<!-- /main Section -->
@endsection

@push('scripts')

@endpush