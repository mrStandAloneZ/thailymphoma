

<?
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost";	//ชื่อโฮสต์
$user = "root";	//ชื่อผู้ใช้
$password = "password";	 //รหัสผ่าน
$dbname = "cml";	//ชื่อฐานข้อมูล
$tblname = "web_member";	//ชื่อตาราง

// เริ่มติดต่อฐานข้อมูล
$connect = mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
$db = mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "select * from $tblname where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die ("ส่งคิวรีไม่ได้");

$result = mysql_fetch_array($dbquery);
	
				$id = $result[id];
				$member_id = $result[member_id];
				$user = $result[user];
				$password = $result[password];
				$fullname = $result[fullname];
		

echo "<Center>";
echo "<Font size=4>";
echo "<Form action=\"admin.php?name=admin&file=member_delete_ok\" method=\"post\">";	 // ส่งค่าไปอัปเดท
echo "<Input type=\"hidden\" name=\"id\" Size=\"20\" value=\"$id\">";
echo "<Table height=500>";
echo "<tr><td><B><Font size=4 color=blue><center>ยืนยันการลบ  </Font><Font size=4 color=red> ".$fullname."</Font></center></B></td>  </tr>";
echo "</Table>";
echo "<Br><Input type=\"Submit\" value=\"&nbsp;ตกลง&nbsp;\">";
echo "</Form><br>";
echo "<Form action=\"index.php\" method=\"post\">";
echo "<Input type=\"Submit\" value=\"&nbsp;ยกเลิก&nbsp;\">";
echo "</Form>";
echo "</Font>";
echo "</Center>";

?>

<? include "modules/index/footer.php"; ?>