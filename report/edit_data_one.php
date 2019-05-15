<?php
include "modules/index/header.php";
$db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
$result = mysql_query("select * from " . TB_MEMBER . " where user='" . $_SESSION['login_true'] . "'") or die("Err Can not to result");
$dbarr = mysql_fetch_array($result);
$centre = $dbarr['codehos'];
//$login_true=$_SESSION['login_true'];
$result = mysql_query("select * from " . TB_ADD_DATA . " where id='" . $_GET['id'] . "' order by id DESC") or die("Err Can not to result");
$dbarr = mysql_fetch_array($result);
$date_of_birth = $dbarr['date_of_birth'];
$dateofrecord = $dbarr['dateofrecord'];
date_default_timezone_set("Asia/Bangkok");
///////////////////
$date_today = date("d/m/");
$date_today1 = date("Y")+'543';
$date_date = date("d/m/$date_today1");
$string = $date_today1;
$date_small = $date_today . substr($string, 2);
///////////////////
$date_todayone = date("d");
$date_todaymonth = date("m");
$date_today9 = date("Y")+'543';
$string1 = $date_today9;
$date_small9 = substr($string1, 2) . $date_todaymonth . $date_todayone;
////////////////////
$date_today_now = $date_today9 . '-' . $date_todaymonth . '-' . $date_todayone;
/////////////
?>
<link type="text/css" href="javascript/flora.calendars.picker.css" rel="stylesheet"/>
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.plus.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.picker.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.thai.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.thai-th.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.picker-th.js"></script>

<script type="text/javascript">
  $(function() {
   $('#mydate').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#datebirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_assessment').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_start').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_transplantation').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#mybirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_of_diagnosis').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_bio_report').calendarsPicker({calendar: $.calendars.instance('thai','th')});
 });
</script>
<!-- main content -->
<div id="center">
  <h1>แก้ไขข้อมูล  Lymphoma Registry </h1>
  <p>
    <center>
     <?php
$dmy = "$date_of_birth"; //dmy-ymd    แปลงปีวันเกิด
list($day, $month, $year) = explode("-", $dmy);

$dro = "$dateofrecord"; //dmy-ymd    แปลงวัน record
list($cday, $cmonth, $cyear) = explode("-", $dro);
$dro_date = "$cyear-$cmonth-$cday";
list($cyear, $cmonth, $cday) = explode("-", $dro_date); //จุดต้องเปลี่ยน
//    $year = $year-543;
$ymd_birth = "$year-$month-$day";

//echo $ymd_birth;
//      $birthday = "1982-06-10";      //รูปแบบการเก็บค่าข้อมูลวันเกิด
//        $today = date("Y-m-d");   //จุดต้องเปลี่ยน
list($byear, $bmonth, $bday) = explode("-", $ymd_birth); //จุดต้องเปลี่ยน
list($tyear, $tmonth, $tday) = explode("-", $date_today_now); //จุดต้องเปลี่ยน

$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear);
$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear);

$mage = ($dateofrecord - $date_of_birth);
?>
<form name ="checkForm"  action="?name=member&file=edit_data_add_one" method="post" onSubmit="return check();"  enctype="multipart/form-data">
  <center>

    <table width="100%" border="0" align="center">
      <tr>
        <th align="left" width="32%"><strong>Patient Code : </strong></th>
        <td align="left" width="68%"><br /><strong><input type="hidden"  name="centre"  value="<?php echo $dbarr['codehos']; ?>"  size="10"  readonly="readonly"/> <?php echo $dbarr['codehos']; ?></strong></br></br></td>

      </tr>
      <tr>
        <th align="left" width="32%">Patient Initials :</th>
        <td align="left" colspan="3"> <br /><input type="hidden" name="patient_initials" size="10"   value="<?php echo $dbarr['patient_initials']; ?>" maxlength="2" readonly="readonly" /> <?php echo strtoupper($dbarr['patient_initials']); ?> </br></br>   </td>
      </tr>
      <tr>
        <th align="left" width="32%">Gender : </th>
        <td align="left" colspan="3"> <br />
          <input type="hidden"   name="sex" size="10" value="<?php echo $dbarr['sex']; ?>"  readonly="readonly" > <?php echo $dbarr['sex']; ?> <br /><br />
        </td>
      </tr>
      <?php
$dmy = $dbarr['date_of_birth']; //dmy-ymd    แปลงปีวันเกิด
list($day, $month, $year) = explode("-", $dmy);
$ymd_birth = "$year-$month-$day";

//echo $ymd_birth;
//      $birthday = "1982-06-10";      //รูปแบบการเก็บค่าข้อมูลวันเกิด
//        $today = date("Y-m-d");   //จุดต้องเปลี่ยน
list($byear, $bmonth, $bday) = explode("-", $ymd_birth); //จุดต้องเปลี่ยน
list($tyear, $tmonth, $tday) = explode("-", $date_today_now); //จุดต้องเปลี่ยน
$mage = ($dateofrecord - $date_of_birth);
?>
<tr>
  <th align="left" width="32%">Date of birth : </th>
  <td align="left" colspan="3"> <br />
   <input type="hidden" size="10"  name="date_of_birth" value="<?php echo $dbarr['date_of_birth']; ?>" maxlength="10"  readonly="readonly" >   <?php echo "$ymd_birth"; ?>      (พ.ศ.)     <br /><br />
 </td>
</tr>
<tr>
  <th align="left" width="32%">Date of biopsy :  </th>
  <td align="left" colspan="3"> <br />
    <input type="hidden" name="date_bio_report"   value="<?php echo $dbarr['date_bio_report']; ?>"  size="10" readonly="readonly"/><?php echo $dbarr['date_bio_report']; ?><br /><br />
  </td>
</tr>
<tr>
  <th align="left" width="32%">Date of record: </th>
  <td colspan="3"> <br />
    วันที่ <input name="dateofrecord" type="hidden"  value="<?php echo $dateofrecord; ?>"  size="10"  readonly="readonly"/><b><?php echo $dro_date; ?> (พ.ศ.)</b>
    <br /><br />    </td>
  </tr>

  <tr>
    <th align="left" width="32%"><br /><strong>Centre : </strong><br /></th>
    <th align="left" width="68%" colspan="3"><br /><strong><input type="hidden" name="centre"  value="<?php echo $dbarr['centre']; ?>"  size="10"  readonly="readonly"/><?php echo $dbarr['centre']; ?>
    </strong><br /><br /></th>
    <input type="hidden" name="codehos"  value="<?php echo $dbarr['codehos']; ?>"  size="10"  readonly="readonly"/>
  </tr>
  <tr>
    <th align="left" width="32%">Patient Initials :</th>
    <td colspan="3"><br /> <input type="text" name="patient_initials" size="2"  id="patient_initials" value="<?php echo $dbarr['patient_initials']; ?>" maxlength="2"  style="text-transform: uppercase" onkeyup="onaction();" /><b>** กรุณากรอกเป็นภาษาอังกฤษตัวพิมพ์ใหญ่</b><br /><br />     </td>
  </tr>
  <tr>
    <th colspan="4">Participant Demographic data:</th>
  </tr>
  <tr>
    <th align="left" width="32%">Gender:</th>
    <td colspan="3"> <br />
      <input type="radio"   name="sex"  value="Male" id="sex1" <?php if ($dbarr['sex'] == 'Male') {
    echo "checked";
}
?> onclick="onaction();"  >  Male  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio"   name="sex"  value="Female" id="sex2" <?php if ($dbarr['sex'] == 'Female') {
    echo "checked";
}
?> onclick="onaction();"  >  Female  &nbsp;&nbsp;&nbsp;&nbsp;
      <br /><br />
    </td>
  </tr>
  <tr>
    <th align="left">ID :</th>
    <td colspan="3" > <br />
     <input type="password" size="10"  name="id_card" id="id_card1" maxlength="13" value="<?php echo $dbarr['id_card']; ?>"  onkeyup="onaction();"  >   &nbsp;&nbsp;&nbsp;     กรุณากรอกเป็นตัวเลข(Ex: 1522222222xx)  <font color="#FF0000">**ถ้าไม่รู้ให้ใส่เครื่องหมาย '-'</font>
	 <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
     <br /><br />
   </td>
 </tr>
 <tr>
  <th align="left">Confirm ID::</th>
  <td colspan="3" > <br />
    <input type="password" size="10"  name="id_card_confirm" id="id_card_confirm1" value="<?php echo $dbarr['id_card_confirm']; ?>"  maxlength="13"  onkeyup="onaction();" > &nbsp;&nbsp;    กรุณากรอกเป็นตัวเลข(Ex: 1522222222xx) <font color="#FF0000">**ถ้าไม่รู้ให้ใส่เครื่องหมาย '-'</font> <br /><br /></td>
  </tr>
  <tr>
    <th align="left">HN :</th>
    <td colspan="3" > <br />
      <input type="password" size="10"  name="hn" maxlength="20"  id="hn1" value="<?php echo $dbarr['hn']; ?>"  onkeyup="onaction();" > &nbsp;&nbsp;    (Example: 5-19-42/48 = 5194248)<br /><br /></td>
    </tr>
    <tr>
      <th align="left">Confirm HN :</th>
      <td colspan="3" > <br />
        <input type="password" size="10"  name="hn_confirm" maxlength="20"  id="hn2" value="<?php echo $dbarr['hn_confirm']; ?>"  onkeyup="onaction();" > &nbsp;&nbsp;    (Example: 5-19-42/48 = 5194248)<br /><br /></td>
      </tr>
      <tr>
        <th align="left">Date of Birth:</th>
        <td colspan="3" > <br />
          <input type="text" id="mybirth" size="8"  name="date_of_birth" value="<?php echo "$ymd_birth"; ?>" maxlength="10"   onkeyup="onaction();" >
          (dd-mm-พ.ศ.(2500))<button type="button" onclick="calyear()">cal</button><br /><hr /><b><span id="yearold"></span><input type="hidden" id='input_yearold' value=""></b><br /><br />
          <font color="#FF0000"><b>กรุณากด cal เพื่อคำนวณอายุ</b></font>
          <?php

