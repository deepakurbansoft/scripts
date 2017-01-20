<?php
include 'db_conn.php';
page_protect();
$id = $_POST['id'];
if (strlen($id) > 0) {
    mysqli_query($con, "DELETE FROM auth_user WHERE id='$id'");
    echo "<html><head><script>alert('User Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=manage_users.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=manage_users.php'>";
}
mysqli_close($con);

?>

