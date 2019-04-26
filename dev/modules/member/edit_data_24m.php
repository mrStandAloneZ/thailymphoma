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
                		VISIT (24 MONTH FOLLOW UP)</center>
                </h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=edit_data_add_24m" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                   <table width="100%" border="0" align="center">
                 <tr>
                    <th width="26%" align="left"><strong>Centre : </strong></th>
                    <td width="35%"><input  type="text" name="centre"  readonly="readonly" value="<? echo "$dbarr[centre]" ; ?>"  /> </td>
                    <th width="11%" align="left">Subject :</th>
                    <td width="28%"><input  type="text" name="subject"  readonly="readonly" value="<? echo "$dbarr[subject]" ; ?>"   /> </td>
                  </tr>
                  <tr>
                    <th align="left">Patient  Initials :</th>
                    <td colspan="3"> <input  type="text" name="patient_initials" id="patient_initials"  maxlength="2" value="<? echo "$dbarr[patient_initials]" ; ?>"  readonly /> </td>
                  </tr>
              <tr>
              		<th align="left">Data  of  Assessment</th>
                    <td colspan="3">
                     <input type="text"  id="mydate" name="date_of_assessment_24m" size="8" value="<? echo "$dbarr[date_of_assessment_24m]"; ?>" maxlength="10" />  (dd/mm/2500)
                    </td>
              </tr>
              <tr>
              		<th align="left">Duration</th>
              		<td colspan="3">
                   <input type="text"  name="duration_24m" value='24 mo'   <? echo "checked"; ?> readonly />   &nbsp;&nbsp;&nbsp;
                
                    </td>
              </tr>
              <tr>
                   <th align="left">Treatment</th>
                   <td colspan="3">
                   <input type="radio" name="treatment_24m" value='Imatinib'   <? if($dbarr[treatment_24m]== 'Imatinib') echo"checked"; ?> >  Imatinib  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment_24m" value='Nilotinib'   <? if($dbarr[treatment_24m]== 'Nilotinib') echo"checked"; ?> >   Nilotinib  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment_24m" value='Dasatinib'   <? if($dbarr[treatment_24m]== 'Dasatinib') echo"checked"; ?> >   Dasatinib  &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="treatment_24m" value='Hydroxyurea'   <? if($dbarr[treatment_24m]== 'Hydroxyurea') echo"checked"; ?> >   Hydroxyurea  &nbsp;&nbsp;&nbsp;
                   </td>
               </tr>
               <tr>
               <th align="left">Daily dose</th>
				<td>
                <input type="text" name="daily_dose_24m" size="3" value="<? echo "$dbarr[daily_dose_24m]"; ?>" maxlength="3" />  mg
                </td>
                <th align="left">Spleen size</th>
                <td>
                <input type="text" name="spleen_size_24m" size="3" value="<? echo "$dbarr[spleen_size_24m]"; ?>" maxlength="3" />  cm Below left  costal margin
                </td>
               </tr>
               <tr>
               <th  align="center" colspan="4"><font color="#0000FF" size="+1">Hematology lab</font></th>
               </tr>    
               <tr>
               <th align="left">Hb :</th>
               <td><input type="text" name="hb_24m"  value="<? echo "$dbarr[hb_24m]"; ?>" maxlength="4" />    g/dL</td>
               <th align="left">WBC count  :</th>
               <td><input type="text" name="wbc_24m" value="<? echo "$dbarr[wbc_24m]"; ?>" maxlength="5" />   x 103/?L</td>
               </tr>
               <tr>
               <th align="left">Platelet count  </th>
               <td><input type="text" name="platelet_count_24m" value="<? echo "$dbarr[platelet_count_24m]"; ?>" maxlength="5" />   x 103/?L</td>
               <th align="left">% Basophil  :</th>
               <td><input type="text" name="basophil_24m" value="<? echo "$dbarr[basophil_24m]"; ?>" maxlength="2" /></td>
               </tr>
               <tr>
               <th align="left">Eosinophil :</th>
               <td><input type="text" name="eosinophil_24m" value="<? echo "$dbarr[eosinophil_24m]"; ?>" maxlength="2" /></td>
               <th align="left">Blast cell :</th>
               <td><input type="text" name="blast_cell_24m" value="<? echo "$dbarr[blast_cell_24m]"; ?>" maxlength="2" /></td>     
               </tr>    
               <tr>
               <th align="center" colspan="4"><font color="#0000FF" size="+1">Cytogenetic study</font></th>
               </tr>
               <tr>
               <th align="left">Result </th>
               <td colspan="3"><input type="text" name="result_p2_24m" value="<? echo "$dbarr[result_p2_24m]"; ?>"  size="100" /></td>
               </tr>
               <tr>
               <th align="left"> % Ph chromosome :</th>
               <td colspan="3">
               <input type="text" name="ph_chromosome_p2_24m" value="<? echo "$dbarr[ph_chromosome_p2_24m]"; ?>" maxlength="5"/> / 
                        Number of metaphase  &nbsp; <input type="text" name="number_metaphase_p2_24m" value="<? echo "$dbarr[number_metaphase_p2_24m]"; ?>" maxlength="3"  />  
               </td>
               </tr>
               <tr>
               <th align="left">Additional chromosome abnormality :</th>
               <td colspan="3">
                 		<input type="radio" name="add_chrom_p2_24m" value='No'   <? if($dbarr[add_chrom_p2_24m]== 'No') echo"checked"; ?> > No&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="add_chrom_p2_24m" value='Yes'   <? if($dbarr[add_chrom_p2_24m]== 'Yes') echo"checked"; ?> > Yes&nbsp;&nbsp;&nbsp; 
               </td>
               </tr>
               <tr>
               <th align="left">RQ-PCR for BCR-ABL transcription level  :</th>
               <td colspan="3"><input type="text" name="rq_pcr_24m" value="<? echo "$dbarr[rq_pcr_24m]"; ?>" maxlength="5" />  &nbsp; % (IS)</td>
               </tr>               
               <tr>
               <th align="left">Response of treatment  :</th>
               <td colspan="3"><BR />
               <input type="radio" name="re_treatment_p2_24m" value='Non CHR, and/or Ph+ >95%' <? if($dbarr[re_treatment_p2_24m]== 'Non CHR, and/or Ph+ >95%') echo"checked"; ?>  />  Non CHR, and/or Ph+ >95%  <BR /><BR />
               <input type="radio" name="re_treatment_p2_24m" value="BCR-ABL1 >10%, and/or Ph+ 36-95%" <? if($dbarr[re_treatment_p2_24m]== 'BCR-ABL1 >10%, and/or Ph+ 36-95%') echo"checked"; ?>   />  BCR-ABL1 >10%, and/or Ph+ 36-95%  <BR /><BR />
               <input type="radio" name="re_treatment_p2_24m" value='BCR-ABL1 <10%, and/or Ph+ <35%'  />   <?  echo "BCR-ABL1 <10%, and/or Ph+ <35%";?>  <BR /><BR />
               <input type="radio"  name="re_treatment_p2_24m"  value='BCR-ABL1 1-10%, and/or Ph+ 1-35%' />  BCR-ABL1 1-10%, and/or Ph+ 1-35%  <BR /><BR />
               <input type="radio" name="re_treatment_p2_24m" value='BCR-ABL1 <1%, and/or Ph+ 0%'  />  <? echo "BCR-ABL1 <1%, and/or Ph+ 0%";?>  <BR /><BR />
               <input type="radio" name="re_treatment_p2_24m" value='BCR-ABL1 <0.1%'  />    <? echo "BCR-ABL1 <0.1%";?>  <BR /><BR />
               <input type="radio" name="re_treatment_p2_24m" value='MR4' <? if($dbarr[re_treatment_p2_24m]== 'MR4') echo"checked"; ?>  />    MR4 <BR /><BR />
               <input type="radio" name="re_treatment_p2_24m" value='MR4.5'  />   MR4.5 <BR /><BR />
               <input type="radio" name="re_treatment_p2_24m" value='Molecularly undetectable leukemia'  />  Molecularly undetectable leukemia  <BR />
               </td> 
               </tr>            
               <tr>
               <th align="left">Is the previous treatment continued? </th>
               <td colspan="3">
               <input type="radio" name="p_treatment_c_24m" value='No'   <? if($dbarr[p_treatment_c_24m]== 'No') echo"checked"; ?> > No&nbsp;&nbsp;&nbsp;
               <input type="radio" name="p_treatment_c_24m" value='Yes'   <? if($dbarr[p_treatment_c_24m]== 'Yes') echo"checked"; ?> > Yes&nbsp;&nbsp;&nbsp; 
               </td>
               </tr>
               <tr>
               		<th align="left">Change of treatment</th>
                    <td  colspan="3">
                    <input type="radio" name="change_treatment_24m"  value='No'   <? if($dbarr[change_treatment_24m]== 'No') echo"checked"; ?> > No &nbsp;&nbsp;&nbsp;
               		<input type="radio" name="change_treatment_24m"   value='Yes'  <? if($dbarr[change_treatment_24m]== 'Yes') echo"checked";  ?>onclick="show_post(this.value);" > Yes&nbsp;&nbsp;&nbsp; 
                    <table width="500" border="0" cellpadding="0" cellspacing="0" id="post1" style="display:none">
				<tr>
				<td>
       	   			<input type="text"  id="date_change_treatment"  name="date_change_treatment_24m" value="<? echo "$dbarr[date_change_treatment_24m]"; ?>" size="8"  maxlength="10" />  (dd/mm/2500)  <br /><br />
               <? // หมายเหตุ ?>     
                 <strong>   specify  :</strong>  &nbsp;&nbsp;  <input type="text" name="specify_tr_24m" value="<? echo "$dbarr[specify_tr_24m]"; ?>" size="50"  />
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
                    <input type="radio" name="reason_chang_24m" value='Adverse event'   <? if($dbarr[reason_chang_24m]== 'Adverse event') echo"checked"; ?> >  Adverse event <br /><br />
                    <input type="radio" name="reason_chang_24m" value='Serious adverse event'   <? if($dbarr[reason_chang_24m]== 'Serious adverse event') echo"checked"; ?> >  Serious adverse event<br /><br />
                    <input type="radio" name="reason_chang_24m" value='No effective cytoreduction'   <? if($dbarr[reason_chang_24m]== 'No effective cytoreduction') echo"checked"; ?> >  No effective cytoreduction<br /><br />
                    <input type="radio" name="reason_chang_24m" value='No response even at adequate dose'   <? if($dbarr[reason_chang_24m]== 'No response even at adequate dose') echo"checked"; ?> >  No response even at adequate dose <br /><br />
                    <input type="radio" name="reason_chang_24m" value='Others'   <? if($dbarr[reason_chang_24m]== 'Others') echo"checked"; ?>onclick="reason_post(this.value);" >  Others <br />
                       <table width="350" border="0" cellpadding="0" cellspacing="0" id="reason1" style="display:none">
				<tr>
				<td><strong>specify :</strong>
       	   			<input type="text"   name="specify_reson_24m" value="<? echo "$dbarr[specify_reson_24m]"; ?>" size="20"  /> <br />
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
                        <input type="radio" name="progress_ap_24m" value='No'   <? if($dbarr[progress_ap_24m]== 'No') echo"checked"; ?> > No&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="progress_ap_24m" value='Yes'   <? if($dbarr[progress_ap_24m]== 'Yes') echo"checked"; ?> > Yes&nbsp;&nbsp;&nbsp; 
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
				$date_of_assessment_24m = $dbarr[date_of_assessment_24m];
				$duration_24m = $dbarr[duration_24m];
				$treatment_24m = $dbarr[treatment_24m];
				$daily_dose_24m = $dbarr[daily_dose_24m];
				$spleen_size_24m = $dbarr[spleen_size_24m];
				$hb_24m = $dbarr[hb_24m];
				$wbc_24m = $dbarr[wbc_24m];
				$platelet_count_24m = $dbarr[platelet_count_24m];
				$basophil_24m = $dbarr[basophil_24m];
				$eosinophil_24m = $dbarr[eosinophil_24m];
				$blast_cell_24m = $dbarr[blast_cell_24m];
				$result_p2_24m = $dbarr[result_p2_24m];
				$ph_chromosome_p2_24m = $dbarr[ph_chromosome_p2_24m];
				$number_metaphase_p2_24m = $dbarr[number_metaphase_p2_24m];
				$add_chrom_p2_24m = $dbarr[add_chrom_p2_24m];
				$rq_pcr_24m = $dbarr[rq_pcr_24m];
				$re_treatment_p2_24m = $dbarr[re_treatment_p2_24m];
				$p_treatment_c_24m = $dbarr[p_treatment_c_24m];
				$change_treatment_24m = $dbarr[change_treatment_24m];
				$reason_chang_24m = $dbarr[reason_chang_24m];
				$progress_ap_24m = $dbarr[progress_ap_24m];
				$status_24mo = $dbarr[status_24mo];