//echo "อายุ <b>$mage</b>" . "<br>\n";
//    echo " <b>$dro_date</b>"."<br>\n";
/*
$u_y=date("Y", $mage)-1970;
$u_m=date("m",$mage)-1;
$u_d=date("d",$mage)-1;

echo"<br><br>$u_y   ปี    $u_m เดือน      $u_d  วัน<br><br>";
 */
?>

</tr>
<tr>
  <th align="left">Current address  :(in the last 6 months)</th>
  <td colspan="3" > <br />
    <select name="province" id="province" style="width:150px;"   onchange="onaction();" >
     <option  value="<?php echo $dbarr['province']; ?>"><?php echo $dbarr['province']; ?></option>
     <option  value="<?php echo $dbarr['province']; ?>"><?php echo $dbarr['province']; ?></option>
     <option value="Amnat Charoen">Amnat Charoen</option>
     <option value="Ang Thong">Ang Thong</option>
     <option value="Bangkok" >Bangkok</option>
     <option value="Buri Ram">Buri Ram</option>
     <option value="Ayutthaya">Ayutthaya</option>
     <option value="Chachoengsao">Chachoengsao</option>
     <option value="Chainat">Chainat</option>
     <option value="Chaiyaphum">Chaiyaphum</option>
     <option value="Chanthaburi">Chanthaburi</option>
     <option value="Chiang Mai">Chiang Mai</option>
     <option value="Chiang Rai">Chiang Rai</option>
     <option value="Chonburi">Chonburi</option>
     <option value="Chumphon">Chumphon</option>
     <option value="Kalasin">Kalasin</option>
     <option value="Kamphaeng Phet">Kamphaeng Phet</option>
     <option value="Kanchanaburi">Kanchanaburi</option>
     <option value="Khon Kaen">Khon Kaen</option>
     <option value="Krabi">Krabi</option>
     <option value="Lampang">Lampang</option>
     <option value="Lamphun">Lamphun</option>
     <option value="Loei">Loei</option>
     <option value="Lopburi">Lopburi</option>
     <option value="Mae Hong Son">Mae Hong Son</option>
     <option value="Maha Sarakham">Maha Sarakham</option>
     <option value="Mukdahan">Mukdahan</option>
     <option value="Nakhon Nayok">Nakhon Nayok</option>
     <option value="Nakhon Pathom">Nakhon Pathom</option>
     <option value="Nakhon Phanom">Nakhon Phanom</option>
     <option value="Nakhon Ratchasima">Nakhon Ratchasima</option>
     <option value="Nakhon Sawan">Nakhon Sawan</option>
     <option value="Nakhon Si Thammarat">Nakhon Si Thammarat</option>
     <option value="Nan">Nan</option>
     <option value="Narathiwat">Narathiwat</option>
     <option value="Nong Khai">Nong Khai</option>
     <option value="Nongbua Lamphu">Nongbua Lamphu</option>
     <option value="Nonthaburi">Nonthaburi</option>
     <option value="Pathum Than">Pathum Than</option>
     <option value="Pattani">Pattani</option>
     <option value="Phang Nga">Phang Nga</option>
     <option value="Phattalung">Phattalung</option>
     <option value="Phayao">Phayao</option>
     <option value="Phetchabun">Phetchabun</option>
     <option value="Phetchaburi">Phetchaburi</option>
     <option value="Phichit">Phichit</option>
     <option value="Phitsanulok">Phitsanulok</option>
     <option value="Phrae">Phrae</option>
     <option value="Phuket">Phuket</option>
     <option value="Prachinburi">Prachinburi</option>
     <option value="Prachuap Khiri Khan">Prachuap Khiri Khan</option>
     <option value="Ranong">Ranong</option>
     <option value="Ratchaburi">Ratchaburi</option>
     <option value="Rayong">Rayong</option>
     <option value="Roi Et">Roi Et</option>
     <option value="Sa Kaeo">Sa Kaeo</option>
     <option value="Sakon Nakhon">Sakon Nakhon</option>
     <option value="Samut Prakan">Samut Prakan</option>
     <option value="Samut Sakhon">Samut Sakhon</option>
     <option value="Samut Songkhram">Samut Songkhram</option>
     <option value="Saraburi">Saraburi</option>
     <option value="Satun">Satun</option>
     <option value="Si Sa Ket">Si Sa Ket</option>
     <option value="Sing Buri">Sing Buri</option>
     <option value="Songkhla">Songkhla</option>
     <option value="Sukhothai">Sukhothai</option>
     <option value="Suphanburi">Suphanburi</option>
     <option value="Surat Thani">Surat Thani</option>
     <option value="Surin">Surin</option>
     <option value="Tak">Tak</option>
     <option value="Trang">Trang</option>
     <option value="Trat">Trat</option>
     <option value="Ubon Ratchathani">Ubon Ratchathani</option>
     <option value="Udon Thani">Udon Thani</option>
     <option value="Uthai Thani">Uthai Thani</option>
     <option value="Uttaradit">Uttaradit</option>
     <option value="Yala">Yala</option>
     <option value="Yasothon">Yasothon</option>
     <option value="Bueng Kan">Bueng Kan</option>
   </select> <br /></td>
 </tr>
 <tr>
  <th align="left">Mode of payment:</th>
  <td colspan="3" ><br />
   <input type="radio"  name="payment"  id="payment1" value="Government"  <?php if ($dbarr['payment'] == "Government") {
    echo "checked";
}
?>  onclick="onaction();" />  1. Government  <br /><br />
  <input type="radio"  name="payment"  id="payment2"  value="Social security" <?php if ($dbarr['payment'] == "Social security") {
    echo "checked";
}
?> onclick="onaction();" />  2. Social security<br /><br />
  <input type="radio"  name="payment"  id="payment3"  value="Private insurance"  <?php if ($dbarr['payment'] == "Private insurance") {
    echo "checked";
}
?>  onclick="onaction();" > 3. Private insurance<br /><br />
  <input type="radio"  name="payment"  id="payment4"  value="UC (30 baht)" <?php if ($dbarr['payment'] == "UC (30 baht)") {
    echo "checked";
}
?>  onclick="onaction();" />  4.  UC (30 baht)<br /><br />
  <input type="radio"  name="payment"  id="payment5"  value="Out of pocket" <?php if ($dbarr['payment'] == "Out of pocket") {
    echo "checked";
}
?>  onclick="onaction();" />  5. Out of pocket<br /><br />
  <input type="radio"  name="payment"  id="payment6"  value="Other: specify" <?php if ($dbarr['payment'] == "Other: specify") {
    echo "checked";
}
?>   onclick="onaction();"   />  6. Other <br /><br />
  <strong>   specify  :</strong>  &nbsp;&nbsp;  <input type="text" name="payment_other" value="<?php echo $dbarr['payment_other']; ?>" size="50"  />

</td>
</tr>

<tr>
  <th align="center" colspan="4">Lymphoma Database</th>
