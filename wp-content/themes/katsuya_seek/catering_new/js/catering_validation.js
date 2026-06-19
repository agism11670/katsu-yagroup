// JavaScript Document
function cateringchefCheck() {
	'use strict';
	
	// エラー文をリセット（IDを統一：#error の中の ul）
	var $errorBox = $('#error');
	var $errorUl  = $('#error ul');
	$errorUl.empty();
	var status = 1;
	
	// 値を正規化
	var name  = $.trim($('#c-f-name').val());
	var phone = $.trim($('#c-f-phone').val());
	var phone2 = $.trim($('#c-f-cell').val());
	var email = $.trim($('#c-f-email').val());
	
	// 追加用ヘルパー（リンクは入力欄へ）
	function addError(targetId, msg) {
		$errorUl.append('<li><a href="#' + targetId + '">' + msg + '</a></li>');
		status = -1;
	}
	// Name（必須）
	if (!name) {
		addError('c-f-name', '* Customer Name is required. Please enter your full name.');
	}
	// Phone（必須）
	if (!phone) {
		addError('c-f-phone', '* Phone Number is required. Please enter a phone number with at least 9 digits. You may use numbers, spaces, hyphens, parentheses, periods, or a plus sign (e.g., (123) 456-7890 or 123-456-7890).');
	} else {
		// Phone validation：英字混入NG + 許可文字以外NG + 桁数ざっくりチェック
		if (/[a-zA-Z]/.test(phone)) {
			addError('c-f-phone', '* Phone Number cannot contain letters. Please enter only numbers, spaces, hyphens, parentheses, periods, or a plus sign (e.g., (123) 456-7890 or 123-456-7890).');
		} else if (!/^[0-9+\-()\s.]+$/.test(phone)) {
			addError('c-f-phone', '* Phone Number contains invalid characters. Please use only numbers, spaces, hyphens, parentheses, periods, or a plus sign (e.g., (123) 456-7890 or 123-456-7890).');
		} else if (phone.replace(/\D/g, '').length < 9) {
			addError('c-f-phone', '* Phone Number must contain at least 9 digits. Please enter a complete phone number (e.g., (123) 456-7890 or 123-456-7890).');
		}
	}
	// Phone（バリデーションだけ）
	if(phone2) {
		if (/[a-zA-Z]/.test(phone2)) {
			addError('c-f-cell', '* Cell Phone Number cannot contain letters. Please enter only numbers, spaces, hyphens, parentheses, periods, or a plus sign (e.g., (123) 456-7890 or 123-456-7890).');
		} else if (!/^[0-9+\-()\s.]+$/.test(phone2)) {
			addError('c-f-cell', '* Cell Phone Number contains invalid characters. Please use only numbers, spaces, hyphens, parentheses, periods, or a plus sign (e.g., (123) 456-7890 or 123-456-7890).');
		} else if (phone2.replace(/\D/g, '').length < 9) {
			addError('c-f-cell', '* Cell Phone Number must contain at least 9 digits. Please enter a complete phone number (e.g., (123) 456-7890 or 123-456-7890).');
		}
	}
	
	// Email（必須）
	if (!email) {
		addError('c-f-email', '* Email Address is required. Please enter a valid email address in the format: name@example.com');
	} else {
		// Email validation
		var emailRe = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (!emailRe.test(email)) {
			addError('c-f-email', '* Please enter a valid email address in the format: name@example.com. The email must contain an @ symbol and a valid domain name.');
		}
	}
	// エラーがあれば表示＆先頭へフォーカス
	if (status === -1) {
		$errorBox.removeClass('d-none');
		// 先頭エラーリンクにフォーカス（必要ならエラー枠へも可）
		var $firstLink = $errorUl.find('a').first();
		if ($firstLink.length) $firstLink.focus();
		return false;
	}
	// OKなら非表示に戻す（任意）
	$errorBox.addClass('d-none');
	return true;
}
