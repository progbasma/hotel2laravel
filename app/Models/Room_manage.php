<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_manage extends Model
{
    use HasFactory;
	
	protected $table = 'room_manages';
	
    protected $fillable = [
		'roomtype_id',
		'room_no',
		'in_date',
		'out_date',
		'book_status',
		'is_publish',
    ];		
}
