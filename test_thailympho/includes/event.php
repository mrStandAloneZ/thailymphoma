<?
$hostname = "localhost";	
$user = "tshort_lymphoma";	
$password = "tsh00924";	
$dbname = "tshort_lymphoma";	
$tblname = "web_event";	
												mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");
												mysql_query("SET NAMES tis620");
												mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");									
									         
?>
