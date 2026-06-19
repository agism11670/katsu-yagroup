// JavaScript Document

// live calculation for lunchbox order
function update_field_lunchbox(){
	'use strict';
	var price = 25.00; // price per lunchbox
	var qty = $('#order-counts').val();
	var subTotal = 0.00;
	
	if(qty < 20) {
		$('#qty-error').text('Minimum 20 Order'); // error message
	} else {
		$('#qty-error').text(''); // Reset error message
		subTotal = qty * price;
	}
	document.getElementById('subtotal').value = subTotal.toFixed(2);
}

// Validation for the platter
function update_field(){
  'use strict';
  
  var price1 = 80.00; // Family take out A
  var price2 = 140.00; // Family take out A
  var price3 = 15.00; // Sushi Platter
  var price4 = 12.00; // Roll Platter
  var subTotal1 = 0; // Subtotal for Family take out A
  var subTotal2 = 0; // Subtotal for Family take out B
  var subTotal3 = 0; // Subtotal for Sushi Platter
  var subTotal4 = 0; // Subtotal for Roll Platter
  var grandTotal = 0; // Grand Total
  var peopleNum = 0; // Number of people
  var crabTotal = 0.00;
  
  // Reset
   grandTotal = 0;
  
  // if the input has a value, calculate the subtotal
  subTotal1 = $('#quantity1').val() * price1;
  document.getElementById('subtotal1').value = subTotal1.toFixed(2);
  
  // if the input has a value, calculate the subtotal
  subTotal2 = $('#quantity2').val() * price2;
  document.getElementById('subtotal2').value = subTotal2.toFixed(2);
  
  // if people is less than 4, return the error message
  peopleNum = $('#quantity3').val();
  if(peopleNum !== '' && peopleNum < 4) {
    $('.error2').text('Minimum 4 people'); // error message
  } else {
    subTotal3 = $('#quantity3').val() * price3;
    $('.error2').text(''); // return the null 
    document.getElementById('subtotal3').value = subTotal3.toFixed(2);
  }
  
  // if people is less than 3, return the error message
  peopleNum = $('#quantity4').val();
  if(peopleNum !== '' && peopleNum < 3) {
    $('.error4').text('Minimum 3 people'); // error message
  } else {
    subTotal4 = $('#quantity4').val() * price4;
    $('.error4').text(''); // return the null 
    var crabNum = $('#rp-qua6').val();
    
    if(crabNum === '') {
      crabNum = 0;
    }
    
    if(crabNum > 0) {
      crabTotal = crabNum * 1.00 * peopleNum;
      subTotal4 += crabTotal;
    } else if(crabNum === 0) {
      subTotal4 = 12 * peopleNum;
    }
    document.getElementById('crab-total').value = crabTotal.toFixed(2);
    document.getElementById('subtotal4').value = subTotal4.toFixed(2);
  }
  
  // Calculate the grand total
  grandTotal = subTotal1 + subTotal2 + subTotal3 + subTotal4;
  // Output the grand total
  document.getElementById('grand-value').value = grandTotal.toFixed(2);
}
  
