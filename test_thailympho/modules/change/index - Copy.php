    <TABLE cellSpacing=0 cellPadding=0 width=800 border=0 align="center"><h2 align="center">webboard (�Ǻ����)</h2>
<TD width="800" vAlign=top>
	  <div align="left">
	    <p><BR>
	          <!-- Webboard -->
          <?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[BoardCat] = $db->select_query("SELECT * FROM ".TB_WEBBOARD_CAT." ORDER BY sort ");
while($arr[BoardCat] = $db->fetch($res[BoardCat])){
	echo "<TABLE width=400 align=center border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><TR><TD><img src='images/icon/plusicon.gif' ALIGN=\"absmiddle\">&nbsp;&nbsp;<B><A HREF=\"?name=webboard&category=".$arr[BoardCat][id]."\">".$arr[BoardCat][category_name]."</A> �ӹǹ</B></TD>";
	//Sum Album
	$SumCat = $db->num_rows(TB_WEBBOARD,"id"," category='".$arr[BoardCat][id]."' "); 
	echo "<TD width=\"100\" align=right><FONT COLOR=\"#808080\">".number_format($SumCat)."&nbsp;��з��</FONT></TD></TR></TABLE>";
	echo "<TABLE width=400 align=center><TR><TD  width=400 height=1 class=\"dotline\"></TD></TR></TABLE>\n";
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
	$CatShow = "��¡�á�з�������";
	$SQLwhere = " pin_date='' ";
	$SQLwhere2 = " WHERE pin_date='' ";
	$SQLwherePin = " WHERE pin_date!='' ";
}
?>
        </p>
	    <table width="800" height="30"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E5E5E5">
          <tr>
            <td width="63%">
			<form name="form1" method="post" action="admin.php?name=change&file=search">
              <div align="left">&nbsp; &nbsp; <strong>�ӷ�����</strong>&nbsp;              
                <input type="text" name="keyword" value="<? echo"$keyword"; ?>">&nbsp;&nbsp;&nbsp;                <strong> �ҡ��Ŵ�
                </strong>
                <select name="fields">
                    <option value="<?echo "$fields"; ?>"><?echo "$fields"; ?></option>
                  <option value="topic">��Ǣ��</option>
                  <option value="detail">��������´</option>
                  <option value="post_name">���ͼ���駡�з��</option>
                </select>&nbsp;&nbsp;&nbsp;
                <input type="submit" name="Submit" value="����">
              </div>
			</form>

			</td>
            <td width="37%">
              <div align="right"> <B><IMG SRC="images/icon/icon_folder.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALIGN="absmiddle"> <A HREF="?name=webboard">��¡�á�з�������</A> &nbsp;&nbsp;&nbsp; <IMG SRC="images/icon/icon_add.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALIGN="absmiddle"> <A HREF="?name=webboard&file=post">��駡�з������ </A></B>&nbsp;&nbsp;</div></td>
          </tr>
        </table>
	  </div>
	  
	  
<BR>
<table width="800"  align="center" border="0" cellspacing="2" cellpadding="0">
<tr>
  <td colspan="3" height="30">&nbsp;&nbsp;<IMG SRC="images/icon/graph-i.gif" BORDER="0" ALIGN="absmiddle"> <FONT SIZE="2" COLOR="#000000"><B><?=$CatShow;?></B></td>
</tr>
<tr height="20">
	<td height="25" bgcolor="#9fc4f5"><CENTER><B><font color="#000000">��Ǣ�� (��ҹ/�ͺ)</font></B>
	</CENTER></td>
	<td bgcolor="#9fc4f5" width="120"><CENTER>
	  <B><font color="#000000">�������</font></B>
	</CENTER></td>	
		<td bgcolor="#9fc4f5" width="120"><CENTER>
	  <B><font color="#000000">�ѹ/���ҷ���駡�з��</font></B>
	</CENTER></td>
