<?php

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->isSMTP();                                   // Set mailer to use SMTP
//$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                            // Enable SMTP authentication
//$mail->Username = 'deepak.urbansoft@gmail.com';          // SMTP username
//$mail->Password = 'Urbans0ft@2016'; // SMTP password
//$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                                 // TCP port to connect to

$mail->isSMTP();
$mail->Host = 'relay-hosting.secureserver.net';
$mail->Port = 25;
$mail->SMTPAuth = false;
$mail->SMTPSecure = false;

ob_start();

?>
<div>

<h3>The details of Orders are as follows:</h3>
  <table class="table table-condensed" cellpadding="5" cellspacing="5" style="border: 1px solid #ccc;">
    <tr>
      <th>(# of first coupon purchased)</th>
      <th>(Company Name)</th>
      <th>(Item)</th>
      <th>(Value)</th>
      <th>(Price)</th>
      <th>(Details if any)</th>
    </tr>

    <?php


    //                    $user_id = get_cell_value('orders','token',$token,'id');

//    $query = mysql_query("SELECT C.name ,L.item_name,L.dollar_value,L.coupon_price,L.details,O.token FROM orders O JOIN list L ON O.product_id = L.id JOIN company C ON C.id = L.company_id AND O.token LIKE '%%$token' ");
    $query = mysql_query("SELECT C.name ,L.item_name,L.dollar_value,L.coupon_price,L.details,O.token,O.invoice,OD.product_id FROM order_details OD
JOIN list L ON OD.product_id = L.id
JOIN orders O ON O.invoice = 1
JOIN company C ON L.company_id = C.id AND OD.invoice = $invoice  ");


    if(mysql_num_rows($query)){

      while ($row_coupon = mysql_fetch_assoc($query)) {

        ?>
        <tr>
          <td>1</td>
          <td><?php echo $row_coupon['name'];?></td>
          <td><?php echo $row_coupon['item_name'];?></td>
          <td><?php echo $row_coupon['dollar_value'];?></td>
          <td><?php echo $row_coupon['coupon_price'];?></td>
          <td><?php echo $row_coupon['details'];?></td>
        </tr>
        <?php

      }
    }

    ?>
  </table>



</div>
<?php
$bodyContent=ob_get_contents();

$mail->isHTML(true);  // Set email format to HTML
$mail->setFrom('info@cashbookpickandclick.com', 'CBPC');
$mail->addReplyTo('info@cashbookpickandclick.com', 'CBPC');
$mail->addAddress('deepakcmathan@gmail.com');   // Add a recipient
$mail->addAddress($user_email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$bodyContent = '<h1>How to Send Email using PHP in Localhost by Deepak C</h1>';
//$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>Deepak C</b></p>';

$mail->Subject = 'Order From cashbookpickandclick.com';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;

} else {
  echo 'Your Order has been sent your E-Mail. Please Check your E-Mail.';
}


?>



