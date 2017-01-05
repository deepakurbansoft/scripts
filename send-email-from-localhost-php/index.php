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

$mail->setFrom('deepak.urbansoft@gmail.com', 'Deepak | Urbansoft');
$mail->addReplyTo('deepak.urbansoft@gmail.com', 'Deepak | Urbansoft');
$mail->addAddress('deepakcmathan@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>How to Send Email using PHP in Localhost by Deepak C</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>Deepak C</b></p>';

$mail->Subject = 'Email from Localhost by Deepak C';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
