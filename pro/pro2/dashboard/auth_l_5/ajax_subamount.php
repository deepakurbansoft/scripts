
<?php
include('db_conn.php');
if ($_POST['id']) {
    $id = $_POST['id'];
    
    $query = "select * from mem_types_sub WHERE mem_type_id='$id'";
    
    //echo $query;
    $result = mysqli_query($con, $query);
    
    if (mysqli_affected_rows($con) != 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            echo $row['rate'];
            
        }
    }
}


?>