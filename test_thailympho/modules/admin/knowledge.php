<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
					<h1>�Ԩ�����ç��Һ��</h1>
					<A HREF="?name=admin&file=knowledge"><IMG SRC="images/admin/open.gif"  BORDER="0" align="absmiddle"> ��¡�áԨ�����ç��Һ��</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=knowledge&op=news_add"><IMG SRC="images/admin/book.gif"  BORDER="0" align="absmiddle"> �����Ԩ�����ç��Һ��</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=knowledge_category"><IMG SRC="images/admin/folders.gif"  BORDER="0" align="absmiddle"> ��¡����Ǵ����</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=knowledge_category&op=newscat_add"><IMG SRC="images/admin/opendir.gif"  BORDER="0" align="absmiddle"> ������Ǵ����</A><BR><BR>
<?
//////////////////////////////////////////// �ʴ���¡�áԨ�����ç��Һ�� 
if($_GET[op] == ""){
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$limit = 20 ;
	$SUMPAGE = $db->num_rows(TB_KNOWLEDGE,"id","");
	$page=$_GET[page];
	if (empty($page)){
		$page=1;
	}
	$rt = $SUMPAGE%$limit ;
	$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
	$goto = ($page-1)*$limit ;
?>
 <form action="?name=admin&file=knowledge&op=news_del&action=multidel" name="myform" method="post">
 <table width="100%" cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td width="44"><CENTER><font color="#FFFFFF"><B>Option</B></font></CENTER></td>
   <td><font color="#FFFFFF"><B>��Ǣ��</B></font></td>
   <td width="100"><CENTER><font color="#FFFFFF"><B>ŧ��С��</B></font></CENTER></td>
   <td width="40"><CENTER><font color="#FFFFFF"><B>��Ǵ</B></font></CENTER></td>
   <td width="40"><CENTER><font color="#FFFFFF"><B>Check</B></font></CENTER></td>
  </tr>  
<?
$res[knowledge] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE." ORDER BY id DESC LIMIT $goto, $limit ");
while($arr[knowledge] = $db->fetch($res[knowledge])){
	$res[category] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE_CAT." WHERE id='".$arr[knowledge][category]."' ");
	$arr[category] = $db->fetch($res[category]);
	//Comment Icon
	if($arr[knowledge][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
?>
    <tr>
     <td width="44">
      <a href="?name=admin&file=knowledge&op=news_edit&id=<? echo $arr[knowledge][id];?>"><img src="images/admin/edit.gif" border="0" alt="���" ></a> 
      <a href="javascript:Confirm('?name=admin&file=knowledge&op=news_del&id=<? echo $arr[knowledge][id];?>&prefix=<? echo $arr[knowledge][post_date];?>','�س����㹡��ź��Ǣ�͹�� ?');"><img src="images/admin/trash.gif"  border="0" alt="ź" ></a>
     </td> 
     <td><A HREF="?name=knowledge&file=readknowledge&id=<?echo $arr[knowledge][id];?>" target="_blank"><?echo $arr[knowledge][topic];?></A><?=$CommentIcon;?></td>
     <td ><CENTER><?echo ThaiTimeConvert($arr[knowledge][post_date],'','');?></CENTER></td>
     <td align="center">
	 <?if($arr[category][category_name]){ //�ҡ����Ǵ�ʴ��ٻ ?>
	 <A HREF="#"><IMG SRC="images/admin/folders.gif"  BORDER="0" align="absmiddle" alt="<?echo $arr[category][category_name];?>" onMouseOver="MM_displayStatusMsg('<?echo $arr[category][category_name];?>');return document.MM_returnValue"></A>
	 <? } ?>
	 </td>
     <td valign="top" align="center" width="40"><input type="checkbox" name="list[]" value="<? echo $arr[knowledge][id];?>"></td>
    </tr>
<?
 } 
?>
 </table>
 <div align="right">
 <input type="button" name="CheckAll" value="Check All" onclick="checkAll(document.myform)" >
 <input type="button" name="UnCheckAll" value="Uncheck All" onclick="uncheckAll(document.myform)" >
 <input type="hidden" name="ACTION" value="news_del" >
 <input type="submit" value="Delete" onclick="return delConfirm(document.myform)">
 </div>
 </form><BR><BR>
<?
	SplitPage($page,$totalpage,"?name=admin&file=knowledge");
	echo $ShowSumPages ;
	echo "<BR>";
	echo $ShowPages ;
}
else if($_GET[op] == "news_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// �ó����� Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		require("includes/class.resizepic.php");
		$FILE = $_FILES['FILE'];
		if (!$_POST[CATEGORY] OR !$_POST[TOPIC] OR !$_POST[HEADLINE] OR !$_POST[DETAIL] OR !$FILE['type']){
			echo "<script language='javascript'>" ;
			echo "alert('��سҡ�͡�����ŵ�ҧ����ú��ǹ')" ;
			echo "</script>" ;
			echo "<script language='javascript'>javascript:history.back()</script>";
			exit();
		}
		if (($FILE['type']!="image/jpg") AND ($FILE['type']!="image/jpeg") AND ($FILE['type']!="image/pjpeg")){
			echo "<script language='javascript'>" ;
			echo "alert('��س��������ʡ�� jpg ��ҹ��')" ;
			echo "</script>" ;
			echo "<script language='javascript'>javascript:history.back()</script>";
			exit();
		}else{
			@copy ($FILE['tmp_name'] , "content/knowledgeicon/".TIMESTAMP.".jpg" );
			$original_image = "content/knowledgeicon/".TIMESTAMP.".jpg" ;
			$desired_width = _IKNOW_W ;
			$desired_height = _IKNOW_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$image->output_resized("content/knowledgeicon/".TIMESTAMP.".jpg", "JPG");
		}
		//�ӡ������������ŧ�ҵ����
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_KNOWLEDGE,array(
			"category"=>"$_POST[CATEGORY]",
			"topic"=>"".addslashes(htmlspecialchars($_POST[TOPIC]))."",
			"headline"=>"".addslashes(htmlspecialchars($_POST[HEADLINE]))."",
			"posted"=>"$_SESSION[admin_user]",
			"post_date"=>"".TIMESTAMP."",
			"update_date"=>"".TIMESTAMP."",
			"enable_comment"=>"$_POST[ENABLE_COMMENT]"
		));
		$db->closedb ();

		//�ӡ�����ҧ��� text �ͧ�������
		$Filename = TIMESTAMP.".txt";
		$txt_name = "content/content/knowledgedata/".$Filename."";
		$txt_open = @fopen("$txt_name", "w");
		@fwrite($txt_open, "".$_POST[DETAIL]."");
		@fclose($txt_open);

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ�������Ԩ�����ç��Һ��   �������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=knowledge\"><B>��Ѻ˹�� �Ѵ��áԨ�����ç��Һ�� </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "news_add"){
	//////////////////////////////////////////// �ó����� Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=knowledge&op=news_add&action=add" enctype="multipart/form-data">
