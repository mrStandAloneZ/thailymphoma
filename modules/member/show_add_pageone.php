<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$member_id= $_POST["member_id"];

?>
<? 
		$id= $_POST["id"];
		$codehos= $_POST["codehos"];
		$centre= $_POST["centre"];
		$subject= $_POST["subject"];
		$patient_initials = $_POST["patient_initials"];
		$diagnosis_cml = $_POST["diagnosis_cml"];
		$date_diagnosis = $_POST["date_diagnosis"];
		$month_diagnosis = $_POST["month_diagnosis"];
		$year_diagnosis = $_POST["year_diagnosis"];
		$date_birth = $_POST["date_birth"];			
		$month_birth = $_POST["month_birth"];		
		$year_birth = $_POST["year_birth"];		
	    $genden = $_POST["genden"];
		$current_address = $_POST["current_address"];		
		$zip_code = $_POST["zip_code"];		
		$payment = $_POST["payment"];		
		$date_assessment = $_POST["date_assessment"];		
		$month_assessment = $_POST["month_assessment"];		
		$year_assessment = $_POST["year_assessment"];		
		$ecog_score = $_POST["ecog_score"];		
		$spleen_size = $_POST["spleen_size"];		
		$hematology_lab1 = $_POST["hematology_lab1"];		
		$hematology_lab2 = $_POST["hematology_lab2"];
		$platelt_count = $_POST["platelt_count"];
		$basophil = $_POST["basophil"];
		$eosinophil = $_POST["eosinophil"];
		$sokal = $_POST["sokal"];
		$euro_hasforf = $_POST["euro_hasforf"];
		$eutos = $_POST["eutos"];
		$cytogenetic_study = $_POST["cytogenetic_study"];
		$ph_chromosome = $_POST["ph_chromosome"];
		$number_metaphase = $_POST["number_metaphase"];
		$add_chrom = $_POST["add_chrom"];
		$bcr_abl = $_POST["bcr_abl"];
		$definitive = $_POST["definitive"];
		$daily_dose = $_POST["daily_dose"];
		$date_start = $_POST["date_start"];
		$month_start = $_POST["month_start"];
		$year_start = $_POST["year_start"];				
		$allogeneic_sct = $_POST["allogeneic_sct"];	
		$date_transplantation = $_POST["date_transplantation"];			
		$month_transplantation = $_POST["month_transplantation"];	
		$year_transplantation = $_POST["year_transplantation"];	
			
		
		?>
