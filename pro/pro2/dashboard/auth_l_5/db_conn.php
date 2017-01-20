<?php

if($_SERVER['SERVER_NAME'] == 'localhost') {
    $host = "localhost"; // Host name
    $username = "root"; // Mysql username
    $password = ""; // Mysql password
    $db_name = "gymms"; // Database name
}
else{
    $host = "localhost"; // Host name
    $username = "urbansoft"; // Mysql username
    $password = "taurbansoft"; // Mysql password
    $db_name = "gym"; // Database name
}

// Connect to server and select databse.


 $con      = mysqli_connect($host, $username, $password, $db_name);



// Check connection
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
function page_protect()
{
    session_start();
    
    global $db;
    
    /* Secure against Session Hijacking by checking user agent */
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            header("Location: ../../login/");
            exit();
        }
    }
    
    // before we allow sessions, we need to check authentication key - ckey and ctime stored in database
    
    /* If session not set, check for cookies set by Remember me */
    if (!isset($_SESSION['user_data']) && !isset($_SESSION['logged']) && !isset($_SESSION['auth_level']) && !isset($_SESSION['sex']) && !isset($_SESSION['full_name'])) {
        session_destroy();
        header("Location: ../../login/");
        exit();
    } else {
    }
    $a = $_SESSION['auth_level'];
    if (strpos($a, '5') !== false) {
    } else {
        header("Location: ../../login/");
    }
}


    function get_field($table_name,$mem_id,$field_id,$field)
    {

        if($_SERVER['SERVER_NAME'] == 'localhost') {
            $con = mysqli_connect('localhost', 'root', '', 'gymms');
        }
        else{
            $con = mysqli_connect('localhost', 'urbansoft', 'taurbansoft', 'gym');
        }
        $query   = "select * from `$table_name` WHERE $field_id = '$mem_id'";
        $result  = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            return $row[$field];
        }

    }

    function get_row($table_name,$field_name,$value)
    {

        if($_SERVER['SERVER_NAME'] == 'localhost') {
            $con = mysqli_connect('localhost', 'root', '', 'gymms');
        }
        else{
            $con = mysqli_connect('localhost', 'urbansoft', 'taurbansoft', 'gym');
        }
        $query   = "select COUNT(*) from `$table_name` WHERE $field_name = '$value'";
        $result  = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            return $row['COUNT(*)'];

        }

    }



?>