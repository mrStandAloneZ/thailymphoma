<? include "modules/index/header.php" ; ?>
<!-- main content -->
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
?>
			<div id="center">
            	<h1>�����������´  <?php echo $dbarr['user'] ; ?></h1>
				<p>
              <form name="checkForm" action="?name=member&file=member_edit_add" method="post" onSubmit="return check2();" enctype="multipart/form-data">
                <center><table width="50%" border="0" align="center">
                 
                 <tr>
                    <th align="left" width="19%"><strong>�����Ţ��Ҫԡ : </strong></th>
                    <td width="23%"><strong><?php echo $dbarr['member_id'] ; ?></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">USERNAME</th>
                    <td width="23%"><input name="user" type="text" value="<?php echo $dbarr['user'] ;?>" size="25"> </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>����-���ʡ�� : </strong></th>
                    <td width="23%">  <input name="fullname" type="text"  size="25" value="<?php echo "$dbarr[fullname]" ; ?>"></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">�� :</th>
                    <td width="23%"><input name="sex" type="text"  size="25" value="<?php echo "$dbarr[sex]" ; ?>"></td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">���� :</th>
                    <td width="23%"><input name="age" type="text"  size="25" value="<?php echo "$dbarr[age]" ; ?>"></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">�ç��Һ�ŷ���ѧ�Ѵ :</th>
                    <td width="23%"><input name="hospital_name" type="text"  size="25" value="<?php echo "$dbarr[hospital_name]" ; ?>"></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">��������ç��Һ�� :</th>
                    <td width="23%"><input name="address_office" type="text"  size="25" value="<?php echo "$dbarr[address_office]" ; ?>"></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"> ���˹� : </th>
                    <td width="23%"><input name="work" type="text"  size="25" value="<?php echo "$dbarr[work]" ; ?>"></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"> ������ : </th>
                    <td width="23%"><input name="tel_office" type="text"  size="25" value="<?php echo "$dbarr[tel_office]" ; ?>"></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"> ��Ͷ�� : </th>
                    <td width="23%"><input name="tel" type="text"  size="25" value="<?php echo "$dbarr[tel]" ; ?>"></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>email </strong>: </th>
                    <td width="23%"> <input name="email" type="text" value="<?php echo $dbarr['email'] ;?>" size="25"></td>
                  </tr>
               
                 
                </table></center>
                <center><br />
               <input name="member_id" type="hidden" id="member_id" value="<?php echo $dbarr['member_id'] ; ?>">
            	<input type="submit" name="Submit2" value="Save"><br />
                </center>
              </form>
    </p>
                </div>
			
			<div class="x"></div>
			<div class="break"></div>


		</div>
		<? include "modules/index/footer.php"; ?>