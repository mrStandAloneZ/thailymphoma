<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
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
				<h1>Edit Pathology Consensus</h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=pathology_update" method="post" onSubmit="return check();"  enctype="multipart/form-data">
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
                    <td align="left" > <input type="text" name="patient_initials" size="10"   value="<? echo "$dbarr[patient_initials]" ; ?>" maxlength="2" readonly="readonly" />     </td>
                      <th align="left" >HN :  </th>
                    <td align="left" > <br />
                <input type="text" name="hn"   value="<? echo "$dbarr[hn]"; ?>"  size="10" readonly="readonly"/><br /><br />
                     </td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Gender : </th>
                    <td align="left" > <br />
                      <input type="text"   name="sex" size="10" value="<? echo "$dbarr[sex]"; ?>"  readonly="readonly" >  <br /><br />
                     </td>
                        <th align="left" >Date of record start:   </th>
                    <td align="left" > <br />
               			<input type="text" name="date_of_record" size="10"  value="<? echo "$dbarr[date_of_record]"; ?>" readonly="readonly"/><br /><br />   
                     </td>
                  </tr>
                   </table>		
                   
				<table width="100%" border="0" align="center">
             
           
               <tr>
                    <th align="left"  colspan="2"><br /><font size="+1" > Lymphoma Database </font><br /><br /></th>
                  </tr>
                  
               <tr>
          			<th width="33%"  align="left"><br /> Date of biopsy report :<br /><Br /></th>
          			<td width="67%" align="left">
          				<input type="text" name="date_bio_report" size="10"  value="<? echo "$dbarr[date_bio_report]"; ?>" id="date_bio_report" />          (Example: 31-12-(พ.ศ.)2500)</td>
        	</tr>
                  <tr>
          			<th width="33%"  align="left"><br /> Pathology No :<br /><Br /></th>
          			<td width="67%" align="left">
          				<input type="text" name="pathology" size="10"  value="<? echo "$dbarr[pathology]"; ?>" />       (Example: SP47-0007/47 = SP47000747)   </td>
        	</tr>
                   <tr>
          			<th width="33%"  align="left"><br />  Biopsy site :<br /><Br /></th>
          			<td width="67%" align="left">
          				<input type="text" name="biopsy_site" size="10"  value="<? echo "$dbarr[biopsy_site]"; ?>" />     </td>
        	</tr>
                <tr>
                    <th align="left">Type:</th>
                    <td colspan="3" > <br />
                    <input type="radio" name="type"  value="Done" <? if($dbarr[type]== 'Done') echo"checked"; ?>  > Hodgkin lymphoma (HL)	<br /><br />
					<input type="radio"   name="type" value="Unknown"  onclick="show_type(this.value);"  <? if($dbarr[type]== 'Unknown') echo"checked"; ?> >   Non-Hodgkin lymphoma (NHL) <br /><br />
                    
                             <table width="500" border="0" cellpadding="0" cellspacing="0" id="type1" style="display:none">
				<tr>
				<td>
                  &nbsp;&nbsp;   <input type="radio" name="type_sub_non"   value="WHO classification"  <? if($dbarr[type_sub_non]== 'WHO classification') echo"checked"; ?> >  WHO classification  <br /><br />
                    &nbsp;&nbsp;   <input type="radio" name="type_sub_non"   value="Working formulation"  <? if($dbarr[type_sub_non]== 'Working formulation') echo"checked"; ?> >  Working formulation  <br /><br />
                    &nbsp;&nbsp;   <input type="radio" name="type_sub_non"   value="99 Other type" <? if($dbarr[type_sub_non]== '99 Other type') echo"checked"; ?> >  99 Other type  <br /><br />
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_type(id) {
						if(id == "Unknown") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("type1").style.display = "";
						document.getElementById("type2").style.display = "none";
						} else if(id != "Unknown") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("type1").style.display = "none";
						document.getElementById("type2").style.display = "";
						}
						}
				</script> 
                 
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