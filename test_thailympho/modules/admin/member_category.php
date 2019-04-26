<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
					<h1>แก้ไขหมวดหมู่ตารางเวลา</h1>
                    <A HREF="?name=admin&file=member_category"><IMG SRC="images/admin/folders.gif"  BORDER="0" align="absmiddle"> รายการหมวดหมู่</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=member_category&op=newscat_add"><!--<IMG SRC="images/admin/opendir.gif"  BORDER="0" align="absmiddle"> เพิ่มหมวดหมู่--></A><BR><BR>
<?
if($_GET[op] == ""){
?>
<form action="?name=admin&file=member_category&op=newscat_del&action=multidel" name="myform" method="post">
 <table width="100%" cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td><font color="#FFFFFF"><B><CENTER>Option</CENTER></B></font></td>
   <td><font color="#FFFFFF"><B>หมวดหมู่</B></font></td>
   <td align="center" width="50"><font color="#FFFFFF"><B>ลำดับ</B></font></td>
   <td><font color="#FFFFFF"><B><CENTER>Check</CENTER></B></font></td>
  </tr>  
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[membercat] = $db->select_query("SELECT * FROM ".TB_MEMBER_CAT." ORDER BY sort ");
$rows[membercat] = $db->rows($res[membercat]);
$CATCOUNT = 0 ;
while ($arr[membercat] = mysql_fetch_array($res[membercat])){
	$row[summember] = $db->num_rows(TB_MEMBER,"id"," category=".$arr[membercat][id]." ");

    $CATCOUNT ++ ;
   $SETSORT_UP = $arr[membercat][sort]-1;
   if($CATCOUNT == "1"){
	   $SETSORT_UP = "1" ;
   }
   $SETSORT_DOWN = $arr[membercat][sort]+1;
   if($CATCOUNT == $rows[membercat]){
	   $SETSORT_DOWN = $arr[membercat][sort] ;
   }

?>
    <tr>
     <td width="44">
      <a href="?name=admin&file=member_category&op=newscat_edit&id=<? echo $arr[membercat][id];?>"><img src="images/admin/edit.gif" alt="แก้ไข" border="0" ></a> 
      <a href="javascript:Confirm('?name=admin&file=member_category&op=newscat_del&id=<? echo $arr[membercat][id];?>','คุณมั่นใจในการลบหมวดหมู่นี้ ?');"><img src="images/admin/trash.gif"  border="0" alt="ลบ" ></a>
     </td> 
     <td><?echo $arr[membercat][category_name];?></td>
     <td align="center" width="50"><A HREF="?name=admin&file=member_category&op=newscat_edit&action=sort&setsort=<?echo $SETSORT_UP ;?>&move=up&id=<? echo $arr[membercat][id];?>"><IMG SRC="images/icon/arrow_up.gif"  BORDER="0" ALT="เลื่อนขึ้น"></A>&nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=member_category&op=newscat_edit&action=sort&setsort=<?echo $SETSORT_DOWN ;?>&move=down&id=<? echo $arr[membercat][id];?>"><IMG SRC="images/icon/arrow_down.gif"  BORDER="0" ALT="เลื่อนลง"></A></td>
     <td valign="top" align="center" width="40"><input type="checkbox" name="list[]" value="<? echo $arr[membercat][id];?>"></td>
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
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[membercat] = $db->select_query("SELECT sort FROM ".TB_MEMBER_CAT." ORDER BY sort DESC ");
		$arr[membercat] = mysql_fetch_array($res[membercat]);
		$SORTID = $arr[membercat][sort]+1 ;
		$db->add_db(TB_MEMBER_CAT,array(
			"category_name"=>"".addslashes(htmlspecialchars($_POST[CATEGORY]))."",
			"sort"=>"$SORTID"
		));
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการเพิ่มหมวดหมู่   เข้าสู่ระบบเรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=member_category\"><B>กลับหน้า จัดการหมวดหมู่ </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_add"){
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
?>
<FORM METHOD=POST ACTION="?name=admin&file=member_category&op=newscat_add&action=add">
<B>ชื่อหมวดหมู่ :</B><BR>
<INPUT TYPE="text" NAME="CATEGORY" size="40">
<BR><BR>
<INPUT TYPE="submit" value=" เพิ่มหมวดหมู่ ">
</FORM>
<?
	}else{
		echo  $PermissionFalse ;
	}
}
else if($_GET[op] == "newscat_edit" AND $_GET[action] == "edit"){
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->update_db(TB_MEMBER_CAT,array(
			"category_name"=>"".addslashes(htmlspecialchars($_POST[CATEGORY])).""
		)," id=".$_GET[id]." ");
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการแก้ไขหมวดหมู่ ตารางเวลา เรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=member_category\"><B>กลับหน้า จัดการหมวดหมู่ </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_edit" AND $_GET[action] == "sort"){
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		if($_GET[move] == "up"){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETD] = "UPDATE ".TB_MEMBER_CAT." SET sort = sort+1 WHERE sort = '".$_GET[setsort]."' ";
			$sql[SETD] = mysql_query ( $q[SETD] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();

			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETU] = "UPDATE ".TB_MEMBER_CAT." SET sort = '".$_GET[setsort]."' WHERE id = '".$_GET[id]."' ";
			$sql[SETU] = mysql_query ( $q[SETU] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();
		}
		if($_GET[move] == "down"){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETD] = "UPDATE ".TB_MEMBER_CAT." SET sort = sort-1 WHERE sort = '".$_GET[setsort]."' ";
			$sql[SETD] = mysql_query ( $q[SETD] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();

			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$q[SETU] = "UPDATE ".TB_MEMBER_CAT." SET sort = '".$_GET[setsort]."' WHERE id = '".$_GET[id]."' ";
			$sql[SETU] = mysql_query ( $q[SETU] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการแก้ไขหมวดหมู่ ตารางเวลา เรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=member_category\"><B>กลับหน้า จัดการหมวดหมู่</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_edit"){
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[membercat] = $db->select_query("SELECT * FROM ".TB_MEMBER_CAT." WHERE id='".$_GET[id]."' ");
		$arr[membercat] = $db->fetch($res[membercat]);
		$db->closedb ();
?>
<FORM METHOD=POST ACTION="?name=admin&file=member_category&op=newscat_edit&action=edit&id=<?=$_GET[id];?>">
<B>ชื่อหมวดหมู่ :</B><BR>
<INPUT TYPE="text" NAME="CATEGORY" size="40" value="<?=$arr[membercat][category_name];?>">
<BR><BR>
<INPUT TYPE="submit" value=" แก้ไขหมวดหมู่ ">
</FORM>
<?
	}else{
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_del" AND $_GET[action] == "multidel"){
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		while(list($key, $value) = each ($_POST['list'])){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$db->del(TB_MEMBER_CAT," id='".$value."' "); 
			$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการลบหมวดหมู่ตารางเวลา</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=member_category\"><B>กลับหน้า จัดการหมวดหมู่</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "newscat_del"){
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->del(TB_MEMBER_CAT," id='".$_GET[id]."' "); 
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการลบหมวดหมู่</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=member_category\"><B>กลับหน้า จัดการหมวดหมู่</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
?>
						<BR><BR>
					</TD>
				</TR>
			</TABLE>