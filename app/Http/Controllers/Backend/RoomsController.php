<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Room;
use App\Models\Category;
use App\Models\Tax;
use App\Models\Media_option;
use App\Models\Amenity;
use App\Models\Complement;
use App\Models\Bedtype;
use App\Models\Room_image;
use App\Models\Room_manage;

class RoomsController extends Controller
{
    //Room Type page load
    public function getRoomTypePageLoad() {

		$languageslist = DB::table('languages')->where('status', 1)->orderBy('language_name', 'asc')->get();
		$categorylist = Category::where('is_publish', 1)->orderBy('name','asc')->get();

		$datalist = DB::table('rooms')
			->join('tp_status', 'rooms.is_publish', '=', 'tp_status.id')
			->join('languages', 'rooms.lan', '=', 'languages.language_code')
			->join('categories', 'rooms.cat_id', '=', 'categories.id')
			->select('rooms.*', 'categories.name as category_name', 'tp_status.status', 'languages.language_name')
			->orderBy('rooms.id','desc')
			->paginate(20);

		return view('backend.room-type', compact('languageslist', 'categorylist', 'datalist'));		
	}
	
	//Get data for Room Type Pagination
	public function getRoomTypeTableData(Request $request){

		$search = $request->search;
		$language_code = $request->language_code;
		$category_id = $request->category_id;

		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('rooms')
					->join('tp_status', 'rooms.is_publish', '=', 'tp_status.id')
					->join('languages', 'rooms.lan', '=', 'languages.language_code')
					->join('categories', 'rooms.cat_id', '=', 'categories.id')
					->select('rooms.*', 'categories.name as category_name', 'tp_status.status', 'languages.language_name')
					->where(function ($query) use ($search){
						$query->where('rooms.title', 'like', '%'.$search.'%')
							->orWhere('categories.name', 'like', '%'.$search.'%')
							->orWhere('languages.language_name', 'like', '%'.$search.'%');
					})

					->where(function ($query) use ($language_code){
						$query->whereRaw("rooms.lan = '".$language_code."' OR '".$language_code."' = '0'");
					})
					->where(function ($query) use ($category_id){
						$query->whereRaw("rooms.cat_id = '".$category_id."' OR '".$category_id."' = '0'");
					})
					->orderBy('rooms.id','desc')
					->paginate(20);
			}else{

				$datalist = DB::table('rooms')
					->join('tp_status', 'rooms.is_publish', '=', 'tp_status.id')
					->join('languages', 'rooms.lan', '=', 'languages.language_code')
					->join('categories', 'rooms.cat_id', '=', 'categories.id')
					->select('rooms.*', 'categories.name as category_name', 'tp_status.status', 'languages.language_name')

					->where(function ($query) use ($language_code){
						$query->whereRaw("rooms.lan = '".$language_code."' OR '".$language_code."' = '0'");
					})
					->where(function ($query) use ($category_id){
						$query->whereRaw("rooms.cat_id = '".$category_id."' OR '".$category_id."' = '0'");
					})
					
					->orderBy('rooms.id','desc')
					->paginate(20);
			}

