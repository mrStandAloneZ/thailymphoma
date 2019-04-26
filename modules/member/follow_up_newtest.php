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
///////////////////
$date_today = date("d/m/");
$year_now = date("Y")+'543';
$date_small = $date_today . substr($year_now, 2);

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
   $('#date_cr_complete_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});

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

.sublayer-2 {
   margin-left: 40px;
}
</style>
<!-- main content -->
<div id="center">
<body>
     <table  style="width:100%;background-color:#e8e8e8;">
		 <tr bgcolor="#e8e8e8"  bgcolor="#F4F4F4" ><td style="padding-left:35px;padding-top:15px">
          <h1>Follow Up Data</h1>
		  </td></tr></table>
  <p>
    <center>
     <form name ="checkForm" action="?name=member&file=follow_registry_update" method="post" onSubmit="return check();"  enctype="multipart/form-data" id="frm_check">
       <table width="100%" border="0" align="center">
        <tr bgcolor="#F4F4F4" >
          <th colspan="4"><br /><h1>Identification and Baseline Data</h1></th>
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
$dateofrecord = $dbarr["dateofrecord"];
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
    </table>
	<script>
	
	jQuery(document).ready(function($) {
		check_getsave();
	});

	
	 var myVar = setInterval(check_getsave, 3000);
	 function check_getsave(){

        chk=0;
		
		
		 var a1= $("#frm_check [name='chemotherapy_follow']:checked").val();
		 var a2= $("#frm_check [name='date_chemo_follow']").val();
		 var a3= $("#frm_check [name='chemo_select_follow']:checked").val();
		 var a4= $("#frm_check [name='chemo_select_follow_other']").val();
		 var a5= $("#frm_check [name='received_follow']:checked").val();

		 var b1= $("#frm_check [name='immunotherapy_follow']:checked").val();
		 var b2= $("#frm_check [name='date_immun_follow']").val();
		 var bb1= $("#frm_check [name='immun_select_follow']:checked").val();
		 var bb2= $("#frm_check [name='immun_select_follow_sub[z-index]']").map(function(){return $(this).val();}).get();
		  var b3= $("#frm_check [name='immun_other_text']").val();
		 

		 var d1= $("#frm_check [name='radiotherapy_follow']:checked").val();
		 var d2= $("#frm_check [name='date_rad_follow']").val();		 
		 
		 
		 var dd1= $("#frm_check [name='surgery_follow']:checked").val();
		 var dd2= $("#frm_check [name='date_surgery_follow']").val();		 
		 
		 /*
		 
		 		  var g1= $("#frm_check [name='salvage_follow']:checked").val();
		          var g2= $("#frm_check [name='date_surgery_follow']").val();		 
				  var g3= $("#frm_check [name='date_surgery_follow']").val();		
		 
		 */
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 var e1= $("#frm_check [name='no_treatment_follow']:checked").val();
		 
	
		
		if(e1==undefined ){
		
		       if(a1==undefined){chk++;}else{
			   
			   if(a1=="Chemotherapy"){
			   if(a2==""){chk++;}if(a5==undefined){chk++;}if(a3==undefined){chk++;}else{if(a3=="Other"){if(a4==""){chk++;}}}
			   }}
			   
			   if(b1==undefined){chk++;}else{
			   
			   if(b1=="Immunotherapy"){
			   if(b2==""){chk++;}if(bb1!=undefined){
			             if(bb1=="Rituximab"){if(bb2==""){chk++;}}
					     if(bb1=="Other"){  if(b3==""){chk++;}}
				    
			       }}
			       }
				   
				   
		
		           if(d1==undefined){chk++;}else{
			       if(d1=="Radiotherapy"){
				   if(d2==""){chk++;}
				   }}
			
			
				    if(dd1==undefined){chk++;}else{
			        if(dd1=="yes"){
				    if(dd2==""){chk++;}
				   }}
			
		}
		 

		 if(chk>=1){
	
		 var  save = document.getElementById("save");
		         save.style.cursor = "not-allowed";
		         save.style.opacity=0.65; 
		         save.style.backgroundColor = "#cccccc";
				 save.style.disabled=true;
				 
			   
         }else{
		 		 var  save = document.getElementById("save");
		         save.style.cursor = "pointer";
		         save.style.opacity=1; 
		         save.style.backgroundColor = "#7a5037";
				 save.style.disabled=false;
				 		

		 
		 }
			      

	  
	  }
	  
	  
	</script>
	
	
    <table width="100%" border="0" align="center">
      <tr bgcolor="#F4F4F4" >
        <th align="center" colspan="2"><br /><h1>Follow Up Data </h1><br /></th>
      </tr>
      <tr bgcolor="#F4F4F4" >
        <th width="44%" align="left">Date of record Follow up :</th>
        <td width="56%" align="left">    <br />
         <input type="hidden" name="date_record_follow" id="date_follow_up" size="10" value="<?php echo $year_now . '-' . $date_today_now->format("m-d") ?>"  />  <b><?php echo $date_today_now->format("d-m") . "-" . $year_now; ?> (พ.ศ.)</b><br /><br />
       </td>
     </tr>

     <tr bgcolor="#F4F4F4" >
      <th align="left" colspan="2"><br /><font color="ff3333" size="+1">Initial Treatment (mark all that apply)</font><br /><br /></th>
    </tr>
    <tr bgcolor="#F4F4F4" >
     <th><font color="ff3333">Chemotherapy </font></th>
     <td width="44%" align="center" colspan="2"><br />
      <input name="chemotherapy_follow" id="chemotherapy_follow_yes" onclick="check_getsave()" type="radio" value="Chemotherapy"  <?php if ($dbarr['chemotherapy_follow'] == "Chemotherapy") {
    echo "checked";
}
?>  onclick="onaction();" /> Yes  &nbsp;&nbsp;&nbsp;
      <input name="chemotherapy_follow" id="chemotherapy_follow_no" onclick="check_getsave()"  type="radio" value="No Chemotherapy" <?php if ($dbarr['chemotherapy_follow'] == "No Chemotherapy") {
    echo "checked";
}
?>  onclick="onaction();" /> No
      <br /><br />
      <div id="chemotherapy_follow_no_detail"></div>
      <div id="chemotherapy_follow_detail">
        <table width="500" border="0" cellpadding="0" cellspacing="0" >
          <tr bgcolor="#F4F4F4" >

           <td width="56%" align="center">    <br />
            <input type="text" name="date_chemo_follow" id="date_chemo" size="10" value="<?php echo $dbarr['date_chemo_follow']; ?>"   />
            &nbsp;&nbsp;&nbsp;  (Example: 31-12-(พ.ศ.)2500) <br /><br />
          </td>
        </tr>
        <tr bgcolor="#F4F4F4" >

         <td align="left" >

           <table width="491" border="0" cellpadding="0" cellspacing="4" >
            <tr bgcolor="#F4F4F4"  align="left">
              <td width="30%" align="left"><input name="chemo_select_follow" id="chemo_select_follow1" type="radio" value="Ch+/-P"  <?php if ($dbarr['chemo_select_follow'] == 'Ch+/-P') {
    echo "checked";
}
?> >              Ch+/-P</td>
              <td width="23%" align="left"><input name="chemo_select_follow" id="chemo_select_follow2" type="radio" value="CP"  <?php if ($dbarr['chemo_select_follow'] == 'CP') {
    echo "checked";
}
?>>              CP</td>
              <td width="23%" align="left"><input name="chemo_select_follow" id="chemo_select_follow3" type="radio" value="CVP (COP)" <?php if ($dbarr['chemo_select_follow'] == 'CVP (COP)') {
    echo "checked";
}
?> >     CVP (COP)</td>
              <td width="24%" align="left"><input name="chemo_select_follow" id="chemo_select_follow4" type="radio" value="CHOP-14" <?php if ($dbarr['chemo_select_follow'] == 'CHOP-14') {
    echo "checked";
}
?> />        CHOP-14</td>
            </tr>
            <tr bgcolor="#F4F4F4"  align="left">
              <td><input name="chemo_select_follow" type="radio" value="CHOP-21" id="chemo_select_follow5" <?php if ($dbarr['chemo_select_follow'] == 'CHOP-21') {
    echo "checked";
}
?>  />            CHOP-21</td>
              <td><input name="chemo_select_follow" type="radio" value="CHOEP"  id="chemo_select_follow6" <?php if ($dbarr['chemo_select_follow'] == 'CHOEP') {
    echo "checked";
}
?> />             CHOEP</td>
              <td><input name="chemo_select_follow" type="radio" value="CNOP"  id="chemo_select_follow7" <?php if ($dbarr['chemo_select_follow'] == 'CNOP') {
    echo "checked";
}
?>>              CNOP</td>
              <td><input name="chemo_select_follow" type="radio" value="EPOCH" id="chemo_select_follow8" <?php if ($dbarr['chemo_select_follow'] == 'EPOCH') {
    echo "checked";
}
?> />          EPOCH</td>
            </tr>
            <tr bgcolor="#F4F4F4"  align="left">
              <td><input name="chemo_select_follow" type="radio" value="CHOP-ESHAP" id="chemo_select_follow9"  <?php if ($dbarr['chemo_select_follow'] == 'CHOP-ESHAP') {
    echo "checked";
}
?>/>
              CHOP-ESHAP</td>
              <td><input name="chemo_select_follow" type="radio" value="HyperCVAD" id="chemo_select_follow10" <?php if ($dbarr['chemo_select_follow'] == 'HyperCVAD') {
    echo "checked";
}
?> />
              HyperCVAD</td>
              <td><input name="chemo_select_follow" type="radio" value="F" id="chemo_select_follow11"  <?php if ($dbarr['chemo_select_follow'] == 'F') {
    echo "checked";
}
?> />     F</td>
              <td><input name="chemo_select_follow" type="radio" value="FC"  id="chemo_select_follow12" <?php if ($dbarr['chemo_select_follow'] == 'FC') {
    echo "checked";
}
?> />   FC</td>
            </tr>
            <tr bgcolor="#F4F4F4"  align="left">
              <td><input name="chemo_select_follow" type="radio" value="FN+/-D"  id="chemo_select_follow13" <?php if ($dbarr['chemo_select_follow'] == 'FN+/-D') {
    echo "checked";
}
?> />  FN+/-D</td>
              <td><input name="chemo_select_follow" type="radio" value="FCM" id="chemo_select_follow14" <?php if ($dbarr['chemo_select_follow'] == 'FCM') {
    echo "checked";
}
?>  />      FCM</td>
              <td><input name="chemo_select_follow" type="radio" value="COPP"  id="chemo_select_follow15" <?php if ($dbarr['chemo_select_follow'] == 'COPP') {
    echo "checked";
}
?> />    COPP</td>
              <td><input name="chemo_select_follow" type="radio" value="ABV" id="chemo_select_follow16" <?php if ($dbarr['chemo_select_follow'] == 'ABV') {
    echo "checked";
}
?> />       ABV</td>
            </tr>

            <tr bgcolor="#F4F4F4"  align="left">
              <td><input name="chemo_select_follow" type="radio" value="COPP-ABV" id="chemo_select_follow17" <?php if ($dbarr['chemo_select_follow'] == 'COPP-ABV') {
    echo "checked";
}
?> />   COPP-ABV</td>
              <td><input name="chemo_select_follow" type="radio" value="ABVD" id="chemo_select_follow18" <?php if ($dbarr['chemo_select_follow'] == 'ABVD') {
    echo "checked";
}
?> />          ABVD</td>
              <td><input name="chemo_select_follow" type="radio" value="BEACOP" id="chemo_select_follow19" <?php if ($dbarr['chemo_select_follow'] == 'BEACOP') {
    echo "checked";
}
?> />      BEACOPP</td>
              <td align="left"><input name="chemo_select_follow" type="radio" id="chemo_select_follow20" value="CODOX-M"   <?php if ($dbarr['chemo_select_follow'] == 'CODOX-M') {
    echo "checked";
}
?> />   CODOX-M</td>
            </tr>
            <tr bgcolor="#F4F4F4"  align="left">
              <td align="left"><input name="chemo_select_follow" type="radio" id="chemo_select_follow21" value="CODOX-M/IVAC"  <?php if ($dbarr['chemo_select_follow'] == "CODOX-M/IVAC") {
    echo "checked";
}
?> />           CODOX-M/IVAC</td>
              <td align="left"><input name="chemo_select_follow" type="radio" id="chemo_select_follow22" value="ALL regimen"   <?php if ($dbarr['chemo_select_follow'] == 'ALL regimen') {
    echo "checked";
}
?> />            ALL regimen</td>
              <td align="left"><input name="chemo_select_follow" type="radio" id="chemo_select_follow23" value="Bendamustine"   <?php if ($dbarr['chemo_select_follow'] == 'Bendamustine') {
    echo "checked";
}
?> />            Bendamustine</td>
              <td align="left"><input name="chemo_select_follow" type="radio" id="chemo_select_follow24" value="Ibrutinib"   <?php if ($dbarr['chemo_select_follow'] == 'Ibrutinib') {
    echo "checked";
}
?> />            Ibrutinib</td>
            </tr>
            <tr bgcolor="#F4F4F4" >
              <td align="left"><input name="chemo_select_follow" id="chemo_select_follow23" type="radio" value="Other"    <?php if ($dbarr['chemo_select_follow'] == 'Other') {
    echo "checked";
}
?> />    Other</td>
              <td colspan="3" align="left"><input name="chemo_select_follow_other" id="chemo_select_follow_other" type="text" value="<?php
			  if(trim($dbarr['chemo_select_follow'])=="Other"){
			   echo $dbarr['chemo_select_follow_other'];} ?>" size="20" /></td>
            </tr>
            <tr bgcolor="#F4F4F4" >
              <td align="left" colspan="4">Received Intrathecal chemotherapy    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="received_follow" id="received_follow1"  type="radio" value="Yes"  <?php if ($dbarr['received_follow'] == 'Yes') {
    echo "checked";
}
?>>    Yes   &nbsp;&nbsp;&nbsp;&nbsp;
                <input name="received_follow" id="received_follow2"  type="radio" value="No"  <?php if ($dbarr['received_follow'] == 'No') {
    echo "checked";
}
?>>    No
              </td>
            </tr>


          </table>
        </td>

      </tr>
    </table>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#chemotherapy_follow_no_detail').hide();
      $('#chemotherapy_follow_detail').hide();

      if($('#chemotherapy_follow_yes').is(':checked')){
        $('#chemotherapy_follow_detail').show();
      }
    });
    $('#chemotherapy_follow_yes').click(function(){
      clear_data_chemotherapy();
      $('#chemotherapy_follow_no_detail').hide();
      $('#chemotherapy_follow_detail').show();
      $('#no_treatment_follow').prop('checked', false);
    });

    $('#chemotherapy_follow_no').click(function(){
      clear_data_chemotherapy();
      $('#chemotherapy_follow_detail').hide();
      $('#chemotherapy_follow_no_detail').show();
    });

    function clear_data_chemotherapy(){
      $('#date_chemo').val('');
      $('#chemo_select_follow1').prop('checked', false);
      $('#chemo_select_follow2').prop('checked', false);
      $('#chemo_select_follow3').prop('checked', false);
      $('#chemo_select_follow4').prop('checked', false);
      $('#chemo_select_follow5').prop('checked', false);
      $('#chemo_select_follow6').prop('checked', false);
      $('#chemo_select_follow7').prop('checked', false);
      $('#chemo_select_follow8').prop('checked', false);
      $('#chemo_select_follow9').prop('checked', false);
      $('#chemo_select_follow10').prop('checked', false);
      $('#chemo_select_follow11').prop('checked', false);
      $('#chemo_select_follow12').prop('checked', false);
      $('#chemo_select_follow13').prop('checked', false);
      $('#chemo_select_follow14').prop('checked', false);
      $('#chemo_select_follow15').prop('checked', false);
      $('#chemo_select_follow16').prop('checked', false);
      $('#chemo_select_follow17').prop('checked', false);
      $('#chemo_select_follow18').prop('checked', false);
      $('#chemo_select_follow19').prop('checked', false);
      $('#chemo_select_follow20').prop('checked', false);
      $('#chemo_select_follow21').prop('checked', false);
      $('#chemo_select_follow22').prop('checked', false);
      $('#chemo_select_follow23').prop('checked', false);
      $('#chemo_select_follow_other').val('');
      $('#received_follow1').prop('checked', false);
      $('#received_follow2').prop('checked', false);
    }
  </script>
