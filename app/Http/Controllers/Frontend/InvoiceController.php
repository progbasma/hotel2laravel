<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class InvoiceController extends Controller
{
    //Invoice
    public function getInvoice($booking_id, $booking_no) {
		$gtext = gtext();

		$datalist = DB::table('booking_manages')
			->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
			->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
			->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
			->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
			->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
			'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
			->where('booking_manages.id', $booking_id)
			->get();
		
		$mdata = array();
		foreach($datalist as $row){
			$mdata['title'] = $row->title;
			$mdata['is_discount'] = $row->is_discount;
			$mdata['old_price'] = $row->old_price;
			$mdata['booking_no'] = $row->booking_no;
			$mdata['payment_status_id'] = $row->payment_status_id;
			$mdata['booking_status_id'] = $row->booking_status_id;
			$mdata['total_room'] = $row->total_room;
			$mdata['total_price'] = $row->total_price;
			$mdata['discount'] = $row->discount;
			$mdata['tax'] = $row->tax;
			$mdata['subtotal'] = $row->subtotal;
			$mdata['total_amount'] = $row->total_amount;
			$mdata['in_date'] = $row->in_date;
			$mdata['out_date'] = $row->out_date;
			$mdata['customer_name'] = $row->name;
			$mdata['customer_email'] = $row->email;
			$mdata['customer_address'] = $row->address;
			$mdata['city'] = $row->city;
			$mdata['state'] = $row->state;
			$mdata['zip_code'] = $row->zip_code;
			$mdata['country'] = $row->country;
			$mdata['customer_phone'] = $row->phone;
			$mdata['created_at'] = $row->created_at;
			$mdata['method_name'] = $row->method_name;
			$mdata['pstatus_name'] = $row->pstatus_name;
			$mdata['bstatus_name'] = $row->bstatus_name;
		}

		$total_days = DateDiffInDays($mdata['in_date'], $mdata['out_date']);

		$totalPrice = 0;
		if($mdata['total_price'] !=''){
			$totalPrice = $mdata['total_price'];
		}
		
		$oldPrice = 0;
		if($mdata['old_price'] !=''){
			$oldPrice = $mdata['old_price'];
		}
		
		$sub_total = 0;
		if($mdata['subtotal'] !=''){
			$sub_total = $mdata['subtotal'];
		}
		
		$totalTax = 0;
		if($mdata['tax'] !=''){
			$totalTax = $mdata['tax'];
		}
		
		$totalDiscount = 0;
		if($mdata['discount'] !=''){
			$totalDiscount = $mdata['discount'];
		}
		
		$totalAmount = 0;
		if($mdata['total_amount'] !=''){
			$totalAmount = $mdata['total_amount'];
		}
		
		$calOldPrice = $oldPrice*$mdata['total_room']*$total_days;
		
		if($gtext['currency_position'] == 'left'){
			$oPrice = $gtext['currency_icon'].NumberFormat($oldPrice);
			$caloPrice = $gtext['currency_icon'].NumberFormat($calOldPrice);
			$total_price = $gtext['currency_icon'].NumberFormat($totalPrice);
			$subtotal = $gtext['currency_icon'].NumberFormat($sub_total);
			$tax = $gtext['currency_icon'].NumberFormat($totalTax);
			$discount = $gtext['currency_icon'].NumberFormat($totalDiscount);
			$total_amount = $gtext['currency_icon'].NumberFormat($totalAmount);
			
		}else{
			$oPrice = NumberFormat($oldPrice).$gtext['currency_icon'];
			$caloPrice = NumberFormat($calOldPrice).$gtext['currency_icon'];
			$total_price = NumberFormat($totalPrice).$gtext['currency_icon'];
			$subtotal = NumberFormat($sub_total).$gtext['currency_icon'];
			$tax = NumberFormat($totalTax).$gtext['currency_icon'];
			$discount = NumberFormat($totalDiscount).$gtext['currency_icon'];
			$total_amount = NumberFormat($totalAmount).$gtext['currency_icon'];
		}
		
		$old_price = '';
		$cal_old_price = '';
		if($mdata['is_discount'] == 1){
			$old_price = '<p class="old-price">'.$oPrice.'</p>';
			$cal_old_price = '<p class="old-price">'.$caloPrice.'</p>';
		}
		
		$item_list = '<tr>
				<td class="w-30" align="left">'.$mdata['title'].'</td>
				<td class="w-10" align="center">'.$mdata['total_room'].'</td> 
				<td class="w-15" align="center"><p>'.$total_price.'</p>'.$old_price.'</td>  
				<td class="w-20" align="center"><p>'.date('d-m-Y', strtotime($mdata['in_date'])).'</p><p>to</p><p>'.date('d-m-Y', strtotime($mdata['out_date'])).'</p></td>  
				<td class="w-10" align="center">'.$total_days.'</td>  
				<td class="w-15" align="right"><p>'.$subtotal.'</p>'.$cal_old_price.'</td>  
			</tr>';
		
		$RoomDataList = DB::table('room_manages')
			->join('room_assigns', 'room_manages.id', '=', 'room_assigns.room_id')
			->select('room_manages.room_no')
			->where('room_assigns.booking_id', $booking_id)
			->orderBy('room_manages.room_no', 'asc')
			->get();
		
		$room_no = '';
		$f = 0;
		foreach($RoomDataList as $row){
			if($f++){
				$room_no .= ', ';
			}
			
			$room_no .= $row->room_no;
		}
		
		$assign_rooms = '';
		if($room_no !=''){
			$assign_rooms = __('Your assign  room no').': '.$room_no;
		}
		
		$base_url = url('/');
		$logo = public_path('media/'.$gtext['front_logo']);
		
		//set font
		PDF::SetFont('dejavusans', '', 9);
		
		//set font size
		PDF::SetFontSize(9);
		
		//page title
		PDF::SetTitle($gtext['site_name']);

		//add a page
		PDF::AddPage();

		$html ='<style>
		.w-100 {width: 100%;}
		.w-75 {width: 75%;}
		.w-60 {width: 60%;}
		.w-50 {width: 50%;}
		.w-40 {width: 40%;}
		.w-35 {width: 35%;}
		.w-30 {width: 30%;}
		.w-25 {width: 25%;}
		.w-20 {width: 20%;}
		.w-15 {width: 15%;}
		.w-10 {width: 10%;}

		table td, table th {
			color: #686868;
			text-decoration: none;
		}
		a {
			color: #686868;
			text-decoration: none;
		}
		table.border td, table.border th {
			border: 1px solid #f0f0f0;
		}
		table.border-tb td, table.border-tb th {
			border-top: 1px solid #f0f0f0;
			border-bottom: 1px solid #f0f0f0;
		}
		table.border-header td {
			border-bottom: 1px solid #f0f0f0;
		}
		table.border-t td, table.border-t th {
			border-top: 1px solid #f0f0f0;
		}
		table.border-none td, table.border-none th {
			border: none;
		}
		.company-logo img{
			width: 100px;
			height: auto;
		}
		td.invoice-name {
			font-size: 25px;
			font-weight: 600;
			text-align: right;
		}
		p.com-address {
			line-height: 5px;
		}
		h3, h4 {
			line-height: 10px;
		}
		p {
			line-height: 5px;
		}
		h3 {
			font-size: 16px;
		}
		h4 {
			font-size: 12px;
			margin-bottom: 0px;
			font-weight: 400;
		}
		p.color_size {
			font-size: 8px;
		}
		.pstatus_1 {
			font-weight: bold;
			color: #26c56d;	
		}
		.pstatus_2 {
			font-weight: bold;
			color: #fe9e42;	
		}
		.pstatus_3 {
			font-weight: bold;
			color: #f25961;	
		}
		.pstatus_4 {
			font-weight: bold;
			color: #f25961;	
		}
		.ostatus_1{
			font-weight: bold;
			color: #fe9e42;	
		}
		.ostatus_2 {
			font-weight: bold;
			color: #26c56d;	
		}
		.ostatus_3 {
			font-weight: bold;
			color: #919395;	
		}
		.ostatus_4 {
			font-weight: bold;
			color: #f25961;	
		}
		.old-price {
			text-decoration: line-through;
			color: #ee0101;
		}
		</style>
		
		<!--html table-->
		<table class="border-header" width="100%" cellpadding="10" cellspacing="0">
			<tr>
				<td class="w-40"><span class="company-logo"><img src="'.$logo.'"/></span></td>  
				<td class="w-60 invoice-name">'.__('Invoice').'</td>  
			</tr>
		</table>
		<table class="border-none" width="100%" cellpadding="1" cellspacing="0">
			<tr><td class="w-100" align="center"></td></tr>
		</table>
		<table class="border-none" width="100%" cellpadding="2" cellspacing="0">
			<tr>
				<td class="w-50" align="left">
					<h3>'.__('BILL TO').':</h3>
					<p><strong>'.$mdata['customer_name'].'</strong></p>
					<p>'.$mdata['customer_address'].'</p>
					<p>'.$mdata['city'].', '.$mdata['state'].', '.$mdata['zip_code'].', '.$mdata['country'].'</p>
					<p>'.$mdata['customer_email'].'</p>
					<p>'.$mdata['customer_phone'].'</p>
				</td>  
				<td class="w-50" align="right">
					<p><strong>'.__('Booking No').'</strong>: '.$mdata['booking_no'].'</p>
					<p><strong>'.__('Booking Date').'</strong>: '.date('d-m-Y', strtotime($mdata['created_at'])).'</p>
					<p><strong>'.__('Payment Method').'</strong>: '.$mdata['method_name'].'</p>
					<p><strong>'.__('Payment Status').'</strong>: <span class="pstatus_'.$mdata['payment_status_id'].'">'.$mdata['pstatus_name'].'</span></p>
					<p><strong>'.__('Order Status').'</strong>: <span class="ostatus_'.$mdata['booking_status_id'].'">'.$mdata['bstatus_name'].'</span></p>
				</td>  
			</tr>
		</table>
		<table class="border-none" width="100%" cellpadding="5" cellspacing="0">
			<tr><td class="w-100" align="center"></td></tr>
		</table>
		<table class="border-none" width="100%" cellpadding="6" cellspacing="0">
			<tr>
				<td class="w-100" align="left">
					<h3>'.__('BILL FROM').':</h3>
					<p><strong>'.$gtext['company'].'</strong></p>
					<p>'.$gtext['invoice_address'].'</p>
					<p>'.$gtext['invoice_email'].'</p>
					<p>'.$gtext['invoice_phone'].'</p>
				</td> 
			</tr>
		</table>
		<table class="border-none" width="100%" cellpadding="10" cellspacing="0">
			<tr><td class="w-100" align="center"></td></tr>
		</table>

		<table class="border-none" width="100%" cellpadding="6" cellspacing="0">
			<tr>
				<td class="w-30" align="left">
					<strong>'.__('Room Type').'</strong>
				</td>  
				<td class="w-10" align="center">
					<strong>'.__('Total Room').'</strong>
				</td>   
				<td class="w-15" align="center">
					<strong>'.__('Price').'</strong>
				</td>   
				<td class="w-20" align="center">
					<strong>'.__('In / Out Date').'</strong>
				</td>  
				<td class="w-10" align="center">
					<strong>'.__('Total Days').'</strong>
				</td>  
				<td class="w-15" align="right">
					<strong>'.__('Total').'</strong>
				</td>  
			</tr>
		</table>
		
		<table class="border-tb" width="100%" cellpadding="6" cellspacing="0">
			'.$item_list.'
		</table>
		<table class="border-none" width="100%" cellpadding="2" cellspacing="0">
			<tr><td class="w-100" align="center"></td></tr>
		</table>
		<table class="border-none" width="100%" cellpadding="6" cellspacing="0">
			<tr>
				<td class="w-50" align="left"><strong>'.$assign_rooms.'</strong></td>  
				<td class="w-30" align="right"><strong>'.__('Subtotal').'</strong>: </td>  
				<td class="w-20" align="right"><strong>'.$subtotal.'</strong></td>  
			</tr>
			<tr>
				<td class="w-50" align="left"></td>  
				<td class="w-30" align="right"><strong>'.__('Tax').'</strong>: </td>  
				<td class="w-20" align="right"><strong>'.$tax.'</strong></td>  
			</tr>
			<tr>
				<td class="w-50" align="left"></td>  
				<td class="w-30" align="right"><strong>'.__('Discount').'</strong>: </td>  
				<td class="w-20" align="right"><strong>'.$discount.'</strong></td>  
			</tr>
			<tr>
				<td class="w-50" align="left"></td>  
				<td class="w-30" align="right"><strong>'.__('Grand Total').'</strong>: </td>  
				<td class="w-20" align="right"><strong>'.$total_amount.'</strong></td>  
			</tr>
		</table>
		<table class="border-none" width="100%" cellpadding="70" cellspacing="0">
			<tr><td class="w-100" align="center"></td></tr>
		</table>
		<table class="border-t" width="100%" cellpadding="10" cellspacing="0">
			<tr>
				<td class="w-100" align="center">
					<p>'.__('Thank you for booking our rooms.').'</p>
					<p>'.__('If you have any questions about this invoice, please contact us').'</p>
					<p><a href="'.$base_url.'">'.$base_url.'</a></p>
				</td>
			</tr>
		</table>';

		//output the HTML content
		PDF::writeHTML($html, true, false, true, false, '');

		//Close and output PDF document
		PDF::Output('invoice-'.$mdata['booking_no'].'.pdf', 'D');
	}
}
