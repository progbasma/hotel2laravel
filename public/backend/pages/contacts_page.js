var $ = jQuery.noConflict();
var RecordId = '';
var BulkAction = '';
var ids = [];
var fieldsArray = [];
var addEdit = '';
var ArrayIndex = '';

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
	
	$("#ViewByPostStatus").val(0);
	
	$("#language_code").val(0).trigger("chosen:updated");
	
	$('#language_code').change(function () {
		onRefreshData();
	});
	
	$("#field_type").on("change", function(){
		var field_type = $('#field_type').val();
		if(field_type == 'dropdown'){
			$("#dropdown_values_id").show();
		}else{
			$("#dropdown_values_id").hide();
		}
	});
	
	$("#mailSubjectHideShow").hide();
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {

	$.ajax({
		url: base_url + "/backend/getContactPaginationData?page="+page
		+"&post_status="+$("#ViewByPostStatus").val()
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
		url: base_url + "/backend/getContactPaginationData?post_status="+$("#ViewByPostStatus").val()
		+"&search="+$("#search").val()
		+"&language_code="+$('#language_code').val(),
		success:function(data){
			$('#page_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {
	$.ajax({
		url: base_url + "/backend/getContactPaginationData?search="+$("#search").val()
		+"&post_status="+$("#ViewByPostStatus").val()
		+"&language_code="+$('#language_code').val(),
		success:function(data){
			$('#page_datalist').html(data);
			onCheckAll();
		}
	});
}

function onDataViewByStatus(post_status) {
	$("#ViewByPostStatus").val(post_status);
	
	$(".viewstatus").removeClass('active')
	$("#viewstatus_"+post_status).addClass('active');
	
	$.ajax({
		url: base_url + "/backend/getContactPaginationData?post_status="+post_status
		+"&search="+$("#search").val()
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

	fieldsArray = [];
	onLoadFormElements(fieldsArray);
	
	$("#mailSubjectHideShow").hide();
	
	$("#lan").trigger("chosen:updated");
	$("#is_publish").trigger("chosen:updated");
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();
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

	var contact_form = JSON.stringify(fieldsArray);

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/saveContactData',
		data: $('#DataEntry_formId').serialize()+'&contact_form='+contact_form,
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
		url: base_url + '/backend/getContactById',
		data: 'id='+RecordId,
		success: function (response) {
			var data = response;
			$("#RecordId").val(data.id);
			$("#title").val(data.title);
			
			var info = data.contact_info;
			if(info == null){
				$("#email").val('');
				$("#phone").val('');
				$("#address").val('');
				$("#short_desc").val('');
			}else{
				$("#email").val(info.email);
				$("#phone").val(info.phone);
				$("#address").val(info.address);
				$("#short_desc").val(info.short_desc);
			}
			
			var contact_form = data.contact_form;
			fieldsArray = [];
			if(contact_form != null){
				
				$.each(contact_form, function (key, obj) {
					var fieldsObj = {
						label: obj.label,
						is_label: obj.is_label,
						type: obj.type,
						name: obj.name,
						placeholder: obj.placeholder,
						mandatory: obj.mandatory,
						dropdown_values: obj.dropdown_values
					}
					fieldsArray.push(fieldsObj);
				});
			}
			
			onLoadFormElements(fieldsArray);
			
			var contact_map = data.contact_map;
			if(contact_map == null){
				$("#latitude").val('');
				$("#longitude").val('');
				$("#zoom").val('');
				$("#is_google_map").prop("checked", false);
			}else{
				$("#latitude").val(contact_map.latitude);
				$("#longitude").val(contact_map.longitude);
				$("#zoom").val(contact_map.zoom);
				
				if(contact_map.is_google_map == 1){
					$("#is_google_map").prop("checked", true);
				}else{
					$("#is_google_map").prop("checked", false);
				}
			}
			
			if(data.is_recaptcha == 1){
				$("#is_recaptcha").prop("checked", true);
			}else{
				$("#is_recaptcha").prop("checked", false);
			}
			
			$("#mail_subject").val(data.mail_subject).trigger("chosen:updated");
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
		url: base_url + '/backend/deleteContact',
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
		url: base_url + '/backend/bulkActionContact',
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

function onAddField() {
	var field_type = $('#field_type').val();
	if(field_type == 'dropdown'){
		$("#dropdown_values_id").show();
	}else{
		$("#dropdown_values_id").hide();
	}
	
	$('#field_label').val('');
	$('#field_name').val('');
	$('#field_placeholder').val('');
	$('#dropdown_values').val('');
	
	$('#element_forms_modal').modal('show');
}

function onSaveChanges() {
	var field_label = $('#field_label').val();
	var is_label = $('#is_label').val();
	var field_type = $('#field_type').val();
	var field_name = $('#field_name').val();
	var field_placeholder = $('#field_placeholder').val();
	var field_mandatory = $('#field_mandatory').val();
	var dropdown_values = $('#dropdown_values').val();
	
	if((field_label == '') || (field_name == '')){
		onErrorMsg(TEXT['Please fill up all mandatory fields']);
		return;
	}
	
	var fieldsObj = {
		label: field_label,
		is_label: is_label,
		type: field_type,
		name: field_name,
		placeholder: field_placeholder,
		mandatory: field_mandatory,
		dropdown_values: dropdown_values
	}
	
	//Edit time
	if(addEdit == 'edit'){
		$.each(fieldsArray, function (key, obj) {
			if (key == ArrayIndex) {
				fieldsArray[ArrayIndex] = fieldsObj;
			}
		});
	}else{
		fieldsArray.push(fieldsObj);
	}

	onLoadFormElements(fieldsArray);
	
	$('#element_forms_modal').modal('hide');
}

//On Load Form Elements
function onLoadFormElements(fieldsArray) {
	var contact_form = fieldsArray;
	var FormElement = '';
	var mail_subject = '';
	
	$.each(contact_form, function (key, obj) {

		FormElement +='<div id="fieldid_'+key+'" class="row">'
					+'<div class="col-lg-12">'
						+'<div class="form-builder">'
							+'<div class="tp-elements">'
								+'<div class="tp-element-header">'
									+'<ul class="tp-element-tools">'
										+'<li><a onclick="onEditFormElementData('+key+')" href="javascript:void(0);"><i class="fa fa-edit"></i></a></li>'
										+'<li><a onclick="onDeleteFormElement('+key+')" href="javascript:void(0);"><i class="fa fa-remove"></i></a></li>'
									+'</ul>'
								+'</div>'
								+'<div class="tp-element-body">'
									+'<i class="fa fa-file-text-o"></i>'+obj.type+' - '+obj.label
								+'</div>'
							+'</div>'
						+'</div>'
					+'</div>'
				+'</div>';
		
		var UppertoLower = obj.name;
		var sub_name = UppertoLower.toLowerCase();
		
		mail_subject += '<option value="' + sub_name + '">' + obj.label + '</option>';
		
	});
	
	addEdit = '';
	ArrayIndex = '';
	
	$("#FormElementId").html(FormElement);
	
	$("#mail_subject").html(mail_subject);
	$("#mail_subject").chosen();
	$("#mail_subject").trigger("chosen:updated");
	
	var ArrayCount = contact_form.length;
	
	if(ArrayCount > 0){
		$("#mailSubjectHideShow").show();
	}else{
		$("#mailSubjectHideShow").hide();
	}
}

function onEditFormElementData(field_id) {
	
	var contact_form = fieldsArray;
	
	$.each(contact_form, function (key, obj){
		if(field_id == key){
			$('#field_label').val(obj.label);
			$('#is_label').val(obj.is_label).trigger("chosen:updated");
			$('#field_type').val(obj.type).trigger("chosen:updated");
			$('#field_name').val(obj.name);
			$('#field_placeholder').val(obj.placeholder);
			$('#field_mandatory').val(obj.mandatory).trigger("chosen:updated");
			$('#dropdown_values').val(obj.dropdown_values);
			
			if(obj.type == 'dropdown'){
				$("#dropdown_values_id").show();
			}else{
				$("#dropdown_values_id").hide();
			}
			
			addEdit = 'edit';
			ArrayIndex = field_id;
		}
	});
	
	$('#element_forms_modal').modal('show');
}

function onDeleteFormElement(field_id) {
	$("#fieldid_"+field_id).remove();
	
	var contact_form = fieldsArray;
	 fieldsArray = [];
	$.each(contact_form, function (key, obj){
		if(field_id != key){
			var fieldsObj = {
				label: obj.label,
				is_label: obj.is_label,
				type: obj.type,
				name: obj.name,
				placeholder: obj.placeholder,
				mandatory: obj.mandatory,
				dropdown_values: obj.dropdown_values
			}
			fieldsArray.push(fieldsObj);
		}
	});
}