</th>
</tr>

<tr bgcolor="#F4F4F4" >
  <th> <font color="ff3333">    Immunotherapy </font>    </th>
  <td align="center"> <br />&nbsp;


    <input name="immunotherapy_follow"   id="immunotherapy_follow_yes" onclick="check_getsave()" type="radio" value="Immunotherapy"  <?php if ($dbarr['immunotherapy_follow'] == 'Immunotherapy') {
    echo "checked='checked'";
}
?>   onclick="onaction();"  />  Yes &nbsp;&nbsp;&nbsp;
    <input    name="immunotherapy_follow"  id="immunotherapy_follow_no" onclick="check_getsave()" type="radio" value="Immunotherapy_no"    <?php if ($dbarr['immunotherapy_follow'] == 'Immunotherapy_no') {
   echo "checked='checked'";
}
?>  onclick="onaction();"  />  No
    <br /><br />

    <div id="immuno_follow_n1_no"></div>
    <div id="immuno_follow_n2_yes">

      <table width="500" border="0" cellpadding="0" cellspacing="0" >
       <tr bgcolor="#F4F4F4" >
         <td align="center" >
          <input type="text" name="date_immun_follow" id="date_immun_follow" size="10" value="<?php echo $dbarr['date_immun_follow']; ?>"  />&nbsp;&nbsp;&nbsp; (Example: 31-12-(พ.ศ.)2500)
        </td>
      </tr>
      <tr bgcolor="#F4F4F4" >

        <td align="left"><br />

        <!-- Rituximab (Mabthara) -->

          <input name="immun_select_follow" id="immun_select_follow1" type="radio" value="Rituximab" <?php if ($dbarr['immun_select_follow'] == "Rituximab") {
    echo "checked";
}
           ?> onClick="onaction();"  />  Rituximab (Mabthara)  

          <br />
          <br />

          <div id="immun_select_follow2_no"></div>
          <div  id="immun_select_follow1_show" class="sublayer-2">
            <table width="500" border="0" cellpadding="0" cellspacing="0" >
              <tr bgcolor="#F4F4F4" >
                <td><br />
                 <input name="immun_select_follow_sub[z-index]" id="rituximab_1" type="checkbox"  value="Induction" <?php if (strlen(strstr($dbarr['immun_other_text'], "Induction")) > 0) {
    echo "checked";
}
?> onClick="onaction();"  />  Induction  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="immun_select_follow_sub[z-index]"  id="rituximab_2" type="checkbox"  value="Maintenance" <?php
if (strlen(strstr($dbarr['immun_other_text'], "Maintenance")) > 0) {
    echo "checked";
}
?> onClick="onaction();" />  Maintenance  <br /><br />
              </td>
            </tr>
          </table>
           <br/>
        </div>


        <!-- Rituximab (Generic) -->

        <input name="immun_select_follow" id="immun_select_follow7" type="radio" value="Rituximab" <?php if ($dbarr['immun_select_follow'] == "Rituximab") {
    echo "checked";
}
?> onClick="onaction();"  />  Rituximab (Generic)  <br /><br />

          <div id="immun_select_follow2_no"></div>
          <div  id="immun_select_follow7_show" class="sublayer-2">
            <table width="500" border="0" cellpadding="0" cellspacing="0" >
              <tr bgcolor="#F4F4F4" >
                <td><br />
                 <input name="immun_select_follow_sub[z-index]" id="rituximab_1" type="checkbox"  value="Induction" <?php if (strlen(strstr($dbarr['immun_other_text'], "Induction")) > 0) {
    echo "checked";
}
?> onClick="onaction();"  />  Induction  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="immun_select_follow_sub[z-index]"  id="rituximab_2" type="checkbox"  value="Maintenance" <?php
if (strlen(strstr($dbarr['immun_other_text'], "Maintenance")) > 0) {
    echo "checked";
}
?> onClick="onaction();" />  Maintenance  <br /><br />
              </td>
            </tr>
          </table>
           <br/>
        </div>


         <!-- Obinutuzumab -->
        
        <input name="immun_select_follow" id="immun_select_follow2" type="radio"  value="Obinutuzumab" <?php if ($dbarr['immun_select_follow'] == "Obinutuzumab") {
    echo "checked";
}
?> onClick="onaction();" />  Obinutuzumab  <br /><br />


          <!-- Brentuximab -->

                <input name="immun_select_follow"  id="immun_select_follow3" type="radio"  value="Brentuximab" <?php if ($dbarr['immun_select_follow'] == "Brentuximab") {
    echo "checked";
}
?> onClick="onaction();" />  Brentuximab  <br /><br />

            <!-- Ibritumomab -->

        <input name="immun_select_follow" id="immun_select_follow4" type="radio" value="Ibritumomab" <?php if ($dbarr['immun_select_follow'] == "Ibritumomab") {
    echo "checked";
}
?> onClick="onaction();"  /> Ibritumomab  <br /><br />


            <!-- Alemtuzumab -->

        <input name="immun_select_follow" id="immun_select_follow5"  type="radio" value="Alemtuzumab" <?php if ($dbarr['immun_select_follow'] == "Alemtuzumab") {
    echo "checked";
}
?> onClick="onaction();" />  Alemtuzumab  <br /><br />


              <!-- Other -->

        <input name="immun_select_follow" id="immun_select_follow6"  type="radio" value="Other" <?php if ($dbarr['immun_select_follow'] == "Other") {
    echo "checked";
}
?> onClick="onaction();" />       Other
        <table id="table_specify" width="500" border="0" cellpadding="0" cellspacing="0">
          <tr bgcolor="#F4F4F4" >
            <td align="left" ><br />
             <strong>   specify  :</strong>  <input name="immun_other_text" id="immun_other_text" type="text"  value="<?php echo $dbarr['immun_other_text']; ?>"  size="30">    <br /><br />
           </td>
         </tr>
       </table>
       <br /><br />
     </td>
   </tr>
 </table>
