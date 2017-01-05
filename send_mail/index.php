<?php

include 'class.phpmailer.php';

ob_start();

?>
<div>
    Dear





    Thank you<br><br>


</div>
<?php
$mail_body=ob_get_contents();
$mail = new PHPMailer();
$mail->From = "deepakcmathan@gmail.com";
$mail->FromName = 'Deepak | UrbanSoft';
$mail->Subject = "Gym Management testing.";
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
$mail->MsgHTML($mail_body);
$mail->AddAddress('deepak.urbansoft@gmail.com');
$mail->Send();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>



