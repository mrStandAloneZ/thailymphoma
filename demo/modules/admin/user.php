<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
					<h1>�Ѵ��ü������к�</h1>
<A HREF="?name=admin&file=user"><IMG SRC="images/admin/admins.gif"  BORDER="0" align="absmiddle"> �Ѵ��ü������к�</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=user&op=admin_add"><IMG SRC="images/admin/user.gif"  BORDER="0" align="absmiddle"> �����������к�</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=groups"><IMG SRC="images/admin/keys.gif"  BORDER="0" align="absmiddle"> �дѺ�ͧ�������к�</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=groups&op=group_add"><IMG SRC="images/admin/share.gif"  BORDER="0" align="absmiddle"> �����дѺ�ͧ�������к�</A>
<BR><BR>
<!-- �ʴ�����¡�ü������к� -->
<?
//////////////////////////////////////////// �ʴ���ª��ͼ������к�
if($_GET[op] == ""){
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$limit = 20 ;
$SUMPAGE = $db->num_rows(TB_ADMIN,"id","");
$page=$_GET[page];
if (empty($page)){
	$page=1;
}
$rt = $SUMPAGE%$limit ;
$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
$goto = ($page-1)*$limit ;
?>
 <form action="?name=admin&file=user&op=admin_del&action=multidel" name="myform" method="post">
 <table width="100%" cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td><font color="#FFFFFF"><B><CENTER>Option</CENTER></B></font></td>
   <td><font color="#FFFFFF"><B>���ͼ����</B></font></td>
   <td><font color="#FFFFFF"><B>���� - ���ʡ��</B></font></td>
   <td><font color="#FFFFFF"><B>Email</B></font></td>
   <td><font color="#FFFFFF"><B>Level</B></font></td>
   <td><font color="#FFFFFF"><B><CENTER>Check</CENTER></B></font></td>
  </tr>  
<?
$res[user] = $db->select_query("SELECT * FROM ".TB_ADMIN." ORDER BY id DESC LIMIT $goto, $limit ");
while($arr[user] = $db->fetch($res[user])){
	$res[groups] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." WHERE id='".$arr[user][level]."' ");
	$arr[groups] = $db->fetch($res[groups]);
?>
    <tr>
     <td width="44">
      <a href="?name=admin&file=user&op=admin_edit&id=<? echo $arr[user][id];?>"><img src="images/icon/edit.gif" border="0" alt="���" ></a> 
      <a href="javascript:Confirm('?name=admin&file=user&op=admin_del&id=<? echo $arr[user][id];?>','�س����㹡��ź���ͼ���� : <?echo $arr[user][username];?>');"><img src="images/icon/trash.gif"  border="0" alt="ź" ></a>
     </td> 
     <td><?echo $arr[user][username];?></td>
     <td ><? echo $arr[user][name];?></td>
     <td ><? echo $arr[user][email];?></td>
     <td ><? echo $arr[groups][name];?></td>
     <td  align="center" width="40"><input type="checkbox" name="list[]" value="<? echo $arr[user][id];?>"></td>
    </tr>
<?
 } 
?>
 </table>
 <div align="right">
 <input type="button" name="CheckAll" value="Check All" onclick="checkAll(document.myform)" >
 <input type="button" name="UnCheckAll" value="Uncheck All" onclick="uncheckAll(document.myform)" >
 <input type="submit" value="Delete" onclick="return delConfirm(document.myform)">
 </div>
 </form><BR><BR>
<?
	SplitPage($page,$totalpage,"?name=admin&file=user");
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
else if($_GET[op] == "admin_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// �ó����� User Admin Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	//��Ǩ�ͺ�� user ��������ѧ
	$res[admin] = $db->select_query("SELECT id FROM ".TB_ADMIN." WHERE username='".$_POST[USERNAME]."' ");
	$rows[admin] = $db->rows($res[admin]); 
	$db->closedb ();
		if($rows[admin]){
			$ProcessOutput .= "<BR><BR>";
			$ProcessOutput .= "<CENTER><IMG SRC=\"images/icon/notview.gif\" BORDER=\"0\"><BR><BR>";
			$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>���ͼ������к� : ".$_POST[USERNAME]." ����к������������ö������</B></FONT><BR><BR>";
			$ProcessOutput .= "<A HREF=\"javascript:history.go(-1);\"><B>��Ѻ����</B></A>";
			$ProcessOutput .= "</CENTER>";
			$ProcessOutput .= "<BR><BR>";
		}else{
			//�ӡ������������ŧ�ҵ����
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$db->add_db(TB_ADMIN,array(
				"username"=>"$_POST[USERNAME]",
				"password"=>"".md5($_POST[PASSWORD])."",
				"name"=>"$_POST[NAME]",
				"email"=>"$_POST[EMAIL]",
				"level"=>"$_POST[LEVEL]"
			));
			$db->closedb ();
			$ProcessOutput .= "<BR><BR>";
			$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
			$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ���������ͼ������к� : ".$_POST[USERNAME]." �������к����º��������</B></FONT><BR><BR>";
			$ProcessOutput .= "<A HREF=\"?name=admin&file=user\"><B>��Ѻ˹�� �Ѵ��ü������к�</B></A>";
			$ProcessOutput .= "</CENTER>";
			$ProcessOutput .= "<BR><BR>";
		}
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "admin_add"){
	//////////////////////////////////////////// �ó����� User Admin Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
?>
<FORM METHOD=POST ACTION="?name=admin&file=user&op=admin_add&action=add">
<B>���ͼ���� :</B><BR>
<INPUT TYPE="text" NAME="USERNAME" size="40"><BR>
<B>���ʼ�ҹ :</B><BR>
<INPUT TYPE="password" NAME="PASSWORD" size="40"><BR>
<B>���� - ���ʡ�� :</B><BR>
<INPUT TYPE="text" NAME="NAME" size="40"><BR>
<B>Email :</B><BR>
<INPUT TYPE="text" NAME="EMAIL" size="40"><BR>
<B>Level :</B><BR>
<SELECT NAME="LEVEL">
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[groups] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." ORDER BY id ");
   while ($arr[groups] = $db->fetch($res[groups]))
   {
		echo "<option value=\"".$arr[groups][id]."\">".$arr[groups][name]."</option>";
   }
