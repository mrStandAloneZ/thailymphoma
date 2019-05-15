<?
header("Content-Type: application/vnd.ms-excel; name='excel';charset='tis-620' ");
header("Content-Disposition: attachment; filename=lymphoma-all.xls");
?>
<html>
<body>


<?
	$objConnect = mysql_connect("localhost","tshort_lymphoma","tsh00924") or die("Error Connect to Database");
	$objDB = mysql_select_db("tshort_lymphoma");
	$strSQL = "SELECT * FROM web_add_data  where codehos='BMA' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<meta http-equiv="Content-type" content="text/html;charset=tis-620" />
<table width="600" border="1">
<tr>
<th> <div align="center">Date of record</div></th><? // date_of_record?>
<th> <div align="center">Code </div></th><? // centre?>
<th> <div align="center">Patient Initials </div></th><? // patient_initials?>
<th> <div align="center">Gender</div></th><? // sex?>
<th> <div align="center">Personal ID</div></th><? // sex?>
<th> <div align="center">HN </div></th><? // hn?>
<th> <div align="center">Date of Birth  </div></th><? // date_of_birth?>
<th> <div align="center">Current  Address </div></th><? // province?>
<th> <div align="center">Mode of payment</div></th><? // payment?>
<th> <div align="center">Date of biopsy report</div></th>  <? // date_bio_report?>
<th> <div align="center">Pathology No.    </div></th><? // pathology?>
<th> <div align="center">Biopsy site </div></th><? // biopsy_site?>
<th> <div align="center">Hodgkin lymphoma (HL) </div></th><? //hodgkin_don?>
<th> <div align="center">Immunophenotype</div></th><? // type_non?>
<th> <div align="center">Who Classification</div></th>    <? // who_sub?>
<th> <div align="center">Working Formular</div></th>    <? // who_sub?>
<th> <div align="center">Other Type</div></th>    <? // other_type?>
<th> <div align="center">Ann Arbor stage </div></th> <? // ann_arbor?>
<th> <div align="center">Symptom </div></th> <? // symptom_ann?>

<th> <div align="center">Extranodal sites</div></th> <? //ใส่เป็นหัวเฉยๆ   เพื่อแยกหัวถัดไป  ?>
<th> <div align="center">Number of Extranodal Sites  </div></th>    <?   //นับจำนวน ข้อมูลที่ถูกเลือก  ?>
<th> <div align="center">none  </div></th>  <? // ext_none?>
<th> <div align="center">Waldeyer's ring  </div></th> <? // ext_sin?>
<th> <div align="center">Salivary gland	  </div></th>  <? // ext_sal?>
<th> <div align="center">Thyroid </div></th>  <? // ext_thy?>
<th> <div align="center">Eye/Ocular adnexa</div></th>   <?   //ext_eye  ?>
<th> <div align="center">Breast</div></th>					<?   //ext_breast  ?>
<th> <div align="center">Stomach</div></th> 				<?   //ext_stomach  ?>
<th> <div align="center"> Small intestine</div></th><?   //ext_small  ?>
<th> <div align="center">Testis </div></th><?   //ext_testis  ?>
<th> <div align="center">Brain/CNS  </div></th><?   //ext_brain  ?>
<th> <div align="center">Liver </div></th><?   //ext_liver  ?>
<th> <div align="center"> Large intestine</div></th><?   //ext_large  ?>
<th> <div align="center"> Bone marrow</div></th><?   //ext_bone  ?>
<th> <div align="center">Spleen</div></th><?   //ext_spleen  ?>
<th> <div align="center">Skin/Subcutaneous</div></th><?   //ext_skin  ?>
<th> <div align="center">Others	</div></th><?   //ext_other_text  ?>
<? //*******************--------------------------------------------------**********************************************?>


<th> <div align="center">Performance Status (ECOG)  </div></th> 
<th> <div align="center">LDH </div></th> 
<th> <div align="center">HIV Positive </div></th>  

