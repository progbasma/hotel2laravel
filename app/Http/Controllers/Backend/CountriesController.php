<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;

class CountriesController extends Controller
{
	//Countries page load
    public function getCountriesPageLoad() {

		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		
		$datalist = DB::table('countries')
			->join('tp_status', 'countries.is_publish', '=', 'tp_status.id')
			->select('countries.*', 'tp_status.status')
			->orderBy('countries.id','desc')
			->paginate(20);

        return view('backend.countries', compact('statuslist', 'datalist'));
    }
	
	//Get data for Countries Pagination
	public function getCountriesTableData(Request $request){

		$search = $request->search;
		
		if($request->ajax()){

			if($search != ''){
				
				$datalist = DB::table('countries')
					->join('tp_status', 'countries.is_publish', '=', 'tp_status.id')
					->select('countries.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('country_name', 'like', '%'.$search.'%');
					})
					->orderBy('countries.id','desc')
					->paginate(20);
			}else{
				
				$datalist = DB::table('countries')
					->join('tp_status', 'countries.is_publish', '=', 'tp_status.id')
					->select('countries.*', 'tp_status.status')
					->orderBy('countries.id','desc')
					->paginate(20);
			}

			return view('backend.partials.countries_table', compact('datalist'))->render();
		}
	}
	
	//Save data for Countries
    public function saveCountriesData(Request $request){
		$res = array();
		
		$id = $request->input('RecordId');
		$country_name = $request->input('country_name');
		$is_publish = $request->input('is_publish');
		
		$validator_array = array(
			'country_name' => $request->input('country_name')
		);
		
		$validator = Validator::make($validator_array, [
			'country_name' => 'required|max:191'
		]);

		$errors = $validator->errors();

		if($errors->has('country_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('country_name');
			return response()->json($res);
		}

		$data = array(
			'country_name' => $country_name,
			'is_publish' => $is_publish
		);

		if($id ==''){
			$response = Country::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Country::where('id', $id)->update($data);
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
	
	//Get data for Country by id
    public function getCountryById(Request $request){

		$id = $request->id;
		
		$data = Country::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Country
	public function deleteCountry(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Country::where('id', $id)->delete();
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
	
	//Bulk Action for Country
	public function bulkActionCountry(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Country::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Country::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Country::whereIn('id', $idsArray)->delete();
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
