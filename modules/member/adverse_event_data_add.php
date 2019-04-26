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
$codehos= $dbarr["codehos"];
?>
	<? date_default_timezone_set("Asia/Bangkok"); ?><br />
	<? 
	echo $centre;
	echo $patient_initials;
	
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
  require_once("includes/event.php");
												mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");
												// เลือกฐานข้อมูล
												mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
												// คำสั่ง SQL และสั่งให้ทำงาน
													$sql = "insert into  $tblname (event_name,start_date,stop_date,sae,cocomitant,severity,action,outcome,relaionship,member_id,centre,subject,patient_initials)
 values ('$event_name','$start_date','$stop_date','$sae','$cocomitant','$severity','$action','$outcome','$relaionship','$member_id','$centre','$subject','$patient_initials')" ;
											
												mysql_query("SET NAMES tis620");
												$dbquery = mysql_db_query($dbname, $sql);
												mysql_close();			
									?>				
                <?
       echo "<center><font size=\"3\" face='MS Sans Serif'><b>ข้อมูลของคุณ ได้ถูกบันทึกแล้วครับ</b></font><BR><BR><BR><BR><BR><BR><BR><BR></center>" ;
		echo "<meta http-equiv='refresh' content='3; url=?name=member&file=adverse_event'>" ;

				?>

</body>
</html>
   
