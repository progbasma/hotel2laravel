<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;
	
	protected $table = 'amenities';
	
    protected $fillable = [
	  'name',
	  'is_publish'
    ];	
}
