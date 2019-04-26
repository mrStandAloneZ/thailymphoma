<!-- main content -->
<?php
require_once("includes/config.in.php");
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);

// เริ่มติดต่อฐานข้อมูล
$connect = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
$db = mysql_select_db(DB_NAME) or die("เลือกฐานข้อมูลไม่ได้");

// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "select * from " . TB_MEMBER . " where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die("ส่งคิวรีไม่ได้");
$result = mysql_fetch_array($dbquery);
$id = $result[id];
$member_id = $result[member_id];
$user = $result[user];
$password = $result[password];
$fullname = $result[fullname];
$sex = $result[sex];
$age = $result[age];
$hospital_name = $result[hospital_name];
$codehos = $result[codehos];
$address_office = $result[address_office];
$work = $result[work];
$tel_office = $result[tel_office];
$tel = $result[tel];
$email = $result[email];
?>
<?php
echo "<Center>";
echo "<B><Font size=4 color=blue>รหัสประจำตัวสมาชิก </Font><Font size=4 color=red> " . $member_id . "</Font></B>";
echo "<Font size=4>";
echo "<Form action=\"admin.php?name=admin&file=member_edit_add\" method=\"post\">";  // ส่งค่าไปอัปเดท
echo "<Input type=\"hidden\" name=\"id\" Size=\"20\" value=\"$id\">";
echo "<Table>";
echo "<Tr><Td align = right>รหัสสมาชิก:</Td><td><Input type=\"text\" name=\"member_id\" Size=\"50\" value=\"$member_id\"></td></tr>";
echo "<Tr><Td align = right>ชื่อ-นามสกุล : </Td> <Td><Input type=\"text\" name=\"fullname\" Size=\"50\" value=\"$fullname\"></Td></Tr>";
echo "<Tr><Td align = right>เพศ : </Td> <Td><Input type=\"text\" name=\"sex\" Size=\"50\" value=\"$sex\"></Td></Tr>";
echo "<Tr><Td align = right>อายุ : </Td> <Td><Input type=\"text\" name=\"age\" Size=\"50\" value=\"$age\"></Td></Tr>";
echo "<Tr><Td align = right>โรงพยาบาล :</Td> <Td><Input type=\"text\" name=\"hospital_name\" Size=\"20\" value=\"$hospital_name\"> </Td></Tr>";
echo "<Tr><Td align = right>รหัสโรงพยาบาล : </Td> <Td><Input type=\"text\" name=\"codehos\" Size=\"50\" value=\"$codehos\"></Td></Tr>";
echo "<Tr><Td align = right>ที่อยู่โรงพยาบาล : </Td> <Td><Input type=\"text\" name=\"address_office\" Size=\"50\" value=\"$address_office\"></Td></Tr>";
echo "<Tr><Td align = right>ตำแหน่ง : </Td> <Td><Input type=\"text\" name=\"work\" Size=\"20\" value=\"$work\"></Td></Tr>";
echo "<Tr><Td align = right>เบอร์โทร : </Td> <Td><Input type=\"text\" name=\"tel_office\" Size=\"20\" value=\"$tel_office\"></Td></Tr>";
echo "<Tr><Td align = right>มือถือ : </Td> <Td><Input type=\"text\" name=\"tel\" Size=\"20\" value=\"$tel\"></Td></Tr>";
echo "<Tr><Td align = right>email  :</Td> <Td><Input type=\"text\" name=\"email\" Size=\"20\" value=\"$email\"></Td></Tr>";

echo "</Table>";
echo "<Br><Input type=\"Submit\" value=\"&nbsp;แก้ไข&nbsp;\">";
echo "</Form>";
echo "<Form action=\"index.php\" method=\"post\">";
echo "<Input type=\"Submit\" value=\"&nbsp;ยกเลิก&nbsp;\">";
echo "</Form>";
echo "</Font>";
echo "</Center>";

require_once("includes/add_data.php");
?>
