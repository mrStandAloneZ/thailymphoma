<?php
if (!$_SESSION['login_true']) {
    exit();
    echo " bgcolor=FFFFFF";
}
### จบการเช็ค ###
?>
<?php include "modules/index/header.php"; ?>
<?php
date_default_timezone_set("Asia/Bangkok");

$date_today = date("d/m/");
$date_today1 = date("Y") + '543';
$string = $date_today1;
$date_small = $date_today . substr($string, 2);

$date_todayone = date("d");
$date_todaymonth = date("m");
$date_today9 = date("Y") + '543';
$string1 = $date_today9;
$date_small9 = substr($string1, 2) . $date_todaymonth . $date_todayone;

$date_today11 = date("d");
$m_today12 = date("m");

$edit_date = $date_today11;
$edit_month = $m_today12;
$edit_year = $date_today9;

$db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
$result = mysql_query("select * from " . TB_MEMBER . " where user='" . $_SESSION['login_true'] . "'") or die("Err Can not to result");
$dbarr = mysql_fetch_array($result);
$edit_member = $dbarr["member_id"];

function checkPost($name_post) {
    $result = null;
    if (isset($_POST[$name_post])) {
        $result = $_POST[$name_post];
    }
    return $result;
}

$id = checkPost("id");
$centre = checkPost("centre");
$patient_initials = checkPost("patient_initials");
$date_record_follow = checkPost("date_record_follow");
$chemotherapy_follow = checkPost("chemotherapy_follow");
$chemo_select_follow = checkPost("chemo_select_follow");
$date_chemo_follow = checkPost("date_chemo_follow");

$chemo_select_follow_other = checkPost("chemo_select_follow_other");
$received_follow = checkPost("received_follow");
if (checkPost("immunotherapy_follow_no")) {
    $immunotherapy_follow = checkPost("immunotherapy_follow_no");
} else {
    $immunotherapy_follow = checkPost("immunotherapy_follow_yes");
}

$date_immun_follow = checkPost("date_immun_follow");
$immun_select_follow = checkPost("immun_select_follow");
$radiotherapy_follow = checkPost("radiotherapy_follow");

