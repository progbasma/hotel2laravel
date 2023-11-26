<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
	
	protected $table = 'rooms';
	
    protected $fillable = [
		'title',
		'slug',
		'thumbnail',
		'cover_img',
		'short_desc',
		'description',
		'total_adult',
		'total_child',
		'price',
		'old_price',
		'amenities',
		'complements',
		'beds',
		'cat_id',
		'tax_id',
		'is_discount',
		'is_featured',
		'is_publish',
		'lan',
		'og_title',
		'og_image',
		'og_description',
		'og_keywords',
    ];	
}
