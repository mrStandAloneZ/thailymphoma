<?php
$db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
$result = mysql_query("select * from " . TB_MEMBER . " where user='" . $_SESSION['login_true'] . "'") or die("Err Can not to result");
$dbarr = mysql_fetch_array($result);
$centre = $dbarr['codehos'];
include "modules/index/header.php";
$db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
//$login_true=$_SESSION['login_true'];
$result = mysql_query("select * from " . TB_ADD_DATA . " where id='" . $_GET['id'] . "' order by id DESC") or die("Err Can not to result");
$dbarr = mysql_fetch_array($result);
?>
<?php date_default_timezone_set("Asia/Bangkok");?>
<?php
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
$date_today11 = date("d");
$m_today12 = date("m");
/////////////
?>
<?php //   code ปฏิทินภาษาไทย  แปลง คศ เป็น พศ เป็นการเรียกไฟล์มาใช้งาน                        ?>
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
   $('#date_of_record').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#mybirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_transplantation').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_bio_report').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_follow_up').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_chemo').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_immun_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_rad_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_surgery_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_complete_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_progression_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_stem_cell_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_last_contact_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_date_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});

 });
</script>

	<style type="text/css">





	select {
    width: 90%;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
        background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; 
}
input[type=text]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=password]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
button  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=button]  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}

textarea{
      width: 80%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
}
</style>
<!-- main content -->
<div id="center">
   <table  style="width:100%;background-color:#e8e8e8;">
		 <tr bgcolor="#e8e8e8" ><td style="padding-left:35px;padding-top:15px">
          <h1>Edit Pathology Consensus</h1>
		  </td></tr></table>
  <p>
    <center>
     <form name ="checkForm" action="?name=member&file=pathology_update" method="post" onSubmit="return check();"  enctype="multipart/form-data">
       <table width="100%" border="0" align="center">
        <tr bgcolor="#F4F4F4" >
          <th colspan="2"><br /><h1>Identification and Baseline Data</h1></th>
        </tr>
        <tr bgcolor="#F4F4F4" >
          <th align="left" width="44%"><strong>Patient Code : </strong></th>
          <td align="left" width="56%"><br /><strong><input type="hidden"  name="centre"  value="<?php echo $dbarr['centre']; ?>"  size="10"  readonly="readonly"/> *<?php echo $dbarr['centre']; ?></strong></br></br></td>

        </tr>
        <tr bgcolor="#F4F4F4" >
          <th align="left" width="44%">Patient Initials :</th>
          <td align="left" colspan="3"> <br /><input type="hidden" name="patient_initials" size="10"   value="<?php echo $dbarr['patient_initials']; ?>" maxlength="2" readonly="readonly" /> <?php echo strtoupper($dbarr['patient_initials']); ?> </br></br>   </td>
        </tr>
        <tr bgcolor="#F4F4F4" >
          <th align="left" width="44%">Gender : </th>
          <td align="left" colspan="3"> <br />
            <input type="hidden"   name="sex" size="10" value="<?php echo $dbarr['sex']; ?>"  readonly="readonly" > <?php echo $dbarr['sex']; ?> <br /><br />
          </td>
        </tr>
        <?php
