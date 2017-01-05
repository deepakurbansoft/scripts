<?php

include 'class.phpmailer.php';

ob_start();

?>
<div>
Dear  <?php echo $full_name;?><br>


Your subscription <?php if($day_count==0){?>has been expired.<?php } else{ ?>going to expire in <?php echo $day_count;  }?> days.

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
    <td>From: </td>
    <td><?php echo $from_date; ?></td>
  </tr>
  <tr>
    <td>To: </td>
    <td><?php echo $expiry_date; ?></td>
  </tr>
</table>


Thank you<br><br>


</div>
<?php
$mail_body=ob_get_contents();
$mail = new PHPMailer();
$mail->From = "info@gym.com";
$mail->FromName = $full_name;
$mail->Subject = "Gym Management testing.";
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; 
$mail->MsgHTML($mail_body);
$mail->AddAddress($email);
$mail->AddAddress('deepak.urbansoft@gmail.com');
$mail->Send();

?>



