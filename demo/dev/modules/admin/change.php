<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
&nbsp;&nbsp;&nbsp;<h1>&nbsp;&nbsp;&nbsp;&nbsp;���ҧ����š����¹��÷�����/��è�ҧ��Һ�ž���ɷ�����</h1>
<TABLE width="95%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
    <p>
    <div align="right"><B><IMG SRC="images/icon/icon_folder.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALIGN="absmiddle"> <A HREF="admin.php?name=admin&file=change">��¡�÷�����</A> &nbsp;&nbsp;&nbsp; <IMG SRC="images/icon/icon_add.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALIGN="absmiddle"> <A HREF="admin.php?name=admin&file=change_post">�����Ǣ������</A></B>&nbsp;&nbsp;</div>
    <TABLE cellSpacing=0 cellPadding=0 border=0>
      <TBODY>
        <TR>
		  <!-- change -->
<?
$_GET['category'] = intval($_GET['category']);
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[BoardCat] = $db->select_query("SELECT * FROM ".TB_WEBBOARD_CAT." ORDER BY sort ");
while($arr[BoardCat] = $db->fetch($res[BoardCat])){
	echo "<TABLE width=95% align=center border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><TR><TD><B><A HREF=\"admin.php?name=admin&file=change&category=".$arr[BoardCat][id]."\">".$arr[BoardCat][category_name]."</A></B></TD><br>";
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
?>
<BR>
<form name="form1" method="post" action="admin.php?name=admin&file=search">
  <table><tr><td><strong> �ҡ��Ŵ�</strong>
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
<BR>
<table width="100%"  align="center" border="0" cellspacing="2" cellpadding="0">
<tr><td colspan="5" height="30" bgcolor="#799fff">&nbsp;&nbsp;<IMG SRC="images/icon/graph-i.gif" BORDER="0" ALIGN="absmiddle"> <FONT SIZE="2" COLOR="#FFFFFF"><B><?=$CatShow;?></B></FONT></td></tr>
<tr height="20">
	<td bgcolor="#E5E5E5"><CENTER><B>��Ǣ�� (��ҹ/�ͺ)</B></CENTER></td>
	<td bgcolor="#E5E5E5" width="200"><CENTER><B>��</B></CENTER></td>
	<td bgcolor="#E5E5E5" width="120"><CENTER><B>�ѹ���ŧ��С��</B></CENTER></td>
    <td bgcolor="#E5E5E5" width="120"><CENTER><B>�ѹ����ͧ����š����¹</B></CENTER></td>
    <td bgcolor="#E5E5E5" width="40"><CENTER><B>�׹�ѹ</B></CENTER></td>
</tr>
<?
//�ʴ���Ǣ�ͻѡ��ش
$res[Pin] = $db->select_query("SELECT * FROM ".TB_WEBBOARD." $SQLwherePin ORDER BY pin_date DESC  LIMIT "._SHOW_BOARD_PIN." ");
while($arr[Pin] = $db->fetch($res[Pin])){
	$SumComm = $db->num_rows(TB_WEBBOARD_COMMENT,"id"," topic_id='".$arr[Pin][id]."' "); 
	echo "<tr height=\"20\"><td bgcolor=\"#E7FCE0\"> <B>".sprintf("%0"._NUM_ID."d",$arr[Pin][id])." : </B>&nbsp;<IMG SRC=\"images/icon/dock.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<A HREF=\"admin.php?name=admin&file=change_read&amp;id=".$arr[Pin][id]."\" >".$arr[Pin][topic]."</A> ";
	//�ó���Ǣ������ 
	NewsIcon(TIMESTAMP, $arr[Pin][post_date], "images/icon_new.gif");
	echo "<FONT FACE=\"tahoma\" COLOR=\"#808080\">(".number_format($arr[Pin][pageview])."/".number_format($SumComm).")</FONT></td>\n";
	echo "<td bgcolor=\"#E7FCE0\" width=\"120\"><CENTER><B><FONT COLOR=\"#6600FF\">";
	//�ó���Ҫԡ
	if($arr[Pin][is_member]){
		echo "<B><FONT COLOR=\"#FF0066\">";
	}else{ };
	echo "".$arr[Pin][post_name]."</FONT></B></CENTER></td>\n";
	echo "<td bgcolor=\"#E7FCE0\" width=\"120\"><CENTER><FONT COLOR=\"#339900\">".ThaiTimeConvert($arr[Pin][post_date],"","2")."</FONT></CENTER></td>\n";
}


//�ʴ�����Ǣ�� 
$limit = _PERPAGE_BOARD ;
$SUMPAGE = $db->num_rows(TB_WEBBOARD,"id","$SQLwhere");
$page=$_GET[page];
if (empty($page)){
	$page=1;
}
$rt = $SUMPAGE%$limit ;
$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
$goto = ($page-1)*$limit ;

$Color = 0; 
$BoardResult = $db->select_query("SELECT * FROM ".TB_WEBBOARD." $SQLwhere2 ORDER BY id DESC  LIMIT $goto, $limit ");
while($WebBoard = $db->fetch($BoardResult)){
	if($Color == 0){
		$Color = 1 ;
		$ColorFill = "#feffe4";
	}else{
		$Color = 0 ;
		$ColorFill = "#FDEAFB";
	}
	//Sum comment
	$SumComm = $db->num_rows(TB_WEBBOARD_COMMENT,"id"," topic_id='".$WebBoard[id]."' "); 
	echo "<tr height=\"20\"><td bgcolor=\"".$ColorFill."\" width=\"450\"><IMG SRC=\"images/icon/dok.gif\" BORDER=\"0\" ALIGN=\"absmiddle\"> <B>".sprintf("%0"._NUM_ID."d",$WebBoard[id])." : </B> <A HREF=\"admin.php?name=admin&file=change_read&id=".$WebBoard[id]."\" >".$WebBoard[topic]."</A> ";
	//�ó�Ṻ�ٻ
	if($WebBoard[picture]){
		echo "<IMG SRC=\"images/attach.gif\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
	}else{ };
	//�ó���Ǣ������ 
	NewsIcon(TIMESTAMP, $WebBoard[post_date], "images/icon_new.gif");
	echo "<FONT FACE=\"tahoma\" COLOR=\"#808080\">(".number_format($WebBoard[pageview])."/".number_format($SumComm).")</FONT></td>\n";
	echo "<td bgcolor=\"".$ColorFill."\" width=\"120\"><CENTER><B><FONT COLOR=\"#6600FF\">";
	//�ó���Ҫԡ
	if($WebBoard[is_member]){
		echo "<IMG SRC=\"images/human.gif\" BORDER=\"0\" ALIGN=\"absmiddle\"> <B><FONT COLOR=\"#FF0066\">";
	}else{ };
	echo "".$WebBoard[post_name]."</FONT></B></CENTER></td>\n";
	echo "<td bgcolor=\"".$ColorFill."\" width=\"120\"><CENTER><FONT COLOR=\"#339900\">".ThaiTimeConvert($WebBoard[post_date],"","2")."</FONT></CENTER></td>\n";
	echo "<td bgcolor=\"".$ColorFill."\" width=\"120\"><CENTER><FONT COLOR=\"#339900\">".$WebBoard[change_date]."&nbsp;".$WebBoard[change_month]."&nbsp;".$WebBoard[change_year]."</FONT></CENTER></td>\n";
	if($WebBoard[enable]){
		echo "<td bgcolor=\"".$ColorFill."\" width=\"120\"><CENTER><FONT COLOR=\"#339900\"> �׹�ѹ�ҡ admin ���� </FONT></CENTER></td>\n";
	}else{
		echo "<td bgcolor=\"".$ColorFill."\" width=\"120\"><CENTER><FONT COLOR=\"#339900\"> �ѧ������׹�ѹ </FONT></CENTER></td>\n";
	}
}
@mysql_free_result($BoardResult);
$db->closedb();
echo "</table>";

?>
				<BR>
				<table border="0" cellpadding="0" cellspacing="1" width="95%" align=center>
					<tr>
						<td>
				<?
				SplitPage($page,$totalpage,"admin.php?name=admin&file=change_read&category=".$_GET[category]."");
				echo $ShowSumPages ;
				echo "<BR>";
				echo $ShowPages ;
				?>
						</td>
					</tr>
				</table>

			<BR><BR>
			<!-- change -->
		  </TD>
        </TR>
      </TBODY>
    </TABLE>
    </p>   

</TD>
  </TR>
</TABLE>
<br /><br /><br /><br /><br />