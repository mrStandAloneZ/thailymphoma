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

		$id= $_POST["id"];
		$centre= $_POST["centre"];
		$subject= $_POST["subject"];
		$patient_initials = $_POST["patient_initials"];
		$date_assessment_plast = $_POST["date_assessment_plast"];
		$current_treatment = $_POST["current_treatment"];
		$specify_plast = $_POST["specify_plast"];			
		$daily_dose_plast = $_POST["daily_dose_plast"];		
		$number_treatment_plast = $_POST["number_treatment_plast"];		   
		$dora_registry = $_POST["dora_registry"];
	    $re_treatment_plast = $_POST["re_treatment_plast"];
		$progression_ap_plast = $_POST["progression_ap_plast"];		   
		$date_ap_plast = $_POST["date_ap_plast"];    //*******   เพิ่มทีหลัง
        $death_plast = $_POST["death_plast"];   
		$date_death = $_POST["date_death"];      //****  เพิ่มทีหลัง
		$cause_death = $_POST["cause_death"]; 
		
		
				
		$id = htmlspecialchars($id) ;
		$centre = htmlspecialchars($centre) ;
		$subject = htmlspecialchars($subject) ;
		$patient_initials = htmlspecialchars($patient_initials) ;
		$date_assessment_plast = htmlspecialchars($date_assessment_plast) ;  
		$current_treatment = htmlspecialchars($current_treatment) ;
		$specify_plast = htmlspecialchars($specify_plast) ;
		$daily_dose_plast = htmlspecialchars($daily_dose_plast) ;
		$number_treatment_plast = htmlspecialchars($number_treatment_plast) ;
		$dora_registry = htmlspecialchars($dora_registry) ;
		$re_treatment_plast = htmlspecialchars($re_treatment_plast) ;
		$progression_ap_plast = htmlspecialchars($progression_ap_plast) ;  
		$date_ap_plast = htmlspecialchars($date_ap_plast) ;      //*******   เพิ่มทีหลัง
		$death_plast = htmlspecialchars($death_plast) ;  
		$date_death = htmlspecialchars($date_death) ;   //*******   เพิ่มทีหลัง
		$cause_death = htmlspecialchars($cause_death) ;  


$result = mysql_query( "update ".TB_ADD_DATA." SET  date_assessment_plast='$date_assessment_plast',current_treatment='$current_treatment' , specify_plast='$specify_plast' ,  daily_dose_plast='$daily_dose_plast'  , number_treatment_plast='$number_treatment_plast', dora_registry='$dora_registry', re_treatment_plast='$re_treatment_plast', progression_ap_plast='$progression_ap_plast' , date_ap_plast='$date_ap_plast'  , death_plast='$death_plast', date_death='$date_death' ,  cause_death='$cause_death' ,edit_date='$edit_date',edit_month='$edit_month', edit_year='$edit_year' , edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=last_follow_up'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>