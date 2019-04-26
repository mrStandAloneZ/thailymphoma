<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);


?><br />


<style type="text/css">





	select {
    width: 90%;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
        background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; 
}
input {
    width: 100px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
textarea{
      width: 100%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #f6f6f6;
 font-size: 15px;
  color:#18222e;
}
</style>
		<table width="95%"  align="center" border="0" cellspacing="2" cellpadding="0">

<tr height="20">
</tr>
<?php
$txtpage = "";
if(isset($_GET["pagelink"]) && $_GET["pagelink"] !=""){
$txtpage = "";
if(trim($_GET["pagelink"])=="data_all_bma"){$txtpage="BMA";}
if(trim($_GET["pagelink"])=="data_all_cmu"){$txtpage="CMU";}
if(trim($_GET["pagelink"])=="data_all_cu"){$txtpage="CU";}
if(trim($_GET["pagelink"])=="data_all_cri"){$txtpage="CRI";}
if(trim($_GET["pagelink"])=="data_all_kh"){$txtpage="KH";}
if(trim($_GET["pagelink"])=="data_all_kku"){$txtpage="KKU";}
if(trim($_GET["pagelink"])=="data_all_nu"){$txtpage="NU";}
if(trim($_GET["pagelink"])=="data_all_pmk"){$txtpage="PMK";}
if(trim($_GET["pagelink"])=="data_all_psu"){$txtpage="PSU";}
if(trim($_GET["pagelink"])=="data_all_ra"){$txtpage="RA";}
if(trim($_GET["pagelink"])=="data_all_rvt"){$txtpage="RVT";}
if(trim($_GET["pagelink"])=="data_all_si"){$txtpage="SI";}
if(trim($_GET["pagelink"])=="data_all_swu"){$txtpage="SWU";}
if(trim($_GET["pagelink"])=="data_all_tu"){$txtpage="TU";}
echo "<center><a href='http://thailymphomaregistry.org/admin.php?name=admin&file=data_all'>[ ย้อนกลับ ]</a></center>";
echo "<table bgcolor='#f5f4f0' ><tr><td style='padding-left: 35px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1>สถานะการลงทะเบียนข้อมูล  $txtpage</h1></td></tr></table>";



}else{
echo "<table bgcolor='#f5f4f0'><tr><td style='padding-left: 35px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1>สถานะการลงทะเบียนข้อมูล  ทั้งหมด</h1></td></tr></table>";
 ?>
<table>
<TR>
    <Th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_bma"><IMG SRC="images/admin//i-knowledge.png"  BORDER="0" align="absmiddle"> <B>BMA (Vajira Hospital)</B></A></Th>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_cmu"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"> <b>CMU (Maharaj Nakorn Chiang Mai Hospital)</b></A></th>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_cu"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"> <b>CU (King Chulalongkorn Memorial Hospital)<b></A></th>
 </TR>
  <tr>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_cri"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"> <B>CRI (Chulabhorn Research Institute)</B></A></th>
    <Th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_kh"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"> <B>KH (Konkaen Hospital)</B></A></Th>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_kku"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>KKU (Srinakarind Hospital)</b></A></th>
    </tr>
    <tr>
  	<th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_nu"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>NU (Naresuan University Hospital)</b></A></th>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_pmk"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>PMK (Phramongkutklao Hospital)<b></b></th>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_psu"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>PSU (Songklanakarind Hospital)</b></A></th>
  	</TR>
    <tr>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_ra"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>RA (Ramathibodi Hospital)</b></A></th>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_rvt"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>RVT (Rajavithi Hospital)</b></A></th>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_si"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>SI (Siriraj Hospital)</b></A></th>
    </tr>
    <tr>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_swu"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>SWU (Prince Sirinthorn Hospital)</b></A></th>
    <th align="left"><A HREF="admin.php?name=admin&file=data_all&pagelink=data_all_tu"><IMG SRC="images/admin/i-knowledge.png"  BORDER="0" align="absmiddle"><b>TU (Thammasart Hospital)</b></A></th>
    <th align="left"></th>
    </tr>
</table>
<?php }?>
<br /><br>

<?php
$filltertxt = "";
require_once("includes/add_data.php");
$field_search = $_GET["field_search"];
$finddata = $_GET["finddata"];
if($finddata==""){$fillter="";}else{
$fillter = "    and $field_search  like '%$finddata%'  ";
}
if($txtpage==""){$filltertxt="";}else{
        $filltertxt = " and  codehos ='$txtpage' ";
}


  if($_GET["nx5"]){$nx5=$_GET["nx5"]*20;}else{$nx5=0;}
  



   $sql2 = "SELECT * FROM `web_add_data1` where 1  $fillter  $filltertxt order by  id asc";
//echo  $sql2."xxxx";
// เริ่มติดต่อฐานข้อมูลv
	mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
	mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

//กรอกข้อมูล--เพื่อค้นหา
//$field_search =  $_POST["field_search"];



$txt1  ="";
$txt2 = "";
if(isset($_GET["field_search"])){ $txt1 = $_GET["field_search"];}else{$txt1 = "";}
if(isset($_GET["finddata"])){$txt2 = $_GET["finddata"]; }else{$txt2 = "";}

	echo"<CENTER>";
	
	?>
	
	<Form method='get' action=''> <Table border=0>
	    <input type='hidden' name='name' value='admin'>
		<input type='hidden' name='file' value='data_all'>
		<input type='hidden' name='pagelink' value='<?=$_GET["pagelink"]?>'>
	<Tr bgcolor=<?=$bg?>><Td>Search  Data <Select name='field_search' size='1'> 
	<Option value='centre' <?php if($txt1=="centre"){ echo " selected";}else{echo "";}?>>Code</option>
	<Option value='patient_initials' <?php if($txt1=="patient_initials"){ echo " selected";}else{echo "";}?>>Patient Initials</option>
	<Option value='sex' <?php if($txt1=="sex"){ echo " selected";}else{echo "";}?>>gender</option> 
	<Option value='province' <?php if($txt1=="province"){ echo " selected";}else{echo "";}?>>Current  Address :  Province</option> 
	<Option value='hn' <?php if($txt1=="hn"){ echo " selected";}else{echo "";}?>>HN</option>
	<Input type='text' name='finddata'  value="<?=$txt2?>">	 
	<Input type='submit' value='Search'  style="background-color:#7a5037;color:#FFFFFF;cursor:pointer"></Form></Td></Table>
	
	
<?php


//พิมพ์ส่วนหัวตาราง
$bg="#d78611";	//กำหนดสีเริ่มต้น
echo "<Table border=0><Tr bgcolor=$bg>
<Td><center>Subject</center></Td>
<Td><center>Code</center></Td>
<Td><center>Patient Initials</center></Td>
<Td><center>Date of Birth</center></Td>
<Td><center>Date of record</center></Td>
<Td><center>Date of last Contact</center></Td>
<td><center>Pathology Consensus</center></td>
<Td><center>Status 1<br>(First  entry)</center></Td>
<Td><center>Edit</center></Td>
<td><center>Follow up</center></td>
<td><center>Status 2<br>(Follow up)</center></td>
</tr>
";  


//show search




$dbquery2= mysql_db_query($dbname,$sql2." LIMIT 20 OFFSET $nx5");
$dbquery3= mysql_db_query($dbname,$sql2);
$count=0;

	
         $numrows = mysql_num_rows($dbquery3);
	     $num5 = ceil( $numrows /20);


				while($result = mysql_fetch_array($dbquery2)){
				////////////   registry  lymphoma
				$id = $result[id];
				$dateofrecord = $result[dateofrecord];
				$subject = $result[subject];
				$centre = $result[centre];
				$d_record = $result[d_record];
				$m_record = $result[m_record];
				$y_record = $result[y_record];
				$date_of_record = $result[date_of_record];
				$patient_initials = $result[patient_initials];
				$sex = $result[sex];
				$id_card = $result[id_card];
				$hn = $result[hn];
				$date_of_birth = $result[date_of_birth];
				$province = $result[province];
				$payment = $result[payment];
				$date_bio_report=	 $result[date_bio_report];
				$pathology = $result[pathology];
				$biopsy_site = $result[biopsy_site];
				$type = $result[type];
				$hodgkin_don = $result[hodgkin_don];
				$type_non = $result[type_non];
				$type_sub_non = $result[type_sub_non];
				$who_sub = $result[who_sub];
				$work_sub = $result[work_sub];
				$other_type = $result[other_type];
				$ann_arbor = $result[ann_arbor];
				$symptom_ann = $result[symptom_ann];
				$ext_none = $result[ext_none];
				$ext_wal = $result[ext_wal];
				$ext_sin = $result[ext_sin];
				$ext_sal = $result[ext_sal];
				$ext_thy = $result[ext_thy];
				$ext_eye = $result[ext_eye];
				$ext_lung = $result[ext_lung];
				$ext_breast = $result[ext_breast];
				$ext_stomach = $result[ext_stomach];
				$ext_small = $result[ext_small];
				$ext_testis = $result[ext_testis];
				$ext_brain = $result[ext_brain];
				$ext_liver = $result[ext_liver];
				$ext_large = $result[ext_large];
				$ext_bone = $result[ext_bone];
				$ext_spleen = $result[ext_spleen];
				$ext_skin = $result[ext_skin];
				$ext_other = $result[ext_other];
				$ext_other_text = $result[ext_other_text];
				$per_ecog = $result[per_ecog];
				$ldh = $result[ldh];
				$hiv_positive = $result[hiv_positive];
					/////// Patient Initials   
				if($patient_initials != "" && $sex != "" && $id_card != "" && $hn !="" && $date_of_birth !="" && $province !=""  && $payment !="" && $date_bio_report !="" && $pathology !="" &&  $biopsy_site != "" &&  $type !="" && $ann_arbor !="" && $symptom_ann != "" && $per_ecog != ""&& $ldh != ""&& $hiv_positive != ""&& $status_page_one == ""){
					$general_show ="complete";
				} else if($patient_initials != "" && $status_page_one == ""){ 
					$general_show ="incomplete";
				} else  {
					$general_show ="No Data";
				}		
				//*******status2  follow
				$result_follow=	 $result[result_follow];
				$result_cause_follow=	 $result[result_cause_follow];
				$progression_follow=	 $result[progression_follow];
				$salvage_follow=	 $result[salvage_follow];
				$surgery_follow=	 $result[surgery_follow];
				$stem_cell_follow=	 $result[stem_cell_follow];
				$date_last_contact_follow=	 $result[date_last_contact_follow];
				$status_follow=	 $result[status_follow];
				$status_follow2=	 $result[status_follow2];
				
					/////// 
				if($result_follow != ""  && $progression_follow !="" &&  $salvage_follow != "" &&  $stem_cell_follow !="" && $date_last_contact_follow !="" && $status_follow != "" && $status_follow2 == "" ){
					$status2_follow ="complete";
				} else if($patient_initials != "" && $status_follow2 == ""){ 
					$status2_follow ="incomplete";
				} else  {
					$status2_follow ="No Data";
				}		
				//********Pathology *****
				$date_bio_report_pathology=	 $result[date_bio_report_pathology];
				$pathology_pathology=	 $result[pathology_pathology];
				$biopsy_site_pathology=	 $result[biopsy_site_pathology];
				$type_pathology = $result[type_pathology];
				$type_hodgkin_pathology=	 $result[type_hodgkin_pathology];
				$immunophenotype_pathology=	 $result[immunophenotype_pathology];
				$type_sub_non_pathology=	 $result[type_sub_non_pathology];
				$who_sub_pathology=	 $result[who_sub_pathology];
				$other_type_pathology=	 $result[other_type_pathology];
			
			if($date_bio_report_pathology != "" && $pathology_pathology != "" && $biopsy_site_pathology !="" && $type_pathology != ""  ){
					$status_pathology ="yes";
				} else if($date_bio_report_pathology == ""  && $pathology_pathology =="" &&  $biopsy_site_pathology == "" &&  $type_pathology =="" ){ 
					$status_pathology ="no";
				} 
			
				///****************
				If ($bg=="#ffb54c")
				{
					$bg="#ffb54c";		
				}
				Else
				{
					$bg="#ffb54c";
				}
				
		//show data

        $dmy = "$date_of_birth"; //dmy-ymd    แปลงปีวันเกิด
        list($day, $month, $year) = explode("-", $dmy);
        $ymd_birth = "$year-$month-$day";
	$dro = "$dateofrecord"; //dmy-ymd    แปลงวัน record
	list($cday, $cmonth, $cyear) = explode("-", $dro);
	$dro_date = "$cyear-$cmonth-$cday";
	list($cyear, $cmonth, $cday)= explode("-",$dro_date);                //จุดต้องเปลี่ยน
				//$year = $year-543;
				//echo $ymd_birth;
			    //  	$birthday = "1982-06-10";      //รูปแบบการเก็บค่าข้อมูลวันเกิด
				//		$today = date("Y-m-d");   //จุดต้องเปลี่ยน
			list($byear, $bmonth, $bday)= explode("-",$ymd_birth);       //จุดต้องเปลี่ยน
			list($tyear, $tmonth, $tday)= explode("-",$date_today_now);                //จุดต้องเปลี่ยน

			$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
			//$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
			$mage = ($dateofrecord - $date_of_birth);
$Number ++;


 $f1 = $_GET["field_search"];
 $f2 = $_GET["finddata"];


			echo "<Tr bgcolor='#e7d7c0'>                   
			<Td Td align = center>$Number</Td> 
			<Td Td align = center>*$centre</Td> 
			<Td><center>$patient_initials</center></Td>
			<Td><center>$ymd_birth</center></Td>  
			<Td><center>$dro_date</center></Td>

			<Td><center>$date_last_contact_follow</center></Td>   
			<td><center><A href='index.php?name=member&file=pathology&id=$id'>$status_pathology </center></a>			</td>   
			<td><center> $general_show </center></Td>       
			<td><center><A href='index.php?name=member&file=edit_data_one&id=$id&field_search=$f1&finddata=$f2'>Edit</center></a></Td>      
			<td><center><A href='index.php?name=member&file=follow_up&id=$id'>Follow up</center></a>			</td>
			<td><center> $status2_follow </center></Td>       </tr>

			  "; 
			  $count++;										
			}
		

echo "</Table>";
?>


	   <table  cellspacing="2" cellpadding="0" bgcolor="#ffffff" style="width:1%;padding-left:5px;padding-right:5" ><tr bgcolor="#DCC2A7" align="center" >
      <?php 
      $inx=-1;
      for($i=1;$i<=$num5;$i++){$inx++;
       ?>
       <td  style="width:3opx;cursor:pointer;" class="chbg" onclick="window.location='admin.php?name=admin&file=data_all&pagelink=<?=$_GET["pagelink"]?>&nx5=<?=$inx?>'" ><font color="#000000">&nbsp;&nbsp;<?=$i?>&nbsp;&nbsp;</font></td>
      <?php } ?>
    </tr></table>



<?php
mysql_close();	// ปิดการเชื่อมต่อ
?>

<br /><Br />
<div align="center">
<?
  $pagelink = $_GET["pagelink"];
 	
		echo "<a href='report/excel-all.php?field_search=$field_search&finddata=$finddata&pagelink=$pagelink'><font color=\"red\"><b>	REPORT  EXCEL  DOWNLOAD </b></font></a>";
	
	?>	</div>
<Br /><Br />














