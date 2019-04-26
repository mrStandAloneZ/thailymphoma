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
				<table width="100%" border="0" align="center">
      <tr>
        <th align="left" width="15%"><strong>หมายเลขสมาชิก : </strong></th>
        <td width="35%"><?php echo $dbarr['member_id'] ; ?></td>
        <th align="left"  width="15%"><strong>รูปสมาชิก : </strong></th>
        <td width="37%" rowspan="5" valign="top">
          <div align="left">
		  <?
					//Show Picture
					if($dbarr[member_pic]){
						$postpicupload = @getimagesize ("member_pic/".$dbarr[member_pic]."");
						if ( $postpicupload[0] > _MEMBER_LIMIT_PICWIDTH ) {
							$PicUpload = "<img src='member_pic/".$dbarr[member_pic]."' width='"._MEMBER_LIMIT_PICWIDTH."' ALIGN='absmiddle' class='membericon'>
							<br><br>ไฟล์รูปปัจจุบัน $dbarr[member_pic]"  ;
							}else{
							$PicUpload = "<img src='member_pic/".$dbarr[member_pic]."' ALIGN='absbottom' class='membericon'>
							<br><br>ไฟล์รูปปัจจุบัน $dbarr[member_pic]  ";
							}
						echo $PicUpload ;
					}else{ 
					echo "ยังไม่มีรูปสมาชิก";
					echo "<img src='images/icon/member.png' border='1' ALIGN='absbottom' />"; };
					?>		  
		  </div>
          <div align="left"></div></td>
      </tr>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>ชื่อ-นามสกุล : </strong></th>
        <td width="35%">
          <div align="left"><?php echo $dbarr['name'] ; ?></div></td>
        <th align="left"  width="15%">&nbsp;</th>
        </tr>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>เพศ : </strong></th>
        <td width="35%"><?php echo $dbarr['sex'] ; ?></td>
        <th align="left"  width="15%">&nbsp;</th>
        <tr>
        <th scope="row" align="left"  width="15%"><strong>อายุ: </strong></th>
        <td width="35%"><?php echo $dbarr['education'] ; ?></td>
        <th align="left"  width="15%">&nbsp;</th>
        <tr>
        <th scope="row" align="left"  width="15%"><strong>ชื่อโรงพยาบาลที่สังกัด : </strong></th>
        <td width="35%"><?php echo $dbarr['address'] ; ?></td>
        <th scope="row" align="left"  width="15%"><strong> : </strong></th>
        <td width="35%"><?php echo $dbarr['email'] ;?></td>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>ที่อบู่ที่ทำงาน : </strong></th>
        <td width="35%"><?php echo $dbarr['amper'] ; ?></td>
        <th scope="row" align="left"  width="15%"><strong>ตำแหน่ง : </strong></th>
        <td width="35%"><?php echo $dbarr['work'] ; ?></td>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>โทรศัพท์ที่ทำงาน : </strong></th>
        <td width="35%"><?php echo $dbarr['province'] ; ?></td>
        <th scope="row" align="left"  width="15%"><strong>มือถือ : </strong></th>
        <td width="35%"><?php echo $dbarr['signup'] ; ?></td>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>Email : </strong></tdth
        ><td width="35%"><?php echo $dbarr['zipcode'] ; ?></td>
        <th scope="row" align="left"  width="15%"><strong>เข้ามาล่าสุดเมื่อ : </strong></th>
        <td width="35%"><?php echo $dbarr['lastlog'] ; ?></td>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>เบอร์โทรศัพท์ : </strong></th>
        <td width="35%"><?php echo $dbarr['phone'] ;?></td>
        <td width="14%" align="right">&nbsp;</td>
        <td width="35%">&nbsp;</td>
      <tr>
    </table>
                </p>
                </div>
			
			<!-- sidebar -->
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
		<? include "modules/index/footer.php"; ?>