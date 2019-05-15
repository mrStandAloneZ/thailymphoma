<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$centre= $dbarr["centre"];
?>
<? include "modules/index/header.php" ; ?>
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
//$login_true=$_SESSION['login_true'];
$result = mysql_query("select * from ".TB_ADD_DATA." where id='$id' order by id DESC") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;    			
?>
<?    //   code ปฏิทินภาษาไทย  แปลง คศ เป็น พศ เป็นการเรียกไฟล์มาใช้งาน                		?>
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
<!-- main content -->
			<div id="center">
				<h1>Follow Up Data</h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=follow_registry_update" method="post" onSubmit="return check();"  enctype="multipart/form-data">
           		<table width="100%" border="0" align="center">
                <tr>
                <th colspan="4"><br /><h1>Identification and Baseline Data</h1></th>
                </tr>
                 <tr>
                    <th align="left" width="33%"><strong>Centre : </strong></th>
                       <th align="left" width="22%"><strong><input  name="centre"  value="<? echo $dbarr[centre];?>"  size="10"  readonly="readonly"/> </strong></th>
                    <th align="left" width="17%"><strong>Subject : </strong></th>
                    <td width="28%" align="left"><strong><input type="text" name="subject"  size="5" value="<? echo "$dbarr[subject]" ; ?>" readonly /></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Patient Initials :</th>
                    <td align="left" colspan="3"> <input type="text" name="patient_initials" size="10"   value="<? echo "$dbarr[patient_initials]" ; ?>" maxlength="2" readonly="readonly" />     </td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Gender : </th>
                    <td align="left" colspan="3"> <br />
                      <input type="text"   name="sex" size="10" value="<? echo "$dbarr[sex]"; ?>"  readonly="readonly" >  <br /><br />
                     </td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Date of birth : </th>
                    <td align="left" colspan="3"> <br />
                 <input type="text" size="10"  name="date_of_birth" value="<? echo "$dbarr[date_of_birth]"; ?>" maxlength="10"  readonly="readonly" >              (dd/mm/2500)<br /><br />
                     </td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Date of biopsy :  </th>
                    <td align="left" colspan="3"> <br />
                <input type="text" name="date_bio_report"   value="<? echo "$dbarr[date_bio_report]"; ?>"  size="10" readonly="readonly"/><br /><br />
                     </td>
                  </tr>
                     <tr>
                    <th align="left" width="33%">Date of record start:   </th>
                    <td align="left" colspan="3"> <br />
               			<input type="text" name="date_of_record" size="10"  value="<? echo "$dbarr[date_of_record]"; ?>" readonly="readonly"/><br /><br />   
                     </td>
                  </tr>
                  
                  
                  
                   </table>		
                  	<table width="100%" border="0" align="center">
                  <tr>
                  <th align="center" colspan="2"><br /><h1>Follow Up Data </h1><br /></th>
                  </tr>
                <tr>
                <th width="44%" align="left">Date of record Follow up :</th>
                	<td width="56%" align="left">    <br />    
                  			<input type="text" name="date_record_follow" id="date_follow_up" size="10" value="<? echo "$dbarr[date_record_follow]"; ?>"  />	 <br /><br />
                    </td>
                </tr>
             
                <tr>
                <th align="left" colspan="2"><br />Initial Treatment (mark all that apply)<br /><br /></th>
                </tr>
                     <tr>
                <th width="44%" align="left">Chemotherapy :</th>
                	<td width="56%" align="left">    <br />    
                  			<input type="text" name="date_chemo_follow" id="date_chemo" size="10" value="<? echo "$dbarr[date_chemo_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500) <br /><br />
                    </td>
                </tr>
                 <tr>
                 <td></td>
                	<td align="left" >
               <table width="491" border="0" cellpadding="0" cellspacing="4" >
            <tr align="left">
              <td width="30%" align="left"><input name="chemo_select_follow" type="radio" value="Ch+/-P"  <? if($dbarr[chemo_select_follow]== 'Ch+/-P') echo"checked"; ?> >              Ch+/-P</td> 
              <td width="23%" align="left"><input name="chemo_select_follow" type="radio" value="CP"  <? if($dbarr[chemo_select_follow]== 'CP') echo"checked"; ?>>              CP</td>
              <td width="23%" align="left"><input name="chemo_select_follow" type="radio" value="CVP (COP)" <? if($dbarr[chemo_select_follow]== 'CVP (COP)') echo"checked"; ?> >     CVP (COP)</td>
              <td width="24%" align="left"><input name="chemo_select_follow" type="radio" value="CHOP-14" <? if($dbarr[chemo_select_follow]== 'CHOP-14') echo"checked"; ?> />        CHOP-14</td>
              </tr>
            <tr align="left">
              <td><input name="chemo_select_follow" type="radio" value="CHOP-21" <? if($dbarr[chemo_select_follow]== 'CHOP-21') echo"checked"; ?>  />            CHOP-21</td>
              <td><input name="chemo_select_follow" type="radio" value="CHOEP"  <? if($dbarr[chemo_select_follow]== 'CHOEP') echo"checked"; ?> />             CHOEP</td>
              <td><input name="chemo_select_follow" type="radio" value="CNOP"  <? if($dbarr[chemo_select_follow]== 'CNOP') echo"checked"; ?>>              CNOP</td>
              <td><input name="chemo_select_follow" type="radio" value="EPOCH"  <? if($dbarr[chemo_select_follow]== 'EPOCH') echo"checked"; ?> />          EPOCH</td>
              </tr>
            <tr align="left">
              <td><input name="chemo_select_follow" type="radio" value="CHOP-ESHAP"  <? if($dbarr[chemo_select_follow]== 'CHOP-ESHAP') echo"checked"; ?>/>
                CHOP-ESHAP</td>
              <td><input name="chemo_select_follow" type="radio" value="HyperCVAD"  <? if($dbarr[chemo_select_follow]== 'HyperCVAD') echo"checked"; ?> />
                HyperCVAD</td>
              <td><input name="chemo_select_follow" type="radio" value="F"  <? if($dbarr[chemo_select_follow]== 'F') echo"checked"; ?> />     F</td>
              <td><input name="chemo_select_follow" type="radio" value="FC"  <? if($dbarr[chemo_select_follow]== 'FC') echo"checked"; ?> />   FC</td>
              </tr>
            <tr align="left">
              <td><input name="chemo_select_follow" type="radio" value="FN+/-D"  <? if($dbarr[chemo_select_follow]== 'FN+/-D') echo"checked"; ?> />  FN+/-D</td>
              <td><input name="chemo_select_follow" type="radio" value="FCM"  <? if($dbarr[chemo_select_follow]== 'FCM') echo"checked"; ?>  />      FCM</td>
              <td><input name="chemo_select_follow" type="radio" value="COPP"   <? if($dbarr[chemo_select_follow]== 'COPP') echo"checked"; ?> />    COPP</td>
              <td><input name="chemo_select_follow" type="radio" value="ABV"  <? if($dbarr[chemo_select_follow]== 'ABV') echo"checked"; ?> />       ABV</td>
              </tr>
            
            <tr align="left">
              <td><input name="chemo_select_follow" type="radio" value="COPP-ABV"  <? if($dbarr[chemo_select_follow]== 'COPP-ABV') echo"checked"; ?> />   COPP-ABV</td>
              <td><input name="chemo_select_follow" type="radio" value="ABVD"  <? if($dbarr[chemo_select_follow]== 'ABVD') echo"checked"; ?> />          ABVD</td>
              <td><input name="chemo_select_follow" type="radio" value="BEACOP"  <? if($dbarr[chemo_select_follow]== 'BEACOP') echo"checked"; ?> />      BEACOPP</td>
              <td align="left"><input name="chemo_select_follow" type="radio" value="CODOX-M"   <? if($dbarr[chemo_select_follow]== 'CODOX-M') echo"checked"; ?> />   CODOX-M</td>
            </tr>
             <tr align="left">
              <td align="left"><input name="chemo_select_follow" type="radio" value="CODOX-M/IVAC"  <? if($dbarr[chemo_select_follow]== 'CODOX-M/IVAC') echo"checked"; ?> />           CODOX-M/IVAC</td>
              <td align="left"><input name="chemo_select_follow" type="radio" value="ALL regimen"   <? if($dbarr[chemo_select_follow]== 'ALL regimen') echo"checked"; ?> />            ALL regimen</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          	<tr>
            		<td align="left"><input name="chemo_select_follow" type="radio" value="Other"    <? if($dbarr[chemo_select_follow]== 'Other') echo"checked"; ?>>    Other</td>
        			<td colspan="3" align="left"><input name="chemo_select_follow_other" type="text" value="<? echo "$dbarr[chemo_select_follow_other]"; ?>" size="20"></td>
            </tr>
            <tr>
            		<td align="left" colspan="4">Received Intrathecal chemotherapy    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="received_follow" type="radio" value="Yes"  <? if($dbarr[received_followup]== 'Yes') echo"checked"; ?>>    Yes   &nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="received_follow" type="radio" value="No"  <? if($dbarr[received_followup]== 'No') echo"checked"; ?>>    No
                    </td>
            </tr>
              
            
  </table> 
