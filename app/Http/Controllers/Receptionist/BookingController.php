<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room_assign;
use App\Models\Booking_manage;
use App\Models\Room_manage;
use App\Models\Room;
use App\Models\Country;

class BookingController extends Controller
{
//All Booking Page Load
    public function getAllBookingPageLoad() {
		
		$booking_status_list = DB::table('booking_status')->get();
		$payment_status_list = DB::table('payment_status')->get();
		
		$datalist = DB::table('booking_manages')
			->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
			->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
			->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
			->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
			->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
			 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
			->orderBy('booking_manages.id', 'desc')
			->paginate(20);
		
        return view('receptionist.all-booking', compact('booking_status_list', 'payment_status_list', 'datalist'));	
	}
	
	//Get data for All Booking Pagination
	public function getAllBookingTableData(Request $request){

		$search = $request->search;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$status = $request->status;
		
		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->where(function ($query) use ($search){
						$query->where('rooms.title', 'like', '%'.$search.'%')
							->orWhere('booking_manages.booking_no', 'like', '%'.$search.'%')
							->orWhere('booking_manages.name', 'like', '%'.$search.'%')
							->orWhere('booking_manages.email', 'like', '%'.$search.'%')
							->orWhere('booking_manages.phone', 'like', '%'.$search.'%')
							->orWhere('booking_manages.total_room', 'like', '%'.$search.'%')
							->orWhere('booking_manages.address', 'like', '%'.$search.'%');
					})
					->orderBy('booking_manages.id', 'desc')
					->paginate(20);
			}else{
				if(($start_date != '') && ($end_date != '')){
					
					$datalist = DB::table('booking_manages')
						->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
						->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
						->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
						->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
						->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
						 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
						->whereBetween('booking_manages.created_at', [$start_date, $end_date])
						->orderBy('booking_manages.id', 'desc')
						->paginate(20);
				}else{
					if($status == 0){
						$datalist = DB::table('booking_manages')
							->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
							->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
							->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
							->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
							->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
							 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
							->orderBy('booking_manages.id', 'desc')
							->paginate(20);
					}else{
						$datalist = DB::table('booking_manages')
							->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
							->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
							->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
							->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
							->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
							 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
							->where('booking_manages.booking_status_id', '=', $status)
							->orderBy('booking_manages.id', 'desc')
							->paginate(20);
					}
				}
			}

