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



     $ss = "select *  from " . TB_ADD_DATA ." where codehos='$codehos' and  id = (select max(id) as idmax  from web_add_data1 where codehos='$codehos')";
     $aa = mysql_query($ss);
     $dbid = mysql_fetch_array($aa);
	 
	 
	    $substr = (str_replace($codehos,"",$dbid["centre"])+1);



       $idcen= $codehos.$substr;

?>
  <?
               $dmy = "$date_of_birth"; //dmy-ymd    แปลงปีวันเกิด
				list($day, $month, $year) = explode("-", $dmy);
				//	$year = $year-543;
				$ymd_birth = "$year-$month-$day";
				list($byear, $bmonth, $bday)= explode("-",$ymd_birth);       //จุดต้องเปลี่ยน
				//echo $ymd_birth;
			    //  	$birthday = "1982-06-10";      //รูปแบบการเก็บค่าข้อมูลวันเกิด
				//		$today = date("Y-m-d");   //จุดต้องเปลี่ยน
			   ?>

	<? date_default_timezone_set("Asia/Bangkok"); ?><br />
	<? 
	//echo $centre;
	//echo $patient_initials;
	//echo $ymd_birth;
	///////////////////
						$date_today = date("d/m/");
						$date_today1 = date("Y")+'543';
						$date_date = date("d/m/$date_today1");
						$string = $date_today1;
						$date_small = $date_today.substr($string,2);
	///////////////////			
						$date_todayone = date("d");
						$date_todaymonth = date("m");
						$date_today9 = date("Y")+'543';
						$string1 = $date_today9;
						$date_small9 = substr($string1,2).$date_todaymonth.$date_todayone;
			////////////////////
				$date_today11 = date("d");
				$m_today12 = date("m");
				/////////////
				$date = $_POST["date_today11"];
                 $Title=$_POST["Title"];
			////////////
				$date=$date_date;
				$month=$m_today12;
				$year=$date_today9;
				
				$date_of_record= $d_record.$m_record.$y_record;
	?>
  
  <?  	
  require_once("includes/add_data.php");
  
  function checkPost($name_post)
{
    $result = null;
    if (isset($_POST[$name_post])) {
        $result = $_POST[$name_post];
    }
    return $result;
}


$sex = checkPost("sex");
$id_card = checkPost("id_card");
$id_card_confirm = checkPost("id_card_confirm");
$hn = checkPost("hn");
$hn_confirm = checkPost("hn_confirm");
$date_of_birth = checkPost("date_of_birth");
$province = checkPost("province");
$payment = checkPost("payment");
$payment_other = checkPost("payment_other");
$date_bio_report = checkPost("date_bio_report");
$pathology = checkPost("pathology");
$pathology_confirm = checkPost("pathology_confirm");
$biopsy_site = checkPost("biopsy_site");
$oth_biopsy = checkPost("oth_biopsy");
$type = checkPost("type");
$hodgkin_don = checkPost("hodgkin_don");
$type_non = checkPost("type_non");

$type_sub_non = checkPost("type_sub_non");
$who_sub = checkPost("who_sub");
$work_sub = checkPost("work_sub");
$other_type = checkPost("other_type");

$ann_arbor = checkPost("ann_arbor");
$symptom_ann = checkPost("symptom_ann");
$ext_none = checkPost("ext_none");
$ext_wal = checkPost("ext_wal");
$ext_sin = checkPost("ext_sin");
$ext_sal = checkPost("ext_sal");
$ext_thy = checkPost("ext_thy");
$ext_eye = checkPost("ext_eye");
$ext_lung = checkPost("ext_lung");
$ext_breast = checkPost("ext_breast");
$ext_stomach = checkPost("ext_stomach");
$ext_small = checkPost("ext_small");
$ext_testis = checkPost("ext_testis");
$ext_brain = checkPost("ext_brain");
$ext_liver = checkPost("ext_liver");
$ext_large = checkPost("ext_large");
$ext_bone = checkPost("ext_bone");
$ext_spleen = checkPost("ext_spleen");
$ext_skin = checkPost("ext_skin");
$ext_other = checkPost("ext_other");
$ext_other_text = checkPost("ext_other_text");
$per_ecog = checkPost("per_ecog");
$ldh = checkPost("ldh");

$micro = checkPost("micro");
$upper = checkPost("upper");
$hemoglobin = checkPost("hemoglobin");
$mcv = checkPost("mcv");
$wbc = checkPost("wbc");
$platelet = checkPost("platelet");
$neutrophil = checkPost("neutrophil");
$lymphocyte = checkPost("lymphocyte");
$monocyte = checkPost("monocyte");
$eosinophil = checkPost("eosinophil");
$basophil = checkPost("basophil");
$luc = checkPost("luc");
$blast_lymphoma = checkPost("blast_lymphoma");
$hepatitis_test = checkPost("hepatitis_test");
$hep_b_hbsag = checkPost("hep_b_hbsag");
$hep_b_anti_hbsab = checkPost("hep_b_anti_hbsab");
$hep_b_anti_hbcab = checkPost("hep_b_anti_hbcab");
$hep_c_anti_hcv = checkPost("hep_c_anti_hcv");
$bulky = checkPost("bulky");
$status_bulky = checkPost("status_bulky");