</div>
<script type="text/javascript">

  $(document).ready(function() {
    $('#immuno_follow_n1_no').hide();
    $('#immuno_follow_n2_yes').hide();
    if($('#immunotherapy_follow_yes').is(':checked')){
        $('#immuno_follow_n2_yes').show();
    }
    $('#immun_select_follow2_no').hide();
    $('#immun_select_follow1_show').hide();
    $('#immun_select_follow7_show').hide();
    if($('#immun_select_follow1').is(':checked')){
      $('#immun_select_follow1_show').show();
      $('#table_specify').hide();
      $('#immun_other_text').val('');
    }
    if($('#immun_select_follow7').is(':checked')){
      $('#immun_select_follow7_show').show();
      $('#table_specify').hide();
      $('#immun_other_text').val('');
    }
  });

  function change_attr(status){
    $('#date_immun_follow').attr("disabled", status);
    $('#immun_select_follow1').attr("disabled", status);
    $('#immun_select_follow2').attr("disabled", status);
    $('#immun_select_follow3').attr("disabled", status);
    $('#immun_select_follow4').attr("disabled", status);
    $('#immun_select_follow5').attr("disabled", status);
    $('#immun_select_follow6').attr("disabled", status);
    $('#immun_other_text').attr("disabled", status);
    $('#rituximab_1').attr("disabled", status);
    $('#rituximab_2').attr("disabled", status);

  }
  function clear_data_immuno(){
   $('#date_immun_follow').val('');
   $('#immun_select_follow1').prop('checked', false);
   $('#immun_select_follow2').prop('checked', false);
   $('#immun_select_follow3').prop('checked', false);
   $('#immun_select_follow4').prop('checked', false);
   $('#immun_select_follow5').prop('checked', false);
   $('#immun_select_follow6').prop('checked', false);
   $('#rituximab_1').prop('checked', false);
   $('#rituximab_2').prop('checked', false);
   $('#immun_other_text').val('');
 }

 $('#immunotherapy_follow_yes').click(function(){
  clear_data_imno();
  $('#immuno_follow_n1_no').hide();
  $('#immuno_follow_n2_yes').show();
  $('#table_specify').hide();
      $('#immun_other_text').val('');
      $('#no_treatment_follow').prop('checked', false);
});

 $('#immunotherapy_follow_no').click(function(){
  clear_data_imno();
  $('#immuno_follow_n2_yes').hide();
  $('#immuno_follow_n1_no').show();
});


 function clear_data_imno(){
  $('#date_immun_follow').val('');
  $('#immun_select_follow1').prop('checked', false);
  $('#immun_select_follow2').prop('checked', false);
  $('#immun_select_follow3').prop('checked', false);
  $('#immun_select_follow4').prop('checked', false);
  $('#immun_select_follow5').prop('checked', false);
  $('#immun_select_follow6').prop('checked', false);
  $('#rituximab_1').prop('checked', false);
  $('#rituximab_2').prop('checked', false);
  $('#immun_other_text').val('');
}

$('#immun_select_follow1').click(function(){
  clear_data_immun_select_follow1();
  $('#immun_select_follow2_no').hide();
  $('#immun_select_follow3_no').hide();
  $('#immun_select_follow4_no').hide();
  $('#immun_select_follow5_no').hide();
  $('#immun_select_follow6_no').hide();
  $('#immun_select_follow1_show').show();
});
$('#immun_select_follow2').click(function(){
  clear_data_immun_select_follow1();
  $('#immun_select_follow1_show').hide();
  $('#immun_select_follow2_no').show();
  $('#table_specify').hide();
  $('#immun_other_text').val('');
});
$('#immun_select_follow3').click(function(){
  clear_data_immun_select_follow1();
  $('#immun_select_follow1_show').hide();
  $('#immun_select_follow2_no').show();
  $('#table_specify').hide();
  $('#immun_other_text').val('');
});
$('#immun_select_follow4').click(function(){
  clear_data_immun_select_follow1();
  $('#immun_select_follow1_show').hide();
  $('#immun_select_follow2_no').show();
  $('#table_specify').hide();
  $('#immun_other_text').val('');
});
$('#immun_select_follow5').click(function(){
clear_data_immun_select_follow1();
  $('#immun_select_follow1_show').hide();
  $('#immun_select_follow2_no').show();
  $('#table_specify').hide();
  $('#immun_other_text').val('');
});
$('#immun_select_follow6').click(function(){
  clear_data_immun_select_follow1();
  clear_data_immun_select_follow1();
  $('#immun_select_follow1_show').hide();
  $('#immun_select_follow2_no').show();
  $('#table_specify').show();
  $('#immun_other_text').val('');

});
$('#immun_select_follow7').click(function(){
  clear_data_immun_select_follow1();
  $('#immun_select_follow1_show').hide();
  $('#immun_select_follow7_show').show();
  $('#table_specify').hide();
  $('#immun_other_text').val('');

});
function clear_data_immun_select_follow1(){
  $('#rituximab_1').prop('checked', false);
  $('#rituximab_2').prop('checked', false);
}
</script>
</th>
</tr>


<tr bgcolor="#F4F4F4" >
	 <th><font color="ff3333">  Radiotherapy </font></th>
 <td align="center" colspan="2"> <br />&nbsp;
  <input name="radiotherapy_follow" id="radiotherapy_follow_yes" onclick="check_getsave()" type="radio" value="Radiotherapy"  <?php if ($dbarr['radiotherapy_follow'] == 'Radiotherapy') {
    echo "checked";
}
?>   onclick="onaction();"  />  Yes &nbsp;&nbsp;&nbsp;
  <input name="radiotherapy_follow" id="radiotherapy_follow_no" onclick="check_getsave()"  type="radio" value="Radiotherapy_no"  <?php if ($dbarr['radiotherapy_follow'] == 'Radiotherapy_no') {
    echo "checked";
}
?>   onclick="onaction();"  />  No
  <br /><br />
  <div id="radio_follow_no" ></div>
  <div id="radio_follow_yes">
   <table width="500" border="0" cellpadding="0" cellspacing="0">
    <tr bgcolor="#F4F4F4" >
      <td align="center"><br /><input type="text" name="date_rad_follow" id="date_rad_follow" size="10" value="<?php echo $dbarr['date_rad_follow']; ?>"  />&nbsp;&nbsp;&nbsp;  (Example: 31-12-(พ.ศ.)2500)<br /><br /></td>
    </tr>
  </table>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#radio_follow_no').hide();
    $('#radio_follow_yes').hide();
    if($('#radiotherapy_follow_yes').is(':checked')){
      $('#radio_follow_yes').show();
    }
  });
  $('#radiotherapy_follow_yes').click(function(){
    clear_data_radio_follow_yes();
    $('#radio_follow_no').hide();
    $('#radio_follow_yes').show();
    $('#no_treatment_follow').prop('checked', false);
  });

  $('#radiotherapy_follow_no').click(function(){
    clear_data_radio_follow_yes();
    $('#radio_follow_yes').hide();
    $('#radio_follow_no').show();
  });

  function clear_data_radio_follow_yes(){
    $('#date_rad_follow').val('');

  }
</script>

</td>
</tr>


<tr bgcolor="#F4F4F4" >
 <th><font color="ff3333">Surgery </font></th>
 <td align="center" ><br />&nbsp;
 
   <input type="radio" name="surgery_follow" onclick="check_getsave()"  id="surgery_follow_yes"  value="yes"  <?php if ($dbarr['surgery_follow'] == "yes") {
    echo "checked";
}
?>  onclick="onaction();"  />  Yes &nbsp;&nbsp;&nbsp;

  <input name="surgery_follow"   onclick="check_getsave()"  id="surgery_follow_no" type="radio" value="no"     <?php if ($dbarr['surgery_follow'] == "no") {
   echo "checked";
}
?>  onclick="onaction();" /> No    <br /><br />
  <div id="surgery_follow_no_detail"></div>
  <div id="surgery_follow_detail" >
   <table width="300" border="0" cellpadding="0" cellspacing="0">
    <tr bgcolor="#F4F4F4" >
     <td align="center" colspan="2"> <br />
       <input type="text" name="date_surgery_follow" id="date_surgery_follow" size="10" value="<?php echo $dbarr['date_surgery_follow']; ?>"  />&nbsp;&nbsp;&nbsp;  (Example: 31-12-(พ.ศ.)2500)
       <br /><br /></td>
     </tr>
   </table>
 </div>
 <script type="text/javascript">
   $(document).ready(function() {
    $('#surgery_follow_no_detail').hide();
    $('#surgery_follow_detail').hide();
    if($('#surgery_follow_yes').is(':checked')){
      $('#surgery_follow_detail').show();
    }
  });
   $('#surgery_follow_yes').click(function(){
    clear_data_surgery_follow();
    $('#surgery_follow_no_detail').hide();
    $('#surgery_follow_detail').show();
    $('#no_treatment_follow').prop('checked', false);
  });

   $('#surgery_follow_no').click(function(){
    clear_data_surgery_follow();
    $('#surgery_follow_detail').hide();
    $('#surgery_follow_no_detail').show();
  });

   function clear_data_surgery_follow(){
    $('#date_surgery_follow').val('');

  }
</script>

</td>
</tr>

<tr bgcolor="#F4F4F4" >
 <th align="center" > <br />
  <font color="ff3333"> No (including observation)</font>
  <br /><br /></th>
  <td align="center"><input name="no_treatment_follow" onClick="check_getsave1()"   id="no_treatment_follow" type="checkbox" value="No (including observation)"  <?php if ($dbarr['no_treatment_follow'] == 'No (including observation)') {
    echo "checked";
}
?> />   No (including observation)
</td>
</tr>