			return view('backend.partials.room_type_table', compact('datalist'))->render();
		}
	}

	//Save data for Room Type
    public function saveRoomTypeData(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$title = esc($request->input('title'));
		$slug = esc(str_slug($request->input('slug')));
		$lan = $request->input('lan');
		$cat_id = $request->input('categoryid');
		
		$validator_array = array(
			'room_name' => $request->input('title'),
			'slug' => $slug,
			'language' => $request->input('lan'),
			'category' => $request->input('categoryid')
		);
		
		$rId = $id == '' ? '' : ','.$id;
		$validator = Validator::make($validator_array, [
			'room_name' => 'required',
			'slug' => 'required|max:191|unique:rooms,slug' . $rId,
			'language' => 'required',
			'category' => 'required'
		]);

		$errors = $validator->errors();
		
		if($errors->has('room_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('room_name');
			return response()->json($res);
		}
		
		if($errors->has('slug')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('slug');
			return response()->json($res);
		}

		if($errors->has('language')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('language');
			return response()->json($res);
		}
		
		if($errors->has('category')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('category');
			return response()->json($res);
		}

		$data = array(
			'title' => $title,
			'slug' => $slug,
			'cat_id' => $cat_id,
			'lan' => $lan,
			'is_publish' => 2
		);

		if($id ==''){
			$response = Room::create($data)->id;
			if($response){
				$res['id'] = $response;
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['id'] = '';
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Room::where('id', $id)->update($data);
			if($response){

				$res['id'] = $id;
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['id'] = '';
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}
		
		return response()->json($res);
    }
	
	//Delete data for Room Type
	public function deleteRoomType(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			
			Room_manage::where('roomtype_id', $id)->delete();
			Room_image::where('room_id', $id)->delete();
			
			$response = Room::where('id', $id)->delete();
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
	
	//Bulk Action for Room Type
	public function bulkActionRoomType(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Room::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Room::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			
			Room_manage::whereIn('roomtype_id', $idsArray)->delete();
			Room_image::whereIn('room_id', $idsArray)->delete();
			
			$response = Room::whereIn('id', $idsArray)->delete();
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
	
	//has Room Slug
    public function hasRoomSlug(Request $request){
		$res = array();
		
		$slug = str_slug($request->slug);
        $count = Room::where('slug', $slug) ->count();
		if($count == 0){
			$res['slug'] = $slug;
		}else{
			$incr = $count+1;
			$res['slug'] = $slug.'-'.$incr;
		}
		
		return response()->json($res);
	}
	
    //get Rooms
    public function getRoomPageData($id){
		
		$datalist = Room::where('id', $id)->first();
		
		$lan = $datalist->lan;
		
		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		$languageslist = DB::table('languages')->where('status', 1)->orderBy('id', 'asc')->get();
		$categorylist = category::where('lan', '=', $lan)->where('is_publish', '=', 1)->orderBy('name','asc')->get();
		
		$taxlist = Tax::orderBy('title','asc')->get();
		$amenity_list = Amenity::orderBy('name','asc')->get();
		$complement_list = Complement::orderBy('name','asc')->get();
		$bedtype_list = Bedtype::orderBy('name','asc')->get();
		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);

        return view('backend.room', compact('datalist', 'statuslist', 'languageslist', 'categorylist', 'taxlist', 'amenity_list', 'complement_list', 'bedtype_list', 'media_datalist'));
    }
	
	//Update data for Rooms
    public function updateRoomsData(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$title = esc($request->input('title'));
		$slug = esc(str_slug($request->input('slug')));
		$description = $request->input('description');
		$cat_id = $request->input('cat_id');
		$total_adult = $request->input('total_adult');
		$total_child = $request->input('total_child');
		$price = $request->input('price');
		$tax_id = $request->input('tax_id');
		$amenity_list = $request->input('amenities');
		$complement_list = $request->input('complements');
		$bed_list = $request->input('beds');
		$is_featured = $request->input('is_featured');
		$lan = $request->input('lan');
		$thumbnail = $request->input('f_thumbnail');
		$cover_img = $request->input('cover_img');
		$is_publish = $request->input('is_publish');
		
		$validator_array = array(
			'room_name' => $request->input('title'),
			'slug' => $slug,
			'category' => $request->input('cat_id'),
			'total_adult' => $request->input('total_adult'),
			'total_child' => $request->input('total_child'),
			'price' => $request->input('price'),
			'tax' => $request->input('tax_id'),
			'language' => $request->input('lan'),
			'featured_image' => $request->input('f_thumbnail'),
			'subheader_image' => $request->input('cover_img'),
			'status' => $request->input('is_publish')
		);
		
		$rId = $id == '' ? '' : ','.$id;
		$validator = Validator::make($validator_array, [
			'room_name' => 'required',
			'slug' => 'required|max:191|unique:rooms,slug' . $rId,
			'category' => 'required',
			'total_adult' => 'required',
			'total_child' => 'required',
			'price' => 'required',
			'tax' => 'required',
			'language' => 'required',
			'featured_image' => 'required',
			'subheader_image' => 'required',
			'status' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('room_name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('room_name');
			return response()->json($res);
		}
		
		if($errors->has('slug')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('slug');
			return response()->json($res);
		}
		
		if($errors->has('category')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('category');
			return response()->json($res);
		}
		
		if($errors->has('total_adult')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('total_adult');
			return response()->json($res);
		}
		
		if($errors->has('total_child')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('total_child');
			return response()->json($res);
		}
		
		if($errors->has('price')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('price');
			return response()->json($res);
		}
		
		if($errors->has('tax')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('tax');
			return response()->json($res);
		}

		if($errors->has('language')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('language');
			return response()->json($res);
		}
		
		if($errors->has('featured_image')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('featured_image');
			return response()->json($res);
		}
		
		if($errors->has('subheader_image')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('subheader_image');
			return response()->json($res);
		}
		
		if($errors->has('status')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('status');
			return response()->json($res);
		}
		
		$amenities = NULL;
		$i = 0;
		if($amenity_list !=''){
			foreach ($amenity_list as $key => $val) {
				if($i++){
					$amenities .= '|';
				}
				$amenities .= $val;
			}
		}
		
		$complements = NULL;
		$j = 0;
		if($complement_list !=''){
			foreach ($complement_list as $key => $val) {
				if($j++){
					$complements .= '|';
				}
				$complements .= $val;
			}
		}
		
		$beds = NULL;
		$k = 0;
		if($bed_list !=''){
			foreach ($bed_list as $key => $val) {
				if($k++){
					$beds .= '|';
				}
				$beds .= $val;
			}
		}

		$data = array(
			'title' => $title,
			'slug' => $slug,
			'thumbnail' => $thumbnail,
			'cover_img' => $cover_img,
			'description' => $description,
			'cat_id' => $cat_id,
			'total_adult' => $total_adult,
			'total_child' => $total_child,
			'price' => $price,
			'tax_id' => $tax_id,
			'amenities' => $amenities,
			'complements' => $complements,
			'beds' => $beds,
			'is_featured' => $is_featured,
			'is_publish' => $is_publish,
			'lan' => $lan
		);
		
		$response = Room::where('id', $id)->update($data);
		if($response){
			
			//Update Parent and Child Menu
			gMenuUpdate($id, 'product', $title, $slug);
			
			$res['msgType'] = 'success';
			$res['msg'] = __('Updated Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data update failed');
		}
		
		return response()->json($res);
    }
	
    //get Price
    public function getPricePageData($id){
		
		$datalist = Room::where('id', $id)->first();

        return view('backend.price', compact('datalist'));
    }
	
	//Save data for Price
    public function savePriceData(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$price = $request->input('price');
		$old_price = $request->input('old_price');
		$is_discount = $request->input('is_discount');

		$validator_array = array(
			'price' => $price
		);
		
		$validator = Validator::make($validator_array, [
			'price' => 'required'
		]);

		$errors = $validator->errors();
		
		if($errors->has('price')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('price');
			return response()->json($res);
		}
		
		$data = array(
			'price' => $price,
			'old_price' => $old_price,
			'is_discount' => $is_discount
		);
		
		$response = Room::where('id', $id)->update($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('Updated Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data update failed');
		}
		
		return response()->json($res);
    }

    //get Room Images
    public function getRoomImagesPageData($id){
		
		$datalist = Room::where('id', $id)->first();
		$imagelist = Room_image::where('room_id', $id)->orderBy('id','desc')->paginate(15);
		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);
		
        return view('backend.room-images', compact('datalist', 'imagelist', 'media_datalist'));
    }
	
	//Get data for Room Images Pagination
	public function getRoomImagesTableData(Request $request){

		$id = $request->id;
		
		if($request->ajax()){
			$imagelist = Room_image::where('room_id', $id)->orderBy('id','desc')->paginate(15);

			return view('backend.partials.room_images_list', compact('imagelist'))->render();
		}
	}
	
	//Save data for Room Images
    public function saveRoomImagesData(Request $request){
		$res = array();

		$room_id = $request->input('room_id');
		$thumbnail = $request->input('thumbnail');
		$large_image = $request->input('large_image');
		
		$validator_array = array(
			'image' => $request->input('thumbnail')
		);
		
		$validator = Validator::make($validator_array, [
			'image' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('image')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('image');
			return response()->json($res);
		}
		
		$data = array(
			'room_id' => $room_id,
			'thumbnail' => $thumbnail,
			'large_image' => $large_image
		);
		
		$response = Room_image::create($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('Saved Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data insert failed');
		}
		
		return response()->json($res);
    }

	//Delete data for Room Images
	public function deleteRoomImages(Request $request){
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Room_image::where('id', $id)->delete();
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
	
    //get Room SEO
    public function getRoomSEOPageData($id){
		
		$datalist = Room::where('id', $id)->first();
		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);
		
        return view('backend.room-seo', compact('datalist', 'media_datalist'));
	}
	
	//Save data for Room SEO
    public function saveRoomSEOData(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$og_title = $request->input('og_title');
		$og_image = $request->input('og_image');
		$og_description = $request->input('og_description');
		$og_keywords = $request->input('og_keywords');

		$data = array(
			'og_title' => $og_title,
			'og_image' => $og_image,
			'og_description' => $og_description,
			'og_keywords' => $og_keywords
		);
		
		$response = Room::where('id', $id)->update($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('Updated Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data update failed');
		}
		
		return response()->json($res);
    }
	
	//Room Manages page load
    public function getRoomsPageLoad($id){
		
		$datalist['id'] = $id;
		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();

		$RoomsDataList = DB::table('room_manages')
			->join('tp_status', 'room_manages.is_publish', '=', 'tp_status.id')
			->select('room_manages.*', 'tp_status.status')
			->where('room_manages.roomtype_id', $id)
			->orderBy('room_manages.id','asc')
			->paginate(20);

        return view('backend.rooms', compact('datalist', 'statuslist', 'RoomsDataList'));
    }

	//Get data for Rooms Pagination
	public function getRoomsTableData(Request $request){

		$search = $request->search;
		$id = $request->roomtype_id;
		
		if($request->ajax()){

			if($search != ''){
				$RoomsDataList = DB::table('room_manages')
					->join('tp_status', 'room_manages.is_publish', '=', 'tp_status.id')
					->select('room_manages.*', 'tp_status.status')
					->where(function ($query) use ($search){
						$query->where('room_no', 'like', '%'.$search.'%');
					})
					->where('room_manages.roomtype_id', $id)
					->orderBy('room_manages.id','asc')
					->paginate(20);
			}else{
				
				$RoomsDataList = DB::table('room_manages')
					->join('tp_status', 'room_manages.is_publish', '=', 'tp_status.id')
					->select('room_manages.*', 'tp_status.status')
					->where('room_manages.roomtype_id', $id)
					->orderBy('room_manages.id','asc')
					->paginate(20);
			}

			return view('backend.partials.rooms_table', compact('RoomsDataList'))->render();
		}
	}
	
	//Save data for rooms
    public function saveRoomsData(Request $request){
		$res = array();
		
		$id = $request->input('RecordId');
		$roomtype_id = $request->input('roomtype_id');
		$room_no = $request->input('room_no');
		$is_publish = $request->input('is_publish');
		
		$validator_array = array(
			'room_no' => $request->input('room_no')
		);
		
		$validator = Validator::make($validator_array, [
			'room_no' => 'required|max:191'
		]);

		$errors = $validator->errors();

		if($errors->has('room_no')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('room_no');
			return response()->json($res);
		}

		$data = array(
			'roomtype_id' => $roomtype_id,
			'room_no' => $room_no,
			'is_publish' => $is_publish,
			'book_status' => 2
		);

		if($id ==''){
			$response = Room_manage::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Room_manage::where('id', $id)->update($data);
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
	
	//Get data for Room by id
    public function getRoomById(Request $request){

		$id = $request->id;
		
		$data = Room_manage::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Room
	public function deleteRoom(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Room_manage::where('id', $id)->delete();
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
	
	//Bulk Action for Room
	public function bulkActionRoom(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Room_manage::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Room_manage::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Room_manage::whereIn('id', $idsArray)->delete();
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
