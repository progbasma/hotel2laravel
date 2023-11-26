<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog_category;
use App\Models\Blog;

class BlogController extends Controller
{
    //get Blog Page
    public function getBlogPage(){
		
		$datalist = DB::table('blogs')
			->join('users', 'blogs.user_id', '=', 'users.id')
			->select('blogs.*', 'users.name')
			->where('blogs.is_publish', '=', 1)
			->orderBy('id','desc')
			->paginate(9);
			
        return view('frontend.blog', compact('datalist'));
    }
	
    //get Article Page
    public function getArticlePage($id, $title){
		$lan = glan();
		
		$data = DB::table('blogs')
			->join('users', 'blogs.user_id', '=', 'users.id')
			->select('blogs.*', 'users.name')
			->where('blogs.id', '=', $id)
			->where('blogs.is_publish', '=', 1)
			->first();

		$sql = "SELECT b.id, b.slug, b.name, COUNT(a.id) TotalProduct
		FROM blogs a
		RIGHT JOIN blog_categories b ON a.category_id = b.id
		WHERE b.is_publish = 1 AND b.lan = '".$lan."'
		GROUP BY b.id, b.slug, b.name
		ORDER BY b.name;";
		$blog_categories_list = DB::select(DB::raw($sql));
		
		$datalist = Blog::where('is_publish', '=', 1)->whereNotIn('id', [$id])->orderBy('id','desc')->limit(8)->get();
		
        return view('frontend.article', compact('data', 'blog_categories_list', 'datalist'));
    }
	
    //get Blog Category Page
    public function getBlogCategoryPage($id, $title){
		
		$params = array('category_id' => $id);

		$mdata = Blog_category::where('id', '=', $id)->where('is_publish', '=', 1)->first();
		if($mdata !=''){
			$metadata = $mdata;
		}else{
			$metadata = array(
				'id' => '',
				'name' => '',
				'slug' => '',
				'thumbnail' => '',
				'description' => '',
				'lan' => '',
				'parent_id' => '',
				'is_publish' => '',
				'og_title' => '',
				'og_image' => '',
				'og_description' => '',
				'og_keywords' => ''
			);
		}
		
		$datalist = DB::table('blogs')
			->join('users', 'blogs.user_id', '=', 'users.id')
			->select('blogs.*', 'users.name')
			->where('blogs.category_id', '=', $id)
			->where('blogs.is_publish', '=', 1)
			->orderBy('id','desc')
			->paginate(9);
			
        return view('frontend.blog-category', compact('params', 'metadata', 'datalist'));
    }
}