</tr>
<tr>
  <th align="left">Date of biopsy report :</th>
  <td colspan="3" > <br />
   <input type="text" name="date_bio_report" id="date_bio_report"  value="<?php echo $dbarr['date_bio_report']; ?>"  size="10"  onkeyup="onaction();" /> &nbsp;&nbsp; (dd-mm-พ.ศ.(2500))<br /><br /></td>
 </tr>
 <tr>
  <th align="left">Pathology No.:</th>
  <td colspan="3" > <br />
    <input type="password" size="10"  name="pathology"  id="pathology" value="<?php echo $dbarr['pathology']; ?>"  onkeyup="onaction();" >  (Example: SP47-0007/47 = SP47000747)<br /><br /></td>
  </tr>
  <tr>
    <th align="left">Confirm Pathology No.:</th>
    <td colspan="3" > <br />
     <input type="password" size="10"  name="pathology_confirm"  id="pathology_confirm" value="<?php echo $dbarr['pathology_confirm']; ?>"  onkeyup="onaction();">  (Example: SP47-0007/47 = SP47000747)<br /><br /></td>
   </tr>
   <tr>
    <th align="left">Biopsy site  :</th>
    <td colspan="3" > <br />
      <select name="biopsy_site" style="width:150px;" id="biopsy_site" onchange="onaction();" >
       <option  value="<?php echo $dbarr['biopsy_site']; ?>"><?php echo $dbarr['biopsy_site']; ?></option>
       <option name="biopsy_site" value="<?php echo $dbarr['biopsy_site']; ?>"><?php echo $dbarr['biopsy_site']; ?></option>
       <option value="Lymph node">Lymph node</option>
       <option value="Waldeyer's ring">Waldeyer's ring</option>
       <option value="Sinonasal">Sinonasal</option>
       <option value="Salivary gland">Salivary gland</option>
       <option value="Thyroid">Thyroid</option>
       <option value="Eye/Ocular adnexa">Eye/Ocular adnexa</option>
       <option value="Lung/Pleura">Lung/Pleura</option>
       <option value="Breast">Breast</option>
       <option value="Stomach">Stomach</option>
       <option value="Small intestine">Small intestine</option>
       <option value="Large intestine">Large intestine</option>
       <option value="Liver">Liver</option>
       <option value="Spleen">Spleen</option>
       <option value="Testis">Testis</option>
       <option value="Brain/CNS">Brain/CNS</option>
       <option value="Bone">Bone</option>
       <option value="Skin/Subcutaneous">Skin/Subcutaneous</option>
       <option value="Bone marrow">Bone marrow</option>
       <option value="Others">Others</option>
     </select> <br /><br /></td>
   </tr>
   <tr>
    <th align="left">Type:</th>
    <td colspan="3" > <br />
      <input type="radio" name="type"  value="HL" id="type1" <?php if ($dbarr['type'] == 'HL') {
    echo "checked";
}
?> onclick="onaction();" > Hodgkin lymphoma (HL)  <br /><br />
      <div id="detail_hodgkin">
       <select name="hodgkin_don" id="hodgkin_don1" style="width:300px;">
        <option value="01: Classical HL, Nodular sclerosis" <?php if ($dbarr['hodgkin_don'] == "01: Classical HL, Nodular sclerosis") {echo "selected";}?>>01: Classical HL, Nodular sclerosis</option>
        <option value="02: Classical HL, Mixed cellularity" <?php if ($dbarr['hodgkin_don'] == "02: Classical HL, Mixed cellularity") {echo "selected";}?>>02: Classical HL, Mixed cellularity </option>
        <option value="03: Classical HL, Lymphocyte-rich" <?php if ($dbarr['hodgkin_don'] == "03: Classical HL, Lymphocyte-rich") {echo "selected";}?>>03: Classical HL, Lymphocyte-rich </option>
        <option value="04: Classical HL, Lymphocyte-depleted" <?php if ($dbarr['hodgkin_don'] == "04: Classical HL, Lymphocyte-depleted") {echo "selected";}?>>04: Classical HL, Lymphocyte-depleted </option>
        <option value="05: HL, Nodular lymphocyte predominant" <?php if ($dbarr['hodgkin_don'] == "05: HL, Nodular lymphocyte predominant") {echo "selected";}?>>05: HL, Nodular lymphocyte predominant</option>
        <option value="06: HL, unclassifiable" <?php if ($dbarr['hodgkin_don'] == "06: HL, unclassifiable") {echo "selected";}?>>06: HL, unclassifiable</option>
      </select>
    </div>

    <input type="radio"   name="type" value="NHL"  id="type2" <?php if ($dbarr['type'] == "NHL") {
    echo "checked";
}
?>  onclick="onaction();"   />   Non-Hodgkin lymphoma (NHL) <br /><br />
    <div id="detail_non_hodgkin">
      <strong>Immunophenotype:    </strong>
      <select name="type_non" id="type_non1" style="width:150px;">
       <option  value="<?php echo $dbarr['type_non']; ?>"><?php echo $dbarr['type_non']; ?></option>
       <option  value="<?php echo $dbarr['type_non']; ?>"><?php echo $dbarr['type_non']; ?></option>
       <option value="B">B</option>
       <option value="T/NK">T/NK</option>
       <option value="Unclassify">Unclassify</option>
       <option value="Not done">Not done</option>
     </select>
     <br />
     <input type="radio"   name="type_sub_non" value="WHO"  id="type_sub_non1" <?php if ($dbarr['type_sub_non'] == "WHO") {
    echo "checked";
}
?>   />   WHO classification  <br />
    <select name="who_sub" id="who_sub" style="width:400px;">
     <option value="">Please select..</option>
     <option value="07 : Precursor B-lymphoblastic lymphoma" <?php if ($dbarr["who_sub"] == "07 : Precursor B-lymphoblastic lymphoma") {echo " selected";}?> >07 : Precursor B-lymphoblastic lymphoma</option>
     <option value="08 : Small lymphocytic lymphoma" <?php if ($dbarr["who_sub"] == "08 : Small lymphocytic lymphoma") {echo " selected";}?> >08 : Small lymphocytic lymphoma</option>
     <option value="09 : Lymphoplasmacytic lymphoma" <?php if ($dbarr["who_sub"] == "09 : Lymphoplasmacytic lymphoma") {echo " selected";}?> >09 : Lymphoplasmacytic lymphoma</option>
     <option value="10 : Splenic marginal zone lymphoma" <?php if ($dbarr["who_sub"] == "10 : Splenic marginal zone lymphoma") {echo " selected";}?> >10 : Splenic marginal zone lymphoma</option>
     <option value="11 : Extranodal marginal zone lymphoma of MALT type" <?php if ($dbarr["who_sub"] == "11 : Extranodal marginal zone lymphoma of MALT type") {echo " selected";}?> >11 : Extranodal marginal zone lymphoma of MALT type</option>
     <option value="12 : Nodal marginal zone lymphoma" <?php if ($dbarr["who_sub"] == "12 : Nodal marginal zone lymphoma") {echo " selected";}?> >12 : Nodal marginal zone lymphoma</option>
     <option value="13A : In situ follicular neoplasia" <?php if ($dbarr["who_sub"] == "13A : In situ follicular neoplasia") {echo " selected";}?> >13A : In situ follicular neoplasia</option>
     <option value="13B : Duodenal-type follicular lymphoma" <?php if ($dbarr["who_sub"] == "13B : Duodenal-type follicular lymphoma") {echo " selected";}?> >13B : Duodenal-type follicular lymphoma</option>
     <option value="13 : Follicular lymphoma, grade 1" <?php if ($dbarr["who_sub"] == "13 : Follicular lymphoma, grade 1") {echo " selected";}?> >13 : Follicular lymphoma, grade 1</option>
     <option value="14 : Follicular lymphoma, grade 2" <?php if ($dbarr["who_sub"] == "14 : Follicular lymphoma, grade 2") {echo " selected";}?> >14 : Follicular lymphoma, grade 2</option>
     <option value="15 : Follicular lymphoma, grade 3" <?php if ($dbarr["who_sub"] == "15 : Follicular lymphoma, grade 3") {echo " selected";}?> >15 : Follicular lymphoma, grade 3</option>
     <option value="16A : In situ mantle cell neoplasia" <?php if ($dbarr["who_sub"] == "16A : In situ mantle cell neoplasia") {echo " selected";}?> >16A : In situ mantle cell neoplasia</option>
     <option value="16 : Mantle cell lymphoma" <?php if ($dbarr["who_sub"] == "16 : Mantle cell lymphoma") {echo " selected";}?> >16 : Mantle cell lymphoma</option>
     <option value="17 : Diffuse large B-cell lymphoma (DLBCL), NOS" <?php if ($dbarr["who_sub"] == "17 : Diffuse large B-cell lymphoma (DLBCL), NOS") {echo " selected";}?> >17 : Diffuse large B-cell lymphoma (DLBCL), NOS</option>
     <option value="17A : Germinal center B-cell (GCB) DLBCL" <?php if ($dbarr["who_sub"] == "17A : Germinal center B-cell (GCB) DLBCL") {echo " selected";}?> >17A : Germinal center B-cell (GCB) DLBCL</option>
     <option value="17B : Activated B-cell (ABC) DLBCL" <?php if ($dbarr["who_sub"] == "17B : Activated B-cell (ABC) DLBCL") {echo " selected";}?> >17B : Activated B-cell (ABC) DLBCL</option>
     <option value="18 : Mediastinal (thymic) large B-cell lymphoma" <?php if ($dbarr["who_sub"] == "18 : Mediastinal (thymic) large B-cell lymphoma") {echo " selected";}?> >18 : Mediastinal (thymic) large B-cell lymphoma</option>
     <option value="19 : Intravascular large B-cell lymphoma" <?php if ($dbarr["who_sub"] == "19 : Intravascular large B-cell lymphoma") {echo " selected";}?> >19 : Intravascular large B-cell lymphoma</option>
     <option value="20 : Primary effusion lymphoma" <?php if ($dbarr["who_sub"] == "20 : Primary effusion lymphoma") {echo " selected";}?> >20 : Primary effusion lymphoma</option>
     <option value="21 : Burkitt lymphoma" <?php if ($dbarr["who_sub"] == "21 : Burkitt lymphoma") {echo " selected";}?> >21 : Burkitt lymphoma</option>
     <option value="22 : Lymphomatoid granulomatosis" <?php if ($dbarr["who_sub"] == "22 : Lymphomatoid granulomatosis") {echo " selected";}?> >22 : Lymphomatoid granulomatosis</option>
     <option value="23 : Post-transplant lymphoproliferative disorders(PTLD)" <?php if ($dbarr["who_sub"] == "23 : Post-transplant lymphoproliferative disorders(PTLD)") {echo " selected";}?> >23 : Post-transplant lymphoproliferative disorders(PTLD)</option>
     <option value="24 : Precursor T-lymphoblastic lymphoma" <?php if ($dbarr["who_sub"] == "24 : Precursor T-lymphoblastic lymphoma") {echo " selected";}?> >24 : Precursor T-lymphoblastic lymphoma</option>
     <option value="25 : Extranodal NK/T-cell lymphoma, nasal type" <?php if ($dbarr["who_sub"] == "25 : Extranodal NK/T-cell lymphoma, nasal type") {echo " selected";}?> >25 : Extranodal NK/T-cell lymphoma, nasal type</option>
     <option value="26 : Enteropathy-type T-cell lymphoma" <?php if ($dbarr["who_sub"] == "26 : Enteropathy-type T-cell lymphoma") {echo " selected";}?> >26 : Enteropathy-type T-cell lymphoma</option>
     <option value="26A : Enteropathy-associated T-cell lymphoma(TypeI EALT)" <?php if ($dbarr["who_sub"] == "26A : Enteropathy-associated T-cell lymphoma(TypeI EALT)") {echo " selected";}?> >26A : Enteropathy-associated T-cell lymphoma(TypeI EALT)</option>
     <option value="26B : Monomorphic epitheliotroptic intestinal T-cell lymphoma(TypeII EATL)" <?php if ($dbarr["who_sub"] == "26B : Monomorphic epitheliotroptic intestinal T-cell lymphoma(TypeII EATL)") {echo " selected";}?> >26B : Monomorphic epitheliotroptic intestinal T-cell lymphoma(TypeII EATL)</option>
     <option value="27 : Hepatosplenic T-cell lymphoma" <?php if ($dbarr["who_sub"] == "27 : Hepatosplenic T-cell lymphoma") {echo " selected";}?> >27 : Hepatosplenic T-cell lymphoma</option>
     <option value="28 : Subcutaneous panniculitis-like T-cell lymphoma" <?php if ($dbarr["who_sub"] == "28 : Subcutaneous panniculitis-like T-cell lymphoma") {echo " selected";}?> >28 : Subcutaneous panniculitis-like T-cell lymphoma</option>
     <option value="29 : Aggressive NK-cell leukemia/lymphoma" <?php if ($dbarr["who_sub"] == "29 : Aggressive NK-cell leukemia/lymphoma") {echo " selected";}?> >29 : Aggressive NK-cell leukemia/lymphoma</option>
     <option value="30 : Mycosis fungoides/Sezary syndrome" <?php if ($dbarr["who_sub"] == "30 : Mycosis fungoides/Sezary syndrome") {echo " selected";}?> >30 : Mycosis fungoides/Sezary syndrome</option>
     <option value="31 : Angioimmunblastic T-cell lymphoma" <?php if ($dbarr["who_sub"] == "31 : Angioimmunblastic T-cell lymphoma") {echo " selected";}?> >31 : Angioimmunblastic T-cell lymphoma</option>
     <option value="32 : Primary cutaneous anaplastic large cell lymphoma" <?php if ($dbarr["who_sub"] == "32 : Primary cutaneous anaplastic large cell lymphoma") {echo " selected";}?> >32 : Primary cutaneous anaplastic large cell lymphoma</option>
     <option value="33 : Anaplastic large cell lymphoma, ALK positive" <?php if ($dbarr["who_sub"] == "33 : Anaplastic large cell lymphoma, ALK positive") {echo " selected";}?> >33 : Anaplastic large cell lymphoma, ALK positive</option>
     <option value="34 : Peripheal T-cell lymphoma, unspecified, NOS" <?php if ($dbarr["who_sub"] == "34 : Peripheal T-cell lymphoma, unspecified, NOS") {echo " selected";}?> >34 : Peripheal T-cell lymphoma, unspecified, NOS</option>
     <option value="--**New entity**--" <?php if ($dbarr["who_sub"] == "--**New entity**--") {echo " selected";}?> >--**New entity**--</option>
     <option value="35 : T-cell/histiocyte-rich large B-cell lymphoma" <?php if ($dbarr["who_sub"] == "35 : T-cell/histiocyte-rich large B-cell lymphoma") {echo " selected";}?> >35 : T-cell/histiocyte-rich large B-cell lymphoma</option>
     <option value="36 : Primary cutaneous follicle enter lymphoma" <?php if ($dbarr["who_sub"] == "36 : Primary cutaneous follicle enter lymphoma") {echo " selected";}?> >36 : Primary cutaneous follicle enter lymphoma</option>
     <option value="37 : Primary DLBCL of the CNS" <?php if ($dbarr["who_sub"] == "37 : Primary DLBCL of the CNS") {echo " selected";}?> >37 : Primary DLBCL of the CNS</option>
     <option value="38 : Primry cutaneous DLBCL, leg type " <?php if ($dbarr["who_sub"] == "38 : Primry cutaneous DLBCL, leg type ") {echo " selected";}?> >38 : Primry cutaneous DLBCL, leg type </option>
     <option value="39 : EBV+DLBCL NOS " <?php if ($dbarr["who_sub"] == "39 : EBV+DLBCL NOS ") {echo " selected";}?> >39 : EBV+DLBCL NOS </option>
     <option value="40 : ALK positive large B-cell lymphoma" <?php if ($dbarr["who_sub"] == "40 : ALK positive large B-cell lymphoma") {echo " selected";}?> >40 : ALK positive large B-cell lymphoma</option>
     <option value="41 : Plasmablastic lymphoma" <?php if ($dbarr["who_sub"] == "41 : Plasmablastic lymphoma") {echo " selected";}?> >41 : Plasmablastic lymphoma</option>
     <option value="42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease(HHV8+ DLBCL, NOS)" <?php if ($dbarr["who_sub"] == "42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease(HHV8+ DLBCL, NOS)") {echo " selected";}?> >42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease(HHV8+ DLBCL, NOS)</option>
     <option value="43 : With features intermediate between DLBCL and Burkitt lymphoma" <?php if ($dbarr["who_sub"] == "43 : With features intermediate between DLBCL and Burkitt lymphoma") {echo " selected";}?> >43 : With features intermediate between DLBCL and Burkitt lymphoma</option>
     <option value="43A : High-grade B-call lymphoma, with feature intermediate between DLBCL and classical Hodgkin lymphoma" <?php if ($dbarr["who_sub"] == "43A : High-grade B-call lymphoma, with feature intermediate between DLBCL and classical Hodgkin lymphoma") {echo " selected";}?> >43A : High-grade B-call lymphoma, with feature intermediate between DLBCL and classical Hodgkin lymphoma</option>
     <option value="44 : B-cell lymphoma, unclassifiable, with features intermediate between DLBCL and classical Hodgkin lymphoma" <?php if ($dbarr["who_sub"] == "44 : B-cell lymphoma, unclassifiable, with features intermediate between DLBCL and classical Hodgkin lymphoma") {echo " selected";}?> >44 : B-cell lymphoma, unclassifiable, with features intermediate between DLBCL and classical Hodgkin lymphoma</option>
     <option value="45 : Chronic lymphoproliferative disorder of NK-cells" <?php if ($dbarr["who_sub"] == "45 : Chronic lymphoproliferative disorder of NK-cells") {echo " selected";}?> >45 : Chronic lymphoproliferative disorder of NK-cells</option>
     <option value="46 : Lymphomatoid papulosis" <?php if ($dbarr["who_sub"] == "46 : Lymphomatoid papulosis") {echo " selected";}?> >46 : Lymphomatoid papulosis</option>
     <option value="47 : Primary cutaneous gamma-delta T-cell lymphoma" <?php if ($dbarr["who_sub"] == "47 : Primary cutaneous gamma-delta T-cell lymphoma") {echo " selected";}?> >47 : Primary cutaneous gamma-delta T-cell lymphoma</option>
     <option value="48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma" <?php if ($dbarr["who_sub"] == "48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma") {echo " selected";}?> >48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma</option>
     <option value="49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma" <?php if ($dbarr["who_sub"] == "49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma") {echo " selected";}?> >49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma</option>
     <option value="50 : Anaplastic large cell lymphoma, ALK negative" <?php if ($dbarr["who_sub"] == "50 : Anaplastic large cell lymphoma, ALK negative") {echo " selected";}?> >50 : Anaplastic large cell lymphoma, ALK negative</option>
     <option value="51 : Breast implant-associated anaplastic large-cell lymphoma" <?php if ($dbarr["who_sub"] == "51 : Breast implant-associated anaplastic large-cell lymphoma") {echo " selected";}?> >51 : Breast implant-associated anaplastic large-cell lymphoma</option>
     <option value="52 : DLBCL associated with chronic inflammation" <?php if ($dbarr["who_sub"] == "52 : DLBCL associated with chronic inflammation") {echo " selected";}?> >52 : DLBCL associated with chronic inflammation</option>
   </select>
   <br />
   <input type="radio"  name="type_sub_non"  id="type_sub_non2" value="Working formulation"  <?php if ($dbarr['type_sub_non'] == "Working formulation") {
    echo "checked";
}
?> />  Working formulation  <br />
  <select name="work_sub" id="work_sub" style="width:400px;" >
    <option  value="<?php echo $dbarr['work_sub']; ?>"><?php echo $dbarr['work_sub']; ?></option>
    <option name="work_sub" value="<?php echo $dbarr['work_sub']; ?>"><?php echo $dbarr['work_sub']; ?></option>
    <option value="07 : NHL, small lymphocytic without plasmacytoid differentiation">07 : NHL, small lymphocytic without plasmacytoid differentiation</option>
    <option value="08 : NHL, small lymphocytic with plasmacytoid differentiation">08 : NHL, small lymphocytic with plasmacytoid differentiation</option>
    <option value="09 : NHL, follicular, small cleaved">09 : NHL, follicular, small cleaved</option>
    <option value="10 : NHL, follicular, mixed small cleaved and large cell">10 : NHL, follicular, mixed small cleaved and large cell</option>
    <option value="11 : NHL, follicular, large cell">11 : NHL, follicular, large cell</option>
    <option value="12 : NHL, diffuse, small cleaved">12 : NHL, diffuse, small cleaved</option>
    <option value="13 : NHL, diffuse, mixed small and large cell">13 : NHL, diffuse, mixed small and large cell</option>
    <option value="14 : NHL, diffuse, large cell">14 : NHL, diffuse, large cell</option>
    <option value="15 : NHL, large cell immunoblastic">15 : NHL, large cell immunoblastic</option>
    <option value="16 : NHL, lymphoblastic type">16 : NHL, lymphoblastic type</option>
    <option value="17 : NHL, small non-cleaved Burkitt type">17 : NHL, small non-cleaved Burkitt type</option>
    <option value="18 : NHL, small non-cleaved non-Burkitt type">18 : NHL, small non-cleaved non-Burkitt type</option>
    <option value="19 : Composite lymphoma">19 : Composite lymphoma</option>
    <option value="20 : Histiocytic lymphoma">20 : Histiocytic lymphoma</option>
    <option value="21 : Mycosis fungoides/Sezary syndrome">21 : Mycosis fungoides/Sezary syndrome</option>
    <option value="22 : NHL, unclassifiable">22 : NHL, unclassifiable</option>
  </select>
  <br />
  <input type="radio" name="type_sub_non"  id="type_sub_non3"  value="99 Other type" <?php if ($dbarr['type_sub_non'] == "99 Other type") {
    echo "checked";
}
?> />  99 Other type  <br />
  <textarea name="other_type" cols="50" rows="4" class="smallTextBlack" id="other_type" placeholder="Please specify..."><?php echo $dbarr['other_type']; ?></textarea>

