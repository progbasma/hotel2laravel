var $ = jQuery.noConflict();

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	resetForm("contact-form");
	$("#sent_message").html('');
	
	//Form Submit
    $('#submit_contact_form').on('click', function () {
        $("#contact-form").submit();
    });
});

//Reset Form
function resetForm(id) {
    $('#' + id).each(function () {
        this.reset();
    });
}

//Error Show
function showPerslyError() {
    $('.parsley-error-list').show();
}

//Form Submit
jQuery('#contact-form').parsley({
    listeners: {
        onFieldValidate: function (elem) {
            if (!$(elem).is(':visible')) {
                return true;
            }else {
                showPerslyError();
                return false;
            }
        },
        onFormSubmit: function (isFormValid, event) {
            if (isFormValid) {
                onSentContactFormMessage();
                return false;
            }
        }
    }
});

//Sent Contact Form Message
function onSentContactFormMessage() {
	var before_btn = $('#submit_contact_form').html();
	
    $.ajax({
		type : 'POST',
		url: base_url + '/frontend/sentMessage',
		data: $('#contact-form').serialize(),
		beforeSend: function() {
			$('#submit_contact_form').html('<span class="spinner-border spinner-border-sm"></span> Please Wait...');
		},
		success: function (response) {
			
            var msgType = response.msgType;
            var msg = response.msg;

            if (msgType == "success") {
				
				if(isreCaptcha == 1){
					grecaptcha.reset();
				}
				
				resetForm("contact-form");
	
				var sent_message = '<div class="alert alert-success alert-dismissible fade show mt15" role="alert">'+msg+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
				$("#sent_message").html(sent_message);
            } else {
				var sent_message = '<div class="alert alert-danger alert-dismissible fade show mt15" role="alert">'+msg+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
				$("#sent_message").html(sent_message);
            }
			
			$('#submit_contact_form').html(before_btn);
		}
	});
}
