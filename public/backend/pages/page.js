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
	
	$("#page_title").on("blur", function () {
		if(RecordId ==''){
			onPageTitleSlug();
		}
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
	
	$("#language_code").val(0).trigger("chosen:updated");
	
	$('#language_code').change(function () {
		onRefreshData();
	});
	
	//Summernote
	$('#content').summernote({
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
	
	$("#on_thumbnail").on("click", function () {
		onGlobalMediaModalView();
    });
	
	$("#media_select_file").on("click", function () {

		var large_image = $("#large_image").val();
		
		if(large_image !=''){
			$("#subheader_thumbnail").val(large_image);
			$("#view_subheader_thumbnail").html('<img src="'+public_path+'/media/'+large_image+'">');
		}
		
		$("#remove_subheader_thumbnail").show();
		$('#global_media_modal_view').modal('hide');
    });	
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {

	$.ajax({
		url: base_url + "/backend/getPagePaginationData?page="+page
		+"&search="+$("#search").val()
		+"&language_code="+$('#language_code').val(),
		success:function(data){
			$('#page_datalist').html(data);
			onCheckAll();
		}
	});
}

function onRefreshData() {

	$.ajax({
		url: base_url + "/backend/getPagePaginationData?search="+$("#search").val()
		+"&language_code="+$('#language_code').val(),
		success:function(data){
			$('#page_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {
	$.ajax({
		url: base_url + "/backend/getPagePaginationData?search="+$("#search").val()
		+"&language_code="+$('#language_code').val(),
		success:function(data){
			$('#page_datalist').html(data);
			onCheckAll();
		}
	});
}

function resetForm(id) {
    $('#' + id).each(function () {
        this.reset();
    });
}

function onListPanel() {
	$('.parsley-error-list').hide();
    $('#list-panel, .btn-form').show();
    $('#form-panel, .btn-list').hide();
}

function onFormPanel() {
    resetForm("DataEntry_formId");
	RecordId = '';
	
	$("#remove_subheader_thumbnail").hide();
	$("#subheader_thumbnail").html('');
	
	$('#content').summernote('reset');
	$("#lan").trigger("chosen:updated");
	$("#is_publish").trigger("chosen:updated");
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();
}

function onEditPanel() {
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();	
}

function onMediaImageRemove(type) {

	$('#subheader_thumbnail').val('');
	$("#remove_subheader_thumbnail").hide();
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
		url: base_url + '/backend/savePageData',
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

//Page title Slug
function onPageTitleSlug() {
	var StrName = $("#page_title").val();
	var str_name = StrName.trim();
	var strLength = str_name.length;
	if(strLength>0){
		$.ajax({
			type : 'POST',
			url: base_url + '/backend/hasPageTitleSlug',
			data: 'slug='+StrName,
			success: function (response) {
				var slug = response.slug;
				$("#slug").val(slug);
			}
		});
	}
}

function onEdit(id) {
	RecordId = id;
	var msg = TEXT["Do you really want to edit this record"];
	onCustomModal(msg, "onLoadEditData");	
}

function onLoadEditData() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/getPageById',
		data: 'id='+RecordId,
		success: function (response) {
			var data = response;
			$("#RecordId").val(data.id);
			$("#page_title").val(data.title);
			$("#slug").val(data.slug);
			if(data.content != null){
				$('#content').summernote('code', data.content);
			}else{
				$('#content').summernote('code', '');
			}
			
 			if(data.thumbnail != null){
				$("#subheader_thumbnail").val(data.thumbnail);
				$("#view_subheader_thumbnail").html('<img src="'+public_path+'/media/'+data.thumbnail+'">');
				$("#remove_subheader_thumbnail").show();
			}else{
				$("#subheader_thumbnail").val('');
				$("#view_subheader_thumbnail").html('');
				$("#remove_subheader_thumbnail").hide();
			}
			
			$("#lan").val(data.lan).trigger("chosen:updated");
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
		url: base_url + '/backend/deletePage',
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
		url: base_url + '/backend/bulkActionPage',
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

