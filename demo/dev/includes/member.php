<?php

$hostname = "localhost";
$user = "thailympho_dbp";
$password = "thailympho_dbp";
$dbname = "thailympho_dbp";
$tblname = "web_member";
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_query("SET NAMES tis620");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
?>

