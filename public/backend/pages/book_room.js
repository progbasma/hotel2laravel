var $ = jQuery.noConflict();
var maxRoom = 0;

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
    $("#new_account").on("click", function () {
		if($(this).is(":checked")){
			$("#new_account_pass").removeClass("hideclass");
			$("#password").attr("required", "");
			$("#password_confirmation").attr("required", "");
		}else if($(this).is(":not(:checked)")){
			$("#new_account_pass").addClass("hideclass");
			$("#password").removeAttr("required");
			$("#password_confirmation").removeAttr("required");
		}
    });
	
	$("#checkin_date").datetimepicker({
		format: 'yyyy-mm-dd',
		startDate: new Date(),
		autoclose: true,
		todayBtn: false,
		minView: 2
	});

	$("#checkout_date").datetimepicker({
		format: 'yyyy-mm-dd',
		startDate: new Date(),
		autoclose: true,
		todayBtn: false,
		minView: 2
	});
	
	$("#submit-form").on("click", function () {
		
        $("#DataEntry_formId").submit();
    });
	
	$("#roomtype").on("change", function () {
		onCheckRoomCount();
	});
	
	onCheckRoomCount();
});

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
                onConfirmBookRoomRequest();
                return false;
            }
        }
    }
});

function onConfirmBookRoomRequest() {
	
	var checkin = $("#checkin_date").val();
	var checkout = $("#checkout_date").val();
	var room = $("#room").val();

	if((checkin == '') || (checkout == '') || (room == '')) {
		return;
	}

	if(parseInt(room) > parseInt(maxRoom)){
		onErrorMsg('This value should be lower than or equal to '+ maxRoom);
		return;
	}
	
    $.ajax({
		type : 'POST',
		url: base_url + '/backend/BookRoomRequest',
		data: $('#DataEntry_formId').serialize(),
		success: function (response) {			
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				onSuccessMsg(msg);
				var booking_id = response.booking_id;
				window.location.href= base_url + '/backend/booking/'+booking_id+'/booking-request';
			} else {
				$.each(msg, function(prefix, val){
					if(prefix == 'oneError'){
						onErrorMsg(val[0]);
					}else{
						$('span.'+prefix+'_error').text(val[0]);
					}
				});
			}
		}
	});
}

function onCheckRoomCount() {
	var roomtype_id = $("#roomtype").val();
	
    $.ajax({
		type : 'POST',
		url: base_url + '/backend/CheckRoomCount',
		data: "roomtype_id="+roomtype_id,
		success: function (response) {			
			var total_room = response.total_room;
			maxRoom = total_room;
			if(total_room>0){
				var availability_text = '<strong>'+TEXT['Availability']+':</strong><span class="instock">'+total_room+' '+TEXT['Room']+'</span>';
			}else{
				var availability_text = '<strong>'+TEXT['Availability']+':</strong><span class="stockout">'+total_room+' '+TEXT['Room']+'</span>';
			}
			
			$("#availability_id").html(availability_text);
		}
	});
}
