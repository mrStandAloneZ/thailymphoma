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
		$date_record_follow12 = $_POST["date_record_follow12"];
		$date_chemo_follow12 = $_POST["date_chemo_follow12"];
		$chemo_select_follow12 = $_POST["chemo_select_follow12"];
		$chemo_select_follow12_other = $_POST["chemo_select_follow12_other"];
		$received_follow12 = $_POST["received_follow12"];
		$date_immun_follow12 = $_POST["date_immun_follow12"];
		$immun_select_follow12 = $_POST["immun_select_follow12"];
		$rituximab_1_12 = $_POST["rituximab_1_12"];
		$rituximab_2_12 = $_POST["rituximab_2_12"];
		$immun_other_text12 = $_POST["immun_other_text12"];
		$date_rad_follow12 = $_POST["date_rad_follow12"];	
		$date_surgery_follow12 = $_POST["date_surgery_follow12"];	
		$no_treatment_follow12 = $_POST["no_treatment_follow12"];	
		$result_follow12 = $_POST["result_follow12"];	
		$date_complete_follow12 = $_POST["date_complete_follow12"];	
		$result_cause_follow12 = $_POST["result_cause_follow12"];	
		$progression_follow12 = $_POST["progression_follow12"];	
		$date_progression_follow12 = $_POST["date_progression_follow12"];	
		$histology_follow12 = $_POST["histology_follow12"];	
		$lymphnode_follow12 = $_POST["lymphnode_follow12"];	
		$extranodal_follow12 = $_POST["extranodal_follow12"];	
		$extr_1_follow12 = $_POST["extr_1_follow12"];	
		$extr_2_follow12 = $_POST["extr_2_follow12"];	
		$extr_3_follow12 = $_POST["extr_3_follow12"];	
		$extr_4_follow12 = $_POST["extr_4_follow12"];	
		$extr_5_follow12 = $_POST["extr_5_follow12"];	
		$extr_6_follow12 = $_POST["extr_6_follow12"];	
		$extr_7_follow12 = $_POST["extr_7_follow12"];	
		$extr_8_follow12 = $_POST["extr_8_follow12"];	
		$extr_9_follow12 = $_POST["extr_9_follow12"];	
		$extr_10_follow12 = $_POST["extr_10_follow12"];	
		$extr_11_follow12 = $_POST["extr_11_follow12"];	
		$extr_12_follow12 = $_POST["extr_12_follow12"];	
		$extr_13_follow12 = $_POST["extr_13_follow12"];	
		$extr_14_follow12 = $_POST["extr_14_follow12"];	
		$extr_15_follow12 = $_POST["extr_15_follow12"];	
		$extr_16_follow12 = $_POST["extr_16_follow12"];	
		$extr_17_follow12 = $_POST["extr_17_follow12"];	
		$extr_other12 = $_POST["extr_other12"];	
		$extr_other_text12 = $_POST["extr_other_text12"];	
		$salvage_follow12 = $_POST["salvage_follow12"];	
		$chemo_follow12_1 = $_POST["chemo_follow12_1"];	
		$chemo_follow12_2 = $_POST["chemo_follow12_2"];	
		$chemo_follow12_3 = $_POST["chemo_follow12_3"];	
		$chemo_follow12_4 = $_POST["chemo_follow12_4"];	
		$chemo_follow12_5 = $_POST["chemo_follow12_5"];	
		$chemo_follow12_6 = $_POST["chemo_follow12_6"];	
		$chemo_follow12_7 = $_POST["chemo_follow12_7"];	
		$chemo_follow12_8 = $_POST["chemo_follow12_8"];	
		$chemo_follow12_9 = $_POST["chemo_follow12_9"];	
		$chemo_follow12_10 = $_POST["chemo_follow12_10"];	
		$chemo_follow12_11 = $_POST["chemo_follow12_11"];	
		$chemo_follow12_12 = $_POST["chemo_follow12_12"];	
		$chemo_follow12_13 = $_POST["chemo_follow12_13"];	
		$chemo_follow12_14 = $_POST["chemo_follow12_14"];	
		$chemo_follow12_15 = $_POST["chemo_follow12_15"];	
		$chemo_follow12_16 = $_POST["chemo_follow12_16"];	
		$chemo_follow12_17 = $_POST["chemo_follow12_17"];	
		$chemo_follow12_18 = $_POST["chemo_follow12_18"];	
		$chemo_follow12_19 = $_POST["chemo_follow12_19"];	
		$chemo_follow12_20 = $_POST["chemo_follow12_20"];	
		$chemo_follow12_21 = $_POST["chemo_follow12_21"];	
		$chemo_follow12_22 = $_POST["chemo_follow12_22"];	
		$chemo_follow12_23 = $_POST["chemo_follow12_23"];	
		$chemo_follow12_24 = $_POST["chemo_follow12_24"];	
		$chemo_follow12_25 = $_POST["chemo_follow12_25"];	
		$chemo_follow12_26 = $_POST["chemo_follow12_26"];	
		$chemo_follow12_27 = $_POST["chemo_follow12_27"];	
		$chemo_follow12_28 = $_POST["chemo_follow12_28"];	
		$chemo_follow12_29 = $_POST["chemo_follow12_29"];	
		$chemo_other_follow12_29 = $_POST["chemo_other_follow12_29"];	
		$sal_immun_1_12 = $_POST["sal_immun_1_12"];	
		$sal_immun_2_12 = $_POST["sal_immun_2_12"];	
		$sal_immun_3_12 = $_POST["sal_immun_3_12"];	
		$sal_immun_4_12 = $_POST["sal_immun_4_12"];	
		$sal_immun_4_text12 = $_POST["sal_immun_4_text12"];	
		$sal_radio_follow12 = $_POST["sal_radio_follow12"];	
		$sal_surgery_follow12 = $_POST["sal_surgery_follow12"];	
		$stem_cell_follow12 = $_POST["stem_cell_follow12"];	
		$date_stem_cell_follow12 = $_POST["date_stem_cell_follow12"];	
		$stem_cell_method12 = $_POST["stem_cell_method12"];	
		$conditioning12 = $_POST["conditioning12"];	
		$donor_follow12 = $_POST["donor_follow12"];	
		$donor_follow12_other = $_POST["donor_follow12_other"];	
		$date_last_contact_follow12 = $_POST["date_last_contact_follow12"];	
		$status_follow12 = $_POST["status_follow12"];	
		$alive_status12 = $_POST["alive_status12"];	
		$date_dead_follow12 = $_POST["date_dead_follow12"];	
		$cause_of_dead12 = $_POST["cause_of_dead12"];	
		$cause_of_dead_other12 = $_POST["cause_of_dead_other12"];	
		$lymphoma_status12 = $_POST["lymphoma_status12"];	


		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_record_follow12 = htmlspecialchars($date_record_follow12) ;  
