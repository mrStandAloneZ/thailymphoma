<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);

$signup = date("j/n/").(date("Y")+543) ;
$EventDate=$_POST['EventDate'];
$cat1=$_POST['cat1'];
$cat2=$_POST['cat2'];
$cat3=$_POST['cat3']; 
$cat4=$_POST['cat4'];
$cat5=$_POST['cat5'];


$EventDate = htmlspecialchars($EventDate) ;
$cat1 = htmlspecialchars($cat1) ;
$cat2 = htmlspecialchars($cat2) ;
$cat3 = htmlspecialchars($cat3) ;
$cat4 = htmlspecialchars($cat4) ;
$cat5 = htmlspecialchars($cat5) ;

// ตรวจสอบว่ามีชื่อ user นี้ใช้ไปหรือยัง
$sql = "select date_event from ".TB_CALENDAR." where date_event='$EventDate'" ;
$result = mysql_query($sql) ;
$numrow = mysql_num_rows($result) ;
if($numrow!=0) {
echo"<form NAME='myform' METHOD=POST ACTION='admin.php?name=admin&file=addevent_update'>";
echo"<INPUT TYPE=\"hidden\" NAME=\"EventDate\" value=\"".$_POST[EventDate]."\">";
echo"<INPUT TYPE=\"hidden\" NAME=\"cat1\" value=\"".$_POST[cat1]."\">";
echo"<INPUT TYPE=\"hidden\" NAME=\"cat2\" value=\"".$_POST[cat2]."\">";
echo"<INPUT TYPE=\"hidden\" NAME=\"cat3\" value=\"".$_POST[cat3]."\">";
echo"<INPUT TYPE=\"hidden\" NAME=\"cat4\" value=\"".$_POST[cat4]."\">";
echo"<INPUT TYPE=\"hidden\" NAME=\"cat5\" value=\"".$_POST[cat5]."\">";
echo"<INPUT TYPE=\"hidden\" NAME=\"signup\" value=\"".$_POST[signup]."\">";
echo"<br><br><center><font size='3' face='MS Sans Serif'>ขอโทษด้วยครับ มีข้อมูลวันที่ $EventDate นี้แล้ว <br><br><INPUT TYPE=\"submit\" VALUE=\" ต้องการบันทึกทับ \">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' value='กลับไปลองใหม่' onclick='history.back();'></center>" ;
echo"</form>";
} //
else {

// ถ้ายังไม่มีผู้ใช้ชื่อ user นี้

$result = mysql_query("insert into ".TB_CALENDAR." (date_event,cat1,cat2,cat3,cat4,cat5,signup)

values('$EventDate','$cat1','$cat2','$cat3','$cat4','$cat5','$signup')")  or die("ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบความผิดพลาด หรือติดต่อ ผู้ดูแลระบบ");
if($result) {
echo "<br><br><br><br><br><br><center><img src='images/login-redirection-loader.gif' alt='login-redirection-loader' />\n<br><br><br></center>" ;
echo "<center><strong>เพิ่มตารางปฎิบัติงานเรียบร้อยแล้ว</strong><br><br><br><br><br></center>";
echo "<meta http-equiv='refresh' content='3; url=admin.php?name=admin&file=calendar'>" ;
}
}
?>