<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
					<h1>������� / ��Ъ�����ѹ�� </h1>
					<A HREF="?name=admin&file=news"><IMG SRC="images/admin/open.gif"  BORDER="0" align="absmiddle"> ��¡�â������</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=news&op=news_add"><IMG SRC="images/admin/book.gif"  BORDER="0" align="absmiddle"> �����������</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=news_category"><IMG SRC="images/admin/folders.gif"  BORDER="0" align="absmiddle"> ��¡����Ǵ����</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=news_category&op=newscat_add"><IMG SRC="images/admin/opendir.gif"  BORDER="0" align="absmiddle"> ������Ǵ����</A><BR><BR>
<?
//////////////////////////////////////////// �ʴ���¡��
if($_GET[op] == ""){
?>
<form action="?name=admin&file=news_category&op=newscat_del&action=multidel" name="myform" method="post">
 <table width="100%" cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td><font color="#FFFFFF"><B><CENTER>Option</CENTER></B></font></td>
   <td><font color="#FFFFFF"><B>��Ǵ����������</B></font></td>
   <td align="center" width="50"><font color="#FFFFFF"><B>�ӹǹ</B></font></td>
   <td align="center" width="50"><font color="#FFFFFF"><B>�ӴѺ</B></font></td>
   <td><font color="#FFFFFF"><B><CENTER>Check</CENTER></B></font></td>
  </tr>  
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[newscat] = $db->select_query("SELECT * FROM ".TB_NEWS_CAT." ORDER BY sort ");
$rows[newscat] = $db->rows($res[newscat]);
$CATCOUNT = 0 ;
while ($arr[newscat] = mysql_fetch_array($res[newscat])){
	$row[sumnews] = $db->num_rows(TB_NEWS,"id"," category=".$arr[newscat][id]." ");

    $CATCOUNT ++ ;
   //��˹��������¹�ӴѺ���
   $SETSORT_UP = $arr[newscat][sort]-1;
   if($CATCOUNT == "1"){
	   $SETSORT_UP = "1" ;
   }
	//��˹��������¹�ӴѺŧ
   $SETSORT_DOWN = $arr[newscat][sort]+1;
   if($CATCOUNT == $rows[newscat]){
	   $SETSORT_DOWN = $arr[newscat][sort] ;
   }

?>
    <tr>
     <td width="44">
      <a href="?name=admin&file=news_category&op=newscat_edit&id=<? echo $arr[newscat][id];?>"><img src="images/admin/edit.gif" border="0" alt="���" ></a> 
      <a href="javascript:Confirm('?name=admin&file=news_category&op=newscat_del&id=<? echo $arr[newscat][id];?>','�س����㹡��ź��Ǵ������ ?');"><img src="images/admin/trash.gif"  border="0" alt="ź" ></a>
     </td> 
     <td><?echo $arr[newscat][category_name];?></td>
	 <td align="center" width="50" ><?echo $row[sumnews] ;?></td>
     <td align="center" width="50"><A HREF="?name=admin&file=news_category&op=newscat_edit&action=sort&setsort=<?echo $SETSORT_UP ;?>&move=up&id=<? echo $arr[newscat][id];?>"><IMG SRC="images/icon/arrow_up.gif"  BORDER="0" ALT="����͹���"></A>&nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=news_category&op=newscat_edit&action=sort&setsort=<?echo $SETSORT_DOWN ;?>&move=down&id=<? echo $arr[newscat][id];?>"><IMG SRC="images/icon/arrow_down.gif"  BORDER="0" ALT="����͹ŧ"></A></td>
     <td valign="top" align="center" width="40"><input type="checkbox" name="list[]" value="<? echo $arr[newscat][id];?>"></td>
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
else if($_GET[op] == "newscat_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// �ó����� Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//����� id �͹���������
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[newscat] = $db->select_query("SELECT sort FROM ".TB_NEWS_CAT." ORDER BY sort DESC ");
		$arr[newscat] = mysql_fetch_array($res[newscat]);
		$SORTID = $arr[newscat][sort]+1 ;
		//����������ŧ�ҵ����
		$db->add_db(TB_NEWS_CAT,array(
			"category_name"=>"".addslashes(htmlspecialchars($_POST[CATEGORY]))."",
			"sort"=>"$SORTID"
		));
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��������Ǵ���������� / ��Ъ�����ѹ��   �������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ���������� / ��Ъ�����ѹ�� </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_add"){
	//////////////////////////////////////////// �ó����� Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
?>
<FORM METHOD=POST ACTION="?name=admin&file=news_category&op=newscat_add&action=add">
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
else if($_GET[op] == "newscat_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// �ó���� Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//��䢢�����ŧ�ҵ����
		$db->update_db(TB_NEWS_CAT,array(
			"category_name"=>"".addslashes(htmlspecialchars($_POST[CATEGORY])).""
		)," id=".$_GET[id]." ");
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ�������Ǵ���������� / ��Ъ�����ѹ��   �������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ���������� / ��Ъ�����ѹ�� </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_edit" AND $_GET[action] == "sort"){
	//////////////////////////////////////////// Set Sort
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�ó�����͹���
		if($_GET[move] == "up"){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETD] = "UPDATE ".TB_NEWS_CAT." SET sort = sort+1 WHERE sort = '".$_GET[setsort]."' ";
			$sql[SETD] = mysql_query ( $q[SETD] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();

			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETU] = "UPDATE ".TB_NEWS_CAT." SET sort = '".$_GET[setsort]."' WHERE id = '".$_GET[id]."' ";
			$sql[SETU] = mysql_query ( $q[SETU] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();
		}
		if($_GET[move] == "down"){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETD] = "UPDATE ".TB_NEWS_CAT." SET sort = sort-1 WHERE sort = '".$_GET[setsort]."' ";
			$sql[SETD] = mysql_query ( $q[SETD] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();

			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETU] = "UPDATE ".TB_NEWS_CAT." SET sort = '".$_GET[setsort]."' WHERE id = '".$_GET[id]."' ";
			$sql[SETU] = mysql_query ( $q[SETU] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ�������Ǵ���������� / ��Ъ�����ѹ��   �������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ���������� / ��Ъ�����ѹ�� </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_edit"){
	//////////////////////////////////////////// �ó���� Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�֧���
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[newscat] = $db->select_query("SELECT * FROM ".TB_NEWS_CAT." WHERE id='".$_GET[id]."' ");
		$arr[newscat] = $db->fetch($res[newscat]);
		$db->closedb ();
?>
<FORM METHOD=POST ACTION="?name=admin&file=news_category&op=newscat_edit&action=edit&id=<?=$_GET[id];?>">
<B>������Ǵ���� :</B><BR>
<INPUT TYPE="text" NAME="CATEGORY" size="40" value="<?=$arr[newscat][category_name];?>">
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
else if($_GET[op] == "newscat_del" AND $_GET[action] == "multidel"){
	//////////////////////////////////////////// �ó�ź Multi
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		while(list($key, $value) = each ($_POST['list'])){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$db->del(TB_NEWS_CAT," id='".$value."' "); 
			$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź��Ǵ����������/��Ъ�����ѹ�����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ����������/��Ъ�����ѹ��</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_del"){
	//////////////////////////////////////////// �ó�ź Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->del(TB_NEWS_CAT," id='".$_GET[id]."' "); 
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź��Ǵ����������/��Ъ�����ѹ�����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news_category\"><B>��Ѻ˹�� �Ѵ�����Ǵ����������/��Ъ�����ѹ��</B></A>";
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