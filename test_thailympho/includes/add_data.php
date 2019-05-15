<?
$hostname = "localhost";	
$user = "thailympho_dbp";	
$password = "VB-D#ThaAi#LogCe&";	
$dbname = "thailympho_dbp";	
$tblname = "web_add_data1";	
												mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");
												mysql_query("SET NAMES tis620");
												mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");									
									         
?>
