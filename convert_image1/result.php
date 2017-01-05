<?php
//Show the image
echo '<img src="'.$_POST['img_val'].'" />';

//Get the base-64 string from data
$filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);

//Decode the string
$unencodedData=base64_decode($filteredData);

//Save the image
file_put_contents('img.png', $unencodedData);
?>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jquery.plugin.html2canvas.js"></script>