$date_of_birth = $dbarr['date_of_birth'];
$dateofrecord = $dbarr['dateofrecord'];
$date_of_birth = new DateTime($date_of_birth);
$date_today_now = new DateTime();
$dateofrecord = new DateTime($dateofrecord);
$ymd_birth = $date_of_birth->format("d-m-Y");
$mage = ($dateofrecord->format("d-m-Y") - $date_of_birth->format("d-m-Y"));
?>
        <tr bgcolor="#F4F4F4" >
          <th align="left" width="44%">Date of birth : </th>
          <td align="left" colspan="3"> <br />
           <input type="hidden" size="10"  name="date_of_birth" value="<?php echo $dbarr['date_of_birth']; ?>" maxlength="10"  readonly="readonly" >   <?php echo "$ymd_birth"; ?>      (พ.ศ.)     <br /><br />

         </td>
       </tr>
       <tr bgcolor="#F4F4F4" >
        <th align="left" width="44%">Date of biopsy :  </th>
        <td align="left" colspan="3"> <br />
          <input type="hidden" name="date_bio_report"   value="<?php echo $dbarr['date_bio_report']; ?>"  size="10" readonly="readonly"/><?php echo $dbarr['date_bio_report']; ?><br /><br />
        </td>
      </tr>
      <tr bgcolor="#F4F4F4" >
       <th align="left" >Date of record start:   </th>
       <td align="left" > <br />
          <input type="hidden" name="d_record"  value="<?php echo $dbarr['date_todayone']; ?>"  size="2"  readonly="readonly"/><?php echo "$date_todayone"; ?>-
          <input type="hidden" name="m_record"  value="<?php echo $dbarr['date_todaymonth']; ?>"  size="2"  readonly="readonly"/><?php echo "$date_todaymonth"; ?>-
          <input  type="hidden" maxlength="4" name="y_record" value="<?php echo $dbarr['date_today9']; ?>" readonly="readonly" size="3" /><?php echo "$date_today9"; ?><br /><br />
      </td>
    </tr>
  </table>

  <table width="100%" border="0" align="center">


   <tr bgcolor="#F4F4F4" >
    <th align="left"  colspan="2"><br /><font size="+1" >Pathology Consensus Review </font><br /><br /></th>
  </tr>

  <tr bgcolor="#F4F4F4" >
   <th width="33%"  align="left"><br /> Date of Pathology Consensus record :<br /><Br /></th>
   <td width="67%" align="left">
    <input type="text" name="date_bio_report_pathology" size="10"  value="<?php echo $dbarr['date_bio_report_pathology']; ?>" id="date_bio_report" />          (Example: (dd-mm-พ.ศ.(2500))</td>
  </tr>
  <tr bgcolor="#F4F4F4" >
   <th width="33%"  align="left"><br /> Pathology No :<br /><Br /></th>
   <td width="67%" align="left">
    <input type="text" name="pathology_pathology" size="10"  value="<?php echo $dbarr['pathology_pathology']; ?>" />       (Example: SP47-0007/47 = SP47000747)   </td>
  </tr>
  <tr bgcolor="#F4F4F4" >
   <th width="33%"  align="left"><br />  Biopsy site :<br /><Br /></th>
   <td width="67%" align="left">

    <select name="biopsy_site_pathology" id="biopsy_site" style="width:300px;>
     <option  value=" ><?php echo $dbarr['biopsy_site_pathology']; ?></option>
     <option value="<?php echo $dbarr['biopsy_site_pathology']; ?>"><?php echo $dbarr['biopsy_site_pathology']; ?></option>
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
   </select>
 </td>
</tr>
<tr bgcolor="#F4F4F4" >
  <th align="left">Type:</th>
  <td colspan="3" > <br />
      <input type="hidden" id="get_data_ch1" value="<?=$dbarr['type_pathology'] ?>" />  
      <input type="hidden" id="get_data_ch2" value="<?=$dbarr['type_sub_non_pathology'] ?>" />  
      <input type="radio" name="type_pathology"  value="Hodgkin lymphoma (HL)" <?php if ($dbarr['type_pathology'] == 'Hodgkin lymphoma (HL)') {
    echo "checked";
}
?>  onclick="show_type_pathology(this.value);"> Hodgkin lymphoma (HL)	<br /><br />

    <table width="500" border="0" cellpadding="0" cellspacing="0" id="type_pathology1" style="display:none">
      <tr bgcolor="#F4F4F4" >
        <td>
          &nbsp;&nbsp;   <input type="radio" name="type_hodgkin_pathology"   value="01 : Classical HL, Nodular sclerosis"  <?php if ($dbarr['type_hodgkin_pathology'] == '01 : Classical HL, Nodular sclerosis') {
    echo "checked";
}
?> > 01 : Classical HL, Nodular sclerosis <br /><br />
          &nbsp;&nbsp;   <input type="radio" name="type_hodgkin_pathology"   value="02 : Classical HL, Mixed cellularity"  <?php if ($dbarr['type_hodgkin_pathology'] == '02 : Classical HL, Mixed cellularity') {
    echo "checked";
}
?> >  02 : Classical HL, Mixed cellularity <br /><br />
          &nbsp;&nbsp;   <input type="radio" name="type_hodgkin_pathology"   value="03 : Classical HL, Lymphocyte-rich" <?php if ($dbarr['type_hodgkin_pathology'] == '03 : Classical HL, Lymphocyte-rich') {
    echo "checked";
}
?> >  03 : Classical HL, Lymphocyte-rich<br /><br />
          &nbsp;&nbsp;   <input type="radio" name="type_hodgkin_pathology"   value="04 : Classical HL, Lymphocyte-depleted" <?php if ($dbarr['type_hodgkin_pathology'] == '04 : Classical HL, Lymphocyte-depleted') {
    echo "checked";
}
?> > 04 : Classical HL, Lymphocyte-depleted<br /><br />
          &nbsp;&nbsp;   <input type="radio" name="type_hodgkin_pathology"   value="05 : HL, Nodular lymphocyte predominant" <?php if ($dbarr['type_hodgkin_pathology'] == '05 : HL, Nodular lymphocyte predominant') {
    echo "checked";
}
?> >  05 : HL, Nodular lymphocyte predominant<br /><br />
          &nbsp;&nbsp;   <input type="radio" name="type_hodgkin_pathology"   value="06 : HL, unclassifiable" <?php if ($dbarr['type_hodgkin_pathology'] == '06 : HL, unclassifiable') {
    echo "checked";
}
?> >  06 : HL, unclassifiable<br /><br />

        </td>
      </tr>
    </table>
    

        <input type="radio"   name="type_pathology" value="Non-Hodgkin lymphoma (NHL)"  onclick="show_type_pathology(this.value);"  <?php if ($dbarr['type_pathology'] == 'Non-Hodgkin lymphoma (NHL)') {
    echo "checked";
}
?> >   Non-Hodgkin lymphoma (NHL)
        &nbsp;&nbsp;Immunophenotype:  &nbsp;&nbsp;
        <select name="immunophenotype_pathology"  style="width:100px;>

         <option value="<?php echo $dbarr['immunophenotype_pathology']; ?>"><?php echo $dbarr['immunophenotype_pathology']; ?></option>
         <option value="B">B</option>
         <option value="T/NK">T/NK</option>
         <option value="Unclassify">Unclassify</option>
         <option value="Not done">Not done</option>
       </select>

       <br /><br />

       <table width="500" border="0" cellpadding="0" cellspacing="0" id="type1" style="display:none">
        <tr bgcolor="#F4F4F4" >
          <td>
 <input type="radio" name="type_sub_non_pathology"   value="WHO classification" id="type_run1"  <?php if ($dbarr['type_sub_non_pathology'] == 'WHO classification') {
    echo "checked";
}
?> onclick="show_type_sub_non_pathology(this.value);"  >  WHO classification  <br /><br />
            <table width="500" border="0" cellpadding="0" cellspacing="0" id="show_id1" style="display:none">
              <tr bgcolor="#F4F4F4" >
                <td>
                 <select name="who_sub_pathology" id="who_sub" style="width:500px;">
                   <option value="">Please select..</option>
                   <option value="07 : Precursor B-lymphoblastic lymphoma" <?php if ($dbarr["who_sub_pathology"] == "07 : Precursor B-lymphoblastic lymphoma") {echo " selected";}?> >07 : Precursor B-lymphoblastic lymphoma</option>
                   <option value="08 : Small lymphocytic lymphoma" <?php if ($dbarr["who_sub_pathology"] == "08 : Small lymphocytic lymphoma") {echo " selected";}?> >08 : Small lymphocytic lymphoma</option>
                   <option value="09 : Lymphoplasmacytic lymphoma" <?php if ($dbarr["who_sub_pathology"] == "09 : Lymphoplasmacytic lymphoma") {echo " selected";}?> >09 : Lymphoplasmacytic lymphoma</option>
                   <option value="10 : Splenic marginal zone lymphoma" <?php if ($dbarr["who_sub_pathology"] == "10 : Splenic marginal zone lymphoma") {echo " selected";}?> >10 : Splenic marginal zone lymphoma</option>
                   <option value="11 : Extranodal marginal zone lymphoma of MALT type" <?php if ($dbarr["who_sub_pathology"] == "11 : Extranodal marginal zone lymphoma of MALT type") {echo " selected";}?> >11 : Extranodal marginal zone lymphoma of MALT type</option>
                   <option value="12 : Nodal marginal zone lymphoma" <?php if ($dbarr["who_sub_pathology"] == "12 : Nodal marginal zone lymphoma") {echo " selected";}?> >12 : Nodal marginal zone lymphoma</option>
                   <option value="13A : In situ follicular neoplasia" <?php if ($dbarr["who_sub_pathology"] == "13A : In situ follicular neoplasia") {echo " selected";}?> >13A : In situ follicular neoplasia</option>
                   <option value="13B : Duodenal-type follicular lymphoma" <?php if ($dbarr["who_sub_pathology"] == "13B : Duodenal-type follicular lymphoma") {echo " selected";}?> >13B : Duodenal-type follicular lymphoma</option>
                   <option value="13 : Follicular lymphoma, grade 1" <?php if ($dbarr["who_sub_pathology"] == "13 : Follicular lymphoma, grade 1") {echo " selected";}?> >13 : Follicular lymphoma, grade 1</option>
                   <option value="14 : Follicular lymphoma, grade 2" <?php if ($dbarr["who_sub_pathology"] == "14 : Follicular lymphoma, grade 2") {echo " selected";}?> >14 : Follicular lymphoma, grade 2</option>
                   <option value="15 : Follicular lymphoma, grade 3" <?php if ($dbarr["who_sub_pathology"] == "15 : Follicular lymphoma, grade 3") {echo " selected";}?> >15 : Follicular lymphoma, grade 3</option>
                   <option value="16A : In situ mantle cell neoplasia" <?php if ($dbarr["who_sub_pathology"] == "16A : In situ mantle cell neoplasia") {echo " selected";}?> >16A : In situ mantle cell neoplasia</option>
                   <option value="16 : Mantle cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "16 : Mantle cell lymphoma") {echo " selected";}?> >16 : Mantle cell lymphoma</option>
                   <option value="17 : Diffuse large B-cell lymphoma (DLBCL), NOS" <?php if ($dbarr["who_sub_pathology"] == "17 : Diffuse large B-cell lymphoma (DLBCL), NOS") {echo " selected";}?> >17 : Diffuse large B-cell lymphoma (DLBCL), NOS</option>
                   <option value="17A : Germinal center B-cell (GCB) DLBCL" <?php if ($dbarr["who_sub_pathology"] == "17A : Germinal center B-cell (GCB) DLBCL") {echo " selected";}?> >17A : Germinal center B-cell (GCB) DLBCL</option>
                   <option value="17B : Activated B-cell (ABC) DLBCL" <?php if ($dbarr["who_sub_pathology"] == "17B : Activated B-cell (ABC) DLBCL") {echo " selected";}?> >17B : Activated B-cell (ABC) DLBCL</option>
                   <option value="18 : Mediastinal (thymic) large B-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "18 : Mediastinal (thymic) large B-cell lymphoma") {echo " selected";}?> >18 : Mediastinal (thymic) large B-cell lymphoma</option>
                   <option value="19 : Intravascular large B-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "19 : Intravascular large B-cell lymphoma") {echo " selected";}?> >19 : Intravascular large B-cell lymphoma</option>
                   <option value="20 : Primary effusion lymphoma" <?php if ($dbarr["who_sub_pathology"] == "20 : Primary effusion lymphoma") {echo " selected";}?> >20 : Primary effusion lymphoma</option>
                   <option value="21 : Burkitt lymphoma" <?php if ($dbarr["who_sub_pathology"] == "21 : Burkitt lymphoma") {echo " selected";}?> >21 : Burkitt lymphoma</option>
                   <option value="22 : Lymphomatoid granulomatosis" <?php if ($dbarr["who_sub_pathology"] == "22 : Lymphomatoid granulomatosis") {echo " selected";}?> >22 : Lymphomatoid granulomatosis</option>
                   <option value="23 : Post-transplant lymphoproliferative disorders(PTLD)" <?php if ($dbarr["who_sub_pathology"] == "23 : Post-transplant lymphoproliferative disorders(PTLD)") {echo " selected";}?> >23 : Post-transplant lymphoproliferative disorders(PTLD)</option>
                   <option value="24 : Precursor T-lymphoblastic lymphoma" <?php if ($dbarr["who_sub_pathology"] == "24 : Precursor T-lymphoblastic lymphoma") {echo " selected";}?> >24 : Precursor T-lymphoblastic lymphoma</option>
                   <option value="25 : Extranodal NK/T-cell lymphoma, nasal type" <?php if ($dbarr["who_sub_pathology"] == "25 : Extranodal NK/T-cell lymphoma, nasal type") {echo " selected";}?> >25 : Extranodal NK/T-cell lymphoma, nasal type</option>
                   <option value="26 : Enteropathy-type T-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "26 : Enteropathy-type T-cell lymphoma") {echo " selected";}?> >26 : Enteropathy-type T-cell lymphoma</option>
                   <option value="26A : Enteropathy-associated T-cell lymphoma(TypeI EALT)" <?php if ($dbarr["who_sub_pathology"] == "26A : Enteropathy-associated T-cell lymphoma(TypeI EALT)") {echo " selected";}?> >26A : Enteropathy-associated T-cell lymphoma(TypeI EALT)</option>
                   <option value="26B : Monomorphic epitheliotroptic intestinal T-cell lymphoma(TypeII EATL)" <?php if ($dbarr["who_sub_pathology"] == "26B : Monomorphic epitheliotroptic intestinal T-cell lymphoma(TypeII EATL)") {echo " selected";}?> >26B : Monomorphic epitheliotroptic intestinal T-cell lymphoma(TypeII EATL)</option>
                   <option value="27 : Hepatosplenic T-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "27 : Hepatosplenic T-cell lymphoma") {echo " selected";}?> >27 : Hepatosplenic T-cell lymphoma</option>
                   <option value="28 : Subcutaneous panniculitis-like T-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "28 : Subcutaneous panniculitis-like T-cell lymphoma") {echo " selected";}?> >28 : Subcutaneous panniculitis-like T-cell lymphoma</option>
                   <option value="29 : Aggressive NK-cell leukemia/lymphoma" <?php if ($dbarr["who_sub_pathology"] == "29 : Aggressive NK-cell leukemia/lymphoma") {echo " selected";}?> >29 : Aggressive NK-cell leukemia/lymphoma</option>
                   <option value="30 : Mycosis fungoides/Sezary syndrome" <?php if ($dbarr["who_sub_pathology"] == "30 : Mycosis fungoides/Sezary syndrome") {echo " selected";}?> >30 : Mycosis fungoides/Sezary syndrome</option>
                   <option value="31 : Angioimmunblastic T-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "31 : Angioimmunblastic T-cell lymphoma") {echo " selected";}?> >31 : Angioimmunblastic T-cell lymphoma</option>
                   <option value="32 : Primary cutaneous anaplastic large cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "32 : Primary cutaneous anaplastic large cell lymphoma") {echo " selected";}?> >32 : Primary cutaneous anaplastic large cell lymphoma</option>
                   <option value="33 : Anaplastic large cell lymphoma, ALK positive" <?php if ($dbarr["who_sub_pathology"] == "33 : Anaplastic large cell lymphoma, ALK positive") {echo " selected";}?> >33 : Anaplastic large cell lymphoma, ALK positive</option>
                   <option value="34 : Peripheal T-cell lymphoma, unspecified, NOS" <?php if ($dbarr["who_sub_pathology"] == "34 : Peripheal T-cell lymphoma, unspecified, NOS") {echo " selected";}?> >34 : Peripheal T-cell lymphoma, unspecified, NOS</option>
                   <option value="--**New entity**--" <?php if ($dbarr["who_sub_pathology"] == "--**New entity**--") {echo " selected";}?> >--**New entity**--</option>
                   <option value="35 : T-cell/histiocyte-rich large B-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "35 : T-cell/histiocyte-rich large B-cell lymphoma") {echo " selected";}?> >35 : T-cell/histiocyte-rich large B-cell lymphoma</option>
                   <option value="36 : Primary cutaneous follicle enter lymphoma" <?php if ($dbarr["who_sub_pathology"] == "36 : Primary cutaneous follicle enter lymphoma") {echo " selected";}?> >36 : Primary cutaneous follicle enter lymphoma</option>
                   <option value="37 : Primary DLBCL of the CNS" <?php if ($dbarr["who_sub_pathology"] == "37 : Primary DLBCL of the CNS") {echo " selected";}?> >37 : Primary DLBCL of the CNS</option>
                   <option value="38 : Primry cutaneous DLBCL, leg type " <?php if ($dbarr["who_sub_pathology"] == "38 : Primry cutaneous DLBCL, leg type ") {echo " selected";}?> >38 : Primry cutaneous DLBCL, leg type </option>
                   <option value="39 : EBV+DLBCL NOS " <?php if ($dbarr["who_sub_pathology"] == "39 : EBV+DLBCL NOS ") {echo " selected";}?> >39 : EBV+DLBCL NOS </option>
                   <option value="40 : ALK positive large B-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "40 : ALK positive large B-cell lymphoma") {echo " selected";}?> >40 : ALK positive large B-cell lymphoma</option>
                   <option value="41 : Plasmablastic lymphoma" <?php if ($dbarr["who_sub_pathology"] == "41 : Plasmablastic lymphoma") {echo " selected";}?> >41 : Plasmablastic lymphoma</option>
                   <option value="42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease(HHV8+ DLBCL, NOS)" <?php if ($dbarr["who_sub_pathology"] == "42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease(HHV8+ DLBCL, NOS)") {echo " selected";}?> >42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease(HHV8+ DLBCL, NOS)</option>
                   <option value="43 : With features intermediate between DLBCL and Burkitt lymphoma" <?php if ($dbarr["who_sub_pathology"] == "43 : With features intermediate between DLBCL and Burkitt lymphoma") {echo " selected";}?> >43 : With features intermediate between DLBCL and Burkitt lymphoma</option>
                   <option value="43A : High-grade B-call lymphoma, with feature intermediate between DLBCL and classical Hodgkin lymphoma" <?php if ($dbarr["who_sub_pathology"] == "43A : High-grade B-call lymphoma, with feature intermediate between DLBCL and classical Hodgkin lymphoma") {echo " selected";}?> >43A : High-grade B-call lymphoma, with feature intermediate between DLBCL and classical Hodgkin lymphoma</option>
                   <option value="44 : B-cell lymphoma, unclassifiable, with features intermediate between DLBCL and classical Hodgkin lymphoma" <?php if ($dbarr["who_sub_pathology"] == "44 : B-cell lymphoma, unclassifiable, with features intermediate between DLBCL and classical Hodgkin lymphoma") {echo " selected";}?> >44 : B-cell lymphoma, unclassifiable, with features intermediate between DLBCL and classical Hodgkin lymphoma</option>
                   <option value="45 : Chronic lymphoproliferative disorder of NK-cells" <?php if ($dbarr["who_sub_pathology"] == "45 : Chronic lymphoproliferative disorder of NK-cells") {echo " selected";}?> >45 : Chronic lymphoproliferative disorder of NK-cells</option>
                   <option value="46 : Lymphomatoid papulosis" <?php if ($dbarr["who_sub_pathology"] == "46 : Lymphomatoid papulosis") {echo " selected";}?> >46 : Lymphomatoid papulosis</option>
                   <option value="47 : Primary cutaneous gamma-delta T-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "47 : Primary cutaneous gamma-delta T-cell lymphoma") {echo " selected";}?> >47 : Primary cutaneous gamma-delta T-cell lymphoma</option>
                   <option value="48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma") {echo " selected";}?> >48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma</option>
                   <option value="49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma") {echo " selected";}?> >49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma</option>
                   <option value="50 : Anaplastic large cell lymphoma, ALK negative" <?php if ($dbarr["who_sub_pathology"] == "50 : Anaplastic large cell lymphoma, ALK negative") {echo " selected";}?> >50 : Anaplastic large cell lymphoma, ALK negative</option>
                   <option value="51 : Breast implant-associated anaplastic large-cell lymphoma" <?php if ($dbarr["who_sub_pathology"] == "51 : Breast implant-associated anaplastic large-cell lymphoma") {echo " selected";}?> >51 : Breast implant-associated anaplastic large-cell lymphoma</option>
                   <option value="52 : DLBCL associated with chronic inflammation" <?php if ($dbarr["who_sub_pathology"] == "52 : DLBCL associated with chronic inflammation") {echo " selected";}?> >52 : DLBCL associated with chronic inflammation</option>
                 </select>
               </td>
             </tr>
           </table>
           <script language="javascript">
		   
		
		   
            function show_type_sub_non_pathology(id) {
			
			
			
						if(id == "WHO classification") { 
              document.getElementById("show_id1").style.display = "";
              document.getElementById("show_id2").style.display = "none";
			  document.getElementById("show_id3").style.display = "none";
						} else if(id == "Working formulation") {
              document.getElementById("show_id1").style.display = "none";
              document.getElementById("show_id2").style.display = "";
			  document.getElementById("show_id3").style.display = "none";
			  	} else if(id == "Other type") {
              document.getElementById("show_id1").style.display = "none";
              document.getElementById("show_id2").style.display = "none";
			  document.getElementById("show_id3").style.display = "";
			  
            }
          }
        </script>


				    <input type="radio"  name="type_sub_non_pathology"  id="type_run2"  value="Working formulation"   onclick="show_type_sub_non_pathology(this.value);"  <?php if ($dbarr['type_sub_non_pathology'] == 'Working formulation') {
    echo "checked";
}
?> />  Working formulation  <br />
		<table border="0" cellpadding="0" cellspacing="0"  id="show_id2" style="display:none">
		  <tr bgcolor="#F4F4F4" ><td>
		  

  <select name="work_sub_pathology"  id="work_sub" style="width:400px;" >

    <option value="07 : NHL, small lymphocytic without plasmacytoid differentiation"  <?php if ($dbarr["work_sub_pathology"] == "07 : NHL, small lymphocytic without plasmacytoid differentiation") {echo " selected";}?>>07 : NHL, small lymphocytic without plasmacytoid differentiation</option>
    <option value="08 : NHL, small lymphocytic with plasmacytoid differentiation" <?php if ($dbarr["work_sub_pathology"] == "08 : NHL, small lymphocytic with plasmacytoid differentiation") {echo " selected";}?>>08 : NHL, small lymphocytic with plasmacytoid differentiation</option>
    <option value="09 : NHL, follicular, small cleaved" <?php if ($dbarr["work_sub_pathology"] == "09 : NHL, follicular, small cleaved") {echo " selected";}?>>09 : NHL, follicular, small cleaved</option>
    <option value="10 : NHL, follicular, mixed small cleaved and large cell" <?php if ($dbarr["work_sub_pathology"] == "10 : NHL, follicular, mixed small cleaved and large cell") {echo " selected";}?>>10 : NHL, follicular, mixed small cleaved and large cell</option>
    <option value="11 : NHL, follicular, large cell" <?php if ($dbarr["work_sub_pathology"] == "11 : NHL, follicular, large cell") {echo " selected";}?>>11 : NHL, follicular, large cell</option>
    <option value="12 : NHL, diffuse, small cleaved" <?php if ($dbarr["work_sub_pathology"] == "12 : NHL, diffuse, small cleaved") {echo " selected";}?>>12 : NHL, diffuse, small cleaved</option>
    <option value="13 : NHL, diffuse, mixed small and large cell" <?php if ($dbarr["work_sub_pathology"] == "13 : NHL, diffuse, mixed small and large cell") {echo " selected";}?>>13 : NHL, diffuse, mixed small and large cell</option>
    <option value="14 : NHL, diffuse, large cell" <?php if ($dbarr["work_sub_pathology"] == "14 : NHL, diffuse, large cell") {echo " selected";}?>>14 : NHL, diffuse, large cell</option>
    <option value="15 : NHL, large cell immunoblastic" <?php if ($dbarr["work_sub_pathology"] == "15 : NHL, large cell immunoblastic") {echo " selected";}?>>15 : NHL, large cell immunoblastic</option>
    <option value="16 : NHL, lymphoblastic type" <?php if ($dbarr["work_sub_pathology"] == "16 : NHL, lymphoblastic type") {echo " selected";}?>>16 : NHL, lymphoblastic type</option>
    <option value="17 : NHL, small non-cleaved Burkitt type" <?php if ($dbarr["work_sub_pathology"] == "17 : NHL, small non-cleaved Burkitt type") {echo " selected";}?>>17 : NHL, small non-cleaved Burkitt type</option>
    <option value="18 : NHL, small non-cleaved non-Burkitt type" <?php if ($dbarr["work_sub_pathology"] == "18 : NHL, small non-cleaved non-Burkitt type") {echo " selected";}?>>18 : NHL, small non-cleaved non-Burkitt type</option>
    <option value="19 : Composite lymphoma" <?php if ($dbarr["work_sub_pathology"] == "19 : Composite lymphoma") {echo " selected";}?>>19 : Composite lymphoma</option>
    <option value="20 : Histiocytic lymphoma" <?php if ($dbarr["work_sub_pathology"] == "20 : Histiocytic lymphoma") {echo " selected";}?>>20 : Histiocytic lymphoma</option>
    <option value="21 : Mycosis fungoides/Sezary syndrome" <?php if ($dbarr["work_sub_pathology"] == "21 : Mycosis fungoides/Sezary syndrome") {echo " selected";}?>>21 : Mycosis fungoides/Sezary syndrome</option>
    <option value="22 : NHL, unclassifiable" <?php if ($dbarr["work_sub_pathology"] == "22 : NHL, unclassifiable") {echo " selected";}?>>22 : NHL, unclassifiable</option>
  </select>
  <br />
		  
		  </td></tr>
		</table>
