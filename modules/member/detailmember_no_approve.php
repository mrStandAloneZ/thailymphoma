<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
</HEAD>

<BODY>
<CENTER><B></B>
<? include "modules/index/header.php" ; ?>
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$bb=$dbarr['member_id']; 
$cc=$dbarr['adviser_id'];
$dd=$dbarr['typemember'];
$ty=$dbarr['typepa'];
?>
<br><br>
<?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost";	//ชื่อโฮสต์
$user = "root";	//ชื่อผู้ใช้
$password = "password";	 //รหัสผ่าน
$dbname = "tumect";	//ชื่อฐานข้อมูล
$tblname = "web_addnew";	//ชื่อตาราง


// เริ่มติดต่อฐานข้อมูล
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");


// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

?>

<? if($dd =='200'  || $dd =='300' || $dd == '400') {?>
<?
//กรอกข้อมูล--เพื่อค้นหา
echo"<CENTER><Br>";
echo"<Form method='post' action='index.php?name=member&file=detailmember_no_approve'>                              
<Table border=0><Tr bgcolor=$bg><Td>ค้นหาข้อมูล		
<Select name='field_search'size='1'>                                              
<Option value='title'>หัวข้อเรื่อง</option>		</Select>	              			
<Select name='search'size='1'>                                              
<Option value='ขอโอนผลการเรียน'>ขอโอนผลการเรียน</option>		
<Option value='ขอกลับเข้าศึกษาต่อ'>ขอกลับเข้าศึกษาต่อ</option>	
<Option value='title'>ขอโอนผลการเรียน</option>	
<Option value='title'>ขอโอนผลการเรียน</option>	

</Select>	        
<Input type='submit' value='ทำการค้นหา' ></Form> 	</Td></Table>";
if($search=="")//ดูว่าช่องsearchมีข้อมูลไหม
{
	$sql2 = "select * from $tblname order by id limit  $Gopage,$Pagesize";
	$set=0;
}
else
{
	$sql2 = " where status='ยังไม่อนุมัติ' and $field_search like '%$search%'";
	$set=1;
}
?>
<? } else{}?>
<?

if($dd =='100' )
{
// คำสั่ง SQL และสั่งให้ทำงาน
	$sql = "select * from $tblname where member_id='$bb' and status='ยังไม่อนุมัติ'  ";
}    
		elseif ($dd =='200')
		{ 	$sql = "select * from $tblname where adviser_id='$cc' and status='ยังไม่อนุมัติ' "; }
		elseif ($dd =='300')
		{  $sql = "select * from $tblname where typepa='$ty' and status='ยังไม่อนุมัติ' ";   }
else {
		$sql = "select * from $tblname where   status='หัวหน้าภาคอนุมัติ'";

}
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
	$sql2 = "select * from $tblname where status='ยังไม่อนุมัติ' and $field_search like '%$search%' order by id limit  $Gopage,$Pagesize";	
	echo "<Font color=blue> แสดงผลการค้นหาข้อมูลที่มีคำว่า </Font><Font color=red>".$search." </Font><Font  color=blue>สถานะ <Font color=red>ยังไม่อนุมัติ</Font><br>&nbsp;";
}
else
{
	
if($dd =='100')
{
$sql2 = "select * from $tblname  where member_id='$bb'  and status='ยังไม่อนุมัติ' order by id limit  $Gopage,$Pagesize";	 
}
		elseif($dd =='200')
		{  	$sql2 = "select * from $tblname  where adviser_id='$cc' and status ='ยังไม่อนุมัติ'order by id limit  $Gopage,$Pagesize";	   }
		elseif ($dd =='300')
			{  	$sql2 = "select * from $tblname  where typepa='$ty' and status='ยังไม่อนุมัติ'  order by id limit  $Gopage,$Pagesize";	   }
else {
	$sql2 = "select * from $tblname  where    status='หัวหน้าภาคอนุมัติ' order by id limit  $Gopage,$Pagesize";	 

}
}
?>
<? //พิมพ์ส่วนหัวตาราง ?>

