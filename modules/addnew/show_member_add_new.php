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
	$Title='���͹�š�����¹';
	?>
<body>
<TABLE width="100%" align="center">
<TR>
	<TD colspan="2" ><h1><center>����ͧ�ͷ����</center></h1></TD>
	</TR>
<TR>
	<TD colspan="2" align=right><B>����Է�����෤����վ�Ш�����Ҿ�й���˹��</B>	  </TD>
	</TR>
<TR>
	<TD colspan="2" align=right><B>�ѹ���..<? echo $date; ?>....��͹....<? echo $month; ?>.....�.�. ..<? echo $year; ?>......</B>	  </TD>
	</TR>
    <TR>
	<TD colspan="2" align=lift><B>����ͧ :  <? echo $Title;?></B></TD>
	</TR>
<TR>
	<TD colspan="2" > <B>���¹ �����/����ӹ�¡��........<? echo $Title1;?></B></TD>
	</TR>
<TR>
	<TD colspan="2" align=lift><B>���¢�Ҿ��� : </B>
	  <? echo $name; ?>  <b>�Ţ��Шӵ��:</b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $idname; ?>	 </TD>
  </TR>
<TR>
	<TD colspan="2" align=lift valign=top> <B>�Ң��Ԫ� : </B><? echo $saka; ?><b>�Ҥ�Ԫ� : <? echo $pa; ?></b><b>��鹻շ�� :  <? echo $class; ?> </b><b>��ͧ: <? echo $room ?></b></TD>
	</TR>

	<TD colspan="2" align="left" valign="top"><B>�դ������ʧ�� : ���͹�š�����¹�������ԪҴѧ��� </B> </TD>
    <tr>
		<td colspan="2" align="center"><? echo $detail; ?></td>
      </tr>
	</TR>
    <tr>
    <td colspan="2"><br /><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�֧���¹�������ô�Ԩ�ó�</b></td>
    </tr>
    <tr>
    <td><b>�Ţ��Шӵ�Ǻѵû�ЪҪ�:</b></td>
    <td><? echo $idcard; ?></td>
    </tr><br />
    <tr>
    <td align="right"></td>
    <td><br /><b>���ʴ������Ѻ���</b></td>
    </tr>
    <tr>
    <td align="right"><b>ŧ���� :</b></td>
    <td><? echo $hand; ?></td>
     </tr>
     
		<FORM METHOD=POST ACTION="member.php?name=member&file=member_add_new&date=<? echo $date;?>&month=<? echo $month;?>&year=<? echo $year;?>&Title=<? echo $Title;?>&Title1=<? echo $Title1;?>&name=<? echo $name;?>&idname=<? echo $idname;?>&saka=<? echo $saka;?>&pa=<? echo $pa;?>&class=<? echo $class;?>&room=<? echo $room;?>&detail=<? echo $detail; ?>&idcard=<? echo $idcard;?>&hand=<? echo $hand; ?> ">
                    	<TR>
						<TD align="right" valign="top"><B></B></TD>
						<TD>
                        <input type="hidden" name="name"/>
						<INPUT TYPE="submit" class="submit" value=" �ѹ�֡������ "> </FORM></TD>
			
					</TR>
</TABLE>


</body>
</html>
