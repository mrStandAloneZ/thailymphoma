<?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost";	//ชื่อโฮสต์
$user = "root";	//ชื่อผู้ใช้
$password = "password";	 //รหัสผ่าน
$dbname = "phonebookpm";	//ชื่อฐานข้อมูล
$tblname = "phone";	//ชื่อตาราง
		if($sex == "" || $name == "" || $address == "" || $phone == "" || $mail == "")
		{
			echo "<center><Font Size=4><B>ท่านกรอกข้อมูลไม่ครบ </B></center>";
			echo "<center><Br><A Href=\"Ex10_06.php\"> <b>กลับไปกรอกข้อมูล</b> </A></center>";
			echo "<center><Br><A Href=\"index.php\"> <b>กลับไปหน้าแรก</b> </A></center>";

		}
		else
		{

// เริ่มติดต่อฐานข้อมูล
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
$sql = "select * from $tblname";
$dbquery = mysql_db_query($dbname, $sql);

// สร้างidให้รันแบบAuto
$num_rows = mysql_num_rows($dbquery);
$ids=$num_rows+1;
$sql = "ALTER TABLE `phone` pack_keys=0 checksum=0 delay_key_write=0 auto_increment=$ids";
$dbquery = mysql_db_query($dbname, $sql);


// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "insert into $tblname (sex, name, address, phone, mail) values ('$sex','$name', '$address', '$phone', '$mail')";	// กำหนดคำสั่ง SQL เพื่อเพิ่มข้อมูลแบบคีย์ในคำสั่ง SQL
$dbquery = mysql_db_query($dbname, $sql);

// ปิดการติดต่อฐานข้อมูล
mysql_close();

header("Location:index.php");
		}

?>
