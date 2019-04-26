<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$member_id= $_POST["member_id"];

?>
<? 
		$code_id= $_POST["code_id"];
		$fl = $_POST["fl"];
		$sex = $_POST["sex"];
		$date_birth = $_POST["date_birth"];
		$province = $_POST["province"];
		$treatment = $_POST["treatment"];			
		$career = $_POST["career"];		
	    $date_diagnostic = $_POST["date_diagnostic"];
		$diagnosis = $_POST["diagnosis"];		
		$diagnosis_i = $_POST["diagnosis_i"];		
		$cytogenetics = $_POST["cytogenetics"];		
		$cytogenetics_i = $_POST["cytogenetics_i"];		
		$cytogenetics_ii = $_POST["cytogenetics_ii"];		
		$cbc = $_POST["cbc"];		
		$cbci = $_POST["cbci"];		
		$cbcii = $_POST["cbcii"];		
		$cbciii = $_POST["cbciii"];		
		$bm_don = $_POST["bm_don"];		
		$bmi = $_POST["bmi"];		
		$bm_not = $_POST["bm_not"];		
		$organ = $_POST["organ"];		
		$organ_i = $_POST["organ_i"];		
		$organ_ii = $_POST["organ_ii"];		
		$organ_iv = $_POST["organ_iv"];		
		$organ_vv = $_POST["organ_vv"];		
		$organ_ivv = $_POST["organ_ivv"];		
		$organ_vvv = $_POST["organ_vvv"];		
		$organ_ivvv = $_POST["organ_ivvv"];		
		$organ_vvvv = $_POST["organ_vvvv"];		
		$ecog = $_POST["ecog"];		
		$cap = $_POST["cap"];		
		$capi = $_POST["capi"];		
		$capii = $_POST["capii"];		
		$initial = $_POST["initial"];		
		$anthracycline = $_POST["anthracycline"];		
		$reponse_i = $_POST["reponse_i"];		
		$response_i_i = $_POST["response_i_i"];		
		$second = $_POST["second"];		
		$secondi = $_POST["secondi"];		
		$secondii = $_POST["secondii"];		
		$responseii = $_POST["responseii"];		
		$post_remission = $_POST["post_remission"];		
		$post_remissioni_i = $_POST["post_remissioni_i"];		
		$post_remissionii = $_POST["post_remissionii"];	
		$post_remissionii_i = $_POST["post_remissionii_i"];	
		$post_remissioniv = $_POST["post_remissioniv"];	
		$post_remissioniv_iv = $_POST["post_remissioniv_iv"];	
		$post_remissionvv = $_POST["post_remissionvv"];	
		$post_remissionvv_vv = $_POST["post_remissionvv_vv"];	
		$post_remissionivv = $_POST["post_remissionivv"];	
		$post_yn = $_POST["post_yn"];	
		$yeari = $_POST["yeari"];	
		$yeari_i = $_POST["yeari_i"];	
		$yearii = $_POST["yearii"];		
		$yearii_ii = $_POST["yearii_ii"];		
		$initial_induction = $_POST["initial_induction"];		
		$initial_induction_i = $_POST["initial_induction_i"];		
		$anthracycline_i = $_POST["anthracycline_i"];		
		$differentiatine = $_POST["differentiatine"];		
		$response_i = $_POST["response_i"];		
		$second_induction = $_POST["second_induction"];	
		$second_induction_i = $_POST["second_induction_i"];	
		$response_ii = $_POST["response_ii"];	
		$consolidation = $_POST["consolidation"];	
		$consolidation_i = $_POST["consolidation_i"];	
		$consolidation_ii = $_POST["consolidation_ii"];	
		$consolidation_iv = $_POST["consolidation_iv"];	
		$consolidation_vv = $_POST["consolidation_vv"];	
		$response_co = $_POST["response_co"];	
		$maintenance = $_POST["maintenance"];	
		$year_followi = $_POST["year_followi"];	
		$year_followi_i = $_POST["year_followi_i"];	
		$year_follow_up = $_POST["year_follow_up"];	
		$year_follow_date = $_POST["year_follow_date"];	
		
		?>