// If the counter is less than 5, return error  
function numFiveValid(classValue) {
  'use strict';
  var counter = 0; 
  var pq1 = 0;
  var pq2 = 0;
  var pq3 = 0;
  var pq4 = 0;
  var pq5 = 0;
  var pq6 = 0;
  var pq7 = 0;
  
  // Input value from id for sushi platter
  if(classValue === 'splatter bg-l-gray') {
    if($('#sp-qua1').val()!=='') {
      pq1 = parseInt($('#sp-qua1').val());
    }
    if($('#sp-qua2').val()!=='') {
      pq2 = parseInt($('#sp-qua2').val());
    }
    if($('#sp-qua3').val()!=='') {
      pq3 = parseInt($('#sp-qua3').val());
    }
    if($('#sp-qua4').val()!=='') {
      pq4 = parseInt($('#sp-qua4').val());
    }
    if($('#sp-qua5').val()!=='') {
      pq5 = parseInt($('#sp-qua5').val());
    }
    if($('#sp-qua6').val()!=='') {
      pq6 = parseInt($('#sp-qua6').val());
    }
    if($('#sp-qua7').val()!=='') {
      pq7 = parseInt($('#sp-qua7').val());
    }
    // Calculate the total
    counter = pq1 + pq2 + pq3 + pq4 + pq5 + pq6 + pq7;
    
    // output an error message if the number isn't 5
    if(counter !== 5) {
      $('.error1').text('The number should be 5.');
    } else {
      $('.error1').text('');
    }
  }
  
  // Input value from id for roll platter
  if(classValue === 'rplatter') {
    if($('#rp-qua1').val()!=='') {
      pq1 = parseInt($('#rp-qua1').val());
    }
    if($('#rp-qua2').val()!=='') {
      pq2 = parseInt($('#rp-qua2').val());
    }
    if($('#rp-qua3').val()!=='') {
      pq3 = parseInt($('#rp-qua3').val());
    }
    if($('#rp-qua4').val()!=='') {
      pq4 = parseInt($('#rp-qua4').val());
    }
    if($('#rp-qua5').val()!=='') {
      pq5 = parseInt($('#rp-qua5').val());
    }
    if($('#rp-qua6').val()!=='') {
      pq6 = parseInt($('#rp-qua6').val());
    }
    // Calculate the total
    counter = pq1 + pq2 + pq3 + pq4 + pq5 + pq6;
    
    var peopleNum = document.getElementById('quantity4').value;
    var subTotal4 = document.getElementById('subtotal4').value;
    
    if(pq6>0) {
      if(peopleNum === '') {
        peopleNum = 1;
      }
      
      var crabTotal = 1.00 * pq6 * peopleNum;
      
      if(peopleNum === 1) {
        subTotal4 = crabTotal;
      } else {
        subTotal4 = parseFloat(subTotal4);
        subTotal4 = peopleNum * 12.00 + crabTotal;
      }
      $('#crab-total').val(crabTotal.toFixed(2));
      $('#subtotal4').val(subTotal4.toFixed(2));
    } else {
      subTotal4 = peopleNum * 12.00;
      $('#crab-total').val(0.00);
      $('#subtotal4').val(subTotal4.toFixed(2));
    }
    
    var subTotal1 = document.getElementById('subtotal1').value;
    var subTotal2 = document.getElementById('subtotal2').value;
    var subTotal3 = document.getElementById('subtotal3').value;
    if(subTotal1 === '') {
      subTotal1 = 0;
    } else {
      subTotal1 = parseFloat(subTotal1);
    }
    if(subTotal2 === '') {
      subTotal2 = 0;
    } else {
      subTotal2 = parseFloat(subTotal2);
    }
    if(subTotal3 === '') {
      subTotal3 = 0;
    } else {
      subTotal3 = parseFloat(subTotal3);
    }
    
    var grandTotal = subTotal1 + subTotal2 + subTotal3 + subTotal4;
    $('#grand-value').val(grandTotal.toFixed(2));
    
    // output an error message if the number isn't 5
    if(counter !== 4) {
      $('.error3').text('The number should be 4.');
    } else {
      $('.error3').text('');
    }
  }
}

