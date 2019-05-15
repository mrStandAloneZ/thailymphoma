<? 
if(!session_is_registered("login_true")) {
//  url=index.php คำสั่งนี้จะให้ไปหน้าที่จะต้องกรอก user,pwd ถ้าอยู่โฟล์เดอร์อื่นให้เรียกให้ถูกนะครับ
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>โปรแกรมจัดตารางการทำงานของพยาบาล</a></h1>
		</div>
		
		<div id='content'>
			
			<div class='x'></div>
			<!-- main content -->
			<div id='login'>
            	<div class='space'></div>
                <div class='space'></div>
				<h1>กรุณา Login เข้าสู่ระบบ</h1>
				<p>
				<img src='images/login-redirection-loader.gif' alt='login-redirection-loader' />
				";
	echo "<meta http-equiv='refresh' content='5;url=index.php?name=member&amp;file=login'>" ; 
	echo "	</p>
                </div>
			
			<!-- sidebar -->
			
			<div class='x'></div>
			<div class='break'></div>

		</div> " ;
 include 'modules/index/footer.php'; 
} else {
?>
<? include "modules/index/header.php" ; ?>
	<div id="center">
    <p>
    <?
$_GET['id'] = intval($_GET['id']);
//แสดงปฏิทิน
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[event] = $db->select_query("SELECT id, date_event, cat1, cat2, cat3, cat4, cat5, UNIX_TIMESTAMP(date_event) AS date_event2  FROM ".TB_CALENDAR." WHERE id='$_GET[id]' ");
$arr[event] = $db->fetch($res[event]);
$db->closedb ();
?>
<h1>ตารางปฎิบัติงานประจำวัน</h1>
<table id="calendar">
<tr><td class="calendarHeader" colspan="6" align="center" ><?= ThaiTimeConvert($arr[event][date_event2],"1","");?></td></tr>
<tr>
<td class="calendarHeader" width="120px">ตำแหน่งเวร	&frasl; เวลา</td>
<td class="calendarHeader" width="120px">08.00 - 16.00</td>
<td class="calendarHeader" width="120px">08.00 - 16.00</td>
<td class="calendarHeader" width="120px">16.00 - 00.00</td>
<td class="calendarHeader" width="120px">00.00 - 08.00</td>
<td class="calendarHeader" width="120px"> 2วัน </td>
</tr>
<tr><td class="calendarHeader">หัวหน้าเวร</td><td bgcolor="#c0f573"><?=$arr[event][cat1];?></td><td></td><td></td><td></td><td></td></tr>
<tr><td class="calendarHeader">เวรเช้า</td><td></td><td bgcolor="#c0f573"><?=$arr[event][cat2];?></td><td></td><td></td><td></td></tr>
<tr><td class="calendarHeader">เวรบ่าย</td><td></td><td></td><td bgcolor="#c0f573"><?=$arr[event][cat3];?></td><td></td><td></td></tr>
<tr><td class="calendarHeader">เวรดึก</td><td></td><td></td><td></td><td bgcolor="#c0f573"><?=$arr[event][cat4];?></td><td></td></tr>
<tr><td class="calendarHeader">หยุดงาน</td><td></td><td></td><td></td><td></td><td bgcolor="#c0f573"><?=$arr[event][cat5];?></td></tr>
</table>
        </p>
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>
<? include "modules/index/footer.php"; ?>
<? } ?>