$rituximab_1 = checkPost("rituximab_1");
$rituximab_2 = checkPost("rituximab_2");
$rituximab_3 = checkPost("rituximab_3");
$rituximab_4 = checkPost("rituximab_4");
if (checkPost("immun_select_follow_sub")) {
    $immun_other_texts = checkPost("immun_select_follow_sub");
    $immun_other_text = '';
    foreach ($immun_other_texts as $value) {
        $immun_other_text .= $value . ",";
    }
} else {

    $immun_other_text = checkPost("immun_other_text");
}
$date_rad_follow = checkPost("date_rad_follow");
$surgery_follow = checkPost("surgery_follow");
$date_surgery_follow = checkPost("date_surgery_follow");
$no_treatment_follow = checkPost("no_treatment_follow");
$result_follow = checkPost("result_follow");
if (checkPost("date_complete_follow")) {
    $date_complete_follow = checkPost("date_complete_follow");
} else {
    $date_complete_follow = checkPost("date_cr_complete_follow");
}
$result_cause_follow = checkPost("result_cause_follow");
$progression_follow = checkPost("progression_follow");
$date_progression_follow = checkPost("date_progression_follow");
$histology_follow = checkPost("histology_follow");
$lymphnode_follow = checkPost("lymphnode_follow");
$extranodal_follow = checkPost("extranodal_follow");
$date_progression_follow = checkPost("date_progression_follow");
$histology_follow = checkPost("histology_follow");
$extr_1_follow = checkPost("extr_1_follow");
$extr_2_follow = checkPost("extr_2_follow");
$extr_3_follow = checkPost("extr_3_follow");
$extr_4_follow = checkPost("extr_4_follow");
$extr_5_follow = checkPost("extr_5_follow");
$extr_6_follow = checkPost("extr_6_follow");
$extr_7_follow = checkPost("extr_7_follow");
$extr_8_follow = checkPost("extr_8_follow");
$extr_9_follow = checkPost("extr_9_follow");
$extr_10_follow = checkPost("extr_10_follow");
$extr_11_follow = checkPost("extr_11_follow");
$extr_12_follow = checkPost("extr_12_follow");
$extr_13_follow = checkPost("extr_13_follow");
$extr_14_follow = checkPost("extr_14_follow");
$extr_15_follow = checkPost("extr_15_follow");
$extr_16_follow = checkPost("extr_16_follow");
$extr_17_follow = checkPost("extr_17_follow");
$extr_other = checkPost("extr_other");
$extr_other_text = checkPost("extr_other_text");
$salvage_follow = checkPost("salvage_follow");
$chemo_follow_1 = checkPost("chemo_follow_1");
$chemo_follow_2 = checkPost("chemo_follow_2");
$chemo_follow_3 = checkPost("chemo_follow_3");
$chemo_follow_4 = checkPost("chemo_follow_4");
$chemo_follow_5 = checkPost("chemo_follow_5");
$chemo_follow_6 = checkPost("chemo_follow_6");
$chemo_follow_7 = checkPost("chemo_follow_7");
$chemo_follow_8 = checkPost("chemo_follow_8");
$chemo_follow_9 = checkPost("chemo_follow_9");
$chemo_follow_10 = checkPost("chemo_follow_10");
$chemo_follow_11 = checkPost("chemo_follow_11");
$chemo_follow_12 = checkPost("chemo_follow_12");
$chemo_follow_13 = checkPost("chemo_follow_13");
$chemo_follow_14 = checkPost("chemo_follow_14");
$chemo_follow_15 = checkPost("chemo_follow_15");
$chemo_follow_16 = checkPost("chemo_follow_16");
$chemo_follow_17 = checkPost("chemo_follow_17");
$chemo_follow_18 = checkPost("chemo_follow_18");
$chemo_follow_19 = checkPost("chemo_follow_19");
$chemo_follow_20 = checkPost("chemo_follow_20");
$chemo_follow_21 = checkPost("chemo_follow_21");
$chemo_follow_22 = checkPost("chemo_follow_22");
$chemo_follow_23 = checkPost("chemo_follow_23");
$chemo_follow_24 = checkPost("chemo_follow_24");
$chemo_follow_25 = checkPost("chemo_follow_25");
$chemo_follow_26 = checkPost("chemo_follow_26");
$chemo_follow_27 = checkPost("chemo_follow_27");
$chemo_follow_28 = checkPost("chemo_follow_28");
$chemo_follow_28_1 = checkPost("chemo_follow_28_1");
$chemo_follow_28_2 = checkPost("chemo_follow_28_2");
$chemo_follow_29 = checkPost("chemo_follow_29");
$chemo_other_follow_29 = checkPost("chemo_other_follow_29");
$sal_immun_1 = checkPost("sal_immun_1");
$sal_immun_2 = checkPost("sal_immun_2");
$sal_immun_3 = checkPost("sal_immun_3");
$sal_immun_3_1 = checkPost("sal_immun_3_1");
$sal_immun_3_2 = checkPost("sal_immun_3_2");
$sal_immun_4 = checkPost("sal_immun_4");
$sal_immun_4_text = checkPost("sal_immun_4_text");
$sal_radio_follow = checkPost("sal_radio_follow");
$sal_surgery_follow = checkPost("sal_surgery_follow");
$stem_cell_follow = checkPost("stem_cell_follow");
$date_stem_cell_follow = checkPost("date_stem_cell_follow");
$stem_cell_method = checkPost("stem_cell_method");
$conditioning = checkPost("conditioning");
$donor_follow = checkPost("donor_follow");
$donor_follow_other = checkPost("donor_follow_other");
$date_last_contact_follow = checkPost("date_last_contact_follow");
$status_follow = checkPost("status_follow");
$alive_status = checkPost("alive_status");
$date_dead_follow = checkPost("date_dead_follow");
$cause_of_dead = checkPost("cause_of_dead");
$cause_of_dead_other = checkPost("cause_of_dead_other");
$lymphoma_status = checkPost("lymphoma_status");

$id = htmlspecialchars($id);
$centre = htmlspecialchars($centre);
$patient_initials = htmlspecialchars($patient_initials);
$date_record_follow = htmlspecialchars($date_record_follow);
$chemotherapy_follow = htmlspecialchars($chemotherapy_follow);

