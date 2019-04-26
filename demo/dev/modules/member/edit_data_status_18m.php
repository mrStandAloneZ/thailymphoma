<?
session_start() ;
if(!session_is_registered("login_true")) {
exit() ;
echo " bgcolor=FFFFFF";
}
### จบการเช็ค ###
?>
<? include "modules/index/header.php" ; ?>
<?php 
	date_default_timezone_set("Asia/Bangkok"); 
	
						$date_today = date("d/m/");
						$date_today1 = date("Y")+'543';
						$string = $date_today1;
						$date_small = $date_today.substr($string,2);
					
						$date_todayone = date("d");
						$date_todaymonth = date("m");
						$date_today9 = date("Y")+'543';
						$string1 = $date_today9;
						$date_small9 = substr($string1,2).$date_todaymonth.$date_todayone;
				
				$date_today11 = date("d");
				$m_today12 = date("m");
				
				$date = $_POST["date_today11"];
                 $Title=$_POST["Title"];
			
	$edit_date=$date_today11;
	$edit_month=$m_today12;
	$edit_year=$date_today9;

             
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$edit_member= $dbarr["member_id"];
$codehos= $dbarr["codehos"];
	//	$id= $_POST["id"];
	//	$status_registry = $_POST["status_registry"];	
		
	//	$id = htmlspecialchars($id) ;
	//	$status_registry = htmlspecialchars($status_registry) ;
		$status ="3";
		
		
$result = mysql_query( "update ".TB_ADD_DATA." SET    status_18mo='$status',edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'   where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");	


	echo $status;
	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>VISIT (18 MONTH FOLLOW UP)</b></font></center>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>ท่านได้ทำการส่งข้อมูลให้ส่วนกลางเป็นที่เรียบร้อยแล้ว</b></font></center>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=index.php'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>