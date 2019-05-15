<?
session_start() ;
if(!session_is_registered("login_true")) {
exit() ;
echo " bgcolor=FFFFFF";
}
### จบการเช็ค ###
?>
<? include "modules/index/header.php" ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title></title>
</head>
<body>
<h1>บันทึกข้อมูลเสร็จแล้ว</h1>

                <?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$member_id= $dbarr["member_id"];
echo  $dbarr['member_id'] ;
?>
	<? date_default_timezone_set("Asia/Bangkok"); ?><br />
	<? 
						$date_today = date("d/m/");
						$date_today1 = date("Y")+'543';
						$string = $date_today1;
						$date_small = $date_today.substr($string,2);
					?>
					<? 
						$date_todayone = date("d");
						$date_todaymonth = date("m");
						$date_today9 = date("Y")+'543';
						$string1 = $date_today9;
						$date_small9 = substr($string1,2).$date_todaymonth.$date_todayone;
					?>
				<? 
				$date_today11 = date("d");
				$m_today12 = date("m");
				
				$date = $_POST["date_today11"];
                 $Title=$_POST["Title"];
				?>
                      <? 
	$date=$date_today11;
	$month=$m_today12;
	$year=$date_today9;
	?>
<?
	
?>
  
  <?  	
  require_once("includes/add_data.php");
															mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");
												
												// เลือกฐานข้อมูล
												mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
												// คำสั่ง SQL และสั่งให้ทำงาน
												$sql = "insert into  $tblname (code_id,fl,sex,date_birth,province,treatment,career,date_diagnostic,diagnosis,diagnosis_i,cytogenetics,cytogenetics_i,cbc,cbci,cbcii,cbciii,bm_don,bmi,organ,organ_i,organ_ii,organ_iv,organ_vv,organ_ivv,organ_vvv,organ_ivvv,organ_vvvv,ecog,cap,capi,capii,initial,anthracycline,reponse_i,response_i_i,second,secondi,secondii,responseii,post_remission,post_remissioni_i,post_remissionii,post_remissionii_i,post_remissioniv,post_remissioniv_iv,post_remissionvv,post_remissionvv_vv,post_remissionivv,post_yn,yeari,yeari_i,yearii,yearii_ii,initial_induction,initial_induction_i,anthracycline_i,differentiatine,response_i,second_induction,second_induction_i,response_ii,consolidation,consolidation_i,consolidation_ii,consolidation_iv,consolidation_vv,response_co,maintenance,year_followi,year_followi_i,year_follow_up,year_follow_date,member_id,date,month,year) values ('$code_id','$fl','$sex','$date_birth','$province','$treatment','$career','$date_diagnostic','$diagnosis','$diagnosis_i','$cytogenetics','$cytogenetics_i','$cbc','$cbci','$cbcii','$cbciii','$bm_don','$bmi','$organ','$organ_i','$organ_ii','$organ_iv','$organ_vv','$organ_ivv','$organ_vvv','$organ_ivvv','$organ_vvvv','$ecog','$cap','$capi','$capii','$initial','$anthracycline','$reponse_i','$response_i_i','$second','$secondi','$secondii','$responseii','$post_remission','$post_remissioni_i','$post_remissionii','$post_remissionii_i','$post_remissioniv','$post_remissioniv_iv','$post_remissionvv','$post_remissionvv_vv','$post_remissionivv','$post_yn','$yeari','$yeari_i','$yearii','$yearii_ii','$initial_induction','$initial_induction_i','$anthracycline_i','$differentiatine','$response_i','$second_induction','$second_induction_i','$response_ii','$consolidation','$consolidation_i','$consolidation_ii','$consolidation_iv','$consolidation_vv','$response_co','$maintenance','$year_followi','$year_followi_i','$year_follow_up','$year_follow_date','$member_id','$date','$month','$year')" ;
												mysql_query("SET NAMES tis620");
												$dbquery = mysql_db_query($dbname, $sql);
												mysql_close();			
									?>				
                <?
       echo "<center><font size=\"3\" face='MS Sans Serif'><b>ข้อมูลของคุณ ได้ถูกบันทึกแล้วครับ</b></font><BR><BR><BR><BR><BR><BR><BR><BR></center>" ;
		echo "<meta http-equiv='refresh' content='5; url=index.php'>" ;

				?>
								   
</body>
</html>
   
