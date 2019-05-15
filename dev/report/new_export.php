<?php
header("Content-Type: application/vnd.ms-excel; name='excel';charset='tis-620' ");
header("Content-Disposition: attachment; filename=lymphoma-all.xls");
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.in.php';
$objConnect = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("Error Connect to Database");
$objDB = mysql_select_db(DB_NAME);
?>
<html>
    <head>        
        <meta http-equiv="Content-type" content="text/html;charset=tis-620" />
        <style>
            table {
                width: 100%;
            }

            th ,td{
                height: 50px;
                width: 300px;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 15px;
            }
        </style>
    </head>
    <body>

        <?php
        $code_hospital = $_POST['institute'];
        $mindate = $_POST['minyear'] . "-" . $_POST['minmonth'] . "-01";
        $maxdate = $_POST['maxyear'] . "-" . $_POST['maxmonth'] . "-30";


        $strSQL = "SELECT  "
                . " `id`, "
                . "  `centre`, "
                . "  `codehos`, "
                . "  `subject`, "
                . "  `patient_initials`, "
                . "  `dateofrecord`, "
                . "  `d_record`, "
                . "  `m_record`, "
                . "  `y_record`, "
                . "  `date_of_record`, "
                . "  `sex`, "
                . "  `id_card`, "
                . "  `id_card_confirm`, "
                . "  `hn`, "
                . "  `hn_confirm`, "
                . "  Year(`date_of_birth`) as birthYear, "
                . "  date_of_birth as birth,"
                . "  `province`, "
                . "  `payment`, "
                . "  `payment_other`, "
                . "  `date_bio_report`, "
                . "  `pathology`, "
                . "  `pathology_confirm`, "
                . "  `biopsy_site`, "
                . "  `type`, "
                . "  `hodgkin_don`, "
                . "  `type_non`, "
                . "  `type_sub_non`, "
                . "  `who_sub`, "
                . "  `work_sub`, "
                . "  `other_type`, "
                . "  `ann_arbor`, "
                . "  `symptom_ann`, "
                . "  `ext_none`, "
                . "  `ext_wal`, "
                . "  `ext_sin`, "
                . "  `ext_sal`, "
                . "  `ext_thy`, "
                . "  `ext_eye`, "
                . "  `ext_lung`, "
                . "  `ext_breast`, "
                . "  `ext_stomach`, "
                . "  `ext_small`, "
                . "  `ext_testis`, "
                . "  `ext_brain`, "
                . "  `ext_liver`, "
                . "  `ext_large`, "
                . "  `ext_bone`, "
                . "  `ext_spleen`, "
                . "  `ext_skin`, "
                . "  `ext_other`, "
                . "  `ext_other_text`, "
                . "  `num_ext`, "
                . "  `per_ecog`, "
                . "  `ldh`, "
                . "  `micro`, "
                . "  `upper`, "
                . "  `hemoglobin`, "
                . "  `mcv`, "
                . "  `wbc`, "
                . "  `platelet`, "
                . "  `neutrophil`, "
                . "  `lymphocyte`, "
                . "  `monocyte`, "
                . "  `eosinophil`, "
                . "  `basophil`, "
                . "  `luc`, "
                . "  `blast_lymphoma`, "
                . "  `hepatitis_test`, "
                . "  `hep_b_hbsag`, "
                . "  `hep_b_anti_hbcab`, "
                . "  `hep_b_anti_hbsab`, "
                . "  `hep_c_anti_hcv`, "
                . "  `bulky`, "
                . "  `hiv_positive`, "
                . "  `member_add`, "
                . "  `date_add`, "
                . "  `member_edit`, "
                . "  `date_edit`, "
                . "  `date_record_follow`, "
                . "  `chemotherapy_follow`, "
                . "  `date_chemo_follow`, "
                . "  `chemo_select_follow`, "
                . "  `chemo_select_follow_other`, "
                . "  `received_follow`, "
                . "  `immunotherapy_follow`, "
                . "  `date_immun_follow`, "
                . "  `immun_select_follow`, "
                . "  `radiotherapy_follow`, "
                . "  `rituximab_1`, "
                . "  `rituximab_2`, "
                . "  `rituximab_3`, "
                . "  `rituximab_4`, "
                . "  `immun_other_text`, "
                . "  `date_rad_follow`, "
                . "  `surgery_follow`, "
                . "  `date_surgery_follow`, "
                . "  `no_treatment_follow`, "
                . "  `result_follow`, "
                . "  `date_complete_follow`, "
                . "  `result_cause_follow`, "
                . "  `progression_follow`, "
                . "  `date_progression_follow`, "
                . "  `histology_follow`, "
                . "  `lymphnode_follow`, "
                . "  `extranodal_follow`, "
                . "  `extr_1_follow`, "
                . "  `extr_2_follow`, "
                . "  `extr_3_follow`, "
                . "  `extr_4_follow`, "
                . "  `extr_5_follow`, "
                . "  `extr_6_follow`, "
                . "  `extr_7_follow`, "
                . "  `extr_8_follow`, "
                . "  `extr_9_follow`, "
                . "  `extr_10_follow`, "
                . "  `extr_11_follow`, "
                . "  `extr_12_follow`, "
                . "  `extr_13_follow`, "
                . "  `extr_14_follow`, "
                . "  `extr_15_follow`, "
                . "  `extr_16_follow`, "
                . "  `extr_17_follow`, "
                . "  `extr_other`, "
                . "  `extr_other_text`, "
                . "  `salvage_follow`, "
                . "  `chemo_follow_1`, "
                . "  `chemo_follow_2`, "
                . "  `chemo_follow_3`, "
                . "  `chemo_follow_4`, "
                . "  `chemo_follow_5`, "
                . "  `chemo_follow_6`, "
                . "  `chemo_follow_7`, "
                . "  `chemo_follow_8`, "
                . "  `chemo_follow_9`, "
                . "  `chemo_follow_10`, "
                . "  `chemo_follow_11`, "
                . "  `chemo_follow_12`, "
                . "  `chemo_follow_13`, "
                . "  `chemo_follow_14`, "
                . "  `chemo_follow_15`, "
                . "  `chemo_follow_16`, "
                . "  `chemo_follow_17`, "
                . "  `chemo_follow_18`, "
                . "  `chemo_follow_19`, "
                . "  `chemo_follow_20`, "
                . "  `chemo_follow_21`, "
                . "  `chemo_follow_22`, "
                . "  `chemo_follow_23`, "
                . "  `chemo_follow_24`, "
                . "  `chemo_follow_25`, "
                . "  `chemo_follow_26`, "
                . "  `chemo_follow_27`, "
                . "  `chemo_follow_28`, "
                . "  `chemo_follow_28_1`, "
                . "  `chemo_follow_28_2`, "
                . "  `chemo_follow_29`, "
                . "  `chemo_other_follow_29`, "
                . "  `sal_immun_1`, "
                . "  `sal_immun_2`, "
                . "  `sal_immun_3`, "
                . "  `sal_immun_3_1`, "
                . "  `sal_immun_3_2`, "
                . "  `sal_immun_4`, "
                . "  `sal_immun_4_text`, "
                . "  `sal_radio_follow`, "
                . "  `sal_surgery_follow`, "
                . "  `stem_cell_follow`, "
                . "  `date_stem_cell_follow`, "
                . "  `stem_cell_method`, "
                . "  `conditioning`, "
                . "  `donor_follow`, "
                . "  `donor_follow_other`, "
                . "  `date_last_contact_follow`, "
                . "  `status_follow`, "
                . "  `alive_status`, "
                . "  `date_dead_follow`, "
                . "  `cause_of_dead`, "
                . "  `cause_of_dead_other`, "
                . "  `lymphoma_status`, "
                . "  `edit_member_follow`, "
                . "  `edit_date_follow`, "
                . "  `date_bio_report_pathology`, "
                . "  `pathology_pathology`, "
                . "  `biopsy_site_pathology`, "
                . "  `type_pathology`, "
                . "  `type_hodgkin_pathology`, "
                . "  `immunophenotype_pathology`, "
                . "  `type_sub_non_pathology`, "
                . "  `who_sub_pathology`, "
                . "  `work_sub_pathology`, "
                . "  `other_type_pathology`, "
                . "  `edit_member_pathology` "
                . " FROM web_add_data  WHERE (dateofrecord BETWEEN '" . $mindate . "' AND '" . $maxdate . "') ORDER BY id desc";

        if ($code_hospital != "ALL") {
            $strSQL .= " AND codehos='" . $code_hospital . "'";
        }

        $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
        ?>


        <table border="2">
            <tr>
                <th> <div align="center">Date of record</div></th><?php // date_of_record                             ?>
        <th> <div align="center">Code </div></th><?php // centre                             ?>
    <th> <div align="center">Status 1 (First entry) </div></th><?php // centre                             ?>
