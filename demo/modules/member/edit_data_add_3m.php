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
		$date_of_assessment_3m = $_POST["date_of_assessment_3m"];
		$month_of_assessment_3m = $_POST["month_of_assessment_3m"];
		$year_of_assessment_3m = $_POST["year_of_assessment_3m"];
		$duration_3m = $_POST["duration_3m"];
		$treatment_3m = $_POST["treatment_3m"];			
		$daily_dose_3m = $_POST["daily_dose_3m"];		
		$spleen_size_3m = $_POST["spleen_size_3m"];		
	    $hb_3m = $_POST["hb_3m"];
		$wbc_3m = $_POST["wbc_3m"];		
		$platelet_count2_3m = $_POST["platelet_count2_3m"];		
		$basophil2_3m = $_POST["basophil2_3m"];		
		$eosinophil2_3m = $_POST["eosinophil2_3m"];		
		$blast_cell2_3m = $_POST["blast_cell2_3m"];		
		$result_p2_3m = $_POST["result_p2_3m"];		
		$ph_chromosome_p2_3m = $_POST["ph_chromosome_p2_3m"];		
		$number_metaphase_p2_3m = $_POST["number_metaphase_p2_3m"];		
		$add_chrom_p2_3m = $_POST["add_chrom_p2_3m"];		
		$rq_pcr_3m = $_POST["rq_pcr_3m"];
		$re_treatment_p2_3m = $_POST["re_treatment_p2_3m"];
		$p_treatment_c_3m = $_POST["p_treatment_c_3m"];
		$change_treatment_3m = $_POST["change_treatment_3m"];
		$date_change_treatment_3m = $_POST["date_change_treatment_3m"];
		$specify_tr_3m = $_POST["specify_tr_3m"];
		$reason_chang_3m = $_POST["reason_chang_3m"];
		$specify_reson_3m = $_POST["specify_reson_3m"];
		$progress_ap_3m = $_POST["progress_ap_3m"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_3m = htmlspecialchars($date_of_assessment_3m) ;  
$duration_3m = htmlspecialchars($duration_3m) ;
$treatment_3m = htmlspecialchars($treatment_3m) ;
$daily_dose_3m = htmlspecialchars($daily_dose_3m) ;
$spleen_size_3m = htmlspecialchars($spleen_size_3m) ;
$hb_3m = htmlspecialchars($hb_3m) ;
$wbc_3m = htmlspecialchars($wbc_3m) ;
$platelet_count2_3m = htmlspecialchars($platelet_count2_3m) ;
$basophil2_3m = htmlspecialchars($basophil2_3m) ;
$eosinophil2_3m = htmlspecialchars($eosinophil2_3m) ;
$blast_cell2_3m = htmlspecialchars($blast_cell2_3m) ;
$result_p2_3m = htmlspecialchars($result_p2_3m) ;
$ph_chromosome_p2_3m = htmlspecialchars($ph_chromosome_p2_3m) ;
$number_metaphase_p2_3m = htmlspecialchars($number_metaphase_p2_3m) ;
$add_chrom_p2_3m = htmlspecialchars($add_chrom_p2_3m) ;
$rq_pcr_3m = htmlspecialchars($rq_pcr_3m) ;
$re_treatment_p2_3m = htmlspecialchars($re_treatment_p2_3m) ;
$p_treatment_c_3m = htmlspecialchars($p_treatment_c_3m) ;
$change_treatment_3m = htmlspecialchars($change_treatment_3m) ;
$date_change_treatment_3m = htmlspecialchars($date_change_treatment_3m);
$specify_tr_3m = htmlspecialchars($specify_tr_3m) ;
$reason_chang_3m = htmlspecialchars($reason_chang_3m) ;
$specify_reson_3m = htmlspecialchars($specify_reson_3m) ;
$progress_ap_3m = htmlspecialchars($progress_ap_3m) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET    date_of_assessment_3m='$date_of_assessment_3m',duration_3m='$duration_3m' ,treatment_3m='$treatment_3m',daily_dose_3m='$daily_dose_3m',spleen_size_3m='$spleen_size_3m',hb_3m='$hb_3m', wbc_3m='$wbc_3m',platelet_count_3m='$platelet_count_3m',basophil_3m='$basophil_3m',eosinophil_3m='$eosinophil_3m' ,blast_cell_3m='$blast_cell_3m', result_p2_3m='$result_p2_3m', ph_chromosome_p2_3m='$ph_chromosome_p2_3m',number_metaphase_p2_3m='$number_metaphase_p2_3m', add_chrom_p2_3m='$add_chrom_p2_3m',rq_pcr_3m='$rq_pcr_3m', re_treatment_p2_3m='$re_treatment_p2_3m', p_treatment_c_3m='$p_treatment_c_3m', change_treatment_3m='$change_treatment_3m' , date_change_treatment_3m='$date_change_treatment_3m', specify_tr_3m='$specify_tr_3m', reason_chang_3m='$reason_chang_3m',  specify_reson_3m='$specify_reson_3m', progress_ap_3m='$progress_ap_3m'  ,edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=3mo'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>