<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_assign extends Model
{
    use HasFactory;
	
	protected $table = 'room_assigns';
	
    protected $fillable = [
		'booking_id',
		'room_id',
		'roomtype_id',

    ];	
}
