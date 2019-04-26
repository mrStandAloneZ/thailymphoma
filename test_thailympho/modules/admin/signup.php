<?
$date_today = date("d-m-Y [H:i:s]");
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>

<style type="text/css">





	select {
    width: 90%;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
        background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; 
}
input {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
textarea{
      width: 100%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #f6f6f6;
 font-size: 15px;
  color:#18222e;
}
</style>
<?
	$typemember= $_POST["typemember"];
	  require_once("includes/member.php");
 // เริ่มติดต่อฐานข้อมูลv
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
	?>
	<br /><br />
          <form name ="checkForm" action="admin.php?name=admin&file=member_add_new" method="post" onSubmit="return check()"  enctype="multipart/form-data">
             
            <table width="100%" align=center cellSpacing=0 cellPadding=0 border=0 style="padding-bottom:0;background-color:#EBEBEB">
          
              <tr>
                <td colspan="2" style="padding-left:35px;">
                  <p align="center"> <h1>กรุณากรอกรายละเอียดสำหรับเพิ่มสมาชิก</h1></p></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
                 <p> <br /><img src="images/admin/user.gif" ></p></td>
                <td bgcolor="#f5f5f5"><font size="+2">ข้อมูลส่วนตัวผู้สมัคร</font></td>
              </tr>
                   <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
              <?php 
			  	$run_id = mysql_query("SELECT member_id FROM  `web_member1`  WHERE id = ( SELECT MAX( id )  FROM web_member1 ) ");
				$sql_max = mysql_fetch_array($run_id);
				 $arid = explode("TSH", $sql_max["member_id"]);
				 $idnum = ($arid[1])*1;
				    if(strlen($idnum)==1){$txtid= "TSH000".($arid[1]+1);}
				    if(strlen($idnum)==2){$txtid= "TSH00".($arid[1]+1); }
				    if(strlen($idnum)==3){$txtid= "TSH0".($arid[1]+1); }
				    if(strlen($idnum)==4){$txtid= "TSH".($arid[1]+1); }
			  ?>
			  
			  <input type="hidden" value="" id="hostpital_engname" name="hostpital_engname" />
                <br />  <p> &nbsp;&nbsp;รหัสสมาชิก : </p></td>
                <td bgcolor="#f5f5f5"><input name="max_id"  id="max_id" size="30" value="<?=$txtid?>" readonly="true" style="background-color:#CCCCCC;">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
            
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
                 <br /> <p> &nbsp;&nbsp;ชื่อ นามสกุล : </p></td>
                <td bgcolor="#f5f5f5"><input name="fullname" type="text" id="fullname" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
                <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
              <br />    <p> &nbsp;&nbsp;เพศ : </p></td>
                <td bgcolor="#f5f5f5"><input name="sex" type="text" id="sex" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
                <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
             <br />     <p> &nbsp;&nbsp;อายุ : </p></td>
                <td bgcolor="#f5f5f5">
                <input name="age" type="text" id="age" size="30">
                <font color="#FF0000">&nbsp;</font></td>
              </tr>
    
              
               <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
				
				<?php
				
						$offItem = mysql_query("SELECT distinct  codehos,hospital_name,hostpital_engname,address_office FROM `web_member1` ");
						
				?>
				
				
				
             <br />     <p> &nbsp;&nbsp; โรงพยาบาลที่สังกัด : </p></td>
                <td bgcolor="#f5f5f5">
				<script>
				  function chdata(){
				    var s_name = document.getElementById("s_name").value;

                    var res = eval(s_name);
					var r1 = res[0];
					var r2 = res[1];
					var r3 = res[2];
					var r4 = res[3];
					
				      document.getElementById("codehos").value = r1;
				      document.getElementById("hospital_name").value = r2;
					  document.getElementById("address_office").value = r3;
					    document.getElementById("hostpital_engname").value = r4;
					  
				  
				  }
				</script>
				<input name="hospital_name" type="text" id="hospital_name" size="30" style="background-color:#eee9e2;">
				&nbsp;เลือกโรงพยาบาล: &nbsp;
				
				<select id="s_name" onchange="chdata()">
				 <option value="['','','','']">---เลือก---</option>
				<?php 
				   while ($resultItem = mysql_fetch_array($offItem)) {
				 ?>
				
				     <option value="['<?=$resultItem["codehos"]?>','<?=$resultItem["hospital_name"]?>','<?=$resultItem["address_office"]?>','<?=$resultItem["hostpital_engname"]?>'];"><?=$resultItem["hospital_name"]?>&nbsp;:&nbsp;<?=$resultItem["hostpital_engname"]?></option>
				<?php } ?>
				</select>
<font color="#FF0000">&nbsp;</font></td>
              </tr>
          
                
                      <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
                <br />  <p> &nbsp;&nbsp;รหัสโรงพยาบาล : </p></td>
                <td bgcolor="#f5f5f5"><input name="codehos" type="text" id="codehos" size="30" style="background-color:#eee9e2;">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
               <br />   <p> &nbsp;&nbsp; ที่อยู่โรงพยาบาล : </p></td>
                <td bgcolor="#f5f5f5"><input name="address_office" type="text" id="address_office" size="30" style="background-color:#eee9e2;">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">
                  <br /><p> &nbsp;&nbsp;ตำแหน่ง : </p></td>
                <td bgcolor="#f5f5f5"><input name="work" type="text" id="work" size="30"><font color="#FF0000">&nbsp;</font>  
              </td>
              </tr>
          	<tr>
            		     <td width="30%" align="right" bgcolor="#f5f5f5">
                         <BR /><p>เบอร์โทร : </p></td>
                    <td bgcolor="#f5f5f5"><input name="tel_office" type="text" id="tel_office" size="30"><font color="#FF0000">&nbsp;</font> </td>
            </tr>
              <tr>
            		     <td width="30%" align="right" bgcolor="#f5f5f5"><br /><p>มือถือ : </p></td>
                    <td bgcolor="#f5f5f5"><input name="tel" type="text" id="tel" size="30"><font color="#FF0000">&nbsp;</font> </td>
            </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">&nbsp;&nbsp;Login Name : </td>
                <td bgcolor="#f5f5f5">
                  <input name="user_name" type="text" id="user_name" size="20" maxlength="30">
                   <font color="#FF0000">&nbsp;**&nbsp;(ภาษาอังกฤษเท่านั้น) </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">&nbsp;&nbsp;Password : </td>
                <td bgcolor="#f5f5f5">
                  <input name="pwd_name1" type="password" id="pwd_name1" size="20" maxlength="30">
 <font color="#FF0000">&nbsp;** </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">Re-password : </td>
                <td bgcolor="#f5f5f5">
                  <input name="pwd_name2" type="password" id="pwd_name2" size="20" maxlength="30">
 <font color="#FF0000">&nbsp;**</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">Email : </td>
                <td bgcolor="#f5f5f5">
                  <input name="email" type="text" id="email" size="20">
 <font color="#FF0000">&nbsp;**</font></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f5f5f5"></td>
                <td bgcolor="#f5f5f5">&nbsp;</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">&nbsp;</td>
                <td bgcolor="#f5f5f5">&nbsp;</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#f5f5f5">&nbsp;</td>
                <td bgcolor="#f5f5f5" style="padding-bottom:35px;">
                  <input type="submit" name="Submit" value="เพิ่มสมาชิก" style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;">
                  <input type="hidden" name="signup" value="date()">
&nbsp;
              <input type="reset" name="Submit2" value=" เคลียร์" style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;">
              <input name="ok" type="hidden" id="ok2" value="ok_pass">
			  
			
			   </td>
              </tr>
			  <tr><td colspan="2">
			  
			    <? include "modules/index/footer.php"; ?>
			  </td></tr>
            </table>
</form>


</td>
      </tr>
    </table>
