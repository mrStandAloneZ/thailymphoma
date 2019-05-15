<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);



?>

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
    width: 250px;
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
<br /><br />
<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
          
  <tr>
                    <td >    
                        <div align="center"> 
                        <?php
  require_once("includes/member.php");

// เริ่มติดต่อฐานข้อมูลv
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

//กรอกข้อมูล--เพื่อค้นหา
echo"<CENTER><Br>";
echo"<Form method='post' action='admin.php?name=admin&file=member'>       
<Table border=0><Tr bgcolor=$bg><Td>ค้นหาข้อมูล		
			<Select name='field_search'size='1'>                                    
				<Option value='member_id'>รหัสสมาชิก</option>											
				<Option value='fl'>อักษรย่อของชื่อและนามสกุล</option>                         
				<Option value='fullname'>ชื่อ-สกุล</option>					
				<Option value='sex'>เพศ</option>							
				<Option value='date_birth'>วันเกิด</option>	
				<Option value='province'>ภูมิลำเนา</option>							
				<Option value='treatment'>สิทธิการรักษา</option>							
				<Option value='career'>อาชีพ</option>		</Select>					
<Input type='text' name='search' >						
<Input type='submit' value='ทำการค้นหา' style='background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;'></Form>
<Td><form method= 'post' action= 'admin.php?name=admin&file=signup'><Input type='submit' value='&nbsp;&nbsp;เพิ่มรายชื่อ&nbsp;&nbsp;'  style='background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;' > </form></Td></Td></Table>";
if($search=="")//ดูว่าช่องsearchมีข้อมูลไหม
{
	$sql2 = "select * from $tblname order by codehos asc";
	$set=0;
}
else
{
	$sql2 = " where $field_search like '%$search%'";
	$set=1;
}

// คำสั่ง SQL และสั่งให้ทำงาน
	$sql = "select * from $tblname";

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
	$sql2 = "select * from $tblname where $field_search like '%$search%' order by codehos asc";	
	echo "<Font color=blue> แสดงผลการค้นหาข้อมูลที่มีคำว่า </Font><Font color=red>".$search." </Font><Font  color=blue>ในฟิลด์ <Font color=red>".$field_search." </Font><br>&nbsp;";
}
else
{
		
					$sql2 = "select * from $tblname   order by codehos asc";	 

}


//พิมพ์ส่วนหัวตาราง
$bg="pink";	//กำหนดสีเริ่มต้น
echo "<Table border=1><Tr bgcolor='#d78611'> 
			<Td><center>ลำดับที่</center></Td>
			<Td><center>รหัสสมาชิก</center></Td>	
			<Td><center>ชื่อ-นามสกุล </center></Td>
			<Td><center>โรงพยาบาล</center></Td>
			<Td><center>ตำแหน่ง </center></Td>        
			<Td><center>เบอร์โทร</center></Td> 
			<Td><center>มือถือ </center></Td> 
			<Td><center>username </center></Td> 
			<Td><center>password </center></Td> 
			 <Td><center>edit</center></Td>	
			 <Td><center>Delete</center></Td>";  


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
 $ik=0;

While  ($Recs<=$num_rows)	// แสดงเรกคอร์ดจำนวนไม่เกินจำนวนเรกคอร์ดต่อหน้า
	{		
			if($count<$numrows)
		   {
				$Number = $Gopage+$Recs+1;	// ตัวแปรแสดงเรกคอร์ดที่เท่าไร
				$result = mysql_fetch_array($dbquery2);
				$id = $result[id];
				$member_id = $result[member_id];
				$fullname = $result[fullname];
				$hospital_name = $result[hospital_name];
				$work = $result[work];
				$tel_office = $result[tel_office];
				$tel=$result[tel];
				
				$user=$result[user];
				$password=$result[password];
				
				
				$tyhop = $result[codehos];
				$ik++;
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
	echo "<Tr bgcolor='#e7d7c0'>                   
			   <Td Td align = center>$ik</Td> 
			   <Td><center>$member_id</center></Td>
			   <Td><center>$fullname</center></Td> 
			   <Td align='left'>&nbsp;$tyhop&nbsp;:&nbsp;$hospital_name</Td>    
			   <Td><center>$work<center></Td>
			   <Td><center>$tel_office</center></Td>          
			   <Td><center>$tel<center></Td>
			    <Td><center>$user<center></Td>
				 <Td><center>$password<center></Td>
			   <Td><center><A Href='admin.php?name=admin&file=member_edit&id=$id'>แก้ไข</center></A></Td>      
			    <Td><center><A Href='?name=admin&file=member_delete&id=$id'>ลบ</a></center></Td>        
			  "; //แสดงข้อมูลแต่ละฟิลด์ 
			   
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
	
if($num_rows>10)
{
	If ($Checkpage>1)		//ถ้าแสดงหน้าที่มากกว่า 1 จะมี Previous
		{
		
		}
	
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

	} 

If ($Checkpage<$Maxcount)		//ถ้าแสดงหน้าที่น้อยกว่าหน้าสูงสุด จะมี Next
	{
	
	}
echo"</CENTER>";
}
echo "</Table>";

mysql_close();	// ปิดการเชื่อมต่อ
?>
                          <p><br>
                          
</p>
                  
                      </div></td>
                  </tr>
              </TD>
          </TR>
        </TABLE>
