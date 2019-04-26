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
								$('#date_assessment').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_start').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_transplantation').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								
								$('#mybirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_of_diagnosis').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_assesment_pmf').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								
							});
				</script>
<!-- main content -->
			<div id="center">
				<h1>VISIT 1 (SCREENING) DIAGNOSIS CRITERIA FOR PRIMARY MYELOFIBROSIS (PMF) WHO 2008</h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=pmf_update" method="post" onSubmit="return check();"  enctype="multipart/form-data">
           		<table width="100%" border="0" align="center">
                 <tr>
                    <th align="left" width="33%"><strong>Centre : </strong></th>
                       <th align="left" width="22%"><strong><input name="centre"  value="<? echo $dbarr[centre];?>"  size="10"  readonly="readonly"/> </strong></th>
                    <th align="left" width="17%"><strong>Subject : </strong></th>
                     
			
                    <td width="28%"><strong><input type="text" name="subject"  size="5" value="<? echo "$dbarr[subject]" ; ?>" readonly /></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Patient Initials :</th>
                    <td colspan="3"> <input type="text" name="patient_initials" size="20"   value="<? echo "$dbarr[patient_initials]" ; ?>" maxlength="2" readonly="readonly" />     </td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Date of Assessment: </th>
                    <td colspan="3"> <input type="text" name="date_assesment_pmf" id="date_assesment_pmf" size="20" value="<? echo "$dbarr[date_assesment_pmf]" ; ?>"/>     </td>
                  </tr>
                   </table>		
                  
                  <table>
                  <tr>
                  <th colspan="4">Diagnosis of Primary Myelofibrosis requires the presence of 1+2+3 plus any 2 of numbers 4-7</th>
                  </tr>
             		<tr>
                    <th width="37" align="center">1.</th>
                    <td  colspan="2"  ><font size="3"> Presence of megakaryocyte proliferation and atypiaa, usually accompanied by either reticulin and/or collagen fibrosis, 
or, in the absence of significant fibrosis, the megakaryocyte changes must be accompanied by an increased bone marrow cellularity characterized by granulocytic proliferation and often decreased erythropoiesis (ie, prefibrotic cellular-phase disease)</font>
              </td>
                    <td width="100" > 
                     <input type="radio" name="diano_pri_1"  value="No"  <? if($dbarr[diano_pri_1]== 'No') echo"checked"; ?>   />  No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="radio" name="diano_pri_1"   value="Yes"  <? if($dbarr[diano_pri_1]== 'Yes') echo"checked"; ?>   />  Yes  <br />
                    </td>
                  </tr>
          	<tr>
                    <th width="37" align="center">2.</th>
                    <td  colspan="2"  ><font size="3"> Not meeting WHO criteria for Polycythemia Verab, BCR-ABL1-positive chronic myelogenous leukemiac, myelodysplastic syndromed or other myeloid neoplasms</font>
              </td>
                    <td width="100" > 
                     <input type="radio" name="diano_pri_2"  value="No"  <? if($dbarr[diano_pri_2]== 'No') echo"checked"; ?>   />  No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="radio" name="diano_pri_2"   value="Yes"  <? if($dbarr[diano_pri_2]== 'Yes') echo"checked"; ?>   />  Yes  <br />
                    </td>
                  </tr>       
            <tr>
                    <th width="37" align="center">3.</th>
                    <td  colspan="2"  ><font size="3">Demonstration of JAK2V617F or other clonal marker (eg. MPLW515L/K)  or,  
in the absence of a clonal marker, no evidence that bone marrow fibrosis or other changes are secondary to infection, autoimmune disorder or other chronic inflammatory condition, hairy cell leukemia or other lymphoid neoplasm, metastatic malignancy, or toxic (chronic) myelopathiese
</font>
              </td>
                    <td width="100" > 
                     <input type="radio" name="diano_pri_3"  value="No"  <? if($dbarr[diano_pri_3]== 'No') echo"checked"; ?>   />  No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="radio" name="diano_pri_3"   value="Yes"  <? if($dbarr[diano_pri_3]== 'Yes') echo"checked"; ?>   />  Yes  <br />
                    </td>
                  </tr>
               <tr>
                    <th width="37" align="center">4.</th>
                    <td  colspan="2"  ><font size="3">Leukoerythroblastosisf</font>
              </td>
                    <td width="100" > 
                     <input type="radio" name="diano_pri_4"  value="No"  <? if($dbarr[diano_pri_4]== 'No') echo"checked"; ?>   />  No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="radio" name="diano_pri_4"   value="Yes"  <? if($dbarr[diano_pri_4]== 'Yes') echo"checked"; ?>   />  Yes  <br />
                    </td>
                  </tr>        
                    <tr>
                    <th width="37" align="center">5.</th>
                    <td  colspan="2"  ><font size="3">Increase in serum lactate dehydrogenase levelf</font>
              </td>
                    <td width="100" > 
                     <input type="radio" name="diano_pri_5"  value="No"  <? if($dbarr[diano_pri_5]== 'No') echo"checked"; ?>   />  No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="radio" name="diano_pri_5"   value="Yes"  <? if($dbarr[diano_pri_5]== 'Yes') echo"checked"; ?>   />  Yes  <br />
                    </td>
                  </tr>                     
                    <tr>
                    <th width="37" align="center">6.</th>
                    <td  colspan="2"  ><font size="3">Anemiaf</font>
              </td>
                    <td width="100" > 
                     <input type="radio" name="diano_pri_6"  value="No"  <? if($dbarr[diano_pri_6]== 'No') echo"checked"; ?>   />  No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="radio" name="diano_pri_6"   value="Yes"  <? if($dbarr[diano_pri_6]== 'Yes') echo"checked"; ?>   />  Yes  <br />
                    </td>
                  </tr>  
                    <tr>
                    <th width="37" align="center">7.</th>
                    <td  colspan="2"  ><font size="3">Splenomegalyf</font>
              </td>
                    <td width="100" > 
                     <input type="radio" name="diano_pri_7"  value="No"  <? if($dbarr[diano_pri_7]== 'No') echo"checked"; ?>   />  No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="radio" name="diano_pri_7"   value="Yes"  <? if($dbarr[diano_pri_7]== 'Yes') echo"checked"; ?>   />  Yes  <br />
                    </td>
                  </tr>           
                  
               </table>

                  <tr>
                  <th colspan="4" align="center">    
                  <br /><br />
                             <input name="id" type="hidden" id="id" value="<?php echo "$dbarr[id]" ; ?>">
                <input type="submit" name="Submit" value="Update Data " size="20"><br />
             
                        </td>
                  </tr>  <br />
                  <table>
         <tr>
         <td align="left">
              a = Small to large megakaryocytes with an aberrant nuclear/cytoplasmic ratio and hyperchromatic, bulbous, or irrecularly folded nuclei and dense clustering.<br />
b = Requires the failure of iron replacement therapy to increase haemoglobin level to the PV range in the presence of decreased serum ferritin. Exclusion of PV is based on haemoglobin and hematocrit levels, and red cell mass measurement is not required.<br />
c = Requires the absence of BCR-ABL1<br />
d = Requires the absence of dyserythropoiesis and dysgranulopiesis<br />
e = Patients with conditions associated with rective myelofibrosis are not immune to PMF, and the diagnosis should be considered in such cases if other criteria are met.<br />
f = Degree of  abnormality could be borderline or marked<br />
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