<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_manage extends Model
{
    use HasFactory;
	
	protected $table = 'booking_manages';
	
    protected $fillable = [
		'booking_no',
		'transaction_no',
		'roomtype_id',
		'customer_id',
		'payment_method_id',
		'payment_status_id',
		'booking_status_id',
		'total_room',
		'total_price',
		'discount',
		'tax',
		'subtotal',
		'total_amount',
		'paid_amount',
		'due_amount',
		'in_date',
		'out_date',
		'name',
		'email',
		'phone',
		'country',
		'state',
		'zip_code',
		'city',
		'address',
		'comments',
    ];	
}