<script type="text/javascript">
  $(document).ready(function() {
    if($('#no_treatment_follow').is(':checked')){
      clear_data_site();
      change_attr(true);
	 
    }else{
      change_attr(false);
	  
    }
  });
  $('#no_treatment_follow').click(function(){
    if($('#no_treatment_follow').is(':checked')){
      clear_data_site();
      change_attr(true);
      $('#chemotherapy_follow_detail').hide();
      $('#chemotherapy_follow_no_detail').show();
      $('#radio_follow_yes').hide();
      $('#radio_follow_no').show();
      $('#surgery_follow_detail').hide();
      $('#surgery_follow_no_detail').show();
      $('#immuno_follow_n2_yes').hide();
      $('#immuno_follow_n1_no').show();
    }else{
      change_attr(false);
    }
  });
  function change_attr(status){
    //$('#chemotherapy_follow_no').prop('checked', status);
   // $('#immunotherapy_follow_no').prop('checked', status);
    //$('#radiotherapy_follow_no').prop('checked', status);
    //$('#surgery_follow_no').prop('checked', status);
    // $('#chemotherapy_follow_yes').attr("disabled", status);
    // $('#chemotherapy_follow_no').attr("disabled", status);
    // $('#immunotherapy_follow_yes').attr("disabled", status);
    // $('#immunotherapy_follow_no').attr("disabled", status);
    // $('#radiotherapy_follow_yes').attr("disabled", status);
    // $('#radiotherapy_follow_no').attr("disabled", status);
    // $('#surgery_follow_yes').attr("disabled", status);
    // $('#surgery_follow_no').attr("disabled", status);
    // $('#date_chemo').attr("disabled", status);
    // $('#chemo_select_follow1').attr("disabled", status);
    // $('#chemo_select_follow2').attr("disabled", status);
    // $('#chemo_select_follow3').attr("disabled", status);
    // $('#chemo_select_follow4').attr("disabled", status);
    // $('#chemo_select_follow5').attr("disabled", status);
    // $('#chemo_select_follow6').attr("disabled", status);
    // $('#chemo_select_follow7').attr("disabled", status);
    // $('#chemo_select_follow8').attr("disabled", status);
    // $('#chemo_select_follow9').attr("disabled", status);
    // $('#chemo_select_follow10').attr("disabled", status);
    // $('#chemo_select_follow11').attr("disabled", status);
    // $('#chemo_select_follow12').attr("disabled", status);
    // $('#chemo_select_follow13').attr("disabled", status);
    // $('#chemo_select_follow14').attr("disabled", status);
    // $('#chemo_select_follow15').attr("disabled", status);
    // $('#chemo_select_follow16').attr("disabled", status);
    // $('#chemo_select_follow17').attr("disabled", status);
    // $('#chemo_select_follow18').attr("disabled", status);
    // $('#chemo_select_follow19').attr("disabled", status);
    // $('#chemo_select_follow20').attr("disabled", status);
    // $('#chemo_select_follow21').attr("disabled", status);
    // $('#chemo_select_follow22').attr("disabled", status);
    // $('#chemo_select_follow23').attr("disabled", status);
    // $('#chemo_select_follow_other').attr("disabled", status);
    // $('#received_follow1').attr("disabled", status);
    // $('#received_follow2').attr("disabled", status);
    // $('#date_immun_follow').attr("disabled", status);
    // $('#immun_select_follow1').attr("disabled", status);
    // $('#immun_select_follow2').attr("disabled", status);
    // $('#immun_select_follow3').attr("disabled", status);
    // $('#immun_select_follow4').attr("disabled", status);
    // $('#immun_select_follow5').attr("disabled", status);
    // $('#immun_select_follow6').attr("disabled", status);
    // $('#rituximab_1').attr("disabled", status);
    // $('#rituximab_2').attr("disabled", status);
    // $('#immun_other_text').attr("disabled", status);
    // $('#date_rad_follow').attr("disabled", status);
    // $('#date_surgery_follow').attr("disabled", status);


  }

  function clear_data_site(){
    $('#chemotherapy_follow_yes').prop('checked', false);
    $('#chemotherapy_follow_no').prop('checked', false);
    $('#immunotherapy_follow_yes').prop('checked', false);
    $('#immunotherapy_follow_no').prop('checked', false);
    $('#radiotherapy_follow_yes').prop('checked', false);
    $('#radiotherapy_follow_no').prop('checked', false);
    $('#surgery_follow_yes').prop('checked', false);
    $('#surgery_follow_no').prop('checked', false);
    $('#date_chemo').val('');
    $('#chemo_select_follow1').prop('checked', false);
    $('#chemo_select_follow2').prop('checked', false);
    $('#chemo_select_follow3').prop('checked', false);
    $('#chemo_select_follow4').prop('checked', false);
    $('#chemo_select_follow5').prop('checked', false);
    $('#chemo_select_follow6').prop('checked', false);
    $('#chemo_select_follow7').prop('checked', false);
    $('#chemo_select_follow8').prop('checked', false);
    $('#chemo_select_follow9').prop('checked', false);
    $('#chemo_select_follow10').prop('checked', false);
    $('#chemo_select_follow11').prop('checked', false);
    $('#chemo_select_follow12').prop('checked', false);
    $('#chemo_select_follow13').prop('checked', false);
    $('#chemo_select_follow14').prop('checked', false);
    $('#chemo_select_follow15').prop('checked', false);
    $('#chemo_select_follow16').prop('checked', false);
    $('#chemo_select_follow17').prop('checked', false);
    $('#chemo_select_follow18').prop('checked', false);
    $('#chemo_select_follow19').prop('checked', false);
    $('#chemo_select_follow20').prop('checked', false);
    $('#chemo_select_follow21').prop('checked', false);
    $('#chemo_select_follow22').prop('checked', false);
    $('#chemo_select_follow23').prop('checked', false);
    $('#chemo_select_follow_other').val('');
    $('#received_follow1').prop('checked', false);
    $('#received_follow2').prop('checked', false);
    $('#date_immun_follow').val('');
    $('#immun_select_follow1').prop('checked', false);
    $('#immun_select_follow2').prop('checked', false);
    $('#immun_select_follow3').prop('checked', false);
    $('#immun_select_follow4').prop('checked', false);
    $('#immun_select_follow5').prop('checked', false);
    $('#immun_select_follow6').prop('checked', false);
    $('#rituximab_1').prop('checked', false);
    $('#rituximab_2').prop('checked', false);
    $('#immun_other_text').val('');
    $('#date_rad_follow').val('');
    $('#date_surgery_follow').val('');


  }
</script>

<tr bgcolor="#F4F4F4" >
  <th align="left" colspan="2"><h4> Clinical Outcome </h4></th>
</tr>
<tr bgcolor="#F4F4F4" >
  <th colspan="2" align="left"><br />
    Result of Initial Treatment    <br /><br />
  </th>
</tr>
<tr bgcolor="#F4F4F4" >
 <td></td>
 <td align="left"><br />
   <input name="result_follow" type="radio" id="result_follow1"  value="Complete response (CR)" <?php if ($dbarr['result_follow'] == "Complete response (CR)") {
    echo "checked";
}
?>  onclick="onaction();"  />Complete response (CR) <br />
  <div id="result_follow_no_cr_complete"></div>
  <div id="result_follow_cr_complete">
   <table width="500" border="0" cellpadding="0" cellspacing="0" >
    <tr bgcolor="#F4F4F4" >
      <td>
        Date of Document CR/CRu   &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="date_cr_complete_follow" id="date_cr_complete_follow" size="10" value="<?php echo $dbarr['date_complete_follow']; ?>"  />&nbsp;&nbsp;&nbsp;   (Example: 31-12-(พ.ศ.)2500)
      </td>
    </tr>
  </table>
</div>
<br />
<input name="result_follow" type="radio" id="result_follow2"  value="Complete response (uncomfirmed) (CRu)"<?php if ($dbarr['result_follow'] == "Complete response (uncomfirmed) (CRu)") {
    echo "checked";
}
?>  onclick="onaction();"  />Complete response (uncomfirmed) (CRu)

<div id="result_follow_no_complete"></div>
<div id="result_follow_complete">
 <table width="500" border="0" cellpadding="0" cellspacing="0" >
  <tr bgcolor="#F4F4F4" >
    <td>
      Date of Document CR/CRu   &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="date_complete_follow" id="date_complete_follow" size="10" value="<?php echo $dbarr['date_complete_follow']; ?>"  />&nbsp;&nbsp;&nbsp;    (Example: 31-12-(พ.ศ.)2500)
    </td>
  </tr>
</table>
</div>
<br /><br />
<input name="result_follow" type="radio" value="Partial response (PR)" id="result_follow3"  <?php if ($dbarr['result_follow'] == 'Partial response (PR)') {
    echo "checked";
}
?>  onclick="onaction();"   />            Partial response (PR)  <br /><br />
<input name="result_follow" type="radio" value="Stable disease (SD)" id="result_follow4" <?php if ($dbarr['result_follow'] == 'Stable disease (SD)') {
    echo "checked";
}
?>  onclick="onaction();"  />                        Stable disease (SD)<br /><br />
<input name="result_follow" type="radio" value="Progressive disease (PD)" id="result_follow5"  <?php if ($dbarr['result_follow'] == 'Progressive disease (PD)') {
    echo "checked";
}
?>  onclick="onaction();"  />
Progressive disease (PD)<br /><br />
<input name="result_follow" type="radio" value="Indeterminate (ID)" id="result_follow6" <?php if ($dbarr['result_follow'] == "Indeterminate (ID)") {
    echo "checked";
	$resu_foll=$dbarr['result_follow'];
}

?>  onclick="onaction();"  />
<input  type="hidden" id="ch_in_id"  value="<?=$resu_foll?>">
Indeterminate (ID)<br /><br />
<div   id='cause'>
  <b>  Cause    </b>        &nbsp;&nbsp;&nbsp;
  <input name="result_cause_follow" id="result_cause_follow1" type="radio" value="Death"  <?php if ($dbarr['result_cause_follow'] == 'Death') {
    echo "checked";
}
?>> Death
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="result_cause_follow" id="result_cause_follow2" type="radio" value="Loss to follow up" <?php if ($dbarr['result_cause_follow'] == 'Loss to follow up') {
    echo "checked";
}
?>> Loss to follow up
</div>

<script type="text/javascript">



  $(document).ready(function() {
    $('#result_follow_no_complete').hide();
    $('#result_follow_complete').hide();
    $('#result_follow_cr_complete').hide();
	
	
	
    $('#cause').hide();
	if($('#ch_in_id').val()=="Indeterminate (ID)"){    $('#cause').show();}
	
    if($('#result_follow1').is(':checked')){
      $('#result_follow_cr_complete').show();
    }
    if($('#result_follow2').is(':checked')){
      $('#result_follow_complete').show();
    }
  });

  $('#result_follow2').click(function(){
    clear_data_result_follow();
    $('#result_follow_no_complete').hide();
    $('#result_follow_cr_complete').hide();
    $('#result_follow_complete').show();
  });

  $('#result_follow1').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#cause').hide();
    $('#result_follow_no_cr_complete').hide();
    $('#result_follow_cr_complete').show();
  });
  $('#result_follow3').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#cause').hide();
    $('#result_follow_cr_complete').hide();
    $('#result_follow_no_complete').show();
  });
  $('#result_follow4').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#cause').hide();
    $('#result_follow_cr_complete').hide();
    $('#result_follow_no_complete').show();
  });
  $('#result_follow5').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#cause').hide();
    $('#result_follow_cr_complete').hide();
    $('#result_follow_no_complete').show();
  });
  $('#result_follow6').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#result_follow_cr_complete').hide();
    $('#cause').show();
  });
  function clear_data_result_follow(){
    $('#date_complete_follow').val('');
    $('#result_cause_follow1').prop('checked', false);
    $('#result_cause_follow2').prop('checked', false);
  }

