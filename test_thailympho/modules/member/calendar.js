<script language="javascript" src="calendar.js"></script>
<script>
  var cal1 = new gcalendar();
  cal1.name = "cal1"
  cal1.dateformat = "dd/mm/yy";
  cal1.display();
  cal1.setdate(20,11,2549,true);
  cal1.onValueChange=function () { //�˵ء�ó������ user ���͡�ѹ���
    cal_date.value=cal1.value //����ѹ�����׹��Ѻ (Ẻ���)
    date.value=cal1.day //����ѹ���
    month.value=cal1.month //�����͹
    year.value=cal1.year+543 //��һ�(��.) + 543
  }
</script>
<br />�/�/� : <input type="text" name="cal_date">
<br />�ѹ��� : <input type="text" name="date">
<br />��͹ : <input type="text" name="month">
<br />��. : <input type="text" name="year">
<?
  echo $_POST[cal];
?>
<script type="text/javascript" src="calendar.js"></script>
<form action="?" method="post">
<script type="text/javascript">
    var cal = new gcalendar();
    cal.name = "cal";
    cal.dateformat = "dd/mm/yy";
    cal.display();
    cal.setdate( <?=date( "d" )?> , <?=date( "m" )?> , <?=( date( "Y" ) + 543 ) ?> , true ); //��˹��ѹ����ѹ���
</script>
<input type="submit" name="submit" value="Submit." />
</form>