<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Tp_option;
use App\Models\Media_setting;

class SettingsController extends Controller
{

    //General page load
    public function getGeneralPageLoad(){

		$timezonelist = DB::table('timezones')->orderBy('timezone_name', 'asc')->get();

		$datalist = Tp_option::where('option_name', 'general_settings')->get();
		$id = '';
		$option_value = '';
		foreach ($datalist as $row){
			$id = $row->id;
			$option_value = json_decode($row->option_value);
		}

		$data = array();
		if($id != ''){
			$data['site_name'] = $option_value->site_name;
			$data['site_title'] = $option_value->site_title;
			$data['company'] = $option_value->company;
			$data['email'] = $option_value->email;
			$data['phone'] = $option_value->phone;
			$data['address'] = $option_value->address;
			$data['timezone'] = $option_value->timezone;
		}else{
			$data['site_name'] = '';
			$data['site_title'] = '';
			$data['company'] = '';
			$data['email'] = '';
			$data['phone'] = '';
			$data['address'] = '';
			$data['timezone'] = '';
		}

		$datalist = $data;

        return view('backend.general', compact('timezonelist', 'datalist'));
    }

	//Save data for general Setting
    public function GeneralSettingUpdate(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$company = $request->input('company');
		$email = $request->input('email');
		$phone = $request->input('phone');
		$site_name = $request->input('site_name');
		$site_title = $request->input('site_title');
		$address = $request->input('address');
		$timezone = $request->input('timezone');

		$validator_array = array(
			'company' => $request->input('company'),
			'email' => $request->input('email'),
			'phone' => $request->input('phone'),
			'site_name' => $request->input('site_name'),
			'address' => $request->input('address'),
			'site_title' => $request->input('site_title')
		);

		$validator = Validator::make($validator_array, [
			'company' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'site_name' => 'required',
			'address' => 'required',
			'site_title' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('company')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('company');
			return response()->json($res);
		}

		if($errors->has('email')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('email');
			return response()->json($res);
		}

		if($errors->has('phone')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('phone');
			return response()->json($res);
		}

		if($errors->has('site_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('site_name');
			return response()->json($res);
		}

		if($errors->has('site_title')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('site_title');
			return response()->json($res);
		}

		if($errors->has('address')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('address');
			return response()->json($res);
		}

		$option_value = array(
			'company' => $company,
			'email' => $email,
			'phone' => $phone,
			'site_name' => $site_name,
			'site_title' => $site_title,
			'address' => $address,
			'timezone' => $timezone
		);

		$data = array(
			'option_name' => 'general_settings',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'general_settings')->get();
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

    //Google Recaptcha page load
    public function loadGoogleRecaptchaPage(){
		$datalist = Tp_option::where('option_name', 'google_recaptcha')->get();
		$id = '';
		$option_value = '';
		foreach ($datalist as $row){
			$id = $row->id;
			$option_value = json_decode($row->option_value);
		}

		$data = array();
		if($id != ''){
			$data['sitekey'] = $option_value->sitekey;
			$data['secretkey'] = $option_value->secretkey;
			$data['is_recaptcha'] = $option_value->is_recaptcha;
		}else{
			$data['sitekey'] = '';
			$data['secretkey'] = '';
			$data['is_recaptcha'] = '';
		}

		$datalist = $data;

		return view('backend.google-recaptcha', compact('datalist'));
    }

	//Save data for Google Recaptcha
    public function GoogleRecaptchaUpdate(Request $request){
		$res = array();

		$sitekey = $request->input('sitekey');
		$secretkey = $request->input('secretkey');
		$g_recaptcha = $request->input('recaptcha');

		if ($g_recaptcha == 'true' || $g_recaptcha == 'on') {
			$recaptcha = 1;
		}else {
			$recaptcha = 0;
		}

		$validator_array = array(
			'sitekey' => $request->input('sitekey'),
			'secretkey' => $request->input('secretkey')
		);

		$validator = Validator::make($validator_array, [
			'sitekey' => 'required',
			'secretkey' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('sitekey')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('sitekey');
			return response()->json($res);
		}
		if($errors->has('secretkey')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('secretkey');
			return response()->json($res);
		}

		$option_value = array(
			'sitekey' => $sitekey,
			'secretkey' => $secretkey,
			'is_recaptcha' => $recaptcha
		);

		$data = array(
			'option_name' => 'google_recaptcha',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'google_recaptcha')->get();
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

    //Google Map page load
    public function loadGoogleMapPage(){
		$datalist = Tp_option::where('option_name', 'google_map')->get();
		$id = '';
		$option_value = '';
		foreach ($datalist as $row){
			$id = $row->id;
			$option_value = json_decode($row->option_value);
		}

		$data = array();
		if($id != ''){
			$data['googlemap_apikey'] = $option_value->googlemap_apikey;
			$data['is_googlemap'] = $option_value->is_googlemap;
		}else{
			$data['googlemap_apikey'] = '';
			$data['is_googlemap'] = '';
		}

		$datalist = $data;

		return view('backend.google-map', compact('datalist'));
    }

	//Save data for Google Map
    public function GoogleMapUpdate(Request $request){
		$res = array();

		$googlemap_apikey = $request->input('googlemap_apikey');
		$isGooglemap = $request->input('is_googlemap');

		if ($isGooglemap == 'true' || $isGooglemap == 'on') {
			$is_googlemap = 1;
		}else {
			$is_googlemap = 0;
		}

		$validator_array = array(
			'googlemap_apikey' => $request->input('googlemap_apikey')
		);

		$validator = Validator::make($validator_array, [
			'googlemap_apikey' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('googlemap_apikey')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('googlemap_apikey');
			return response()->json($res);
		}

		$option_value = array(
			'googlemap_apikey' => $googlemap_apikey,
			'is_googlemap' => $is_googlemap
		);

		$data = array(
			'option_name' => 'google_map',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'google_map')->get();
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

    //load Theme Register page
    public function loadThemeRegisterPage(){

		$results = Tp_option::where('option_name', 'pcode')->get();
		$id = '';
		$option_value = '';
		foreach ($results as $row){
			$id = $row->id;
			$option_value = json_decode($row->option_value);
		}

		$data = array();
		if($id != ''){
			$data['verified'] = $option_value->verified;
		}else{
			$data['verified'] = 0;
		}

		$datalist = $data;

        return view('backend.theme-register', compact('datalist'));
    }

	//Save data for Purchase Code Setting
    public function CodeVerified(Request $request){
		$res = array();

		$pcode = $request->input('pcode');

		$validator_array = array(
			'PurchaseCode' => $request->input('pcode')
		);

		$validator = Validator::make($validator_array, [
			'PurchaseCode' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('PurchaseCode')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('PurchaseCode');
			return response()->json($res);
		}

		$purchase_code = htmlspecialchars($pcode);
		$verifyRes = verifyPurchase($purchase_code);

		if($verifyRes == 0){
			Tp_option::where('option_name', 'vipc')->delete();
			$op_value = array('bactive' => 0,'resetkey' => 0);
			$vipc_data = array('option_name' => 'vipc', 'option_value' => json_encode($op_value));
			Tp_option::create($vipc_data);

			$res['msgType'] = 'error';
			$res['msg'] = __('Sorry, This is not a valid purchase code.');
			return response()->json($res);
		}

		$option_value = array(
			'pcode' => base64_encode($pcode),
			'verified' => 1
		);

		$data = array(
			'option_name' => 'pcode',
			'option_value' => json_encode($option_value)
		);

		$res_id = Tp_option::create($data)->id;
		if($res_id !=''){

			Tp_option::where('option_name', 'vipc')->delete();
			$op_value = array('bactive' => 1,'resetkey' => 5);
			$vipc_data = array('option_name' => 'vipc', 'option_value' => json_encode($op_value));
			Tp_option::create($vipc_data);

			$res['msgType'] = 'success';
			$res['msg'] = __('Theme registered Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data insert failed');
		}

		return response()->json($res);
    }

	//Delete data for Pcode
	public function deletePcode(Request $request){

		$res = array();

		$response = Tp_option::where('option_name', 'pcode')->delete();
		if($response){
			Tp_option::where('option_name', 'vipc')->delete();
			$op_value = array('bactive' => 0,'resetkey' => 0);
			$vipc_data = array('option_name' => 'vipc', 'option_value' => json_encode($op_value));
			Tp_option::create($vipc_data);

			$res['msgType'] = 'success';
			$res['msg'] = __('Theme deregister Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data remove failed');
		}

		return response()->json($res);
	}

    //load Payment Methods page
    public function loadPaymentMethodsPage(){

		//Stripe
		$stripe_data = Tp_option::where('option_name', 'stripe')->get();

		$stripe_id = '';
		foreach ($stripe_data as $row){
			$stripe_id = $row->id;
		}

		$stripe_data_list = array();
		if($stripe_id != ''){
			$sData = json_decode($stripe_data);
			$sObj = json_decode($sData[0]->option_value);
			$stripe_data_list['stripe_key'] = $sObj->stripe_key;
			$stripe_data_list['stripe_secret'] = $sObj->stripe_secret;
			$stripe_data_list['currency'] = $sObj->currency;
			$stripe_data_list['isenable'] = $sObj->isenable;
		}else{
			$stripe_data_list['stripe_key'] = '';
			$stripe_data_list['stripe_secret'] = '';
			$stripe_data_list['currency'] = '';
			$stripe_data_list['isenable'] = '';
		}

		//Paypal
		$paypal_data = Tp_option::where('option_name', 'paypal')->get();

		$paypal_id = '';
		foreach ($paypal_data as $row){
			$paypal_id = $row->id;
		}

		$paypal_data_list = array();
		if($paypal_id != ''){
			$paypalData = json_decode($paypal_data);
			$paypalObj = json_decode($paypalData[0]->option_value);
			$paypal_data_list['paypal_client_id'] = $paypalObj->paypal_client_id;
			$paypal_data_list['paypal_secret'] = $paypalObj->paypal_secret;
			$paypal_data_list['paypal_currency'] = $paypalObj->paypal_currency;
			$paypal_data_list['ismode_paypal'] = $paypalObj->ismode_paypal;
			$paypal_data_list['isenable_paypal'] = $paypalObj->isenable_paypal;
		}else{
			$paypal_data_list['paypal_client_id'] = '';
			$paypal_data_list['paypal_secret'] = '';
			$paypal_data_list['paypal_currency'] = '';
			$paypal_data_list['ismode_paypal'] = '';
			$paypal_data_list['isenable_paypal'] = '';
		}

		//Razorpay
		$razorpay_data = Tp_option::where('option_name', 'razorpay')->get();

		$razorpay_id = '';
		foreach ($razorpay_data as $row){
			$razorpay_id = $row->id;
		}

		$razorpay_data_list = array();
		if($razorpay_id != ''){
			$razorpayData = json_decode($razorpay_data);
			$razorpayObj = json_decode($razorpayData[0]->option_value);
			$razorpay_data_list['razorpay_key_id'] = $razorpayObj->razorpay_key_id;
			$razorpay_data_list['razorpay_key_secret'] = $razorpayObj->razorpay_key_secret;
			$razorpay_data_list['razorpay_currency'] = $razorpayObj->razorpay_currency;
			$razorpay_data_list['ismode_razorpay'] = $razorpayObj->ismode_razorpay;
			$razorpay_data_list['isenable_razorpay'] = $razorpayObj->isenable_razorpay;
		}else{
			$razorpay_data_list['razorpay_key_id'] = '';
			$razorpay_data_list['razorpay_key_secret'] = '';
			$razorpay_data_list['razorpay_currency'] = '';
			$razorpay_data_list['ismode_razorpay'] = '';
			$razorpay_data_list['isenable_razorpay'] = '';
		}

		//Mollie
		$mollie_data = Tp_option::where('option_name', 'mollie')->get();

		$mollie_id = '';
		foreach ($mollie_data as $row){
			$mollie_id = $row->id;
		}

		$mollie_data_list = array();
		if($mollie_id != ''){
			$mollieData = json_decode($mollie_data);
			$mollieObj = json_decode($mollieData[0]->option_value);
			$mollie_data_list['mollie_api_key'] = $mollieObj->mollie_api_key;
			$mollie_data_list['mollie_currency'] = $mollieObj->mollie_currency;
			$mollie_data_list['ismode_mollie'] = $mollieObj->ismode_mollie;
			$mollie_data_list['isenable_mollie'] = $mollieObj->isenable_mollie;
		}else{
			$mollie_data_list['mollie_api_key'] = '';
			$mollie_data_list['mollie_currency'] = '';
			$mollie_data_list['ismode_mollie'] = '';
			$mollie_data_list['isenable_mollie'] = '';
		}

		//Cash on Delivery (COD)
		$cod_data = Tp_option::where('option_name', 'cash_on_delivery')->get();

		$cod_id = '';
		foreach ($cod_data as $row){
			$cod_id = $row->id;
		}

		$cod_data_list = array();
		if($cod_id != ''){
			$codData = json_decode($cod_data);
			$codObj = json_decode($codData[0]->option_value);
			$cod_data_list['description'] = $codObj->description;
			$cod_data_list['isenable'] = $codObj->isenable;
		}else{
			$cod_data_list['description'] = '';
			$cod_data_list['isenable'] = '';
		}

		//Bank Transfer
		$bank_data = Tp_option::where('option_name', 'bank_transfer')->get();

		$bank_id = '';
		foreach ($bank_data as $row){
			$bank_id = $row->id;
		}

		$bank_data_list = array();
		if($bank_id != ''){
			$btData = json_decode($bank_data);
			$btObj = json_decode($btData[0]->option_value);
			$bank_data_list['description'] = $btObj->description;
			$bank_data_list['isenable'] = $btObj->isenable;
		}else{
			$bank_data_list['description'] = '';
			$bank_data_list['isenable'] = '';
		}

        return view('backend.payment-methods', compact('stripe_data_list', 'paypal_data_list', 'razorpay_data_list', 'mollie_data_list', 'cod_data_list', 'bank_data_list'));
    }

	//Save data for Stripe
    public function StripeSettingsUpdate(Request $request){
		$res = array();

		$stripe_key = $request->input('stripe_key');
		$stripe_secret = $request->input('stripe_secret');
		$currency = $request->input('currency');
		$is_enable = $request->input('isenable');

		if ($is_enable == 'true' || $is_enable == 'on') {
			$isenable = 1;
		}else {
			$isenable = 0;
		}

		$validator_array = array(
			'stripe_key' => $request->input('stripe_key'),
			'stripe_secret' => $request->input('stripe_secret'),
			'currency' => $request->input('currency')
		);

		$validator = Validator::make($validator_array, [
			'stripe_key' => 'required',
			'stripe_secret' => 'required',
			'currency' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('stripe_key')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('stripe_key');
			return response()->json($res);
		}

		if($errors->has('stripe_secret')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('stripe_secret');
			return response()->json($res);
		}
		if($errors->has('currency')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('currency');
			return response()->json($res);
		}

		$option_value = array(
			'stripe_key' => $stripe_key,
			'stripe_secret' => $stripe_secret,
			'currency' => $currency,
			'isenable' => $isenable
		);

		$data = array(
			'option_name' => 'stripe',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'stripe')->get();
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

	//Save data for Paypal
    public function PaypalSettingsUpdate(Request $request){
		$res = array();

		$paypal_client_id = $request->input('paypal_client_id');
		$paypal_secret = $request->input('paypal_secret');
		$paypal_currency = $request->input('paypal_currency');
		$is_mode_paypal = $request->input('ismode_paypal');
		$is_enable_paypal = $request->input('isenable_paypal');

		if ($is_enable_paypal == 'true' || $is_enable_paypal == 'on') {
			$isenable_paypal = 1;
		}else {
			$isenable_paypal = 0;
		}

		if ($is_mode_paypal == 'true' || $is_mode_paypal == 'on') {
			$ismode_paypal = 1; //sandbox
		}else {
			$ismode_paypal = 0; //live
		}

		$validator_array = array(
			'paypal_client_id' => $request->input('paypal_client_id'),
			'paypal_secret' => $request->input('paypal_secret'),
			'paypal_currency' => $request->input('paypal_currency')
		);

		$validator = Validator::make($validator_array, [
			'paypal_client_id' => 'required',
			'paypal_secret' => 'required',
			'paypal_currency' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('paypal_client_id')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('paypal_client_id');
			return response()->json($res);
		}

		if($errors->has('paypal_secret')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('paypal_secret');
			return response()->json($res);
		}
		if($errors->has('paypal_currency')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('paypal_currency');
			return response()->json($res);
		}

		$option_value = array(
			'paypal_client_id' => $paypal_client_id,
			'paypal_secret' => $paypal_secret,
			'paypal_currency' => $paypal_currency,
			'ismode_paypal' => $ismode_paypal,
			'isenable_paypal' => $isenable_paypal
		);

		$data = array(
			'option_name' => 'paypal',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'paypal')->get();
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

	//Save data for Razorpay
    public function RazorpaySettingsUpdate(Request $request){
		$res = array();

		$razorpay_key_id = $request->input('razorpay_key_id');
		$razorpay_key_secret = $request->input('razorpay_key_secret');
		$razorpay_currency = $request->input('razorpay_currency');
		$is_mode_razorpay = $request->input('ismode_razorpay');
		$is_enable_razorpay = $request->input('isenable_razorpay');

		if ($is_enable_razorpay == 'true' || $is_enable_razorpay == 'on') {
			$isenable_razorpay = 1;
		}else {
			$isenable_razorpay = 0;
		}

		if ($is_mode_razorpay == 'true' || $is_mode_razorpay == 'on') {
			$ismode_razorpay = 1; //sandbox
		}else {
			$ismode_razorpay = 0; //live
		}

		$validator_array = array(
			'razorpay_key_id' => $request->input('razorpay_key_id'),
			'razorpay_key_secret' => $request->input('razorpay_key_secret'),
			'razorpay_currency' => $request->input('razorpay_currency')
		);

		$validator = Validator::make($validator_array, [
			'razorpay_key_id' => 'required',
			'razorpay_key_secret' => 'required',
			'razorpay_currency' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('razorpay_key_id')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('razorpay_key_id');
			return response()->json($res);
		}

		if($errors->has('razorpay_key_secret')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('razorpay_key_secret');
			return response()->json($res);
		}

		if($errors->has('razorpay_currency')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('razorpay_currency');
			return response()->json($res);
		}

		$option_value = array(
			'razorpay_key_id' => $razorpay_key_id,
			'razorpay_key_secret' => $razorpay_key_secret,
			'razorpay_currency' => $razorpay_currency,
			'ismode_razorpay' => $ismode_razorpay,
			'isenable_razorpay' => $isenable_razorpay
		);

		$data = array(
			'option_name' => 'razorpay',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'razorpay')->get();
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

	//Save data for Mollie
    public function MollieSettingsUpdate(Request $request){
		$res = array();

		$mollie_api_key = $request->input('mollie_api_key');
		$mollie_currency = $request->input('mollie_currency');
		$is_mode_mollie = $request->input('ismode_mollie');
		$is_enable_mollie = $request->input('isenable_mollie');

		if ($is_enable_mollie == 'true' || $is_enable_mollie == 'on') {
			$isenable_mollie = 1;
		}else {
			$isenable_mollie = 0;
		}

		if ($is_mode_mollie == 'true' || $is_mode_mollie == 'on') {
			$ismode_mollie = 1; //sandbox
		}else {
			$ismode_mollie = 0; //live
		}

		$validator_array = array(
			'mollie_api_key' => $request->input('mollie_api_key'),
			'mollie_currency' => $request->input('mollie_currency')
		);

		$validator = Validator::make($validator_array, [
			'mollie_api_key' => 'required',
			'mollie_currency' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('mollie_api_key')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('mollie_api_key');
			return response()->json($res);
		}

		if($errors->has('mollie_currency')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('mollie_currency');
			return response()->json($res);
		}

		$option_value = array(
			'mollie_api_key' => $mollie_api_key,
			'mollie_currency' => $mollie_currency,
			'ismode_mollie' => $ismode_mollie,
			'isenable_mollie' => $isenable_mollie
		);

		$data = array(
			'option_name' => 'mollie',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'mollie')->get();
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

	//Save data for COD
    public function CODSettingsUpdate(Request $request){
		$res = array();

		$description = $request->input('description');
		$is_enable = $request->input('isenable_cod');

		if ($is_enable == 'true' || $is_enable == 'on') {
			$isenable = 1;
		}else {
			$isenable = 0;
		}

		$option_value = array(
			'description' => $description,
			'isenable' => $isenable
		);

		$data = array(
			'option_name' => 'cash_on_delivery',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'cash_on_delivery')->get();
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

	//Save data for Bank Transfer
    public function BankSettingsUpdate(Request $request){
		$res = array();

		$description = $request->input('description');
		$is_enable = $request->input('isenable_bank');

		if ($is_enable == 'true' || $is_enable == 'on') {
			$isenable = 1;
		}else {
			$isenable = 0;
		}

		$option_value = array(
			'description' => $description,
			'isenable' => $isenable
		);

		$data = array(
			'option_name' => 'bank_transfer',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'bank_transfer')->get();
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

    //load Media Settings page
    public function loadMediaSettingsPage(){

		$datalist = Media_setting::paginate(10);

        return view('backend.media-settings', compact('datalist'));
    }

	//Get data for Media Settings Pagination
	public function getMediaSettingsTableData(Request $request){

		$search = $request->search;

		if($request->ajax()){

			if($search != ''){

				$datalist = Media_setting::where(function ($query) use ($search){
					$query->where('media_type', 'like', '%'.$search.'%')
						->orWhere('media_width', 'like', '%'.$search.'%')
						->orWhere('media_height', 'like', '%'.$search.'%')
						->orWhere('media_desc', 'like', '%'.$search.'%');
					})->paginate(10);
			}else{
				$datalist = Media_setting::paginate(10);
			}

			return view('backend.partials.media_settings_table', compact('datalist'))->render();
		}
	}

	//Get data for Media Settings by id
    public function getMediaSettingsById(Request $request){

		$id = $request->id;

		$data = Media_setting::where('id', $id)->first();

		return response()->json($data);
	}

	//Save data for Media Settings
    public function MediaSettingsUpdate(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$media_width = $request->input('media_width');
		$media_height = $request->input('media_height');

		$validator_array = array(
			'width' => $request->input('media_width'),
			'height' => $request->input('media_height')
		);

		$validator = Validator::make($validator_array, [
			'width' => 'required',
			'height' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('width')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('width');
			return response()->json($res);
		}

		if($errors->has('height')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('height');
			return response()->json($res);
		}

		$data = array(
			'media_width' => $media_width,
			'media_height' => $media_height
		);

		$response = Media_setting::where('id', $id)->update($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('Updated Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data update failed');
		}

		return response()->json($res);
    }

    //load Mail Settings page
    public function loadMailSettingsPage(){

		$datalist = Tp_option::where('option_name', 'mail_settings')->get();
		$id = '';
		$option_value = '';
		foreach ($datalist as $row){
			$id = $row->id;
			$option_value = json_decode($row->option_value);
		}

		$data = array();
		if($id != ''){
			$data['ismail'] = $option_value->ismail;
			$data['from_name'] = $option_value->from_name;
			$data['from_mail'] = $option_value->from_mail;
			$data['to_name'] = $option_value->to_name;
			$data['to_mail'] = $option_value->to_mail;
			$data['mailer'] = $option_value->mailer;
			$data['smtp_host'] = $option_value->smtp_host;
			$data['smtp_port'] = $option_value->smtp_port;
			$data['smtp_security'] = $option_value->smtp_security;
			$data['smtp_username'] = $option_value->smtp_username;
			$data['smtp_password'] = $option_value->smtp_password;
		}else{
			$data['ismail'] = '';
			$data['from_name'] = '';
			$data['from_mail'] = '';
			$data['to_name'] = '';
			$data['to_mail'] = '';
			$data['mailer'] = '';
			$data['smtp_host'] = '';
			$data['smtp_port'] = '';
			$data['smtp_security'] = '';
			$data['smtp_username'] = '';
			$data['smtp_password'] = '';
		}

		$datalist = $data;

        return view('backend.mail-settings', compact('datalist'));
    }

	//Save data for Mail Settings
    public function saveMailSettings(Request $request){
		$res = array();

		$from_name = $request->input('from_name');
		$from_mail = $request->input('from_mail');
		$to_name = $request->input('to_name');
		$to_mail = $request->input('to_mail');
		$mailer = $request->input('mailer');

		$smtp_host = $request->input('smtp_host');
		$smtp_port = $request->input('smtp_port');
		$smtp_security = $request->input('smtp_security');
		$smtp_username = $request->input('smtp_username');
		$smtp_password = $request->input('smtp_password');

		$is_mail = $request->input('ismail');
		if ($is_mail == 'true' || $is_mail == 'on') {
			$ismail = 1;
		}else {
			$ismail = 0;
		}

		//Is SMTP
		if($mailer == 'smtp'){
			$validator_array = array(
				'from_name' => $request->input('from_name'),
				'from_mail' => $request->input('from_mail'),
				'to_name' => $request->input('to_name'),
				'to_mail' => $request->input('to_mail'),
				'mailer' => $request->input('mailer'),
				'smtp_host' => $request->input('smtp_host'),
				'smtp_port' => $request->input('smtp_port'),
				'smtp_security' => $request->input('smtp_security'),
				'smtp_username' => $request->input('smtp_username'),
				'smtp_password' => $request->input('smtp_password')
			);

			$validator = Validator::make($validator_array, [
				'from_name' => 'required',
				'from_mail' => 'required',
				'to_name' => 'required',
				'to_mail' => 'required',
				'mailer' => 'required',
				'smtp_host' => 'required',
				'smtp_port' => 'required',
				'smtp_security' => 'required',
				'smtp_username' => 'required',
				'smtp_password' => 'required'
			]);
		}else{
			$validator_array = array(
				'from_name' => $request->input('from_name'),
				'from_mail' => $request->input('from_mail'),
				'to_name' => $request->input('to_name'),
				'to_mail' => $request->input('to_mail'),
				'mailer' => $request->input('mailer')
			);

			$validator = Validator::make($validator_array, [
				'from_name' => 'required',
				'from_mail' => 'required',
				'to_name' => 'required',
				'to_mail' => 'required',
				'mailer' => 'required'
			]);
		}

		$errors = $validator->errors();

		if($errors->has('from_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('from_name');
			return response()->json($res);
		}
		if($errors->has('from_mail')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('from_mail');
			return response()->json($res);
		}
		if($errors->has('to_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('to_name');
			return response()->json($res);
		}
		if($errors->has('to_mail')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('to_mail');
			return response()->json($res);
		}
		if($errors->has('mailer')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('mailer');
			return response()->json($res);
		}

		//IS SMTP
		if($mailer == 'smtp'){

			if($errors->has('smtp_host')){
				$res['msgType'] = 'error';
				$res['msg'] = $errors->first('smtp_host');
				return response()->json($res);
			}
			if($errors->has('smtp_port')){
				$res['msgType'] = 'error';
				$res['msg'] = $errors->first('smtp_port');
				return response()->json($res);
			}
			if($errors->has('smtp_security')){
				$res['msgType'] = 'error';
				$res['msg'] = $errors->first('smtp_security');
				return response()->json($res);
			}
			if($errors->has('smtp_username')){
				$res['msgType'] = 'error';
				$res['msg'] = $errors->first('smtp_username');
				return response()->json($res);
			}
			if($errors->has('smtp_password')){
				$res['msgType'] = 'error';
				$res['msg'] = $errors->first('smtp_password');
				return response()->json($res);
			}
		}

		$option_value = array(
			'ismail' => $ismail,
			'from_name' => $from_name,
			'from_mail' => $from_mail,
			'to_name' => $to_name,
			'to_mail' => $to_mail,
			'mailer' => $mailer,
			'smtp_host' => $smtp_host,
			'smtp_port' => $smtp_port,
			'smtp_security' => $smtp_security,
			'smtp_username' => $smtp_username,
			'smtp_password' => $smtp_password
		);

		$data = array(
			'option_name' => 'mail_settings',
			'option_value' => json_encode($option_value)
		);

		$gData = Tp_option::where('option_name', 'mail_settings')->get();
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
