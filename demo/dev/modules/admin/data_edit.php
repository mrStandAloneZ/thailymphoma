<!-- main content -->
<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>

<?

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
//$login_true=$_SESSION['login_true'];
$result = mysql_query("select * from ".TB_ADD_DATA." where id='$id' order by id DESC") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;    			
?>
<!-- main content -->
		<br>
			<center>	<h1>แก้ไขข้อมูล   Acute  leukemia registry  form </h1></center>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=edit_data_add" method="post" onSubmit="return check();"  enctype="multipart/form-data">
                   <table width="100%" border="0" align="center">
                 <tr>
                    <th align="left" width="19%"><strong>Code : </strong></th>
                    <td width="23%"><strong><?php echo "$dbarr[code_id]" ; ?></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">อักษรตัวแรกของชื่อและนามสกุล(ภาษาอังกฤษ) :</th>
                    <td width="23%"> <input  type="text" name="fl" id="fl"  maxlength="2" value="<? echo "$dbarr[fl]" ; ?>" /> </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">เพศ</th>
                    <td width="23%"> 
			
                  <select name="sex" id="sex" style="width:100px;">
                    <option value='' selected><? echo "$dbarr[sex]" ; ?></option>
                    <option value='ชาย'>ชาย</option>
                    <option value='หญิง'>หญิง</option>
                  </select> 
                    
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>Date of birth: </strong></th>
                    <td width="23%"><input  type="text" name="date_birthce"   size="8" value="<? echo "$dbarr[date_birth]" ; ?>" /> 
                 
                    &nbsp;&nbsp;d/m/y
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">ภูมิลำเนา :</th>
                    <td width="23%"><input  type="text" name="province"  value="<? echo "$dbarr[province]" ; ?>" /> 
                    </td>
                  </tr>
                  <tr> 
                    <th align="left" width="19%">สิทธิการรักษา : </th>
                    <td width="23%">
                      <select name="treatment" id="treatment" style="width:150px;">
                    <option value="" selected><? echo "$dbarr[treatment]" ; ?></option>
                    <option value='เบิกราชการ'>เบิกราชการ</option>
                    <option value='สปสช.'>สปสช. </option>
                    <option value='ประกันสังคม'>ประกันสังคม </option>
                    <option value='จ่ายเอง'>จ่ายเอง</option>
                  </select> 
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">อาชีพ :</th>
                    <td width="23%"><input type="text" name="career" value="<? echo "$dbarr[career]" ; ?>"</td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>Date of 1 st diagnostic: DD/MM/YYYY(พ.ศ.)  </strong>: </th>
                    <td width="23%"><input name="date_diagnostic"  type="text" value="<? echo "$dbarr[date_diagnostic]" ; ?>" />&nbsp;&nbsp; d/m/y
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Diagnosis : </th>
                    <td width="23%">
                       <select name="diagnosis" id="diagnosis" style="width:150px;">
                    <option value="" selected><? echo "$dbarr[diagnosis]" ; ?></option>
                    <option value='AML'>AML</option>
                    <option value='APL'>APL </option>
                    <option value='Mixed-phenotypic acute leukemia'>Mixed-phenotypic acute leukemia  </option>
                  </select> 
                    </td> 
                  </tr>
                  <tr>
                    <th align="left" width="19%">cytogenetics : </th>
                    <td width="23%">
					    <select name="cytogenetics" id="cytogenetics" style="width:150px;">
                    		<option value="" selected><? echo "$dbarr[cytogenetics]" ; ?></option>
                    		<option value='Don'>Don</option>
                    		<option value='Not done'>Not done </option>           
                    </select> 
					&nbsp;&nbsp;<input  type="text" name="cytogenetics_i"  size="3" value="<? echo "$dbarr[cytogenetics_i]" ; ?>" />%</td>
                  </tr>
                  
                  <tr>
                    <th align="left" width="19%">CBC(At diagnosis) : </th>
                    <td width="23%">
					WBC :  <b><input type="text" name="cbc" id="textfield" size="3" value="<? echo "$dbarr[cbc]" ; ?>" />  </b> /ML &nbsp;&nbsp;
                    Blast  : <b><input type="text" name="cbci" id="cbci" size="3" value="<? echo "$dbarr[cbci]" ; ?>"  /></b>% &nbsp;&nbsp;
                    Hb : <b><input type="text" name="cbcii" id="textfield" size="3" value="<? echo "$dbarr[cbcii]" ; ?>" /> </b> g/dL  &nbsp;&nbsp;
                    Plt  :  <b><input type="text" name="cbciii" id="textfield" size="3" value="<? echo "$dbarr[cbciii]" ; ?>" /></b> /ML  
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">%Blast in BM at diagnosis : </th>
                    <td width="23%">
                     <select name="bm_don" id="bm_don" style="width:150px;">
                    <option value="" selected><? echo "$dbarr[bm_don]" ; ?></option>
                    <option value='Don'>Don</option>
                    <option value='Not done'>Not done </option>           
                    </select> 
                    &nbsp;&nbsp;<input type="text" name="bmi" id="textfield" size="3" value="<? echo "$dbarr[bmi]" ; ?>%" />&nbsp;&nbsp;
					</td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Organ involvement(extramedullary  diseases): </th>
                    <td width="23%"><? echo "$dbarr[organ]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[organ_i]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[organ_ii]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[organ_iv]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[organ_vv]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[organ_ivv]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[organ_vvv]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[organ_ivvv]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[organ_vvvv]" ; ?><br />
                 </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">ECOG : </th>
                    <td width="23%">
                     <select name="ecog" id="ecog" style="width:150px;">
                    <option value="" selected><? echo "$dbarr[ecog]" ; ?></option>
                    <option value='0'>0</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>           
                    </select> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Complications  at  Presentation : </th>
                    <td width="23%"><input type="text" name="cap" id="textfield" size="20" value="<? echo "$dbarr[cap]" ; ?>" />
                    <input type="text" name="capi" id="textfield" size="10" value="<? echo "$dbarr[capi]" ; ?>" />
                    <input type="text" name="capii" id="textfield" size="15" value="<? echo "$dbarr[capii]" ; ?>" />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Initial  Induction : </th>
                    <td width="23%"> 
                     <select name="initial" id="initial" style="width:150px;">
                    	<option value="" selected><? echo "$dbarr[initial]" ; ?></option>
                    	<option value='7+3 regimen'>7+3 regimen</option>
                    	<option value='7+3  flat dose'>7+3  flat dose</option>
                    	<option value='< 7 + 3[เช่น 5+2  , 7+1]'>< 7 + 3[เช่น 5+2  , 7+1]</option>
                    	<option value='Palliative care (including  low  dose  chemotherapy/hydroxyurea/azacytidine-decitabine)'>Palliative care (including  low  dose  chemotherapy/hydroxyurea/azacytidine-decitabine)</option>
                    	<option value='Clinical trial'>Clinical trial</option>           
                    </select> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Anthracycline : </th>
                    <td width="23%"> 
                     <select name="anthracycline" id="anthracycline" style="width:150px;">
                    <option value="" selected><b><? echo "$dbarr[anthracycline]" ; ?></b></option>
                    <option value='Doxorubicin'>Doxorubicin</option>
                    <option value='Idarubicin'>Idarubicin</option>           
                    </select> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 1 st  Induction : </th>
                    <td width="23%">
                     <select name="reponse_i" id="reponse_i" style="width:150px;">
                    <option value="" selected><b><? echo "$dbarr[reponse_i]" ; ?></b></option>
                    <option value='Complete  remission'>Complete  remission</option>
                    <option value='Not  in CR'>Not  in CR</option>           
                    <option value='Cannot  evaluation'>Cannot  evaluation</option>       
                    <option value='% Blast  after  induction'>% Blast  after  induction</option>        
                    </select> 
                    <input type="text" name="response_i_i" id="response_i_i"  value="<? echo "$dbarr[response_i_i]" ; ?>" />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Second induction(in case not in CR from first induction): </th>
                    <td width="23%">
                    
                     <select name="second" id="second" style="width:150px;">
                    <option value="" selected><b><? echo "$dbarr[second]" ; ?></b></option>
                    <option value='Yes'>Yes</option>
                    <option value='No'>No</option>           
                    </select> 
                    <select name="secondi" id="secondi" style="width:150px;">
                    <option value="" selected><b><? echo "$dbarr[secondi]" ; ?></b></option>
                    <option value='7 + 3 regimen'>7 + 3 regimen</option>
                    <option value='7 + 3 flat dose'>7 + 3 flat dose</option>           
                    <option value='< 7 + 3 [เช่น 5+2,7+1]'>< 7 + 3 [เช่น 5+2,7+1]</option>      
                    <option value='High  dose  Ara-C(HIDAC)'>High  dose  Ara-C(HIDAC)</option>      
                    <option value='FLAG +- Ida'>FLAG +- Ida</option>      
                    <option value='Other'>Other</option>
                    </select> 
                    <input type="text" name="secondii" id="secondii" value="<? echo "$dbarr[secondii]" ; ?>"  />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 2nd  Induction : </th>
                    <td width="23%">
                       <select name="responseii" id="responseii" style="width:150px;">
                    <option value="" selected><b><? echo "$dbarr[responseii]" ; ?></b></option>
                    <option value='Complete remission '>Complete remission </option>
                    <option value='Not in CR'>Not in CR </option>        
                    <option value='Cannot evaluation'>Cannot evaluation </option>        
                    <option value='% Blast after induction'>% Blast after induction</option>        
                    </select> 
                    
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Post-remission  treatment [CR after 1-2 induction cycles] or bridging : </th>
                    <td width="23%"><? echo "$dbarr[post_remission]" ; ?>&nbsp;_&nbsp;<? echo "$dbarr[post_remissioni_i]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[post_remissionii]" ; ?>&nbsp;_&nbsp;<? echo "$dbarr[post_remissionii_i]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[post_remissioniv]" ; ?>&nbsp;_&nbsp;<? echo "$dbarr[post_remissioniv_iv]" ; ?>&nbsp;,&nbsp;
                    <? echo "$dbarr[post_remissionvv]" ; ?>&nbsp;_&nbsp; <? echo "$dbarr[post_remissionvv_vv]" ; ?>&nbsp;,&nbsp;<? echo "$dbarr[post_remissionivv]" ; ?>
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">1 -  year follow up : </th>
                    <td width="23%"><? echo "$dbarr[yeari]" ; ?>
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">2 - year follow up : </th>
                    <td width="23%"> <? echo "$dbarr[yearii]" ; ?>
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Initial induction : </th>
                    <td width="23%">
                        <select name="initial_induction" id="initial_induction" style="width:150px;">
                    			<option value="" selected><b><? echo "$dbarr[initial_induction]" ; ?></b></option>
                    			<option value='ATRA + Chemotherapy'>ATRA + Chemotherapy</option>
                    			<option value='As2O3'>As2O3</option>        
                    			<option value='As2O3 + Chemotherapy'>As2O3 + Chemotherapy</option>        
                    			<option value='Other'>Other</option>        
                    </select> 
                    <input type="text" name="initial_induction_i" id="initial_induction_i" value="<? echo "$dbarr[initial_induction_i]" ; ?>"  />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Anthracycline : </th>
                    <td width="23%">
                      <select name="anthracycline" id="anthracycline" style="width:150px;">
                    			<option value="" selected><b><? echo "$dbarr[anthracycline]" ; ?></b></option>
                    			<option value='Doxorubicin'>Doxorubicin</option>
                    			<option value='Idarubicin'>Idarubicin</option>         
                    </select> 
                    </td>
                  </tr>
                    <tr>

                    <th align="left" width="19%">differentiatine : </th>
                    <td width="23%">
                     <select name="differentiatine" id="differentiatine" style="width:150px;">
                    			<option value="" selected><b><? echo "$dbarr[differentiatine]" ; ?></b></option>
                    			<option value='Yes'>Yes</option>
                    			<option value='No'>No</option>         
                    </select> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to Induction : </th>
                    <td width="23%">
                     <select name="response_i" id="response_i" style="width:150px;">
                    			<option value="" selected><b><? echo "$dbarr[response_i]" ; ?></b></option>
                    			<option value='Complete remisson'>Complete remisson</option>
                    			<option value='Not in CR'>Not in CR</option>         
                                <option value='Cannot evaluate'>Cannot evaluate</option>
                    </select> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Second induction [in case of 1st induction resulted in <= PR] : </th>
                    <td width="23%">
                    <select name="second_induction" id="second_induction" style="width:150px;">
                    			<option value="" selected><b><? echo "$dbarr[second_induction]" ; ?></b></option>
                    			<option value='As2O3'>As2O3</option>
                    			<option value='High dose Ara-C(HIDAC) '>High dose Ara-C(HIDAC) </option>         
                                <option value='Other'>Other</option>
                    </select> 
                    <input type="text"  name="second_induction_i"  id="second_induction_i" value="<? echo "$dbarr[second_induction_i]" ; ?>" />
                 </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 2nd Induction : </th>
                    <td width="23%">
                    <select name="response_ii" id="response_ii" style="width:150px;">
                    			<option value="" selected><b><? echo "$dbarr[response_ii]" ; ?></b></option>
                    			<option value='Complete remission'>Complete remission</option>
                    			<option value='Not in CR'>Not in CR</option>         
                                <option value='Cannot evaluation'>Cannot evaluation</option>
                    </select> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Consolidation : </th>
                    <td width="23%">                
                     <select name="consolidation" id="consolidation" style="width:150px;">
                    			<option value="" selected><b><? echo "$dbarr[consolidation]" ; ?></b></option>
                    			<option value='Yes'>Yes</option>
                    			<option value='No'>No</option>    
                    </select>    <br /><br />
					<input type="text" name="consolidation_i" id="textfield" size="10" value="<? echo "$dbarr[consolidation_i]" ; ?>" />&nbsp;&nbsp;
					<input type="text" name="consolidation_ii" id="textfield" size="10" value="<? echo "$dbarr[consolidation_ii]" ; ?>"/>&nbsp;&nbsp;
					<input type="text" name="consolidation_iv" id="textfield" size="10" value="<? echo "$dbarr[consolidation_iv]" ; ?>"/>&nbsp;&nbsp;
					<input type="text" name="consolidationvv" id="textfield" size="10" value="<? echo "$dbarr[consolidationvv]" ; ?>" /></td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Maintenance : </th>
                    <td width="23%">
                     <select name="maintenance" id="maintenance" style="width:150px;">
                    			<option value="" selected><b><? echo "$dbarr[maintenance]" ; ?></b></option>
                    			<option value='Yes'>Yes</option>
                    			<option value='No'>No</option>    
                    </select>  
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">1 - year follow up : </th>
                    <td width="23%"> <? echo $year_followi;?> 
                    <input type="text" name="year_followi_i" id="textfield" size="10" value="<? echo "$dbarr[year_follow1_dead]" ; ?><? echo "$dbarr[year_followi_i]" ; ?>" />
				    &nbsp;&nbsp;  d/m/y
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">2 - year follow up : </th>
                    <td width="23%"><? echo "$dbarr[year_follow_up]" ; ?><input  type="hidden" name="year_follow_up" id="textfield" size="10" value="<? echo "$dbarr[year_follow_up]" ; ?>"/>
  
                     <input type="text" name="year_follow_date" id="textfield" size="10" value="<? echo "$dbarr[year_follow_date2]" ; ?><? echo "$dbarr[year_follow_date]" ; ?><? echo "$dbarr[year_follow_date1]" ; ?>" /> 
					&nbsp;&nbsp;  d/m/y
                    </td>
                  </tr>
                  <tr><td></td>
                  <td>
                             <input name="id" type="hidden" id="id" value="<?php echo "$dbarr[id]" ; ?>">
                <input type="submit" name="Submit" value="แก้ไขข้อมูล ">
                             </form>  </td>
                  </tr>
                  
              </table>
<? include "modules/index/footer.php"; ?>
					
             
                </p>
                </div>
			
			<!-- sidebar -->
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