</td>
                  
                </tr>
                <tr>
                	<th align="left"> <br />
                 Immunotherapy :<br /><br /></th>
                 <td align="left"> 
                 	<input type="text" name="date_immun_follow" id="date_immun_follow" size="10" value="<? echo "$dbarr[date_immun_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500)
                 </td>
                </tr>
            	 <tr>
                	<td align="left"> <br />
                 			<br /><br /></td>
                            <td><br />
                            <input name="immun_select_follow" type="radio" value="Rituximab (Mark all that apply)" <? if($dbarr[immun_select_follow]== 'Rituximab (Mark all that apply)') echo"checked"; ?> onclick="show_immun(this.value);" >  Rituximab (Mark all that apply)  <br />
                             <table width="500" border="0" cellpadding="0" cellspacing="0" id="immun_select_follow_1" style="display:none">
				<tr>
				<td><br />
               <input name="rituximab_1" type="checkbox"  value="Induction" <? if($dbarr[rituximab_1]== 'Induction') echo"checked"; ?>>  Induction  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="rituximab_2" type="checkbox"  value="Maintenance"<? if($dbarr[rituximab_2]== 'Maintenance') echo"checked"; ?>>  Maintenance  <br /><br />
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_immun(id) {
						if(id == "Rituximab (Mark all that apply)") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("immun_select_follow_1").style.display = "";
						document.getElementById("immun_select_follow_2").style.display = "none";
						} else if(id != "Rituximab (Mark all that apply)") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("immun_select_follow_1").style.display = "none";
						document.getElementById("immun_select_follow_2").style.display = "";
						}
						}
				</script>    <br />
                        <input name="immun_select_follow" type="radio" value="Ibritumomab" <? if($dbarr[immun_select_follow]== 'Ibritumomab') echo"checked"; ?>  > Ibritumomab  <br /><br />
                    	 <input name="immun_select_follow" type="radio" value="Alemtuzumab" <? if($dbarr[immun_select_follow]== 'Alemtuzumab') echo"checked"; ?>  >  Alemtuzumab  <br /><br />
                      <input name="immun_select_follow" type="radio" value="Other" <? if($dbarr[immun_select_follow]== 'Other') echo"checked"; ?> onclick="show_immun_other(this.value);"   >       Other
                               <table width="500" border="0" cellpadding="0" cellspacing="0" id="immun_other_text_1" style="display:none">
				<tr>
				<td align="left" d="immun_other_text_1"><br />
               <input name="immun_other_text" type="text"  value="<? echo "$dbarr[immun_other_text]"; ?>"  size="30">    <br /><br />
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_immun_other(id) {
						if(id == "Other") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("immun_other_text_1").style.display = "";
						document.getElementById("immun_other_text_2").style.display = "none";
						} else if(id != "Other") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("immun_other_text_1").style.display = "none";
						document.getElementById("immun_other_text_2").style.display = "";
						}
						}
				</script> <br /><br />
                            </td>
                </tr>
                 <tr>
                	<th align="left"> <br />
                 			Radiotherapy :<br /><br /></th>
                    <td align="left"><input type="text" name="date_rad_follow" id="date_rad_follow" size="10" value="<? echo "$dbarr[date_rad_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500)</td>        
                </tr>
                 <tr>
                 <th align="left">Surgery :</th>
                	<td align="left"> <br />
                 		<input type="text" name="date_surgery_follow" id="date_surgery_follow" size="10" value="<? echo "$dbarr[date_surgery_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500)
                             <br /><br /></td>
                </tr>
                 <tr>
                	<th align="left" colspan="2"> <br />
                <input type="checkbox" name="no_treatment_follow" value="No (including observation)" <? if($dbarr[no_treatment_follow]== 'No (including observation)') echo"checked"; ?> />     No (including observation)
                             <br /><br /></th>
                </tr>
                 
                <tr>
                <th align="left" colspan="2"><h4> Clinical Outcome </h4></th>
                </tr>
                <tr>
                		<th colspan="2" align="left"><br />
                      Result of Initial Treatment    <br /><br />
                        </th>
                </tr>
                <tr>
                	<td></td>
                     <td align="left"><br />
                     <input name="result_follow" type="radio" value="Complete response (CR)" <? if($dbarr[result_follow]== 'Complete response (CR)') echo"checked"; ?>>Complete response (CR)
					<br /><br />
                    <input name="result_follow" type="radio" value="Complete response (uncomfirmed) (CRu)"<? if($dbarr[result_follow]== 'Complete response (uncomfirmed) (CRu)') echo"checked"; ?> onclick="show_complete(this.value);"  >Complete response (uncomfirmed) (CRu)  
                        <table width="500" border="0" cellpadding="0" cellspacing="0" id="complete_1" style="display:none">
				<tr>
				<td>
            Date of Document CR/CRu   &nbsp;&nbsp;&nbsp;&nbsp;
              	<input type="text" name="date_complete_follow" id="date_complete_follow" size="10" value="<? echo "$dbarr[date_complete_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500)

                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_complete(id) {
						if(id == "Complete response (uncomfirmed) (CRu)") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("complete_1").style.display = "";
						document.getElementById("complete_2").style.display = "none";
						} else if(id != "Complete response (uncomfirmed) (CRu)") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("complete_1").style.display = "none";
						document.getElementById("complete_2").style.display = "";
						}
						}
				</script> 
                    <br /><br />
                    <input name="result_follow" type="radio" value="Partial response (PR)"  <? if($dbarr[result_follow]== 'Partial response (PR)') echo"checked"; ?>  >            Partial response (PR)  <br /><br />
                    <input name="result_follow" type="radio" value="Stable disease (SD)" <? if($dbarr[result_follow]== 'Stable disease (SD)') echo"checked"; ?>>           			 Stable disease (SD)<br /><br />
                    <input name="result_follow" type="radio" value="Progressive disease (PD)"  <? if($dbarr[result_follow]== 'Progressive disease (PD)') echo"checked"; ?>>
            Progressive disease (PD)<br /><br />
            <input name="result_follow" type="radio" value="Indeterminate (ID)" <? if($dbarr[result_follow]== 'Indeterminate (ID)') echo"checked"; ?> >
            Indeterminate (ID)<br /><br />
            
          <b>  Cause    </b>        &nbsp;&nbsp;&nbsp;
            <input name="result_cause_follow" type="radio" value="Death" <? if($dbarr[result_cause_follow]== 'Death') echo"checked"; ?>> Death 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="result_cause_follow" type="radio" value="Loss to follow up" <? if($dbarr[result_cause_follow]== 'Loss to follow up') echo"checked"; ?>> Loss to follow up
                    </td>
                </tr>
                
                 <tr>
                		<th align="left" colspan="2">                Follow Up                    </th>
                </tr>
                  <tr>
                		<th align="left"><br />
                     Progression/relapse            <br /><br />
                        </th>
                        <td align="left"><br />
                        <input name="progression_follow" type="radio" value="Yes"  onclick="show_progression(this.value);"  <? if($dbarr[progression_follow]== 'Yes') echo"checked"; ?>>      Yes
                            <table width="500" border="0" cellpadding="0" cellspacing="0" id="progression_follow_1" style="display:none">
				<tr>
				<td>
                <input type="text" name="date_progression_follow" id="date_progression_follow" size="10" value="<? echo "$dbarr[date_progression_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500)

                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_progression(id) {
						if(id == "Yes") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("progression_follow_1").style.display = "";
						document.getElementById("progression_follow_2").style.display = "none";
						} else if(id != "Yes") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("progression_follow_1").style.display = "none";
						document.getElementById("progression_follow_2").style.display = "";
						}
						}
				</script> <br /><br />
						<input name="progression_follow" type="radio" value="No"   <? if($dbarr[progression_follow]== 'No') echo"checked"; ?>>  No<br /><br />
                        
                        Histology tranformation          			
                        <input name="histology_follow" type="radio" value="Yes" <? if($dbarr[histology_follow]== 'Yes') echo"checked"; ?>>  Yes    &nbsp;&nbsp;&nbsp;
                        <input name="histology_follow" type="radio" value="No" <? if($dbarr[histology_follow]== 'No') echo"checked"; ?>>	No &nbsp;&nbsp;&nbsp;
                        <input name="histology_follow" type="radio" value="Unknown" <? if($dbarr[histology_follow]== 'Unknown') echo"checked"; ?>> Unknown
                        <br /><br />
                     <b>   Progression/relapse sites (mark all that apply) </b> <br /><br />
                        <input name="lymphnode_follow" type="checkbox"  value="Lymph node"  <? if($dbarr[lymphnode_follow]== 'Lymph node') echo"checked"; ?>>         Lymph node   <br /><br />
                        <input type="checkbox" name="extranodal_follow" value="Extranodal sites" <? if($dbarr[extranodal_follow]== 'Extranodal sites') echo"checked"; ?>>
            		Extranodal sites (mark all that apply)   <br /><br />
                     <table width="420" border="0" cellpadding="0" cellspacing="3" bgcolor="#EFEFEF" >
            <tr align="left">
              <td width="128"><input type="checkbox" name="extr_1_follow" value="Waldeyer's ring" <? if($dbarr[extr_1_follow]== "Waldeyer's ring") echo"checked"; ?> >           Waldeyer's ring</td> 
              <td width="96"><input type="checkbox" name="extr_2_follow"  value="Sinonasal" <? if($dbarr[extr_2_follow]== 'Sinonasal') echo"checked"; ?>>Sinonasal</td>
              <td width="99"><input type="checkbox" name="extr_3_follow" value="Salivary gland"<? if($dbarr[extr_3_follow]== 'Salivary gland') echo"checked"; ?> >Salivary gland</td>
              <td width="77"><input type="checkbox" name="extr_4_follow" value="Thyroid"<? if($dbarr[extr_4_follow]== 'Thyroid') echo"checked"; ?>>Thyroid</td>
              </tr>
            <tr align="left">
              <td><input type="checkbox" name="extr_5_follow" value="Eye/Ocular adnexa"<? if($dbarr[extr_5_follow]== 'Eye/Ocular adnexa') echo"checked"; ?> >Eye/Ocular adnexa</td>
              <td><input type="checkbox" name="extr_6_follow" value="Lung/Pleura"<? if($dbarr[extr_6_follow]== 'Lung/Pleura') echo"checked"; ?>>Lung/Pleura</td>
              <td><input type="checkbox" name="extr_7_follow" value="Breast" <? if($dbarr[extr_7_follow]== 'Breast') echo"checked"; ?>>         Breast</td>
              <td><input type="checkbox" name="extr_8_follow" value="Stomach" <? if($dbarr[extr_8_follow]== 'Stomach') echo"checked"; ?>>            Stomach</td>
              </tr>
            <tr align="left">
              <td><input type="checkbox" name="extr_9_follow" value="Small intestine" <? if($dbarr[extr_9_follow]== 'Small intestine') echo"checked"; ?>>            Small intestine</td>
              <td><input type="checkbox" name="extr_10_follow" value="Testis"<? if($dbarr[extr_10_follow]== 'Testis') echo"checked"; ?> >            Testis</td>
				<td><input type="checkbox" name="extr_11_follow" value="Brain/CNS"<? if($dbarr[extr_11_follow]== 'Brain/CNS') echo"checked"; ?>>         Brain/CNS</td>
              <td><input type="checkbox" name="extr_12_follow" value="Liver" <? if($dbarr[extr_12_follow]== 'Liver') echo"checked"; ?>>           Liver</td>
              </tr>
            <tr align="left">
              <td><input type="checkbox" name="extr_13_follow" value="Large intestine"<? if($dbarr[extr_13_follow]== 'Large intestine') echo"checked"; ?>>           Large intestine</td>
              <td><input type="checkbox" name="extr_14_follow" value="Bone" <? if($dbarr[extr_14_follow]== 'Bone') echo"checked"; ?> >            Bone</td>
              <td><input type="checkbox" name="extr_15_follow" value="Bone marrow"  <? if($dbarr[extr_15_follow]== 'Bone marrow') echo"checked"; ?>>            Bone marrow</td>
              <td><input type="checkbox" name="extr_16_follow" value="Spleen" <? if($dbarr[extr_16_follow]== 'Spleen') echo"checked"; ?>>          Spleen</td>
              </tr>
            
            <tr align="left">
              <td><input type="checkbox" name="extr_17_follow" value="Skin/Subcutaneous"<? if($dbarr[extr_17_follow]== 'Skin/Subcutaneous') echo"checked"; ?>>        Skin/Subcutaneous</td>
              <td colspan="3">&nbsp;</td>
              </tr>
              <tr align="left">
              <td colspan="4"><table width="400" border="0" cellpadding="0" cellspacing="0" >
    <tr>
      <td width="60" valign="top"><input type="checkbox" name="extr_other" value="other"  <? if($dbarr[extr_other]== 'other') echo"checked"; ?>>
