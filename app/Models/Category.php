<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
	
	protected $table = 'categories';
	
    protected $fillable = [
		  'name',
		  'slug',
		  'thumbnail',
		  'description',
		  'lan',
		  'is_publish',
		  'og_title',
		  'og_image',
		  'og_description',
		  'og_keywords',
    ];	
}
