<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
	<TABLE cellSpacing=0 cellPadding=0 width=95% border=0>
      <TBODY>
        <TR>
				<BR><BR>
<?
	if(CheckLevel($_SESSION['admin_user'],"change_edit")){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		if($_GET[action] == "addpin"){
			$db->update(TB_WEBBOARD," enable='".TIMESTAMP."' "," id='$_GET[id]' ");
			$Title = "�׹�ѹ";
		}else if($_GET[action] == "removepin"){
			$db->update(TB_WEBBOARD," enable='' "," id='$_GET[id]' ");
			$Title = "¡��ԡ����׹�ѹ";
		}
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"admin.php?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ�� ".$Title." ���º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"admin.php?name=admin&file=change_read&id=".$_GET[id]."\"><B>��Ѻ˹���ʴ���</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
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