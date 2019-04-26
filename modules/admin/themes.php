<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
&nbsp;&nbsp; <h1>แก้ไขหน้าตาโปรแกรม</h1>
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_THEME." where id='1' ") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
?>
<form name="form1" method="post" action="admin.php?name=admin&file=themes_edit">
<table cellspacing="2" cellpadding="1" >
  <tr bgcolor="#799fff" height=25>
   <td align="center" width="auto"><font color="#FFFFFF"><B>ตัวเลือกใช้งาน</B></font></td>
  </tr>
    <tr>
     <td width="300px" bgcolor="#f6f6f6" align="center">
       <h1>
         <input name="name_theme" type="radio" value="main.css" <?php if($dbarr['name_theme']=="main.css") { echo "checked" ;}  ?>> main.css
         </h1>
      </td>
    </tr>
    <tr>
     <td width="300px" bgcolor="#f6f6f6" align="center">
       <h1>
         <input name="name_theme" type="radio" value="red.css" <?php if($dbarr['name_theme']=="red.css") { echo "checked" ;}  ?>>
         red.css
      </h1></td>
    </tr>
    <tr>
     <td width="300px" bgcolor="#f6f6f6" align="center">
       <h1>
         <input name="name_theme" type="radio" value="blue.css" <?php if($dbarr['name_theme']=="blue.css") { echo "checked" ;}  ?>>
         blue.css
      </h1></td>
    </tr>
<tr><td colspan="2" align="center"><input type="submit" value=" แก้ไขธีม " name="submit"></td></tr>
 </table>
</form>