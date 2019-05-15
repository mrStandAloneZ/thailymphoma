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
		$date_record_follow6 = $_POST["date_record_follow6"];
		$date_chemo_follow6 = $_POST["date_chemo_follow6"];
		$chemo_select_follow6 = $_POST["chemo_select_follow6"];
		$chemo_select_follow6_other = $_POST["chemo_select_follow6_other"];
		$received_follow6 = $_POST["received_follow6"];
		$date_immun_follow6 = $_POST["date_immun_follow6"];
		$immun_select_follow6 = $_POST["immun_select_follow6"];
		$rituximab_1_6 = $_POST["rituximab_1_6"];
		$rituximab_2_6 = $_POST["rituximab_2_6"];
		$immun_other_text6 = $_POST["immun_other_text6"];
		$date_rad_follow6 = $_POST["date_rad_follow6"];	
		$date_surgery_follow6 = $_POST["date_surgery_follow6"];	
		$no_treatment_follow6 = $_POST["no_treatment_follow6"];	
		$result_follow6 = $_POST["result_follow6"];	
		$date_complete_follow6 = $_POST["date_complete_follow6"];	
		$result_cause_follow6 = $_POST["result_cause_follow6"];	
		$progression_follow6 = $_POST["progression_follow6"];	
		$date_progression_follow6 = $_POST["date_progression_follow6"];	
		$histology_follow6 = $_POST["histology_follow6"];	
		$lymphnode_follow6 = $_POST["lymphnode_follow6"];	
		$extranodal_follow6 = $_POST["extranodal_follow6"];	
		$extr_1_follow6 = $_POST["extr_1_follow6"];	
		$extr_2_follow6 = $_POST["extr_2_follow6"];	
		$extr_3_follow6 = $_POST["extr_3_follow6"];	
		$extr_4_follow6 = $_POST["extr_4_follow6"];	
		$extr_5_follow6 = $_POST["extr_5_follow6"];	
		$extr_6_follow6 = $_POST["extr_6_follow6"];	
		$extr_7_follow6 = $_POST["extr_7_follow6"];	
		$extr_8_follow6 = $_POST["extr_8_follow6"];	
		$extr_9_follow6 = $_POST["extr_9_follow6"];	
		$extr_10_follow6 = $_POST["extr_10_follow6"];	
		$extr_11_follow6 = $_POST["extr_11_follow6"];	
		$extr_12_follow6 = $_POST["extr_12_follow6"];	
		$extr_13_follow6 = $_POST["extr_13_follow6"];	
		$extr_14_follow6 = $_POST["extr_14_follow6"];	
		$extr_15_follow6 = $_POST["extr_15_follow6"];	
		$extr_16_follow6 = $_POST["extr_16_follow6"];	
		$extr_17_follow6 = $_POST["extr_17_follow6"];	
		$extr_other6 = $_POST["extr_other6"];	
		$extr_other_text6 = $_POST["extr_other_text6"];	
		$salvage_follow6 = $_POST["salvage_follow6"];	
		$chemo_follow6_1 = $_POST["chemo_follow6_1"];	
		$chemo_follow6_2 = $_POST["chemo_follow6_2"];	
		$chemo_follow6_3 = $_POST["chemo_follow6_3"];	
		$chemo_follow6_4 = $_POST["chemo_follow6_4"];	
		$chemo_follow6_5 = $_POST["chemo_follow6_5"];	
		$chemo_follow6_6 = $_POST["chemo_follow6_6"];	
		$chemo_follow6_7 = $_POST["chemo_follow6_7"];	
		$chemo_follow6_8 = $_POST["chemo_follow6_8"];	
		$chemo_follow6_9 = $_POST["chemo_follow6_9"];	
		$chemo_follow6_10 = $_POST["chemo_follow6_10"];	
		$chemo_follow6_11 = $_POST["chemo_follow6_11"];	
		$chemo_follow6_12 = $_POST["chemo_follow6_12"];	
		$chemo_follow6_13 = $_POST["chemo_follow6_13"];	
		$chemo_follow6_14 = $_POST["chemo_follow6_14"];	
		$chemo_follow6_15 = $_POST["chemo_follow6_15"];	
		$chemo_follow6_16 = $_POST["chemo_follow6_16"];	
		$chemo_follow6_17 = $_POST["chemo_follow6_17"];	
		$chemo_follow6_18 = $_POST["chemo_follow6_18"];	
		$chemo_follow6_19 = $_POST["chemo_follow6_19"];	
		$chemo_follow6_20 = $_POST["chemo_follow6_20"];	
		$chemo_follow6_21 = $_POST["chemo_follow6_21"];	
		$chemo_follow6_22 = $_POST["chemo_follow6_22"];	
		$chemo_follow6_23 = $_POST["chemo_follow6_23"];	
		$chemo_follow6_24 = $_POST["chemo_follow6_24"];	
		$chemo_follow6_25 = $_POST["chemo_follow6_25"];	
		$chemo_follow6_26 = $_POST["chemo_follow6_26"];	
		$chemo_follow6_27 = $_POST["chemo_follow6_27"];	
		$chemo_follow6_28 = $_POST["chemo_follow6_28"];	
		$chemo_follow6_29 = $_POST["chemo_follow6_29"];	
		$chemo_other_follow6_29 = $_POST["chemo_other_follow6_29"];	
		$sal_immun_1_6 = $_POST["sal_immun_1_6"];	
		$sal_immun_2_6 = $_POST["sal_immun_2_6"];	
		$sal_immun_3_6 = $_POST["sal_immun_3_6"];	
		$sal_immun_4_6 = $_POST["sal_immun_4_6"];	
		$sal_immun_4_text6 = $_POST["sal_immun_4_text6"];	
		$sal_radio_follow6 = $_POST["sal_radio_follow6"];	
		$sal_surgery_follow6 = $_POST["sal_surgery_follow6"];	
		$stem_cell_follow6 = $_POST["stem_cell_follow6"];	
		$date_stem_cell_follow6 = $_POST["date_stem_cell_follow6"];	
		$stem_cell_method6 = $_POST["stem_cell_method6"];	
		$conditioning6 = $_POST["conditioning6"];	
		$donor_follow6 = $_POST["donor_follow6"];	
		$donor_follow6_other = $_POST["donor_follow6_other"];	
		$date_last_contact_follow6 = $_POST["date_last_contact_follow6"];	
		$status_follow6 = $_POST["status_follow6"];	
		$alive_status6 = $_POST["alive_status6"];	
		$date_dead_follow6 = $_POST["date_dead_follow6"];	
		$cause_of_dead6 = $_POST["cause_of_dead6"];	
		$cause_of_dead_other6 = $_POST["cause_of_dead_other6"];	
		$lymphoma_status6 = $_POST["lymphoma_status6"];	


		
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_record_follow6 = htmlspecialchars($date_record_follow6) ;  
$date_chemo_follow6 = htmlspecialchars($date_chemo_follow6) ;
$chemo_select_follow6 = htmlspecialchars($chemo_select_follow6) ;
$chemo_select_follow6_other = htmlspecialchars($chemo_select_follow6_other) ;
$received_follow6 = htmlspecialchars($received_follow6) ;
$date_immun_follow6 = htmlspecialchars($date_immun_follow6) ;
$immun_select_follow6 = htmlspecialchars($immun_select_follow6) ;
$rituximab_1_6 = htmlspecialchars($rituximab_1_6) ;
$rituximab_2_6 = htmlspecialchars($rituximab_2_6) ;
$immun_other_text6 = htmlspecialchars($immun_other_text6) ;
$date_rad_follow6 = htmlspecialchars($date_rad_follow6) ;
$date_surgery_follow6 = htmlspecialchars($date_surgery_follow6) ;
$no_treatment_follow6 = htmlspecialchars($no_treatment_follow6) ;
$result_follow6 = htmlspecialchars($result_follow6) ;
$date_complete_follow6 = htmlspecialchars($date_complete_follow6) ;
$result_cause_follow6 = htmlspecialchars($result_cause_follow6) ;
$progression_follow6 = htmlspecialchars($progression_follow6) ;
$date_progression_follow6 = htmlspecialchars($date_progression_follow6) ;
$histology_follow6 = htmlspecialchars($histology_follow6) ;
$lymphnode_follow6 = htmlspecialchars($lymphnode_follow6) ;
$extranodal_follow6 = htmlspecialchars($extranodal_follow6) ;
$extr_1_follow6 = htmlspecialchars($extr_1_follow6) ;
$extr_2_follow6 = htmlspecialchars($extr_2_follow6) ;
$extr_3_follow6 = htmlspecialchars($extr_3_follow6) ;
$extr_4_follow6 = htmlspecialchars($extr_4_follow6) ;
$extr_5_follow6 = htmlspecialchars($extr_5_follow6) ;
$extr_6_follow6 = htmlspecialchars($extr_6_follow6) ;
$extr_7_follow6 = htmlspecialchars($extr_7_follow6) ;
$extr_8_follow6 = htmlspecialchars($extr_8_follow6) ;
$extr_9_follow6 = htmlspecialchars($extr_9_follow6) ;
$extr_10_follow6 = htmlspecialchars($extr_10_follow6) ;
$extr_11_follow6 = htmlspecialchars($extr_11_follow6) ;
$extr_12_follow6 = htmlspecialchars($extr_12_follow6) ;
$extr_13_follow6 = htmlspecialchars($extr_13_follow6) ;
$extr_14_follow6 = htmlspecialchars($extr_14_follow6) ;
$extr_15_follow6 = htmlspecialchars($extr_15_follow6) ;
$extr_16_follow6 = htmlspecialchars($extr_16_follow6) ;
$extr_17_follow6 = htmlspecialchars($extr_17_follow6) ;
$extr_other6 = htmlspecialchars($extr_other6) ;
$extr_other_text6 = htmlspecialchars($extr_other_text6) ;
$salvage_follow6 = htmlspecialchars($salvage_follow6) ;
$chemo_follow6_1 = htmlspecialchars($chemo_follow6_1) ;
$chemo_follow6_2 = htmlspecialchars($chemo_follow6_2) ;
$chemo_follow6_3 = htmlspecialchars($chemo_follow6_3) ;
$chemo_follow6_4 = htmlspecialchars($chemo_follow6_4) ;
$chemo_follow6_5 = htmlspecialchars($chemo_follow6_5) ;
$chemo_follow6_6 = htmlspecialchars($chemo_follow6_6) ;
$chemo_follow6_7 = htmlspecialchars($chemo_follow6_7) ;
$chemo_follow6_8 = htmlspecialchars($chemo_follow6_8) ;
$chemo_follow6_9 = htmlspecialchars($chemo_follow6_9) ;
$chemo_follow6_10 = htmlspecialchars($chemo_follow6_10) ;
$chemo_follow6_11 = htmlspecialchars($chemo_follow6_11) ;
$chemo_follow6_12 = htmlspecialchars($chemo_follow6_12) ;
$chemo_follow6_13 = htmlspecialchars($chemo_follow6_13) ;
$chemo_follow6_14 = htmlspecialchars($chemo_follow6_14) ;
$chemo_follow6_15 = htmlspecialchars($chemo_follow6_15) ;
$chemo_follow6_16 = htmlspecialchars($chemo_follow6_16) ;
$chemo_follow6_17 = htmlspecialchars($chemo_follow6_17) ;
$chemo_follow6_18 = htmlspecialchars($chemo_follow6_18) ;
$chemo_follow6_19 = htmlspecialchars($chemo_follow6_19) ;
$chemo_follow6_20 = htmlspecialchars($chemo_follow6_20) ;
$chemo_follow6_21 = htmlspecialchars($chemo_follow6_21) ;
$chemo_follow6_22 = htmlspecialchars($chemo_follow6_22) ;
$chemo_follow6_23 = htmlspecialchars($chemo_follow6_23) ;
$chemo_follow6_24 = htmlspecialchars($chemo_follow6_24) ;
$chemo_follow6_25 = htmlspecialchars($chemo_follow6_25) ;
$chemo_follow6_26 = htmlspecialchars($chemo_follow6_26) ;
$chemo_follow6_27 = htmlspecialchars($chemo_follow6_27) ;
$chemo_follow6_28 = htmlspecialchars($chemo_follow6_28) ;
$chemo_follow6_29 = htmlspecialchars($chemo_follow6_29) ;
$chemo_other_follow6_29 = htmlspecialchars($chemo_other_follow6_29) ;
$sal_immun_1_6 = htmlspecialchars($sal_immun_1_6) ;
$sal_immun_2_6 = htmlspecialchars($sal_immun_2_6) ;
$sal_immun_3_6 = htmlspecialchars($sal_immun_3_6) ;
$sal_immun_4_6 = htmlspecialchars($sal_immun_4_6) ;
$sal_immun_4_text6 = htmlspecialchars($sal_immun_4_text6) ;
$sal_radio_follow6 = htmlspecialchars($sal_radio_follow6) ;
$sal_surgery_follow6 = htmlspecialchars($sal_surgery_follow6) ;
$stem_cell_follow6 = htmlspecialchars($stem_cell_follow6) ;
$date_stem_cell_follow6 = htmlspecialchars($date_stem_cell_follow6) ;
$stem_cell_method6 = htmlspecialchars($stem_cell_method6) ;
$conditioning6 = htmlspecialchars($conditioning6) ;
$donor_follow6 = htmlspecialchars($donor_follow6) ;
$donor_follow6_other = htmlspecialchars($donor_follow6_other) ;
$date_last_contact_follow6 = htmlspecialchars($date_last_contact_follow6) ;
$status_follow6 = htmlspecialchars($status_follow6) ;
$alive_status6 = htmlspecialchars($alive_status6) ;
$date_dead_follow6 = htmlspecialchars($date_dead_follow6) ;
$cause_of_dead6 = htmlspecialchars($cause_of_dead6) ;
$cause_of_dead_other6 = htmlspecialchars($cause_of_dead_other6) ;
$lymphoma_status6 = htmlspecialchars($lymphoma_status6) ;




