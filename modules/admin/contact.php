<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
    <TR>
        <TD>
        <h1>สมาชิกที่ติดต่อผู้ดูแลระบบ</h1>
<?
//แสดงบทความ
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[mails] = $db->select_query("SELECT * FROM ".TB_MAIL." ORDER BY id DESC ");
while($arr[mails] = $db->fetch($res[mails])){
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#CCCCCC">
    <td colspan="6">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><font color="#000000" size="2"><strong>เลขที่ e-mail <?=$arr[mails][id];?>&nbsp;&nbsp;เวลา &nbsp;<?=$arr[mails][signup];?> </strong></font></td>
          <td></td>
        </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="6"><font size="2"> <strong>หัวข้อ&nbsp;: </strong>&nbsp;<?=$arr[mails][subject];?>&nbsp;&nbsp;&nbsp;</font></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    
  </tr>
    <tr bgcolor="#FFFFFF">
    <td colspan="6"><font size="2"> <strong>ข้อความ&nbsp;: </strong>&nbsp;<?=$arr[mails][detail];?>&nbsp;&nbsp;&nbsp;</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="6"><font size="2"> <strong>ชื่อ&nbsp;: </strong>&nbsp;<?=$arr[mails][name];?>&nbsp;&nbsp;&nbsp;</font></td>
  </tr>
</table>
<?
}
$db->closedb ();
//จบการแสดงอีเมล
?>
        </TD>
    </TR>
</TABLE>