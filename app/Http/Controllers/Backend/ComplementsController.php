<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Complement;

class ComplementsController extends Controller
{
	//Complements page load
    public function getComplementsPageLoad() {

		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		
		$datalist = DB::table('complements')
			->join('tp_status', 'complements.is_publish', '=', 'tp_status.id')
			->select('complements.*', 'tp_status.status')
			->orderBy('complements.id','desc')
			->paginate(10);

        return view('backend.complements', compact('statuslist', 'datalist'));
    }
	
	//Get data for Complements Pagination
	public function getComplementsTableData(Request $request){

		$search = $request->search;
		
		if($request->ajax()){

			if($search != ''){
				
				$datalist = DB::table('complements')
					->join('tp_status', 'complements.is_publish', '=', 'tp_status.id')
					->select('complements.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('complements.name', 'like', '%'.$search.'%')
						->orWhere('complements.item', 'like', '%'.$search.'%');
					})
					->orderBy('complements.id','desc')
					->paginate(10);
			}else{
				
				$datalist = DB::table('complements')
					->join('tp_status', 'complements.is_publish', '=', 'tp_status.id')
					->select('complements.*', 'tp_status.status')
					->orderBy('complements.id','desc')
					->paginate(10);
			}

			return view('backend.partials.complements_table', compact('datalist'))->render();
		}
	}
	
	//Save data for Complements
    public function saveComplementsData(Request $request){
		$res = array();
		
		$id = $request->input('RecordId');
		$name = $request->input('name');
		$item = $request->input('item');
		$is_publish = $request->input('is_publish');
		
		$validator_array = array(
			'name' => $request->input('name'),
			'item' => $request->input('item')
		);
		
		$validator = Validator::make($validator_array, [
			'name' => 'required|max:191',
			'item' => 'required|max:191'
		]);

		$errors = $validator->errors();

		if($errors->has('name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('name');
			return response()->json($res);
		}
		
		if($errors->has('item')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('item');
			return response()->json($res);
		}

		$data = array(
			'name' => $name,
			'item' => $item,
			'is_publish' => $is_publish
		);

		if($id ==''){
			$response = Complement::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Complement::where('id', $id)->update($data);
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
	
	//Get data for Complement by id
    public function getComplementById(Request $request){

		$id = $request->id;
		
		$data = Complement::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Complement
	public function deleteComplement(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Complement::where('id', $id)->delete();
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
	
	//Bulk Action for Complement
	public function bulkActionComplement(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Complement::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Complement::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Complement::whereIn('id', $idsArray)->delete();
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
