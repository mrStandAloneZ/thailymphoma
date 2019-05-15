<?php
header("Content-Type: application/vnd.ms-excel; name='excel';charset='tis-620' ");
header("Content-Disposition: attachment; filename=lymphoma-all.xls");
?>
<html>
<body>

<?php

if(isset($_GET["pagelink"]) && $_GET["pagelink"] !=""){
$txtpage = "";
if(trim($_GET["pagelink"])=="data_all_bma"){$txtpage="BMA";}
if(trim($_GET["pagelink"])=="data_all_cmu"){$txtpage="CMU";}
if(trim($_GET["pagelink"])=="data_all_cu"){$txtpage="CU";}
if(trim($_GET["pagelink"])=="data_all_cri"){$txtpage="CRI";}
if(trim($_GET["pagelink"])=="data_all_kh"){$txtpage="KH";}
if(trim($_GET["pagelink"])=="data_all_kku"){$txtpage="KKU";}
if(trim($_GET["pagelink"])=="data_all_nu"){$txtpage="NU";}
if(trim($_GET["pagelink"])=="data_all_pmk"){$txtpage="PMK";}
if(trim($_GET["pagelink"])=="data_all_psu"){$txtpage="PSU";}
if(trim($_GET["pagelink"])=="data_all_ra"){$txtpage="RA";}
if(trim($_GET["pagelink"])=="data_all_rvt"){$txtpage="RVT";}
if(trim($_GET["pagelink"])=="data_all_si"){$txtpage="SI";}
if(trim($_GET["pagelink"])=="data_all_swu"){$txtpage="SWU";}
if(trim($_GET["pagelink"])=="data_all_tu"){$txtpage="TU";}
}
$filltertxt = "";
$fillter = "";
$field_search = $_GET["field_search"];
$finddata = $_GET["finddata"];
if($finddata==""){$fillter="";}else{
$fillter = "  and  $field_search  like '%$finddata%'  ";
}
if($txtpage==""){$filltertxt="";}else{
        $filltertxt = " and  codehos ='$txtpage' ";
}


$objConnect = mysql_connect("localhost", "thailympho_dbp", "VB-D#ThaAi#LogCe&") or die("Error Connect to Database");
// $objConnect = mysql_connect("localhost", "root", "spr1nt3r") or die("Error Connect to Database");
$objDB = mysql_select_db("thailympho_dbp");

 $strSQL = "SELECT * FROM web_add_data1  where 1  $fillter  $filltertxt order by  id asc";


  //  $strSQL .= "  codehos='" . $code_hospital . "'";


$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");

?>

