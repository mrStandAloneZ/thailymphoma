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
		$date_of_assessment_t = $_POST["date_of_assessment_t"];
		$duration_t = $_POST["duration_t"];
		$mutation_an_t = $_POST["mutation_an_t"];
		$mutation_date_t = $_POST["mutation_date_t"];
		$result_mu_t = $_POST["result_mu_t"];
		$duration_t = $_POST["re_specify_t"];
		$treatment_t = $_POST["treatment_t"];			
		$daily_dose_t = $_POST["daily_dose_t"];		
		$start_date_t = $_POST["start_date_t"];		
		$result_t = $_POST["result_t"];		
		$ph_chromosome_t = $_POST["ph_chromosome_t"];		
		$number_metaphase_t = $_POST["number_metaphase_t"];		
		$add_chrom_t = $_POST["add_chrom_t"];		
		$rq_pcr_t = $_POST["rq_pcr_t"];
		$re_treatment_t = $_POST["re_treatment_t"];
		$p_treatment_c_t = $_POST["p_treatment_c_t"];
		$change_treatment_t = $_POST["change_treatment_t"];
		$date_change_treatment_t = $_POST["date_change_treatment_t"];
		$specify_tr_t = $_POST["specify_tr_t"];
		$reason_chang_t = $_POST["reason_chang_t"];
		$specify_reson_t = $_POST["specify_reson_t"];		
		$progress_ap_t = $_POST["progress_ap_t"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_t = htmlspecialchars($date_of_assessment_t) ;  
$duration_t = htmlspecialchars($duration_t) ;
$mutation_an_t = htmlspecialchars($mutation_an_t) ;   
$mutation_date_t = htmlspecialchars($mutation_date_t) ;
$result_mu_t = htmlspecialchars($result_mu_t) ;  
$re_specify_t = htmlspecialchars($re_specify_t) ;  
$treatment_t = htmlspecialchars($treatment_t) ;      
$treatment_specify_t = htmlspecialchars($treatment_specify_t) ;    
$daily_dose_t = htmlspecialchars($daily_dose_t) ;
$start_date_t = htmlspecialchars($start_date_t) ;
$result_t = htmlspecialchars($result_t) ;
$ph_chromosome_t = htmlspecialchars($ph_chromosome_t) ;
$number_metaphase_t = htmlspecialchars($number_metaphase_t) ;
$add_chrom_t = htmlspecialchars($add_chrom_t) ;
$rq_pcr_t = htmlspecialchars($rq_pcr_t) ;
$re_treatment_t = htmlspecialchars($re_treatment_t) ;
$p_treatment_c_t = htmlspecialchars($p_treatment_c_t) ;
$change_treatment_t = htmlspecialchars($change_treatment_t) ;
$date_change_treatment_t = htmlspecialchars($date_change_treatment_t);
$specify_tr_t = htmlspecialchars($specify_tr_t) ;
$reason_chang_t = htmlspecialchars($reason_chang_t) ;
$specify_reson_t = htmlspecialchars($specify_reson_t) ;
$progress_ap_t = htmlspecialchars($progress_ap_t) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET  date_of_assessment_t='$date_of_assessment_t', duration_t='$duration_t' , mutation_an_t='$mutation_an_t', mutation_date_t='$mutation_date_t', result_mu_t='$result_mu_t', re_specify_t='$re_specify_t',treatment_t='$treatment_t', treatment_specify_t
='$treatment_specify_t
',daily_dose_t='$daily_dose_t', start_date_t='$start_date_t', result_t='$result_t', ph_chromosome_t='$ph_chromosome_t',number_metaphase_t='$number_metaphase_t', add_chrom_t='$add_chrom_t' ,rq_pcr_t='$rq_pcr_t', re_treatment_t='$re_treatment_t', p_treatment_c_t='$p_treatment_c_t', change_treatment_t='$change_treatment_t' , date_change_treatment_t='$date_change_treatment_t',  specify_tr_t='$specify_tr_t', reason_chang_t='$reason_chang_t',  specify_reson_t='$specify_reson_t', progress_ap_t='$progress_ap_t' , edit_date='$edit_date', edit_month='$edit_month', edit_year='$edit_year' , edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");	
echo $duration_t ;
	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=third_lind_tr'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>