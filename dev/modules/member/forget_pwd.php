<?php
$forget=$_POST['forget'];
if(isset($forget) and $forget=="forget") {
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

//ระบบสมาชิกเสริม maxsite 1.10 พัฒนาโดย www.narongrit.net
$user_login=$_POST['user_login'];
$result = mysql_query("select user from ".TB_MEMBER." where user='$user_login' ") or die("Err Database") ;
$numrow = mysql_num_rows($result) ;

if($numrow==0) {
$status = "<center><font size='3' face='MS Sans Serif'><b>ไม่มีชื่อ $user_login อยู่ในฐานข้อมูลครับ</b></font></center>" ;
}
else {

$result = mysql_query("select * from ".TB_MEMBER." where user='$user_login' ") ;
$dbarr = mysql_fetch_array($result) ;
$email = $dbarr['email'] ;
if($result) {
$from = "From:\"$admin_email\"<$admin_email>" ;
$subject = "นี่คือรหัสผ่านในการเข้าสู่ระบบของคุณนะครับ" ;
$message = "สวัสดีครับ คุณ $dbarr[name]

username ในการเข้าสู่ระบบของคุณคือ $dbarr[user]
password ในการเข้าสุ่ระบบของคุณคือ $dbarr[password]

ขอขอบคุณมากครับ ที่เป็นส่วนหนึ่งของทีมงาน  $home " ;

if(mail($email,$subject,$message,$from)) {
$status = "<br><br><center><font size='3' face='MS Sans Serif'><b>ขณะนี้ระบบของเราได้ส่งรหัสผ่านของคุณไปทางอีเมล์ $email เรียบร้อยแล้วครับ<br>
รอสักครู่ ระบบจะนำท่านกลับไปยังหน้าหลัก</b></font></center><br><br>" ;
echo "<meta http-equiv='refresh' content='2; url =index.php'>" ;
}
else {
$status = "<center><font size='3' face='MS Sans Serif'><b>ระบบไม่สามารถส่งอีเมล์ไปให้ท่านได้</b></font></center>" ;
}
}
}

}
else {
$status = "" ;
}

?>



<html>
<head>
<title>Member zone</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td width="32" valign="top"><IMG src="images/fader.gif" border=0></td>
    <td width="688"><p><IMG src="images/topfader.gif" border=0><br>
&nbsp;&nbsp;<IMG SRC="images/menu/textmenu_member.gif" BORDER="0"></p>
	<form action="?name=member&file=forget_pwd" method="post">
              
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
		            <tr valign="top"> 
                  <td colspan="2"> 
                    
                     
                      
                       <div align="center"><p><font color="#000000" size="2"><strong><?php echo $status ; ?></strong></font></p>
                      <p><font color="#000000" size="2"><strong>กรุณากรอก 
                    username ที่ในการเข้าสู่ระบบด้วยครับ</strong></font></p>
                    </div></td>
      </tr>
	
      <tr> 
                  
            <td align="right" bgcolor="#FFFFFF"><font size="2"><strong>username</strong></font></td>
        <td bgcolor="#FFFFFF"><input name="user_login" type="text" id="user_login"></td>
      </tr>
	  <tr> 
                  
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
				            <td bgcolor="#FFFFFF"> 
            <input type="submit" name="Submit" value="send password">
            <input name="forget" type="hidden" id="forget" value="forget">
            &nbsp; </td>
      </tr>
	        <tr> 
                  <td colspan="2" bgcolor="#FFFFFF"><div align="center">
                    <p>&nbsp;</p>
                    <p><strong><font color="#FF0000" size="1" face="MS Sans Serif, Tahoma, sans-serif">ระบบจะส่งรหัสผ่านไปทางอีเมลของคุณ หากไม่พบใน inbox ให้ตรวจสอบใน junk box ครับ </font></strong></p>
                    <p><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif"><br>
                      <br>
                        </font></strong></p>
                  </div></td>
      </tr>
	  
    </table>
	
</form>
	</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
