<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Section_manage;
use App\Models\Media_option;

class SectionManageController extends Controller
{

 //Section manage page load
    public function getSectionManagePageLoad() {

		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);
        $languageslist = DB::table('languages')->where('status', 1)->orderBy('language_name', 'asc')->get();


		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();

		$datalist = DB::table('section_manages')
			->join('tp_status', 'section_manages.is_publish', '=', 'tp_status.id')
			->select('section_manages.*', 'tp_status.status')
			->orderBy('section_manages.id','asc')
			->paginate(20);

        return view('backend.section-manage', compact('media_datalist', 'statuslist', 'datalist','languageslist'));
    }

	//Get data for Section Manage Pagination
	public function getSectionManageTableData(Request $request){

		$search = $request->search;
		$manage_type = $request->manage_type;

		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('section_manages')
					->join('tp_status', 'section_manages.is_publish', '=', 'tp_status.id')
					->select('section_manages.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('title', 'like', '%'.$search.'%')
							->orWhere('url', 'like', '%'.$search.'%')
							->orWhere('desc', 'like', '%'.$search.'%');
					})
					->orderBy('section_manages.id','asc')
					->paginate(20);
			}else{

				$datalist = DB::table('section_manages')
					->join('tp_status', 'section_manages.is_publish', '=', 'tp_status.id')
					->select('section_manages.*', 'tp_status.status')
					->where(function ($query) use ($manage_type){
						$query->whereRaw("section_manages.manage_type = '".$manage_type."' OR '".$manage_type."' = '0'");
					})
					->orderBy('section_manages.id','asc')
					->paginate(20);
			}

			return view('backend.partials.section_manage_table', compact('datalist'))->render();
		}
	}

	//Save data for Section Manage
    public function saveSectionManageData(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$manage_type = $request->input('manage_type');
		$section = $request->input('section');
		$title = $request->input('title');
		$desc = $request->input('desc');
		$image = $request->input('image');
		$lan = $request->input('lan');
		$is_publish = $request->input('is_publish');

		$validator_array = array(
			'manage_type' => $request->input('manage_type'),
			'section' => $request->input('section'),
			'title' => $request->input('title')
		);

		$validator = Validator::make($validator_array, [
			'manage_type' => 'required|max:191',
			'section' => 'required|max:191',
			'title' => 'required|max:191'
		]);

		$errors = $validator->errors();

		if($errors->has('manage_type')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('manage_type');
			return response()->json($res);
		}

		if($errors->has('section')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('section');
			return response()->json($res);
		}

		if($errors->has('title')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('title');
			return response()->json($res);
		}

		$data = array(
			'manage_type' => $manage_type,
			'section' => $section,
			'title' => $title,
			'desc' => $desc,
			'image' => $image,
            'lan' => $lan,
			'is_publish' => $is_publish
		);

		if($id ==''){
			$response = Section_manage::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Section_manage::where('id', $id)->update($data);
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

	//Get data for Section Manage by id
    public function getSectionManageById(Request $request){

		$id = $request->id;

		$data = Section_manage::where('id', $id)->first();

		return response()->json($data);
	}

	//Delete data for Section Manage
	public function deleteSectionManage(Request $request){

		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Section_manage::where('id', $id)->delete();
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

	//Bulk Action for Section Manage
	public function bulkActionSectionManage(Request $request){

		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);

		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Section_manage::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}

		}elseif($BulkAction == 'draft'){

			$response = Section_manage::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}

		}elseif($BulkAction == 'delete'){
			$response = Section_manage::whereIn('id', $idsArray)->delete();
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
