<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
	<TABLE cellSpacing=0 cellPadding=0 width=95% border=0>
      <TBODY>
        <TR>
          <TD width="100%" vAlign=top><BR><BR>
				<BR><BR>
<?
	$_GET['id'] = intval($_GET['id']);
	if(CheckLevel($_SESSION['admin_user'],"change_del")){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$BoardResult = $db->select_query("SELECT id,picture FROM ".TB_WEBBOARD." WHERE id='".$_GET[id]."' ");
		while($WebBoard = $db->fetch($BoardResult)){
			$CommentResult = $db->select_query("SELECT id,picture FROM ".TB_WEBBOARD_COMMENT." WHERE topic_id='".$WebBoard[id]."' ORDER BY id ");
			while($Comment = $db->fetch($CommentResult)){
				@unlink("webboard_upload/".$Comment[picture]."");
			}
			@unlink("webboard_upload/".$WebBoard[picture]."");
			$db->del(TB_WEBBOARD_COMMENT," topic_id='".$WebBoard[id]."' "); 
		}
		$db->del(TB_WEBBOARD," id='".$_GET[id]."' "); 
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"admin.php?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการลบหัวข้อเรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"admin.php?name=admin&amp;file=change\"><B>กลับหน้าแสดงผล</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//กรณีไม่ผ่าน
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
?>

				<BR><BR>
			<!-- End News -->
		  </TD>
        </TR>
      </TBODY>
    </TABLE>