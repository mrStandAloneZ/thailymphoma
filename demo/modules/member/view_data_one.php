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
  <h1>View  Lymphoma Registry </h1>
  <p>
    <center>
     <?php
$dmy = "$date_of_birth"; //dmy-ymd    �ŧ���ѹ�Դ
list($day, $month, $year) = explode("-", $dmy);

$dro = "$dateofrecord"; //dmy-ymd    �ŧ�ѹ record
list($cday, $cmonth, $cyear) = explode("-", $dro);
$dro_date = "$cyear-$cmonth-$cday";
list($cyear, $cmonth, $cday) = explode("-", $dro_date); //�ش��ͧ����¹
//    $year = $year-543;
$ymd_birth = "$year-$month-$day";

//echo $ymd_birth;
//      $birthday = "1982-06-10";      //�ٻẺ����纤�Ң������ѹ�Դ
//        $today = date("Y-m-d");   //�ش��ͧ����¹
list($byear, $bmonth, $bday) = explode("-", $ymd_birth); //�ش��ͧ����¹
list($tyear, $tmonth, $tday) = explode("-", $date_today_now); //�ش��ͧ����¹

$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear);
$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear);

 $mage = ($dateofrecord - $date_of_birth);
?>
<form name ="checkForm"  action="?name=member&file=edit_data_add_one" method="post" onSubmit="return check();"  enctype="multipart/form-data">
  <center>

    <table width="100%" border="0" align="center">
      <tr>
        <th align="left" width="32%">Date of record: </th>
        <td colspan="3"> <br />
          �ѹ��� <b><?php echo $dro_date; ?>(�.�.)</b>
          <br /><br />    </td>
        </tr>
        <tr>
          <th colspan="4">Identification and Baseline data:</th>
        </tr>
        <tr>
          <th align="left" width="32%"><strong>Patient Code : </strong></th>
          <td align="left" width="68%"><br /><strong> *<?php echo $dbarr['centre']; ?></strong></br></br></td>

        </tr>
        <tr>
          <th align="left" width="32%">Patient Initials :</th>
          <td align="left" colspan="3"> <br /> <?php echo strtoupper($dbarr['patient_initials']); ?> </br></br>   </td>
        </tr>
        <tr>
          <th align="left" width="32%">Gender : </th>
          <td align="left" colspan="3"> <br />
            <?php echo $dbarr['sex']; ?> <br /><br />
          </td>
        </tr>

        <tr>
          <th align="left">ID :</th>
          <td colspan="3" > <br />
          <?php echo str_repeat('*', strlen($dbarr['id_card'])); ?>
           <br /><br />
         </td>
       </tr>
       <tr>
        <th align="left">HN :</th>
        <td colspan="3" > <br />
          <?php echo str_repeat('*', strlen($dbarr['hn'])); ?> <br /><br /></td>
        </tr>


        <?php
$dmy = $dbarr['date_of_birth']; //dmy-ymd    �ŧ���ѹ�Դ
list($day, $month, $year) = explode("-", $dmy);
$ymd_birth = "$year-$month-$day";

//echo $ymd_birth;
//      $birthday = "1982-06-10";      //�ٻẺ����纤�Ң������ѹ�Դ
//        $today = date("Y-m-d");   //�ش��ͧ����¹
list($byear, $bmonth, $bday) = explode("-", $ymd_birth); //�ش��ͧ����¹
list($tyear, $tmonth, $tday) = explode("-", $date_today_now); //�ش��ͧ����¹
$mage = ($dateofrecord - $date_of_birth);
?>
<tr>
  <th align="left" width="32%">Date of birth : </th>
  <td align="left" colspan="3"> <br />
    <?php echo "$ymd_birth"; ?>      (�.�.)       <br /><br />
  </td>
</tr>

<tr>
  <th align="left">Current address  :(in the last 6 months)</th>
  <td colspan="3" > <br />
   <?php echo $dbarr['province']; ?>
   <br /><br /></td>
 </tr>

<tr>
  <th align="left">Mode of payment:</th>
  <td colspan="3" ><br />
   <?php if ($dbarr['payment'] != "Other: specify") {echo $dbarr['payment'];} else {echo "";}?>
   <?php if ($dbarr['payment'] == "Other: specify") {
    echo $dbarr['payment_other'];
}?>
  <br /><br />

</td>
</tr>


<tr>
  <th align="center" colspan="4">Lymphoma Database</th>
