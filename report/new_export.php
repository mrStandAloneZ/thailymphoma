<?php
date_default_timezone_set("Asia/Bangkok");
require_once "../PHPExcel/Classes/PHPExcel.php";

// local
$hostname = "db";	
$user = "thailympho_dbp";	
$password = "VB-D#ThaAi#LogCe&";

// dev
// $hostname = "localhost";	
// $user = "root";	
// $password = "password";

// production
// $hostname = "localhost";	
// $user = "thailympho_dbp";	
// $password = "VB-D#ThaAi#LogCe&";

$dbname = "thailympho_dbp";

$conn = new mysqli($hostname, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

// sql

$code_hospital = $_POST['institute'];
$mindate = $_POST['minyear'] . "-" . $_POST['minmonth'] . "-01";
$maxdate = $_POST['maxyear'] . "-" . $_POST['maxmonth'] . "-30";

$sql = "SELECT * FROM web_add_data1  WHERE (dateofrecord BETWEEN '" . $mindate . "' AND '" . $maxdate . "')";

if ($code_hospital != "ALL") {
    $sql .= " AND codehos ='" . $code_hospital . "'";
}

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $data[] = $row;
    }
    
} else {
    echo "0 results";
}
$conn->close();

$columns = array(
"Date of record",
"Code",
"Status 1 (First entry)",
// "Check Count",
// "Check Status",
"Patient Initials",
"Gender",
"Personal ID",
"HN",
"Date of Birth",
"Current  Address",
"Mode of payment",
"Date of biopsy report",
"Pathology No.",
"Biopsy site",
"Hodgkin lymphoma (HL)",
"Subtype",
"Immunophenotype",
"Who Classification",
"Working Formular",
"Other Type",
"Ann Arbor stage",
"Symptom",
"Extranodal sites",
"Number of Extranodal Sites",
"Performance Status (ECOG)",
"LDH",
"HIV Positive",
"LDH:(&#956;/L)",
"LDH:upper limit of normal(ULN)",
"CBC: Hemoglobin(g/dl)",
"CBC: MCV(fL)",
"CBC: WBC(10<sup>3</sup>/&#956;L)",
"CBC:  Platelet(10<sup>3</sup>/&#956;L)",
"CBC: Neutrophil(%)",
"CBC: Lymphocyte(%)",
"CBC: Monocyte(%)",
"CBC: Eosinophil(%)",
"CBC: Basophil(%)",
"CBC: LUC",
"CBC: Blast/Lymphoma cell(yes/no)",
"Hepatitis B: HBsAg",
"Hepatitis B: Anti-HBcAb",
"Hepatitis B: Anti-HBsAb",
"Hepatitis C : Anti-HCV",
"Bulky",
"Status Bulky",
"IPI: Age",
"Description: Age",
"IPI: Serum LDH",
"Description: Serum LDH",
"IPI: Performance Status",
"Description: Performance Status",
"IPI: Stage",
"Description: Stage",
"IPI: Extranodal Involvement",
"Description: Extranodal Involvement",
"IPI: Result",
"Description: Result",
"Follow up status 1",
"Date of Record",
"Chemotherapy Treatment",
"Date",
"Type of Chemotherapy",
"Received Intrathecal",
"Immunotherapy",
"Date",
"Type of Immunotherapy",
"Radiotherapy",
"Date",
"surgery",
"Date",
"Result",
"Additional info",
"Progression/Relapse",
"Date",
"Histology",
"Lymph Node",
"Extranodal sites",
"Salvage Treatment",
"Salvage Chemotherapy",
"Detail",
"Salvage Immunotherapy",
"Detail",
"Salvage Radiotherapy",
"Salvage Surgery",
"Stem Cell Transplant",
"Date",
"Type",
"Conditioning",
"Donor",
"Last follow-up Status",
"Date of Last follow-up",
"Alive Detail",
"Date of Death",
"Cause of Death",
"Lymphoma Status"
);