</div>

<?php 
 $n11 = $dbarr['who_sub'];
 $n22 = $dbarr['work_sub'];
 $n33 = $dbarr['other_type'];



 if($dbarr['type'] == 'HL'){
      echo "<script>
  $(document).ready(function() {
   $('#detail_non_hodgkin').hide();
   $('#detail_hodgkin').show();
  
   $('#who_sub').hide();
   $('#work_sub').hide();
   $('#other_type').hide();
});

  $('#type1').click(function(){
   clear_data();
   $('#detail_non_hodgkin').hide();
   $('#detail_hodgkin').show();
   $('#who_sub').hide();
   $('#work_sub').hide();
   $('#other_type').hide();

 });

  $('#type2').click(function(){
   clear_data();
   $('#detail_hodgkin').hide();
   $('#detail_non_hodgkin').show();
   $('#type_sub_non1').show();
   $('#type_sub_non2').show();
   $('#type_sub_non3').show();

 });

  $('#type_sub_non1').click(function(){
   clear_sub_data();
   $('#who_sub').show();
   $('#work_sub').hide();
   $('#other_type').hide();
 });

  $('#type_sub_non2').click(function(){
   clear_sub_data();
   $('#who_sub').hide();
   $('#work_sub').show();
   $('#other_type').hide();
 });

  $('#type_sub_non3').click(function(){
   clear_sub_data();
   $('#who_sub').hide();
   $('#work_sub').hide();
   $('#other_type').show();
 });

  function clear_data(){
   $('#hodgkin_don1').val('');
   $('#type_sub_non1').prop('checked',false);
   $('#type_sub_non2').prop('checked',false);
   $('#type_sub_non3').prop('checked',false);
   $('#type_non1').val('');
   clear_sub_data();

 }
 function clear_sub_data(){
   $('#who_sub').val('');
   $('#work_sub').val('');
   $('#other_type').val('');
 }
 



	  </script>";
 }else{
 echo "<script>
  $(document).ready(function() {
   $('#detail_non_hodgkin').show();
   $('#detail_hodgkin').hide();
  ";
   if($n11!=""){ echo "$('#who_sub').show();";}else{ echo "$('#who_sub').hide();";}
   if($n22!=""){ echo "$('#work_sub').show();";}else{ echo "$('#work_sub').hide();";}
   if($n33!=""){ echo "$('#other_type').show();";}else{ echo "$('#other_type').hide();";}
   
  echo "
});

  $('#type1').click(function(){
   clear_data();
   $('#detail_non_hodgkin').hide();
   $('#detail_hodgkin').show();
   $('#who_sub').hide();
   $('#work_sub').hide();
   $('#other_type').hide();

 });

  $('#type2').click(function(){
   clear_data();
   $('#detail_hodgkin').hide();
   $('#detail_non_hodgkin').show();
   $('#type_sub_non1').show();
   $('#type_sub_non2').show();
   $('#type_sub_non3').show();

 });

  $('#type_sub_non1').click(function(){
   clear_sub_data();
   $('#who_sub').show();
   $('#work_sub').hide();
   $('#other_type').hide();
 });

  $('#type_sub_non2').click(function(){
   clear_sub_data();
   $('#who_sub').hide();
   $('#work_sub').show();
   $('#other_type').hide();
 });

  $('#type_sub_non3').click(function(){
   clear_sub_data();
   $('#who_sub').hide();
   $('#work_sub').hide();
   $('#other_type').show();
 });

  function clear_data(){


 }
 function clear_sub_data(){

 }
 



	  </script>";
 
 
 }