?>
			<?  
			
			if($date_of_assessment_24m != "" && $duration_24m != "" && $treatment_24m != "" && $daily_dose_24m !="" && $spleen_size_24m !="" && $hb_24m !="" && $wbc_24m !="" && $platelet_count_24m !="" && $basophil_24m !="" && $eosinophil_24m !="" &&  $blast_cell_24m !="" && $result_p2_24m !=""  && $ph_chromosome_p2_24m != ""  && $number_metaphase_p2_24m != "" && $add_chrom_p2_24m != "" && $rq_pcr_24m !="" && $re_treatment_p2_24m !="" && $p_treatment_c_24m !=""  &&  $reason_chang_24m !="" && $progress_ap_24m !="" ){
					echo"<a href=\"?name=member&file=edit_data_status_24m&id=$id\"><b>APPROVE CLICK </b></a>";
						} else {   	
						
							}   
			?>  
            </td>
            </tr>
              </table>
               
      <?php
			$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
			$dbarr = mysql_fetch_array($result) ;
			$member_id = $dbarr['member_id'];
?><input name="member_id" type="hidden" id="member_id" size="10"  value="<? echo $member_id; ?>">
<script language="javascript">

function check() {
if(document.checkForm.date_of_assessment_24m.value==0) {
alert("กรุณากรอก Data  of  Assessment  ") ;
document.checkForm.date_of_assessment_24m.focus() ;
return false ;
}
else 
return true ;
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
		<? include "modules/index/footer.php"; ?>