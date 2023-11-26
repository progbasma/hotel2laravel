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
	
	$("#view_by_status").val(0);
	
	$("#SubmitBookingCheckOutForm").on("click", function () {
        $("#DataEntry_formId").submit();
    });	
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {
	var status = $("#view_by_status").val();
	var start_date = $("#start_date").val();
	var end_date = $("#end_date").val();
	
	$.ajax({
		url:base_url + "/receptionist/getAllBookingTableData?page="+page
		+"&search="+$("#search").val()
		+"&status="+status
		+"&start_date="+start_date
		+"&end_date="+end_date,
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onRefreshData() {
	var status = $("#view_by_status").val();
	
	$.ajax({
		url:base_url + "/receptionist/getAllBookingTableData?search="+$("#search").val()+"&status="+status,
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {
	var status = $("#view_by_status").val();
	
	$.ajax({
		url: base_url + "/receptionist/getAllBookingTableData?search="+$("#search").val()+"&status="+status,
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
		url: base_url + "/receptionist/getAllBookingTableData?start_date="+start_date+"&end_date="+end_date,
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onDataViewByStatus(status) {

	$("#view_by_status").val(status);
	
	$(".orderstatus").removeClass('active')
	$("#orderstatus_"+status).addClass('active');
	
	$.ajax({
		url: base_url + "/receptionist/getAllBookingTableData?status="+status,
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
		url: base_url + '/receptionist/deleteBookingRequest',
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
		url: base_url + '/receptionist/bulkActionBookingRequest',
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

	var FinalPath = base_url + "/receptionist/excel-export?booking_status_id=0&start_date="+start_date+"&end_date="+end_date;

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

	var FinalPath = base_url + "/receptionist/csv-export?booking_status_id=0&start_date="+start_date+"&end_date="+end_date;
	
	$.ajax({
		url:FinalPath,
		success:function(data){
			var filePath = base_url+'/public/export/'+data;
			window.open(filePath);
		}
	});
}

function onCheckOutModalView(payment_status_id, booking_status_id, booking_id) {
	
	$("#isnotify").prop("checked", false);
	
	$("#payment_status_id").val(payment_status_id).trigger("chosen:updated");
	$("#booking_status_id").val(booking_status_id).trigger("chosen:updated");
	$("#booking_id").val(booking_id);
	
	$('#CheckOutModalView').modal('show');
}

function showPerslyError() {
    $('.parsley-error-list').show();
}

jQuery('#DataEntry_formId').parsley({
    listeners: {
        onFieldValidate: function (elem) {
            if (!$(elem).is(':visible')) {
                return true;
            }
            else {
                showPerslyError();
                return false;
            }
        },
        onFormSubmit: function (isFormValid, event) {
            if (isFormValid) {
                onConfirmChangeBookingStatus();
                return false;
            }
        }
    }
});

function onConfirmChangeBookingStatus() {

	var update_btn = $('.update_btn').html();
	
    $.ajax({
		type : 'POST',
		url: base_url + '/receptionist/updateBookingStatus',
		data: $('#DataEntry_formId').serialize(),
		beforeSend: function() {
			$('.update_btn').html('<span class="spinner-border spinner-border-sm"></span> Please Wait...');
		},
		success: function (response) {			
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				onSuccessMsg(msg);
				onRefreshData();
				$('#CheckOutModalView').modal('hide');
			} else {
				onErrorMsg(msg);
			}
			
			$('.update_btn').html(update_btn);
		}
	});
}
