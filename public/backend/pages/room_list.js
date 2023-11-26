var $ = jQuery.noConflict();

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).on('click', '.RoomList nav ul.pagination a', function(event){
		event.preventDefault(); 
		var page = $(this).attr('href').split('page=')[1];
		onPaginationDataLoad(page);
	});
	
	$("#roomtype_id").val(0).trigger("chosen:updated");
	$("#roomtype_id").on("change", function () {
		onRefreshData();
	});
});

function onPaginationDataLoad(page) {
	$.ajax({
		url:base_url + "/backend/getRoomsListTableData?page="+page
		+"&search="+$("#search").val()
		+"&roomtype_id="+$('#roomtype_id').val(),
		success:function(data){
			$('#tp_datalist').html(data);
		}
	});
}

function onRefreshData() {
	$.ajax({
		url:base_url + "/backend/getRoomsListTableData?search="+$("#search").val()
		+"&roomtype_id="+$('#roomtype_id').val(),
		success:function(data){
			$('#tp_datalist').html(data);
		}
	});
}

function onSearch() {
	$.ajax({
		url: base_url + "/backend/getRoomsListTableData?search="+$("#search").val()
		+"&roomtype_id="+$('#roomtype_id').val(),
		success:function(data){
			$('#tp_datalist').html(data);
		}
	});
}


