<?php
// กำหนด วันเวลา ปัจจุบัน ที่ต้องส่งเมล์
$date = date("j") ;
$month = date("n") ;

$click=$_POST['click'];
//$click2=$_POST['click2']

if(isset($click)and $click=="click") {
include("member_function.php") ;
}
else {
echo "<meta http-equiv='refresh' content='0; url=?name=admin&file=member&file=member_mail'>" ;
exit() ;
}
mysql_query("set NAMES tis620");	//เลือกภาษาไทย

$sendmail=$_POST['sendmail'];
$edit=$_POST['edit'];

if(isset($sendmail)) { // ถ้าส่งเมล์
$result = mysql_query("select * from ".TB_MAIL."") ;
$row = mysql_num_rows($result) ;
if($row == 0) { // ตรวจสอบว่ามีข้อความหรือยัง ถ้าไม่มีให้กรอกบันทึกลงฐานข้อมูล
echo "<br><center><font size='3' face='MS Sans Serif'>กรุณากรอกข้อความที่ต้องการส่งก่อนครับ เพราะขณะนี้ยังไม่มีข้อความอยู่ในฐานข้อมูล</font><br><br></center>" ;
form_edit() ; // แสดงฟอร์มจากฟังก์ชั่น
}
else {
if(empty($edit) and isset($sendmail)) {
sendemail($admin_email) ;
}
}
}

if(isset($edit)) {
echo "<br><center><font size='3' face='MS Sans Serif'>กรุณาบันทึกข้อความของท่านลงสู่ฐานข้อมูล</font></center><br><br>" ;
form_edit() ;
}

// ถ้าบันทึกข้อความ 
if(isset($subject) and isset($message)) {
checkmessage($subject,$message) ;
}

	$subject_total=$_POST['subject_total'];
	$message_total=$_POST['message_total'];

// ถ้าส่งเมล์หาสมาชิกทั้งหมด
if(isset($subject_total) and isset($message_total)) {
sendmail_total($subject_total,$message_total,$admin_email) ;
}

?>
