<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'login';
    $conn = mysql_connect ($dbhost, $dbuser, $dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
    mysql_select_db ($dbname);
}
else{
    $dbhost = 'localhost';
    $dbuser = 'caasjournals';
    $dbpass = 'Caas-2015';
    $dbname = 'caasjour_connect';
    $conn = mysql_connect ($dbhost, $dbuser, $dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
    mysql_select_db ($dbname);
}

if(!function_exists(get_cell))
{
    function get_cell($table_name,$id,$cellname)
    {
        $cell_array=mysql_fetch_assoc(mysql_query("select `$cellname` from `$table_name` where `id` = '$id'"));

        return $cell_array[$cellname];
    }
}

?>

