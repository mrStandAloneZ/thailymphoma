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
		$date_assesment_p10= $_POST["date_assesment_p10"];
		$prc_p10= $_POST["prc_p10"];
		$prc_date_p10= $_POST["prc_date_p10"];
		$ery_p10= $_POST["ery_p10"];
		$ery_type_p10= $_POST["ery_type_p10"];
		$ery_date_p10= $_POST["ery_date_p10"];
		$andro_p10= $_POST["andro_p10"];
		$danazol_p10= $_POST["danazol_p10"];
		$danazol_date_p10= $_POST["danazol_date_p10"];
		$oyx_p10= $_POST["oyx_p10"];
		$oyx_date_p10= $_POST["oyx_date_p10"];
		$pre_p10= $_POST["pre_p10"];
		$pre_date_p10= $_POST["pre_date_p10"];
		$imm_p10= $_POST["imm_p10"];
		$thal_p10= $_POST["thal_p10"];
		$thal_date_p10= $_POST["thal_date_p10"];
		$len_p10= $_POST["len_p10"];
		$len_date_p10= $_POST["len_date_p10"];
		$hyd_p10= $_POST["hyd_p10"];
		$hyd_date_p10= $_POST["hyd_date_p10"];
		$jak2_p10= $_POST["jak2_p10"];
		$jak2_date_p10= $_POST["jak2_date_p10"];
		$spl_p10= $_POST["spl_p10"];
		$spl_date_p10= $_POST["spl_date_p10"];
		$splenic_p10= $_POST["splenic_p10"];
		$splenic_date_p10= $_POST["splenic_date_p10"];
		$allo_p10= $_POST["allo_p10"];
		$allo_date_p10= $_POST["allo_date_p10"];
		$other_p10= $_POST["other_p10"];
		$other_text_p10= $_POST["other_text_p10"];
		$other_date_p10= $_POST["other_date_p10"];
		////////////////////////////////////////data new
		$date_ass_p16_follow6= $_POST["date_ass_p16_follow6"];
		$y1_p16_follow6= $_POST["y1_p16_follow6"];
		$stopdate1_p16_follow6= $_POST["stopdate1_p16_follow6"];
		$y2_p16_follow6= $_POST["y2_p16_follow6"];
		$stopdate2_p16_follow6= $_POST["stopdate2_p16_follow6"];
		$y3_p16_follow6= $_POST["y3_p16_follow6"];
		$stopdate3_p16_follow6= $_POST["stopdate3_p16_follow6"];
		$y4_p16_follow6= $_POST["y4_p16_follow6"];
		$stopdate4_p16_follow6= $_POST["stopdate4_p16_follow6"];
		$y5_p16_follow6= $_POST["y5_p16_follow6"];
		$stopdate5_p16_follow6= $_POST["stopdate5_p16_follow6"];
		$y6_p16_follow6= $_POST["y6_p16_follow6"];
		$stopdate6_p16_follow6= $_POST["stopdate6_p16_follow6"];
		$y7_p16_follow6= $_POST["y7_p16_follow6"];
		$stopdate7_p16_follow6= $_POST["stopdate7_p16_follow6"];
		$y8_p16_follow6= $_POST["y8_p16_follow6"];
		$stopdate8_p16_follow6= $_POST["stopdate8_p16_follow6"];
		$y9_p16_follow6= $_POST["y9_p16_follow6"];
		$stopdate9_p16_follow6= $_POST["stopdate9_p16_follow6"];
		$y10_p16_follow6= $_POST["y10_p16_follow6"];
		$stopdate10_p16_follow6= $_POST["stopdate10_p16_follow6"];
		$y11_p16_follow6= $_POST["y11_p16_follow6"];
		$stopdate11_p16_follow6= $_POST["stopdate11_p16_follow6"];
		$reason_p16_follow6= $_POST["reason_p16_follow6"];
		$adverse_textp16_follow6= $_POST["adverse_textp16_follow6"];
		$other_textp16_follow6= $_POST["other_textp16_follow6"];
	
	
