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
								$('#date_change_treatment').calendarsPicker({calendar: $.calendars.instance('thai','th')});
							
							});
				</script>
<!-- main content -->
			<div id="center">
				<h1><center>Update  CASE RECORD FORM CML REGISTRY - THAI CML - WG   <br />
                		VISIT (FOLLOW UP)</center>
                </h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=edit_data_add_ptwo" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                   <table width="100%" border="0" align="center">
                 <tr>
                    <th width="26%" align="left"><strong>Centre : </strong></th>
                    <td width="35%"><input  type="text" name="centre"  readonly="readonly" value="<? echo "$dbarr[centre]" ; ?>" /> </td>
                    <th width="11%" align="left">Subject :</th>
                    <td width="28%"><input  type="text" name="subject"  readonly="readonly" value="<? echo "$dbarr[subject]" ; ?>" /> </td>
                  </tr>
                  <tr>
                    <th align="left">Patient  Initials :</th>
                    <td colspan="3"> <input  type="text" name="patient_initials" id="patient_initials"  maxlength="2" value="<? echo "$dbarr[patient_initials]" ; ?>" /> </td>
                  </tr>
              <tr>
              		<th align="left">Data  of  Assessment</th>
                    <td colspan="3">
                     <input type="text"  id="mydate" name="date_of_assessment" size="8" value="<? echo "$dbarr[date_of_assessment]"; ?>" maxlength="10" />  (dd/mm/2500)
                    </td>
              </tr>
              <tr>
              		<th align="left">Duration</th>
              		<td colspan="3">
                   <input type="radio" name="duration" value='3 mo'   <? if($dbarr[duration]== '3 mo') echo"checked"; ?> >  3 mo &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration" value='6 mo'   <? if($dbarr[duration]== '6 mo') echo"checked"; ?> >  6 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration" value='9 mo'   <? if($dbarr[duration]== '9 mo') echo"checked"; ?> >  9 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration" value='12 mo'   <? if($dbarr[duration]== '12 mo') echo"checked"; ?> >  12 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration" value='18 mo'   <? if($dbarr[duration]== '18 mo') echo"checked"; ?> >  18 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration" value='24 mo'   <? if($dbarr[duration]== '24 mo') echo"checked"; ?> >  24 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration" value='36 mo'   <? if($dbarr[duration]== '36 mo') echo"checked"; ?> >  36 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration" value='48 mo'   <? if($dbarr[duration]== '48 mo') echo"checked"; ?> >  48 mo  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="duration" value='60 mo'   <? if($dbarr[duration]== '60 mo') echo"checked"; ?> >  60 mo  &nbsp;&nbsp;&nbsp;
                    </td>
              </tr>
              <tr>
                   <th align="left">Treatment</th>
                   <td colspan="3">
                   <input type="radio" name="treatment" value='Imatinib'   <? if($dbarr[treatment]== 'Imatinib') echo"checked"; ?> >  Imatinib  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment" value='Nilotinib'   <? if($dbarr[treatment]== 'Nilotinib') echo"checked"; ?> >   Nilotinib  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment" value='Dasatinib'   <? if($dbarr[treatment]== 'Dasatinib') echo"checked"; ?> >   Dasatinib  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment" value='Hydroxyurea'   <? if($dbarr[treatment]== 'Hydroxyurea') echo"checked"; ?> >   Hydroxyurea  &nbsp;&nbsp;&nbsp;
                   </td>
               </tr>
               <tr>
               <th align="left">Daily dose</th>
				<td>
                <input type="text" name="daily_dose" size="3" value="<? echo "$dbarr[daily_dose]"; ?>" maxlength="3" />  mg
                </td>
                <th align="left">Spleen size</th>
                <td>
                <input type="text" name="spleen_size" size="3" value="<? echo "$dbarr[spleen_size]"; ?>" maxlength="3" />  cm Below left  costal margin
                </td>
               </tr>
               <tr>
               <th  align="center" colspan="4"><font color="#0000FF" size="+1">Hematology lab</font></th>
               </tr>    
               <tr>
               <th align="left">Hb :</th>
               <td><input type="text" name="hb"  value="<? echo "$dbarr[hb]"; ?>" maxlength="4" />    g/dL</td>
               <th align="left">WBC count  :</th>
               <td><input type="text" name="wbc" value="<? echo "$dbarr[wbc]"; ?>" maxlength="5" />   x 103/?L</td>
               </tr>
               <tr>
               <th align="left">Platelet count  </th>
               <td><input type="text" name="platelet_count" value="<? echo "$dbarr[platelet_count]"; ?>" maxlength="5" />   x 103/?L</td>
               <th align="left">% Basophil  :</th>
               <td><input type="text" name="basophil" value="<? echo "$dbarr[basophil]"; ?>" maxlength="2" /></td>
               </tr>
               <tr>
               <th align="left">Eosinophil :</th>
               <td><input type="text" name="eosinophil" value="<? echo "$dbarr[eosinophil]"; ?>" maxlength="2" /></td>
               <th align="left">Blast cell :</th>
               <td><input type="text" name="blast_cell" value="<? echo "$dbarr[blast_cell]"; ?>" maxlength="2" /></td>     
               </tr>    
               <tr>
               <th align="center" colspan="4"><font color="#0000FF" size="+1">Cytogenetic study</font></th>
               </tr>
               <tr>
               <th align="left">Result </th>
               <td colspan="3"><input type="text" name="result_p2" value="<? echo "$dbarr[result_p2]"; ?>"  size="100" /></td>
               </tr>
               <tr>
               <th align="left"> % Ph chromosome :</th>
               <td colspan="3">
               <input type="text" name="ph_chromosome_p2" value="<? echo "$dbarr[ph_chromosome_p2]"; ?>" maxlength="5"/> / 
                        Number of metaphase  &nbsp; <input type="text" name="number_metaphase_p2" value="<? echo "$dbarr[number_metaphase_p2]"; ?>" maxlength="3"  />  
               </td>
               </tr>
               <tr>
               <th align="left">Additional chromosome abnormality :</th>
               <td colspan="3">
                 		<input type="radio" name="add_chrom_p2" value='No'   <? if($dbarr[add_chrom_p2]== 'No') echo"checked"; ?> > No&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="add_chrom_p2" value='Yes'   <? if($dbarr[add_chrom_p2]== 'Yes') echo"checked"; ?> > Yes&nbsp;&nbsp;&nbsp; 
               </td>
               </tr>
               <tr>
               <th align="left">RQ-PCR for BCR-ABL transcription level  :</th>
               <td colspan="3"><input type="text" name="rq_pcr" value="<? echo "$dbarr[rq_pcr]"; ?>" maxlength="5" />  &nbsp; % (IS)</td>
               </tr>               
               <tr>
               <th align="left">Response of treatment  :</th>
               <td colspan="3"><BR />
               <input type="radio" name="re_treatment_p2" value="<? echo "$dbarr[re_treatment_p2]"; ?>"  />  Non CHR, and/or Ph+ >95%  <BR /><BR />
               <input type="radio" name="re_treatment_p2" value="<? echo "$dbarr[re_treatment_p2]"; ?>"  />  BCR-ABL1 >10%, and/or Ph+ 36-95%  <BR /><BR />
               <input type="radio" name="re_treatment_p2" value="<? echo "$dbarr[re_treatment_p2]"; ?>"  />   <?  echo "BCR-ABL1 <10%, and/or Ph+ <35%";?>  <BR /><BR />
               <input type="radio"  name="re_treatment_p2"  value="<? echo "$dbarr[re_treatment_p2]"; ?>" />  BCR-ABL1 1-10%, and/or Ph+ 1-35%  <BR /><BR />
               <input type="radio" name="re_treatment_p2" value="<? echo "$dbarr[re_treatment_p2]"; ?>"  />  <? echo "BCR-ABL1 <1%, and/or Ph+ 0%";?>  <BR /><BR />
               <input type="radio" name="re_treatment_p2" value="<? echo "$dbarr[re_treatment_p2]"; ?>"  />    <? echo "BCR-ABL1 <0.1%";?>  <BR /><BR />
               <input type="radio" name="re_treatment_p2" value="<? echo "$dbarr[re_treatment_p2]"; ?>"  />    MR4 <BR /><BR />
               <input type="radio" name="re_treatment_p2" value="<? echo "$dbarr[re_treatment_p2]"; ?>"  />   MR4.5 <BR /><BR />
               <input type="radio" name="re_treatment_p2" value="<? echo "$dbarr[re_treatment_p2]"; ?>"  />  Molecularly undetectable leukemia  <BR />
               </td> 
               </tr>            
               <tr>
               <th align="left">Is the previous treatment continued? </th>
               <td colspan="3">
               <input type="radio" name="p_treatment_c" value='No'   <? if($dbarr[p_treatment_c]== 'No') echo"checked"; ?> > No&nbsp;&nbsp;&nbsp;
               <input type="radio" name="p_treatment_c" value='Yes'   <? if($dbarr[p_treatment_c]== 'Yes') echo"checked"; ?> > Yes&nbsp;&nbsp;&nbsp; 
               </td>
               </tr>
               <tr>
               		<th align="left">Change of treatment</th>
                    <td  colspan="3">
                    <input type="radio" name="change_treatment"  value='No'   <? if($dbarr[change_treatment]== 'No') echo"checked"; ?> > No &nbsp;&nbsp;&nbsp;
               		<input type="radio" name="change_treatment"   value='Yes'  <? if($dbarr[change_treatment]== 'Yes') echo"checked";  ?>onclick="show_post(this.value);" > Yes&nbsp;&nbsp;&nbsp; 
                    <table width="500" border="0" cellpadding="0" cellspacing="0" id="post1" style="display:none">
				<tr>
				<td>
       	   			<input type="text"  id="date_change_treatment"  name="date_change_treatment" value="<? echo "$dbarr[date_change_treatment]"; ?>" size="8"  maxlength="10" />  (dd/mm/2500)  <br /><br />
               <? // หมายเหตุ ?>     
                 <strong>   specify  :</strong>  &nbsp;&nbsp;  <input type="text" name="specify_tr" value="<? echo "$dbarr[specify_tr]"; ?>" size="50"  />
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_post(id) {
						if(id == "Yes") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("post1").style.display = "";
						document.getElementById("post2").style.display = "none";
						} else if(id == "No") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
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
                    <input type="radio" name="reason_chang" value='Adverse event'   <? if($dbarr[reason_chang]== 'Adverse event') echo"checked"; ?> >  Adverse event <br /><br />
                    <input type="radio" name="reason_chang" value='Serious adverse event'   <? if($dbarr[reason_chang]== 'Serious adverse event') echo"checked"; ?> >  Serious adverse event<br /><br />
                    <input type="radio" name="reason_chang" value='No effective cytoreduction'   <? if($dbarr[reason_chang]== 'No effective cytoreduction') echo"checked"; ?> >  No effective cytoreduction<br /><br />
                    <input type="radio" name="reason_chang" value='No response even at adequate dose'   <? if($dbarr[reason_chang]== 'No response even at adequate dose') echo"checked"; ?> >  No response even at adequate dose <br /><br />
                    <input type="radio" name="reason_chang" value='Others'   <? if($dbarr[reason_chang]== 'Others') echo"checked"; ?>onclick="reason_post(this.value);" >  Others <br />
                       <table width="350" border="0" cellpadding="0" cellspacing="0" id="reason1" style="display:none">
				<tr>
				<td><strong>specify :</strong>
       	   			<input type="text"   name="specify_reson" value="<? echo "$dbarr[specify_reson]"; ?>" size="20"  /> <br />
                </td>
				</tr>
				</table>
                  </td>
               </tr>
					<script language="javascript">
						function reason_post(id) {
						if(id == "Others") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("reason1").style.display = "";
						document.getElementById("reason2").style.display = "none";
						} else if(id != "Others") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("reason1").style.display = "none";
						document.getElementById("reason2").style.display = "";
						}
						}
				</script> 
                <tr>
                		<th align="left">Progression to AP/BP</th>
                        <td colspan="3">
                        <input type="radio" name="progress_ap" value='No'   <? if($dbarr[progress_ap]== 'No') echo"checked"; ?> > No&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="progress_ap" value='Yes'   <? if($dbarr[progress_ap]== 'Yes') echo"checked"; ?> > Yes&nbsp;&nbsp;&nbsp; 
                        </td>
                </tr>
                
                
                

                
                  <tr>
                  <th colspan="4" align="center">    
                             <input name="id" type="hidden" id="id" value="<?php echo "$dbarr[id]" ; ?>">
                <input type="submit" name="Submit" value="Update Data" size="20">
                        </td>
                  </tr>
              </table>
               
      <?php
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
			$dbarr = mysql_fetch_array($result) ;
			$member_id = $dbarr['member_id'];
?><input name="member_id" type="hidden" id="member_id" size="10"  value="<? echo $member_id; ?>">

       </form>
	
			
              </center>
                </p>
                </div>
			
			<!-- sidebar -->
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
		<? include "modules/index/footer.php"; ?>