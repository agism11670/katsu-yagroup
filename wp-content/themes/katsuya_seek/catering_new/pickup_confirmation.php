<?php $motourl = $_SERVER['HTTP_REFERER']; ?>
<?php if($motourl == home_url().'/catering/pickup-service/'): ?>
<div id="confirm">
	<form action="<?php echo get_template_directory_uri(); ?>/catering_new/pickup_sender.php" method="post" id="finalconfirm">
		<section id="confirm-sc1" class="confirm-form mb-md" aria-labelledby="confirmation-title1">
			<h2 id="confirmation-title1" class="text-center h-lg allcap mb-5">Order Summarys</h2>
			<div class="row gx-lg-5 gy-5">
				<div class="col-lg-12">
					<!-- Items -->
					<?php 
					$pickup1 = intval($_POST['family-a-qty']); 
					$pickup2 = intval($_POST['family-b-qty']); 
					$pickup3 = intval($_POST['sushiplatter']); 
					$pickup4 = intval($_POST['rollplatter']); 
					//$pickup5 = $_POST['lunch-box-qty']; 
					
					// Sushi Platter Item
					$pickup3_item = array(intval($_POST['tuna-p-qty']), intval($_POST['yellowtail-p-qty']), intval($_POST['salmon-p-qty']), intval($_POST['albacore-p-qty']), intval($_POST['shrimp-p-qty']), intval($_POST['eel-p-qty']), intval($_POST['whitefish-p-qty']));
					$pickup3ItemArray = array('Tuna', 'Yellowtail', 'Salmon', 'Albacore', 'Shrimp', 'F W Eel', 'Whitefish');
				
					// Roll Platter Item
					$pickup4_item = array(intval($_POST['spicyt-p-qty']), intval($_POST['cali-p-qty']), intval($_POST['ysca-p-qty']), intval($_POST['avo-p-qty']), intval($_POST['creamys-p-qty']), intval($_POST['crab-p-qty']));
					$pickup4ItemArray = array('Spicy Tuna', 'California', 'Yellow Scallion', 'Cucumber Avocado', 'Creamy Salmon', 'Baked Crab');
					?>
					<?php 
          			// CONTACT INFORMATION 
          			$contact1 = $_POST['c-f-name']; 
          			$contact2 = $_POST['c-f-phone']; 
          			$contact3 = $_POST['c-f-company']; 
          			$contact4 = $_POST['c-f-cell']; 
          			$contact5 = $_POST['c-f-email']; 
          			// EVENT INFORMATION
          			$event1 = $_POST['event']; 
          			$event2 = $_POST['date']; 
          			$event3 = $_POST['time']; 
          			$event4 = $_POST['p-location']; 
          			$event5 = $_POST['d-location']; 
          			// OTHER REQUEST
          			$request1 = $_POST['c-memo']; 
          			$request2 = $_POST['c-allergy']; 
          			$request3 = $_POST['c-preference']; 
					?>
					<h3 class="confirm-title mb-4">Item</h3>
					
					<!-- Family take out A -->
					<?php if($pickup1 != 0): ?>
					<?php $pickup1Price = $pickup1*110; ?>
					<div class="wrap">
						<h4 class="wrap__title mb-3">Family Take Out(A)</h4>
						<div class="d-flex align-item-center mb-2">
							<label for="pickup1" class="wrap__label">Quantity: </label> <input tabindex="-1" type="text" value="<?php echo $pickup1; ?>" name="pickup1" id="pickup1" readonly>
						</div>
						<input tabindex="-1" type="text" value="<?php echo '$'.$pickup1Price; ?>" name="pickup1_price" id="pickup1_price" readonly>
					</div>
					<?php endif; ?>
					
					<!-- Family take out B -->
					<?php if($pickup2 != '' && $pickup2 != 0): ?>
					<?php $pickup2Price = $pickup2*195; ?>
					<div class="wrap">
						<h4 class="wrap__title mb-3">Family Take Out(B)</h4>
						<div class="d-flex align-item-center mb-2">
							<label for="pickup2" class="wrap__label">Quantity: </label> <input tabindex="-1" type="text" value="<?php echo $pickup2; ?>" name="pickup2" id="pickup2" readonly>
						</div>
						<input tabindex="-1" type="text" value="<?php echo '$'.$pickup2Price; ?>" name="pickup2_price" id="pickup2_price" readonly>
					</div>	
					<?php endif; ?>
					
					<!-- Sushi Platter -->
					<?php if($pickup3 != 0): ?>
					<?php $pickup3Price = $pickup3*3.6; ?>
					<?php $pickup3Types = $pickup3/5; ?>
					<div class="wrap">
						<h4 class="wrap__title mb-3">Sushi Platter</h4>
						<ul class="list-style-none list-style-default mb-4">
							<?php $sushiNum = 0; ?>
							<?php for($i=0; $i<7; $i++): ?>
								<?php if($pickup3_item[$i] != 0): ?>
									<li><input tabindex="-1" type="text" value="<?php echo $pickup3ItemArray[$i]; ?> x <?php echo $pickup3_item[$i]; ?>" name="pickup3_item<?php echo $sushiNum; ?>" readonly></li>
									<?php $sushiNum++; ?>
								<?php endif; ?>
							<?php endfor; ?>
						</ul>
						<div class="d-flex align-item-center mb-2">
							<label for="pickup3" class="wrap__label">Quantity: </label> <input tabindex="-1" type="text" value="<?php echo $pickup3; ?> pcs (<?php echo $pickup3Types; ?> pcs per type)" name="pickup3" id="pickup3" readonly>
						</div>
						<input tabindex="-1" type="text" value="<?php echo '$'.$pickup3Price; ?>" name="pickup3_price" id="pickup3_price" readonly>
						<!-- 寿司の種類の数を渡す -->
						<input tabindex="-1" type="hidden" name="sushinum" value="<?php echo $sushiNum; ?>" checked="checked">
						<!-- #寿司の種類の数を渡す -->
					</div>
					<?php endif; ?>
					
					<!-- Roll Platter -->
					<?php if($pickup4 != 0): ?>
					<?php 
					if($pickup4_item[5] != '' || $pickup4_item[5] != 0) {
						$pickup4Price = $pickup4*16 + ($pickup4_item[5]*1*$pickup4); 
					} else {
						$pickup4Price = $pickup4*16;
					}
					?>
					<div class="wrap">
						<h4 class="wrap__title mb-3">Roll Platter</h4>
						<ul class="list-style-none list-style-default mb-4">
							<?php $rollNum = 0; ?>
							<?php for($i=0; $i<6; $i++): ?>
								<?php if($pickup4_item[$i] != 0): ?>
									<li><input tabindex="-1" type="text" value="<?php echo $pickup4ItemArray[$i]; ?> x <?php echo $pickup4_item[$i]; ?>" name="pickup4_item<?php echo $rollNum; ?>" readonly></li>
									<?php $rollNum++; ?>
								<?php endif; ?>
							<?php endfor; ?>
						</ul>
						<div class="d-flex align-item-center mb-2">
							<label for="pickup4" class="wrap__label">Quantity: </label> 
							<input tabindex="-1" type="text" value="<?php echo $pickup4; ?> people" name="pickup4" id="pickup4" readonly>
						</div>
						<input tabindex="-1" type="text" value="<?php echo '$'.$pickup4Price; ?>" name="pickup4_price" id="pickup4_price" readonly>
						<!-- ロールの種類の数を渡す -->
						<input tabindex="-1" type="hidden" name="rollnum" value="<?php echo $rollNum; ?>" checked="checked">
					</div>
					<?php endif; ?>
					
					<!-- Total Price -->
					<div class="confirm-form-total" id="totalprice">
						<?php $grandTotal = $pickup1Price + $pickup2Price + $pickup3Price + $pickup4Price; ?>
						<label for="grandtotal" class="confirm-form-total__label d-block mb-2">Food &amp; Beverage Price: </label> <input tabindex="-1" type="text" value="<?php echo '$'.$grandTotal.' plus sales tax'; ?>" name="grandtotal" id="grandtotal" readonly>
					</div>
					<?php if($event1 == "Delivery"): ?>
					<p class="mt-3" style="line-height: 1.4;"><span class="text-danger">*</span> <strong>Additional delivery charge will be applied for delivery order. See the price list below;</strong></p>
					<table aria-labelledby="delivery-price-title " border="1" class="table confirm-form-table">
						<caption id="delivery-price-title">Delivery Price List (Round Trip)</caption>
						<thead>
							<tr>
								<th scope="col">Distance</th>
								<th scope="col">Price</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Up to 5 miles</td>
								<td>$25</td>
							</tr>
							<tr>
								<td>6 to 20 miles</td>
								<td>$50</td>
							</tr>
							<tr>
								<td>21 to 50 miles</td>
								<td>$200</td>
							</tr>
							<tr>
								<td>Over 50 miles</td>
								<td>$300</td>
							</tr>
						</tbody>
					</table>
					<?php endif; ?>
				</div>
				<div class="col-lg-12">
					<fieldset class="mb-5">
						<h3 class="confirm-title mb-4">Contact Information</h3>
						<div class="wrap2">
							<!-- Customer Name -->
							<label for="contact1">Customer Name: </label> 
							<input tabindex="-1" type="text" value="<?php echo $contact1; ?>" name="contact1" id="contact1" readonly>
						</div>
						
						<!-- PHONE NUMBER -->
						<div class="wrap2">
							<label for="contact2">Phone Number: </label> 
							<input tabindex="-1" type="text" value="<?php echo $contact2; ?>" name="contact2" id="contact2" readonly>
						</div>
						<!-- COMPANY NAME -->
						<?php if($contact3): ?>
						<div class="wrap2">
							<label for="contact3">Company Name: </label> 
							<input tabindex="-1" type="text" value="<?php echo $contact3; ?>" name="contact3" id="contact3" readonly>
						</div>
						<?php endif; ?>
						
						<!-- CELL PHONE NUMBER -->
						<?php if($contact4): ?>
						<div class="wrap2">
							<label for="contact4">Cell Phone Number: </label> 
							<input tabindex="-1" type="text" value="<?php echo $contact4; ?>" name="contact4" id="contact4" readonly>
						</div>
						<?php endif; ?>
						
						<!-- CELL PHONE NUMBER -->
						<div class="wrap2">
							<label for="contact5">Email Address: </label> 
							<input tabindex="-1" type="text" value="<?php echo $contact5; ?>" name="contact5" id="contact5" readonly>
						</div>
					</fieldset>
					
					<!-- EVENT INFORMATION -->
					<fieldset class="mb-5">
						<h3 class="confirm-title mb-4">Contact Information</h3>
						<!-- Pickup or Delivery -->
						<div class="wrap2">
							<label for="event1">Event Type: </label> 
							<input tabindex="-1" type="text" value="<?php echo $event1; ?>" name="event1" id="event1" readonly>
						</div>
						<!-- Event Date -->
						<div class="wrap2">
							<label for="event2">Event Date: </label> 
							<input tabindex="-1" type="text" value="<?php echo $event2; ?>" name="event2" id="event2" readonly>
						</div>
						<!-- PICK UP OR Delivery TIME -->
						<div class="wrap2">
							<label for="event3">Pick Up or Delivery Time: </label> 
							<input tabindex="-1" type="text" value="<?php echo $event3; ?>" name="event3" id="event3" readonly>
						</div>
						<!-- PICK UP LOCATION -->
						<?php if($event1 == "Pick up"): ?>
						<div class="wrap2">	
							<label for="event4">Pick Up Location: </label> 
							<input tabindex="-1" type="text" value="<?php echo $event4; ?>" name="event4" id="event4" readonly>
						</div>
						<!-- Delivery LOCATION -->
						<?php else: ?>
						<div class="wrap2">
							<label for="event5">Delivery Address: </label> 
							<input tabindex="-1" type="text" value="<?php echo $event5; ?>" name="event5" id="event5" readonly>
						</div>
						<?php endif; ?>
					</fieldset>
					
					<!-- OTHER REQUEST -->
					<fieldset>
						<h3 class="confirm-title mb-4">Contact Information</h3>
						<!-- MEMO -->
						<div class="wrap2">
							<label for="request1">Memo: </label> 
							<textarea tabindex="-1" type="text" name="request1" id="request1" readonly><?php echo $request1; ?></textarea><br>
						</div>
						<!-- ALLERGY -->
						<div class="wrap2">
							<label for="request2">Allergy: </label> 
							<textarea tabindex="-1" type="text" name="request2" id="request2" readonly><?php echo $request2; ?></textarea>
						</div>
						<!-- PREFERENCE -->
						<div class="wrap2">
							<label for="request3">Preference: </label> 
							<textarea tabindex="-1" type="text" name="request3" id="request3" readonly><?php echo $request3; ?></textarea>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="d-flex justify-content-center mt-5">
				<button class="btn me-3" onClick="window.history.go(-1); return false;" aria-label="Go back to the previous page">Go Back</button>
				<input type="submit" class="btn" value="Send">
			</div>
		</section>
	</form>
	<p id="success-message" class="text-center d-none" role="alert"></p>
</div>
<?php else: ?>
<?php
include( get_query_template( '404' ) );
exit();
?>
<?php endif; ?>