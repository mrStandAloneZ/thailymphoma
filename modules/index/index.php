<?php
if (!isset($_SESSION['login_true'])) {
//  url=index.php คำสั่งนี้จะให้ไปหน้าที่จะต้องกรอก user,pwd ถ้าอยู่โฟล์เดอร์อื่นให้เรียกให้ถูกนะครับ
    ?>
	
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
                 <meta http-equiv='refresh' content='3;url=index.php?name=member&amp;file=login'>
             </p>
         </div>

         <!-- sidebar -->

         <div class='x'></div>
         <div class='break'></div>

     </div>
     <?php
include 'modules/index/footer.php';
} else {
    include "modules/index/header.php";
    $code_admin = "admin";
    $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
	$idmember =  $_SESSION['s_codehos'] ;
	
    $result = mysql_query("select * from " . TB_MEMBER . " where user='" . $_SESSION['login_true'] . "'") or die("Err Can not to result");
    $dbarr = mysql_fetch_array($result);
	
	

	
	
    $member_id = $dbarr['member_id'];
    $work = $dbarr['work'];
    $hospital_name = $dbarr['hospital_name'];
    $fullname = $dbarr['fullname'];
    $codehos = $dbarr['codehos'];
    ?>

    <!-- main content -->
    <div id="left">
      <h1>ยินดีต้อนรับ</h1><h2><?php echo $fullname; ?></h2>ชื่อโรงพยาบาลที่สังกัด <?php echo $hospital_name; ?>&nbsp;&nbsp;ตำแหน่ง <?php echo $work; ?><p>

      <?php
$fileHTML = "html/systemtalk.html";
    $fileHTMLOpen = @fopen($fileHTML, "r");
    $HTMLContent = @fread($fileHTMLOpen, @filesize($fileHTML));
    @fclose($fileHTMLOpen);
    $HTMLContent = stripslashes($HTMLContent);
    echo $HTMLContent;
    ?>
  </p>


  <h1>สถานะการลงทะเบียนข้อมูล</h1>

  <div class="post-options">

  </div>
  <div class="x"></div>


</div>

<!-- sidebar -->
<div id="right">


	<h2></h2>


</div>




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
<div id="center">
	<?php
require_once "includes/add_data.php";
    $bg = "#fa4b4b"; //กำหนดสีเริ่มต้น
    // เริ่มติดต่อฐานข้อมูลv
    mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");

// เลือกฐานข้อมูล
    mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

//กรอกข้อมูล--เพื่อค้นหา
    ?>
    <center>
        <form method='get' action='index.php'>
            <table border=0 cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"> 
             <tr bgcolor=#ffffff>
                 <td>Search  Data
                     <select name='field_search' size='1'>
                        <option value='patient_initials'>Patient Initials</option>
                        <option value='sex'>gender</option>
                        <option value='province'>Current  Address :  Province</option>
                        <option value='hn'>HN</option>
                        <?php if ($member_id == $code_admin) {?>
                        <option value='centre'>Code</option>
                        <?php }?>
                        <input type='text' name='search'  >
                        <input type='submit' value='Search' style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;" ></form></td></Table>
                        <?php
$search = "";
    $field_search = "";
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    if (isset($_GET['field_search'])) {
        $field_search = $_GET['field_search'];
    }

// คำสั่ง SQL และสั่งให้ทำงาน
//echo $tblname ;
//echo $tblname;
//echo "<font color=red size=4px>ขออภัยกำลังปรับปรุงระบบ สามารถใช้งานได้ปกติ(ในหน้าอื่น ๆ) ข้อมูลหน้านี้อาจจะยังไม่แสดงรายการ ชั่วคราว </font>";




    $sql_codehos = "where codehos='$codehos'";
    $sql = "select * from $tblname  " . $sql_codehos;
    if ($member_id == $code_admin) {
        $sql = "select * from $tblname";
        $codehos = '';
    }
    $dbquery = mysql_query($sql);

// หาจำนวนเรกคอร์ดข้อมูลในตาราง
    $num_rows = mysql_num_rows($dbquery);

// หาจำนวนฟิลด์ในตาราง
    $num_fields = mysql_num_fields($dbquery);

    $go_page = 1;
    if (isset($_GET['Page'])) {
        $go_page = $_GET['Page'];
    }
    $recs = 0;
    $page_size = 100; //กำหนดจำนวนเรกคอร์ดใน 1 หน้า
    $max_count = ceil($num_rows / $page_size); //ตัวแปรหาจำนวนหน้าทั้งหมด
    $go_page = (($go_page - 1) * $page_size) + $recs; //ตัวแปรกำหนดหน้าที่จะไป เพื่อกำหนดเรกคอร์ดที่จะดึงข้อมูลมาแสดง
    $Checkpage = ($go_page / $page_size) + 1;
    if ($Checkpage == $max_count) //ตรวจสอบหน้าสุดท้าย
    {
        $Newsize = $num_rows % $page_size;
        if ($Newsize == 0) {
            $Newsize = 10;
        }
        $page_size = $Newsize;
    }
    $search_data = "";
    if ($search != '') {
        if ($member_id != $code_admin) {
            $search_data = " and ";
        } else {
            $search_data = " where ";
        }
        $search_data .= " $field_search  like '%$search%'";
        echo "<Font color=blue> แสดงผลการค้นหาข้อมูลที่มีคำว่า </Font><Font color=red>" . $search . " </Font></Font><br>&nbsp;";

    }

    $sql2 = $sql . $search_data . " order by id";
//พิมพ์ส่วนหัวตาราง

    ?>
	<table border="0" bgcolor="#FFFFFF"><tr bgcolor="<?php echo $bg; ?>">
    <td align="center">Subject</td>
    <td align="center">Code</td>
    <td align="center">Patient Initials</td>
    <td align="center">Date of Birth</td>
    <td align="center">Date of record</td>
    <td align="center">Date of record follow up</td>
    <td align="center">Pathology Consensus</td>
    <td align="center">Status 1<br>(First  entry)</td>
    <td align="center">Follow up</td>
    <td align="center">Follow up<br>Status 1</td>
    <td align="center">Follow up<br>Status 2</td>
    <td align="center">View</td>
    <td align="center">Edit</td>
    <td align="center">Delete</td>
    <br>
    <?php
//show search
$bgtxt = 1;


  if($_GET["nx5"]){$nx5=$_GET["nx5"]*40;}else{$nx5=0;}
  
     $sql2." LIMIT 40 OFFSET $nx5";
    $dbquery2 = mysql_query($sql2." LIMIT 40 OFFSET $nx5");
	
    $dbquery3 = mysql_query($sql2);
          

	
	//echo $sql2." LIMIT 40 OFFSET $nx5";
	
	
	
         $numrows = mysql_num_rows($dbquery3);
	     $num5 = ceil( $numrows /40);
    $count = 0;
    if ($num_rows == 0) {
        echo "<Table border=1>";
        echo "<tr bgcolor='ffffff'><td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>ไม่มีข้อมูล !&nbsp;</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td></tr>";
        echo "</Table>";
    } else {
        while ( $result = mysql_fetch_array($dbquery2)) // แสดงเรกคอร์ดจำนวนไม่เกินจำนวนเรกคอร์ดต่อหน้า
            {
			
			
     
                $Number = $go_page + $recs + 1; // ตัวแปรแสดงเรกคอร์ดที่เท่าไร
               $datexxxxx =  $result['date_of_birth'];
                ////////////   registry  lymphoma
                  $id = $result['id'];
                  $dateofrecord = $result['dateofrecord'];
                $subject = $result['subject'];
                $centre = $result['centre'];
                $d_record = $result['d_record'];
                $m_record = $result['m_record'];
                $y_record = $result['y_record'];
                $date_of_record = $result['date_of_record'];
                $patient_initials = $result['patient_initials'];
                $sex = $result['sex'];
                $id_card = $result['id_card'];
                $hn = $result['hn'];
                  $date_of_birth = $result['date_of_birth'];
                $province = $result['province'];
                $payment = $result['payment'];
                $date_bio_report = $result['date_bio_report'];
                $pathology = $result['pathology'];
                $biopsy_site = $result['biopsy_site'];
                $type = $result['type'];
                $hodgkin_don = $result['hodgkin_don'];
                $type_non = $result['type_non'];
                $type_sub_non = $result['type_sub_non'];
                $who_sub = $result['who_sub'];
                $work_sub = $result['work_sub'];
                $other_type = $result['other_type'];
                $ann_arbor = $result['ann_arbor'];
                $symptom_ann = $result['symptom_ann'];
                $ext_none = $result['ext_none'];
                $ext_wal = $result['ext_wal'];
                $ext_sin = $result['ext_sin'];
                $ext_sal = $result['ext_sal'];
                $ext_thy = $result['ext_thy'];
                $ext_eye = $result['ext_eye'];
                $ext_lung = $result['ext_lung'];
                $ext_breast = $result['ext_breast'];
                $ext_stomach = $result['ext_stomach'];
                $ext_small = $result['ext_small'];
                $ext_testis = $result['ext_testis'];
                $ext_brain = $result['ext_brain'];
                $ext_liver = $result['ext_liver'];
                $ext_large = $result['ext_large'];
                $ext_bone = $result['ext_bone'];
                $ext_spleen = $result['ext_spleen'];
                $ext_skin = $result['ext_skin'];
                $ext_other = $result['ext_other'];
                $ext_other_text = $result['ext_other_text'];
                $per_ecog = $result['per_ecog'];
                $ldh = $result['ldh'];
                $hiv_positive = $result['hiv_positive'];
                  $received_follow = $result["received_follow"];
                  

                    // Calculate Age

            // date("Y");
            $year_month_date = preg_split('/-/', $result['date_of_birth']);
            $age = (date("Y") + 543) - $year_month_date[0];

            $date_bio_report_year_month_date = preg_split('/-/', $result['date_bio_report']);

            $description_age = $date_bio_report_year_month_date[2] - $year_month_date[0];

            if($age < 60){
                $ipi_age = 0;
            }else{
                $ipi_age = 1;
            }



            // Extranodal sites : (mark all that apply):
$Extranodal_sites = '';
$count = null;
if($result['ext_none'] == 'ext_done'){
   $Extranodal_sites = 'None,';
   $count = 0;
}
if ($result['ext_wal']){
   $Extranodal_sites .= $result['ext_wal'] . " , ";
   $count++;
}
if ($result['ext_sin']){
   $Extranodal_sites .= $result['ext_sin'] . " , ";
   $count++;
}
if ($result['ext_sal']){
   $Extranodal_sites .= $result['ext_sal'] . " , ";
   $count++;
}
if ($result['ext_thy']){
   $Extranodal_sites .= $result['ext_thy'] . " , ";
   $count++;
}
if ($result['ext_eye']){
   $Extranodal_sites .= $result['ext_eye'] . " , ";
   $count++;
}
if ($result['ext_lung']){
   $Extranodal_sites .= $result['ext_lung'] . " , ";
   $count++;
}
if ($result['ext_breast']){
   $Extranodal_sites .= $result['ext_breast'] . " , ";
   $count++;
}
if ($result['ext_stomach']){
   $Extranodal_sites .= $result['ext_stomach'] . " , ";
   $count++;
}
if ($result['ext_small']){
   $Extranodal_sites .= $result['ext_small'] . " , ";
   $count++;
}
if ($result['ext_testis']){
   $Extranodal_sites .= $result['ext_testis'] . " , ";
   $count++;
}
if ($result['ext_brain']){
   $Extranodal_sites .= $result['ext_brain'] . " , ";
   $count++;
}
if ($result['ext_liver']){
   $Extranodal_sites .= $result['ext_liver'] . " , ";
   $count++;
}
if ($result['ext_large']){
   $Extranodal_sites .= $result['ext_large'] . " , ";
   $count++;
}
if ($result['ext_bone']){
   $Extranodal_sites .= $result['ext_bone'] . " , ";
   $count++;
}
if ($result['ext_spleen']){
   $Extranodal_sites .= $result['ext_spleen'] . " , ";
   $count++;
}
if ($result['ext_skin']){
   $Extranodal_sites .= $result['ext_skin'] . " , ";
   $count++;
}
if ($result['ext_other']){
   $Extranodal_sites .= $result['ext_other_text'] . " , ";
   $Extranodal_sites = preg_replace('/,\s+$/', '', $Extranodal_sites);
   $count_other = preg_split('/,/', $result['ext_other_text']);
   $count = $count + COUNT($count_other);
}

$point_ext = 0;
    if ($count > 1) {
        $point_ext = 1;

    }

 $Extranodal_sites = preg_replace('/,\s+$/', '', $Extranodal_sites);


 // ipi result

$text_ipi = "Low";
    if ($ipi_age == 1) {
        $score = $ipi_age + $point_ldh + $point_per_ecog + $point_ann_arbor + $point_ext;
        if ($score == 2) {
            $text_ipi = 'Low Intermediate';
        }
        if ($score == 3) {
            $text_ipi = 'High Intermediate';
        }
        if ($score > 3) {
            $text_ipi = 'High';
        }
    } else {
        $score = $ipi_age + $point_ldh + $point_per_ecog + $point_ann_arbor;
        if ($score == 1) {
            $text_ipi = 'Low Intermediate';
        }
        if ($score == 2) {
            $text_ipi = 'High Intermediate';
        }
        if ($score == 3) {
            $text_ipi = 'High';
        }
    }


				
                /////// Patient Initials
                if ($result['dateofrecord'] != '' && $result['centre'] != '' && $result['codehos'] != ''  && $result['patient_initials'] != '' && $result['sex'] != '' && $result['id_card'] != '' && $result['id_card_confirm'] != '' &&
   $result['hn'] != '' && $result['hn_confirm'] != '' && $result['date_of_birth'] != '' && $result['date_bio_report'] != '' && $description_age != '' && $result['province'] != '' && $result['payment'] != '' && $result['pathology'] != '' && $result['pathology_confirm'] != '' &&
   $result['biopsy_site'] != '' && $result['type'] != '' && ($result['hodgkin_don'] != '' || ($result['type_non'] != '' && ($result['who_sub'] != '' || $result['work_sub'] != '' || $result['other_type'] != ''))) &&
   $result['ann_arbor'] != '' && $result['symptom_ann'] != '' && $Extranodal_sites != '' &&  $count >= 0 &&  $result['per_ecog'] != '' && $result['ldh'] != '' && $result['micro'] != '' && $result['upper'] != '' &&
   $result['hemoglobin'] != '' && $result['mcv'] != '' && $result['wbc'] != '' && $result['platelet'] != '' && $result['neutrophil'] != '' && $result['lymphocyte'] != '' && $result['monocyte'] != '' && $result['eosinophil'] != '' && $result['basophil'] != ''  && $result['blast_lymphoma'] != '' &&
   $result['blast_lymphoma'] != '' && $result['hep_b_hbsag'] != '' && $result['hep_b_anti_hbcab'] != '' && $result['hep_b_anti_hbsab'] != '' && $result['hep_c_anti_hcv'] != '' && $result['status_bulky'] != ''  && $result['hiv_positive'] != '' && $score >= 0 && $text_ipi != '') {
                    $general_show = "complete";
                } else {
                    $general_show = "incomplete";
                }
                //*******status2  follow
                $result_follow = $result['result_follow'];
                $result_cause_follow = $result['result_cause_follow'];
                $progression_follow = $result['progression_follow'];
                $salvage_follow = $result['salvage_follow'];
                $surgery_follow = $result['surgery_follow'];
                $stem_cell_follow = $result['stem_cell_follow'];
                $date_last_contact_follow = $result['date_last_contact_follow'];
                $status_follow = $result['status_follow'];

                $immunotherapy_follow = $result['immunotherapy_follow'];
                $radiotherapy_follow = $result['radiotherapy_follow'];
                $radiotherapy_follow = $result['radiotherapy_follow'];
				
			$chemotherapy_follow = $result['chemotherapy_follow'];
			if(trim($chemotherapy_follow)=="No Chemotherapy"){$received_follow = "none";}
			
                // $status_follow2 = $result['status_follow2'];
  // echo $result_follow ."n1".$progression_follow ."n2".$salvage_follow ."n3".$stem_cell_follow ."n4".$date_last_contact_follow ."n5".$status_follow ."n6".$received_follow ."n7";
                ///////
                
                if ($chemotherapy_follow != '' && $immunotherapy_follow != '' && $radiotherapy_follow != '' && $surgery_follow != '' && $result_follow != '' ) {
                    if($chemotherapy_follow == 'Chemotherapy'){
                        $status2_follow = "complete";
                    }
                } else if ($patient_initials != "") {
                    $status2_follow = "incomplete";
                } else {
                    $status2_follow = "No Data";
                }
                
                // if ($result_follow != "" && $progression_follow != "" && $salvage_follow != "" && $stem_cell_follow != "" && $date_last_contact_follow != "" && $status_follow != "" && $received_follow!="") {
                //     $status2_follow = "complete";
                // } else if ($patient_initials != "") {
                //     $status2_follow = "incomplete";
                // } else {
                //     $status2_follow = "No Data";
                // }
                //********Pathology *****
                $date_bio_report_pathology = $result['date_bio_report_pathology'];
                $pathology_pathology = $result['pathology_pathology'];
                $biopsy_site_pathology = $result['biopsy_site_pathology'];
                $type_pathology = $result['type_pathology'];
                $type_hodgkin_pathology = $result['type_hodgkin_pathology'];
                $immunophenotype_pathology = $result['immunophenotype_pathology'];
                $type_sub_non_pathology = $result['type_sub_non_pathology'];
                $who_sub_pathology = $result['who_sub_pathology'];
                $other_type_pathology = $result['other_type_pathology'];

                if ($date_bio_report_pathology != "" && $pathology_pathology != "" && $biopsy_site_pathology != "" && $type_pathology != "") {
                    $status_pathology = "yes";
                } else if ($date_bio_report_pathology == "" || $pathology_pathology == "" || $biopsy_site_pathology == "" || $type_pathology == "") {
                    $status_pathology = "no";
                }

                ///****************
                if ($bg == "#ffb54c") {
                    $bg = "#ffb54c";
                } else {
                    $bg = "#ffb54c";
                }
                //show data
                $date_of_birth = new DateTime($date_of_birth);
                $date_today_now = new DateTime();
                $dateofrecord = new DateTime($dateofrecord);
				try{
				
				
                $ymd_birth = $date_of_birth->format("d-m-Y");
                $mage = ($dateofrecord->format("d-m-Y") - $date_of_birth->format("d-m-Y"));
                $obj_now = new Datetime();
                $obj_date_last_contact_follow = new Datetime($date_last_contact_follow);
                $cal = $obj_now->format('Ymd') - ($obj_date_last_contact_follow->format('Ymd') - 5430000);
                     $status_follow_2 = "Update";
                if ($cal >= 10000) {
                    $status_follow_2 = "No Update";
                }
				
				$date_b1=  $date_of_birth->format("d-m-Y"); 
				$date_b2= $dateofrecord->format("d-m-Y"); 
				
				} catch (Exception $e) {
				$d= date("d");
				$m= date("m");
				$y= (date("Y")+543);
				
				$date = new DateTime(trim($datexxxxx));
			    $date_b1 =  $date->format('d-m-Y');
			
				}
                ?>
                <tr bgcolor="<?php
				  if($bgtxt==1){
			               echo "#e7d7c0";$bgtxt=2;
				 }else{echo "#dcc3a0";$bgtxt=1;}
				  ?>">
                   <td align="center"><?php echo (($_GET["nx5"]*40) +$Number); ?></td>
                   <td align="center">*<?php echo $centre; ?></td>
                   <td align="center"><?php echo strtoupper($patient_initials); ?></td>
                   <td align="center"><?php echo $date_b1?></td>
                   <td align="center"><?php echo $date_b2?></td>
                   <td align="center"><?php echo $date_last_contact_follow; ?></td>
                   <td align="center"><a href="index.php?name=member&file=pathology&id=<?php echo $id; ?>"><?php echo $status_pathology; ?> </a>          </td>
                   <td align="center"><?php echo $general_show; ?></td>
                   <td align="center"><a href="index.php?name=member&file=follow_up&id=<?php echo $id; ?>">Follow up</a>          </td>
                   <td align="center"><?php echo $status2_follow; ?></td>
                   <td align="center"><?php echo $status_follow_2; ?> </td>
                   <td align="center"><a href="index.php?name=member&file=view_data_one&id=<?php echo $id; ?>">View</a></td>
                   <td align="center"><a href="index.php?name=member&file=edit_data_one&id=<?php echo $id; ?>">Edit</a></td>
                   <td align="center"><a onclick='confirmDelete("<?php echo $id; ?>","<?php echo $centre; ?>")'>Delete</a></td>
                   <?php
//แสดงข้อมูลแต่ละฟิลด์
                $count++;
            
            $recs++;
        } //end while
    }
    ?>
</table>



<?php
if ($search != '') {
        echo "<Br>ค้นพบ <Font color=red>" . $numrows . " Record</font><br>";
    } else {
        echo "<Br>ข้อมูลทั้งหมด <Font color=red>" . $num_rows . " Record</font><br>";
    }
	
	
	

    mysql_close(); // ปิดการเชื่อมต่อ
    ?>
	<br/>
	  <?php



	  ?>
	   <table cellspacing="2" cellpadding="0" bgcolor="#ffffff"><tr bgcolor="#DCC2A7" align="center">
      <?php 
      $inx=-1;
      for($i=1;$i<=$num5;$i++){$inx++;
       ?>
       <td width="25px" class="chbg" onclick="window.location='?nx5=<?=$inx?>'" style="cursor:pointer;"><font color="#000000"><?=$i?></font></td>
      <?php } ?>
    </tr></table>

    <br />



    <!-- sidebar -->

    <div id="left">


     <br />
     <h3 align="center"></h3>

 </div>
 <h1></h1>

</div>
<table width="100%" border="0" cellpadding="3" cellspacing="4"
class="smallTextBlack">

<form action="report/new_export.php" method="post" name="export" id="export" onSubmit="return checkDate();" >

 <tr>
  <td>
  <input type="hidden" name="namef" value="<?=$_SESSION['s_codehos']?>" />
   <strong>Filter by institute</strong>
   <input type="hidden" id="institute" name="institute"  value="<?=$idmember?>"/>&nbsp; : &nbsp;(<?=$idmember?>&nbsp;<?=$_SESSION['s_codehos_full']?>)
   <!--
   <select name="institute" class="smallTextBlack" id="jumpMenu" style="width:100px;" >
    <option value="ALL" selected>all</option>
    <option value="BMA">BMA (Vajira Hospital)</option>
    <option value="CMU">CMU (Maharaj Nakorn Chiang Mai Hospital)</option>
    <option value="CU">CU (King Chulalongkorn Memorial Hospital)</option>
    <option value="CRI">CRI (Chulabhorn Research Institute)</option>
    <option value="KH">KH (Konkaen Hospital)</option>
    <option value="KKU">KKU (Srinakarind Hospital)</option>
    <option value="NU">NU (Naresuan University Hospital)</option>
    <option value="PMK">PMK (Phramongkutklao Hospital)</option>
    <option value="PSU">PSU (Songklanakarind Hospital)</option>
    <option value="RA">RA (Ramathibodi Hospital)</option>
    <option value="RVT">RVT (Rajavithi Hospital)</option>
    <option value="SI">SI (Siriraj Hospital)</option>
    <option value="SWU">SWU (Prince Sirinthorn Hospital)</option>
    <option value="TU">TU (Thammasart Hospital)</option>
</select>
-->
</td>
</tr>                                                            <tr>
<td><strong>Filter by record date form</strong>
   <select name="minmonth" class="smallTextBlack" id="minmonth" style="width:60px;" >
    <option value="01">01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
<select name="minyear" class="smallTextBlack" id="minyear"style="width:100px;" >
 <option value='2570'>2570</option>
 <option value='2569'>2569</option>
 <option value='2568'>2568</option>
 <option value='2567'>2567</option>
 <option value='2566'>2566</option>
 <option value='2565'>2565</option>
 <option value='2564'>2564</option>
 <option value='2563'>2563</option>
 <option value='2562'>2562</option>
 <option value='2561'>2561</option>
 <option value='2560'>2560</option>
 <option value='2559'>2559</option>
 <option value='2558'>2558</option>
 <option value='2557'>2557</option>
 <option value='2556'>2556</option>
 <option value='2555'>2555</option>
 <option value='2554'>2554</option>
 <option value='2553'>2553</option>
 <option value='2552'>2552</option>
 <option value='2551'>2551</option>
 <option value='2550'>2550</option>
 <option value='2549'>2549</option>
 <option value='2548'>2548</option>
 <option value='2547'>2547</option>
 <option value='2546'>2546</option>
 <option value='2545'>2545</option>
 <option value='2544'>2544</option>
 <option value='2543'>2543</option>
 <option value='2542'>2542</option>
 <option value='2541'>2541</option>
 <option value='2540'>2540</option>
 <option value='2539'>2539</option>
 <option value='2538'>2538</option>
 <option value='2537'>2537</option>
 <option value='2536'>2536</option>
 <option value='2535'>2535</option>
 <option value='2534'>2534</option>
 <option value='2533'>2533</option>
 <option value='2532'>2532</option>
 <option value='2531'>2531</option>
 <option value='2529'>2529</option>
 <option value='2528'>2528</option>
 <option value='2527'>2527</option>
 <option value='2526'>2526</option>
 <option value='2525'>2525</option>
 <option value='2524'>2524</option>
 <option value='2523'>2523</option>
 <option value='2522'>2522</option>
 <option value='2521'>2521</option>
 <option value='2520'>2520</option>
 <option value='2519'>2519</option>
 <option value='2518'>2518</option>
 <option value='2517'>2517</option>
 <option value='2516'>2516</option>
 <option value='2515'>2515</option>
 <option value='2514'>2514</option>
 <option value='2513'>2513</option>
 <option value='2512'>2512</option>
 <option value='2511'>2511</option>
 <option value='2510'>2510</option>
</select>
<strong>to</strong>
<select name="maxmonth" class="smallTextBlack" id="maxmonth" style="width:60px;">
    <option value="01">01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
<select name="maxyear" class="smallTextBlack" id="maxyear" style="width:100px;">
   <option value='2570'>2570</option>
   <option value='2569'>2569</option>
   <option value='2568'>2568</option>
   <option value='2567'>2567</option>
   <option value='2566'>2566</option>
   <option value='2565'>2565</option>
   <option value='2564'>2564</option>
   <option value='2563'>2563</option>
   <option value='2562'>2562</option>
   <option value='2561'>2561</option>
   <option value='2560'>2560</option>
   <option value='2559'>2559</option>
   <option value='2558'>2558</option>
   <option value='2557'>2557</option>
   <option value='2556'>2556</option>
   <option value='2555'>2555</option>
   <option value='2554'>2554</option>
   <option value='2553'>2553</option>
   <option value='2552'>2552</option>
   <option value='2551'>2551</option>
   <option value='2550'>2550</option>
   <option value='2549'>2549</option>
   <option value='2548'>2548</option>
   <option value='2547'>2547</option>
   <option value='2546'>2546</option>
   <option value='2545'>2545</option>
   <option value='2544'>2544</option>
   <option value='2543'>2543</option>
   <option value='2542'>2542</option>
   <option value='2541'>2541</option>
   <option value='2540'>2540</option>
   <option value='2539'>2539</option>
   <option value='2538'>2538</option>
   <option value='2537'>2537</option>
   <option value='2536'>2536</option>
   <option value='2535'>2535</option>
   <option value='2534'>2534</option>
   <option value='2533'>2533</option>
   <option value='2532'>2532</option>
   <option value='2531'>2531</option>
   <option value='2529'>2529</option>
   <option value='2528'>2528</option>
   <option value='2527'>2527</option>
   <option value='2526'>2526</option>
   <option value='2525'>2525</option>
   <option value='2524'>2524</option>
   <option value='2523'>2523</option>
   <option value='2522'>2522</option>
   <option value='2521'>2521</option>
   <option value='2520'>2520</option>
   <option value='2519'>2519</option>
   <option value='2518'>2518</option>
   <option value='2517'>2517</option>
   <option value='2516'>2516</option>
   <option value='2515'>2515</option>
   <option value='2514'>2514</option>
   <option value='2513'>2513</option>
   <option value='2512'>2512</option>
   <option value='2511'>2511</option>
   <option value='2510'>2510</option>
</select>
<span class="smallTextBlue"></span>
</td>
</tr>
<tr>
  <td>
   <input name="Submit" type="submit" class="button" id="button" value="Export" style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;"></td>
</tr>
</form>
</table>
</td>
</tr>
</table>

<script type="text/javascript">
function confirmDelete(id,code) {
    if(confirm('Are you sure you want to delete '+code+" ?")){
        window.location.replace("?name=member&file=delete_data_one&id="+id);
        // window.location.pathname+"id";
    }
  }
	function checkDate(){
		var mindate = document.getElementById('minyear').value + document.getElementById('minmonth').value ;
		var maxdate = document.getElementById('maxyear').value + document.getElementById('maxmonth').value ;
		if(mindate>maxdate){
			alert('การเลือกวันที่ของท่านไม่ถูกต้อง กรุณาตรวจสอบ');
			return false;
		}
		return true;
	}
</script>
<div class="x"></div>
<div class="break"></div>

</div>



<?php include "footer.php";
}?>