// Order validation to send the php file
function platterOrderCheck() {
  'use strict';
  
  var peopleSushiNum = $('#quantity3').val();
  var peopleRollNum = $('#quantity4').val();
  var grandTotal = $('#grand-value').val();
  var status = true;
  
  // 入力エラー文をリセット
  $("#errors").empty();
  
  if(grandTotal <= 0) {
      $("#errors").append("<li>* Your order is empty.</li>");
      status = false;
    
  } else if(grandTotal > 0) {
    // Validate if the total number of order is more than 3
    if(peopleSushiNum !== '' && peopleSushiNum < 4) {
      $("#errors").append("<li>* You can order the Sushi Platter from more than 4 people.</li>");
      status = false;
    }
    
    // Validate if the total number of order is more than 3
    if(peopleRollNum !== '' && peopleRollNum < 3) {
      $("#errors").append("<li>* You can order the Sushi Platter from more than 3 people.</li>");
      status = false;
    } 
  
    var counter = 0; 
    var pq1 = 0;
    var pq2 = 0;
    var pq3 = 0;
    var pq4 = 0;
    var pq5 = 0;
    var pq6 = 0;
    var pq7 = 0;
  
    // Validate if the total number of the sushi platter is 5
    if($('#sp-qua1').val()!=='') {
        pq1 = parseInt($('#sp-qua1').val());
      }
    if($('#sp-qua2').val()!=='') {
      pq2 = parseInt($('#sp-qua2').val());
    }
    if($('#sp-qua3').val()!=='') {
      pq3 = parseInt($('#sp-qua3').val());
    }
    if($('#sp-qua4').val()!=='') {
      pq4 = parseInt($('#sp-qua4').val());
    }
    if($('#sp-qua5').val()!=='') {
      pq5 = parseInt($('#sp-qua5').val());
    }
    if($('#sp-qua6').val()!=='') {
      pq6 = parseInt($('#sp-qua6').val());
    }
    if($('#sp-qua7').val()!=='') {
      pq7 = parseInt($('#sp-qua7').val());
    }
  
    // Calculate the total
    counter = pq1 + pq2 + pq3 + pq4 + pq5 + pq6 + pq7;
    
    // output an error message if the number isn't 5
    if(counter !== 5 && peopleSushiNum !== '') {
      $("#errors").append("<li>* You have to choose 5 kinds of sushi for the sushi platter.</li>");
      status = false;
    } 
  
    // Reset the counter
    counter = 0;
    pq1 = 0;
    pq2 = 0;
    pq3 = 0;
    pq4 = 0;
    pq5 = 0;
    pq6 = 0;
    pq7 = 0;
    
    // Validate if the total number of the sushi platter is 4
    if($('#rp-qua1').val()!=='') {
      pq1 = parseInt($('#rp-qua1').val());
    }
    if($('#rp-qua2').val()!=='') {
      pq2 = parseInt($('#rp-qua2').val());
    }
    if($('#rp-qua3').val()!=='') {
      pq3 = parseInt($('#rp-qua3').val());
    }
    if($('#rp-qua4').val()!=='') {
      pq4 = parseInt($('#rp-qua4').val());
    }
    if($('#rp-qua5').val()!=='') {
      pq5 = parseInt($('#rp-qua5').val());
    }
    if($('#rp-qua6').val()!=='') {
      pq6 = parseInt($('#rp-qua6').val());
    }
    // Calculate the total
    counter = pq1 + pq2 + pq3 + pq4 + pq5 + pq6; 
    
    // output an error message if the number isn't 4
    if(counter !== 4 && peopleRollNum !== '') {
      $("#errors").append("<li>* You have to choose 4 kinds of sushi for the roll platter.</li>");
      status = false;
    } 
  } 
  if(status == false) {
    console.log(status);
    return false;
  } else {
    return true;
  }
}

// Catering order page
// Validate the number of sushi
function sushiTotalVal() {
  'use strict';
  
  var counter = 0;
  var target = document.getElementById("step1");
  var planName = $('#plan-name').text();
  
  // 入力エラー文をリセット
  $("#error1").empty();
  
  for(var i = 1; i <= 21; i++) {
    var sqty = document.getElementById('sqty' + i);
    if(sqty.checked) {
      counter+=1;
    }
  }
  if(planName == 'A') {
    if(counter!=5) {
      document.getElementById('error1').innerHTML = '* Must choose 5 kinds</u> of sushi.';
      target.href="#sushi";
    } else {
      target.href="#creation";
    }
  } else if(planName == 'B') {
    if(counter!==3) {
      document.getElementById('error1').innerHTML = '* Must choose <u>3 kinds</u> of sushi.';
      target.href="#sushi";
    } else {
      target.href="#creation";
    }          
  } else if(planName == 'C') {
    if(counter!==5) {
      document.getElementById('error1').innerHTML = '* Must choose <u>5 kinds</u> of sushi.';
      target.href="#sushi-select";
    } else {
      target.href="#creation";
    }          
  } else if(planName == 'D') {
    if(counter!==4) {
      document.getElementById('error1').innerHTML = '* Must choose <u>4 kinds</u> of sushi.';
      target.href="#sushi";
    } else {
      target.href="#creation";
    }          
  }
}

