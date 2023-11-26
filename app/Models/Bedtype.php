<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedtype extends Model
{
    use HasFactory;
	
	protected $table = 'bedtypes';
	
    protected $fillable = [
	  'name',
	  'is_publish'
    ];		
}
