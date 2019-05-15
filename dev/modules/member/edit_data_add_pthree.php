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
		$date_of_assessment_s = $_POST["date_of_assessment_s"];
		$duration_s = $_POST["duration_s"];   
		$mutation_an_s = $_POST["mutation_an_s"];     ////เพิ่มใหม่
		$mutation_date_s = $_POST["mutation_date_s"];    ///  เพิ่มใหม่    
		$m_result_s = $_POST["m_result_s"];    ///   ///  เพิ่มใหม่   
		$m_resule_specify_s = $_POST["m_resule_specify_s"];    /// /  เพิ่มใหม่   
		$treatment_s = $_POST["treatment_s"];			
		$treatment_specify_s = $_POST["treatment_specify_s"];			  ///  เพิ่มใหม่   
		$daily_dose_s = $_POST["daily_dose_s"];		  
		$start_date_s = $_POST["start_date_s"];   ///   เพิ่มใหม่   
		$result_s = $_POST["result_s"];		
		$ph_chromosome_s = $_POST["ph_chromosome_s"];		
		$number_metaphase_s = $_POST["number_metaphase_s"];		
		$add_chrom_s = $_POST["add_chrom_s"];		
		$rq_pcr_s = $_POST["rq_pcr_s"];
		$re_treatment_s = $_POST["re_treatment_s"];
		$p_treatment_c_s = $_POST["p_treatment_c_s"];
		$change_treatment_s = $_POST["change_treatment_s"];
		$date_change_treatment_s = $_POST["date_change_treatment_s"];
		$specify_tr_s = $_POST["specify_tr_s"];
		$reason_chang_s = $_POST["reason_chang_s"];
		$specify_reson_s = $_POST["specify_reson_s"];
		$progress_ap_s = $_POST["progress_ap_s"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_s = htmlspecialchars($date_of_assessment_s) ;  
$duration_s = htmlspecialchars($duration_s) ;  
$mutation_an_s = htmlspecialchars($mutation_an_s) ;
$mutation_date_s = htmlspecialchars($mutation_date_s) ;
$m_result_s = htmlspecialchars($m_result_s) ;
$m_result_specify_s = htmlspecialchars($m_result_specify_s) ;
$treatment_s = htmlspecialchars($treatment_s) ;
$treatment_specify_s = htmlspecialchars($treatment_specify_s) ;
$daily_dose_s = htmlspecialchars($daily_dose_s) ;
$start_date_s = htmlspecialchars($start_date_s) ;
$result_s = htmlspecialchars($result_s) ;
$ph_chromosome_s = htmlspecialchars($ph_chromosome_s) ;
$number_metaphase_s = htmlspecialchars($number_metaphase_s) ;
$add_chrom_s = htmlspecialchars($add_chrom_s) ;
$rq_pcr_s = htmlspecialchars($rq_pcr_s) ;
$re_treatment_s = htmlspecialchars($re_treatment_s) ;
$p_treatment_c_s = htmlspecialchars($p_treatment_c_s) ;
$change_treatment_s = htmlspecialchars($change_treatment_s) ;
$date_change_treatment_s = htmlspecialchars($date_change_treatment_s);
$month_change_treatment_s = htmlspecialchars($month_change_treatment_s) ;
$year_change_treatment_s = htmlspecialchars($year_change_treatment_s) ;
$specify_tr_s = htmlspecialchars($specify_tr_s) ;
$reason_chang_s = htmlspecialchars($reason_chang_s) ;
$specify_reson_s = htmlspecialchars($specify_reson_s) ;
$progress_ap_s = htmlspecialchars($progress_ap_s) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET  date_of_assessment_s='$date_of_assessment_s',duration_s='$duration_s',mutation_an_s='$mutation_an_s',mutation_date_s='$mutation_date_s' ,m_result_s='$m_result_s',m_result_specify_s='$m_result_specify_s',treatment_s='$treatment_s',treatment_specify_s='$treatment_specify_s',daily_dose_s='$daily_dose_s',start_date_s='$start_date_s', result_s='$result_s', ph_chromosome_s='$ph_chromosome_s',number_metaphase_s='$number_metaphase_s', add_chrom_s='$add_chrom_s',rq_pcr_s='$rq_pcr_s', re_treatment_s='$re_treatment_s', p_treatment_c_s='$p_treatment_c_s', change_treatment_s='$change_treatment_s' , date_change_treatment_s='$date_change_treatment_s', specify_tr_s='$specify_tr_s', reason_chang_s='$reason_chang_s',  specify_reson_s='$specify_reson_s', progress_ap_s='$progress_ap_s' , edit_date='$edit_date', edit_month='$edit_month', edit_year='$edit_year' , edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=second_lind_tr'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>