<th> <div align="center">Patient Initials </div></th><?php // patient_initials                             ?>
<th> <div align="center">Gender</div></th><?php // sex                             ?>
<th width="500px;"> <div align="center" >Personal ID</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th> <div align="center">HN </div></th>
<th width="500px;">Date of Birth</th>
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
<?php //***************************************************** ?>
<th> <div align="center">Ann Arbor stage </div></th>
<th> <div align="center">Symptom </div></th>
<th> <div align="center">Extranodal sites</div></th>
<th> <div align="center">Number of Extranodal Sites  </div></th>
<th> <div align="center">Performance Status (ECOG)</div></th>
<th> <div align="center">LDH</div></th>
<th> <div align="center">HIV Positive</div></th>
<th> <div align="center">LDH:(U/L)</div></th>
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

<?php //*******************--------------------------------------------------********************************************** ?>
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

<?php //*******************--------------------------------------------------********************************************** ?>






<?php //*******************--------------------------------------------------********************************************** ?>
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
<?php //*******************--------------------------------------------------********************************************** ?>
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
while ($results = mysql_fetch_array($objQuery)) {
    // $date_of_birth = date_format(date_create($results["date_of_birth"]), "d/m/Y");

    $result_follow = $results['result_follow'];
    $progression_follow = $results['progression_follow'];
    $salvage_follow = $results['salvage_follow'];
    $stem_cell_follow = $results['stem_cell_follow'];
    $date_last_contact_follow = $results['date_last_contact_follow'];
    $status_follow = $results['status_follow'];
    $patient_initials = $results['patient_initials'];
    if ($result_follow != "" && $progression_follow != "" && $salvage_follow != "" && $stem_cell_follow != "" && $date_last_contact_follow != "" && $status_follow != "") {
        $status2_follow = "complete";
    } else if ($patient_initials != "") {
        $status2_follow = "incomplete";
    } else {
        $status2_follow = "No Data";
    }
    ?>
    <tr>
        <td align="right"><?php echo str_replace("-", "/", $results["dateofrecord"]); ?></td>
        <td><div align="center"><?php echo $results["centre"]; ?></div></td>
        <td><div align="center"><?php echo $status2_follow; ?></div></td>
        <td align="right"><?php echo strtoupper($results["patient_initials"]); ?></td>
        <td align="right"><?php echo $results["sex"]; //E            ?></td>
        <td ><?php echo "'".$results["id_card"]."'"; ?></td>
        <td align="right"><?php echo $results["hn"]; ?></td>
        <td align="right" width="100%"><?php echo $results["birth"]; ?></td>
        <td align="right"><?php echo $results["province"]; ?></td>
        <td align="right"><?php echo $results["payment"]; //J                                                 ?><?php echo $results["payment_other"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_bio_report"]); ?></td>
        <td align="right"><?php echo $results["pathology"]; ?></td>
        <td align="right"><?php echo $results["biopsy_site"]; ?></td>
        <td align="right"><?php
            if ($results["type"] == "HL") {
                echo "YES";
            } else {
                echo "NO";
            }
            ?></td>
        <td align="right"><?php
            if ($results["type"] == "HL") {
                echo $results["hodgkin_don"];
            } //O                             
            ?></td>
        <td align="right"><?php echo $results["type_non"]; ?></td>
        <td align="right"><?php echo $results["who_sub"]; ?></td>
        <td align="right"><?php echo $results["work_sub"]; ?></td>
        <td align="right"><?php echo $results["other_type"]; ?></td>

        <?php //*******************--------------------------------------------------**********************************************    ?>
        <td align="right"><?php echo $results["ann_arbor"]; //T                                                 ?></td>
        <td align="right"><?php echo $results["symptom_ann"]; ?></td>

        <td align="right"><?php
            if ($results["ext_none"]) {
                echo "None";
            }
            ?>
            <?php if (($results["ext_wal"])) echo $results["ext_wal"] . "," ?>
            <?php if ($results["ext_sin"]) echo $results["ext_sin"] . "," ?>
            <?php if ($results["ext_sal"]) echo $results["ext_sal"] . "," ?>
            <?php if ($results["ext_thy"]) echo $results["ext_thy"] . "," ?>
            <?php if ($results["ext_eye"]) echo $results["ext_eye"] . "," ?>
            <?php if ($results["ext_lung"]) echo $results["ext_lung"] . "," ?>
            <?php if ($results["ext_breast"]) echo $results["ext_breast"] . "," ?>
            <?php if ($results["ext_stomach"]) echo $results["ext_stomach"] . "," ?>
            <?php if ($results["ext_small"]) echo $results["ext_small"] . "," ?>
            <?php if ($results["ext_testis"]) echo $results["ext_testis"] . "," ?>
            <?php if ($results["ext_brain"]) echo $results["ext_brain"] . "," ?>
            <?php if ($results["ext_liver"]) echo $results["ext_liver"] . "," ?>
            <?php if ($results["ext_large"]) echo $results["ext_large"] . "," ?>
            <?php if ($results["ext_bone"]) echo $results["ext_bone"] . "," ?>
            <?php if ($results["ext_spleen"]) echo $results["ext_spleen"] . "," ?>
            <?php if ($results["ext_skin"]) echo $results["ext_skin"] . "," ?>
            <?php if ($results["ext_other"]) echo $results["ext_other"] . "," ?>
            <?php if ($results["ext_other_text"]) echo $results["ext_other_text"] . "," ?>
        </td>
        <?php ////***************************************************************    ?>
        <td align="right"> <?php echo $results["num_ext"]; ?></td>
        <td align="right"> <?php echo $results["per_ecog"]; ?></td>
        <td align="right"> <?php echo $results["ldh"]; //Y                                                 ?></td>
        <td align="right"> <?php echo $results["hiv_positive"]; ?></td>
        <td align="right"> <?php echo $results["micro"]; ?></td>
        <td align="right"> <?php echo $results["upper"]; ?></td>

        <td align="right"> <?php echo $results["hemoglobin"]; ?></td>
        <td align="right"> <?php echo $results["mcv"]; ?></td>
        <td align="right"> <?php echo $results["wbc"]; //AE                                                 ?></td>
        <td align="right"> <?php echo $results["platelet"]; ?></td>
        <td align="right"> <?php echo $results["neutrophil"]; ?></td>
        <td align="right"> <?php echo $results["lymphocyte"]; ?></td>
        <td align="right"> <?php echo $results["monocyte"]; ?></td>
        <td align="right"> <?php echo $results["eosinophil"]; //AJ                                                  ?></td>
        <td align="right"> <?php echo $results["basophil"]; ?></td>
        <td align="right"> <?php echo $results["luc"]; ?></td>
        <td align="right"> <?php echo $results["blast_lymphoma"]; ?></td>

        <td align="right"><?php echo $results["hep_b_hbsag"]; ?></td>
        <td align="right"><?php echo $results["hep_b_anti_hbcab"]; //AO                                                  ?></td>
        <td align="right"><?php echo $results["hep_b_anti_hbsab"]; ?></td>
        <td align="right"><?php echo $results["hep_c_anti_hcv"]; ?></td>
        <td align="right"><?php echo $results["bulky"]; ?></td>


        <?php ////***************************************************************?>
        <?php
        $resultyearold = '';
        $point_age = 0;
        if ($results["date_bio_report"] && $results["date_of_birth"]) {
            list($year, $month, $day) = explode("-", str_replace("/", "-", $results["date_of_birth"]));
            list($date_today9, $date_todaymonth, $date_todayone) = explode("-", str_replace("/", "-", $results["date_bio_report"]));
            // $date_todayone = date("d");
            // $date_todaymonth = date("m");
            // $date_today9 = date("Y");
            $date_today_now = (($date_today9 + 543) * 365) + ($date_todaymonth * 30) + $date_todayone;
            $date_of_birth = ($year * 365) + ($month * 30) + $day;
            $yearold = $date_today_now - $date_of_birth;
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
        // if ($yearold > 30) {
        //     $resultyearold .= intval($yearold / 30) . " months ";
        //     $yearold = $yearold % 30;
        // }
        // $resultyearold .= $yearold % 30 . " days ";
        ?>
        <td align="right"><?php echo $point_age; ?></td>
        <td align="right"><?php
            $originalDate = $results["date_bio_report"];
            $newDate = intval(date("Y", strtotime($originalDate)));
            $birthYear = intval($results["birthYear"]);


            if (($birthYear) > 0 && ($newDate > $birthYear)) {
                echo $newDate - $birthYear;
            } else {
                echo "Not found data date_of_birth or date_bio_report";
            }
            ?>

        </td>

        <?php
        $point_ldh = '';
        if ($results["ldh"] == "High") {
            $point_ldh = 1;
        }
        if ($results["ldh"] == "Normal") {
            $point_ldh = 0;
        }
        ?>
        <td align="right"><?php echo $point_ldh; ?></td>
        <td align="right">Selected <?php echo $results["ldh"]; ?></td>

        <?php
        $point_per_ecog = 0;
        if ($results["per_ecog"] > 1) {
            $point_per_ecog = 1;
        }
        ?>
        <td align="right"><?php echo $point_per_ecog; ?></td>
        <td align="right">Selected <?php echo $results["per_ecog"]; ?></td>

        <?php
        $point_ann_arbor = '';
        if ($results["ann_arbor"] == "III" || $results["ann_arbor"] == "IV") {
            $point_ann_arbor = 1;
        }
        if ($results["ann_arbor"] == "I" || $results["ann_arbor"] == "II") {
            $point_ann_arbor = 0;
        }
        ?>
        <td align="right"><?php echo $point_ann_arbor; //AY                                            ?></td>
        <td align="right"><?php
            if ($results["ann_arbor"] && $results["symptom_ann"]) {
                echo "Selected " . $results["ann_arbor"] . $results["symptom_ann"];
            }
            ?></td>
        <?php
        $arrExtroSites = array();
        $count = 1;
        if ($results["ext_wal"]) {
            $count++;
            $arrExtroSites += $results["ext_wal"];
        }
        if ($results["ext_sin"]) {
            $count++;
        }
        if ($results["ext_sal"]) {
            $count++;
        }
        if ($results["ext_thy"]) {
            $count++;
        }
        if ($results["ext_eye"]) {
            $count++;
        }
        if ($results["ext_lung"]) {
            $count++;
        }
        if ($results["ext_breast"]) {
            $count++;
        }
        if ($results["ext_stomach"]) {
            $count++;
        }
        if ($results["ext_small"]) {
            $count++;
        }
        if ($results["ext_testis"]) {
            $count++;
        }
        if ($results["ext_brain"]) {
            $count++;
        }
        if ($results["ext_liver"]) {
            $count++;
        }
        if ($results["ext_large"]) {
            $count++;
        }
        if ($results["ext_bone"]) {
            $count++;
        }
        if ($results["ext_spleen"]) {
            $count++;
        }
        if ($results["ext_skin"]) {
            $count++;
        }
        if ($results["ext_other"]) {
            $count++;
        }
        $point_ext = 0;
        if ($count > 1) {
            $point_ext = 1;
        }
        ?>

        <td align="right"><?php echo $point_ext; ?></td>
        <td align="right">Selected <?php echo $results["num_ext"]; ?> items</td>

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
        <td align="right"><?php echo $score; ?></td>
        <td align="right"><?php echo $text_ipi; ?></td>
        <?php ////***************************************************************        ?>








        <?php ////***************************************************************     ?>
        <?php //   follow up     ?>
        <td align="right"><?php echo $status2_follow; //BE                              ?></td>
        <td align="right"><?php echo $results["date_record_follow"]; ?></td>
        <td align="right"><?php
            if ($results["chemotherapy_follow"] == "Chemotherapy") {
                echo "YES";
            }if ($results["chemotherapy_follow"] == "No Chemotherapy") {
                echo "NO";
            }
            ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_chemo_follow"]); ?></td>
        <td align="right"><?php if ($results["chemo_select_follow"]): ?><?php echo $results["chemo_select_follow"]; ?>,<?php endif ?> <?php if ($results["chemo_select_follow_other"]): ?><?php echo $results["chemo_select_follow_other"]; ?><?php endif ?></td>
        <td align="right"><?php echo $results["received_follow"]; //BJ                                                 ?></td>

        <td align="right"><?php
            if ($results["immunotherapy_follow"] == "Immunotherapy") {
                echo "YES";
            }if ($results["immunotherapy_follow"] == "Immunotherapy_no") {
                echo "No";
            }
            ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_immun_follow"]); ?></td>
        <td align="left">
            <?php echo $results["immun_select_follow"]; ?>
            <?php echo $results["immun_other_text"]; ?>
        </td>

        <td align="right"><?php
            if ($results["radiotherapy_follow"] == "Radiotherapy") {
                echo "YES";
            }if ($results["radiotherapy_follow"] == "Radiotherapy_no") {
                echo "NO";
            }
            ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_rad_follow"]); //BO                                             ?></td>
        <td align="right"><?php echo $results["surgery_follow"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_surgery_follow"]); ?></td>

        <td align="right"><?php echo $results["result_follow"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_complete_follow"]); ?></td>

        <td align="right"><?php echo $results["progression_follow"]; //BT                                                ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_progression_follow"]); ?></td>
        <td align="right"><?php echo $results["histology_follow"]; ?></td>

        <td align="right"><?php
            if ($results["lymphnode_follow"] == "Lymph node") {
                echo "YES";
            }
            ?></td>
        <td align="right">
            <?php if ($results["extr_1_follow"]) echo $results["extr_1_follow"] . ","; ?>
            <?php if ($results["extr_2_follow"]) echo $results["extr_2_follow"] . ","; ?>
            <?php if ($results["extr_3_follow"]) echo $results["extr_3_follow"] . ","; ?>
            <?php if ($results["extr_4_follow"]) echo $results["extr_4_follow"] . ","; ?>
            <?php if ($results["extr_5_follow"]) echo $results["extr_5_follow"] . ","; ?>
            <?php if ($results["extr_6_follow"]) echo $results["extr_6_follow"] . ","; ?>
            <?php if ($results["extr_7_follow"]) echo $results["extr_7_follow"] . ","; ?>
            <?php if ($results["extr_8_follow"]) echo $results["extr_8_follow"] . ","; ?>
            <?php if ($results["extr_9_follow"]) echo $results["extr_9_follow"] . ","; ?>
            <?php if ($results["extr_10_follow"]) echo $results["extr_10_follow"] . ","; ?>
            <?php if ($results["extr_11_follow"]) echo $results["extr_11_follow"] . ","; ?>
            <?php if ($results["extr_12_follow"]) echo $results["extr_12_follow"] . ","; ?>
            <?php if ($results["extr_13_follow"]) echo $results["extr_13_follow"] . ","; ?>
            <?php if ($results["extr_14_follow"]) echo $results["extr_14_follow"] . ","; ?>
            <?php if ($results["extr_15_follow"]) echo $results["extr_15_follow"] . ","; ?>
            <?php if ($results["extr_16_follow"]) echo $results["extr_16_follow"] . ","; ?>
            <?php if ($results["extr_17_follow"]) echo $results["extr_17_follow"] . ","; ?>
            <?php if ($results["extr_other_text"]) echo $results["extr_other_text"] . ","; ?>
        </td>

        <td align="right"><?php echo $results["salvage_follow"]; //BY                                             ?></td>
        <td align="right">
            <?php
            if ($results["chemo_follow_1"] ||
                    $results["chemo_follow_2"] ||
                    $results["chemo_follow_3"] ||
                    $results["chemo_follow_4"] ||
                    $results["chemo_follow_5"] ||
                    $results["chemo_follow_6"] ||
                    $results["chemo_follow_7"] ||
                    $results["chemo_follow_8"] ||
                    $results["chemo_follow_9"] ||
                    $results["chemo_follow_10"] ||
                    $results["chemo_follow_11"] ||
                    $results["chemo_follow_12"] ||
                    $results["chemo_follow_13"] ||
                    $results["chemo_follow_14"] ||
                    $results["chemo_follow_15"] ||
                    $results["chemo_follow_16"] ||
                    $results["chemo_follow_17"] ||
                    $results["chemo_follow_18"] ||
                    $results["chemo_follow_19"] ||
                    $results["chemo_follow_20"] ||
                    $results["chemo_follow_21"] ||
                    $results["chemo_follow_22"] ||
                    $results["chemo_follow_23"] ||
                    $results["chemo_follow_24"] ||
                    $results["chemo_follow_25"] ||
                    $results["chemo_follow_26"] ||
                    $results["chemo_follow_27"] ||
                    $results["chemo_follow_28"] ||
                    $results["chemo_follow_29"]) {
                echo "Yes";
            } else {
                echo 'No';
            }
            ?>
        </td>
        <td align="right">
            <?php if ($results["chemo_follow_1"]) echo $results["chemo_follow_1"] . ","; ?>
            <?php if ($results["chemo_follow_2"]) echo $results["chemo_follow_2"] . ","; ?>
            <?php if ($results["chemo_follow_3"]) echo $results["chemo_follow_3"] . ","; ?>
            <?php if ($results["chemo_follow_4"]) echo $results["chemo_follow_4"] . ","; ?>
            <?php if ($results["chemo_follow_5"]) echo $results["chemo_follow_5"] . ","; ?>
            <?php if ($results["chemo_follow_6"]) echo $results["chemo_follow_6"] . ","; ?>
            <?php if ($results["chemo_follow_7"]) echo $results["chemo_follow_7"] . ","; ?>
            <?php if ($results["chemo_follow_8"]) echo $results["chemo_follow_8"] . ","; ?>
            <?php if ($results["chemo_follow_9"]) echo $results["chemo_follow_9"] . ","; ?>
            <?php if ($results["chemo_follow_10"]) echo $results["chemo_follow_10"] . ","; ?>
            <?php if ($results["chemo_follow_11"]) echo $results["chemo_follow_11"] . ","; ?>
            <?php if ($results["chemo_follow_12"]) echo $results["chemo_follow_12"] . ","; ?>
            <?php if ($results["chemo_follow_13"]) echo $results["chemo_follow_13"] . ","; ?>
            <?php if ($results["chemo_follow_14"]) echo $results["chemo_follow_14"] . ","; ?>
            <?php if ($results["chemo_follow_15"]) echo $results["chemo_follow_15"] . ","; ?>
            <?php if ($results["chemo_follow_16"]) echo $results["chemo_follow_16"] . ","; ?>
            <?php if ($results["chemo_follow_17"]) echo $results["chemo_follow_17"] . ","; ?>
            <?php if ($results["chemo_follow_18"]) echo $results["chemo_follow_18"] . ","; ?>
            <?php if ($results["chemo_follow_19"]) echo $results["chemo_follow_19"] . ","; ?>
            <?php if ($results["chemo_follow_20"]) echo $results["chemo_follow_20"] . ","; ?>
            <?php if ($results["chemo_follow_21"]) echo $results["chemo_follow_21"] . ","; ?>
            <?php if ($results["chemo_follow_22"]) echo $results["chemo_follow_22"] . ","; ?>
            <?php if ($results["chemo_follow_23"]) echo $results["chemo_follow_23"] . ","; ?>
            <?php if ($results["chemo_follow_24"]) echo $results["chemo_follow_24"] . ","; ?>
            <?php if ($results["chemo_follow_25"]) echo $results["chemo_follow_25"] . ","; ?>
            <?php if ($results["chemo_follow_26"]) echo $results["chemo_follow_26"] . ","; ?>
            <?php if ($results["chemo_follow_27"]) echo $results["chemo_follow_27"] . ","; ?>
            <?php if ($results["chemo_follow_28"]) echo $results["chemo_follow_28"] . ","; ?>
            <?php if ($results["chemo_follow_29"]) echo $results["chemo_follow_29"]; ?>
        </td>
        <td align="right">
            <?php
            if ($dbarr['immunotherapy_follow'] == 'Immunotherapy' || $dbarr['immunotherapy_follow'] == 'Yes') {
                echo "Yes";
            } else {
                echo "No";
            }
            ?></td>
        <td align="right">
            <?php if ($results["sal_immun_1"]) echo $results["sal_immun_1"] . ","; ?>
            <?php if ($results["sal_immun_2"]) echo $results["sal_immun_2"] . ","; ?>
            <?php if ($results["sal_immun_3"]) echo $results["sal_immun_3"] . ","; ?>
            <?php if ($results["sal_immun_4_text"]) echo $results["sal_immun_4_text"]; ?>
        </td>
        <td align="right"><?php
            if ($results["sal_radio_follow"]) {
                echo "YES";
            } else {
                echo "NO";
            }
            ?></td>
        <td align="right"><?php echo $results["sal_surgery_follow"]; //CE                                               ?></td>
        <td align="right"><?php echo $results["stem_cell_follow"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_stem_cell_follow"]); ?></td>
        <td align="right"><?php echo $results["stem_cell_method"]; ?></td>
        <td align="right"><?php echo $results["conditioning"]; ?></td>
        <td align="right"><?php if ($results["donor_follow"]): ?><?php echo $results["donor_follow"]; ?>,<?php endif ?>
            <?php if ($results["donor_follow_other"]): ?> <?php echo $results["donor_follow_other"]; //CJ                                          ?><?php endif ?></td>
        <td align="right"><?php echo $results["status_follow"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_last_contact_follow"]); ?></td>

        <td align="right"><?php echo $results["alive_status"]; ?></td>
        <td align="right"><?php echo str_replace("-", "/", $results["date_dead_follow"]); ?></td>
        <td align="right"><?php if ($results["cause_of_dead"]): ?> <?php echo $results["cause_of_dead"]; ?>,<?php endif ?><?php if ($results["cause_of_dead_other"]): ?> <?php echo $results["cause_of_dead_other"]; ?>
            <?php endif ?></td>
        <td align="right"><?php echo $results["lymphoma_status"]; ?></td>




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