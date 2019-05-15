<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />

</head> 
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
?>
			
	<? date_default_timezone_set("Asia/Bangkok"); ?><br />
	<? 
						$date_today = date("d/m/");
						$date_today1 = date("Y")+'543';
						$string = $date_today1;
						$date_small = $date_today.substr($string,2);
					?>
					<? 
						$date_todayone = date("d");
						$date_todaymonth = date("m");
						$date_today9 = date("Y")+'543';
						$string1 = $date_today9;
						$date_small9 = substr($string1,2).$date_todaymonth.$date_todayone;
					?>
				<? 
				$date_today11 = date("d");
				$m_today12 = date("m");
				
				$date = $_POST["date_today11"];
                 $Title=$_POST["Title"];
				?>
                      <? 
	$date=$date_today11;
	$month=$m_today12;
	$year=$date_today9;
	?>
    <? 

	?>
<body>
<? include "modules/index/header.php" ; ?>
<? 
		$date= $_POST["date_today11"];
		$month = $_POST["m_today12"];
		$year = $_POST["date_today9"];
		$title = $_POST["title"];
		$titleone = $_POST["titleone"];
		$nameone = $_POST["nameone"];
		$idname = $_POST["idname"];
		$saka = $_POST["saka"];
		$pa = $_POST["pa"];
		$class = $_POST["class"];
		$class = $_POST["class"];
		$room = $_POST["room"];
		$detail = $_POST["detail"];
		$idcard = $_POST["idcard"];
		$hand = $_POST["hand"];
		$member_pic=$_POST["member_pic"];
		
		//Check Pic Size
	$FILE = $_FILES['FILE'];
	if ( $FILE['size'] > _MEMBER_LIMIT_UPLOAD ) {
	$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>ขนาดรูปที่แนบมามีขนาดเกิน ".(_MEMBER_LIMIT_UPLOAD/1024)." kB กรุณาตรวจสอบรูปภาพของท่าน</b></font><br><br>
	<input type='button' value='กลับไปลองใหม่' onclick='history.back();'></center>" ;
	showerror($showmsg);
	} else {
	//แปลงนามสกุล และทำการ upload
	if ( $FILE['size'] == 0 ){
		$Filename = $member_pic ;
		} 
			else {
	 			$resmember = $db->select_query("SELECT * FROM ".TB_ADDNEW." WHERE member_id='$member_id' ");
	 			while ($r=mysql_fetch_array($resmember)) {
	 				$image=$r[member_pic];
	 						if ($image) {
	 										if (file_exists("member_pic/$image")) {
	 										unlink("member_pic/$image");
	 											} 
	 						}
	 			}
	 if ( $FILE['type'] == "image/gif" )
	 		{$Filename = TIMESTAMP.".gif";}
	 if ( $FILE['type'] == "image/png" )
	 		{$Filename = TIMESTAMP.".png";}
	 elseif (($FILE['type']=="image/jpg")||($FILE['type']=="image/jpeg")||($FILE['type']=="image/pjpeg"))
	 		{$Filename = TIMESTAMP.".jpg";}
	move_uploaded_file($FILE['tmp_name'] , "member_pic/".$Filename );
} 
}
?>
<TABLE width="100%" align="center">
     <form name ="checkForm" action="?name=member&file=member_addm1" method="post" onSubmit="return check();"  enctype="multipart/form-data">
<TR>
	<TD colspan="2" ><h1><center>คำร้อง<?php echo $title; ?></center></h1></TD>
	</TR>
<TR>
	<TD colspan="2" align=right><B>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</B>	  </TD>
	</TR>
<TR>
	<TD colspan="2" align=right><B>วันที่..  <input type="text" name="date" id="textfield" size="2" value="<?php echo $date; ?>" />....เดือน....<input type="text" name="month" id="textfield" size="2" value="<?php echo $month; ?>" />.....พ.ศ. ..<input type="text" name="year" id="textfield" size="3" value="<?php echo $year; ?>" />......</B>	  </TD>
	</TR>
    <TR>
	<TD colspan="2" align=lift><B>เรื่อง :  <input type="text" name="title" id="textfield" value="<?php echo $title; ?>" /></B></TD>
	</TR>
<TR>
	<TD colspan="2" > <B>เรียน คณบดี/ผู้อำนวยการ&nbsp;&nbsp;
	  <input type="text" name="titleone" id="textfield" value="<?php echo $titleone; ?>" /></B></TD>
	</TR>
<TR>
	<TD colspan="2" align=lift><B>ด้วยข้าพเข้า : </B>
	  <input type="text" name="nameone" id="textfield" value="<?php echo $nameone; ?>" /><b>เลขประจำตัว:</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="idname" id="textfield" value="<?php echo $idname; ?>" />	 </TD>
  </TR>
<TR>
	<TD colspan="2" align=lift valign=top> <B>สาขาวิชา : </B><input type="text" name="saka" id="textfield" value="<?php echo $saka; ?>" /><b>ภาควิชา : <input type="text" name="pa" id="textfield" value="<?php echo $pa; ?>" /></b><b>ชั้นปีที่ :  <input type="text" name="class" id="textfield" value="<?php echo $class; ?>" /> </b><b>ห้อง: <input type="text" name="room" id="textfield" value="<?php echo $room; ?>" /></b></TD>
	</TR>

	<TD colspan="2" align="left" valign="top"><B>มีความประสงค์ : ขอโอนผลการเรียนตามรายวิชาดังนี้ </B> </TD>
    <tr>
		<td colspan="2" align="center"><input type="text" name="detail" id="textfield"  size="150"value="<?php echo $detail; ?>" /></td>
      </tr>
	</TR>
    <tr>
    <td colspan="2"><br /><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณา</b></td>
    </tr>
    <tr>
    <td><b>เลขประจำตัวบัตรประชาชน:</b></td>
    <td> <input type="text" name="idcard" id="textfield" value="<?php echo $idcard; ?>" /> </td>
    </tr><br />
    <tr>
    <td align="right"></td>
    <td><br /><b>ขอแสดงความนับถือ</b></td>
    </tr>
    <tr>
    <td align="right"><b>ลงชื่อ :</b></td>
    <td><input type="text" name="hand" id="textfield" value="<?php echo $hand; ?>" /></td>
     </tr>
     
				
                     	<TR>
						<TD align="right" valign="top"><B></B></TD>
						<TD>
                        <input type="hidden" name="name"/>
						<INPUT TYPE="submit" class="submit" value=" บันทึกข้อมูล "> </FORM></TD>
			
					</TR>
</TABLE>


</body>
</html>
