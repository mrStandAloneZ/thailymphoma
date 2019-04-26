<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
$name_theme=$_POST['name_theme'];

	    $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->update_db(TB_THEME,array(
			"name_theme"=>"".addslashes(htmlspecialchars($_POST[name_theme]))."",
		)," id=1 ");
		$db->closedb ();


echo "<TABLE width='90%' align=center cellSpacing=0 cellPadding=0 border=0><TR><TD><br><br><br><br><br><br>";
echo "<center><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A></center><br><br><br>" ;
echo "<center><FONT COLOR=\"#336600\"><B>ได้ทำการแก้ไข หน้าตาเว็บไซต์ เรียบร้อยแล้ว</B></FONT></center>";
echo "<meta http-equiv='refresh' content='2; url=admin.php?name=admin&file=themes'>" ;
echo "<br><br><br><br><br><br></TD></TR></TABLE>";

?>