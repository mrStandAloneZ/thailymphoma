<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);

if($_GET[op] == "calendar_add"){
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		if (!$_POST[EventDate]){
			echo "<BR><BR>";
			echo "<CENTER><IMG SRC=\"images/icon/dangerous.png\" BORDER=\"0\"><BR><BR><B>กรุณากรอกวันที่ด้วยครับ ?</B>";
			echo "<form NAME=\"myform\" METHOD=POST ACTION=\"admin.php?name=admin&file=addevent\">";
			echo "<br><br><br>";
			echo "<BR><BR><INPUT TYPE=\"submit\" VALUE=\" กลับไปเขียนใหม่ \">";
			echo "<br><br><br><br><br><br><br>";
			echo "</form></CENTER>";
			exit();
		}
		if($cat1==$cat2 || $cat1==$cat3 || $cat1==$cat4 || $cat1==$cat5) {
		echo "<script language='javascript'>" ;
		echo "alert('ข้อมูลของท่านซ้ำกัน !')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-2)</script>";
		exit();
		}
		if($cat2==$cat1 || $cat2==$cat3 || $cat2==$cat4 || $cat2==$cat5) {
		echo "<script language='javascript'>" ;
		echo "alert('ข้อมูลของท่านซ้ำกัน !')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-2)</script>";
		exit();
		}
		
		if($cat3==$cat1 || $cat3==$cat2 || $cat3==$cat4 || $cat3==$cat5) {
				echo "<script language='javascript'>" ;
				echo "alert('ข้อมูลของท่านซ้ำกัน !')" ;
				echo "</script>" ;
				echo "<script language='javascript'>javascript:history.go(-2)</script>";
				exit();
		}
		
		if($cat4==$cat1 || $cat4==$cat2 || $cat4==$cat3 || $cat4==$cat5) {
				echo "<script language='javascript'>" ;
				echo "alert('ข้อมูลของท่านซ้ำกัน !')" ;
				echo "</script>" ;
				echo "<script language='javascript'>javascript:history.go(-2)</script>";
				exit();
		}

		if($cat5==$cat1 || $cat5==$cat2 || $cat5==$cat3 || $cat5==$cat4) {
				echo "<script language='javascript'>" ;
				echo "alert('ข้อมูลของท่านซ้ำกัน !')" ;
				echo "</script>" ;
				echo "<script language='javascript'>javascript:history.go(-2)</script>";
				exit();
		}
		if(!$_GET[confirm]){
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$CKdate = $db->num_rows(TB_CALENDAR,"id"," date_event = '$_POST[EventDate]' ");
			if($CKdate){
				$ProcessOutput .= "<BR><BR>";
				$ProcessOutput .= "<CENTER><IMG SRC=\"images/icon/dangerous.png\" BORDER=\"0\"><BR><BR><B>วันที่ ".$_POST[EventDate]." ได้มีข้อมูลอยู่แล้วในระบบ ท่านต้องการบันทึกทับใช่หรือไม่ ?</B>";
				$ProcessOutput .= "<form NAME=\"myform\" METHOD=POST ACTION=\"admin.php?name=admin&file=addevent_view&op=calendar_add&confirm=1\">";
				$ProcessOutput .= "<INPUT TYPE=\"hidden\" NAME=\"EventDate\" value=\"".$_POST[EventDate]."\">";
				$ProcessOutput .= "<INPUT TYPE=\"hidden\" NAME=\"cat1\" value=\"".$_POST[cat1]."\">";
				$ProcessOutput .= "<INPUT TYPE=\"hidden\" NAME=\"cat2\" value=\"".$_POST[cat2]."\">";
				$ProcessOutput .= "<INPUT TYPE=\"hidden\" NAME=\"cat3\" value=\"".$_POST[cat3]."\">";
				$ProcessOutput .= "<INPUT TYPE=\"hidden\" NAME=\"cat4\" value=\"".$_POST[cat4]."\">";
				$ProcessOutput .= "<INPUT TYPE=\"hidden\" NAME=\"cat5\" value=\"".$_POST[cat5]."\">";
				$ProcessOutput .= "<BR><BR><INPUT TYPE=\"submit\" VALUE=\" ต้องการบันทึกทับ \"><INPUT TYPE=\"button\" VALUE=\" กลับไปเขียนใหม่ \" onclick=\"window.location='admin.php?name=admin&file=addevent'\">";
				$ProcessOutput .= "</form></CENTER>";
			}else{
				$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
				$db->add_db(TB_CALENDAR,array(
					"date_event"=>"$_POST[EventDate]",
					"cat1"=>"".addslashes(htmlspecialchars($_POST[cat1]))."",
					"cat2"=>"".addslashes(htmlspecialchars($_POST[cat2]))."",
					"cat3"=>"".addslashes(htmlspecialchars($_POST[cat3]))."",
					"cat4"=>"".addslashes(htmlspecialchars($_POST[cat4]))."",
					"cat5"=>"".addslashes(htmlspecialchars($_POST[cat5]))."",
					"signup"=>"".TIMESTAMP.""
				));
				//Add data
				$ProcessOutput .= "<BR><BR>";
				$ProcessOutput .= "<CENTER><A HREF=\"admin.php?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
				$ProcessOutput .= "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?name=admin&file=main\">";
				$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการเพิ่ม รายการปฏิทิน เรียบร้อยแล้ว</B></FONT>";
				$ProcessOutput .= "</CENTER>";
				$ProcessOutput .= "<BR><BR>";
			}
		}else{
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$db->update_db(TB_CALENDAR,array(
				"cat1"=>"".addcslashes(htmlspecialchars($_POST[cat1]), ENT_QUOTES)."",
				"cat2"=>"".addcslashes(htmlspecialchars($_POST[cat2]), ENT_QUOTES)."",
				"cat3"=>"".addcslashes(htmlspecialchars($_POST[cat3]), ENT_QUOTES)."",
				"cat4"=>"".addcslashes(htmlspecialchars($_POST[cat4]), ENT_QUOTES)."",
				"cat5"=>"".addcslashes(htmlspecialchars($_POST[cat5]), ENT_QUOTES)."",
				"signup"=>"".TIMESTAMP.""
			)," date_event='".$_POST[EventDate]."' ");
			//Edit data
			$ProcessOutput .= "<BR><BR>";
			$ProcessOutput .= "<CENTER><A HREF=\"admin.php?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
			$ProcessOutput .= "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?name=admin&file=main\">";
			$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>ได้ทำการแก้ไข รายการปฏิทิน เรียบร้อยแล้ว</B></FONT>";
			$ProcessOutput .= "</CENTER>";
			$ProcessOutput .= "<BR><BR>";
		}
	}else{
		$ProcessOutput = $PermissionFalse ;
	}
}

