<?php
require_once("includes/config.in.php");
// เริ่มติดต่อฐานข้อมูลv
mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
mysql_select_db(DB_NAME) or die("เลือกฐานข้อมูลไม่ได้");

CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
$page = $_REQUEST["page"];
if ($page == "") {
    $Gopage = 1;
} else {
    $Gopage = $page;
}
?>
<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
    <TR>
        <td><b><a href="admin.php?name=admin&file=main">HOME</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b><a href="admin.php?name=admin&file=member">สมาชิกทั้งหมด</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <B><a href="admin.php?name=admin&file=signup">เพิ่มสมาชิก</a></B> </td>

    <BR>
    <tr>
        <td >    
            <div align="center"> 
                <?php
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
<Input type='submit' value='ทำการค้นหา' ></Form>
<Td><form method= 'post' action= 'admin.php?name=admin&file=signup'><Input type='submit' value='&nbsp;&nbsp;เพิ่มรายชื่อ&nbsp;&nbsp;' > </form></Td></Td></Table>";
                $sql2 = " select *  "
                        . " from " . TB_MEMBER . ""
                        . " order by id limit  $Gopage,$Pagesize";
                $set = 0;
                if ($search) {
                    $sql2 . " where $field_search like '%$search%'";
                    $set = 1;
                }

// คำสั่ง SQL และสั่งให้ทำงาน
                $sql = " select *  "
                        . " from " . TB_MEMBER . "";

                $dbquery = mysql_db_query(DB_NAME, $sql);


// หาจำนวนเรกคอร์ดข้อมูลในตาราง
                $num_rows = mysql_num_rows($dbquery);


// หาจำนวนฟิลด์ในตาราง
                $num_fields = mysql_num_fields($dbquery);



                $Pagesize = $HTTP_GET_VARS["Pagesize"]; //รับค่าจำนวนเรกคอร์ดจาก Query String
                $Pagesize = 10; //กำหนดจำนวนเรกคอร์ดใน 1 หน้า
                $Maxcount = ceil($num_rows / $Pagesize); //ตัวแปรหาจำนวนหน้าทั้งหมด
                $Gopage = (($Gopage - 1) * $Pagesize) + $Recs; //ตัวแปรกำหนดหน้าที่จะไป เพื่อกำหนดเรกคอร์ดที่จะดึงข้อมูลมาแสดง
                $Recs = 0;
                $Checkpage = ($Gopage / $Pagesize) + 1;
                If ($Checkpage == $Maxcount) {//ตรวจสอบหน้าสุดท้าย
                    $Newsize = $num_rows % $Pagesize;
                    if ($Newsize == 0) {
                        $Newsize = 10;
                    }
                    $Pagesize = $Newsize;
                }
                if ($set == 1) {
                    $sql2 = "";
                    $sql2 = "select * from " . TB_MEMBER . " where $field_search like '%$search%' order by id limit  $Gopage,$Pagesize";

                    echo "<Font color=blue> แสดงผลการค้นหาข้อมูลที่มีคำว่า </Font><Font color=red>" . $search . " </Font><Font  color=blue>ในฟิลด์ <Font color=red>" . $field_search . " </Font><br>&nbsp;";
                } else {
                    $sql2 = "";
                    $sql2 = "select * from " . TB_MEMBER . "   order by id limit  $Gopage,$Pagesize";
                }

//พิมพ์ส่วนหัวตาราง
                $bg = "pink"; //กำหนดสีเริ่มต้น
                echo "<Table border=1><Tr bgcolor=$bg> 
			<Td><center>ลำดับที่</center></Td>
			<Td><center>รหัสสมาชิก</center></Td>	
			<Td><center>ชื่อ-นามสกุล </center></Td>
			<Td><center>โรงพยาบาล</center></Td>
                        <Td><center>รหัสโรงพยาบาล</center></Td>
			<Td><center>ตำแหน่ง </center></Td>        
			<Td><center>เบอร์โทร</center></Td> 
			<Td><center>มือถือ </center></Td> 
			 <Td><center>edit</center></Td>	
			 <Td><center>Delete</center></Td>";


