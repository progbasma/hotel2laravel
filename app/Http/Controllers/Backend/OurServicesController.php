<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Media_option;
use App\Models\Section_content;

class OurServicesController extends Controller
{
	//Our Services page load
    public function getOurServicesPageLoad() {
		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);
		
		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		
		$datalist = DB::table('section_contents')
			->join('tp_status', 'section_contents.is_publish', '=', 'tp_status.id')
			->select('section_contents.*', 'tp_status.status')
			->where('section_type', '=', 'our_services')
			->orderBy('section_contents.id','desc')
			->paginate(20);

        return view('backend.our-services', compact('media_datalist', 'statuslist', 'datalist'));
    }

	//Get data for Our Services Pagination
	public function getOurServicesTableData(Request $request){

		$search = $request->search;
		$page_type = $request->page_type;
		
		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('section_contents')
					->join('tp_status', 'section_contents.is_publish', '=', 'tp_status.id')
					->select('section_contents.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('title', 'like', '%'.$search.'%');
					})
					->where('section_type', '=', 'our_services')
					->orderBy('section_contents.id','desc')
					->paginate(20);
			}else{
				
				$datalist = DB::table('section_contents')
					->join('tp_status', 'section_contents.is_publish', '=', 'tp_status.id')
					->select('section_contents.*', 'tp_status.status')
					->where('section_type', '=', 'our_services')
					->orderBy('section_contents.id','desc')
					->paginate(20);
			}

			return view('backend.partials.our_services_table', compact('datalist'))->render();
		}
	}
	
	//Save data for Our Services
    public function saveOurServicesData(Request $request){
		$res = array();
		
		$id = $request->input('RecordId');
		$title = $request->input('services_title');
		$description = $request->input('description');
		$image = $request->input('image');
		$is_publish = $request->input('is_publish');
		
		$validator_array = array(
			'image' => $request->input('image'),
			'title' => $request->input('services_title'),
			'description' => $request->input('description'),
			'is_publish' => $request->input('is_publish')
		);
		
		$validator = Validator::make($validator_array, [
			'image' => 'required',
			'title' => 'required',
			'description' => 'required',
			'is_publish' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('image')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('image');
			return response()->json($res);
		}
		
		if($errors->has('title')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('title');
			return response()->json($res);
		}
		
		if($errors->has('description')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('description');
			return response()->json($res);
		}
		
		if($errors->has('is_publish')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('is_publish');
			return response()->json($res);
		}

		$data = array(
			'section_type' => 'our_services',
			'image' => $image,
			'title' => $title,
			'desc' => $description,
			'is_publish' => $is_publish
		);

		if($id ==''){
			$response = Section_content::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Section_content::where('id', $id)->update($data);
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
	
	//Get data for Our Services by id
    public function getOurServicesById(Request $request){

		$id = $request->id;
		
		$data = Section_content::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Our Services
	public function deleteOurService(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Section_content::where('id', $id)->delete();
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
	
	//Bulk Action for Our Services
	public function bulkActionOurServices(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Section_content::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Section_content::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Section_content::whereIn('id', $idsArray)->delete();
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
