<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Amenity;

class AmenitiesController extends Controller
{
	//Amenities page load
    public function getAmenitiesPageLoad() {

		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		
		$datalist = DB::table('amenities')
			->join('tp_status', 'amenities.is_publish', '=', 'tp_status.id')
			->select('amenities.*', 'tp_status.status')
			->orderBy('amenities.id','desc')
			->paginate(10);

        return view('backend.amenities', compact('statuslist', 'datalist'));
    }
	
	//Get data for Amenities Pagination
	public function getAmenitiesTableData(Request $request){

		$search = $request->search;
		
		if($request->ajax()){

			if($search != ''){
				
				$datalist = DB::table('amenities')
					->join('tp_status', 'amenities.is_publish', '=', 'tp_status.id')
					->select('amenities.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('name', 'like', '%'.$search.'%');
					})
					->orderBy('amenities.id','desc')
					->paginate(10);
			}else{
				
				$datalist = DB::table('amenities')
					->join('tp_status', 'amenities.is_publish', '=', 'tp_status.id')
					->select('amenities.*', 'tp_status.status')
					->orderBy('amenities.id','desc')
					->paginate(10);
			}

			return view('backend.partials.amenities_table', compact('datalist'))->render();
		}
	}
	
	//Save data for Amenities
    public function saveAmenitiesData(Request $request){
		$res = array();
		
		$id = $request->input('RecordId');
		$name = $request->input('name');
		$is_publish = $request->input('is_publish');
		
		$validator_array = array(
			'name' => $request->input('name')
		);
		
		$validator = Validator::make($validator_array, [
			'name' => 'required|max:191'
		]);

		$errors = $validator->errors();

		if($errors->has('name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('name');
			return response()->json($res);
		}

		$data = array(
			'name' => $name,
			'is_publish' => $is_publish
		);

		if($id ==''){
			$response = Amenity::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Amenity::where('id', $id)->update($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}
		
		return response()->json($res);
    }
	
	//Get data for Amenity by id
    public function getAmenityById(Request $request){

		$id = $request->id;
		
		$data = Amenity::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Amenity
	public function deleteAmenity(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Amenity::where('id', $id)->delete();
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
	
	//Bulk Action for Amenity
	public function bulkActionAmenity(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Amenity::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Amenity::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Amenity::whereIn('id', $idsArray)->delete();
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
}
