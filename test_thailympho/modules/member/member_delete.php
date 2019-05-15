

<? include "modules/index/header.php" ; ?>
<?
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost";	//ชื่อโฮสต์
$user = "root";	//ชื่อผู้ใช้
$password = "password";	 //รหัสผ่าน
$dbname = "tumect";	//ชื่อฐานข้อมูล
$tblname = "web_addnew";	//ชื่อตาราง

// เริ่มติดต่อฐานข้อมูล
$connect = mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
$db = mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "select * from $tblname where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die ("ส่งคิวรีไม่ได้");

$result = mysql_fetch_array($dbquery);
	
				$id = $result[id];
				$date = $result[date];
				$month = $result[month];
				$year = $result[year];
				$title = $result[title];
				$status=	 $result[status];

echo "<Center>";
echo "<B><Font size=4 color=blue>ยืนยันการลบ Id </Font><Font size=4 color=red> ".$id."</Font></B>";
echo "<Font size=4>";
echo "<Form action=\"index.php?name=member&file=member_delete_ok\" method=\"post\">";	 // ส่งค่าไปอัปเดท
echo "<Input type=\"hidden\" name=\"id\" Size=\"20\" value=\"$id\">";
echo "<Table bgcolor=yellow>";
echo "</Table>";
echo "<Br><Input type=\"Submit\" value=\"&nbsp;ตกลง&nbsp;\">";
echo "</Form>";
echo "<Form action=\"index.php\" method=\"post\">";
echo "<Input type=\"Submit\" value=\"&nbsp;ยกเลิก&nbsp;\">";
echo "</Form>";
echo "</Font>";
echo "</Center>";
?>