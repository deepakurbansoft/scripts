<?php
include 'db_conn.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysql_query($con, "DELETE FROM subsciption WHERE invoice='$msgid'");
    echo "<html><head><script>alert('Invoice Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
}
mysql_close($con);

?>