</script>
</td>
</tr>

<tr bgcolor="#F4F4F4" >
  <th align="left" colspan="2">      <font size="+2" color="#0000FF">          Follow Up                   </font> </th>
</tr>
<tr bgcolor="#F4F4F4" >
  <th align="left"><br />
   <font color="#0000FF">  Progression/relapse  </font>       &nbsp;&nbsp; &nbsp;&nbsp;
 </th>
 <td><br />
   <input name="progression_follow" type="radio" value="Yes"  <?php if ($dbarr['progression_follow'] == 'Yes') {
    echo "checked";
}
?> id="progression_follow_yes"  onclick="onaction();"  />      Yes &nbsp;&nbsp;&nbsp;

  <input name="progression_follow" type="radio" value="No"   <?php if ($dbarr['progression_follow'] == 'No') {
    echo "checked";
}
?> id="progression_follow_no"  onclick="onaction();"  />  No<br /><br />
  <div id="sub_progression_follow_no"></div>
  <div id="sub_progression_follow_yes">
    <input type="text" name="date_progression_follow" id="date_progression_follow" size="10" value="<?php echo $dbarr['date_progression_follow']; ?>"  />&nbsp;&nbsp;&nbsp; (Example: 31-12-(พ.ศ.)2500)  <br /><br />
    <?php /********* */?>
    Histology tranformation
    <input name="histology_follow" id="histology_follow1" type="radio" value="Yes" <?php if ($dbarr['histology_follow'] == 'Yes') {
    echo "checked";
}
?>>  Yes    &nbsp;&nbsp;&nbsp;
    <input name="histology_follow"  id="histology_follow2" type="radio" value="No" <?php if ($dbarr['histology_follow'] == 'No') {
    echo "checked";
}
?>> No &nbsp;&nbsp;&nbsp;
    <input name="histology_follow"  id="histology_follow3" type="radio" value="Unknown" <?php if ($dbarr['histology_follow'] == 'Unknown') {
    echo "checked";
}
?>> Unknown
    <br /><br />
    <b>   Progression/relapse sites (mark all that apply) </b> <br /><br />
    <input name="lymphnode_follow" id="lymphnode_follow" type="checkbox"  value="Lymph node"  <?php if ($dbarr['lymphnode_follow'] == 'Lymph node') {
    echo "checked";
}
?>>         Lymph node   <br /><br />
    <input type="checkbox" name="extranodal_follow" id="extranodal_follow" value="Extranodal sites" <?php if ($dbarr['extranodal_follow'] == 'Extranodal sites') {
    echo "checked";
}
?>    >
    Extranodal sites (mark all that apply)   <br /><br />

    <table width="500" border="0" cellpadding="0" cellspacing="0"  >
      <tr bgcolor="#F4F4F4"  align="left">
        <td width="128"><input type="checkbox" name="extr_1_follow"  id="extr_1_follow" value="Waldeyer's ring" <?php if ($dbarr['extr_1_follow'] == "Waldeyer's ring") {
    echo "checked";
}
?> />           Waldeyer's ring</td>
        <td width="96"><input type="checkbox" name="extr_2_follow"  id="extr_2_follow"  value="Sinonasal" <?php if ($dbarr['extr_2_follow'] == "Sinonasal") {
    echo "checked";
}
?> />Sinonasal</td>
        <td width="99"><input type="checkbox" name="extr_3_follow" id="extr_3_follow" value="Salivary gland"<?php if ($dbarr['extr_3_follow'] == 'Salivary gland') {
    echo "checked";
}
?> />Salivary gland</td>
        <td width="77"><input type="checkbox" name="extr_4_follow" id="extr_4_follow" value="Thyroid"<?php if ($dbarr['extr_4_follow'] == 'Thyroid') {
    echo "checked";
}
?> />Thyroid</td>
      </tr>
      <tr bgcolor="#F4F4F4"  align="left">
        <td><input type="checkbox" name="extr_5_follow" id="extr_5_follow" value="Eye/Ocular adnexa"<?php if ($dbarr['extr_5_follow'] == 'Eye/Ocular adnexa') {
    echo "checked";
}
?> />Eye/Ocular adnexa</td>
        <td><input type="checkbox" name="extr_6_follow" id="extr_6_follow" value="Lung/Pleura"<?php if ($dbarr['extr_6_follow'] == 'Lung/Pleura') {
    echo "checked";
}
?> />Lung/Pleura</td>
        <td><input type="checkbox" name="extr_7_follow" id="extr_7_follow" value="Breast" <?php if ($dbarr['extr_7_follow'] == 'Breast') {
    echo "checked";
}
?> />         Breast</td>
        <td><input type="checkbox" name="extr_8_follow" id="extr_8_follow" value="Stomach" <?php if ($dbarr['extr_8_follow'] == 'Stomach') {
    echo "checked";
}
?> />            Stomach</td>
      </tr>
      <tr bgcolor="#F4F4F4"  align="left">
        <td><input type="checkbox" name="extr_9_follow" id="extr_9_follow"  value="Small intestine" <?php if ($dbarr['extr_9_follow'] == 'Small intestine') {
    echo "checked";
}
?> />            Small intestine</td>
        <td><input type="checkbox" name="extr_10_follow" id="extr_10_follow" value="Testis"<?php if ($dbarr['extr_10_follow'] == 'Testis') {
    echo "checked";
}
?> />            Testis</td>
        <td><input type="checkbox" name="extr_11_follow" id="extr_11_follow" value="Brain/CNS"<?php if ($dbarr['extr_11_follow'] == 'Brain/CNS') {
    echo "checked";
}
?> />         Brain/CNS</td>
        <td><input type="checkbox" name="extr_12_follow" id="extr_12_follow" value="Liver" <?php if ($dbarr['extr_12_follow'] == 'Liver') {
    echo "checked";
}
?> />           Liver</td>
      </tr>
      <tr bgcolor="#F4F4F4"  align="left">
        <td><input type="checkbox" name="extr_13_follow" id="extr_13_follow" value="Large intestine"<?php if ($dbarr['extr_13_follow'] == 'Large intestine') {
    echo "checked";
}
?> />           Large intestine</td>
        <td><input type="checkbox" name="extr_14_follow" id="extr_14_follow" value="Bone" <?php if ($dbarr['extr_14_follow'] == 'Bone') {
    echo "checked";
}
?> />            Bone</td>
        <td><input type="checkbox" name="extr_15_follow" id="extr_15_follow" value="Bone marrow"  <?php if ($dbarr['extr_15_follow'] == 'Bone marrow') {
    echo "checked";
}
?> />            Bone marrow</td>
        <td><input type="checkbox" name="extr_16_follow" id="extr_16_follow" value="Spleen" <?php if ($dbarr['extr_16_follow'] == 'Spleen') {
    echo "checked";
}
?> />          Spleen</td>
      </tr>

      <tr bgcolor="#F4F4F4"  align="left">
        <td><input type="checkbox" name="extr_17_follow" id="extr_17_follow" value="Skin/Subcutaneous"<?php if ($dbarr['extr_17_follow'] == 'Skin/Subcutaneous') {
    echo "checked";
}
?> />        Skin/Subcutaneous</td>
        <td colspan="3">&nbsp;</td>
      </tr>

      <script type="text/javascript">

        $('#extranodal_follow').click(function(){
          if($('#extranodal_follow').is(':checked')){
            ch_attr(false);
          }else{
            ch_attr(true);
            clear_data_extran();
          }
        });
        function ch_attr(status){
          $('#extr_1_follow').attr("disabled", status);
          $('#extr_2_follow').attr("disabled", status);
          $('#extr_3_follow').attr("disabled", status);
          $('#extr_4_follow').attr("disabled", status);
          $('#extr_5_follow').attr("disabled", status);
          $('#extr_6_follow').attr("disabled", status);
          $('#extr_7_follow').attr("disabled", status);
          $('#extr_8_follow').attr("disabled", status);
          $('#extr_9_follow').attr("disabled", status);
          $('#extr_10_follow').attr("disabled", status);
          $('#extr_11_follow').attr("disabled", status);
          $('#extr_12_follow').attr("disabled", status);
          $('#extr_13_follow').attr("disabled", status);
          $('#extr_14_follow').attr("disabled", status);
          $('#extr_15_follow').attr("disabled", status);
          $('#extr_16_follow').attr("disabled", status);
          $('#extr_17_follow').attr("disabled", status);
          $('#extr_other').attr("disabled", status);
          $('#extr_other_text').attr("disabled", status);
        }

        function clear_data_extran(){
          $('#extr_1_follow').prop('checked', false);
          $('#extr_2_follow').prop('checked', false);
          $('#extr_3_follow').prop('checked', false);
          $('#extr_4_follow').prop('checked', false);
          $('#extr_5_follow').prop('checked', false);
          $('#extr_6_follow').prop('checked', false);
          $('#extr_7_follow').prop('checked', false);
          $('#extr_8_follow').prop('checked', false);
          $('#extr_9_follow').prop('checked', false);
          $('#extr_10_follow').prop('checked', false);
          $('#extr_11_follow').prop('checked', false);
          $('#extr_12_follow').prop('checked', false);
          $('#extr_13_follow').prop('checked', false);
          $('#extr_14_follow').prop('checked', false);
          $('#extr_15_follow').prop('checked', false);
          $('#extr_16_follow').prop('checked', false);
          $('#extr_17_follow').prop('checked', false);
          $('#extr_other').prop('checked', false);
          $('#extr_other_text').val('');
        }
      </script>
      <tr bgcolor="#F4F4F4"  align="left">
        <td colspan="4">
          <table width="400" border="0" cellpadding="0" cellspacing="0" >
            <tr bgcolor="#F4F4F4" >
              <td width="60" valign="top"><input type="checkbox" name="extr_other" id="extr_other" value="other"  <?php if ($dbarr['extr_other'] == 'other') {
    echo "checked";
}
?> />
              Others</td>
              <td><textarea name="extr_other_text" cols="40" rows="4"  id="extr_other_text"><?php 
			   if(trim($dbarr['extr_other'] )!=""){
			  echo $dbarr['extr_other_text']; }?></textarea></td>
            </tr>

          </table></td>
        </tr>
      </table>




    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#sub_progression_follow_no').hide();
        $('#sub_progression_follow_yes').hide();
        if($('#progression_follow_yes').is(':checked')){
          $('#sub_progression_follow_yes').show();
        }
      });
      $('#progression_follow_yes').click(function(){
        clear_data();
        $('#sub_progression_follow_no').hide();
        $('#sub_progression_follow_yes').show();
      });

      $('#progression_follow_no').click(function(){
        clear_data();
        $('#sub_progression_follow_yes').hide();
        $('#sub_progression_follow_no').show();
      });

      function clear_data(){
        $('#date_progression_follow').val('');
        $('#histology_follow1').prop('checked', false);
        $('#histology_follow2').prop('checked', false);
        $('#histology_follow3').prop('checked', false);
        $('#lymphnode_follow').prop('checked', false);
        $('#extranodal_follow').prop('checked', false);
        $('#extr_1_follow').prop('checked', false);
        $('#extr_2_follow').prop('checked', false);
        $('#extr_3_follow').prop('checked', false);
        $('#extr_4_follow').prop('checked', false);
        $('#extr_5_follow').prop('checked', false);
        $('#extr_6_follow').prop('checked', false);
        $('#extr_7_follow').prop('checked', false);
        $('#extr_8_follow').prop('checked', false);
        $('#extr_9_follow').prop('checked', false);
        $('#extr_10_follow').prop('checked', false);
        $('#extr_11_follow').prop('checked', false);
        $('#extr_12_follow').prop('checked', false);
        $('#extr_13_follow').prop('checked', false);
        $('#extr_14_follow').prop('checked', false);
        $('#extr_15_follow').prop('checked', false);
        $('#extr_16_follow').prop('checked', false);
        $('#extr_17_follow').prop('checked', false);
        $('#extr_other').prop('checked', false);
        $('#extr_other_text').val('');

      }
    </script>
  </td>
