<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
    <div id="center">
    <p><h1>����š����¹��÷�����</h1>
	  <div align="left">
	    <p>
	          <!-- Webboard -->
<?
$_GET['category'] = intval($_GET['category']);
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[BoardCat] = $db->select_query("SELECT * FROM ".TB_WEBBOARD_CAT." ORDER BY sort ");
while($arr[BoardCat] = $db->fetch($res[BoardCat])){
	echo "<TABLE width=95% align=center border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><TR><TD><B><A HREF=\"?name=change&category=".$arr[BoardCat][id]."\">".$arr[BoardCat][category_name]."</A></B></TD><br>";
	//Sum Album
	$SumCat = $db->num_rows(TB_WEBBOARD,"id"," category='".$arr[BoardCat][id]."' "); 
	echo "<TD width=\"100\" align=right>".number_format($SumCat)."</FONT>&nbsp;&nbsp;</TD></TR></TABLE>";
}

if($_GET[category]){
	$SQLwhere = " pin_date='' AND category='".$_GET[category]."' ";
	$SQLwhere2 = " WHERE pin_date='' AND category='".$_GET[category]."' ";
	$SQLwherePin = " WHERE pin_date!='' AND category='".$_GET[category]."' ";
	//������Ǵ���� 
	$res[category] = $db->select_query("SELECT category_name FROM ".TB_WEBBOARD_CAT." WHERE id='".$_GET[category]."' "); 
	$arr[category] = $db->fetch($res[category]);
	$CatShow = $arr[category][category_name];
}else{
	$CatShow = "��¡�÷�����";
	$SQLwhere = " pin_date='' ";
	$SQLwhere2 = " WHERE pin_date='' ";
	$SQLwherePin = " WHERE pin_date!='' ";
}
?><br /><br />
        </p>
	  </div>
      <div align="right"><B><IMG SRC="images/icon/icon_folder.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALIGN="absmiddle"> <A HREF="?name=change">��¡�÷�����</A> &nbsp;&nbsp;&nbsp; <IMG SRC="images/icon/icon_add.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALIGN="absmiddle"> <A HREF="?name=change&file=post">�����Ǣ������</A></B>&nbsp;&nbsp;</div>
      <br /><br />
      <form name="form1" method="post" action="admin.php?name=change&file=search">
  <table width="95%" align="center"><tr><td><strong> �ҡ��Ŵ�</strong>
    <select name="fields">
        <option value="<?echo "$fields"; ?>"><?echo "$fields"; ?></option>
      <option value="topic">��Ǣ��</option>
      <option value="detail">��������´</option>
      <option value="post_name">���ͼ���駡�з��</option>
      <option value="change_date">�ѹ����ͧ����š����¹</option>
      <option value="change_month">��͹����ͧ����š����¹</option>
    </select>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <strong>�ӷ�����</strong>&nbsp;
    <input type="text" name="keyword" value="<? echo"$keyword"; ?>">&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Submit" value="����">
  </td></tr></table>
</form>  
    <div align="center">
        <? 
$keyword=$_POST[keyword];
$fields=$_POST[fields];

if (empty($keyword) or empty($fields))
{
echo"<br><br><br><br><br><br><h3><font color='red'>��س����͡��¡�ä��� ���¤�Ѻ</font></h3><br><br><br><br><br>";
exit();
} else {

//========= ��ǹ�������� config ���ç�Ѻ host ���¤�Ѻ =========

$host="localhost";
$username="root";
$password="password";
$db="calandar";
$tb="web_webboard";

//================ ����ش config ===============

mysql_connect( $host,$username,$password) or die ("�Դ��͡Ѻ�ҹ������ Mysql ����� ");

mysql_select_db($db) or die("���͡�ҹ�����������"); /* �ӡ�����͡�ҹ�����š�͹ */

$sql="SELECT * FROM $tb where $fields like '%$keyword%'"; 

$db_query=mysql_db_query($db,$sql);

$num_rows=mysql_num_rows($db_query); /* �Ѻ Reccord ��辺 */
if(empty($num_rows)) /* ��Ǩ�ͺ��������������ѧ */
{
echo"<center><br><br>��辺������<font color='red'> <b>$keyword</b></font> �ҡ��ǹ<font color='red'> <b>$fields </b> </font></center><br><br><br><br><br>";
exit();
}
else
{
?>
        <? 
		echo "<br><br><strong> �ʴ���¡�ä��Ҥ����<font color='blue'> <b>$keyword</b></font> �ҡ��ǹ<font color='blue'> <b>$fields</b></font> ��<font color='blue'> <b>$num_rows</b></font> ��з�� </strong><br><br>";  ?><br>
        <br>
      </div>
      </div>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr bgcolor="#FFFFFF"> 
    <td height="25" align="center" bgcolor="#9fc4f5"><strong><font color="#000000">��Ǣ�͡�з��</font></strong></td>
    <td width="120" height="25" align="center" bgcolor="#9fc4f5"><strong><font color="#000000">�������</font></strong></td>
	<td bgcolor="#9fc4f5" width="120"><CENTER><B>�ѹ���ŧ��С��</B></CENTER></td>
    <td bgcolor="#9fc4f5" width="120"><CENTER><B>�ѹ����ͧ����š����¹</B></CENTER></td>
    <td bgcolor="#9fc4f5" width="120"><CENTER><B>�׹�ѹ</B></CENTER></td>
  </tr>
</table>
<?
//�ŧ������������
$a=0;
while($a < $num_rows)
{
$result = mysql_fetch_array($db_query);
$id=$result[id];
$topic=$result[topic];
$detail=$result[detail];
$post_name=$result[post_name];
$change_date=$result[change_date];
$change_month=$result[change_month];
$change_year=$result[change_year];
$enable=$result[enable];
$rep_name=$result[rep_name];
$rep_date=$result[rep_date];

?>
<table width="95%" border="0" cellpadding="0" cellspacing="1">
  <tr bgcolor="#F3F3F3"> 
    <td height="25">&nbsp;<? echo $id ;?>&nbsp;:&nbsp; <A HREF="admin.php?name=admin&file=change_read&id=<? echo $id;?>"><? echo $topic ;?></a> 
    </td>
    <td width="120" height="25" align="center"><font color="#6600FF"><strong><?echo"$post_name";?></strong></font> 
    </td>
    <td width="120" height="25" align="center">
      <font color="#339900"><?= ThaiTimeConvert($post_date,"","2");?></font></td>
      <td width="120" height="25" align="center">
      <font color="#339900"><? echo "$change_date $change_month $change_year "; ?></font></td>
      <td width="120" height="25" align="center">
      <font color="#339900"><? if($enable){
		echo "<FONT COLOR=\"#339900\"> �׹�ѹ�ҡ admin ���� </FONT>";
	}else{
		echo "<FONT COLOR=\"#339900\"> �ѧ������׹�ѹ </FONT>";
	} ?></font></td>
  </tr>
  </table>
<?
$a++;
}
}
}
?>
<br /><br /><br /><br />