<th> <div align="center">IPI: Age</div></th>   
<th> <div align="center">Description: Age</div></th>			
<th> <div align="center">IPI: Serum LDH</div></th> 			
<th> <div align="center">Description: Serum LDH</div></th>
<th> <div align="center">IPI: Performance Status </div></th>
<th> <div align="center">Description: Performance Status  </div></th>
<th> <div align="center">IPI: Stage </div></th>
<th> <div align="center"> Description: Stage</div></th>
<th> <div align="center">IPI: Extranodal Involvement</div></th>
<th> <div align="center">Description: Extranodal Involvement</div></th>
<th> <div align="center">IPI: Result</div></th>
<th> <div align="center">Description: Result	</div></th>
<? //*******************---เริ่ม follow up**********************************************?>
<th> <div align="center">Follow data</div></th><?   //extr_other_text  ?>
<th> <div align="center">Date of Record</div></th><?   //ldh  ?>
<th> <div align="center">Chemotherapy Treatment</div></th><?   //ldh  ?>
<? //*******************--------------------------------------------------**********************************************?>
<th> <div align="center">Date</div></th><?   //ldh  ?>

<th> <div align="center">Type of Immunotherapy</div></th><?   //ldh  ?>
<th> <div align="center">Radiotherapy</div></th><?   //ldh  ?>
<th> <div align="center">Date</div></th><?   //ldh  ?>
<th> <div align="center">surgery</div></th><?   //ldh  ?>

<th> <div align="center">Date</div></th><?   //ldh  ?>
<th> <div align="center">Result</div></th><?   //ldh  ?>
<th> <div align="center">Additional info</div></th><?   //ldh  ?>
<th> <div align="center">Progression/Relapse</div></th><?   //ldh  ?>
<th> <div align="center">Date</div></th><?   //ldh  ?>
<th> <div align="center">Histology</div></th><?   //ldh  ?>
<th> <div align="center">Lymph Node</div></th><?   //ldh  ?>
<? //*******************--------------------------------------------------**********************************************?>
<th> <div align="center">Extranodal sites</div></th>
<th> <div align="center">Salvage Treatment</div></th>
<th> <div align="center">Salvage Chemotherapy</div></th>
<th> <div align="center">Detail</div></th>
<th> <div align="center">Salvage Immunotherapy</div></th>
<th> <div align="center">Detail</div></th>
<th> <div align="center">Salvage Radiotherapy</div></th>
<th> <div align="center">Salvage Surgery</div></th>
<th> <div align="center">Stem Cell Transplant</div></th>
<th> <div align="center">Date</div></th>
<th> <div align="center">Type</div></th>
<th> <div align="center">Conditioning</div></th>
<th> <div align="center">Donor</div></th>
<th> <div align="center">Last follow-up Status</div></th>
<th> <div align="center">Date of Last follow-up</div></th>
<th> <div align="center">Alive Detail</div></th>
<th> <div align="center">Date of Death</div></th>
<th> <div align="center">Cause of Death</div></th>
<th> <div align="center">Lymphoma Status</div></th>



