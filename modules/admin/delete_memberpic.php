<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
	if(CheckLevel($_SESSION['admin_user'],"member_edit")){

?>
	<TABLE width="90%" border="0" align="center" cellPadding="0" cellSpacing="0">
      <TBODY>
        <TR>
          <TD vAlign=top><BR>
		    <!-- News -->
&nbsp;&nbsp;<img src="images/menu/textmenu_admin.gif"><BR>
		  <BR>
				<BR>				<BR>
            <?
		$member_id=$_GET['member_id'];
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$MemResult = $db->select_query("SELECT * FROM ".TB_MEMBER." WHERE member_id='".$_GET[member_id]."' ");
		while($DelPic = $db->fetch($MemResult)) {
		@unlink("member_pic/".$DelPic[member_pic]."");
		$db->update_db(TB_MEMBER,array("member_pic"=>""	)," member_id='$_GET[member_id]' ");
		$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการลบรูปภาพของสมาชิกที่เลือกแล้ว </B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=member\"><B>กลับหน้าจัดการระบบสมาชิก</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
?>

				<BR>				<BR>
	        <!-- End News -->		  </TD>
        </TR>
      </TBODY>
</TABLE>
<?
		}else{
		//กรณีไม่ผ่าน
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;			
?>