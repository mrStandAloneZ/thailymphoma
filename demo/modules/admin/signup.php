<?
$date_today = date("d-m-Y [H:i:s]");
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<?
	$typemember= $_POST["typemember"];
	  require_once("includes/member.php");
 // ������Դ��Ͱҹ������v
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");
	?>
          <form name ="checkForm" action="admin.php?name=admin&file=member_add_new" method="post" onSubmit="return check()"  enctype="multipart/form-data">
             <table width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
             <tr>
            <td><b><a href="admin.php?name=admin&file=index">HOME</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <b><a href="admin.php?name=admin&file=member">��Ҫԡ������</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <B><a href="admin.php?name=admin&file=signup">������Ҫԡ</a></B> </td>
            </tr>
            </TABLE>
            <table width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
          
              <tr>
                <td colspan="2">
                  <p align="center"> <h1>��سҡ�͡��������´����Ѻ������Ҫԡ</h1></p></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                 <p> <br /><img src="images/admin/user.gif" ></p></td>
                <td bgcolor="#FFFFFF"><font size="+2">��������ǹ��Ǽ����Ѥ�</font></td>
              </tr>
                   <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
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
                <br />  <p> &nbsp;&nbsp;������Ҫԡ : </p></td>
                <td bgcolor="#FFFFFF"><input name="max_id"  id="max_id" size="30" value="<?=$txtid?>" readonly="true" style="background-color:#CCCCCC;">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
            
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                 <br /> <p> &nbsp;&nbsp;���� ���ʡ�� : </p></td>
                <td bgcolor="#FFFFFF"><input name="fullname" type="text" id="fullname" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
                <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
              <br />    <p> &nbsp;&nbsp;�� : </p></td>
                <td bgcolor="#FFFFFF"><input name="sex" type="text" id="sex" size="30">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
                <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
             <br />     <p> &nbsp;&nbsp;���� : </p></td>
                <td bgcolor="#FFFFFF">
                <input name="age" type="text" id="age" size="30">
                <font color="#FF0000">&nbsp;</font></td>
              </tr>
    
              
               <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
				
				<?php
				
						$offItem = mysql_query("SELECT distinct  codehos,hospital_name,hostpital_engname,address_office FROM `web_member1` ");
						
				?>
				
				
				
             <br />     <p> &nbsp;&nbsp; �ç��Һ�ŷ���ѧ�Ѵ : </p></td>
                <td bgcolor="#FFFFFF">
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
				&nbsp;���͡�ç��Һ��: &nbsp;
				
				<select id="s_name" onchange="chdata()">
				 <option value="['','','','']">---���͡---</option>
				<?php 
				   while ($resultItem = mysql_fetch_array($offItem)) {
				 ?>
				
				     <option value="['<?=$resultItem["codehos"]?>','<?=$resultItem["hospital_name"]?>','<?=$resultItem["address_office"]?>','<?=$resultItem["hostpital_engname"]?>'];"><?=$resultItem["hospital_name"]?>&nbsp;:&nbsp;<?=$resultItem["hostpital_engname"]?></option>
				<?php } ?>
				</select>
<font color="#FF0000">&nbsp;</font></td>
              </tr>
          
                
                      <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                <br />  <p> &nbsp;&nbsp;�����ç��Һ�� : </p></td>
                <td bgcolor="#FFFFFF"><input name="codehos" type="text" id="codehos" size="30" style="background-color:#eee9e2;">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
               <br />   <p> &nbsp;&nbsp; ��������ç��Һ�� : </p></td>
                <td bgcolor="#FFFFFF"><input name="address_office" type="text" id="address_office" size="30" style="background-color:#eee9e2;">
<font color="#FF0000">&nbsp;</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                  <br /><p> &nbsp;&nbsp;���˹� : </p></td>
                <td bgcolor="#FFFFFF"><input name="work" type="text" id="work" size="30"><font color="#FF0000">&nbsp;</font>  
              </td>
              </tr>
          	<tr>
            		     <td width="30%" align="right" bgcolor="#FFFFFF">
                         <BR /><p>������ : </p></td>
                    <td bgcolor="#FFFFFF"><input name="tel_office" type="text" id="tel_office" size="30"><font color="#FF0000">&nbsp;</font> </td>
            </tr>
              <tr>
            		     <td width="30%" align="right" bgcolor="#FFFFFF"><br /><p>��Ͷ�� : </p></td>
                    <td bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" size="30"><font color="#FF0000">&nbsp;</font> </td>
            </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;&nbsp;Login Name : </td>
                <td bgcolor="#FFFFFF">
                  <input name="user_name" type="text" id="user_name" size="20" maxlength="30">
                   <font color="#FF0000">&nbsp;**&nbsp;(�����ѧ�����ҹ��) </font></td>
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
                  <input type="submit" name="Submit" value="������Ҫԡ">
                  <input type="hidden" name="signup" value="date()">
&nbsp;
              <input type="reset" name="Submit2" value=" ������">
              <input name="ok" type="hidden" id="ok2" value="ok_pass"> </td>
              </tr>
            </table>
</form></td>
      </tr>
    </table>
<? include "modules/index/footer.php"; ?>