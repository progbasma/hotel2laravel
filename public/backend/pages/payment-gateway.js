var $ = jQuery.noConflict();
var RecordId = '';

$(function () {
	"use strict";
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});	

	$("#submit-form-stripe").on("click", function () {
        $("#stripe_formId").submit();
    });
	
	$("#submit-form-paypal").on("click", function () {
        $("#paypal_formId").submit();
    });
	
	$("#submit-form-razorpay").on("click", function () {
        $("#razorpay_formId").submit();
    });
	
	$("#submit-form-mollie").on("click", function () {
        $("#mollie_formId").submit();
    });
	
	$("#submit-form-cod").on("click", function () {
        $("#cod_formId").submit();
    });
	
	$("#submit-form-bank").on("click", function () {
        $("#bank_formId").submit();
    });
	
});

function onListPanel() {
	$('.parsley-error-list').hide();
	
    $('#list-panel').show();
    $('.btn-list').hide();
    $('#form-panel-'+RecordId).hide();
}

function onEditPanel() {
    $('#list-panel').hide();
    $('.btn-list').show();	
    $('#form-panel-'+RecordId).show();	
}

function showPerslyError() {
    $('.parsley-error-list').show();
}

function onEdit(id) {
	RecordId = id;
	var msg = TEXT["Do you really want to edit this record"];
	onCustomModal(msg, "onEditData");	
}

function onEditData() {
	onEditPanel();
}

jQuery('#stripe_formId').parsley({
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
                onConfirmWhenAddEditForStripe();
                return false;
            }
        }
    }
});

function onConfirmWhenAddEditForStripe() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/StripeSettingsUpdate',
		data: $('#stripe_formId').serialize(),
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

jQuery('#paypal_formId').parsley({
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
                onConfirmWhenAddEditForPaypal();
                return false;
            }
        }
    }
});

function onConfirmWhenAddEditForPaypal() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/PaypalSettingsUpdate',
		data: $('#paypal_formId').serialize(),
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

jQuery('#razorpay_formId').parsley({
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
                onConfirmWhenAddEditForRazorpay();
                return false;
            }
        }
    }
});

function onConfirmWhenAddEditForRazorpay() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/RazorpaySettingsUpdate',
		data: $('#razorpay_formId').serialize(),
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

jQuery('#mollie_formId').parsley({
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
                onConfirmWhenAddEditForMollie();
                return false;
            }
        }
    }
});

function onConfirmWhenAddEditForMollie() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/MollieSettingsUpdate',
		data: $('#mollie_formId').serialize(),
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

jQuery('#cod_formId').parsley({
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
                onConfirmWhenAddEditForCOD();
                return false;
            }
        }
    }
});

function onConfirmWhenAddEditForCOD() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/CODSettingsUpdate',
		data: $('#cod_formId').serialize(),
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

jQuery('#bank_formId').parsley({
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
                onConfirmWhenAddEditForBank();
                return false;
            }
        }
    }
});

function onConfirmWhenAddEditForBank() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/BankSettingsUpdate',
		data: $('#bank_formId').serialize(),
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


