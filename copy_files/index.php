<?php
$company_name = 'texas';
mkdir($company_name, 0777, true);
$myfile = fopen($company_name."/index.php", "w") or die("Unable to open file!");

$s1 = 'template/index.php';
$s2 = $company_name.'/index.php';
copy($s1,$s2);
