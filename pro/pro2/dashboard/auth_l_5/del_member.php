<?php
include 'db_conn.php';
page_protect();

$currentFile = $_SERVER["HTTP_REFERER"];
$parts = explode('/', $currentFile);
$page = $parts[count($parts) - 1];

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM user_data WHERE newid='$msgid'");
    mysqli_query($con, "DELETE FROM subsciption WHERE mem_id='$msgid'");
    mysqli_query($con, "DELETE FROM subsciption_sub WHERE mem_id='$msgid'");
    echo "<html><head><script>alert('Member Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=".$page."'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=".$page."'>";
}
mysqli_close($con);

?>