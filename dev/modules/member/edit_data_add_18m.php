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
		$date_of_assessment_18m = $_POST["date_of_assessment_18m"];
		$month_of_assessment_18m = $_POST["month_of_assessment_18m"];
		$year_of_assessment_18m = $_POST["year_of_assessment_18m"];
		$duration_18m = $_POST["duration_18m"];
		$treatment_18m = $_POST["treatment_18m"];			
		$daily_dose_18m = $_POST["daily_dose_18m"];		
		$spleen_size_18m = $_POST["spleen_size_18m"];		
	    $hb_18m = $_POST["hb_18m"];
		$wbc_18m = $_POST["wbc_18m"];		
		$platelet_count2_18m = $_POST["platelet_count2_18m"];		
		$basophil2_18m = $_POST["basophil2_18m"];		
		$eosinophil2_18m = $_POST["eosinophil2_18m"];		
		$blast_cell2_18m = $_POST["blast_cell2_18m"];		
		$result_p2_18m = $_POST["result_p2_18m"];		
		$ph_chromosome_p2_18m = $_POST["ph_chromosome_p2_18m"];		
		$number_metaphase_p2_18m = $_POST["number_metaphase_p2_18m"];		
		$add_chrom_p2_18m = $_POST["add_chrom_p2_18m"];		
		$rq_pcr_18m = $_POST["rq_pcr_18m"];
		$re_treatment_p2_18m = $_POST["re_treatment_p2_18m"];
		$p_treatment_c_18m = $_POST["p_treatment_c_18m"];
		$change_treatment_18m = $_POST["change_treatment_18m"];
		$date_change_treatment_18m = $_POST["date_change_treatment_18m"];
		$specify_tr_18m = $_POST["specify_tr_18m"];
		$reason_chang_18m = $_POST["reason_chang_18m"];
		$specify_reson_18m = $_POST["specify_reson_18m"];
		$progress_ap_18m = $_POST["progress_ap_18m"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_18m = htmlspecialchars($date_of_assessment_18m) ;  
$duration_18m = htmlspecialchars($duration_18m) ;
$treatment_18m = htmlspecialchars($treatment_18m) ;
$daily_dose_18m = htmlspecialchars($daily_dose_18m) ;
$spleen_size_18m = htmlspecialchars($spleen_size_18m) ;
$hb_18m = htmlspecialchars($hb_18m) ;
$wbc_18m = htmlspecialchars($wbc_18m) ;
$platelet_count2_18m = htmlspecialchars($platelet_count2_18m) ;
$basophil2_18m = htmlspecialchars($basophil2_18m) ;
$eosinophil2_18m = htmlspecialchars($eosinophil2_18m) ;
$blast_cell2 = htmlspecialchars($blast_cell2_18m) ;
$result_p2_18m = htmlspecialchars($result_p2_18m) ;
$ph_chromosome_p2_18m = htmlspecialchars($ph_chromosome_p2_18m) ;
$number_metaphase_p2_18m = htmlspecialchars($number_metaphase_p2_18m) ;
$add_chrom_p2_18m = htmlspecialchars($add_chrom_p2_18m) ;
$rq_pcr_18m = htmlspecialchars($rq_pcr_18m) ;
$re_treatment_p2_18m = htmlspecialchars($re_treatment_p2_18m) ;
$p_treatment_c_18m = htmlspecialchars($p_treatment_c_18m) ;
$change_treatment_18m = htmlspecialchars($change_treatment_18m) ;
$date_change_treatment_18m = htmlspecialchars($date_change_treatment_18m);
$specify_tr_18m = htmlspecialchars($specify_tr_18m) ;
$reason_chang_18m = htmlspecialchars($reason_chang_18m) ;
$specify_reson_18m = htmlspecialchars($specify_reson_18m) ;
$progress_ap_18m = htmlspecialchars($progress_ap_18m) ;

$result = mysql_query( "update ".TB_ADD_DATA." SET    date_of_assessment_18m='$date_of_assessment_18m',duration_18m='$duration_18m' ,treatment_18m='$treatment_18m',daily_dose_18m='$daily_dose_18m',spleen_size_18m='$spleen_size_18m',hb_18m='$hb_18m', wbc_18m='$wbc_18m',platelet_count_18m='$platelet_count_18m',basophil_18m='$basophil_18m',eosinophil_18m='$eosinophil_18m' ,blast_cell_18m='$blast_cell_18m', result_p2_18m='$result_p2_18m', ph_chromosome_p2_18m='$ph_chromosome_p2_18m',number_metaphase_p2_18m='$number_metaphase_p2_18m', add_chrom_p2_18m='$add_chrom_p2_18m',rq_pcr_18m='$rq_pcr_18m', re_treatment_p2_18m='$re_treatment_p2_18m', p_treatment_c_18m='$p_treatment_c_18m', change_treatment_18m='$change_treatment_18m' , date_change_treatment_18m='$date_change_treatment_18m', specify_tr_18m='$specify_tr_18m', reason_chang_18m='$reason_chang_18m',  specify_reson_18m='$specify_reson_18m', progress_ap_18m='$progress_ap_18m'  ,edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=18mo'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>