<B>��Ǣ�� :</B><BR>
<INPUT TYPE="text" NAME="TOPIC" size="50">
<BR><BR>
<B>��������´������� :</B><BR>
<INPUT TYPE="text" NAME="HEADLINE" size="100">
<BR><BR>
<B>��Ǵ���� :</B><BR>
<SELECT NAME="CATEGORY">
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE_CAT." ORDER BY sort ");
while ($arr[category] = $db->fetch($res[category])){
	   echo "<option value=\"".$arr[category][id]."\"";
	   echo ">".$arr[category][category_name]."</option>";
}
$db->closedb ();
?>
</SELECT>
<BR><BR>
<B>�ٻ�ͤ͹������� : </B><BR>
<IMG name="view01" SRC="images/knowledge_blank.gif" <?echo " WIDTH=\""._IKNOW_W."\" HEIGHT=\""._IKNOW_H."\" ";?> BORDER="0" ><BR>
<input type="file" name="FILE" onpropertychange="view01.src=FILE.value;" style="width=250;"><BR>
�ٻ����� .jpg  .jpeg ��Ҵ <?echo _IKNOW_W." x "._IKNOW_H ;?> Pixels ��ҹ�� (�ҡ�ٻ�˭���������ѵ��ѵ�)
<BR><BR>
<B>������ :</B><BR>
<textarea cols="80" id="message" name="DETAIL" rows="10" ><? echo"$TextContent" ?></textarea>
<script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'message',{			
	filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash' } );
        //]]>
    </script>
<BR>
<INPUT TYPE="checkbox" NAME="ENABLE_COMMENT" VALUE="1"> ͹حҵ�����ա���ʴ������Դ���
<BR>
<input type="submit" value=" ���� �Ԩ�����ç��Һ�� " name="submit"> <input type="reset" value=" ���� " name="reset">
</FORM>
<BR><BR>
<?
	}else{
		//�ó�����ҹ
		echo  $PermissionFalse ;
	}
}
else if($_GET[op] == "news_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// �ó���� Database Edit
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�֧���
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[knowledge] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE." WHERE id='".$_GET[id]."' ");
		$arr[knowledge] = $db->fetch($res[knowledge]);
		$db->closedb ();
		require("includes/class.resizepic.php");
		$FILE = $_FILES['FILE'];
		if (!$_POST[CATEGORY] OR !$_POST[TOPIC] OR !$_POST[HEADLINE] OR !$_POST[DETAIL]){
			echo "<script language='javascript'>" ;
			echo "alert('��سҡ�͡�����ŵ�ҧ����ú��ǹ')" ;
			echo "</script>" ;
			echo "<script language='javascript'>javascript:history.back()</script>";
			exit();
		}
		if ((($FILE['type']!="image/jpg") AND ($FILE['type']!="image/jpeg") AND ($FILE['type']!="image/pjpeg")) AND $FILE['size']){
			echo "<script language='javascript'>" ;
			echo "alert('��س��������ʡ�� jpg ��ҹ��')" ;
			echo "</script>" ;
			echo "<script language='javascript'>javascript:history.back()</script>";
			exit();
		}else{
			@copy ($FILE['tmp_name'] , "content/knowledgeicon/".$arr[knowledge][post_date].".jpg" );
			$original_image = "content/knowledgeicon/".$arr[knowledge][post_date].".jpg" ;
			$desired_width = _IKNOW_W ;
			$desired_height = _IKNOW_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$image->output_resized("content/knowledgeicon/".$arr[knowledge][post_date].".jpg", "JPG");
		}
		//�ӡ����䢢�����ŧ�ҵ����
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->update_db(TB_KNOWLEDGE,array(
			"category"=>"$_POST[CATEGORY]",
			"topic"=>"".addslashes(htmlspecialchars($_POST[TOPIC]))."",
			"headline"=>"".addslashes(htmlspecialchars($_POST[HEADLINE]))."",
			"posted"=>"$_SESSION[admin_user]",
			"update_date"=>"".TIMESTAMP."",
			"enable_comment"=>"$_POST[ENABLE_COMMENT]"
		)," id=$_GET[id] ");
		$db->closedb ();

		//�ӡ�����ҧ��� text �ͧ�������
		$Filename = $arr[knowledge][post_date].".txt";
		$txt_name = "content/knowledgedata/".$Filename."";
		$txt_open = @fopen("$txt_name", "w");
		@fwrite($txt_open, "".$_POST[DETAIL]."");
		@fclose($txt_open);

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ����䢡Ԩ�����ç��Һ��   �������к����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=knowledge\"><B>��Ѻ˹�� �Ѵ��áԨ�����ç��Һ�� </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "news_edit"){
	//////////////////////////////////////////// �ó���� Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�֧���
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[knowledge] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE." WHERE id='".$_GET[id]."' ");
		$arr[knowledge] = $db->fetch($res[knowledge]);
		$db->closedb ();

		//��ҹ��Ҩҡ��� Text �������
		$FileNewsTopic = "content/knowledgedata/".$arr[knowledge][post_date].".txt";
		$file_open = @fopen($FileNewsTopic, "r");
		$TextContent = @fread ($file_open, @filesize($FileNewsTopic));
		@fclose ($file_open);
		$TextContent = stripslashes($TextContent);
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=knowledge&op=news_edit&action=edit&id=<?=$_GET[id];?>" enctype="multipart/form-data">
<B>��Ǣ�� :</B><BR>
<INPUT TYPE="text" NAME="TOPIC" size="50" value="<?=$arr[knowledge][topic];?>">
<BR><BR>
<B>��������´������� :</B><BR>
<INPUT TYPE="text" NAME="HEADLINE" size="100" value="<?=$arr[knowledge][headline];?>">
<BR><BR>
<B>��Ǵ���� :</B><BR>
<SELECT NAME="CATEGORY">
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE_CAT." ORDER BY sort ");
while ($arr[category] = $db->fetch($res[category])){
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $arr[knowledge][category]){echo " Selected";}
	   echo ">".$arr[category][category_name]."</option>";
}
$db->closedb ();
?>
</SELECT>
<BR><BR>
<B>�ٻ�ͤ͹������� : </B><BR>
<IMG name="view01" SRC="content/knowledgeicon/<?=$arr[knowledge][post_date];?>.jpg" <?echo " WIDTH=\""._IKNOW_W."\" HEIGHT=\""._IKNOW_H."\" ";?> BORDER="0" ><BR>
<input type="file" name="FILE" onpropertychange="view01.src=FILE.value;" style="width=250;"><BR>
�ٻ����� .jpg  .jpeg ��Ҵ <?echo _IKNOW_W." x "._IKNOW_H ;?> Pixels ��ҹ�� (�ҡ�ٻ�˭���������ѵ��ѵ�)
<BR><BR>
<B>������ :</B><BR>