Others</td>
      <td><textarea name="extr_other_text" cols="40" rows="4" ><? echo "$dbarr[extr_other_text]"; ?></textarea></td>
    </tr>

  </table></td>
              </tr>
          </table>
                    
                        </td>
                </tr>
                  <tr>
                		<th align="left" colspan="2"><br />
                  <strong>Salvage treatment <span style="padding-left:25px;">
            <input name="salvage_follow" type="radio" value="Yes"<? if($dbarr[salvage_follow]== 'Yes') echo"checked"; ?>>Yes  &nbsp;&nbsp;&nbsp;
			<input name="salvage_follow" type="radio" value="No"<? if($dbarr[salvage_follow]== 'No') echo"checked"; ?>>No</span></strong>  
                         
                         <br /><br />
                        </td>
                </th>
                   <tr>
                		<th align="left" colspan="2">
                  Salvage regimen (mark all that apply)
                        </th>
                </tr>
                    <tr><br />
                		<th align="left"><br />            Chemotherapy<br /><Br />                   </th>
                        <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr align="left">
                      <td width="20%" ><input name="chemo_follow_1" type="checkbox" value="DHAP" <? if($dbarr[chemo_follow_1]== 'DHAP') echo"checked"; ?> >                   DHAP</td>
                      <td width="30%"><input name="chemo_follow_2" type="checkbox" value="ESHAP" <? if($dbarr[chemo_follow_2]== 'ESHAP') echo"checked"; ?>>
                        ESHAP</td>
                      <td width="27%"><input name="chemo_follow_3" type="checkbox"  value="MINE" <? if($dbarr[chemo_follow_3]== 'MINE') echo"checked"; ?>>
                        MINE</td>
                      <td width="23%"><input name="chemo_follow_4" type="checkbox"  value="IMVP-16"<? if($dbarr[chemo_follow_4]== 'IMVP-16') echo"checked"; ?>>
                        IMVP-16</td>
                    </tr>
                    <tr>
                      <td><input name="chemo_follow_5" type="checkbox"  value="ICE" <? if($dbarr[chemo_follow_5]== 'ICE') echo"checked"; ?>>
                        ICE</td>
                      <td><input name="chemo_follow_6" type="checkbox" value="Gemcitabine-regimen" <? if($dbarr[chemo_follow_6]== 'Gemcitabine-regimen') echo"checked"; ?>>
                        Gemcitabine-regimen</td>
						<td><input name="chemo_follow_7" type="checkbox"  value="Ch+/-P" <? if($dbarr[chemo_follow_7]== 'Ch+/-P') echo"checked"; ?>>
						  Ch+/-P</td>
                      <td><input name="chemo_follow_8" type="checkbox" value="CP" <? if($dbarr[chemo_follow_8]== 'CP') echo"checked"; ?>>
                        CP</td>
                    </tr>
					<tr>
                      <td><input name="chemo_follow_9" type="checkbox" value="CVP (COP)" <? if($dbarr[chemo_follow_9]== 'CVP (COP)') echo"checked"; ?>>
                        CVP (COP)</td>
                      <td><input name="chemo_follow_10" type="checkbox"value="CHOP-14"<? if($dbarr[chemo_follow_10]== 'CHOP-14') echo"checked"; ?>>
                        CHOP-14</td>
						<td><input name="chemo_follow_11" type="checkbox" value="CHOP-21" <? if($dbarr[chemo_follow_11]== 'CHOP-21') echo"checked"; ?>>
						  CHOP-21</td>
                      <td><input name="chemo_follow_12" type="checkbox"  value="CHOEP" <? if($dbarr[chemo_follow_12]== 'CHOEP') echo"checked"; ?>>
                        CHOEP</td>
                    </tr>
					<tr>
                      <td><input name="chemo_follow_13" type="checkbox" value="CNOP" <? if($dbarr[chemo_follow_13]== 'CNOP') echo"checked"; ?>>
                        CNOP</td>
                      <td><input name="chemo_follow_14" type="checkbox" value="EPOCH" <? if($dbarr[chemo_follow_14]== 'EPOCH') echo"checked"; ?>>
                        EPOCH</td>
						<td><input name="chemo_follow_15" type="checkbox"  value="CHOP-ESHAP" <? if($dbarr[chemo_follow_15]== 'CHOP-ESHAP') echo"checked"; ?>>
						  CHOP-ESHAP</td>
                      <td><input name="chemo_follow_16" type="checkbox" value="HyperCVAD" <? if($dbarr[chemo_follow_16]== 'HyperCVAD') echo"checked"; ?>>
                        HyperCVAD</td>
                    </tr>
					<tr>
                      <td><input name="chemo_follow_17" type="checkbox"  value="F" <? if($dbarr[chemo_follow_17]== 'F') echo"checked"; ?>>
                        F</td>
                      <td><input name="chemo_follow_18" type="checkbox" value="FC" <? if($dbarr[chemo_follow_18]== 'FC') echo"checked"; ?>>
                        FC</td>
						<td><input name="chemo_follow_19" type="checkbox"  value="FN+/-D" <? if($dbarr[chemo_follow_19]== 'FN+/-D') echo"checked"; ?>>
						  FN+/-D</td>
                        <td><input name="chemo_follow_20" type="checkbox"value="FCM" <? if($dbarr[chemo_follow_20]== 'FCM') echo"checked"; ?>>
                          FCM</td>
                    </tr>
					<tr>
                      <td><input name="chemo_follow_21" type="checkbox" value="COPP" <? if($dbarr[chemo_follow_21]== 'COPP') echo"checked"; ?>>
                        COPP</td>
                      <td><input name="chemo_follow_22" type="checkbox" value="ABV"<? if($dbarr[chemo_follow_22]== 'ABV') echo"checked"; ?>>
                        ABV</td>
						<td><input name="chemo_follow_23" type="checkbox" value="COPP-ABV" <? if($dbarr[chemo_follow_23]== 'COPP-ABV') echo"checked"; ?>>
						  COPP-ABV</td>
                      <td><input name="chemo_follow_24" type="checkbox" value="ABVD" <? if($dbarr[chemo_follow_24]== 'ABVD') echo"checked"; ?>>
                        ABVD</td>
                    </tr>
					<tr>
                      <td><input name="chemo_follow_25" type="checkbox" value="BEACOPP" <? if($dbarr[chemo_follow_25]== 'BEACOPP') echo"checked"; ?>>
                        BEACOPP</td>
                      <td ><input name="chemo_follow_26" type="checkbox"  value="CODOX-M" <? if($dbarr[chemo_follow_26]== 'CODOX-M') echo"checked"; ?>>
                        CODOX-M</td>
						<td><input name="chemo_follow_27" type="checkbox"  value="CODOX-M/IVAC"<? if($dbarr[chemo_follow_27]== 'CODOX-M/IVAC') echo"checked"; ?>>
						  CODOX-M/IVAC</td>
                      <td><input name="chemo_follow_28" type="checkbox" value="ABVD" <? if($dbarr[chemo_follow_28]== 'ABVD') echo"checked"; ?>>
                        ALL regimen</td>
                    </tr>
					
                    <tr>
                      <td colspan="4" valign="top" ><table width="400" border="0" cellpadding="0" cellspacing="0" class="smallTextGray">
    <tr>
      <td width="60" valign="top"><input name="chemo_follow_29" type="checkbox"  value="Other" <? if($dbarr[chemo_follow_29]== 'Other') echo"checked"; ?>>
