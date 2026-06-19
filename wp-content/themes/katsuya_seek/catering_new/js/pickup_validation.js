// JavaScript Document
function pickupCheck() {
	'use strict';
	
	// 入力エラー文をリセット
	$("#error ul").empty();
	
	var status = 1; // Status 
	var counter = 0; // Set the counter
	var sushiPlatter = parseInt($('#sushiplatter').val());
	var rollPlatter = parseInt($('#rollplatter').val());
	var roll = 0;
	
	if(sushiPlatter) {
		var pq1 = 0;
		var pq2 = 0;
		var pq3 = 0;
		var pq4 = 0;
		var pq5 = 0;
		var pq6 = 0;
		var pq7 = 0;
		
		if($('#tuna-p-qty').val()!=='') {
			pq1 = parseInt($('#tuna-p-qty').val());
		}
		if($('#yellowtail-p-qty').val()!=='') {
			pq2 = parseInt($('#yellowtail-p-qty').val());
		}
		if($('#salmon-p-qty').val()!=='') {
			pq3 = parseInt($('#salmon-p-qty').val());
		}
		if($('#albacore-p-qty').val()!=='') {
			pq4 = parseInt($('#albacore-p-qty').val());
		}
		if($('#shrimp-p-qty').val()!=='') {
			pq5 = parseInt($('#shrimp-p-qty').val());
		}
		if($('#eel-p-qty').val()!=='') {
			pq6 = parseInt($('#eel-p-qty').val());
		}
		if($('#whitefish-p-qty').val()!=='') {
			pq7 = parseInt($('#whitefish-p-qty').val());
		}
		
		var totalSushi = pq1 + pq2 + pq3 + pq4 + pq5 + pq6 + pq7;
		if(totalSushi !== 5) {
			$("#error ul").append("<li><a href='#tuna-p-qty'>* Please choose total 5 types for the sushi platter.</a></li>");
			status = -1;
			console.log(totalSushi);
		}
	}
	// Roll Platter Validation
	if(rollPlatter) {
		var rq1 = 0;
		var rq2 = 0;
		var rq3 = 0;
		var rq4 = 0;
		var rq5 = 0;
		var rq6 = 0;
		var rq7 = 0;
		
		if($('#spicyt-p-qty').val()!=='') {
			rq1 = parseInt($('#spicyt-p-qty').val());
		}
		if($('#cali-p-qty').val()!=='') {
			rq2 = parseInt($('#cali-p-qty').val());
		}
		if($('#ysca-p-qty').val()!=='') {
			rq3 = parseInt($('#ysca-p-qty').val());
		}
		if($('#avo-p-qty').val()!=='') {
			rq4 = parseInt($('#avo-p-qty').val());
		}
		if($('#creamys-p-qty').val()!=='') {
			rq5 = parseInt($('#creamys-p-qty').val());
		}
		if($('#crab-p-qty').val()!=='') {
			rq6 = parseInt($('#crab-p-qty').val());
		}
		
		var totalRoll = rq1 + rq2 + rq3 + rq4 + rq5 + rq6;
		if(totalRoll !== 4) {
			$("#error ul").append("<li><a href='#spicyt-p-qty'>* Please choose total 4 types for the roll platter.</a></li>");
			status = -1;
		}
	}
	// Name 
	if($('#c-f-name').val()=='') {
		$("#error ul").append("<li><a href='#c-f-name'>* Please enter a customer name.</a></li>");
		status = -1
	}
	
	// Phone
	if($('#c-f-cell').val()=='') {
		$("#error ul").append("<li><a href='#c-f-phone'>* Please enter a phone number.</a></li>");
		status = -1
	} 
	
	// Email
	if($('#c-f-email').val()=='') {
		$("#error ul").append("<li><a href='#c-f-email'>* Please enter an email address.</a></li>");
		status = -1
	} 
	// Phone validation
	if(document.getElementById('phone').value.search(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/) === -1) {
		$("ul#errors").append("<li>* Please provide a valid phone number.</li>");
		status = -1;
	} 
	
	// Email validation
	if(document.getElementById('email').value.search(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) === -1) {
		$("ul#errors").append("<li>* Please provide a valid email address</li>");
		status = -1;
	} 
	
	// If the status is false, return -1
	if(status === -1) {
		$("#error").removeClass("d-none");
		$('#error ul a').eq(0).focus();
		return false;
	} else {
		return true;
	}
}