</tr>
<tr><td colspan="3" height=1 class="dotline"></td></tr>
<?
//�ʴ���з��ѡ��ش
$res[Pin] = $db->select_query("SELECT * FROM ".TB_WEBBOARD." $SQLwherePin ORDER BY pin_date DESC  LIMIT "._SHOW_BOARD_PIN." ");
while($arr[Pin] = $db->fetch($res[Pin])){
	$SumComm = $db->num_rows(TB_WEBBOARD_COMMENT,"id"," topic_id='".$arr[Pin][id]."' "); 
	echo "<tr height=\"20\"><td bgcolor=\"#E7FCE0\">";
	if ($SumComm > 15) {
	echo "<IMG SRC=\"images/icon/hottopic.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<B>";
	} else {
	echo "<IMG SRC=\"images/icon/dock.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<B>"; } 
	echo "".sprintf("%0"._NUM_ID."d",$arr[Pin][id])." : </B> <A HREF=\"?name=webboard&file=read&id=".$arr[Pin][id]."\">".$arr[Pin][topic]."</A> ";

	echo "<FONT FACE=\"tahoma\" COLOR=\"#808080\">(".number_format($arr[Pin][pageview])."/".number_format($SumComm).")</FONT>&nbsp;";

	//�ó�Ṻ�ٻ
	if($arr[Pin][picture]){
		echo "<IMG SRC=\"images/attach.gif\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
	}else{ };
	//�óա�з������ 
	NewsIcon(TIMESTAMP, $arr[Pin][post_date], "images/icon_new.gif");
	//�ó��դ��ͺ��з�� 
	//UpdateIcon(TIMESTAMP, $arr[Pin][update_date], "images/icon/update.gif");

	echo "</td>\n <td bgcolor=\"#E7FCE0\" width=\"120\"><CENTER><B><FONT COLOR=\"#6600FF\">";
	//�ó���Ҫԡ
	if($arr[Pin][is_member]){
		echo "<IMG SRC=\"images/human.gif\" BORDER=\"0\" ALIGN=\"absmiddle\" alt=\"��Ҫԡ Narongrit Dot Net\"> &nbsp;<B><FONT COLOR=\"#FF3300\">";
	}else{ };
	echo "".$arr[Pin][post_name]."</FONT></B></CENTER></td>\n";
	echo "<td bgcolor=\"#E7FCE0\" width=\"120\"><CENTER><FONT COLOR=\"#339900\">".ThaiTimeConvert($arr[Pin][post_date],"","2")."</FONT></CENTER></td>\n";
	echo "<tr><td colspan=\"3\" height=1 class=\"dotline\"></td></tr>\n";
}


//�ʴ��š�з�� 
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
		$ColorFill = "#F0F0F0";
	}else{
		$Color = 0 ;
		$ColorFill = "#FDEAFB";
	}
	//Sum comment
	$SumComm = $db->num_rows(TB_WEBBOARD_COMMENT,"id"," topic_id='".$WebBoard[id]."' "); 
	echo "<tr height=\"20\"><td bgcolor=\"".$ColorFill."\">";
	if ($SumComm >15) {
	echo "<IMG SRC=\"images/icon/hottopic.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;  <B>";}
	else {
	echo "<IMG SRC=\"images/icon/dok.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;  <B>";}

	echo "".sprintf("%0"._NUM_ID."d",$WebBoard[id])." : </B> <A HREF=\"?name=webboard&file=read&id=".$WebBoard[id]."\">".$WebBoard[topic]."</A> ";
	
	echo "<FONT FACE=\"tahoma\" COLOR=\"#808080\">(".number_format($WebBoard[pageview])."/".number_format($SumComm).")</FONT>&nbsp;";
//�ó�Ṻ�ٻ
	if($WebBoard[picture]){
		echo "<IMG SRC=\"images/attach.gif\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
	}else{ };
	//�óա�з������ 
	NewsIcon(TIMESTAMP, $WebBoard[post_date], "images/icon_new.gif");
	//�ó��դ��ͺ��з�� 
	//UpdateIcon(TIMESTAMP, $WebBoard[update_date], "images/icon/update.gif");

	echo "</td>\n <td bgcolor=\"".$ColorFill."\" width=\"120\"><CENTER><B><FONT COLOR=\"#6600FF\">";
	//�ó���Ҫԡ
	if($WebBoard[is_member]){
		echo "<IMG SRC=\"images/human.gif\" BORDER=\"0\" ALIGN=\"absmiddle\" alt=\"��Ҫԡ Narongrit Dot Net\">&nbsp; <B><FONT COLOR=\"#FF3300\">";
	}else{ };
	echo "".$WebBoard[post_name]."</FONT></B></CENTER></td>\n";
	echo "<td bgcolor=\"".$ColorFill."\" width=\"120\"><CENTER><FONT COLOR=\"#339900\">".ThaiTimeConvert($WebBoard[post_date],"","2")."</FONT></CENTER></td>\n";
	echo "<tr><td colspan=\"3\" height=1 class=\"dotline\"></td></tr>\n";
}
@mysql_free_result($BoardResult);
$db->closedb();
echo "</table>";

?>
				<BR>
				<table border="0" cellpadding="0" cellspacing="1" width="800" align="center">
					<tr>
						<td>
				<?
				SplitPage($page,$totalpage,"?name=webboard&category=".$_GET[category]."");
				echo $ShowSumPages ;
				echo "<BR>";
				echo $ShowPages ;
				?>
						</td>
					</tr>
				</table>

			<BR><BR>
			<!-- webboard -->
		  </TD>
        </TR>
      </TBODY>
</TABLE>