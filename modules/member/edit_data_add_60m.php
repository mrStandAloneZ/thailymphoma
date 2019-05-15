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


	$id= $_POST["id"];
		$centre= $_POST["centre"];
		$subject= $_POST["subject"];
		$patient_initials = $_POST["patient_initials"];
		$date_of_assessment_60m = $_POST["date_of_assessment_60m"];
		$month_of_assessment_60m = $_POST["month_of_assessment_60m"];
		$year_of_assessment_60m = $_POST["year_of_assessment_60m"];
		$duration_60m = $_POST["duration_60m"];
		$treatment_60m = $_POST["treatment_60m"];			
		$daily_dose_60m = $_POST["daily_dose_60m"];		
		$spleen_size_60m = $_POST["spleen_size_60m"];		
	    $hb_60m = $_POST["hb_60m"];
		$wbc_60m = $_POST["wbc_60m"];		
		$platelet_count2_60m = $_POST["platelet_count2_60m"];		
		$basophil2_60m = $_POST["basophil2_60m"];		
		$eosinophil2_60m = $_POST["eosinophil2_60m"];		
		$blast_cell2_60m = $_POST["blast_cell2_60m"];		
		$result_p2_60m = $_POST["result_p2_60m"];		
		$ph_chromosome_p2_60m = $_POST["ph_chromosome_p2_60m"];		
		$number_metaphase_p2_60m = $_POST["number_metaphase_p2_60m"];		
		$add_chrom_p2_60m = $_POST["add_chrom_p2_60m"];		
		$rq_pcr_60m = $_POST["rq_pcr_60m"];
		$re_treatment_p2_60m = $_POST["re_treatment_p2_60m"];
		$p_treatment_c_60m = $_POST["p_treatment_c_60m"];
		$change_treatment_60m = $_POST["change_treatment_60m"];
		$date_change_treatment_60m = $_POST["date_change_treatment_60m"];
		$specify_tr_60m = $_POST["specify_tr_60m"];
		$reason_chang_60m = $_POST["reason_chang_60m"];
		$specify_reson_60m = $_POST["specify_reson_60m"];
		$progress_ap_60m = $_POST["progress_ap_60m"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_60m = htmlspecialchars($date_of_assessment_60m) ;  
$duration_60m = htmlspecialchars($duration_60m) ;
$treatment_60m = htmlspecialchars($treatment_60m) ;
$daily_dose_60m = htmlspecialchars($daily_dose_60m) ;
$spleen_size_60m = htmlspecialchars($spleen_size_60m) ;
$hb_60m = htmlspecialchars($hb_60m) ;
$wbc_60m = htmlspecialchars($wbc_60m) ;
$platelet_count2_60m = htmlspecialchars($platelet_count2_60m) ;
$basophil2_60m = htmlspecialchars($basophil2_60m) ;
$eosinophil2_60m = htmlspecialchars($eosinophil2_60m) ;
$blast_cell2 = htmlspecialchars($blast_cell2_60m) ;
$result_p2_60m = htmlspecialchars($result_p2_60m) ;
$ph_chromosome_p2_60m = htmlspecialchars($ph_chromosome_p2_60m) ;
$number_metaphase_p2_60m = htmlspecialchars($number_metaphase_p2_60m) ;
$add_chrom_p2_60m = htmlspecialchars($add_chrom_p2_60m) ;
$rq_pcr_60m = htmlspecialchars($rq_pcr_60m) ;
$re_treatment_p2_60m = htmlspecialchars($re_treatment_p2_60m) ;
$p_treatment_c_60m = htmlspecialchars($p_treatment_c_60m) ;
$change_treatment_60m = htmlspecialchars($change_treatment_60m) ;
$date_change_treatment_60m = htmlspecialchars($date_change_treatment_60m);
$specify_tr_60m = htmlspecialchars($specify_tr_60m) ;
$reason_chang_60m = htmlspecialchars($reason_chang_60m) ;
$specify_reson_60m = htmlspecialchars($specify_reson_60m) ;
$progress_ap_60m = htmlspecialchars($progress_ap_60m) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET    date_of_assessment_60m='$date_of_assessment_60m',duration_60m='$duration_60m' ,treatment_60m='$treatment_60m',daily_dose_60m='$daily_dose_60m',spleen_size_60m='$spleen_size_60m',hb_60m='$hb_60m', wbc_60m='$wbc_60m',platelet_count_60m='$platelet_count_60m',basophil_60m='$basophil_60m',eosinophil_60m='$eosinophil_60m' ,blast_cell_60m='$blast_cell_60m', result_p2_60m='$result_p2_60m', ph_chromosome_p2_60m='$ph_chromosome_p2_60m',number_metaphase_p2_60m='$number_metaphase_p2_60m', add_chrom_p2_60m='$add_chrom_p2_60m',rq_pcr_60m='$rq_pcr_60m', re_treatment_p2_60m='$re_treatment_p2_60m', p_treatment_c_60m='$p_treatment_c_60m', change_treatment_60m='$change_treatment_60m' , date_change_treatment_60m='$date_change_treatment_60m', specify_tr_60m='$specify_tr_60m', reason_chang_60m='$reason_chang_60m',  specify_reson_60m='$specify_reson_60m', progress_ap_60m='$progress_ap_60m'  ,edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=60mo'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>