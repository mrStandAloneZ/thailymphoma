
<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
					&nbsp;&nbsp;<h1>เพิ่มรายการปฏิทินใหม่</h1>
<form NAME="addevent" METHOD=POST ACTION="admin.php?name=admin&file=addevent_view">
<br>
&nbsp;&nbsp;&nbsp;<b>เลือกวันที่ :</b><BR>
&nbsp;&nbsp;&nbsp;<input name="EventDate" id="EventDate" readonly> <IMG SRC="images/admin/dateselect.gif" BORDER="0" ALT="เลือกวันที่" onclick="displayDatePicker('EventDate', false, 'ymd', '-');" align="absmiddle"> 
<BR><BR>
&nbsp;&nbsp;&nbsp;<b>รายละเอียด :</b><BR>

 <table cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td align="center" width="250px"><font color="#FFFFFF"><B>หัวข้อเวร</B></font></td>
   <td align="center" width="auto"><font color="#FFFFFF"><B>รายชื่อ</B></font></td>
  </tr>
       <?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[membercatid] = $db->select_query("SELECT * FROM ".TB_MEMBER_CAT." ORDER BY sort ");
while ($arr[membercatid] = $db->fetch($res[membercatid])){
	?>
    <tr>
     <td bgcolor="#f6f6f6" align="center"><h1><?=$arr[membercatid][category_name];?></h1></td>
     <td width="300px" bgcolor="#f6f6f6">
<select name="listitem<?=$arr[membercatid][id];?>[]" size="8" multiple="multiple">
	<option value="" selected="selected" ><strong>กรุณาเลือกชื่อ</strong></option>
    <?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[member] = $db->select_query("SELECT * FROM ".TB_MEMBER." ORDER BY id ");
while ($arr[member] = $db->fetch($res[member])){
	?>
	<option value="<?=$arr[member][name] ?>" ><?=$arr[member][name] ?></option>
<? } ?>
</select>
      </td>
    </tr>
<? }  $db->closedb (); ?>
<tr><td colspan="2" align="center"><input type="submit" value=" เพิ่มรายการในปฏิทิน " name="submit">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value=" เคลีย " name="reset"></td></tr>
 </table>
<script language='JavaScript'>
function check() {
	if(document.addevent.EventDate.value=='') {
	alert('กรุณากรอกวันที่ของตารางด้วยครับ') ;
	document.addevent.EventDate.focus() ;
	return false ;
	}
	else
	return true ;
	}
  </script>
</form>
