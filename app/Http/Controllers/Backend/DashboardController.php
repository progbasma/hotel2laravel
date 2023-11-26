<?php

namespace App\Http\Controllers\Backend;

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
		
		$totalEarn_sql = "SELECT IFNULL(SUM(total_amount), 0) AS total_amount
		FROM booking_manages 
		WHERE booking_status_id = 3
		AND payment_status_id = 1;";
		$TotalEarn = DB::select(DB::raw($totalEarn_sql));
		
		$PendingPayment_sql = "SELECT IFNULL(SUM(total_amount), 0) AS total_amount
		FROM booking_manages 
		WHERE payment_status_id = 2;";
		$PendingPayment = DB::select(DB::raw($PendingPayment_sql));

		$CanceledPayment_sql = "SELECT IFNULL(SUM(total_amount), 0) AS total_amount
		FROM booking_manages 
		WHERE payment_status_id = 3;";
		$CanceledPayment = DB::select(DB::raw($CanceledPayment_sql));

		$IncompletedPayment_sql = "SELECT IFNULL(SUM(total_amount), 0) AS total_amount
		FROM booking_manages 
		WHERE payment_status_id = 4;";
		$IncompletedPayment = DB::select(DB::raw($IncompletedPayment_sql));

		$TotalRoomType = Room::where('is_publish', '=', 1)->where('lan', '=', $lan)->count();
		$TotalRoom = Room_manage::where('is_publish', '=', 1)->count();
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

		$TodaysAvailableRoom = Room_manage::where('book_status', '=', 2)->where('is_publish', '=', 1)->count();
		$TotalBookedRoom = Room_manage::where('book_status', '=', 1)->where('is_publish', '=', 1)->count();
		
		$ActiveCustomer = User::where('role_id', '=', 2)->where('status_id', '=', 1)->count();
		$InactiveCustomer = User::where('role_id', '=', 2)->where('status_id', '=', 2)->count();
		$TotalUser = User::whereIn('role_id', [1, 3])->count();
		
		$RecentBookingRequest = DB::table('booking_manages')
			->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
			->select('booking_manages.*', 'rooms.title')
			->where('booking_manages.booking_status_id', '=', 1)
			->orderBy('booking_manages.id', 'desc')
			->limit(50)
			->get();
		
        return view('backend.dashboard', compact(
		'TotalEarn', 
		'PendingPayment',
		'CanceledPayment',
		'IncompletedPayment',
		'TotalRoomType',
		'TotalRoom',
		'TotalBookingCompleted',
		'TotalRunningBooking',
		'TotalBookingRequest',
		'TotalBookingCanceled',
		'TodaysBookedRoom',
		'TodaysAvailableRoom',
		'TotalBookedRoom',
		'ActiveCustomer',
		'InactiveCustomer',
		'TotalUser',
		'RecentBookingRequest'
		));
    }
	
	//get Monthly Chart Report
	public function getMonthlyChartReport(Request $request){

		$res = array();

		$MonthYearList = array();
		for ($i = 1; $i <= 12; $i++) {
			$myStr = date("Y-m", strtotime(date( 'Y-m-01' )." -$i months"));
			$myArr =  explode("-", $myStr);
			$MonthYearList[] = array('Year' => $myArr[0], 'Month' => $myArr[1]);
		}
		
		krsort($MonthYearList);
		
		//Monthly Earning Report (Last 12 Months)
		$MonthlyEarningReport = array('datalist' => array(), 'categorylist' => array());
		$MonthlyEarningCategoryList = array();
		$MonthlyEarningDataList = array();
		foreach ($MonthYearList as $row){
			$Year = $row['Year'];
			$Month = $row['Month'];
			$ymd = $Year.'-'.$Month.'-01';
			$ymdStr = strtotime($ymd);
			$MonthName = date('M', $ymdStr);
			$MonthlyEarningCategoryList[] = $Year.'-'.$MonthName;
			
			$mbSQL = "SELECT IFNULL(SUM(total_amount), 0) AS total_amount
			FROM booking_manages 
			WHERE booking_status_id = 3
			AND payment_status_id = 1
			AND YEAR(created_at) = $Year
			AND MONTH(created_at) = $Month";
			$mbData = DB::select(DB::raw($mbSQL));
			foreach ($mbData as $aRow){
				$MonthlyEarningDataList[] = $aRow->total_amount;
			}
		}
		
		$MonthlyEarningReport['categorylist'] = $MonthlyEarningCategoryList;
		$MonthlyEarningReport['datalist'] = $MonthlyEarningDataList;
		$res['MonthlyEarningData'] = $MonthlyEarningReport;
		
		//Monthly Booking Report (Last 12 Months)
		$MonthlyBookingReport = array('datalist' => array(), 'categorylist' => array());
		$MonthlyBookingCategoryList = array();
		$MonthlyBookingDataList = array();
		foreach ($MonthYearList as $row){
			$Year = $row['Year'];
			$Month = $row['Month'];
			$ymd = $Year.'-'.$Month.'-01';
			$ymdStr = strtotime($ymd);
			$MonthName = date('M', $ymdStr);
			$MonthlyBookingCategoryList[] = $Year.'-'.$MonthName;
			
			$mbSQL = "SELECT COUNT(id) AS total_booking
			FROM booking_manages 
			WHERE booking_status_id = 3
			AND payment_status_id = 1
			AND YEAR(created_at) = $Year
			AND MONTH(created_at) = $Month";
			$mbData = DB::select(DB::raw($mbSQL));
			foreach ($mbData as $aRow){
				$MonthlyBookingDataList[] = $aRow->total_booking;
			}
		}
		
		$MonthlyBookingReport['categorylist'] = $MonthlyBookingCategoryList;
		$MonthlyBookingReport['datalist'] = $MonthlyBookingDataList;
		$res['MonthlyBookingData'] = $MonthlyBookingReport;
		
		return response()->json($res);
	}	
}