$date_chemo_follow = htmlspecialchars($date_chemo_follow);
$chemo_select_follow = htmlspecialchars($chemo_select_follow);
$chemo_select_follow_other = htmlspecialchars($chemo_select_follow_other);
$received_follow = htmlspecialchars($received_follow);
$immunotherapy_follow = htmlspecialchars($immunotherapy_follow);

$date_immun_follow = htmlspecialchars($date_immun_follow);
$immun_select_follow = htmlspecialchars($immun_select_follow);
$radiotherapy_follow = htmlspecialchars($radiotherapy_follow);

$rituximab_1 = htmlspecialchars($rituximab_1);
$rituximab_2 = htmlspecialchars($rituximab_2);
$rituximab_3 = htmlspecialchars($rituximab_3);
$rituximab_4 = htmlspecialchars($rituximab_4);
$immun_other_text = htmlspecialchars($immun_other_text);
$date_rad_follow = htmlspecialchars($date_rad_follow);
$surgery_follow = htmlspecialchars($surgery_follow);

$date_surgery_follow = htmlspecialchars($date_surgery_follow);
$no_treatment_follow = htmlspecialchars($no_treatment_follow);
$result_follow = htmlspecialchars($result_follow);
$date_complete_follow = htmlspecialchars($date_complete_follow);
$result_cause_follow = htmlspecialchars($result_cause_follow);
$progression_follow = htmlspecialchars($progression_follow);
$date_progression_follow = htmlspecialchars($date_progression_follow);
$histology_follow = htmlspecialchars($histology_follow);
$lymphnode_follow = htmlspecialchars($lymphnode_follow);
$extranodal_follow = htmlspecialchars($extranodal_follow);
$extr_1_follow = htmlspecialchars($extr_1_follow);
$extr_2_follow = htmlspecialchars($extr_2_follow);
$extr_3_follow = htmlspecialchars($extr_3_follow);
$extr_4_follow = htmlspecialchars($extr_4_follow);
$extr_5_follow = htmlspecialchars($extr_5_follow);
$extr_6_follow = htmlspecialchars($extr_6_follow);
$extr_7_follow = htmlspecialchars($extr_7_follow);
$extr_8_follow = htmlspecialchars($extr_8_follow);
$extr_9_follow = htmlspecialchars($extr_9_follow);
$extr_10_follow = htmlspecialchars($extr_10_follow);
$extr_11_follow = htmlspecialchars($extr_11_follow);
$extr_12_follow = htmlspecialchars($extr_12_follow);
$extr_13_follow = htmlspecialchars($extr_13_follow);
$extr_14_follow = htmlspecialchars($extr_14_follow);
$extr_15_follow = htmlspecialchars($extr_15_follow);
$extr_16_follow = htmlspecialchars($extr_16_follow);
$extr_17_follow = htmlspecialchars($extr_17_follow);
$extr_other = htmlspecialchars($extr_other);
$extr_other_text = htmlspecialchars($extr_other_text);
$salvage_follow = htmlspecialchars($salvage_follow);
$chemo_follow_1 = htmlspecialchars($chemo_follow_1);
$chemo_follow_2 = htmlspecialchars($chemo_follow_2);
$chemo_follow_3 = htmlspecialchars($chemo_follow_3);
$chemo_follow_4 = htmlspecialchars($chemo_follow_4);
$chemo_follow_5 = htmlspecialchars($chemo_follow_5);
$chemo_follow_6 = htmlspecialchars($chemo_follow_6);
$chemo_follow_7 = htmlspecialchars($chemo_follow_7);
$chemo_follow_8 = htmlspecialchars($chemo_follow_8);
$chemo_follow_9 = htmlspecialchars($chemo_follow_9);
$chemo_follow_10 = htmlspecialchars($chemo_follow_10);
$chemo_follow_11 = htmlspecialchars($chemo_follow_11);
$chemo_follow_12 = htmlspecialchars($chemo_follow_12);
$chemo_follow_13 = htmlspecialchars($chemo_follow_13);
$chemo_follow_14 = htmlspecialchars($chemo_follow_14);
$chemo_follow_15 = htmlspecialchars($chemo_follow_15);
$chemo_follow_16 = htmlspecialchars($chemo_follow_16);
$chemo_follow_17 = htmlspecialchars($chemo_follow_17);
$chemo_follow_18 = htmlspecialchars($chemo_follow_18);
$chemo_follow_19 = htmlspecialchars($chemo_follow_19);
$chemo_follow_20 = htmlspecialchars($chemo_follow_20);
$chemo_follow_21 = htmlspecialchars($chemo_follow_21);
$chemo_follow_22 = htmlspecialchars($chemo_follow_22);
$chemo_follow_23 = htmlspecialchars($chemo_follow_23);
$chemo_follow_24 = htmlspecialchars($chemo_follow_24);
$chemo_follow_25 = htmlspecialchars($chemo_follow_25);
$chemo_follow_26 = htmlspecialchars($chemo_follow_26);
$chemo_follow_27 = htmlspecialchars($chemo_follow_27);
$chemo_follow_28 = htmlspecialchars($chemo_follow_28);
$chemo_follow_28_1 = htmlspecialchars($chemo_follow_28_1);
$chemo_follow_28_2 = htmlspecialchars($chemo_follow_28_2);
$chemo_follow_29 = htmlspecialchars($chemo_follow_29);
$chemo_other_follow_29 = htmlspecialchars($chemo_other_follow_29);
$sal_immun_1 = htmlspecialchars($sal_immun_1);
$sal_immun_2 = htmlspecialchars($sal_immun_2);
$sal_immun_3 = htmlspecialchars($sal_immun_3);
$sal_immun_3_1 = htmlspecialchars($sal_immun_3_1);
$sal_immun_3_2 = htmlspecialchars($sal_immun_3_2);
$sal_immun_4 = htmlspecialchars($sal_immun_4);
$sal_immun_4_text = htmlspecialchars($sal_immun_4_text);
$sal_radio_follow = htmlspecialchars($sal_radio_follow);
$sal_surgery_follow = htmlspecialchars($sal_surgery_follow);
$stem_cell_follow = htmlspecialchars($stem_cell_follow);
$date_stem_cell_follow = htmlspecialchars($date_stem_cell_follow);
$stem_cell_method = htmlspecialchars($stem_cell_method);
$conditioning = htmlspecialchars($conditioning);
$donor_follow = htmlspecialchars($donor_follow);
$donor_follow_other = htmlspecialchars($donor_follow_other);
$date_last_contact_follow = htmlspecialchars($date_last_contact_follow);
$status_follow = htmlspecialchars($status_follow);
$alive_status = htmlspecialchars($alive_status);
$date_dead_follow = htmlspecialchars($date_dead_follow);
$cause_of_dead = htmlspecialchars($cause_of_dead);
$cause_of_dead_other = htmlspecialchars($cause_of_dead_other);
$lymphoma_status = htmlspecialchars($lymphoma_status);

