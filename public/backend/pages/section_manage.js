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

	resetForm("DataEntry_formId");
	
	$("#submit-form").on("click", function () {
        $("#DataEntry_formId").submit();
    });

	$(document).on('click', '.tp_pagination .pagination a', function(event){
		event.preventDefault(); 
		var page = $(this).attr('href').split('page=')[1];
		onPaginationDataLoad(page);
	});
	
	$('input:checkbox').prop('checked',false);
	
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });

	$("#manage_type").chosen();
	$("#manage_type").trigger("chosen:updated");
	
	$("#section").chosen();
	$("#section").trigger("chosen:updated");
	
	$("#is_publish").chosen();
	$("#is_publish").trigger("chosen:updated");
	
	$("#media_select_file").on("click", function () {
		
		var large_image = $("#large_image").val();
		if(large_image !=''){
			$("#section_image").val(large_image);
			$("#view_section_image").html('<img src="'+public_path+'/media/'+large_image+'">');
		}
		
		$("#remove_section_image").show();
		$('#global_media_modal_view').modal('hide');
    });
	
	$("#manage_type_filter").val(0).trigger("chosen:updated");
	$("#manage_type_filter").on("change", function () {
		onRefreshData();
	});	
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {
	$.ajax({
		url:base_url + "/backend/getSectionManageTableData?page="+page+"&manage_type="+$('#manage_type_filter').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onRefreshData() {
	$.ajax({
		url:base_url + "/backend/getSectionManageTableData?search="+$("#search").val()+"&manage_type="+$('#manage_type_filter').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {
	$.ajax({
		url: base_url + "/backend/getSectionManageTableData?search="+$("#search").val()+"&manage_type="+$('#manage_type_filter').val(),
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
	
	$("#manage_type").trigger("chosen:updated");
	$("#section").trigger("chosen:updated");
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
	
	$("#remove_section_image").hide();
	$("#section_image").html('');
	
	var manage_type = $("#manage_type_filter").val();
	if(manage_type == 0){
		$("#manage_type").trigger("chosen:updated");
	}else{
		$("#manage_type").val(manage_type).trigger("chosen:updated");	
	}

	$("#section").trigger("chosen:updated");
	$("#is_publish").trigger("chosen:updated");
	
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();
}

function onEditPanel() {
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();	
}

function onMediaImageRemove(type) {
    $('#section_image').val('');
	$("#remove_section_image").hide();
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
		url: base_url + '/backend/saveSectionManageData',
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
		url: base_url + '/backend/getSectionManageById',
		data: 'id='+RecordId,
		success: function (response) {
			var data = response;
			$("#RecordId").val(data.id);
			$("#manage_type").val(data.manage_type).trigger("chosen:updated");
			$("#section").val(data.section).trigger("chosen:updated");
			$("#section_title").val(data.title);
			$("#sub_title").val(data.desc);
			
 			if(data.image != null){
				$("#section_image").val(data.image);
				$("#view_section_image").html('<img src="'+public_path+'/media/'+data.image+'">');
				$("#remove_section_image").show();
			}else{
				$("#section_image").val('');
				$("#view_section_image").html('');
				$("#remove_section_image").hide();
			}
			$("#is_publish").val(data.is_publish).trigger("chosen:updated");
			
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
		url: base_url + '/backend/deleteSectionManage',
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
		url: base_url + '/backend/bulkActionSectionManage',
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