?>
</td>
</tr>
<tr>
  <th align="left">Ann Arbor stage :</th>
  <td colspan="3" > <br />

   <table width="100%" border="0" align="center">
    <tr>
      <td>   <input type="radio" name="ann_arbor" id="ann_arbor1"   value="I"  <?php if ($dbarr['ann_arbor'] == "I") {
    echo "checked";
}
?> onclick="onaction();checkage();" />   I           </td>
      <td>    <input type="radio" name="ann_arbor"  id="ann_arbor2"  value="II"  <?php if ($dbarr['ann_arbor'] == "II") {
    echo "checked";
}
?> onclick="onaction();checkage();" />   II   </td>
    </tr>
    <tr>
      <td><input type="radio" name="ann_arbor" id="ann_arbor3"   value="III" <?php if ($dbarr['ann_arbor'] == "III") {
    echo "checked";
}
?> onclick="onaction();checkage();" />   III </td>
      <td><input type="radio" name="ann_arbor" id="ann_arbor4"  value="IV" <?php if ($dbarr['ann_arbor'] == "IV") {
    echo "checked";
}
?> onclick="onaction();checkage();" />   IV</td>
    </tr>
    <tr>
      <th><b>Symptom</b></th>
      <td><br /><input type="radio" name="symptom_ann" id="symptom_ann1"  value="A"<?php if ($dbarr['symptom_ann'] == "A") {
    echo "checked";
}
?>   onclick="onaction();checkage();" />  A  <br /><br />
      <input type="radio" name="symptom_ann"  id="symptom_ann2"  value="B" <?php if ($dbarr['symptom_ann'] == "B") {
    echo "checked";
}
?> onclick="onaction();checkage();" /> B <br /><br />
    </td>
  </tr>

