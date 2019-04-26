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

<!-- main content -->
			<div id="center">
				<h1><center><font color="#FF3300">Adverse  Event  Log</font><br />
                	</center>
                </h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=adverse_event_data_add" method="post" onSubmit="return check();"  enctype="multipart/form-data">
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
                 <input type="text" name="event_name"  value=""   />  
                 </td>
                 </tr>
              <tr>
              <th align="left">Start date</th>
              <td><input type="date" name="start_date" value=""  ></td>
              <th align="left">Stop date</th>
              <td><input type="date" name="stop_date" value=""  ></td>
              </tr>
              
              <tr>
              <th align="left">SAE </th>
              <td colspan="3">												
              <input type="radio" name="sae" value="No"    >  No
              <input type="radio" name="sae" value="Yes"     >  Yes
              </td>
              </tr>
          <tr>
              <th align="left">Cocomitant Medication given? </th>
              <td colspan="3"> 												
              <input type="radio" name="cocomitant" value="No"    >  No
              <input type="radio" name="cocomitant" value="Yes"   >  Yes
              </td>
              </tr> 
              <tr>
              <th align="left">Severity</th>
              <td>
               <input type="radio" name="severity" value="Mild"     >  Mild  &nbsp;&nbsp;&nbsp;
              <input type="radio" name="severity" value="Moderate"    >  Moderate  &nbsp;&nbsp;&nbsp;
              <input type="radio" name="severity" value="Severe"    >  Severe  &nbsp;&nbsp;&nbsp;
              </td>
              <th align="left">Action</th>
              <td><br>
              <input type="radio" name="action" value="Mild"     >  None  <br><br>
              <input type="radio" name="action" value="Moderate"     >  Temporarily Interupted
  <br><br>
              <input type="radio" name="action" value="Severe"    >  Permanent   Withdrawn
  <br><br>
              </td>
              </tr>
              <tr>
              <th align="left">Out come </th>
              <td colspan="3">
              <br>
              <input type="radio" name="outcome" value="Resolved"     >  Resolved  <br><br>
              <input type="radio" name="outcome" value="Resolved with sequelae"     >  Resolved with sequelae
  			<br><br>
              <input type="radio" name="outcome" value="Not resolved"    >  Not resolved
  			<br><br>
              </td>
              </tr>
              <tr>
              <th align="left">Relaionship to current drug </th>
              <td colspan="3">
              <br>
              <input type="radio" name="relaionship" value="Definitely"    >  Definitely  <br><br>
              <input type="radio" name="relaionship" value="Probably"     >  Probably
  <br><br>
              <input type="radio" name="relaionship" value="Possibly"   >  Possibly
  <br><br>   
              <input type="radio" name="relaionship" value="Unlikely"   >  Unlikely  <br><br>
              <input type="radio" name="relaionship" value="Not related"   >  Not related
  <br><br>
              <input type="radio" name="relaionship" value="Not assessable" >  Not assessable
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