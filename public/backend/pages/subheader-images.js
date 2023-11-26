var $ = jQuery.noConflict();
var logo_type = '';

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$("#submit-form").on("click", function () {
        $("#DataEntry_formId").submit();
    });

	$("#on_blog_bg").on("click", function () {
		logo_type = 'blog_bg';
		onGlobalMediaModalView();
    });
	
	$("#on_contact_bg").on("click", function () {
		logo_type = 'contact_bg';
		onGlobalMediaModalView();
    });
	
	$("#on_register_bg").on("click", function () {
		logo_type = 'register_bg';
		onGlobalMediaModalView();
    });
	
	$("#on_login_bg").on("click", function () {
		logo_type = 'login_bg';
		onGlobalMediaModalView();
    });
	
	$("#on_reset_password_bg").on("click", function () {
		logo_type = 'reset_password_bg';
		onGlobalMediaModalView();
    });
	
	$("#on_dashboard_bg").on("click", function () {
		logo_type = 'dashboard_bg';
		onGlobalMediaModalView();
    });
	
	$("#on_profile_bg").on("click", function () {
		logo_type = 'profile_bg';
		onGlobalMediaModalView();
    });
	
	$("#on_change_password_bg").on("click", function () {
		logo_type = 'change_password_bg';
		onGlobalMediaModalView();
    });
	
	$("#on_booking_bg").on("click", function () {
		logo_type = 'booking_bg';
		onGlobalMediaModalView();
    });
	
	$("#media_select_file").on("click", function () {
		
		var large_image = $("#large_image").val();

		if(logo_type == 'blog_bg'){
			
			if(large_image !=''){
				$("#blog_bg").val(large_image);
				$("#view_blog_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_blog_bg").show();
			
		} else if (logo_type == 'contact_bg') {
			if(large_image !=''){
				$("#contact_bg").val(large_image);
				$("#view_contact_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_contact_bg").show();
			
		} else if (logo_type == 'register_bg') {
			
			if(large_image !=''){
				$("#register_bg").val(large_image);
				$("#view_register_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_register_bg").show();
			
		} else if (logo_type == 'login_bg') {
			
			if(large_image !=''){
				$("#login_bg").val(large_image);
				$("#view_login_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_login_bg").show();
			
		} else if (logo_type == 'reset_password_bg') {
			
			if(large_image !=''){
				$("#reset_password_bg").val(large_image);
				$("#view_reset_password_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_reset_password_bg").show();
			
		} else if (logo_type == 'dashboard_bg') {
			
			if(large_image !=''){
				$("#dashboard_bg").val(large_image);
				$("#view_dashboard_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_dashboard_bg").show();
			
		} else if (logo_type == 'profile_bg') {
			
			if(large_image !=''){
				$("#profile_bg").val(large_image);
				$("#view_profile_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_profile_bg").show();
			
		} else if (logo_type == 'change_password_bg') {
			
			if(large_image !=''){
				$("#change_password_bg").val(large_image);
				$("#view_change_password_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_change_password_bg").show();
			
		} else if (logo_type == 'booking_bg') {
			
			if(large_image !=''){
				$("#booking_bg").val(large_image);
				$("#view_booking_bg").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_booking_bg").show();
		}
		
		$('#global_media_modal_view').modal('hide');
    });
});

function onMediaImageRemove(type) {
	if(type == 'blog_bg'){
		
		$('#blog_bg').val('');
		$("#remove_blog_bg").hide();
		
	}else if(type == 'contact_bg'){
		
		$('#contact_bg').val('');
		$("#remove_contact_bg").hide();
		
	}else if(type == 'register_bg'){
		$('#register_bg').val('');
		$("#remove_register_bg").hide();
		
	}else if(type == 'login_bg'){
		$('#login_bg').val('');
		$("#remove_login_bg").hide();
	
	}else if(type == 'reset_password_bg'){
		$('#reset_password_bg').val('');
		$("#remove_reset_password_bg").hide();
		
	}else if(type == 'dashboard_bg'){
		$('#dashboard_bg').val('');
		$("#remove_dashboard_bg").hide();
		
	}else if(type == 'profile_bg'){
		$('#profile_bg').val('');
		$("#remove_profile_bg").hide();
		
	}else if(type == 'change_password_bg'){
		$('#change_password_bg').val('');
		$("#remove_change_password_bg").hide();
		
	}else if(type == 'booking_bg'){
		$('#booking_bg').val('');
		$("#remove_booking_bg").hide();
	}
}

function showPerslyError() {
    $('.parsley-error-list').show();
}

jQuery('#DataEntry_formId').parsley({
    listeners: {
        onFieldValidate: function (elem) {
            if (!$(elem).is(':visible')) {
                return true;
            } else {
                showPerslyError();
                return false;
            }
        },
        onFormSubmit: function (isFormValid, event) {
            if (isFormValid) {
                onConfirmWhenAddEdit();
                return false;
            }
        }
    }
});

function onConfirmWhenAddEdit() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/saveSubheaderBGImages',
		data: $('#DataEntry_formId').serialize(),
		success: function (response) {			
			var msgType = response.msgType;
			var msg = response.msg;
			if (msgType == "success") {
				onSuccessMsg(msg);
			} else {
				onErrorMsg(msg);
			}
		}
	});
}

