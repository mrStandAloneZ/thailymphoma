<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="95%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
					<h1>��Ǵ�������š����¹���</h1>
                    &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=change_category&op=change_add"><IMG SRC="images/admin/opendir.gif"  BORDER="0" align="absmiddle"> ������Ǵ����</A><BR><BR>
<?
//////////////////////////////////////////// �ʴ���¡��
if($_GET[op] == ""){
?>
<form action="?name=admin&file=change_category&op=change_del&action=multidel" name="myform" method="post">
 <table width="100%" cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td><font color="#FFFFFF"><B><CENTER>Option</CENTER></B></font></td>
   <td><font color="#FFFFFF"><B>��Ǵ����</B></font></td>
   <td align="center" width="50"><font color="#FFFFFF"><B>�ӹǹ</B></font></td>
   <td align="center" width="50"><font color="#FFFFFF"><B>�ӴѺ</B></font></td>
   <td><font color="#FFFFFF"><B><CENTER>Check</CENTER></B></font></td>
  </tr>  
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[boardcat] = $db->select_query("SELECT * FROM ".TB_WEBBOARD_CAT." ORDER BY sort ");
$rows[boardcat] = $db->rows($res[boardcat]);
$CATCOUNT = 0 ;
while ($arr[boardcat] = mysql_fetch_array($res[boardcat])){
	$row[sumboard] = $db->num_rows(TB_WEBBOARD,"id"," category=".$arr[boardcat][id]." ");

    $CATCOUNT ++ ;
   //��˹��������¹�ӴѺ���
   $SETSORT_UP = $arr[boardcat][sort]-1;
   if($CATCOUNT == "1"){
	   $SETSORT_UP = "1" ;
   }
	//��˹��������¹�ӴѺŧ
   $SETSORT_DOWN = $arr[boardcat][sort]+1;
   if($CATCOUNT == $rows[boardcat]){
	   $SETSORT_DOWN = $arr[boardcat][sort] ;
   }

?>
    <tr>
     <td width="44">
      <a href="?name=admin&file=change_category&op=change_edit&id=<? echo $arr[boardcat][id];?>"><img src="images/admin/edit.gif" border="0" alt="���" ></a> 
      <a href="javascript:Confirm('?name=admin&file=change_category&op=change_del&id=<? echo $arr[boardcat][id];?>','�س����㹡��ź��Ǵ������ ? ���Шзӡ��ź�ء��Ǣ�����Ǵ���������!!!');"><img src="images/admin/trash.gif"  border="0" alt="ź" ></a>
     </td> 
     <td><?echo $arr[boardcat][category_name];?></td>
	 <td align="center" width="50" ><?echo $row[sumboard] ;?></td>
     <td align="center" width="50"><A HREF="?name=admin&file=change_category&op=change_edit&action=sort&setsort=<?echo $SETSORT_UP ;?>&move=up&id=<? echo $arr[boardcat][id];?>"><IMG SRC="images/icon/arrow_up.gif"  BORDER="0" ALT="����͹���"></A>&nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=change_category&op=change_edit&action=sort&setsort=<?echo $SETSORT_DOWN ;?>&move=down&id=<? echo $arr[boardcat][id];?>"><IMG SRC="images/icon/arrow_down.gif"  BORDER="0" ALT="����͹ŧ"></A></td>
     <td valign="top" align="center" width="40"><input type="checkbox" name="list[]" value="<? echo $arr[boardcat][id];?>"></td>
    </tr>
<?
 }
$db->closedb ();
?>
 </table>
 <div align="right">
 <input type="button" name="CheckAll" value="Check All" onclick="checkAll(document.myform)" >
 <input type="button" name="UnCheckAll" value="Uncheck All" onclick="uncheckAll(document.myform)" >
 <input type="hidden" name="ACTION" value="news_del">
 <input type="submit" value="Delete" onclick="return delConfirm(document.myform)">
 </div>
 </form>
<?
}
else if($_GET[op] == "change_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// �ó����� Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//����� id �͹���������
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[boardcat] = $db->select_query("SELECT sort FROM ".TB_WEBBOARD_CAT." ORDER BY sort DESC ");
		$arr[boardcat] = mysql_fetch_array($res[boardcat]);
		$SORTID = $arr[boardcat][sort]+1 ;
		//����������ŧ�ҵ����
		$db->add_db(TB_WEBBOARD_CAT,array(
			"category_name"=>"".addslashes(htmlspecialchars($_POST[CATEGORY]))."",
			"sort"=>"$SORTID"
		));
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��������Ǵ�������š����¹   �������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=change_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ�������š����¹ </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "change_add"){
	//////////////////////////////////////////// �ó����� Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
?>
<FORM METHOD=POST ACTION="?name=admin&file=change_category&op=change_add&action=add">
<B>������Ǵ���� :</B><BR>
<INPUT TYPE="text" NAME="CATEGORY" size="40">
<BR><BR>
<INPUT TYPE="submit" value=" ������Ǵ���� ">
</FORM>
<?
	}else{
		//�ó�����ҹ
		echo  $PermissionFalse ;
	}
}
else if($_GET[op] == "change_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// �ó���� Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//��䢢�����ŧ�ҵ����
		$db->update_db(TB_WEBBOARD_CAT,array(
			"category_name"=>"".addslashes(htmlspecialchars($_POST[CATEGORY])).""
		)," id=".$_GET[id]." ");
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ�������Ǵ�������š����¹   �������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=change_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ�������š����¹ </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "change_edit" AND $_GET[action] == "sort"){
	//////////////////////////////////////////// Set Sort
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�ó�����͹���
		if($_GET[move] == "up"){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETD] = "UPDATE ".TB_WEBBOARD_CAT." SET sort = sort+1 WHERE sort = '".$_GET[setsort]."' ";
			$sql[SETD] = mysql_query ( $q[SETD] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();

			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETU] = "UPDATE ".TB_WEBBOARD_CAT." SET sort = '".$_GET[setsort]."' WHERE id = '".$_GET[id]."' ";
			$sql[SETU] = mysql_query ( $q[SETU] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();
		}
		if($_GET[move] == "down"){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETD] = "UPDATE ".TB_WEBBOARD_CAT." SET sort = sort-1 WHERE sort = '".$_GET[setsort]."' ";
			$sql[SETD] = mysql_query ( $q[SETD] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();

			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETU] = "UPDATE ".TB_WEBBOARD_CAT." SET sort = '".$_GET[setsort]."' WHERE id = '".$_GET[id]."' ";
			$sql[SETU] = mysql_query ( $q[SETU] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ�������Ǵ�������š����¹   �������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=change_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ�������š����¹ </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";

	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "change_edit"){
	//////////////////////////////////////////// �ó���� Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�֧���
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[boardcat] = $db->select_query("SELECT * FROM ".TB_WEBBOARD_CAT." WHERE id='".$_GET[id]."' ");
		$arr[boardcat] = $db->fetch($res[boardcat]);
		$db->closedb ();
?>
<FORM METHOD=POST ACTION="?name=admin&file=change_category&op=change_edit&action=edit&id=<?=$_GET[id];?>">
<B>������Ǵ���� :</B><BR>
<INPUT TYPE="text" NAME="CATEGORY" size="40" value="<?=$arr[boardcat][category_name];?>">
<BR><BR>
<INPUT TYPE="submit" value=" �����Ǵ���� ">
</FORM>
<?
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "change_del" AND $_GET[action] == "multidel"){
	//////////////////////////////////////////// �ó�ź Multi
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		while(list($key, $value) = each ($_POST['list'])){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$BoardResult = $db->select_query("SELECT id,picture FROM ".TB_WEBBOARD." WHERE category='".$value."' ORDER BY id ");
			while($WebBoard = $db->fetch($BoardResult)){
				$CommentResult = $db->select_query("SELECT id,picture FROM ".TB_WEBBOARD_COMMENT." WHERE topic_id='".$WebBoard[id]."' ORDER BY id ");
				while($Comment = $db->fetch($CommentResult)){
					@unlink("change_upload/".$Comment[picture]."");
				}
				@unlink("change_upload/".$WebBoard[picture]."");
				$db->del(TB_WEBBOARD_COMMENT," topic_id='".$WebBoard[id]."' "); 
			}
			$db->del(TB_WEBBOARD_CAT," id='".$value."' "); 
			$db->del(TB_WEBBOARD," category='".$value."' "); 
			$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź��Ǵ�������š����¹���º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=change_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ�������š����¹</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "change_del"){
	//////////////////////////////////////////// �ó�ź Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$BoardResult = $db->select_query("SELECT id,picture FROM ".TB_WEBBOARD." WHERE category='".$_GET[id]."' ORDER BY id ");
		while($WebBoard = $db->fetch($BoardResult)){
			$CommentResult = $db->select_query("SELECT id,picture FROM ".TB_WEBBOARD_COMMENT." WHERE topic_id='".$WebBoard[id]."' ORDER BY id ");
			while($Comment = $db->fetch($CommentResult)){
				@unlink("change_upload/".$Comment[picture]."");
			}
			@unlink("change_upload/".$WebBoard[picture]."");
			$db->del(TB_WEBBOARD_COMMENT," topic_id='".$WebBoard[id]."' "); 
		}
		$db->del(TB_WEBBOARD_CAT," id='".$_GET[id]."' "); 
		$db->del(TB_WEBBOARD," category='".$_GET[id]."' "); 
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź��Ǵ�������š����¹���º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=change_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ�������š����¹</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
?>
						<BR><BR>
					</TD>
				</TR>
			</TABLE>