</table>
</td>
</tr>
<tr>
  <th align="left">Extranodal sites :  (mark all that apply):</th>
  <td colspan="3" > <br />
    <br />
    <input type="checkbox" name="ext_none"   value="ext_done"  id="ext_none" <?php if ($dbarr['ext_none'] == "ext_done") {
    echo "checked";
}
?>  />  none
    <div id="ext_none1"></div>
    <div id="extra_site">
      <br />
      <input type="checkbox" name="ext_wal"   value="Waldeyer" id="ext_wal" <?php if ($dbarr['ext_wal'] == 'Waldeyer') {
    echo "checked";
}
?> onclick="checkage();" />  Waldeyer's ring &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_sin"   value="Sinonasal"  id="ext_sin"<?php if ($dbarr['ext_sin'] == 'Sinonasal') {
    echo "checked";
}
?> onclick="checkage();"/>   Sinonasal  &nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_sal"   value="Salivary gland"  id="ext_sal"<?php if ($dbarr['ext_sal'] == 'Salivary gland') {
    echo "checked";
}
?> onclick="checkage();"/>  Salivary gland  &nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_thy"   value="Thyroid"   id="ext_thy" <?php if ($dbarr['ext_thy'] == 'Thyroid') {
    echo "checked";
}
?> onclick="checkage();" /> Thyroid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_eye"   value="Eye/Ocular adnexa"   id="ext_eye"<?php if ($dbarr['ext_eye'] == 'Eye/Ocular adnexa') {
    echo "checked";
}
?> onclick="checkage();"/> Eye/Ocular adnexa<br /><br />
      <br />
      <input type="checkbox" name="ext_lung"   value="Lung/Pleura"   id="ext_lung"<?php if ($dbarr['ext_lung'] == 'Lung/Pleura') {
    echo "checked";
}
?> onclick="checkage();"/>  Lung/Pleura &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php //******   ฟิลด์ที่เพิ่มขึ้นมาใหม่  ?>
      <input type="checkbox" name="ext_breast"   value="Breast" id="ext_breast" <?php if ($dbarr['ext_breast'] == 'Breast') {
    echo "checked";
}
?> onclick="checkage();"/>  Breast   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_stomach"   value="Stomach"  id="ext_stomach"<?php if ($dbarr['ext_stomach'] == 'Stomach') {
    echo "checked";
}
?> onclick="checkage();"/> Stomach  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_small"   value="Small intestine" id="ext_small" <?php if ($dbarr['ext_small'] == 'Small intestine') {
    echo "checked";
}
?> onclick="checkage();"/> Small intestine  &nbsp;
      <input type="checkbox" name="ext_testis"   value="Testis" id="ext_testis"  <?php if ($dbarr['ext_testis'] == 'Testis') {
    echo "checked";
}
?> onclick="checkage();"/> Testis<br /><br />
      <br />
      <input type="checkbox" name="ext_brain"   value="Brain/CNS"  id="ext_brain"<?php if ($dbarr['ext_brain'] == 'Brain/CNS') {
    echo "checked";
}
?> onclick="checkage();" /> Brain/CNS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_liver"   value="Liver"  id="ext_liver"<?php if ($dbarr['ext_liver'] == 'Liver') {
    echo "checked";
}
?> onclick="checkage();" /> Liver  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_large"   value="Large intestine"   id="ext_large"<?php if ($dbarr['ext_large'] == 'Large intestine') {
    echo "checked";
}
?> onclick="checkage();"/> Large intestine  &nbsp;&nbsp;
      <input type="checkbox" name="ext_bone"   value="Bone marrow" id="ext_bone"<?php if ($dbarr['ext_bone'] == 'Bone marrow') {
    echo "checked";
}
?> onclick="checkage();"  /> Bone marrow  &nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_spleen"   value="Spleen"   id="ext_spleen"<?php if ($dbarr['ext_spleen'] == 'Spleen') {
    echo "checked";
}
?> onclick="checkage();"/> Spleen  <br /><Br /><Br />
      <input type="checkbox" name="ext_skin"   value="Skin/Subcutaneous"  id="ext_skin"<?php if ($dbarr['ext_skin'] == 'Skin/Subcutaneous') {
    echo "checked";
}
?> onclick="checkage();" /> Skin/Subcutaneous<br /><br /><Br />
      <input type="checkbox" name="ext_other"   value="Others" id="ext_other" <?php if ($dbarr['ext_other'] == 'Others') {
    echo "checked";
}
?>  onclick="checkage();"/> Others
      <input type="text" name="ext_other_text"    size="50" id="ext_other_text"  value="<?php echo $dbarr['ext_other_text']; ?>" onclick="checkage();"/>  <br />
      *Enter each extranodal site on a new line. <br />
      ** Do not have ','(comma) in text.<br />
      *** Do not leave blank line in text. <br />

    </div>
    <br /><br />

  </td>
</tr>


<script type="text/javascript">
  $(document).ready(function() {
    if($('#ext_none').is(':checked')){
      change_attr(true);
      clear_data_site();
    }else{
      change_attr(false);
    }
  });
  $('#ext_none').click(function(){
    if($('#ext_none').is(':checked')){
      change_attr(true);
      clear_data_site();
    }else{
      change_attr(false);
    }
  });
  function change_attr(status){
    $('#ext_wal').attr("disabled", status);
    $('#ext_sin').attr("disabled", status);
    $('#ext_sal').attr("disabled", status);
    $('#ext_thy').attr("disabled", status);
    $('#ext_eye').attr("disabled", status);
    $('#ext_lung').attr("disabled", status);
    $('#ext_breast').attr("disabled", status);
    $('#ext_stomach').attr("disabled", status);
    $('#ext_small').attr("disabled", status);
    $('#ext_testis').attr("disabled", status);
    $('#ext_brain').attr("disabled", status);
    $('#ext_liver').attr("disabled", status);
    $('#ext_large').attr("disabled", status);
    $('#ext_bone').attr("disabled", status);
    $('#ext_spleen').attr("disabled", status);
    $('#ext_skin').attr("disabled", status);
    $('#ext_other').attr("disabled", status);
    $('#ext_other_text').attr("disabled", status);
  }

  function clear_data_site(){
    $('#ext_wal').prop('checked', false);
    $('#ext_sin').prop('checked', false);
    $('#ext_sal').prop('checked', false);
    $('#ext_thy').prop('checked', false);
    $('#ext_eye').prop('checked', false);
    $('#ext_lung').prop('checked', false);
    $('#ext_breast').prop('checked', false);
    $('#ext_stomach').prop('checked', false);
    $('#ext_small').prop('checked', false);
    $('#ext_testis').prop('checked', false);
    $('#ext_brain').prop('checked', false);
    $('#ext_liver').prop('checked', false);
    $('#ext_large').prop('checked', false);
    $('#ext_bone').prop('checked', false);
    $('#ext_spleen').prop('checked', false);
    $('#ext_skin').prop('checked', false);
    $('#ext_other').prop('checked', false);
    $('#ext_other_text').val('');
  }
</script>
</td>
</tr>




<tr>
  <th align="left">Performance status (ECOG):</th>
  <td colspan="3" > <br />
    <input type="radio"   name="per_ecog"  id="per_ecog0" value="0"  <?php if ($dbarr['per_ecog'] == "0") {
    echo "checked";
}
?> onclick="onaction();checkage();" /> 0 &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  id="per_ecog1" value="1"  <?php if ($dbarr['per_ecog'] == "1") {
    echo "checked";
}
?> onclick="onaction();checkage();" />  1 &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  id="per_ecog2"  value="2"  <?php if ($dbarr['per_ecog'] == "2") {
    echo "checked";
}
?> onclick="onaction();checkage();" /> 2 &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  id="per_ecog3" value="3"   <?php if ($dbarr['per_ecog'] == "3") {
    echo "checked";
}
?>onclick="onaction();checkage();"/> 3 &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  id="per_ecog4" value="4" <?php if ($dbarr['per_ecog'] == "4") {
    echo "checked";
}
?> onclick="onaction();checkage();" /> 4  &nbsp;&nbsp;&nbsp;&nbsp;
  </td>
</tr>


