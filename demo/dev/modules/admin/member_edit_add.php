
<?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost";	//ชื่อโฮสต์
$user = "root";	//ชื่อผู้ใช้
$password = "password";	 //รหัสผ่าน
$dbname = "aml-all";	//ชื่อฐานข้อมูล
$tblname = "web_member";	//ชื่อตาราง
if($user == "" || $password == "" || $fullname == "" || $hospital_name == "" || $email == "")
		{
			echo "<center><Font Size=4><B>การแก้ไขข้อมูลผิดพลาดเนื่องจากข้อมูลไม่ครบ </B></center>";
			echo "<center><Br><A Href=\"index.php\"> <b>กลับไปหน้าแรก</b> </A></center>";

		}
		else
		{

// เริ่มติดต่อฐานข้อมูล
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "update web_member set user='$user', password='$password', member_id='$member_id',  fullname='$fullname', sex='$sex' , age='$age' , hospital_name='$hospital_name' , codehos='$codehos' , address_office='$address_office' , work='$work' , tel_office='$tel_office',tel='$tel',email='$email'  where id='$id'";	// กำหนดคำสั่ง SQL เพื่อแสดงข้อมูล
mysql_query("SET NAMES tis620");
$dbquery = mysql_db_query($dbname, $sql);
			echo "<center><font size=4>กรุณารอซักครู่ เรากำลังนำท่านกลับสู่หน้าจอหลัก  ของโปรแกรม</font></center>";
		}

?>
<meta http-equiv='refresh' content='1; url=?name=admin&file=member'>