			return view('receptionist.partials.all_booking_table', compact('datalist'))->render();
		}
	}
	
	//Booking Request page load
    public function getBookingRequestPageLoad() {

		$datalist = DB::table('booking_manages')
			->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
			->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
			->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
			->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
			->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
			 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
			->where('booking_manages.booking_status_id', '=', 1)
			->orderBy('booking_manages.id', 'desc')
			->paginate(10);
		
        return view('receptionist.booking-request', compact('datalist'));	
	}
	
	//Get data for Booking Request Pagination
	public function getBookingRequestTableData(Request $request){

		$search = $request->search;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		
		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->where(function ($query) use ($search){
						$query->where('rooms.title', 'like', '%'.$search.'%')
							->orWhere('booking_manages.booking_no', 'like', '%'.$search.'%')
							->orWhere('booking_manages.name', 'like', '%'.$search.'%')
							->orWhere('booking_manages.email', 'like', '%'.$search.'%')
							->orWhere('booking_manages.phone', 'like', '%'.$search.'%')
							->orWhere('booking_manages.total_room', 'like', '%'.$search.'%')
							->orWhere('booking_manages.address', 'like', '%'.$search.'%');
					})
					->where('booking_manages.booking_status_id', '=', 1)
					->orderBy('booking_manages.id', 'desc')
					->paginate(10);
			}else{
				if(($start_date != '') && ($end_date != '')){
					
					$datalist = DB::table('booking_manages')
						->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
						->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
						->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
						->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
						->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
						 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
						->where('booking_manages.booking_status_id', '=', 1)
						->whereBetween('booking_manages.created_at', [$start_date, $end_date])
						->orderBy('booking_manages.id', 'desc')
						->paginate(10);
				}else{
					$datalist = DB::table('booking_manages')
						->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
						->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
						->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
						->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
						->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
						 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
						->where('booking_manages.booking_status_id', '=', 1)
						->orderBy('booking_manages.id', 'desc')
						->paginate(10);
				}
			}

			return view('receptionist.partials.booking_request_table', compact('datalist'))->render();
		}
	}

	//Delete data for Booking Request
	public function deleteBookingRequest(Request $request){

		$res = array();

		$id = $request->id;

		if($id != ''){
			
			Room_assign::where('booking_id', $id)->delete();
	
			$response = Booking_manage::where('id', $id)->delete();
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Removed Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data remove failed');
			}
		}
		
		return response()->json($res);
	}
	
	//Bulk Action for Booking Request
	public function bulkActionBookingRequest(Request $request){

		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;
		
		Room_assign::whereIn('booking_id', $idsArray)->delete();
		
		$response = Booking_manage::whereIn('id', $idsArray)->delete();
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('Removed Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data remove failed');
		}

		return response()->json($res);
	}
	
    //Booking page load
    public function getBookingData($id, $type) {
		$page_type = $type;
		$payment_status_list = DB::table('payment_status')->get();
		$booking_status_list = DB::table('booking_status')->get();

		$mdata = DB::table('booking_manages')
			->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
			->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
			->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
			->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
			->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
			 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
			->where('booking_manages.id', '=', $id)
			->first();
			
		$roomtype_id = $mdata->roomtype_id;
		
		$RoomAssignList = Room_assign::where('booking_id', $id)->get();
		$idsArray = array();
		foreach($RoomAssignList as $row){
			$idsArray[] = $row->room_id;
		}

		$room_list = Room_manage::where('roomtype_id', '=', $roomtype_id)
			->where('book_status', '=', 2)
			->where('is_publish', '=', 1)
			->whereNotIn('id', $idsArray)
			->paginate(20);
		
		$total_room = Room_manage::where('roomtype_id', '=', $roomtype_id)->where('book_status', '=', 2)->where('is_publish', '=', 1)->count();
		
        return view('receptionist.booking', compact('page_type', 'payment_status_list', 'booking_status_list', 'mdata', 'room_list', 'total_room'));		
	}
	
	//Get data for room list Pagination
	public function getRoomListTableData(Request $request){

		$search = $request->search;
		$roomtype_id = $request->roomtype_id;
		$booking_id = $request->booking_id;
		
		$RoomAssignList = Room_assign::where('booking_id', $booking_id)->get();
		$idsArray = array();
		foreach($RoomAssignList as $row){
			$idsArray[] = $row->room_id;
		}

		if($request->ajax()){

			if($search != ''){

				$room_list = Room_manage::where('roomtype_id', $roomtype_id)
					->where(function ($query) use ($search){
						$query->where('room_no', 'like', '%'.$search.'%');
					})
					->where('book_status', '=', 2)
					->where('is_publish', '=', 1)
					->whereNotIn('id', $idsArray)
					->paginate(20);
			}else{
				$room_list = Room_manage::where('roomtype_id', $roomtype_id)
					->where('book_status', '=', 2)
					->where('is_publish', '=', 1)
					->whereNotIn('id', $idsArray)
					->paginate(20);
			}

			return view('receptionist.partials.room_list_for_assign_room', compact('room_list'))->render();
		}
	}
	
	//Get Assign Room Data
	public function getAssignRoomData(Request $request){
		$res = array();
		
		$booking_id = $request->booking_id;
		
		$datalist = DB::table('room_manages')
			->join('room_assigns', 'room_manages.id', '=', 'room_assigns.room_id')
			->select('room_manages.*', 'room_assigns.id as assign_room_id')
			->where('room_assigns.booking_id', '=', $booking_id)
			->orderBy('room_manages.room_no', 'asc')
			->get();
		
		$res['datalist'] = $datalist;
		
		return response()->json($res);
	}
	
	//Save Assign Room Id
    public function saveAssignRoomData(Request $request){
		$res = array();

		$booking_id = $request->input('booking_id');
		$room_id = $request->input('room_id');
		$roomtype_id = $request->input('roomtype_id');
		
		$mData = Booking_manage::where('id', $booking_id)->first();
		$booking_status_id = $mData->booking_status_id;
		
		$data = array(
			'booking_id' => $booking_id,
			'room_id' => $room_id,
			'roomtype_id' => $roomtype_id
		);
		
		$response = Room_assign::create($data);
		if($response){
			
			self::ChangeBookingStatus($booking_id, $booking_status_id);
			
			$res['msgType'] = 'success';
			$res['msg'] = __('Saved Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data insert failed');
		}
		
		return response()->json($res);
    }
	
	//Delete Assign Room
	public function deleteAssignRoom(Request $request){

		$res = array();

		$id = $request->id;

		$rData = Room_assign::where('id', '=', $id)->first();
		$room_id = $rData->room_id;
		
		if($id != ''){

			$response = Room_assign::where('id', $id)->delete();
			if($response){
				
				$rmData = array('in_date' => NULL, 'out_date' => NULL, 'book_status' => 2);
				Room_manage::where('id', $room_id)->update($rmData);
			
				$res['msgType'] = 'success';
				$res['msg'] = __('Removed Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data remove failed');
			}
		}
		
		return response()->json($res);
	}
	
	//update Booking Status
	public function updateBookingStatus(Request $request){
		$gtext = gtext();
		$res = array();

		$id = $request->input('booking_id');
		$payment_status_id = $request->input('payment_status_id');
		$booking_status_id = $request->input('booking_status_id');
		$is_notify = $request->input('isnotify');
		
		if ($is_notify == 'true' || $is_notify == 'on') {
			$isnotify = 1;
		}else {
			$isnotify = 0;
		}

		$data = array(
			'payment_status_id' => $payment_status_id,
			'booking_status_id' => $booking_status_id
		);	
		
		$response = Booking_manage::where('id', $id)->update($data);
		if($response){
			if($isnotify == 1){
				if($gtext['ismail'] == 1){
					BookingNotify($id, 'booking');
				}
			}
			
			self::ChangeBookingStatus($id, $booking_status_id);
			
			$res['msgType'] = 'success';
			$res['msg'] = __('Updated Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data update failed');
		}
		
		return response()->json($res);
	}
	
    //Payment Booking Status
    public function getPaymentBookingStatusData(Request $request) {
		
		$id = $request->booking_id;

		$data = DB::table('booking_manages')
			->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
			->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
			->select('booking_manages.*', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
			->where('booking_manages.id', '=', $id)
			->first();

        return response()->json($data);
	}
	
	//Update Room Date
	public function updateRoomDate(Request $request){
		$gtext = gtext();
		$gtax = getTax();
		$res = array();

		$id = $request->input('bookingid');
		$roomtype_id = $request->input('roomtype_id');
		$in_date = $request->input('checkin_date');
		$out_date = $request->input('checkout_date');
		$total_room = $request->input('room');

		$rtdata = Room::where('id', $roomtype_id)->where('is_publish', '=', 1)->first();
		
		$room_price = $rtdata->price;
		$is_discount = $rtdata->is_discount;
		
		$total_days = DateDiffInDays($in_date, $out_date);
		
		$subtotal = $room_price*$total_room*$total_days;

		$total_discount = 0;
		if($is_discount == 1){
			if($rtdata->old_price !=''){
				$old_price = $rtdata->old_price;
				$discount = $old_price*$total_room*$total_days;
				$total_discount = $discount - $subtotal;
			}
		}		
		
		$tax_rate = $gtax['percentage'];

		$total_tax = (($subtotal*$tax_rate)/100);
		
		$total_amount = $subtotal+$total_tax;
		$paid_amount = 0;
		$due_amount = $total_amount;

		$data = array(
			'total_room' => $total_room,
			'total_price' => $room_price,
			'discount' => $total_discount,
			'tax' => $total_tax,
			'subtotal' => $subtotal,
			'total_amount' => $total_amount,
			'paid_amount' => $paid_amount,
			'due_amount' => $due_amount,
			'in_date' => $in_date,
			'out_date' => $out_date
		);	

		$response = Booking_manage::where('id', $id)->update($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('Updated Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data update failed');
		}
		
		return response()->json($res);
	}
	
	//Change Booking Status
	public function ChangeBookingStatus($booking_id, $booking_status_id) {
		
		$MasterData = Booking_manage::where('id', $booking_id)->first();
		
		$RoomAssignList = Room_assign::where('booking_id', $booking_id)->get();
		$idsArray = array();
		foreach($RoomAssignList as $row){
			$idsArray[] = $row->room_id;
		}
		
		//Approved
		if($booking_status_id == 2){
			
			$mData = array(
				'in_date' => $MasterData->in_date,
				'out_date' => $MasterData->out_date,
				'book_status' => 1
			);

			Room_manage::whereIn('id', $idsArray)->update($mData);
		
		//Pending || Checked Out || Canceled
		}else{
			$mData = array(
				'in_date' => NULL,
				'out_date' => NULL,
				'book_status' => 2
			);

			Room_manage::whereIn('id', $idsArray)->update($mData);
		}
	}
	
	//Book Room page load
    public function getBookRoomPageLoad() {

		$RoomTypeList = Room::get();
		$country_list = Country::where('is_publish', '=', 1)->orderBy('country_name', 'ASC')->get();
		
        return view('receptionist.book-room', compact('RoomTypeList', 'country_list'));	
	}

    public function BookRoomRequest(Request $request)
    {
		$res = array();
		$gtext = gtext();
		$gtax = getTax();

		$roomtype_id = $request->input('roomtype');
		$total_room = $request->input('room');
		
		$customer_id = '';
		
		$newaccount = $request->input('new_account');
		
		if ($newaccount == 'true' || $newaccount == 'on') {
			$new_account = 1;
		}else {
			$new_account = 0;
		}

		$payment_method_id = 1;

		if($new_account == 1){
			
			$validator = Validator::make($request->all(),[
				'roomtype' => 'required',
				'name' => 'required',
				'phone' => 'required',
				'country' => 'required',
				'checkin_date' => 'required',
				'checkout_date' => 'required',
				'room' => 'required',
				'email' => 'required|email|unique:users',
				'password' => 'required|confirmed',
			]);

			if(!$validator->passes()){
				$res['msgType'] = 'error';
				$res['msg'] = $validator->errors()->toArray();
				return response()->json($res);
			}

			$userData = array(
				'name' => $request->input('name'),
				'email' => $request->input('email'),
				'phone' => $request->input('phone'),
				'address' => $request->input('address'),
				'state' => $request->input('state'),
				'zip_code' => $request->input('zip_code'),
				'city' => $request->input('city'),
				'password' => Hash::make($request->input('password')),
				'bactive' => base64_encode($request->input('password')),
				'status_id' => 1,
				'role_id' => 2
			);
			
			$customer_id = User::create($userData)->id;
			
		}else{
			
			$validator = Validator::make($request->all(),[
				'roomtype' => 'required',
				'name' => 'required',
				'email' => 'required',
				'phone' => 'required',
				'country' => 'required',
				'checkin_date' => 'required',
				'checkout_date' => 'required',
				'room' => 'required'
			]);
			
			if(!$validator->passes()){
				$res['msgType'] = 'error';
				$res['msg'] = $validator->errors()->toArray();
				return response()->json($res);
			}

			$customer_id = NULL;
		}
		
		$rtdata = Room::where('id', $roomtype_id)->where('is_publish', '=', 1)->first();
		
		$start_random = RandomString(3);
		$end_random = RandomString(3);
		
		$booking_no = $start_random.date("his").$end_random;

		$room_price = $rtdata->price;
		$in_date = $request->input('checkin_date');
		$out_date = $request->input('checkout_date');
		
		$is_discount = $rtdata->is_discount;
		
		$total_days = DateDiffInDays($in_date, $out_date);
		
		$subtotal = $room_price*$total_room*$total_days;

		$total_discount = 0;
		if($is_discount == 1){
			if($rtdata->old_price !=''){
				$old_price = $rtdata->old_price;
				$discount = $old_price*$total_room*$total_days;
				$total_discount = $discount - $subtotal;
			}
		}		
		
		$tax_rate = $gtax['percentage'];

		$total_tax = (($subtotal*$tax_rate)/100);
		
		$total_amount = $subtotal+$total_tax;
		$paid_amount = 0;
		$due_amount = $total_amount;

		$data = array(
			'booking_no' => $booking_no,
			'roomtype_id' => $roomtype_id,
			'customer_id' => $customer_id,
			'payment_method_id' => $payment_method_id,
			'payment_status_id' => 2,
			'booking_status_id' => 1,
			'total_room' => $total_room,
			'total_price' => $room_price,
			'discount' => $total_discount,
			'tax' => $total_tax,
			'subtotal' => $subtotal,
			'total_amount' => $total_amount,
			'paid_amount' => $paid_amount,
			'due_amount' => $due_amount,
			'in_date' => $in_date,
			'out_date' => $out_date,
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'phone' => $request->input('phone'),
			'country' => $request->input('country'),
			'state' => $request->input('state'),
			'zip_code' => $request->input('zip_code'),
			'city' => $request->input('city'),
			'address' => $request->input('address'),
			'comments' => $request->input('comments')
		);

		$booking_id = Booking_manage::create($data)->id;
		
		if($booking_id>0){

			if($gtext['ismail'] == 1){
				BookingNotify($booking_id, 'booking_request');
			}
			
			$res['msgType'] = 'success';
			$res['booking_id'] = $booking_id;
			$res['msg'] = __('Your booking request is successfully.');
			return response()->json($res);
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Oops! Your booking request is failed. Please try again.');
			return response()->json($res);
		}
    }

    public function CheckRoomCount(Request $request)
    {
		$res = array();

		$roomtype_id = $request->input('roomtype_id');
		
		$total_room = Room_manage::where('roomtype_id', '=', $roomtype_id)->where('book_status', '=', 2)->where('is_publish', '=', 1)->count();

		$res['total_room'] = $total_room;
		
		return response()->json($res);
    }
}
