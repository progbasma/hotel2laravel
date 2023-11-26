<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section_manage extends Model
{
    use HasFactory;
	
    protected $fillable = [
        'manage_type',
        'section',
        'title',
        'url',
        'image',
        'desc',
        'is_publish',
    ];		
}
