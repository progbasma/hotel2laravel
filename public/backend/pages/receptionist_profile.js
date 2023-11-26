var $ = jQuery.noConflict();

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	onLoadEditData();

	$("#submit-form").on("click", function () {
        $("#DataEntry_formId").submit();
    });

	$('.toggle-password').on('click', function() {
		$(this).toggleClass('fa-eye-slash');
			let input = $($(this).attr('toggle'));
		if (input.attr('type') == 'password') {
			input.attr('type', 'text');
		}else {
			input.attr('type', 'password');
		}
	});
	
    $("#load_image").on('change', function() {
		upload_form();
    });
	
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
                onConfirmWhenAddEdit();
                return false;
            }
        }
    }
});

function onConfirmWhenAddEdit() {

    $.ajax({
		type : 'POST',
		url: base_url + '/receptionist/profileUpdate',
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

function onLoadEditData() {
    $.ajax({
		type : 'POST',
		url: base_url + '/receptionist/getUserById',
		data: 'id='+userid,
		success: function (response) {
			
			var data = response;
			
			var passtype = $('#password').attr('type');
			if(passtype == 'text'){
				$(".toggle-password").removeClass("fa-eye-slash");
				$(".toggle-password").addClass("fa-eye");
				$('#password').attr('type', 'password');
			}
	
			$("#RecordId").val(data.id);
			$("#name").val(data.name);
			$("#email").val(data.email);
			$("#password").val(data.bactive);
			$("#phone").val(data.phone);
			$("#address").val(data.address);
			
 			if(data.photo != null){
				$("#photo_thumbnail").val(data.photo);
				$("#view_thumbnail_image").html('<img src="'+public_path+'/media/'+data.photo+'">');
				$("#remove_f_thumbnail").show();
			}else{
				$("#photo_thumbnail").val('');
				$("#view_thumbnail_image").html('');
				$("#remove_f_thumbnail").hide();
			}       
		}
    });
}

//upload Image
function upload_form() {

	var data = new FormData();
		data.append('FileName', $('#load_image')[0].files[0]);
		data.append('media_type', media_type);
	var ReaderObj = new FileReader();
	var imgname  =  $('#load_image').val();
	var size  =  $('#load_image')[0].files[0].size;

	var ext =  imgname.substr((imgname.lastIndexOf('.') +1));
	
	if(ext=='jpg' || ext=='JPG' || ext=='jpeg' || ext=='JPEG' || ext=='png' || ext=='PNG' || ext=='gif' || ext=='ico' || ext=='ICO' || ext=='svg' || ext=='SVG'){
		
		$.ajax({
			url: base_url + '/receptionist/MediaUpload',
			type: "POST",
			dataType : "json",
			data: data,
			contentType: false,
			processData:false,
			enctype: 'multipart/form-data',
			mimeType:"multipart/form-data",
			success: function(response){

				var dataList = response;
				var msgType = dataList.msgType;
				var msg = dataList.msg;
				var thumbnail = dataList.thumbnail;
				var id = dataList.id;
				
				if (msgType == "success") {
					
					$("#photo_thumbnail").val(thumbnail);
					$("#view_thumbnail_image").html('<img src="'+public_path+'/media/'+thumbnail+'">');

					$("#remove_f_thumbnail").show();
				} else {
					onErrorMsg(msg);
				}
			},
			error: function(){
				return false;
			}				
		});
		
	}else{
		onErrorMsg(TEXT['Sorry only you can upload jpg, png and gif file type']);
	}
}