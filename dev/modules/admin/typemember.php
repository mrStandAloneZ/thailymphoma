<?
$date_today = date("d-m-Y [H:i:s]");
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
          <form name ="checkForm" action="admin.php?name=admin&file=signup" method="post" onSubmit="return check()"  enctype="multipart/form-data">
             <table width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
             <tr>
            <td><b><a href="admin.php?name=admin&file=index">HOME</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <b><a href="admin.php?name=admin&file=member">สมาชิกทั้งหมด</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <B><a href="admin.php?name=admin&file=typemember">เพิ่มสมาชิก</a></B> </td>
            </tr>
            </TABLE>
            <table width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
          
              <tr>
                <td colspan="2">
                  <p align="center"> 
                  <h1>กรุณากรอกเลือกสถานะส มาชิก</h1></p></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                  <p><img src="images/admin/user.gif" ></p></td>
                <td bgcolor="#FFFFFF">สถานะสมาชิก</td>
              </tr>
                   <tr>
                   <td></td>
                   <td>
          <? 
		  $member01 = นักศึกษา ;
		  $member02 = อาจารย์ที่ปรึกษา ;
		  $member03 = หัวหน้าภาค ;
		  $member04 = เจ้าหน้าที่วิชาการ ;
		  ?>
                    <select name=typemember >
                     <option selected value="" >กรุณาเลือกสถานะสมาชิก</option>
					 <option   value="100"><? echo $member01;?></option>
                     <option value="200" ><? echo $member02;?> </option>
                      <option value="300" ><? echo $member03;?> </option>
                       <option value="400" ><? echo $member04;?>  </option>
           	    </select>    
                   </tr>
                  
             
           
            
            
             
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">
                  <input type="submit" name="Submit" value="ถัดไป">
                  <input type="hidden" name="signup" value="date()">
&nbsp;
              <input type="reset" name="Submit2" value=" เคลียร์">
              <input name="ok" type="hidden" id="ok2" value="ok_pass">                </td>
              </tr>
            </table>
</form></td>
      </tr>
    </table>
