<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Tp_option;

class CurrencyController extends Controller
{
    //Currency page load
    public function getCurrencyPageLoad() {
		
		$results = Tp_option::where('option_name', 'currency')->get();

		$id = '';
		$currency_name = '';
		$currency_icon = '';
		$currency_position = '';
		foreach ($results as $row){
			$id = $row->id;
		}

		$data = array();
		if($id != ''){
			
			$sData = json_decode($results);
			$dataObj = json_decode($sData[0]->option_value);
			
			$data['currency_name'] = $dataObj->currency_name;
			$data['currency_icon'] = $dataObj->currency_icon;
			$data['currency_position'] = $dataObj->currency_position;
			$data['thousands_separator'] = $dataObj->thousands_separator;
			$data['decimal_separator'] = $dataObj->decimal_separator;
			$data['decimal_digit'] = $dataObj->decimal_digit;
		}else{
			$data['currency_name'] = '';
			$data['currency_icon'] = '';
			$data['currency_position'] = '';
			$data['thousands_separator'] = '';
			$data['decimal_separator'] = '';
			$data['decimal_digit'] = '';
		}
		
		$datalist = $data;

        return view('backend.currency', compact('datalist'));	
	}

	//Save data for Currency
    public function saveCurrencyData(Request $request){
		$res = array();
		
		$currency_name = esc($request->input('currency_name'));
		$currency_icon = esc($request->input('currency_icon'));
		$currency_position = $request->input('currency_position');
		$thousands_separator = $request->input('thousands_separator');
		$decimal_separator = $request->input('decimal_separator');
		$decimal_digit = $request->input('decimal_digit');
		
		$validator_array = array(
			'currency_name' => $request->input('currency_name'),
			'currency_icon' => $request->input('currency_icon'),
			'currency_position' => $request->input('currency_position'),
			'thousands_separator' => $request->input('thousands_separator'),
			'decimal_separator' => $request->input('decimal_separator'),
			'decimal_digit' => $request->input('decimal_digit')
		);
		
		$validator = Validator::make($validator_array, [
			'currency_name' => 'required',
			'currency_icon' => 'required',
			'currency_position' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('currency_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency_name');
			return response()->json($res);
		}
		
		if($errors->has('currency_icon')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency_icon');
			return response()->json($res);
		}
		
		if($errors->has('currency_position')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency_position');
			return response()->json($res);
		}
		
		if($errors->has('thousands_separator')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('thousands_separator');
			return response()->json($res);
		}
		
		if($errors->has('decimal_separator')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('decimal_separator');
			return response()->json($res);
		}
		
		if($errors->has('decimal_digit')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('decimal_digit');
			return response()->json($res);
		}
		
		$option = array(
			'currency_name' => $currency_name,
			'currency_icon' => $currency_icon,
			'currency_position' => $currency_position,
			'thousands_separator' => $thousands_separator,
			'decimal_separator' => $decimal_separator,
			'decimal_digit' => $decimal_digit
		);
		
		$data = array(
			'option_name' => 'currency',
			'option_value' => json_encode($option)
		);

		$gData = Tp_option::where('option_name', 'currency')->get();
		$id = '';
		foreach ($gData as $row){
			$id = $row['id'];
		}
		
		if($id == ''){
			$response = Tp_option::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Tp_option::where('id', $id)->update($data);
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
}
