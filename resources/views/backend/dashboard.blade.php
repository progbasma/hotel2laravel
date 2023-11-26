@extends('layouts.backend')

@section('title', __('Dashboard'))
@php $gtext = gtext(); @endphp
@section('content')
<!-- main Section -->
<div class="main-body">
	<div class="container-fluid">
		@php $vipc = vipc(); @endphp
		@if($vipc['bkey'] == 0) 
		@include('backend.partials.vipc')
		@else
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-success">
						<i class="fa fa-money"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total Earn') }}</div>
						@if($gtext['currency_position'] == 'left')
						<div class="count">{{ $gtext['currency_icon'] }}{{ NumberFormat($TotalEarn[0]->total_amount) }}</div>
						@else
						<div class="count">{{ NumberFormat($TotalEarn[0]->total_amount) }}{{ $gtext['currency_icon'] }}</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-warning">
						<i class="fa fa-hourglass-end"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Pending Payment') }}</div>
						@if($gtext['currency_position'] == 'left')
						<div class="count">{{ $gtext['currency_icon'] }}{{ NumberFormat($PendingPayment[0]->total_amount) }}</div>
						@else
						<div class="count">{{ NumberFormat($PendingPayment[0]->total_amount) }}{{ $gtext['currency_icon'] }}</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-red">
						<i class="fa fa-circle-o-notch"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Incompleted Payment') }}</div>
						@if($gtext['currency_position'] == 'left')
						<div class="count">{{ $gtext['currency_icon'] }}{{ NumberFormat($IncompletedPayment[0]->total_amount) }}</div>
						@else
						<div class="count">{{ NumberFormat($IncompletedPayment[0]->total_amount) }}{{ $gtext['currency_icon'] }}</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-danger">
						<i class="fa fa-ban"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Canceled Payment') }}</div>
						@if($gtext['currency_position'] == 'left')
						<div class="count">{{ $gtext['currency_icon'] }}{{ NumberFormat($CanceledPayment[0]->total_amount) }}</div>
						@else
						<div class="count">{{ NumberFormat($CanceledPayment[0]->total_amount) }}{{ $gtext['currency_icon'] }}</div>
						@endif
					</div>
				</div>
			</div>
			
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
						<a href="{{ route('backend.all-booking') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
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
						<a href="{{ route('backend.all-booking') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
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
						<a href="{{ route('backend.all-booking') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
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
						<a href="{{ route('backend.all-booking') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
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
						<a href="{{ route('backend.room-list') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
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
						<div class="count">{{ $TodaysAvailableRoom }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('backend.room-list') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
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
						<a href="{{ route('backend.room-list') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
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
						<a href="{{ route('backend.room-list') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-info">
						<i class="fa fa-bullseye"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total Room Type') }}</div>
						<div class="count">{{ $TotalRoomType }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('backend.room-type') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-info">
						<i class="fa fa-users"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Total User') }}</div>
						<div class="count">{{ $TotalUser }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('backend.users') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-info">
						<i class="fa fa-users"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Active Customer') }}</div>
						<div class="count">{{ $ActiveCustomer }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('backend.customers') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-25">
				<div class="desh-item-card">
					<div class="icon-card tp-bg-danger">
						<i class="fa fa-users"></i>
					</div>
					<div class="item-content">
						<div class="desc">{{ __('Inactive Customer') }}</div>
						<div class="count">{{ $InactiveCustomer }}</div>
					</div>
					<span class="btn-view">
						<a href="{{ route('backend.customers') }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
					</span>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-5 mt-25">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								<span>{{ __('Recent Booking Request') }}</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive tp-height">
							<table class="table table-borderless table-theme" style="width:100%;">
								<tbody>
									@if (count($RecentBookingRequest)>0)
									@foreach($RecentBookingRequest as $row)
									<tr>
										<td class="text-left" style="width:30%">
											<a href="{{ route('backend.booking', [$row->id, 'booking-request']) }}">#{{ $row->booking_no }}</a>
										</td>
										<td class="text-left" style="width:50%">{{ $row->title }}</td>
										<td class="text-center" style="width:20%">
											@if($gtext['currency_position'] == 'left')
												{{ $gtext['currency_icon'] }}{{ NumberFormat($row->total_amount) }}
											@else
												{{ NumberFormat($row->total_amount) }}{{ $gtext['currency_icon'] }}
											@endif
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
					</div>
				</div>
			</div>
			<div class="col-lg-7 mt-25">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								<span>{{ __('Monthly Earning Report (Last 12 Months)') }}</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<canvas id="monthly_earning_report" height="450"></canvas>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 mt-25">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12">
								<span>{{ __('Monthly Booking Report (Last 12 Months)') }}</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<canvas id="monthly_booking_report" height="450"></canvas>
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
<script src="{{asset('public/backend/js/chart.js')}}"></script>
<script src="{{asset('public/backend/pages/dashboard.js')}}"></script>
<script type="text/javascript">
var currency_position = "{{ $gtext['currency_position'] }}";
var currency_icon = "{{ $gtext['currency_icon'] }}";
var TEXT = [];
	TEXT['Earning'] = "{{ __('Earning') }}";
	TEXT['Total Booking'] = "{{ __('Total Booking') }}";
</script>
@endpush