$db->closedb ();
?>
</SELECT>
<BR><BR>
<INPUT TYPE="submit" value=" �����������к� ">
</FORM>
<?
	}else{
		//�ó�����ҹ
		echo  $PermissionFalse ;
	}
}
else if($_GET[op] == "admin_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// �ó���� User Admin Database Edit
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	//��Ǩ�ͺ�� user ��������ѧ
	$res[admin] = $db->select_query("SELECT id FROM ".TB_ADMIN." WHERE username='".$_POST[USERNAME]."' ");
	$rows[admin] = $db->rows($res[admin]); 
	$db->closedb ();
		if($rows[admin] AND ($_POST[USERNAME] != $_POST[USERNAME_OLD])){
			$ProcessOutput .= "<BR><BR>";
			$ProcessOutput .= "<CENTER><IMG SRC=\"images/icon/notview.gif\" BORDER=\"0\"><BR><BR>";
			$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>���ͼ������к� : ".$_POST[USERNAME]." ����к������������ö������</B></FONT><BR><BR>";
			$ProcessOutput .= "<A HREF=\"javascript:history.go(-1);\"><B>��Ѻ����</B></A>";
			$ProcessOutput .= "</CENTER>";
			$ProcessOutput .= "<BR><BR>";
		}else{
			if($_POST[PASSWORD]){
				$NewPass = md5($_POST[PASSWORD]);
			}else{
				$NewPass = $_POST[oldpass];
			}
			//�ӡ������������ŧ�ҵ����
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$db->update_db(TB_ADMIN,array(
				"username"=>"$_POST[USERNAME]",
				"password"=>"$NewPass",
				"name"=>"$_POST[NAME]",
				"email"=>"$_POST[EMAIL]",
				"level"=>"$_POST[LEVEL]"
			)," id='$_GET[id]' ");
			$db->closedb ();
			$ProcessOutput .= "<BR><BR>";
			$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
			$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ����䢼���к����º��������</B></FONT><BR><BR>";
			$ProcessOutput .= "<A HREF=\"?name=admin&file=user\"><B>��Ѻ˹�� �Ѵ��ü������к�</B></A>";
			$ProcessOutput .= "</CENTER>";
			$ProcessOutput .= "<BR><BR>";
		}
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "admin_edit"){
	//////////////////////////////////////////// �ó���� User Admin Edit Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�֧��Ңͧ�������к��͡��
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[admin] = $db->select_query("SELECT * FROM ".TB_ADMIN." WHERE id='".$_GET[id]."' ");
		$arr[admin] = $db->fetch($res[admin]);
		$db->closedb ();
		//�������Ѿഷ����ͧ
		if($_SESSION['admin_user'] == $arr[admin][username]){
			$Readonly = " readonly ";
		}
?>
<FORM METHOD=POST ACTION="?name=admin&file=user&op=admin_edit&action=edit&id=<?=$_GET[id];?>">
<B>���ͼ���� :</B><BR>
<INPUT TYPE="text" NAME="USERNAME" size="40" VALUE="<?=$arr[admin][username];?>"><BR><INPUT TYPE="hidden" NAME="USERNAME_OLD" VALUE="<?=$arr[admin][username];?>">
<B>���ʼ�ҹ :</B><BR>
<INPUT TYPE="password" NAME="PASSWORD" size="40" VALUE="" <?=$Readonly;?>><BR>
<B>���� - ���ʡ�� :</B><BR>
<INPUT TYPE="text" NAME="NAME" size="40" VALUE="<?=$arr[admin][name];?>"><BR>
<B>Email :</B><BR>
<INPUT TYPE="text" NAME="EMAIL" size="40" VALUE="<?=$arr[admin][email];?>"><BR>
<B>Level :</B><BR>
<SELECT NAME="LEVEL">
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[groups] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." ORDER BY id ");
   while ($arr[groups] = $db->fetch($res[groups]))
   {
		echo "<option value=\"".$arr[groups][id]."\" ";
		if($arr[groups][id] == $arr[admin][level]){echo " Selected";};
		echo ">".$arr[groups][name]."</option>";
   }
