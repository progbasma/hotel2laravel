<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
	//Get data for search
	public function getSearchData(Request $request){
		$lan = glan();
		$total_adult = $request->total_adult;
		$total_child = $request->total_child;
		
		$datalist = DB::table('rooms')
			->join('categories', 'rooms.cat_id', '=', 'categories.id')
			->select('rooms.*', 'categories.name as category_name', 'categories.slug as category_slug')
			->where('rooms.is_publish', '=', 1)
			->where('rooms.total_adult', '=', $total_adult)
			->where('rooms.total_child', '=', $total_child)
			->where('rooms.lan', '=', $lan)
			->orderBy('rooms.id','desc')
			->get();

		return view('frontend.search', compact('datalist'));
	}
}