// Validate the number of creation
function creationTotalVal() {
  'use strict';
  
  var counter = 0;
  var target = document.getElementById("step2");
  var planName = $('#plan-name').text();
  
  // 入力エラー文をリセット
  $("#error2").empty();
  
  for(var i = 1; i <= 8; i++) {
    var cqty = document.getElementById('cqty' + i);
    if(cqty.checked) {
      counter+=1;
    }
  }
  if(planName == 'A') {
    if(counter!==3) {
      document.getElementById('error2').innerHTML = '* Must choose <u>3 kinds</u> of creation menu.';
      target.href="#creation";
    } else {
      target.href="#roll";
    }
  } else if(planName == 'B') {
    if(counter!==5) {
      document.getElementById('error2').innerHTML = '* Must choose <u>5 kinds</u> of creation menu.';
      target.href="#creation";
    } else {
      target.href="#roll";
    } 
  } else if(planName == 'C') {
    if(counter!==4) {
      document.getElementById('error2').innerHTML = '* Must choose <u>4 kinds</u> of creation menu.';
      target.href="#creation";
    } else {
      target.href="#special-roll";
    } 
  } else if(planName == 'D') {
    if(counter!==3) {
      document.getElementById('error2').innerHTML = '* Must choose <u>3 kinds</u> of creation menu.';
      target.href="#creation";
    } else {
      target.href="#sashimi";
    } 
  }
}

// Validate the number of roll
function rollTotalVal() {
  'use strict';
  
  var counter = 0;
  var target = document.getElementById("step3");
  var planName = $('#plan-name').text();
  
  // 入力エラー文をリセット
  $("#error3").empty();
  
  for(var i = 1; i <= 17; i++) {
    var rqty = document.getElementById('rqty' + i);
    if(rqty.checked) {
      counter+=1;
    }
  }
  if(planName == 'A') {
    if(counter!==5) {
      document.getElementById('error3').innerHTML = '* Must choose <u>5 kinds</u> of rolls.';
      target.href="#roll";
    } else {
      target.href="#order";
    }
  } else if(planName == 'B') {
    if(counter!==5) {
      document.getElementById('error3').innerHTML = '* Must choose <u>up to 5 kinds</u> of rolls.';
      target.href="#roll";
    } else {
      target.href="#appetizer";
    }
  }
}

// Validate the number of sashimi
function sashimiTotalVal() {
  'use strict';
  
  var counter = 0;
  var target = document.getElementById("step4");
  var planName = $('#plan-name').text();
  
  // 入力エラー文をリセット
  $("#error4").empty();
  
  for(var i = 1; i <= 5; i++) {
    var saqty = document.getElementById('saqty' + i);
    if(saqty.checked) {
      counter+=1;
    }
  }
  
  if(planName == 'D') {
    if(counter!==3) {
      document.getElementById('error4').innerHTML = '* Must choose <u>3 kinds</u> of sashimi.';
      target.href="#sashimi";
    } else {
      target.href="#appetizer";
    }
  }
}

