<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />

</head> 
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
				?>


		       
                      <? 
	$date=$date_today11;
	$month=$m_today12;
	$year=$date_today9;
	?>
    <? 
	$Title='ขอโอนผลการเรียน';
	?>
<body>
<TABLE width="100%" align="center">
<TR>
	<TD colspan="2" ><h1><center>คำร้องขอทั่วไป</center></h1></TD>
	</TR>
<TR>
	<TD colspan="2" align=right><B>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</B>	  </TD>
	</TR>
<TR>
	<TD colspan="2" align=right><B>วันที่..<? echo $date; ?>....เดือน....<? echo $month; ?>.....พ.ศ. ..<? echo $year; ?>......</B>	  </TD>
	</TR>
    <TR>
	<TD colspan="2" align=lift><B>เรื่อง :  <? echo $Title;?></B></TD>
	</TR>
<TR>
	<TD colspan="2" > <B>เรียน คณบดี/ผู้อำนวยการ........<? echo $Title1;?></B></TD>
	</TR>
<TR>
	<TD colspan="2" align=lift><B>ด้วยข้าพเข้า : </B>
	  <? echo $name; ?>  <b>เลขประจำตัว:</b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $idname; ?>	 </TD>
  </TR>
<TR>
	<TD colspan="2" align=lift valign=top> <B>สาขาวิชา : </B><? echo $saka; ?><b>ภาควิชา : <? echo $pa; ?></b><b>ชั้นปีที่ :  <? echo $class; ?> </b><b>ห้อง: <? echo $room ?></b></TD>
	</TR>

	<TD colspan="2" align="left" valign="top"><B>มีความประสงค์ : ขอโอนผลการเรียนตามรายวิชาดังนี้ </B> </TD>
    <tr>
		<td colspan="2" align="center"><? echo $detail; ?></td>
      </tr>
	</TR>
    <tr>
    <td colspan="2"><br /><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณา</b></td>
    </tr>
    <tr>
    <td><b>เลขประจำตัวบัตรประชาชน:</b></td>
    <td><? echo $idcard; ?></td>
    </tr><br />
    <tr>
    <td align="right"></td>
    <td><br /><b>ขอแสดงความนับถือ</b></td>
    </tr>
    <tr>
    <td align="right"><b>ลงชื่อ :</b></td>
    <td><? echo $hand; ?></td>
     </tr>
     
		<FORM METHOD=POST ACTION="member.php?name=member&file=member_add_new&date=<? echo $date;?>&month=<? echo $month;?>&year=<? echo $year;?>&Title=<? echo $Title;?>&Title1=<? echo $Title1;?>&name=<? echo $name;?>&idname=<? echo $idname;?>&saka=<? echo $saka;?>&pa=<? echo $pa;?>&class=<? echo $class;?>&room=<? echo $room;?>&detail=<? echo $detail; ?>&idcard=<? echo $idcard;?>&hand=<? echo $hand; ?> ">
                    	<TR>
						<TD align="right" valign="top"><B></B></TD>
						<TD>
                        <input type="hidden" name="name"/>
						<INPUT TYPE="submit" class="submit" value=" บันทึกข้อมูล "> </FORM></TD>
			
					</TR>
</TABLE>


</body>
</html>
