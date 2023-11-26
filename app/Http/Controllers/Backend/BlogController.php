<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Media_option;
use App\Models\Blog;
use App\Models\Blog_category;

class BlogController extends Controller
{
	//Blog page load
    public function getBlogPageLoad() {
		$media_datalist = Media_option::orderBy('id','desc')->paginate(28);
		
		$blog_category = Blog_category::where('is_publish', 1)->orderBy('name', 'asc')->get();
		$statuslist = DB::table('tp_status')->orderBy('id', 'asc')->get();
		$languageslist = DB::table('languages')->where('status', 1)->orderBy('language_name', 'asc')->get();
		
		$datalist = DB::table('blogs')
			->join('tp_status', 'blogs.is_publish', '=', 'tp_status.id')
			->join('languages', 'blogs.lan', '=', 'languages.language_code')
			->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')
			->select('blogs.*', 'tp_status.status', 'languages.language_name', 'blog_categories.name')
			->orderBy('blogs.id','desc')
			->paginate(20);

        return view('backend.blog', compact('media_datalist', 'blog_category', 'statuslist', 'languageslist', 'datalist'));
    }
	
	//Get data for Blog Pagination
	public function getBlogTableData(Request $request){

		$search = $request->search;
		$language_code = $request->language_code;

		if($request->ajax()){

			if($search != ''){
				$datalist = DB::table('blogs')
					->join('tp_status', 'blogs.is_publish', '=', 'tp_status.id')
					->join('languages', 'blogs.lan', '=', 'languages.language_code')
					->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')
					->select('blogs.*', 'tp_status.status', 'languages.language_name', 'blog_categories.name')
					->where(function ($query) use ($search){
						$query->where('blog_categories.name', 'like', '%'.$search.'%')
							->orWhere('blogs.title', 'like', '%'.$search.'%');
					})
					->where(function ($query) use ($language_code){
						$query->whereRaw("blogs.lan = '".$language_code."' OR '".$language_code."' = '0'");
					})
					->orderBy('blogs.id','desc')
					->paginate(20);
				
			}else{
				$datalist = DB::table('blogs')
					->join('tp_status', 'blogs.is_publish', '=', 'tp_status.id')
					->join('languages', 'blogs.lan', '=', 'languages.language_code')
					->join('blog_categories', 'blogs.category_id', '=', 'blog_categories.id')
					->select('blogs.*', 'tp_status.status', 'languages.language_name', 'blog_categories.name')
					->whereRaw("blogs.lan = '".$language_code."' OR '".$language_code."' = '0'")
					->orderBy('blogs.id','desc')
					->paginate(20);
			}

			return view('backend.partials.blog_table', compact('datalist'))->render();
		}
	}
	
	//Save data for Blog
    public function saveBlogData(Request $request){
		$res = array();

		$id = $request->input('RecordId');
		$blog_title = esc($request->input('blog_title'));
		$slug = esc(str_slug($request->input('slug')));
		$category_id = $request->input('category_id');
		$thumbnail = $request->input('thumbnail');
		$description = $request->input('description');
		$lan = $request->input('lan');
		$is_publish = $request->input('is_publish');
		$og_title = $request->input('og_title');
		$og_image = $request->input('og_image');
		$og_description = $request->input('og_description');
		$og_keywords = $request->input('og_keywords');
		$user_id = $request->input('user_id');
		
		$validator_array = array(
			'title' => $request->input('blog_title'),
			'slug' => $slug,
			'category' => $request->input('category_id'),
			'language' => $request->input('lan'),
			'is_publish' => $request->input('is_publish')
		);
		
		$rId = $id == '' ? '' : ','.$id;
		$validator = Validator::make($validator_array, [
			'title' => 'required|max:191',
			'slug' => 'required|max:191|unique:blogs,slug' . $rId,
			'category' => 'required',
			'language' => 'required',
			'is_publish' => 'required'
		]);

		$errors = $validator->errors();

		if($errors->has('title')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('title');
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
		
		if($errors->has('is_publish')){
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('is_publish');
			return response()->json($res);
		}

		$data = array(
			'title' => $blog_title,
			'slug' => $slug,
			'thumbnail' => $thumbnail,
			'description' => $description,
			'lan' => $lan,
			'category_id' => $category_id,
			'is_publish' => $is_publish,
			'og_title' => $og_title,
			'og_image' => $og_image,
			'og_description' => $og_description,
			'og_keywords' => $og_keywords,
			'user_id' => $user_id
		);

		if($id ==''){
			$response = Blog::create($data);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Saved Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		}else{
			$response = Blog::where('id', $id)->update($data);
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
	
	//Get data for by id
    public function getBlogById(Request $request){

		$id = $request->id;
		
		$data = Blog::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Blog
	public function deleteBlog(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Blog::where('id', $id)->delete();
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
	
	//Bulk Action for Blog
	public function bulkActionBlog(Request $request){
		
		$res = array();

		$idsStr = $request->ids;
		$idsArray = explode(',', $idsStr);
		
		$BulkAction = $request->BulkAction;

		if($BulkAction == 'publish'){
			$response = Blog::whereIn('id', $idsArray)->update(['is_publish' => 1]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'draft'){
			
			$response = Blog::whereIn('id', $idsArray)->update(['is_publish' => 2]);
			if($response){
				$res['msgType'] = 'success';
				$res['msg'] = __('Updated Successfully');
			}else{
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
			
		}elseif($BulkAction == 'delete'){
			$response = Blog::whereIn('id', $idsArray)->delete();
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

	//has Blog Slug
    public function hasBlogSlug(Request $request){
		$res = array();
		
		$slug = str_slug($request->slug);
        $count = Blog::where('slug', 'like', '%'.$slug.'%') ->count();
		if($count == 0){
			$res['slug'] = $slug;
		}else{
			$incr = $count+1;
			$res['slug'] = $slug.'-'.$incr;
		}
		
		return response()->json($res);
	}
}
