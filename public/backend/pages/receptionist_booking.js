var $ = jQuery.noConflict();
var RecordId = '';
var TotalAssignRoom = 0;

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$(document).on('click', '.tp_pagination_modal nav ul.pagination a', function(event){
		event.preventDefault(); 
		var page = $(this).attr('href').split('page=')[1];
		onPaginationModalDataLoad(page);
	});
	
	$("#submit-form").on("click", function () {
        $("#DataEntry_formId").submit();
    });
	
	$("#submit-roomdateid").on("click", function () {
        $("#RoomDateFormId").submit();
    });
	
	$("#checkin_date").datetimepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayBtn: false,
		minView: 2
	});

	$("#checkout_date").datetimepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayBtn: false,
		minView: 2
	});
	
	onAssignRoomDataLoad();

});

function onAssignRoomDataLoad() {
	
    $.ajax({
		type : 'POST',
		url: base_url + '/receptionist/getAssignRoomData',
		data: 'booking_id='+booking_id,
		success: function (response) {
			var data = response.datalist;
			TotalAssignRoom = data.length;

			var AssignRoomList = '';
			if(data.length>0){
				var items = '';
				$.each(data, function(key, obj){
					
				  items += '<div class="room-card">'
							+'<div class="room-item">'
								+'<h2>'+obj.room_no+'</h2>'
								+'<p>'+TEXT['Room Number']+'</p>'
							+'</div>'
							+'<a onClick="onDeleteAssignRoom('+obj.assign_room_id+')" href="javascript:void(0);" class="room_delte_btn"><i class="fa fa-times"></i></a>'
						+'</div>';
				});
				AssignRoomList = items;
			}else{
				AssignRoomList = '<div class="alert alert-danger">'+TEXT['Not found assign room']+'</div>';
			}
			$("#assign_room_data").html(AssignRoomList);
		}
	});
}

function onRoomListModalView() {
	$('#room_list_modal_view').modal('show');
}

function onPaginationModalDataLoad(page) {
	$.ajax({
		url:base_url + "/receptionist/getRoomListTableData?page="+page+'&roomtype_id='+roomtype_id+'&booking_id='+booking_id,
		success:function(data){
			$('#tp_datalist_modal').html(data);
		}
	});
}

function onSearchModal() {
	var search = $("#search_modal").val();
	$.ajax({
		url: base_url + "/receptionist/getRoomListTableData?search="+search+'&roomtype_id='+roomtype_id+'&booking_id='+booking_id,
		success:function(data){
			$('#tp_datalist_modal').html(data);
		}
	});
}

function onRefreshDataModal() {
	$.ajax({
		url: base_url + "/receptionist/getRoomListTableData?roomtype_id="+roomtype_id+'&booking_id='+booking_id,
		success:function(data){
			$('#tp_datalist_modal').html(data);
		}
	});
}

function onAssignRoom(room_id) {

	if(total_room <= TotalAssignRoom){
		var ErrorMsg = TEXT['Already Assigned'] +' '+ TotalAssignRoom +' '+ TEXT['Room'];
		onErrorMsg(ErrorMsg);
		return;
	}
	
    $.ajax({
		type : 'POST',
		url: base_url + '/receptionist/saveAssignRoomData',
		data: 'booking_id='+booking_id+'&room_id='+room_id+'&roomtype_id='+roomtype_id,
		success: function (response) {			
			var msgType = response.msgType;
			var msg = response.msg;
			if (msgType == "success") {
				onSuccessMsg(msg);
				onRefreshDataModal();
				onAssignRoomDataLoad();
			} else {
				onErrorMsg(msg);
			}
		}
	});
}

function onDeleteAssignRoom(id) {
	RecordId = id;
	var msg = TEXT["Do you really want to delete this record"];
	onCustomModal(msg, "onConfirmDeleteAssignRoom");	
}

function onConfirmDeleteAssignRoom() {

    $.ajax({
		type : 'POST',
		url: base_url + '/receptionist/deleteAssignRoom',
		data: 'id='+RecordId,
		success: function (response) {
			var msgType = response.msgType;
			var msg = response.msg;

			if(msgType == "success"){
				onSuccessMsg(msg);
				onAssignRoomDataLoad();
				onRefreshDataModal();
			}else{
				onErrorMsg(msg);
			}
		}
    });
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
                onConfirmOrderStatus();
                return false;
            }
        }
    }
});

function onConfirmOrderStatus() {

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
				onPaymentOrderStatusData();
				onSuccessMsg(msg);
			} else {
				onErrorMsg(msg);
			}
			
			$('.update_btn').html(update_btn);
		}
	});
}

jQuery('#RoomDateFormId').parsley({
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
                onConfirmRoomDate();
                return false;
            }
        }
    }
});

function onConfirmRoomDate() {
	var room = $("#room").val();
	
	if(parseInt(room) > parseInt(maxRoom)){
		onErrorMsg('This value should be lower than or equal to '+ maxRoom);
		return;
	}
	
	var msg = TEXT['Do you really want to edit this record'];
	onCustomModal(msg, "onConfirmRoomDateUpdate");	
}

function onConfirmRoomDateUpdate() {

    $.ajax({
		type : 'POST',
		url: base_url + '/receptionist/updateRoomDate',
		data: $('#RoomDateFormId').serialize(),
		success: function (response) {			
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				onSuccessMsg(msg);
				onPaymentOrderStatusData();
			} else {
				onErrorMsg(msg);
			}
		}
	});
}

function onPaymentOrderStatusData() {

	$.ajax({
		url:base_url + "/receptionist/getPaymentBookingStatusData?booking_id="+booking_id,
		success:function(data){
			$("#payment_status_class").removeClass().addClass("pstatus_"+data.payment_status_id);
			$("#order_status_class").removeClass().addClass("ostatus_"+data.booking_status_id);
			$("#pstatus_name").text(data.pstatus_name);
			$("#ostatus_name").text(data.bstatus_name);

			window.location.href= currentPath;
		}
	});
}
