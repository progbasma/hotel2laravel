var $ = jQuery.noConflict();
var payment_method = 1;
var total_amount = 0;

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
    $("#new_account").on("click", function () {
		if($(this).is(":checked")){
			$("#new_account_pass").removeClass("hideclass");
			$("#password").attr("required", "");
			$("#password_confirmation").attr("required", "");
		}else if($(this).is(":not(:checked)")){
			$("#new_account_pass").addClass("hideclass");
			$("#password").removeAttr("required");
			$("#password_confirmation").removeAttr("required");
		}
    });
	
    $("#payment_method_stripe").on("click", function () {
		$("#pay_paypal").addClass("hideclass");
		$("#pay_razorpay").addClass("hideclass");
		$("#pay_mollie").addClass("hideclass");
		$("#pay_cod").addClass("hideclass");
		$("#pay_bank").addClass("hideclass");
		$("#pay_stripe").removeClass("hideclass");
    });
	
    $("#payment_method_paypal").on("click", function () {
		$("#pay_stripe").addClass("hideclass");
		$("#pay_razorpay").addClass("hideclass");
		$("#pay_mollie").addClass("hideclass");
		$("#pay_cod").addClass("hideclass");
		$("#pay_bank").addClass("hideclass");
		$("#pay_paypal").removeClass("hideclass");
    });
	
    $("#payment_method_razorpay").on("click", function () {
		$("#pay_stripe").addClass("hideclass");
		$("#pay_paypal").addClass("hideclass");
		$("#pay_mollie").addClass("hideclass");
		$("#pay_cod").addClass("hideclass");
		$("#pay_bank").addClass("hideclass");
		$("#pay_razorpay").removeClass("hideclass");
    });
	
    $("#payment_method_mollie").on("click", function () {
		$("#pay_stripe").addClass("hideclass");
		$("#pay_paypal").addClass("hideclass");
		$("#pay_razorpay").addClass("hideclass");
		$("#pay_cod").addClass("hideclass");
		$("#pay_bank").addClass("hideclass");
		$("#pay_mollie").removeClass("hideclass");
    });
	
    $("#payment_method_cod").on("click", function () {
		$("#pay_stripe").addClass("hideclass");
		$("#pay_paypal").addClass("hideclass");
		$("#pay_razorpay").addClass("hideclass");
		$("#pay_mollie").addClass("hideclass");
		$("#pay_bank").addClass("hideclass");
		$("#pay_cod").removeClass("hideclass");
    });
	
    $("#payment_method_bank").on("click", function () {
		$("#pay_stripe").addClass("hideclass");
		$("#pay_paypal").addClass("hideclass");
		$("#pay_razorpay").addClass("hideclass");
		$("#pay_mollie").addClass("hideclass");
		$("#pay_cod").addClass("hideclass");
		$("#pay_bank").removeClass("hideclass");
    });

	$("#checkout_submit_form").on("click", function () {
		payment_method = $('input[name="payment_method"]:checked').val();
        $("#checkout_formid").submit();
    });
	
	$("#checkin_date").datetimepicker({
		format: 'yyyy-mm-dd',
		startDate: new Date(),
		autoclose: true,
		todayBtn: false,
		minView: 2
	});

	$("#checkout_date").datetimepicker({
		format: 'yyyy-mm-dd',
		startDate: new Date(),
		autoclose: true,
		todayBtn: false,
		minView: 2
	});
	
	$("#checkin_date").on("change", function () {
		onCheckOutTotalPrice();
	});
	
	$("#checkout_date").on("change", function () {
		onCheckOutTotalPrice();
	});
	
	$("#room").on("blur", function () {
		onCheckOutTotalPrice();
	});
});

function showPerslyError() {
    $('.parsley-error-list').show();
}

jQuery('#checkout_formid').parsley({
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
				if(payment_method == 5){
					onPaymentByRazorpay();
				}else{
					onConfirmMakeOrder();
				}
				
                return false;
            }
        }
    }
});

function onPaymentByRazorpay() {

	var amount = parseFloat(total_amount);
	var razorpayAmount = amount.toFixed(2) * 100;

	var	options = {
			"key": razorpay_key_id,
			"amount": razorpayAmount,
			"currency": razorpay_currency,
			"name": site_name, //merchant user name
			"handler": function(response) {
				var razorpay_payment_id = response.razorpay_payment_id;
				$("#razorpay_payment_id").val(razorpay_payment_id);
				if(razorpay_payment_id != ''){
					onConfirmMakeOrder();
				}
			},
			"prefill": {
				"name": $("#name").val(), //user name
				"email": $("#email").val(), //user email
			},
			"theme": {
				"color": theme_color,
			},
			"modal": {
				"ondismiss": function(e) {}
			}
		};
	var rzp1 = new Razorpay(options);
	rzp1.open();		
}

function onConfirmMakeOrder() {

	var payment_method = $('input[name="payment_method"]:checked').val();

 	if(payment_method == 3){
		if(isenable_stripe == 1){
			if(validCardNumer == 0){
				$("span.payment_method_error").text(TEXT['Please type valid card number']);
				return;
			}
		}
	}else{
		$("span.payment_method_error").text('');
	}
	
	var checkout_btn = $('.checkout_btn').html();
	
    $.ajax({
		type : 'POST',
		url: base_url + '/frontend/send_booking_request',
		data: $('#checkout_formid').serialize(),
		beforeSend: function() {
			$('.checkout_btn').html('<span class="spinner-border spinner-border-sm"></span> Please Wait...');
		},
		success: function (response) {		
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				$("#checkout_formid").find('span.error-text').text('');

				//Stripe
				if(payment_method == 3){
					if(isenable_stripe == 1){
						if(response.intent != ''){
							onConfirmPayment(response.intent, msg);
						}
					}
				
				//Paypal
				}else if(payment_method == 4){
					if(response.intent != ''){
						window.location.href = response.intent;
					}
				
				//Mollie
				}else if(payment_method == 6){
					if(response.intent != ''){
						window.location.href = response.intent;
					}
				}else{
					//onSuccessMsg(msg);
					window.location.href = base_url + '/thank';
				}

			} else {
				$.each(msg, function(prefix, val){
					if(prefix == 'oneError'){
						onErrorMsg(val[0]);
					}else{
						$('span.'+prefix+'_error').text(val[0]);
					}
				});
			}
			
			$('.checkout_btn').html(checkout_btn);
		}
	});
}

function onCheckOutTotalPrice() {
	var checkin = $("#checkin_date").val();
	var checkout = $("#checkout_date").val();
	var room = $("#room").val();
	var roomtypeid = $("#roomtype_id").val();
	
	if((checkin == '') || (checkout == '') || (room == '')) {
		return;
	}

	if(parseInt(room) > parseInt(maxRoom)){
		onErrorMsg('This value should be lower than or equal to '+ maxRoom);
		return;
	}
	
    $.ajax({
		type : 'POST',
		url: base_url + '/frontend/getCheckOutTotalPrice',
		data:{checkin_date:checkin, checkout_date:checkout, total_room:room, roomtype_id:roomtypeid },
		success: function (response) {
			var data = response;
			$("#TotalPrice").html(data.total_table);
			total_amount = data.total_amount;
		}
	});
}