<textarea cols="80" id="message" name="DETAIL" rows="10" ><? echo"$TextContent" ?></textarea>
<script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'message',{			
	filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash' } );

        //]]>
    </script>
<BR>
<INPUT TYPE="checkbox" NAME="ENABLE_COMMENT" VALUE="1" <?if($arr[knowledge][enable_comment]){echo " Checked";};?>> ͹حҵ�����ա���ʴ������Դ���
<BR>
<input type="submit" value=" ��� �Ԩ�����ç��Һ�� " name="submit"> <input type="reset" value=" ���� " name="reset">
</FORM>
<BR><BR>
<?
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "news_del" AND $_GET[action] == "multidel"){
	//////////////////////////////////////////// �ó�ź Multi
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		while(list($key, $value) = each ($_POST['list'])){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$res[knowledge] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE." WHERE id='".$value."' ");
			$arr[knowledge] = $db->fetch($res[knowledge]);
			$db->del(TB_KNOWLEDGE," id='".$value."' "); 
			$db->closedb ();
			@unlink("content/knowledgedata/".$arr[knowledge][post_date].".txt");
			@unlink("content/knowledgeicon/".$arr[knowledge][post_date].".jpg");
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź�Ԩ�����ç��Һ�����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=knowledge\"><B>��Ѻ˹�� �Ѵ��áԨ�����ç��Һ��</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//�ó�����ҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "news_del"){
	//////////////////////////////////////////// �ó�ź Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->del(TB_KNOWLEDGE," id='".$_GET[id]."' "); 
		$db->closedb ();
		@unlink("content/knowledgedata/".$_GET[prefix].".txt");
		@unlink("content/knowledgeicon/".$_GET[prefix].".jpg");
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ��ź�Ԩ�����ç��Һ�����º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=knowledge\"><B>��Ѻ˹�� �Ѵ��áԨ�����ç��Һ��</B></A>";
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