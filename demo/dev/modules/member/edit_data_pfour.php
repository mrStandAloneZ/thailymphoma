<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$centre= $dbarr["centre"];
$codehos= $dbarr["codehos"];
?>
<? include "modules/index/header.php" ; 

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
								$('#date_change_treatment_t').calendarsPicker({calendar: $.calendars.instance('thai','th')});   
								$('#mutation_date_t').calendarsPicker({calendar: $.calendars.instance('thai','th')});       
								$('#start_date_t').calendarsPicker({calendar: $.calendars.instance('thai','th')});   
							});
				</script>
<!-- main content -->
			<div id="center">
				<h1><center>Update  CASE RECORD FORM CML REGISTRY - THAI CML - WG   <br />
                		Third Line Treatment</center>
                </h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=edit_data_add_pfour" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                   <table width="100%" border="0" align="center">
                 <tr>
                    <th width="26%" align="left"><strong>Centre : </strong></th>
                    <td width="35%"><input  type="text" name="centre"  readonly="readonly" value="<? echo "$dbarr[centre]" ; ?>" /> </td>
                    <th width="11%" align="left">Subject :</th>
                    <td width="28%"><input  type="text" name="subject"  readonly="readonly" value="<? echo "$dbarr[subject]" ; ?>" /> </td>
                  </tr>
                  <tr>
                    <th align="left">Patient  Initials :</th>
                    <td colspan="3"> <input  type="text" name="patient_initials" id="patient_initials"  readonly="readonly" value="<? echo "$dbarr[patient_initials]" ; ?>" /> </td>
                  </tr>
              <tr>
              		<th align="left">Data  of  Assessment</th>
                    <td colspan="3">
                     <input type="text" id="mydate" name="date_of_assessment_t" size="8" value="<? echo "$dbarr[date_of_assessment_t]"; ?>" maxlength="10" /> 
                     (dd/mm/2500)
                    </td>
              </tr>
              <tr>
              		<th align="left">Duration</th>
              		<td colspan="3">
            		 <input type="radio" name="duration_t" value='3 mo'   <? if($dbarr[duration_t]== '3 mo') echo"checked"; ?> >  3 mo &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration_t" value='6 mo'   <? if($dbarr[duration_t]== '6 mo') echo"checked"; ?> >  6 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration_t" value='9 mo'   <? if($dbarr[duration_t]== '9 mo') echo"checked"; ?> >  9 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration_t" value='12 mo'   <? if($dbarr[duration_t]== '12 mo') echo"checked"; ?> >  12 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration_t" value='18 mo'   <? if($dbarr[duration_t]== '18 mo') echo"checked"; ?> >  18 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration_t" value='24 mo'   <? if($dbarr[duration_t]== '24 mo') echo"checked"; ?> >  24 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration_t" value='36 mo'   <? if($dbarr[duration_t]== '36 mo') echo"checked"; ?> >  36 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration_t" value='48 mo'   <? if($dbarr[duration_t]== '48 mo') echo"checked"; ?> >  48 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration_t" value='60 mo'   <? if($dbarr[duration_t]== '60 mo') echo"checked"; ?> >  60 mo  &nbsp;&nbsp;&nbsp;
                     
                    </td>
              </tr>
              <tr>
              		<th align="left">Mutation Analysis  </th>
                    <td colspan="3">
                          <input name="mutation_an_t" type="radio" value="Not done"  <? if($dbarr[mutation_an_t]== 'Not done') echo"checked"; ?>  onclick="show_mu(this.value);"> Not done  &nbsp;&nbsp;&nbsp;&nbsp;
               		   <input name="mutation_an_t" type="radio" value="Done"  <? if($dbarr[mutation_an_t]== 'Done') echo"checked"; ?>  onclick="show_mu(this.value);"> Done
                    <table width="500" border="0" cellpadding="0" cellspacing="0" id="mu1" style="display:none">
				<tr>
				<td>
       	   			<input type="text"   id="mutation_date_t" name="mutation_date_t" value="<? echo "$dbarr[mutation_date_t]"; ?>" size="8"  maxlength="10" />(dd/mm/2500)  
                    
                        </td>
				</tr>
				</table>
					<script language="javascript">
						function show_mu(id) {
						if(id == "Done") { 
						document.getElementById("mu1").style.display = "";
						document.getElementById("mu2").style.display = "none";
						} else if(id == "Not done") { 
						document.getElementById("mu1").style.display = "none";
						document.getElementById("mu2").style.display = "";
						}
						}
				</script> 
                    </td>
              </tr>
              <tr>
              		<th align="left">Result   </th>
                    <td colspan="3">
                      <input name="result_mu_t" type="radio" value="No"  <? if($dbarr[result_mu_t]== 'No') echo"checked"; ?>  onclick="show_re(this.value);"> No  &nbsp;&nbsp;&nbsp;&nbsp;
               		   <input name="result_mu_t" type="radio" value="Yes"  <? if($dbarr[result_mu_t]== 'Yes') echo"checked"; ?>  onclick="show_re(this.value);"> Yes
                  <br /><br />  <table width="500" border="0" cellpadding="0" cellspacing="0" id="re1" style="display:none">
				<tr>
				<td>
       	   			<input type="text"   name="re_specify_t" value="<? echo "$dbarr[re_specify_t]"; ?>" size="80"   />
                    
                        </td>
				</tr>
				</table>
					<script language="javascript">
						function show_re(id) {
						if(id == "Yes") { 
						document.getElementById("re1").style.display = "";
						document.getElementById("re2").style.display = "none";
						} else if(id == "No") { 
						document.getElementById("re1").style.display = "none";
						document.getElementById("re2").style.display = "";
						}
						}
				</script> 
                    </td>
              </tr>
              <tr>
                   <th align="left">Treatment</th>
                   <td colspan="3"> 
                   <input type="radio" name="treatment_t" value='Nilotinib'   <? if($dbarr[treatment_t]== 'Nilotinib') echo"checked"; ?> onclick="show_ment(this.value);">  Nilotinib  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment_t" value='Dasatinib'   <? if($dbarr[treatment_t]== 'Dasatinib') echo"checked"; ?> onclick="show_ment(this.value);">   Dasatinib  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment_t" value='Allo SCT'   <? if($dbarr[treatment_t]== 'Allo SCT') echo"checked"; ?> onclick="show_ment(this.value);">   Allo SCT  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment_t" value='Other'   <? if($dbarr[treatment_t]== 'Other') echo"checked"; ?>  onclick="show_ment(this.value);" >   Other  &nbsp;&nbsp;&nbsp;
                   <br /><br />     <table width="500" border="0" cellpadding="0" cellspacing="0" id="me1" style="display:none">
				<tr>
				<td>
       	   			<b>specify</b>  <input type="text"   name="treatment_specify_t" value="<? echo "$dbarr[treatment_specify_t]"; ?>" size="80"   />
                    
                        </td>
				</tr>
				</table>
					<script language="javascript">
						function show_ment(id) {
						if(id == "Other") { 
						document.getElementById("me1").style.display = "";
						document.getElementById("me2").style.display = "none";
						} else if(id != "Other") { 
						document.getElementById("me1").style.display = "none";
						document.getElementById("me2").style.display = "";
						}
						}
				</script> 
                   
                   </td>
               </tr>
               <tr>
               <th align="left">Daily dose</th>
				<td colspan="3">
                <input type="text" name="daily_dose_t" size="3" value="<? echo "$dbarr[daily_dose_t]"; ?>" maxlength="3" />  mg
                </td>
              <tr>
              		<th align="left">Starting  Date </th>
                    <td colspan="3"> <input type="text" id="start_date_t" name="start_date_t" size="8" value="<? echo "$dbarr[start_date_t]"; ?>" maxlength="10" /> 
                     (dd/mm/2500)
                     </td>
              </tr>
               <tr>
               <th align="center" colspan="4"><font color="#0000FF" size="+1">Cytogenetic study</font></th>
               </tr>
               <tr>
               <th align="left">Result </th>
               <td colspan="3"><input type="text" name="result_t" value="<? echo "$dbarr[result_t]"; ?>"  size="100" /></td>
               </tr>
               <tr>
               <th align="left"> % Ph chromosome :</th>
               <td colspan="3">
               <input type="text" name="ph_chromosome_t" value="<? echo "$dbarr[ph_chromosome_t]"; ?>" maxlength="5"/> / 
                        Number of metaphase  &nbsp; <input type="text" name="number_metaphase_t" value="<? echo "$dbarr[number_metaphase_t]"; ?>" maxlength="3"  />  
               </td>
               </tr>
               <tr>
               <th align="left">Additional chromosome abnormality :</th>
               <td colspan="3">
                 		<input type="radio" name="add_chrom_t" value='No'   <? if($dbarr[add_chrom_t]== 'No') echo"checked"; ?> > No&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="add_chrom_t" value='Yes'   <? if($dbarr[add_chrom_t]== 'Yes') echo"checked"; ?> > Yes&nbsp;&nbsp;&nbsp; 
               </td>
               </tr>
               <tr>
               <th align="left">RQ-PCR for BCR-ABL transcription level  :</th>
               <td colspan="3"><input type="text" name="rq_pcr_t" value="<? echo "$dbarr[rq_pcr_t]"; ?>" maxlength="5" />  &nbsp; % (IS)</td>
               </tr>               
               <tr>
               <th align="left">Response of treatment  :</th>
               <td colspan="3"><BR />
             
               <input type="radio" name="re_treatment_t" value='Non CHR, and/or Ph+ >95%'  <? if($dbarr[re_treatment_t]== 'Non CHR, and/or Ph+ >95%') echo"checked"; ?> />  Non CHR, and/or Ph+ >95%  <BR /><BR />
               
               <input type="radio" name="re_treatment_t" value='BCR-ABL1 >10%, and/or Ph+ 36-95%' <? if($dbarr[re_treatment_t]== 'BCR-ABL1 >10%, and/or Ph+ 36-95%') echo"checked"; ?> />  BCR-ABL1 >10%, and/or Ph+ 36-95%  <BR /><BR />
               
               <input type="radio" name="re_treatment_t" value='BCR-ABL1 <10%, and/or Ph+ <35%' <? if($dbarr[re_treatment_t]== 'BCR-ABL1 <10%, and/or Ph+ <35%') echo"checked"; ?> />   <?  echo "BCR-ABL1 <10%, and/or Ph+ <35%";?>  <BR /><BR />
               
               <input type="radio"  name="re_treatment_t"  value='BCR-ABL1 1-10%, and/or Ph+ 1-35%'<? if($dbarr[re_treatment_t]== 'BCR-ABL1 1-10%, and/or Ph+ 1-35%') echo"checked"; ?> />  BCR-ABL1 1-10%, and/or Ph+ 1-35%  <BR /><BR />
               
               <input type="radio" name="re_treatment_t" value='BCR-ABL1 <1%, and/or Ph+ 0%'<? if($dbarr[re_treatment_t]== 'BCR-ABL1 <1%, and/or Ph+ 0%') echo"checked"; ?>  />  <? echo "BCR-ABL1 <1%, and/or Ph+ 0%";?>  <BR /><BR />
               
               <input type="radio" name="re_treatment_t" value='BCR-ABL1 <0.1%' <? if($dbarr[re_treatment_t]== 'BCR-ABL1 <0.1%') echo"checked"; ?> />    <? echo "BCR-ABL1 <0.1%";?>  <BR /><BR />
               
               <input type="radio" name="re_treatment_t" value='MR4' <? if($dbarr[re_treatment_t]== 'MR4') echo"checked"; ?> />    MR4 <BR /><BR />
               
               <input type="radio" name="re_treatment_t" value='MR4.5' <? if($dbarr[re_treatment_t]== 'MR4.5') echo"checked"; ?> />   MR4.5 <BR /><BR />
               
               <input type="radio" name="re_treatment_t" value='Molecularly undetectable leukemia' <? if($dbarr[re_treatment_t]== 'Molecularly undetectable leukemia') echo"checked"; ?> />  Molecularly undetectable leukemia  <BR />
               </td> 
               </tr>            
               <tr>
               <th align="left">Is the previous treatment continued? </th>
               <td colspan="3">
               <input type="radio" name="p_treatment_c_t" value='No'   <? if($dbarr[p_treatment_c_t]== 'No') echo "checked"; ?> > No &nbsp;&nbsp;&nbsp;
               <input type="radio" name="p_treatment_c_t" value='Yes'   <? if($dbarr[p_treatment_c_t]== 'Yes') echo "checked"; ?> > Yes &nbsp;&nbsp;&nbsp; 
               </td>
               </tr>
               <tr>
               		<th align="left">Change of treatment</th>
                    <td  colspan="3">
                    <input name="change_treatment_t" type="radio" value="No"  <? if($dbarr[change_treatment_t]== 'No') echo"checked"; ?>  onclick="show_post(this.value);"> No  &nbsp;&nbsp;&nbsp;&nbsp;
               		   <input name="change_treatment_t" type="radio" value="Yes"  <? if($dbarr[change_treatment_t]== 'Yes') echo"checked"; ?>  onclick="show_post(this.value);"> Yes
                    <table width="500" border="0" cellpadding="0" cellspacing="0" id="post1" style="display:none">
				<tr>
				<td>
       	   			<input type="text"   id="date_change_treatment_t" name="date_change_treatment_t" value="<? echo "$dbarr[date_change_treatment_t]"; ?>" size="8"  maxlength="10" />(dd/mm/2500)  <br /><br />
               <? // หมายเหตุ ?>     
                 <strong>   specify  :</strong>  &nbsp;&nbsp;  <input type="text" name="specify_tr_t" value="<? echo "$dbarr[specify_tr_t]"; ?>" size="50"  />
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_post(id) {
						if(id == "Yes") { 
						document.getElementById("post1").style.display = "";
						document.getElementById("post2").style.display = "none";
						} else if(id == "No") { 
						document.getElementById("post1").style.display = "none";
						document.getElementById("post2").style.display = "";
						}
						}
				</script> 
                  
                
               </td>
               </tr>
               <tr>
               		<th align="left">Reason for changing treatment/dose/discontinuation :</th>
                    <td colspan="3"> <br>
                    <input type="radio" name="reason_chang_t" value="Adverse event"   <? if($dbarr[reason_chang_t]== 'Adverse event') echo"checked"; ?> onclick="reason_post(this.value);" >  Adverse event <br /><br />
                    
                    <input type="radio" name="reason_chang_t" value="Serious adverse event"   <? if($dbarr[reason_chang_t]== 'Serious adverse event') echo"checked"; ?>  onclick="reason_post(this.value);" >  Serious adverse event<br /><br />
                    
                    <input type="radio" name="reason_chang_t" value="No effective cytoreduction"   <? if($dbarr[reason_chang_t]== 'No effective cytoreduction') echo"checked"; ?>onclick="reason_post(this.value);" >  No effective cytoreduction<br /><br />
                    
                    <input type="radio" name="reason_chang_t" value="No response even at adequate dose"   <? if($dbarr[reason_chang_t]== 'No response even at adequate dose') echo"checked"; ?> onclick="reason_post(this.value);" >  No response even at adequate dose <br /><br />
                    
                    <input type="radio" name="reason_chang_t" value="Others"   <? if($dbarr[reason_chang_t]== 'Others') echo"checked"; ?> onclick="reason_post(this.value);" >  Others <br />
                    
                       <table width="350" border="0" cellpadding="0" cellspacing="0" id="reason1" style="display:none">
				<tr>
				<td><strong>specify :</strong>
       	   			<input type="text"   name="specify_reson_t" value="<? echo "$dbarr[specify_reson_t]"; ?>" size="20"  /> <br />
                </td>
				</tr>
				</table>
                  </td>
               </tr>
					<script language="javascript">
						function reason_post(id) {
						if(id == "Others") { 
						document.getElementById("reason1").style.display = "";
						document.getElementById("reason2").style.display = "none";
						} else if(id != "Others") { 
						document.getElementById("reason1").style.display = "none";
						document.getElementById("reason2").style.display = "";
						}
						}
				</script> 
                <tr>
                		<th align="left">Progression to AP/BP</th>
                        <td colspan="3">
                        <input type="radio" name="progress_ap_t" value='No'   <? if($dbarr[progress_ap_t]== 'No') echo"checked"; ?> > No&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="progress_ap_t" value='Yes'   <? if($dbarr[progress_ap_t]== 'Yes') echo"checked"; ?> > Yes&nbsp;&nbsp;&nbsp; 
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
				$date_of_assessment_t = $dbarr[date_of_assessment_t];
				$mutation_an_t = $dbarr[mutation_an_t];
				$result_mu_t = $dbarr[result_mu_t];
				$treatment_t = $dbarr[treatment_t];
				$daily_dose_t = $dbarr[daily_dose_t];
				$start_date_t = $dbarr[start_date_t];
				$result_t = $dbarr[result_t];
				$ph_chromosome_t = $dbarr[ph_chromosome_t];
				$number_metaphase_t = $dbarr[number_metaphase_t];
				$add_chrom_t = $dbarr[add_chrom_t];
				$rq_pcr_t = $dbarr[rq_pcr_t];
				$re_treatment_t = $dbarr[re_treatment_t];
				$p_treatment_c_t = $dbarr[p_treatment_c_t];
				$change_treatment_t = $dbarr[change_treatment_t];
				$reason_chang_t = $dbarr[reason_chang_t];
				$progress_ap_t = $dbarr[progress_ap_t];
				$status_third = $dbarr[status_third];

?>
			<?  
			if($date_of_assessment_t != "" && $mutation_an_t != "" && $result_mu_t !="" && $treatment_t !="" && $daily_dose_t !="" && $start_date_t !="" && $result_t !="" && $ph_chromosome_t !="" && $number_metaphase_t !="" &&  $add_chrom_t !="" && $rq_pcr_t !=""  && $re_treatment_t != ""  && $p_treatment_c_t != "" && $change_treatment_t != ""  && $reason_chang_t !="" && $progress_ap_t !=""  && $status_third == ""  ){
				
					echo"<a href=\"?name=member&file=edit_data_status_pfour&id=$id\"><b>APPROVE CLICK </b></a>";
					
						} else {   	
						
							}   
			?>  
            </td>
            </tr>
                  
                  
              </table>
               
  

       </form>
	
			<script language="javascript">

function check() {
if(document.checkForm.date_of_assessment_t.value==0) {
alert("กรุณากรอก Data  of  Assessment  ") ;
document.checkForm.date_of_assessment_t.focus() ;
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