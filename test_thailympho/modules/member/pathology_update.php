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
		$date_bio_report = $_POST["date_bio_report"];
		$type = $_POST["type"];
		$type_sub_non = $_POST["type_sub_non"];
		$date_bio_report_pathology = $_POST["date_bio_report_pathology"];
		$pathology_pathology = $_POST["pathology_pathology"];
		$biopsy_site_pathology = $_POST["biopsy_site_pathology"];
		$type_pathology = $_POST["type_pathology"];
		$type_hodgkin_pathology = $_POST["type_hodgkin_pathology"];
		$immunophenotype_pathology = $_POST["immunophenotype_pathology"];
		$type_sub_non_pathology = $_POST["type_sub_non_pathology"];
		$who_sub_pathology = $_POST["who_sub_pathology"];
		$work_sub_pathology = $_POST["work_sub_pathology"];
		$other_type_pathology = $_POST["other_type_pathology"];

	
$id = htmlspecialchars($id) ;
$centre = htmlspecialchars($centre) ;
$subject = htmlspecialchars($subject) ;
$patient_initials = htmlspecialchars($patient_initials) ;
$date_bio_report = htmlspecialchars($date_bio_report) ;  
$pathology = htmlspecialchars($pathology) ;
$biopsy_site = htmlspecialchars($biopsy_site) ;
$type = htmlspecialchars($type) ;

$date_bio_report_pathology = htmlspecialchars($date_bio_report_pathology) ;
$pathology_pathology = htmlspecialchars($pathology_pathology) ;
$biopsy_site_pathology = htmlspecialchars($biopsy_site_pathology) ;
$type_pathology = htmlspecialchars($type_pathology) ;
$type_hodgkin_pathology = htmlspecialchars($type_hodgkin_pathology) ;
$immunophenotype_pathology = htmlspecialchars($immunophenotype_pathology) ;
$type_sub_non_pathology = htmlspecialchars($type_sub_non_pathology) ;
$who_sub_pathology = htmlspecialchars($who_sub_pathology) ;
$work_sub_pathology = htmlspecialchars($work_sub_pathology) ;
$other_type_pathology = htmlspecialchars($other_type_pathology) ;


$result = mysql_query( "update ".TB_ADD_DATA." SET  date_bio_report_pathology='$date_bio_report_pathology' ,	
pathology_pathology='$pathology_pathology',
biopsy_site_pathology='$biopsy_site_pathology', 
type_pathology='$type_pathology',
type_hodgkin_pathology='$type_hodgkin_pathology',
immunophenotype_pathology='$immunophenotype_pathology',
type_sub_non_pathology='$type_sub_non_pathology',
who_sub_pathology='$who_sub_pathology',
work_sub_pathology='$work_sub_pathology',
other_type_pathology='$other_type_pathology',


edit_member_pathology='$edit_member'  where id='$id' " ) or die ("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");	

	echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>" ;
	
	echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>" ;
	
	
	  if($_SESSION['ty_user']==2){
	   echo "<meta http-equiv='refresh' content='2; url=http://thailymphomaregistry.org/admin.php?name=admin&file=data_all'>" ;
	}
    if($_SESSION['ty_user']==1){
	    echo "<meta http-equiv='refresh' content='2; url=?name=index&file=index'>" ;
	}



?>
	<BR /><br /><br />
    		<? include "modules/index/footer.php"; ?>