// Validate the number of appetizer
function appTotalVal() {
  'use strict';
  
  var counter = 0;
  var target = document.getElementById("step5");
  var planName = $('#plan-name').text();
  
  // 入力エラー文をリセット
  $("#error5").empty();
  
  for(var i = 1; i <= 11; i++) {
    var aqty = document.getElementById('aqty' + i);
    if(aqty.checked) {
      counter+=1;
    }
  }
  if(planName == 'B') {
    if(counter!==3) {
      document.getElementById('error5').innerHTML = '* Must choose <u>3 kinds</u> of appetizer.';
      target.href="#appetizer";
    } else {
      target.href="#order";
    }
  } else if(planName == 'D') {
    if(counter!==3) {
      document.getElementById('error5').innerHTML = '* Must choose <u>3 kinds</u> of appetizer.';
      target.href="#appetizer";
    } else {
      target.href="#hot";
    }
  }
}

// Validate the number of special roll
function spRollTotalVal() {
  'use strict';
  
  var counter = 0;
  var target = document.getElementById("step15");
  var planName = $('#plan-name').text();
  
  // 入力エラー文をリセット
  $("#error3").empty();
  
  for(var i = 1; i <= 9; i++) {
    var spqty = document.getElementById('spqty' + i);
    if(spqty.checked) {
      counter+=1;
    }
  }
  if(planName == 'C') {
    if(counter!==3) {
      document.getElementById('error15').innerHTML = '* Must choose <u>3 kinds</u> of special rolls.';
      target.href="#special-roll";
    } else {
      target.href="#hot";
    }
  }
}

// Validate the number of hot dish
function hotTotalVal() {
  'use strict';
  
  var counter = 0;
  var target = document.getElementById("step3");
  var planName = $('#plan-name').text();
  
  // 入力エラー文をリセット
  $("#error3").empty();
  
  for(var i = 1; i <= 10; i++) {
    var hqty = document.getElementById('hqty' + i);
    if(hqty.checked) {
      counter+=1;
    }
  }
  if(planName == 'C') {
    if(counter!==4) {
      document.getElementById('error3').innerHTML = '* Must choose <u>4 kinds</u> of hot dish.';
      target.href="#hot";
    } else {
      target.href="#order";
    }
  } else if(planName == 'D') {
    if(counter!==3) {
      document.getElementById('error3').innerHTML = '* Must choose <u>3 kinds</u> of hot dish.';
      target.href="#hot";
    } else {
      target.href="#hand-roll";
    }
  }
}
  
// Validate the number of hand roll
function handRollTotalVal() {
  'use strict';
  
  var counter = 0;
  var target = document.getElementById("step6");
  var planName = $('#plan-name').text();
  
  // 入力エラー文をリセット
  $("#error6").empty();
  
  for(var i = 1; i <= 8; i++) {
    var hqty = document.getElementById('hrqty' + i);
    if(hqty.checked) {
      counter+=1;
    }
  }
  if(planName == 'D') {
    if(counter!==1) {
      document.getElementById('error6').innerHTML = '* Must choose <u>1 kind</u> of hand roll.';
      target.href="#hand-roll";
    } else {
      target.href="#order";
    }
  } 
}

