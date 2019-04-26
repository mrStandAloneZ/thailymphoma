<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<? include "modules/index/header.php" ; ?>
    <div id="center">
    <p>
	<TABLE cellSpacing=0 cellPadding=0 width=95% border=0>
      <TBODY>
        <TR>
          <TD width="95%" vAlign=top><IMG src="images/topfader.gif" border=0><BR>
		  <!-- News -->
		  &nbsp;&nbsp;<IMG SRC="images/menu/textmenu_webboard.gif" BORDER="0"><BR><BR>
				<BR><BR>
<?
	$_GET['id'] = intval($_GET['id']);
	$_GET['comment'] = intval($_GET['comment']);
	if(CheckLevel($_SESSION['admin_user'],"change_del")){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$CommentResult = $db->select_query("SELECT id,picture FROM ".TB_WEBBOARD_COMMENT." WHERE topic_id='".$_GET[id]."' AND id='".$_GET[comment]."' ");
		$Comment = $db->fetch($CommentResult);
		$db->del(TB_WEBBOARD_COMMENT," topic_id='".$_GET[id]."' AND id='".$_GET[comment]."' "); 
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"admin.php?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการลบความคิดเห็นเรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"index.php?name=change&file=read&id=".$_GET[id]."\"><B>กลับหน้าแสดงผลหัวข้อ</B></A>";
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
        </p>
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>
<? include "modules/index/footer.php"; ?>