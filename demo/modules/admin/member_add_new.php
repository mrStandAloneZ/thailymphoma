<?php 
session_start() ;

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$max_id=$_POST['max_id'];
$fullname=$_POST['fullname'];
$sex=$_POST['sex'];    			
$age=$_POST['age'];
$hospital_name=$_POST['hospital_name'];
$codehos=$_POST['codehos'];
$address_office=$_POST['address_office'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$user=$_POST['user_name'];
$password=$_POST['pwd_name1'];
$hostpital_engname =$_POST["hostpital_engname"];

								
if($fullname==""  || $user_name=="" || $pwd_name1=="" || $email=="") {
		echo "<script language='javascript'>" ;
		echo "alert('ท่านต้องกรอกข้อมูลอย่างน้อยตามที่กำหนดไว้ !')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
}  

// ถ้ากรอกอีเมล์ไม่ถูกต้อง
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)$",$email)){
		echo "<script language='javascript'>" ;
		echo "alert('กรุณากรอกอีเมล์ให้ถูกต้องด้วยครับ !')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
}
 else {
if((isset($ok)) and ($ok!="ok_pass")) {
echo "<meta http-equiv='refresh' content='0; url=admin.php?name=admin&file=signup'>" ;
}

$signup = date("j/n/").(date("Y")+543) ;

$fullname = htmlspecialchars($fullname) ;
$address_office = htmlspecialchars($_POST['address_office']) ;
$tel = htmlspecialchars($_POST['tel']) ;


// ตรวจสอบว่ามีชื่อ user นี้ใช้ไปหรือยัง
$sql = "select user from ".TB_MEMBER." where user='$user_name'" ;
$result = mysql_query($sql) ;
$numrow = mysql_num_rows($result) ;
if($numrow!=0) {
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'>ขอโทษด้วยครับ user $user_name นี้ ได้มีผู้ใช้ไปแล้วครับ กรุณาเปลี่ยนชื่อ Login ใหม่<br><br><input type='button' value='กลับไปลองใหม่' onclick='history.back();'></center>" ;
	showerror($showmsg);
} else {

	//Check Pic Size
	$FILE = $_FILES['FILE'];
	if ( $FILE['size'] > _MEMBER_LIMIT_UPLOAD ) {
	$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>ขนาดรูปที่แนบมามีขนาดเกิน ".(_MEMBER_LIMIT_UPLOAD/1024)." kB กรุณาตรวจสอบรูปภาพของท่าน</b></font><br><br>
	<input type='button' value='กลับไปลองใหม่' onclick='history.back();'></center>" ;
	showerror($showmsg);
	} else {
	//แปลงนามสกุล และทำการ upload
	if ( $FILE['type'] == "image/gif" )
			{$Filename = TIMESTAMP.".gif";}
	if ( $FILE['type'] == "image/png" )
			{$Filename = TIMESTAMP.".png";}
	elseif (($FILE['type']=="image/jpg")||($FILE['type']=="image/jpeg")||($FILE['type']=="image/pjpeg"))
			{$Filename = TIMESTAMP.".jpg";}
	@copy ($FILE['tmp_name'] , "member_pic/".$Filename );

// ถ้ายังไม่มีผู้ใช้ชื่อ user นี้

$sql = "select * from ".TB_MEMBER." order by id desc" ;
$result = mysql_query($sql) ;
$num_result  = mysql_num_rows($result) ;
$dbarr = mysql_fetch_row($result) ;
$member_db = $dbarr[0]+1 ; // นำค่า id มาเพิ่มให้กับค่ารหัสสมาชิกครั้งละ1

if($member_db>=100) {
$member_in = "0$member_db" ;
}
else {
if($member_db >=10) {
$member_in = "00$member_db" ;
}
else {
$member_in = "000$member_db" ;
}
}

$member_id = "$yourcode$member_in" ; // รหัสสมาชิกเช่น ip0001


//echo "insert into ".TB_MEMBER." (member_id,user,password,fullname,sex,age,hospital_name,codehos,address_office,work,tel_office,tel,email)
//values('$max_id','$user','$password','$fullname','$sex','$age','$hospital_name','$codehos','$address_office','$work','$tel_office','$tel','$email')";


$result = mysql_query("insert into ".TB_MEMBER." (member_id,user,password,fullname,sex,age,hospital_name,hostpital_engname,codehos,address_office,work,tel_office,tel,email)
values('$max_id','$user','$password','$fullname','$sex','$age','$hospital_name','$hostpital_engname','$codehos','$address_office','$work','$tel_office','$tel','$email')")  or die("ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบความผิดพลาด หรือติดต่อ ผู้ดูแลโปรแกรม");
if($result) {

echo "<TABLE width='90%' align=center cellSpacing=0 cellPadding=0 border=0><TR><TD><BR><BR><BR><BR>";
echo "<center><BR><BR><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"><BR><BR></center>";
echo "<center><font size=\"3\" face='MS Sans Serif'><b>เพิ่มสมาชิก สำเร็จเรียบร้อยแล้ว</b></font><BR><BR><BR><BR><BR><BR><BR><BR></center>" ;
echo "<meta http-equiv='refresh' content='5; url=admin.php?name=admin&file=signup'>" ;
echo "</TD></TR></TABLE>";

}
}
 }
 }
?>