<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    use HasFactory;
	
	protected $table = 'complements';
	
    protected $fillable = [
	  'name',
	  'item',
	  'is_publish'
    ];		
}
