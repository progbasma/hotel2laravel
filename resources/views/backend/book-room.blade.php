@extends('layouts.backend')

@section('title', __('Book Room'))

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
					<div class="card-header">
						<div class="row">
							<div class="col-lg-6">
								<span>{{ __('Book Room') }}</span>
							</div>
							<div class="col-lg-6"></div>
						</div>
					</div>
					<div class="card-body">
						<!--Data Entry Form-->
						<form novalidate="" data-validate="parsley" id="DataEntry_formId">
							<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
										<label for="roomtype">{{ __('Room Type') }}<span class="red">*</span></label>
										<select name="roomtype" id="roomtype" class="chosen-select form-control">
										@foreach($RoomTypeList as $row)
											<option value="{{ $row->id }}">
												{{ $row->title }}
											</option>
										@endforeach
										</select>
										<span class="text-danger error-text roomtype_error"></span>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label for="checkin_date">{{ __('Check In') }}<span class="red">*</span></label>
										<input type="text" name="checkin_date" id="checkin_date" class="form-control parsley-validated" data-required="true" placeholder="yyyy-mm-dd">
										<span class="text-danger error-text checkin_date_error"></span>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label for="checkout_date">{{ __('Check Out') }}<span class="red">*</span></label>
										<input type="text" name="checkout_date" id="checkout_date" class="form-control parsley-validated" data-required="true" placeholder="yyyy-mm-dd">
										<span class="text-danger error-text checkout_date_error"></span>
									</div>
								</div>	
								<div class="col-lg-3">
									<div class="form-group">
										<label for="room">{{ __('Room') }}<span class="red">*</span></label>
										<input type="number" name="room" id="room" class="form-control parsley-validated" data-required="true" value="1">
										<span class="text-danger error-text room_error"></span>
										<div class="r_extra" id="availability_id"></div>
									</div>
								</div>
							</div>
							
							<div class="divider_heading">{{ __('Customer Information') }}</div>
							<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
										<label for="name">{{ __('Name') }}<span class="red">*</span></label>
										<input type="text" name="name" id="name" class="form-control parsley-validated" data-required="true">
										<span class="text-danger error-text name_error"></span>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label for="email">{{ __('Email Address') }}<span class="red">*</span></label>
										<input type="email" name="email" id="email" class="form-control parsley-validated" data-required="true">
										<span class="text-danger error-text email_error"></span>
									</div>
								</div>	
								<div class="col-lg-3">
									<div class="form-group">
										<label for="phone">{{ __('Phone') }}<span class="red">*</span></label>
										<input type="text" name="phone" id="phone" class="form-control parsley-validated" data-required="true">
										<span class="text-danger error-text phone_error"></span>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label for="country">{{ __('Country') }}<span class="red">*</span></label>
										<select id="country" name="country" class="chosen-select form-control parsley-validated" data-required="true">
											@foreach($country_list as $row)
											<option value="{{ $row->country_name }}">
												{{ $row->country_name }}
											</option>
											@endforeach
										</select>
										<span class="text-danger error-text country_error"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
										<label for="state">{{ __('State') }}</label>
										<input type="text" name="state" id="state" class="form-control">
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label for="zip_code">{{ __('Zip Code') }}</label>
										<input type="text" name="zip_code" id="zip_code" class="form-control">
									</div>
								</div>	
								<div class="col-lg-3">
									<div class="form-group">
										<label for="city">{{ __('City') }}</label>
										<input type="text" name="city" id="city" class="form-control">
									</div>
								</div>
								<div class="col-lg-3"></div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="address">{{ __('Address') }}</label>
										<textarea id="address" name="address" rows="2" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="comments">{{ __('Note') }}</label>
										<textarea id="comments" name="comments" rows="2" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="checkboxlist">
										<label class="checkbox-title">
											<input id="new_account" name="new_account" type="checkbox">{{ __('Register an account with above information?') }} 
										</label>
									</div>
								</div>
							</div>
							<div class="row hideclass" id="new_account_pass">
								<div class="col-lg-3">
									<div class="form-group">
										<label for="password">{{ __('Password') }}<span class="red">*</span></label>
										<input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}">
										<span class="text-danger error-text password_error"></span>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label for="password_confirmation">{{ __('Confirm password') }}<span class="red">*</span></label>
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm password') }}">
									</div>
								</div>
								<div class="col-lg-6"></div>
							</div>
							<div class="row tabs-footer mt-15">
								<div class="col-lg-12">
									<a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a>
								</div>
							</div>
						</form>
						<!--/Data Entry Form/-->
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
<link rel="stylesheet" href="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-fonticon.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-datetimepicker.css')}}">
<script src="{{asset('public/backend/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>

<script type="text/javascript">
var TEXT = [];
	TEXT['Room'] = "{{ __('Room') }}";
	TEXT['Availability'] = "{{ __('Availability') }}";
</script>
<script src="{{asset('public/backend/pages/book_room.js')}}"></script>
@endpush