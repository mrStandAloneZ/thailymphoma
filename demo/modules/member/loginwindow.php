<html>
<head>
<title>หน้าล็อคอิน</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874"></head>
<body>
<?php 
//ระบบสมาชิกเสริม maxsite 1.10 พัฒนาโดย www.narongrit.net
			
if($_SESSION['login_true']) {
	$login_true=$_SESSION['login_true'];
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[member] = $db->select_query("SELECT * FROM ".TB_MEMBER." WHERE user='$login_true' ");
while($arr[member] = $db->fetch($res[member])){

echo "<br><div align='center'><b><font size='2' face='MS Sans Serif, Tahoma, sans-serif' color='#0099FF'>สวัสดีคุณ <u>$login_true</u></font></b>
<br><br>";

	if($arr[member][member_pic]==""){ 
	echo "<IMG SRC=\"member_pic/member_nrr.gif\" BORDER='1' ALIGN='center' class='membericon'>";
	}else{  
	echo "<IMG SRC=member_pic/".$arr[member][member_pic]." width='100' BORDER='1' ALIGN='center'>";
	 }; 
echo "<br><br>
[&nbsp;<a href='?name=member&file=member_detail'>ดูรายละเอียด</a>&nbsp;]&nbsp;| [&nbsp;<a href='?name=member&file=member_edit'>แก้ไขข้อมูล</a>&nbsp;]<br><br>
[&nbsp;<a href='?name=member&file=change_pwd'>เปลี่ยนรหัสผ่าน</a>&nbsp;]&nbsp;|&nbsp;[&nbsp;<a href='?name=member&file=logout'> Logout </a>&nbsp;] </div>
" ;
}
$db->closedb ();
//จบการแสดงสมาชิกล่าสุด
} 
if(!$_SESSION['login_true']) {
			  echo "<br>
			  <form name='checkForm' action='?name=member&file=login_check' method='post' onsubmit='return check();'>
                <table width=218 height='79' border=0 align=center cellpadding=0 cellspacing=2>
                  <tr>
                    <td width='270' height='25' align='left'> <strong><font size='1' face='MS Sans Serif, Tahoma, sans-serif' color='blue'>Username</font><font size='1' face='MS Sans Serif, Tahoma, sans-serif'> : 
                            <input name='user_login' type='text' id='user_login' size='20'>
                    </font><font size='1' face='MS Sans Serif, Tahoma, sans-serif' color='blue'> <br>
                    <br>
                    Password </span></font><font size=1 face='MS Sans Serif, Tahoma, sans-serif'> :
                            <input name='pwd_login' type='password' id='pwd_login' size='20'>
                            <br>
                            <br>
                    </font></strong>
                      
			        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='Submit' value='เข้าระบบ'>&nbsp;&nbsp;<input type='reset' name='clear' value='Clear'></td>
                  </tr>
                </table>
			  </form> 
				<div align='center'>
				<p><br>
		    [ <a href='?name=member&file=index'>สมัครสมาชิก</a> ] | [ <a href='?name=member&file=forget_pwd'>ลืมรหัสผ่าน</a> ]</div> ";
				} 
				?>


<script language='JavaScript'>
					function check() {
						if(document.checkForm.user_login.value=='') {
						alert('กรุณากรอกชื่อที่ใช้ในการล็อกอินด้วยครับ') ;
						document.checkForm.user_login.focus() ;
						return false ;
						}
							else if(document.checkForm.pwd_login.value=='') {
							alert('กรุณากรอกรหัสผ่านด้วยครับ') ;
							document.checkForm.pwd_login.focus() ;
							return false ;
						}
						else
						return true ;
						}
                      </script><br><br>
</body>
</html>

				