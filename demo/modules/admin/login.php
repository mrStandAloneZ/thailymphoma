		<?
if($_SESSION['admin_user']){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?name=admin&file=main\">";
}
?>
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
		echo "alert('!!!! ��سҡ�͡�����١��ͧ !!!!')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
}

//Can Login
if($arr[admin][id]){
	//Login ��ҹ
	ob_start();
	$_SESSION['admin_user'] = $_POST[username] ;
	$_SESSION['admin_pwd'] = md5($_POST[password]) ;
	session_write_close();
	ob_end_flush();
?>
<br /><br /><br /><br /><br />
<CENTER><A HREF="admin.phph?name=admin&file=main"><IMG SRC="images/login-redirection-loader.gif" BORDER="0"></A><BR><BR>
<FONT COLOR="#336600"><B>��ӡ������к����º��������</B></FONT><BR><BR>
<A HREF="admin.php?name=admin&file=main"><B>���˹����ѡ�������к�</B></A>
<meta http-equiv='refresh' content='5; url=admin.php?name=admin&file=main'>
</CENTER>
<br /><br /><br /><br />
<?
}else{
	//Login ����ҹ
?>
					<BR><BR>
					<CENTER><B><FONT COLOR="#FF0000">��سҡ�͡ ���ͼ���� ���� ���ʼ�ҹ  </FONT></B></CENTER>
					<FORM METHOD=POST ACTION="?name=admin&file=login">
					<TABLE width=300 align=center>
					<TR>
						<TD width="100" align="right"><B>���ͼ���� : </B></TD>
						<TD><INPUT TYPE="text" NAME="username"></TD>
					</TR>
					<TR>
						<TD width="100" align="right"><B>���ʼ�ҹ : </B></TD>
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
						<TD><INPUT TYPE="submit" VALUE=" ����к� "></TD>
					</TR>
					</TABLE>
                    <br /><br /><br />
					</FORM>
<?
}
?>

					</TD>
				</TR>
			</TABLE>
            