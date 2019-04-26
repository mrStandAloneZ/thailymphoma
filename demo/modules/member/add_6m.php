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
		$date_of_assessment_6m = $_POST["date_of_assessment_6m"];
		$month_of_assessment_6m = $_POST["month_of_assessment_6m"];
		$year_of_assessment_6m = $_POST["year_of_assessment_6m"];
		$duration_6m = $_POST["duration_6m"];
		$treatment_6m = $_POST["treatment_6m"];			
		$daily_dose_6m = $_POST["daily_dose_6m"];		
		$spleen_size_6m = $_POST["spleen_size_6m"];		
	    $hb_6m = $_POST["hb_6m"];
		$wbc_6m = $_POST["wbc_6m"];		
		$platelet_count2_6m = $_POST["platelet_count2_6m"];		
		$basophil2_6m = $_POST["basophil2_6m"];		
		$eosinophil2_6m = $_POST["eosinophil2_6m"];		
		$blast_cell2_6m = $_POST["blast_cell2_6m"];		
		$result_p2_6m = $_POST["result_p2_6m"];		
		$ph_chromosome_p2_6m = $_POST["ph_chromosome_p2_6m"];		
		$number_metaphase_p2_6m = $_POST["number_metaphase_p2_6m"];		
		$add_chrom_p2_6m = $_POST["add_chrom_p2_6m"];		
		$rq_pcr_6m = $_POST["rq_pcr_6m"];
		$re_treatment_p2_6m = $_POST["re_treatment_p2_6m"];
		$p_treatment_c_6m = $_POST["p_treatment_c_6m"];
		$change_treatment_6m = $_POST["change_treatment_6m"];
		$date_change_treatment_6m = $_POST["date_change_treatment_6m"];
		$specify_tr_6m = $_POST["specify_tr_6m"];
		$reason_chang_6m = $_POST["reason_chang_6m"];
		$specify_reson_6m = $_POST["specify_reson_6m"];
		$progress_ap_6m = $_POST["progress_ap_6m"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_6m = htmlspecialchars($date_of_assessment_6m) ;  
$duration_6m = htmlspecialchars($duration_6m) ;
$treatment_6m = htmlspecialchars($treatment_6m) ;
$daily_dose_6m = htmlspecialchars($daily_dose_6m) ;
$spleen_size_6m = htmlspecialchars($spleen_size_6m) ;
$hb_6m = htmlspecialchars($hb_6m) ;
$wbc_6m = htmlspecialchars($wbc_6m) ;
$platelet_count2_6m = htmlspecialchars($platelet_count2_6m) ;
$basophil2_6m = htmlspecialchars($basophil2_6m) ;
$eosinophil2_6m = htmlspecialchars($eosinophil2_6m) ;
$blast_cell2 = htmlspecialchars($blast_cell2_6m) ;
$result_p2_6m = htmlspecialchars($result_p2_6m) ;
$ph_chromosome_p2_6m = htmlspecialchars($ph_chromosome_p2_6m) ;
$number_metaphase_p2_6m = htmlspecialchars($number_metaphase_p2_6m) ;
$add_chrom_p2_6m = htmlspecialchars($add_chrom_p2_6m) ;
$rq_pcr_6m = htmlspecialchars($rq_pcr_6m) ;
$re_treatment_p2_6m = htmlspecialchars($re_treatment_p2_6m) ;
$p_treatment_c_6m = htmlspecialchars($p_treatment_c_6m) ;
$change_treatment_6m = htmlspecialchars($change_treatment_6m) ;
$date_change_treatment_6m = htmlspecialchars($date_change_treatment_6m);
$specify_tr_6m = htmlspecialchars($specify_tr_6m) ;
$reason_chang_6m = htmlspecialchars($reason_chang_6m) ;
$specify_reson_6m = htmlspecialchars($specify_reson_6m) ;
$progress_ap_6m = htmlspecialchars($progress_ap_6m) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET    date_of_assessment_6m='$date_of_assessment_6m',duration_6m='$duration_6m' ,treatment_6m='$treatment_6m',daily_dose_6m='$daily_dose_6m',spleen_size_6m='$spleen_size_6m',hb_6m='$hb_6m', wbc_6m='$wbc_6m',platelet_count_6m='$platelet_count_6m',basophil_6m='$basophil_6m',eosinophil_6m='$eosinophil_6m' ,blast_cell_6m='$blast_cell_6m', result_p2_6m='$result_p2_6m', ph_chromosome_p2_6m='$ph_chromosome_p2_6m',number_metaphase_p2_6m='$number_metaphase_p2_6m', add_chrom_p2_6m='$add_chrom_p2_6m',rq_pcr_6m='$rq_pcr_6m', re_treatment_p2_6m='$re_treatment_p2_6m', p_treatment_c_6m='$p_treatment_c_6m', change_treatment_6m='$change_treatment_6m' , date_change_treatment_6m='$date_change_treatment_6m', specify_tr_6m='$specify_tr_6m', reason_chang_6m='$reason_chang_6m',  specify_reson_6m='$specify_reson_6m', progress_ap_6m='$progress_ap_6m'  ,edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=6mo'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>