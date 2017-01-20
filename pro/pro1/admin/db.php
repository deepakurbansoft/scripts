<?php

if($_SERVER['SERVER_NAME'] == 'localhost')
{
    mysql_connect('localhost','root','');
    mysql_select_db('cbpc');
    mysql_query('set names utf8');


}
else
{
    mysql_connect('localhost','urbancc_urban','Urb@ns0ft@123.');
    mysql_select_db('cbpc');
    mysql_query('set names utf8');

}



//
//mysql_connect('localhost','root','');
//mysql_select_db('cbpc');
//mysql_query('set names utf8');


error_reporting(0);
//$conn = mysql_connect("localhost","jaikris2_urban","taurbansoft");
//$db = mysql_select_db('jaikris2_demoalmanara');
session_start();



?>