<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
					<h1>�Ѵ��ü������к�</h1>
<A HREF="?name=admin&file=user"><IMG SRC="images/admin/admins.gif"  BORDER="0" align="absmiddle"> �Ѵ��ü������к�</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=user&op=admin_add"><IMG SRC="images/admin/user.gif"  BORDER="0" align="absmiddle"> �����������к�</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=groups"><IMG SRC="images/admin/keys.gif"  BORDER="0" align="absmiddle"> �дѺ�ͧ�������к�</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=groups&op=group_add"><IMG SRC="images/admin/share.gif"  BORDER="0" align="absmiddle"> �����дѺ�ͧ�������к�</A>
<BR><BR>
<!-- �ʴ�����¡�á�����������к� -->
<?
//////////////////////////////////////////// �ʴ���ª��͡�����������к�
if($_GET[op] == ""){
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$limit = 20 ;
$SUMPAGE = $db->num_rows(TB_ADMIN_GROUP,"id","");
if (empty($page)){
	$page=1;
}
$rt = $SUMPAGE%$limit ;
$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
$goto = ($page-1)*$limit ;
?>
 <form action="?name=admin&file=groups&op=group_del&action=multidel" name="myform" method="post">
 <table width="100%" cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td width="60"><font color="#FFFFFF"><B><CENTER>Option</CENTER></B></font></td>
   <td><font color="#FFFFFF"><B>Level</B></font></td>
   <td width=80><CENTER><font color="#FFFFFF"><B>�ӹǹ</B></font></CENTER></td>
   <td><font color="#FFFFFF"><B><CENTER>Check</CENTER></B></font></td>
  </tr>  
<?
$res[groups] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." ORDER BY id LIMIT $goto, $limit ");
while($arr[groups] = $db->fetch($res[groups])){
	$row[user] = $db->num_rows(TB_ADMIN,"id"," level=".$arr[groups][id]." ");
?>
    <tr>
     <td width="60" align="center">
      <a href="?name=admin&file=groups&op=group_edit&id=<? echo $arr[groups][id];?>"><img src="images/admin/edit.gif" border="0" alt="���" ></a> 
      <a href="javascript:Confirm('?name=admin&file=groups&op=group_del&id=<? echo $arr[groups][id];?>&level=<?echo $arr[groups][name];?>','�س����㹡��ź�дѺ����� : <?echo $arr[groups][name];?>');"><img src="images/admin/trash.gif"  border="0" alt="ź" ></a>
     </td> 
     <td><? echo $arr[groups][name];?></td>
     <td ><CENTER><? echo $row[user];?></CENTER></td>
     <td align="center" width="40"><input type="checkbox" name="list[]" value="<? echo $arr[groups][id];?>"></td>
    </tr>
<?
 } 
?>
 </table>
 <div align="right">
 <input type="button" name="CheckAll" value="Check All" onclick="checkAll(document.myform)" >
 <input type="button" name="UnCheckAll" value="Uncheck All" onclick="uncheckAll(document.myform)" >
 <input type="submit" value="Delete" >
 </div>
 </form><BR><BR>
<?
	SplitPage($page,$totalpage,"?name=admin&file=groups");
	echo $ShowSumPages ;
	echo "<BR>";
	echo $ShowPages ;
	echo "<BR><BR>";
	
$res[groupstext] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." ORDER BY id ");
while ($arr[groupstext] = $db->fetch($res[groupstext]))
   {
		echo "<LI><B>".$arr[groupstext][name]." : </B>".$arr[groupstext][description]."</LI>";
   }