<? include "modules/index/header.php" ; ?>
<!-- main content -->
			<div id="center">
				<h1>ตัวอย่างก่อนการบันทึก  CASE RECORD FORM CML REGISTRY - THAI CML - WG</h1>
				<p>
			   <center><table width="100%" border="0" align="center">
                   <form name ="checkForm" action="?name=member&file=member_add_pageone" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                 <tr>
                    <th align="left" width="28%"><strong>Centre : </strong></th>
                    <td width="32%"><strong><input type="text" name="centre" id="textfield"  value="<?php echo $centre ;?>"  readonly="readonly" /></strong></td>
                   <th align="left" width="12%">Subject No :</th>
                    <td width="28%">     <input type="text" name="subject" id="textfield" size="3" value="<?php echo $subject; ?>"readonly="readonly" />  </td>
                 </tr>
                 <tr>
                    <th align="left" width="28%">Patient Initials :</th>
                    <td colspan="3"> <input type="text" name="patient_initials" id="textfield" size="3" value="<?php echo $patient_initials; ?>"readonly="readonly" /> </td>
                  </tr>
                  <tr>
                    <th align="left" width="28%"><strong>Diagnosis :  Chronic myeloid leukemia  : </strong></th>
                    <td colspan="3">
                <input type="text" name="diagnosis_cml"  value="<? echo $diagnosis_cml; ?>" readonly="readonly" />
                    </td>
                  </tr>
                  <tr>
                  <th align="left">Date of  Diagnosis : </th>
                  <td colspan="3"> <input type="text" value="<? echo $date_diagnosis;?>"  size="3" name="date_diagnosis"  maxlength="2"/> /  
                  <input  type="text" value="<? echo $month_diagnosis;?>"  size="3" name="month_diagnosis"  maxlength="2"/> /  
                  <input type="text" value="<? echo $year_diagnosis?>"  size="3" name="year_diagnosis"  maxlength="4"/>   (dd/mm/2500)
                  </td>
                  </tr>
                  <tr>
                    <th align="center" colspan="4"><font color="#0000FF" size="+1"><strong>EMOGRAPHIC DATA</strong></font></th>
                    </tr>
                    <tr>
                    <th align="left" >Date of  Birth :</th>
                    <td colspan="3">
                    <input type="text" name="date_birth" size="2" value="<?php echo $date_birth; ?>"readonly="readonly" />  / 
                    <input type="text" name="month_birth" size="2" value="<?php echo $month_birth; ?>"readonly="readonly" />  / 
                    <input type="text" name="year_birth" size="2" value="<?php echo $year_birth; ?>"readonly="readonly" />  (dd/mm/2500)
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="28%">Gender : </th>
                    <td width="32%" colspan="3"><input type="text" name="genden" size="5" value="<?php echo $genden; ?>"readonly="readonly" /> 
                   </td>
                  </tr>
                  <tr>
                    <th align="left" width="28%">Current Address :  Province</th>
                    <td width="32%"><input type="text" name="current_address"   value="<?php echo $current_address; ?>"readonly="readonly" />
                    <th align="left">Zip Code : </th>
                    <td><input type="text" name="zip_code"   value="<?php echo $zip_code; ?>"readonly="readonly" /></td>
                  
                  </tr>
                  <tr>
                    <th align="left" width="28%"><strong>Payment </strong>: </th>
                   <td  colspan="3">
                    <input type="text" name="payment"  size="30" value="<? echo $payment;?>" readonly="readonly" />
                  </td>
                  </tr>         
                  <tr>
                  <th colspan="4"><font color="#0000FF" size="+1"><strong>INITAL CLINICAL  ASSESSMENT</strong></font></th>
                  </tr>
                  <tr>
                    <th align="left" width="28%">Date  of  Assessment : </th>
                    <td colspan="3">
                    <input type="text" name="date_assessment"  size="2" value="<?php echo $date_assessment; ?>"  readonly="readonly"/> / 
                    <input type="text" name="month_assessment"  size="2" value="<?php echo $month_assessment; ?>"  readonly="readonly"/> / 
                    <input type="text" name="year_assessment" size="2" value="<?php echo $year_assessment; ?>"  readonly="readonly"/> &nbsp; (dd/mm/2500)
                    </td> 
                  </tr>
                  <tr>
                    <th align="left" width="28%">ECOG Score : </th>
                    <td width="32%"><input type="text" name="ecog_score"  size="5" value="<?php echo $ecog_score ;?>"readonly="readonly" />        </td>
                    <th>Spleen size :</th>
                    <td><input type="text" name="spleen_size"  size="5" value="<?php echo $spleen_size ;?>"readonly="readonly" /> &nbsp;&nbsp; Below left costal margin</td>
                  </tr>                  
                  <tr>
                    <th align="center" colspan="4" width="28%"><strong><font color="#0000FF" size="+1">Hematology  lab </font></strong></th>
                    </tr>
                    <tr>
                    <th align="left">Hb</th>
                    <td width="32%">
					<input type="text" name="hematology_lab1" value="<? echo $hematology_lab1;?>"  size="" readonly="readonly" /> g/dL     	
                    </td>
                    <th> WBC count</th>
               		<td><input type="text" name="hematology_lab2" value="<? echo $hematology_lab2;?>"  size=""  readonly="readonly"/> x 10000/ml </td>
                  </tr>
                  <tr>
                  <th align="left">Platelet count</th>
                  <td colspan="3"><input type="text" name="platelet_count" value="<? echo $platelet_count;?>"  size="" readonly="readonly" />x 10000/ml</td>
                  </tr>
                  <tr>
                    <th align="left" width="28%">% Basophil  </th>
                    <td width="32%">
                    	<input type="text" name="basophil"   value="<? echo $basophil; ?>" readonly="readonly" />
                    </td>
                    <th>% Eosinophil  </th>
                    <td>	<input type="text" name="eosinophil"   value="<? echo $eosinophil; ?>" readonly="readonly" /></td>
                  </tr>
                  <tr>
                  <th align="left">% Blast cell </th>
                  <td colspan="3"><input type="text" name="blast_cell" value="<? echo $blast_cell; ?>" readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="center" colspan="4" ><font color="#0000FF" size="+1"><strong>Risk Score</strong></font></th>
 					</tr>           
                    <tr>
                    <th align="left" width="28%">Sokal :</th>
                    <td width="32%" colspan="3"> 
                    <input type="text" name="sokal" value="<? echo $sokal; ?>" readonly="readonly" />
                    </td>
                  </tr>
                  <tr>
                  <th align="left">Euro :</th>
                  <td colspan="3">
                  <input type="text" name="euro_hasford" value="<? echo $euro_hasford; ?>" readonly="readonly" />
                  </td>
                  </tr>
                  <tr>
                  <th align="left">EUTOS :</th>
                  <td colspan="3">
                  <input type="text" name="eutos" value="<? echo $eutos; ?>" readonly="readonly" />
                  </td>
                  </tr>
                  <tr>
                  <th align="center" colspan="4"><font color="#0000FF" size="+1"><strong>Cytogenetic study </strong></font></th>
                  </tr>
                  <tr>
                  <th align="left">Result :</th>
                  <td colspan="3">
                  <input type="text" name="cytogenetic_study" size="90" value="<? echo $cytogenetic_study;?>"  />  <br /><br />
                  % Ph chromosome  <input type="text"  name="ph_chromosome" value="<? echo $ph_chromosome;?>" />  &nbsp;&nbsp;&nbsp; / Number of metaphase <input type="text" name="number_metaphase" value="<? echo $number_metaphase;?>" />
                  </td>
                  </tr>
                  <tr>
                  <th>Additional chromosome abnormality</th>
                  <td colspan="3">
               		 <input type="text" name="add_chrom" value="<? echo $add_chrom; ?>" readonly="readonly" />
                  </td>
                  </tr>
                  <tr>
                  <th>BCR-ABL fusion gene </th>
                  <td colspan="3">
                  <input type="text" name="bcr_abl" value="<? echo $bcr_abl; ?>" readonly="readonly" />
                  </td>
                  </tr>
                  <tr>
                  <th>Definitive Treatment  :</th>
                  <td colspan="3">
                  <input type="text" name="definitive" value="<? echo $definitive; ?>" readonly="readonly" />
                  </td>
                  </tr>
                  <tr>
                  <th>Daily dose :</th>
                  <td><input type="text" name="daily_dose"  value="<? echo $daily_dose;?>"  readonly="readonly"  />  mg   </td>
                  <th>Date of Start :</th>
                  <td>
                  <input type="text" value="<? echo $date_start;?>"  size="3" name="date_start" readonly="readonly"  /> /  
                  <input type="text" value="<? echo $month_start;?>" size="3" name="month_start"  readonly="readonly" /> / 
                  <input type="text" value="<? echo $year_start;?>"  size="3" name="year_start"   readonly="readonly"/></td>
                  </tr>
                  <tr>
                  <th>Allogeneic SCT  </th>
                  <td colspan="3">
                 	<input type="text" value="<? echo $allogeneic_sct;?>"  size="3" name="allogeneic_sct"   readonly="readonly"/>
                  </td>
                  </tr>
                  <tr>
                  <th>Date of Transplantation :</th>
                  <td colspan="3">
                  <input type="text" value="<? echo $date_transplantation;?>"  size="3" name="date_transplantation" maxlength="2"  /> /  
                  <input type="text" value="<? echo $month_transplantation;?>" size="3" name="month_transplantation" maxlength="2"  /> / 
                  <input type="text" value="<? echo $year_transplantation?>"  size="3"name="year_transplantation"  maxlength="4" />  (dd/mm/2500)</td>
                  </tr>
                  
                  
                  <tr><td></td>
                  <td colspan="3">
                     <input type="hidden" name="name"/>
						<INPUT TYPE="submit" class="submit" value=" บันทึกข้อมูล "> </FORM>
                        </td>
                  </tr>
              </table></center>
                </p>
                </div>
			
			<!-- sidebar -->
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
		<? include "modules/index/footer.php"; ?>