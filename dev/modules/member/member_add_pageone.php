<?php
session_start();
if (!session_is_registered("login_true")) {
    exit();
    echo " bgcolor=FFFFFF";
}
### ������� ###
?>
<?php include "modules/index/header.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
        <title></title>
    </head>
    <body>
        <h1>�ѹ�֡��������������</h1>

        <?php
        $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);

        $result = mysql_query("select * from " . TB_MEMBER . " where user='$login_true'") or die("Err Can not to result");
        $dbarr = mysql_fetch_array($result);
        $member_id = $dbarr["member_id"];
        $codehos = $dbarr["codehos"];
        ?>
        <?php
        $dmy = "$date_of_birth"; //dmy-ymd    �ŧ���ѹ�Դ
        list($day, $month, $year) = explode("-", $dmy);
        //	$year = $year-543;
        $ymd_birth = "$year-$month-$day";
        list($byear, $bmonth, $bday) = explode("-", $ymd_birth);       //�ش��ͧ����¹
        //echo $ymd_birth;
        //  	$birthday = "1982-06-10";      //�ٻẺ����纤�Ң������ѹ�Դ
        //		$today = date("Y-m-d");   //�ش��ͧ����¹
        ?>

        <?php date_default_timezone_set("Asia/Bangkok"); ?><br />
        <?php
        echo $centre;
        echo $patient_initials;
        echo $ymd_birth;
        ///////////////////
        $date_today = date("d/m/");
        $date_today1 = date("Y") + '543';
        $date_date = date("d/m/$date_today1");
        $string = $date_today1;
        $date_small = $date_today . substr($string, 2);
        ///////////////////			
        $date_todayone = date("d");
        $date_todaymonth = date("m");
        $date_today9 = date("Y") + '543';
        $string1 = $date_today9;
        $date_small9 = substr($string1, 2) . $date_todaymonth . $date_todayone;
        ////////////////////
        $date_today11 = date("d");
        $m_today12 = date("m");
        /////////////
        $date = $_POST["date_today11"];
        $Title = $_POST["Title"];
        ////////////
        $date = $date_date;
        $month = $m_today12;
        $year = $date_today9;

        $date_of_record = $d_record . $m_record . $y_record;
        ?>

        <?php
        require_once("includes/add_data.php");
        mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("�Դ��Ͱҹ�����������");
        // ���͡�ҹ������
        mysql_select_db(DB_NAME) or die("���͡�ҹ�����������");
        // ����� SQL ���������ӧҹ
        $sql = "insert into  " . TB_ADD_DATA . " (centre,
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
        hiv_positive,
        member_add,
        date_add)
        values ('$centre',
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
        '$type',
        '$hodgkin_don',
        '$type_non',
        '$type_sub_non',
        '$who_sub',
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
        '$hiv_positive',
        '$member_id',
        '$date_date')";

        mysql_query("SET NAMES tis620");
        $dbquery = mysql_db_query(DB_USERNAME, $sql);
        mysql_close();
        ?>				
        <?php
        echo "<center><font size=\"3\" face='MS Sans Serif'><b>�����Ţͧ�س ��١�ѹ�֡���Ǥ�Ѻ</b></font><BR><BR><BR><BR><BR><BR><BR><BR></center>";
        echo "<meta http-equiv='refresh' content='1; url=index.php'>";
        ?>

    </body>
</html>

