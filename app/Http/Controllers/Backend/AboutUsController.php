<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Media_option;
use App\Models\Section_content;

class AboutUsController extends Controller
{
	//About Us page load
    public function getAboutUsPageLoad() {
		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);

		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		$languageslist = DB::table('languages')->where('status', 1)->orderBy('language_name', 'asc')->get();

		$datalist = DB::table('section_contents')
			->join('tp_status', 'section_contents.is_publish', '=', 'tp_status.id')
			->select('section_contents.*', 'tp_status.status')
			->where('section_type', '=', 'about_us')
			->orderBy('section_contents.id','desc')
			->paginate(10);

        return view('backend.about-us', compact('media_datalist', 'statuslist', 'datalist', 'languageslist'));
    }

	//Get data for About Us Pagination
	public function getAboutUsTableData(Request $request){

		$search = $request->search;
		$page_type = $request->page_type;

		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('section_contents')
					->join('tp_status', 'section_contents.is_publish', '=', 'tp_status.id')
					->select('section_contents.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('page_type', 'like', '%'.$search.'%')
							->orWhere('title', 'like', '%'.$search.'%')
							->orWhere('url', 'like', '%'.$search.'%');
					})
					->where('section_type', '=', 'about_us')
					->orderBy('section_contents.id','desc')
					->paginate(10);
			}else{

				$datalist = DB::table('section_contents')
					->join('tp_status', 'section_contents.is_publish', '=', 'tp_status.id')
					->select('section_contents.*', 'tp_status.status')
					->where(function ($query) use ($page_type){
						$query->whereRaw("section_contents.page_type = '".$page_type."' OR '".$page_type."' = '0'");
					})
					->where('section_type', '=', 'about_us')
					->orderBy('section_contents.id','desc')
					->paginate(10);
			}

			return view('backend.partials.about_us_table', compact('datalist'))->render();
		}
	}

	//Save data for About Us
    public function saveAboutUsData(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$lan = $request->input('lan');
		$page_type = $request->input('page_type');
		$title = $request->input('about_title');
		$description = $request->input('description');
		$image = $request->input('image');
		$image2 = $request->input('image2');
		$image3 = $request->input('image3');
		$total_rooms = $request->input('total_rooms');
		$total_customers = $request->input('total_customers');
		$total_amenities = $request->input('total_amenities');
		$total_packages = $request->input('total_packages');
		$button_text = $request->input('button_text');
		$target = $request->input('target');
		$url = $request->input('image_url');
		$year = $request->input('year');
		$tp_name = $request->input('tp_name');
		$position = $request->input('position');
		$is_publish = $request->input('is_publish');

		$validator_array = array(
			'manage_page' => $request->input('page_type'),
			'image' => $request->input('image'),
			'title' => $request->input('about_title'),
			'is_publish' => $request->input('is_publish')
		);

		$validator = Validator::make($validator_array, [
			'manage_page' => 'required',
			'image' => 'required',
			'title' => 'required',
			'is_publish' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('manage_page')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('manage_page');
			return response()->json($res);
		}

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

		if($errors->has('is_publish')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('is_publish');
			return response()->json($res);
		}

		$option = array(
			'description' => $description,
			'total_rooms' => $total_rooms,
			'total_customers' => $total_customers,
			'total_amenities' => $total_amenities,
			'total_packages' => $total_packages,
			'button_text' => $button_text,
			'target' => $target,
			'image2' => $image2,
			'image3' => $image3,
			'year' => $year,
			'tp_name' => $tp_name,
			'position' => $position
		);

		$data = array(
			'section_type' => 'about_us',
			'page_type' => $page_type,
			'image' => $image,
			'url' => $url,
			'title' => $title,
			'desc' => json_encode($option),
            'lan' => $lan,
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

	//Get data for About Us by id
    public function getAboutUsById(Request $request){

		$id = $request->id;

		$data = Section_content::where('id', $id)->first();
		$data->desc = json_decode($data->desc);

		return response()->json($data);
	}

	//Delete data for About Us
	public function deleteAboutUs(Request $request){

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

	//Bulk Action for About Us
	public function bulkActionAboutUs(Request $request){

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
