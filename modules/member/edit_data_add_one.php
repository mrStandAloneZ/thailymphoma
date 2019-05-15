<?php
if (!$_SESSION['login_true']) {
    exit();
    echo " bgcolor=FFFFFF";
}
### ????????? ###

include "modules/index/header.php";
date_default_timezone_set("Asia/Bangkok");

$date_today = date("d/m/");
$date_today1 = date("Y")+'543';
$string = $date_today1;
$date_small = $date_today . substr($string, 2);

$date_todayone = date("d");
$date_todaymonth = date("m");
$date_today9 = date("Y")+'543';
$string1 = $date_today9;
$date_small9 = substr($string1, 2) . $date_todaymonth . $date_todayone;

$date_today11 = date("d");
$m_today12 = date("m");

$edit_date = $date_today11;
$edit_month = $m_today12;
$edit_year = $date_today9;
// $date_of_record = $d_record . $m_record . $y_record;

$db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);





$result = mysql_query("select * from " . TB_MEMBER . " where user='" . $_SESSION['login_true'] . "'") or die("Err Can not to result");
$dbarr = mysql_fetch_array($result);





$member_id = $dbarr["member_id"];
$codehos = $dbarr["codehos"];

function checkPost($name_post)
{
    $result = null;
    if (isset($_POST[$name_post])) {
        $result = $_POST[$name_post];
    }
    return $result;
}

$id = checkPost("id");
$centre = checkPost("centre");
$codehos = checkPost("codehos");
$subject = checkPost("subject");
$patient_initials = checkPost("patient_initials");
$d_record = checkPost("d_record");
$m_record = checkPost("m_record");
$y_record = checkPost("y_record");
$date_of_record = checkPost("date_of_record");
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
// $number_ext = $wal + $sin + $sal + $thy + $eye + $lung + $breast + $stomach + $small + $testis + $brain + $liver + $large + $bone + $spleen + $skin + $other;
// echo $number_ext;

$id = htmlspecialchars($id);
$centre = htmlspecialchars($centre);
$codehos = htmlspecialchars($codehos);
$subject = htmlspecialchars($subject);
$patient_initials = htmlspecialchars($patient_initials);
$d_record = htmlspecialchars($d_record);
$m_record = htmlspecialchars($m_record);
$y_record = htmlspecialchars($y_record);
$date_of_record = htmlspecialchars($date_of_record);
$sex = htmlspecialchars($sex);
$id_card = htmlspecialchars($id_card);
$id_card_confirm = htmlspecialchars($id_card_confirm);
$hn = htmlspecialchars($hn);
$hn_confirm = htmlspecialchars($hn_confirm);
$date_of_birth = htmlspecialchars($date_of_birth);
$province = htmlspecialchars($province);
$payment = htmlspecialchars($payment);
$payment_other = htmlspecialchars($payment_other);
$date_bio_report = htmlspecialchars($date_bio_report);
$pathology = htmlspecialchars($pathology);
$pathology_confirm = htmlspecialchars($pathology_confirm);
$biopsy_site = htmlspecialchars($biopsy_site);
$oth_biopsy = htmlspecialchars($oth_biopsy);
$type = htmlspecialchars($type);
$hodgkin_don = htmlspecialchars($hodgkin_don);
$type_non = htmlspecialchars($type_non);
$type_sub_non = htmlspecialchars($type_sub_non);
$who_sub = htmlspecialchars($who_sub);
$work_sub = htmlspecialchars($work_sub);
$other_type = htmlspecialchars($other_type);

