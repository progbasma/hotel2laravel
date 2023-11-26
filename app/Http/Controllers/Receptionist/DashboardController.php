<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Room;
use App\Models\Room_manage;
use App\Models\Booking_manage;

class DashboardController extends Controller
{
    //Dashboard page load
    public function getDashboardData(){
		$lan = glan();

		$gtext = gtext();
		$timezone = $gtext['timezone'];
		date_default_timezone_set($timezone);
		$currDate = date("Y-m-d");

		$TotalBookingCompleted = Booking_manage::where('booking_status_id', '=', 3)->where('payment_status_id', '=', 1)->count();
		$TotalRunningBooking = Booking_manage::where('booking_status_id', '=', 2)->count();
		$TotalBookingRequest = Booking_manage::where('booking_status_id', '=', 1)->count();
		$TotalBookingCanceled = Booking_manage::where('booking_status_id', '=', 4)->count();
		
		$TodaysBookedRoom_sql = "SELECT COUNT(*) AS TodaysBookedRoom
		FROM room_manages a
		INNER JOIN room_assigns b ON a.id = b.room_id
		WHERE a.book_status = 1
		AND a.is_publish = 1
		AND DATE(b.created_at) = '".$currDate."';";
		$TodaysBookedRoom = DB::select(DB::raw($TodaysBookedRoom_sql));

		$TotalTodaysAvailableRoom = Room_manage::where('book_status', '=', 2)->where('is_publish', '=', 1)->count();
		$TotalBookedRoom = Room_manage::where('book_status', '=', 1)->where('is_publish', '=', 1)->count();
		$TotalRoom = Room_manage::where('is_publish', '=', 1)->count();

		$TodaysBookedRoom_sql = "SELECT a.room_no, b.title, d.booking_no, c.booking_id
		FROM room_manages a
		INNER JOIN rooms b ON a.roomtype_id = b.id
		INNER JOIN room_assigns c ON a.id = c.room_id AND a.roomtype_id = c.roomtype_id
		INNER JOIN booking_manages d ON c.booking_id = d.id
		WHERE a.is_publish = 1
		AND a.book_status = 1
		AND d.booking_status_id = 2
		AND DATE(c.created_at) = '".$currDate."'
		ORDER BY b.id, a.room_no;";
		$BookedRooms = DB::select(DB::raw($TodaysBookedRoom_sql));
		
		$TodaysAvailableRoom_sql = "SELECT a.room_no, b.title
		FROM room_manages a
		INNER JOIN rooms b ON a.roomtype_id = b.id
		WHERE a.is_publish = 1
		AND a.book_status = 2
		ORDER BY b.id, a.room_no;";
		$TodaysAvailableRoom = DB::select(DB::raw($TodaysAvailableRoom_sql));
		
        return view('receptionist.dashboard', compact(
		'TotalBookingCompleted',
		'TotalRunningBooking',
		'TotalBookingRequest',
		'TotalBookingCanceled',
		'TodaysBookedRoom',
		'TotalTodaysAvailableRoom',
		'TotalBookedRoom',
		'TotalRoom',
		'BookedRooms',
		'TodaysAvailableRoom'
		));
    }
}
