var $ = jQuery.noConflict();
var image_type = '';

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

	$("#room_name").on("blur", function () {
		onRoomSlug();
	});
	
	$("#on_f_thumbnail").on("click", function () {
		image_type = 'f_thumbnail';
		onGlobalMediaModalView();
    });
	
	$("#on_cover_img").on("click", function () {
		image_type = 'cover_img';
		onGlobalMediaModalView();
    });
	
	$("#media_select_file").on("click", function () {

		if(image_type == 'f_thumbnail'){
			
			var thumbnail = $("#thumbnail").val();
			
			if(thumbnail !=''){
				$("#f_thumbnail_thumbnail").val(thumbnail);
				$("#view_thumbnail_image").html('<img src="'+public_path+'/media/'+thumbnail+'">');
			}

			$("#remove_f_thumbnail").show();
			
		} else if (image_type == 'cover_img') {
			
			var large_image = $("#large_image").val();
			
			if(large_image !=''){
				$("#cover_img_thumbnail").val(large_image);
				$("#view_cover_img").html('<img src="'+public_path+'/media/'+large_image+'">');
			}

			$("#remove_cover_img").show();
		}

		$('#global_media_modal_view').modal('hide');
    });
	
	$("#cat_id").chosen();
	$("#cat_id").trigger("chosen:updated");

	$("#tax_id").chosen();
	$("#tax_id").trigger("chosen:updated");
	
	$("#is_featured").chosen();
	$("#is_featured").trigger("chosen:updated");
	
	$("#lan").chosen();
	$("#lan").trigger("chosen:updated");
	
	$("#is_publish").chosen();
	$("#is_publish").trigger("chosen:updated");
	
	$("#lan").on("change", function () {
		onCategoryList();
	});
	
	//Summernote
	$('#description').summernote({
		codeviewFilter: true,
		codeviewFilterRegex: /<\/*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|ilayer|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|t(?:itle|extarea)|xml)[^>]*?>/gi,
		codeviewIframeFilter: true,
		codeviewIframeWhitelistSrc: [],
		tabDisable: false,
		height: 300,
		toolbar: [
		  ['style', ['style']],
		  ['font', ['bold', 'italic', 'underline', 'clear']],
		  ['para', ['ul', 'ol', 'paragraph']],
		  ['table', ['table']],
		  ['insert', ['link', 'unlink']],
		  ['misc', ['undo', 'redo']],
		  // ['view', ['codeview', 'help']]
		]
	});	
});

function onMediaImageRemove(type) {

	if(type == 'f_thumbnail_thumbnail'){
		
		$('#f_thumbnail_thumbnail').val('');
		$("#remove_f_thumbnail").hide();
		
	}else if(type == 'cover_img_thumbnail'){
		$('#cover_img_thumbnail').val('');
		$("#remove_cover_img").hide();
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
		url: base_url + '/backend/updateRoomsData',
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

//Room Slug
function onRoomSlug() {
	var StrName = $("#room_name").val();
	var str_name = StrName.trim();
	var strLength = str_name.length;
	if(strLength>0){
		$.ajax({
			type : 'POST',
			url: base_url + '/backend/hasProductSlug',
			data: 'slug='+StrName,
			success: function (response) {
				var slug = response.slug;
				$("#slug").val(slug);
			}
		});
	}
}

function onCategoryList() {
	
	$.ajax({
		type : 'POST',
		url: base_url + '/backend/getCategoryList',
		data: 'lan='+$('#lan').val(),
		success: function (data) {
			var html = '<option value="" selected="selected">'+TEXT['Select Category']+'</option>';
			$.each(data, function (key, obj) {
				html += '<option value="' + obj.id + '">' + obj.name + '</option>';
			});
			
			$("#cat_id").html(html);
			$("#cat_id").chosen();
			$("#cat_id").trigger("chosen:updated");
		}
	});
}
