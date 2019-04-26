<script language="javascript" src="calendar.js"></script>
<script>
  var cal1 = new gcalendar();
  cal1.name = "cal1"
  cal1.dateformat = "dd/mm/yy";
  cal1.display();
  cal1.setdate(20,11,2549,true);
  cal1.onValueChange=function () { //เหตุการณ์เมื่อ user เลือกวันที่
    cal_date.value=cal1.value //ค่าวันที่ที่คืนกลับ (แบบเต็ม)
    date.value=cal1.day //ค่าวันที่
    month.value=cal1.month //ค่าเดือน
    year.value=cal1.year+543 //ค่าปี(คศ.) + 543
  }
</script>
<br />ว/ด/ป : <input type="text" name="cal_date">
<br />วันที่ : <input type="text" name="date">
<br />เดือน : <input type="text" name="month">
<br />พศ. : <input type="text" name="year">
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
    cal.setdate( <?=date( "d" )?> , <?=date( "m" )?> , <?=( date( "Y" ) + 543 ) ?> , true ); //กำหนดวันที่วันนี้
</script>
<input type="submit" name="submit" value="Submit." />
</form>