<? include "modules/index/header.php" ; ?>
<div id="center">
				<p>
<?php
session_start() ;
if(!session_is_registered("login_true")){
echo "<meta http-equiv='refresh' content='0; url =index.php?name=member&file=change_password'>" ;
exit() ;
}
$ok=$_POST['ok'];
if(isset($ok) and session_is_registered("status")){
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$old_pwd=$_POST['old_pwd'];
$new_pwd1=$_POST['new_pwd1'];
$new_pwd2=$_POST['new_pwd2'];

$sql = "select * from ".TB_MEMBER." where user='$login_true' and password='$old_pwd'" ;
$result = mysql_query($sql) ;
$row = mysql_num_rows($result) ;
if($row<=0){
$status = "" ;
echo "<center><strong>รหัสผ่านไม่ถูกต้องครับ</strong></center><meta http-equiv='refresh' content='2'>" ;
session_unregister("status") ;

}
else {
if($new_pwd1==$new_pwd2){
$sql = "update ".TB_MEMBER." set  password='$new_pwd1' where user = '$login_true'" ;
$result = mysql_query($sql) or die("ERR PROGRAME") ;
if($result){
$status = "";
echo "<center><img align='texttop' src='images/login-redirection-loader.gif' alt='login-redirection-loader' /><strong>เปลี่ยนรหัสผ่านเรียบร้อยแล้ว</strong></center><meta http-equiv='refresh' content='2; url =index.php'>" ;
}
}
else{
$status = "<center><font face='MS Sans Serif' size='3' color='red'><b>กรุณายืนยันรหัสผ่านใหม่ให้ถูกต้องด้วยครับ</b></center>";
echo "<meta http-equiv='refresh' content='2'>" ;

}
}
}
else {
$status = NULL ;
session_register("status") ;
}
?><br />
		<h1>แก้ไขรหัสผ่าน</h1>
        <form action="" method="post" name="checkForm" onSubmit="return check()">
          <table width="100%" border="0" align="center">
            <tr>
              <th align="left" width="10%"><strong>รหัสผ่านเดิม</strong></th>
              <td width="25%">
                <input type="password" name="old_pwd">
              </td>
            </tr>
            <tr>
              <th align="left" width="10%"><strong>รหัสผ่านใหม่</strong></th>
              <td width="25%">
                <input type="password" name="new_pwd1">
              </td>
            </tr>
            <tr>
              <th align="left" width="10%"><strong>ยืนยันรหัสผ่านใหม่</strong></th>
              <td width="25%">
                <input type="password" name="new_pwd2">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" name="Submit" class="submit" value=" ยืนยัน ">
&nbsp;
              <input type="reset" name="Submit2" class="submit" value=" ยกเลิก ">
              <input name="ok" type="hidden" id="ok" value="ok">
              </td>
            </tr>
          </table>
      </form>
 </p>
                </div>

			<div class="x"></div>
			<div class="break"></div>

		</div>
		<? include "modules/index/footer.php"; ?>