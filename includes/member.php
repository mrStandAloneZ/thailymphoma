<?php

// local
$hostname = "db";	
$user = "thailympho_dbp";	
$password = "VB-D#ThaAi#LogCe&";

// dev
// $hostname = "localhost";	
// $user = "root";	
// $password = "password";

// production
// $hostname = "localhost";	
// $user = "thailympho_dbp";	
// $password = "VB-D#ThaAi#LogCe&";

$hostname = $hostname;
$user = $user;
$password = $password;
$dbname = "thailympho_dbp";
$tblname = "web_member1";
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");
mysql_query("SET NAMES tis620");
mysql_select_db($dbname) or die("���͡�ҹ�����������");
?>

