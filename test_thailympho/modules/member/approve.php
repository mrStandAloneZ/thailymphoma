<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title></title>
</head>
<body>
<? include "modules/index/header.php" ; ?>
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$bb=$dbarr['member_id']; 
$cc=$dbarr['adviser_id'];
$dd=$dbarr['typemember'];
$ty=$dbarr['typepa'];
?>
<?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost";	//ชื่อโฮสต์
$user = "root";	//ชื่อผู้ใช้
$password = "password";	 //รหัสผ่าน
$dbname = "tumect";	//ชื่อฐานข้อมูล
$tblname = "web_addnew";	//ชื่อตาราง


// เริ่มติดต่อฐานข้อมูล
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

if($dd =='100'){
// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "update web_addnew set status='$status'   where id='$id'";	// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
		mysql_query("SET NAMES tis620");     //   กำหนดให้ค่าที่เป็นทึกเป็น tis620 ให้เป็นภาษาไทยนั้นเอง
} elseif($dd == '200'){
	// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "update web_addnew set status='$status1'   where id='$id'";	// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
		mysql_query("SET NAMES tis620");     //   กำหนดให้ค่าที่เป็นทึกเป็น tis620 ให้เป็นภาษาไทยนั้นเอง
} elseif($dd =='300'){
		// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "update web_addnew set status='$status2'   where id='$id'";	// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
		mysql_query("SET NAMES tis620");     //   กำหนดให้ค่าที่เป็นทึกเป็น tis620 ให้เป็นภาษาไทยนั้นเอง
} else{
			// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "update web_addnew set status='$status3'   where id='$id'";	// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
		mysql_query("SET NAMES tis620");     //   กำหนดให้ค่าที่เป็นทึกเป็น tis620 ให้เป็นภาษาไทยนั้นเอง
	}
$dbquery = mysql_db_query($dbname, $sql);
echo $status;
echo $status1;
echo $status2;
echo $status3;
echo $id;
	
?>
</body>
</html>