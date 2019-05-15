		<?
if($_SESSION['admin_user']){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?name=admin&file=main\">";
}
?>

	<style type="text/css">





	select {
    width: 90%;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
        background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; 
}
input[type=text]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=password]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
button  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=button]  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}

input[type=submit]  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#aa2125;

}

textarea{
      width: 80%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
}
</style>
<TABLE width="95%" style="margin:auto;">
				<TR>
					<TD>
<?
//Check Admin
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[admin] = $db->select_query("SELECT * FROM ".TB_ADMIN." WHERE username='".$_POST[username]."' AND password='".md5($_POST[password])."'  "); 
$rows[admin] = $db->rows($res[admin]); 
if($rows[admin]){
	$arr[admin] = $db->fetch($res[admin]);
}
$db->closedb ();
if(USE_CAPCHA){
	if($_SESSION['security_code'] != $_POST['security_code'] OR empty($_POST['security_code'])) {
		echo "<script language='javascript'>" ;
		echo "alert('!!!! กรุณากรอกโค๊ดให้ถูกต้อง !!!!')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
}

//Can Login
if($arr[admin][id]){
	//Login ผ่าน
	ob_start();
	$_SESSION['admin_user'] = $_POST[username] ;
	$_SESSION['admin_pwd'] = md5($_POST[password]) ;
	
	$_SESSION['login_true']  = $_POST[username];
	
	$_SESSION['ty_user'] = 2;
	session_write_close();
	ob_end_flush();
?>
<br /><br /><br /><br /><br />
<CENTER><A HREF="admin.phph?name=admin&file=main"><IMG SRC="images/login-redirection-loader.gif" BORDER="0"></A><BR><BR>
<FONT COLOR="#336600"><B>ได้ทำการเข้าระบบเรียบร้อยแล้ว</B></FONT><BR><BR>
<A HREF="admin.php?name=admin&file=main"><B>เข้าหน้าหลักผู้ดูแลระบบ</B></A>
<meta http-equiv='refresh' content='5; url=admin.php?name=admin&file=main'>
</CENTER>
<br /><br /><br /><br />
<?
}else{
	//Login ไม่ผ่าน
?>
					<BR><BR>
					<CENTER><B><FONT COLOR="#FF0000">กรุณากรอก ชื่อผู้ใช้ หรือ รหัสผ่าน  </FONT></B>
					<FORM METHOD=POST ACTION="?name=admin&file=login">
					<center>
					<TABLE width=300 align=center>
					<TR>
						<TD width="100" align="right"><B>ชื่อผู้ใช้ : </B></TD>
						<TD><INPUT TYPE="text" NAME="username"></TD>
					</TR>
					<TR>
						<TD width="100" align="right"><B>รหัสผ่าน : </B></TD>
						<TD><INPUT TYPE="password" NAME="password"></TD>
					</TR>
<?
if(USE_CAPCHA){
?>
					<TR>
						<TD width="100" align="right">
						<? if(CAPCHA_TYPE == 1){ 
							echo "<img src=\"capcha/CaptchaSecurityImages.php?width=".CAPCHA_WIDTH."&height=".CAPCHA_HEIGHT."&characters=".CAPCHA_NUM."\" width=\"".CAPCHA_WIDTH."\" height=\"".CAPCHA_HEIGHT."\" align=\"absmiddle\" />";
						}else if(CAPCHA_TYPE == 2){ 
							echo "<img src=\"capcha/val_img.php?width=".CAPCHA_WIDTH."&height=".CAPCHA_HEIGHT."&characters=".CAPCHA_NUM."\" width=\"".CAPCHA_WIDTH."\" height=\"".CAPCHA_HEIGHT."\" align=\"absmiddle\" />";
						}; ?>
						</TD>
						<TD><input name="security_code" type="text" id="security_code" maxlength="6" ></TD>
					</TR>
<?
}
?>
					<TR>
						<TD width="100" align="right"></TD>
						<TD><INPUT TYPE="submit" VALUE=" เข้าระบบ " style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:100px;"></TD>
					</TR>
					</TABLE>
					</center>
                    <br /><br /><br />
					</FORM>
<?
}
?>

					</TD>
				</TR>
			</TABLE>
			</CENTER>
            