</tr>
<tr>
  <th align="left">Date of biopsy report :</th>
  <td colspan="3" > <br />
   <?php echo $dbarr['date_bio_report']; ?><br /><br /></td>
 </tr>
 <tr>
  <th align="left">Pathology No.:</th>
  <td colspan="3" > <br />
    <?php echo str_repeat('*', strlen($dbarr['pathology'])); ?><br /><br /></td>
  </tr>
  <tr>
    <th align="left">Biopsy site  :</th>
    <td colspan="3" > <br />
      <?php echo $dbarr['biopsy_site']; ?> <br /><br /></td>
    </tr>
    <tr>
      <th align="left">Type:</th>
      <td colspan="3" > <br />
        <?php if ($dbarr['type'] == 'HL') {
    echo "Hodgkin lymphoma (HL)";
    echo $dbarr['hodgkin_don'];
}
?>

        <?php if ($dbarr['type'] == "NHL") {
    echo "Non-Hodgkin lymphoma (NHL)<br>";
    echo "<strong>Immunophenotype: </strong>";
    echo $dbarr['type_non'] . "<br>";
    if (trim($dbarr['type_sub_non']) == "WHO classification") {
        echo "WHO classification: " . $dbarr["who_sub"];
    }
    if (trim($dbarr['type_sub_non']) == "Working formulation") {
        echo "Working formulation: " . $dbarr['work_sub'];
    }
    if (trim($dbarr['type_sub_non']) == "99 Other type") {
        echo "99 Other type: " . $dbarr['other_type'];
    }
}
?>
        <br />
        <br />

      </div>

<?php 


