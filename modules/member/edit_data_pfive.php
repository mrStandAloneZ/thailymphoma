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
								$('#dora_registry').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#death').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_ap_plast').calendarsPicker({calendar: $.calendars.instance('thai','th')});
							});
				</script>

<!-- main content -->
			<div id="center">
				<h1><center>Update  CASE RECORD FORM CML REGISTRY - THAI CML - WG   <br />
                		LAST  FOLLOW  UP</center>
                </h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=edit_data_add_pfive" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                   <table width="100%" border="0" align="center">
                 <tr>
                    <th width="26%" align="left"><strong>Centre : </strong></th>
                    <td width="35%"><input  type="text" name="centre"  readonly="readonly" value="<? echo "$dbarr[centre]" ; ?>" /> </td>
                    <th width="11%" align="left">Subject :</th>
                    <td width="28%"><input  type="text" name="subject"  readonly="readonly" value="<? echo "$dbarr[subject]" ; ?>" /> </td>
                  </tr>
                   <tr>
                    <th align="left">Patient  Initials :</th>
                    <td colspan="3"> <input  type="text" name="patient_initials"   maxlength="2" value="<? echo "$dbarr[patient_initials]" ; ?>"  readonly="readonly" /> </td>
                  </tr>
                 <tr>
                 <th align="left"> Date of Assessment :</th>   	
                 <td colspan="3">
                 <input type="text" id="mydate" name="date_assessment_plast"  value="<? echo "$dbarr[date_assessment_plast]" ; ?>" size="8" maxlength="10" />   &nbsp;&nbsp;  (dd/mm/2500)
                 </td>
                 </tr>
                 <tr>
                 	<th align="left">Current treatment  :</th>
         			<td colspan="3">
                    <input type="radio" name="current_treatment"  value="Imatinib" <? if($dbarr[current_treatment]== 'Imatinib') echo"checked"; ?>onclick="show_post(this.value);" />  Imatinib  &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="current_treatment" value="Nilotinib" <? if($dbarr[current_treatment]== 'Nilotinib') echo"checked"; ?>onclick="show_post(this.value);" />  Nilotinib  &nbsp;&nbsp;&nbsp;
                     <input type="radio" name="current_treatment" value="Dasatinib" <? if($dbarr[current_treatment]== 'Dasatinib') echo"checked"; ?>onclick="show_post(this.value);" />  Dasatinib  &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="current_treatment" value="Other" <? if($dbarr[current_treatment]== 'Other') echo"checked"; ?>onclick="show_post(this.value);" />  Other  &nbsp;&nbsp;&nbsp;
                         <table width="350" border="0" cellpadding="0" cellspacing="0" id="post1" style="display:none">
				<tr>
				<td><strong>specify :</strong>
       	   			<input type="text"   name="specify_plast" value="<? echo "$dbarr[specify_plast]"; ?>" size="20"  /> <br />
                </td>
				</tr>
				</table>
                  </td>
               </tr>
					<script language="javascript">
						function show_post(id) {
						if(id == "Other") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("post1").style.display = "";
						document.getElementById("post2").style.display = "none";
						} else if(id != "Other") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("post1").style.display = "none";
						document.getElementById("post2").style.display = "";
						}
						}
				</script> 
                    </td>
                 </tr>
                 <tr>
                 <th align="left">Daily dose : </th>
                 <td colspan="3"><input type="text" name="daily_dose_plast" value="<? echo "$dbarr[daily_dose_plast]" ; ?>"  size="8" />  &nbsp;&nbsp;  mg</td>
                 </tr>
                 <tr>
                 		<th align="left">Number of treatment</th>
                        <td colspan="3">
                       <input type="radio" name="number_treatment_plast"  value="1" <? if($dbarr[number_treatment_plast]== '1') echo"checked"; ?> />     1    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="number_treatment_plast" value="2" <? if($dbarr[number_treatment_plast]== '2') echo"checked"; ?> />     2  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="number_treatment_plast" value="3" <? if($dbarr[number_treatment_plast]== '3') echo"checked"; ?> />     3    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>	
                 </tr>
              <tr>
              		<th align="left">doration  in  registry: </th>
                    <td colspan="3">
                    <input type="text" id="dora_registry" name="dora_registry" value="<? echo "$dbarr[dora_registry]" ; ?>" /> &nbsp;&nbsp;  (dd/mm/2500)
                    </td>
              </tr>   
                 
               <tr>
               		<th align="left">Response of treatment :</th>
               		<td colspan="3"><br />
                    <input type="radio" name="re_treatment_plast" value="Non CHR, and/or Ph+ >95%" <? if($dbarr[re_treatment_plast]== 'Non CHR, and/or Ph+ >95%') echo"checked"; ?> /> Non CHR, and/or Ph+ >95%    <br /><br />
                    <input type="radio" name="re_treatment_plast" value="BCR-ABL1 >10%, and/or Ph+ 36-95%" <? if($dbarr[re_treatment_plast]== 'BCR-ABL1 >10%, and/or Ph+ 36-95%') echo"checked"; ?> />  BCR-ABL1 >10%, and/or Ph+ 36-95%    <br /><br />
                    <input type="radio" name="re_treatment_plast" value="BCR-ABL1 <10%, and/or Ph+ <35%"  <? if($dbarr[re_treatment_plast]== 'BCR-ABL1 <10%, and/or Ph+ <35%') echo"checked"; ?> />  BCR-ABL1 <10%, and/or Ph+ <35%    <br /><br />
                    <input type="radio" name="re_treatment_plast" value="BCR-ABL1 1-10%, and/or Ph+ 1-35%"  <? if($dbarr[re_treatment_plast]== 'BCR-ABL1 1-10%, and/or Ph+ 1-35%') echo"checked"; ?> />  BCR-ABL1 1-10%, and/or Ph+ 1-35%    <br /><br />
                    <input type="radio" name="re_treatment_plast" value="BCR-ABL1 <1%, and/or Ph+ 0%" <? if($dbarr[re_treatment_plast]== 'BCR-ABL1 <1%, and/or Ph+ 0%') echo"checked"; ?> />  BCR-ABL1 <1%, and/or Ph+ 0%    <br /><br />
                    <input type="radio" name="re_treatment_plast" value="BCR-ABL1 <0.1%"<? if($dbarr[re_treatment_plast]== 'BCR-ABL1 <0.1%') echo"checked"; ?> />  BCR-ABL1 <0.1%    <br /><br />
                    <input type="radio" name="re_treatment_plast" value="MR4" <? if($dbarr[re_treatment_plast]== 'MR4') echo"checked"; ?> />  MR4    <br /><br />
                    <input type="radio" name="re_treatment_plast" value="MR4.5"  <? if($dbarr[re_treatment_plast]== 'MR4.5') echo"checked"; ?> />  MR4.5    <br /><br />
                    <input type="radio" name="re_treatment_plast" value="Molecularly undetectable leukemia"<? if($dbarr[re_treatment_plast]== 'Molecularly undetectable leukemia') echo"checked"; ?> />  Molecularly undetectable leukemia    <br /><br />
                    </td>
               </tr>  
                
                 <tr>
                 	<th align="left">Progression to AP/BP  :</th>
                    <td colspan="3"><br />
                    <input type="radio" name="progression_ap_plast" value='No'    <? if($dbarr[progression_ap_plast]== 'No') echo"checked"; ?> onclick="show_ap(this.value);"  > No &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="progression_ap_plast" value='Yes'  <? if($dbarr[progression_ap_plast]== 'Yes') echo"checked"; ?>onclick="show_ap(this.value);" > Yes
                    
                         <table width="350" border="0" cellpadding="0" cellspacing="0" id="date_ap1" style="display:none">
				<tr>
				<td><strong>date :</strong>
       	   			<input type="text" id="date_ap_plast"   name="date_ap_plast" value="<? echo "$dbarr[date_ap_plast]"; ?>" size="8" maxlength="10"  /> <br />
                </td>
				</tr>
				</table>
                  </td>
               </tr>
					<script language="javascript">
						function show_ap(id) {
						if(id == "Yes") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("date_ap1").style.display = "";
						document.getElementById("date_ap2").style.display = "none";
						} else if(id == "No") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("date_ap1").style.display = "none";
						document.getElementById("date_ap2").style.display = "";
						}
						}
				</script> 
                    
                    </td>
                 </tr>
                     <tr>
                 		<th align="left">Cause of death :</th>
                 		<td colspan="3"><br />
                        <input type="radio" name="cause_death"  value="Disease-related"  <? if($dbarr[cause_death]== 'Disease-related') echo"checked"; ?> /> Disease-related	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="cause_death"  value="Not disease-related" <? if($dbarr[cause_death]== 'Not disease-related') echo"checked"; ?> /> Not disease-related	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="cause_death"   value="Unknown"  <? if($dbarr[cause_death]== 'Unknown') echo"checked"; ?> /> Unknown	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
                        </td>
                 </tr>            
                 <tr>
                 	<th align="left">Death  :</th>
                    <td colspan="3"><br />
                     <input type="radio" name="death_plast" value='No'   <? if($dbarr[death_plast]== 'No') echo"checked"; ?> onclick="show_death(this.value);" > No &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="death_plast" value='Yes'   <? if($dbarr[death_plast]== 'Yes') echo"checked"; ?> onclick="show_death(this.value);" > Yes
             
                         <table width="350" border="0" cellpadding="0" cellspacing="0" id="death1" style="display:none">
				<tr>
				<td><strong>date :</strong>
       	   			<input type="text"  id="death"  name="date_death" value="<? echo "$dbarr[date_death]"; ?>" size="8"  maxlength="10" /> <br />
                    
                </td>
				</tr>
				</table>
                  </td>
               </tr>
					<script language="javascript">
						function show_death(id) {
						if(id == "Yes") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("death1").style.display = "";
						document.getElementById("death2").style.display = "none";
						} else if(id == "No") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("death1").style.display = "none";
						document.getElementById("death2").style.display = "";
						}
						}
				</script>   
                    <br />
                     <br />
                    
                    </td>
                 </tr>
             
                  <tr>
                  <th colspan="4" align="center">    
                             <input name="id" type="hidden" id="id" value="<?php echo "$dbarr[id]" ; ?>">
                <input type="submit" name="Submit" value="Update Data" size="20">
                        </td>
                  </tr>
                  
                       <tr>
                  <td colspan="4" align="center" >
                  <?

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_ADD_DATA." where id='$id' order by id DESC") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;    			
			
				$date_assessment_plast = $dbarr[date_assessment_plast];
				$current_treatment = $dbarr[current_treatment];
				$daily_dose_plast = $dbarr[daily_dose_plast];
				$number_treatment_plast = $dbarr[number_treatment_plast];
				$dora_registry = $dbarr[dora_registry];
				$re_treatment_plast = $dbarr[re_treatment_plast];
				$progression_ap_plast = $dbarr[progression_ap_plast];
				$death_plast = $dbarr[death_plast];
				$cause_death = $dbarr[cause_death];
				$status_last = $dbarr[status_last];

?>
			<?  
			
		if($date_assessment_plast != "" && $current_treatment != "" && $daily_dose_plast != "" && $number_treatment_plast !="" && $dora_registry !="" && $re_treatment_plast !="" && $progression_ap_plast !="" && $death_plast !="" && $cause_death !="" && $status_last == ""  ){
					echo"<a href=\"?name=member&file=edit_add_status_pfive&id=$id\"><b>APPROVE CLICK </b></a>";
						} else {   	
						
							}   
			?>  
            </td>
            </tr>
              </table>
              

       </form>
	<script language="javascript">

function check() {
if(document.checkForm.date_assessment_plast.value==0) {
alert("กรุณากรอก Data  of  Assessment  ") ;
document.checkForm.date_assessment_plast.focus() ;
return false ;
}
else 
return true ;
}
    </script> 
			
              </center>
                </p>
                </div>
			
			<!-- sidebar -->
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
		<? include "modules/index/footer.php"; ?>