</tr>
<?
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
	<tr>
    <td align="right"><?=$objResult["date_of_record"];?></td>
	<td><div align="center"><?=$objResult["centre"];?></div></td>
	<td align="right"><?=$objResult["patient_initials"];?></td>
    <td align="right"><?=$objResult["sex"];?></td>
    <td align="right"><?=$objResult["id_card"];?></td>    <?   //   Personal ID?>
    <td align="right"><?=$objResult["hn"];?></td>
    <td align="right"><?=$objResult["date_of_birth"];?></td>
    <td align="right"><?=$objResult["province"];?></td>
    <td align="right"><?=$objResult["payment"];?></td>
    <td align="right"><?=$objResult["date_bio_report"];?></td>
    <td align="right"><?=$objResult["pathology"];?></td>
    <td align="right"><?=$objResult["biopsy_site"];?></td>
    <td align="right"><?=$objResult["hodgkin_don"];?></td>
    <td align="right"><?=$objResult["type_non"];?></td>
    <td align="right"><?=$objResult["who_sub"];?></td>
    <td align="right"><?=$objResult["work_sub"];?></td>
    <td align="right"><?=$objResult["other_type"];?></td>    
    <td align="right"><?=$objResult["ann_arbor"];?></td>
    <? //*******************--------------------------------------------------**********************************************?>
    <td align="right"></td>
    <td align="right"></td>   <?   //  คำนวณข้อมูลที่ถูกเืลอก?>
    <td align="right"><?=$objResult["ext_none"];?></td>
     <td align="right"><?=$objResult["ext_sin"];?></td>
     <td align="right"><?=$objResult["ext_sal"];?> </td>
      <td align="right"><?=$objResult["ext_thy"];?></td> 
      <td align="right"><?=$objResult["ext_eye"];?></td>
      <td align="right"><?=$objResult["ext_breast"];?></td>
      <td align="right"><?=$objResult["ext_stomach"];?></td>
      <td align="right"><?=$objResult["ext_small"];?></td>
      <td align="right"><?=$objResult["ext_testis"];?></td>
      <td align="right"><?=$objResult["ext_brain"];?></td>
      <td align="right"><?=$objResult["ext_liver"];?></td>
      <td align="right"><?=$objResult["ext_large"];?></td>
      <td align="right"><?=$objResult["ext_bone"];?></td>
      <td align="right"><?=$objResult["ext_spleen"];?></td>
      <td align="right"><?=$objResult["ext_skin"];?></td>
      <td align="right"><?=$objResult["ext_other_text"];?></td>
      <? ////***************************************************************?>
      	<td align="right"> </td>
        <td align="right"> <?=$objResult["per_ecog"];?></td>
       	<td align="right"><?=$objResult["ldh"];?></td>
       	<td align="right"><?=$objResult["hiv_positive"];?></td>
      <? ////***************************************************************?>
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <td align="right"></td>  
        <? ////***************************************************************?>
        <? //  เริ่ม follow up?>
        <td align="right"></td>  
		<td align="right"><?=$objResult["date_record_follow"];?></td>
         <td align="right"><?=$objResult["chemotherapy_follow"];?></td>  
         <td align="right"><?=$objResult["date_chemo_follow"];?></td>
         <td align="right"><?=$objResult["chemo_select_follow"];?></td>  
       	<td align="right"><?=$objResult["chemo_select_follow_other"];?></td>
        <td align="right"><?=$objResult["received_follow"];?></td>
        <td align="right"><?=$objResult["immunotherapy_follow"];?></td>
        <td align="right"><?=$objResult["date_immun_follow"];?></td>
        <td align="right"><?=$objResult["immun_select_follow"];?></td>
        <td align="right"><?=$objResult["immun_other_text"];?></td>
        <td align="right"><?=$objResult["rituximab_1"];?></td>
        <td align="right"><?=$objResult["rituximab_2"];?></td>
        
		<td align="right"></td>
        <td align="right"><?=$objResult["date_rad_follow"];?></td>
        <td align="right"></td>
        <td align="right"><?=$objResult["date_surgery_follow"];?></td>
        <td align="right"><?=$objResult["result_follow"];?><?=$objResult["date_complete_follow"];?></td>
        <td align="right"><?=$objResult["result_cause_follow"];?></td>
        <td align="right"><?=$objResult["progression_follow"];?></td>
        <td align="right"><?=$objResult["date_progression_follow"];?></td>
        <td align="right"><?=$objResult["histology_follow"];?></td>
        
        <td align="right"><?=$objResult["lymphnode_follow"];?></td>   
        <td align="right"><?=$objResult["extr_1_follow"];?>,<?=$objResult["extr_2_follow"];?>,<?=$objResult["extr_3_follow"];?><?=$objResult["extr_4_follow"];?>,<?=$objResult["extr_5_follow"];?>,<?=$objResult["extr_6_follow"];?>,<?=$objResult["extr_7_follow"];?>,<?=$objResult["extr_8_follow"];?>,<?=$objResult["extr_9_follow"];?>,<?=$objResult["extr_10_follow"];?>,<?=$objResult["extr_11_follow"];?>,<?=$objResult["extr_12_follow"];?>,<?=$objResult["extr_13_follow"];?>,<?=$objResult["extr_14_follow"];?>,<?=$objResult["extr_15_follow"];?><?=$objResult["extr_16_follow"];?>,<?=$objResult["extr_17_follow"];?>,<?=$objResult["extr_other_text"];?></td>     
 
        <td align="right"><?=$objResult["salvage_follow"];?></td>
        <td align="right"></td>
        <td align="right"><?=$objResult["chemo_follow_1"];?>,<?=$objResult["chemo_follow_2"];?>,<?=$objResult["chemo_follow_3"];?>,<?=$objResult["chemo_follow_4"];?>,<?=$objResult["chemo_follow_5"];?>,<?=$objResult["chemo_follow_6"];?>,<?=$objResult["chemo_follow_7"];?>,<?=$objResult["chemo_follow_8"];?>,<?=$objResult["chemo_follow_9"];?>,<?=$objResult["chemo_follow_10"];?>,<?=$objResult["chemo_follow_11"];?>,<?=$objResult["chemo_follow_12"];?>,<?=$objResult["chemo_follow_13"];?>,<?=$objResult["chemo_follow_14"];?>,<?=$objResult["chemo_follow_15"];?>,<?=$objResult["chemo_follow_16"];?>,<?=$objResult["chemo_follow_17"];?>,<?=$objResult["chemo_follow_18"];?>,<?=$objResult["chemo_follow_19"];?>,<?=$objResult["chemo_follow_20"];?>,<?=$objResult["chemo_follow_21"];?>,<?=$objResult["chemo_follow_22"];?>,<?=$objResult["chemo_follow_23"];?>,<?=$objResult["chemo_follow_24"];?>,<?=$objResult["chemo_follow_25"];?>,<?=$objResult["chemo_follow_26"];?>,<?=$objResult["chemo_follow_27"];?>,<?=$objResult["chemo_follow_28"];?>,<?=$objResult["chemo_follow_29"];?></td>   
         <td align="right"><?=$objResult["sal_immun_1"];?>,<?=$objResult["sal_immun_2"];?>,<?=$objResult["sal_immun_3"];?>,<?=$objResult["sal_immun_4_text"];?></td>
		<td align="right"><?=$objResult["sal_radio_follow"];?></td>
        <td align="right"><?=$objResult["sal_surgery_follow"];?></td>
        <td align="right"><?=$objResult["stem_cell_follow"];?></td>
        <td align="right"><?=$objResult["date_stem_cell_follow"];?></td>
        <td align="right"><?=$objResult["conditioning"];?></td>
        <td align="right"><?=$objResult["donor_follow"];?>,<?=$objResult["donor_follow_other"];?></td>
		<td align="right"><?=$objResult["status_follow"];?></td>
        <td align="right"><?=$objResult["date_last_contact_follow"];?></td>
        
        <td align="right"><?=$objResult["alive_status"];?></td>
        <td align="right"><?=$objResult["date_dead_follow"];?></td>
        <td align="right"><?=$objResult["cause_of_dead"];?>,<?=$objResult["cause_of_dead_other"];?></td>
        <td align="right"><?=$objResult["lymphoma_status"];?></td>
        
       
         
        
	</tr>
<?
}
?>
</table>
<?
	mysql_close($objConnect);

?>
</body>
</html>