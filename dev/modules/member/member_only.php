<?
session_start() ;
if(!session_is_registered("login_true")) {
echo "<meta http-equiv=refresh content=2;URL=?name=member>" ; 
//ระบบสมาชิกเสริม maxsite 1.10 พัฒนาโดย www.narongrit.net

?>
<html>
<body>
<table width="720"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="32" rowspan="2" valign="top"><IMG src="images/fader.gif" border=0></td>
    <td width="768"><h2><IMG src="images/topfader.gif" border=0><br>
&nbsp;&nbsp;<IMG SRC="images/menu/textmenu_member.gif" BORDER="0"></h2></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <TR>
        <TD height="1" class="dotline"></TD>
      </TR>
      <tr>
        <td> </td>
      </tr>
      <tr>
        <td><div align="center">
            <p>&nbsp;</p>
            <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ขออภัยครับ</b></font> </p>
            <p><img src="images/icon/dangerous.png" width="48" height="42"> </p>
          </div>
            <p align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ในส่วนนี้ต้องเป็นสมาชิกก่อนครับจึงจะใช้ได้</font>
            <p align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รอสักครู่ระบบจะนำท่านไปยังหน้าลงทะเบียน.....</font>
            <p align="center">
            <p align="center">
            <p align="center">
            <p align="center">
          <p align="center"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<? 
exit();	
} ?>