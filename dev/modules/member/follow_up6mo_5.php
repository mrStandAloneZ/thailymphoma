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
								$('#date_ass_p16_follow6').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#prc_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#ery_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#danazol_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#oyx_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#pre_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#thal_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#len_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#hyd_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#jak2_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#splenic_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#allo_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#other_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});				
								$('#spl_date_p10').calendarsPicker({calendar: $.calendars.instance('thai','th')});						
								$('#stop_date1').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date2').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date3').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date4').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date5').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date6').calendarsPicker({calendar: $.calendars.instance('thai','th')});			
								$('#stop_date7').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date8').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date9').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date10').calendarsPicker({calendar: $.calendars.instance('thai','th')});		
								$('#stop_date11').calendarsPicker({calendar: $.calendars.instance('thai','th')});											
										
							});
				</script>
<!-- main content -->
			<div id="center">
				<h1>VISIT (FOLLOW UP) : TREATMENT q 6 mo</h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=follow_up6mo_5_update" method="post" onSubmit="return check();"  enctype="multipart/form-data">
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
                    <td colspan="3"> <input type="text" name="date_ass_p16_follow6" id="date_ass_p16_follow6" size="20" value="<? echo "$dbarr[date_ass_p16_follow6]" ; ?>"/>   (วัน / เดือน / พ.ศ.)  </td>
                  </tr>
                   </table>		
                  	<table width="100%" border="0" align="center">
                  <tr>
                  <th  colspan="4" align="center"><br /><font size="+1">Update treatment </font><br /><br /></th>
                  </tr>
				<TR>
                	<th><br />Medication<br /></th>
                    <th><br />Start date (วัน/เดือน/พ.ศ.)<br /></th>
                    <th><br />Continue <br /> Y/ N<br /></th>
                    <th><br />Stop (วัน / เดือน / พ.ศ.) <br /> with reason<br /></th>
                </TR>
                <tr>
                	<td>    <br />
                      <input type="checkbox" name="prc_p10"  value="PRC transfusion"  <? if($dbarr[prc_p10]== 'PRC transfusion') echo"checked"; ?>   />  1. PRC transfusion  <br /><BR />
                    </td>
                	<td>  <input type="text" name="prc_date_p10" id="prc_date_p10" size="20" value="<? echo "$dbarr[prc_date_p10]" ; ?>"/>   </td>
                    <td>  
                    <input type="radio" name="y1_p16_follow6" value="Yes"  <? if($dbarr[y1_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y1_p16_follow6" value="No"  <? if($dbarr[y1_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate1_p16_follow6" id="stop_date1" size="10" value="<? echo "$dbarr[stopdate1_p16_follow6]" ; ?>"/></td>
                    
                </tr>
                <tr>
                		<td> <br /><input type="checkbox" name="ery_p10"  value="Erythropoiesis stimulating agents"  <? if($dbarr[ery_p10]== 'Erythropoiesis stimulating agents') echo"checked"; ?>   /> 
                        2. Erythropoiesis stimulating agents Type ,  <input type="text" name="ery_type_p10"  size="20" value="<? echo "$dbarr[ery_type_p10]" ; ?>"/>  <br /><br />
                        </td>
                        <td> <input type="text" name="ery_date_p10" id="ery_date_p10" size="20" value="<? echo "$dbarr[ery_date_p10]" ; ?>"/></td>
                            <td>  
                    <input type="radio" name="y2_p16_follow6" value="Yes"  <? if($dbarr[y2_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y2_p16_follow6" value="No"  <? if($dbarr[y2_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate2_p16_follow6" id="stop_date2" size="10" value="<? echo "$dbarr[stopdate2_p16_follow6]" ; ?>"/></td>
                </tr>
                
                <tr>
                	<td>
                    <input type="checkbox" name="andro_p10"  value="Androgen"  <? if($dbarr[andro_p10]== 'Androgen') echo"checked"; ?>   />  
                    3. Androgen  <br /><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="danazol_p10"  value="Danazol"  <? if($dbarr[danazol_p10]== 'Danazol') echo"checked"; ?>   />  Danazol   <br /><br />				 &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="oyx_p10"  value="Oxymetholone"  <? if($dbarr[oyx_p10]== 'Oxymetholone') echo"checked"; ?>   />  Oxymetholone  <br /><br />
                    </td>
                    <td> <br /><br />
                      <input type="text" name="danazol_date_p10" id="danazol_date_p10" size="20" value="<? echo "$dbarr[danazol_date_p10]" ; ?>"/>  <br /><br />
                      <input type="text" name="oyx_date_p10" id="oyx_date_p10" size="20" value="<? echo "$dbarr[oyx_date_p10]" ; ?>"/>  <br /><br />
                    </td>
                        <td>  
                    <input type="radio" name="y3_p16_follow6" value="Yes"  <? if($dbarr[y3_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y3_p16_follow6" value="No"  <? if($dbarr[y3_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate3_p16_follow6" id="stop_date3" size="10" value="<? echo "$dbarr[stopdate3_p16_follow6]" ; ?>"/></td>
                </tr>
                
                <tr>
                	<td> <br /><input type="checkbox" name="pre_p10"  value="Prednisolone"  <? if($dbarr[pre_p10]== 'Prednisolone') echo"checked"; ?>   />  
                    4.  Prednisolone  <br /><br /></td>
                    <td><input type="text" name="pre_date_p10" id="pre_date_p10" size="20" value="<? echo "$dbarr[pre_date_p10]" ; ?>"/> </td>
                    <td>  
                    <input type="radio" name="y4_p16_follow6" value="Yes"  <? if($dbarr[y4_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y4_p16_follow6" value="No"  <? if($dbarr[y4_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate4_p16_follow6" id="stop_date4" size="10" value="<? echo "$dbarr[stopdate4_p16_follow6]" ; ?>"/></td>
                </tr>
                
                <tr>
                	<td> <br /><input type="checkbox" name="imm_p10"  value="Immunomodulatory drugs"  <? if($dbarr[imm_p10]== 'Immunomodulatory drugs') echo"checked"; ?>   />  
                    5.  Immunomodulatory drugs  <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="thal_p10"  value="Thalidomide"  <? if($dbarr[thal_p10]== 'Thalidomide') echo"checked"; ?>   />  
                    Thalidomide			<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="len_p10"  value="Lenalidomide"  <? if($dbarr[len_p10]== 'Lenalidomide') echo"checked"; ?>   />  
                    Lenalidomide
                    
                    </td>
                    <td> <br /><br />
                    <input type="text" name="thal_date_p10" id="thal_date_p10" size="20" value="<? echo "$dbarr[thal_date_p10]" ; ?>"/> <br /><br />
                    <input type="text" name="len_date_p10" id="len_date_p10" size="20" value="<? echo "$dbarr[len_date_p10]" ; ?>"/> 
                    </td>
                        <td>  
                    <input type="radio" name="y5_p16_follow6" value="Yes"  <? if($dbarr[y5_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y5_p16_follow6" value="No"  <? if($dbarr[y5_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate5_p16_follow6" id="stop_date5" size="10" value="<? echo "$dbarr[stopdate5_p16_follow6]" ; ?>"/></td>
                </tr>
                 <tr>
                	<td> <br /><input type="checkbox" name="hyd_p10"  value="Hydroxyurea"  <? if($dbarr[hyd_p10]== 'Hydroxyurea') echo"checked"; ?>   />  
                    6.  Hydroxyurea  <br /><br /></td>
                    <td><input type="text" name="hyd_date_p10" id="hyd_date_p10" size="20" value="<? echo "$dbarr[hyd_date_p10]" ; ?>"/> </td>
                     <td>  
                    <input type="radio" name="y6_p16_follow6" value="Yes"  <? if($dbarr[y6_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y6_p16_follow6" value="No"  <? if($dbarr[y6_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate6_p16_follow6" id="stop_date6" size="10" value="<? echo "$dbarr[stopdate6_p16_follow6]" ; ?>"/></td>
                </tr>
                
                <tr>
                	<td> <br /><input type="checkbox" name="jak2_p10"  value="JAK2 inhibitor"  <? if($dbarr[jak2_p10]== 'JAK2 inhibitor') echo"checked"; ?>   />  
                    7.  JAK2 inhibitor  <br /><br /></td>
                    <td><input type="text" name="jak2_date_p10" id="jak2_date_p10" size="20" value="<? echo "$dbarr[jak2_date_p10]" ; ?>"/> </td>
                    <td>  
                    <input type="radio" name="y7_p16_follow6" value="Yes"  <? if($dbarr[y7_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y7_p16_follow6" value="No"  <? if($dbarr[y7_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate7_p16_follow6" id="stop_date7" size="10" value="<? echo "$dbarr[stopdate7_p16_follow6]" ; ?>"/></td>
                </tr>
                
                <tr>
                	<td> <br /><input type="checkbox" name="spl_p10"  value="Splenectomy"  <? if($dbarr[spl_p10]== 'Splenectomy') echo"checked"; ?>   />  
                    8.  Splenectomy  <br /><br /></td>
                    <td><input type="text" name="spl_date_p10" id="spl_date_p10" size="20" value="<? echo "$dbarr[spl_date_p10]" ; ?>"/> </td>
                    <td>  
                    <input type="radio" name="y8_p16_follow6" value="Yes"  <? if($dbarr[y8_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y8_p16_follow6" value="No"  <? if($dbarr[y8_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate8_p16_follow6" id="stop_date8" size="10" value="<? echo "$dbarr[stopdate8_p16_follow6]" ; ?>"/></td>
                </tr>
                
                <tr>
                	<td> <br /><input type="checkbox" name="splenic_p10"  value="Splenic irradiation"  <? if($dbarr[splenic_p10]== 'Splenic irradiation') echo"checked"; ?>   />  
                    9.  Splenic irradiation  <br /><br /></td>
                    <td><input type="text" name="splenic_date_p10" id="splenic_date_p10" size="20" value="<? echo "$dbarr[splenic_date_p10]" ; ?>"/> </td>
                    <td>  
                    <input type="radio" name="y9_p16_follow6" value="Yes"  <? if($dbarr[y9_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y9_p16_follow6" value="No"  <? if($dbarr[y9_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate9_p16_follow6" id="stop_date9" size="10" value="<? echo "$dbarr[stopdate9_p16_follow6]" ; ?>"/></td>
                </tr>
                
                  <tr>
                	<td> <br /><input type="checkbox" name="allo_p10"  value="Allo-SCT"  <? if($dbarr[allo_p10]== 'Allo-SCT') echo"checked"; ?>   />  
                    10.  Allo-SCT  <br /><br /></td>
                    <td><input type="text" name="allo_date_p10" id="allo_date_p10" size="20" value="<? echo "$dbarr[allo_date_p10]" ; ?>"/> </td>
                    <td>  
                    <input type="radio" name="y10_p16_follow6" value="Yes"  <? if($dbarr[y10_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y10_p16_follow6" value="No"  <? if($dbarr[y10_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate10_p16_follow6" id="stop_date10" size="10" value="<? echo "$dbarr[stopdate10_p16_follow6]" ; ?>"/></td>
                </tr>
                
                 <tr>
                	<td> <br /><input type="checkbox" name="other_p10"  value="Other"  <? if($dbarr[other_p10]== 'Other') echo"checked"; ?>   />  
                    11.  Other :  
                    <input type="text" name="other_text_p10" value="<? echo "$dbarr[other_text_p10]" ; ?>"/>
                    <br /><br /></td>
                    <td><input type="text" name="other_date_p10" id="other_date_p10" size="20" value="<? echo "$dbarr[other_date_p10]" ; ?>"/> </td>
                    <td>  
                    <input type="radio" name="y11_p16_follow6" value="Yes"  <? if($dbarr[y11_p16_follow6]== 'Yes') echo"checked"; ?> />  Yes  &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="y11_p16_follow6" value="No"  <? if($dbarr[y11_p16_follow6]== 'No') echo"checked"; ?> />	No
                  </td>
                    <td> <input type="text" name="stopdate11_p16_follow6" id="stop_date11" size="10" value="<? echo "$dbarr[stopdate11_p16_follow6]" ; ?>"/></td>
                </tr>
                <tr>
                <th align="center">Reason for changing treatment or dose</th>
                <td colspan="3"><br />
                	 <input type="radio" name="reason_p16_follow6" value="Adverse event"  <? if($dbarr[reason_p16_follow6]== 'Adverse event') echo"checked"; ?> /> 1 Adverse event ; specify   &nbsp;&nbsp;&nbsp;
                     <input type="text" name="adverse_textp16_follow6" size="20" value="<? echo "$dbarr[adverse_textp16_follow6]" ; ?>"/>
                       <br /><br />
					 <input type="radio" name="reason_p16_follow6" value="Ineffective treatment"  <? if($dbarr[reason_p16_follow6]== 'Ineffective treatment') echo"checked"; ?> /> 2. Ineffective treatment		<br /><br />
					 <input type="radio" name="reason_p16_follow6" value="Others"  <? if($dbarr[reason_p16_follow6]== 'Others') echo"checked"; ?> /> 3. Others, specify  	&nbsp;&nbsp;&nbsp;
                     <input type="text" name="other_textp16_follow6" size="20" value="<? echo "$dbarr[other_textp16_follow6]" ; ?>"/>
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