<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="95%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
<?
$_GET['id'] = intval($_GET['id']);
//�֧�����š�з�� 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$VIEWBOARD = $db->fetch($db->select_query("SELECT * FROM ".TB_WEBBOARD." WHERE id = '".$_GET[id]."' "));
$db->closedb ();
//�ó��������¡�á�з�� 
NotTrueAlert($VIEWBOARD[id], "3", "�������¡�á�з�����ҹ��ͧ�����Ҫ�");

//Post Action
if($_GET[action] == "comment"){
	//Check data
	if(!$_POST[topic] OR !$_POST[detail] OR !$_POST[post_name] OR !$_GET[id]){
		echo "<script language='javascript'>" ;
		echo "alert('��ҹ��͡���������ú��ǹ ��سҵ�Ǩ�ͺ')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
	//��ẹ�ɳ�
	checkban($_POST[topic]);
	checkban($_POST[detail]);
	checkban($_POST[post_name]);
	//Check Member
	if($_SESSION['login_true']){$ISMember = $_SESSION['login_true'];}else{$ISMember = "";}
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$db->update_db(TB_WEBBOARD,array(
		"enable_comment"=>"$_POST[ENABLE_COMMENT]"
		)," id=$_GET[id] ");
	//Add Topic
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$db->add_db(TB_WEBBOARD_COMMENT,array(
		"topic_id"=>"".$_GET[id]."",
		"detail"=>"".htmlspecialchars($_POST[detail])."",
		"post_name"=>"".htmlspecialchars($_POST[post_name])."",
		"is_member"=>"$ISMember",
		"ip_address"=>"".IPADDRESS."",
		"post_date"=>"".TIMESTAMP."",
	)); 
	$PostComplete = True ;
}

//�ӹǹ����Ҫ�
$PAGEVIEW = $VIEWBOARD[pageview]+1 ;
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$db->update(TB_WEBBOARD," pageview='$PAGEVIEW' "," id='$_GET[id]' ");
$db->closedb ();

?>
<script type="text/javascript">
function showemotion() {
	emotion1.style.display = 'none';
	emotion2.style.display = '';
}
function closeemotion() {
	emotion1.style.display = '';
	emotion2.style.display = 'none';
}

function emoticon(theSmilie) {

	document.form2.detail.value += ' ' + theSmilie + ' ';
	document.form2.detail.focus();
}
</script>

<?
//�ʴ��š��Post 
if($PostComplete){
	//Complete
?>
<BR><BR>
<TABLE width=90% align=center>
<TR>
	<TD><CENTER><IMG SRC="images/login-redirection-loader.gif" BORDER="0"></CENTER></TD>
</TR>
<TR>
	<TD><CENTER><B>�����Ť����Դ�����ӡ���������º��������</B><BR><BR>
	<A HREF="index.php?name=change&file=read&id=<?=$_GET[id];?>">��ԡ��������ʹ���������´��з��</A>
	</CENTER></TD>
</TR>
</TABLE><BR><BR>
<?
}else{
	//Not Complete
?>
				<TABLE width="95%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD bgcolor="#b0cbe9">
					<h4><?=$VIEWBOARD[topic];?></h4>
					<BR><BR><BR>
					<B>�� : </B>
				<?//�ó���Ҫԡ
					if($VIEWBOARD[is_member]){
						echo "<IMG SRC=\"images/human.gif\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
					}else{ };
				?>
					<?=$VIEWBOARD[post_name];?> &nbsp; <B>������ѹ��� : </B><?= ThaiTimeConvert($VIEWBOARD[post_date],"1","");?> &nbsp;&nbsp;<br />
<?
if($_SESSION['admin_user']){
	if($VIEWBOARD[pin_date]){
		echo "<A HREF=\"javascript:Confirm('admin.php?name=admin&file=pin_topic_change&action=removepin&id=".$_GET[id]."','�س����㹡��ź��з�����͡�ҡ��ûѡ��ش ?');\"><IMG SRC=\"images/admin/pin.gif\" WIDTH=\"16\" HEIGHT=\"16\" BORDER=\"0\" ALIGN=\"absmiddle\"> ¡��ԡ�ѡ��ش </A>&nbsp;&nbsp;&nbsp;";
	}else{
		echo "<A HREF=\"javascript:Confirm('admin.php?name=admin&file=pin_topic_change&action=addpin&id=".$_GET[id]."','�س����㹡�ûѡ��ش����з���� ?');\"><IMG SRC=\"images/admin/pin.gif\" WIDTH=\"16\" HEIGHT=\"16\" BORDER=\"0\" ALIGN=\"absmiddle\"> �ӡ�ûѡ��ش </A>&nbsp;&nbsp;&nbsp;";
	}
	if($VIEWBOARD[enable]){
		echo "<A HREF=\"javascript:Confirm('admin.php?name=admin&file=change_enable&action=removepin&id=".$_GET[id]."','�س����㹡��ź��з�����͡�ҡ����׹�ѹ  ?');\"><IMG SRC=\"images/admin/pin.gif\" WIDTH=\"16\" HEIGHT=\"16\" BORDER=\"0\" ALIGN=\"absmiddle\"> ¡��ԡ�׹�ѹ  </A>&nbsp;&nbsp;&nbsp;";
	}else{
		echo "<A HREF=\"javascript:Confirm('admin.php?name=admin&file=change_enable&action=addpin&id=".$_GET[id]."','�س����㹡���׹�ѹ����з���� ?');\"><IMG SRC=\"images/admin/pin.gif\" WIDTH=\"16\" HEIGHT=\"16\" BORDER=\"0\" ALIGN=\"absmiddle\"> ���׹�ѹ </A>&nbsp;&nbsp;&nbsp;";
	}
	echo " <A HREF=\"javascript:Confirm('admin.php?name=admin&file=delete_topic_change&id=".$_GET[id]."','�س����㹡��ź��з���� ?');\"><IMG SRC=\"images/admin/trash.gif\" WIDTH=\"20\" HEIGHT=\"20\" BORDER=\"0\" ALIGN=\"absmiddle\"> ź��з���� </A>";
	if($VIEWBOARD[enable_comment]){
		echo "<A HREF=\"javascript:Confirm('admin.php?name=admin&file=enable_comment&action=removecomment&id=".$_GET[id]."','�س����㹡��¡��ԡ����Դ�ʴ������Դ��繹�� ?');\"><IMG SRC=\"images/admin/pin.gif\" WIDTH=\"16\" HEIGHT=\"16\" BORDER=\"0\" ALIGN=\"absmiddle\"> ¡��ԡ����Դ�ʴ������Դ��� </A>&nbsp;&nbsp;&nbsp;";
	}else{
		echo "<A HREF=\"javascript:Confirm('admin.php?name=admin&file=enable_comment&action=addcomment&id=".$_GET[id]."','�س����㹡���Դ�ʴ������Դ�����Ǣ�͹�� ?');\"><IMG SRC=\"images/admin/pin.gif\" WIDTH=\"16\" HEIGHT=\"16\" BORDER=\"0\" ALIGN=\"absmiddle\"> �ӡ���Դ�ʴ������Դ��� </A>&nbsp;&nbsp;&nbsp;";
	}
};
?>
					<BR><BR>
					</TD>
				</TR>
				<TR>
					<TD>
					<BR>
					<?
					//Show Picture
					if($VIEWBOARD[picture]){
						$postpicupload = @getimagesize ("change_upload/".$VIEWBOARD[picture]."");
						if ( $postpicupload[0] > _WEBBOARD_LIMIT_PICWIDTH ) {
							$PicUpload = "<BR><CENTER><img src='change_upload/".$VIEWBOARD[picture]."' width='"._WEBBOARD_LIMIT_PICWIDTH."' border='0' ><BR></CENTER><BR>";
							}else{
							$PicUpload = "<BR><CENTER><img src='change_upload/".$VIEWBOARD[picture]."' border='0' ><BR></CENTER><BR>";
							}
						echo $PicUpload ;
					}else{ };
					?>
					<?=(banword(CHANGE_EMOTICON(BBCODE($VIEWBOARD[detail]))));?>
					<BR><BR>
					��Ҫ� : <?=$VIEWBOARD[pageview];?> 
					<BR><BR>
					</TD>
				</TR>
			</TABLE>


<?
//�֧��¡�ä����Դ���
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[comment] = $db->select_query("SELECT * FROM ".TB_WEBBOARD_COMMENT." WHERE topic_id = '".$_GET[id]."' ORDER BY id ");
$count=0;
while($arr[comment] = $db->fetch($res[comment])){
	$count  ++;
?>
<BR>
			<TABLE cellSpacing=5 cellPadding=0 width=50% border=0 align="center" class="tablecomment">
			<TR>
				<TD><B><FONT COLOR="#990000">�����Դ��繷�� <?=$count;?></FONT></B>
				<?if($_SESSION['admin_user']){echo " <A HREF=\"javascript:Confirm('?name=change&file=delete_comment&id=".$_GET[id]."&comment=".$arr[comment][id]."','�س����㹡��ź�����Դ��繹�� ?');\"><IMG SRC=\"images/admin/trash.gif\" WIDTH=\"20\" HEIGHT=\"20\" BORDER=\"0\" ALIGN=\"absmiddle\"></A>";};?>
				<BR><?= ThaiTimeConvert($arr[comment][post_date],"1","1");?>
				</TD>
			</TR>
			<TR>
				<TD>
<?
//Show Picture
if($arr[comment][picture]){
	$postpicupload = @getimagesize ("change_upload/".$arr[comment][picture]."");
	if ( $postpicupload[0] > _WEBBOARD_LIMIT_PICWIDTH ) {
		$PicUpload = "<BR><CENTER><img src='change_upload/".$arr[comment][picture]."' width='"._WEBBOARD_LIMIT_PICWIDTH."' border='0' ><BR></CENTER><BR>";
		}else{
		$PicUpload = "<BR><CENTER><img src='change_upload/".$arr[comment][picture]."' border='0' ><BR></CENTER><BR>";
		}
	echo $PicUpload ;
}else{ };
?>
<?=(banword(CHANGE_EMOTICON(BBCODE($arr[comment][detail]))));?></TD>
			</TR>
			<TR>
				<TD><B><FONT COLOR="#990000">�� : </FONT></B> <?=$arr[comment][post_name];?> &nbsp;&nbsp; <FONT COLOR="#990000"><B>�;� : </B></FONT><?=$arr[comment][ip_address];?>
				</TD>
			</TR>
			</TABLE>
			<BR>
<?
}
$db->closedb ();
?>
<BR><BR>

<FORM name="form2" METHOD=POST ACTION="?name=change&file=read&action=comment&id=<?=$_GET[id];?>" enctype="multipart/form-data" >
<TABLE width="95%" align="center">
<TR>
	<TD width=150 align=right><B>Re ��Ǣ�� : </B></TD>
	<TD><INPUT NAME="topic" TYPE="text" style="color: #FF0000" value="<?=$VIEWBOARD[topic];?>" size="50" readonly></TD>
</TR>
<TR>
	<TD width=150 align=right valign=top><B>��������´ : </B></TD>
	<TD><TEXTAREA NAME="detail" ROWS="10" style="width:350" class="textareaform"></TEXTAREA></TD>
</TR>
<TR>
	<TD width=150 align=right><B>���ͧ͢��ҹ : </B></TD>
	<TD><input type="hidden" name="ENABLE_COMMENT" id="checkbox" value="0" /><INPUT TYPE="text" NAME="post_name" style="width:150" class="inputform" <?if($_SESSION['login_true']){echo "value=\"".$_SESSION['login_true']."\" readonly style=\"color: #FF0000\" ";};?>></TD>
</TR>
<TR>
	<TD width=150 align=right><B></B></TD>
	<TD><INPUT TYPE="submit" value=" �ʴ�������� " class="buttonform"></TD>
</TR>
</TABLE>
</FORM>
<?
}
//������ʴ��ſ���� Post
?><BR>
        </TD>
    </TR>
</TABLE>