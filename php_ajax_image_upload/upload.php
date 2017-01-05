<?php
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "images/".$_FILES['userImage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {

    ?>
<img src="<?php echo $targetPath; ?>" width="100px" height="100px" />
<span>Name : <?php echo $_POST['user_name'];?></span>
<?php
}
}
}
?>