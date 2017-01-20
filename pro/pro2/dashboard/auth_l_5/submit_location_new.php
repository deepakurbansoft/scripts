<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['location_name'])) {
    
    $location_name    = rtrim($_POST['location_name']);
    $contact_no = rtrim($_POST['contact_no']);
    $area   = rtrim($_POST['address']);
    $description    = rtrim($_POST['description']);
    $invoice_letter    = rtrim($_POST['invoice_letter']);
    $mem_id_letter    = rtrim($_POST['mem_id_letter']);

    $logo   = $_POST['image'];

    if($logo){

    $dataUrl = $logo;

    list($meta, $content) = explode(',', $dataUrl);
    $content = base64_decode($content);
    $img_lower = strtolower($location_name);
    $img_name = str_replace(' ','_',$img_lower);
    $picture = 'logo/'.$img_name.'.png';
    file_put_contents($picture, $content);

    }
    else{
        $picture = 'img/no_logo.gif';
    }

    
    mysqli_query($con, "INSERT INTO gym_location (name,invoice_letter,mem_id_letter,contact_no,area,logo,description) VALUES ('$location_name','$invoice_letter','$mem_id_letter','$contact_no','$area','$picture','$description')");

    echo "<meta http-equiv='refresh' content='0; url=manage_locations.php'>";
} else {
    echo "<head><script>alert('Profile NOT Updated, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=manage_locations.php'>";
    
}
?>
