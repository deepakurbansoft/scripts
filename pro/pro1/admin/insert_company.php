<?php
include("db.php");

extract($_POST);

$company_query = mysql_query("SELECT * FROM `company` WHERE `name` = '$company_name'");


if(mysql_num_rows($company_query)==0){


    if(!empty($_FILES['company_logo']['name']))
    {
        $ext = explode('.',$_FILES['company_logo']['name']);
        $extension = $ext[1];
        $img_lower = strtolower($company_name);
        $img_name = str_replace(' ','_',$img_lower);

        $document_name = $img_name.'_'.time().'.'.$extension;
        $full_local_path = 'companylogos/'.$document_name;
        move_uploaded_file($_FILES['company_logo']['tmp_name'], $full_local_path);

    }




    $folder_name = strtolower(str_replace(' ','-',strtolower($company_name)));
    mkdir('../'.$folder_name, 0777, true);
    $myfile = fopen('../'.$folder_name."/index.php", "w") or die("Unable to open file!");

    $s1 = '../template/index.php';
    $s2 = '../'.$folder_name.'/index.php';
    copy($s1,$s2);

    $query= "INSERT INTO company (name,folder_name,logo) VALUES ('$company_name','$folder_name','$document_name')";
    mysql_query($query);

    header("Location: company");
    echo "<meta http-equiv='refresh' content='0; url=company'>";

}else{

    ?>

    <script>
        alert('Company Already Exist.');
        window.top.window.location="add_company.php";
    </script>


    <?php

}


?>