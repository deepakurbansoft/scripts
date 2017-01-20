<?php
//error_reporting(E_ALL);
//ini_set("display_errors",1);

ob_start();
?>

    <h3>The details of Orders are as follows:</h3>
    <table class="table table-condensed" cellpadding="5" cellspacing="5" style="border: 1px solid #ccc;">
        <tr>
            <th># Coupons purchased</th>
            <th>Company Name</th>
            <th>Item</th>
            <th>Value</th>
            <th>Price</th>
            <th>Details if any</th>
        </tr>

<?php
$bodyContent=ob_get_contents();

$data = 'demo mail';
$data= '<![if !mso]>'.$data.'<![endif]><!--[if mso]>'.$data.'<![if !mso]>';

$headers = "From: Me <deepak.urbansoft@gmail.com>";
$to = 'deepak@urbansoft.in';
$subject = 'Top 10 new articles from my blog';
$txt ="Dear Friend, Please find the latest article from my blog";
$fileatt_name2 = "articles.doc";
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

// Add the headers for a file attachment
$headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";
$data2 = chunk_split(base64_encode($bodyContent));

$message = "{$mime_boundary}\n" .
    "Content-Type: text/plain; charset=iso-8859-1; format=flowed\n" .
    "Content-Transfer-Encoding: 7bit\n\n" .
    $txt."\r\n";
$message .= "{$mime_boundary}\n" .

    "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" .

// Add file attachment to the message
    $message .= "--{$mime_boundary}\n" .
        "Content-Type: application/msword;\n" . // {$fileatt_type}
        " name=\"{$fileatt_name2}\"\n" .
        "Content-Disposition: inline;\n" .
        " filename=\"{$fileatt_name2}\"\n" .
        "Content-Transfer-Encoding: base64\n\n" .
        $data2 . "\n\n" .
        "--{$mime_boundary}--\n";

// Send the message
$send = mail($to, $subject, $message, $headers);
if ($send) {
    echo "<p>Email Sent to intended recipients successfully!</p>";
} else {
    echo "<p>Mail could not be sent. You missed something in the script. Sorry!</p>";
}

date_default_timezone_set('Europe/London');

if (date_default_timezone_get()) {
    echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
}

?>