function array_splice_assoc(&$input, $offset, $length, $replacement) {
        $replacement = (array) $replacement;
        $key_indices = array_flip(array_keys($input));
        if (isset($input[$offset]) && is_string($offset)) {
                $offset = $key_indices[$offset];
        }
        if (isset($input[$length]) && is_string($length)) {
                $length = $key_indices[$length] - $offset;
        }

        $input = array_slice($input, 0, $offset, TRUE)
                + $replacement
                + array_slice($input, $offset + $length, NULL, TRUE);
}
function array_move($which, $where, $array)
{
    $tmpWhich = $which;
    $j=0;
    $keys = array_keys($array);

    for($i=0;$i<count($array);$i++)
    {
        if($keys[$i]==$tmpWhich)
            $tmpWhich = $j;
        else
            $j++;
    }
    $tmp  = array_splice($array, $tmpWhich, 1);
    array_splice_assoc($array, $where, 0, $tmp);
    return $array;
}
 
function getNameFromNumber($num) {
    $numeric = $num % 26;
    $letter = chr(65 + $numeric);
    $num2 = intval($num / 26);
    if ($num2 > 0) {
        $result = getNameFromNumber($num2 - 1) . $letter;
        $result = preg_replace('/(\w)(\d)(\w)/', '$1$3$2', $result);
        return $result;
    } else {
        return $letter . 1;
    }
}


$firstColumn = array();



$data_for_export = array();

foreach( $columns as $key => $value){
    $firstColumn[getNameFromNumber($key)] = $value;
    
}

