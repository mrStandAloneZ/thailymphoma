<?php

if(isset($_POST['delete'])) {
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

mysql_select_db($db) ;
$member_id=$_POST['member_id'];

$sql = "delete from ".TB_MEMBER." where member_id='$member_id'" ;
$result = mysql_query($sql) ;
?>

<table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
      <TR>
        <TD><B><IMG SRC="images/icon/plus.gif" BORDER="0" ALIGN="absmiddle"> <A HREF="?name=admin&file=main">หน้าหลักผู้ดูแลระบบ</A> &nbsp;&nbsp;<IMG SRC="images/icon/arrow_wap.gif" BORDER="0" ALIGN="absmiddle">&nbsp;&nbsp; <a href="?name=admin&file=member">ระบบสมาชิก</a> &nbsp;&nbsp;<IMG SRC="images/icon/arrow_wap.gif" BORDER="0" ALIGN="absmiddle">&nbsp;&nbsp; <a href="?name=admin&file=member&file=member_mail">ส่งเมลถึงสมาชิก</a></B> <BR>
            <BR>
            <?php
if($result) {

echo "<center><font size='3' face='MS Sans Serif'>ระบบได้ลบสมาชิกหมายเลข $member_id ออกจากระบบเรียบร้อยแล้วครับ" ;
echo "<br><br>กรุณารอซักครู่ ระบบกำลังจะพาคุณกลับสู่หน้าหลัก</font></center>" ;
echo "<meta http-equiv='refresh' content='2;url=?name=admin&file=member'>" ;
//exit() ;
}
else {
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>ไม่สามารถทำรายการดังกล่าวได้</b></font><br><br>
<input type='button' value='กลับไปลองใหม่' onclick='history.back();'></center>" ;
	showerror($showmsg);
}

?>        </TD>
      </TR>
    </TABLE></td>
  </tr>
</table>
<?php } ?>