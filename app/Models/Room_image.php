<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_image extends Model
{
    use HasFactory;
	
	protected $table = 'room_images';
	
    protected $fillable = [
		'room_id',
		'thumbnail',
		'large_image',
		'desc',
    ];	
}