// Catering Order Check
function cateringCheck() {
  'use strict';
  
  var counter = 0;
  var spCounter = 0;
  var planName = $('#plan-name').text();
  var isFalse = 1;
  
  // 入力エラー文をリセット
  $("ul").empty();
  
  // Sushi
  for(var i = 1; i <= 21; i++) {
    var sqty = document.getElementById('sqty' + i);
    if(sqty.checked) {
      counter+=1;
    }
  }
  
  /*if(planName==='C') {
    for(i = 1; i <= 9; i++) {
      var spqty = document.getElementById('spqty' + i);
      if(spqty.checked) {
        spCounter+=1;
      }
    }
  }*/
  
  if(planName==='A') {
    if(counter!==5) {
      $("ul#errors").append("<li>* You must choose 5 sushi.</li>");
      isFalse = 0;
    } 
  } else if(planName==='B') {
    if(counter!==3) {
      $("ul#errors").append("<li>* You must choose 3 sushi.</li>");
      isFalse = 0;
    } 
  } else if(planName==='C') {
    if(counter!==5) {
      $("ul#errors").append("<li>* You must choose 5 sushi.</li>");
      isFalse = 0;
    } 
    /*if((counter===0 && spCounter===0) || (counter!==0 && spCounter!==0)) {
      $("ul#errors").append("<li>* You must choose sushi or special rolls.</li>");
      isFalse = 0;
    } else if(counter!==5 && spCounter===0) {
      $("ul#errors").append("<li>* You must choose 5 sushi.</li>");
      isFalse = 0;
    } else if(counter===0 && spCounter!==3) {
      $("ul#errors").append("<li>* You must choose 3 special roll.</li>");
      isFalse = 0;
    } */
    
  } else if(planName==='D') {
    if(counter!==4) {
      $("ul#errors").append("<li>* You must choose 4 sushi.</li>");
      isFalse = 0;
    }
  } 
  
  // Creation
  // Reset the counter
  counter = 0;
  for(i = 1; i <= 8; i++) {
    var cqty = document.getElementById('cqty' + i);
    if(cqty.checked) {
      counter+=1;
    }
  }
  if(planName==='A') {
    if(counter!==3) {
      $("ul#errors").append("<li>* You must choose 3 Katsuya creation.</li>");
      isFalse = 0;
    } 
  } else if(planName==='B') {
    if(counter!==5) {
      $("ul#errors").append("<li>* You must choose 5 Katsuya creation.</li>");
      isFalse = 0;
    } 
  } else if(planName==='C') {
    if(counter!==4) {
      $("ul#errors").append("<li>* You must choose 4 Katsuya creation.</li>");
      isFalse = 0;
    } 
  } else if(planName==='D') {
    if(counter!==3) {
      $("ul#errors").append("<li>* You must choose 3 Katsuya creation.</li>");
      isFalse = 0;
    }
  } 
  
  // Roll
  // Reset the counter
  counter = 0;
  if(planName==='A' || planName==='B') {
    for(i = 1; i <= 17; i++) {
      var rqty = document.getElementById('rqty' + i);
      if(rqty.checked) {
        counter+=1;
      }
    }
    if(planName==='A') {
      if(counter!==5) {
        $("ul#errors").append("<li>* You must choose 5 rolls.</li>");
        isFalse = 0;
      } 
    } else if(planName==='B') {
      if(counter!==5) {
        $("ul#errors").append("<li>* You must choose 5 rolls.</li>");
        isFalse = 0;
      }
    } 
  }
  
  // Sashimi
  // Reset the counter
  counter = 0;
  
  if(planName==='D') {
    for(i = 1; i <= 5; i++) {
      var saqty = document.getElementById('saqty' + i);
      if(saqty.checked) {
        counter+=1;
      }
    }
    if(counter!==3) {
      $("ul#errors").append("<li>* You must choose 3 sashimi.</li>");
      isFalse = 0;
    } 
  }
  
  // Appetizer
  // Reset the counter
  counter = 0;
  
  if(planName==='B' || planName==='D') {
    for(i = 1; i <= 11; i++) {
      var aqty = document.getElementById('aqty' + i);
      if(aqty.checked) {
        counter+=1;
      }
    }
    if(planName==='B') {
      if(counter!==3) {
        $("ul#errors").append("<li>* You must choose 3 appetizer.</li>");
        isFalse = 0;
      } 
    } else if(planName==='D') {
      if(counter!==3) {
        $("ul#errors").append("<li>* You must choose 3 appetizer.</li>");
        isFalse = 0;
      }
    } 
  }
  
  // Hot Dish
  // Reset the counter
  counter = 0;
  
  if(planName==='C' || planName==='D') {
    for(i = 1; i <= 10; i++) {
      var hqty = document.getElementById('hqty' + i);
      if(hqty.checked) {
        counter+=1;
      }
    }
    if(planName==='C') {
      if(counter!==4) {
        $("ul#errors").append("<li>* You must choose 4 hot dish.</li>");
        isFalse = 0;
      } 
    } else if(planName==='D') {
      if(counter!==3) {
        $("ul#errors").append("<li>* You must choose 3 hot dish.</li>");
        isFalse = 0;
      }
    } 
  }
  
  // Special Roll
  // Reset the counter
  counter = 0;
  
  if(planName==='C') {
    for(i = 1; i <= 9; i++) {
      var spqty = document.getElementById('spqty' + i);
      if(spqty.checked) {
        counter+=1;
      }
    }
    if(counter!==3) {
      $("ul#errors").append("<li>* You must choose 3 special rolls.</li>");
      isFalse = 0;
    } 
  }
  
  // Hand Roll
  // Reset the counter
  counter = 0;
  
  if(planName==='D') {
    for(i = 1; i <= 8; i++) {
      var hrqty = document.getElementById('hrqty' + i);
      if(hrqty.checked) {
        counter+=1;
      }
    }
    if(counter!==1) {
      $("ul#errors").append("<li>* You must choose 1 hand roll.</li>");
      isFalse = 0;
    } 
  }
  
  // Final Decision
  if(!isFalse) {
    $("ul#errors").append("<li><a href='#catering-step2'>Edit the order again.</a></li>");
    return false;
  } else{
    return true;
  }
}