$result = mysql_query( "update ".TB_ADD_DATA." SET  date_record_follow6='$date_record_follow6' ,	
date_chemo_follow6 = '$date_chemo_follow6',
 chemo_select_follow6 = '$chemo_select_follow6', 
 chemo_select_follow6_other ='$chemo_select_follow6_other',
 received_follow6 = '$received_follow6',
 date_immun_follow6='$date_immun_follow6' ,
 immun_select_follow6 = '$immun_select_follow6',
 rituximab_1_6 = '$rituximab_1_6',
 rituximab_2_6 = '$rituximab_2_6',
 immun_other_text6 = '$immun_other_text6',
 date_rad_follow6 = '$date_rad_follow6',
 date_surgery_follow6 = '$date_surgery_follow6',
 no_treatment_follow6 = '$no_treatment_follow6',
 result_follow6 = '$result_follow6',
 date_complete_follow6 = '$date_complete_follow6',
result_cause_follow6 = '$result_cause_follow6',
progression_follow6 = '$progression_follow6',
date_progression_follow6 = '$date_progression_follow6',
histology_follow6 = '$histology_follow6',
lymphnode_follow6 = '$lymphnode_follow6',
extranodal_follow6 = '$extranodal_follow6',
extr_1_follow6 = '$extr_1_follow6',
extr_2_follow6 = '$extr_2_follow6',
extr_3_follow6 = '$extr_3_follow6',
extr_4_follow6 = '$extr_4_follow6',
extr_5_follow6 = '$extr_5_follow6',
extr_6_follow6 = '$extr_6_follow6',
extr_7_follow6 = '$extr_7_follow6',
extr_8_follow6 = '$extr_8_follow6',
extr_9_follow6 = '$extr_9_follow6',
extr_10_follow6 = '$extr_10_follow6',
extr_11_follow6 = '$extr_11_follow6',
extr_12_follow6 = '$extr_12_follow6',
extr_13_follow6 = '$extr_13_follow6',
extr_14_follow6 = '$extr_14_follow6',
extr_15_follow6 = '$extr_15_follow6',
extr_16_follow6 = '$extr_16_follow6',
extr_17_follow6 = '$extr_17_follow6',
extr_other6 = '$extr_other6',
extr_other_text6 = '$extr_other_text6',
salvage_follow6 = '$salvage_follow6',
chemo_follow6_1 = '$chemo_follow6_1',
chemo_follow6_2 = '$chemo_follow6_2',
chemo_follow6_3 = '$chemo_follow6_3',
chemo_follow6_4 = '$chemo_follow6_4',
chemo_follow6_5 = '$chemo_follow6_5',
chemo_follow6_6 = '$chemo_follow6_6',
chemo_follow6_7 = '$chemo_follow6_7',
chemo_follow6_8 = '$chemo_follow6_8',
chemo_follow6_9 = '$chemo_follow6_9',
chemo_follow6_10 = '$chemo_follow6_10',
chemo_follow6_11 = '$chemo_follow6_11',
chemo_follow6_12 = '$chemo_follow6_12',
chemo_follow6_13 = '$chemo_follow6_13',
chemo_follow6_14 = '$chemo_follow6_14',
chemo_follow6_15 = '$chemo_follow6_15',
chemo_follow6_16 = '$chemo_follow6_16',
chemo_follow6_17 = '$chemo_follow6_17',
chemo_follow6_18 = '$chemo_follow6_18',
chemo_follow6_19 = '$chemo_follow6_19',
chemo_follow6_20 = '$chemo_follow6_20',
chemo_follow6_21 = '$chemo_follow6_21',
chemo_follow6_22 = '$chemo_follow6_22',
chemo_follow6_23 = '$chemo_follow6_23',
chemo_follow6_24 = '$chemo_follow6_24',
chemo_follow6_25 = '$chemo_follow6_25',
chemo_follow6_26 = '$chemo_follow6_26',
chemo_follow6_27 = '$chemo_follow6_27',
chemo_follow6_28 = '$chemo_follow6_28',
chemo_follow6_29 = '$chemo_follow6_29',
chemo_other_follow6_29 = '$chemo_other_follow6_29',
sal_immun_1_6 = '$sal_immun_1_6',
sal_immun_2_6 = '$sal_immun_2_6',
sal_immun_3_6 = '$sal_immun_3_6',
sal_immun_4_6 = '$sal_immun_4_6',
sal_immun_4_text6 = '$sal_immun_4_text6',
sal_radio_follow6 = '$sal_radio_follow6',
sal_surgery_follow6 = '$sal_surgery_follow6',
stem_cell_follow6 = '$stem_cell_follow6',
date_stem_cell_follow6 = '$date_stem_cell_follow6',
stem_cell_method6 = '$stem_cell_method6',
conditioning6 = '$conditioning6',
donor_follow6 = '$donor_follow6',
donor_follow6_other = '$donor_follow6_other',
date_last_contact_follow6 = '$date_last_contact_follow6',
status_follow6 = '$status_follow6',
alive_status6 = '$alive_status6',
date_dead_follow6 = '$date_dead_follow6',
cause_of_dead6 = '$cause_of_dead6',
cause_of_dead_other6 = '$cause_of_dead_other6',
lymphoma_status6 = '$lymphoma_status6',
edit_member_follow6='$edit_member',
edit_date_follow6='$date_small9'
  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='2; url=?name=member&file=follow_up6month&id=$id'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>