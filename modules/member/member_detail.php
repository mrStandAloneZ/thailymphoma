<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;

?>
<? include "modules/index/header.php" ; ?>
<!-- main content -->
			<div id="center">
				<h1>รายละเอียดของสมาชิก คุณ <?php echo $dbarr['user'] ; ?></h1>
				<p>
			   <center><table width="50%" border="0" align="center">
                 
                 <tr>
                    <th align="left" width="19%"><strong>หมายเลขสมาชิก : </strong></th>
                    <td width="23%"><strong><?php echo $dbarr['member_id'] ; ?></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">USERNAME</th>
                    <td width="23%"><?php echo $dbarr['user'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">PASSWORD</th>
                    <td width="23%"><font color="#FF0000">******</font></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>ชื่อ-นามสกุล : </strong></th>
                    <td width="23%"> <?php echo $dbarr['fullname'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>เพศ : </strong></th>
                    <td width="23%"> <?php echo $dbarr['sex'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>อายุ : </strong></th>
                    <td width="23%"> <?php echo $dbarr['age'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">โรงพยาบาลสังกัด :</th>
                    <td width="23%"><?php echo $dbarr['hospital_name'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">รหัสโรงพยาบาล :</th>
                    <td width="23%"><?php echo $dbarr['codehos'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">ที่อยู่โรงพยาบาล :</th>
                    <td width="23%"><?php echo $dbarr['address_office'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">ตำแหน่ง  : </th>
                    <td width="23%"><?php echo $dbarr['work'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">เบอร์โทร : </th>
                    <td width="23%"><?php echo $dbarr['tel_office'] ;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">มือถือ : </th>
                    <td width="23%"><?php echo $dbarr['tel'] ;?></td>
                  </tr>       
                    <th align="left" width="19%"><strong>email </strong>: </th>
                    <td width="23%"><?php echo $dbarr['email'] ;?></td>
                  </tr>
              </table></center>
                </p>
                </div>
			
			<!-- sidebar -->
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
		<? include "modules/index/footer.php"; ?>