foreach( $data as $key => $value){

// date of record
$dateofrecord = preg_replace('/(\d{4})\-(\d{2})\-(\d{2})/', '$3/$2/$1', $value['dateofrecord']);
$data_for_export[$key]['A1'] = $dateofrecord;

// Code
$centre = preg_replace('/(.+)/', '*$1', $value['centre']);
$data_for_export[$key]['B1'] = $centre;


// $data_for_export[$key]['D1'] = 'check count  * remove';
// $data_for_export[$key]['E1'] = 'check status *remove';


$data_for_export[$key]['F1'] = $value['patient_initials'];
$data_for_export[$key]['G1'] = $value['sex'];
$data_for_export[$key]['H1'] = $value['id_card_confirm'];
$data_for_export[$key]['I1'] = $value['hn'];

// Date of Birth
$date_of_birth = preg_replace('/(\d{4})\-(\d{2})\-(\d{2})/', '$3/$2/$1', $value['date_of_birth']);
$data_for_export[$key]['J1'] = $date_of_birth;

$data_for_export[$key]['K1'] = $value['province'];
$data_for_export[$key]['L1'] = $value['payment'];

// Date of Biospy
$date_bio_report = preg_replace('/(\d{2})\-(\d{2})\-(\d{4})/', '$1/$2/$3', $value['date_bio_report']);
$data_for_export[$key]['M1'] = $date_bio_report;

$data_for_export[$key]['N1'] = $value['pathology_confirm'];
$data_for_export[$key]['O1'] = $value['biopsy_site'];
if($value['type'] == "HL"){
  $type = 'Yes';
  $hodgkin_don = $value['hodgkin_don'];
}else{
  $type = 'No';
  $hodgkin_don = '';
}
$data_for_export[$key]['P1'] = $type;
$data_for_export[$key]['Q1'] = $hodgkin_don;
$data_for_export[$key]['R1'] = $value['type_non'];
$data_for_export[$key]['S1'] = $value['who_sub'];
$data_for_export[$key]['T1'] = $value['work_sub'];
$data_for_export[$key]['U1'] = $value['other_type'];
$data_for_export[$key]['V1'] = $value['ann_arbor'];
$data_for_export[$key]['W1'] = $value['symptom_ann'];

// Extranodal sites : (mark all that apply):
$Extranodal_sites = '';
$count = null;
if($value['ext_none'] == 'ext_done'){
   $Extranodal_sites = 'None,';
   $count = 0;
}
if ($value['ext_wal']){
   $Extranodal_sites .= $value['ext_wal'] . " , ";
   $count++;
}
if ($value['ext_sin']){
   $Extranodal_sites .= $value['ext_sin'] . " , ";
   $count++;
}
if ($value['ext_sal']){
   $Extranodal_sites .= $value['ext_sal'] . " , ";
   $count++;
}
if ($value['ext_thy']){
   $Extranodal_sites .= $value['ext_thy'] . " , ";
   $count++;
}
if ($value['ext_eye']){
   $Extranodal_sites .= $value['ext_eye'] . " , ";
   $count++;
}
if ($value['ext_lung']){
   $Extranodal_sites .= $value['ext_lung'] . " , ";
   $count++;
}
if ($value['ext_breast']){
   $Extranodal_sites .= $value['ext_breast'] . " , ";
   $count++;
}
if ($value['ext_stomach']){
   $Extranodal_sites .= $value['ext_stomach'] . " , ";
   $count++;
}
if ($value['ext_small']){
   $Extranodal_sites .= $value['ext_small'] . " , ";
   $count++;
}
if ($value['ext_testis']){
   $Extranodal_sites .= $value['ext_testis'] . " , ";
   $count++;
}
if ($value['ext_brain']){
   $Extranodal_sites .= $value['ext_brain'] . " , ";
   $count++;
}
if ($value['ext_liver']){
   $Extranodal_sites .= $value['ext_liver'] . " , ";
   $count++;
}
if ($value['ext_large']){
   $Extranodal_sites .= $value['ext_large'] . " , ";
   $count++;
}
if ($value['ext_bone']){
   $Extranodal_sites .= $value['ext_bone'] . " , ";
   $count++;
}
if ($value['ext_spleen']){
   $Extranodal_sites .= $value['ext_spleen'] . " , ";
   $count++;
}
if ($value['ext_skin']){
   $Extranodal_sites .= $value['ext_skin'] . " , ";
   $count++;
}
if ($value['ext_other']){
   $Extranodal_sites .= $value['ext_other_text'] . " , ";
   $Extranodal_sites = preg_replace('/,\s+$/', '', $Extranodal_sites);
   $count_other = preg_split('/,/', $value['ext_other_text']);
   $count = $count + COUNT($count_other);
}

$point_ext = 0;
    if ($count > 1) {
        $point_ext = 1;

    }

 $Extranodal_sites = preg_replace('/,\s+$/', '', $Extranodal_sites);

$data_for_export[$key]['X1'] = $Extranodal_sites;
$data_for_export[$key]['Y1'] = $count;

$data_for_export[$key]['Z1'] = $value['per_ecog'];
$data_for_export[$key]['AA1'] = $value['ldh'];
$data_for_export[$key]['AB1'] = $value['hiv_positive'];
$data_for_export[$key]['AC1'] = $value['micro'];
$data_for_export[$key]['AD1'] = $value['upper'];
$data_for_export[$key]['AE1'] = $value['hemoglobin'];
$data_for_export[$key]['AF1'] = $value['mcv'];
$data_for_export[$key]['AG1'] = $value['wbc'];
$data_for_export[$key]['AH1'] = $value['platelet'];
$data_for_export[$key]['AI1'] = $value['neutrophil'];
$data_for_export[$key]['AJ1'] = $value['lymphocyte'];
$data_for_export[$key]['AK1'] = $value['monocyte'];
$data_for_export[$key]['AL1'] = $value['eosinophil'];
$data_for_export[$key]['AM1'] = $value['basophil'];
$data_for_export[$key]['AN1'] = $value['luc'];
$data_for_export[$key]['AO1'] = $value['blast_lymphoma'];
$data_for_export[$key]['AP1'] = $value['hep_b_hbsag'];
$data_for_export[$key]['AQ1'] = $value['hep_b_anti_hbcab'];
$data_for_export[$key]['AR1'] = $value['hep_b_anti_hbsab'];
$data_for_export[$key]['AS1'] = $value['hep_c_anti_hcv'];
$data_for_export[$key]['AT1'] = $value['bulky'];
$data_for_export[$key]['AU1'] = $value['status_bulky'];

// Calculate Age

// date("Y");
$year_month_date = preg_split('/-/', $value['date_of_birth']);
$age = (date("Y") + 543) - $year_month_date[0];

$date_bio_report_year_month_date = preg_split('/-/', $value['date_bio_report']);

$description_age = $date_bio_report_year_month_date[2] - $year_month_date[0];

if($age < 60){
    $ipi_age = 0;
}else{
    $ipi_age = 1;
}

$data_for_export[$key]['AV1'] = $ipi_age;
$data_for_export[$key]['AW1'] = $description_age;

 // ldh

    if ($value["ldh"] == "High") {
        $point_ldh = 1;
    }
    if ($value["ldh"] == "Normal") {
        $point_ldh = 0;
    }

$data_for_export[$key]['AX1'] = $point_ldh;
$data_for_export[$key]['AY1'] = 'Selected' . $value["ldh"];

// per_echog

$point_per_ecog = 0;
    if ($value["per_ecog"] > 1) {
        $point_per_ecog = 1;
    }

$data_for_export[$key]['AZ1'] = $point_per_ecog;
$data_for_export[$key]['BA1'] = 'Selected' . $value["per_ecog"];

// ann_arbor

$point_ann_arbor = '';
    if ($value["ann_arbor"] == "III" || $value["ann_arbor"] == "IV") {
        $point_ann_arbor = 1;
    }
    else if ($value["ann_arbor"] == "I" || $value["ann_arbor"] == "II") {
        $point_ann_arbor = 0;
    };
    if($value["ann_arbor"]) {
        $description_stage = "Selected " . $value["ann_arbor"] . $value["symptom_ann"];
    }


$data_for_export[$key]['BB1'] = $point_ann_arbor;
$data_for_export[$key]['BC1'] = $description_stage;

// Extranodal Involvement

$result_num = 0;
	  if($count > 1){
	      $result_num = 1;
	  }else{
	      $result_num = 0;
      }
	   $extranodal_involvement = $result_num."  (Selected ".$count." items)" . "  **Check again**";

$data_for_export[$key]['BD1'] = $extranodal_involvement;
$data_for_export[$key]['BE1'] = $Extranodal_sites;

// ipi result

$text_ipi = "Low";
    if ($ipi_age == 1) {
        $score = $ipi_age + $point_ldh + $point_per_ecog + $point_ann_arbor + $point_ext;
        if ($score == 2) {
            $text_ipi = 'Low Intermediate';
        }
        if ($score == 3) {
            $text_ipi = 'High Intermediate';
        }
        if ($score > 3) {
            $text_ipi = 'High';
        }
    } else {
        $score = $ipi_age + $point_ldh + $point_per_ecog + $point_ann_arbor;
        if ($score == 1) {
            $text_ipi = 'Low Intermediate';
        }
        if ($score == 2) {
            $text_ipi = 'High Intermediate';
        }
        if ($score == 3) {
            $text_ipi = 'High';
        }
    }
    
$data_for_export[$key]['BF1'] = $score . " Point";
$data_for_export[$key]['BG1'] = $text_ipi . " Risk";


// Status 1 (First Entry)

$status_first_entry = '';
if($value['dateofrecord'] != '' && $value['centre'] != '' && $value['codehos'] != ''  && $value['patient_initials'] != '' && $value['sex'] != '' && $value['id_card'] != '' && $value['id_card_confirm'] != '' &&
   $value['hn'] != '' && $value['hn_confirm'] != '' && $value['date_of_birth'] != '' && $value['date_bio_report'] != '' && $description_age != '' && $value['province'] != '' && $value['payment'] != '' && $value['pathology'] != '' && $value['pathology_confirm'] != '' &&
   $value['biopsy_site'] != '' && $value['type'] != '' && ($value['hodgkin_don'] != '' || ($value['type_non'] != '' && ($value['who_sub'] != '' || $value['work_sub'] != '' || $value['other_type'] != ''))) &&
   $value['ann_arbor'] != '' && $value['symptom_ann'] != '' && $Extranodal_sites != '' &&  $count >= 0 &&  $value['per_ecog'] != '' && $value['ldh'] != '' && $value['micro'] != '' && $value['upper'] != '' &&
   $value['hemoglobin'] != '' && $value['mcv'] != '' && $value['wbc'] != '' && $value['platelet'] != '' && $value['neutrophil'] != '' && $value['lymphocyte'] != '' && $value['monocyte'] != '' && $value['eosinophil'] != '' && $value['basophil'] != ''  && $value['blast_lymphoma'] != '' &&
   $value['blast_lymphoma'] != '' && $value['hep_b_hbsag'] != '' && $value['hep_b_anti_hbcab'] != '' && $value['hep_b_anti_hbsab'] != '' && $value['hep_c_anti_hcv'] != '' && $value['status_bulky'] != ''  && $value['hiv_positive'] != '' && $score >= 0 && $text_ipi != ''
){

   $status_first_entry = 'Complete';
}else{
   $status_first_entry = 'Incomplete';
}
$data_for_export[$key]['C1'] = $status_first_entry;

                                             // Follow
$data_for_export[$key]['BH1'] = $value['date_record_follow'];

// chemotherapy
if($value['chemotherapy_follow'] == 'Chemotherapy'){
    $chemotherapy_follow = 'Yes';
}elseif($value['chemotherapy_follow'] == 'No Chemotherapy'){
     $chemotherapy_follow = 'No';
}
$data_for_export[$key]['BI1'] = $chemotherapy_follow;

$data_for_export[$key]['BJ1'] = $value['date_chemo_follow'];

if($value['chemo_select_follow' != 'other']){
   $chemo_select_follow = $value['chemo_select_follow'];
}else{
   $chemo_select_follow = $value['chemo_select_follow_other'];
};
$data_for_export[$key]['BK1'] = $chemo_select_follow;

$data_for_export[$key]['BL1'] = $value['received_follow'];

// Immunotherapy
if($value['immunotherapy_follow'] == 'Immunotherapy'){
    $immunotherapy_follow = 'Yes';
}elseif($value['immunotherapy_follow'] == 'Immunotherapy_no'){
     $immunotherapy_follow = 'No';
}
$data_for_export[$key]['BM1'] = $immunotherapy_follow;

$data_for_export[$key]['BN1'] = $value['date_immun_follow'];

if(preg_match('/Rituximab|Other/', $value['immun_select_follow'] )){
   $immun_select_follow = $value['immun_other_text'];
}else{
   $immun_select_follow = $value['immun_select_follow'];
}
$data_for_export[$key]['BO1'] = $immun_select_follow;

// Radiotherapy
if($value['radiotherapy_follow'] == 'Radiotherapy'){
    $radiotherapy_follow = 'Yes';
}elseif($value['radiotherapy_follow'] == 'Radiotherapy_no'){
     $radiotherapy_follow = 'No';
}
$data_for_export[$key]['BP1'] = $radiotherapy_follow;

$data_for_export[$key]['BQ1'] = $value['date_rad_follow'];


// Surgery
$data_for_export[$key]['BR1'] = $value['surgery_follow'];
$data_for_export[$key]['BS1'] = $value['date_surgery_follow'];


// Clinical Outcome
$data_for_export[$key]['BT1'] = $value['result_follow'];

if(preg_match('/Complete response/', $value['result_follow'])){
  $additional = $value['date_complete_follow'];
}elseif(preg_match('/Indeterminate /', $value['result_follow'])){
  $additional = $value['result_cause_follow'];
}else{
  $additional = '';
}
$data_for_export[$key]['BU1'] = $additional;

// Progression/relapse
$data_for_export[$key]['BV1'] = $value['progression_follow'];

$data_for_export[$key]['BW1'] = $value['date_progression_follow'];

$data_for_export[$key]['BX1'] = $value['history_follow'];

$data_for_export[$key]['BY1'] = $value['lymph node'];


if($value['extranodal_follow'] == 'Extranodal sites') {

if ($value['extr_1_follow']){
   $extranodal_follow .= $value['extr_1_follow'] . " , ";
}
if ($value['extr_2_follow']){
   $extranodal_follow .= $value['extr_2_follow'] . " , ";
}
if ($value['extr_3_follow']){
   $extranodal_follow .= $value['extr_3_follow'] . " , ";
}
if ($value['extr_4_follow']){
   $extranodal_follow .= $value['extr_4_follow'] . " , ";
}
if ($value['extr_5_follow']){
   $extranodal_follow .= $value['extr_5_follow'] . " , ";
}
if ($value['extr_6_follow']){
   $extranodal_follow .= $value['extr_6_follow'] . " , ";
}
if ($value['extr_7_follow']){
   $extranodal_follow .= $value['extr_7_follow'] . " , ";
}
if ($value['extr_8_follow']){
   $extranodal_follow .= $value['extr_8_follow'] . " , ";
}
if ($value['extr_9_follow']){
   $extranodal_follow .= $value['extr_9_follow'] . " , ";
}
if ($value['extr_10_follow']){
   $extranodal_follow .= $value['extr_10_follow'] . " , ";
}
if ($value['extr_11_follow']){
   $extranodal_follow .= $value['extr_11_follow'] . " , ";
}
if ($value['extr_12_follow']){
   $extranodal_follow .= $value['extr_12_follow'] . " , ";
}
if ($value['extr_13_follow']){
   $extranodal_follow .= $value['extr_13_follow'] . " , ";
}
if ($value['extr_14_follow']){
   $extranodal_follow .= $value['extr_14_follow'] . " , ";
}
if ($value['extr_15_follow']){
   $extranodal_follow .= $value['extr_15_follow'] . " , ";
}
if ($value['extr_16_follow']){
   $extranodal_follow .= $value['extr_16_follow'] . " , ";
}
if ($value['extr_17_follow']){
   $extranodal_follow .= $value['extr_17_follow'] . " , ";
}
if ($value['extr_other_text']){
   $extranodal_follow .= $value['extr_other_text'] . " , ";
}

$extranodal_follow = preg_replace('/,\s+$/', '', $extranodal_follow);

}
$data_for_export[$key]['BZ1'] = $extranodal_follow;


// Salvage treatment Salvage regimen (mark all that apply)

$data_for_export[$key]['CA1'] = $value['salvage_follow'];

if($value['salvage_follow'] == 'Yes'){
 // chemo
$salvage_follow = '';
   if ($value['chemo_follow_1']){
   $salvage_follow .= $value['chemo_follow_1'] . " , ";
   }
   if ($value['chemo_follow_2']){
   $salvage_follow .= $value['chemo_follow_2'] . " , ";
   }
   if ($value['chemo_follow_3']){
   $salvage_follow .= $value['chemo_follow_3'] . " , ";
   }
   if ($value['chemo_follow_4']){
   $salvage_follow .= $value['chemo_follow_4'] . " , ";
   }
   if ($value['chemo_follow_5']){
   $salvage_follow .= $value['chemo_follow_5'] . " , ";
   }
   if ($value['chemo_follow_6']){
   $salvage_follow .= $value['chemo_follow_6'] . " , ";
   }
   if ($value['chemo_follow_7']){
   $salvage_follow .= $value['chemo_follow_7'] . " , ";
   }
   if ($value['chemo_follow_8']){
   $salvage_follow .= $value['chemo_follow_8'] . " , ";
   }
   if ($value['chemo_follow_9']){
   $salvage_follow .= $value['chemo_follow_9'] . " , ";
   }
   if ($value['chemo_follow_10']){
   $salvage_follow .= $value['chemo_follow_10'] . " , ";
   }
   if ($value['chemo_follow_11']){
   $salvage_follow .= $value['chemo_follow_11'] . " , ";
   }
   if ($value['chemo_follow_12']){
   $salvage_follow .= $value['chemo_follow_12'] . " , ";
   }
   if ($value['chemo_follow_13']){
   $salvage_follow .= $value['chemo_follow_13'] . " , ";
   }
   if ($value['chemo_follow_14']){
   $salvage_follow .= $value['chemo_follow_14'] . " , ";
   }
   if ($value['chemo_follow_15']){
   $salvage_follow .= $value['chemo_follow_15'] . " , ";
   }
   if ($value['chemo_follow_16']){
   $salvage_follow .= $value['chemo_follow_16'] . " , ";
   }
   if ($value['chemo_follow_17']){
   $salvage_follow .= $value['chemo_follow_17'] . " , ";
   }
   if ($value['chemo_follow_18']){
   $salvage_follow .= $value['chemo_follow_18'] . " , ";
   }
   if ($value['chemo_follow_19']){
   $salvage_follow .= $value['chemo_follow_19'] . " , ";
   }
   if ($value['chemo_follow_20']){
   $salvage_follow .= $value['chemo_follow_20'] . " , ";
   }
   if ($value['chemo_follow_21']){
   $salvage_follow .= $value['chemo_follow_21'] . " , ";
   }
   if ($value['chemo_follow_22']){
   $salvage_follow .= $value['chemo_follow_22'] . " , ";
   }
   if ($value['chemo_follow_23']){
   $salvage_follow .= $value['chemo_follow_23'] . " , ";
   }
   if ($value['chemo_follow_24']){
   $salvage_follow .= $value['chemo_follow_24'] . " , ";
   }
   if ($value['chemo_follow_25']){
   $salvage_follow .= $value['chemo_follow_25'] . " , ";
   }
   if ($value['chemo_follow_26']){
   $salvage_follow .= $value['chemo_follow_26'] . " , ";
   }
   if ($value['chemo_follow_27']){
   $salvage_follow .= $value['chemo_follow_27'] . " , ";
   }
   if ($value['chemo_follow_28']){
   $salvage_follow .= $value['chemo_follow_28'] . " , ";
   }
   if ($value['chemo_follow_28_1']){
   $salvage_follow .= $value['chemo_follow_28_1'] . " , ";
   }
   if ($value['chemo_follow_28_2']){
   $salvage_follow .= $value['chemo_follow_28_2'] . " , ";
   }
   if ($value['chemo_follow_29']){
     $salvage_follow .= $value['chemo_other_follow_29'] . " , ";
   }


   $salvage_follow = preg_replace('/\s{3}/', '', $salvage_follow);
   $salvage_follow = preg_replace('/,\s+$/', '', $salvage_follow);

if($salvage_follow != ''){
   $data_for_export[$key]['CB1'] = 'Yes';
   $data_for_export[$key]['CC1'] = $salvage_follow;
}else{
    $data_for_export[$key]['CB1'] = 'No';
    $data_for_export[$key]['CC1'] = '';
}
// immuno
$salvage_immunotherapy = '';
if($value['sal_immun_1']){
    $salvage_immunotherapy .= $value['sal_immun_1'] . " , ";
}
if($value['sal_immun_2']){
    $salvage_immunotherapy .= $value['sal_immun_2'] . " , ";
}
if($value['sal_immun_3']){
    $salvage_immunotherapy .= $value['sal_immun_3'] . " , ";
}
if($value['sal_immun_3_1']){
    $salvage_immunotherapy .= $value['sal_immun_3_1'] . " , ";
}
if($value['sal_immun_3_2']){
    $salvage_immunotherapy .= $value['sal_immun_3_2'] . " , ";
}
if($value['sal_immun_4']){
    $salvage_immunotherapy .= $value['sal_immun_4_text'] . " , ";
}
$salvage_immunotherapy = preg_replace('/,\s+$/', '', $salvage_immunotherapy);
if($salvage_immunotherapy != ''){
   $data_for_export[$key]['CD1'] = 'Yes';
   $data_for_export[$key]['CE1'] = $salvage_immunotherapy;
}else{
   $data_for_export[$key]['CD1'] = 'No';
   $data_for_export[$key]['CE1'] = '';
}

//Radio
    
    if($value['sal_radio_follow'] == 'Radiotherapy'){
         $data_for_export[$key]['CF1'] = 'Yes';
    }else{
         $data_for_export[$key]['CF1'] = 'No';
    }
//Surgery
    
    if($value['sal_surgery_follow'] == 'Surgery'){
         $data_for_export[$key]['CG1'] = 'Yes';
    }else{
         $data_for_export[$key]['CG1'] = 'No';
    }

}else{ // no
    $data_for_export[$key]['CB1'] = 'No';
    $data_for_export[$key]['CC1'] = '';
    $data_for_export[$key]['CD1'] = 'No';
    $data_for_export[$key]['CE1'] = '';
    $data_for_export[$key]['CF1'] = 'No';
    $data_for_export[$key]['CG1'] = 'No';
}

// Stem cell transplant

$data_for_export[$key]['CH1'] = $value['stem_cell_follow'];

if($value['stem_cell_follow'] == 'Yes'){
     $data_for_export[$key]['CI1'] = $value['date_stem_cell_follow'];
     $data_for_export[$key]['CJ1'] = $value['stem_cell_method'];
     if($value['stem_cell_method'] == 'Allogeneic'){
         $data_for_export[$key]['CK1'] = $value['conditioning'];
         if($value['donor_follow'] == 'Other'){
             $data_for_export[$key]['CL1'] = $value['donor_follow_other'];
         }else{
             $data_for_export[$key]['CL1'] = $value['donor_follow'];
         }
     }
}else{
       $data_for_export[$key]['CI1'] = '';
       $data_for_export[$key]['CJ1'] = '';
       $data_for_export[$key]['CK1'] = '';
       $data_for_export[$key]['CL1'] = '';
}

// Date of last Contact
$data_for_export[$key]['CM1'] = $value['status_follow'];
$data_for_export[$key]['CN1'] = $value['date_last_contact_follow'];

if($value['status_follow'] == 'Alive'){
   $data_for_export[$key]['CO1'] = $value['alive_status'];
}elseif($value['status_follow'] == 'Dead') {
   $data_for_export[$key]['CP1'] = $value['date_dead_follow'];
   if($value['cause_of_dead'] == 'Other'){
      $data_for_export[$key]['CQ1'] = $value['cause_of_dead_other'];
   }else{
      $data_for_export[$key]['CQ1'] = $value['cause_of_dead'];
   }
   $data_for_export[$key]['CR1'] = $value['lymphoma_status'];
}




$data_for_export[$key] = array_move('C1',2,$data_for_export[$key]);

};





// echo "<pre>";
//   print_r($data_for_export);
// echo "</pre>";

 array_unshift($data_for_export, $firstColumn);





// create php excel object
$doc = new PHPExcel();

// set active sheet
$doc->setActiveSheetIndex(0);


// read data to active sheet
$doc->getActiveSheet()->fromArray($data_for_export);


$doc->getActiveSheet()->getStyle('A1:CZ1')->getFont()->setBold(true);
$doc->getActiveSheet()->getStyle('A1:CZ1')->getFont()->setSize(13);



foreach ($firstColumn as $key => $value) {
    $doc->getActiveSheet()->setCellValueExplicit($key, $value , PHPExcel_Cell_DataType::TYPE_STRING);
}
 




//save our workbook as this file name
$filename = 'just_some_random_name.xls';
//mime type
header('Content-Type: application/vnd.ms-excel');
//tell browser what's the file name
header('Content-Disposition: attachment;filename="' . $filename . '"');

header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format

$objWriter = PHPExcel_IOFactory::createWriter($doc, 'Excel5');

//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');
?>