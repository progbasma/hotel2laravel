<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class RoomListController extends Controller
{
	//Room List Page load
    public function getRoomListPageLoad() {

		$room_list = Room::where('is_publish', 1)->orderBy('title','asc')->get();

		$datalist = DB::table('room_manages')
			->join('tp_status', 'room_manages.is_publish', '=', 'tp_status.id')
			->join('rooms', 'room_manages.roomtype_id', '=', 'rooms.id')
			->leftjoin('room_assigns', 'room_manages.id', '=', 'room_assigns.room_id')
			->leftjoin('booking_manages', 'room_assigns.booking_id', '=', 'booking_manages.id')
			->select('room_manages.*', 'tp_status.status', 'rooms.title', 'booking_manages.booking_no', 
			'booking_manages.name', 'booking_manages.phone')
			->orderBy('rooms.title','asc')
			->orderBy('room_manages.room_no','asc')
			->paginate(30);

        return view('backend.room-list', compact('room_list', 'datalist'));
    }
	
	//Get data for Room List Pagination
	public function getRoomsListTableData(Request $request){

		$search = $request->search;
		$roomtype_id = $request->roomtype_id;

		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('room_manages')
					->join('tp_status', 'room_manages.is_publish', '=', 'tp_status.id')
					->join('rooms', 'room_manages.roomtype_id', '=', 'rooms.id')
					->leftjoin('room_assigns', 'room_manages.id', '=', 'room_assigns.room_id')
					->leftjoin('booking_manages', 'room_assigns.booking_id', '=', 'booking_manages.id')
					->select('room_manages.*', 'tp_status.status', 'rooms.title', 'booking_manages.booking_no', 
					'booking_manages.name', 'booking_manages.phone')
					->where(function ($query) use ($search){
						$query->where('room_manages.room_no', 'like', '%'.$search.'%')
							->orWhere('booking_manages.booking_no', 'like', '%'.$search.'%')
							->orWhere('booking_manages.name', 'like', '%'.$search.'%')
							->orWhere('booking_manages.email', 'like', '%'.$search.'%')
							->orWhere('booking_manages.phone', 'like', '%'.$search.'%')
							->orWhere('rooms.title', 'like', '%'.$search.'%');
					})
					->where(function ($query) use ($roomtype_id){
						$query->whereRaw("room_manages.roomtype_id = '".$roomtype_id."' OR '".$roomtype_id."' = '0'");
					})
					->orderBy('rooms.title','asc')
					->orderBy('room_manages.room_no','asc')
					->paginate(30);
			}else{

				$datalist = DB::table('room_manages')
					->join('tp_status', 'room_manages.is_publish', '=', 'tp_status.id')
					->join('rooms', 'room_manages.roomtype_id', '=', 'rooms.id')
					->leftjoin('room_assigns', 'room_manages.id', '=', 'room_assigns.room_id')
					->leftjoin('booking_manages', 'room_assigns.booking_id', '=', 'booking_manages.id')
					->select('room_manages.*', 'tp_status.status', 'rooms.title', 'booking_manages.booking_no', 
					'booking_manages.name', 'booking_manages.phone')
					->whereRaw("room_manages.roomtype_id = '".$roomtype_id."' OR '".$roomtype_id."' = '0'")
					->orderBy('rooms.title','asc')
					->orderBy('room_manages.room_no','asc')
					->paginate(30);
			}
			
			return view('backend.partials.room_list_table', compact('datalist'))->render();
		}
	}
}
