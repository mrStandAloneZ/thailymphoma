
<?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost";	//ชื่อโฮสต์
$user = "root";	//ชื่อผู้ใช้
$password = "password";	 //รหัสผ่าน
$dbname = "cml";	//ชื่อฐานข้อมูล
$tblname = "web_add_data";	//ชื่อตาราง

// เริ่มติดต่อฐานข้อมูล
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "delete from web_add_data where id='$id'";	// กำหนดคำสั่ง SQL เพื่อลบข้อมูล

$dbquery = mysql_db_query($dbname, $sql);

echo "<BR><BR><CENTER><Font Size=4><B>ลบข้อมูลของ<Font color=red>  ".$fullname. "</Font>เรียบร้อยแล้ว</B><Br>";
echo "<Br><A Href=\"index.php\">กลับไปหน้าหลัก</A></CENTER>";	// เครื่องหมาย / หน้า " ทำให้ไม่เกิด error เมื่อรัน

?>

<? include "modules/index/footer.php"; ?>