</tr>

<tr bgcolor="#F4F4F4" >

 <tr bgcolor="#F4F4F4" >
  <th align="left" >
    <strong><font color="#990033" size="+1">Salvage treatment </font><span style="padding-left:25px;">        <br /> <font color="#990033">  Salvage regimen (mark all that apply)          </font></th>
      <td> <br />
        <input name="salvage_follow" type="radio" value="Yes" <?php if ($dbarr['salvage_follow'] == "Yes") {
    echo "checked";
}
?>  id="salvage_follow_yes"  onclick="onaction();"  />Yes  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="salvage_follow" type="radio" value="No" <?php if ($dbarr['salvage_follow'] == "No") {
    echo " checked";
}
?> id="salvage_follow_no"   onclick="onaction();"  />No</span></strong>  <br /><br />
        <div id="salvage_follow_no_detail"></div>

        <div id="salvage_follow_detail">
          <font color="#990033">    <b>   Chemotherapy   </b>  </font> <br /><br />
          <input name="chemo_follow_1" type="checkbox" value="DHAP" id="chemo_follow_1" <?php if ($dbarr['chemo_follow_1'] == "DHAP") {
    echo "checked";
}
?> />   DHAP  &nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_2" type="checkbox" value="ESHAP" id="chemo_follow_2" <?php if ($dbarr['chemo_follow_2'] == "ESHAP") {
    echo "checked";
}
?> />  ESHAP &nbsp;
          <input name="chemo_follow_3" type="checkbox"  value="MINE" id="chemo_follow_3" <?php if ($dbarr['chemo_follow_3'] == 'MINE') {
    echo "checked";
}
?>>MINE  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_4" type="checkbox"  value="IMVP-16"id="chemo_follow_4" <?php if ($dbarr['chemo_follow_4'] == 'IMVP-16') {
    echo "checked";
}
?>>  IMVP-16  &nbsp;&nbsp;
          <input name="chemo_follow_5" type="checkbox"  value="ICE" id="chemo_follow_5"<?php if ($dbarr['chemo_follow_5'] == 'ICE') {
    echo "checked";
}
?>>ICE  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_6" type="checkbox" value="Gemcitabine-regimen" id="chemo_follow_6"<?php if ($dbarr['chemo_follow_6'] == 'Gemcitabine-regimen') {
    echo "checked";
}
?>>Gemcitabine-regimen  <br /><br />
          <input name="chemo_follow_7" type="checkbox"  value="Ch+/-P"id="chemo_follow_7"<?php if ($dbarr['chemo_follow_7'] == 'Ch+/-P') {
    echo "checked";
}
?>>Ch+/-P  &nbsp;&nbsp;
          <input name="chemo_follow_8" type="checkbox" value="CP" id="chemo_follow_8"<?php if ($dbarr['chemo_follow_8'] == 'CP') {
    echo "checked";
}
?>>CP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_9" type="checkbox" value="CVP (COP)" id="chemo_follow_9"<?php if ($dbarr['chemo_follow_9'] == 'CVP (COP)') {
    echo "checked";
}
?>>CVP (COP) &nbsp;&nbsp;
          <input name="chemo_follow_10" type="checkbox"value="CHOP-14"id="chemo_follow_10"<?php if ($dbarr['chemo_follow_10'] == 'CHOP-14') {
    echo "checked";
}
?>> CHOP-14&nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_11" type="checkbox" value="CHOP-21" id="chemo_follow_11"<?php if ($dbarr['chemo_follow_11'] == 'CHOP-21') {
    echo "checked";
}
?>>CHOP-21&nbsp;
          <input name="chemo_follow_12" type="checkbox"  value="CHOEP" id="chemo_follow_12"<?php if ($dbarr['chemo_follow_12'] == 'CHOEP') {
    echo "checked";
}
?>>CHOEP  <br /><Br />
          <input name="chemo_follow_13" type="checkbox" value="CNOP" id="chemo_follow_13"<?php if ($dbarr['chemo_follow_13'] == 'CNOP') {
    echo "checked";
}
?>> CNOP  &nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_14" type="checkbox" value="EPOCH" id="chemo_follow_14"<?php if ($dbarr['chemo_follow_14'] == 'EPOCH') {
    echo "checked";
}
?>>EPOCH  &nbsp;
          <input name="chemo_follow_15" type="checkbox"  value="CHOP-ESHAP" id="chemo_follow_15"<?php if ($dbarr['chemo_follow_15'] == 'CHOP-ESHAP') {
    echo "checked";
}
?>>CHOP-ESHAP
          <input name="chemo_follow_16" type="checkbox" value="HyperCVAD" id="chemo_follow_16"<?php if ($dbarr['chemo_follow_16'] == 'HyperCVAD') {
    echo "checked";
}
?>> HyperCVAD
          <input name="chemo_follow_17" type="checkbox"  value="F" id="chemo_follow_17"<?php if ($dbarr['chemo_follow_17'] == 'F') {
    echo "checked";
}
?>>F &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_18" type="checkbox" value="FC" id="chemo_follow_18"<?php if ($dbarr['chemo_follow_18'] == 'FC') {
    echo "checked";
}
?>>FC  <br /><br />
          <input name="chemo_follow_19" type="checkbox"  value="FN+/-D" id="chemo_follow_19"<?php if ($dbarr['chemo_follow_19'] == 'FN+/-D') {
    echo "checked";
}
?>>FN+/-D  &nbsp;&nbsp;
          <input name="chemo_follow_20" type="checkbox"value="FCM" id="chemo_follow_20"<?php if ($dbarr['chemo_follow_20'] == 'FCM') {
    echo "checked";
}
?>> FCM &nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_21" type="checkbox" value="COPP"id="chemo_follow_21" <?php if ($dbarr['chemo_follow_21'] == 'COPP') {
    echo "checked";
}
?>>COPP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_22" type="checkbox" value="ABV"id="chemo_follow_22"<?php if ($dbarr['chemo_follow_22'] == 'ABV') {
    echo "checked";
}
?>>ABV  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="chemo_follow_23" type="checkbox" value="COPP-ABV" id="chemo_follow_23"<?php if ($dbarr['chemo_follow_23'] == 'COPP-ABV') {
    echo "checked";
}
?>>COPP-ABV
          <input name="chemo_follow_24" type="checkbox" value="ABVD" id="chemo_follow_24"<?php if ($dbarr['chemo_follow_24'] == 'ABVD') {
    echo "checked";
}
?>> ABVD  <br /><br />
          <input name="chemo_follow_25" type="checkbox" value="BEACOPP" id="chemo_follow_25"<?php if ($dbarr['chemo_follow_25'] == 'BEACOPP') {
    echo "checked";
}
?>>BEACOPP
          <input name="chemo_follow_26" type="checkbox"  value="CODOX-M" id="chemo_follow_26"<?php if ($dbarr['chemo_follow_26'] == 'CODOX-M') {
    echo "checked";
}
?>>CODOX-M
          <input name="chemo_follow_27" type="checkbox"  value="CODOX-M/IVAC"id="chemo_follow_27"<?php if ($dbarr['chemo_follow_27'] == 'CODOX-M/IVAC') {
    echo "checked";
}
?>>CODOX-M/IVAC
          <input name="chemo_follow_28" type="checkbox" value="ABVD" id="chemo_follow_28"<?php if ($dbarr['chemo_follow_28'] == 'ABVD') {
    echo "checked";
}
?>>ALL regimen  <br /><Br />
          <input name="chemo_follow_28_1" type="checkbox" value="Bendamustine" id="chemo_follow_28_1"<?php if ($dbarr['chemo_follow_28_1'] == 'Bendamustine') {
    echo "checked";
}
?>>Bendamustine
          <input name="chemo_follow_28_2" type="checkbox" value="Ibrutinib" id="chemo_follow_28_2"<?php if ($dbarr['chemo_follow_28_2'] == 'Ibrutinib') {
    echo "checked";
}
?>>Ibrutinib <br /><br />
          <input name="chemo_follow_29" type="checkbox"  value="Other" id="chemo_follow_29"<?php if ($dbarr['chemo_follow_29'] == 'Other') {
    echo "checked";
}
?>>Others<br />
          <textarea name="chemo_other_follow_29" cols="40" rows="4"  id="chemo_other_follow_29" ><?php 
		  if(trim($dbarr['chemo_follow_29'] )!=""){
		  echo $dbarr['chemo_other_follow_29'];} ?></textarea> <br />
      
          **  Please input ( , comma) in text.<br>

          <br /><br />
          <b><font color="#990033"> Immunotherapy</font></b> &nbsp;&nbsp;
          <input name="immunotherapy_follow1" type="radio" value="Yes"<?php $imf1 =  0;
		   if ($dbarr['immunotherapy_follow1'] == 'Yes') {
		  $imf1=1;
    echo "checked";
}
?> id="sub_immunotherapy_follow_yes"    />Yes  &nbsp;&nbsp;&nbsp;
          <input name="immunotherapy_follow1" type="radio" value="No"<?php if ($dbarr['immunotherapy_follow1'] == 'No') {
		  $imf1=2;
    echo "checked";
}
?> id="sub_immunotherapy_follow_no"   />No</span></strong>  <br /><br />
          <div id="sub_immunotherapy_no_detail"></div>
          <div id="sub_immunotherapy_detail">
           <input name="sal_immun_1" id="sal_immun_1" type="checkbox" value="Rituximab"  <?php if ($dbarr['sal_immun_1'] == 'Rituximab' && $imf1==1) {
    echo "checked";
}
?> />          Rituximab  &nbsp;&nbsp;
          <input name="sal_immun_2" id="sal_immun_2" type="checkbox" value="Ibritumomab" <?php if ($dbarr['sal_immun_2'] == 'Ibritumomab'   && $imf1==1) {
    echo "checked";
}
?>  />          Ibritumomab  &nbsp;&nbsp;
          <input name="sal_immun_3" id="sal_immun_3" type="checkbox" value="Alemtuzumab" <?php if ($dbarr['sal_immun_3'] == 'Alemtuzumab'  &&  $imf1==1) {
    echo "checked";
}
?> />          Alemtuzumab  &nbsp;&nbsp;
          <input name="sal_immun_3_1" id="sal_immun_3_1" type="checkbox" value="Obinutuzumab" <?php if ($dbarr['sal_immun_3_1'] == 'Obinutuzumab'  &&  $imf1==1) {
    echo "checked";
}
?>  >    Obinutuzumab &nbsp;&nbsp;
          <br><input name="sal_immun_3_2" id="sal_immun_3_2" type="checkbox" value="Brentuximab" <?php if ($dbarr['sal_immun_3_2'] == 'Brentuximab'  &&  $imf1==1) {
    echo "checked";
}
?>  >    Brentuximab &nbsp;&nbsp;
          <br /><Br />

          <input name="sal_immun_4" id="sal_immun_4" type="checkbox" value="Other" <?php if ($dbarr['sal_immun_4'] == 'Other'  && $imf1==1) {
    echo "checked";
}
?>  >
          Other :&nbsp;&nbsp;
          <input name="sal_immun_4_text" id="sal_immun_4_text" type="text" size="20"  value="<?php 
		  if(trim($dbarr['sal_immun_4'])!=""){
		  echo $dbarr['sal_immun_4_text']; 
		  }?>">   <br /><br />
        </div>

        <input name="sal_radio_follow" type="checkbox"  value="Radiotherapy" <?php if ($dbarr['sal_radio_follow'] == 'Radiotherapy') {
    echo "checked";
}
?> id="sal_radio_follow" /> <b><font color="#990033"> Radiotherapy</font></b><br /><br />
        <input name="sal_surgery_follow" type="checkbox"  value="Surgery" <?php if ($dbarr['sal_surgery_follow'] == 'Surgery') {
    echo "checked";
}
?> id="sal_surgery_follow" />
        <b><font color="#990033">      Surgery</font></b><br /><br />

      </td>
    </tr>

  </div>
  <script type="text/javascript">

   $(document).ready(function() {
     $('#salvage_follow_no_detail').hide();
     $('#salvage_follow_detail').hide();

     if($('#salvage_hfollow_yes').is(':checked')){
      $('#salvage_follow_detail').show();
    }
  });
   $('#salvage_follow_yes').click(function(){
    clear_data_salvage();
    $('#salvage_follow_no_detail').hide();
    $('#salvage_follow_detail').show();
  });

   $('#salvage_follow_no').click(function(){
    clear_data_salvage();
    $('#salvage_follow_detail').hide();
    $('#salvage_follow_no_detail').show();
  });

   function clear_data_salvage(){
     $('#chemo_follow_1').prop('checked', false);
     $('#chemo_follow_2').prop('checked', false);
     $('#chemo_follow_3').prop('checked', false);
     $('#chemo_follow_4').prop('checked', false);
     $('#chemo_follow_5').prop('checked', false);
     $('#chemo_follow_6').prop('checked', false);
     $('#chemo_follow_7').prop('checked', false);
     $('#chemo_follow_8').prop('checked', false);
     $('#chemo_follow_9').prop('checked', false);
     $('#chemo_follow_10').prop('checked', false);
     $('#chemo_follow_11').prop('checked', false);
     $('#chemo_follow_12').prop('checked', false);
     $('#chemo_follow_13').prop('checked', false);
     $('#chemo_follow_14').prop('checked', false);
     $('#chemo_follow_15').prop('checked', false);
     $('#chemo_follow_16').prop('checked', false);
     $('#chemo_follow_17').prop('checked', false);
     $('#chemo_follow_18').prop('checked', false);
     $('#chemo_follow_19').prop('checked', false);
     $('#chemo_follow_20').prop('checked', false);
     $('#chemo_follow_21').prop('checked', false);
     $('#chemo_follow_22').prop('checked', false);
     $('#chemo_follow_23').prop('checked', false);
     $('#chemo_follow_24').prop('checked', false);
     $('#chemo_follow_25').prop('checked', false);
     $('#chemo_follow_26').prop('checked', false);
     $('#chemo_follow_27').prop('checked', false);
     $('#chemo_follow_28').prop('checked', false);
     $('#chemo_follow_29').prop('checked', false);
     $('#chemo_other_follow_29').val('');
     $('#sub_immunotherapy_follow_yes').prop('checked', false);
     $('#sub_immunotherapy_follow_no').prop('checked', false);
     $('#sal_immun_1').prop('checked', false);
     $('#sal_immun_2').prop('checked', false);
     $('#sal_immun_3').prop('checked', false);
     $('#sal_immun_4').prop('checked', false);
     $('#sal_immun_4_text').val('');
     $('#sal_radio_follow').prop('checked', false);
     $('#sal_surgery_follow').prop('checked', false);

   }
 </script>
 <?php //*****************************?>
 <script type="text/javascript">
   $(document).ready(function() {
     $('#sub_immunotherapy_no_detail').hide();
     $('#sub_immunotherapy_detail').hide();

     if($('#sub_immunotherapy_follow_yes').is(':checked')){
      $('#sub_immunotherapy_detail').show();

    }
  });
   $('#sub_immunotherapy_follow_yes').click(function(){
    clear_data_immun();
    $('#sub_immunotherapy_no_detail').hide();
    $('#sub_immunotherapy_detail').show();
  });

   $('#sub_immunotherapy_follow_no').click(function(){
    clear_data_immun();
    $('#sub_immunotherapy_detail').hide();
    $('#sub_immunotherapy_no_detail').show();
  });

   function clear_data_immun(){
    $('#sal_immun_1').prop('checked', false);
    $('#sal_immun_2').prop('checked', false);
    $('#sal_immun_3').prop('checked', false);
    $('#sal_immun_4').prop('checked', false);
    $('#sal_immun_4_text').val('');
  }