<tr>
  <th align="left">LDH :</th>
  <td colspan="3" > <br />
   <input type="radio"   name="ldh"  value="Normal"  id="ldh1"  <?php if ($dbarr['ldh'] == "Normal") {
    echo "checked";
}
?> onclick="onaction();checkage();"  />  Normal  &nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio"   name="ldh"  value="High"  id="ldh2" <?php if ($dbarr['ldh'] == "High") {
    echo "checked";
}
?> onclick="onaction();checkage();"  />  High
  <br /><br />
  <input type="text"   name="micro"   value="<?php echo $dbarr['micro']; ?>"   >  (&#956;/L) <br /><br />
  <input type="text"   name="upper"   value="<?php echo $dbarr['upper']; ?>"   >   upper limit of normal(ULN)   <br /><br />
</tr>
<tr>
 <th align="left">CBC :</th>
 <td><br /><input type="text"   name="hemoglobin" id="hemoglobin"   value="<?php echo $dbarr['hemoglobin']; ?>"   >  Hemoglobin(g/dl) <br /><br />
  <input type="text"   name="mcv" id="mcv"   value="<?php echo $dbarr['mcv']; ?>"   >   MCV(fL)  <br /><br />
  <input type="text"   name="wbc"  id="wbc"  value="<?php echo $dbarr['wbc']; ?>"   >   WBC(10<sup>3</sup>/&#956;L)  <br /><br />
  <input type="text"   name="platelet" id="platelet"   value="<?php echo $dbarr['platelet']; ?>"   >  Platelet(10<sup>3</sup>/&#956;L)  <br /><br />
  <input type="text"   name="neutrophil"  id="neutrophil"  value="<?php echo $dbarr['neutrophil']; ?>"   >  Neutrophil(%)  <br /><br />
  <input type="text"   name="lymphocyte" id="lymphocyte"   value="<?php echo $dbarr['lymphocyte']; ?>"   >  Lymphocyte(%)  <br /><br />
  <input type="text"   name="monocyte"  id="monocyte"  value="<?php echo $dbarr['monocyte']; ?>"   >  Monocyte(%)  <br /><br />
  <input type="text"   name="eosinophil"  id="eosinophil"  value="<?php echo $dbarr['eosinophil']; ?>"   >  Eosinophil(%)  <br /><br />
  <input type="text"   name="basophil"  id="basophil"  value="<?php echo $dbarr['basophil']; ?>"   >  Basophil(%)  <br /><br />
  <input type="text"   name="luc" id="luc"   value="<?php echo $dbarr['luc']; ?>"   >  LUC  <br /><br />
  Blast/Lymphoma cell(yes/no) <input type="radio"   name="blast_lymphoma"  id="blast_lymphoma1"  value="Yes"  <?php if ($dbarr['blast_lymphoma'] == "Yes") {
    echo "checked";
}
?> > Yes  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio"   name="blast_lymphoma"  id="blast_lymphoma2"  value="No"  <?php if ($dbarr['blast_lymphoma'] == "No") {
    echo "checked";
}
?> > No
  <br /><br />
</td>
</tr>
<tr>
  <th   align="center" colspan="2">
    <b>Hepatitis test</b>
  </th>

</tr>
<tr>
  <th align="left">
    <b>Hepatitis B :</b>
  </th>
  <td><br /><b>HBsAg</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_hbsag"   value="posiive" <?php if ($dbarr['hep_b_hbsag'] == "posiive") {
    echo "checked";
}
?> >  posiive  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_hbsag"   value="negative" <?php if ($dbarr['hep_b_hbsag'] == "negative") {
    echo "checked";
}
?>  >  negative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_hbsag"   value="not done"  <?php if ($dbarr['hep_b_hbsag'] == "not done") {
    echo "checked";
}
?> >  not done  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
    <b>Anti-HBcAb </b>
    <input type="radio"   name="hep_b_anti_hbcab"   value="posiive"  <?php if ($dbarr['hep_b_anti_hbcab'] == "posiive") {
    echo "checked";
}
?> >  posiive  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_anti_hbcab"   value="negative"  <?php if ($dbarr['hep_b_anti_hbcab'] == "negative") {
    echo "checked";
}
?> >  negative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_anti_hbcab"   value="not done"  <?php if ($dbarr['hep_b_anti_hbcab'] == "not done") {
    echo "checked";
}
?> >  not done  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
    <b>Anti-HBsAb </b>
    <input type="radio"   name="hep_b_anti_hbsab"   value="posiive"  <?php if ($dbarr['hep_b_anti_hbsab'] == "posiive") {
    echo "checked";
}
?> >  posiive  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_anti_hbsab"   value="negative" <?php if ($dbarr['hep_b_anti_hbsab'] == "negative") {
    echo "checked";
}
?>  >  negative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_anti_hbsab"   value="not done"  <?php if ($dbarr['hep_b_anti_hbsab'] == "not done") {
    echo "checked";
}
?> >  not done  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />

  </td>
</tr>
<tr>
  <th align="left">
    <b>Hepatitis C :</b>
  </th>
  <td><br /><b> Anti-HCV</b>  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_c_anti_hcv"   value="posiive" <?php if ($dbarr['hep_c_anti_hcv'] == "posiive") {
    echo "checked";
}
?>  >  posiive  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_c_anti_hcv"   value="negative"   <?php if ($dbarr['hep_c_anti_hcv'] == "negative") {
    echo "checked";
}
?>>  negative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_c_anti_hcv"   value="not done" <?php if ($dbarr['hep_c_anti_hcv'] == "not done") {
    echo "checked";
}
?>  >  not done  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
  </td>
</tr>
<tr>
  <th align="left">
    <b>Bulky :</b>
  </th>
  <td><br />
    <input type="text"   name="bulky"   value="<?php echo $dbarr['bulky']; ?>"   >    (cm)
    <br /><br />
  </td>
</tr>

<tr>
  <th align="left">HIV positive :</th>
  <td colspan="3"><br />
   <input type="radio"   name="hiv_positive" id="hiv_positive1" value="Yes"  <?php if ($dbarr['hiv_positive'] == "Yes") {
    echo "checked";
}
?>  onclick="onaction();" />  Yes &nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio"   name="hiv_positive" id="hiv_positive2" value="No" <?php if ($dbarr['hiv_positive'] == 'No') {
    echo "checked";
}
?> onclick="onaction();" />  No &nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio"   name="hiv_positive" id="hiv_positive3"  value="Not done" <?php if ($dbarr['hiv_positive'] == 'Not done') {
    echo "checked";
}
?>onclick="onaction();"  />  Not done &nbsp;&nbsp;&nbsp;&nbsp;
  <br /><br />
</td>
</tr>
<tr>
  <th align="left" width="33%">IPI :</th>
  <td colspan="3"><br />

    <div>
      <span>
        Age:
      </span>
      <span id="age_point">
       -
      </span>
      <span id="age_ipi">
      (กรุณากรอกข้อมูลวันเกิด และ กดปุ่มคำนวณ)
      </span>
    </div><br>
    <div>
      <span>
        Serum LDH :
      </span>
      <span id="serum_point">
       -
      </span>
      <span id="serum_ipi">
      (กรุณากรอกข้อมูล LDH)
      </span>
    </div><br>
    <div>
      <span>
        Performance status :
      </span>
      <span id="performance_point">
       -
      </span>
      <span id="performance_ipi">
      (กรุณากรอกข้อมูลECOG)
      </span>
    </div><br>
    <div>
      <span>
        Stage :
      </span>
      <span id="stage_point">
       -
      </span>
      <span id="stage_ipi">
      (กรุณากรอกข้อมูล Ann Arbor stage)
      </span>
    </div><br>
    <div id='ext_div'>
      <span>
        Extranodal involvement :
      </span>
      <span id="ext_point">
       -
      </span>
      <span id="ext_ipi">
      (กรุณากรอกข้อมูล Extranodal sites)
      </span>
    </div><br>
    <div>
      <span>
        Result :
      </span>
      <span id="detail_point">
       -
      </span>
      <span id="detail_ipi">
      Low
      </span>
    </div><br>
  <input type="hidden" name="ipi" id="ipi" value="Low"></br>
</td>
</tr>

