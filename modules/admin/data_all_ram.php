<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
          <?php

$codehos=RAM ;
?>

<!-- main content -->
			<div id="left">
                <h1>สถานะการลงทะเบียนข้อมูล ของ RAM</h1>
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

// เริ่มติดต่อฐานข้อมูลv
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");


// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

//กรอกข้อมูล--เพื่อค้นหา
echo"<CENTER>";
echo"<Form method='post' action='?name=admin&file=data_all_ram'> <Table border=0>
<Tr bgcolor=$bg><Td>Search  Data <Select name='field_search'size='1'> 
<Option value='centre'>Code</option>
<Option value='patient_initials'>Patient Initials</option>
<Option value='sex'>genden</option> 
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
	$sql = "select * from $tblname where codehos='$codehos' ";

	
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
	$sql2 = "select * from $tblname where  $field_search like '%$search%'  and codehos='$codehos' order by id limit  $Gopage,$Pagesize";	
	echo "<center><Font color=blue> แสดงผลการค้นหาข้อมูลที่มีคำว่า </Font><Font color=red>".$search." </Font></Font></center><br>&nbsp;";
}
else
{
					$sql2 = "select * from $tblname  where codehos='$codehos' order by id  limit  $Gopage,$Pagesize";	 
				
}


//พิมพ์ส่วนหัวตาราง
$bg="pink";	//กำหนดสีเริ่มต้น
echo "<Table border=0><Tr bgcolor=$bg>
	<Td><center>Subject</center></Td>
	<Td><center>Code</center></Td>
	<Td><center>Patient Initials</center></Td>
	<Td><center>Date of Birth</center></Td>
	<Td><center>Date of record</center></Td>
   	<Td><center>Date of last Contact</center></Td>
	<td><center>Pathology Consensus</center></td>
	<Td><center>Edit</center></Td>
	<td><center>Follow up</center></td>
	";  


//show search

$dbquery2= mysql_db_query($dbname,$sql2);
$numrows = mysql_num_rows($dbquery2);
$count=0;
if($num_rows==0)
	{
	echo "<Table border=1>";
	echo "<Tr bgcolor='ffffff'><Td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<center><b>ไม่มีข้อมูล !&nbsp;</b></center> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</Td></Tr>";
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
				$subject = $result[subject];
				$centre = $result[centre];
				$d_record = $result[d_record];
				$m_record = $result[m_record];
				$y_record = $result[y_record];
				$date_of_record = $result[date_of_record];
				$patient_initials = $result[patient_initials];
				$date_last_contact_follow=	 $result[date_last_contact_follow];
				$date_of_birth=	 $result[date_of_birth];
   				$date_bio_report=	 $result[date_bio_report];
			
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
			    <Td Td align = center>$Number</Td> 
			    <Td Td align = center>$centre</Td> 
				<Td><center>$patient_initials</center></Td>
				<Td><center>$date_of_birth</center></Td>  
			   <Td><center>$d_record/$m_record/$y_record</center></Td>
			  
			   <Td><center>$date_last_contact_follow</center></Td>   
			   <td><center><A href='index.php?name=member&file=pathology&id=$id'>Pathology </center></a>			</td>   
			  <td><center><A href='index.php?name=member&file=edit_data_one&id=$id'>Edit</center></a></Td>      
			<td><center><A href='index.php?name=member&file=follow_up&id=$id'>Follow up</center></a>			</td> 
     		
			  "; //แสดงข้อมูลแต่ละฟิลด์ 
		       $count++;										
		    }
		$Recs++;		
    }//end while
}
	echo "</Table>";
if($set==1)
{
	echo "<Br><center>ค้นพบ <Font color=red>".$numrows." เรกคอร์ด</font></center><br>";
}
else
{
	echo "<center><Br>ข้อมูลทั้งหมด <Font color=red>".$num_rows." เรกคอร์ด</font><br></center>";
}
	echo "<CENTER><Br>หน้าที่ ".$Checkpage." / " .$Maxcount."<Br>";
if($num_rows>10)
{
	If ($Checkpage>1)		//ถ้าแสดงหน้าที่มากกว่า 1 จะมี Previous
		{
		echo "[ <A Href=".$Scriptname."?name=admin&file=data_all_ram&Page=".($Checkpage-1)."&Pagesize=".$Pagesize.">กลับไปหน้าที่แล้ว</A> ]";
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
		$Ref="<A Href=".$Scriptname."?name=admin&file=data_all_ram&Page=".$N."&Pagesize=".$Pagesize.">".$Pad.$N."</A>";
		echo "  ".$Ref."  ";
	} 
	echo "]";
If ($Checkpage<$Maxcount)		//ถ้าแสดงหน้าที่น้อยกว่าหน้าสูงสุด จะมี Next
	{
	echo "[<A Href=".$Scriptname."?name=admin&file=data_all_ram&Page=".($Checkpage+1)."&Pagesize=".$Pagesize.">หน้าถัดไป</A> ]";
	}
echo"</CENTER>";
}
echo "</Table>";

mysql_close();	// ปิดการเชื่อมต่อ
?>

			
			
			<!-- sidebar -->
		  <h3 align="center">0 = No Data, 1 = Incomplete  ,  2 = Complete  ,  3=  Approve </h3>
           
          	 <?
 		if($codehos == "RAM"){
		echo "<a href='report/excel-ram.php'><font color=\"red\"><b>	REPORT  EXCEL  DOWNLOAD </b></font></a>";
		} 		
	?>	

            <br />
         <h3 align="center"></h3>
     
			</div>
            <h1></h1>
     
			</div>
			
          
          
        </TABLE>
