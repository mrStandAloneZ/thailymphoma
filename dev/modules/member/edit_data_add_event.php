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
$member_id= $dbarr["member_id"];

		$id= $_POST["id"];
	
		$event_name = $_POST["event_name"];
		$start_date = $_POST["start_date"];
		$stop_date = $_POST["stop_date"];
		$sae = $_POST["sae"];
		$cocomitant = $_POST["cocomitant"];
		$severity = $_POST["severity"];
		$action = $_POST["action"];
		$outcome = $_POST["outcome"];
		$relaionship = $_POST["relaionship"];
		$centre= $_POST["centre"];
		$subject= $_POST["subject"];
		$patient_initials = $_POST["patient_initials"];
		
				
		$id = htmlspecialchars($id) ;
	
		$event_name = htmlspecialchars($event_name) ;  
		$start_date = htmlspecialchars($start_date) ;
		$stop_date = htmlspecialchars($stop_date) ;
		$sae = htmlspecialchars($sae) ;
		$cocomitant = htmlspecialchars($cocomitant) ;
		$severity = htmlspecialchars($severity) ;
		$action = htmlspecialchars($action) ;
		$outcome = htmlspecialchars($outcome) ;
		$relaionship = htmlspecialchars($relaionship) ;
		$centre = htmlspecialchars($centre) ;
		$subject = htmlspecialchars($subject) ;
		$patient_initials = htmlspecialchars($patient_initials) ;
		

$result = mysql_query( "update ".TB_EVENT." SET  event_name='$event_name' , start_date='$start_date', stop_date='$stop_date',sae='$sae',cocomitant='$cocomitant' ,severity='$severity',action='$action', outcome='$outcome',relaionship='$relaionship', member_id='$member_id'  ,centre='$centre'  ,subject='$subject' , patient_initials='$patient_initials' where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=adverse_event'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>