<br>
        <input type="radio" name="type_sub_non_pathology"   value="Other type" id="type_run3"  onclick="show_type_sub_non_pathology(this.value);" <?php if ($dbarr['type_sub_non_pathology'] == 'Other type') {
    echo "checked";
}
?> onclick="show_type_other(this.value);" >  99 Other type  <br /><br />

        <table width="500" border="0" cellpadding="0" cellspacing="0"  id="show_id3" style="display:none">
          <tr bgcolor="#F4F4F4" >
            <td>

              <input type="text" name="other_type_pathology"   value="<?php echo $dbarr['other_type_pathology']; ?>"  size="50" ><br />
** Please input ( , comma) in text.  <br>
            </td>
          </tr>
        </table>
        <script language="javascript">
          function show_type_other(id) {
						if(id == "Other type") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2
              document.getElementById("other_type1").style.display = "";
              document.getElementById("other_type2").style.display = "none";
						} else if(id != "Other type") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1
              document.getElementById("other_type1").style.display = "none";
              document.getElementById("other_type2").style.display = "";
            }
          }
        </script>
      </td>
    </tr>
  </table>
  <script language="javascript">
    function show_type(id) {
						if(id == "Non-Hodgkin lymphoma (NHL)") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2
              document.getElementById("type1").style.display = "";
              document.getElementById("type2").style.display = "none";
						} else if(id != "Non-Hodgkin lymphoma (NHL)") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1
              document.getElementById("type1").style.display = "none";
              document.getElementById("type2").style.display = "";
            }
          }
        </script>
      </td>
    </tr>
    <tr bgcolor="#F4F4F4" >
      <th colspan="4" align="center">
        <br /><br />
        <input name="id" type="hidden" id="id" value="<?php echo $dbarr['id']; ?>">
        <input type="submit" name="Submit" value="Update Data " size="20"><br />

      </td>
    </tr>

  </table>



