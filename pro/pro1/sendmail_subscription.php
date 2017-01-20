  <?php

  ob_start();

  ?>
  <div xmlns:border-bottom="http://www.w3.org/1999/xhtml">

  <h3>The details of Orders are as follows:</h3>
    <div style="padding: 5px;"><b>Email : </b><?php echo $user_email;?></div>
    <table class="table table-condensed" cellpadding="5" cellspacing="5" style="border: 1px solid #ccc;">
      <tr>
        <th># Coupons purchased</th>
        <th>Company Name</th>
        <th>Item</th>
        <th>Details if any</th>
        <th>Value</th>
        <th>Price</th>

      </tr>

      <?php

      $query = mysql_query("SELECT C.name ,L.item_name,L.dollar_value,L.coupon_price,L.details,O.token,O.invoice,OD.product_id FROM order_details OD
  JOIN list L ON OD.product_id = L.id
  JOIN orders O ON O.invoice = 1
  JOIN company C ON L.company_id = C.id AND OD.invoice = $invoice  ");


      if(mysql_num_rows($query)){

        while ($row_coupon = mysql_fetch_assoc($query)) {

          ?>
          <tr style="border-bottom: 1px solid #ccc;">
            <td>1</td>
            <td><?php echo $row_coupon['name'];?></td>
            <td><?php echo $row_coupon['item_name'];?></td>
            <td><?php echo $row_coupon['details'];?></td>
            <td>$<?php echo $row_coupon['dollar_value'];?></td>

            <td>$<?php echo $total = number_format($row_coupon['coupon_price'],2);?></td>

          </tr>
          <?php
          $total_coupon = $total+$total_coupon;
          $cashbook = 0;
        }
      }
  $query = mysql_query("SELECT * FROM `order_details` WHERE `product_id` = '0' AND `invoice` = '$invoice'");
  if(mysql_num_rows($query)){
    $cashbook = number_format(20,2);
?>
      <tr>
   <td>1</td>
   <td></td>
   <td>Cash Book Coupon Book</td>
   <td></td>
   <td></td>
   <td>$20</td>

    </tr>
      <?php
  }
      ?>

      <tr>
        <td class="thick-line"></td>
        <td class="thick-line"></td>
        <td class="thick-line"></td>
        <td class="thick-line"></td>
        <td class="thick-line "><strong>Subtotal</strong></td>
        <td class="thick-line ">$<?php echo $main_total = number_format(($cashbook+$total_coupon),2);?></td>
      </tr>
      <tr>
        <td class="no-line"></td>
        <td class="no-line"></td>
        <td class="no-line"></td>
        <td class="no-line"></td>
        <td class="no-line "><strong>Shipping</strong></td>
        <td class="no-line ">$1.00</td>
      </tr>


      <tr>
        <td class="no-line"></td>
        <td class="no-line"></td>
        <td class="no-line"></td>
        <td class="no-line"></td>
        <td class="no-line "><strong>Total</strong></td>
        <td class="no-line ">$<?php echo $total_grandtotal = number_format(($main_total+1),2)?></td>
      </tr>


    </table>



  </div>
  <?php
  $bodyContent=ob_get_contents();

  $subject = "Order From cashbookpickandclick.com";
  $message   = $bodyContent;
  $Header = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $Header .= 'From: CBPC <info@cashbookpickandclick.com>' . "\r\n";

  if(mail($user_email, $subject, $message, $Header))

    echo "Your order details have been sent your E-Mail. Please Check your E-Mail.";

  else

    echo "Email wasn't Send at this time. Please contact Admin.";

  mail('toddaelkins@bellsouth.net', $subject, $message, $Header);
//  mail('deepak@urbansoft.in', $subject, $message, $Header);

  ?>