$hiv_positive = checkPost("hiv_positive");
$member_add = checkPost("member_add");
$date_add = checkPost("date_add");
  
  
$number_ext = 0;
$txt_st = "";
if ($ext_wal != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_sin != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_sal != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_thy != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_eye != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_lung != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_breast != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_stomach != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_small != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_testis != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_brain != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_liver != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_large != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_bone != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_spleen != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_skin != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
if ($ext_other != "") {
$txt_st = $txt_st."1,";
    $number_ext++;
}else{$txt_st = $txt_st."0,";}
  
												
												$conn = mysqli_connect($hostname, $user, $password, $dbname);
												if (!$conn) {
                                                  die("Connection failed: " . mysqli_connect_error());
                                                  }
												
												
												// คำสั่ง SQL และสั่งให้ทำงาน
													$sql = "insert into  web_add_data1 (centre,
													codehos,
													subject,
													patient_initials,
													dateofrecord,
													d_record,
													m_record,
													y_record,
													date_of_record,
													sex,
													id_card,
													id_card_confirm,
													hn,
													hn_confirm,
													date_of_birth,
													province,
													payment,
													payment_other,
													date_bio_report,
													pathology,
													pathology_confirm,
													biopsy_site,
													oth_biopsy,
													type,
													hodgkin_don,
													type_non,
													type_sub_non,
													who_sub,
													work_sub,
													other_type,													
													ann_arbor,
													symptom_ann,
													ext_none,
													ext_wal,
													ext_sin,
													ext_sal,
													ext_thy,
													ext_eye,
													ext_lung,
													ext_breast,
													ext_stomach,
													ext_small,
													ext_testis,
													ext_brain,
													ext_liver,
													ext_large,
													ext_bone,
													ext_spleen,
													ext_skin,
													ext_other,
													ext_other_text,
													per_ecog,
													ldh,
													micro ,
													upper,
													hemoglobin,
													mcv ,
													wbc  ,
													platelet,
													neutrophil  , 
													lymphocyte   ,
													monocyte   ,
													eosinophil  ,
													basophil  ,
													luc  ,
													blast_lymphoma  ,
													hepatitis_test  ,
													hep_b_hbsag  ,
													hep_b_anti_hbcab  ,
													hep_b_anti_hbsab  ,
													hep_c_anti_hcv  ,
													bulky  ,
													status_bulky  ,
													hiv_positive,
													member_add,
													date_add,txt_st)
									 values ('$idcen',
									 	'$codehos',
 										'$subject',
										'$patient_initials',
										'$dateofrecord',
										'$d_record',
										'$m_record',
										'$y_record',
 										'$date_of_record',
 										'$sex',
 										'$id_card',
 										'$id_card_confirm',
 										'$hn',
 										'$hn_confirm',
 										'$ymd_birth',
 										'$province',
 										'$payment',
 										'$payment_other',
 										'$date_bio_report',
 										'$pathology',
 										'$pathology_confirm',
 										'$biopsy_site',
 										'$oth_biopsy',
 										'$type',
  										'$hodgkin_don ',
  										'$type_non ',
 										'$type_sub_non ',
 										'$who_sub_pathology ',
 										'$work_sub',
 										'$other_type',
 										'$ann_arbor',
 										'$symptom_ann',
 										'$ext_none',
 										'$ext_wal',
 										'$ext_sin',
 										'$ext_sal',
 										'$ext_thy',
 										'$ext_eye',
  										'$ext_lung',
 										'$ext_breast',
 										'$ext_stomach',
						     			'$ext_small',
 										'$ext_testis',
 										'$ext_brain',
 										'$ext_liver',
 										'$ext_large',
 										'$ext_bone',
 										'$ext_spleen',
 										'$ext_skin',
 										'$ext_other',
 										'$ext_other_text',
 										'$per_ecog',
 										'$ldh',
										'$micro' ,
										'$upper' ,
										'$hemoglobin' ,
										'$mcv',
										'$wbc',
										'$platelet',
										'$neutrophil',
										'$lymphocyte',
										'$monocyte',
										'$eosinophil',
										'$basophil',
										'$luc',
										'$blast_lymphoma' ,
										'$hepatitis_test' ,
										'$hep_b_hbsag' ,
										'$hep_b_anti_hbcab' ,
										'$hep_b_anti_hbsab' ,
										'$hep_c_anti_hcv' ,
										'$bulky' ,
										'$status_bulky' ,			
 										'$hiv_positive',
 										'$member_id',
 										'$date_date','$txt_st')" ;
											
									if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
							?>				
         <?
       	echo "<center><font size=\"3\" face='MS Sans Serif'><b>ข้อมูลของคุณ ได้ถูกบันทึกแล้วครับ</b></font><BR><BR><BR><BR><BR><BR><BR><BR></center>" ;
	// echo "<meta http-equiv='refresh' content='1; url=index.php'>" ;

		?>
								   
</body>
</html>
   