$id = htmlspecialchars($id) ;
$date_assesment_p10 = htmlspecialchars($date_assesment_p10) ;
$prc_p10 = htmlspecialchars($prc_p10) ;
$prc_date_p10 = htmlspecialchars($prc_date_p10) ;
$ery_p10 = htmlspecialchars($ery_p10) ;
$ery_type_p10 = htmlspecialchars($ery_type_p10) ;
$ery_date_p10 = htmlspecialchars($ery_date_p10) ;
$andro_p10 = htmlspecialchars($andro_p10) ;
$danazol_p10 = htmlspecialchars($danazol_p10) ;
$oyx_p10 = htmlspecialchars($oyx_p10) ;
$danazol_date_p10 = htmlspecialchars($danazol_date_p10) ;
$oyx_date_p10 = htmlspecialchars($oyx_date_p10) ;
$pre_p10 = htmlspecialchars($pre_p10) ;
$pre_date_p10 = htmlspecialchars($pre_date_p10) ;
$imm_p10 = htmlspecialchars($imm_p10) ;
$thal_p10 = htmlspecialchars($thal_p10) ;
$len_p10 = htmlspecialchars($len_p10) ;
$thal_date_p10 = htmlspecialchars($thal_date_p10) ;
$len_date_p10 = htmlspecialchars($len_date_p10) ;
$hyd_p10 = htmlspecialchars($hyd_p10) ;
$hyd_date_p10 = htmlspecialchars($hyd_date_p10) ;
$jak2_p10 = htmlspecialchars($jak2_p10) ;
$jak2_date_p10 = htmlspecialchars($jak2_date_p10) ;
$spl_p10 = htmlspecialchars($spl_p10) ;
$spl_date_p10 = htmlspecialchars($spl_date_p10) ;
$splenic_p10 = htmlspecialchars($splenic_p10) ;
$splenic_date_p10 = htmlspecialchars($splenic_date_p10) ;
$allo_p10 = htmlspecialchars($allo_p10) ;
$allo_date_p10 = htmlspecialchars($allo_date_p10) ;
$other_p10 = htmlspecialchars($other_p10) ;
$other_text_p10 = htmlspecialchars($other_text_p10) ;
$other_date_p10 = htmlspecialchars($other_date_p10) ;
///////////////////---------------
$date_ass_p16_follow6 = htmlspecialchars($date_ass_p16_follow6) ;
$y1_p16_follow6 = htmlspecialchars($y1_p16_follow6) ;
$stopdate1_p16_follow6 = htmlspecialchars($stopdate1_p16_follow6) ;
$y2_p16_follow6 = htmlspecialchars($y2_p16_follow6) ;
$stopdate2_p16_follow6 = htmlspecialchars($stopdate2_p16_follow6) ;
$y3_p16_follow6 = htmlspecialchars($y3_p16_follow6) ;
$stopdate3_p16_follow6 = htmlspecialchars($stopdate3_p16_follow6) ;
$y4_p16_follow6 = htmlspecialchars($y4_p16_follow6) ;
$stopdate4_p16_follow6 = htmlspecialchars($stopdate4_p16_follow6) ;
$y5_p16_follow6 = htmlspecialchars($y5_p16_follow6) ;
$stopdate5_p16_follow6 = htmlspecialchars($stopdate5_p16_follow6) ;
$y6_p16_follow6 = htmlspecialchars($y6_p16_follow6) ;
$stopdate6_p16_follow6 = htmlspecialchars($stopdate6_p16_follow6) ;
$y7_p16_follow6 = htmlspecialchars($y7_p16_follow6) ;
$stopdate7_p16_follow6 = htmlspecialchars($stopdate7_p16_follow6) ;
$y8_p16_follow6 = htmlspecialchars($y8_p16_follow6) ;
$stopdate8_p16_follow6 = htmlspecialchars($stopdate8_p16_follow6) ;
$y9_p16_follow6 = htmlspecialchars($y9_p16_follow6) ;
$stopdate9_p16_follow6 = htmlspecialchars($stopdate9_p16_follow6) ;
$y10_p16_follow6 = htmlspecialchars($y10_p16_follow6) ;
$stopdate10_p16_follow6 = htmlspecialchars($stopdate10_p16_follow6) ;
$y11_p16_follow6 = htmlspecialchars($y11_p16_follow6) ;
$stopdate11_p16_follow6 = htmlspecialchars($stopdate11_p16_follow6) ;
$reason_p16_follow6 = htmlspecialchars($reason_p16_follow6) ;
$adverse_textp16_follow6 = htmlspecialchars($adverse_textp16_follow6) ;
$other_textp16_follow6 = htmlspecialchars($other_textp16_follow6) ;