//show search

                $dbquery2 = mysql_db_query(DB_NAME, $sql2);
                $numrows = mysql_num_rows($dbquery2);
                $count = 0;
                if ($num_rows == 0) {
                    echo "<Table border=1>";
                    echo "<Tr bgcolor='ffffff'><Td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>ไม่มีข้อมูล !&nbsp;</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</Td></Tr>";
                    echo "</Table>";
                } else {
                    While ($Recs <= $Pagesize) { // แสดงเรกคอร์ดจำนวนไม่เกินจำนวนเรกคอร์ดต่อหน้า
                        if ($count < $numrows) {
                            $Number = $Gopage + $Recs + 1; // ตัวแปรแสดงเรกคอร์ดที่เท่าไร
                            $result = mysql_fetch_array($dbquery2);
                            $id = $result[id];
                            $member_id = $result[member_id];
                            $fullname = $result[fullname];
                            $hospital_name = $result[hospital_name];
                            $hospitalCode = $result[codehos];
                            $work = $result[work];
                            $tel_office = $result[tel_office];
                            $tel = $result[tel];
                            If ($bg == "skyblue") {
                                $bg = "skyblue";
                            } Else {
                                $bg = "skyblue";
                            }
                            //show data
                            echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
                            echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td><center>$member_id</center></Td>
			   <Td><center>$fullname</center></Td> 
			   <Td><center>$hospital_name<center></Td>  
                               <Td><center>$hospitalCode<center></Td>  
			   <Td><center>$work<center></Td>
			   <Td><center>$tel_office</center></Td>          
			   <Td><center>$tel<center></Td>
			   <Td><center><A Href='admin.php?name=admin&file=member_edit&id=$id'>แก้ไข</center></A></Td>      
			    <Td><center><A Href='?name=admin&file=member_delete&id=$id'>ลบ</a></center></Td>        
			  "; //แสดงข้อมูลแต่ละฟิลด์ 

                            $count++;
                        }
                        $Recs++;
                    }//end while
                }
                echo "</Table>";
                if ($set == 1) {
                    echo "<Br>ค้นพบ <Font color=red>" . $numrows . " เรกคอร์ด</font><br>";
                } else {
                    echo "<Br>ข้อมูลทั้งหมด <Font color=red>" . $num_rows . " เรกคอร์ด</font><br>";
                }
                echo "<CENTER><Br>หน้าที่ " . $Checkpage . " / " . $Maxcount . "<Br>";
                if ($num_rows > 10) {

                    If ($Checkpage > 1) {  //ถ้าแสดงหน้าที่มากกว่า 1 จะมี Previous
                        echo "[ <A Href=" . $Scriptname . "?name=admin&file=member&Page=" . ($Checkpage - 1) . "&Pagesize=" . $Pagesize . ">กลับไปหน้าที่แล้ว</A> ]";
                    }
                    echo "[";
                    $Pad = "";
                    //รับค่าชื่อสคริปต์เพื่อนำมาใช้เป็นส่วนหนึ่งของการอ้างอิง
                    $Scriptname = ${"Script_Name"};
                    for ($N = 1; $N <= $Maxcount; $N = $N + 1) {
                        if ($N >= 10) {
                            $Pad = "";
                        }
                        //กำหนดหมายเลขหน้าเพื่ออ้างอิงต่อไป
                        $Ref = "<A Href=" . $Scriptname . "?name=admin&file=member&page=" . $N . "&Pagesize=" . $Pagesize . ">" . $Pad . $N . "</A>";
                        echo "  " . $Ref . "  ";
                    }
                    echo "]";
                    If ($Checkpage < $Maxcount) {  //ถ้าแสดงหน้าที่น้อยกว่าหน้าสูงสุด จะมี Next
                        echo "[<A Href=" . $Scriptname . "?name=admin&file=member&page=" . ($Checkpage + 1) . "&Pagesize=" . $Pagesize . ">หน้าถัดไป</A> ]";
                    }
                    echo"</CENTER>";
                }
                echo "</Table>";

                mysql_close(); // ปิดการเชื่อมต่อ
                ?>
                <p><br>

                </p>

            </div></td>
    </tr>
</TD>
</TR>
</TABLE>
