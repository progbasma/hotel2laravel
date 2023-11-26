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
	
	$("#on_slider_image").on("click", function () {
		image_type = 'slider_image';
		onGlobalMediaModalView();
    });

	$("#media_select_file").on("click", function () {
		
		var large_image = $("#large_image").val();

		if(large_image !=''){
			$("#slider_image").val(large_image);
			$("#view_slider_image").html('<img src="'+public_path+'/media/'+large_image+'">');
		}
		
		$("#remove_slider_image").show();
		$('#global_media_modal_view').modal('hide');
    });
	
	$("#slider_type_filter").val(0).trigger("chosen:updated");
	$("#slider_type_filter").on("change", function () {
		onRefreshData();
	});	
	
	$("#slider_type").chosen();
	$("#slider_type").trigger("chosen:updated");
	
	$("#slider_type").on("change", function () {
		var slider_type = $("#slider_type").val();
	});		
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {
	$.ajax({
		url:base_url + "/backend/getSliderTableData?page="+page+"&slider_type="+$('#slider_type_filter').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onRefreshData() {
	$.ajax({
		url:base_url + "/backend/getSliderTableData?search="+$("#search").val()+"&slider_type="+$('#slider_type_filter').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {
	$.ajax({
		url: base_url + "/backend/getSliderTableData?search="+$("#search").val()+"&slider_type="+$('#slider_type_filter').val(),
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
	
	$("#slider_type").trigger("chosen:updated");
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
	
	var slider_type = $("#slider_type_filter").val();
	if(slider_type == 0){
		$("#slider_type").trigger("chosen:updated");
	}else{
		$("#slider_type").val(slider_type).trigger("chosen:updated");	
	}

	$("#remove_slider_image").hide();
	$("#slider_image").html('');
	
	$("#is_publish").trigger("chosen:updated");
	
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();
}

function onEditPanel() {
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();	
}

function onMediaImageRemove(type) {
	$('#slider_image').val('');
	$("#remove_slider_image").hide();
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
		url: base_url + '/backend/saveSliderData',
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
		url: base_url + '/backend/getSliderById',
		data: 'id='+RecordId,
		success: function (response) {
			var data = response;
			$("#RecordId").val(data.id);
			
			$("#slider_type").val(data.slider_type).trigger("chosen:updated");
			$("#is_publish").val(data.is_publish).trigger("chosen:updated");
			$("#slider_title").val(data.title);
			$("#image_url").val(data.url);
			
 			if(data.desc == null){
				$("#sub_title").val('');
			}else{
				$("#sub_title").val(data.desc.sub_title);
			}
			
 			if(data.image != null){
				$("#slider_image").val(data.image);
				$("#view_slider_image").html('<img src="'+public_path+'/media/'+data.image+'">');
				$("#remove_slider_image").show();
			}else{
				$("#slider_image").val('');
				$("#view_slider_image").html('');
				$("#remove_slider_image").hide();
			}
		
 			if(data.desc == null){

				$("#button_text").val('');
				$("#target").val('').trigger("chosen:updated");
				
			}else{

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
		url: base_url + '/backend/deleteSlider',
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
		url: base_url + '/backend/bulkActionSlider',
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

