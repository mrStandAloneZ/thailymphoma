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
		$date_of_assessment_9m = $_POST["date_of_assessment_9m"];
		$month_of_assessment_9m = $_POST["month_of_assessment_9m"];
		$year_of_assessment_9m = $_POST["year_of_assessment_9m"];
		$duration_9m = $_POST["duration_9m"];
		$treatment_9m = $_POST["treatment_9m"];			
		$daily_dose_9m = $_POST["daily_dose_9m"];		
		$spleen_size_9m = $_POST["spleen_size_9m"];		
	    $hb_9m = $_POST["hb_9m"];
		$wbc_9m = $_POST["wbc_9m"];		
		$platelet_count2_9m = $_POST["platelet_count2_9m"];		
		$basophil2_9m = $_POST["basophil2_9m"];		
		$eosinophil2_9m = $_POST["eosinophil2_9m"];		
		$blast_cell2_9m = $_POST["blast_cell2_9m"];		
		$result_p2_9m = $_POST["result_p2_9m"];		
		$ph_chromosome_p2_9m = $_POST["ph_chromosome_p2_9m"];		
		$number_metaphase_p2_9m = $_POST["number_metaphase_p2_9m"];		
		$add_chrom_p2_9m = $_POST["add_chrom_p2_9m"];		
		$rq_pcr_9m = $_POST["rq_pcr_9m"];
		$re_treatment_p2_9m = $_POST["re_treatment_p2_9m"];
		$p_treatment_c_9m = $_POST["p_treatment_c_9m"];
		$change_treatment_9m = $_POST["change_treatment_9m"];
		$date_change_treatment_9m = $_POST["date_change_treatment_9m"];
		$specify_tr_9m = $_POST["specify_tr_9m"];
		$reason_chang_9m = $_POST["reason_chang_9m"];
		$specify_reson_9m = $_POST["specify_reson_9m"];
		$progress_ap_9m = $_POST["progress_ap_9m"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_9m = htmlspecialchars($date_of_assessment_9m) ;  
$duration_9m = htmlspecialchars($duration_9m) ;
$treatment_9m = htmlspecialchars($treatment_9m) ;
$daily_dose_9m = htmlspecialchars($daily_dose_9m) ;
$spleen_size_9m = htmlspecialchars($spleen_size_9m) ;
$hb_9m = htmlspecialchars($hb_9m) ;
$wbc_9m = htmlspecialchars($wbc_9m) ;
$platelet_count2_9m = htmlspecialchars($platelet_count2_9m) ;
$basophil2_9m = htmlspecialchars($basophil2_9m) ;
$eosinophil2_9m = htmlspecialchars($eosinophil2_9m) ;
$blast_cell2 = htmlspecialchars($blast_cell2_9m) ;
$result_p2_9m = htmlspecialchars($result_p2_9m) ;
$ph_chromosome_p2_9m = htmlspecialchars($ph_chromosome_p2_9m) ;
$number_metaphase_p2_9m = htmlspecialchars($number_metaphase_p2_9m) ;
$add_chrom_p2_9m = htmlspecialchars($add_chrom_p2_9m) ;
$rq_pcr_9m = htmlspecialchars($rq_pcr_9m) ;
$re_treatment_p2_9m = htmlspecialchars($re_treatment_p2_9m) ;
$p_treatment_c_9m = htmlspecialchars($p_treatment_c_9m) ;
$change_treatment_9m = htmlspecialchars($change_treatment_9m) ;
$date_change_treatment_9m = htmlspecialchars($date_change_treatment_9m);
$specify_tr_9m = htmlspecialchars($specify_tr_9m) ;
$reason_chang_9m = htmlspecialchars($reason_chang_9m) ;
$specify_reson_9m = htmlspecialchars($specify_reson_9m) ;
$progress_ap_9m = htmlspecialchars($progress_ap_9m) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET    date_of_assessment_9m='$date_of_assessment_9m',duration_9m='$duration_9m' ,treatment_9m='$treatment_9m',daily_dose_9m='$daily_dose_9m',spleen_size_9m='$spleen_size_9m',hb_9m='$hb_9m', wbc_9m='$wbc_9m',platelet_count_9m='$platelet_count_9m',basophil_9m='$basophil_9m',eosinophil_9m='$eosinophil_9m' ,blast_cell_9m='$blast_cell_9m', result_p2_9m='$result_p2_9m', ph_chromosome_p2_9m='$ph_chromosome_p2_9m',number_metaphase_p2_9m='$number_metaphase_p2_9m', add_chrom_p2_9m='$add_chrom_p2_9m',rq_pcr_9m='$rq_pcr_9m', re_treatment_p2_9m='$re_treatment_p2_9m', p_treatment_c_9m='$p_treatment_c_9m', change_treatment_9m='$change_treatment_9m' , date_change_treatment_9m='$date_change_treatment_9m', specify_tr_9m='$specify_tr_9m', reason_chang_9m='$reason_chang_9m',  specify_reson_9m='$specify_reson_9m', progress_ap_9m='$progress_ap_9m'  ,edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=9mo'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>