$ann_arbor = htmlspecialchars($ann_arbor);
$symptom_ann = htmlspecialchars($symptom_ann);
$ext_none = htmlspecialchars($ext_none);
$ext_wal = htmlspecialchars($ext_wal);
$ext_sin = htmlspecialchars($ext_sin);
$ext_sal = htmlspecialchars($ext_sal);
$ext_thy = htmlspecialchars($ext_thy);
$ext_eye = htmlspecialchars($ext_eye);
$ext_lung = htmlspecialchars($ext_lung);
$ext_breast = htmlspecialchars($ext_breast);
$ext_stomach = htmlspecialchars($ext_stomach);
$ext_small = htmlspecialchars($ext_small);
$ext_testis = htmlspecialchars($ext_testis);
$ext_brain = htmlspecialchars($ext_brain);
$ext_liver = htmlspecialchars($ext_liver);
$ext_large = htmlspecialchars($ext_large);
$ext_bone = htmlspecialchars($ext_bone);
$ext_spleen = htmlspecialchars($ext_spleen);
$ext_skin = htmlspecialchars($ext_skin);
$ext_other = htmlspecialchars($ext_other);
$ext_other_text = htmlspecialchars($ext_other_text);
$per_ecog = htmlspecialchars($per_ecog);
$ldh = htmlspecialchars($ldh);
$micro = htmlspecialchars($micro);
$upper = htmlspecialchars($upper);
$hemoglobin = htmlspecialchars($hemoglobin);
$mcv = htmlspecialchars($mcv);
$wbc = htmlspecialchars($wbc);
$platelet = htmlspecialchars($platelet);
$neutrophil = htmlspecialchars($neutrophil);
$lymphocyte = htmlspecialchars($lymphocyte);
$monocyte = htmlspecialchars($monocyte);
$eosinophil = htmlspecialchars($eosinophil);
$basophil = htmlspecialchars($basophil);
$luc = htmlspecialchars($luc);
$blast_lymphoma = htmlspecialchars($blast_lymphoma);
$hepatitis_test = htmlspecialchars($hepatitis_test);
$hep_b_hbsag = htmlspecialchars($hep_b_hbsag);
$hep_b_anti_hbcab = htmlspecialchars($hep_b_anti_hbcab);
$hep_b_anti_hbsab = htmlspecialchars($hep_b_anti_hbsab);
$hep_c_anti_hcv = htmlspecialchars($hep_c_anti_hcv);
$bulky = htmlspecialchars($bulky);
$hiv_positive = htmlspecialchars($hiv_positive);
$member_add = htmlspecialchars($member_add);
$date_add = htmlspecialchars($date_add);

$dmy = "$date_of_birth"; //dmy-ymd    ????????????
list($day, $month, $year) = explode("-", $dmy);
$ymd_birth = "$year-$month-$day";

//echo $ymd_birth;
			    //  	$birthday = "1982-06-10";      //?????????????????????????????
				//		$today = date("Y-m-d");   //?????????????
		//	list($byear, $bmonth, $bday)= explode("-",$ymd_birth);       //?????????????
		//	list($tyear, $tmonth, $tday)= explode("-",$date_today_now);                //?????????????
if($type=="NHL"){$hodgkin_don="";}
/*
echo "update " . TB_ADD_DATA . " SET  centre='$centre' ,	codehos='$codehos',
        	patient_initials='$patient_initials',
        	d_record='$d_record',
        	m_record='$m_record',
        	y_record='$y_record',

        	date_of_record='$date_of_record',
        	sex='$sex',
        	id_card='$id_card',
        	id_card_confirm='$id_card_confirm',
        	hn='$hn',
        	hn_confirm='$hn_confirm',
        	date_of_birth='$ymd_birth',
        	province='$province' ,
        	payment='$payment',
        	payment_other='$payment_other',
        	date_bio_report='$date_bio_report',
        	pathology='$pathology',
        	pathology_confirm='$pathology_confirm',
        	biopsy_site='$biopsy_site',
        	type='$type' ,
        	hodgkin_don='$hodgkin_don' ,
        	type_non='$type_non' ,
        	type_sub_non='$type_sub_non' ,
        	who_sub='$who_sub' ,
        	work_sub='$work_sub' ,
        	other_type='$other_type' ,
        	ann_arbor='$ann_arbor' ,
        	symptom_ann='$symptom_ann' ,

        	ext_none='$ext_none' ,
        	ext_wal='$ext_wal' ,
        	ext_sin='$ext_sin' ,
        	ext_sal='$ext_sal' ,  ext_thy='$ext_thy' ,
        	ext_eye='$ext_eye' ,
        	ext_lung='$ext_lung' ,
        	ext_breast='$ext_breast' ,
        	ext_stomach='$ext_stomach' ,
        	ext_small='$ext_small' ,
        	ext_testis='$ext_testis' ,
        	ext_brain='$ext_brain' ,
        	ext_liver='$ext_liver' ,
        	ext_large='$ext_large' ,
        	ext_bone='$ext_bone' ,
        	ext_spleen='$ext_spleen' ,
        	ext_skin='$ext_skin' ,
        	ext_other='$ext_other' ,
        	ext_other_text='$ext_other_text' ,
        	num_ext='$number_ext',
        	per_ecog='$per_ecog' ,
        	ldh='$ldh' ,
			micro='$micro' ,
			upper='$upper' ,
			hemoglobin='$hemoglobin' ,
			mcv='$mcv' ,
			wbc='$wbc' ,
			platelet='$platelet' ,
			neutrophil='$neutrophil' ,
			lymphocyte='$lymphocyte' ,
			monocyte='$monocyte' ,
			eosinophil='$eosinophil' ,
			basophil='$basophil' ,
			luc='$luc' ,
			blast_lymphoma='$blast_lymphoma' ,
			hepatitis_test='$hepatitis_test' ,
			hep_b_hbsag='$hep_b_hbsag' ,
			hep_b_anti_hbcab='$hep_b_anti_hbcab' ,
			hep_b_anti_hbsab='$hep_b_anti_hbsab' ,
			hep_c_anti_hcv='$hep_c_anti_hcv' ,
			bulky='$bulky' ,
        	hiv_positive='$hiv_positive' ,
        	member_edit='$member_id' ,
        	date_edit='$date_today9',
			txt_st='$txt_st'

        	where id='$id' ";
			*/
			
			
						
       if(trim($type_sub_non)=="WHO classification"){
      
	     $other_type  ="";
         $work_sub="";
   }
	   if(trim($type_sub_non)=="Working formulation"){
   $other_type="";
   $who_sub = "";
   }
      if(trim($type_sub_non)=="99 Other type"){
     $who_sub  ="";
      $work_sub="";
   }		
			
			 
			
			
