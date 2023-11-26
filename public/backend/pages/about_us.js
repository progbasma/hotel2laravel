var $ = jQuery.noConflict();
var RecordId = '';
var BulkAction = '';
var ids = [];
var image_type = '';

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	resetForm("DataEntry_formId");
	
	$("#submit-form").on("click", function () {
        $("#DataEntry_formId").submit();
    });

	$(document).on('click', '.tp_pagination nav ul.pagination a', function(event){
		event.preventDefault(); 
		var page = $(this).attr('href').split('page=')[1];
		onPaginationDataLoad(page);
	});
	
	$('input:checkbox').prop('checked',false);
	
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });

	$("#is_publish").chosen();
	$("#is_publish").trigger("chosen:updated");
	
	$("#on_about_image1").on("click", function () {
		image_type = 'about_image1';
		onGlobalMediaModalView();
    });
	
	$("#on_about_image2").on("click", function () {
		image_type = 'about_image2';
		onGlobalMediaModalView();
    });
	
	$("#on_about_image3").on("click", function () {
		image_type = 'about_image3';
		onGlobalMediaModalView();
    });

	$("#media_select_file").on("click", function () {
		
		var large_image = $("#large_image").val();

		if(image_type == 'about_image1'){
			
			if(large_image !=''){
				$("#about_image1").val(large_image);
				$("#view_about_image1").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_about_image1").show();

		} else if (image_type == 'about_image2') {
			if(large_image !=''){
				$("#about_image2").val(large_image);
				$("#view_about_image2").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_about_image2").show();
			
		} else if (image_type == 'about_image3') {
			if(large_image !=''){
				$("#about_image3").val(large_image);
				$("#view_about_image3").html('<img src="'+public_path+'/media/'+large_image+'">');
			}
			
			$("#remove_about_image3").show();
		}

		$('#global_media_modal_view').modal('hide');
    });
	
	$("#page_type_filter").val(0).trigger("chosen:updated");
	$("#page_type_filter").on("change", function () {
		onRefreshData();
	});	
	
	$("#page_type").chosen();
	$("#page_type").trigger("chosen:updated");
	
	$("#page_type").on("change", function () {
		var page_type = $("#page_type").val();
		if(page_type == 'home_1'){
			$(".rcapHideShow").show();
			$(".image2HideShow").show();
			$(".image3HideShow").show();
			$(".ynpHideShow").hide();
			$("#RecommendedText").text('Recommended image size width: 900px and height: 700px.');

		} else if (page_type == 'home_2') {
			$(".rcapHideShow").show();
			$(".image2HideShow").hide();
			$(".image3HideShow").hide();
			$(".ynpHideShow").hide();
			$("#RecommendedText").text('');

		} else if (page_type == 'home_3') {
			$(".rcapHideShow").show();
			$(".image2HideShow").hide();
			$(".image3HideShow").hide();
			$(".ynpHideShow").hide();
			$("#RecommendedText").text('');

		} else if (page_type == 'home_4') {
			$(".rcapHideShow").hide();
			$(".image2HideShow").show();
			$(".image3HideShow").hide();
			$(".ynpHideShow").show();
			$("#RecommendedText").text('Recommended image size width: 400px and height: 400px.');
		}
	});		
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {
	$.ajax({
		url:base_url + "/backend/getAboutUsTableData?page="+page+"&page_type="+$('#page_type_filter').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onRefreshData() {
	$.ajax({
		url:base_url + "/backend/getAboutUsTableData?search="+$("#search").val()+"&page_type="+$('#page_type_filter').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {
	$.ajax({
		url: base_url + "/backend/getAboutUsTableData?search="+$("#search").val()+"&page_type="+$('#page_type_filter').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function resetForm(id) {
    $('#' + id).each(function () {
        this.reset();
    });
	
	$("#page_type").trigger("chosen:updated");
	$("#is_publish").trigger("chosen:updated");
}

function onListPanel() {
	$('.parsley-error-list').hide();
    $('#list-panel, .btn-form').show();
    $('#form-panel, .btn-list').hide();
}

function onFormPanel() {
    resetForm("DataEntry_formId");
	RecordId = '';
	
	var page_type = $("#page_type_filter").val();
	if(page_type == 0){
		$("#page_type").trigger("chosen:updated");
	}else{
		$("#page_type").val(page_type).trigger("chosen:updated");	
	}

	if(page_type == 'home_1'){
		$(".rcapHideShow").show();
		$(".image2HideShow").show();
		$(".image3HideShow").show();
		$(".ynpHideShow").hide();
		$("#RecommendedText").text('Recommended image size width: 900px and height: 700px.');

	} else if (page_type == 'home_2') {
		$(".rcapHideShow").show();
		$(".image2HideShow").hide();
		$(".image3HideShow").hide();
		$(".ynpHideShow").hide();
		$("#RecommendedText").text('');

	} else if (page_type == 'home_3') {
		$(".rcapHideShow").show();
		$(".image2HideShow").hide();
		$(".image3HideShow").hide();
		$(".ynpHideShow").hide();
		$("#RecommendedText").text('');

	} else if (page_type == 'home_4') {
		$(".rcapHideShow").hide();
		$(".image2HideShow").show();
		$(".image3HideShow").hide();
		$(".ynpHideShow").show();
		$("#RecommendedText").text('Recommended image size width: 400px and height: 400px.');
	}	

	$("#remove_about_image1").hide();
	$('#about_image1').val('');
	$("#view_about_image1").html('');
	
	$("#remove_about_image2").hide();
	$('#about_image2').val('');
	$("#view_about_image2").html('');
	
	$("#remove_about_image3").hide();
	$('#about_image3').val('');
	$("#view_about_image3").html('');
	
	$("#is_publish").trigger("chosen:updated");
	
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();
}

function onEditPanel() {
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();
	
	var page_type = $("#page_type").val();

	if(page_type == 'home_1'){
		$(".rcapHideShow").show();
		$(".image2HideShow").show();
		$(".image3HideShow").show();
		$(".ynpHideShow").hide();
		$("#RecommendedText").text('Recommended image size width: 900px and height: 700px.');

	} else if (page_type == 'home_2') {
		$(".rcapHideShow").show();
		$(".image2HideShow").hide();
		$(".image3HideShow").hide();
		$(".ynpHideShow").hide();
		$("#RecommendedText").text('');

	} else if (page_type == 'home_3') {
		$(".rcapHideShow").show();
		$(".image2HideShow").hide();
		$(".image3HideShow").hide();
		$(".ynpHideShow").hide();
		$("#RecommendedText").text('');

	} else if (page_type == 'home_4') {
		$(".rcapHideShow").hide();
		$(".image2HideShow").show();
		$(".image3HideShow").hide();
		$(".ynpHideShow").show();
		$("#RecommendedText").text('Recommended image size width: 400px and height: 400px.');
	}	
}

function onMediaImageRemove(type) {

	if(type == 'about_image1'){
		$('#about_image1').val('');
		$("#remove_about_image1").hide();
		$("#view_about_image1").html('');
		
	} else if (type == 'about_image2') {
		$('#about_image2').val('');
		$("#remove_about_image2").hide();
		$("#view_about_image2").html('');
	
	} else if (type == 'about_image3') {
		$('#about_image3').val('');
		$("#remove_about_image3").hide();
		$("#view_about_image3").html('');
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
		url: base_url + '/backend/saveAboutUsData',
		data: $('#DataEntry_formId').serialize(),
		success: function (response) {			
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				resetForm("DataEntry_formId");
				onRefreshData();
				onSuccessMsg(msg);
				onListPanel();
			} else {
				onErrorMsg(msg);
			}
			
			onCheckAll();
		}
	});
}

function onEdit(id) {
	RecordId = id;
	var msg = TEXT["Do you really want to edit this record"];
	onCustomModal(msg, "onLoadEditData");	
}

function onLoadEditData() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/getAboutUsById',
		data: 'id='+RecordId,
		success: function (response) {
			var data = response;
			$("#RecordId").val(data.id);
			
			$("#page_type").val(data.page_type).trigger("chosen:updated");
			$("#is_publish").val(data.is_publish).trigger("chosen:updated");
			$("#about_title").val(data.title);
			$("#image_url").val(data.url);

 			if(data.image != null){
				$("#about_image1").val(data.image);
				$("#view_about_image1").html('<img src="'+public_path+'/media/'+data.image+'">');
				$("#remove_about_image1").show();
			}else{
				$("#about_image1").val('');
				$("#view_about_image1").html('');
				$("#remove_about_image1").hide();
			}
		
 			if(data.desc == null){
				$("#description").val('');
				
				$("#total_rooms").val('');
				$("#total_customers").val('');
				$("#total_amenities").val('');
				$("#total_packages").val('');
				$("#button_text").val('');
				$("#target").val('').trigger("chosen:updated");

				$("#about_image2").val('');
				$("#view_about_image2").html('');
				$("#remove_about_image2").hide();
				
				$("#about_image3").val('');
				$("#view_about_image3").html('');
				$("#remove_about_image3").hide();
				
				$("#year").val('');
				$("#tp_name").val('');
				$("#position").val('');
				
			}else{
				
				if(data.desc.description != null){
					$("#description").val(data.desc.description);
				}else{
					$("#description").val('');
				}
				
				if(data.desc.image2 != null){
					$("#about_image2").val(data.desc.image2);
					$("#view_about_image2").html('<img src="'+public_path+'/media/'+data.desc.image2+'">');
					$("#remove_about_image2").show();
				}else{
					$("#about_image2").val('');
					$("#view_about_image2").html('');
					$("#remove_about_image2").hide();
				}
				
				if(data.desc.image3 != null){
					$("#about_image3").val(data.desc.image3);
					$("#view_about_image3").html('<img src="'+public_path+'/media/'+data.desc.image3+'">');
					$("#remove_about_image3").show();
				}else{
					$("#about_image3").val('');
					$("#view_about_image3").html('');
					$("#remove_about_image3").hide();
				}			
			
				if(data.desc.total_rooms != null){
					$("#total_rooms").val(data.desc.total_rooms);
				}else{
					$("#total_rooms").val('');
				}

				if(data.desc.total_customers != null){
					$("#total_customers").val(data.desc.total_customers);
				}else{
					$("#total_customers").val('');
				}
				
				if(data.desc.total_amenities != null){
					$("#total_amenities").val(data.desc.total_amenities);
				}else{
					$("#total_amenities").val('');
				}
				
				if(data.desc.total_packages != null){
					$("#total_packages").val(data.desc.total_packages);
				}else{
					$("#total_packages").val('');
				}
				
				if(data.desc.button_text != null){
					$("#button_text").val(data.desc.button_text);
				}else{
					$("#button_text").val('');
				}
				
				if(data.desc.target != null){
					$("#target").val(data.desc.target).trigger("chosen:updated");
				}else{
					$("#target").val('').trigger("chosen:updated");
				}
				
				if(data.desc.year != null){
					$("#year").val(data.desc.year);
				}else{
					$("#year").val('');
				}
				if(data.desc.tp_name != null){
					$("#tp_name").val(data.desc.tp_name);
				}else{
					$("#tp_name").val('');
				}
				if(data.desc.position != null){
					$("#position").val(data.desc.position);
				}else{
					$("#position").val('');
				}
			}
		
			onEditPanel();
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
		url: base_url + '/backend/deleteAboutUs',
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
	
	if(BulkAction == 'publish'){
		var msg = TEXT["Do you really want to publish this records"];
	}else if(BulkAction == 'draft'){
		var msg = TEXT["Do you really want to draft this records"];
	}else if(BulkAction == 'delete'){
		var msg = TEXT["Do you really want to delete this records"];
	}
	
	onCustomModal(msg, "onConfirmBulkAction");	
}

function onConfirmBulkAction() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/bulkActionAboutUs',
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

