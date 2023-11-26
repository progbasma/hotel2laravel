var $ = jQuery.noConflict();

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

});

function onHomepageVariations(variation_value, variation_type) {
	$(".home_variation").text(Activate);
	$(".home_variation").removeClass("active");
	
	$("#home_page_variation").val(variation_value);
	
	onSaveVariations(variation_type);
}

function onSaveVariations(variation_type) {
	
	var home_page_variation = $("#home_page_variation").val();

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/savePageVariation',
		data:{
			home_variation: home_page_variation
		},
		dataType: "json",
		success: function (response) {			
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				onSuccessMsg(msg);
				
				if(variation_type == 'home'){
					$("#home_variation_"+home_page_variation).text(Activated);
					$("#home_variation_"+home_page_variation).addClass("active");
				}
				
			} else {
				onErrorMsg(msg);
			}
		}
	});
}