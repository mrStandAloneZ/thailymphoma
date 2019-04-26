<? 
if(!session_is_registered('login_true')) {
//  url=index.php คำสั่งนี้จะให้ไปหน้าที่จะต้องกรอก user,pwd ถ้าอยู่โฟล์เดอร์อื่นให้เรียกให้ถูกนะครับ
	
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'><img src='images/logo.jpg' width='940' height='140' /></a></h1>
		</div>
		
		<div id='content'>
			
			<div class='x'></div>
			<!-- main content -->
			<div id='login'>
            	<div class='space'></div>
                <div class='space'></div>
				<h1>กรุณา Login เข้าสู่ระบบ</h1>
				<p>
				<img src='images/login-redirection-loader.gif' alt='login-redirection-loader' />
				";
	echo "<meta http-equiv='refresh' content='3;url=index.php?name=member&amp;file=login'>" ; 
	echo "	</p>
                </div>
			
			<!-- sidebar -->
			
			<div class='x'></div>
			<div class='break'></div>

		</div> " ;
 include 'modules/index/footer.php'; 
} 
else 
{
?>

<? include "modules/index/header.php" ; ?>
	<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ; 
$member_id=$dbarr['member_id']; 
$work=$dbarr['work'];
$hospital_name=$dbarr['hospital_name'];
$fullname=$dbarr['fullname'];
?>

<!-- main content -->
			<div id="left">
				<h1>ยินดีต้อนรับ</h1><h2><? echo $fullname;?></h2>ชื่อโรงพยาบาลที่สังกัด <? echo $hospital_name;?>&nbsp;&nbsp;ตำแหน่ง <? echo $work;?><p>
				
				<?
					$FileHtml = "html/systemtalk.html";
					$FileHtmlOpen = @fopen($FileHtml, "r");
					$HtmlContent = @fread ($FileHtmlOpen, @filesize($FileHtml));
					@fclose ($FileHtmlOpen);
					$HtmlContent = stripslashes($HtmlContent);
					echo $HtmlContent;
				?>
                </p>
                <h1>สถานะการลงทะเบียนข้อมูล ของ CML</h1>
             
                      <div class="post-options">
              
            </div>
				<div class="x"></div>
      
		
			</div>
			
			<!-- sidebar -->
			<div id="right">
			
		
				<h2></h2>
			
			
			</div>
            <div id="center">
            
            <br /><?php
  require_once("includes/add_data.php");

// เริ่มติดต่อฐานข้อมูล
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");


// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
/*
		if($duration_s != "")  {
		$duration_show	  = 'a';
		} else { $duration_show	= 'b';  }
			if($duration_s =='' ){
			$duration_show  = '1';	
			}  else     {
			 $duration_show  = '0';					}
*/



//กรอกข้อมูล--เพื่อค้นหา
echo"<CENTER>";
echo"<Form method='post' action='?name=index&file=index'> <Table border=0>
<Tr bgcolor=$bg><Td>Search  Data <Select name='field_search'size='1'> 
<Option value='subject'>Subject No.</option>
<Option value='patient_initials'>Patient Initials</option>
<Option value='genden'>genden</option> 
<Option value='current_address'>Current  Address :  Province</option> 
<Option value='payment'>payment</option>
<Input type='text' name='search' >	 
<Input type='submit' value='Search' ></Form></Td></Table>";
if($search=="")//ดูว่าช่องsearchมีข้อมูลไหม
{
	$sql2 = "select * from $tblname  where member_id='$member_id' order by id limit  $Gopage,$Pagesize";
	$set=0;
}
else
{
	$sql2 = " where $field_search like '%$search%'";
	$set=1;
}


// คำสั่ง SQL และสั่งให้ทำงาน
	$sql = "select * from $tblname where member_id='$member_id' ";

	
$dbquery = mysql_db_query($dbname, $sql);


// หาจำนวนเรกคอร์ดข้อมูลในตาราง
$num_rows = mysql_num_rows($dbquery);

// หาจำนวนฟิลด์ในตาราง
$num_fields = mysql_num_fields($dbquery);

$Gopage=$HTTP_GET_VARS["Page"];
if ($Gopage=="")
	{
		$Gopage=1;
	} 
$Pagesize=$HTTP_GET_VARS["Pagesize"];//รับค่าจำนวนเรกคอร์ดจาก Query String
$Pagesize=10; //กำหนดจำนวนเรกคอร์ดใน 1 หน้า
$Maxcount=ceil($num_rows/$Pagesize);	//ตัวแปรหาจำนวนหน้าทั้งหมด
$Gopage=(($Gopage-1)*$Pagesize)+$Recs;//ตัวแปรกำหนดหน้าที่จะไป เพื่อกำหนดเรกคอร์ดที่จะดึงข้อมูลมาแสดง
$Recs=0;
$Checkpage= ($Gopage/$Pagesize)+1;	 
If ($Checkpage==$Maxcount)//ตรวจสอบหน้าสุดท้าย
	{
		$Newsize=$num_rows % $Pagesize;
		if ($Newsize==0)
			{
				$Newsize=10;
			}
		$Pagesize=$Newsize;
	}
if($set==1)
{
	$sql2 = "select * from $tblname where  $field_search like '%$search%'  and member_id='$member_id' order by id limit  $Gopage,$Pagesize";	
	echo "<Font color=blue> แสดงผลการค้นหาข้อมูลที่มีคำว่า </Font><Font color=red>".$search." </Font></Font><br>&nbsp;";
}
else
{
					$sql2 = "select * from $tblname  where member_id='$member_id' order by id  limit  $Gopage,$Pagesize";	 
				
}


//พิมพ์ส่วนหัวตาราง
$bg="pink";	//กำหนดสีเริ่มต้น
echo "<Table border=0><Tr bgcolor=$bg>
	<Td><center>No.</center></Td>
	<Td><center>registry-1</center></Td>
	<Td><center>3 mo </center></Td>
	<Td><center>6 mo</center></Td>
	<td><center>9 mo</center></td>
	<Td><center>12 mo</center></Td>
   	<Td><center>18 mo </center></Td>
	<Td><center>24 mo</center></Td>
	<Td><center>36 mo </center></Td>
	<td><center>48  mo</center></td>
	<td><center>60  mo</center></td>
	<td><center>Second Lind</center></td>
	<td><center>Third </center></td>
	<td><center>Last</center></td>
	";  


//show search

$dbquery2= mysql_db_query($dbname,$sql2);
$numrows = mysql_num_rows($dbquery2);
$count=0;
if($num_rows==0)
	{
	echo "<Table border=1>";
	echo "<Tr bgcolor='ffffff'><Td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>ไม่มีข้อมูล !&nbsp;</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</Td></Tr>";
	echo "</Table>";
	}
else
 { 
While  ($Recs<=$Pagesize)	// แสดงเรกคอร์ดจำนวนไม่เกินจำนวนเรกคอร์ดต่อหน้า
	{		
			if($count<$numrows)
		   {
				$Number = $Gopage+$Recs+1;	// ตัวแปรแสดงเรกคอร์ดที่เท่าไร
				$result = mysql_fetch_array($dbquery2);
				$id = $result[id];
				////////////   registry  cml   
				$patient_initials = $result[patient_initials];
				$diagnosis_cml = $result[diagnosis_cml];
				$date_diagnosis = $result[date_diagnosis];
				$date_birth = $result[date_birth];
				$genden = $result[genden];
				$current_address = $result[current_address];
				$zip_code = $result[zip_code];
				$payment = $result[payment];
				$date_assessment = $result[date_assessment];
				$ecog_score = $result[ecog_score];
				$spleen_size = $result[spleen_size];
				$hematology_lab1 = $result[hematology_lab1];
				$hematology_lab2 = $result[hematology_lab2];
				$platelet_count = $result[platelet_count];
				$basophil = $result[basophil];
				$eosinophil = $result[eosinophil];
				$blast_cell = $result[blast_cell];
				$euro_hasford = $result[euro_hasford];
				$eutos = $result[eutos];
				$cytogenetic_study = $result[cytogenetic_study];
				$ph_chromosome = $result[ph_chromosome];
				$number_metaphase = $result[number_metaphase];
				$add_chrom = $result[add_chrom];
				$bcr_abl = $result[bcr_abl];
				$definitive = $result[definitive];
				$daily_dose = $result[daily_dose];
				$date_start = $result[date_start];
				$allogeneic_sct = $result[allogeneic_sct];
				$date_transplantation = $result[date_transplantation];	
				$status = $result[status];	
				/////// คำสั่งเปรียบเทียบข้อมูล 
			if($patient_initials != "" && $diagnosis_cml != "" && $date_diagnosis != "" && $date_birth !="" && $genden !="" && $current_address !=""  && $payment !="" && $date_assessment !="" && $ecog_score !="" &&  $spleen_size != "" &&  $hematology_lab1 !="" && $hematology_lab2 !=""  && $platelet_count != ""  && $basophil != "" && $eosinophil != "" && $blast_cell !="" && $sokal !="" && $euro_hasford !="" && $eutos !=""  &&  $cytogenetic_study !="" && $ph_chromosome !="" && $number_metaphase != "" && $add_chrom != "" && $bcr_abl != "" && $definitive != "" && $daily_dose != "" && $date_start != "" && $allogeneic_sct != "" ){
						$registry_show ="2";
				} else if($status == "1"){ 
						$registry_show ="1";
				} else {
					$registry_show ="0";
				}		
				
				///////////    3  month    duration_3m
				$date_of_assessment_3m = $result[date_of_assessment_3m];
				$duration_3m = $result[duration_3m];   
				$treatment_3m = $result[treatment_3m];   
				$daily_dose_3m = $result[daily_dose_3m];
				$spleen_size_3m = $result[spleen_size_3m];
				$hb_3m = $result[hb_3m];
				$wbc_3m = $result[wbc_3m];
				$platelet_count_3m = $result[platelet_count_3m];
				$basophil_3m = $result[basophil_3m];
				$eosinophil_3m = $result[eosinophil_3m];
				$blast_cell_3m = $result[blast_cell_3m];
				$result_p2_3m = $result[result_p2_3m];
				$ph_chromosome_p2_3m = $result[ph_chromosome_p2_3m];
				$number_metaphase_p2_3m = $result[number_metaphase_p2_3m];
				$add_chrom_p2_3m = $result[add_chrom_p2_3m];
				$rq_pcr_3m = $result[rq_pcr_3m];
				$re_treatment_p2_3m = $result[re_treatment_p2_3m];
				$p_treatment_c_3m = $result[p_treatment_c_3m];
				$change_treatment_3m = $result[change_treatment_3m];  
				$reason_chang_3m = $result[reason_chang_3m];   
				$progress_ap_3m = $result[progress_ap_3m];
				/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_3m != "" && $duration_3m != "" && $treatment_3m != "" && $daily_dose_3m !="" && $spleen_size_3m !="" && $hb_3m !="" && $wbc_3m !="" && $platelet_count_3m !="" && $basophil_3m !="" && $eosinophil_3m !="" &&  $blast_cell_3m !="" && $result_p2_3m !=""  && $ph_chromosome_p2_3m != ""  && $number_metaphase_p2_3m != "" && $add_chrom_p2_3m != "" && $rq_pcr_3m && $re_treatment_p2_3m !="" && $p_treatment_c_3m !=""  &&  $reason_chang_3m !="" && $progress_ap_3m !="" ){
					$month_3m_show ="1";
				}  else if($status == "2") {
					$month_3m_show ="2";
				}  else {
					$month_3m_show ="0";
				}
				
				/////// 6  month      
				$date_of_assessment_6m = $result[date_of_assessment_6m];
				$duration_6m = $result[duration_6m];   
				$treatment_6m = $result[treatment_6m];   
				$daily_dose_3m = $result[daily_dose_6m];
				$spleen_size_6m = $result[spleen_size_6m];
				$hb_6m = $result[hb_6m];
				$wbc_6m = $result[wbc_6m];
				$platelet_count_6m = $result[platelet_count_6m];
				$basophil_6m = $result[basophil_6m];
				$eosinophil_6m = $result[eosinophil_6m];
				$blast_cell_6m = $result[blast_cell_6m];
				$result_p2_6m = $result[result_p2_6m];
				$ph_chromosome_p2_6m = $result[ph_chromosome_p2_6m];
				$number_metaphase_p2_6m = $result[number_metaphase_p2_6m];
				$add_chrom_p2_6m = $result[add_chrom_p2_6m];
				$rq_pcr_6m = $result[rq_pcr_6m];
				$re_treatment_p2_6m = $result[re_treatment_p2_6m];
				$p_treatment_c_6m = $result[p_treatment_c_6m];
				$change_treatment_6m = $result[change_treatment_6m];  
				$reason_chang_6m = $result[reason_chang_6m];   
				$progress_ap_6m = $result[progress_ap_6m];
			/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_6m != "" && $duration_6m != "" && $treatment_6m != "" && $daily_dose_6m !="" && $spleen_size_6m !="" && $hb_6m !="" && $wbc_6m !="" && $platelet_count_6m !="" && $basophil_6m !="" && $eosinophil_6m !="" &&  $blast_cell_6m !="" && $result_p2_6m !=""  && $ph_chromosome_p2_6m != ""  && $number_metaphase_p2_6m != "" && $add_chrom_p2_6m != "" && $rq_pcr_6m && $re_treatment_p2_6m !="" && $p_treatment_c_6m !=""  &&  $reason_chang_6m !="" && $progress_ap_6m !="" ){
					$month_6m_show ="1";
				}  else if( $status == "2") {
							$month_6m_show ="2";
				}else {
					$month_6m_show ="0";
					}
					
					
		/////  9 month			
				$date_of_assessment_9m = $result[date_of_assessment_9m];
				$duration_9m = $result[duration_9m];   
				$treatment_9m = $result[treatment_9m];   
				$daily_dose_9m = $result[daily_dose_9m];
				$spleen_size_9m = $result[spleen_size_9m];
				$hb_9m = $result[hb_9m];
				$wbc_9m = $result[wbc_9m];
				$platelet_count_9m = $result[platelet_count_9m];
				$basophil_9m = $result[basophil_9m];
				$eosinophil_9m = $result[eosinophil_9m];
				$blast_cell_9m = $result[blast_cell_9m];
				$result_p2_9m = $result[result_p2_9m];
				$ph_chromosome_p2_9m = $result[ph_chromosome_p2_9m];
				$number_metaphase_p2_9m = $result[number_metaphase_p2_9m];
				$add_chrom_p2_9m = $result[add_chrom_p2_9m];
				$rq_pcr_9m = $result[rq_pcr_9m];
				$re_treatment_p2_9m = $result[re_treatment_p2_9m];
				$p_treatment_c_9m = $result[p_treatment_c_9m];
				$change_treatment_9m = $result[change_treatment_9m];  
				$reason_chang_9m = $result[reason_chang_9m];   
				$progress_ap_9m = $result[progress_ap_9m];
			/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_9m != "" && $duration_9m != "" && $treatment_9m != "" && $daily_dose_9m !="" && $spleen_size_9m !="" && $hb_9m !="" && $wbc_9m !="" && $platelet_count_9m !="" && $basophil_9m !="" && $eosinophil_9m !="" &&  $blast_cell_9m !="" && $result_p2_9m !=""  && $ph_chromosome_p2_9m != ""  && $number_metaphase_p2_9m != "" && $add_chrom_p2_9m != "" && $rq_pcr_9m && $re_treatment_p2_9m !="" && $p_treatment_c_9m !=""  &&  $reason_chang_9m !="" && $progress_ap_9m !="" ){
					$month_9m_show ="1";
				}  else if($status == "2"){
					$month_9m_show ="2";			
				}else{
					$month_9m_show ="0";
					}
			///////  12  month  follow up 		
				$date_of_assessment_12m = $result[date_of_assessment_12m];
				$duration_12m = $result[duration_12m];   
				$treatment_12m = $result[treatment_12m];   
				$daily_dose_12m = $result[daily_dose_12m];
				$spleen_size_12m = $result[spleen_size_12m];
				$hb_12m = $result[hb_12m];
				$wbc_12m = $result[wbc_12m];
				$platelet_count_12m = $result[platelet_count_12m];
				$basophil_12m = $result[basophil_12m];
				$eosinophil_12m = $result[eosinophil_12m];
				$blast_cell_12m = $result[blast_cell_12m];
				$result_p2_12m = $result[result_p2_12m];
				$ph_chromosome_p2_12m = $result[ph_chromosome_p2_12m];
				$number_metaphase_p2_12m = $result[number_metaphase_p2_12m];
				$add_chrom_p2_12m = $result[add_chrom_p2_12m];
				$rq_pcr_12m = $result[rq_pcr_12m];
				$re_treatment_p2_12m = $result[re_treatment_p2_12m];
				$p_treatment_c_12m = $result[p_treatment_c_12m];
				$change_treatment_12m = $result[change_treatment_12m];  
				$reason_chang_12m = $result[reason_chang_12m];   
				$progress_ap_12m = $result[progress_ap_12m];
			/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_12m != "" && $duration_12m != "" && $treatment_12m != "" && $daily_dose_12m !="" && $spleen_size_12m !="" && $hb_12m !="" && $wbc_12m !="" && $platelet_count_12m !="" && $basophil_12m !="" && $eosinophil_12m !="" &&  $blast_cell_12m !="" && $result_p2_12m !=""  && $ph_chromosome_p2_12m != ""  && $number_metaphase_p2_12m != "" && $add_chrom_p2_12m != "" && $rq_pcr_12m && $re_treatment_p2_12m !="" && $p_treatment_c_12m !=""  &&  $reason_chang_12m !="" && $progress_ap_12m !="" ){
					$month_12m_show ="1";
				}  else if($status == "2"){
					$month_12m_show ="2";
				}else {
					$month_12m_show ="0";
					}
		///////   18  month follow  up
				$date_of_assessment_18m = $result[date_of_assessment_18m];
				$duration_18m = $result[duration_18m];   
				$treatment_18m = $result[treatment_18m];   
				$daily_dose_18m = $result[daily_dose_18m];
				$spleen_size_18m = $result[spleen_size_18m];
				$hb_18m = $result[hb_18m];
				$wbc_18m = $result[wbc_18m];
				$platelet_count_18m = $result[platelet_count_18m];
				$basophil_18m = $result[basophil_18m];
				$eosinophil_18m = $result[eosinophil_18m];
				$blast_cell_18m = $result[blast_cell_18m];
				$result_p2_18m = $result[result_p2_18m];
				$ph_chromosome_p2_18m = $result[ph_chromosome_p2_18m];
				$number_metaphase_p2_18m = $result[number_metaphase_p2_18m];
				$add_chrom_p2_18m = $result[add_chrom_p2_18m];
				$rq_pcr_18m = $result[rq_pcr_18m];
				$re_treatment_p2_18m = $result[re_treatment_p2_18m];
				$p_treatment_c_18m = $result[p_treatment_c_18m];
				$change_treatment_18m = $result[change_treatment_18m];  
				$reason_chang_18m = $result[reason_chang_18m];   
				$progress_ap_18m = $result[progress_ap_18m];
			/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_18m != "" && $duration_18m != "" && $treatment_18m != "" && $daily_dose_18m !="" && $spleen_size_18m !="" && $hb_18m !="" && $wbc_18m !="" && $platelet_count_18m !="" && $basophil_18m !="" && $eosinophil_18m !="" &&  $blast_cell_18m !="" && $result_p2_18m !=""  && $ph_chromosome_p2_18m != ""  && $number_metaphase_p2_18m != "" && $add_chrom_p2_18m != "" && $rq_pcr_18m && $re_treatment_p2_18m !="" && $p_treatment_c_18m !=""  &&  $reason_chang_18m !="" && $progress_ap_18m !="" ){
					$month_18m_show ="1";
				}  else  if ($status == "2"){
					$month_18m_show ="2";
				}else {
					$month_18m_show ="0";
					}
		////  24  month 
				$date_of_assessment_24m = $result[date_of_assessment_24m];
				$duration_24m = $result[duration_24m];   
				$treatment_24m = $result[treatment_24m];   
				$daily_dose_24m = $result[daily_dose_24m];
				$spleen_size_24m = $result[spleen_size_24m];
				$hb_24m = $result[hb_24m];
				$wbc_24m = $result[wbc_24m];
				$platelet_count_24m = $result[platelet_count_24m];
				$basophil_24m = $result[basophil_24m];
				$eosinophil_24m = $result[eosinophil_24m];
				$blast_cell_24m = $result[blast_cell_24m];
				$result_p2_24m = $result[result_p2_24m];
				$ph_chromosome_p2_24m = $result[ph_chromosome_p2_24m];
				$number_metaphase_p2_24m = $result[number_metaphase_p2_24m];
				$add_chrom_p2_24m = $result[add_chrom_p2_24m];
				$rq_pcr_24m = $result[rq_pcr_24m];
				$re_treatment_p2_24m = $result[re_treatment_p2_24m];
				$p_treatment_c_24m = $result[p_treatment_c_24m];
				$change_treatment_24m = $result[change_treatment_24m];  
				$reason_chang_24m = $result[reason_chang_24m];   
				$progress_ap_24m = $result[progress_ap_24m];
			/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_24m != "" && $duration_24m != "" && $treatment_24m != "" && $daily_dose_24m !="" && $spleen_size_24m !="" && $hb_24m !="" && $wbc_24m !="" && $platelet_count_24m !="" && $basophil_24m !="" && $eosinophil_24m !="" &&  $blast_cell_24m !="" && $result_p2_24m !=""  && $ph_chromosome_p2_24m != ""  && $number_metaphase_p2_24m != "" && $add_chrom_p2_24m != "" && $rq_pcr_24m && $re_treatment_p2_24m !="" && $p_treatment_c_24m !=""  &&  $reason_chang_24m !="" && $progress_ap_24m !="" ){
					$month_24m_show ="1";
				}  else  if($status == "2"){
					$month_24m_show ="2";		
				} else {
					$month_24m_show ="0";
					}
		///////////////  36  month
				$date_of_assessment_36m = $result[date_of_assessment_36m];
				$duration_36m = $result[duration_36m];   
				$treatment_36m = $result[treatment_36m];   
				$daily_dose_36m = $result[daily_dose_36m];
				$spleen_size_36m = $result[spleen_size_36m];
				$hb_36m = $result[hb_36m];
				$wbc_36m = $result[wbc_36m];
				$platelet_count_36m = $result[platelet_count_36m];
				$basophil_36m = $result[basophil_36m];
				$eosinophil_36m = $result[eosinophil_36m];
				$blast_cell_36m = $result[blast_cell_36m];
				$result_p2_36m = $result[result_p2_36m];
				$ph_chromosome_p2_36m = $result[ph_chromosome_p2_36m];
				$number_metaphase_p2_36m = $result[number_metaphase_p2_36m];
				$add_chrom_p2_36m = $result[add_chrom_p2_36m];
				$rq_pcr_36m = $result[rq_pcr_36m];
				$re_treatment_p2_36m = $result[re_treatment_p2_36m];
				$p_treatment_c_36m = $result[p_treatment_c_36m];
				$change_treatment_36m = $result[change_treatment_36m];  
				$reason_chang_36m = $result[reason_chang_36m];   
				$progress_ap_36m = $result[progress_ap_36m];
			/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_36m != "" && $duration_36m != "" && $treatment_36m != "" && $daily_dose_36m !="" && $spleen_size_36m !="" && $hb_36m !="" && $wbc_36m !="" && $platelet_count_36m !="" && $basophil_36m !="" && $eosinophil_36m !="" &&  $blast_cell_36m !="" && $result_p2_36m !=""  && $ph_chromosome_p2_36m != ""  && $number_metaphase_p2_36m != "" && $add_chrom_p2_36m != "" && $rq_pcr_36m && $re_treatment_p2_36m !="" && $p_treatment_c_36m !=""  &&  $reason_chang_36m !="" && $progress_ap_36m !="" ){
					$month_36m_show ="1";
				}  else  if($status == "2"){
					$month_36m_show ="2";
				}else {
					$month_36m_show ="0";
					}
		////  48  month  
				$date_of_assessment_48m = $result[date_of_assessment_48m];
				$duration_48m = $result[duration_48m];   
				$treatment_48m = $result[treatment_48m];   
				$daily_dose_48m = $result[daily_dose_48m];
				$spleen_size_48m = $result[spleen_size_48m];
				$hb_48m = $result[hb_48m];
				$wbc_48m = $result[wbc_48m];
				$platelet_count_48m = $result[platelet_count_48m];
				$basophil_48m = $result[basophil_48m];
				$eosinophil_48m = $result[eosinophil_48m];
				$blast_cell_48m = $result[blast_cell_48m];
				$result_p2_48m = $result[result_p2_48m];
				$ph_chromosome_p2_48m = $result[ph_chromosome_p2_48m];
				$number_metaphase_p2_48m = $result[number_metaphase_p2_48m];
				$add_chrom_p2_48m = $result[add_chrom_p2_48m];
				$rq_pcr_48m = $result[rq_pcr_48m];
				$re_treatment_p2_48m = $result[re_treatment_p2_48m];
				$p_treatment_c_48m = $result[p_treatment_c_48m];
				$change_treatment_48m = $result[change_treatment_48m];  
				$reason_chang_48m = $result[reason_chang_48m];   
				$progress_ap_48m = $result[progress_ap_48m];
			/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_48m != "" && $duration_48m != "" && $treatment_48m != "" && $daily_dose_48m !="" && $spleen_size_48m !="" && $hb_48m !="" && $wbc_48m !="" && $platelet_count_48m !="" && $basophil_48m !="" && $eosinophil_48m !="" &&  $blast_cell_48m !="" && $result_p2_48m !=""  && $ph_chromosome_p2_48m != ""  && $number_metaphase_p2_48m != "" && $add_chrom_p2_48m != "" && $rq_pcr_48m && $re_treatment_p2_48m !="" && $p_treatment_c_48m !=""  &&  $reason_chang_48m !="" && $progress_ap_48m !="" ){
					$month_48m_show ="1";
				}  else  if($status == "2"){
					$month_48m_show ="2";
				}else {
				$month_48m_show ="0";
					}
		///////  60  month
				$date_of_assessment_60m = $result[date_of_assessment_60m];
				$duration_60m = $result[duration_60m];   
				$treatment_60m = $result[treatment_60m];   
				$daily_dose_60m = $result[daily_dose_60m];
				$spleen_size_60m = $result[spleen_size_60m];
				$hb_60m = $result[hb_60m];
				$wbc_60m = $result[wbc_60m];
				$platelet_count_60m = $result[platelet_count_60m];
				$basophil_60m = $result[basophil_60m];
				$eosinophil_60m = $result[eosinophil_60m];
				$blast_cell_60m = $result[blast_cell_60m];
				$result_p2_60m = $result[result_p2_60m];
				$ph_chromosome_p2_60m = $result[ph_chromosome_p2_60m];
				$number_metaphase_p2_60m = $result[number_metaphase_p2_60m];
				$add_chrom_p2_60m = $result[add_chrom_p2_60m];
				$rq_pcr_60m = $result[rq_pcr_60m];
				$re_treatment_p2_60m = $result[re_treatment_p2_60m];
				$p_treatment_c_60m = $result[p_treatment_c_60m];
				$change_treatment_60m = $result[change_treatment_60m];  
				$reason_chang_60m = $result[reason_chang_60m];   
				$progress_ap_60m = $result[progress_ap_60m];
			/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_60m != "" && $duration_60m != "" && $treatment_60m != "" && $daily_dose_60m !="" && $spleen_size_60m !="" && $hb_60m !="" && $wbc_60m !="" && $platelet_count_60m !="" && $basophil_60m !="" && $eosinophil_60m !="" &&  $blast_cell_60m !="" && $result_p2_60m !=""  && $ph_chromosome_p2_60m != ""  && $number_metaphase_p2_60m != "" && $add_chrom_p2_60m != "" && $rq_pcr_60m && $re_treatment_p2_60m !="" && $p_treatment_c_60m !=""  &&  $reason_chang_60m !="" && $progress_ap_60m !="" ){
					$month_60m_show ="1";
				}  else  if($status == "2"){
					$month_60m_show ="2";
				}else{
					$month_60m_show ="0";
					}
			///// 		  Second Lind
				$date_of_assessment_s = $result[date_of_assessment_s];
				$duration_s = $result[duration_s];   
				$mutation_an_s = $result[mutation_an_s];   
				$m_result_s = $result[m_result_s];
				$treatment_s = $result[treatment_s];
				$daily_dose_s = $result[daily_dose_s];
				$start_date_s = $result[start_date_s];
				$result_s = $result[result_s];
				$ph_chromosome_s = $result[ph_chromosome_s];
				$number_metaphase_s = $result[number_metaphase_s];
				$add_chrom_s = $result[add_chrom_s];
				$rq_pcr_s = $result[rq_pcr_s];
				$re_treatment_s = $result[re_treatment_s];
				$p_treatment_c_s = $result[p_treatment_c_s];
				$change_treatment_s = $result[change_treatment_s];
				$reason_chang_s = $result[reason_chang_s];
				$progress_ap_s = $result[progress_ap_s];
				/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_s != "" && $duration_s != "" && $mutation_an_s != ""  && $m_result_s !="" && $treatment_s !="" && $daily_dose_s !="" && $start_date_s !="" && $result_s !="" && $ph_chromosome_s !="" &&  $ph_chromosome_s !="" && $number_metaphase_s !=""  && $add_chrom_s != ""  && $rq_pcr_s != "" && $re_treatment_s != "" && $p_treatment_c_s && $change_treatment_s !="" && $reason_chang_s !=""  &&  $progress_ap_s !="" ){
					$second_lind ="1";
				}  else if ($status == "2"){
					$second_lind ="2";
				}else {
					$second_lind ="0";
					}
			///	  Third  Lind 
				$date_of_assessment_t = $result[date_of_assessment_t];
				$duration_t = $result[duration_t];   
				$mutation_an_t = $result[mutation_an_t];   
				$result_mu_t = $result[result_mu_t];
				$treatment_t = $result[treatment_t];
				$daily_dose_t = $result[daily_dose_t];
				$start_date_t = $result[start_date_t];
				$result_t = $result[result_t];
				$ph_chromosome_t = $result[ph_chromosome_t];
				$number_metaphase_t = $result[number_metaphase_t];
				$add_chrom_t = $result[add_chrom_t];
				$rq_pcr_t = $result[rq_pcr_t];
				$re_treatment_t = $result[re_treatment_t];
				$p_treatment_c_t = $result[p_treatment_c_t];
				$change_treatment_t = $result[change_treatment_t];
				$specify_tr_t = $result[specify_tr_t];
				$reason_chang_t = $result[reason_chang_t];
				$progress_ap_t = $result[progress_ap_t];
				/////คำสั่งเปรียบเทียบข้อมูล
				if($date_of_assessment_t != "" && $duration_t != "" && $mutation_an_t != "" && $result_mu_t !="" && $treatment_t !="" && $daily_dose_t !="" && $start_date_t !="" && $result_t !="" && $ph_chromosome_t !="" && $number_metaphase_t !="" &&  $add_chrom_t !="" && $rq_pcr_t !=""  && $re_treatment_t != ""  && $p_treatment_c_t != "" && $change_treatment_t != "" && $specify_tr_t && $reason_chang_t !="" && $progress_ap_t !=""   ){
					$third_lind  ="1";
				}  else if ($status  == "2"){
					$third_lind  ="2";
				}else{
					$third_lind ="0";
					}
		///////   last  
				$date_assessment_plast = $result[date_assessment_plast];
				$current_treatment = $result[current_treatment];   
				$daily_dose_plast = $result[daily_dose_plast];   
				$number_treatment_plast = $result[number_treatment_plast];
				$dora_registry = $result[dora_registry];
				$re_treatment_plast = $result[re_treatment_plast];
				$progression_ap_plast = $result[progression_ap_plast];
				$death_plast = $result[death_plast];
				$cause_death = $result[cause_death];
				/////คำสั่งเปรียบเทียบข้อมูล
				if($date_assessment_plast != "" && $current_treatment != "" && $daily_dose_plast != "" && $number_treatment_plast !="" && $dora_registry !="" && $re_treatment_plast !="" && $progression_ap_plast !="" && $death_plast !="" && $cause_death !=""   ){
					$last  ="1";
				}  else if ($status == "2"){
					$last  ="2";
				}else {
					$last ="0";
					}
			
			
			
		//////
			If ($bg=="skyblue")
				{
				$bg="skyblue";		
				}
			Else
				{
				$bg="skyblue";
				}
		//show data
	echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
	echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$Number</Td> ";
			   ?>
	<?			if ($registry_show == 2){		//  ส่วนของการเปรียบเทียบข้อมูล ว่าตอนนี้อยู่ในสถานะไหน ถ้าส่งข้อมูลให้ส่วนกลางแล้วไม่สามารถ ให้แก้ไขข้อมูลได้ครับ			
			 echo" <td><center>
							2</center>
			</td> ";
				}
				else {
					echo "  <td><center>
							<A Href='index.php?name=member&file=edit_data_one&id=$id'>$registry_show</A></center>
						</td> ";
				}  ?>   
			<? 
			if ($month_3m_show == 2){	
			 echo" <td><center>
							2</center>
			</td> ";
				}
				else {
			 echo  "<Td><center><a href='index.php?name=member&file=edit_data_3m&id=$id'>$month_3m_show</a></center></Td>	 ";
			 }  ?>
			 
			 
	<?  
	//    data  6 เดือน
	if ($month_6m_show == 2){	
			 echo" <td><center>
							2</center>
			</td> ";
				}
				else {
			 echo  "<Td><center><a href='index.php?name=member&file=edit_data_6m&id=$id'>$month_6m_show</a></center></Td>	 ";
			 } 
	?> 
	<?  //  9  month
				if ($month_9m_show == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<td><center><a href='index.php?name=member&file=edit_data_9m&id=$id'>$month_9m_show</a></center></td>";  
			 } 
	?>		
	<? 		
		
		if ($month_12m_show == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_12m&id=$id'>$month_12m_show</a></center></Td>";
			 }  
			 ?>
		<?
			//    data 18 month      
			 if ($month_18m_show == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_18m&id=$id'>$month_18m_show</a></center></Td>";
			 }  
			 ?>
	<?		 
				//    data 24 month      
			 if ($month_24m_show == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_24m&id=$id'>$month_24m_show</a></center></Td>";
			 }  
			
			?>
	<?		//  data  36  month
   			
      			 if ($month_36m_show == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_36m&id=$id'>$month_36m_show</a></center></Td>";
			 } 
	  ?>
	  <?  //data 48  month

			 if ($month_48m_show == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_48m&id=$id'>$month_48m_show</a></center></Td>";
			 }
		?>
		<?   // data  60  month      
			 if ($month_60m_show == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_60m&id=$id'>$month_60m_show</a></center></Td>";
			 }
	?>		
	<?  // second_lind
		
		 if ($second_lind == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_pthree&id=$id'>$second_lind</a></center></Td>";
			 }
		
		?>
	<?	   // Third  Lind
		
		 if ($third_lind == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_pfour&id=$id'>$third_lind</a></center></Td>";
			 }
		
		?>
		<?   //  data  last  
			   if ($last == 2){	
			 echo" <td><center>	2</center>	</td> ";	
				}  else {
			 echo   "<Td><center><a href='index.php?name=member&file=edit_data_pfive&id=$id'>$last</a></center></Td>";
			 }
		
			  //แสดงข้อมูลแต่ละฟิลด์ 
		?><?
		       $count++;										
		    }
		$Recs++;		
    }//end while
}
	echo "</Table>";
