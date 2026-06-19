<?php 
session_start();
require_once("dompdf/dompdf_config.inc.php");
ob_start(); // start output buffer 
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>KATSU-YA Catering Order Information</title>  
<style>
  body {
    padding: 25px;
    width: 545px;
    margin: auto;
    font-family: Arial, Helvetica, sans-serif;
  }
  h1 {
    margin-top: 0;
    margin-bottom: 5px;
  }
  h2 {
    margin-top: 35px;
	 background-color: #ddd;
	 width: 100%;
	 padding-bottom: 5px;
  }
  h4 {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 17px;
  }
  h5 {
    font-size: 17px;
  }
  p {
    margin-top: 0;
    margin-bottom: 0;
  }
  table#order-summary {
    margin-top: 25px;
    border-collapse: collapse;
    width: 100%;
  }
  table#order-summary th {
    background-color: #efefef;
    padding: 3px 10px;
    border: 1px solid #dddddd;
  }
  table#order-summary td {
    padding: 7px 10px 7px;
    border: 1px solid #dddddd;
  }
  table#order-summary th.first-child {
    width: 30%;
  }
  table#order-summary td.first-child {
    width: 30%;
  }
  table#order-summary th.second-child {
    width: 10%;
  }
  table#order-summary td.second-child {
    width: 10%;
    text-align: center;
  }
  table#order-summary th.third-child {
    width: 30%;
  }
  table#order-summary td.third-child {
    width: 30%;
  }
  table#order-summary th.forth-child {
    width: 20%;
  }
  table#order-summary td.forth-child {
    width: 20%;
    text-align: right;
  }
  tr#order-top {
    border-top: 1px solid #ddd;
  }
  table#order-summary-catering {
    margin-top: 25px;
    border-collapse: collapse;
    width: 100%;
  }
  table#order-summary-catering th {
    background-color: #efefef;
    padding: 3px 10px;
  }
  table#order-summary-catering td {
    padding: 7px 10px 7px;
  }
  table#order-summary-catering th.first-child {
    width: 20%;
  }
  table#order-summary-catering td.first-child {
    width: 20%;
  }
  table#order-summary-catering th.second-child {
    width: 20%;
  }
  table#order-summary-catering td.second-child {
    width: 20%;
  }
  table#order-summary-catering th.third-child {
    width: 45%;
  }
  table#order-summary-catering td.third-child {
    width: 45%;
  }
  table#order-summary-catering th.forth-child {
    width: 15%;
  }
  table#order-summary-catering td.forth-child {
    width: 15%;
    text-align: center;
  }
  table#order-summary-full {
    margin-top: 25px;
    border-collapse: collapse;
    width: 100%;
  }
  table#order-summary-full th {
    background-color: #efefef;
    padding: 3px 10px;
  }
  table#order-summary-catering td {
    padding: 7px 10px 7px;
  }
  table#order-summary-full th.first-child {
    width: 30%;
  }
  table#order-summary-full td.first-child {
    width: 30%;
  }
  table#order-summary-full th.second-child {
    width: 50%;
  }
  table#order-summary-full td.second-child {
    width: 50%;
  }
  table#order-summary-full th.third-child {
    width: 20%;
    text-align: center;
  }
  table#order-summary-full td.third-child {
    width: 20%;
    text-align: center;
  }
  table#contact_info {
    margin-top: 25px;
    border-collapse: collapse;
    width: 100%;
  }
  table#contact_info th {
    background-color: #efefef;
    padding: 3px 10px;
    border: 1px solid #dddddd;
    text-align: left !important;
    width: 50%:
  }
  table#contact_info td {
    padding: 7px 10px 7px;
    border: 1px solid #dddddd;
    width: 100%:
  }
  table.contact_info td p{
    padding-bottom: 5px;
  }
  
  table.order_info {
    margin-top: 25px;
    border-collapse: collapse;
    width: 100%;
  }
  table.order_info th {
    background-color: #efefef;
    padding: 3px 10px;
    border: 1px solid #dddddd;
    text-align: left !important;
    width: 25%:
  }
  table.order_info td {
    padding: 3px 25px 3px 25px;
    border: 1px solid #dddddd;
    width: 25%:
  } 
  table#other_info {
    margin-top: 25px;
    border-collapse: collapse;
    width: 100%;
  }
  table#other_info th {
    background-color: #efefef;
    padding: 3px 10px;
    border: 1px solid #dddddd;
    text-align: left !important;
    width: 25%:
  }
  table#other_info td {
    padding: 3px 25px 3px 25px;
    border: 1px solid #dddddd;
    width: 75%:
  } 
  p#page-num {
    position: absolute;
    top: 0;
    right: 0;
  }
  table.price-list {
    margin-top: 25px;
    border-collapse: collapse;
    width: 100%;
  }
  table.price-list th {
    background-color: #efefef;
    padding: 3px 10px;
    width: 60%;
    border: 1px solid #dddddd;
  }
  table.price-list td {
    width: 40%;
    padding: 3px 10px;
    border: 1px solid #dddddd;
  }
	.text-center {
		text-align: center;
	}
	table.lunchbox_table {
    border-collapse: collapse;
    width: 100%;
	 margin-top: 10px;
  }
  table.lunchbox_table th {
    background-color: #efefef;
    padding: 3px 10px;
    border: 1px solid #dddddd;
    text-align: left !important;
    width: 25%:
  }
  table.lunchbox_table td {
    padding: 3px 25px 3px 25px;
    border: 1px solid #dddddd;
    width: 75%:
  } 
