<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MyDashboardController extends Controller
{
    public function LoadMyDashboard()
    {
        return view('frontend.my-dashboard');
    }
	
    public function LoadMyBooking()
    {
		$userid = 0;
		if(isset(Auth::user()->id)){
			$userid = Auth::user()->id;
		}
		
		$datalist = DB::table('booking_manages')
			->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
			->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
			->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
			->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
			->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
			 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
			->where('booking_manages.customer_id', '=', $userid)
			->orderBy('booking_manages.id', 'desc')
			->paginate(10);
			
        return view('frontend.my-booking', compact('datalist'));
    }
	
    public function MyOrderDetails($booking_id, $booking_no)
    {
		$gtext = gtext();
		
		$datalist = DB::table('booking_manages')
			->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
			->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
			->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
			->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
			->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
			 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
			->where('booking_manages.id', $booking_id)
			->get();
		
		$mdata = array();
		foreach($datalist as $row){
			$mdata['title'] = $row->title;
			$mdata['is_discount'] = $row->is_discount;
			$mdata['old_price'] = $row->old_price;
			$mdata['booking_no'] = $row->booking_no;
			$mdata['payment_status_id'] = $row->payment_status_id;
			$mdata['booking_status_id'] = $row->booking_status_id;
			$mdata['total_room'] = $row->total_room;
			$mdata['total_price'] = $row->total_price;
			$mdata['discount'] = $row->discount;
			$mdata['tax'] = $row->tax;
			$mdata['subtotal'] = $row->subtotal;
			$mdata['total_amount'] = $row->total_amount;
			$mdata['in_date'] = $row->in_date;
			$mdata['out_date'] = $row->out_date;
			$mdata['customer_name'] = $row->name;
			$mdata['customer_email'] = $row->email;
			$mdata['customer_address'] = $row->address;
			$mdata['city'] = $row->city;
			$mdata['state'] = $row->state;
			$mdata['zip_code'] = $row->zip_code;
			$mdata['country'] = $row->country;
			$mdata['customer_phone'] = $row->phone;
			$mdata['created_at'] = $row->created_at;
			$mdata['method_name'] = $row->method_name;
			$mdata['pstatus_name'] = $row->pstatus_name;
			$mdata['bstatus_name'] = $row->bstatus_name;
		}

		$total_days = DateDiffInDays($mdata['in_date'], $mdata['out_date']);

		$totalPrice = 0;
		if($mdata['total_price'] !=''){
			$totalPrice = $mdata['total_price'];
		}
		
		$oldPrice = 0;
		if($mdata['old_price'] !=''){
			$oldPrice = $mdata['old_price'];
		}
		
		$sub_total = 0;
		if($mdata['subtotal'] !=''){
			$sub_total = $mdata['subtotal'];
		}
		
		$totalTax = 0;
		if($mdata['tax'] !=''){
			$totalTax = $mdata['tax'];
		}
		
		$totalDiscount = 0;
		if($mdata['discount'] !=''){
			$totalDiscount = $mdata['discount'];
		}
		
		$totalAmount = 0;
		if($mdata['total_amount'] !=''){
			$totalAmount = $mdata['total_amount'];
		}
		
		$calOldPrice = $oldPrice*$mdata['total_room']*$total_days;
		
		$pdata = array();
		if($gtext['currency_position'] == 'left'){
			$pdata['oPrice'] = $gtext['currency_icon'].NumberFormat($oldPrice);
			$pdata['caloPrice'] = $gtext['currency_icon'].NumberFormat($calOldPrice);
			$pdata['total_price'] = $gtext['currency_icon'].NumberFormat($totalPrice);
			$pdata['subtotal'] = $gtext['currency_icon'].NumberFormat($sub_total);
			$pdata['tax'] = $gtext['currency_icon'].NumberFormat($totalTax);
			$pdata['discount'] = $gtext['currency_icon'].NumberFormat($totalDiscount);
			$pdata['total_amount'] = $gtext['currency_icon'].NumberFormat($totalAmount);
			
		}else{
			$pdata['oPrice'] = NumberFormat($oldPrice).$gtext['currency_icon'];
			$pdata['caloPrice'] = NumberFormat($calOldPrice).$gtext['currency_icon'];
			$pdata['total_price'] = NumberFormat($totalPrice).$gtext['currency_icon'];
			$pdata['subtotal'] = NumberFormat($sub_total).$gtext['currency_icon'];
			$pdata['tax'] = NumberFormat($totalTax).$gtext['currency_icon'];
			$pdata['discount'] = NumberFormat($totalDiscount).$gtext['currency_icon'];
			$pdata['total_amount'] = NumberFormat($totalAmount).$gtext['currency_icon'];
		}
		
		$old_price = '';
		$cal_old_price = '';
		if($mdata['is_discount'] == 1){
			$old_price = '<br><span style="text-decoration:line-through;color:#ee0101;">'.$pdata['oPrice'].'</span>';
			$cal_old_price = '<br><span style="text-decoration:line-through;color:#ee0101;">'.$pdata['caloPrice'].'</span>';
		}
		
		$pdata['old_price'] = $old_price;
		$pdata['cal_old_price'] = $cal_old_price;
		
		$RoomDataList = DB::table('room_manages')
			->join('room_assigns', 'room_manages.id', '=', 'room_assigns.room_id')
			->select('room_manages.room_no')
			->where('room_assigns.booking_id', $booking_id)
			->orderBy('room_manages.room_no', 'asc')
			->get();
		
		$room_no = '';
		$f = 0;
		foreach($RoomDataList as $row){
			if($f++){
				$room_no .= ', ';
			}
			
			$room_no .= $row->room_no;
		}
		
		$assign_rooms = '';
		if($room_no !=''){
			$assign_rooms = __('Your assign  room no').': '.$room_no;
		}
		
		$pdata['assign_rooms'] = $assign_rooms;
		$pdata['total_days'] = $total_days;
			
        return view('frontend.invoice-details', compact('mdata', 'pdata'));
    }
	
    public function LoadMyProfile()
    {
        return view('frontend.my-profile');
    }
	
	public function UpdateProfile(Request $request)
    {
		$gtext = gtext();
		
		$id = $request->input('user_id');
		
		$secretkey = $gtext['secretkey'];
		$recaptcha = $gtext['is_recaptcha'];
		if($recaptcha == 1){
			$request->validate([
				'g-recaptcha-response' => 'required',
				'name' => 'required',
				'email' => 'required',
			]);
			
			$captcha = $request->input('g-recaptcha-response');

			$ip = $_SERVER['REMOTE_ADDR'];
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secretkey).'&response='.urlencode($captcha).'&remoteip'.$ip;
			$response = file_get_contents($url);
			$responseKeys = json_decode($response, true);
			if($responseKeys["success"] == false) {
				return redirect("user/register")->withFail(__('The recaptcha field is required'));
			}
		}else{
			$request->validate([
				'name' => 'required',
				'email' => 'required',
			]);
		}
		
		$data = array(
			'name' => $request->input('name'),
			'phone' => $request->input('phone'),
			'address' => $request->input('address')
		);

		$response = User::where('id', $id)->update($data);
		
		if($response){
			return redirect()->back()->withSuccess(__('Updated Successfully'));
		}else{
			return redirect()->back()->withFail(__('Data update failed'));
		}
    }
	
    public function LoadChangePassword()
    {
        return view('frontend.change-password');
    }
	
	public function ChangePassword(Request $request)
    {
		$gtext = gtext();

		$secretkey = $gtext['secretkey'];
		$recaptcha = $gtext['is_recaptcha'];
		if($recaptcha == 1){
			$request->validate([
				'g-recaptcha-response' => 'required',
				'current_password' => 'required',
				'password' => 'required|confirmed|min:6',
				'password_confirmation' => 'required'
			]);
			
			$captcha = $request->input('g-recaptcha-response');

			$ip = $_SERVER['REMOTE_ADDR'];
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secretkey).'&response='.urlencode($captcha).'&remoteip'.$ip;
			$response = file_get_contents($url);
			$responseKeys = json_decode($response, true);
			if($responseKeys["success"] == false) {
				return redirect("user/register")->withFail(__('The recaptcha field is required'));
			}
		}else{
			$request->validate([
				'current_password' => 'required',
				'password' => 'required|confirmed|min:6',
				'password_confirmation' => 'required'
			]);
		}

       $hashedPassword = Auth::user()->password;
 
       if (\Hash::check($request->input('current_password'), $hashedPassword )) {
 
			if (!\Hash::check($request->input('password'), $hashedPassword)) {

				$id = Auth::user()->id;

				$data = array(
					'password' => Hash::make($request->input('password')),
					'bactive' => base64_encode($request->input('password'))
				);
				
				$response = User::where('id', $id)->update($data);
				
				if($response){
					return redirect()->back()->withSuccess(__('Your password changed successfully'));
				}else{
					return redirect()->back()->withFail(__('Oops! You are failed change password. Please try again'));
				}
			}else{
				
				return redirect()->back()->withFail(__('New password can not be the old password!'));
			}
 
        }else{
			return redirect()->back()->withFail(__('Current password does not match.'));
		}
	}	
}
