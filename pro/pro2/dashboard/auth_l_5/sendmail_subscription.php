<?php

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'deepak.urbansoft@gmail.com';          // SMTP username
$mail->Password = 'Urbans0ft@2016'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to



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
$bodyContent=ob_get_contents();

$mail->isHTML(true);  // Set email format to HTML
$mail->setFrom('deepak.urbansoft@gmail.com', 'Deepak | Urbansoft');
$mail->addReplyTo('deepak.urbansoft@gmail.com', 'Deepak | Urbansoft');
$mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$bodyContent = '<h1>How to Send Email using PHP in Localhost by Deepak C</h1>';
//$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>Deepak C</b></p>';

$mail->Subject = 'Email from Localhost by Deepak C';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  mysqli_query($con, "INSERT INTO `mail_tracking` ( `mem_id`, `name`, `email`, `plan`, `expiry_date`, `status`) VALUES ( '$user_id', '$full_name', '$email', '$name_type', '$expiry_date', '0')");
} else {
  mysqli_query($con, "INSERT INTO `mail_tracking` ( `mem_id`, `name`, `email`, `plan`, `expiry_date`, `status`) VALUES ( '$user_id', '$full_name', '$email', '$name_type', '$expiry_date', '1')");
  echo 'Message has been sent';
}


?>



