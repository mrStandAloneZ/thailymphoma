<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;

?>
<? include "modules/index/header.php" ; ?>
<!-- main content -->
			<div id="center">
				<h1>��������´�ͧ��Ҫԡ �س <?php echo $dbarr['user'] ; ?></h1>
				<p> 
				<table width="100%" border="0" align="center">
      <tr>
        <th align="left" width="15%"><strong>�����Ţ��Ҫԡ : </strong></th>
        <td width="35%"><?php echo $dbarr['member_id'] ; ?></td>
        <th align="left"  width="15%"><strong>�ٻ��Ҫԡ : </strong></th>
        <td width="37%" rowspan="5" valign="top">
          <div align="left">
		  <?
					//Show Picture
					if($dbarr[member_pic]){
						$postpicupload = @getimagesize ("member_pic/".$dbarr[member_pic]."");
						if ( $postpicupload[0] > _MEMBER_LIMIT_PICWIDTH ) {
							$PicUpload = "<img src='member_pic/".$dbarr[member_pic]."' width='"._MEMBER_LIMIT_PICWIDTH."' ALIGN='absmiddle' class='membericon'>
							<br><br>����ٻ�Ѩ�غѹ $dbarr[member_pic]"  ;
							}else{
							$PicUpload = "<img src='member_pic/".$dbarr[member_pic]."' ALIGN='absbottom' class='membericon'>
							<br><br>����ٻ�Ѩ�غѹ $dbarr[member_pic]  ";
							}
						echo $PicUpload ;
					}else{ 
					echo "�ѧ������ٻ��Ҫԡ";
					echo "<img src='images/icon/member.png' border='1' ALIGN='absbottom' />"; };
					?>		  
		  </div>
          <div align="left"></div></td>
      </tr>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>����-���ʡ�� : </strong></th>
        <td width="35%">
          <div align="left"><?php echo $dbarr['name'] ; ?></div></td>
        <th align="left"  width="15%">&nbsp;</th>
        </tr>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>�� : </strong></th>
        <td width="35%"><?php echo $dbarr['sex'] ; ?></td>
        <th align="left"  width="15%">&nbsp;</th>
        <tr>
        <th scope="row" align="left"  width="15%"><strong>����: </strong></th>
        <td width="35%"><?php echo $dbarr['education'] ; ?></td>
        <th align="left"  width="15%">&nbsp;</th>
        <tr>
        <th scope="row" align="left"  width="15%"><strong>�����ç��Һ�ŷ���ѧ�Ѵ : </strong></th>
        <td width="35%"><?php echo $dbarr['address'] ; ?></td>
        <th scope="row" align="left"  width="15%"><strong> : </strong></th>
        <td width="35%"><?php echo $dbarr['email'] ;?></td>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>���ͺ����ӧҹ : </strong></th>
        <td width="35%"><?php echo $dbarr['amper'] ; ?></td>
        <th scope="row" align="left"  width="15%"><strong>���˹� : </strong></th>
        <td width="35%"><?php echo $dbarr['work'] ; ?></td>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>���Ѿ����ӧҹ : </strong></th>
        <td width="35%"><?php echo $dbarr['province'] ; ?></td>
        <th scope="row" align="left"  width="15%"><strong>��Ͷ�� : </strong></th>
        <td width="35%"><?php echo $dbarr['signup'] ; ?></td>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>Email : </strong></tdth
        ><td width="35%"><?php echo $dbarr['zipcode'] ; ?></td>
        <th scope="row" align="left"  width="15%"><strong>���������ش����� : </strong></th>
        <td width="35%"><?php echo $dbarr['lastlog'] ; ?></td>
      <tr>
        <th scope="row" align="left"  width="15%"><strong>�������Ѿ�� : </strong></th>
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