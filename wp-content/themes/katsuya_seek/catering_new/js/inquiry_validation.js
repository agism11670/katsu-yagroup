// JavaScript Document
function inquiryCheck() {
	'use strict';
	
	// 入力エラー文をリセット
  $("#error ul").empty();
	
	var status = 1; // Status 
	var counter = 0; // Set the counter
	
	// Name 
	if($('#c-f-name').val()=='') {
		$("#error ul").append("<li><a href='#c-f-name'>* Please enter a customer name.</a></li>");
		counter++;
		status = -1
	}
	
	// Phone
	if($('#c-f-phone').val()=='') {
		$("#error ul").append("<li><a href='#c-f-phone'>* Please enter a phone number.</a></li>");
		counter++;
		status = -1
	} 
	
	// Email
	if($('#c-f-email').val()=='') {
		$("#error ul").append("<li><a href='#c-f-email'>* Please enter an email address.</a></li>");
		counter++;
		status = -1
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