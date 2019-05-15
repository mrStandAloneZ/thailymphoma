
		<?
if($_SESSION['admin_user']){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?name=admin&file=main\">";
}
?><br />
        <center><img src="images/logo.jpg" width="940" height="140" /></center>
<FORM METHOD=POST ACTION="?name=admin&file=login">
<table style="margin:auto;" align="center">
					<TR>
						<TD width="30%" align="right"><B>ชื่อผู้ใช้ : </B></TD>
						<TD><INPUT TYPE="text" NAME="username"></TD>
					</TR>
					<TR>
						<TD width="30%" align="right"><B>รหัสผ่าน : </B></TD>
						<TD><INPUT TYPE="password" NAME="password"></TD>
					</TR>
<?
if(USE_CAPCHA){
?>
					<TR>
						<TD width="30%" align="right">
						<? if(CAPCHA_TYPE == 1){ 
							echo "<img src=\"capcha/CaptchaSecurityImages.php?width=".CAPCHA_WIDTH."&height=".CAPCHA_HEIGHT."&characters=".CAPCHA_NUM."\" width=\"".CAPCHA_WIDTH."\" height=\"".CAPCHA_HEIGHT."\" align=\"absmiddle\" />";
						}else if(CAPCHA_TYPE == 2){ 
							echo "<img src=\"capcha/val_img.php?width=".CAPCHA_WIDTH."&height=".CAPCHA_HEIGHT."&characters=".CAPCHA_NUM."\" width=\"".CAPCHA_WIDTH."\" height=\"".CAPCHA_HEIGHT."\" align=\"absmiddle\" />";
						};?>
						</TD>
						<TD><input name="security_code" type="text" id="security_code" maxlength="4" ></TD>
					</TR>
<?
}
?>
					<TR>
						<TD width="30%" align="right"></TD>
						<TD><INPUT TYPE="submit" VALUE=" เข้าระบบ "></TD>
					</TR>
					</TABLE>
					</FORM>
