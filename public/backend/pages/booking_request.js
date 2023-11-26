var $ = jQuery.noConflict();
var RecordId = '';
var BulkAction = '';
var ids = [];

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).on('click', '.pagination a', function(event){
		event.preventDefault(); 
		var page = $(this).attr('href').split('page=')[1];
		onPaginationDataLoad(page);
	});
	
	$('input:checkbox').prop('checked',false);
	
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {

	$.ajax({
		url:base_url + "/backend/getBookingRequestTableData?page="+page
		+"&search="+$("#search").val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onRefreshData() {

	$.ajax({
		url:base_url + "/backend/getBookingRequestTableData?search="+$("#search").val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {
	$.ajax({
		url: base_url + "/backend/getBookingRequestTableData?search="+$("#search").val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onFilterAction() {
	var start_date = $("#start_date").val();
	var end_date = $("#end_date").val();
	
	$.ajax({
		url: base_url + "/backend/getBookingRequestTableData?start_date="+start_date+"&end_date="+end_date,
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onDelete(id) {
	RecordId = id;
	var msg = TEXT["Do you really want to delete this record"];
	onCustomModal(msg, "onConfirmDelete");	
}

function onConfirmDelete() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/deleteBookingRequest',
		data: 'id='+RecordId,
		success: function (response) {
			var msgType = response.msgType;
			var msg = response.msg;

			if(msgType == "success"){
				onSuccessMsg(msg);
				onRefreshData();
			}else{
				onErrorMsg(msg);
			}
			
			onCheckAll();
		}
    });
}

function onBulkAction() {
	ids = [];
	$('.selected_item:checked').each(function(){
		ids.push($(this).val());
	});

	if(ids.length == 0){
		var msg = TEXT["Please select record"];
		onErrorMsg(msg);
		return;
	}
	
	BulkAction = $("#bulk-action").val();
	if(BulkAction == ''){
		var msg = TEXT["Please select action"];
		onErrorMsg(msg);
		return;
	}
	
	if(BulkAction == 'delete'){
		var msg = TEXT["Do you really want to delete this records"];
	}
	
	onCustomModal(msg, "onConfirmBulkAction");	
}

function onConfirmBulkAction() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/bulkActionBookingRequest',
		data: 'ids='+ids+'&BulkAction='+BulkAction,
		success: function (response) {
			var msgType = response.msgType;
			var msg = response.msg;

			if(msgType == "success"){
				onSuccessMsg(msg);
				onRefreshData();
				ids = [];
			}else{
				onErrorMsg(msg);
			}
			
			onCheckAll();
		}
    });
}

function onExcelExport() {
	var start_date = $("#start_date").val();
	var end_date = $("#end_date").val();

	var FinalPath = base_url + "/backend/excel-export?booking_status_id=1&start_date="+start_date+"&end_date="+end_date;

	$.ajax({
		url:FinalPath,
		success:function(data){
			var filePath = base_url+'/public/export/'+data;
			window.open(filePath);
		}
	});
}

function onCSVExport() {
	var start_date = $("#start_date").val();
	var end_date = $("#end_date").val();

	var FinalPath = base_url + "/backend/csv-export?booking_status_id=1&start_date="+start_date+"&end_date="+end_date;
	
	$.ajax({
		url:FinalPath,
		success:function(data){
			var filePath = base_url+'/public/export/'+data;
			window.open(filePath);
		}
	});
}
