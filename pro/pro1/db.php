<?php

if($_SERVER['SERVER_NAME'] == 'localhost')
{
    mysql_connect('localhost','root','');
    mysql_select_db('cbpc');
    mysql_query('set names utf8');

}
else
{
    mysql_connect('localhost','cbpcdb_admin','yI0TplxNGWAa');
    mysql_select_db('cbpc_db');
    mysql_query('set names utf8');

}

error_reporting(0);

session_start();

function get_cell($table_name,$id,$cellname)
{
    $cell_array=mysql_fetch_assoc(mysql_query("select `$cellname` from `$table_name` where `id` = '$id'"));

//    echo "select `$cellname` from `$table_name` where `id` = '$id'";
    return $cell_array[$cellname];
}

function get_cell_value($table_name,$condition,$value,$cellname)
{
    $cell_array=mysql_fetch_assoc(mysql_query("select `$cellname` from `$table_name` where `$condition` = '$value'"));

//    echo "select `$cellname` from `$table_name` where `$condition` = '$value'";

    return $cell_array[$cellname];
}
?>