<script language="javascript">
	
		  var txtid1 = document.getElementById("get_data_ch1").value;
		   
	      if(txtid1=="Hodgkin lymphoma (HL)"){
		                 document.getElementById("type_pathology1").style.display = "";
                         document.getElementById("type1").style.display = "none";
		  }
		  	      if(txtid1=="Non-Hodgkin lymphoma (NHL)"){
		               document.getElementById("type_pathology1").style.display = "none";
                      document.getElementById("type1").style.display = "";
					  var txtid2 = document.getElementById("get_data_ch2").value;
					  	if(txtid2 == "WHO classification") { 
              document.getElementById("show_id1").style.display = "";
              document.getElementById("show_id2").style.display = "none";
			  document.getElementById("show_id3").style.display = "none";
						} else if(txtid2 == "Working formulation") {
              document.getElementById("show_id1").style.display = "none";
              document.getElementById("show_id2").style.display = "";
			  document.getElementById("show_id3").style.display = "none";
			       	} else if(txtid2 == "Other type") {
              document.getElementById("show_id1").style.display = "none";
              document.getElementById("show_id2").style.display = "none";
			  document.getElementById("show_id3").style.display = "";
			  
            }
					  
					  
		  }
	
      function show_type_pathology(id) {
	  

	  
	  
	  
						if(id == "Hodgkin lymphoma (HL)") { 
              document.getElementById("type_pathology1").style.display = "";
              document.getElementById("type1").style.display = "none";
						} else if(id =="Non-Hodgkin lymphoma (NHL)") { 
              document.getElementById("type_pathology1").style.display = "none";
              document.getElementById("type1").style.display = "";
            }
          }
        </script>



</form>

</center>
</p>
</div>

<!-- sidebar -->

<div class="x"></div>
<div class="break"></div>

</div>
<?php include "modules/index/footer.php";?>