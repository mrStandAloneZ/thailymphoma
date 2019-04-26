<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<? include "modules/index/header.php" ; ?>
<div id="center">
    <p>
	<TABLE cellSpacing=0 cellPadding=0 width=95% border=0>
      <TBODY>
        <TR>
				<BR><BR>
<?
	if(CheckLevel($_SESSION['admin_user'],"change_edit")){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		if($_GET[action] == "addpin"){
			$db->update(TB_WEBBOARD," pin_date='".TIMESTAMP."' "," id='$_GET[id]' ");
			$Title = "ปักหมุดหัวข้อ";
		}else if($_GET[action] == "removepin"){
			$db->update(TB_WEBBOARD," pin_date='' "," id='$_GET[id]' ");
			$Title = "ยกเลิกปักหมุดหัวข้อ";
		}
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"admin.php?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการ ".$Title." เรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"index.php?name=change&file=read&id=".$_GET[id]."\"><B>กลับหน้าแสดงผล</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//กรณีไม่ผ่าน
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
?>
				<BR><BR>
			<!-- End Pin -->
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