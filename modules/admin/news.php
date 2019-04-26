<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
					<h1>ข่าวสาร / ประชาสัมพันธ์  </h1>
                    <A HREF="?name=admin&file=news"><IMG SRC="images/admin/open.gif"  BORDER="0" align="absmiddle"> รายการข่าวสาร</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=news&op=news_add"><IMG SRC="images/admin/book.gif"  BORDER="0" align="absmiddle"> เพิ่มข่าวสาร</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=news_category"><IMG SRC="images/admin/folders.gif"  BORDER="0" align="absmiddle"> รายการหมวดหมู่</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=news_category&op=newscat_add"><IMG SRC="images/admin/opendir.gif"  BORDER="0" align="absmiddle"> เพิ่มหมวดหมู่</A><BR><BR>
<?
//////////////////////////////////////////// แสดงรายการข่าวสาร / ประชาสัมพันธ์ 
if($_GET[op] == ""){
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$limit = 20 ;
	$SUMPAGE = $db->num_rows(TB_NEWS,"id","");
	$page=$_GET[page];
	if (empty($page)){
		$page=1;
	}
	$rt = $SUMPAGE%$limit ;
	$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
	$goto = ($page-1)*$limit ;
?>
 <form action="?name=admin&file=news&op=news_del&action=multidel" name="myform" method="post">
 <table width="100%" cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td width="44"><CENTER><font color="#FFFFFF"><B>Option</B></font></CENTER></td>
   <td><font color="#FFFFFF"><B>หัวข้อข่าว</B></font></td>
   <td width="100"><CENTER><font color="#FFFFFF"><B>ลงประกาศ</B></font></CENTER></td>
   <td width="40"><CENTER><font color="#FFFFFF"><B>หมวด</B></font></CENTER></td>
   <td width="40"><CENTER><font color="#FFFFFF"><B>Check</B></font></CENTER></td>
  </tr>  
<?
$res[news] = $db->select_query("SELECT * FROM ".TB_NEWS." ORDER BY id DESC LIMIT $goto, $limit ");
while($arr[news] = $db->fetch($res[news])){
	$res[category] = $db->select_query("SELECT * FROM ".TB_NEWS_CAT." WHERE id='".$arr[news][category]."' ");
	$arr[category] = $db->fetch($res[category]);
	//Comment Icon
	if($arr[news][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
?>
    <tr>
     <td width="44">
      <a href="?name=admin&file=news&op=news_edit&id=<? echo $arr[news][id];?>"><img src="images/admin/edit.gif" border="0" alt="แก้ไข" ></a> 
      <a href="javascript:Confirm('?name=admin&file=news&op=news_del&id=<? echo $arr[news][id];?>&prefix=<? echo $arr[news][post_date];?>','คุณมั่นใจในการลบหัวข้อนี้ ?');"><img src="images/admin/trash.gif"  border="0" alt="ลบ" ></a>
     </td> 
     <td><A HREF="?name=news&file=readnews&id=<?echo $arr[news][id];?>" target="_blank"><?echo $arr[news][topic];?></A><?=$CommentIcon;?></td>
     <td ><CENTER><?echo ThaiTimeConvert($arr[news][post_date],'','');?></CENTER></td>
     <td align="center">
	 <?if($arr[category][category_name]){ //หากมีหมวดแสดงรูป ?>
	 <A HREF="#"><IMG SRC="images/admin/folders.gif"  BORDER="0" align="absmiddle" alt="<?echo $arr[category][category_name];?>" onMouseOver="MM_displayStatusMsg('<?echo $arr[category][category_name];?>');return document.MM_returnValue"></A>
	 <? } ?>
	 </td>
     <td valign="top" align="center" width="40"><input type="checkbox" name="list[]" value="<? echo $arr[news][id];?>"></td>
    </tr>
<?
 } 
?>
 </table>
 <div align="right">
 <input type="button" name="CheckAll" value="Check All" onclick="checkAll(document.myform)" >
 <input type="button" name="UnCheckAll" value="Uncheck All" onclick="uncheckAll(document.myform)" >
 <input type="hidden" name="ACTION" value="news_del">
 <input type="submit" value="Delete" onclick="return delConfirm(document.myform)">
 </div>
 </form><BR><BR>
<?
	SplitPage($page,$totalpage,"?name=admin&file=news");
	echo $ShowSumPages ;
	echo "<BR>";
	echo $ShowPages ;
}
else if($_GET[op] == "news_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// กรณีเพิ่ม Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//require("includes/class.resizepic.php");
		$FILE = $_FILES['FILE'];
		if (!$_POST[CATEGORY] OR !$_POST[TOPIC] ){
			echo "<script language='javascript'>" ;
			echo "alert('กรุณากรอกข้อมูลต่างๆให้ครบถ้วน')" ;
			echo "</script>" ;
			echo "<script language='javascript'>javascript:history.back()</script>";
			exit();
		}else{
			@copy ($FILE['tmp_name'] , "content/newsicon/".TIMESTAMP.".jpg" );
			$original_image = "content/newsicon/".TIMESTAMP.".jpg" ;
			$desired_width = _INEWS_W ;
			$desired_height =_INEWS_H ;
//			$image = new hft_image($original_image);
//			$image->resize($desired_width, $desired_height, '0');
//			$image->output_resized("content/newsicon/".TIMESTAMP.".jpg", "JPG");
		}
		//ทำการเพิ่มข้อมูลลงดาต้าเบส
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_NEWS,array(
			"category"=>"$_POST[CATEGORY]",
			"topic"=>"".addslashes(htmlspecialchars($_POST[TOPIC]))."",
			"posted"=>"$_SESSION[admin_user]",
			"post_date"=>"".TIMESTAMP."",
			"update_date"=>"".TIMESTAMP."",
			"enable_comment"=>"$_POST[ENABLE_COMMENT]"
		));
		$db->closedb ();

		//ทำการสร้างไฟล์ text ของข่าวสาร
		$Filename = TIMESTAMP.".txt";
		$txt_name = "content/newsdata/".$Filename."";
		$txt_open = @fopen("$txt_name", "w");
		@fwrite($txt_open, "".$_POST[DETAIL]."");
		@fclose($txt_open);

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการเพิ่มข่าวสาร / ประชาสัมพันธ์   เข้าสู่ระบบเรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news\"><B>กลับหน้า จัดการข่าวสาร / ประชาสัมพันธ์ </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//กรณีไม่ผ่าน
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "news_add"){
	//////////////////////////////////////////// กรณีเพิ่ม Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=news&op=news_add&action=add" enctype="multipart/form-data">
<B>หัวข้อ :</B><BR>
<INPUT TYPE="text" NAME="TOPIC" size="50">
<BR><BR>
<B>หมวดหมู่ :</B><BR>
<SELECT NAME="CATEGORY">
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM ".TB_NEWS_CAT." ORDER BY sort ");
while ($arr[category] = $db->fetch($res[category])){
	   echo "<option value=\"".$arr[category][id]."\"";
	   echo ">".$arr[category][category_name]."</option>";
}
$db->closedb ();
?>
</SELECT>
<BR><BR>
<B>เนื้อหา :</B><BR>
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
<input type="submit" value=" เพิ่ม ข่าวสาร / ประชาสัมพันธ์ " name="submit"> <input type="reset" value=" เคลีย " name="reset">
</FORM>
<BR><BR>
<?
	}else{
		//กรณีไม่ผ่าน
		echo  $PermissionFalse ;
	}
}
else if($_GET[op] == "news_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// กรณีแก้ไข Database Edit
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//ดึงค่า
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[news] = $db->select_query("SELECT * FROM ".TB_NEWS." WHERE id='".$_GET[id]."' ");
		$arr[news] = $db->fetch($res[news]);
		$db->closedb ();
		//require("includes/class.resizepic.php");
		$FILE = $_FILES['FILE'];
		if (!$_POST[CATEGORY] OR !$_POST[TOPIC]){
			echo "<script language='javascript'>" ;
			echo "alert('กรุณากรอกข้อมูลต่างๆให้ครบถ้วน')" ;
			echo "</script>" ;
			echo "<script language='javascript'>javascript:history.back()</script>";
			exit();
		}else{
			@copy ($FILE['tmp_name'] , "content/newsicon/".$arr[news][post_date].".jpg" );
			$original_image = "content/newsicon/".$arr[news][post_date].".jpg" ;
			$desired_width = _INEWS_W ;
			$desired_height = _INEWS_H ;
//			$image = new hft_image($original_image);
//			$image->resize($desired_width, $desired_height, '0');
//			$image->output_resized("content/newsicon/".$arr[news][post_date].".jpg", "JPG");
		}
		//ทำการแก้ไขข้อมูลลงดาต้าเบส
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->update_db(TB_NEWS,array(
			"category"=>"$_POST[CATEGORY]",
			"topic"=>"".addslashes(htmlspecialchars($_POST[TOPIC]))."",
			"posted"=>"$_SESSION[admin_user]",
			"enable_comment"=>"$_POST[ENABLE_COMMENT]"
		)," id=$_GET[id] ");
		$db->closedb ();

		//ทำการสร้างไฟล์ text ของข่าวสาร
		$Filename = $arr[news][post_date].".txt";
		$txt_name = "content/newsdata/".$Filename."";
		$txt_open = @fopen("$txt_name", "w");
		@fwrite($txt_open, "".$_POST[DETAIL]."");
		@fclose($txt_open);

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการแก้ไขข่าวสาร / ประชาสัมพันธ์   เข้าสู่ระบบเรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news\"><B>กลับหน้า จัดการข่าวสาร / ประชาสัมพันธ์ </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//กรณีไม่ผ่าน
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "news_edit"){
	//////////////////////////////////////////// กรณีแก้ไข Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//ดึงค่า
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[news] = $db->select_query("SELECT * FROM ".TB_NEWS." WHERE id='".$_GET[id]."' ");
		$arr[news] = $db->fetch($res[news]);
		$db->closedb ();

		//อ่านค่าจากไฟล์ Text เพื่อแก้ไข
		$FileNewsTopic = "content/newsdata/".$arr[news][post_date].".txt";
		$file_open = @fopen($FileNewsTopic, "r");
		$TextContent = @fread ($file_open, @filesize($FileNewsTopic));
		@fclose ($file_open);
		$TextContent = stripslashes($TextContent);
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=news&op=news_edit&action=edit&id=<?=$_GET[id];?>" enctype="multipart/form-data">
<B>หัวข้อ :</B><BR>
<INPUT TYPE="text" NAME="TOPIC" size="50" value="<?=$arr[news][topic];?>">
<BR><BR>
<B>หมวดหมู่ :</B><BR>
<SELECT NAME="CATEGORY">
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM ".TB_NEWS_CAT." ORDER BY sort ");
while ($arr[category] = $db->fetch($res[category])){
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $arr[news][category]){echo " Selected";}
	   echo ">".$arr[category][category_name]."</option>";
}
$db->closedb ();
?>
</SELECT>
<BR><BR>
<B>เนื้อหา :</B><BR>
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
<INPUT TYPE="checkbox" NAME="ENABLE_COMMENT" VALUE="1" <?if($arr[news][enable_comment]){echo " Checked";};?>> อนุญาติให้มีการแสดงความคิดเห็น
<BR>
<input type="submit" value=" แก้ไข ข่าวสาร / ประชาสัมพันธ์ " name="submit"> <input type="reset" value=" เคลีย " name="reset">
</FORM>
<BR><BR>
<?
	}else{
		//กรณีไม่ผ่าน
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "news_del" AND $_GET[action] == "multidel"){
	//////////////////////////////////////////// กรณีลบ Multi
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		while(list($key, $value) = each ($_POST['list'])){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$res[news] = $db->select_query("SELECT * FROM ".TB_NEWS." WHERE id='".$value."' ");
			$arr[news] = $db->fetch($res[news]);
			$db->del(TB_NEWS," id='".$value."' "); 
			$db->closedb ();
			@unlink("content/newsdata/".$arr[news][post_date].".txt");
			@unlink("content/newsicon/".$arr[news][post_date].".jpg");
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการลบข่าวสาร/ประชาสัมพันธ์เรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news\"><B>กลับหน้า จัดการข่าวสาร/ประชาสัมพันธ์</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//กรณีไม่ผ่าน
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "news_del"){
	//////////////////////////////////////////// กรณีลบ Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$db->del(TB_NEWS," id='".$_GET[id]."' "); 
		$db->closedb ();
		@unlink("content/newsdata/".$_GET[prefix].".txt");
		@unlink("content/newsicon/".$_GET[prefix].".jpg");
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการลบข่าวสาร/ประชาสัมพันธ์เรียบร้อยแล้ว</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=news\"><B>กลับหน้า จัดการข่าวสาร/ประชาสัมพันธ์</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//กรณีไม่ผ่าน
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
?>
						<BR><BR>
					</TD>
				</TR>
			</TABLE>