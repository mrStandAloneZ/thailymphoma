<?
$date_today = date("d-m-Y [H:i:s]");
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
          <form name ="checkForm" action="admin.php?name=admin&file=signup" method="post" onSubmit="return check()"  enctype="multipart/form-data">
             <table width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
             <tr>
            <td><b><a href="admin.php?name=admin&file=index">HOME</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <b><a href="admin.php?name=admin&file=member">��Ҫԡ������</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <B><a href="admin.php?name=admin&file=typemember">������Ҫԡ</a></B> </td>
            </tr>
            </TABLE>
            <table width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
          
              <tr>
                <td colspan="2">
                  <p align="center"> 
                  <h1>��سҡ�͡���͡ʶҹ�� �Ҫԡ</h1></p></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                  <p><img src="images/admin/user.gif" ></p></td>
                <td bgcolor="#FFFFFF">ʶҹ���Ҫԡ</td>
              </tr>
                   <tr>
                   <td></td>
                   <td>
          <? 
		  $member01 = �ѡ�֡�� ;
		  $member02 = �Ҩ�������֡�� ;
		  $member03 = ���˹���Ҥ ;
		  $member04 = ���˹�ҷ���Ԫҡ�� ;
		  ?>
                    <select name=typemember >
                     <option selected value="" >��س����͡ʶҹ���Ҫԡ</option>
					 <option   value="100"><? echo $member01;?></option>
                     <option value="200" ><? echo $member02;?> </option>
                      <option value="300" ><? echo $member03;?> </option>
                       <option value="400" ><? echo $member04;?>  </option>
           	    </select>    
                   </tr>
                  
             
           
            
            
             
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">
                  <input type="submit" name="Submit" value="�Ѵ�">
                  <input type="hidden" name="signup" value="date()">
&nbsp;
              <input type="reset" name="Submit2" value=" ������">
              <input name="ok" type="hidden" id="ok2" value="ok_pass">                </td>
              </tr>
            </table>
</form></td>
      </tr>
    </table>
