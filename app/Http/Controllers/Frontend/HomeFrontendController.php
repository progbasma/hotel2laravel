<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use App\Models\Section_content;
use App\Models\Section_manage;
use App\Models\Tp_option;
use App\Models\Offer_ad;

class HomeFrontendController extends Controller
{
	//Get Frontend Data
    public function homePageLoad(Request $request)
	{
		$lan = glan();

		$PageVariation = PageVariation();

		//Home Page 1
		if($PageVariation['home_variation'] == 'home_1'){

			//slider_hero Section
			$slider_hero_section = Section_manage::where('manage_type', '=', 'home_1')->where('section', '=', 'slider_hero')->where('is_publish', '=', 1)->first();
			if($slider_hero_section ==''){
				$slider_hero_array =  array();
				$slider_hero_array['image'] = '';
				$slider_hero_array['is_publish'] = 2;
				$slider_hero_section = json_decode(json_encode($slider_hero_array));
			}

			//About Us Section
			$about_us_section = Section_manage::where('lan',$lan)->where('manage_type', '=', 'home_1')->where('section', '=', 'about_us')->where('is_publish', '=', 1)->first();
			if($about_us_section ==''){
				$about_us_array =  array();
				$about_us_array['image'] = '';
				$about_us_array['is_publish'] = 2;
				$about_us_section = json_decode(json_encode($about_us_array));
			}

			//Offer & Ads Section
			$offer_ads_section = Section_manage::where('lan',$lan)->where('manage_type', '=', 'home_1')->where('section', '=', 'offer_ads')->where('is_publish', '=', 1)->first();
			if($offer_ads_section ==''){
				$offer_ads_array =  array();
				$offer_ads_array['image'] = '';
				$offer_ads_array['is_publish'] = 2;
				$offer_ads_section = json_decode(json_encode($offer_ads_array));
			}

			//Featured Rooms Section
			$featured_rooms_section = Section_manage::where('lan',$lan)->where('manage_type', '=', 'home_1')->where('section', '=', 'featured_rooms')->where('is_publish', '=', 1)->first();
			if($featured_rooms_section ==''){
				$featured_rooms_array =  array();
				$featured_rooms_array['image'] = '';
				$featured_rooms_array['is_publish'] = 2;
				$featured_rooms_section = json_decode(json_encode($featured_rooms_array));
			}

			//Our Services Section
			$our_services_section = Section_manage::where('lan',$lan)->where('lan', $lan)->where('manage_type', '=', 'home_1')->where('section', '=', 'our_services')->where('is_publish', '=', 1)->first();
			if($our_services_section ==''){
				$our_services_array =  array();
				$our_services_array['image'] = '';
				$our_services_array['is_publish'] = 2;
				$our_services_section = json_decode(json_encode($our_services_array));
			}

			//Testimonial Section
			$testimonial_section = Section_manage::where('lan',$lan)->where('manage_type', '=', 'home_1')->where('section', '=', 'testimonial')->where('is_publish', '=', 1)->first();
			if($testimonial_section ==''){
				$testimonial_array =  array();
				$testimonial_array['image'] = '';
				$testimonial_array['is_publish'] = 2;
				$testimonial_section = json_decode(json_encode($testimonial_array));
			}

			//Our Blogs Section
			$our_blogs_section = Section_manage::where('lan',$lan)->where('manage_type', '=', 'home_1')->where('section', '=', 'our_blogs')->where('is_publish', '=', 1)->first();
			if($our_blogs_section ==''){
				$our_blogs_array =  array();
				$our_blogs_array['image'] = '';
				$our_blogs_array['is_publish'] = 2;
				$our_blogs_section = json_decode(json_encode($our_blogs_array));
			}

			//Slider
			$slider = Slider::where('lan', $lan)->where('slider_type', '=', 'home_1')->where('is_publish', '=', 1)->orderBy('id', 'desc')->limit(1)->get();

			//About Us
			$about_us = Section_content::where('lan', $lan)->where('lan', $lan)->where('page_type', '=', 'home_1')->where('section_type', '=', 'about_us')->where('is_publish', '=', 1)->orderBy('id', 'desc')->limit(1)->get();

			//Offer & Ads
			$OfferAds = Offer_ad::where('lan', $lan)->where('offer_ad_type', '=', 'homepage1')->where('is_publish', '=', 1)->orderBy('id', 'asc')->get();

			//Featured Rooms
			$featured_rooms = DB::table('rooms')
				->join('categories', 'rooms.cat_id', '=', 'categories.id')
				->select('rooms.*', 'categories.name as category_name', 'categories.slug as category_slug')
				->where('rooms.is_publish', '=', 1)
				->where('rooms.is_featured', '=', 1)
				->where('rooms.lan', '=', $lan)
				->orderBy('rooms.id','desc')
				->limit(6)
				->get();

			//Our Services
			$our_services = Section_content::where('lan', $lan)->where('section_type', '=', 'our_services')->where('is_publish', '=', 1)->get();

			//Home Video Section
			$hv_data = Tp_option::where('option_name', 'home-video')->get();
			$id_home_video = '';
			foreach ($hv_data as $row){
				$id_home_video = $row->id;
			}

			$home_video = array();
			if($id_home_video != ''){
				$hvData = json_decode($hv_data);
				$dataObj = json_decode($hvData[0]->option_value);

				$home_video['title'] = $dataObj->title;
				$home_video['short_desc'] = $dataObj->short_desc;
				$home_video['url'] = $dataObj->url;
				$home_video['video_url'] = $dataObj->video_url;
				$home_video['button_text'] = $dataObj->button_text;
				$home_video['target'] = $dataObj->target;
				$home_video['image'] = $dataObj->image;
				$home_video['is_publish'] = $dataObj->is_publish;
			}else{
				$home_video['title'] = '';
				$home_video['short_desc'] = '';
				$home_video['url'] = '';
				$home_video['video_url'] = '';
				$home_video['button_text'] = '';
				$home_video['target'] = '';
				$home_video['image'] = '';
				$home_video['is_publish'] = '2';
			}

			//Testimonial
			$testimonial = Section_content::where('section_type', '=', 'testimonial')->where('is_publish', '=', 1)->get();

			//Blogs
			$blogs = DB::table('blogs')
                ->where('lan', $lan)
				->join('users', 'blogs.user_id', '=', 'users.id')
				->select('blogs.*', 'users.name')
				->where('blogs.is_publish', '=', 1)
				->orderBy('id','desc')
				->limit(3)
				->get();

		//Home Page 2
		}elseif($PageVariation['home_variation'] == 'home_2'){

		//Home Page 3
		}elseif($PageVariation['home_variation'] == 'home_3'){

		//Home Page 4
		}elseif($PageVariation['home_variation'] == 'home_4'){

		}

        return view('frontend.home', compact(
			'slider_hero_section',
			'about_us_section',
			'offer_ads_section',
			'featured_rooms_section',
			'our_services_section',
			'testimonial_section',
			'our_blogs_section',
			'slider',
			'about_us',
			'OfferAds',
			'featured_rooms',
			'our_services',
			'home_video',
			'testimonial',
			'blogs'
		));
    }
}
