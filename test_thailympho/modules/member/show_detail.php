<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$member_id= $_POST["member_id"];

?>

<? 
		$id= $_POST["id"];
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

<? include "includes/detail_data.php" ; ?>
<!-- main content -->
			<div id="center">
				<h1>DETAIL PAGE1 CASE RECORD FORM CML REGISTRY - THAI CML - WG </h1>
				<p>
	   	   <center><table width="100%" border="0" align="center">
                   <form name ="checkForm" action="index.php" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                 <tr>
                    <th align="left" width="19%"><strong>centre : </strong></th>
                    <td width="23%"><strong><? echo $centre;?></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">subject :</th>
                    <td width="23%">   <?php echo $subject; ?>  <?php echo "$dbarr[subject]" ; ?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">เพศ</th>
                    <td width="23%"> <?php echo $sex; ?> </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>Date of birth: </strong></th>
                    <td width="23%"><?php echo $d_birth; ?>/<? echo $m_birth;?>/<? echo $y_birth;?>
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">ภูมิลำเนา :</th>
                    <td width="23%"><?php echo $province; ?> </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">สิทธิการรักษา : </th>
                    <td width="23%"><?php echo $treatment; ?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">อาชีพ :</th>
                    <td width="23%"><?php echo $career; ?><? echo $dbarr[career];?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>Date of 1 st diagnostic:  </strong>: </th>
                    <td width="23%"><?php echo $d_diagnostic.'/'.$m_diagnostic.'/'.$y_diagnostic; ?>
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Diagnosis : </th>
                    <td width="23%"><? echo $diagnosis ;?></td> 
                  </tr>
                  <tr>
                    <th align="left" width="19%">cytogenetics : </th>
                    <td width="23%"><? echo $cytogenetics;?>&nbsp;&nbsp;<? echo $cytogenetics_i;?> &nbsp;&nbsp;<? echo $cytogenetics_ii;?></td>
                  </tr>
                  
                  <tr>
                    <th align="left" width="19%">CBC(At diagnosis) : </th>
                    <td width="23%">
					WBC :  <b><input type="text" name="cbc" id="textfield" size="3" value="<?php echo $cbc; ?>"readonly="readonly" />  </b> /ML &nbsp;&nbsp;
                    Blast  : <b><input type="text" name="cbci" id="cbci" size="3" value="<?php echo $cbci; ?>" readonly="readonly" /></b>% &nbsp;&nbsp;
                    Hb : <b><input type="text" name="cbcii" id="textfield" size="3" value="<?php echo $cbcii; ?>"readonly="readonly" /> </b> g/dL  &nbsp;&nbsp;
                    Plt  :  <b><input type="text" name="cbciii" id="textfield" size="3" value="<?php echo $cbciii; ?>"readonly="readonly" /></b> /ML  
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">%Blast in BM at diagnosis : </th>
                    <td width="23%"><? echo $bm_don;?>&nbsp;&nbsp;<? echo $bmi;?>&nbsp;&nbsp;<? echo $bm_not;?></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Organ involvement(extramedullary  diseases): </th>
                    <td width="23%"><? echo $organ;?>&nbsp;,&nbsp;<? echo $organ_i;?>&nbsp;,&nbsp;<? echo $organ_ii;?>&nbsp;,&nbsp;<? echo $organ_iv;?>&nbsp;,&nbsp;<? echo $organ_vv;?>&nbsp;,&nbsp;<? echo $organ_ivv;?>&nbsp;,&nbsp;<? echo $organ_vvv;?>&nbsp;,&nbsp;<? echo $organ_ivvv;?>&nbsp;,&nbsp;<? echo $organ_vvvv;?>
                    		
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">ECOG : </th>
                    <td width="23%"><b><? echo $ecog;?></b></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Complications  at  Presentation : </th>
                    <td width="23%"><input type="text" name="cap" id="textfield" size="20" value="<?php echo $cap; ?>"readonly="readonly" />
                    <input type="text" name="capi" id="textfield" size="10" value="<?php echo $capi; ?>"readonly="readonly" />
                    <input type="text" name="capii" id="textfield" size="15" value="<?php echo $capii; ?>"readonly="readonly" />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Initial  Induction : </th>
                    <td width="23%"><?php echo $initial; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Anthracycline : </th>
                    <td width="23%"><?php echo $anthracycline; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 1 st  Induction : </th>
                    <td width="23%"><?php echo $reponse_i; ?>&nbsp;&nbsp;&nbsp;<? echo $response_i_i; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Second induction(in case not in CR from first induction): </th>
                    <td width="23%"><?php echo $second; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 2nd  Induction : </th>
                    <td width="23%"><?php echo $responseii; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Post-remission  treatment [CR after 1-2 induction cycles] or bridging : </th>
                    <td width="23%"><? echo $post_remission;?>&nbsp;,&nbsp;<? echo $post_remissioni_i;?>&nbsp;,&nbsp;<? echo $post_remissionii;?>&nbsp;,&nbsp;<? echo $post_remissionii_i;?>&nbsp;,&nbsp;<? echo $post_remissioniv;?>&nbsp;,&nbsp;<? echo $post_remissioniv_iv;?>
                    <? echo $post_remissionvv;?><? echo $post_remissionvv_vv;?><? echo $post_remissionivv;?>
                
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">1 -  year follow up : </th>
                    <td width="23%"><? echo $yeari;?>&nbsp;&nbsp;&nbsp;<?  echo $yeari_idate.'/'.$yeari_imonth.'/'.$yeari_iyear;?> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">2 - year follow up : </th>
                    <td width="23%"><?  echo $yearii;?> &nbsp;&nbsp;&nbsp;<?  echo $yearii_iidate.'/'.$yearii_iimonth.'/'.$yearii_iiyear;?> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Initial induction : </th>
                    <td width="23%"><?php echo $initial_induction; ?>&nbsp;&nbsp;<?php echo $initial_induction_i; ?>
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Anthracycline : </th>
                    <td width="23%"><?php echo $anthracycline; ?></td>
                  </tr>
                    <tr>

                    <th align="left" width="19%">differentiatine : </th>
                    <td width="23%"><?php echo $differentiatine; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to Induction : </th>
                    <td width="23%"><?php echo $response_i; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Second induction [in case of 1st induction resulted in <= PR] : </th>
                    <td width="23%"><?php echo $second_induction; ?>&nbsp;&nbsp;<?php echo $second_induction_i; ?>
                 </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 2nd Induction : </th>
                    <td width="23%"><?php echo $response_ii; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Consolidation : </th>
                    <td width="23%"><input type="text" name="consolidation" id="textfield" size="10" value="<?php echo $consolidation; ?>"readonly="readonly" /><br /><br />
					<input type="text" name="consolidation_i" id="textfield" size="10" value="<?php echo $consolidation_i; ?>"readonly="readonly" />&nbsp;&nbsp;
					<input type="text" name="consolidation_ii" id="textfield" size="10" value="<?php echo $consolidation_ii; ?>"readonly="readonly" />&nbsp;&nbsp;
					<input type="text" name="consolidation_iv" id="textfield" size="10" value="<?php echo $consolidation_iv; ?>"readonly="readonly" />&nbsp;&nbsp;
					<input type="text" name="consolidationvv" id="textfield" size="10" value="<?php echo $consolidationvv; ?>"readonly="readonly" /></td>
                  </tr>
					<tr>
                    <th align="left" width="19%">Response  to  consolidation:  PML/RARA  result : </th>
                    <td width="23%"><?php echo $response_co; ?><? echo "$dbarr[response_co]";?>   <br /></td>
                  </tr>
                  
                    <tr>
                    <th align="left" width="19%">Maintenance : </th>
                    <td width="23%"><?php echo $maintenance; ?></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">1 - year follow up : </th>
                    <td width="23%"> <? echo $year_followi;?> &nbsp;&nbsp;&nbsp;
                   <? echo $year_followi_idate.'/'.$year_followi_imonth.'/'.$year_followi_imonth;?>
				    
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">2 - year follow up : </th>
                    <td width="23%"><? echo $year_follow_up;?>&nbsp;&nbsp;&nbsp;
  					<? echo $year_follow_update.'/'.$year_follow_upmonth.'/'.$year_follow_update;?>
                 
                    </td>
                  </tr>
                  <tr><td></td>
                  <td>
                     <input type="hidden" name="name"/>
						<INPUT TYPE="submit" class="submit"  value=" ย้อนกลับ "> </FORM>
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