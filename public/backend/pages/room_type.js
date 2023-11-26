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

	$(document).on('click', '.pagination a', function(event){
		event.preventDefault(); 
		var page = $(this).attr('href').split('page=')[1];
		onPaginationDataLoad(page);
	});
	
	$('input:checkbox').prop('checked',false);
	
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });

	$("#title").on("blur", function () {
		if(RecordId ==''){
			onRoomSlug();
		}
	});

	$("#language_code").val(0).trigger("chosen:updated");
	$("#language_code").on("change", function () {
		onCategoryList();
		onRefreshData();
	});
	
	$("#category_id").val(0).trigger("chosen:updated");
	$("#category_id").on("change", function () {
		onRefreshData();
	});
	
	$("#lan").chosen();
	$("#lan").trigger("chosen:updated");
	$("#lan").on("change", function () {
		onCategoryListForform();
	});
	
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {

	$.ajax({
		url:base_url + "/backend/getRoomTypeTableData?page="+page
		+"&search="+$("#search").val()
		+"&language_code="+$('#language_code').val()
		+"&category_id="+$('#category_id').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onRefreshData() {

	$.ajax({
		url:base_url + "/backend/getRoomTypeTableData?search="+$("#search").val()
		+"&language_code="+$('#language_code').val()
		+"&category_id="+$('#category_id').val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {

	$.ajax({
		url: base_url + "/backend/getRoomTypeTableData?search="+$("#search").val()
		+"&language_code="+$('#language_code').val()
		+"&category_id="+$('#category_id').val(),
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
	
	$("#lan").trigger("chosen:updated");
}

function onListPanel() {
	$('.parsley-error-list').hide();
    $('#list-panel, .btn-form').show();
    $('#form-panel, .btn-list').hide();
}

function onFormPanel() {
    resetForm("DataEntry_formId");
	RecordId = '';

	$("#lan").trigger("chosen:updated");
	
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();
	
	onCategoryListForform();
}

function onEditPanel() {
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();	
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
		url: base_url + '/backend/saveRoomTypeData',
		data: $('#DataEntry_formId').serialize(),
		success: function (response) {			
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				resetForm("DataEntry_formId");
				onRefreshData();
				onSuccessMsg(msg);
				var id = response.id;
				window.location.href= base_url + '/backend/room/'+id;
			} else {
				onErrorMsg(msg);
			}
			
			onCheckAll();
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
		url: base_url + '/backend/deleteRoomType',
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
		url: base_url + '/backend/bulkActionRoomType',
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

//Room Slug
function onRoomSlug() {
	var StrName = $("#title").val();
	var str_name = StrName.trim();
	var strLength = str_name.length;
	if(strLength>0){
		$.ajax({
			type : 'POST',
			url: base_url + '/backend/hasRoomSlug',
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
		data: 'lan='+$('#language_code').val(),
		success: function (data) {
			var html = '<option value="0" selected="selected">'+TEXT['All Category']+'</option>';
			$.each(data, function (key, obj) {
				html += '<option value="' + obj.id + '">' + obj.name + '</option>';
			});
			
			$("#category_id").html(html);
			$("#category_id").chosen();
			$("#category_id").trigger("chosen:updated");
		}
	});
}

function onCategoryListForform() {
	
	$.ajax({
		type : 'POST',
		url: base_url + '/backend/getCategoryList',
		data: 'lan='+$('#lan').val(),
		success: function (data) {
			var html = '';
			$.each(data, function (key, obj) {
				html += '<option value="' + obj.id + '">' + obj.name + '</option>';
			});
			
			$("#categoryid").html(html);
			$("#categoryid").chosen();
			$("#categoryid").trigger("chosen:updated");
		}
	});
}
