<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section_content extends Model
{
    use HasFactory;
	
	protected $table = 'section_contents';
	
    protected $fillable = [
        'section_type',
        'page_type',
        'url',
        'image',
        'title',
        'desc',
        'is_publish',
    ];	
}