?>
<div id="center_admin">
&nbsp;&nbsp;<h1>เพิ่มรายการปฏิทินใหม่</h1>
<?
if(!$ProcessOutput){
?>
<form NAME="addevent_view" METHOD=POST ACTION="admin.php?name=admin&file=addevent_view&op=calendar_add">
<br>
&nbsp;&nbsp;&nbsp;<b>วันที่ :</b><BR>
&nbsp;&nbsp;&nbsp;<input name="EventDate" readonly value="<? echo"$EventDate"; ?>"> 
<BR><BR>
&nbsp;&nbsp;&nbsp;<b>รายละเอียด :</b><BR>

 <table cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td align="center" width="250px"><font color="#FFFFFF"><B>หัวข้อ</B></font></td>
   <td align="center" width="auto"><font color="#FFFFFF"><B>ลงประกาศ</B></font></td>
  </tr>
  <?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[membercatid] = $db->select_query("SELECT * FROM ".TB_MEMBER_CAT." WHERE id = 1 ");
while ($arr[membercatid] = $db->fetch($res[membercatid])){
	?>
  <tr>
  	<td align="center" width="250px" bgcolor="#f6f6f6"><h1><?=$arr[membercatid][category_name];?></h1></td>
    <td align="center" width="auto" bgcolor="#f6f6f6"><textarea name="cat1" readonly="readonly" cols="" rows="">
<?php
	foreach ($_POST["listitem1"] as $eachItem) {
	print "$eachItem\n";
	}
?>
</textarea></td>
  </tr>
<? }  $db->closedb (); ?>
  <?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[membercatid] = $db->select_query("SELECT * FROM ".TB_MEMBER_CAT." WHERE id = 2 ");
while ($arr[membercatid] = $db->fetch($res[membercatid])){
	?>
  <tr>
  	<td align="center" width="250px" bgcolor="#f6f6f6"><h1><?=$arr[membercatid][category_name];?></h1></td>
    <td align="center" width="auto" bgcolor="#f6f6f6"><textarea name="cat2" readonly="readonly" cols="" rows="">
<?php
	foreach ($_POST["listitem2"] as $eachItem) {
	print "$eachItem\n";
	}
?>
</textarea></td>
  </tr>
<? }  $db->closedb (); ?>
  <?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[membercatid] = $db->select_query("SELECT * FROM ".TB_MEMBER_CAT." WHERE id = 3 ");
while ($arr[membercatid] = $db->fetch($res[membercatid])){
	?>
  <tr>
  	<td align="center" width="250px" bgcolor="#f6f6f6"><h1><?=$arr[membercatid][category_name];?></h1></td>
    <td align="center" width="auto" bgcolor="#f6f6f6"><textarea name="cat3" readonly="readonly" cols="" rows="">
<?php
	foreach ($_POST["listitem3"] as $eachItem) {
	print "$eachItem\n";
	}
?>
</textarea></td>
  </tr>
<? }  $db->closedb (); ?>
  <?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[membercatid] = $db->select_query("SELECT * FROM ".TB_MEMBER_CAT." WHERE id = 4 ");
while ($arr[membercatid] = $db->fetch($res[membercatid])){
	?>
  <tr>
  	<td align="center" width="250px" bgcolor="#f6f6f6"><h1><?=$arr[membercatid][category_name];?></h1></td>
    <td align="center" width="auto" bgcolor="#f6f6f6"><textarea name="cat4" readonly="readonly" cols="" rows="">
<?php
	foreach ($_POST["listitem4"] as $eachItem) {
	print "$eachItem\n";
	}
?>
</textarea></td>
  </tr>
  <? }  $db->closedb (); ?>
       <?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[membercatid] = $db->select_query("SELECT * FROM ".TB_MEMBER_CAT." WHERE id = 5 ");
while ($arr[membercatid] = $db->fetch($res[membercatid])){
	?>
    <tr>
     <td align="center" bgcolor="#f6f6f6"><h1><?=$arr[membercatid][category_name];?></h1></td>
     <td width="300px" bgcolor="#f6f6f6" align="center">
     <textarea name="cat5" readonly="readonly" cols="" rows="">
<?php
	foreach ($_POST["listitem5"] as $eachItem) {
	print "$eachItem\n";
	}
?>
</textarea>
      </td>
    </tr>
<? }  $db->closedb (); ?>
<tr><td colspan="2" align="center"><input type="submit" value=" เพิ่มรายการ" name="submit">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value=" เคลีย " name="reset"></td></tr>
 </table>

</form>
<?
}else{
	echo $ProcessOutput ;
}
?>
</div>