<?php
	// Get the name of form
    $formName = $_POST['formtype'];
?>
<!-- need to change after confirmed -->
<?php if($formName == 'lunchbox'): ?>
<!-- Send to a test -->
<form action="https://www.katsu-yagroup.com/wp-content/themes/rosa_child/catering/pdf_converter_new.php" method="post" name="final_confirm">
<?php else: ?>
<form action="https://www.katsu-yagroup.com/wp-content/themes/rosa_child/catering/pdf_converter.php" method="post" name="final_confirm">
<?php endif; ?>
	
  <div id="main-sub-header">
    <h1>Order Confirmation</h1>
  </div>
  <?php
    echo '<input type="hidden" name="formtype" value="'.$formName.'" checked="checked">';
  ?>  
  <?php if($formName == 'catering' || $formName == 'platter' || $formName == 'full-custom' || $formName == 'lunchbox'): ?>
  <div id="order-summary">
    <h2>Your Order Summary</h2>
    <?php if($formName == 'catering'): ?>
    <!-- Catering form -->
    <table id="catering">
      <tr>
        <th class="plan">Plan</th>
        <th>Category</th>
        <th>Item</th>
        <th class="qty">Quantity</th>
      </tr>
      <!-- Sushi or special rolls -->
      <tr>
        <td>
        <?php 
          // Get the plan name
          $planName = $_POST['planName'];
          echo '<input type="text" value="'.$planName.'" name="n-plan" readonly>';
        ?>
        </td>
        <td>
          <?php 
            // Get the category name
            $catName = $_POST['category1'];
            echo '<input type="text" value="'.$catName.'" name="category1" readonly>';
          ?>
        </td>
        <td>
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
              $item = $_POST['sushi-item'.$i];
              echo '<input type="text" class="item-input" value="'.$item.'" name="s-item'.$i.'" readonly>';
            }
          ?> 
        </td>
        <td class="qty">
          <?php 
            for($i=1; $i<=$itemNum; $i++) {
              $itemQty = $_POST['sushi-qty'.$i];
              echo '<input type="text" value="'.$itemQty.'" name="s-qty'.$i.'" readonly>';
            }
          ?>
        </td>
      </tr>
      <!-- Creation -->
      <tr>
        <td></td>
        <td>
          <?php
            // Get the category name
            $catName = $_POST['category2'];
            echo '<input type="text" value="'.$catName.'" name="category2" readonly>';
          ?>
        </td>
        <td>
          <?php
           if($planName == 'PLAN A') {
             $itemNum = 3;
           } else if ($planName == 'PLAN B') {
             $itemNum = 5;
           } else if($planName == 'PLAN C') {
             $itemNum = 4;
           } else if($planName == 'PLAN D') {
             $itemNum = 3;
           } 
           for($i=1; $i<=$itemNum; $i++) {
             $item = $_POST['creation-item'.$i];
             echo '<input type="text" class="item-input" value="'.$item.'" name="c-item'.$i.'" readonly>';
           }
          ?> 
        </td>
        <td class="qty">
          <?php 
            for($i=1; $i<=$itemNum; $i++) {
              $itemQty = $_POST['creation-qty'.$i];
              echo '<input type="text" value="'.$itemQty.'" name="c-qty'.$i.'" readonly>';
            }
          ?>
        </td>
      </tr>
      
      <!-- Special Roll -->
      <?php if($planName == 'PLAN C'): ?>
      <?php
        $itemNum = 3;
      ?>
      <tr>
        <td></td>
        <td><input type="text" value="Special Roll" name="category7" readonly></td>
        <td>
          <?php
            for($i=1; $i<=$itemNum; $i++) {
             $item = $_POST['sp-item'.$i];
            echo '<input type="text" value="'.$item.'" name="sp-item'.$i.'" readonly>';
           }
          ?>
        </td>
        <td class="qty">
          <?php 
            for($i=1; $i<=$itemNum; $i++) {
              $itemQty = $_POST['sp-qty'.$i];
              echo '<input type="text" value="'.$itemQty.'" name="sp-qty'.$i.'" readonly>';
            }
          ?>
        </td>
      </tr>
      <?php endif; ?>
      
      <!-- Roll -->
      <?php 
        if($planName == 'PLAN A' || $planName == 'PLAN B'): 
          $itemNum = 5;
      ?>
      <tr>
        <td></td>
        <td><input type="text" value="Roll" name="category3" readonly></td>
        <td>
          <?php
            for($i=1; $i<=$itemNum; $i++) {
             $item = $_POST['roll-item'.$i];
             echo '<input type="text" class="item-input" value="'.$item.'" name="r-item'.$i.'" readonly>';
           }
          ?>
        </td>
        <td class="qty">
          <?php 
            for($i=1; $i<=$itemNum; $i++) {
              $itemQty = $_POST['roll-qty'.$i];
              echo '<input type="text" value="'.$itemQty.'" name="r-qty'.$i.'" readonly>';
            }
          ?>
        </td>
      </tr>
      <?php endif; ?>
      
      <!-- Sashimi -->
      <?php if($planName == 'PLAN D'): ?>
      <?php
        $itemNum = 3;
      ?>
      <tr>
        <td></td>
        <td><input type="text" value="Sashimi" name="category4" readonly></td>
        <td>
          <?php
            for($i=1; $i<=$itemNum; $i++) {
             $item = $_POST['sashimi-item'.$i];
            echo '<input type="text" value="'.$item.'" name="sa-item'.$i.'" readonly>';
           }
          ?>
        </td>
        <td class="qty">
          <?php 
            for($i=1; $i<=$itemNum; $i++) {
              $itemQty = $_POST['sashimi-qty'.$i];
              echo '<input type="text" value="'.$itemQty.'" name="sa-qty'.$i.'" readonly>';
            }
          ?>
        </td>
      </tr>
      <?php endif; ?>
      
      <!-- Appetizer -->
      <?php 
        if($planName == 'PLAN B' || $planName == 'PLAN D'): 
          $itemNum = 3;
      ?>
      <tr>
        <td></td>
        <td><input type="text" value="Appetizer" name="category5" readonly></td>
        <td>
          <?php
            for($i=1; $i<=$itemNum; $i++) {
             $item = $_POST['app-item'.$i];
             echo '<input type="text" class="item-input"  value="'.$item.'" name="a-item'.$i.'" readonly>';
           }
          ?>
        </td>
        <td class="qty">
          <?php 
            for($i=1; $i<=$itemNum; $i++) {
              $itemQty = $_POST['app-qty'.$i];
              echo '<input type="text" value="'.$itemQty.'" name="a-qty'.$i.'" readonly>';
            }
          ?>
        </td>
      </tr>
      <?php endif; ?>
      
      <!-- Hot Dish -->
      <?php if($planName == 'PLAN C' || $planName == 'PLAN D'): ?>
      <?php
        if($planName == 'PLAN C'){
          $itemNum = 4;
        } else if ($planName == 'PLAN D') {
          $itemNum = 3;
        } 
      ?>
      <tr>
        <td></td>
        <td><input type="text" value="Hot Dish" name="category6" readonly></td>
        <td>
          <?php
            for($i=1; $i<=$itemNum; $i++) {
             $item = $_POST['hot-item'.$i];
             echo '<input type="text" class="item-input"  value="'.$item.'" name="h-item'.$i.'" readonly>';
           }
          ?>
        </td>
        <td class="qty">
          <?php 
            for($i=1; $i<=$itemNum; $i++) {
              $itemQty = $_POST['hot-qty'.$i];
              echo '<input type="text" value="'.$itemQty.'" name="h-qty'.$i.'" readonly>';
            }
          ?>
        </td>
      </tr>
      <?php endif; ?>
      
      <!-- Hand Roll -->
      <?php if($planName == 'PLAN D'): ?>
      <?php
        $itemNum = 1;
      ?>
      <tr>
        <td></td>
        <td><input type="text" value="Hand Roll" name="category8" readonly></td>
        <td>
          <?php
            for($i=1; $i<=$itemNum; $i++) {
             $item = $_POST['hr-item'.$i];
            echo '<input type="text" value="'.$item.'" name="hr-item'.$i.'" readonly>';
           }
          ?>
        </td>
        <td class="qty">
          <?php 
            for($i=1; $i<=$itemNum; $i++) {
              $itemQty = $_POST['hr-qty'.$i];
              echo '<input type="text" value="'.$itemQty.'" name="hr-qty'.$i.'" readonly>';
            }
          ?>
        </td>
      </tr>
      <?php endif; ?>
      
      <!-- Grand Total --> 
        <tr class="total">
          <td></td>
          <td></td>
          <td class="price-tag">Basic Price(per person)</td>
          <td class="price">
            <?php 
              $planFee;  
            
              if($planName=='PLAN A') {
                $planFee = 40;
              } else if($planName=='PLAN B') {
                $planFee = 50;
              } else if($planName=='PLAN C') {
                $planFee = 60;
              } else if($planName=='PLAN D') {
                $planFee = 70;
              } 
            
              echo '<p><input type="text" id="plan-basic-price" value="$ '.number_format($planFee,2).'" name="b-total" readonly></p>';
            ?>
          </td>
        </tr>
        <tr class="total2">
          <td></td>
          <td></td>
          <td class="price-tag">Additional Fee for Sushi(per person)</td>
          </td>
          <td class="price">
            <?php
              $extraFee = $_POST['plan-add-fee'];
            
              echo '<input type="text" id="add-fee" value="$ '.number_format($extraFee,2).'" name="add-total" readonly>';
            ?>
          </td>
        </tr>
        <tr class="total2">
          <td></td>
          <td></td>
          <td>Serving Quantity</td>
          </td>
          <td>
            <?php 
              $adults = $_POST['adults'];
              echo '<input type="text" value="'.$adults.'" name="adults-num" readonly>'; 
              /*
              $price = $_POST['plan-add-fee'];
              echo '<input type="text" value="$ '.number_format($price,2).'" name="add-total" readonly>'; */
            ?>
          </td>
        </tr>
        <tr class="total2">
          <td></td>
          <td></td>
          <td class="price-tag">Grand Total</td>
          <td class="price">
            <?php 
              $price = ($planFee + $extraFee) * $adults;
              echo '<input type="text" value="$ '.number_format($price,2).'" name="cg-total" readonly>';
            ?>
        </tr>
    </table>
    <!-- Platter order summary -->
    <?php elseif($formName == 'platter'): ?>
      <table id="platter">
        <tr class="platter">
          <th>Items</th>
          <th>Item Detail</th>
          <th>Quantity</th>
          <th>price</th>
        </tr>
        
        <!-- Family take out (A) -->
        <?php
          $qty = $_POST['p-q1'];
          if($qty != null):
        ?>
        <tr class="platter">
          <td><input type="text" value="FAMILY TAKE OUT(A)" name="p-item1" readonly></td>
          <td></td>
          <td class="qty"><?php echo '<input type="text" class="item-input" value="'.$qty.'" name="p-qty1" readonly>'; ?></td>
          <td class="price">
            <?php 
              $price = $_POST['p-total1'];
              echo '<input type="text" value="'.$price.'" name="p-pr1" readonly>';
            ?>
          </td>
        </tr>
        <?php endif; ?>
  
        <!-- Family take out (B) -->
        <?php
          $qty = $_POST['p-q2'];
          if($qty != null):
        ?>
        <tr class="platter">
          <td><input type="text" value="FAMILY TAKE OUT(B)" name="p-item2" readonly></td>
          <td></td>
          <td class="qty"><?php echo '<input type="text" value="'.$qty.'" name="p-qty2" readonly>'; ?></td>
          <td class="price">
            <?php 
              $price = $_POST['p-total2'];
              echo '<input type="text" value="'.$price.'" name="p-pr2" readonly>';
            ?>
          </td>
        </tr>
        <?php endif; ?>
  
        <!-- Sushi Platter -->
        <?php
          $qty = $_POST['p-q3'];
          if($qty != null):
        ?>
        <tr class="platter">
          <td><input type="text" value="SUSHI PLATTER" name="p-item3" readonly></td>
          <td>
            <?php
              $length = 7;
              $itemNameArray = array('Tuna', 'Yellowtail', 'Salmon', 'Albacore', 'Shrimp', 'F W Eel', 'Whitefish'); 
              for($i=1; $i<=$length; $i++) {
                $qty = $_POST['sp-q'.$i];
                if($qty!=null) {
                  echo '<p><span><input type="text" class="item-input" value="'.$itemNameArray[$i-1].'" name="sp-item'.$i.'" readonly></span>'.' x '.'<span><input type="text" value="'.$qty.'" name="sp-qty'.$i.'" readonly></span></p>';
                }
              }
            ?>
          </td>
          <td class="qty">
            <?php
              $qty = $_POST['p-q3'];
              echo '<input type="text" value="'.$qty.'" name="p-qty3" readonly>';
            ?>
          </td>
          <td class="price">
            <?php 
              $price = $_POST['p-total3'];
              echo '<input type="text" value="'.$price.'" name="p-pr3" readonly>';
            ?>
          </td>
        </tr>
        <?php endif; ?>
  
        <!-- Roll Platter -->
        <?php
          $qty = $_POST['p-q4'];
          if($qty != null):
        ?>
        <tr class="platter">
          <td><input type="text" value="ROLL PLATTER" name="p-item4" readonly></td>
          <td>
            <?php
              $length = 7;
              $itemNameArray = array('Spicy Tuna', 'California', 'Yellow Scallion', 'Cucumber Avocado', 'Creamy Salmon', 'Baked Crub', 'Whitefish'); 
              for($i=1; $i<=$length; $i++) {
                $qty = $_POST['rp-q'.$i];
                if($qty!=null) {
                  echo '<p><span><input type="text" class="item-input" value="'.$itemNameArray[$i-1].'" name="rp-item'.$i.'" readonly></span>'.' x '.'<span><input type="text" value="'.$qty.'" name="rp-qty'.$i.'" readonly></span></p>';
                }
              }
            ?>
          </td>
          <td class="qty">
            <?php
              $qty = $_POST['p-q4'];
              echo '<input type="text" value="'.$qty.'" name="p-qty4" readonly>';
            ?>
          </td>
          <td class="price">
            <?php 
              $price = $_POST['p-total4'];
              echo '<input type="text" value="'.$price.'" name="p-pr4" readonly>';
            ?>
          </td>
        </tr>
        <?php endif; ?>
  
        <!-- Grand Total --> 
        <tr class="total">
          <td></td>
          <td></td>
          <td class="price-tag">Grand Total</td>
          <td class="price">
            <?php 
              $price = $_POST['p-total'];
              echo '<input type="text" value="'.$price.'" name="pg-total" readonly>';
            ?>
          </td>
        </tr>
    </table>

    <!-- Full Custom order summary -->

    <?php elseif($formName == 'full-custom'): ?>

    <table id="full-custom">
      <tr>
        <th>Category</th>
        <th>Item</th>
        <th class="qty">Quantity</th>
      </tr>
      
      <!-- Sushi -->
      <?php 
        for($i=1; $i<=21; $i++) {
          $itemQty = $_POST['sushi-qty'.$i];
          if($itemQty==null) {
            $itemQty = 0;
          }
          $itemTotal += $itemQty;
        }
        if($itemTotal != 0) {
          echo '<tr><td>Sushi</td><td>';
          // Set the counter
          $itemCounter = 1;
          
          do {
            $item = $_POST['sushi-item'.$itemCounter];
            if($item!=null) {
              echo '<p><input type="text" value="'.$item.'" name="s-item'.$itemCounter.'" readonly></p>';
              $itemCounter++;
            }
          } while($item != null);
          echo '</td><td>';
          // Reset the counter
          $qtyCounter = 1;
          do {
            $itemQty = $_POST['sushi-qty'.$qtyCounter];
            echo '<p><input type="text" value="'.$itemQty.'" name="s-qty'.$qtyCounter.'" readonly></p>';
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
          $itemQty = $_POST['roll-qty'.$i];
          if($itemQty==null) {
            $itemQty = 0;
          }
          $itemTotal += $itemQty;
        }
        if($itemTotal != 0) {
          echo '<tr><td>Roll</td><td>';
          // Set the counter
          $itemCounter = 1;
          do {
            $item = $_POST['roll-item'.$itemCounter];
            if($item!=null) {
              echo '<p><input type="text" value="'.$item.'" name="r-item'.$itemCounter.'" readonly></p>';
              $itemCounter++;
            }
          } while($item != null);
          echo '</td><td>';
          // Reset the counter
          $qtyCounter = 1;
          do {
            $itemQty = $_POST['roll-qty'.$qtyCounter];
            echo '<p><input type="text" value="'.$itemQty.'" name="r-qty'.$qtyCounter.'" readonly></p>';
            $qtyCounter++;
          } while($qtyCounter != $itemCounter);
          echo '</td></tr>';
        } 
      ?>
      
      <!-- Special Rolls -->
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
          echo '<tr><td>Special Roll</td><td>';
          // Set the counter
          $itemCounter = 1;
          
          do {
            $item = $_POST['sp-item'.$itemCounter];
            if($item!=null) {
              echo '<p><input type="text" value="'.$item.'" name="sp-item'.$itemCounter.'" readonly></p>';
              $itemCounter++;
            }
          } while($item != null);
          echo '</td><td>';
          // Reset the counter
          $qtyCounter = 1;
          do {
            $itemQty = $_POST['sp-qty'.$qtyCounter];
            echo '<p><input type="text" value="'.$itemQty.'" name="sp-qty'.$qtyCounter.'" readonly></p>';
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
          $itemQty = $_POST['creation-qty'.$i];
          if($itemQty==null) {
            $itemQty = 0;
          }
          $itemTotal += $itemQty;
        }
        if($itemTotal != 0) {
          echo '<tr><td>Creation</td><td>';
          // Set the counter
          $itemCounter = 1;
          
          do {
            $item = $_POST['creation-item'.$itemCounter];
            if($item!=null) {
              echo '<p><input type="text" value="'.$item.'" name="c-item'.$itemCounter.'" readonly></p>';
              $itemCounter++;
            }
          } while($item != null);
          echo '</td><td>';
          // Reset the counter
          $qtyCounter = 1;
          do {
            $itemQty = $_POST['creation-qty'.$qtyCounter];
            echo '<p><input type="text" value="'.$itemQty.'" name="c-qty'.$qtyCounter.'" readonly></p>';
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
          $itemQty = $_POST['sashimi-qty'.$i];
          if($itemQty==null) {
            $itemQty = 0;
          }
          $itemTotal += $itemQty;
        }
        if($itemTotal != 0) {
          echo '<tr><td>Sashimi</td><td>';
          // Set the counter
          $itemCounter = 1;
          do {
            $item = $_POST['sashimi-item'.$itemCounter];
            if($item!=null) {
              echo '<p><input type="text" value="'.$item.'" name="sa-item'.$itemCounter.'" readonly></p>';
              $itemCounter++;
            }
          } while($item != null);
          echo '</td><td>';
          // Reset the counter
          $qtyCounter = 1;
          do {
            $itemQty = $_POST['sashimi-qty'.$qtyCounter];
            echo '<p><input type="text" value="'.$itemQty.'" name="sa-qty'.$qtyCounter.'" readonly></p>';
            $qtyCounter++;
          } while($qtyCounter != $itemCounter);
          echo '</td></tr>';
        } 
      ?>
      
      <!-- Appetizer -->
      <?php 
        // Reset the item total
        $itemTotal = 0;
        for($i=1; $i<=11; $i++) {
          $itemQty = $_POST['app-qty'.$i];
          if($itemQty==null) {
            $itemQty = 0;
          }
          $itemTotal += $itemQty;
        }
        if($itemTotal != 0) {
          echo '<tr><td>Appetizer</td><td>';
          // Set the counter
          $itemCounter = 1;
          do {
            $item = $_POST['app-item'.$itemCounter];
            if($item!=null) {
              echo '<p><input type="text" value="'.$item.'" name="a-item'.$itemCounter.'" readonly></p>';
              $itemCounter++;
            }
          } while($item != null);
          echo '</td><td>';
          // Reset the counter
          $qtyCounter = 1;
          do {
            $itemQty = $_POST['app-qty'.$qtyCounter];
            echo '<p><input type="text" value="'.$itemQty.'" name="a-qty'.$qtyCounter.'" readonly></p>';
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
          $itemQty = $_POST['hot-qty'.$i];
          if($itemQty==null) {
            $itemQty = 0;
          }
          $itemTotal += $itemQty;
        }
        if($itemTotal != 0) {
          echo '<tr><td>Hot Dish</td><td>';
          // Set the counter
          $itemCounter = 1;
          do {
            $item = $_POST['hot-item'.$itemCounter];
            if($item!=null) {
              echo '<p><input type="text" value="'.$item.'" name="h-item'.$itemCounter.'" readonly></p>';
              $itemCounter++;
            }
          } while($item != null);
          echo '</td><td>';
          // Reset the counter
          $qtyCounter = 1;
          do {
            $itemQty = $_POST['hot-qty'.$qtyCounter];
            echo '<p><input type="text" value="'.$itemQty.'" name="h-qty'.$qtyCounter.'" readonly></p>';
            $qtyCounter++;
          } while($qtyCounter != $itemCounter);
          echo '</td></tr>';
        } 
      ?>
      <tr>
        <th colspan="3"></th>
      </tr>
    </table>
    
	<!-- Lunch box order output start -->
    <?php elseif($formName == 'lunchbox'): ?>
    <!-- Catering form -->
    <table id="lunchbox">
      <tr>
        <th class="items">Items</th>
        <th class="qty">Quantity</th>
        <th>Price per item</th>
        <th class="qty">Total</th>
      </tr>
		<tr>
			<?php 
          // Get the qty of order
          $orderCounter = $_POST['order-counts'];
          $price = number_format($orderCounter * 25);
        	?>
			<td>Lunch Box</td>
			<td><?php echo '<input type="text" value="'.$orderCounter.'" name="order-counts" readonly>'; ?></td> 
			<td>$25</td>
			<td><?php echo '<input type="text" value="$'.$price.'" name="price'.$price.'" readonly>'; ?></td>
		</tr>
		<!-- Grand Total --> 
      <tr class="total">
        <td></td>
        <td></td>
        <td class="price-tag">Grand Total</td>
        <td class="price">$<?php echo $price; ?></td>
      </tr>
	</table>
	<?php endif; ?>
	<!-- Lunch box order output end -->

  </div> 
  <?php endif; ?> 

  <div id="contact-summary">
    <h2>Your information summary</h2>
    
    <table id="contact-final">
      <tr>
        <th colspan="4"><h3>Contact Information</h3></th>
      </tr>
      <tr>
        <th>Customer Name </th>
        <td>
          <?php
            $name = $_POST['customer-name'];
            echo '<input type="text" value="'.$name.'" name="customer-name" readonly>';
          ?>
        </td>
        <th>Phone Number </th>
        <td>
          <?php
            $phone = $_POST['phone-num'];
            echo '<input type="text" value="'.$phone.'" name="p-num" readonly>';
          ?>
        </td>
      </tr>
      <tr>
        <th>Company Name </th>
        <td>
          <?php
            $cName = $_POST['company-name'];
            echo '<input type="text" value="'.$cName.'" name="company-name" readonly>';
          ?>
        </td>
		<?php if($formName == 'lunchbox'): ?>
			<th>E-mail Address</th>
      	<td>
      	<?php
          $email = $_POST['email-address'];
          echo '<input type="text" value="'.$email.'" name="email-address" readonly>';
       	?>
      	</td>
		<?php else: ?>
        <th>Cell Phone Number </th>
        <td>
          <?php
            $cPhone = $_POST['cell-phone'];
             echo '<input type="text" value="'.$cPhone.'" name="cell-num" readonly>';
          ?>
        </td>
      </tr>
      <tr>
        <th>E-mail Address</th>
        <td>
          <?php
            $email = $_POST['email-address'];
            echo '<input type="text" value="'.$email.'" name="email-address" readonly>';
          ?>
        </td>
      </tr>
		<?php endif; ?>
      <tr>
        <th colspan="4"><h3>Delivery Information</h3></th>
      </tr>
		<!-- Lunch box output start -->
		<?php if($formName == 'lunchbox'): ?>
		<tr>
			<th>Date Requested</th>
			<td>
          <?php
            $eventDate = $_POST['event-date'];
            echo '<input type="text" value="'.$eventDate.'" name="event-date" readonly>';
          ?>
        </td>
		  <th>Time of Delivery</th>
		  <td>
        	 <?php
           $deliTime = $_POST['delivery-time'];
           echo '<input type="text" value="'.$deliTime.'" name="delivery-time" readonly>';
         ?>
        </td>
		</tr>
		<tr>
			<th>Delivery Location</th>
			<td colspan="3">
          <?php
            $addressLine = $_POST['address-line'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$zip = $_POST['zip'];
            echo '<input type="text" value="'.$addressLine.', '.$city.', '.$state.', '.$zip.'" name="location" readonly>';
          ?>
        </td>
		</tr>
		 <tr>
        <th colspan="4"><h3>Special Requests</h3></th>
      </tr>
		 <tr>
          <th>Notes:</th>
			 <?php
            $memo = $_POST['memo'];
          ?>
          <td colspan="3"><?php echo '<textarea name="memo" readonly>'.$memo.'</textarea>'; ?></td>
        </tr>
		<!-- Lunch box output end -->
		<?php else: ?>
      <tr>
        <th>Order Type</th>
        <?php 
          $pickTime = $_POST['pick-time'];
          $pickLocation = $_POST['pick-location'];
          $dropTime = $_POST['deli-time'];
          $customOrderForm = $_POST['custom-order-option'];
           echo '<input type="hidden" name="custom-order-option" value="'.$customOrderForm.'" checked="checked">';
        ?>
        <td>
          <?php
            if($formName == 'catering') {
              echo '<input type="text" value="Chef catering service" name="order-type" readonly>';
            } else if($formName == 'platter') {
              if($pickTime!=null) {
                echo '<input type="text" value="Pick-up service" name="order-type" readonly>';
              } else {
                echo '<input type="text" value="Drop-off service" name="order-type" readonly>';
              }
            } else if($formName == 'full-custom') {
              echo '<input type="text" value="Full Custom Order" name="order-type" readonly>';
            } else {
              echo '<input type="text" value="Inquiry" name="order-type" readonly>';
            }
          ?>
        </td>
      </tr>
      <?php if($formName == 'platter' || ($formName == 'full-custom' && $customOrderForm == 'pickup')): ?>
      <tr>
        <?php 
          if($pickTime!=null) {
            echo '<th>Pick up time</th><td><input type="text" value="'.$pickTime.'" name="p-time" readonly></td>';
            echo '<th>Pick up Location</th><td><input type="text" value="'.$pickLocation.'" name="p-location" readonly></td>';
          } else {
            echo '<th>Delivery Time</th><td><input type="text" value="'.$dropTime.'" name="d-time" readonly></td>';
          }
        ?>
      </tr>
      <?php endif; ?>
      <?php if($formName == 'catering' || $formName == 'inquiry' || ($formName == 'full-custom' && $customOrderForm == 'catering')): ?>
        <?php
          if($formName == 'catering' || $formName == 'inquiry' || ($formName == 'full-custom' && $customOrderForm == 'catering')) {
            $cateringStyle = $_POST['style'];
            echo '<tr><th>Catering Style</th><td><input type="text" value="'.$cateringStyle.'" name="c-style" readonly></td></tr>';
          }
      
          $eventDate = $_POST['event-date'];
          $eventLocation = $_POST['location'];
          $eventStart = $_POST['event-stime'];
          $eventEnd = $_POST['event-etime'];
          $budget = $_POST['budget'];
        ?>
        <tr>
          <?php 
            echo '<th>Event Date</th><td><input type="text" value="'.$eventDate.'" name="e-date" readonly></td>';
            echo '<th>Location</th><td><input type="text" value="'.$eventLocation.'" name="e-location" readonly></td>';
          ?>
        </tr>
        <tr>
          <?php 
            echo '<th>Event Start Time</th><td><input type="text" value="'.$eventStart .'" name="e-start" readonly></td>';
            echo '<th>Event End Time</th><td><input type="text" value="'.$eventEnd .'" name="e-end" readonly></td>';
          ?>
        </tr>
        <?php
          if($formName == 'inquiry') {
            if($budget != null) {
              echo '<tr><th>Budget</th><td><input type="text" value="$ '.number_format($budget,2).'" name="budget" readonly></td></tr>';
            }
          }
        ?>
        <?php
          $adults = $_POST['adults'];
          $kids = $_POST['kids'];
          $memo = $_POST['memo'];
        ?>
        <?php if($formName == 'catering' || $formName == 'inquiry'): ?>
        <tr>
          <tr>
            <th colspan="4">APPROXIMATE NUMBER OF GUESTS</th>
          </tr>
        </tr>
        <tr>
          <?php 
            echo '<th>Adults</th><td><input type="text" value="'.$adults.'" name="adults" readonly></td>';
            echo '<th>Kids</th><td><input type="text" value="'.$kids.'" name="kids" readonly></td>';
          ?>
        </tr>
        <tr>
          <th colspan="4"><h3>Other Request</h3></th>
        </tr>
        <tr>
          <th>Memo</th>
          <td colspan="3"><?php echo '<textarea name="memo" readonly>'.$memo.'</textarea>'; ?></td>
        </tr>
        <?php endif; ?>
        <?php if($formName == 'inquiry'): ?>
          <?php 
            $allergy = $_POST['allergy'];
            $preference = $_POST['preference'];
          ?>
          <tr>
          <th>Allergy</th>
          <td colspan="3"><?php echo '<textarea name="allergy" readonly>'.$allergy.'</textarea>'; ?></td>
        </tr>
        <tr>
          <th>Preference</th>
          <td colspan="3"><?php echo '<textarea name="preference" readonly>'.$preference.'</textarea>'; ?></td>
        </tr>
        <?php endif; ?>
      <?php endif; ?>
    
      <?php if($formName == 'full-custom'): ?>
        <?php
          $adults = $_POST['adults'];
          $kids = $_POST['kids'];
          $budget = $_POST['budget'];
        ?>
        <tr>
          <th colspan="4"><h3>Approximate Party Size</h3></th>
        </tr>
        <tr>
          <?php 
            echo '<tr><th>Budget</th><td><input type="text" value="$ '.$budget.'" name="budget" readonly></td></tr>';
            echo '<th>Adults</th><td><input type="text" value="'.$adults.'" name="adults" readonly></td>';
            echo '<th>Kids</th><td><input type="text" value="'.$kids.'" name="kids" readonly></td>';
          ?>
        </tr>
      <?php endif; ?>
    
      <?php if($formName == 'catering' || $formName == 'platter' || $formName == 'full-custom'): ?>
        <tr>
          <th colspan="4"><h3>Other Request</h3></th>
        </tr>
        <?php 
          $allergy = $_POST['allergy'];
          $preference = $_POST['preference'];
          $memo = $_POST['memo'];
        ?>
        <tr>
          <th>Allergy</th>
          <td colspan="3"><?php echo '<textarea name="allergy" readonly>'.$allergy.'</textarea>'; ?></td>
        </tr>
        <tr>
          <th>Preference</th>
          <td colspan="3"><?php echo '<textarea name="preference" readonly>'.$preference.'</textarea>'; ?></td>
        </tr>
      <?php endif; ?>
      <?php if($formName == 'full-custom'): ?>
        <tr>
          <th>Memo</th>
          <td colspan="3"><?php echo '<textarea name="memo" readonly>'.$memo.'</textarea>'; ?></td>
        </tr>
      <?php endif; ?>
	  <?php endif; ?>
    </table>
    <div class="button-wrap">
      <button class="nav-btn bg-d-navy" onClick="window.history.go(-1); return false;">Edit</button>
      <button class="nav-btn bg-d-navy">Order</button>
    </div>
  </div>
</form>