<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
	
    //Profile page load
    public function getProfilePageLoad(){
		
        return view('receptionist.profile');
    }
	
	//Save data for User Profile
    public function profileUpdate(Request $request){
		$res = array();
		
		$id = $request->input('RecordId');
		$name = $request->input('name');
		$email = $request->input('email');
		$password = $request->input('password');
		$phone = $request->input('phone');
		$address = $request->input('address');
		$photo = $request->input('photo');
		
		$validator_array = array(
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => $request->input('password')
		);
		
		$rId = $id == '' ? '' : ','.$id;
		$validator = Validator::make($validator_array, [
			'name' => 'required|max:191',
			'email' => 'required|max:191|unique:users,email' . $rId,
			'password' => 'required|max:191'
		]);

		$errors = $validator->errors();

		if($errors->has('name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('name');
			return response()->json($res);
		}
		
		if($errors->has('email')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('email');
			return response()->json($res);
		}
		
		if($errors->has('password')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('password');
			return response()->json($res);
		}

		$data = array(
			'name' => $name,
			'email' => $email,
			'password' => Hash::make($password),
			'phone' => $phone,
			'address' => $address,
			'photo' => $photo,
			'bactive' => base64_encode($password)
		);

		$response = User::where('id', $id)->update($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('Updated Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data update failed');
		}
		
		return response()->json($res);
    }
	
	//Get data for User by id
    public function getUserById(Request $request){

		$id = $request->id;
		
		$data = DB::table('users')->where('id', $id)->first();
					
		$data->bactive = base64_decode($data->bactive);

		return response()->json($data);
	}	
}