Others</td>
      <td><textarea name="chemo_other_follow_29" cols="40" rows="4"  ><? echo "$dbarr[chemo_other_follow_29]"; ?></textarea></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td class="smallTextRed" style="padding-top:4px">*Enter each <span style="padding-top:9px">chemotherapy</span> on a new line.<br>
        ** Do not have ','(comma) in text.<br>
        *** Do not leave blank line in text.</td>
    </tr>
  </table></td>
                    </tr>
                  </table>
                        </td>
                        
                </tr>
                <tr>
                	<th align="left"><br />Immunotherapy<br /><br /></th>
                    <td><br />
                    		<input name="sal_immun_1" type="checkbox" value="Rituximab"  <? if($dbarr[sal_immun_1]== 'Rituximab') echo"checked"; ?> >          Rituximab  &nbsp;&nbsp;
                    		<input name="sal_immun_2" type="checkbox" value="Ibritumomab" <? if($dbarr[sal_immun_2]== 'Ibritumomab') echo"checked"; ?>  >          Ibritumomab  &nbsp;&nbsp;
                            <input name="sal_immun_3" type="checkbox" value="Alemtuzumab" <? if($dbarr[sal_immun_3]== 'Alemtuzumab') echo"checked"; ?> >          Alemtuzumab  &nbsp;&nbsp;  <br /><Br />
                            <input name="sal_immun_4" type="checkbox" value="Other" <? if($dbarr[sal_immun_4]== 'Other') echo"checked"; ?>  >          Other :&nbsp;&nbsp; <input name="sal_immun_4_text" type="text" size="20"  value="<?php echo "$dbarr[sal_immun_4_text]" ; ?>">
