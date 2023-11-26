<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
	
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'lan',
        'category_id',
        'is_publish',
        'og_title',
        'og_image',
        'og_description',
        'og_keywords',
        'user_id',
    ];	
}
