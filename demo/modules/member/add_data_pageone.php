 <?php
if (!isset($_SESSION['login_true'])) {
//  url=index.php คำสั่งนี้จะให้ไปหน้าที่จะต้องกรอก user,pwd ถ้าอยู่โฟล์เดอร์อื่นให้เรียกให้ถูกนะครับ
    echo "
  <div id='wrapper'>
   <div id='logo'>
     <h1><a href='index.php'>lymphoma registry</a></h1>
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
    echo "<meta http-equiv='refresh' content='5;url=index.php?name=member&amp;file=login'>";
    echo "	</p>
       </div>

       <!-- sidebar -->

       <div class='x'></div>
       <div class='break'></div>

     </div> ";
    include 'modules/index/footer.php';
} else {
    ?>
    <?php include "modules/index/header.php";?>
    <div id="center">
      <p>
       <?php date_default_timezone_set("Asia/Bangkok");?>
       <?php
///////////////////
    $date_today = date("d/m/");
    $date_today1 = date("Y")+'543';
    $date_date = date("d/m/$date_today1");
    $string = $date_today1;
    $date_small = $date_today . substr($string, 2);
    ///////////////////
    $date_todayone = date("d");
    $date_todaymonth = date("m");
    $date_today9 = date("Y")+'543';
    $string1 = $date_today9;
    $date_small9 = substr($string1, 2) . $date_todaymonth . $date_todayone;
    ////////////////////
    $date_today11 = date("d");
    $m_today12 = date("m");
    /////////////
    ?>
       <?php include "includes/add_data.php";?>

       <?php //   code ปฏิทินภาษาไทย  แปลง คศ เป็น พศ เป็นการเรียกไฟล์มาใช้งาน                        ?>
       <link type="text/css" href="javascript/flora.calendars.picker.css" rel="stylesheet"/>
       <script type="text/javascript" src="javascript/jquery.min.js"></script>
       <script type="text/javascript" src="javascript/jquery.calendars.min.js"></script>
       <script type="text/javascript" src="javascript/jquery.calendars.plus.min.js"></script>
       <script type="text/javascript" src="javascript/jquery.calendars.picker.min.js"></script>
       <script type="text/javascript" src="javascript/jquery.calendars.thai.min.js"></script>
       <script type="text/javascript" src="javascript/jquery.calendars.thai-th.js"></script>
       <script type="text/javascript" src="javascript/jquery.calendars.picker-th.js"></script>

       <script type="text/javascript">
         $(function() {
           $('#mydate').calendarsPicker({calendar: $.calendars.instance('thai','th')});
           $('#datebirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
           $('#date_of_record').calendarsPicker({calendar: $.calendars.instance('thai','th')});
           $('#date_start').calendarsPicker({calendar: $.calendars.instance('thai','th')});
           $('#date_transplantation').calendarsPicker({calendar: $.calendars.instance('thai','th')});
           $('#mybirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
           $('#date_of_diagnosis').calendarsPicker({calendar: $.calendars.instance('thai','th')});
           $('#date_bio_report').calendarsPicker({calendar: $.calendars.instance('thai','th')});
         });
       </script>
       <?php
$db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
    $result = mysql_query("select * from " . TB_MEMBER . " where user='" . $_SESSION['login_true'] . "'") or die("Err Can not to result");
    $dbarr = mysql_fetch_array($result);
    $codehos = $dbarr['codehos'];
    ?>
       <form id="checkForm" name="checkForm" method="post" action="?name=member&file=member_add_pageone"  onSubmit="return check()" enctype="multipart/form-data" >

         <div id="center">
          <h1>Insert Lymphoma Registry</h1>
          <h1></h1>
          <p>
           <meta http-equiv="Content-type" content="text/html;charset=tis-620" />
           <center><table width="100%" border="0" align="center">

             <tr>
              <th align="left" width="33%">Date of record: </th>
              <td colspan="3"><br />
               วันที่ <input  type="hidden" name="dateofrecord"  value="<?php echo $date_today1 . '-' . $date_todaymonth . '-' . $date_todayone; ?>"  size="10"  readonly="readonly"/><b><?php echo $date_todayone . '-' . $date_todaymonth . '-' . $date_today1; ?></b> (พ.ศ.)<br /><br />
             </td>
           </tr>
           <tr>
            <th align="left" width="33%"><br /><strong>Code : </strong><br /></th>
            <?php
//  เพิ่มค่าบวกหนึ่งของหมายเลข job
    $sql = "select * from " . TB_ADD_DATA . " order by id";
    $result = mysql_query($sql);
    $num_result = mysql_num_rows($result);
    $dbarr = mysql_fetch_row($result);
    $code_id = $dbarr['0'] + 1; // นำค่า id มาเพิ่มให้กับค่า   + 1
    $job_in = "$num_result"+1;
    $code_id = "$job_in"; //

    ?>
				<?php // นับจำนวนใบงานของแต่ละ รพ. (ส่วนนี้จะไม่ขึ้นต่อกัน )
    $ss = "select * from " . TB_ADD_DATA . " WHERE codehos='$codehos' ";
    $aa = mysql_query($ss);
    $bb = mysql_num_rows($aa);
    $bb = $bb + 1; // เลขที่ใบงานของ รพ นั้นๆ
    ?>
    <th align="left"  colspan="3">
     <br /><strong><input type="hidden" name="centre"  value="<?php echo $codehos . $bb; ?>"  size="5"  readonly="readonly"/>*<?php echo $codehos . $bb; ?></strong>

     <br /><br /></th>
   </tr>
   <tr>
    <th align="left" width="33%">Patient Initials :</th>
    <td colspan="3"><br /> <input type="text" name="patient_initials" size="2"  maxlength="2"  id="patient_initials"  style="text-transform: uppercase" onkeyup="onaction();" /> <b>** กรุณากรอกเป็นภาษาอังกฤษตัวพิมพ์ใหญ่(BO)</b><br /><br />     </td>
  </tr>
  <tr>
    <th colspan="4">Participant Demographic data:</th>
  </tr>
  <tr>
    <th align="left" width="33%">Gender:</th>
    <td colspan="3"> <br />
      <input type="radio"   name="sex" id="sex1"  value="Male" onclick="onaction();" >  Male  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio"   name="sex"  id="sex2" value="Female" onclick="onaction();"  >  Female &nbsp;&nbsp;&nbsp;
      <br /><br />
    </td>
  </tr>
  <tr>
    <th align="left">ID :</th>
    <td colspan="3" > <br />
      <input type="password" size="10"  name="id_card" id="id_card1" maxlength="13"   onkeyup="onaction();checkid();" >   &nbsp;&nbsp;&nbsp;
      กรุณากรอกเป็นตัวเลข(Ex: 1522222222xx)   <font color="#FF0000">**ถ้าไม่รู้ให้ใส่เครื่องหมาย '-'</font>
      <br /><br />
    </td>
  </tr>
  <tr>
    <th align="left">Confirm ID:</th>
    <td colspan="3" > <br />
     <input type="password" size="10"  name="id_card_confirm"  id="id_card_confirm1" maxlength="13"  onkeyup="onaction();checkid();"> &nbsp;&nbsp;   กรุณากรอกเป็นตัวเลข(Ex: 1522222222xx)  <font color="#FF0000">**ถ้าไม่รู้ให้ใส่เครื่องหมาย '-'</font><br /><br />
     <span id="alertid" hidden><font color="#ff0000">กรุณากรอกข้อมูลให้ตรงกัน</font></span>
   </td>
 </tr>
 <tr>
  <th align="left">HN :</th>
  <td colspan="3" > <br />
    <input type="password" size="10"  name="hn" maxlength="20" id="hn1" onkeyup="onaction();checkhn();"> &nbsp;&nbsp;(Example: 5-19-42/48 = 5194248)<br /><br /></td>
  </tr>
  <tr>
    <th align="left">Confirm HN :</th>
    <td colspan="3" > <br />
      <input type="password" size="10"  name="hn_confirm" maxlength="20" id="hn2"  onkeyup="onaction();checkhn();"> &nbsp;&nbsp;(Example: 5-19-42/48 = 5194248)<br /><br />
      <span id="alerthn" hidden><font color="#ff0000">กรุณากรอกข้อมูลให้ตรงกัน</font></span>
    </td>
  </tr>
  <tr>
    <th align="left">Date of Birth:</th>
    <td colspan="3" > <br />
      <input type="text" id="mybirth" size="8"  name="date_of_birth" maxlength="10"  onkeyup="onaction();">
      (dd-mm-พ.ศ.(2500)) <button type="button" onclick="calyear()">cal</button><br /><hr /><b><span id="yearold"></span><input type="hidden" id='input_yearold' value=""><br /><br />
      <font color="#FF0000"><b>กรุณากด cal เพื่อคำนวณอายุ</b></font>
    </tr>

    <tr>
      <th align="left">Current address  : (in the last 6 months)</th>
      <td colspan="3" > <br />
        <select name="province" id="province" style="width:150px;"  onchange="onaction();" >
         <option  value="">กรุณาเลือกจังหวัด</option>
         <option name="province" value="<?php echo $dbarr['province']; ?>"><?php echo $dbarr['province']; ?></option>
         <option value="Amnat Charoen">Amnat Charoen</option>
         <option value="Ang Thong">Ang Thong</option>
         <option value="Bangkok" >Bangkok</option>
         <option value="Buri Ram">Buri Ram</option>
         <option value="Ayutthaya">Ayutthaya</option>
         <option value="Chachoengsao">Chachoengsao</option>
         <option value="Chainat">Chainat</option>
         <option value="Chaiyaphum">Chaiyaphum</option>
         <option value="Chanthaburi">Chanthaburi</option>
         <option value="Chiang Mai">Chiang Mai</option>
         <option value="Chiang Rai">Chiang Rai</option>
         <option value="Chonburi">Chonburi</option>
         <option value="Chumphon">Chumphon</option>
         <option value="Kalasin">Kalasin</option>
         <option value="Kamphaeng Phet">Kamphaeng Phet</option>
         <option value="Kanchanaburi">Kanchanaburi</option>
         <option value="Khon Kaen">Khon Kaen</option>
         <option value="Krabi">Krabi</option>
         <option value="Lampang">Lampang</option>
         <option value="Lamphun">Lamphun</option>
         <option value="Loei">Loei</option>
         <option value="Lopburi">Lopburi</option>
         <option value="Mae Hong Son">Mae Hong Son</option>
         <option value="Maha Sarakham">Maha Sarakham</option>
         <option value="Mukdahan">Mukdahan</option>
         <option value="Nakhon Nayok">Nakhon Nayok</option>
         <option value="Nakhon Pathom">Nakhon Pathom</option>
         <option value="Nakhon Phanom">Nakhon Phanom</option>
         <option value="Nakhon Ratchasima">Nakhon Ratchasima</option>
         <option value="Nakhon Sawan">Nakhon Sawan</option>
         <option value="Nakhon Si Thammarat">Nakhon Si Thammarat</option>
         <option value="Nan">Nan</option>
         <option value="Narathiwat">Narathiwat</option>
         <option value="Nong Khai">Nong Khai</option>
         <option value="Nongbua Lamphu">Nongbua Lamphu</option>
         <option value="Nonthaburi">Nonthaburi</option>
         <option value="Pathum Than">Pathum Than</option>
         <option value="Pattani">Pattani</option>
         <option value="Phang Nga">Phang Nga</option>
         <option value="Phattalung">Phattalung</option>
         <option value="Phayao">Phayao</option>
         <option value="Phetchabun">Phetchabun</option>
         <option value="Phetchaburi">Phetchaburi</option>
         <option value="Phichit">Phichit</option>
         <option value="Phitsanulok">Phitsanulok</option>
         <option value="Phrae">Phrae</option>
         <option value="Phuket">Phuket</option>
         <option value="Prachinburi">Prachinburi</option>
         <option value="Prachuap Khiri Khan">Prachuap Khiri Khan</option>
         <option value="Ranong">Ranong</option>
         <option value="Ratchaburi">Ratchaburi</option>
         <option value="Rayong">Rayong</option>
         <option value="Roi Et">Roi Et</option>
         <option value="Sa Kaeo">Sa Kaeo</option>
         <option value="Sakon Nakhon">Sakon Nakhon</option>
         <option value="Samut Prakan">Samut Prakan</option>
         <option value="Samut Sakhon">Samut Sakhon</option>
         <option value="Samut Songkhram">Samut Songkhram</option>
         <option value="Saraburi">Saraburi</option>
         <option value="Satun">Satun</option>
         <option value="Si Sa Ket">Si Sa Ket</option>
         <option value="Sing Buri">Sing Buri</option>
         <option value="Songkhla">Songkhla</option>
         <option value="Sukhothai">Sukhothai</option>
         <option value="Suphanburi">Suphanburi</option>
         <option value="Surat Thani">Surat Thani</option>
         <option value="Surin">Surin</option>
         <option value="Tak">Tak</option>
         <option value="Trang">Trang</option>
         <option value="Trat">Trat</option>
         <option value="Ubon Ratchathani">Ubon Ratchathani</option>
         <option value="Udon Thani">Udon Thani</option>
         <option value="Uthai Thani">Uthai Thani</option>
         <option value="Uttaradit">Uttaradit</option>
         <option value="Yala">Yala</option>
         <option value="Yasothon">Yasothon</option>
         <option value="Bueng Kan">Bueng Kan</option>

       </select><br />
     </td>
   </tr>
   <tr>
    <th align="left">Mode of payment :</th>
    <td colspan="3" ><br />
     <input type="radio"  name="payment" id="payment1"   value="Government" onclick="onaction();">  1. Government  <br /><br />
     <input type="radio"  name="payment"  id="payment2"  value="Social security" onclick="onaction();">  2. Social security<br /><br />
     <input type="radio"  name="payment"   id="payment3" value="Private insurance"onclick="onaction();" > 3. Private insurance<br /><br />
     <input type="radio"  name="payment"  id="payment4"  value="UC (30 baht)" onclick="onaction();">  4.  UC (30 baht)<br /><br />
     <input type="radio"  name="payment" id="payment5"  value="Out of pocket" onclick="onaction();">  5. Out of pocket<br /><br />
     <input type="radio"  name="payment" id="payment6"   value="Other: specify"  onclick="onaction();" >  6. Other <br /><br />


     <strong>   specify  :</strong>  &nbsp;&nbsp;  <input type="text" name="payment_other" size="50" id="payment_other" onkeyup="onaction();"  />


   </td>
 </tr>

 <tr>
  <th align="center" colspan="4">Lymphoma Database</th>
</tr>
<tr>
  <th align="left">Date of biopsy report :</th>
  <td colspan="3" > <br />
   <input type="text" name="date_bio_report" id="date_bio_report"  size="10" onkeyup="onaction();"/> &nbsp;&nbsp;(dd-mm-พ.ศ.(2500))<br /><br /></td>
 </tr>
 <tr>
  <th align="left">Pathology No.:</th>
  <td colspan="3" > <br />
    <input type="password" size="10"  name="pathology" id="pathology"  onkeyup="onaction();checkpathology();">  (Example: SP47-0007/47 = SP47000747)<br /><br /></td>
  </tr>
  <tr>
    <th align="left">Confirm Pathology No.:</th>
    <td colspan="3" > <br />
     <input type="password" size="10"  name="pathology_confirm"  id="pathology_confirm" onkeyup="onaction();checkpathology();">  (Example: SP47-0007/47 = SP47000747)<br /><br />
     <span id="alertpat" hidden><font color="#ff0000">กรุณากรอกข้อมูลให้ตรงกัน</font></span>
   </td>
 </tr>
 <tr>
  <th align="left">Biopsy site  :</th>
  <td colspan="3" > <br />

   <select name="biopsy_site" id="biopsy_site" style="width:150px;" onchange="onaction();">
     <option  value="">Please select..</option>
     <option value="Lymph node">Lymph node</option>
     <option value="Waldeyer's ring">Waldeyer's ring</option>
     <option value="Sinonasal">Sinonasal</option>
     <option value="Salivary gland">Salivary gland</option>
     <option value="Thyroid">Thyroid</option>
     <option value="Eye/Ocular adnexa">Eye/Ocular adnexa</option>
     <option value="Lung/Pleura">Lung/Pleura</option>
     <option value="Breast">Breast</option>
     <option value="Stomach">Stomach</option>
     <option value="Small intestine">Small intestine</option>
     <option value="Large intestine">Large intestine</option>
     <option value="Liver">Liver</option>
     <option value="Spleen">Spleen</option>
     <option value="Testis">Testis</option>
     <option value="Brain/CNS">Brain/CNS</option>
     <option value="Bone">Bone</option>
     <option value="Skin/Subcutaneous">Skin/Subcutaneous</option>
     <option value="Bone marrow">Bone marrow</option>
     <option value="Others">Others</option>
   </select>

   <br /><br /></td>
 </tr>

 <tr>
  <th align="left">Type:</th>
  <td colspan="3" > <br />
    <input type="radio" name="type"  value="HL" id="type1" onclick="onaction();"> Hodgkin lymphoma (HL)  <br /><br />
    <div id="detail_hodgkin">
     <select name="hodgkin_don" id="hodgkin_don1" style="width:300px;" >
      <option  value="">Please select..</option>
      <option value="01: Classical HL, Nodular sclerosis">01: Classical HL, Nodular sclerosis</option>
      <option value="02: Classical HL, Mixed cellularity">02: Classical HL, Mixed cellularity </option>
      <option value="03: Classical HL, Lymphocyte-rich">03: Classical HL, Lymphocyte-rich </option>
      <option value="04: Classical HL, Lymphocyte-depleted">04: Classical HL, Lymphocyte-depleted </option>
      <option value="05: HL, Nodular lymphocyte predominant">05: HL, Nodular lymphocyte predominant</option>
      <option value="06: HL, unclassifiable">06: HL, unclassifiable</option>
    </select>
  </div>

  <input type="radio"   name="type" value="NHL"  id="type2" onclick="onaction();" >   Non-Hodgkin lymphoma (NHL) <br /><br />
  <div id="detail_non_hodgkin">
    <strong>Immunophenotype:    </strong>
    <select name="type_non" id="type_non1" style="width:150px;">
      <option  value="">Please select..</option>
      <option value="B">B</option>
      <option value="T/NK">T/NK</option>
      <option value="Unclassify">Unclassify</option>
      <option value="Not done">Not done</option>
    </select>
    <br />
    <input type="radio" name="type_sub_non"  id="type_sub_non1"  value="WHO classification"   >  WHO classification  <br />
    <select name="who_sub_pathology" id="who_sub" style="width:500px;">
     <option value="">Please select..</option>
     <option value="07 : Precursor B-lymphoblastic lymphoma"  >07 : Precursor B-lymphoblastic lymphoma</option>
     <option value="08 : Small lymphocytic lymphoma"  >08 : Small lymphocytic lymphoma</option>
     <option value="09 : Lymphoplasmacytic lymphoma"  >09 : Lymphoplasmacytic lymphoma</option>
     <option value="10 : Splenic marginal zone lymphoma"  >10 : Splenic marginal zone lymphoma</option>
     <option value="11 : Extranodal marginal zone lymphoma of MALT type"  >11 : Extranodal marginal zone lymphoma of MALT type</option>
     <option value="12 : Nodal marginal zone lymphoma"  >12 : Nodal marginal zone lymphoma</option>
     <option value="13A : In situ follicular neoplasia" >13A : In situ follicular neoplasia</option>
     <option value="13B : Duodenal-type follicular lymphoma" >13B : Duodenal-type follicular lymphoma</option>
     <option value="13 : Follicular lymphoma, grade 1"  >13 : Follicular lymphoma, grade 1</option>
     <option value="14 : Follicular lymphoma, grade 2" >14 : Follicular lymphoma, grade 2</option>
     <option value="15 : Follicular lymphoma, grade 3" >15 : Follicular lymphoma, grade 3</option>
     <option value="16A : In situ mantle cell neoplasia" >16A : In situ mantle cell neoplasia</option>
     <option value="16 : Mantle cell lymphoma"  >16 : Mantle cell lymphoma</option>
     <option value="17 : Diffuse large B-cell lymphoma (DLBCL), NOS" >17 : Diffuse large B-cell lymphoma (DLBCL), NOS</option>
     <option value="17A : Germinal center B-cell (GCB) DLBCL" >17A : Germinal center B-cell (GCB) DLBCL</option>
     <option value="17B : Activated B-cell (ABC) DLBCL" >17B : Activated B-cell (ABC) DLBCL</option>
     <option value="18 : Mediastinal (thymic) large B-cell lymphoma" >18 : Mediastinal (thymic) large B-cell lymphoma</option>
     <option value="19 : Intravascular large B-cell lymphoma"  >19 : Intravascular large B-cell lymphoma</option>
     <option value="20 : Primary effusion lymphoma" >20 : Primary effusion lymphoma</option>
     <option value="21 : Burkitt lymphoma" >21 : Burkitt lymphoma</option>
     <option value="22 : Lymphomatoid granulomatosis"  >22 : Lymphomatoid granulomatosis</option>
     <option value="23 : Post-transplant lymphoproliferative disorders(PTLD)"  >23 : Post-transplant lymphoproliferative disorders(PTLD)</option>
     <option value="24 : Precursor T-lymphoblastic lymphoma"  >24 : Precursor T-lymphoblastic lymphoma</option>
     <option value="25 : Extranodal NK/T-cell lymphoma, nasal type" >25 : Extranodal NK/T-cell lymphoma, nasal type</option>
     <option value="26 : Enteropathy-type T-cell lymphoma" >26 : Enteropathy-type T-cell lymphoma</option>
     <option value="26A : Enteropathy-associated T-cell lymphoma(TypeI EALT)" >26A : Enteropathy-associated T-cell lymphoma(TypeI EALT)</option>
     <option value="26B : Monomorphic epitheliotroptic intestinal T-cell lymphoma(TypeII EATL)" >26B : Monomorphic epitheliotroptic intestinal T-cell lymphoma(TypeII EATL)</option>
     <option value="27 : Hepatosplenic T-cell lymphoma">27 : Hepatosplenic T-cell lymphoma</option>
     <option value="28 : Subcutaneous panniculitis-like T-cell lymphoma" >28 : Subcutaneous panniculitis-like T-cell lymphoma</option>
     <option value="29 : Aggressive NK-cell leukemia/lymphoma"  >29 : Aggressive NK-cell leukemia/lymphoma</option>
     <option value="30 : Mycosis fungoides/Sezary syndrome"  >30 : Mycosis fungoides/Sezary syndrome</option>
     <option value="31 : Angioimmunblastic T-cell lymphoma" >31 : Angioimmunblastic T-cell lymphoma</option>
     <option value="32 : Primary cutaneous anaplastic large cell lymphoma"  >32 : Primary cutaneous anaplastic large cell lymphoma</option>
     <option value="33 : Anaplastic large cell lymphoma, ALK positive"  >33 : Anaplastic large cell lymphoma, ALK positive</option>
     <option value="34 : Peripheal T-cell lymphoma, unspecified, NOS"  >34 : Peripheal T-cell lymphoma, unspecified, NOS</option>
     <option value="--**New entity**--" >--**New entity**--</option>
     <option value="35 : T-cell/histiocyte-rich large B-cell lymphoma" >35 : T-cell/histiocyte-rich large B-cell lymphoma</option>
     <option value="36 : Primary cutaneous follicle enter lymphoma" >36 : Primary cutaneous follicle enter lymphoma</option>
     <option value="37 : Primary DLBCL of the CNS" >37 : Primary DLBCL of the CNS</option>
     <option value="38 : Primry cutaneous DLBCL, leg type "  >38 : Primry cutaneous DLBCL, leg type </option>
     <option value="39 : EBV+DLBCL NOS " >39 : EBV+DLBCL NOS </option>
     <option value="40 : ALK positive large B-cell lymphoma"  >40 : ALK positive large B-cell lymphoma</option>
     <option value="41 : Plasmablastic lymphoma" >41 : Plasmablastic lymphoma</option>
     <option value="42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease(HHV8+ DLBCL, NOS)" >42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease(HHV8+ DLBCL, NOS)</option>
     <option value="43 : With features intermediate between DLBCL and Burkitt lymphoma">43 : With features intermediate between DLBCL and Burkitt lymphoma</option>
     <option value="43A : High-grade B-call lymphoma, with feature intermediate between DLBCL and classical Hodgkin lymphoma">43A : High-grade B-call lymphoma, with feature intermediate between DLBCL and classical Hodgkin lymphoma</option>
     <option value="44 : B-cell lymphoma, unclassifiable, with features intermediate between DLBCL and classical Hodgkin lymphoma">44 : B-cell lymphoma, unclassifiable, with features intermediate between DLBCL and classical Hodgkin lymphoma</option>
     <option value="45 : Chronic lymphoproliferative disorder of NK-cells">45 : Chronic lymphoproliferative disorder of NK-cells</option>
     <option value="46 : Lymphomatoid papulosis">46 : Lymphomatoid papulosis</option>
     <option value="47 : Primary cutaneous gamma-delta T-cell lymphoma">47 : Primary cutaneous gamma-delta T-cell lymphoma</option>
     <option value="48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma" >48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma</option>
     <option value="49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma">49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma</option>
     <option value="50 : Anaplastic large cell lymphoma, ALK negative">50 : Anaplastic large cell lymphoma, ALK negative</option>
     <option value="51 : Breast implant-associated anaplastic large-cell lymphoma">51 : Breast implant-associated anaplastic large-cell lymphoma</option>
     <option value="52 : DLBCL associated with chronic inflammation">52 : DLBCL associated with chronic inflammation</option>
   </select>
   <br />
   <input type="radio" name="type_sub_non"  id="type_sub_non2"  value="Working formulation"  >  Working formulation  <br />

   <select name="work_sub" id="work_sub" style="width:400px;">
    <option  value="">Please select..</option>
    <option value="07 : NHL, small lymphocytic without plasmacytoid differentiation">07 : NHL, small lymphocytic without plasmacytoid differentiation</option>
    <option value="08 : NHL, small lymphocytic with plasmacytoid differentiation">08 : NHL, small lymphocytic with plasmacytoid differentiation</option>
    <option value="09 : NHL, follicular, small cleaved">09 : NHL, follicular, small cleaved</option>
    <option value="10 : NHL, follicular, mixed small cleaved and large cell">10 : NHL, follicular, mixed small cleaved and large cell</option>
    <option value="11 : NHL, follicular, large cell">11 : NHL, follicular, large cell</option>
    <option value="12 : NHL, diffuse, small cleaved">12 : NHL, diffuse, small cleaved</option>
    <option value="13 : NHL, diffuse, mixed small and large cell">13 : NHL, diffuse, mixed small and large cell</option>
    <option value="14 : NHL, diffuse, large cell">14 : NHL, diffuse, large cell</option>
    <option value="15 : NHL, large cell immunoblastic">15 : NHL, large cell immunoblastic</option>
    <option value="16 : NHL, lymphoblastic type">16 : NHL, lymphoblastic type</option>
    <option value="17 : NHL, small non-cleaved Burkitt type">17 : NHL, small non-cleaved Burkitt type</option>
    <option value="18 : NHL, small non-cleaved non-Burkitt type">18 : NHL, small non-cleaved non-Burkitt type</option>
    <option value="19 : Composite lymphoma">19 : Composite lymphoma</option>
    <option value="20 : Histiocytic lymphoma">20 : Histiocytic lymphoma</option>
    <option value="21 : Mycosis fungoides/Sezary syndrome">21 : Mycosis fungoides/Sezary syndrome</option>
    <option value="22 : NHL, unclassifiable">22 : NHL, unclassifiable</option>
  </select>
  <br />
  <input type="radio" name="type_sub_non"  id="type_sub_non3"  value="99 Other type"  >  99 Other type  <br />
  <textarea name="other_type" cols="50" rows="4" class="smallTextBlack" id="other_type" placeholder="Please specify..."></textarea>

</div>

<script type="text/javascript">
  $(document).ready(function() {
   $('#detail_non_hodgkin').hide();
   $('#detail_hodgkin').hide();
   $('#who_sub').hide();
   $('#work_sub').hide();
   $('#other_type').hide();
 });

  $('#type1').click(function(){
   clear_data();
   $('#detail_non_hodgkin').hide();
   $('#detail_hodgkin').show();
   $('#who_sub').hide();
   $('#work_sub').hide();
   $('#other_type').hide();

 });

  $('#type2').click(function(){
   clear_data();
   $('#detail_hodgkin').hide();
   $('#detail_non_hodgkin').show();
   $('#type_sub_non1').show();
   $('#type_sub_non2').show();
   $('#type_sub_non3').show();

 });

  $('#type_sub_non1').click(function(){
   clear_sub_data();
   $('#who_sub').show();
   $('#work_sub').hide();
   $('#other_type').hide();
 });

  $('#type_sub_non2').click(function(){
   clear_sub_data();
   $('#who_sub').hide();
   $('#work_sub').show();
   $('#other_type').hide();
 });

  $('#type_sub_non3').click(function(){
   clear_sub_data();
   $('#who_sub').hide();
   $('#work_sub').hide();
   $('#other_type').show();
 });

  function clear_data(){
   $('#hodgkin_don1').val('');
   $('#type_sub_non1').prop('checked',false);
   $('#type_sub_non2').prop('checked',false);
   $('#type_sub_non3').prop('checked',false);
   $('#type_non1').val('');
   clear_sub_data();

 }
 function clear_sub_data(){
   $('#who_sub').val('');
   $('#work_sub').val('');
   $('#other_type').val('');
 }
</script>
</td>
</tr>
<tr>
  <th align="left">Ann Arbor stage :</th>
  <td colspan="3" > <br />
    <table width="100%" border="0" align="center">
      <tr>
        <td>   <input type="radio" name="ann_arbor" id="ann_arbor1"   value="I" onclick="onaction();checkage();" />   I           </td>
        <td>    <input type="radio" name="ann_arbor"  id="ann_arbor2"  value="II"  onclick="onaction();checkage();"/>   II   </td>
      </tr>
      <tr>
        <td><input type="radio" name="ann_arbor" id="ann_arbor3"   value="III" onclick="onaction();checkage();" />   III </td>
        <td><input type="radio" name="ann_arbor" id="ann_arbor4"  value="IV" onclick="onaction();checkage();" />   IV</td>
      </tr>
      <tr>
        <th><b>Symptom</b></th>
        <td><br /><input type="radio" name="symptom_ann"  value="A" id="symptom_ann1" onclick="onaction();checkage();" >  A  <br /><br />
          <input type="radio" name="symptom_ann"  value="B" id="symptom_ann2" onclick="onaction();checkage();" > B <br /><br />
        </td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <th align="left">Extranodal sites :  (mark all that apply):</th>
  <td colspan="3" > <br />
    <br />
    <input type="checkbox" name="ext_none"   value="ext_done"  id="ext_none" >  none
    <div id="ext_none1"></div>
    <div id="extra_site">
      <br />
      <input type="checkbox" name="ext_wal"   value="Waldeyer's ring" id="ext_wal"  onclick="checkage();" >  Waldeyer's ring &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_sin"   value="Sinonasal"  id="ext_sin"onclick="checkage();" >   Sinonasal  &nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_sal"   value="Salivary gland"  id="ext_sal"onclick="checkage();" >  Salivary gland  &nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_thy"   value="Thyroid"   id="ext_thy"  onclick="checkage();" > Thyroid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_eye"   value="Eye/Ocular adnexa"   id="ext_eye"onclick="checkage();" > Eye/Ocular adnexa<br /><br />
      <br />
      <input type="checkbox" name="ext_lung"   value="Lung/Pleura"   id="ext_lung"onclick="checkage();" >  Lung/Pleura &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php //******   ยฟร”ร…ยดรฌยทร•รจร ยพร”รจรยขร–รฉยนรร’รฃรรรจ  ?>
      <input type="checkbox" name="ext_breast"   value="Breast" id="ext_breast" onclick="checkage();" >  Breast   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_stomach"   value="Stomach"  id="ext_stomach"onclick="checkage();" > Stomach  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_small"   value="Small intestine" id="ext_small" onclick="checkage();" > Small intestine  &nbsp;
      <input type="checkbox" name="ext_testis"   value="Testis" id="ext_testis"  onclick="checkage();" > Testis<br /><br />
      <br />
      <input type="checkbox" name="ext_brain"   value="Brain/CNS"  id="ext_brain" onclick="checkage();" > Brain/CNS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_liver"   value="Liver"  id="ext_liver" onclick="checkage();" > Liver  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_large"   value="Large intestine"   id="ext_large"onclick="checkage();" > Large intestine  &nbsp;&nbsp;
      <input type="checkbox" name="ext_bone"   value="Bone marrow" id="ext_bone"  onclick="checkage();" > Bone marrow  &nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="ext_spleen"   value="Spleen"   id="ext_spleen"onclick="checkage();" > Spleen  <br /><Br /><Br />
      <input type="checkbox" name="ext_skin"   value="Skin/Subcutaneous"  id="ext_skin" onclick="checkage();" > Skin/Subcutaneous<br /><br /><Br />
      <input type="checkbox" name="ext_other"   value="Others" onclick=" checkage();" id="ext_other" > Others
      <input type="text" name="ext_other_text"    size="50" id="ext_other_text" >  <br />
** Please input ( , comma) in text. <br />

    </div>
    <br /><br />

  </td>
</tr>

<script type="text/javascript">
  $('#ext_none').click(function(){
    if($('#ext_none').is(':checked')){
      change_attr(true);
      clear_data_site();
      checkage();
    }else{
      change_attr(false);
    }
  });
  function change_attr(status){
    $('#ext_wal').attr("disabled", status);
    $('#ext_sin').attr("disabled", status);
    $('#ext_sal').attr("disabled", status);
    $('#ext_thy').attr("disabled", status);
    $('#ext_eye').attr("disabled", status);
    $('#ext_lung').attr("disabled", status);
    $('#ext_breast').attr("disabled", status);
    $('#ext_stomach').attr("disabled", status);
    $('#ext_small').attr("disabled", status);
    $('#ext_testis').attr("disabled", status);
    $('#ext_brain').attr("disabled", status);
    $('#ext_liver').attr("disabled", status);
    $('#ext_large').attr("disabled", status);
    $('#ext_bone').attr("disabled", status);
    $('#ext_spleen').attr("disabled", status);
    $('#ext_skin').attr("disabled", status);
    $('#ext_other').attr("disabled", status);
    $('#ext_other_text').attr("disabled", status);
  }

  function clear_data_site(){
    $('#ext_wal').prop('checked', false);
    $('#ext_sin').prop('checked', false);
    $('#ext_sal').prop('checked', false);
    $('#ext_thy').prop('checked', false);
    $('#ext_eye').prop('checked', false);
    $('#ext_lung').prop('checked', false);
    $('#ext_breast').prop('checked', false);
    $('#ext_stomach').prop('checked', false);
    $('#ext_small').prop('checked', false);
    $('#ext_testis').prop('checked', false);
    $('#ext_brain').prop('checked', false);
    $('#ext_liver').prop('checked', false);
    $('#ext_large').prop('checked', false);
    $('#ext_bone').prop('checked', false);
    $('#ext_spleen').prop('checked', false);
    $('#ext_skin').prop('checked', false);
    $('#ext_other').prop('checked', false);
    $('#ext_other_text').val('');
  }
</script>
</td>
</tr>
<tr>
  <th align="left">Performance status (ECOG):</th>
  <td colspan="3" > <br />
    <input type="radio"   name="per_ecog"  value="0" id="per_ecog0"  onclick="onaction();checkage();"> 0  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  value="1" id="per_ecog1" onclick="onaction();checkage();">  1 &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  value="2" id="per_ecog2" onclick="onaction();checkage();"> 2 &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  value="3" id="per_ecog3" onclick="onaction();checkage();" > 3 &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="per_ecog"  value="4" id="per_ecog4" onclick="onaction();checkage();"> 4  &nbsp;&nbsp;&nbsp;&nbsp;
  </td>
</tr>
<tr>
  <th align="left">LDH :</th>
  <td colspan="3" > <br />
   <input type="radio"   name="ldh" id="ldh1"  value="Normal" onclick="onaction();checkage();"  >  Normal  &nbsp;&nbsp;&nbsp;&nbsp;
   <input type="radio"   name="ldh" id="ldh2"  value="High"  onclick="onaction();checkage();">  High
   <br /><br />
   <input type="text"   name="micro"   value=""   >  (&#956;/L) <br /><br />
   <input type="text"   name="upper"   value=""   >   upper limit of normal(ULN)
 </tr>
 <tr>
   <th align="left">CBC :</th>
   <td><br /><input type="text"   name="hemoglobin"  id="hemoglobin"  value=""   >  Hemoglobin(g/dl) <br /><br />
    <input type="text"   name="mcv"  id="mcv"  value=""   >   MCV(fL)  <br /><br />
    <input type="text"   name="wbc"  id="wbc"  value=""   >   WBC(10<sup>3</sup>/&#956;L)  <br /><br />
    <input type="text"   name="platelet"  id="platelet"  value=""   >  Platelet(10<sup>3</sup>/&#956;L)  <br /><br />
    <input type="text"   name="neutrophil" id="neutrophil"   value=""   >  Neutrophil(%)  <br /><br />
    <input type="text"   name="lymphocyte" id="lymphocyte"   value=""   >  Lymphocyte(%)  <br /><br />
    <input type="text"   name="monocyte"  id="monocyte"  value=""   >  Monocyte(%)  <br /><br />
    <input type="text"   name="eosinophil"  id="eosinophil"  value=""   >  Eosinophil(%)  <br /><br />
    <input type="text"   name="basophil" id="basophil"  value=""   >  Basophil(%)  <br /><br />
    <input type="text"   name="luc" id="luc"  value=""   >  LUC  <br /><br />
    Blast/Lymphoma cell(yes/no) <input type="radio"   name="blast_lymphoma"   id="blast_lymphoma1"  value="Yes"   > Yes  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="blast_lymphoma" id="blast_lymphoma2"   value="No"   > No
    <br /><br />
  </td>
</tr>
<tr>
  <th align="center" colspan="2">
    <b>Hepatitis test</b>
  </th>
</tr>
<tr>
  <th align="left">
    <b>Hepatitis B :</b>
  </th>
  <td><br /><b>HBsAg</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_hbsag"   value="posiive"   >  positive  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_hbsag"   value="negative"   >  negative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_hbsag"   value="not done"   >  not done  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
    <b>Anti-HBcAb </b>
    <input type="radio"   name="hep_b_anti_hbcab"   value="posiive"   >  positive  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_anti_hbcab"   value="negative"   >  negative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_anti_hbcab"   value="not done"   >  not done  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
    <b>Anti-HBsAb </b>
    <input type="radio"   name="hep_b_anti_hbsab"   value="posiive"   >  positive  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_anti_hbsab"   value="negative"   >  negative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_b_anti_hbsab"   value="not done"   >  not done  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />

  </td>
</tr>
<tr>
  <th align="left">
    <b>Hepatitis C :</b>
  </th>
  <td><br /><b> Anti-HCV</b>  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_c_anti_hcv"   value="posiive"   >  positive  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_c_anti_hcv"   value="negative"   >  negative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio"   name="hep_c_anti_hcv"   value="not done"   >  not done  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
  </td>
</tr>
<tr>
  <th align="left">
    <b>Bulky :</b>
  </th>
  <td><br />
    <input type="text"   name="bulky"   value=""   >    (cm)
    <br /><br />
  </td>
</tr>

<tr>
  <th align="left">HIV positive :</th>
  <td colspan="3"><br />
   <input type="radio"   name="hiv_positive"  id="hiv_positive1" value="Yes"  onclick="onaction();">  Yes &nbsp;&nbsp;&nbsp;&nbsp;
   <input type="radio"   name="hiv_positive" id="hiv_positive2"  value="No" onclick="onaction();" >  No	 &nbsp;&nbsp;&nbsp;&nbsp;
   <input type="radio"   name="hiv_positive"  id="hiv_positive3" value="Not done" onclick="onaction();" >  Not done		                <br /><br />
 </td>
</tr>
<tr>
  <th align="left" width="33%">IPI :</th>
  <td colspan="3"><br />

    <div>
      <span>
        Age:
      </span>
      <span id="age_point">
       -
      </span>
      <span id="age_ipi">
      (กรุณากรอกข้อมูลวันเกิด และ กดปุ่มคำนวณ)
      </span>
    </div><br>
    <div>
      <span>
        Serum LDH :
      </span>
      <span id="serum_point">
       -
      </span>
      <span id="serum_ipi">
      (กรุณากรอกข้อมูล LDH)
      </span>
    </div><br>
    <div>
      <span>
        Performance status :
      </span>
      <span id="performance_point">
       -
      </span>
      <span id="performance_ipi">
      (กรุณากรอกข้อมูลECOG)
      </span>
    </div><br>
    <div>
      <span>
        Stage :
      </span>
      <span id="stage_point">
       -
      </span>
      <span id="stage_ipi">
      (กรุณากรอกข้อมูล Ann Arbor stage)
      </span>
    </div><br>
    <div id='ext_div'>
      <span>
        Extranodal involvement :
      </span>
      <span id="ext_point">
       -
      </span>
      <span id="ext_ipi">
      (กรุณากรอกข้อมูล Extranodal sites)
      </span>
    </div><br>
    <div>
      <span>
        Result :
      </span>
      <span id="detail_point">
       -
      </span>
      <span id="detail_ipi">
      Low
      </span>
    </div><br>
  <input type="hidden" name="ipi" id="ipi" value="Low"></br>
</td>
</tr>
<tr>

 <td colspan="4" align="center">
   <br /><Br />
   <button  type="submit" id="save"  value="save" disabled>Save</button>   &nbsp;&nbsp;&nbsp;&nbsp;
   <button  type="submit" id="drafts" name="drafts" value="Save drafts"  />Save drafts</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input name="Submit2" type="button" class="button" value="Cancel" onClick="window.history.back();">&nbsp;&nbsp;&nbsp;&nbsp;
   <br /><br />
   <script type="text/javascript">
     <!--
     $(document).ready(function() {
      document.getElementById('save').disabled = verify_input();
    });

     function onaction(){
      document.getElementById('save').disabled = verify_input();
    }
    function verify_input(){
     return  check_input_text()||
     ! check_radio()||
     ! check_selected();
   }
   function check_input_text(){
    return document.getElementById('patient_initials').value=="" ||
    document.getElementById('id_card1').value==""||
    document.getElementById('id_card_confirm1').value==""||
    document.getElementById('hn1').value=="" ||
    document.getElementById('hn2').value=="" ||
    document.getElementById('mybirth').value==""||
    document.getElementById('date_bio_report').value==""||
    document.getElementById('pathology').value==""||
    document.getElementById('pathology_confirm').value==""||
    document.getElementById('hemoglobin').value==""||
    document.getElementById('mcv').value==""||
    document.getElementById('wbc').value==""||
    document.getElementById('platelet').value==""||
    document.getElementById('neutrophil').value==""||
    document.getElementById('lymphocyte').value==""||
    document.getElementById('monocyte').value==""||
    document.getElementById('eosinophil').value==""||
    document.getElementById('basophil').value==""||
    document.getElementById('luc').value=="";
  }

  function check_radio(){
    return $('#sex1:checked').val() || $('#sex2:checked').val()||
    $('#payment1:checked').val()|| $('#payment2:checked').val()|| $('#payment3:checked').val()|| $('#payment4:checked').val()|| $('#payment5:checked').val()|| $('#payment6:checked').val() ||
    $('#type1:checked').val() || $('#type2:checked').val() ||
    $('#ann_arbor1:checked').val() || $('#ann_arbor2:checked').val() ||$('#ann_arbor3:checked').val() ||$('#ann_arbor4:checked').val() ||
    $('#symptom_ann1:checked').val() || $('#symptom_ann2:checked').val() ||
    $('#per_ecog0:checked').val() || $('#per_ecog1:checked').val() || $('#per_ecog2:checked').val() || $('#per_ecog3:checked').val() || $('#per_ecog4:checked').val() ||
    $('#ldh1:checked').val() || $('#ldh2:checked').val() ||
    $('#hiv_positive1:checked').val() || $('#hiv_positive2:checked').val() ||$('#hiv_positive3:checked').val()||$('#blast_lymphoma1:checked').val()||$('#blast_lymphoma2:checked').val();
  }

  function check_selected(){
    return $('#province').val() ||
    $('#biopsy_site').val() ;
  }
  
  function checkid(){
    var status = document.getElementById('id_card1').value!=document.getElementById('id_card_confirm1').value;
    document.getElementById('save').disabled = status;
    document.getElementById('drafts').disabled = status;
    if(status){
      $('#alertid').show();
    }else{
      $('#alertid').hide();
    }
  }

  function checkhn(){
    var status = document.getElementById('hn1').value!=document.getElementById('hn2').value;
    document.getElementById('save').disabled = status;
    document.getElementById('drafts').disabled = status;
    if(status){
      $('#alerthn').show();
    }else{
      $('#alerthn').hide();
    }
  }

  function checkpathology(){
    var status = document.getElementById('pathology').value!=document.getElementById('pathology_confirm').value;
    document.getElementById('save').disabled = status;
    document.getElementById('drafts').disabled = status;
    if(status){
      $('#alertpat').show();
    }else{
      $('#alertpat').hide();
    }
  }

  function calyear(){
    var birth = document.getElementById('mybirth').value;
    var date_bio_report = document.getElementById('date_bio_report').value;
	//alert(birth);
	//alert(date_bio_report);
    if(birth != "" && date_bio_report != ""){
      var res = birth.split("-");
      var date_bio = date_bio_report.split("-");
      var year = (date_bio[2]*365) + (date_bio[1]*30) + (date_bio[0]*1);
      var yearold= (year - (res[2]*365)-(res[1]*30)-res[0]);
      var old = yearold/365;
      var resultyearold ='';
      if(yearold>365){
        resultyearold = parseInt(yearold/365) + " years ";
        yearold = yearold%365;
      }
      if(yearold>30){
       // resultyearold += parseInt(yearold/30) + " months ";
        yearold = yearold%30;
      }
      //resultyearold += yearold%30 + " days ";
      document.getElementById('yearold').innerHTML = resultyearold;
      $('#input_yearold').val(old);
      checkage();
    }else{
      document.getElementById('yearold').innerHTML = "กรุณาใส่วันเดือนปีเกิดก่อนคำนวณ";
    }
  }

  function checkage(){
    var yearold = document.getElementById('input_yearold').value;
    if(yearold){
      var score = 0;
      if(yearold>60){
        document.getElementById('age_point').innerHTML = 1;
        document.getElementById('age_ipi').innerHTML = "("+ document.getElementById('yearold').innerHTML +")";
        $('#ext_div').show();
        score = calaaipi();
        levelriskaaipi(score);
      }else{
        document.getElementById('age_point').innerHTML = 0;
        document.getElementById('age_ipi').innerHTML = "("+ document.getElementById('yearold').innerHTML +")";
        $('#ext_div').hide();
        score = calipi();
        levelriskipi(score);
      }
      document.getElementById('detail_point').innerHTML = score;
    }
  }

  function calaaipi(){
    var result = 1;
    result += calipi();
    result += stageES();
    return result;
  }

  function calipi(){
    var result = 0;
    result += stageAAS();
    result += stageECOG();
    result += stageLDH();
    return result;
  }

  function stageES(){
    var count = 0;
    var result = 0;
    if($('#ext_wal:checked').val()){
      count+=1;
    }
    if($('#ext_sin:checked').val()){
      count+=1;
    }
    if($('#ext_sal:checked').val()){
      count+=1;
    }
    if($('#ext_thy:checked').val()){
      count+=1;
    }
    if($('#ext_eye:checked').val()){
      count+=1;
    }
    if($('#ext_lung:checked').val()){
      count+=1;
    }
    if($('#ext_breast:checked').val()){
      count+=1;
    }
    if($('#ext_stomach:checked').val()){
      count+=1;
    }
    if($('#ext_small:checked').val()){
      count+=1;
    }
    if($('#ext_testis:checked').val()){
      count+=1;
    }
    if($('#ext_brain:checked').val()){
      count+=1;
    }
    if($('#ext_liver:checked').val()){
      count+=1;
    }
    if($('#ext_large:checked').val()){
      count+=1;
    }
    if($('#ext_bone:checked').val()){
      count+=1;
    }
    if($('#ext_spleen:checked').val()){
      count+=1;
    }
    if($('#ext_skin:checked').val()){
      count+=1;
    }
    if($('#ext_other:checked').val()){
      count+=1;
    }
    if(count > 1){
      result = 1;
    }
    document.getElementById('ext_point').innerHTML = result;
    document.getElementById('ext_ipi').innerHTML = "(Selected "+ count +"items )";
    return result;
  }

  function stageAAS(){
    var result = 0;
	
		var type='';
	if($('#symptom_ann1:checked').val()){
		type = $('#symptom_ann1:checked').val();
	}
	if($('#symptom_ann2:checked').val()){
		type = $('#symptom_ann2:checked').val();
	}
	
	
	
	
    if($('#ann_arbor3:checked').val() || $('#ann_arbor4:checked').val() ){
      result = 1;
      document.getElementById('stage_point').innerHTML = result;
    }
    if($('#ann_arbor1:checked').val() || $('#ann_arbor2:checked').val() ){
      document.getElementById('stage_point').innerHTML = result;
    }
    if($('#ann_arbor1:checked').val()){
      document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor1:checked').val() +type+")";
    }

    if($('#ann_arbor2:checked').val()){
      document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor2:checked').val() +type+")";
    }
    if($('#ann_arbor3:checked').val()){
      document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor3:checked').val() +type+")";
    }
    if($('#ann_arbor4:checked').val()){
      document.getElementById('stage_ipi').innerHTML = "(Selected "+ $('#ann_arbor4:checked').val() +type+")";
    }
    return result;
  }

  function stageECOG(){
    var result = 0;
    if($('#per_ecog2:checked').val() || $('#per_ecog3:checked').val()|| $('#per_ecog4:checked').val() ){
      result = 1;
      document.getElementById('performance_point').innerHTML = result;
    }
    if($('#per_ecog0:checked').val() || $('#per_ecog1:checked').val()){
      document.getElementById('performance_point').innerHTML = result;
    }
    if($('#per_ecog0:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog0:checked').val() +")";
    }
    if($('#per_ecog1:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog1:checked').val() +")";
    }
    if($('#per_ecog2:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog2:checked').val() +")";
    }
    if($('#per_ecog3:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog3:checked').val() +")";
    }
    if($('#per_ecog4:checked').val()){
      document.getElementById('performance_ipi').innerHTML = "(Selected "+ $('#per_ecog4:checked').val() +")";
    }
    return result;
  }

  function stageLDH(){
    var result = 0;
    if($('#ldh2:checked').val()){
      result = 1;
      document.getElementById('serum_point').innerHTML = result;
      document.getElementById('serum_ipi').innerHTML = "(Selected "+ $('#ldh2:checked').val() +")";
    }
    if($('#ldh1:checked').val()){
      result = 0;
      document.getElementById('serum_point').innerHTML = result;
      document.getElementById('serum_ipi').innerHTML = "(Selected "+ $('#ldh1:checked').val()+")";
    }
    return result;
  }

  function levelriskaaipi(score){
    var text_ipi = "Low";
    if(score == 2){
      text_ipi = 'Low Intermediate';
    }
    if(score == 3){
      text_ipi = 'High Intermediate';
    }
    if(score > 3){
      text_ipi = 'High';
    }
    document.getElementById('detail_ipi').innerHTML = text_ipi;
    $('#ipi').val(text_ipi);
  }

  function levelriskipi(score){
    var text_ipi = "Low";
    if(score == 1){
      text_ipi = 'Low Intermediate';
    }
    if(score == 2){
      text_ipi = 'High Intermediate';
    }
    if(score == 3){
      text_ipi = 'High';
    }
    document.getElementById('detail_ipi').innerHTML = text_ipi;
    $('#ipi').val(text_ipi);
  }

</script>
</td>

</tr>
</table></center>
</p>
</div>



</FORM>
<?php
}
//จบการแสดงผลฟอร์ม Post
?>

<BR><BR>
 <!-- change -->

</div>
<!-- sidebar -->
<div class="x"></div>
<div class="break"></div>

</div>
<?php include "modules/index/footer.php";?>

<?php /*
<script language="javascript">
function check() {

if(document.checkForm.patient_initials.value=="") {
alert("กรุณากรอก Patient Initials") ;
document.checkForm.patient_initials.focus() ;
return false ;
}
else if(document.checkForm.sex1.checked == false && document.checkForm.sex2.checked == false ) {
alert("กรุณาเลือก Gender") ;
return false ;
}
else if(document.checkForm.id_card.value=="") {
alert("กรุณากรอก ID  ") ;
document.checkForm.id_card.focus() ;
return false ;
}
else if(document.checkForm.id_card_confirm.value=="") {
alert("กรุณา ยืนยัน ID ") ;
document.checkForm.id_card_confirm.focus() ;
return false ;
}
else if(document.checkForm.id_card.value != document.checkForm.id_card_confirm.value) {
alert("กรุณากรอก ID ให้ตรงกัน") ;
document.checkForm.id_card_confirm.focus() ;
return false ;
}

else if(document.checkForm.hn.value=="") {
alert("กรุณากรอก HN  ") ;
document.checkForm.hn.focus() ;
return false ;
}
else if(document.checkForm.hn_confirm.value=="") {
alert("กรุณา ยืนยัน HN ") ;
document.checkForm.hn_confirm.focus() ;
return false ;
}
else if(document.checkForm.hn.value != document.checkForm.hn_confirm.value) {
alert("กรุณากรอก HN ให้ตรงกัน") ;
document.checkForm.hn_confirm.focus() ;
return false ;
}
else if(document.checkForm.date_of_birth.value=="") {
alert("กรุณากรอก  Date of Birth ") ;
document.checkForm.date_of_birth.focus() ;
return false ;
}
else if(document.checkForm.province.value=="") {
alert("กรุณาเลือก จังหวัด") ;
document.checkForm.province.focus() ;
return false ;
}
else if(document.checkForm.payment1.checked == false && document.checkForm.payment2.checked == false && document.checkForm.payment3.checked == false && document.checkForm.payment4.checked == false && document.checkForm.payment5.checked == false && document.checkForm.payment6.checked == false ) {
alert("กรุณาเลือก Mode of payment") ;

return false ;
}else if(document.checkForm.date_bio_report.value=="") {
alert("กรุณากรอก Date of biopsy report") ;
document.checkForm.date_bio_report.focus() ;
return false ;
}else if(document.checkForm.pathology.value=="") {
alert("กรุณากรอก Pathology No.:") ;
document.checkForm.pathology.focus() ;
return false ;
}
else if(document.checkForm.pathology.value != document.checkForm.pathology_confirm.value) {
alert("กรุณากรอก Pathology  ให้ตรงกัน") ;
document.checkForm.pathology_confirm.focus() ;
return false ;
}
else if(document.checkForm.biopsy_site.value=="") {
alert("กรุณาเลือก Biopsy site ") ;
document.checkForm.biopsy_site.focus() ;
return false ;
}
else if(document.checkForm.type1.checked == false && document.checkForm.type2.checked == false ) {
alert("กรุณาเลือก Type ") ;
return false ;
}
else if(document.checkForm.ann_arbor1.checked == false && document.checkForm.ann_arbor2.checked == false && document.checkForm.ann_arbor3.checked == false && document.checkForm.ann_arbor4.checked == false && document.checkForm.ann_arbor5.checked == false && document.checkForm.ann_arbor6.checked == false && document.checkForm.ann_arbor7.checked == false && document.checkForm.ann_arbor8.checked == false) {
alert("กรุณาเลือก Ann Arbor stage ") ;
return false ;
}
else if(document.checkForm.per_ecog.value=="") {
alert("Performance status (ECOG)") ;
document.checkForm.per_ecog.focus() ;
return false ;
}
else if(document.checkForm.ldh1.checked == false && document.checkForm.ldh2.checked == false ) {
alert("LDH ") ;
return false ;
}
else if(document.checkForm.hiv_positive1.checked == false && document.checkForm.hiv_positive2.checked == false && document.checkForm.hiv_positive3.checked == false ) {
alert("HIV positive") ;
return false ;
}

else
return true ;
}
</script>
 */?>