<? include "modules/index/header.php" ; ?>
<!-- main content -->
			<div id="center">
				<h1>แสดงข้อมูลตัวอย่างก่อนการบันทึก  Acute  leukemia registry  form </h1>
				<p>
			   <center><table width="100%" border="0" align="center">
                   <form name ="checkForm" action="?name=member&file=member_add_data" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                 <tr>
                    <th align="left" width="19%"><strong>Code : </strong></th>
                    <td width="23%"><strong><input type="text" name="code_id" id="textfield"  value="<?php echo $code_id ;?>" readonly="readonly" /></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">อักษรตัวแรกของชื่อและนามสกุล(ภาษาอังกฤษ) ::</th>
                    <td width="23%">     <input type="text" name="fl" id="textfield" size="2" value="<?php echo $fl; ?>"readonly="readonly" />  </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">เพศ</th>
                    <td width="23%"> <input type="text" name="sex" id="textfield" size="5" value="<?php echo $sex; ?>"readonly="readonly" /> </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>Date of birth: </strong></th>
                    <td width="23%"><? $date_birth = $d_birth.$m_birth.$y_birth;?>  <input type="text" name="date_birth" id="textfield" size="5" value="<?php echo $date_birth; ?>" readonly="readonly" /> <?php echo $d_birth;?>/<? echo $m_birth;?>/<? echo $y_birth;?> 
                    
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">ภูมิลำเนา :</th>
                    <td width="23%"><input type="text" name="province" id="textfield" size="10" value="<?php echo $province; ?>"readonly="readonly" /> </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">สิทธิการรักษา : </th>
                    <td width="23%"><input type="text" name="treatment" id="textfield" size="10" value="<?php echo $treatment; ?>"readonly="readonly" /></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">อาชีพ :</th>
                    <td width="23%"><input type="text" name="career" id="textfield" size="10" value="<?php echo $career; ?>"readonly="readonly" /></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>Date of 1 st diagnostic: DD/MM/YYYY(พ.ศ.)  </strong>: </th>
                    <td width="23%"><? $date_diagnostic = $d_diagnostic.$m_diagnostic.$y_diagnostic;?><input type="text" name="date_diagnostic" id="textfield" size="10" value="<?php echo $date_diagnostic; ?>"readonly="readonly" /><?php echo $d_diagnostic; ?>/<?php echo $m_diagnostic; ?>/<?php echo $y_diagnostic; ?>
                    
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Diagnosis : </th>
                    <td width="23%"><input type="text" name="diagnosis" id="textfield" size="30" value="<?php echo $diagnosis; ?>"  readonly="readonly"/><BR />
                    <input type="text" name="diagnosis_i" id="textfield" size="30" value="<?php echo $diagnosis_i; ?>"  readonly="readonly"/>
                    </td> 
                  </tr>
                  <tr>
                    <th align="left" width="19%">cytogenetics : </th>
                    <td width="23%"><input type="text" name="cytogenetics" id="textfield" size="5" value="<?php echo $cytogenetics ;?>"readonly="readonly" />&nbsp;&nbsp;<input type="text" name="cytogenetics_i" id="textfield" size="5" value="<?php echo $cytogenetics_i ;?>"readonly="readonly" />%
                    
                    </td>
                  </tr>
                  
                  <tr>
                    <th align="left" width="19%">CBC(At diagnosis) : </th>
                    <td width="23%">
					WBC :  <b><input type="text" name="cbc" id="textfield" size="3" value="<?php echo $cbc; ?>"readonly="readonly" />  </b> /ML &nbsp;&nbsp;
                    Blast  : <b><input type="text" name="cbci" id="textfield" size="3" value="<?php echo $cbci; ?>"readonly="readonly" /></b>% &nbsp;&nbsp;
                    Hb : <b><input type="text" name="cbcii" id="textfield" size="3" value="<?php echo $cbcii; ?>"readonly="readonly" /> </b> g/dL  &nbsp;&nbsp;
                    Plt  :  <b><input type="text" name="cbciii" id="textfield" size="3" value="<?php echo $cbciii; ?>"readonly="readonly" /></b> /ML  
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">%Blast in BM at diagnosis : </th>
                    <td width="23%"><? echo $bm_don;?><input type="hidden" name="bm_don" id="textfield" size="10" value="<?php echo $bm_don; ?>" readonly="readonly" />&nbsp;&nbsp;<? echo $bmi;?><input type="hidden" name="bmi" id="textfield" size="10" value="<?php echo $bmi; ?>" readonly="readonly" />&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Organ involvement(extramedullary  diseases) : </th>
                    <td width="23%"><? echo $organ;?><? echo $organ_i;?><? echo $organ_ii;?><? echo $organ_iv;?><? echo $organ_vv;?><? echo $organ_ivv;?><? echo $organ_vvv;?><? echo $organ_ivvv;?><? echo $organ_vvvv;?>
                    		<input type="hidden" name="organ" id="textfield" size="10" value="<?php echo $organ; ?>"readonly="readonly" />
                    		<input type="hidden" name="organ_i" id="textfield" size="10" value="<?php echo $organ_i; ?>"readonly="readonly" />
                            <input type="hidden" name="organ_ii" id="textfield" size="10" value="<?php echo $organ_ii; ?>"readonly="readonly" />
                            <input type="hidden" name="organ_iv" id="textfield" size="10" value="<?php echo $organ_iv; ?>"readonly="readonly" />
                            <input type="hidden" name="organ_vv" id="textfield" size="10" value="<?php echo $organ_vv; ?>"readonly="readonly" />
                            <input type="hidden" name="organ_ivv" id="textfield" size="10" value="<?php echo $organ_ivv; ?>"readonly="readonly" />
                            <input type="hidden" name="organ_vvv" id="textfield" size="10" value="<?php echo $organ_vvv; ?>"readonly="readonly" />
                            <input type="hidden" name="organ_ivvv" id="textfield" size="10" value="<?php echo $organ_ivvv; ?>"readonly="readonly" />
                            <input type="hidden" name="organ_vvvv" id="textfield" size="10" value="<?php echo $organ_vvvv; ?>"readonly="readonly" />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">ECOG : </th>
                    <td width="23%"><input type="text" name="ecog" id="textfield" size="10" value="<?php echo $ecog; ?>"readonly="readonly" /></td>
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
                    <td width="23%"><input type="text" name="initial" id="textfield" size="10" value="<?php echo $initial; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Anthracycline : </th>
                    <td width="23%"><input type="text" name="anthracycline" id="textfield" size="10" value="<?php echo $anthracycline; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 1 st  Induction : </th>
                    <td width="23%"><input type="text" name="reponse_i" id="reponse_i" size="20" value="<?php echo $reponse_i; ?>"readonly="readonly" />
                    <input name="response_i_i" type="text" value="<? echo   $response_i_i;?>" readonly="readonly" />&nbsp;&nbsp;%</td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Second induction(in case not in CR from first induction): </th>
                    <td width="23%"><input type="text" name="second" id="textfield" size="10" value="<?php echo $second; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 2nd  Induction : </th>
                    <td width="23%"><input type="text" name="responseii" id="textfield" size="20" value="<?php echo $responseii; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Post-remission  treatment [CR after 1-2 induction cycles] or bridging : </th>
                    <td width="23%"><? echo $post_remission;?>&nbsp;&nbsp;<? echo $post_remissioni_i;?>&nbsp;&nbsp;<? echo $post_remissionii;?><? echo $post_remissionii_i;?><? echo $post_remissioniv;?><? echo $post_remissioniv_iv;?>
                    <? echo $post_remissionvv;?><? echo $post_remissionvv_vv;?><? echo $post_remissionivv;?>
                    <input type="hidden" name="post_remission" id="textfield" size="10" value="<?php echo $post_remission; ?>"readonly="readonly" />
                    <input type="hidden" name="post_remissioni_i" id="textfield" size="10" value="<?php echo $post_remissioni_i; ?>"readonly="readonly" />
                    <input type="hidden" name="post_remissionii" id="textfield" size="10" value="<?php echo $post_remissionii; ?>"readonly="readonly" />
                    <input type="hidden" name="post_remissionii_i" id="textfield" size="10" value="<?php echo $post_remissionii_i; ?>"readonly="readonly" />
                    <input type="hidden" name="post_remissioniv" id="textfield" size="10" value="<?php echo $post_remissioniv; ?>"readonly="readonly" />
                    <input type="hidden" name="post_remissioniv_iv" id="textfield" size="10" value="<?php echo $post_remissioniv_iv; ?>"readonly="readonly" />
                    <input type="hidden" name="post_remissionvv" id="textfield" size="10" value="<?php echo $post_remissionvv; ?>"readonly="readonly" />
                    <input type="hidden" name="post_remissionvv_vv" id="textfield" size="10" value="<?php echo $post_remissionvv_vv; ?>"readonly="readonly" />
                    <input type="hidden" name="post_remissionivv" id="textfield" size="10" value="<?php echo $post_remissionivv; ?>"readonly="readonly" /><br /><br />
                    <input type="hidden" name="post_yn" id="text" size="10" value="<?php echo $post_yn; ?>"readonly="readonly" />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">1 -  year follow up : </th>
                    <td width="23%"><?  echo $yeari;?> <input  type="hidden" name="yeari" value="<? echo  $yeari;?>" readonly="readonly" />
                    <?
					 			$yeari_i = $d_relapsed.$m_relapsed.$y_relapsed; 
								$yeari_i = $d_dead.$m_dead.$y_dead; 
					?>
                    <input type="text" name="yeari_i" id="textfield" size="10" value="<?php echo $yeari_i; ?>"readonly="readonly" />
					<? echo $d_relapsed.'/'.$m_relapsed.'/'.$y_relapsed;?>   <? echo $d_dead.'/'.$m_dead.'/'.$y_dead;?>
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">2 - year follow up : </th>
                    <td width="23%"><?  echo $yearii;?>  <input  type="hidden" name="yearii" value="<? echo  $yearii;?>" readonly="readonly" />
                    <? $yearii_ii = $d_relapsed2.$m_relapsed2.$y_relapsed2; ?>
                    <? $yearii_ii = $d_dead2.$m_dead2.$y_dead2; ?>
                    <? $yearii_ii = $d_last.$m_last.$m_last.$y_last; ?>
                      <input type="text" name="yearii_ii" id="textfield" size="10" value="<?php echo $yearii_ii; ?>"readonly="readonly" />&nbsp;&nbsp;<? echo $d_relapsed2.'/'.$m_relapsed2.'/'.$y_relapsed2;?>   <? echo $d_dead2.'/'.$m_dead2.'/'.$y_dead2;?>
                     <? echo $d_last.'/'.$m_last.'/'.$y_last;?>   
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Initial induction : </th>
                    <td width="23%"><input type="text" name="initial_induction" id="textfield" size="10" value="<?php echo $initial_induction; ?>"readonly="readonly" />
                    <input type="text" name="initial_induction_i" id="textfield" size="10" value="<?php echo $initial_induction_i; ?>"readonly="readonly" />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Anthracycline : </th>
                    <td width="23%"><input type="text" name="anthracycline" id="textfield" size="10" value="<?php echo $anthracycline; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">differentiatine : </th>
                    <td width="23%"><input type="text" name="differentiatine" id="textfield" size="10" value="<?php echo $differentiatine; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to Induction : </th>
                    <td width="23%"><input type="text" name="response_i" id="textfield" size="50" value="<?php echo $response_i; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Second induction [in case of 1st induction resulted in <= PR] : </th>
                    <td width="23%"><input type="text" name="second_induction" id="textfield" size="20" value="<?php echo $second_induction; ?>"readonly="readonly" />
                    <input type="text" name="second_induction_i" id="textfield" size="10" value="<?php echo $second_induction_i; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 2nd Induction : </th>
                    <td width="23%"><input type="text" name="response_ii" id="textfield" size="20" value="<?php echo $response_ii; ?>"readonly="readonly" /></td>
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
                    <th align="left" width="19%">Response  to  consolidation : </th>
                    <td width="23%"><input type="text" name="response_co" id="textfield" size="10" value="<?php echo $response_co; ?>" readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Maintenance : </th>
                    <td width="23%"><input type="text" name="maintenance" id="textfield" size="10" value="<?php echo $maintenance; ?>"readonly="readonly" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">1 - year follow up : </th>
                    <td width="23%"> <? echo $year_followi;?> <input  type="hidden" name="year_followi" id="textfield" size="10" value="<?php echo $year_followi; ?>"readonly="readonly" />
                    <? $year_followi_i= $d_year_follow1.$m_year_follow1.$y_year_follow1;?>
                    <? $year_follow1_dead = $d_year_dead.$m_year_dead.$y_year_dead;?>
                    <? $year_follow2_dead = $d_year_alive1.$m_year_alive1.$y_year_alive1;?>
                    <input type="text" name="year_followi_i" id="textfield" size="10" value="<?php echo $year_follow1_dead; ?><? echo $year_followi_i;?><? echo  $year_follow2_dead?>"readonly="readonly" />
				    <? echo $d_year_follow1.'/'.$m_year_follow1.'/'.$y_year_follow1;?>
                    <? echo $d_year_dead.'/'.$m_year_dead.'/'.$y_year_dead;?>
                    <? echo $d_year_alive1.'/'.$m_year_alive1.'/'.$y_year_alive1;?>
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">2 - year follow up : </th>
                    <td width="23%"><? echo $year_follow_up;?><input  type="hidden" name="year_follow_up" id="textfield" size="10" value="<?php echo $year_follow_up; ?>"readonly="readonly" />
                   
					<?  $year_follow_date2 = $d_year_follow_ii.$m_year_follow_ii.$y_year_follow_ii;?>
                    <?  $year_follow_date1 = $d_year_dead_ii.$m_year_dead_ii.$y_year_dead_ii;?>
                    <?   $year_follow_date = $d_follow_last.$m_follow_last.$y_follow_last;?>
                     <input type="text" name="year_follow_date" id="textfield" size="10" value="<? echo  $year_follow_date2;?><?php echo $year_follow_date; ?><? echo $year_follow_date1;?>"readonly="readonly" /> 
					 <? echo $d_year_follow_ii.'/'.$m_year_follow_ii.'/'.$y_year_follow_ii;?>
                    <? echo $d_year_dead_ii.'/'.$m_year_dead_ii.'/'.$y_year_dead_ii;?>
					<? echo $d_follow_last.'/'.$m_follow_last.'/'.$y_follow_last;?>
                    </td>
                  </tr>
                  <tr><td></td>
                  <td>
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