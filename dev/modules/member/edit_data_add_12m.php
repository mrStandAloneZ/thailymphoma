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
		$date_of_assessment_12m = $_POST["date_of_assessment_12m"];
		$month_of_assessment_12m = $_POST["month_of_assessment_12m"];
		$year_of_assessment_12m = $_POST["year_of_assessment_12m"];
		$duration_12m = $_POST["duration_12m"];
		$treatment_12m = $_POST["treatment_12m"];			
		$daily_dose_12m = $_POST["daily_dose_12m"];		
		$spleen_size_12m = $_POST["spleen_size_12m"];		
	    $hb_12m = $_POST["hb_12m"];
		$wbc_12m = $_POST["wbc_12m"];		
		$platelet_count2_12m = $_POST["platelet_count2_12m"];		
		$basophil2_12m = $_POST["basophil2_12m"];		
		$eosinophil2_12m = $_POST["eosinophil2_12m"];		
		$blast_cell2_12m = $_POST["blast_cell2_12m"];		
		$result_p2_12m = $_POST["result_p2_12m"];		
		$ph_chromosome_p2_12m = $_POST["ph_chromosome_p2_12m"];		
		$number_metaphase_p2_12m = $_POST["number_metaphase_p2_12m"];		
		$add_chrom_p2_12m = $_POST["add_chrom_p2_12m"];		
		$rq_pcr_12m = $_POST["rq_pcr_12m"];
		$re_treatment_p2_12m = $_POST["re_treatment_p2_12m"];
		$p_treatment_c_12m = $_POST["p_treatment_c_12m"];
		$change_treatment_12m = $_POST["change_treatment_12m"];
		$date_change_treatment_12m = $_POST["date_change_treatment_12m"];
		$specify_tr_12m = $_POST["specify_tr_12m"];
		$reason_chang_12m = $_POST["reason_chang_12m"];
		$specify_reson_12m = $_POST["specify_reson_12m"];
		$progress_ap_12m = $_POST["progress_ap_12m"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_12m = htmlspecialchars($date_of_assessment_12m) ;  
$duration_12m = htmlspecialchars($duration_12m) ;
$treatment_12m = htmlspecialchars($treatment_12m) ;
$daily_dose_12m = htmlspecialchars($daily_dose_12m) ;
$spleen_size_12m = htmlspecialchars($spleen_size_12m) ;
$hb_12m = htmlspecialchars($hb_12m) ;
$wbc_12m = htmlspecialchars($wbc_12m) ;
$platelet_count2_12m = htmlspecialchars($platelet_count2_12m) ;
$basophil2_12m = htmlspecialchars($basophil2_12m) ;
$eosinophil2_12m = htmlspecialchars($eosinophil2_12m) ;
$blast_cell2 = htmlspecialchars($blast_cell2_12m) ;
$result_p2_12m = htmlspecialchars($result_p2_12m) ;
$ph_chromosome_p2_12m = htmlspecialchars($ph_chromosome_p2_12m) ;
$number_metaphase_p2_12m = htmlspecialchars($number_metaphase_p2_12m) ;
$add_chrom_p2_12m = htmlspecialchars($add_chrom_p2_12m) ;
$rq_pcr_12m = htmlspecialchars($rq_pcr_12m) ;
$re_treatment_p2_12m = htmlspecialchars($re_treatment_p2_12m) ;
$p_treatment_c_12m = htmlspecialchars($p_treatment_c_12m) ;
$change_treatment_12m = htmlspecialchars($change_treatment_12m) ;
$date_change_treatment_12m = htmlspecialchars($date_change_treatment_12m);
$specify_tr_12m = htmlspecialchars($specify_tr_12m) ;
$reason_chang_12m = htmlspecialchars($reason_chang_12m) ;
$specify_reson_12m = htmlspecialchars($specify_reson_12m) ;
$progress_ap_12m = htmlspecialchars($progress_ap_12m) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET    date_of_assessment_12m='$date_of_assessment_12m',duration_12m='$duration_12m' ,treatment_12m='$treatment_12m',daily_dose_12m='$daily_dose_12m',spleen_size_12m='$spleen_size_12m',hb_12m='$hb_12m', wbc_12m='$wbc_12m',platelet_count_12m='$platelet_count_12m',basophil_12m='$basophil_12m',eosinophil_12m='$eosinophil_12m' ,blast_cell_12m='$blast_cell_12m', result_p2_12m='$result_p2_12m', ph_chromosome_p2_12m='$ph_chromosome_p2_12m',number_metaphase_p2_12m='$number_metaphase_p2_12m', add_chrom_p2_12m='$add_chrom_p2_12m',rq_pcr_12m='$rq_pcr_12m', re_treatment_p2_12m='$re_treatment_p2_12m', p_treatment_c_12m='$p_treatment_c_12m', change_treatment_12m='$change_treatment_12m' , date_change_treatment_12m='$date_change_treatment_12m', specify_tr_12m='$specify_tr_12m', reason_chang_12m='$reason_chang_12m',  specify_reson_12m='$specify_reson_12m', progress_ap_12m='$progress_ap_12m'  ,edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=12mo'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>