</script>

<tr bgcolor="#F4F4F4" >
  <th align="left">Stem cell transplant  :</th>
  <td>      <br />
    <input name="stem_cell_follow"  id="stem_cell_follow_yes" type="radio" value="Yes" <?php if ($dbarr['stem_cell_follow'] == 'Yes') {
    echo "checked";
}
?>  onclick="onaction();"   />  Yes    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <input name="stem_cell_follow" id="stem_cell_follow_no" type="radio" value="No"  <?php if ($dbarr['stem_cell_follow'] == 'No') {
    echo "checked";
}
?>  onclick="onaction();"  >  No  <br /><br />
    <div id="stem_cell_follow_no_detail"></div>
    <div id="stem_cell_follow_detail">
     <input type="text" name="date_stem_cell_follow" id="date_stem_cell_follow" size="10" value="<?php echo $dbarr['date_stem_cell_follow']; ?>"  />&nbsp;&nbsp;&nbsp;  (Example: 31-12-(พ.ศ.)2500) &nbsp;&nbsp;&nbsp;&nbsp;
     <br /><br />
     <input name="stem_cell_method" type="radio" id="stem_cell_method_autologous" value="Autologous" <?php if ($dbarr['stem_cell_method'] == "Autologous") {
    echo "checked";
}
?> >        Autologous   <br /><br />
    <input name="stem_cell_method" type="radio" id="stem_cell_method_allogeneic" value="Allogeneic" <?php if ($dbarr['stem_cell_method'] == "Allogeneic") {
    echo "checked";
}
?>   />        Allogeneic
    <div id="stem_cell_method_autologous_detail"></div>
    <div id="stem_cell_method_allogeneic_detail">
      <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F4F4F4" >
          <td>
           <strong>   Conditioning  </strong>  <br /><br />
           <input name="conditioning" type="radio" id="conditioning1" value="Myeloablative"<?php if ($dbarr['conditioning'] == 'Myeloablative') {
    echo "checked";
}
?>>
          Myeloablative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="conditioning" type="radio"  id="conditioning2" value="Non-myeloablative" <?php if ($dbarr['conditioning'] == 'Non-myeloablative') {
    echo "checked";
}
?>>
          Non-myeloablative             <br /><Br />

          <b> Donor</b>  <br /><br />
          <input name="donor_follow" type="radio"  id="donor_follow1" value="HLA identical sibling" <?php if ($dbarr['donor_follow'] == 'HLA identical sibling') {
    echo "checked";
}
?> > HLA identical sibling <br /><br />
          <input name="donor_follow" type="radio"  id="donor_follow2" value=" Matched unrelated donor" <?php if ($dbarr['donor_follow'] == ' Matched unrelated donor') {
    echo "checked";
}
?> >  Matched unrelated donor  <br /><br />
          <input name="donor_follow" type="radio"  id="donor_follow3" value="Haploidentical sibling" <?php if ($dbarr['donor_follow'] == 'Haploidentical sibling') {
    echo "checked";
}
?> > Haploidentical sibling  <br /><br />
          <input name="donor_follow" type="radio"  id="donor_follow4" value="Other" <?php if ($dbarr['donor'] == 'Other') {
    echo "checked";
}
?> > Other  <br /><br />
          <table width="500" border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#F4F4F4" >
              <td>
                <input type="text" name="donor_follow_other" id="donor_follow_other" value="<?php echo $dbarr['donor_follow_other']; ?>" size="50"  />
              </td>
            </tr>
          </table>

        </td>
      </tr>
    </table>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#stem_cell_method_autologous_detail').hide();
      $('#stem_cell_method_allogeneic_detail').hide();
      if($('#stem_cell_method_allogeneic').is(':checked')){
        $('#stem_cell_method_allogeneic_detail').show();
      }
    });
    $('#stem_cell_method_autologous').click(function(){
      clear_data_auto();
      $('#stem_cell_method_allogeneic_detail').hide();
      $('#stem_cell_method_autologous_detail').show();
    });

    $('#stem_cell_method_allogeneic').click(function(){
      clear_data_auto();
      $('#stem_cell_method_autologous_detail').hide();
      $('#stem_cell_method_allogeneic_detail').show();
    });

    function clear_data_auto(){
      $('#conditioning1').prop('checked', false);
      $('#conditioning2').prop('checked', false);
      $('#donor_follow1').prop('checked', false);
      $('#donor_follow2').prop('checked', false);
      $('#donor_follow3').prop('checked', false);
      $('#donor_follow4').prop('checked', false);
      $('#donor_follow_other').val('');
    }
  </script>



  <br /><br />
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#stem_cell_follow_no_detail').hide();
    $('#stem_cell_follow_detail').hide();
    if($('#stem_cell_follow_yes').is(':checked')){
      $('#stem_cell_follow_detail').show();
    }
  });
  $('#stem_cell_follow_yes').click(function(){
    clear_data_cell();
    $('#stem_cell_follow_no_detail').hide();
    $('#stem_cell_follow_detail').show();
  });

  $('#stem_cell_follow_no').click(function(){
    clear_data_cell();
    $('#stem_cell_follow_detail').hide();
    $('#stem_cell_follow_no_detail').show();
  });

  function clear_data_cell(){
    $('#date_stem_cell_follow').val('');
    $('#stem_cell_method_autologous').prop('checked', false);
    $('#stem_cell_method_allogeneic').prop('checked', false);

  }
