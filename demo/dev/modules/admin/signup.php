<?
$date_today = date("d-m-Y [H:i:s]");
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<?
	$typemember= $_POST["typemember"];
	
	?>
          <form name ="checkForm" action="admin.php?name=admin&file=member_add_new" method="post" onSubmit="return check()"  enctype="multipart/form-data">
             <table width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
             <tr>
            <td><b><a href="admin.php?name=admin&file=index">HOME</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <b><a href="admin.php?name=admin&file=member">สมาชิกทั้งหมด</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <B><a href="admin.php?name=admin&file=signup">เพิ่มสมาชิก</a></B> </td>
            </tr>
            </TABLE>
            <table width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
          
              <tr>
                <td colspan="2">
                  <p align="center"> <h1>กรุณากรอกรายละเอียดสำหรับเพิ่มสมาชิก</h1></p></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                 <p> <br /><img src="images/admin/user.gif" ></p></td>
                <td bgcolor="#FFFFFF"><font size="+2">ข้อมูลส่วนตัวผู้สมัคร</font></td>
              </tr>
                   <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
              
                <br />  <p> &nbsp;&nbsp;รหัสสมาชิก : </p></td>
                <td bgcolor="#FFFFFF"><input name="member_id"  id="member_id" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
            
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                 <br /> <p> &nbsp;&nbsp;ชื่อ นามสกุล : </p></td>
                <td bgcolor="#FFFFFF"><input name="fullname" type="text" id="fullname" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
                <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
              <br />    <p> &nbsp;&nbsp;เพศ : </p></td>
                <td bgcolor="#FFFFFF"><input name="sex" type="text" id="sex" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
                <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
             <br />     <p> &nbsp;&nbsp;อายุ : </p></td>
                <td bgcolor="#FFFFFF">
                <input name="age" type="text" id="age" size="30">
                <font color="#FF0000">&nbsp;</font></td>
              </tr>
    
              
               <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
             <br />     <p> &nbsp;&nbsp; โรงพยาบาลที่สังกัด : </p></td>
                <td bgcolor="#FFFFFF"><input name="hospital_name" type="text" id="hospital_name" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
          
                
                      <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                <br />  <p> &nbsp;&nbsp;รหัสโรงพยาบาล : </p></td>
                <td bgcolor="#FFFFFF"><input name="codehos" type="text" id="codehos" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
               <br />   <p> &nbsp;&nbsp; ที่อยู่โรงพยาบาล : </p></td>
                <td bgcolor="#FFFFFF"><input name="address_office" type="text" id="address_office" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                  <br /><p> &nbsp;&nbsp;ตำแหน่ง : </p></td>
                <td bgcolor="#FFFFFF"><input name="work" type="text" id="work" size="30"><font color="#FF0000">&nbsp;</font>  
              </td>
              </tr>
          	<tr>
            		     <td width="30%" align="right" bgcolor="#FFFFFF">
                         <BR /><p>เบอร์โทร : </p></td>
                    <td bgcolor="#FFFFFF"><input name="tel_office" type="text" id="tel_office" size="30"><font color="#FF0000">&nbsp;</font> </td>
            </tr>
              <tr>
            		     <td width="30%" align="right" bgcolor="#FFFFFF"><br /><p>มือถือ : </p></td>
                    <td bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" size="30"><font color="#FF0000">&nbsp;</font> </td>
            </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;&nbsp;Login Name : </td>
                <td bgcolor="#FFFFFF">
                  <input name="user_name" type="text" id="user_name" size="20" maxlength="30">
                   <font color="#FF0000">&nbsp;**&nbsp;(ภาษาอังกฤษเท่านั้น) </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;&nbsp;Password : </td>
                <td bgcolor="#FFFFFF">
                  <input name="pwd_name1" type="password" id="pwd_name1" size="20" maxlength="30">
 <font color="#FF0000">&nbsp;** </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">Re-password : </td>
                <td bgcolor="#FFFFFF">
                  <input name="pwd_name2" type="password" id="pwd_name2" size="20" maxlength="30">
 <font color="#FF0000">&nbsp;**</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">Email : </td>
                <td bgcolor="#FFFFFF">
                  <input name="email" type="text" id="email" size="20">
 <font color="#FF0000">&nbsp;**</font></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF"></td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">
                  <input type="submit" name="Submit" value="เพิ่มสมาชิก">
                  <input type="hidden" name="signup" value="date()">
&nbsp;
              <input type="reset" name="Submit2" value=" เคลียร์">
              <input name="ok" type="hidden" id="ok2" value="ok_pass"> </td>
              </tr>
            </table>
</form></td>
      </tr>
    </table>
<? include "modules/index/footer.php"; ?>