</style>
</head>

<body>
  <!-- header -->
  <?php 
    ini_set('display_errors', 0);
  
    // Get the date info
    date_default_timezone_set("America/Los_Angeles");
    $time = date("h:i:sa");
    $date = date("m/d/Y");
  ?>
  <!-- Get the form type -->
  <?php $formName = $_POST['formtype']; ?>
	
  <!-- Add lunchbox pdf form -->
  <?php if($formName == 'lunchbox'): ?>
  <h5 class="text-center">KATSU-YA GROUP INC</h5>
  <h1 class="text-center">Customer Inquiry - Lunch Box</h1>	
  <p class="text-center">
	please e-mail: to catering@katsu-yagroup.com or call 818-633-1693 Chisato Kishida, <br>Director of Catering with any questions.
  </p>
	<?php 
	// output contact info
	$name = $_POST['customer-name'];
	$phone = $_POST['p-num'];
	$cName = $_POST['company-name'];
	$email = $_POST['email-address'];
	?>
	<h2 class="text-center">Customer Contact Information</h2>
	<table class="lunchbox_table">
		<tr>
			<th>Contact Name</th>
			<td colspan="3"><?php echo $name; ?></td>
		</tr>
		<tr>
			<th>Company</th>
			<td colspan="3"><?php echo $cName; ?></td>
		</tr>
		<tr>
			<th>Phone Number</th>
			<td colspan="3"><?php echo $phone; ?></td>
		</tr>
		<tr>
			<th>E-mail Address</th>
			<td colspan="3"><?php echo $email; ?></td>
		</tr>
	</table>
	
	<?php 
	$deliDate = $_POST['event-date'];
	$deliTime = $_POST['delivery-time'];
	$location = $_POST['location'];
	$orderCount = $_POST['order-counts'];
	?>
	<h2 class="text-center">Event Information</h2>
	<table class="lunchbox_table">
		<tr>
			<th>Order Counts</th>
			<td colspan="3"><?php echo $orderCount; ?></td>
		</tr>
		<tr>
			<th>Date Requested</th>
			<td colspan="3"><?php echo $deliDate; ?></td>
		</tr>
		<tr>
			<th>Time of Delivery</th>
			<td colspan="3"><?php echo $deliTime; ?></td>
		</tr>
		<tr>
			<th>Delivery Location</th>
			<td colspan="3"><?php echo $location; ?></td>
		</tr>
	</table>
	
	<?php $memo = $_POST['memo']; ?>
	<h2 class="text-center">Special Request</h2>
	<table class="lunchbox_table">
		<tr>
			<th>Notes</th>
			<td colspan="3"><?php echo $memo; ?></td>
		</tr>
	</table>
	
  <?php else: ?>
  <h5>KATSU-YA Online Catering</h5>
  <h1>Order Confirmation Form</h1>
  <p><strong>Order Date: </strong><?php echo $time ?> <?php echo $date ?>
  </p> 
  
  <!-- Contact Information -->
  <?php
    // Output contact info
    $name = $_POST['customer-name'];
    $phone= $_POST['p-num'];
    $cName= $_POST['company-name'];
    $cPhone= $_POST['cell-num'];
    $email= $_POST['email-address'];
  ?>
  <table id="contact_info">
    <tr>
      <th><h4>Contact Information</h4></th>
    </tr>
    <tr>
      <td>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>Company Name:</strong> <?php echo $cName; ?></p>
        <p><strong>Cell Phone:</strong> <?php echo $cPhone; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
      </td>
    </tr>
  </table>
  <!-- Get the order option for full custom order -->
  <?php $customOrderForm = $_POST['custom-order-option']; ?>
  <!-- Order Information for pick-up -->
  <?php if($formName == 'platter' || ($formName == 'full-custom' && $customOrderForm == 'pickup')): ?>
  <?php
    $orderType = $_POST['order-type'];
    $pickTime = $_POST['p-time'];
    $pickLocation = $_POST['p-location'];
    $dropTime = $_POST['d-time'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    $budget = $_POST['budget'];
  ?>
  <table class="order_info">
    <tr>
      <th>Order Type</th>
      <td colspan="3"><?php echo $orderType; ?></td>
    </tr>
    <?php 
      if($pickTime!=null) {
        echo '<tr><th>Pick Up Time</th><td colspan="3">'.$pickTime.'</td></tr><tr><th>Pick Up Location</th><td colspan="3">'.$pickLocation.'</td></tr>';
      } else {
        echo '<tr><th>Delivery Time</th><td colspan="3">'.$dropTime.'</td></tr>';
      }
      if($formName == 'full-custom') {
        echo '<tr><th>Adults</th><td colspan="3">'.$adults.'</td></tr>';
        echo '<tr><th>Kids</th><td colspan="3">'.$kids.'</td></tr>';
        echo '<tr><th>Budget</th><td colspan="3">'.$budget.'</td></tr>';
      }
    ?>
  </table>
  <!-- Order Information for catering -->
  <?php elseif($formName == 'catering' || $formName == 'inquiry' || ($formName == 'full-custom' && $customOrderForm == 'catering')): ?>
  <?php
    // Output the contact form for catering
    $orderType = $_POST['order-type'];
    $cateringStyle = $_POST['c-style'];
    $eventDate = $_POST['e-date'];
    $eventLocation = $_POST['e-location'];
    $eventStart = $_POST['e-start'];
    $eventEnd = $_POST['e-end'];
    $budget = $_POST['budget'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    $memo = $_POST['memo'];
  ?>
  <table class="order_info">
    <tr>
      <th>Order Type</th>
      <td colspan="3"><?php echo $orderType; ?></td>
    </tr>
    <tr>
      <th>Catering Style</th>
      <td colspan="3"><?php echo $cateringStyle; ?></td>
    </tr>
    <tr>
      <th>Event Date</th>
      <td colspan="3"><?php echo $eventDate; ?></td>
    </tr>
    <tr>
      <th>Location</th>
      <td colspan="3"><?php echo $eventLocation; ?></td>
    </tr>
    <tr>
      <th>Event Start Time</th>
      <td><?php echo $eventStart; ?></td>
      <th>Event End Time</th>
      <td><?php echo $eventEnd; ?></td>
    </tr>
    <tr>
      <th>Adults</th>
      <td><?php echo $adults; ?></td>
      <th>Kids</th>
      <td><?php echo $kids; ?></td>
    </tr>
    <?php
      if($formName == 'inquiry' || $formName == 'full-custom') {
        echo '<tr><th>Budget</th><td colspan="3">'.$budget.'</td></tr>';
      }
    ?>
  </table>
  <?php endif; ?>
  
  <?php
    $memo = $_POST['memo'];
    $allergy = $_POST['allergy'];
    $preference = $_POST['preference'];
  ?>
  
  <table id="other_info">
    <?php
      if($formName!='platter') {
        echo '<tr><th>Memo</th><td colspan="3">'.$memo.'</td></tr>';
      }
    ?>
    <tr>
      <th>Allergy</th>
      <td colspan="3"><?php echo $allergy; ?></td>
    </tr>
    <tr>
      <th>Preference</th>
      <td colspan="3"><?php echo $preference; ?></td>
    </tr>
  </table>
  
  <!-- Output the order summary -->
  
  <!-- Pick-up -->
  <?php
    if($formName == 'platter'):
  ?>
  <table id="order-summary">
    <tr>
      <th class="first-child">Item</th>
      <th class="second-child">Qty</th>
      <th class="third-child">Item Detail</th>
      <th class="forth-child">Price</th>
    </tr>
    
    <!-- Family Take Out (A) -->
    <?php
      $qty = $_POST['p-qty1'];
      $price = $_POST['p-pr1'];
      if($qty != null) :
    ?>
    <tr>
      <td class="first-child">FAMILY TAKE OUT(A)</td>
      <td class="second-child"><?php echo $qty; ?></td>
      <td class="third-child"></td>
      <td class="forth-child"><?php echo $price; ?></td>
    </tr>
    <?php endif; ?>
    
    <!-- Family Take Out (B) -->
    <?php
      $qty = $_POST['p-qty2'];
      $price = $_POST['p-pr2'];
      if($qty != null) :
    ?>
    <tr>
      <td class="first-child">FAMILY TAKE OUT(B)</td>
      <td class="second-child"><?php echo $qty; ?></td>
      <td class="third-child"></td>
      <td class="forth-child"><?php echo $price; ?></td>
    </tr>
    <?php endif; ?>
    
    <!-- Sushi Platter -->
    <?php
      $qty = $_POST['p-qty3'];
      $price = $_POST['p-pr3'];
      if($qty != null) :
    ?>
    <tr>
      <td class="first-child">SUSHI PLATTER</td>
      <td class="second-child"><?php echo $qty; ?></td>
      <td class="third-child">
        <?php
          $length = 7;
          for($i=1; $i<=$length; $i++) {
            $itemQty = $_POST['sp-qty'.$i];
            
            if($itemQty!=null) {
              $itemName = $_POST['sp-item'.$i];
              echo $itemName . ' x ' . $itemQty . '<br>';
            }
          }
        ?>
      </td>
      <td class="forth-child"><?php echo $price; ?></td>
    </tr>
    <?php endif; ?>
    
    <!-- Roll Platter -->
    <?php
      $qty = $_POST['p-qty4'];
      $price = $_POST['p-pr4'];
      if($qty != null) :
    ?>
    <tr>
      <td class="first-child">ROLL PLATTER</td>
      <td class="second-child"><?php echo $qty; ?></td>
      <td class="third-child">
        <?php
          $length = 7;
          for($i=1; $i<=$length; $i++) {
            $itemQty = $_POST['rp-qty'.$i];
            
            if($itemQty!=null) {
              $itemName = $_POST['rp-item'.$i];
              echo $itemName . ' x ' . $itemQty . '<br>';
            }
          }
        ?>
      </td>
      <td class="forth-child"><?php echo $price; ?></td>
    </tr>
    <?php endif; ?>
    <tr>
      <td colspan="3" align="right"><strong>Grand Total</strong></td>
      <?php 
        $grandTotal = $_POST['pg-total'];
      ?>
      <td class="forth-child"><?php echo $grandTotal; ?></td>
    </tr>
  </table>
  <?php
    elseif($formName == 'catering'):
  ?>
  <table id="order-summary-catering">
    <tr>
      <th class="first-child">Plan</th>
      <th class="second-child">Category</th>
      <th class="third-child">Item</th>
      <th class="forth-child">Qty</th>
    </tr>
    
    <!-- Sushi or special rolls -->
    <?php
      // Get the plan name
      $planName = $_POST['n-plan'];
      // Get the category name
      $catName = $_POST['category1'];
    ?>
    <tr>
      <td class="first-child"><?php echo $planName; ?></td>
      <td class="second-child"><?php echo $catName; ?></td>
      <td class="third-child">
        <?php 
          if($planName == 'PLAN A') {
            $itemNum = 5;
          } else if ($planName == 'PLAN B') {
            $itemNum = 3;
          } else if($planName == 'PLAN C') {
            $itemNum = 5;
          } else if($planName == 'PLAN D') {
            $itemNum = 4;
          } 
        
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['s-item'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
      <td class="forth-child">
        <?php 
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['s-qty'.$i];
            echo $item . '<br>';
          }s
        ?>
      </td>
    </tr>
    
    <!-- Creation -->
    <?php
      // Get the category name
      $catName = $_POST['category2'];
    
      if($planName == 'PLAN A') {
        $itemNum = 3;
      } else if ($planName == 'PLAN B') {
        $itemNum = 5;
      } else if($planName == 'PLAN C') {
        $itemNum = 4;
      } else if($planName == 'PLAN D') {
        $itemNum = 3;
      } 
    ?>
    <tr>
      <td class="first-child"></td>
      <td class="second-child"><?php echo $catName; ?></td>
      <td class="third-child">
        <?php
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['c-item'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
      <td class="forth-child">
        <?php 
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['c-qty'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
    </tr>
    
    <!-- Sashimi -->
    <?php
      if($planName == 'PLAN C'):
        // Get the category name
        $catName = $_POST['category7'];
      
        $itemNum = 3;
    ?>
    <tr>
      <td class="first-child"></td>
      <td class="second-child"><?php echo $catName; ?></td>
      <td class="third-child">
        <?php
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['sp-item'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
      <td class="forth-child">
        <?php 
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['sp-qty'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
    </tr>
    <?php endif; ?>
    
    <!-- Roll -->
    <?php
      if($planName == 'PLAN A' || $planName == 'PLAN B'): 
        // Get the category name
        $catName = $_POST['category3'];
        $itemNum = 5;
    ?>
    <tr>
      <td class="first-child"></td>
      <td class="second-child"><?php echo $catName; ?></td>
      <td class="third-child">
        <?php
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['r-item'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
      <td class="forth-child">
        <?php 
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['r-qty'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
    </tr>
    <?php endif; ?>
    
    <!-- Sashimi -->
    <?php
      if($planName == 'PLAN D'):
        // Get the category name
        $catName = $_POST['category4'];
      
        $itemNum = 3;
    ?>
    <tr>
      <td class="first-child"></td>
      <td class="second-child"><?php echo $catName; ?></td>
      <td class="third-child">
        <?php
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['sa-item'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
      <td class="forth-child">
        <?php 
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['sa-qty'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
    </tr>
    <?php endif; ?>
    
    <!-- Appetizer -->
    <?php
      if($planName == 'PLAN B' || $planName == 'PLAN D'):
        // Get the category name
        $catName = $_POST['category5'];
      
        $itemNum = 3;
    ?>
    <tr>
      <td class="first-child"></td>
      <td class="second-child"><?php echo $catName; ?></td>
      <td class="third-child">
        <?php
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['a-item'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
      <td class="forth-child">
        <?php 
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['a-qty'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
    </tr>
    <?php endif; ?>
    
    <!-- Hot Dish -->
    <?php
      if($planName == 'PLAN C' || $planName == 'PLAN D'):
        // Get the category name
        $catName = $_POST['category6'];
      
        if($planName == 'PLAN C') {
          $itemNum = 4;
        } else if ($planName == 'PLAN D') {
          $itemNum = 3;
        }
    ?>
    <tr>
      <td class="first-child"></td>
      <td class="second-child"><?php echo $catName; ?></td>
      <td class="third-child">
        <?php
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['h-item'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
      <td class="forth-child">
        <?php 
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['h-qty'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
    </tr>
    <?php endif; ?>
    
    <!-- Hand Roll -->
    <?php
      if($planName == 'PLAN D'):
        // Get the category name
        $catName = $_POST['category8'];
      
        $itemNum = 1;
    ?>
    <tr>
      <td class="first-child"></td>
      <td class="second-child"><?php echo $catName; ?></td>
      <td class="third-child">
        <?php
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['hr-item'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
      <td class="forth-child">
        <?php 
          for($i=1; $i<=$itemNum; $i++) {
            $item = $_POST['hr-qty'.$i];
            echo $item . '<br>';
          }
        ?>
      </td>
    </tr>
    <?php endif; ?>
    <?php 
      $basicPrice = $_POST['b-total'];
      $addPrice = $_POST['add-total'];
      $servingQty = $_POST['adults-num'];
      $grandPrice = $_POST['cg-total'];
    ?>
  </table>
  <table class="price-list">
    <tr id="border-top">
      <th align="left"><strong>Basic Price(per person)</strong></td>
      <td align="right"><?php echo $basicPrice; ?></td>
    </tr>
    <tr>
      <th align="left"><strong>Additional Fee for Sushi(per person)</strong></td>
      <td align="right"><?php echo $addPrice; ?></td>
    </tr>
    <tr>
      <th align="left"><strong>Serving Quantity</strong></td>
      <td align="right"><?php echo $servingQty; ?></td>
    </tr>
    <tr>
      <th align="left"><strong>Grand Total</strong></td>
      <td align="right"><?php echo $grandPrice; ?></td>
    </tr>
  </table>
  <?php
    elseif($formName == 'full-custom'):
  ?>

  <table id="order-summary-full">
    <tr>
      <th class="first-child">Category</th>
      <th class="second-child">Item</th>
      <th class="third-child">Quantity</th>
    </tr>
    
    <!-- Sushi -->
    <?php 
      for($i=1; $i<=21; $i++) {
        $itemQty = $_POST['s-qty'.$i];
        if($itemQty==null) {
          $itemQty = 0;
        }
        $itemTotal += $itemQty;
      }
      if($itemTotal != 0) {
        echo '<tr><td class="first-child">Sushi</td><td class="second-child">';
        // Set the counter
        $itemCounter = 1;
        
        do {
          $item = $_POST['s-item'.$itemCounter];
          if($item!=null) {
            echo $item . '<br>';
            $itemCounter++;
          }
        } while($item != null);
        echo '</td><td class="third-child">';
        // Reset the counter
        $qtyCounter = 1;
        do {
          $itemQty = $_POST['s-qty'.$qtyCounter];
          echo $itemQty . '<br>';
          $qtyCounter++;
        } while($qtyCounter != $itemCounter);
        echo '</td></tr>';
      } 
    ?>
    
    <!-- Roll -->
    <?php 
      // Reset the item total
      $itemTotal = 0;
    
      for($i=1; $i<=19; $i++) {
        $itemQty = $_POST['r-qty'.$i];
        if($itemQty==null) {
          $itemQty = 0;
        }
        $itemTotal += $itemQty;
      }
      if($itemTotal != 0) {
        echo '<tr><td class="first-child">Roll</td><td class="second-child">';
        // Set the counter
        $itemCounter = 1;
        
        do {
          $item = $_POST['r-item'.$itemCounter];
          if($item!=null) {
            echo $item . '<br>';
            $itemCounter++;
          }
        } while($item != null);
        echo '</td><td class="third-child">';
        // Reset the counter
        $qtyCounter = 1;
        do {
          $itemQty = $_POST['r-qty'.$qtyCounter];
          echo $itemQty . '<br>';
          $qtyCounter++;
        } while($qtyCounter != $itemCounter);
        echo '</td></tr>';
      } 
    ?>
    
    <!-- Special Roll -->
    <?php 
      // Reset the item total
      $itemTotal = 0;
      for($i=1; $i<=9; $i++) {
        $itemQty = $_POST['sp-qty'.$i];
        if($itemQty==null) {
          $itemQty = 0;
        }
        $itemTotal += $itemQty;
      }
      if($itemTotal != 0) {
        echo '<tr><td class="first-child">Special Roll</td><td class="second-child">';
        // Set the counter
        $itemCounter = 1;
        
        do {
          $item = $_POST['sp-item'.$itemCounter];
          if($item!=null) {
            echo $item . '<br>';
            $itemCounter++;
          }
        } while($item != null);
        echo '</td><td class="third-child">';
        // Reset the counter
        $qtyCounter = 1;
        do {
          $itemQty = $_POST['sp-qty'.$qtyCounter];
          echo $itemQty . '<br>';
          $qtyCounter++;
        } while($qtyCounter != $itemCounter);
        echo '</td></tr>';
      } 
    ?>
    
    <!-- Creation -->
    <?php 
      // Reset the item total
      $itemTotal = 0;
    
      for($i=1; $i<=8; $i++) {
        $itemQty = $_POST['c-qty'.$i];
        if($itemQty==null) {
          $itemQty = 0;
        }
        $itemTotal += $itemQty;
      }
      if($itemTotal != 0) {
        echo '<tr><td class="first-child">Creation</td><td class="second-child">';
        // Set the counter
        $itemCounter = 1;
        
        do {
          $item = $_POST['c-item'.$itemCounter];
          if($item!=null) {
            echo $item . '<br>';
            $itemCounter++;
          }
        } while($item != null);
        echo '</td><td class="third-child">';
        // Reset the counter
        $qtyCounter = 1;
        do {
          $itemQty = $_POST['c-qty'.$qtyCounter];
          echo $itemQty . '<br>';
          $qtyCounter++;
        } while($qtyCounter != $itemCounter);
        echo '</td></tr>';
      } 
    ?>
    
    <!-- Sashimi -->
    <?php 
      // Reset the item total
      $itemTotal = 0;
    
      for($i=1; $i<=5; $i++) {
        $itemQty = $_POST['sa-qty'.$i];
        if($itemQty==null) {
          $itemQty = 0;
        }
        $itemTotal += $itemQty;
      }
      if($itemTotal != 0) {
        echo '<tr><td class="first-child">Sashimi</td><td class="second-child">';
        // Set the counter
        $itemCounter = 1;
        
        do {
          $item = $_POST['sa-item'.$itemCounter];
          if($item!=null) {
            echo $item . '<br>';
            $itemCounter++;
          }
        } while($item != null);
        echo '</td><td class="third-child">';
        // Reset the counter
        $qtyCounter = 1;
        do {
          $itemQty = $_POST['sa-qty'.$qtyCounter];
          echo $itemQty . '<br>';
          $qtyCounter++;
        } while($qtyCounter != $itemCounter);
        echo '</td></tr>';
      } 
    ?>
    
    <!-- Appetizer -->
    <?php 
      // Reset the item total
      $itemTotal = 0;
    
      for($i=1; $i<=5; $i++) {
        $itemQty = $_POST['a-qty'.$i];
        if($itemQty==null) {
          $itemQty = 0;
        }
        $itemTotal += $itemQty;
      }
      if($itemTotal != 0) {
        echo '<tr><td class="first-child">Appetizer</td><td class="second-child">';
        // Set the counter
        $itemCounter = 1;
        
        do {
          $item = $_POST['a-item'.$itemCounter];
          if($item!=null) {
            echo $item . '<br>';
            $itemCounter++;
          }
        } while($item != null);
        echo '</td><td class="third-child">';
        // Reset the counter
        $qtyCounter = 1;
        do {
          $itemQty = $_POST['a-qty'.$qtyCounter];
          echo $itemQty . '<br>';
          $qtyCounter++;
        } while($qtyCounter != $itemCounter);
        echo '</td></tr>';
      } 
    ?>
    
    <!-- Hot Dish -->
    <?php 
      // Reset the item total
      $itemTotal = 0;
    
      for($i=1; $i<=10; $i++) {
        $itemQty = $_POST['h-qty'.$i];
        if($itemQty==null) {
          $itemQty = 0;
        }
        $itemTotal += $itemQty;
      }
      if($itemTotal != 0) {
        echo '<tr><td class="first-child">Hot Dish</td><td class="second-child">';
        // Set the counter
        $itemCounter = 1;
        
        do {
          $item = $_POST['h-item'.$itemCounter];
          if($item!=null) {
            echo $item . '<br>';
            $itemCounter++;
          }
        } while($item != null);
        echo '</td><td class="third-child">';
        // Reset the counter
        $qtyCounter = 1;
        do {
          $itemQty = $_POST['h-qty'.$qtyCounter];
          echo $itemQty . '<br>';
          $qtyCounter++;
        } while($qtyCounter != $itemCounter);
        echo '</td></tr>';
      } 
    ?>
  </table> 
  <?php endif; ?>
<?php endif; ?>
<?php 
$html = ob_get_contents();
ob_end_clean();

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'portrait');
$dompdf->render();

$font = Font_Metrics::get_font("helvetica", "bold");
$dompdf->get_canvas()->page_text(72, 18, $phone.".pdf: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));  
  
// Reactivamos los warning            
error_reporting(E_ALL ^ E_NOTICE);  

$output = $dompdf->output();
file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/catering_order/'.$phone.'.pdf', $output);

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer();                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtpout.secureserver.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'cateringsmtp@us.katsu-yagroup.com';                 // SMTP username
    $mail->Password = 'Ca12345!';                           // SMTP password
    $mail->SMTPSecure = null;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 80;                                     // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);
      
    //$mail->addAddress('yinagaki@us.seeknetusa.com', 'Yoshitaka Inagaki');
    $mail->addAddress('catering@katsu-yagroup.com', 'KATSU-YA CATERING');     // Add a recipient
    //$mail->addCc('wpcrane312@gmail.com', 'Yukiko Tsurumura');
    //$mail->addCc('yinagaki@us.seeknetusa.com', 'Yoshitaka Inagaki');
    //$mail->addCc('developer@seeknetusa.com');
    $mail->addReplyTo('catering@katsu-yagroup.com', 'KATSU-YA CATERING');
	 //$mail->addReplyTo('yukifel312@gmail.com', 'KATSU-YA CATERING');
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Order Notification - www.katsu-yagroup.com Catering';
    $mail->Body    = 'You got a new catering order from https://www.katsu-yagroup.com/. <br>About the order detail, please check the attachment. ';
    $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'] . '/catering_order/'.$phone.'.pdf', $phone.".pdf");  
  
    echo "<p style='margin-top: 50px; margin-bottom: 50px; text-align: center; font-size: 18px;'>Thank you for the order. We'll get back to you shortly.<br><br><a href='https://www.katsu-yagroup.com/'>Go back to the top</a><br></p><br><br><p style='text-align: center;'>Copyright &copy;".date("Y")." KATSU-YA GROUP. All Rights Reserved.</p>";
    $mail->send();
  
    $mail->setFrom('catering@katsu-yagroup.com','KATSU-YA');
    $mail->AddAddress($email, $name);
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'KATSU-YA CATERING - Order Confirmation';
    $mail->Body    = 'Thank you for ordering our catering.<br>Please check the attachment to confirm your order.<br>We\'ll contact you shortly.';
    $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'] . '/catering_order/'.$phone.'.pdf', $phone.".pdf");
    $mail->send();
  
} catch (Exception $e) {
    echo "<p style='margin-top: 50px; margin-bottom: 50px; text-align: center; font-size: 18px;'>Sorry Error occurred, please try again. ";  
}
?>
</body>
</html>