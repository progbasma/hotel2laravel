var $ = jQuery.noConflict();

$(function () {
	"use strict";
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});	
	
	$("#active-settings").addClass("active");

	$(document).on('click', '.pcode-submit-form', function(event){
		event.preventDefault(); 

		var pcode = $("#pcode").val();
		if(pcode.trim() == ''){
			onErrorMsg('Please fill out required field');
			return;
		}
		
		var pcode_submit_btn = $('.pcode_submit_btn').html();
		
		$.ajax({
			type : 'POST',
			url: base_url + '/backend/CodeVerified',
			data: $('#PurchaseCode_formId').serialize(),
			beforeSend: function() {
				$('.pcode_submit_btn').html('<span class="spinner-border spinner-border-sm"></span> Please Wait...');
			},
			success: function (response) {
				var msgType = response.msgType;
				var msg = response.msg;

				if (msgType == "success") {
					onPcodeData();
					onSuccessMsg(msg);
				} else {
					onErrorMsg(msg);
				}
				
				$('.pcode_submit_btn').html(pcode_submit_btn);
			}
		});
	});
});

function onPcodeData(){
	$.ajax({
		url:base_url + "/backend/getPcodeData",
		success:function(data){
			$('#PurchaseCodeId').html(data);
		}
	});
}

function onPcodeDelete() {
	var msg = TEXT["Do you really want to deregister the theme"];
	onCustomModal(msg, "onConfirmWhenDelete");	
}

function onConfirmWhenDelete() {
	
	var pcode_delete_btn = $('.pcode_delete_btn').html();
	
    $.ajax({
		type : 'POST',
		url: base_url + '/backend/deletePcode',
		data: 'id='+$("#pcode_id").val(),
		beforeSend: function() {
			$('.pcode_delete_btn').html('<span class="spinner-border spinner-border-sm"></span> Please Wait...');
		},
		success: function (response) {
			
            var msgType = response.msgType;
            var msg = response.msg;
			
            if (msgType == "success") {
				$("#pcode").val('');
				onPcodeData();
				onSuccessMsg(msg);
            } else {
                onErrorMsg(msg);
            }
			
			$('.pcode_delete_btn').html(pcode_delete_btn);
        }
    });
}


