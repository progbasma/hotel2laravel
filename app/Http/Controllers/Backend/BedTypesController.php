<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Bedtype;

class BedTypesController extends Controller
{
	//Bed Types page load
    public function getBedTypesPageLoad() {

		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		
		$datalist = DB::table('bedtypes')
			->join('tp_status', 'bedtypes.is_publish', '=', 'tp_status.id')
			->select('bedtypes.*', 'tp_status.status')
			->orderBy('bedtypes.id','desc')
			->paginate(10);

        return view('backend.bed-types', compact('statuslist', 'datalist'));
    }
	
	//Get data for Bed Types Pagination
	public function getBedTypesTableData(Request $request){

		$search = $request->search;
		
		if($request->ajax()){

			if($search != ''){
				
				$datalist = DB::table('bedtypes')
					->join('tp_status', 'bedtypes.is_publish', '=', 'tp_status.id')
					->select('bedtypes.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('name', 'like', '%'.$search.'%');
					})
					->orderBy('bedtypes.id','desc')
					->paginate(10);
			}else{
				
				$datalist = DB::table('bedtypes')
					->join('tp_status', 'bedtypes.is_publish', '=', 'tp_status.id')
					->select('bedtypes.*', 'tp_status.status')
					->orderBy('bedtypes.id','desc')
					->paginate(10);
			}

			return view('backend.partials.bed_types_table', compact('datalist'))->render();
		}
	}
	
	//Save data for Bed Types
    public function saveBedTypesData(Request $request){
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
			$response = Bedtype::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Bedtype::where('id', $id)->update($data);
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
	
	//Get data for Bedtype by id
    public function getBedTypeById(Request $request){

		$id = $request->id;
		
		$data = Bedtype::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Bedtype
	public function deleteBedType(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Bedtype::where('id', $id)->delete();
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
	
	//Bulk Action for Bedtype
	public function bulkActionBedType(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Bedtype::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Bedtype::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Bedtype::whereIn('id', $idsArray)->delete();
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