$db->closedb ();

}
else if($_GET[op] == "group_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// �ó����� Group Admin Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$sql[GROUP] = mysql_query("SELECT * FROM ".TB_ADMIN_GROUP." WHERE name='".$_POST[GROUP_NAME]."'") or die(mysql_error());
		$q[GROUPS] = "SELECT * FROM ".TB_ADMIN_GROUP." ";
		$sql[GROUPS] = mysql_query($q[GROUPS]);  
	/*******/
		$q[GROUPS] = "INSERT INTO ".TB_ADMIN_GROUP." VALUES(0,'".addslashes(htmlspecialchars($_POST[GROUP_NAME]))."','".addslashes(htmlspecialchars($_POST[GROUP_DESC]))."',";
		for($x=3;$x<mysql_num_fields($sql[GROUPS]);$x++)
		{
		$fname =  mysql_field_name($sql[GROUPS], $x);
		$q[GROUPS] .= "'".$_POST[$fname]."'";
		if($x < mysql_num_fields($sql[GROUPS])-1) $q[GROUPS] .= ", ";
		}
		$q[GROUPS] .= ");";
	/*******/
		if(mysql_num_rows($sql[GROUP])<1) {
		mysql_query($q[GROUPS]) or die (mysql_error());
		}
		$db->closedb ();

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ������������������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=user\"><B>��Ѻ˹�� �Ѵ��ü������к�</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "group_add"){
	//////////////////////////////////////////// �ó����� Group Admin Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
?>
<FORM name="groups" METHOD=POST ACTION="?name=admin&file=groups&op=group_add&action=add">
     <B>���͡���� :</B><br>
        <input type="text"  name="GROUP_NAME" size="40"><br>
        <B>��������´ :</B><br>
        <input type="text" name="GROUP_DESC"  size="40"><br>
        <br>
        <B>��س����͡ :</B><br>
<?
	 $m = 0;
	 $fnum = 3;
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	 $q[GROUPS] = "SELECT * FROM ".TB_ADMIN_GROUP." " ;
	 $sql[GROUPS] = mysql_query($q[GROUPS]);  

	 echo '<table cellspacing="1" cellpadding="4"  bgcolor="#669999">';
	 for($x=3;$x<mysql_num_fields($sql[GROUPS]);$x++)
	 {
	  $fname[GROUPS] =  mysql_field_name($sql[GROUPS], $x);
	  list($name,$task) = explode("_",$fname[GROUPS]);
	  if(empty($last) || $last <> $name)
	  {
	   if($m<$fnum) 
	   {
	    $l = $fnum - $m;
	    echo '<td colspan="'.$l.'"></td>';
	   }
	   $ime = "echo _".strtoupper($name).";";
	   echo '</tr><tr bgcolor="#ffffff"><td>';
	   eval($ime);
	   echo '</td>';
	   $m=0;
	  }
	  echo '<td><input type="checkbox" name="'.$fname[GROUPS].'"  value="1"> '.$task.'</td>';
	  $m++;
	  $last = $name;
	 }
	 if($m<$fnum) 
	 {
	  $l = $fnum - $m;
	  echo '<td colspan="'.$l.'"></td>';
	 }
	 echo '</tr></table>';
$db->closedb ();
?>
          <br>
        <input type="button" name="CheckAll" value="���͡������" onclick="checkAll(document.groups)" >
        <input type="button" name="UnCheckAll" value="¡��ԡ������" onclick="uncheckAll(document.groups)" >

        <br>
        <br><br>
        <input type="submit" value=" ���� Level " >
</FORM>
<?
	}else{
		//�ó�����ҹ
		echo  $PermissionFalse ;
	}
}
else if($_GET[op] == "group_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// �ó���� User Admin Database Edit
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$q[GROUPS] = "SELECT * FROM ".TB_ADMIN_GROUP." ";
		$sql[GROUPS] = mysql_query($q[GROUPS]);  

		$q[GROUPS] = "UPDATE ".TB_ADMIN_GROUP." SET name='".addslashes(htmlspecialchars($_POST[GROUP_NAME]))."', description='".addslashes(htmlspecialchars($_POST[GROUP_DESC]))."', ";
		for($x=3;$x<mysql_num_fields($sql[GROUPS]);$x++)
		{
		$fname =  mysql_field_name($sql[GROUPS], $x);
		$q[GROUPS] .= $fname."='".$_POST[$fname]."'";
		if($x < mysql_num_fields($sql[GROUPS])-1) $q[GROUPS] .= ", ";
		}
		$q[GROUPS] .= " WHERE id='".$_GET[id]."';";
	  /******/
		$sql[GROUPS] = mysql_query($q[GROUPS]) or die (mysql_error());
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ����䢡��������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=user\"><B>��Ѻ˹�� �Ѵ��ü������к�</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "group_edit"){
	//////////////////////////////////////////// �ó���� Group Admin Edit Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�֧������������к��͡��
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[group] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." WHERE id='".$_GET[id]."' ");
		$arr[group] = $db->fetch($res[group]);
		$db->closedb ();
?>
<form action="?name=admin&file=groups&op=group_edit&action=edit&id=<?=$_GET[id];?>" name="groups" method="post">
     <B>���͡���� :</B><br>
        <input type="text"  name="GROUP_NAME" size="40" value="<?echo $arr[group][name];?>"><br>
        <B>��������´ :</B><br>
        <input type="text" name="GROUP_DESC"  size="40" value="<?echo $arr[group][description];?>"><br>
        <br>
        <B>��س����͡ :</B><br>
<?
	 $m = 0;
	 $fnum = 3;
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	 $q[GROUPS] = "SELECT * FROM ".TB_ADMIN_GROUP." " ;
	 $sql[GROUPS] = mysql_query($q[GROUPS]);  

	 echo '<table cellspacing="1" cellpadding="4"  bgcolor="#669999">';
	 for($x=3;$x<mysql_num_fields($sql[GROUPS]);$x++)
	 {
	  $fname[GROUPS] =  mysql_field_name($sql[GROUPS], $x);
	  list($name,$task) = explode("_",$fname[GROUPS]);
	  if(empty($last) || $last <> $name)
	  {
	   if($m<$fnum) 
	   {
	    $l = $fnum - $m;
	    echo '<td colspan="'.$l.'"></td>';
	   }
	   $ime = "echo _".strtoupper($name).";";
	   echo '</tr><tr bgcolor="#ffffff"><td>';
	   eval($ime);
	   echo '</td>';
	   $m=0;
	  }
	  echo '<td><input type="checkbox" name="'.$fname[GROUPS].'" ';
	  if($arr[group][$fname[GROUPS]] == 1)
	  echo 'checked="checked"';
	  echo ' value="1"> '.$task.'</td>';
	  $m++;
	  $last = $name;
	 }
	 if($m<$fnum) 
	 {
	  $l = $fnum - $m;
	  echo '<td colspan="'.$l.'"></td>';
	 }
	 echo '</tr></table>';
$db->closedb ();
?>
          <br>
        <input type="button" name="CheckAll" value="���͡������" onclick="checkAll(document.groups)" >
        <input type="button" name="UnCheckAll" value="¡��ԡ������" onclick="uncheckAll(document.groups)" >

        <br>
        <br><br>
        <input type="submit" value=" ��� Level " >
        </form>
<?
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "group_del" AND $_GET[action] == "multidel"){
	//////////////////////////////////////////// �ó�ź User Admin Multi
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		while(list($key, $value) = each ($_POST['list'])){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$db->del(TB_ADMIN_GROUP," id='".$value."' "); 
			$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź��¡�á��������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=user\"><B>��Ѻ˹�� �Ѵ��ü������к�</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "group_del"){
	//////////////////////////////////////////// �ó�ź Group Admin Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->del(TB_ADMIN_GROUP," id='".$_GET[id]."' "); 
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź���������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=user\"><B>��Ѻ˹�� �Ѵ��ü������к�</B></A>";
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