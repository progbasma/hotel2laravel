<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//include PhpSpreadsheet library
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;	
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;	
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExportController extends Controller
{
	//Excel Export
    public function ExcelExport(Request $request){
		$gtext = gtext();
		
		$booking_status_id = $request->booking_status_id;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		
		if($booking_status_id == 1){
			$report_title = __('Booking Request');
			
			if(($start_date != '') && ($end_date != '')){
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->where('booking_manages.booking_status_id', '=', 1)
					->whereBetween('booking_manages.created_at', [$start_date, $end_date])
					->orderBy('booking_manages.id', 'desc')
					->get();
			}else{
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->where('booking_manages.booking_status_id', '=', 1)
					->orderBy('booking_manages.id', 'desc')
					->get();
			}
		}else{
			$report_title = __('All Booking');
			
			if(($start_date != '') && ($end_date != '')){
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->whereBetween('booking_manages.created_at', [$start_date, $end_date])
					->orderBy('booking_manages.id', 'desc')
					->get();
			}else{
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->orderBy('booking_manages.id', 'desc')
					->get();
			}
		}
		
		$spreadsheet = new Spreadsheet();

		//Page Setup
		//Page Orientation(ORIENTATION_LANDSCAPE/ORIENTATION_PORTRAIT), 
		//Paper Size(PAPERSIZE_A3,PAPERSIZE_A4,PAPERSIZE_A5,PAPERSIZE_LETTER,PAPERSIZE_LEGAL etc)
		$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
		$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);

		//Set Page Margins for a Worksheet
		$spreadsheet->getActiveSheet()->getPageMargins()->setTop(0.75);
		$spreadsheet->getActiveSheet()->getPageMargins()->setRight(0.70);
		$spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0.70);
		$spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0.75);

		//Center a page horizontally/vertically
		$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
		$spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

		//Show/hide gridlines(true/false)
		$spreadsheet->getActiveSheet()->setShowGridlines(true);

		//Activate work sheet
		$spreadsheet->createSheet(0);
		$spreadsheet->setActiveSheetIndex(0);
		$spreadsheet->getActiveSheet(0);
		//work sheet name
		$spreadsheet->getActiveSheet()->setTitle('Data');	
		//Default Font Set
		$spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
		//Default Font Size Set
		$spreadsheet->getDefaultStyle()->getFont()->setSize(11); 

		//Border color
		$styleThinBlackBorderOutline = array('borders' => array('outline'=> array('borderStyle' => Border::BORDER_THIN, 'color' => array('argb' => '5a5a5a'))));
		$spreadsheet->getActiveSheet()->SetCellValue('A2', $report_title);
		$spreadsheet->getActiveSheet()->getStyle('A2')->getFont();

		//Font Size for Cells
		$spreadsheet -> getActiveSheet()->getStyle('A2') -> applyFromArray(array('font' => array('size' => '14', 'bold' => true)), 'A2');

		//Text Alignment Horizontal(HORIZONTAL_LEFT,HORIZONTAL_CENTER,HORIZONTAL_RIGHT)
		$spreadsheet -> getActiveSheet()->getStyle('A2') -> getAlignment()->setHorizontal(Alignment::VERTICAL_CENTER);

		//Text Alignment Vertical(VERTICAL_TOP,VERTICAL_CENTER,VERTICAL_BOTTOM)
		$spreadsheet -> getActiveSheet() -> getStyle('A2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		//merge Cell
		$spreadsheet -> getActiveSheet() -> mergeCells('A2:R2');
		
		//Value Set for Cells
		$spreadsheet -> getActiveSheet()				
					->SetCellValue('A4', '#')							
					->SetCellValue('B4', __('Booking No'))
					->SetCellValue('C4', __('Booking Date'))							
					->SetCellValue('D4', __('Customer'))							
					->SetCellValue('E4', __('Phone'))							
					->SetCellValue('F4', __('Email'))							
					->SetCellValue('G4', __('Room Type'))							
					->SetCellValue('H4', __('In / Out Date'))							
					->SetCellValue('I4', __('Total Room'))							
					->SetCellValue('J4', __('Total Days'))							
					->SetCellValue('K4', __('Subtotal').'('.$gtext['currency_icon'].')')							
					->SetCellValue('L4', __('Tax').'('.$gtext['currency_icon'].')')							
					->SetCellValue('M4', __('Discount').'('.$gtext['currency_icon'].')')							
					->SetCellValue('N4', __('Total Amount').'('.$gtext['currency_icon'].')')
					->SetCellValue('O4', __('Payment Method'))
					->SetCellValue('P4', __('Payment Status'))
					->SetCellValue('Q4', __('Booking Status'))
					->SetCellValue('R4', __('Address'));
		
		//Font Size for Cells
		$spreadsheet -> getActiveSheet()->getStyle('A4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'A4');	
		$spreadsheet -> getActiveSheet()->getStyle('B4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'B4');
		$spreadsheet -> getActiveSheet()->getStyle('C4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'C4');
		$spreadsheet -> getActiveSheet()->getStyle('D4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'D4');
		$spreadsheet -> getActiveSheet()->getStyle('E4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'E4');
		$spreadsheet -> getActiveSheet()->getStyle('F4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'F4');
		$spreadsheet -> getActiveSheet()->getStyle('G4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'G4');
		$spreadsheet -> getActiveSheet()->getStyle('H4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'H4');
		$spreadsheet -> getActiveSheet()->getStyle('I4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'I4');
		$spreadsheet -> getActiveSheet()->getStyle('J4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'J4');
		$spreadsheet -> getActiveSheet()->getStyle('K4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'K4');
		$spreadsheet -> getActiveSheet()->getStyle('L4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'L4');
		$spreadsheet -> getActiveSheet()->getStyle('M4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'M4');
		$spreadsheet -> getActiveSheet()->getStyle('N4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'N4');
		$spreadsheet -> getActiveSheet()->getStyle('O4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'O4');
		$spreadsheet -> getActiveSheet()->getStyle('P4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'P4');
		$spreadsheet -> getActiveSheet()->getStyle('Q4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'Q4');
		$spreadsheet -> getActiveSheet()->getStyle('R4') -> applyFromArray(array('font' => array('size' => '12', 'bold' => true)), 'R4');

		//Text Alignment Horizontal(HORIZONTAL_LEFT,HORIZONTAL_CENTER,HORIZONTAL_RIGHT)
		$spreadsheet -> getActiveSheet()->getStyle('A4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$spreadsheet -> getActiveSheet()->getStyle('B4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('C4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('D4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('E4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('F4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('G4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('H4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('I4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$spreadsheet -> getActiveSheet()->getStyle('J4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$spreadsheet -> getActiveSheet()->getStyle('K4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
		$spreadsheet -> getActiveSheet()->getStyle('L4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
		$spreadsheet -> getActiveSheet()->getStyle('M4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
		$spreadsheet -> getActiveSheet()->getStyle('N4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
		$spreadsheet -> getActiveSheet()->getStyle('O4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('P4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('Q4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet -> getActiveSheet()->getStyle('R4') -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

		//Text Alignment Vertical(VERTICAL_TOP,VERTICAL_CENTER,VERTICAL_BOTTOM)
		$spreadsheet -> getActiveSheet() -> getStyle('A4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('B4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('C4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('D4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('E4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('F4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('G4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('H4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('I4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('J4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('K4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('L4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('M4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('N4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('O4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('P4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('Q4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$spreadsheet -> getActiveSheet() -> getStyle('R4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		//Width for Cells
		$spreadsheet -> getActiveSheet() -> getColumnDimension('A') -> setWidth(5);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('B') -> setWidth(20);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('C') -> setWidth(15);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('D') -> setWidth(20);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('E') -> setWidth(15);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('F') -> setWidth(30);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('G') -> setWidth(30);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('H') -> setWidth(30);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('I') -> setWidth(15);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('J') -> setWidth(15);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('K') -> setWidth(15);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('L') -> setWidth(10);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('M') -> setWidth(15);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('N') -> setWidth(20);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('O') -> setWidth(20);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('P') -> setWidth(20);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('Q') -> setWidth(20);
		$spreadsheet -> getActiveSheet() -> getColumnDimension('R') -> setWidth(40);

		//Wrap text
		$spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setWrapText(true);

		//*border color set for cells
		$spreadsheet -> getActiveSheet() -> getStyle('A4:A4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('B4:B4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('C4:C4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('D4:D4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('E4:E4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('F4:F4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('G4:G4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('H4:H4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('I4:I4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('J4:J4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('K4:K4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('L4:L4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('M4:M4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('N4:N4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('O4:O4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('P4:P4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('Q4:Q4') -> applyFromArray($styleThinBlackBorderOutline);
		$spreadsheet -> getActiveSheet() -> getStyle('R4:R4') -> applyFromArray($styleThinBlackBorderOutline);
		
		$i=1; 
		$j=5;
		foreach($datalist as $row){
			
			$booking_date = date('d-m-Y', strtotime($row->created_at));

			if($row->customer_id !=''){
				$customer = $row->name;
			}else{
				$customer = __('Guest User');
			}
			
			$InOutDate = date('d-m-Y', strtotime($row->in_date)).' to '.date('d-m-Y', strtotime($row->out_date));
			
			$total_days = DateDiffInDays($row->in_date, $row->out_date);

			$totalPrice = 0;
			if($row->total_price !=''){
				$totalPrice = $row->total_price;
			}
			
			$oldPrice = 0;
			if($row->old_price !=''){
				$oldPrice = $row->old_price;
			}
			
			$sub_total = 0;
			if($row->subtotal !=''){
				$sub_total = $row->subtotal;
			}
			
			$totalTax = 0;
			if($row->tax !=''){
				$totalTax = $row->tax;
			}
			
			$totalDiscount = 0;
			if($row->discount !=''){
				$totalDiscount = $row->discount;
			}
			
			$totalAmount = 0;
			if($row->total_amount !=''){
				$totalAmount = $row->total_amount;
			}
			
			$calOldPrice = $oldPrice*$row->total_room*$total_days;
			
			$oPrice = $oldPrice;
			$caloPrice = $calOldPrice;
			$total_price = $totalPrice;
			$subtotal = $sub_total;
			$tax = $totalTax;
			$discount = $totalDiscount;
			$total_amount = $totalAmount;
			
			$old_price = '';
			$cal_old_price = '';
			if($row->is_discount == 1){
				$old_price = $oPrice;
				$cal_old_price = $caloPrice;
			}
	
			//Value Set for Cells
			$spreadsheet->getActiveSheet()
						->SetCellValue('A'.$j, $i)							
						->SetCellValue('B'.$j, $row->booking_no)	
						->SetCellValue('C'.$j, $booking_date)																
						->SetCellValue('D'.$j, $customer)
						->SetCellValue('E'.$j, $row->phone)
						->SetCellValue('F'.$j, $row->email)
						->SetCellValue('G'.$j, $row->title)																
						->SetCellValue('H'.$j, $InOutDate)																
						->SetCellValue('I'.$j, $row->total_room)																
						->SetCellValue('J'.$j, $total_days)
						->SetCellValue('K'.$j, $subtotal)
						->SetCellValue('L'.$j, $tax)
						->SetCellValue('M'.$j, $discount)
						->SetCellValue('N'.$j, $total_amount)
						->SetCellValue('O'.$j, $row->method_name)
						->SetCellValue('P'.$j, $row->pstatus_name)
						->SetCellValue('Q'.$j, $row->bstatus_name)
						->SetCellValue('R'.$j, $row->address);
					
			//border color set for cells
			$spreadsheet -> getActiveSheet() -> getStyle('A' . $j . ':A' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('B' . $j . ':B' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('C' . $j . ':C' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('D' . $j . ':D' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('E' . $j . ':E' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('F' . $j . ':F' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('G' . $j . ':G' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('H' . $j . ':H' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('I' . $j . ':I' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('J' . $j . ':J' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('K' . $j . ':K' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('L' . $j . ':L' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('M' . $j . ':M' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('N' . $j . ':N' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('O' . $j . ':O' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('P' . $j . ':P' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('Q' . $j . ':Q' . $j) -> applyFromArray($styleThinBlackBorderOutline);
			$spreadsheet -> getActiveSheet() -> getStyle('R' . $j . ':R' . $j) -> applyFromArray($styleThinBlackBorderOutline);

			//Text Alignment Horizontal(HORIZONTAL_LEFT,HORIZONTAL_CENTER,HORIZONTAL_RIGHT)
			$spreadsheet -> getActiveSheet()->getStyle('A' . $j . ':A' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$spreadsheet -> getActiveSheet()->getStyle('B' . $j . ':B' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('C' . $j . ':C' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('D' . $j . ':D' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('E' . $j . ':E' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('F' . $j . ':F' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('G' . $j . ':G' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('H' . $j . ':H' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('I' . $j . ':I' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$spreadsheet -> getActiveSheet()->getStyle('J' . $j . ':J' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$spreadsheet -> getActiveSheet()->getStyle('K' . $j . ':K' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
			$spreadsheet -> getActiveSheet()->getStyle('L' . $j . ':L' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
			$spreadsheet -> getActiveSheet()->getStyle('M' . $j . ':M' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
			$spreadsheet -> getActiveSheet()->getStyle('N' . $j . ':N' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
			$spreadsheet -> getActiveSheet()->getStyle('O' . $j . ':O' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('P' . $j . ':P' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('Q' . $j . ':Q' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			$spreadsheet -> getActiveSheet()->getStyle('R' . $j . ':R' . $j) -> getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
			
			//Text Alignment Vertical(VERTICAL_TOP,VERTICAL_CENTER,VERTICAL_BOTTOM)
			$spreadsheet -> getActiveSheet() -> getStyle('A' . $j . ':A' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('B' . $j . ':B' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('C' . $j . ':C' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('D' . $j . ':D' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('E' . $j . ':E' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('F' . $j . ':F' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('G' . $j . ':G' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('H' . $j . ':H' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('I' . $j . ':I' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('J' . $j . ':J' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('K' . $j . ':K' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('L' . $j . ':L' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('M' . $j . ':M' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('N' . $j . ':N' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('O' . $j . ':O' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('P' . $j . ':P' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('Q' . $j . ':Q' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet -> getActiveSheet() -> getStyle('R' . $j . ':R' . $j)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

			//DateTime format Cell C
			$spreadsheet->getActiveSheet()->getStyle('C'.$j)->getNumberFormat()->setFormatCode('dd-mm-yyyy'); //Date Format

			//Number format Cell K
			$spreadsheet->getActiveSheet()->getStyle('K'.$j)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$spreadsheet->getActiveSheet()->getStyle('K'.$j)->getNumberFormat()->setFormatCode('#,##0.00'); 
			
			//Number format Cell L
			$spreadsheet->getActiveSheet()->getStyle('L'.$j)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$spreadsheet->getActiveSheet()->getStyle('L'.$j)->getNumberFormat()->setFormatCode('#,##0.00'); 
				
			//Number format Cell M
			$spreadsheet->getActiveSheet()->getStyle('M'.$j)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$spreadsheet->getActiveSheet()->getStyle('M'.$j)->getNumberFormat()->setFormatCode('#,##0.00'); 
				
			//Number format Cell N
			$spreadsheet->getActiveSheet()->getStyle('N'.$j)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$spreadsheet->getActiveSheet()->getStyle('N'.$j)->getNumberFormat()->setFormatCode('#,##0.00'); 

			$i++; $j++;
		}
		
		$exportTime = date("Y-m-d-His", time());	
		$writer = new Xlsx($spreadsheet);
		$file = 'booking-'.$exportTime. '.xlsx';
		$writer->save('public/export/' . $file);
		
		echo $file;
	}
	
	//CSV Export
    public function OrdersCSVExport(Request $request){
		$gtext = gtext();
		
		$booking_status_id = $request->booking_status_id;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		
		if($booking_status_id == 1){
			$report_title = __('Booking Request');
			
			if(($start_date != '') && ($end_date != '')){
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->where('booking_manages.booking_status_id', '=', 1)
					->whereBetween('booking_manages.created_at', [$start_date, $end_date])
					->orderBy('booking_manages.id', 'desc')
					->get();
			}else{
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->where('booking_manages.booking_status_id', '=', 1)
					->orderBy('booking_manages.id', 'desc')
					->get();
			}
		}else{
			$report_title = __('All Booking');
			
			if(($start_date != '') && ($end_date != '')){
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->whereBetween('booking_manages.created_at', [$start_date, $end_date])
					->orderBy('booking_manages.id', 'desc')
					->get();
			}else{
				$datalist = DB::table('booking_manages')
					->join('rooms', 'booking_manages.roomtype_id', '=', 'rooms.id')
					->join('payment_method', 'booking_manages.payment_method_id', '=', 'payment_method.id')
					->join('payment_status', 'booking_manages.payment_status_id', '=', 'payment_status.id')
					->join('booking_status', 'booking_manages.booking_status_id', '=', 'booking_status.id')
					->select('booking_manages.*', 'rooms.title', 'rooms.old_price', 'rooms.is_discount', 
					 'payment_method.method_name', 'payment_status.pstatus_name', 'booking_status.bstatus_name')
					->orderBy('booking_manages.id', 'desc')
					->get();
			}
		}
		
		$spreadsheet = new Spreadsheet();

		//Activate work sheet
		$spreadsheet->createSheet(0);
		$spreadsheet->setActiveSheetIndex(0);
		
		//work sheet name
		$spreadsheet->getActiveSheet()->setTitle('Data');
		
		//Default Font Set
		$spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
		
		//Default Font Size Set
		$spreadsheet->getDefaultStyle()->getFont()->setSize(11); 

		$spreadsheet->getActiveSheet() -> SetCellValue('G2', $report_title);	

		//Value Set for Cells
		$spreadsheet -> getActiveSheet()				
					->SetCellValue('A4', '#')							
					->SetCellValue('B4', __('Booking No'))
					->SetCellValue('C4', __('Booking Date'))							
					->SetCellValue('D4', __('Customer'))							
					->SetCellValue('E4', __('Phone'))							
					->SetCellValue('F4', __('Email'))							
					->SetCellValue('G4', __('Room Type'))							
					->SetCellValue('H4', __('In / Out Date'))							
					->SetCellValue('I4', __('Total Room'))							
					->SetCellValue('J4', __('Total Days'))							
					->SetCellValue('K4', __('Subtotal').'('.$gtext['currency_icon'].')')							
					->SetCellValue('L4', __('Tax').'('.$gtext['currency_icon'].')')							
					->SetCellValue('M4', __('Discount').'('.$gtext['currency_icon'].')')							
					->SetCellValue('N4', __('Total Amount').'('.$gtext['currency_icon'].')')
					->SetCellValue('O4', __('Payment Method'))
					->SetCellValue('P4', __('Payment Status'))
					->SetCellValue('Q4', __('Booking Status'))
					->SetCellValue('R4', __('Address'));
		
		$i=1; 
		$j=5;
		foreach($datalist as $row){
			
			$booking_date = date('d-m-Y', strtotime($row->created_at));

			if($row->customer_id !=''){
				$customer = $row->name;
			}else{
				$customer = __('Guest User');
			}
			
			$InOutDate = date('d-m-Y', strtotime($row->in_date)).' to '.date('d-m-Y', strtotime($row->out_date));
			
			$total_days = DateDiffInDays($row->in_date, $row->out_date);

			$totalPrice = 0;
			if($row->total_price !=''){
				$totalPrice = $row->total_price;
			}
			
			$oldPrice = 0;
			if($row->old_price !=''){
				$oldPrice = $row->old_price;
			}
			
			$sub_total = 0;
			if($row->subtotal !=''){
				$sub_total = $row->subtotal;
			}
			
			$totalTax = 0;
			if($row->tax !=''){
				$totalTax = $row->tax;
			}
			
			$totalDiscount = 0;
			if($row->discount !=''){
				$totalDiscount = $row->discount;
			}
			
			$totalAmount = 0;
			if($row->total_amount !=''){
				$totalAmount = $row->total_amount;
			}
			
			$calOldPrice = $oldPrice*$row->total_room*$total_days;
			
			$oPrice = $oldPrice;
			$caloPrice = $calOldPrice;
			$total_price = $totalPrice;
			$subtotal = $sub_total;
			$tax = $totalTax;
			$discount = $totalDiscount;
			$total_amount = $totalAmount;
			
			$old_price = '';
			$cal_old_price = '';
			if($row->is_discount == 1){
				$old_price = $oPrice;
				$cal_old_price = $caloPrice;
			}
	
			//Value Set for Cells
			$spreadsheet->getActiveSheet()
						->SetCellValue('A'.$j, $i)							
						->SetCellValue('B'.$j, $row->booking_no)	
						->SetCellValue('C'.$j, $booking_date)																
						->SetCellValue('D'.$j, $customer)
						->SetCellValue('E'.$j, $row->phone)
						->SetCellValue('F'.$j, $row->email)
						->SetCellValue('G'.$j, $row->title)																
						->SetCellValue('H'.$j, $InOutDate)																
						->SetCellValue('I'.$j, $row->total_room)																
						->SetCellValue('J'.$j, $total_days)
						->SetCellValue('K'.$j, $subtotal)
						->SetCellValue('L'.$j, $tax)
						->SetCellValue('M'.$j, $discount)
						->SetCellValue('N'.$j, $total_amount)
						->SetCellValue('O'.$j, $row->method_name)
						->SetCellValue('P'.$j, $row->pstatus_name)
						->SetCellValue('Q'.$j, $row->bstatus_name)
						->SetCellValue('R'.$j, $row->address);
			
			//DateTime format Cell C
			$spreadsheet->getActiveSheet()->getStyle('C'.$j)->getNumberFormat()->setFormatCode('dd-mm-yyyy'); //Date Format

			//Number format Cell K
			$spreadsheet->getActiveSheet()->getStyle('K'.$j)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$spreadsheet->getActiveSheet()->getStyle('K'.$j)->getNumberFormat()->setFormatCode('#,##0.00'); 
			
			//Number format Cell L
			$spreadsheet->getActiveSheet()->getStyle('L'.$j)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$spreadsheet->getActiveSheet()->getStyle('L'.$j)->getNumberFormat()->setFormatCode('#,##0.00'); 
				
			//Number format Cell M
			$spreadsheet->getActiveSheet()->getStyle('M'.$j)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$spreadsheet->getActiveSheet()->getStyle('M'.$j)->getNumberFormat()->setFormatCode('#,##0.00'); 
				
			//Number format Cell N
			$spreadsheet->getActiveSheet()->getStyle('N'.$j)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$spreadsheet->getActiveSheet()->getStyle('N'.$j)->getNumberFormat()->setFormatCode('#,##0.00'); 

			$i++; $j++;
		}

		$exportTime = date("Y-m-d-His", time());
		$writer = new Csv($spreadsheet);
		$file = 'booking-'.$exportTime. '.csv';
		$writer->setUseBOM(true);
		$writer->save('public/export/' . $file);

		echo $file;
	}
}