<?  if($dd =='100' ){?>
<?
$bg="pink";	//กำหนดสีเริ่มต้น
echo "<Table border=1><Tr bgcolor=$bg>    														<Td>ลำดับที่</Td>																			<Td><center>วันที่</center></Td>													                             <Td>เดือน</Td>                                              <Td>ปี</Td>                                               <Td><center>เรื่อง</center></Td>                                  
<Td>สถานะ</Td>                                                 <Td>รายละเอียด</Td>					<td>ยกเลิกคำร้อง</td>							                 ";  ?>
 
<?  }elseif($dd =='200') {?>
<?
$bg="pink";	//กำหนดสีเริ่มต้น
echo "<Table border=1><Tr bgcolor=$bg>    														<Td>ลำดับที่</Td>																			<Td><center>วันที่</center></Td>													                             <Td>เดือน</Td>                                              <Td>ปี</Td>                                               <Td><center>เรื่อง</center></Td>                                  
<Td>สถานะ</Td>                                                 <Td>รายละเอียด</Td>							                 ";  
?>
<?  }elseif($dd =='300') {?>
<?
$bg="pink";	//กำหนดสีเริ่มต้น
echo "<Table border=1><Tr bgcolor=$bg>    														<Td>ลำดับที่</Td>																			<Td><center>วันที่</center></Td>													                             <Td>เดือน</Td>                                              <Td>ปี</Td>                                               <Td><center>เรื่อง</center></Td>                                  
<Td>สถานะ</Td>                                                 <Td>รายละเอียด</Td>							                 ";  
?>
<?  }else { ?>
<?
$bg="pink";	//กำหนดสีเริ่มต้น
echo "<Table border=1><Tr bgcolor=$bg>    														<Td>ลำดับที่</Td>																			<Td><center>วันที่</center></Td>													                             <Td>เดือน</Td>                                              <Td><center>ปี</center></Td>                                               <Td><center>เรื่อง</center></Td>                                  
<Td><center>สถานะ</center></Td>                                                 <Td>รายละเอียด</Td>								                  ";  
}
?>
<?
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
				$date = $result[date];
				$month = $result[month];
				$year = $result[year];
				$title = $result[title];
				$status=	 $result[status];
			If ($bg=="skyblue")
				{
				$bg="skyblue";		
				}
			Else
				{
				$bg="skyblue";
				}
				?>
   <?				
   if($dd =='100'){
		//show data
	echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
	echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td>$date</Td>
			   <Td>$month</Td> 
			   <Td>$year</Td>    
			   <Td>$title</Td>
			   <Td><center>$status</center></Td>          
			   <Td><center><A Href='index.php?name=member&file=title_old&id=$id'>ดู</center></A></Td>      
			   <Td><center><A Href=\"index.php?name=member&file=member_delete&id=$id\">Delete</A></center></Td>"; //แสดงข้อมูลแต่ละฟิลด์ 
	
  ?>
<? } elseif($dd =='200'){ 
			echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
			echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td>$date</Td>
			   <Td>$month</Td> 
			   <Td>$year</Td>    
			   <Td>$title</Td>
			   <Td><center>$status</center></Td>          
			   <Td><center><A Href='index.php?name=member&file=title_old&id=$id'>ดู</center></A></Td>   "; //แสดงข้อมูลแต่ละฟิลด์ 
?>
<? } elseif($dd =='300'){ 
			echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
			echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td>$date</Td>
			   <Td>$month</Td> 
			   <Td>$year</Td>    
			   <Td>$title</Td>
			   <Td><center>$status</center></Td>          
			   <Td><center><A Href='index.php?name=member&file=title_old&id=$id'>ดู</center></A></Td>   "; //แสดงข้อมูลแต่ละฟิลด์ 
?>
        <? }  else { ?>
      <?
				//show data
	echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
	echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td>$date</Td>
			   <Td>$month</Td> 
			   <Td>$year</Td>    
			   <Td>$title</Td>
			   <Td><center>$status</center></Td>          
			   <Td><center><A Href='index.php?name=member&file=title_old&id=$id'>ดู</center></A></Td>   "; //แสดงข้อมูลแต่ละฟิลด์ 
            
		} ?>
    
		<?	   
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
<?  include "modules/index/footer.php" ; ?>