$result = mysql_query("update " . TB_ADD_DATA . " SET  centre='$centre' ,	codehos='$codehos',
        	patient_initials='$patient_initials',
        	d_record='$d_record',
        	m_record='$m_record',
        	y_record='$y_record',

        	date_of_record='$date_of_record',
        	sex='$sex',
        	id_card='$id_card',
        	id_card_confirm='$id_card_confirm',
        	hn='$hn',
        	hn_confirm='$hn_confirm',
        	date_of_birth='$ymd_birth',
        	province='$province' ,
        	payment='$payment',
        	payment_other='$payment_other',
        	date_bio_report='$date_bio_report',
        	pathology='$pathology',
        	pathology_confirm='$pathology_confirm',
            biopsy_site='$biopsy_site',
            oth_biopsy='$oth_biopsy',
        	type='$type' ,
        	hodgkin_don='$hodgkin_don' ,
        	type_non='$type_non' ,
        	type_sub_non='$type_sub_non' ,
        	who_sub='$who_sub' ,
        	work_sub='$work_sub' ,
        	other_type='$other_type' ,
        	ann_arbor='$ann_arbor' ,
        	symptom_ann='$symptom_ann' ,

        	ext_none='$ext_none' ,
        	ext_wal='$ext_wal' ,
        	ext_sin='$ext_sin' ,
        	ext_sal='$ext_sal' ,  ext_thy='$ext_thy' ,
        	ext_eye='$ext_eye' ,
        	ext_lung='$ext_lung' ,
        	ext_breast='$ext_breast' ,
        	ext_stomach='$ext_stomach' ,
        	ext_small='$ext_small' ,
        	ext_testis='$ext_testis' ,
        	ext_brain='$ext_brain' ,
        	ext_liver='$ext_liver' ,
        	ext_large='$ext_large' ,
        	ext_bone='$ext_bone' ,
        	ext_spleen='$ext_spleen' ,
        	ext_skin='$ext_skin' ,
        	ext_other='$ext_other' ,
        	ext_other_text='$ext_other_text' ,
        	num_ext='$number_ext',
        	per_ecog='$per_ecog' ,
        	ldh='$ldh' ,
			micro='$micro' ,
			upper='$upper' ,
			hemoglobin='$hemoglobin' ,
			mcv='$mcv' ,
			wbc='$wbc' ,
			platelet='$platelet' ,
			neutrophil='$neutrophil' ,
			lymphocyte='$lymphocyte' ,
			monocyte='$monocyte' ,
			eosinophil='$eosinophil' ,
			basophil='$basophil' ,
			luc='$luc' ,
			blast_lymphoma='$blast_lymphoma' ,
			hepatitis_test='$hepatitis_test' ,
			hep_b_hbsag='$hep_b_hbsag' ,
			hep_b_anti_hbcab='$hep_b_anti_hbcab' ,
			hep_b_anti_hbsab='$hep_b_anti_hbsab' ,
			hep_c_anti_hcv='$hep_c_anti_hcv' ,
			bulky='$bulky' ,
            status_bulky='$status_bulky' ,
        	hiv_positive='$hiv_positive' ,
        	member_edit='$member_id' ,
        	date_edit='$date_today9',
			txt_st='$txt_st'

        	where id='$id' " ) or die ("ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้");	
			
echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>" ;
echo "<center><font size=\"3\" face='MS Sans Serif'><b>ระบบกำลังบันทึกข้อมูล</b></font></center>" ;
echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่</b></font></center>" ;


    if($_SESSION['ty_user']==2){
	   echo "<meta http-equiv='refresh' content='2; url=http://thailymphomaregistry.org/admin.php?name=admin&file=data_all'>" ;
	}
    if($_SESSION['ty_user']==1){
	    echo "<meta http-equiv='refresh' content='2; url=?name=index&file=index'>" ;
	}





//echo $txt_st;
?>
<BR /><br /><br />
<?php include "modules/index/footer.php";?>