$db->closedb ();
?>
</SELECT>
<BR><BR>
<INPUT TYPE="submit" value=" ��䢼������к� "><INPUT TYPE="hidden" NAME="oldpass" value="<?=$arr[admin][password];?>">
</FORM>
<?
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "admin_del" AND $_GET[action] == "multidel"){
	//////////////////////////////////////////// �ó�ź User Admin Multi
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		while(list($key, $value) = each ($_POST['list'])){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$db->del(TB_ADMIN," id='".$value."' "); 
			$db->closedb ();
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź��¡�ü���к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=user\"><B>��Ѻ˹�� �Ѵ��ü������к�</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "admin_del"){
	//////////////////////////////////////////// �ó�ź User Admin Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->del(TB_ADMIN," id='".$_GET[id]."' "); 
		$db->closedb ();
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź����к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=user\"><B>��Ѻ˹�� �Ѵ��ü������к�</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "minepass_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// �ó���䢢�������ǹ���
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
			if(!$_POST[USERNAME] OR !$_POST[NAME] OR !$_POST[EMAIL]){
				$ProcessOutput .= "<BR><BR>";
				$ProcessOutput .= "<CENTER><IMG SRC=\"images/icon/notview.gif\" BORDER=\"0\"><BR><BR>";
				$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��سҡ�͡�����ŵ�ҧ����ú��ǹ</B></FONT><BR><BR>";
				$ProcessOutput .= "<A HREF=\"javascript:history.go(-1);\"><B>��Ѻ����</B></A>";
				$ProcessOutput .= "</CENTER>";
				$ProcessOutput .= "<BR><BR>";
			}else{
				$Admin_User = $_SESSION[admin_user];
				if($_POST[PASSWORD]){
					$NewPass = md5($_POST[PASSWORD]);
					$URLre = "?name=admin";
					session_unset();
					session_destroy();
				}else{
					$NewPass = $_POST[oldpass];
					$URLre = "?name=admin&file=main";
				}
				//�ӡ����䢢�����ŧ�ҵ����
				$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
				$db->update_db(TB_ADMIN,array(
					"username"=>"$_POST[USERNAME]",
					"password"=>"$NewPass",
					"name"=>"$_POST[NAME]",
					"email"=>"$_POST[EMAIL]"
				)," username='$Admin_User' ");
				$db->closedb ();
				$ProcessOutput .= "<BR><BR>";
				$ProcessOutput .= "<CENTER><A HREF=\"".$URLre."\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
				$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ����䢢��������º��������</B></FONT><BR><BR>";
				$ProcessOutput .= "<A HREF=\"".$URLre."\"><B>��Ѻ�˹�Ҵ����к�</B></A>";
				$ProcessOutput .= "</CENTER>";
				$ProcessOutput .= "<BR><BR>";
		}
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "minepass_edit"){
	//////////////////////////////////////////// �ó���䢢�������ǹ���
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�֧��Ңͧ�������к��͡��
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[admin] = $db->select_query("SELECT * FROM ".TB_ADMIN." WHERE username='".$_SESSION['admin_user']."' ");
		$arr[admin] = $db->fetch($res[admin]);
		$db->closedb ();
?>
<FORM METHOD=POST ACTION="?name=admin&file=user&op=minepass_edit&action=edit">
<B>���ͼ���� :</B><BR>
<INPUT TYPE="text" NAME="USERNAME" size="40" VALUE="<?=$arr[admin][username];?>" readonly style="color=#FF0000;"><BR>
<B>���ʼ�ҹ :</B><BR>
<INPUT TYPE="password" NAME="PASSWORD" size="40" VALUE=""><BR>
<B>���� - ���ʡ�� :</B><BR>
<INPUT TYPE="text" NAME="NAME" size="40" VALUE="<?=$arr[admin][name];?>"><BR>
<B>Email :</B><BR>
<INPUT TYPE="text" NAME="EMAIL" size="40" VALUE="<?=$arr[admin][email];?>"><BR>
<BR><BR>
<INPUT TYPE="submit" value=" ��䢢�������ǹ��� "><INPUT TYPE="hidden" NAME="oldpass" value="<?=$arr[admin][password];?>">
</FORM>
<?
	}else{
		//�ó�����ҹ
		echo $PermissionFalse ;
	}
}
?>
						<BR><BR>
					</TD>
				</TR>
			</TABLE>