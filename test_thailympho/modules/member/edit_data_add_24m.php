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
		$date_of_assessment_24m = $_POST["date_of_assessment_24m"];
		$month_of_assessment_24m = $_POST["month_of_assessment_24m"];
		$year_of_assessment_24m = $_POST["year_of_assessment_24m"];
		$duration_24m = $_POST["duration_24m"];
		$treatment_24m = $_POST["treatment_24m"];			
		$daily_dose_24m = $_POST["daily_dose_24m"];		
		$spleen_size_24m = $_POST["spleen_size_24m"];		
	    $hb_24m = $_POST["hb_24m"];
		$wbc_24m = $_POST["wbc_24m"];		
		$platelet_count2_24m = $_POST["platelet_count2_24m"];		
		$basophil2_24m = $_POST["basophil2_24m"];		
		$eosinophil2_24m = $_POST["eosinophil2_24m"];		
		$blast_cell2_24m = $_POST["blast_cell2_24m"];		
		$result_p2_24m = $_POST["result_p2_24m"];		
		$ph_chromosome_p2_24m = $_POST["ph_chromosome_p2_24m"];		
		$number_metaphase_p2_24m = $_POST["number_metaphase_p2_24m"];		
		$add_chrom_p2_24m = $_POST["add_chrom_p2_24m"];		
		$rq_pcr_24m = $_POST["rq_pcr_24m"];
		$re_treatment_p2_24m = $_POST["re_treatment_p2_24m"];
		$p_treatment_c_24m = $_POST["p_treatment_c_24m"];
		$change_treatment_24m = $_POST["change_treatment_24m"];
		$date_change_treatment_24m = $_POST["date_change_treatment_24m"];
		$specify_tr_24m = $_POST["specify_tr_24m"];
		$reason_chang_24m = $_POST["reason_chang_24m"];
		$specify_reson_24m = $_POST["specify_reson_24m"];
		$progress_ap_24m = $_POST["progress_ap_24m"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_24m = htmlspecialchars($date_of_assessment_24m) ;  
$duration_24m = htmlspecialchars($duration_24m) ;
$treatment_24m = htmlspecialchars($treatment_24m) ;
$daily_dose_24m = htmlspecialchars($daily_dose_24m) ;
$spleen_size_24m = htmlspecialchars($spleen_size_24m) ;
$hb_24m = htmlspecialchars($hb_24m) ;
$wbc_24m = htmlspecialchars($wbc_24m) ;
$platelet_count2_24m = htmlspecialchars($platelet_count2_24m) ;
$basophil2_24m = htmlspecialchars($basophil2_24m) ;
$eosinophil2_24m = htmlspecialchars($eosinophil2_24m) ;
$blast_cell2 = htmlspecialchars($blast_cell2_24m) ;
$result_p2_24m = htmlspecialchars($result_p2_24m) ;
$ph_chromosome_p2_24m = htmlspecialchars($ph_chromosome_p2_24m) ;
$number_metaphase_p2_24m = htmlspecialchars($number_metaphase_p2_24m) ;
$add_chrom_p2_24m = htmlspecialchars($add_chrom_p2_24m) ;
$rq_pcr_24m = htmlspecialchars($rq_pcr_24m) ;
$re_treatment_p2_24m = htmlspecialchars($re_treatment_p2_24m) ;
$p_treatment_c_24m = htmlspecialchars($p_treatment_c_24m) ;
$change_treatment_24m = htmlspecialchars($change_treatment_24m) ;
$date_change_treatment_24m = htmlspecialchars($date_change_treatment_24m);
$specify_tr_24m = htmlspecialchars($specify_tr_24m) ;
$reason_chang_24m = htmlspecialchars($reason_chang_24m) ;
$specify_reson_24m = htmlspecialchars($specify_reson_24m) ;
$progress_ap_24m = htmlspecialchars($progress_ap_24m) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET    date_of_assessment_24m='$date_of_assessment_24m',duration_24m='$duration_24m' ,treatment_24m='$treatment_24m',daily_dose_24m='$daily_dose_24m',spleen_size_24m='$spleen_size_24m',hb_24m='$hb_24m', wbc_24m='$wbc_24m',platelet_count_24m='$platelet_count_24m',basophil_24m='$basophil_24m',eosinophil_24m='$eosinophil_24m' ,blast_cell_24m='$blast_cell_24m', result_p2_24m='$result_p2_24m', ph_chromosome_p2_24m='$ph_chromosome_p2_24m',number_metaphase_p2_24m='$number_metaphase_p2_24m', add_chrom_p2_24m='$add_chrom_p2_24m',rq_pcr_24m='$rq_pcr_24m', re_treatment_p2_24m='$re_treatment_p2_24m', p_treatment_c_24m='$p_treatment_c_24m', change_treatment_24m='$change_treatment_24m' , date_change_treatment_24m='$date_change_treatment_24m', specify_tr_24m='$specify_tr_24m', reason_chang_24m='$reason_chang_24m',  specify_reson_24m='$specify_reson_24m', progress_ap_24m='$progress_ap_24m'  ,edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=24mo'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>