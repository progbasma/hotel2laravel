<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_category extends Model
{
    use HasFactory;
	
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'description',
        'lan',
        'parent_id',
        'is_publish',
        'og_title',
        'og_image',
        'og_description',
        'og_keywords',
    ];	
}
