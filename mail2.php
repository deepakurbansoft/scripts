<?php
$user_email = 'deepak@urbansoft.in';
$bodyContent= 'Test Mail';

$subject = "Test Mail";
$message   = $bodyContent;
$Header = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$Header .= 'From: Mail2 <info@gmail.com>' . "\r\n";

if(mail($user_email, $subject, $message, $Header))

    echo "Mail sent. Please Check your E-Mail.";

else

    echo "Email doesn't Send at this time. Please contact Admin.";

//  mail('toddaelkins@bellsouth.net', $subject, $message, $Header)
//mail('deepak@urbansoft.in', $subject, $message, $Header)

?>