$result = mysql_query( "update ".TB_ADD_DATA." SET  date_assesment_p10='$date_assesment_p10' ,	prc_p10='$prc_p10', prc_date_p10='$prc_date_p10', ery_p10='$ery_p10', ery_type_p10='$ery_type_p10', 	ery_date_p10='$ery_date_p10', andro_p10='$andro_p10',danazol_p10='$danazol_p10',oyx_p10='$oyx_p10',	danazol_date_p10='$danazol_date_p10',	oyx_date_p10='$oyx_date_p10',	pre_p10='$pre_p10',	pre_date_p10='$pre_date_p10',	imm_p10='$imm_p10',	thal_p10='$thal_p10',	len_p10='$len_p10',	thal_date_p10='$thal_date_p10',	len_date_p10='$len_date_p10',hyd_p10='$hyd_p10',hyd_date_p10='$hyd_date_p10',jak2_p10='$jak2_p10',jak2_date_p10='$jak2_date_p10',spl_p10='$spl_p10',spl_date_p10='$spl_date_p10',splenic_p10='$splenic_p10',splenic_date_p10='$splenic_date_p10'  ,allo_p10='$allo_p10',allo_date_p10='$allo_date_p10',other_p10='$other_p10',other_text_p10='$other_text_p10',other_date_p10='$other_date_p10'

,date_ass_p16_follow6='$date_ass_p16_follow6'
,y1_p16_follow6='$y1_p16_follow6'
,stopdate1_p16_follow6='$stopdate1_p16_follow6'
,y2_p16_follow6='$y2_p16_follow6'
,stopdate2_p16_follow6='$stopdate2_p16_follow6'
,y3_p16_follow6='$y3_p16_follow6'
,stopdate3_p16_follow6='$stopdate3_p16_follow6'
,y4_p16_follow6='$y4_p16_follow6'
,stopdate4_p16_follow6='$stopdate4_p16_follow6'
,y5_p16_follow6='$y5_p16_follow6'
,stopdate5_p16_follow6='$stopdate5_p16_follow6'
,y6_p16_follow6='$y6_p16_follow6'
,stopdate6_p16_follow6='$stopdate6_p16_follow6'
,y7_p16_follow6='$y7_p16_follow6'
,stopdate7_p16_follow6='$stopdate7_p16_follow6'
,y8_p16_follow6='$y8_p16_follow6'
,stopdate8_p16_follow6='$stopdate8_p16_follow6'
,y9_p16_follow6='$y9_p16_follow6'
,stopdate9_p16_follow6='$stopdate9_p16_follow6'
,y10_p16_follow6='$y10_p16_follow6'
,stopdate10_p16_follow6='$stopdate10_p16_follow6'
,y11_p16_follow6='$y11_p16_follow6'
,stopdate11_p16_follow6='$stopdate11_p16_follow6'
,edit_member_p16_follow6='$edit_member'
,reason_p16_follow6='$reason_p16_follow6'
,adverse_textp16_follow6='$adverse_textp16_follow6'
,other_textp16_follow6='$other_textp16_follow6'
 where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='1; url=?name=member&file=visit-followup'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>