?>


      <script type="text/javascript">
	  
	  
        $(document).ready(function() {
         $('#detail_non_hodgkin').hide();
         $('#detail_hodgkin').hide();
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
	   
	   
	   
     </script>
   </td>
 </tr>
 <tr>
  <th align="left">Ann Arbor stage :</th>
  <td colspan="3" > <br />
    <?php echo $dbarr['ann_arbor']; ?><?php echo $dbarr['symptom_ann']; ?><br /><br />
  </td>
</tr>
<tr>
  <th align="left">Extranodal sites :</th>
  <td colspan="3" > <br />

	  

      <br />
      <input type="checkbox" name="ext_wal"   value="Waldeyer" id="ext_wal" <?php if ($dbarr['ext_wal'] == 'Waldeyer\'s ring') {
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
?> onclick="checkage();"/>  Lung/Pleura &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php //******   ��Ŵ����������������  ?>
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
?>  onclick="checkage();"/> Others : &nbsp;<?php echo $dbarr['ext_other_text']; ?> <br />


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
    <?php echo $dbarr['per_ecog']; ?><br><br>
  </td>
</tr>


<tr>
  <th align="left">LDH :</th>
  <td colspan="3" > <br />
   <?php echo $dbarr['ldh']; ?><br /><br />
   <?php echo $dbarr['micro']; ?> (&#956;/L) <br /><br />
   <?php echo $dbarr['upper']; ?> upper limit of normal(ULN)   <br /><br />
 </tr>
 <tr>
  <th align="left">HIV positive :</th>
  <td colspan="3"><br />
   <?php echo $dbarr['hiv_positive']; ?>
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
      (��سҡ�͡�������ѹ�Դ ��� �������ӹǳ)
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
    (��سҡ�͡������ LDH)
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
  (��سҡ�͡������ECOG)
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
  (��سҡ�͡������ Ann Arbor stage)
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
  (��سҡ�͡������ Extranodal sites)
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
  <th   align="center" colspan="2">
    <b>Follow Up Database</b>
  </th>
</tr>
<tr>
  <th align="left">Date of record:</th>
  <td colspan="3" > <br />
    <?php  
	
	  $df = strtotime($dbarr['date_record_follow']);
	   $df = date("d-m-Y",$df);
	echo $df;
	 ?><br /><br /></td>
</tr>
<tr>
  <th align="center" colspan="4">Initial Treatment</th>
</tr>
<tr>
  <th align="left">Chemotherapy:</th>
  <td colspan="3" > <br />
	Date: <?php echo $dbarr['date_chemo_follow']; ?><br />
	Type: <?php echo $dbarr['chemo_select_follow']; ?><br />
	Received Intrathecalchemotherapy: <?php echo $dbarr['received_follow']; ?>
	<br /><br /></td>
</tr>
<tr>
  <th align="center" colspan="4">Clinical Outcome <br/>Result of Initial Treatment</th>
</tr>
<tr>
  <th align="left">Result:</th>
  <td colspan="3" > <br />
	<?php echo $dbarr['result_follow']; ?><br />
	Date of Document CR/CRu: <?php echo $dbarr['date_complete_follow']; ?>
	<br /><br /></td>
</tr>
<tr>
  <th align="center" colspan="4">Follow Up</th>
</tr>
<tr>
  <th align="left">Progression/relapse:</th>
  <td colspan="3" > <br />
	<?php echo $dbarr['progression_follow']; ?>
	<br /><br /></td>
</tr>
<tr>
  <th align="left">Salvage treatment:</th>
  <td colspan="3" > <br />
	<?php echo $dbarr['salvage_follow']; ?>
	<br /><br /></td>
</tr>
<tr>
  <th align="left">Stem cell transplant:</th>
  <td colspan="3" > <br />
	<?php echo $dbarr['stem_cell_follow']; ?>
	<br /><br /></td>
</tr>
<tr>
  <th align="left">Date of last Contact:</th>
  <td colspan="3" > <br />
     <input type="hidden" name="date_bio_report" id="date_bio_report"  value="<?php echo $dbarr['date_bio_report']; ?>"  size="10"  onkeyup="onaction();" /> 
	last update: <?php echo $dbarr['date_last_contact_follow']; ?><br />
	Status : <?php echo $dbarr['status_follow']; ?> <?php echo $dbarr['alive_status']; ?>
	<br /><br /></td>
</tr>
<div>
  <div style="display:none">
    <input type="text" id='input_yearold' value="">
    <input type="hidden" id="mybirth" size="8"  name="date_of_birth" value="<?php echo "$ymd_birth"; ?>" maxlength="10" >
    <span id="yearold"></span>
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
?> onclick="checkage();"/>  Lung/Pleura &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

    <input type="radio" name="ann_arbor" id="ann_arbor1"   value="I"  <?php if ($dbarr['ann_arbor'] == "I") {
    echo "checked";
}
?> onclick="onaction();checkage();" />   I
    <input type="radio" name="ann_arbor"  id="ann_arbor2"  value="II"  <?php if ($dbarr['ann_arbor'] == "II") {
    echo "checked";
}
?> onclick="onaction();checkage();" />   II
    <input type="radio" name="ann_arbor" id="ann_arbor3"   value="III" <?php if ($dbarr['ann_arbor'] == "III") {
    echo "checked";
}
?> onclick="onaction();checkage();" />   III
    <input type="radio" name="ann_arbor" id="ann_arbor4"  value="IV" <?php if ($dbarr['ann_arbor'] == "IV") {
    echo "checked";
}
?> onclick="onaction();checkage();" />   IV
    <input type="radio" name="symptom_ann" id="symptom_ann1"  value="A"<?php if ($dbarr['symptom_ann'] == "A") {
    echo "checked";
}
?>   onclick="onaction();checkage();" />  A
    <input type="radio" name="symptom_ann"  id="symptom_ann2"  value="B" <?php if ($dbarr['symptom_ann'] == "B") {
    echo "checked";
}
?> onclick="onaction();checkage();" /> B


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
?> onclick="onaction();checkage();"/> 3 &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  id="per_ecog4" value="4" <?php if ($dbarr['per_ecog'] == "4") {
    echo "checked";
}
?> onclick="onaction();checkage();" /> 4  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="ldh"  value="Normal"  id="ldh1"  <?php if ($dbarr['ldh'] == "Normal") {
    echo "checked";
}
?> onclick="onaction();checkage();"  />  Normal  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="ldh"  value="High"  id="ldh2" <?php if ($dbarr['ldh'] == "High") {
    echo "checked";
}
?> onclick="onaction();checkage();"  />  High

  </div>


</div>
<tr>
 <td colspan="4" align="center">
   <br /><Br />
   <button  type="button" id="ELR" onclick="gotoELR('<?php echo $_GET['id'] ?>')">Edit Lymphoma Registry</button>   &nbsp;&nbsp;&nbsp;&nbsp;
   <button  type="button" id="EFR" onclick="gotoEFR('<?php echo $_GET['id'] ?>')">Edit Follow Up Registry</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <button type="button" class="button"  onClick="window.history.back();">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;
   <br /><br />
   <script type="text/javascript">
	   calyear();

     <!--
     $(document).ready(function() {

      calyear();
    });
     function gotoELR(id){
        window.location.replace(window.location.pathname+"?name=member&file=edit_data_one&id="+id);
     }
     function gotoEFR(id){
        window.location.replace(window.location.pathname+"?name=member&file=follow_up&id="+id);
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
      document.getElementById('yearold').innerHTML = "��س�����ѹ��͹���Դ��͹�ӹǳ";
    }
  }
  
	
	
	
	

    function checkage(){
	
      var yearold = document.getElementById('input_yearold').value;
	  
    //alert(yearold);
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
      if($('#ann_arbor3:checked').val() || $('#ann_arbor4:checked').val() ){
        result = 1;
        document.getElementById('stage_point').innerHTML = result;
      }
      if($('#ann_arbor1:checked').val() || $('#ann_arbor2:checked').val() ){
        document.getElementById('stage_point').innerHTML = result;
      }
      if($('#ann_arbor1:checked').val()){
        document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor1:checked').val() +"B)";
      }

      if($('#ann_arbor2:checked').val()){
        document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor2:checked').val() +"B)";
      }
      if($('#ann_arbor3:checked').val()){
        document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor3:checked').val() +"B)";
      }
      if($('#ann_arbor4:checked').val()){
        document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor4:checked').val() +"B)";
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
	//alert(score);
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
      document.getElementById('detail_ipi').innerHTML = "(" + text_ipi + " Risk) ";
      $('#ipi').val(text_ipi);
    }

    function levelriskaaipi(score){
	//alert(score);
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
      document.getElementById('detail_ipi').innerHTML = "(" + text_ipi+ " Risk)";
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