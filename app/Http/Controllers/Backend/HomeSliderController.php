<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Media_option;
use App\Models\Slider;

class HomeSliderController extends Controller
{
    //Slider page load
    public function getSliderPageLoad() {
		
		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);
		
		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		
		$datalist = DB::table('sliders')
			->join('tp_status', 'sliders.is_publish', '=', 'tp_status.id')
			->select('sliders.*', 'tp_status.status')
			->orderBy('sliders.id','desc')
			->paginate(10);

        return view('backend.slider', compact('media_datalist', 'statuslist', 'datalist'));
    }

	//Get data for Slider Pagination
	public function getSliderTableData(Request $request){

		$search = $request->search;
		$slider_type = $request->slider_type;
		
		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('sliders')
					->join('tp_status', 'sliders.is_publish', '=', 'tp_status.id')
					->select('sliders.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('slider_type', 'like', '%'.$search.'%')
							->orWhere('title', 'like', '%'.$search.'%')
							->orWhere('url', 'like', '%'.$search.'%');
					})
					->orderBy('sliders.id','desc')
					->paginate(10);
			}else{
				
				$datalist = DB::table('sliders')
					->join('tp_status', 'sliders.is_publish', '=', 'tp_status.id')
					->select('sliders.*', 'tp_status.status')
					->where(function ($query) use ($slider_type){
						$query->whereRaw("sliders.slider_type = '".$slider_type."' OR '".$slider_type."' = '0'");
					})
					->orderBy('sliders.id','desc')
					->paginate(10);
			}

			return view('backend.partials.slider_table', compact('datalist'))->render();
		}
	}
	
	//Save data for Slider
    public function saveSliderData(Request $request){
		$res = array();
		
		$id = $request->input('RecordId');
		$slider_type = $request->input('slider_type');
		$title = $request->input('slider_title');
		$sub_title = $request->input('sub_title');
		$image = $request->input('image');
		$button_text = $request->input('button_text');
		$target = $request->input('target');
		$url = $request->input('image_url');
		$is_publish = $request->input('is_publish');
		
		$validator_array = array(
			'slider_type' => $request->input('slider_type'),
			'image' => $request->input('image'),
			'title' => $request->input('slider_title'),
			'is_publish' => $request->input('is_publish')
		);
		
		$validator = Validator::make($validator_array, [
			'slider_type' => 'required',
			'image' => 'required',
			'title' => 'required',
			'is_publish' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('slider_type')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('slider_type');
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
			'sub_title' => $sub_title,
			'button_text' => $button_text,
			'target' => $target
		);		
		
		$data = array(
			'slider_type' => $slider_type,
			'image' => $image,
			'url' => $url,
			'title' => $title,
			'desc' => json_encode($option),
			'is_publish' => $is_publish
		);

		if($id ==''){
			$response = Slider::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Slider::where('id', $id)->update($data);
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
	
	//Get data for Slider by id
    public function getSliderById(Request $request){

		$id = $request->id;
		
		$data = Slider::where('id', $id)->first();
		$data->desc = json_decode($data->desc);
		
		return response()->json($data);
	}
	
	//Delete data for Slider
	public function deleteSlider(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Slider::where('id', $id)->delete();
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
	
	//Bulk Action for Slider
	public function bulkActionSlider(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Slider::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Slider::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Slider::whereIn('id', $idsArray)->delete();
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
