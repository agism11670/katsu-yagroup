<?php $motourl = $_SERVER['HTTP_REFERER']; ?>
<?php if($motourl == home_url().'/catering/catering-service/catering-plan-a/' || home_url().'/catering/catering-service/catering-plan-b/' || home_url().'/catering/catering-service/catering-plan-c/' || home_url().'/catering/catering-service/catering-plan-d/' || home_url().'/catering/catering-service/full-custom-order/'): ?>
<?php
function formatString($input) {
	return preg_replace('/(.*?) \(\$(\d+)\+\)/', '$$2 ($1)', $input);
}
function getPrice($input) {
	if (preg_match('/\$(\d+)/', $input, $matches)) {
		return $matches[1] . "\n";
	}
	return 0;
}
?>
<?php 
	$extra = ""; 
	$extra_price = 0;
?>
<div id="confirm">
	<form action="<?php echo get_stylesheet_directory_uri(); ?>/catering_new/catering_sender.php" method="post" id="finalconfirm">
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
		$event3 = $_POST['timestart']; 
		$event4 = $_POST['timeend']; 
		$event5 = $_POST['c-location']; 
		$event6 = $_POST['adults-num']; 
		$event7 = $_POST['kids-num']; 
		if($event6=='') {$event6=0;}
		if($event7=='') {$event7=0;}
        // OTHER REQUEST
		$request1 = $_POST['c-memo']; 
		$request2 = $_POST['c-allergy']; 
		$request3 = $_POST['c-preference']; 
		?>
		<section id="confirm-sc1" class="confirm-form mb-md" aria-labelledby="confirmation-title1">
			<h2 id="confirmation-title1" class="text-center h-lg allcap mb-5">Order Summarys</h2>
			<div class="row gx-lg-5 gy-5">
				<div class="col-lg-12">
					<h3 class="confirm-title mb-4">Item</h3>
					<!-- Items -->
					<?php $plan = $_POST['plan']; // Plan ?>
					<input tabindex="-1" type="hidden" value="<?php echo $plan; ?>" name="plan" checked="checked">
					<fieldset>
						<!-- Sushi -->
						<div class="wrap mb-4">
							<h4 class="wrap__title mb-3"><?php echo $plan; ?></h4>
							<h5 class="wrap__title-sm mb-2">Sushi</h5>
							<ul class="list-style-none wrap__list mb-4">
								<?php
								$sushiArray = array('Tuna', 'Yellowtail', 'Salmon', 'Albacore', 'Shrimp', 'WhiteFish', 'Octopus', 'Squid', 'Jumbo Scallop', 'Fresh Water Eel', 'Sea Eel', 'Egg', 'Mackerel', 'Mixed Scallop', 'Blue Fin Tuna ($2+)', 'Toro ($4+)', 'Sea Urchin ($3+)', 'Snow Crab ($2+)', 'Salmon w/Caviar ($2+)', 'Salmon Egg ($2+)', 'Smelt Egg ($1+)');
								?>
								<?php
								$counter=1;
								for($i=1; $i<=21; $i++) {
									if (!isset($_POST['sushi-qty'.$i])) {continue;}
									$checked = $_POST['sushi-qty' . $i];
									if (empty($checked)) {continue;}
									if($_POST['sushi-qty'.$i]) {
										echo '<li><input tabindex="-1" type="text" value="'.$sushiArray[$i-1].'" name="sushi'.$counter.'" readonly></li>';
										if (strpos($sushiArray[$i-1], '$') !== false) {
										    $extra .= " + ".formatString($sushiArray[$i-1]);
										    $extra_price += getPrice($sushiArray[$i-1]);
										}
										$counter++;
									}
								}
								?>
							</ul>
							<!-- #Sushiのトータル個数 -->
							<input tabindex="-1" type="hidden" value="<?php echo $counter; ?>" name="sushiNum" checked="checked">
							
							<!-- Roll -->
							<?php if($plan == 'PLAN A' || $plan == 'PLAN B' || $plan == 'FULL CUSTOM'): ?>
							<h5 class="wrap__title-sm mb-2">Rolls</h5>
							<ul class="list-style-none wrap__list mb-4">
								<?php
								$rollArray = array('Cucumber Roll', 'Avocado Roll', 'Avocado Cucumber Roll', 'Mixed Vegetable Roll', 'Mixed Veg Tempura Roll', 'California Roll', 'Blue Crab Roll', 'Baked Crab Roll', 'Tuna Roll', 'Spicy Tuna Roll', 'Spicy Yellowtail Roll', 'Spicy Albacore Roll', 'Spicy Salmon Roll', 'Baked Salmon Roll', 'Cajun Salmon Roll', 'Creamy Salmon Roll', 'Shrimp Tempura Roll', 'Salmon Avocado', 'Yellowtail Scallion');
								?>
								<?php
								$counter=1;
								for($i=1; $i<=21; $i++) {
									if (!isset($_POST['roll-qty'.$i])) {continue;}
									$checked = $_POST['roll-qty' . $i];
									if (empty($checked)) {continue;}
									if($_POST['roll-qty'.$i]) {
										echo '<li><input tabindex="-1" type="text" value="'.$rollArray[$i-1].'" name="roll'.$counter.'" readonly></li>';
										if (strpos($rollArray[$i-1], '$') !== false) {
										    $extra .= " + ".formatString($rollArray[$i-1]);
										    $extra_price += getPrice($rollArray[$i-1]);
										}
										$counter++;
									}
								}
								?>
							</ul>
							<!-- #Rollのトータル個数 -->
							<input tabindex="-1" type="hidden" value="<?php echo $counter; ?>" name="rollNum" checked="checked">
							<?php endif; ?>
							
							<!-- SPECIAL ROLLS -->
							<?php if($plan == 'PLAN C' || $plan == 'FULL CUSTOM'): ?>
							<h5 class="wrap__title-sm mb-2">Special Rolls</h5>
							<ul class="list-style-none wrap__list mb-4">
								<?php
								$spRollArray = array('Eel Cucumber Roll', 'Eel Avocado Roll', 'Sunset Roll', 'Rainbow Roll', 'Robert Roll', '4 1/2 Roll', 'Spider Roll', 'Izakaya Roll', 'Popcorn Shrimp on Spicy Tuna');
								?>
								<?php
								$counter=1;
								for($i=1; $i<=21; $i++) {
									if (!isset($_POST['sproll-qty'.$i])) {continue;}
									$checked = $_POST['sproll-qty' . $i];
									if (empty($checked)) {continue;}
									if($_POST['sproll-qty'.$i]) {
										echo '<li><input tabindex="-1" type="text" value="'.$spRollArray[$i-1].'" name="sproll'.$counter.'" readonly></li>';
										if (strpos($spRollArray[$i-1], '$') !== false) {
										    $extra .= " + ".formatString($spRollArray[$i-1]);
										    $extra_price += getPrice($spRollArray[$i-1]);
										}
										$counter++;
									}
								}
								?>
							</ul>
							<!-- #SPECIAL ROLLSのトータル個数 -->
							<input tabindex="-1" type="hidden" value="<?php echo $counter; ?>" name="sprollNum" checked="checked">
							<?php endif; ?>
							
							<!-- KATSUYA CREATION -->
							<h5 class="wrap__title-sm mb-2">Katsu-ya Creations</h5>
							<ul class="list-style-none wrap__list mb-4">
								<?php
								$creationArray = array('Crispy Rice w/Spicy Tuna', 'Yellowtail Sashimi w/Jalapeno', 'Seared Albacore Sashimi w/Crispy Onion', 'Crispy Sesame Tuna on Wonton Chips', 'White Fish Carpaccio', 'Salmon Sashimi w/Black Caviar', 'Tuna Sashimi w/Arugula Salad');
								?>
								<?php
								$counter=1;
								for($i=1; $i<=21; $i++) {
									if (!isset($_POST['creation-qty'.$i])) {continue;}
									$checked = $_POST['creation-qty' . $i];
									if (empty($checked)) {continue;}
									if($_POST['creation-qty'.$i]) {
										echo '<li class="w-100"><input tabindex="-1" type="text" value="'.$creationArray[$i-1].'" name="creation'.$counter.'" readonly></li>';
										if (strpos($creationArray[$i-1], '$') !== false) {
										    $extra .= " + ".formatString($creationArray[$i-1]);
										    $extra_price += getPrice($creationArray[$i-1]);
										}
										$counter++;
									}
								}
								?>
							</ul>
							<!-- #KATSUYA CREATIONのトータル個数 -->
							<input tabindex="-1" type="hidden" value="<?php echo $counter; ?>" name="creationNum" checked="checked">
							
							<!-- Sashimi -->
							<?php if($plan == 'PLAN D' || $plan == 'FULL CUSTOM'): ?>
							<h5 class="wrap__title-sm mb-2">Sashimi</h5>
							<ul class="list-style-none wrap__list mb-4">
								<?php
								$sashimiArray =array('Tuna', 'Yellowtail', 'Salmon', 'Albacore', 'White Fish');
								?>
								<?php
								$counter=1;
								for($i=1; $i<=21; $i++) {
									if (!isset($_POST['sashimi-qty'.$i])) {continue;}
									$checked = $_POST['sashimi-qty' . $i];
									if (empty($checked)) {continue;}
									if($_POST['sashimi-qty'.$i]) {
										echo '<li><input tabindex="-1" type="text" value="'.$sashimiArray[$i-1].'" name="sashimi'.$counter.'" readonly></li>';
										if (strpos($sashimiArray[$i-1], '$') !== false) {
										    $extra .= " + ".formatString($sashimiArray[$i-1]);
										    $extra_price += getPrice($sashimiArray[$i-1]);
										}
										$counter++;
									}
								}
								?>
							</ul>
							<!-- #Sashimiのトータル個数 -->
							<input tabindex="-1" type="hidden" value="<?php echo $counter; ?>" name="sashimiNum" checked="checked">
							<?php endif; ?>
							
							<!-- APPETIZER -->
							<?php if($plan == 'PLAN B' || $plan == 'PLAN D' || $plan == 'FULL CUSTOM'): ?>
							<h5 class="wrap__title-sm mb-2">Appetizer</h5>
							<ul class="list-style-none wrap__list mb-4">
								<?php
								$appArray = array('Edamame', 'Chilli Edamame', 'Cucumber Salad', 'Seaweed Salad', 'Garden Salad', 'Sauteed Green Beans', 'Sauteed Asparagus', 'Shishito Papper', 'Grilled Vegetable', 'Brussel Sprouts', 'Garlic Pumpkin');
								?>
								<?php
								$counter=1;
								for($i=1; $i<=21; $i++) {
									if (!isset($_POST['app-qty'.$i])) {continue;}
									$checked = $_POST['app-qty' . $i];
									if (empty($checked)) {continue;}
									if($_POST['app-qty'.$i]) {
										echo '<li><input tabindex="-1" type="text" value="'.$appArray[$i-1].'" name="app'.$counter.'" readonly></li>';
										if (strpos($appArray[$i-1], '$') !== false) {
										    $extra .= " + ".formatString($appArray[$i-1]);
										    $extra_price += getPrice($appArray[$i-1]);
										}
										$counter++;
									}
								}
								?>
							</ul>
							<!-- #APPETIZERのトータル個数 -->
							<input tabindex="-1" type="hidden" value="<?php echo $counter; ?>" name="appNum" checked="checked">
							<?php endif; ?>
							
							<!-- Hot Dish -->
							<?php if($plan == 'PLAN C' || $plan == 'PLAN D' || $plan == 'FULL CUSTOM'): ?>
							<h5 class="wrap__title-sm mb-2">Hot Dish</h5>
							<ul class="list-style-none wrap__list mb-4">
								<?php
								$hotArray = array('Chicken Teriyaki', 'Apple Ginger Chicken', 'Chicken Meatball Skewers', 'Beef Teriyaki', 'Sauteed Salmon Fillet Butter Soy', 'Salmon Teriyaki', 'Miso Marinated Black Cod', 'Creamy Popcorn Shrimp', 'Assorted Tempura', 'Vegetable Tempura');
								?>
								<?php
								$counter=1;
								for($i=1; $i<=21; $i++) {
									if (!isset($_POST['hot-qty'.$i])) {continue;}
									$checked = $_POST['hot-qty' . $i];
									if (empty($checked)) {continue;}
									if($_POST['hot-qty'.$i]) {
										echo '<li><input tabindex="-1" type="text" value="'.$hotArray[$i-1].'" name="hot'.$counter.'" readonly></li>';
										if (strpos($hotArray[$i-1], '$') !== false) {
										    $extra .= " + ".formatString($hotArray[$i-1]);
										    $extra_price += getPrice($hotArray[$i-1]);
										}
										$counter++;
									}
								}
								?>
							</ul>
							<!-- #Hot Dishのトータル個数 -->
							<input tabindex="-1" type="hidden" value="<?php echo $counter; ?>" name="hotNum" checked="checked">
							<?php endif; ?>
							
							<!-- Hand Roll -->
							<?php if($plan == 'PLAN D'): ?>
							<h5 class="wrap__title-sm mb-2">Hand Roll</h5>
							<ul class="list-style-none wrap__list mb-4">
								<?php
								$hrollArray = array('Spicy Tuna', 'Tuna', 'Spicy Albacore', 'Yellowtail Scallion', 'Spicy Yellowtail', 'Salmon & Avocado', 'Spicy Salmon', 'Vegetable');
								?>
								<?php
								$counter=1;
								for($i=1; $i<=21; $i++) {
									if (!isset($_POST['hroll-qty'.$i])) {continue;}
									$checked = $_POST['hroll-qty' . $i];
									if (empty($checked)) {continue;}
									if($_POST['hroll-qty'.$i]) {
										echo '<li><input tabindex="-1" type="text" value="'.$hrollArray[$i-1].'" name="hroll'.$counter.'" readonly></li>';
										if (strpos($hrollArray[$i-1], '$') !== false) {
										    $extra .= " + ".formatString($hrollArray[$i-1]);
										    $extra_price += getPrice($hrollArray[$i-1]);
										}
										$counter++;
									}
								}
								?>
							</ul>
							<!-- #Hand Rollのトータル個数 -->
							<input tabindex="-1" type="hidden" value="<?php echo $counter; ?>" name="hrollNum" checked="checked">
							<?php endif; ?>
							
							<!-- Total Price -->
							<div class="confirm-form-total" id="totalprice">
								<?php 
								$price = 0;
								switch($plan) {
									case 'PLAN A':
										$price = 55;
										break;
									case 'PLAN B':
										$price = 65;
										break;
									case 'PLAN C':
										$price = 75;
										break;
									case 'PLAN D':
										$price = 85;
										break;
								}
								
								if($price !== 0):
								?>
								<label for="grandtotal" class="confirm-form-total__label d-block mb-2">Approximate Price: </label> 
								<input tabindex="-1" type="hidden" value="<?php echo '$'.$price.$extra ; ?> = $<?php echo $price+$extra_price; ?>" name="grandtotal" id="grandtotal">
            					<p><?php echo '$'.$price.$extra ; ?> = $<?php echo $price+$extra_price; ?> / per person</p>
								<?php if ($event1 == "Formal Table Service (Sit down dinner/ Servers and chefs serve food)"): ?>
            					<p class="mt-2" style="line-height: 1.4;"><span class="text-danger">*</span> <strong><small>Labor and Service fees very based on event size and personalized requests. See the price or fee list below;</small></strong></p>
           						<?php endif; ?>
								<?php endif; ?>
								<?php if ($event1 == "Live Sushi Bar (Chef onsite)" || $event1 == "Formal Table Service (Sit down dinner/ Servers and chefs serve food)"): ?>
								<table aria-labelledby="catering-fee-title" border="1"  class="table confirm-form-table my-3">
									<caption id="catering-fee-title">Catering Setup &amp; Travel Fee</caption>
									<thead>
										<tr>
											<th scope="col">Guest Count</th>
											<th scope="col">Fee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Up to 50 guests</td>
											<td>$800</td>
										</tr>
										<tr>
											<td>Up to 100 guests</td>
											<td>$1000</td>
										</tr>
										<tr>
											<td>Up to 180 guests</td>
											<td>$1500</td>
										</tr>
										<tr>
											<td>Up to 250 guests</td>
											<td>$2000</td>
										</tr>
									</tbody>
								</table>
								<table aria-labelledby="sushi-labor-title" border="1" class="table confirm-form-table">
									<caption id="sushi-labor-title">Labor for Live Sushi (basic 2-hour service)</caption>
									<thead>
										<tr>
											<th scope="col">Guest Count</th>
											<th scope="col">Fee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Up to 50 guests</td>
											<td>$1250-$1500</td>
										</tr>
										<tr>
											<td>50 to 70 guests</td>
											<td>$1500-$2000</td>
										</tr>
										<tr>
											<td>70 to 120 guests</td>
											<td>$2000-$2500</td>
										</tr>
										<tr>
											<td>120 to 170 guests</td>
											<td>$2500-$3000</td>
										</tr>
										<tr>
											<td>Over 170 guests</td>
											<td>$3000-</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2" class="text-left"><small>Minimum 35 guests, $3000 for live sushi service. <br>This price list is for estimation purposes only, and the amount may vary depending on the cuisine and service style.</small></td>
										</tr>
									</tfoot>
								</table>
								<?php else: ?>
								<table aria-labelledby="delivery-price-title" border="1" class="table confirm-form-table mt-4">
									<caption id="delivery-price-title">Delivery Price List (Round Trip)</caption>
									<thead>
										<tr>
											<th scope="col">Distance</th>
											<th scope="col">Price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Less than 5 miles</td>
											<td>$25</td>
										</tr>
										<tr>
											<td>More than 5 to less than 20 miles</td>
											<td>$50</td>
										</tr>
										<tr>
											<td>More than 20 to less than 50 miles</td>
											<td>$200</td>
										</tr>
										<tr>
											<td>More than 50 miles</td>
											<td>$300</td>
										</tr>
									</tbody>
								</table>
								<?php endif; ?>
							</div>
						</div>
					</fieldset>
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
						<!-- Event Start -->
						<div class="wrap2">
							<label for="event3">Event Start: </label> <input tabindex="-1" type="text" value="<?php echo $event3; ?>" name="event3" id="event3" readonly>
						</div>
						<div class="wrap2">
							<!-- Event End -->
							<label for="event4">Event End: </label> <input tabindex="-1" type="text" value="<?php echo $event4; ?>" name="event4" id="event4" readonly>
						</div>
						<div class="wrap2">	
							<!-- Catering Location -->
							<label for="event5">Catering Location: </label> <input tabindex="-1" type="text" value="<?php echo $event5; ?>" name="event5" id="event5" readonly>
						</div>
						<div class="wrap2">	
							<!-- Adult -->
							<label for="event6">Adults: </label> <input tabindex="-1" type="text" value="<?php echo $event6; ?>" name="event6" id="event6" readonly>
						</div>
						<div class="wrap2">	
							<!-- Adult -->
							<label for="event7">Kids: </label> <input tabindex="-1" type="text" value="<?php echo $event7; ?>" name="event7" id="event7" readonly>
						</div>
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