$date_chemo_follow12 = htmlspecialchars($date_chemo_follow12) ;
$chemo_select_follow12 = htmlspecialchars($chemo_select_follow12) ;
$chemo_select_follow12_other = htmlspecialchars($chemo_select_follow12_other) ;
$received_follow12 = htmlspecialchars($received_follow12) ;
$date_immun_follow12 = htmlspecialchars($date_immun_follow12) ;
$immun_select_follow12 = htmlspecialchars($immun_select_follow12) ;
$rituximab_1_12 = htmlspecialchars($rituximab_1_12) ;
$rituximab_2_12 = htmlspecialchars($rituximab_2_12) ;
$immun_other_text12 = htmlspecialchars($immun_other_text12) ;
$date_rad_follow12 = htmlspecialchars($date_rad_follow12) ;
$date_surgery_follow12 = htmlspecialchars($date_surgery_follow12) ;
$no_treatment_follow12 = htmlspecialchars($no_treatment_follow12) ;
$result_follow12 = htmlspecialchars($result_follow12) ;
$date_complete_follow12 = htmlspecialchars($date_complete_follow12) ;
$result_cause_follow12 = htmlspecialchars($result_cause_follow12) ;
$progression_follow12 = htmlspecialchars($progression_follow12) ;
$date_progression_follow12 = htmlspecialchars($date_progression_follow12) ;
$histology_follow12 = htmlspecialchars($histology_follow12) ;
$lymphnode_follow12 = htmlspecialchars($lymphnode_follow12) ;
$extranodal_follow12 = htmlspecialchars($extranodal_follow12) ;
$extr_1_follow12 = htmlspecialchars($extr_1_follow12) ;
$extr_2_follow12 = htmlspecialchars($extr_2_follow12) ;
$extr_3_follow12 = htmlspecialchars($extr_3_follow12) ;
$extr_4_follow12 = htmlspecialchars($extr_4_follow12) ;
$extr_5_follow12 = htmlspecialchars($extr_5_follow12) ;
$extr_6_follow12 = htmlspecialchars($extr_6_follow12) ;
$extr_7_follow12 = htmlspecialchars($extr_7_follow12) ;
$extr_8_follow12 = htmlspecialchars($extr_8_follow12) ;
$extr_9_follow12 = htmlspecialchars($extr_9_follow12) ;
$extr_10_follow12 = htmlspecialchars($extr_10_follow12) ;
$extr_11_follow12 = htmlspecialchars($extr_11_follow12) ;
$extr_12_follow12 = htmlspecialchars($extr_12_follow12) ;
$extr_13_follow12 = htmlspecialchars($extr_13_follow12) ;
$extr_14_follow12 = htmlspecialchars($extr_14_follow12) ;
$extr_15_follow12 = htmlspecialchars($extr_15_follow12) ;
$extr_16_follow12 = htmlspecialchars($extr_16_follow12) ;
$extr_17_follow12 = htmlspecialchars($extr_17_follow12) ;
$extr_other12 = htmlspecialchars($extr_other12) ;
$extr_other_text12 = htmlspecialchars($extr_other_text12) ;
$salvage_follow12 = htmlspecialchars($salvage_follow12) ;
$chemo_follow12_1 = htmlspecialchars($chemo_follow12_1) ;
$chemo_follow12_2 = htmlspecialchars($chemo_follow12_2) ;
$chemo_follow12_3 = htmlspecialchars($chemo_follow12_3) ;
$chemo_follow12_4 = htmlspecialchars($chemo_follow12_4) ;
$chemo_follow12_5 = htmlspecialchars($chemo_follow12_5) ;
$chemo_follow12_6 = htmlspecialchars($chemo_follow12_6) ;
$chemo_follow12_7 = htmlspecialchars($chemo_follow12_7) ;
$chemo_follow12_8 = htmlspecialchars($chemo_follow12_8) ;
$chemo_follow12_9 = htmlspecialchars($chemo_follow12_9) ;
$chemo_follow12_10 = htmlspecialchars($chemo_follow12_10) ;
$chemo_follow12_11 = htmlspecialchars($chemo_follow12_11) ;
$chemo_follow12_12 = htmlspecialchars($chemo_follow12_12) ;
$chemo_follow12_13 = htmlspecialchars($chemo_follow12_13) ;
$chemo_follow12_14 = htmlspecialchars($chemo_follow12_14) ;
$chemo_follow12_15 = htmlspecialchars($chemo_follow12_15) ;
$chemo_follow12_16 = htmlspecialchars($chemo_follow12_16) ;
$chemo_follow12_17 = htmlspecialchars($chemo_follow12_17) ;
$chemo_follow12_18 = htmlspecialchars($chemo_follow12_18) ;
$chemo_follow12_19 = htmlspecialchars($chemo_follow12_19) ;
$chemo_follow12_20 = htmlspecialchars($chemo_follow12_20) ;
$chemo_follow12_21 = htmlspecialchars($chemo_follow12_21) ;
$chemo_follow12_22 = htmlspecialchars($chemo_follow12_22) ;
$chemo_follow12_23 = htmlspecialchars($chemo_follow12_23) ;
$chemo_follow12_24 = htmlspecialchars($chemo_follow12_24) ;
$chemo_follow12_25 = htmlspecialchars($chemo_follow12_25) ;
$chemo_follow12_26 = htmlspecialchars($chemo_follow12_26) ;
$chemo_follow12_27 = htmlspecialchars($chemo_follow12_27) ;
$chemo_follow12_28 = htmlspecialchars($chemo_follow12_28) ;
$chemo_follow12_29 = htmlspecialchars($chemo_follow12_29) ;
$chemo_other_follow12_29 = htmlspecialchars($chemo_other_follow12_29) ;
$sal_immun_1_12 = htmlspecialchars($sal_immun_1_12) ;
$sal_immun_2_12 = htmlspecialchars($sal_immun_2_12) ;
$sal_immun_3_12 = htmlspecialchars($sal_immun_3_12) ;
$sal_immun_4_12 = htmlspecialchars($sal_immun_4_12) ;
$sal_immun_4_text12 = htmlspecialchars($sal_immun_4_text12) ;
$sal_radio_follow12 = htmlspecialchars($sal_radio_follow12) ;
$sal_surgery_follow12 = htmlspecialchars($sal_surgery_follow12) ;
$stem_cell_follow12 = htmlspecialchars($stem_cell_follow12) ;
$date_stem_cell_follow12 = htmlspecialchars($date_stem_cell_follow12) ;
$stem_cell_method12 = htmlspecialchars($stem_cell_method12) ;
$conditioning12 = htmlspecialchars($conditioning12) ;
$donor_follow12 = htmlspecialchars($donor_follow12) ;
$donor_follow12_other = htmlspecialchars($donor_follow12_other) ;
$date_last_contact_follow12 = htmlspecialchars($date_last_contact_follow12) ;
$status_follow12 = htmlspecialchars($status_follow12) ;
$alive_status12 = htmlspecialchars($alive_status12) ;
$date_dead_follow12 = htmlspecialchars($date_dead_follow12) ;
$cause_of_dead12 = htmlspecialchars($cause_of_dead12) ;
$cause_of_dead_other12 = htmlspecialchars($cause_of_dead_other12) ;
$lymphoma_status12 = htmlspecialchars($lymphoma_status12) ;