<meta http-equiv="Content-type" content="text/html;charset=tis-620" />
<table width="600" border="1">
<tr>
<th> <div align="center">Date of record</div></th><?php // date_of_record?>
<th> <div align="center">Code </div></th><?php // centre?>
<th> <div align="center">Status 1 (First entry) </div></th><?php // centre?>
<th> <div align="center">Patient Initials </div></th><?php // patient_initials?>
<th> <div align="center">Gender</div></th><?php // sex?>
<th> <div align="center">Personal ID</div></th>
<th> <div align="center">HN </div></th>
<th> <div align="center">Date of Birth  </div></th>
<th> <div align="center">Current  Address </div></th>
<th> <div align="center">Mode of payment</div></th>
<th> <div align="center">Date of biopsy report</div></th>
<th> <div align="center">Pathology No.    </div></th>
<th> <div align="center">Biopsy site </div></th>
<th> <div align="center">Hodgkin lymphoma (HL) </div></th>
<th> <div align="center">Subtype</div></th>
<th> <div align="center">Immunophenotype</div></th>
<th> <div align="center">Who Classification</div></th>
<th> <div align="center">Working Formular</div></th>
<th> <div align="center">Other Type</div></th>
<?php //*****************************************************?>
<th> <div align="center">Ann Arbor stage </div></th>
<th> <div align="center">Symptom </div></th>
<th> <div align="center">Extranodal sites</div></th>
<th> <div align="center">Number of Extranodal Sites  </div></th>
<th> <div align="center">Performance Status (ECOG)</div></th>
<th> <div align="center">LDH</div></th>
<th> <div align="center">HIV Positive</div></th>
<th> <div align="center">LDH:(&#956;/L)</div></th>
<th> <div align="center">LDH:upper limit of normal(ULN)</div></th>
<th> <div align="center">CBC: Hemoglobin(g/dl)  </div></th>
<th> <div align="center">CBC: MCV(fL) </div></th>
<th> <div align="center">CBC: WBC(10<sup>3</sup>/&#956;L) </div></th>
<th> <div align="center">CBC:  Platelet(10<sup>3</sup>/&#956;L) </div></th>
<th> <div align="center">CBC: Neutrophil(%) </div></th>
<th> <div align="center">CBC: Lymphocyte(%)</div></th>
<th> <div align="center">CBC: Monocyte(%) </div></th>
<th> <div align="center">CBC: Eosinophil(%) </div></th>
<th> <div align="center">CBC: Basophil(%) </div></th>
<th> <div align="center">CBC: LUC</div></th>
<th> <div align="center">CBC: Blast/Lymphoma cell(yes/no)</div></th>
<th> <div align="center">Hepatitis B: HBsAg  </div></th>
<th> <div align="center">Hepatitis B: Anti-HBcAb</div></th>
<th> <div align="center">Hepatitis B: Anti-HBsAb</div></th>
<th> <div align="center">Hepatitis C : Anti-HCV </div></th>
<th> <div align="center">Bulky</div></th>

<?php //*******************--------------------------------------------------**********************************************?>
<th> <div align="center">IPI: Age</div></th>
<th> <div align="center">Description: Age</div></th>
<th> <div align="center">IPI: Serum LDH</div></th>
<th> <div align="center">Description: Serum LDH</div></th>
<th> <div align="center">IPI: Performance Status</div></th>
<th> <div align="center">Description: Performance Status</div></th>
<th> <div align="center">IPI: Stage</div></th>
<th> <div align="center">Description: Stage</div></th>
<th> <div align="center">IPI: Extranodal Involvement</div></th>
<th> <div align="center">Description: Extranodal Involvement</div></th>
<th> <div align="center">IPI: Result</div></th>
<th> <div align="center">Description: Result</div></th>

<?php //*******************--------------------------------------------------**********************************************?>






<?php //*******************--------------------------------------------------**********************************************?>
<th> <div align="center">Follow up status 1	</div></th>
<th> <div align="center">Date of Record</div></th>
<th> <div align="center">Chemotherapy Treatment </div></th>
<th> <div align="center">Date</div></th>
<th> <div align="center">Type of Chemotherapy</div></th>
<th> <div align="center">Received Intrathecal</div></th>

<th> <div align="center">Immunotherapy</div></th>
<th> <div align="center">Date</div></th>
<th> <div align="center">Type of Immunotherapy</div></th>
<th> <div align="center">Radiotherapy</div></th>
<th> <div align="center">Date</div></th>
<th> <div align="center">surgery</div></th>
<th> <div align="center">Date</div></th>

<th> <div align="center">Result</div></th>
<th> <div align="center">Additional info</div></th>
<?php //*******************--------------------------------------------------**********************************************?>
<th> <div align="center">Progression/Relapse</div></th>
<th> <div align="center">Date</div></th>
<th> <div align="center">Histology</div></th>
<th> <div align="center">Lymph Node</div></th>
<th> <div align="center">Extranodal sites</div></th>
<th> <div align="center">Salvage Treatment</div></th>
<th> <div align="center">Salvage Chemotherapy</div></th>
<th> <div align="center">Detail</div></th>
<th> <div align="center">Salvage Immunotherapy</div></th>
<th> <div align="center">Detail</div></th>
<th> <div align="center">Salvage Radiotherapy</div></th>
<th> <div align="center">Salvage Surgery</div></th>
<th> <div align="center">Stem Cell Transplant</div></th>
<th> <div align="center">Date</div></th>
<th> <div align="center">Type</div></th>
<th> <div align="center">Conditioning</div></th>
<th> <div align="center">Donor</div></th>
<th> <div align="center">Last follow-up Status</div></th>
<th> <div align="center">Date of Last follow-up</div></th>
<th> <div align="center">Alive Detail</div></th>
<th> <div align="center">Date of Death</div></th>
<th> <div align="center">Cause of Death</div></th>
<th> <div align="center">Lymphoma Status</div></th>

</tr>
<?php

while ($objResult = mysql_fetch_array($objQuery)) {
    $date_of_birth = date_format(date_create($objResult["date_of_birth"]), "d/m/Y");

    $result_follow = $objResult['result_follow'];
    $progression_follow = $objResult['progression_follow'];
    $salvage_follow = $objResult['salvage_follow'];
    $stem_cell_follow = $objResult['stem_cell_follow'];
    $date_last_contact_follow = $objResult['date_last_contact_follow'];
    $status_follow = $objResult['status_follow'];
    $patient_initials = $objResult['patient_initials'];
    if ($result_follow != "" && $progression_follow != "" && $salvage_follow != "" && $stem_cell_follow != "" && $date_last_contact_follow != "" && $status_follow != "") {
        $status2_follow = "complete";
    } else if ($patient_initials != "") {
        $status2_follow = "incomplete";
    } else {
        $status2_follow = "No Data";
    }

    ?>
	<tr>
    <td align="right"><?php echo str_replace("-", "/", $objResult["dateofrecord"]); ?></td>
    <td><div align="center">*<?php echo $objResult["centre"]; ?></div></td>
	<td><div align="center"><?php echo $status2_follow; ?></div></td>
	<td align="right"><?php echo strtoupper($objResult["patient_initials"]); ?></td>
    <td align="right"><?php echo $objResult["sex"]; //E                     ?></td>
    <td align="right"><?php echo "&nbsp;".$objResult["id_card"]; ?></td>
    <td align="right"><?php echo $objResult["hn"]; ?></td>
    <td align="right"><?php echo $date_of_birth; ?></td>
    <td align="right"><?php echo $objResult["province"]; ?></td>
    <td align="right"><?php echo str_replace("Other: specify","",$objResult["payment"]); //J                    ?><?php  echo $objResult["payment_other"]; ?></td>
    <td align="right"><?php echo str_replace("-", "/", $objResult["date_bio_report"]); ?></td>
    <td align="right"><?php echo $objResult["pathology"]; ?></td>
    <td align="right"><?php echo $objResult["biopsy_site"]; ?></td>
    <td align="right"><?php if ($objResult["type"] == "HL") {echo "YES";} else {echo "NO";}?></td>
    <td align="right"><?php  if ($objResult["type"] == "HL") {echo $objResult["hodgkin_don"]; }//O                     ?></td>
    <td align="right"><?php echo $objResult["type_non"]; ?></td>
    <td align="right"><?php echo $objResult["who_sub"]; ?></td>
    <td align="right"><?php echo $objResult["work_sub"]; ?></td>
    <td align="right"><?php echo $objResult["other_type"]; ?></td>

    <?php //*******************--------------------------------------------------**********************************************?>
    <td align="right"><?php echo $objResult["ann_arbor"]; //T                    ?></td>
    <td align="right"><?php echo $objResult["symptom_ann"]; ?></td>

    <td align="right">
	<?php if ($objResult["ext_none"]) {echo "None,";}?>


<?php
$count = 0;
$txtex= "";
    if ($objResult["ext_wal"]) {
	    $txtex = $txtex.$objResult["ext_wal"].",";
        $count++;
    }
    if ($objResult["ext_sin"]) {$txtex = $txtex.$objResult["ext_sin"].",";
        $count++;
    }
    if ($objResult["ext_sal"]) {$txtex = $txtex.$objResult["ext_sal"].",";
        $count++;
    }
    if ($objResult["ext_thy"]) {$txtex = $txtex.$objResult["ext_thy"].",";
        $count++;
    }
    if ($objResult["ext_eye"]) {$txtex = $txtex.$objResult["ext_eye"].",";
        $count++;
    }
    if ($objResult["ext_lung"]) {$txtex = $txtex.$objResult["ext_lung"].",";
        $count++;
    }
    if ($objResult["ext_breast"]) {$txtex = $txtex.$objResult["ext_breast"].",";
        $count++;
    }
    if ($objResult["ext_stomach"]) {$txtex = $txtex.$objResult["ext_stomach"].",";
        $count++;
    }
    if ($objResult["ext_small"]) {$txtex = $txtex.$objResult["ext_small"].",";
        $count++;
    }
    if ($objResult["ext_testis"]) {$txtex = $txtex.$objResult["ext_testis"].",";
        $count++;
    }
    if ($objResult["ext_brain"]) {$txtex = $txtex.$objResult["ext_brain"].",";
        $count++;
    }
    if ($objResult["ext_liver"]) {$txtex = $txtex.$objResult["ext_liver"].",";
        $count++;
    }
    if ($objResult["ext_large"]) {$txtex = $txtex.$objResult["ext_large"].",";
        $count++;
    }
    if ($objResult["ext_bone"]) {$txtex = $txtex.$objResult["ext_bone"].",";
        $count++;
    }
    if ($objResult["ext_spleen"]) {$txtex = $txtex.$objResult["ext_spleen"].",";
        $count++;
    }
    if ($objResult["ext_skin"]) {$txtex = $txtex.$objResult["ext_skin"].",";
        $count++;
    }
    if ($objResult["ext_other_text"]) {
        $count++;
    }
    $point_ext = 0;
    if ($count > 1) {
        $point_ext = 1;

    }
	$txtshow = "";
	if($objResult["ext_other_text"]){
	$ext_other_text = $objResult["ext_other_text"];
	$txtshow= "".$ext_other_text.",";
	}
	echo substr($txtex.$txtshow,0,-1);
	$numtxt = 0;
	$numtxt1 = 0;
	for($i=0;$i<=strlen($txtex.$txtshow);$i++){
	    $txtstr = substr( $txtex.$txtshow,$i,1);
		if($txtstr == ","){$numtxt++;}
		
	}
	
	
	for($j=0;$j<=strlen($txtex);$j++){
	      $txtstr = substr( $txtex,$j,1);
		 if($txtstr == ","){$numtxt1++;}
		
	}
	
    ?>



    </td>
    <?php ////***************************************************************?>
    <td align="right"> <?php echo $numtxt; ?></td>
    <td align="right"> <?php echo $objResult["per_ecog"]; ?></td>
    <td align="right"> <?php echo $objResult["ldh"]; //Y                    ?></td>
    <td align="right"> <?php echo $objResult["hiv_positive"]; ?></td>
    <td align="right"> <?php echo $objResult["micro"]; ?></td>
    <td align="right"> <?php echo $objResult["upper"]; ?></td>

    <td align="right"> <?php echo $objResult["hemoglobin"]; ?></td>
    <td align="right"> <?php echo $objResult["mcv"]; ?></td>
    <td align="right"> <?php echo $objResult["wbc"]; //AE                    ?></td>
    <td align="right"> <?php echo $objResult["platelet"]; ?></td>
    <td align="right"> <?php echo $objResult["neutrophil"]; ?></td>
    <td align="right"> <?php echo $objResult["lymphocyte"]; ?></td>
    <td align="right"> <?php echo $objResult["monocyte"]; ?></td>
    <td align="right"> <?php echo $objResult["eosinophil"]; //AJ                     ?></td>
    <td align="right"> <?php echo $objResult["basophil"]; ?></td>
    <td align="right"> <?php echo $objResult["luc"]; ?></td>
    <td align="right"> <?php echo $objResult["blast_lymphoma"]; ?></td>

    <td align="right"><?php echo str_replace("posiive","positive", $objResult["hep_b_hbsag"]); ?></td>
    <td align="right"><?php echo str_replace("posiive","positive",$objResult["hep_b_anti_hbcab"]); //AO                     ?></td>
    <td align="right"><?php echo str_replace("posiive","positive",$objResult["hep_b_anti_hbsab"]); ?></td>
    <td align="right"><?php echo str_replace("posiive","positive",$objResult["hep_c_anti_hcv"]); ?></td>
	
    <td align="right"><?php echo $objResult["bulky"]; ?></td>


    <?php ////***************************************************************?>
	<?php
$resultyearold = '';
    $point_age = 0;
    if ($objResult["date_bio_report"] && $objResult["date_of_birth"]) {
        list($year, $month, $day) = explode("-", str_replace("/", "-", $objResult["date_of_birth"]));
        list($date_today9, $date_todaymonth, $date_todayone) = explode("-", str_replace("/", "-", $objResult["date_bio_report"]));
         $date_todayone = date("d");
         $date_todaymonth = date("m");
         $date_today9 = date("Y");
        $date_today_now = (($date_today9 + 543) * 365) + ($date_todaymonth * 30) + $date_todayone;
        $date_of_birth = ($year * 365) + ($month * 30) + $day;
        $yearold = ($date_today_now - $date_of_birth);
        $resultyearold = '';
        $point_age = 0;
        if ($yearold / 365 > 60) {
            $point_age = 1;
        }
        if ($yearold > 365) {
            $resultyearold = intval($yearold / 365); //. " years ";
            $yearold = $yearold % 365;
        }
    }
    if ($yearold > 30) {
         $resultyearold .= intval($yearold / 30) . " months ";
		 
         $yearold = $yearold % 30;
    }
         $resultyearold .= $yearold % 30 . " days ";
    ?>
    <td align="right"><?php echo $point_age; ?></td>
    <td align="right"><?php 
	
	
	
    $dateage = $objResult["date_of_birth"];
	
	$dateage = $objResult["date_of_birth"];
	
	$date_bio_report =  $objResult["date_bio_report"];
	
	$birthDate_cur = $date_bio_report;
    $birthDate_cur = explode("-", $birthDate_cur);
	 
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = $dateage;
  //explode the date to get month, day and year
  $birthDate = explode("-", $birthDate);
  //get age from date or birthdate
  $y  = $birthDate[0];
  $m= $birthDate[1];
  $d = $birthDate[2];
  



	
	 //-----------------------------------
	 
	
	
	
	
	
	echo (($birthDate_cur[2])-($y)); //AT                     ?>&nbsp;</td>

	<?php
$point_ldh = '';
    if ($objResult["ldh"] == "High") {
        $point_ldh = 1;
    }
    if ($objResult["ldh"] == "Normal") {
        $point_ldh = 0;
    }
    ?>
    <td align="right"><?php echo $point_ldh; ?></td>
    <td align="right">Selected <?php echo $objResult["ldh"]; ?></td>

	<?php
$point_per_ecog = 0;
    if ($objResult["per_ecog"] > 1) {
        $point_per_ecog = 1;
    }
    ?>
    <td align="right"><?php echo $point_per_ecog; ?></td>
    <td align="right">Selected <?php echo $objResult["per_ecog"]; ?></td>

	<?php
$point_ann_arbor = '';
    if ($objResult["ann_arbor"] == "III" || $objResult["ann_arbor"] == "IV") {
        $point_ann_arbor = 1;
    }
    if ($objResult["ann_arbor"] == "I" || $objResult["ann_arbor"] == "II") {
        $point_ann_arbor = 0;
    }
    ?>
    <td align="right"><?php echo $point_ann_arbor; //AY                     ?></td>
    <td align="right"><?php if ($objResult["ann_arbor"]) {echo "Selected " . $objResult["ann_arbor"] . $objResult["symptom_ann"];}?></td>


    <td align="right"><?php 
	   $result_num = 0;
	  if($numtxt1 > 1){
	      $result_num = 1;
	  }else{
	      $result_num = 0;
	  }
	 echo $result_num."  (Selected ".$numtxt." items)";
	
	?></td>
    <td align="right"> <?php echo substr($txtex.$txtshow,0,-1); ?> </td>

<?php
$text_ipi = "Low";
    if ($point_age == 1) {
        $score = $point_age + $point_ldh + $point_per_ecog + $point_ann_arbor + $point_ext;
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
        $score = $point_age + $point_ldh + $point_per_ecog + $point_ann_arbor;
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
    ?>
    <td align="right"><?php echo $score; ?>&nbsp;Point</td>
    <td align="right"><?php echo $text_ipi; ?>&nbsp;Risk</td>
    <?php ////***************************************************************?>








        <?php ////***************************************************************?>
        <?php //   follow up?>
        <td align="right"><?php echo $status2_follow; //BE    ?></td>
		<td align="right"><?php echo $objResult["date_record_follow"]; ?></td>
        <td align="right"><?php if ($objResult["chemotherapy_follow"] == "Chemotherapy") {echo "YES";}if ($objResult["chemotherapy_follow"] == "No Chemotherapy") {echo "NO";}?></td>
        <td align="right"><?php echo str_replace("-", "/", $objResult["date_chemo_follow"]); ?></td>
        <td align="right">
		
		<?php  $chemo_txt = ""; ?>
		<?php if( $objResult["chemo_select_follow"]!=""){ $chemo_txt .= $objResult["chemo_select_follow"].",";} ?>
		<?php if( $objResult["chemo_select_follow_other"]!=""){ $chemo_txt .=  $objResult["chemo_select_follow_other"].",";} 
		
		echo  substr(str_replace("Other","",str_replace("Other,","",$chemo_txt)),0,-1);
		?>
		
		
		
		</td>
       	<td align="right"><?php echo $objResult["received_follow"]; //BJ                    ?></td>

        <td align="right"><?php if ($objResult["immunotherapy_follow"] == "Immunotherapy") {echo "YES";}if ($objResult["immunotherapy_follow"] == "Immunotherapy_no") {echo "No";}?></td>
        <td align="right"><?php echo str_replace("-", "/", $objResult["date_immun_follow"]); ?></td>
        <td align="left">
		<?php  $txt_immun= ""; ?>
            <?php if($objResult["immun_select_follow"]!=""){ $txt_immun  .= $objResult["immun_select_follow"].",";} ?>
            <?php if($objResult["immun_other_text"] !=""){$txt_immun .= $objResult["immun_other_text"]; }
			   echo substr($txt_immun,0,-1);
			
			?>
            </td>

		<td align="right"><?php if ($objResult["radiotherapy_follow"] == "Radiotherapy") {echo "YES";}if ($objResult["radiotherapy_follow"] == "Radiotherapy_no") {echo "NO";}?></td>
        <td align="right"><?php echo str_replace("-", "/", $objResult["date_rad_follow"]); //BO                    ?></td>
        <td align="right"><?php echo $objResult["surgery_follow"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $objResult["date_surgery_follow"]); ?></td>

        <td align="right"><?php echo $objResult["result_follow"]; ?></td>
        <td align="right">
		
		
		<?php
		if($result_follow=="Indeterminate (ID)"){
		        
		 echo $objResult["result_cause_follow"];
		
		 }else{
		       echo str_replace("-", "/", $objResult["date_complete_follow"]); 
		 }
		 
		 
		 ?>
		
		
		</td>

        <td align="right"><?php echo $objResult["progression_follow"]; //BT                     ?></td>
        <td align="right"><?php echo str_replace("-", "/", $objResult["date_progression_follow"]); ?></td>
        <td align="right"><?php echo $objResult["histology_follow"]; ?></td>

        <td align="right"><?php if ($objResult["lymphnode_follow"] == "Lymph node") {echo "YES";}?></td>
        <td align="right">
          <?php
		  
		  
		 $extr_txt = "";
		               if(trim($objResult["extr_1_follow"])!=""){$extr_txt.= $objResult["extr_1_follow"].","; }?>
        <?php  if(trim($objResult["extr_2_follow"])!=""){$extr_txt.= $objResult["extr_2_follow"].","; }?>
        <?php  if(trim($objResult["extr_3_follow"])!=""){$extr_txt.= $objResult["extr_3_follow"].","; }?>
        <?php  if(trim($objResult["extr_4_follow"])!=""){$extr_txt.= $objResult["extr_4_follow"].","; }?>
        <?php  if(trim($objResult["extr_5_follow"])!=""){$extr_txt.= $objResult["extr_5_follow"].","; }?>
        <?php  if(trim($objResult["extr_6_follow"])!=""){$extr_txt.= $objResult["extr_6_follow"].","; }?>
        <?php  if(trim($objResult["extr_7_follow"])!=""){$extr_txt.= $objResult["extr_7_follow"].","; }?>
        <?php  if(trim($objResult["extr_8_follow"])!=""){$extr_txt.= $objResult["extr_8_follow"].","; }?>
        <?php  if(trim($objResult["extr_9_follow"])!=""){$extr_txt.= $objResult["extr_9_follow"].","; }?>
        <?php  if(trim($objResult["extr_10_follow"])!=""){$extr_txt.= $objResult["extr_10_follow"].","; }?>
        <?php  if(trim($objResult["extr_11_follow"])!=""){$extr_txt.= $objResult["extr_11_follow"].","; }?>
        <?php  if(trim($objResult["extr_12_follow"])!=""){$extr_txt.= $objResult["extr_12_follow"].","; }?>
        <?php  if(trim($objResult["extr_13_follow"])!=""){$extr_txt.= $objResult["extr_13_follow"].","; }?>
        <?php  if(trim($objResult["extr_14_follow"])!=""){$extr_txt.= $objResult["extr_14_follow"].","; }?>
        <?php  if(trim($objResult["extr_15_follow"])!=""){$extr_txt.= $objResult["extr_15_follow"].","; }?>
        <?php  if(trim($objResult["extr_16_follow"])!=""){$extr_txt.= $objResult["extr_16_follow"].","; }?>
        <?php  if(trim($objResult["extr_17_follow"])!=""){$extr_txt.= $objResult["extr_17_follow"].","; }?>
		<?php  if(trim($objResult["extr_17_follow"])!=""){$extr_txt.= $objResult["extr_17_follow"].","; }?>
		<?php  if(trim($objResult["extr_other_text"])!=""){$extr_txt.= $objResult["extr_other_text"].","; }?>
	    <?php  echo substr($extr_txt,0,-1); ?>
</td>

        <td align="right"><?php echo $objResult["salvage_follow"]; //BY                    ?></td>
        <td align="right">
            <?php
if ($objResult["chemo_follow_1"] ||
        $objResult["chemo_follow_2"] ||
        $objResult["chemo_follow_3"] ||
        $objResult["chemo_follow_4"] ||
        $objResult["chemo_follow_5"] ||
        $objResult["chemo_follow_6"] ||
        $objResult["chemo_follow_7"] ||
        $objResult["chemo_follow_8"] ||
        $objResult["chemo_follow_9"] ||
        $objResult["chemo_follow_10"] ||
        $objResult["chemo_follow_11"] ||
        $objResult["chemo_follow_12"] ||
        $objResult["chemo_follow_13"] ||
        $objResult["chemo_follow_14"] ||
        $objResult["chemo_follow_15"] ||
        $objResult["chemo_follow_16"] ||
        $objResult["chemo_follow_17"] ||
        $objResult["chemo_follow_18"] ||
        $objResult["chemo_follow_19"] ||
        $objResult["chemo_follow_20"] ||
        $objResult["chemo_follow_21"] ||
        $objResult["chemo_follow_22"] ||
        $objResult["chemo_follow_23"] ||
        $objResult["chemo_follow_24"] ||
        $objResult["chemo_follow_25"] ||
        $objResult["chemo_follow_26"] ||
        $objResult["chemo_follow_27"] ||
        $objResult["chemo_follow_28"] ||
        $objResult["chemo_follow_29"]) {
        echo "Yes";
    } else {echo 'No';}
    ?>
        </td>
		
        <td align="right">
        <?php
		 $cheme_txt = "";
		               if(trim($objResult["chemo_follow_1"])!=""){$cheme_txt.= $objResult["chemo_follow_1"].","; }?>
        <?php  if(trim($objResult["chemo_follow_2"])!=""){$cheme_txt.= $objResult["chemo_follow_2"].","; }?>
        <?php  if(trim($objResult["chemo_follow_3"])!=""){$cheme_txt.= $objResult["chemo_follow_3"].","; }?>
        <?php  if(trim($objResult["chemo_follow_4"])!=""){$cheme_txt.= $objResult["chemo_follow_4"].","; }?>
        <?php  if(trim($objResult["chemo_follow_5"])!=""){$cheme_txt.= $objResult["chemo_follow_5"].","; }?>
        <?php  if(trim($objResult["chemo_follow_6"])!=""){$cheme_txt.= $objResult["chemo_follow_6"].","; }?>
        <?php  if(trim($objResult["chemo_follow_7"])!=""){$cheme_txt.= $objResult["chemo_follow_7"].","; }?>
        <?php  if(trim($objResult["chemo_follow_8"])!=""){$cheme_txt.= $objResult["chemo_follow_8"].","; }?>
        <?php  if(trim($objResult["chemo_follow_9"])!=""){$cheme_txt.= $objResult["chemo_follow_9"].","; }?>
        <?php  if(trim($objResult["chemo_follow_10"])!=""){$cheme_txt.= $objResult["chemo_follow_10"].","; }?>
        <?php  if(trim($objResult["chemo_follow_11"])!=""){$cheme_txt.= $objResult["chemo_follow_11"].","; }?>
        <?php  if(trim($objResult["chemo_follow_12"])!=""){$cheme_txt.= $objResult["chemo_follow_12"].","; }?>
        <?php  if(trim($objResult["chemo_follow_13"])!=""){$cheme_txt.= $objResult["chemo_follow_13"].","; }?>
        <?php  if(trim($objResult["chemo_follow_14"])!=""){$cheme_txt.= $objResult["chemo_follow_14"].","; }?>
        <?php  if(trim($objResult["chemo_follow_15"])!=""){$cheme_txt.= $objResult["chemo_follow_15"].","; }?>
        <?php  if(trim($objResult["chemo_follow_16"])!=""){$cheme_txt.= $objResult["chemo_follow_16"].","; }?>
        <?php  if(trim($objResult["chemo_follow_17"])!=""){$cheme_txt.= $objResult["chemo_follow_17"].","; }?>
        <?php  if(trim($objResult["chemo_follow_18"])!=""){$cheme_txt.= $objResult["chemo_follow_18"].","; }?>
        <?php  if(trim($objResult["chemo_follow_19"])!=""){$cheme_txt.= $objResult["chemo_follow_19"].","; }?>
        <?php  if(trim($objResult["chemo_follow_20"])!=""){$cheme_txt.= $objResult["chemo_follow_20"].","; }?>
        <?php  if(trim($objResult["chemo_follow_21"])!=""){$cheme_txt.= $objResult["chemo_follow_21"].","; }?>
        <?php  if(trim($objResult["chemo_follow_22"])!=""){$cheme_txt.= $objResult["chemo_follow_22"].","; }?>
        <?php  if(trim($objResult["chemo_follow_23"])!=""){$cheme_txt.= $objResult["chemo_follow_23"].","; }?>
        <?php  if(trim($objResult["chemo_follow_24"])!=""){$cheme_txt.= $objResult["chemo_follow_24"].","; }?>
        <?php  if(trim($objResult["chemo_follow_25"])!=""){$cheme_txt.= $objResult["chemo_follow_25"].","; }?>
        <?php  if(trim($objResult["chemo_follow_26"])!=""){$cheme_txt.= $objResult["chemo_follow_26"].","; }?>
        <?php  if(trim($objResult["chemo_follow_27"])!=""){$cheme_txt.= $objResult["chemo_follow_27"].","; }?>
        <?php  if(trim($objResult["chemo_follow_28"])!=""){$cheme_txt.= $objResult["chemo_follow_28"].","; }?>
        <?php   if(trim($objResult["chemo_other_follow_29"])!=""){$cheme_txt.= $objResult["chemo_other_follow_29"].","; }?>
		<?php  echo substr(substr($cheme_txt,1),0,-1);
		
		
		
		 ?>
		</td>
		
		
         <td align="right"><?php 
		 
		 if($objResult["immunotherapy_follow"] ==Yes || $objResult["immunotherapy_follow"] =="Immunotherapy"){
		   echo "Yes";
		 }else{  echo "No"; } 
		 
		 ?></td>
         <td align="right">
		 <?php $txt_sal="";?>
         <?php if( $objResult["sal_immun_1"]){ $txt_sal .= $objResult["sal_immun_1"].","; }?>
         <?php if( $objResult["sal_immun_2"]){ $txt_sal .=$objResult["sal_immun_2"].","; }?>
         <?php if( $objResult["sal_immun_3"]){ $txt_sal .=$objResult["sal_immun_3"].","; }?>
		                   <?php if( $objResult["sal_immun_3_1"]){ $txt_sal .=$objResult["sal_immun_3_1"].","; }?>
				           <?php if( $objResult["sal_immun_3_2"]){ $txt_sal .=$objResult["sal_immun_3_2"].","; }?>
         <?php if( $objResult["sal_immun_4_text"]){ $txt_sal .=$objResult["sal_immun_4_text"].",";}
		 
		  echo substr($txt_sal,0,-1);
		 
		  ?></td>
		<td align="right"><?php if ($objResult["sal_radio_follow"]) {echo "YES";} else {echo "NO";}?></td>
        <td align="right"><?php echo $objResult["surgery_follow"]; //CE                     ?></td>
        <td align="right"><?php echo $objResult["stem_cell_follow"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $objResult["date_stem_cell_follow"]); ?></td>
        <td align="right"><?php echo $objResult["stem_cell_method"]; ?></td>
        <td align="right"><?php echo $objResult["conditioning"]; ?></td>
        <td align="right">
		<?php $donner_txt = "";?>
		<?php if($objResult["donor_follow"]!=""){$donner_txt .=$objResult["donor_follow"].","; }?>
		<?php if($objResult["donor_follow_other"]!=""){ $donner_txt .= $objResult["donor_follow_other"].",";}
		             echo substr($donner_txt,0,-1);
		
		//CJ                    ?></td>
		<td align="right"><?php echo $objResult["status_follow"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $objResult["date_last_contact_follow"]); ?></td>
        <td align="right"><?php echo $objResult["alive_status"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $objResult["date_dead_follow"]); ?></td>
		
        <td align="right">
		<?php  $txt_cause=""; ?>
		<?php if($objResult["cause_of_dead"]!=""){$txt_cause=$objResult["cause_of_dead"].",";} ?>
		<?php if($objResult["cause_of_dead_other"]!=""){$txt_cause= $objResult["cause_of_dead_other"].",";}
	       	         echo  substr($txt_cause,0,-1);
		
		
		 //CO                    ?></td>
        <td align="right"><?php echo $objResult["lymphoma_status"]; ?></td>




	</tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);

?>
</body>
</html>