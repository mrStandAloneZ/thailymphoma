<? include "modules/index/header.php" ; ?>
<div id="center">
				<p>
<?php 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$member_id=$_POST['member_id'];
$user=$_POST['user'];
$password=$_POST['password'];
$user_name=$_POST['user_name'];
$fullname=$_POST['fullname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$hospital_name=$_POST['hospital_name'];
$address_office=$_POST['address_office'];
$work=$_POST['work'];
$tel_office=$_POST['tel_office'];
$tel=$_POST['tel'];
$email=$_POST['email'];



// ถ้ากรอกอีเมล์ไม่ถูกต้อง
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)$",$email)){
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>กรุณากรอกอีเมล์ให้ถูกต้องด้วยครับ</b></font><br><br>
<input type='button' value='กลับไปลองใหม่' onclick='history.back();'></center>" ;
	showerror($showmsg);
}


	//Check Pic Size
	$FILE = $_FILES['FILE'];
	if ( $FILE['size'] > _MEMBER_LIMIT_UPLOAD ) {
	$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>ขนาดรูปที่แนบมามีขนาดเกิน ".(_MEMBER_LIMIT_UPLOAD/1024)." kB กรุณาตรวจสอบรูปภาพของท่าน</b></font><br><br>
	<input type='button' value='กลับไปลองใหม่' onclick='history.back();'></center>" ;
	showerror($showmsg);
	} else {
	//แปลงนามสกุล และทำการ upload
	if ( $FILE['size'] == 0 )
			{$Filename = $member_pic ;} 
			else {
//$sqlnew="select * from ".TB_MEMBER." where member_id='$member_id'";
//$result=mysql_db_query($db,$sqlnew);
$resmember = $db->select_query("SELECT * FROM ".TB_MEMBER." WHERE member_id='$member_id' ");

while ($r=mysql_fetch_array($resmember)) {
	$image=$r[member_pic];
	if ($image) {
	if (file_exists("member_pic/$image")) {
	unlink("member_pic/$image");
	} }
}
	if ( $FILE['type'] == "image/gif" )
			{$Filename = TIMESTAMP.".gif";}
	if ( $FILE['type'] == "image/png" )
			{$Filename = TIMESTAMP.".png";}
	elseif (($FILE['type']=="image/jpg")||($FILE['type']=="image/jpeg")||($FILE['type']=="image/pjpeg"))
			{$Filename = TIMESTAMP.".jpg";}
	@copy ($FILE['tmp_name'] , "member_pic/".$Filename );
} 
$signup = date("j/n/").(date("Y")+543) ;

$member_id = htmlspecialchars($member_id) ;
$fullname = htmlspecialchars($fullname) ;
$sex = htmlspecialchars($sex) ;
$age = htmlspecialchars($age) ;
$hospital_name = htmlspecialchars($hospital_name) ;
$address_office = htmlspecialchars($address_office) ;
$work = htmlspecialchars($work) ;
$tel_office = htmlspecialchars($tel_office) ;
$tel = htmlspecialchars($tel) ;
$email = htmlspecialchars($email) ;

	
		$sql[0]= "update ".TB_MEMBER." set user='$user' where member_id='$member_id' ";
		
		$sql[1] = "update ".TB_MEMBER." set user='$user' where member_id='$member_id' ";
       
        $sql[2] = "update ".TB_MEMBER." set fullname='$fullname' where member_id='$member_id' ";
               
        $sql[3] = "update ".TB_MEMBER." set sex='$sex' where member_id='$member_id' ";
      
		$sql[4] = "update ".TB_MEMBER." set age='$age' where member_id='$member_id'";
	
		$sql[5] = "update ".TB_MEMBER." set hospital_name='$hospital_name' where member_id='$member_id' ";
	
		$sql[6] = "update ".TB_MEMBER." set address_office='$address_office' where member_id='$member_id' ";
	
		$sql[7] = "update ".TB_MEMBER." set work='$work' where member_id='$member_id' ";
	
		$sql[8] = "update ".TB_MEMBER." set tel_office='$tel_office' where member_id='$member_id' ";
		
		$sql[9] = "update ".TB_MEMBER." set tel='$tel' where member_id='$member_id' ";
		
		$sql[10] = "update ".TB_MEMBER." set email='$email' where member_id='$member_id' ";


	  
       for($i=0;$i<10;$i++) {
      $result = mysql_query($sql[$i]) or die("ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อผิดพลาด")  ;
       }


if($result) {
echo "<TABLE width='100%' align=center cellSpacing=0 cellPadding=0 border=0><TR><TD><BR><BR><BR><BR>";
echo "<center><BR><BR><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"><BR><BR></center>";
echo "<center><font size=\"3\" face='MS Sans Serif'><b>รายละเอียดของคุณ ได้ถูกบันทึกใหม่แล้วครับ</b></font><BR><BR><BR><BR><BR><BR><BR><BR></center>" ;
echo "<meta http-equiv='refresh' content='5; url=index.php?name=member&file=member_detail'>" ;
echo "</TD></TR></TABLE>";
}
}
?>
    </p>
                </div>
			<div class="x"></div>
			<div class="break"></div>


		</div>
		<? include "modules/index/footer.php"; ?>