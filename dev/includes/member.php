<?php

$hostname = "localhost";
$user = "thailympho_dbp";
$password = "thailympho_dbp";
$dbname = "thailympho_dbp";
$tblname = "web_member";
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");
mysql_query("SET NAMES tis620");
mysql_select_db($dbname) or die("���͡�ҹ�����������");
?>