$sql = "UPDATE " . TB_ADD_DATA . "
SET date_record_follow='$date_record_follow' ,
chemotherapy_follow='$chemotherapy_follow',
date_chemo_follow='$date_chemo_follow',
chemo_select_follow='$chemo_select_follow',
chemo_select_follow_other='$chemo_select_follow_other',
received_follow='$received_follow',
immunotherapy_follow='$immunotherapy_follow',
date_immun_follow='$date_immun_follow' ,
immun_select_follow='$immun_select_follow',
radiotherapy_follow='$radiotherapy_follow',
rituximab_1='$rituximab_1',
rituximab_2='$rituximab_2',
rituximab_3='$rituximab_3',
rituximab_4='$rituximab_4',
immun_other_text='$immun_other_text',
date_rad_follow='$date_rad_follow',
surgery_follow='$surgery_follow',
date_surgery_follow='$date_surgery_follow',
no_treatment_follow='$no_treatment_follow',
result_follow='$result_follow',
date_complete_follow='$date_complete_follow',
result_cause_follow='$result_cause_follow',
progression_follow='$progression_follow',
date_progression_follow='$date_progression_follow',
histology_follow='$histology_follow',
lymphnode_follow='$lymphnode_follow',
extranodal_follow='$extranodal_follow',
extr_1_follow='$extr_1_follow',
extr_2_follow='$extr_2_follow',
extr_3_follow='$extr_3_follow',
extr_4_follow='$extr_4_follow',
extr_5_follow='$extr_5_follow',
extr_6_follow='$extr_6_follow',
extr_7_follow='$extr_7_follow',
extr_8_follow='$extr_8_follow',
extr_9_follow='$extr_9_follow',
extr_10_follow='$extr_10_follow',
extr_11_follow='$extr_11_follow',
extr_12_follow='$extr_12_follow',
extr_13_follow='$extr_13_follow',
extr_14_follow='$extr_14_follow',
extr_15_follow='$extr_15_follow',
extr_16_follow='$extr_16_follow',
extr_17_follow='$extr_17_follow',
extr_other='$extr_other',
extr_other_text='$extr_other_text',
salvage_follow='$salvage_follow',
chemo_follow_1='$chemo_follow_1',
chemo_follow_2='$chemo_follow_2',
chemo_follow_3='$chemo_follow_3',
chemo_follow_4='$chemo_follow_4',
chemo_follow_5='$chemo_follow_5',
chemo_follow_6='$chemo_follow_6',
chemo_follow_7='$chemo_follow_7',
chemo_follow_8='$chemo_follow_8',
chemo_follow_9='$chemo_follow_9',
chemo_follow_10='$chemo_follow_10',
chemo_follow_11='$chemo_follow_11',
chemo_follow_12='$chemo_follow_12',
chemo_follow_13='$chemo_follow_13',
chemo_follow_14='$chemo_follow_14',
chemo_follow_15='$chemo_follow_15',
chemo_follow_16='$chemo_follow_16',
chemo_follow_17='$chemo_follow_17',
chemo_follow_18='$chemo_follow_18',
chemo_follow_19='$chemo_follow_19',
chemo_follow_20='$chemo_follow_20',
chemo_follow_21='$chemo_follow_21',
chemo_follow_22='$chemo_follow_22',
chemo_follow_23='$chemo_follow_23',
chemo_follow_24='$chemo_follow_24',
chemo_follow_25='$chemo_follow_25',
chemo_follow_26='$chemo_follow_26',
chemo_follow_27='$chemo_follow_27',
chemo_follow_28='$chemo_follow_28',
chemo_follow_28_1='$chemo_follow_28_1',
chemo_follow_28_2='$chemo_follow_28_2',
chemo_follow_29='$chemo_follow_29',
chemo_other_follow_29='$chemo_other_follow_29',
sal_immun_1='$sal_immun_1',
sal_immun_2='$sal_immun_2',
sal_immun_3='$sal_immun_3',
sal_immun_3_1='$sal_immun_3_1',
sal_immun_3_2='$sal_immun_3_2',
sal_immun_4='$sal_immun_4',
sal_immun_4_text='$sal_immun_4_text',
sal_radio_follow='$sal_radio_follow',
sal_surgery_follow='$sal_surgery_follow',
stem_cell_follow='$stem_cell_follow',
date_stem_cell_follow='$date_stem_cell_follow',
stem_cell_method='$stem_cell_method',
conditioning='$conditioning',
donor_follow='$donor_follow',
donor_follow_other='$donor_follow_other',
date_last_contact_follow='$date_last_contact_follow',
status_follow='$status_follow',
alive_status='$alive_status',
date_dead_follow='$date_dead_follow',
cause_of_dead='$cause_of_dead',
cause_of_dead_other='$cause_of_dead_other',
lymphoma_status='$lymphoma_status',
edit_member_follow='$edit_member',
edit_date_follow='$date_small9'
WHERE id='$id' ";

$result = mysql_query($sql) or die("ไม่สามารถบันทึกข้อมูลได้ครับ กรุณาตรวจสอบข้อมููลให้ถูกต้อง");
echo "<br><center><img src='images/icon/login-redirection-loader.gif' BORDER='0'></center><br><br>";
echo "<center><font size=\"3\" face='MS Sans Serif'><b>แก้ไขข้อมูลเรียบร้อยแล้ว</b></font></center>";

echo "<center><font size=\"3\" face='MS Sans Serif'><b>กรุณารอสักครู่ เรากำลังนำท่านกลับสู่หน้าหลัก</b></font></center>";
echo "<meta http-equiv='refresh' content='2; url=?name=index&file=index'>";
?>
<BR /><br /><br />
<?php include "modules/index/footer.php"; ?>