$result = mysql_query( "update ".TB_ADD_DATA." SET  date_record_follow12='$date_record_follow12' ,	
date_chemo_follow12 = '$date_chemo_follow12',
 chemo_select_follow12 = '$chemo_select_follow12', 
 chemo_select_follow12_other ='$chemo_select_follow12_other',
 received_follow12 = '$received_follow12',
 date_immun_follow12='$date_immun_follow12' ,
 immun_select_follow12 = '$immun_select_follow12',
 rituximab_1_12 = '$rituximab_1_12',
 rituximab_2_12 = '$rituximab_2_12',
 immun_other_text12 = '$immun_other_text12',
 date_rad_follow12 = '$date_rad_follow12',
 date_surgery_follow12 = '$date_surgery_follow12',
 no_treatment_follow12 = '$no_treatment_follow12',
 result_follow12 = '$result_follow12',
 date_complete_follow12 = '$date_complete_follow12',
result_cause_follow12 = '$result_cause_follow12',
progression_follow12 = '$progression_follow12',
date_progression_follow12 = '$date_progression_follow12',
histology_follow12 = '$histology_follow12',
lymphnode_follow12 = '$lymphnode_follow12',
extranodal_follow12 = '$extranodal_follow12',
extr_1_follow12 = '$extr_1_follow12',
extr_2_follow12 = '$extr_2_follow12',
extr_3_follow12 = '$extr_3_follow12',
extr_4_follow12 = '$extr_4_follow12',
extr_5_follow12 = '$extr_5_follow12',
extr_6_follow12 = '$extr_6_follow12',
extr_7_follow12 = '$extr_7_follow12',
extr_8_follow12 = '$extr_8_follow12',
extr_9_follow12 = '$extr_9_follow12',
extr_10_follow12 = '$extr_10_follow12',
extr_11_follow12 = '$extr_11_follow12',
extr_12_follow12 = '$extr_12_follow12',
extr_13_follow12 = '$extr_13_follow12',
extr_14_follow12 = '$extr_14_follow12',
extr_15_follow12 = '$extr_15_follow12',
extr_16_follow12 = '$extr_16_follow12',
extr_17_follow12 = '$extr_17_follow12',
extr_other12 = '$extr_other12',
extr_other_text12 = '$extr_other_text12',
salvage_follow12 = '$salvage_follow12',
chemo_follow12_1 = '$chemo_follow12_1',
chemo_follow12_2 = '$chemo_follow12_2',
chemo_follow12_3 = '$chemo_follow12_3',
chemo_follow12_4 = '$chemo_follow12_4',
chemo_follow12_5 = '$chemo_follow12_5',
chemo_follow12_6 = '$chemo_follow12_6',
chemo_follow12_7 = '$chemo_follow12_7',
chemo_follow12_8 = '$chemo_follow12_8',
chemo_follow12_9 = '$chemo_follow12_9',
chemo_follow12_10 = '$chemo_follow12_10',
chemo_follow12_11 = '$chemo_follow12_11',
chemo_follow12_12 = '$chemo_follow12_12',
chemo_follow12_13 = '$chemo_follow12_13',
chemo_follow12_14 = '$chemo_follow12_14',
chemo_follow12_15 = '$chemo_follow12_15',
chemo_follow12_16 = '$chemo_follow12_16',
chemo_follow12_17 = '$chemo_follow12_17',
chemo_follow12_18 = '$chemo_follow12_18',
chemo_follow12_19 = '$chemo_follow12_19',
chemo_follow12_20 = '$chemo_follow12_20',
chemo_follow12_21 = '$chemo_follow12_21',
chemo_follow12_22 = '$chemo_follow12_22',
chemo_follow12_23 = '$chemo_follow12_23',
chemo_follow12_24 = '$chemo_follow12_24',
chemo_follow12_25 = '$chemo_follow12_25',
chemo_follow12_26 = '$chemo_follow12_26',
chemo_follow12_27 = '$chemo_follow12_27',
chemo_follow12_28 = '$chemo_follow12_28',
chemo_follow12_29 = '$chemo_follow12_29',
chemo_other_follow12_29 = '$chemo_other_follow12_29',
sal_immun_1_12 = '$sal_immun_1_12',
sal_immun_2_12 = '$sal_immun_2_12',
sal_immun_3_12 = '$sal_immun_3_12',
sal_immun_4_12 = '$sal_immun_4_12',
sal_immun_4_text12 = '$sal_immun_4_text12',
sal_radio_follow12 = '$sal_radio_follow12',
sal_surgery_follow12 = '$sal_surgery_follow12',
stem_cell_follow12 = '$stem_cell_follow12',
date_stem_cell_follow12 = '$date_stem_cell_follow12',
stem_cell_method12 = '$stem_cell_method12',
conditioning12 = '$conditioning12',
donor_follow12 = '$donor_follow12',
donor_follow12_other = '$donor_follow12_other',
date_last_contact_follow12 = '$date_last_contact_follow12',
status_follow12 = '$status_follow12',
alive_status12 = '$alive_status12',
date_dead_follow12 = '$date_dead_follow12',
cause_of_dead12 = '$cause_of_dead12',
cause_of_dead_other12 = '$cause_of_dead_other12',
lymphoma_status12 = '$lymphoma_status12',
edit_member_follow12='$edit_member',
edit_date_follow12='$date_small9'
  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='2; url=?name=member&file=follow_up12month&id=$id'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>