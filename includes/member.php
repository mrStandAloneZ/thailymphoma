<?php

$hostname = "db";
$user = "thailympho_dbp";
$password = "VB-D#ThaAi#LogCe&";
$dbname = "thailympho_dbp";
$tblname = "web_member1";
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");
mysql_query("SET NAMES tis620");
mysql_select_db($dbname) or die("���͡�ҹ�����������");
?>

