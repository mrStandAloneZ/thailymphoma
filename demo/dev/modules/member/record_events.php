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
								$('#date_ass_p15_follow6').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_ass_1_p15_follow6').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_jakv61_p15_follow6').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_jak2_p15_follow6').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_calr_p15_follow6').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_other_p15_follow6').calendarsPicker({calendar: $.calendars.instance('thai','th')});
										
							});
				</script>
<!-- main content -->
			<div id="center">
				<h1>CONCLUSION OF EVENTS</h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=follow_up6mo_4_update" method="post" onSubmit="return check();"  enctype="multipart/form-data">
           		<table width="100%" border="0" align="center">
                 <tr>
                    <th align="left" width="33%"><strong>Centre : </strong></th>
                       <th align="left" width="22%"><strong><input  name="centre"  value="<? echo $dbarr[centre];?>"  size="10"  readonly="readonly"/> </strong></th>
                    <th align="left" width="17%"><strong>Subject : </strong></th>
                    <td width="28%" align="left"><strong><input type="text" name="subject"  size="5" value="<? echo "$dbarr[subject]" ; ?>" readonly /></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Patient Initials :</th>
                    <td align="left" colspan="3"> <input type="text" name="patient_initials" size="20"   value="<? echo "$dbarr[patient_initials]" ; ?>" maxlength="2" readonly="readonly" />     </td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Date of Assessment: </th>
                    <td align="left" colspan="3"> <input type="text" name="date_ass_p15_follow6" id="date_ass_p15_follow6" size="20" value="<? echo "$dbarr[date_ass_p15_follow6]" ; ?>"/>   (วัน / เดือน / พ.ศ.)  </td>
                  </tr>
                   </table>		
                 
                
                <table width="100%" border="0" align="center">
                <tr>
                	<th align="center"> <br />Event<br /><br /></th>
                    <th align="center"> <br />Event date<br /><br /></th>
                    <th align="center"> <br />Remarks<br /><br /></th>
                </tr>
                
              
             
              <tr>
                	<th align="left"> <br />
                  		<input type="checkbox" name="jakv61_p15_follow6" value="Leukemic transformation" <? if($dbarr[jakv61_p15_follow6]== 'Leukemic transformation') echo"checked"; ?> />	Leukemic transformation<br /><br /></th>
                  <td align="center">
                  <input type="text" name="date_other_p15_follow6" id="date_other_p15_follow6" size="10" value="<? echo "$dbarr[date_other_p15_follow6]" ; ?>"/>
                  	</td>
                  <td align="center"></td>
                </tr>
                
                  <tr>
                	<th align="left"> <br />
                  		<input type="checkbox" name="jak2_p15_follow6" value="Thrombosis" <? if($dbarr[jak2_p15_follow6]== 'Thrombosis') echo"checked"; ?> />  Thrombosis<br /><br /></th>
                  <td align="center">
                   <input type="text" name="date_other_p15_follow6" id="date_other_p15_follow6" size="10" value="<? echo "$dbarr[date_other_p15_follow6]" ; ?>"/>
                  </td>
                   <td align="center"> </td>
                </tr>
                
                <tr>
                	<th align="left"> <br />
                  		<input type="checkbox" name="calr_p15_follow6" value="Haemorrhage" <? if($dbarr[calr_p15_follow6]== 'Haemorrhage') echo"checked"; ?> /> Haemorrhage<br /><br /></th>
                  <td align="center"> 
                   <input type="text" name="date_other_p15_follow6" id="date_other_p15_follow6" size="10" value="<? echo "$dbarr[date_other_p15_follow6]" ; ?>"/>
                  </td>
                  <td align="center"></td>

                </tr>
                <tr>
                	<th align="left"> <br />
                  		<input type="checkbox" name="other_p15_follow6" value="Death" <? if($dbarr[other_p15_follow6]== 'Death') echo"checked"; ?> /> Death<br /><br />
                 	</th>
                  <td align="center">
                    <input type="text" name="date_other_p15_follow6" id="date_other_p15_follow6" size="10" value="<? echo "$dbarr[date_other_p15_follow6]" ; ?>"/>
                  </td>
                  <td align="center"></td>
                  
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