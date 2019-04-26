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
$result = mysql_query("select * from ".TB_EVENT." where id='$id' order by id DESC") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;    			

?>
	<div id="center">
				<h1><center><font color="#FF3300">Adverse  Event  Log</font><br />
                	</center>
                </h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=edit_data_add_event" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                   <table width="100%" border="0" align="center">
                 <tr>
                    <th width="26%" align="left"><strong>Centre : </strong></th>
                    <td width="35%"><input  type="text" name="centre"  readonly="readonly" value="<? echo "$dbarr[centre]" ; ?>" readonly /> </td>
                    <th width="11%" align="left">Subject :</th>
                    <td width="28%"><input  type="text" name="subject"  readonly="readonly" value="<? echo "$dbarr[subject]" ; ?>"  readonly /> </td>
                  </tr>
                   <tr>
                    <th align="left">Patient  Initials :</th>
                    <td colspan="3"> <input  type="text" name="patient_initials"   maxlength="2" value="<? echo "$dbarr[patient_initials]" ; ?>"  readonly="readonly" /> </td>
                  </tr>
                 <tr>
                 <th align="left"> 
                 Event Name  (Plaese give Diagnosis if known)
				</th>   	
                 <td colspan="3">
                 <input type="text" name="event_name"  value="<? echo "$dbarr[event_name]" ; ?>"   />  
                 </td>
                 </tr>
              <tr>
              <th align="left">Start date</th>
              <td><input type="date" name="start_date" value="<? echo "$dbarr[start_date]" ; ?>"   ></td>
              <th align="left">Stop date</th>
              <td><input type="date" name="stop_date" value="<? echo "$dbarr[stop_date]" ; ?>"  ></td>
              </tr>
              
              <tr>
              <th align="left">SAE </th>
              <td colspan="3">												
              <input type="radio" name="sae" value="No" <? if($dbarr[sae]== 'No') echo"checked"; ?>   >  No
              <input type="radio" name="sae" value="Yes" <? if($dbarr[sae]== 'Yes') echo"checked"; ?>   >  Yes
              </td>
              </tr>
          <tr>
              <th align="left">Cocomitant Medication given? </th>
              <td colspan="3"> 												
              <input type="radio" name="cocomitant" value="No" <? if($dbarr[cocomitant]== 'No') echo"checked"; ?>   >  No
              <input type="radio" name="cocomitant" value="Yes" <? if($dbarr[cocomitant]== 'Yes') echo"checked"; ?>   >  Yes
              </td>
              </tr> 
              <tr>
              <th align="left">Severity</th>
              <td>
               <input type="radio" name="severity" value="Mild"  <? if($dbarr[severity]== 'Mild') echo"checked"; ?>   >  Mild  &nbsp;&nbsp;&nbsp;
              <input type="radio" name="severity" value="Moderate"  <? if($dbarr[severity]== 'Moderate') echo"checked"; ?>  >  Moderate  &nbsp;&nbsp;&nbsp;
              <input type="radio" name="severity" value="Severe" <? if($dbarr[severity]== 'Severe') echo"checked"; ?>   >  Severe  &nbsp;&nbsp;&nbsp;
              </td>
              <th align="left">Action</th>
              <td><br>
              <input type="radio" name="action" value="None"    <? if($dbarr[action]== 'None') echo"checked"; ?>    >  None  <br><br>
              <input type="radio" name="action" value="Temporarily Interupted" <? if($dbarr[action]== 'Temporarily Interupted') echo"checked"; ?>  >  Temporarily Interupted   <br><br>
              <input type="radio" name="action" value="Permanent  Withdrawn"  <? if($dbarr[action]== 'Permanent  Withdrawn') echo"checked"; ?>   >  Permanent   Withdrawn
  <br><br>
              </td>
              </tr>
              <tr>
              <th align="left">Out come </th>
              <td colspan="3">
              <br>
              <input type="radio" name="outcome" value="Resolved" <? if($dbarr[outcome]== 'Resolved') echo"checked"; ?>   >  Resolved  <br><br>
              <input type="radio" name="outcome" value="Resolved with sequelae" <? if($dbarr[outcome]== 'Resolved with sequelae') echo"checked"; ?>  >  Resolved with sequelae<br><br>
              <input type="radio" name="outcome" value="Not resolved" <? if($dbarr[outcome]== 'Not resolved') echo"checked"; ?>  >  Not resolved
  			<br><br>
              </td>
              </tr>
              <tr>
              <th align="left">Relaionship to current drug </th>
              <td colspan="3">
              <br>
              <input type="radio" name="relaionship" value="Definitely" <? if($dbarr[relaionship]== 'Definitely') echo"checked"; ?>    >  Definitely  <br><br>
              <input type="radio" name="relaionship" value="Probably"   <? if($dbarr[relaionship]== 'Probably') echo"checked"; ?>  >  Probably    <br><br>

              <input type="radio" name="relaionship" value="Possibly"  <? if($dbarr[relaionship]== 'Possibly') echo"checked"; ?> >  Possibly
  <br><br>   
              <input type="radio" name="relaionship" value="Unlikely" <? if($dbarr[relaionship]== 'Unlikely') echo"checked"; ?>  >  Unlikely  <br><br>
              <input type="radio" name="relaionship" value="Not related" <? if($dbarr[relaionship]== 'Not related') echo"checked"; ?>  >  Not related
  <br><br>
              <input type="radio" name="relaionship" value="Not assessable"<? if($dbarr[relaionship]== 'Not assessable') echo"checked"; ?> >  Not assessable
  <br><br> 
              </td>
               </tr>
              
              
              
                  <tr>
                  <th colspan="4" align="center">    
                             <input name="id" type="hidden" id="id" value="<?php echo "$dbarr[id]" ; ?>">
                <input type="submit" name="Submit" value="Update Data" size="20">
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