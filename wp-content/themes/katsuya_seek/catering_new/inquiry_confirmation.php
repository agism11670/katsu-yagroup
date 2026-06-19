<?php $motourl = $_SERVER['HTTP_REFERER']; ?>
<?php if($motourl == home_url().'/catering/inquiry/'): ?>
<div id="confirm">
	<form action="<?php echo get_template_directory_uri(); ?>/catering_new/inquiry_sender.php" method="post" id="finalconfirm">
		<section id="confirm-sc1" class="confirm-form mb-md" aria-labelledby="confirmation-title1">
			<h2 id="confirmation-title1" class="text-center h-lg allcap mb-5">Order Summarys</h2>
			<div class="row gx-lg-5 gy-5">
				<div class="col-lg-12">
					<!-- CONTACT INFORMATION -->
					<?php 
					$contact1 = $_POST['c-f-name'];
					$contact2 = $_POST['c-f-phone'];
					$contact3 = $_POST['c-f-company'];
					$contact4 = $_POST['c-f-cell'];
					$contact5 = $_POST['c-f-email'];
					?>
					
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
					<?php 
					$event1 = $_POST['event']; 
					$event2 = $_POST['date']; 
					$event3 = $_POST['timestart']; 
					$event4 = $_POST['timeend']; 
					$event5 = $_POST['c-location']; 
					$event6 = $_POST['adults-num']; 
					$event7 = $_POST['kids-num']; 
					if($event6=='') {$event6=0;}
					if($event7=='') {$event7=0;}
					?>
					<!-- EVENT INFORMATION -->
					<fieldset>
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
				</div>
				<div class="col-lg-12">
					<?php 
					$request1 = $_POST['c-memo']; 
					$request2 = $_POST['c-allergy']; 
					$request3 = $_POST['c-preference']; 
					?>
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