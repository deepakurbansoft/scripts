<?php
if($_POST['save'])
{
	$position = $_POST['position'];
        $salary = $_POST['salary'];
        $currency = $_POST['currency'];
        $title = $_POST['title'];
	$m_name = $_POST['m_name'];
	$mstatus = $_POST['mstatus'];
	$dob = $_POST['dob'];
	$permenant_addrs = $_POST['permenant_addrs'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$expirydata = $_POST['expirydata'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$nationality = $_POST['nationality'];
	$coresponding_addrs = $_POST['coresponding_addrs'];
	$mobile = $_POST['mobile'];
	$passnumber = $_POST['passnumber'];
	$language = $_POST['language'];
	$photo = $_POST['photo'];


	$degree = $_POST['degree'];
	$yocomp = $_POST['yocomp'];
	$mark = $_POST['mark'];
	$university = $_POST['university'];
	$duration = $_POST['duration'];
	$grade = $_POST['grade'];
	$training = $_POST['training'];
	$itspecialized1 = $_POST['itspecialized1'];
	$idspecialized2 = $_POST['idspecialized2'];
	$idspecialized3 = $_POST['idspecialized3'];
	$work_exp = $_POST['work_exp'];
	$cv = $_POST['cv'];
	$emp = $_POST['emp'];
	$bahrain = $_POST['bahrain'];
	$com_name = $_POST['com_name'];
	$report_to = $_POST['report_to'];
	$report_from = $_POST['report_from'];
	$country = $_POST['country'];
	$job_title = $_POST['job_title'];
	$responsible = $_POST['responsible'];
	$respons_to = $_POST['respons_to'];
	$state_city = $_POST['state_city'];
	$reason = $_POST['reason'];
	$strength = $_POST['strength'];
	$weekness = $_POST['weekness'];
	$cobjective = $_POST['cobjective'];
	$major_illness = $_POST['major_illness'];
	$pro_membership = $_POST['pro_membership'];
	$expertise = $_POST['expertise'];
	$convicted = $_POST['convicted'];
	$row_count = $_POST['row_count'];
	$row_count_work = $_POST['row_count_work'];
	//$convicted = $_POST['convicted'];
}

if(!empty($_FILES['photo']['name']))
{
	$ext = explode('.',$_FILES['photo']['name']);
	$extension = $ext[1];


	$document_name = strtolower($fname).'.'.$extension;
	$full_local_path = 'images/'.$document_name;
	move_uploaded_file($_FILES['photo']['tmp_name'], $full_local_path);


}



$message =
		'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40"><head><title>Microsoft Office HTML Example</title>
<!--[if gte mso 9]>
<xml><w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom><w:DoNotOptimizeForBrowser/></w:WordDocument></xml>
<![endif]-->
<link rel="File-List" href="mydocument_files/filelist.xml">
<body>';

$message .= '<div style="margin:0 auto; width:595px;">
<div style="width:595px;"><h1>Employment Application</h1></div>
<table  style="margin:0 auto;width:595px" cellpadding="10" cellspacing="10" >
	<tr>
		<td>Position applied for<br><span style="border:1px solid #ccc; padding:5px 10px;">'.$position.'</span></td>
		<td>Expected Salary<br><span style="border:1px solid #ccc; padding:5px 10px;">'.$salary.'</span></td>
		<td>Currency<br><span style="border:1px solid #ccc; padding:5px 10px;">'.$currency.'</span></td>
	</tr>

</table>

<table  style="margin:0 auto;width:595px; " cellpadding="10" cellspacing="10">
	<tr>
		<th colspan="4" style="background-color:#ccc; color:#fff; text-align: left;">PERSONAL INFORMATION</th>
	</tr>
    <tr>
		<td style="">Title</td>
		<td style="">First Name</td>
		<td style="">Middle Name</td>
		<td style="">Last Name</td>
	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$title.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$fname.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$m_name.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$lname.'</span></td>
	</tr>

	 <tr>
		<td style="">Date of Birth</td>
		<td style="">Gender</td>
		<td style="">Marital Status</td>
		<td style="">Nationality</td>
	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$dob.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$gender.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$mstatus.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$nationality.'</span></td>
	</tr>

	<tr>
		<td style="" colspan="2">Correspondence Address</td>


	</tr>
	 <tr>
		<td style="" colspan="2"><span style="border:1px solid #ccc;padding:5px 10px;">'.$coresponding_addrs.'</span></td>

	</tr>

	<tr>
		<td style="" colspan="2">Permanent Address</td>

	</tr>

	 <tr>
		<td style="" colspan="2"><span style="border:1px solid #ccc; padding:5px 10px;">'.$permenant_addrs.'</span></td>

	</tr>

	<tr>
		<td style="" colspan="">Phone</td>
		<td style="" colspan="">Mobile</td>
		<td style="" colspan="2">Email Address</td>
	</tr>
	 <tr>
		<td style="" colspan=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$phone.'</span></td>
		<td style="" colspan=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$mobile.'</span></td>
		<td style="" colspan="2"><span style="border:1px solid #ccc; padding:5px 10px;">'.$email.'</span></td>

	</tr>

	<tr>
		<td style="" colspan="">Passport Number</td>
		<td style="" colspan="">Expiry Date</td>
		<td style="" colspan="2">Languages known</td>

	</tr>
	 <tr>
		<td style="" colspan=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$passnumber.'</span></td>
		<td style="" colspan=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$expirydata.'</span></td>
		<td style="" colspan="2"><span style="border:1px solid #ccc; padding:5px 10px;">'.$language.'</span></td>

	</tr>

	<tr>
		<td style="" colspan="4">Photo</td>
	</tr>

		<tr>
		<td style="" colspan="4">';

if($full_local_path) {

	$message .='<img src="http://almanaratain.com/wp-content/apply_online/'. $full_local_path.'" width="100" height="100"/>';
}

		$message .='</td>
	</tr>



</table> <table  style="margin:0 auto;width:595px;" cellpadding="10" cellspacing="10">
    <tr>
		<th colspan="4" style="text-align: left;background-color:#ccc; color:#fff;">QUALIFICATIONS : (ACADEMIC / PROFESSIONAL)</th>
	</tr>';


	  for($i=0; $i<=$row_count; $i++){
$count = 1;
		  $message .='

	<tr>
		<td style="" colspan="2">Certificate/Degree '.$count.'</td>
		<td style="" colspan="2">University/Institution</td>

	</tr>
	<tr>
		<td style="" colspan="2"><span style="border:1px solid #ccc;padding:5px 10px;">'.$degree[$i].'</span></td>
		<td style="" colspan="2"><span style="border:1px solid #ccc; padding:5px 10px;">'.$university[$i].'</span></td>

	</tr>

	<tr>
		<td style="">Year of Completion</td>
		<td style="">Duration</td>
		<td style="">% of Marks</td>
		<td style="">Grade</td>
	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$yocomp[$i].'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$duration[$i].'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$mark[$i].'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$grade[$i].'</span></td>
	</tr>
';
$count++;
	  }



$message .= '</table><table style="margin:0 auto;width:595px;" cellpadding="10" cellspacing="10">
    <tr>
		<th colspan="4" style="background-color:#ccc; color:#fff;">IT PROFICIENCY / COMPUTER KNOWLEDGE</th>
	</tr>

	<tr>
		<td style="">1. <span style="border:1px solid #ccc;padding:5px 10px;">'.$itspecialized1.'</span></td>


	</tr>

		<tr>

		<td style="">2 <span style="border:1px solid #ccc; padding:5px 10px;">'.$idspecialized2.'</span></td>

	</tr>


		<tr>

		<td style="">3 <span style="border:1px solid #ccc; padding:5px 10px;">'.$idspecialized3.'</span></td>

	</tr>


	<tr>
		<td style="">Total Work Experience (Years)</td>
		<td style="">Currently Employed</td>

	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$work_exp.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$emp.'</span></td>

	</tr>

</table>';



$message .= '<table style="width:595px;" cellpadding="10" cellspacing="10">
    <tr>
		<th colspan="4" style="background-color:#ccc; color:#fff;">WORK EXPERIENCE</th>
	</tr>';

	  for($j=0; $j<=$row_count_work; $j++){


$message .='<tr>
		<td style="">Company Name</td>
		<td style="">Job Title</td>
		<td style="">Reporting to</td>

	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$com_name[$j].'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$job_title[$j].'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$report_to[$j].'</span></td>

	</tr>
	<tr>
		<td style="">Responsibilities</td>
	</tr>
	<tr>
		<td style="" colspan="3"><span style="border:1px solid #ccc; padding:5px 10px;">'.$responsible[$j].'</span></td>
	</tr>
	<tr>
		<td style="">From</td>
		<td style="">To</td>
		<td style="">Country</td>
		<td style="">State/City</td>

	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$respons_to[$j].'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$report_to[$j].'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$country[$j].'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$state_city[$j].'</span></td>

	</tr>
	<tr>
		<td style="">Reason for Leaving</td>
	</tr>
	<tr>
		<td style="" colspan="3"><span style="border:1px solid #ccc; padding:5px 10px;">'.$reason[$j].'</span></td>
	</tr>';

	  }

$message .= '</table>';

$message .= '<table cellpadding="10" cellspacing="10">
	<tr>
		<th colspan="4" style="text-align:left;background-color:#ccc; color:#fff;">PERSONAL TRAITS</th>
	</tr>
	<tr>
		<td style="">Your Strengths</td>
		<td style="">Your Weaknesses</td>
	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$strength.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$weekness.'</span></td>
	</tr>
	<tr>
		<td style="">Career Objective</td>
		<td style="">Enumerate your areas of expertise, based on your total experience</td>
	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$cobjective.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$expertise.'</span></td>
	</tr>
	<tr>
		<td style="">Any major illness during the last 5 years</td>
		<td style="">Professional membership & Affiliations, if any</td>
	</tr>
	 <tr>
		<td style=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$major_illness.'</span></td>
		<td style=""><span style="border:1px solid #ccc; padding:5px 10px;">'.$pro_membership.'</span></td>
	</tr>
	<tr>
		<td style="">Have you ever been convicted?</td>

	</tr>
	 <tr>
	 ..
		<td style=""><span style="border:1px solid #ccc;padding:5px 10px;">'.$convicted.'</span></td>

	</tr>

</table>';

$message .= '<table width:595px; " cellpadding="10" cellspacing="10">
	<tr>
		<th colspan="" style="text-align:left;background-color:#ccc; color:#fff;">DISCLAIMER</th>
	</tr>
	<tr>
		<th colspan="" style=""><p>I certify that the Information submitted are true and complete. I understand that a false statement and/or suppression of material facts, may disqualify me from employment, or cause my dismissal or any penal action as deemed appropriate by the company, currently or in future.</p></th>
	</tr>
</table>

</div>
';


$message .= '</body></html>';
// Sending email


$from_email         = 'info@almanaratain.com';
//$recipient_email    = 'deepak@urbansoft.in';
//$recipient_email    = 'rrrajasekar2@gmail.com';
$recipient_email    = 'careers2@almanaratain.com';
$recipient_email2    = 'deepak.urbansoft@gmail.com';

$sender_name    = 'IFM - Application';
$reply_to_email = 'info@almanaratain.com';
$subject        = 'Employment Application - Almanaratain';
$body_message        = 'Please find attachement';


$file_name        = 'ifm_application.doc';

$file_type        = 'doc';


//$content = 'demo';
$encoded_content = chunk_split(base64_encode($message));

$boundary = md5("sanwebe");
//header
$headers = "MIME-Version: 1.0\r\n";
$headers .= "From:".$from_email."\r\n";
$headers .= "Reply-To: ".$reply_to_email."" . "\r\n";
$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";

//plain text
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
$body .= chunk_split(base64_encode($body_message));

//attachment
$body .= "--$boundary\r\n";
$header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$body .="Content-Type: $file_type; name=".$file_name."\r\n";
$body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
$body .="Content-Transfer-Encoding: base64\r\n";
$body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n";
$body .= $encoded_content;
$sentMail = @mail($recipient_email, $subject, $body, $headers);
@mail($recipient_email2, $subject, $body, $headers);
if($sentMail) //output success or failure messages
{
	?>
	<script>
alert("Your Application has been sent successfully !");
	 window.location.replace("http://almanaratain.com/wp-content/apply_online/");
	</script>
<?php
	}else{
	die('Could not send mail! Please check your PHP mail configuration.');
}



?>




