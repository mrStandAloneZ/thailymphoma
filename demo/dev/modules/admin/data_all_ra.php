<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
          <?php

$codehos=RA ;
?>

<!-- main content -->
			<div id="left">
                           
<h1>สถานะการลงทะเบียนข้อมูล  RA</h1>

<div class="post-options">

</div>
<div class="x"></div>


</div>

<!-- sidebar -->
<div id="right">


	<h2></h2>


</div>
<div id="center">
	<?php
	require_once("includes/add_data.php");

// เริ่มติดต่อฐานข้อมูลv
	mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");


// เลือกฐานข้อมูล
	mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

//กรอกข้อมูล--เพื่อค้นหา
	echo"<CENTER>";
	echo"<Form method='post' action='index.php'> <Table border=0>
	<Tr bgcolor=$bg><Td>Search  Data <Select name='field_search'size='1'> 
	<Option value='centre'>Code</option>
	<Option value='patient_initials'>Patient Initials</option>
	<Option value='sex'>gender</option> 
	<Option value='province'>Current  Address :  Province</option> 
	<Option value='hn'>HN</option>
	<Input type='text' name='search' >	 
	<Input type='submit' value='Search' ></Form></Td></Table>";
if($search=="")//ดูว่าช่องsearchมีข้อมูลไหม
{
	$sql2 = "select * from $tblname  where codehos='$codehos' order by id limit  $Gopage,$Pagesize";
	$set=0;
}
else
{
	$sql2 = " where $field_search like '%$search%'";
	$set=1;
}


// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "select * from $tblname where codehos='$codehos'  ";


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
$Pagesize=100; //กำหนดจำนวนเรกคอร์ดใน 1 หน้า
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
	$sql2 = "select * from $tblname where  $field_search like '%$search%'  and codehos='$codehos' order by id  limit  $Gopage,$Pagesize";	
	echo "<Font color=blue> แสดงผลการค้นหาข้อมูลที่มีคำว่า </Font><Font color=red>".$search." </Font></Font><br>&nbsp;";
}
else
{
	$sql2 = "select * from $tblname  where codehos='$codehos' order by id  limit  $Gopage,$Pagesize";	 

}

//พิมพ์ส่วนหัวตาราง
$bg="#fa4b4b";	//กำหนดสีเริ่มต้น
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

<br>
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
				//	$year = $year-543;
	
	
				//echo $ymd_birth;
			    //  	$birthday = "1982-06-10";      //รูปแบบการเก็บค่าข้อมูลวันเกิด
				//		$today = date("Y-m-d");   //จุดต้องเปลี่ยน
			list($byear, $bmonth, $bday)= explode("-",$ymd_birth);       //จุดต้องเปลี่ยน
			list($tyear, $tmonth, $tday)= explode("-",$date_today_now);                //จุดต้องเปลี่ยน

			$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
			//$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
			$mage = ($dateofrecord - $date_of_birth);



			echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
			echo "<Tr bgcolor=$bg>                   
			<Td Td align = center>$Number</Td> 
			<Td Td align = center>$centre</Td> 
			<Td><center>$patient_initials</center></Td>
			<Td><center>$ymd_birth</center></Td>  
			<Td><center>$dro_date</center></Td>

			<Td><center>$date_last_contact_follow</center></Td>   
			<td><center><A href='index.php?name=member&file=pathology&id=$id'>$status_pathology </center></a>			</td>   
			<td><center> $general_show </center></Td>       
			<td><center><A href='index.php?name=member&file=edit_data_one&id=$id'>Edit</center></a></Td>      
			<td><center><A href='index.php?name=member&file=follow_up&id=$id'>Follow up</center></a>			</td>
			<td><center> $status2_follow </center></Td>       

			  "; //แสดงข้อมูลแต่ละฟิลด์ 
			  $count++;										
			}
			$Recs++;		
    }//end while
}
echo "</Table>";
if($set==1)
{
	echo "<Br>ค้นพบ <Font color=red>".$numrows." Record</font><br>";
}
else
{
	echo "<Br>ข้อมูลทั้งหมด <Font color=red>".$num_rows." Record</font><br>";
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
		  <h3 align="center">0 = No Data, 1 = Incomplete  ,  2 = Complete  ,  3=  Approve </h3>
           
          	 <?
 		if($codehos == "RA"){
		echo "<a href='report/excel-cu.php'><font color=\"red\"><b>	REPORT  EXCEL  DOWNLOAD </b></font></a>";
		} 		
	?>	

            <br />
         <h3 align="center"></h3>
     
			</div>
            <h1></h1>
     
			</div>
			
          
          
        </TABLE>
