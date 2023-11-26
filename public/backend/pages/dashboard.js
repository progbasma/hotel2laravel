var $ = jQuery.noConflict();

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	onMonthlyChartReport();
});

function onMonthlyChartReport() {

    $.ajax({
		type : 'POST',
		url: base_url + '/backend/getMonthlyChartReport',
		success: function (response) {
			
			/*Monthly Earning Report (Last 12 Months)*/
			var MonthlyEarningDataArr = response.MonthlyEarningData;
			
			var MonthlyEarningCategoryList = MonthlyEarningDataArr['categorylist'];
			var MonthlyEarningDataList = MonthlyEarningDataArr['datalist'];
			const monthly_earning_report = document.getElementById('monthly_earning_report');
			
			var MonthlyEarningReport = new Chart(monthly_earning_report, {
				type: 'bar',
				data: {
				  labels: MonthlyEarningCategoryList,
				  datasets: [{
					label: TEXT['Earning'],
					data: MonthlyEarningDataList,
					borderWidth: 1,
					backgroundColor: "#1e9ff2",
					barThickness: 40,
					maxBarThickness: 40,
					minBarLength: 1,
				  }]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					scales: {
						y: {
							beginAtZero: true
						}
					},
					legend: {
						display: false
					},
					plugins: {
						legend: {
							display: false
						},
						tooltip: {
							callbacks: {
								label: function(context) {
									let label = context.dataset.label || '';

									if (label) {
										label += ': ';
									}
									
									if (context.parsed.y !== null) {
										let tVal = context.parsed.y;
										let fVal = tVal.toFixed(2);
										
										if (currency_position == 'left') {
											label += currency_icon + fVal;
										} else {
											label += fVal + currency_icon;
										}
									}
									
									return label;
								}
							}
						}
					}
				}
			});
			
			/*Monthly Booking Report (Last 12 Months)*/
			var MonthlyBookingDataArr = response.MonthlyBookingData;
			var MonthlyBookingCategoryList = MonthlyBookingDataArr['categorylist'];
			var MonthlyBookingDataList = MonthlyBookingDataArr['datalist'];
			const monthly_booking_report = document.getElementById('monthly_booking_report');
			var ProjectsPieChart = new Chart(monthly_booking_report, {
				type: "line",
				data: {
				labels: MonthlyBookingCategoryList,
				datasets: [{
						fill: false,
						lineTension: 0,
						data: MonthlyBookingDataList,
						label: TEXT['Total Booking'],
						backgroundColor: "#1e9ff2",
						pointBackgroundColor: "#1e9ff2", 
						borderColor: "#1e9ff2", 
						borderWidth: 2, 
						lineTension: 0.1 
					}]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							position: 'top',
						},
						title: {
							display: false,
							text: ''
						},
						legend: {
							display: false
						},
					}
				},
			});
		}
    });
}