// Contact form validation
function contactCheck() {
  'use strict';
  
  var status = 1;
  
  // 入力エラー文をリセット
  $("ul#errors").empty();
  
  if($('#name').val()=='' || $('#phone').val() == '' || $('#email').val() == '' || $('#budget').val() == '' || $('#adults').val() == '') {
    $("ul#errors").append("<li>* <span class='warn'>*</span> fields are required.</li>");
    status = -1;
  }
  
  // Name validation
  if(document.getElementById('name').value.search(/^([a-zA-Z]+[\'\,\.\-]?[a-zA-Z ]*)+[ ]([a-zA-Z]+[\'\,\.\-]?[a-zA-Z ]+)+$/) === -1) {
     $("ul#errors").append("<li>* Customer name must be first name and last name.</li>");
    status = -1;
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
  
  // Pickup or Delivery Validation
  if(document.getElementById('form-style').value === 'platter' ||  (document.getElementById('form-style').value === 'full-custom' && document.getElementById('custom-option').value === 'pickup')) {
    if(document.getElementById('p-time').value !== '' && document.getElementById('d-time').value !== '') {
      $("ul#errors").append("<li>* Please choose pick-up service or delivery service.</li>");
    status = -1;
    } else if(document.getElementById('p-time').value === '' && document.getElementById('d-time').value === '') {
      $("ul#errors").append("<li>* Please choose pick-up service or delivery service.</li>");
      status = -1;
    }
  }
  
  if(status === -1) {
    return false;
  } else {
    return true;
  }
}

// Contact form for lunchbox validation
function contactCheckLunchbox() {
  'use strict';
  
  var status = 1;
  
  // 入力エラー文をリセット
  $("ul#errors").empty();
  
  if($('#name').val()=='' || $('#phone').val() == '' || $('#email').val() == '' || $('#order-counts').val() == '' || $('#address-line').val() == '' || $('#city').val() == '' || $('#state').val() == '' || $('#zip').val() == '' || $('#event-date').val() == '' || $('#delivery-time').val() == '') {
    $("ul#errors").append("<li>* <span class='warn'>*</span> fields are required.</li>");
    status = -1;
  }
	  
	// Name validation
  	if(document.getElementById('name').value.search(/^([a-zA-Z]+[\'\,\.\-]?[a-zA-Z ]*)+[ ]([a-zA-Z]+[\'\,\.\-]?[a-zA-Z ]+)+$/) === -1) {
  	   $("ul#errors").append("<li>* Customer name must be first name and last name.</li>");
  	  status = -1;
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
	
	// Order count validation
  	if($('#order-counts').val() < 20) {
  	  $("ul#errors").append("<li>* You need to order minimum 20.</li>");
  	  status = -1;
  	} 
  
  if(status === -1) {
    return false;
  } else {
    return true;
  }
}