if($set==1)
{
	echo "<Br>ค้นพบ <Font color=red>".$numrows." เรกคอร์ด</font><br>";
}
else
{
	echo "<Br>ข้อมูลทั้งหมด <Font color=red>".$num_rows." เรกคอร์ด</font><br>";
}
	echo "<CENTER><Br>หน้าที่ ".$Checkpage." / " .$Maxcount."<Br>";
if($num_rows>10)
{
	If ($Checkpage>1)		//ถ้าแสดงหน้าที่มากกว่า 1 จะมี Previous
		{
		echo "[ <A Href=".$Scriptname."?Page=".($Checkpage-1)."&Pagesize=".$Pagesize.">กลับไปหน้าที่แล้ว</A> ]";
		}
	echo "[";
	$Pad="";
	//รับค่าชื่อสคริปต์เพื่อนำมาใช้เป็นส่วนหนึ่งของการอ้างอิง
	$Scriptname=${"Script_Name"};
	for ($N=1; $N<=$Maxcount; $N=$N+1)
	{
		 if ($N>=10)
			{
				$Pad="";
			} 
		//กำหนดหมายเลขหน้าเพื่ออ้างอิงต่อไป
		$Ref="<A Href=".$Scriptname."?Page=".$N."&Pagesize=".$Pagesize.">".$Pad.$N."</A>";
		echo "  ".$Ref."  ";
	} 
	echo "]";
If ($Checkpage<$Maxcount)		//ถ้าแสดงหน้าที่น้อยกว่าหน้าสูงสุด จะมี Next
	{
	echo "[<A Href=".$Scriptname."?Page=".($Checkpage+1)."&Pagesize=".$Pagesize.">หน้าถัดไป</A> ]";
	}
echo"</CENTER>";
}
echo "</Table>";

mysql_close();	// ปิดการเชื่อมต่อ
?>
 
			
			
			<!-- sidebar -->
		  <h3 align="center">0 = incomplete ,  1 = complete ,  2 = approve</h3>
            <div id="left">
          

            <br />
         <h3 align="center"></h3>
     
			</div>
            <h1></h1>
     
			</div>
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
        
	<? include "modules/index/footer.php"; ?>
<? }   ?>

