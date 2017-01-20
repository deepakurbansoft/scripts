<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['id'])) {
    
    $name    = rtrim($_POST['name']);
    $contact_no = rtrim($_POST['contact_no']);
    $address    = rtrim($_POST['area']);
    $logo    = $_POST['logo'];
    $id = $_POST['id'];
    $description = $_POST['description'];
    $invoice_letter = $_POST['invoice_letter'];
    $mem_id_letter = $_POST['mem_id_letter'];



    if(!empty($_FILES['logo']['name']))
    {
        $ext = explode('.',$_FILES['logo']['name']);
        $extension = $ext[1];
        $img_lower = strtolower($name);
        $img_name = str_replace(' ','_',$img_lower);

        $document_name = $img_name.'_'.time().'.'.$extension;
        $full_local_path = 'logo/'.$document_name;
        move_uploaded_file($_FILES['logo']['tmp_name'], $full_local_path);
        mysqli_query($con, "UPDATE gym_location SET  logo='$full_local_path' WHERE id='$id'");
    }


    mysqli_query($con, "UPDATE gym_location SET name='$name', invoice_letter='$invoice_letter', mem_id_letter='$mem_id_letter', contact_no='$contact_no', area='$address', description='$description' WHERE id='$id'");

    echo "<meta http-equiv='refresh' content='0; url=manage_locations.php'>";
} else {
    echo "<head><script>alert('Location NOT Updated, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=manage_locations.php'>";
    
}
?>
