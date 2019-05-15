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
		$date_assesment_pmf= $_POST["date_assesment_pmf"];
		$diano_pri_1= $_POST["diano_pri_1"];
		$diano_pri_2= $_POST["diano_pri_2"];
		$diano_pri_3 = $_POST["diano_pri_3"];
		$diano_pri_4 = $_POST["diano_pri_4"];
		$diano_pri_5 = $_POST["diano_pri_5"];
		$diano_pri_6 = $_POST["diano_pri_6"];
		$diano_pri_7 = $_POST["diano_pri_7"];


	
		
$id = htmlspecialchars($id) ;
$date_assesment_pmf = htmlspecialchars($date_assesment_pmf) ;
$diano_pri_1 = htmlspecialchars($diano_pri_1) ;
$diano_pri_2 = htmlspecialchars($diano_pri_2) ;
$diano_pri_3 = htmlspecialchars($diano_pri_3) ;
$diano_pri_4 = htmlspecialchars($diano_pri_4) ;  
$diano_pri_5 = htmlspecialchars($diano_pri_5) ;
$diano_pri_6 = htmlspecialchars($diano_pri_6) ;
$diano_pri_7 = htmlspecialchars($diano_pri_7) ;




$result = mysql_query( "update ".TB_ADD_DATA." SET  date_assesment_pmf='$date_assesment_pmf' ,	diano_pri_1='$diano_pri_1', diano_pri_2='$diano_pri_2', diano_pri_3='$diano_pri_3', diano_pri_4='$diano_pri_4', 	diano_pri_5='$diano_pri_5', diano_pri_6='$diano_pri_6',diano_pri_7='$diano_pri_7',edit_member_pmf='$edit_member' where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>Update Data เรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านไปสู่หน้าถัดไป</b></font></center>" ;
	echo "<meta http-equiv='refresh' content='1; url=?name=member&file=page5&id=$id'>" ;

?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>