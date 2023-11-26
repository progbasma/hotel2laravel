<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Media_option;
use App\Models\Blog_category;

class Blog_categoriesController extends Controller
{
    //Blog Categories page load
    public function getBlogCategoriesPageLoad() {
		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);
		
		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		$languageslist = DB::table('languages')->where('status', 1)->orderBy('language_name', 'asc')->get();
		
		$datalist = DB::table('blog_categories')
			->join('tp_status', 'blog_categories.is_publish', '=', 'tp_status.id')
			->join('languages', 'blog_categories.lan', '=', 'languages.language_code')
			->select('blog_categories.*', 'tp_status.status', 'languages.language_name')
			->orderBy('blog_categories.id','desc')
			->paginate(10);

        return view('backend.blog-categories', compact('media_datalist', 'statuslist', 'languageslist', 'datalist'));
    }
	
	//Get data for Blog Categories Pagination
	public function getBlogCategoriesTableData(Request $request){

		$search = $request->search;
		$language_code = $request->language_code;

		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('blog_categories')
					->join('tp_status', 'blog_categories.is_publish', '=', 'tp_status.id')
					->join('languages', 'blog_categories.lan', '=', 'languages.language_code')
					->select('blog_categories.*', 'tp_status.status', 'languages.language_name')
					->where(function ($query) use ($search){
						$query->where('name', 'like', '%'.$search.'%')
							->orWhere('thumbnail', 'like', '%'.$search.'%');
					})
					->where(function ($query) use ($language_code){
						$query->whereRaw("blog_categories.lan = '".$language_code."' OR '".$language_code."' = '0'");
					})
					->orderBy('blog_categories.id','desc')
					->paginate(10);
				
			}else{
				$datalist = DB::table('blog_categories')
					->join('tp_status', 'blog_categories.is_publish', '=', 'tp_status.id')
					->join('languages', 'blog_categories.lan', '=', 'languages.language_code')
					->select('blog_categories.*', 'tp_status.status', 'languages.language_name')
					->whereRaw("blog_categories.lan = '".$language_code."' OR '".$language_code."' = '0'")
					->orderBy('blog_categories.id','desc')
					->paginate(10);
			}

			return view('backend.partials.blog_categories_table', compact('datalist'))->render();
		}
	}
	
	//Save data for Categories
    public function saveBlogCategoriesData(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$name = esc($request->input('name'));
		$slug = esc(str_slug($request->input('slug')));
		$thumbnail = $request->input('thumbnail');
		$description = esc($request->input('description'));
		$lan = $request->input('lan');
		$is_publish = $request->input('is_publish');
		$og_title = esc($request->input('og_title'));
		$og_image = $request->input('og_image');
		$og_description = esc($request->input('og_description'));
		$og_keywords = esc($request->input('og_keywords'));
		
		$validator_array = array(
			'name' => $request->input('name'),
			'slug' => $slug,
			'language' => $request->input('lan'),
			'is_publish' => $request->input('is_publish')
		);
		
		$rId = $id == '' ? '' : ','.$id;
		$validator = Validator::make($validator_array, [
			'name' => 'required|max:191',
			'slug' => 'required|max:191|unique:blog_categories,slug' . $rId,
			'language' => 'required',
			'is_publish' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('name')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('name');
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
		
		if($errors->has('is_publish')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('is_publish');
			return response()->json($res);
		}

		$data = array(
			'name' => $name,
			'slug' => $slug,
			'thumbnail' => $thumbnail,
			'description' => $description,
			'lan' => $lan,
			'is_publish' => $is_publish,
			'og_title' => $og_title,
			'og_image' => $og_image,
			'og_description' => $og_description,
			'og_keywords' => $og_keywords
		);

		if($id ==''){
			$response = Blog_category::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Blog_category::where('id', $id)->update($data);
			if($response){
				
				//Update Parent and Child Menu
				gMenuUpdate($id, 'blog', $name, $slug);
				
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}
		
		return response()->json($res);
    }
	
	//Get data for Categories by id
    public function getBlogCategoriesById(Request $request){

		$id = $request->id;
		
		$data = Blog_category::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Blog Categories
	public function deleteBlogCategories(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Blog_category::where('id', $id)->delete();
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
	
	//Bulk Action for Blog Categories
	public function bulkActionBlogCategories(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Blog_category::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Blog_category::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Blog_category::whereIn('id', $idsArray)->delete();
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

	//has Blog Category Slug
    public function hasBlogCategorySlug(Request $request){
		$res = array();
		
		$slug = str_slug($request->slug);
        $count = Blog_category::where('slug', 'like', '%'.$slug.'%') ->count();
		if($count == 0){
			$res['slug'] = $slug;
		}else{
			$incr = $count+1;
			$res['slug'] = $slug.'-'.$incr;
		}
		
		return response()->json($res);
	}
}
