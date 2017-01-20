<?php
extract($_POST);
$to = "toddaelkins@bellsouth.net, Elkins";
//$to = "deepak@urbansoft.in, Deepak";
$subject = "Enquiry from cashbookpickandclick.com";

$message = "
<html>
<head>
<title>Contact Us | Details</title>
</head>
<body>
<h3>Contact Us | Details</h3>
<table>
  <tr>
    <td><b>Name</b></td>
    <td>".$name."</td>
  </tr>
  <tr>
    <td><b>Email</b></td>
    <td>". $email."</td>
  </tr>

  <tr>
    <td><b>Message</b></td>
    <td>".$message."</td>
  </tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@cashbookpickandclick.com>' . "\r\n";
//$headers .= 'Cc: deepak.urbansoft@gmail.com' . "\r\n";

//mail($to,$subject,$message,$headers);

if(mail($to,$subject,$message,$headers))

    $form_data['success'] = true;

else

    $form_data['success'] = false;

//mail('deepak.urbansoft@gmail.com', $subject, $message, $Header)



echo json_encode($form_data);

?>



