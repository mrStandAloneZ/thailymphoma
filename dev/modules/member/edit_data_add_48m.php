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
		$date_of_assessment_48m = $_POST["date_of_assessment_48m"];
		$month_of_assessment_48m = $_POST["month_of_assessment_48m"];
		$year_of_assessment_48m = $_POST["year_of_assessment_48m"];
		$duration_48m = $_POST["duration_48m"];
		$treatment_48m = $_POST["treatment_48m"];			
		$daily_dose_48m = $_POST["daily_dose_48m"];		
		$spleen_size_48m = $_POST["spleen_size_48m"];		
	    $hb_48m = $_POST["hb_48m"];
		$wbc_48m = $_POST["wbc_48m"];		
		$platelet_count2_48m = $_POST["platelet_count2_48m"];		
		$basophil2_48m = $_POST["basophil2_48m"];		
		$eosinophil2_48m = $_POST["eosinophil2_48m"];		
		$blast_cell2_48m = $_POST["blast_cell2_48m"];		
		$result_p2_48m = $_POST["result_p2_48m"];		
		$ph_chromosome_p2_48m = $_POST["ph_chromosome_p2_48m"];		
		$number_metaphase_p2_48m = $_POST["number_metaphase_p2_48m"];		
		$add_chrom_p2_48m = $_POST["add_chrom_p2_48m"];		
		$rq_pcr_48m = $_POST["rq_pcr_48m"];
		$re_treatment_p2_48m = $_POST["re_treatment_p2_48m"];
		$p_treatment_c_48m = $_POST["p_treatment_c_48m"];
		$change_treatment_48m = $_POST["change_treatment_48m"];
		$date_change_treatment_48m = $_POST["date_change_treatment_48m"];
		$specify_tr_48m = $_POST["specify_tr_48m"];
		$reason_chang_48m = $_POST["reason_chang_48m"];
		$specify_reson_48m = $_POST["specify_reson_48m"];
		$progress_ap_48m = $_POST["progress_ap_48m"];
		
		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_of_assessment_48m = htmlspecialchars($date_of_assessment_48m) ;  
$duration_48m = htmlspecialchars($duration_48m) ;
$treatment_48m = htmlspecialchars($treatment_48m) ;
$daily_dose_48m = htmlspecialchars($daily_dose_48m) ;
$spleen_size_48m = htmlspecialchars($spleen_size_48m) ;
$hb_48m = htmlspecialchars($hb_48m) ;
$wbc_48m = htmlspecialchars($wbc_48m) ;
$platelet_count2_48m = htmlspecialchars($platelet_count2_48m) ;
$basophil2_48m = htmlspecialchars($basophil2_48m) ;
$eosinophil2_48m = htmlspecialchars($eosinophil2_48m) ;
$blast_cell2 = htmlspecialchars($blast_cell2_48m) ;
$result_p2_48m = htmlspecialchars($result_p2_48m) ;
$ph_chromosome_p2_48m = htmlspecialchars($ph_chromosome_p2_48m) ;
$number_metaphase_p2_48m = htmlspecialchars($number_metaphase_p2_48m) ;
$add_chrom_p2_48m = htmlspecialchars($add_chrom_p2_48m) ;
$rq_pcr_48m = htmlspecialchars($rq_pcr_48m) ;
$re_treatment_p2_48m = htmlspecialchars($re_treatment_p2_48m) ;
$p_treatment_c_48m = htmlspecialchars($p_treatment_c_48m) ;
$change_treatment_48m = htmlspecialchars($change_treatment_48m) ;
$date_change_treatment_48m = htmlspecialchars($date_change_treatment_48m);
$specify_tr_48m = htmlspecialchars($specify_tr_48m) ;
$reason_chang_48m = htmlspecialchars($reason_chang_48m) ;
$specify_reson_48m = htmlspecialchars($specify_reson_48m) ;
$progress_ap_48m = htmlspecialchars($progress_ap_48m) ;



$result = mysql_query( "update ".TB_ADD_DATA." SET    date_of_assessment_48m='$date_of_assessment_48m',duration_48m='$duration_48m' ,treatment_48m='$treatment_48m',daily_dose_48m='$daily_dose_48m',spleen_size_48m='$spleen_size_48m',hb_48m='$hb_48m', wbc_48m='$wbc_48m',platelet_count_48m='$platelet_count_48m',basophil_48m='$basophil_48m',eosinophil_48m='$eosinophil_48m' ,blast_cell_48m='$blast_cell_48m', result_p2_48m='$result_p2_48m', ph_chromosome_p2_48m='$ph_chromosome_p2_48m',number_metaphase_p2_48m='$number_metaphase_p2_48m', add_chrom_p2_48m='$add_chrom_p2_48m',rq_pcr_48m='$rq_pcr_48m', re_treatment_p2_48m='$re_treatment_p2_48m', p_treatment_c_48m='$p_treatment_c_48m', change_treatment_48m='$change_treatment_48m' , date_change_treatment_48m='$date_change_treatment_48m', specify_tr_48m='$specify_tr_48m', reason_chang_48m='$reason_chang_48m',  specify_reson_48m='$specify_reson_48m', progress_ap_48m='$progress_ap_48m'  ,edit_date='$edit_date' ,edit_month='$edit_month' ,edit_year='$edit_year',edit_member='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='3; url=?name=member&file=48mo'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>