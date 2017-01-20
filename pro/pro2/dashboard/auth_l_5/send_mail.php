<?php

include 'class.phpmailer.php';

ob_start();

?>
<div>
Dear  <?php echo $full_name;?><br>


Thank you for enrolling with <?php echo $location_name ?>.
Commit to be Fit.


<h3>The details of your membership are as follow:</h3>
<table width="350" cellpadding="5" cellspacing="0" border="0">
  <tr>
    <td width="85">Name</td>
    <td><?php echo $full_name;?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $email; ?></td>
  </tr>
  <tr>
    <td>Membership Type:</td>
    <td><?php echo $name_type; ?></td>
  </tr>
  <tr>
    <td>Member Number: (membership number)</td>
    <td><?php echo $p_id; ?></td>
  </tr>
  <tr>
    <td>Membership Duration:</td>
    <td><?php echo $days; ?> Days</td>
  </tr>
  <tr>
    <td>From: </td>
    <td><?php echo $date; ?></td>
  </tr>
  <tr>
    <td>To: </td>
    <td><?php echo $expiry; ?></td>
  </tr>
</table>


Thank you<br><br>

<?php echo $location_name ?>

</div>
<?php
$mail_body=ob_get_contents();
$mail = new PHPMailer();
$mail->From = "info@gym.com";
$mail->FromName = $name;
$mail->Subject = "Gym Management testing.";
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; 
$mail->MsgHTML($mail_body);
$mail->AddAddress($email);
$mail->AddAddress('deepak.urbansoft@gmail.com');
$mail->Send();

?>