</script>

</td>
</tr>

<tr bgcolor="#F4F4F4" >
  <th align="left"><br />Date of last Contact :<br /><br /></th>
  <td align="left"><br />
    <input type="text" name="date_last_contact_follow" id="date_last_contact_follow" size="10" value="<?php echo $dbarr['date_last_contact_follow']; ?>" onKeyUp="onaction();"  />&nbsp;&nbsp;&nbsp;    (Example: 31-12-(พ.ศ.)2500) <br /><br />

    <input name="status_follow" type="radio" value="Alive" id="status_follow_alive"  <?php if ($dbarr['status_follow'] == 'Alive') {
    echo "checked";
}
?>  onclick="onaction();"   />   Alive
    <div id="alive">
      <table width="300" border="0" cellpadding="0" cellspacing="0" >
        <tr bgcolor="#F4F4F4" >
          <td>
           <input name="alive_status" id="alive_status1" type="radio" value="Remission"   <?php if ($dbarr['alive_status'] == 'Remission') {
    echo "checked";
}
?>  />    Remission  &nbsp;&nbsp;&nbsp;
          <input name="alive_status"  id="alive_status2" type="radio" value="No remission"  <?php if ($dbarr['alive_status'] == 'No remission') {
    echo "checked";
}
?> />  No remission
        </td>
      </tr>
    </table>
  </div>
  <br /><br />
  <input name="status_follow" type="radio" value="Dead" id="status_follow_dead" <?php if ($dbarr['status_follow'] == 'Dead') {
    echo "checked";
}
?> onClick="onaction();"  />  Dead
  <div id="dead">
   <table width="500" border="0" cellpadding="0" cellspacing="0" >
    <tr bgcolor="#F4F4F4" >
      <td>
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr bgcolor="#F4F4F4" >
            <td colspan="3" ><b>Date of death </b>
              <input type="text" name="date_dead_follow" id="date_date_follow" size="10" value="<?php echo $dbarr['date_dead_follow']; ?>"  />&nbsp;&nbsp;&nbsp;    (Example: 31-12-(พ.ศ.)2500)
            </td>
          </tr>

          <tr bgcolor="#F4F4F4" >
            <td align="left" colspan="3" ><b>Cause of Death</b> </td>
          </tr>
          <tr bgcolor="#F4F4F4" >
            <td width="33%" align="left" >
              <input name="cause_of_dead" id="cause_of_dead1" type="radio" value="Infection"<?php if ($dbarr['cause_of_dead'] == 'Infection') {
    echo "checked";
}
?> >         Infection</td>
              <td width="33%" align="left" >
                <input name="cause_of_dead" id="cause_of_dead2" type="radio" value="Progression"<?php if ($dbarr['cause_of_dead'] == 'Progression') {
    echo "checked";
}
?> >        Progression</td>
                <td align="left">
                  <input name="cause_of_dead" id="cause_of_dead3" type="radio" value="Hemorrhage"<?php if ($dbarr['cause_of_dead'] == 'Hemorrhage') {
    echo "checked";
}
?> >           Hemorrhage</td>
                </tr>
                <tr bgcolor="#F4F4F4" >
                 <td colspan="3"  align="left">
                   <table width="400" border="0" cellpadding="0" cellspacing="0" >
                    <tr bgcolor="#F4F4F4" >
                      <td width="60" valign="top" align="left">
                       <input name="cause_of_dead" id="cause_of_dead4"  type="radio" value="Other" <?php if ($dbarr['cause_of_dead'] == 'Other') {
    echo "checked";
}
?>>    Other</td>
                      <td><input name="cause_of_dead_other" id="cause_of_dead_other" type="text"  size="40" value="<?php 
				
					  echo $dbarr['cause_of_dead_other']; 
					  
					  
					  ?>" ></td>
                    </tr>
                  </table>            </td>
                </tr>
                <tr bgcolor="#F4F4F4" >
                 <td colspan="3"  align="left"><b>Lymphoma status at time of  death </b></td>
               </tr>
               <tr bgcolor="#F4F4F4" >
                <td align="left">
                  <input name="lymphoma_status" id="lymphoma_status1" type="radio" value="Remission" <?php if ($dbarr['lymphoma_status'] == 'Remission') {
    echo "checked";
}
?> >            Remission</td>
                  <td align="left">
                    <input name="lymphoma_status" id="lymphoma_status2" type="radio" value="No remission"<?php if ($dbarr['lymphoma_status'] == 'No remission') {
    echo "checked";
}
?> >            No remission</td>
                    <td  align="left">
                      <input name="lymphoma_status"  id="lymphoma_status3" type="radio" value="Indeterminate" <?php if ($dbarr['lymphoma_status'] == 'Indeterminate') {
    echo "checked";
}
?> >           Indeterminate</td>
                    </tr>
                  </table>

                </td>
              </tr>
            </table>
          </div>
          <br /><br />

          <input name="status_follow" type="radio" id="status_follow3" value="Loss to follow-up" <?php if ($dbarr['status_follow'] == "Loss to follow-up") {
    echo "checked";
}
?> onClick="onaction();"  />    Loss to follow-up
          <div id="loss_contact"></div>
          <br /><br />

          <script type="text/javascript">
            $(document).ready(function() {
              $('#alive').hide();
              $('#dead').hide();
              $('#loss_contact').hide();
              if($('#status_follow_alive').is(':checked')){
                $('#alive').show();
              }
              if($('#status_follow_dead').is(':checked')){
                $('#dead').show();
              }

            });
            $('#status_follow_alive').click(function(){
              clear_data_contacty();
              $('#dead').hide();
              $('#loss_contact').hide();
              $('#alive').show();
            });

            $('#status_follow_dead').click(function(){
              clear_data_contacty();
              $('#alive').hide();
              $('#loss_contact').hide();
              $('#dead').show();
            });
            $('#status_follow3').click(function(){
              clear_data_contacty();
              $('#alive').hide();
              $('#dead').hide();
              $('#loss_contact').show();
            });

            function clear_data_contacty(){
              $('#alive_status1').prop('checked', false);
              $('#alive_status2').prop('checked', false);
              $('#date_date_follow').val('');
              $('#cause_of_dead1').prop('checked', false);
              $('#cause_of_dead2').prop('checked', false);
              $('#cause_of_dead3').prop('checked', false);
              $('#cause_of_dead4').prop('checked', false);
              $('#cause_of_dead_other').val('');

              $('#lymphoma_status1').prop('checked', false);
              $('#lymphoma_status2').prop('checked', false);
              $('#lymphoma_status3').prop('checked', false);
            }
          </script>



        </td>
      </tr>

      <tr bgcolor="#F4F4F4" >
        <th colspan="4" align="center">
          <br /><br />
          <input name="id" type="hidden" id="id" value="<?php echo $dbarr['id']; ?>">
          <button  type="submit" id="save"   value="save" style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;" >Save</button>   &nbsp;&nbsp;&nbsp;&nbsp;
          <button  type="submit" id="drafts" name="drafts" value="Update Data"  style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;" />Save drafts</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="Submit2" type="button" class="button" value="Cancel" onClick="window.history.back();" style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;">&nbsp;&nbsp;&nbsp;&nbsp;<br />
<br>
<font color="red">
* กรณีทำการ Save ข้อมูลปกติจำเป็นจะต้องกรอกข้อมูลให้ครบทุกช่องค่ะ !  (ที่เป็นสีแดง)</font><br><br>
        </td>
      </tr>

    </table>

    <script type="text/javascript">

      $(document).ready(function() {
       // document.getElementById('save').disabled = verify_input();
      });

      function onaction(){
        //document.getElementById('save').disabled = verify_input();
      }
      function verify_input(){
        console.log(check_input_text()|| ! check_radio() || !checkimmun_select_follow1());
        // console.log(($('#result_follow1:checked').val() || $('#result_follow2:checked').val() ||
      // $('#result_follow3:checked').val() || $('#result_follow4:checked').val() ||
      // $('#result_follow5:checked').val() || $('#result_follow6:checked').val()));
       return  check_input_text()|| ! check_radio() || !checkimmun_select_follow1();
     }
     function check_input_text(){
      return document.getElementById('date_last_contact_follow').value==""
      ;
    }

    function check_radio(){
      return ($('#chemotherapy_follow_yes:checked').val() || $('#chemotherapy_follow_no:checked').val()) &&
      ($('#immunotherapy_follow_yes:checked').val()|| $('#immunotherapy_follow_no:checked').val()) &&
      ($('#radiotherapy_follow_yes:checked').val() || $('#radiotherapy_follow_no:checked').val()) &&
      ($('#surgery_follow_yes:checked').val() || $('#surgery_follow_no:checked').val()) &&
      ($('#result_follow1:checked').val() || $('#result_follow2:checked').val() ||$('#result_follow3:checked').val() || $('#result_follow4:checked').val() || $('#result_follow5:checked').val() || $('#result_follow6:checked').val()) &&
      ($('#progression_follow_yes:checked').val() || $('#progression_follow_no:checked').val()) &&
      ($('#salvage_follow_yes:checked').val() || $('#salvage_follow_no:checked').val()) &&
      ($('#stem_cell_follow_yes:checked').val() || $('#stem_cell_follow_no:checked').val()) &&
      ($('#status_follow_alive:checked').val() || $('#status_follow_dead:checked').val() || $('#status_follow3:checked').val());
    }
  function checkimmun_select_follow1(){
    if($('#immun_select_follow1').is(':checked')){
      return $('#rituximab_1').is(':checked') ||  $('#rituximab_2').is(':checked') ;
    }
    return true;
  }
        //-->
      </script>



    </form>

  </center>
</p>
</div>

<!-- sidebar -->

<div class="x"></div>
<div class="break"></div>

</div>
<script>
check_getsave();
</script>

<?php include "modules/index/footer.php";?>
</body>