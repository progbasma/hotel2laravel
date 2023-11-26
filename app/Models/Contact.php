<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
	
    protected $fillable = [
        'title',
        'contact_info',
        'contact_form',
        'contact_map',
        'is_recaptcha',
        'mail_subject',
        'is_copy',
        'is_publish',
        'lan'
    ];		
}