<tr>
 <td colspan="4" align="center">
   <br /><Br />
   <button  type="submit" id="save"  value="save" disabled>Save</button>   &nbsp;&nbsp;&nbsp;&nbsp;
   <button  type="submit" id="drafts" name="drafts" value="Save drafts"  />Save drafts</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input name="Submit2" type="button" class="button" value="Cancel" onClick="window.history.back();">&nbsp;&nbsp;&nbsp;&nbsp;
   <br /><br />
   <script type="text/javascript">
     <!--
     $(document).ready(function() {
      document.getElementById('save').disabled = verify_input();
      calyear();
    });

     function onaction(){
      document.getElementById('save').disabled = verify_input();
    }
    function verify_input(){
     return  check_input_text()||
     ! check_radio()||
     ! check_selected();
   }
   function check_input_text(){
    return document.getElementById('patient_initials').value=="" ||
    document.getElementById('id_card1').value==""||
    document.getElementById('id_card_confirm1').value==""||
    document.getElementById('hn1').value=="" ||
    document.getElementById('hn2').value=="" ||
    document.getElementById('mybirth').value==""||
    document.getElementById('date_bio_report').value==""||
    document.getElementById('pathology').value==""||
    document.getElementById('pathology_confirm').value==""||
    document.getElementById('hemoglobin').value==""||
    document.getElementById('mcv').value==""||
    document.getElementById('wbc').value==""||
    document.getElementById('platelet').value==""||
    document.getElementById('neutrophil').value==""||
    document.getElementById('lymphocyte').value==""||
    document.getElementById('monocyte').value==""||
    document.getElementById('eosinophil').value==""||
    document.getElementById('basophil').value==""||
    document.getElementById('luc').value=="";
  }

  function check_radio(){
    return $('#sex1:checked').val() || $('#sex2:checked').val()||
    $('#payment1:checked').val()|| $('#payment2:checked').val()|| $('#payment3:checked').val()|| $('#payment4:checked').val()|| $('#payment5:checked').val()|| $('#payment6:checked').val() ||
    $('#type1:checked').val() || $('#type2:checked').val() ||
    $('#ann_arbor1:checked').val() || $('#ann_arbor2:checked').val() ||$('#ann_arbor3:checked').val() ||$('#ann_arbor4:checked').val() ||
    $('#symptom_ann1:checked').val() || $('#symptom_ann2:checked').val() ||
    $('#per_ecog0:checked').val() || $('#per_ecog1:checked').val() || $('#per_ecog2:checked').val() || $('#per_ecog3:checked').val() || $('#per_ecog4:checked').val() ||
    $('#ldh1:checked').val() || $('#ldh2:checked').val() ||
    $('#hiv_positive1:checked').val() || $('#hiv_positive2:checked').val() ||$('#hiv_positive3:checked').val()||$('#blast_lymphoma1:checked').val()||$('#blast_lymphoma2:checked').val();
  }

  function check_selected(){
    return $('#province').val() ||
    $('#biopsy_site').val() ;
  }
  function checkid(){
    var status = document.getElementById('id_card1').value!=document.getElementById('id_card_confirm1').value;

    document.getElementById('save').disabled = status;
    document.getElementById('drafts').disabled = status;
    if(status){
      $('#alertid').show();
    }else{
      $('#alertid').hide();
    }
  }

  function checkhn(){

    var status = document.getElementById('hn1').value!=document.getElementById('hn2').value;
    document.getElementById('save').disabled = status;
    document.getElementById('drafts').disabled = status;
    if(status){
      $('#alerthn').show();
    }else{
      $('#alerthn').hide();
    }
  }

  function checkpathology(){
    var status = document.getElementById('pathology').value!=document.getElementById('pathology_confirm').value;
    document.getElementById('save').disabled = status;
    document.getElementById('drafts').disabled = status;
    if(status){
      $('#alertpat').show();
    }else{
      $('#alertpat').hide();
    }
  }

  function calyear(){
    var birth = document.getElementById('mybirth').value;
    var date_bio_report = document.getElementById('date_bio_report').value;
    if(birth != "" && date_bio_report != ""){
      var res = birth.split("-");
      var date_bio = date_bio_report.split("-");
      var year = (date_bio[2]*365) + (date_bio[1]*30) + (date_bio[0]*1);
      var yearold= (year - (res[2]*365)-(res[1]*30)-res[0]);
      var old = yearold/365;
      var resultyearold ='';
      if(yearold>365){
        resultyearold = parseInt(yearold/365) + " years ";
        yearold = yearold%365;
      }
      if(yearold>30){
        //resultyearold += parseInt(yearold/30) + " months ";
        yearold = yearold%30;
      }
     // resultyearold += yearold%30 + " days ";
      document.getElementById('yearold').innerHTML = resultyearold;
      $('#input_yearold').val(old);
      checkage();
    }else{
      document.getElementById('yearold').innerHTML = "กรุณาใส่วันเดือนปีเกิดก่อนคำนวณ";
    }
  }
  
  
  

  function checkage(){
    var yearold = document.getElementById('input_yearold').value;
    if(yearold){
      var score = 0;
      if(yearold>60){
        document.getElementById('age_point').innerHTML = 1;
        document.getElementById('age_ipi').innerHTML = "("+ document.getElementById('yearold').innerHTML +")";
        $('#ext_div').show();
        score = calipi();
        levelriskipi(score);
      }else{
        document.getElementById('age_point').innerHTML = 0;
        document.getElementById('age_ipi').innerHTML = "("+ document.getElementById('yearold').innerHTML +")";
        $('#ext_div').hide();
        score = calaaipi();
        levelriskaaipi(score);
      }
      document.getElementById('detail_point').innerHTML = score+" Point ";
    }
  }

  function calipi(){
    var result = 1;
    result += calaaipi();
    result += stageES();
    return result;
  }

  function calaaipi(){
    var result = 0;
    result += stageAAS();
    result += stageECOG();
    result += stageLDH();
    return result;
  }

  function stageES(){
    var count = 0;
    var result = 0;
    if($('#ext_wal:checked').val()){
      count+=1;
    }
    if($('#ext_sin:checked').val()){
      count+=1;
    }
    if($('#ext_sal:checked').val()){
      count+=1;
    }
    if($('#ext_thy:checked').val()){
      count+=1;
    }
    if($('#ext_eye:checked').val()){
      count+=1;
    }
    if($('#ext_lung:checked').val()){
      count+=1;
    }
    if($('#ext_breast:checked').val()){
      count+=1;
    }
    if($('#ext_stomach:checked').val()){
      count+=1;
    }
    if($('#ext_small:checked').val()){
      count+=1;
    }
    if($('#ext_testis:checked').val()){
      count+=1;
    }
    if($('#ext_brain:checked').val()){
      count+=1;
    }
    if($('#ext_liver:checked').val()){
      count+=1;
    }
    if($('#ext_large:checked').val()){
      count+=1;
    }
    if($('#ext_bone:checked').val()){
      count+=1;
    }
    if($('#ext_spleen:checked').val()){
      count+=1;
    }
    if($('#ext_skin:checked').val()){
      count+=1;
    }
    if($('#ext_other:checked').val()){
      count+=1;
    }
    if(count > 1){
      result = 1;
    }
    document.getElementById('ext_point').innerHTML = result;
    document.getElementById('ext_ipi').innerHTML = "(Selected "+ count +"items )";
    return result;
  }

  function stageAAS(){
    var result = 0;
	var type='';
	if($('#symptom_ann1:checked').val()){
		type = $('#symptom_ann1:checked').val();
	}
	if($('#symptom_ann2:checked').val()){
		type = $('#symptom_ann2:checked').val();
	}
    if($('#ann_arbor3:checked').val() || $('#ann_arbor4:checked').val() ){
      result = 1;
      document.getElementById('stage_point').innerHTML = result;
    }
    if($('#ann_arbor1:checked').val() || $('#ann_arbor2:checked').val() ){
      document.getElementById('stage_point').innerHTML = result;
    }
    if($('#ann_arbor1:checked').val()){
      document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor1:checked').val() +type+")";
    }

    if($('#ann_arbor2:checked').val()){
      document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor2:checked').val() +type+")";
    }
    if($('#ann_arbor3:checked').val()){
      document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor3:checked').val() +type+")";
    }
    if($('#ann_arbor4:checked').val()){
      document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor4:checked').val() +type+")";
    }
    return result;
  }

  function stageECOG(){
    var result = 0;
    if($('#per_ecog2:checked').val() || $('#per_ecog3:checked').val()|| $('#per_ecog4:checked').val() ){
      result = 1;
      document.getElementById('performance_point').innerHTML = result;
    }
    if($('#per_ecog0:checked').val() || $('#per_ecog1:checked').val()){
      document.getElementById('performance_point').innerHTML = result;
    }
    if($('#per_ecog0:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog0:checked').val() +")";
    }
    if($('#per_ecog1:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog1:checked').val() +")";
    }
    if($('#per_ecog2:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog2:checked').val() +")";
    }
    if($('#per_ecog3:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog3:checked').val() +")";
    }
    if($('#per_ecog4:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog4:checked').val() +")";
    }
    return result;
  }

  function stageLDH(){
    var result = 0;
    if($('#ldh2:checked').val()){
      result = 1;
      document.getElementById('serum_point').innerHTML = result;
      document.getElementById('serum_ipi').innerHTML = "(Selected "+ $('#ldh2:checked').val() +")";
    }
    if($('#ldh1:checked').val()){
      result = 0;
      document.getElementById('serum_point').innerHTML = result;
      document.getElementById('serum_ipi').innerHTML = "(Selected "+ $('#ldh1:checked').val()+")";
    }
    return result;
  }

  function levelriskipi(score){
    var text_ipi = "Low";
    if(score == 2){
      text_ipi = 'Low Intermediate';
    }
    if(score == 3){
      text_ipi = 'High Intermediate';
    }
    if(score > 3){
      text_ipi = 'High';
    }
    document.getElementById('detail_ipi').innerHTML =  "(" + text_ipi + " Risk) ";
    $('#ipi').val(text_ipi);
  }

  function levelriskaaipi(score){
    var text_ipi = "Low";
    if(score == 1){
      text_ipi = 'Low Intermediate';
    }
    if(score == 2){
      text_ipi = 'High Intermediate';
    }
    if(score == 3){
      text_ipi = 'High';
    }
    document.getElementById('detail_ipi').innerHTML =  "(" + text_ipi + " Risk) ";
    $('#ipi').val(text_ipi);
  }

</script>
</td>
</tr>
</table>

</center>

</p>
</div>
</FORM>
<!-- sidebar -->
<div class="x"></div>
<div class="break"></div>

</div>
<?php include "modules/index/footer.php";?>

<?php

//จบการแสดงผลฟอร์ม Post
?>





