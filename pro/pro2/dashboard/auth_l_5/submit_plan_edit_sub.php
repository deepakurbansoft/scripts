<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['p_id'])) {
    
    $name    = rtrim($_POST['name']);
    $details = rtrim($_POST['details']);
    $days    = rtrim($_POST['days']);
    $rate    = rtrim($_POST['rate']);
    
    $p_id = $_POST['p_id'];
    
    mysqli_query($con, "UPDATE mem_types_sub SET name='$name', details='$details', rate='$rate', days='$days'WHERE mem_type_id='$p_id'");
    echo "<meta http-equiv='refresh' content='0; url=view_plan_sub.php'>";
} else {
    echo "<head><script>alert('Profile NOT Updated, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_plan_sub.php'>";
    
}
?>