<br /><Br />
                    </td>
                </tr>
                <tr>
                <th align="left" colspan="2"><input name="sal_radio_follow" type="checkbox"  value="Radiotherapy" <? if($dbarr[sal_radio_follow]== 'Radiotherapy') echo"checked"; ?>>  Radiotherapy</th>
                </tr>
                <tr>
                <th align="left" colspan="2"><input name="sal_surgery_follow" type="checkbox"  value="Surgery" <? if($dbarr[sal_surgery_follow]== 'Surgery') echo"checked"; ?>>
            Surgery</th>
                </tr>
                <tr>
                <th align="left">Stem cell transplant  :</th>
                <td>      <br />
                	 <input name="stem_cell_follow" type="radio" value="Yes" <? if($dbarr[stem_cell_follow]== 'Yes') echo"checked"; ?>  />  Yes  <input type="text" name="date_stem_cell_follow" id="date_stem_cell_follow" size="10" value="<? echo "$dbarr[date_stem_cell_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500) &nbsp;&nbsp;&nbsp;&nbsp;
					 <input name="stem_cell_follow" type="radio" value="No"  <? if($dbarr[stem_cell_follow]== 'No') echo"checked"; ?> >  No  <br /><br />
				</td>
                </tr>
         <tr>
          <td align="right" valign="top">&nbsp;</td>
          <td align="left"><br />
            <input name="stem_cell_method" type="radio" value="Autologous" <? if($dbarr[stem_cell_method]== 'Autologous') echo"checked"; ?> >        Autologous   <br /><br />
             <input name="stem_cell_method" type="radio" value="Allogeneic" <? if($dbarr[stem_cell_method]== 'Allogeneic') echo"checked"; ?> onclick="show_stem_cell(this.value);"  >        Allogeneic
                <table width="500" border="0" cellpadding="0" cellspacing="0" id="stem_cell_method1" style="display:none">
				<tr>
				<td>
                 <strong>   Conditioning  </strong>  <br /><br />
            <input name="conditioning" type="radio" value="Myeloablative"<? if($dbarr[conditioning]== 'Myeloablative') echo"checked"; ?>>
                Myeloablative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="conditioning" type="radio" value="Non-myeloablative" <? if($dbarr[conditioning]== 'Non-myeloablative') echo"checked"; ?>>
                Non-myeloablative				<br /><Br />
           
               <b> Donor</b>  <br /><br />
                <input name="donor_follow" type="radio" value="HLA identical sibling" <? if($dbarr[donor_follow]== 'HLA identical sibling') echo"checked"; ?> > HLA identical sibling <br /><br />
   				<input name="donor_follow" type="radio" value=" Matched unrelated donor" <? if($dbarr[donor_follow]== ' Matched unrelated donor') echo"checked"; ?> >  Matched unrelated donor  <br /><br />
                <input name="donor_follow" type="radio" value="Haploidentical sibling" <? if($dbarr[donor_follow]== 'Haploidentical sibling') echo"checked"; ?> > Haploidentical sibling  <br /><br />
                <input name="donor_follow" type="radio" value="Other" <? if($dbarr[donor]== 'Other') echo"checked"; ?>onclick="show_donor_follow(this.value);"  > Other  <br /><br />
				<table width="500" border="0" cellpadding="0" cellspacing="0" id="donor_follow1" style="display:none">
				<tr>
				<td>
                  <input type="text" name="donor_follow_other" value="<? echo "$dbarr[donor_follow_other]"; ?>" size="50"  />
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_donor_follow(id) {
						if(id == "Other") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("donor_follow1").style.display = "";
						document.getElementById("donor_follow2").style.display = "none";
						} else if(id != "Other") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("donor_follow1").style.display = "none";
						document.getElementById("donor_follow2").style.display = "";
						}
						}
				</script> 
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_stem_cell(id) {
						if(id == "Allogeneic") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("stem_cell_method1").style.display = "";
						document.getElementById("stem_cell_method2").style.display = "none";
						} else if(id != "Allogeneic") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("stem_cell_method1").style.display = "none";
						document.getElementById("stem_cell_method2").style.display = "";
						}
						}
				</script> 
            <br /><br /></td>
       			 </tr>
                <tr>
                <th align="left"><br />Date of last Contact :<br /><br /></th>
                <td align="left"><br />
                <input type="text" name="date_last_contact_follow" id="date_last_contact_follow" size="10" value="<? echo "$dbarr[date_last_contact_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500) <br /><br />
                </td>
                </tr>
                <tr>
                <td></td>
                <td align="left"> <br />
                <input name="status_follow" type="radio" value="Alive"  <? if($dbarr[status_follow]== 'Alive') echo"checked"; ?> onclick="show_status_follow(this.value);"   >   Alive 
                  <table width="300" border="0" cellpadding="0" cellspacing="0" id="status_follow1" style="display:none">
				<tr>
				<td>
               <input name="alive_status" type="radio" value="Remission"   <? if($dbarr[alive_status]== 'Remission') echo"checked"; ?>>    Remission  &nbsp;&nbsp;&nbsp;
              <input name="alive_status" type="radio" value="No remission"  <? if($dbarr[alive_status]== 'No remission') echo"checked"; ?> >  No remission
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_status_follow(id) {
						if(id == "Alive") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("status_follow1").style.display = "";
						document.getElementById("status_follow2").style.display = "none";
						} else if(id != "Alive") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("status_follow1").style.display = "none";
						document.getElementById("status_follow2").style.display = "";
						}
						}
				</script> 
                <br /><br />
                <input name="status_follow" type="radio" value="Dead" <? if($dbarr[status_follow]== 'Dead') echo"checked"; ?> onclick="show_status_dead(this.value);"  >  Dead
                   <table width="500" border="0" cellpadding="0" cellspacing="0" id="dead1" style="display:none">
				<tr>
				<td>
            <table width="100%" border="0" cellspacing="5" cellpadding="0">
            <tr>
              <td colspan="3" ><b>Date of death </b>
            <input type="text" name="date_dead_follow" id="date_date_follow" size="10" value="<? echo "$dbarr[date_dead_follow]"; ?>"  />&nbsp;&nbsp;&nbsp;	(Example: 31/12/(พ.ศ.)2500)
             </td>
              </tr>
		
            <tr>
              <td align="left" colspan="3" ><b>Cause of Death</b> </td>
              </tr>
            <tr>
              <td width="33%" align="left" >
                <input name="cause_of_dead" type="radio" value="Infection"<? if($dbarr[cause_of_dead]== 'Infection') echo"checked"; ?> >         Infection</td>
              <td width="33%" align="left" >
                <input name="cause_of_dead" type="radio" value="Progression"<? if($dbarr[cause_of_dead]== 'Progression') echo"checked"; ?> >        Progression</td>
              <td align="left">
                <input name="cause_of_dead" type="radio" value="Hemorrhage"<? if($dbarr[cause_of_dead]== 'Hemorrhage') echo"checked"; ?> >           Hemorrhage</td>
            </tr>
			<tr>
			  <td colspan="3"  align="left">
			  <table width="400" border="0" cellpadding="0" cellspacing="0" >
    <tr>
      <td width="60" valign="top" align="left">
       <input name="cause_of_dead" type="radio" value="Other"<? if($dbarr[cause_of_dead]== 'Other') echo"checked"; ?>>    Other</td>
      <td><input name="cause_of_dead_other" type="text"  size="40" value="<? echo "$dbarr[cause_of_dead_other]"; ?>" ></td>
    </tr>
  </table>			  </td>
			  </tr>
			<tr>
			  <td colspan="3"  align="left"><b>Lymphoma status at time of  death </b></td>
			  </tr>
			<tr>
              <td align="left">
                <input name="lymphoma_status" type="radio" value="Remission" <? if($dbarr[lymphoma_status]== 'Remission') echo"checked"; ?> >            Remission</td>
			  <td align="left">
                <input name="lymphoma_status" type="radio" value="No remission"<? if($dbarr[lymphoma_status]== 'No remission') echo"checked"; ?> >            No remission</td>
			  <td  align="left">
                <input name="lymphoma_status" type="radio" value="Indeterminate" <? if($dbarr[lymphoma_status]== 'Indeterminate') echo"checked"; ?> >           Indeterminate</td>
			  </tr>
          </table>
            
            
            
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_status_dead(id) {
						if(id == "Dead") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("dead1").style.display = "";
						document.getElementById("dead2").style.display = "none";
						} else if(id != "Dead") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("dead1").style.display = "none";
						document.getElementById("dead2").style.display = "";
						}
						}
				</script> 
                <br /><br />
                <input name="status_follow" type="radio" value="Loss to follow-up" <? if($dbarr[status_follow]== 'Loss to follow-up') echo"checked"; ?> >    Loss to follow-up 
                <br /><br />
                
                </td>
                </tr>
                
                
                
                   <tr>
                  <th colspan="4" align="center">    
                  <br /><br />
                             <input name="id" type="hidden" id="id" value="<?php echo "$dbarr[id]" ; ?>">
                <input type="submit" name="Submit" value="Update Data " size="20"><br />
             
                        </td>
                  </tr>
                  
               </table>

           

 
    
       </form>
			
              </center>
                </p>
                </div>
			
			<!-- sidebar -->
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
		<? include "modules/index/footer.php"; ?>