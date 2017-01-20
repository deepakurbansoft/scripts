<?php

$my_dbhost = 'hazel.arvixe.com';
$my_dbuser = 'urbansoft';
$my_dbpass = 'taurbansoft';
$my_conn = mysql_connect($my_dbhost, $my_dbuser, $my_dbpass) or die ('I cannot connect to the database because: ' . mysql_error()); ;
mysql_select_db('urbansoft_pan');

?>