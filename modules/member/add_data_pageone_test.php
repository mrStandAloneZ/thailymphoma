 <? 
 if(!session_is_registered("login_true")) {
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
          echo "<meta http-equiv='refresh' content='5;url=index.php?name=member&amp;file=login'>" ; 
          echo "  </p>
        </div>

        <!-- sidebar -->

        <div class='x'></div>
        <div class='break'></div>

      </div> " ;
      include 'modules/index/footer.php'; 
    } else {
      ?>
      <? include "modules/index/header.php" ; ?>
      <div id="center">
        <p>
          <? date_default_timezone_set("Asia/Bangkok"); ?>
          <?
    ///////////////////
          $date_today = date("d/m/");
          $date_today1 = date("Y")+'543';
          $date_date = date("d/m/$date_today1");
          $string = $date_today1;
          $date_small = $date_today.substr($string,2);
    ///////////////////         
          $date_todayone = date("d");
          $date_todaymonth = date("m");
          $date_today9 = date("Y")+'543';
          $string1 = $date_today9;
          $date_small9 = substr($string1,2).$date_todaymonth.$date_todayone;
            ////////////////////
          $date_today11 = date("d");
          $m_today12 = date("m");
                /////////////
          ?>
          <?php include"includes/add_data.php"; ?>

          <?    //   code ปฏิทินภาษาไทย  แปลง คศ เป็น พศ เป็นการเรียกไฟล์มาใช้งาน                     ?>
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
			
          <?
          $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

          $result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
          $dbarr = mysql_fetch_array($result) ;
          $codehos= $dbarr["codehos"];
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
                  <td colspan="3"> <br />
                    วันที่ <input name="d_record"  value="<? echo $date_todayone;?>"  size="2"  readonly="readonly"/>
                    
                    เดือน  <input name="m_record"  value="<? echo $date_todaymonth;?>"  size="2"  readonly="readonly"/>

                    ปี พ.ศ.<input  type="text" maxlength="4" name="y_record" value="<? echo $date_today1;?>"readonly="readonly"size="3" />
                  </td>
                </tr>
                <tr>
                  <th align="left" width="33%"><br /><strong>Code : </strong><br /></th>
                  <?   
                        //  เพิ่มค่าบวกหนึ่งของหมายเลข job 
                  $sql = "select * from ".TB_ADD_DATA." order by id" ;                        
                  $result = mysql_query($sql) ;
                  $num_result  = mysql_num_rows($result) ;
                  $dbarr = mysql_fetch_row($result) ;
                        $code_id = $dbarr[0]+1 ; // นำค่า id มาเพิ่มให้กับค่า   + 1
                        $job_in = "$num_result" +1;
                        $code_id = "$job_in" ;       // 

                        ?>
                <?  // นับจำนวนใบงานของแต่ละ รพ. (ส่วนนี้จะไม่ขึ้นต่อกัน )
                $ss = "select * from ".TB_ADD_DATA." WHERE codehos='$codehos' " ;       
                $aa = mysql_query($ss) ;
                $bb  = mysql_num_rows($aa) ;
                                $bb=$bb+1;     // เลขที่ใบงานของ รพ นั้นๆ

                                ?>
                                <th align="left"  colspan="3"><br /><strong><input name="centre"  value="<? echo $codehos.$bb;?>"  size="10"  readonly="readonly"/> </strong><br /></th>

                              </tr>
                              <tr>
                                <th align="left" width="33%">Patient Initials :</th>
                                <td colspan="3"><br /> <input type="text" name="patient_initials" size="20" id="patient_initials1"  maxlength="2" style="text-transform: uppercase"  /> <b>** กรุณากรอกเป็นภาษาอังกฤษตัวพิมพ์ใหญ่</b><br /><br />     </td>
                              </tr>

                              <tr>
                                <th colspan="4">Participant Demographic data:</th>
                              </tr>
                              <tr>
                                <th align="left" width="33%">Gender:</th>
                                <td colspan="3"> <br />
                                  <input type="radio"   name="sex" id="sex1"  value="Male" >  Male  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="radio"   name="sex"  id="sex2" value="Female" >  Female
                                  <input type="radio"   name="sex"  id="sex3" value="Unknown" >  Unknown<br /><br />
                                </td>
                              </tr>
                              <tr>
                                <th align="left">ID :</th>
                                <td colspan="3" > <br />
                                  <input type="password" size="10"  name="id_card" id="id_card1" maxlength="13"  >   &nbsp;&nbsp;&nbsp;
                                  กรุณากรอกเป็นตัวเลข(Ex: 1522222222xx)   <font color="#FF0000">**ถ้าไม่รู้ให้ใส่เครื่องหมาย '-'</font>
                                  <br /><br />
                                </td>
                              </tr>
                              <tr>
                                <th align="left">Confirm ID::</th>
                                <td colspan="3" > <br />

                                 <input type="password" size="20"  name="id_card_confirm"  id="id_card_confirm1" maxlength="13"  > &nbsp;&nbsp;   กรุณากรอกเป็นตัวเลข(Ex: 1522222222xx)  <font color="#FF0000">**ถ้าไม่รู้ให้ใส่เครื่องหมาย '-'</font><br /><br /></td>
                               </tr>

                               <tr>
                                <th align="left">HN :</th>
                                <td colspan="3" > <br />
                                  <input type="text" size="20"  name="hn" maxlength="20"  > &nbsp;&nbsp;กรุณากรอกเป็นตัวเลข<br /><br /></td>
                                </tr>
                                <tr>
                                  <th align="left">Confirm HN :</th>
                                  <td colspan="3" > <br />
                                    <input type="text" size="20"  name="hn_confirm" maxlength="20"  > &nbsp;&nbsp;กรุณากรอกเป็นตัวเลข<br /><br /></td>
                                  </tr>
                                  <tr>
                                    <th align="left">Date of Birth:</th>
                                    <td colspan="3" > <br />
                                      <input type="text" id="mybirth" size="8"  name="date_of_birth" maxlength="10">
                                      (dd/mm/2500)<br /><br />
                                    </tr>
                                    <tr>
                                      <th align="left">Current address  :(in the last 6 months)</th>
                                      <td colspan="3" > <br />
                                        <select name="province" id="province" style="width:150px;>
                                          <option  value="">กรุณาเลือกจังหวัด</option>
                                          <option name="province" value="<? echo "$dbarr[province]"; ?>"><? echo "$dbarr[province]"; ?></option>
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
                                        </select><br /></td>
                                      </tr>
                                      <tr>
                                        <th align="left">Mode of payment :</th>
                                        <td colspan="3" ><br />
                                         <input type="radio"  name="payment" id="payment1"   value="Government" >  1. Government  <br /><br />
                                         <input type="radio"  name="payment"  id="payment2"  value="Social security" >  2. Social security<br /><br />
                                         <input type="radio"  name="payment"   id="payment3" value="Private insurance" > 3. Private insurance<br /><br />
                                         <input type="radio"  name="payment"  id="payment4"  value="UC (30 baht)" >  4.  UC (30 baht)<br /><br />
                                         <input type="radio"  name="payment" id="payment5"  value="Out of pocket" >  5. Out of pocket<br /><br />
                                         <input type="radio"  name="payment" id="payment6"   value="Other: specify"  onclick="show_payment(this.value);"   >  6. Other <br /><br />

                                         <table width="500" border="0" cellpadding="0" cellspacing="0" id="post1" style="display:none">
                                          <tr>
                                            <td>
                                             <strong>   specify  :</strong>  &nbsp;&nbsp;  <input type="text" name="payment_other" value="<? echo "$dbarr[payment_other]"; ?>" size="50"  />
                                           </td>
                                         </tr>
                                       </table>
                                       <script language="javascript">
                                        function show_payment(id) {
                                        if(id == "Other: specify") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
                                        document.getElementById("post1").style.display = "";
                                        document.getElementById("post2").style.display = "none";
                                      } else if(id != "Other: specify") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
                                      document.getElementById("post1").style.display = "none";
                                      document.getElementById("post2").style.display = "";
                                    }
                                  }
                                </script> 
                              </td>
                            </tr>

                            <tr>
                              <th align="center" colspan="4">Lymphoma Database</th>
                            </tr>
                            <tr>
                              <th align="left">Date of biopsy report :</th>
                              <td colspan="3" > <br />
                               <input type="text" name="date_bio_report" id="date_bio_report"  size="10"/>  &nbsp;&nbsp;(dd/mm/2500)<br /><br /></td>
                             </tr>
                             <tr>
                              <th align="left">Pathology No.:</th>
                              <td colspan="3" > <br />
                                <input type="password" size="10"  name="pathology"  >  (Example: SP47-0007/47 = SP47000747)<br /><br /></td>
                              </tr>
                              <tr>
                                <th align="left">Confirm Pathology No.:</th>
                                <td colspan="3" > <br />
                                 <input type="password" size="10"  name="pathology_confirm"  >  (Example: SP47-0007/47 = SP47000747)><br /><br /></td>
                               </tr>
                               <tr>
                                <th align="left">Biopsy site  :</th>
                                <td colspan="3" > <br />

                                 <select name="biopsy_site" id="biopsy_site" style="width:300px;>
                                  <option  value="">Please select..</option>
                                  <option value="">Please select..</option>
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
  <input type="radio" name="type"  value="Done" id="type1"> Hodgkin lymphoma (HL)  <br />
    <div id="detail_hodgkin">
     <select name="hodgkin_don" id="hodgkin_don1" style="width:300px";>
      <option  value="">Please select..</option>
      <option value="01: Classical HL, Nodular sclerosis">01: Classical HL, Nodular sclerosis</option>
      <option value="02: Classical HL, Mixed cellularity">02: Classical HL, Mixed cellularity </option>
      <option value="03: Classical HL, Lymphocyte-rich">03: Classical HL, Lymphocyte-rich </option>
      <option value="04: Classical HL, Lymphocyte-depleted">04: Classical HL, Lymphocyte-depleted </option>
      <option value="05: HL, Nodular lymphocyte predominant">05: HL, Nodular lymphocyte predominant</option>
      <option value="06: HL, unclassifiable">06: HL, unclassifiable</option>
    </select> 
  </div>
  
  <input type="radio"   name="type" value="Non-Hodgkin"  id="type2"  >   Non-Hodgkin lymphoma (NHL) <br />
  <div id="detail_non_hodgkin">
    <strong>Immunophenotype:    </strong>
    <select name="type_non" id="type_non1" style="width:150px";>
      <option  value="">Please select..</option>
      <option value="B">B</option>
      <option value="T/NK">T/NK</option>
      <option value="Unclassify">Unclassify</option>
      <option value="Not done">Not done</option>
    </select>
    <br />
    <input type="radio" name="type_sub_non"  id="type_sub_non1"  value="WHO classification"   >  WHO classification  <br />
    <select name="who_sub" id="who_sub" style="width:400px";>
      <option  value="">Please select..</option>
      <option value="07 : Precursor B-lymphoblastic lymphoma">07 : Precursor B-lymphoblastic lymphoma</option>
      <option value="08 : Small lymphocytic lymphoma">08 : Small lymphocytic lymphoma</option>
      <option value="09 : Lymphoplasmacytic lymphoma">09 : Lymphoplasmacytic lymphoma</option>
      <option value="10 : Splenic marginal zone lymphoma">10 : Splenic marginal zone lymphoma</option>
      <option value="11 : Extranodal marginal zone lymphoma of MALT type">11 : Extranodal marginal zone lymphoma of MALT type</option>
      <option value="12 : Nodal marginal zone lymphoma">12 : Nodal marginal zone lymphoma</option>
      <option value="13 : Follicular lymphoma, grade 1">13 : Follicular lymphoma, grade 1</option>
      <option value="14 : Follovuar lymphoma, grade 2">14 : Follovuar lymphoma, grade 2</option>
      <option value="15 : Follicular lymphoma, grade 3">15 : Follicular lymphoma, grade 3</option>
      <option value="16 : Mantle cell lymphoma">16 : Mantle cell lymphoma</option>
      <option value="17 : Diffuse large B-cell lymphoma (DLBCL), NOS">17 : Diffuse large B-cell lymphoma (DLBCL), NOS</option>
      <option value="18 : Mediastinal (thymic) large B-cell lymphoma">18 : Mediastinal (thymic) large B-cell lymphoma</option>
      <option value="19 : Intravascular large B-cell lymphoma">19 : Intravascular large B-cell lymphoma</option>
      <option value="20 : Primary effusion lymphoma">20 : Primary effusion lymphoma</option>
      <option value="21 : Burkitt lymphoma">21 : Burkitt lymphoma</option>
      <option value="22 : Lymphomatioid granulomatosis">22 : Lymphomatioid granulomatosis</option>
      <option value="23 : Post-transplant lymphoproliferative disorders(PTLD)">23 : Post-transplant lymphoproliferative disorders(PTLD)</option>
      <option value="24 : Precursor T-lymphoblastic lymphoma">24 : Precursor T-lymphoblastic lymphoma</option>
      <option value="25 : Extranodal NK/T-cell lymphoma, nasal type">25 : Extranodal NK/T-cell lymphoma, nasal type</option>
      <option value="26 : Enteropathy-type T-cell lymphoma">26 : Enteropathy-type T-cell lymphoma</option>
      <option value="27 : Hepatosplenic T-cell lymphoma">27 : Hepatosplenic T-cell lymphoma</option>
      <option value="28 : Subcutaneous panniculitis-like T-cell lymphoma">28 : Subcutaneous panniculitis-like T-cell lymphoma</option>
      <option value="29 : Aggressive NK-cell leukemia/lymphoma">29 : Aggressive NK-cell leukemia/lymphoma</option>
      <option value="30 : Mycosis fungoides/Sezary syndrome">30 : Mycosis fungoides/Sezary syndrome</option>
      <option value="31 : Angioimmunblastic T-cell lymphoma">31 : Angioimmunblastic T-cell lymphoma</option>
      <option value="32 : Primary cutaneous anaplastic large cell lymphoma">32 : Primary cutaneous anaplastic large cell lymphoma</option>
      <option value="33 : Anaplastic large cell lymphoma, ALK positive">33 : Anaplastic large cell lymphoma, ALK positive</option>
      <option value="34 : Peripheal T-cell lymphoma, unspecified, NOS">34 : Peripheal T-cell lymphoma, unspecified, NOS</option>
      <option value="--**New entity**--">--**New entity**--</option>
      <option value="35 : T-cell/histiocyte-rich large B-cell lymphoma">35 : T-cell/histiocyte-rich large B-cell lymphoma</option>
      <option value="36 : Primary cutaneous follicle enter lymphoma">36 : Primary cutaneous follicle enter lymphoma</option>
      <option value="37 : Primary DLBCL of the CNS">37 : Primary DLBCL of the CNS</option>
      <option value="38 : Primry cutaneous DLBCL, leg type ">38 : Primry cutaneous DLBCL, leg type </option>
      <option value="39 : EBV positive DLBCL of the elderly ">39 : EBV positive DLBCL of the elderly </option>
      <option value="40 : ALK positive large b-cell lymphoma">40 : ALK positive large b-cell lymphoma</option>
      <option value="41 : Plasmablastic lymphoma">41 : Plasmablastic lymphoma</option>
      <option value="42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease">42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease</option>
      <option value="43 : With features intermediate between DLBCL and Burkitt lymphoma">43 : With features intermediate between DLBCL and Burkitt lymphoma</option>
      <option value="44 : With features intermediate between DLBCL and classical Hodgkin">44 : With features intermediate between DLBCL and classical Hodgkin</option>
      <option value="45 : Chronic lymphoproliferative disorder of NK-cells">45 : Chronic lymphoproliferative disorder of NK-cells</option>
      <option value="46 : Lymphomatoid papulosis">46 : Lymphomatoid papulosis</option>
      <option value="47 : Primary cutaneous gamma-delta T-cell lymphoma">47 : Primary cutaneous gamma-delta T-cell lymphoma</option>
      <option value="48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma">48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma</option>
      <option value="49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma">49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma</option>
      <option value="50 : Anaplastic large cell lymphoma, ALK negative">50 : Anaplastic large cell lymphoma, ALK negative</option>
    </select>
    <br />
    <input type="radio" name="type_sub_non"  id="type_sub_non2"  value="Working formulation"  >  Working formulation  <br />

    <select name="work_sub" id="work_sub" style="width:400px";>
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
             <?   /*  ************************   
                    <script type="text/javascript">
   					$(document).ready(function() {
						$('#detail_who').hide();
			        	$('#detail_work_sub').hide();
					 	$('#detail_other_sub').hide();
        			
			        });
				    $('#type_sub_non1').click(function(){
			        clear_data();
			        $('#work_sub').hide();
					$('#other_type').hide();
			        $('#who_sub').show();
				    });

				    $('#type_sub_non2').click(function(){
			        clear_data();
			        $('#who_sub').hide();
					$('#other_type').hide();
			        $('#work_sub').show();
				    });
					 $('#type_sub_non3').click(function(){
			        clear_data();
			       $('#who_sub').hide();
					$('#work_sub').hide();
			        $('#other_type').show();
				    });
					
				    function clear_data(){
					$('#type_sub_non1').val('');
			        $('#type_non1').val('');
			        $('#who_sub').val('');
					$('#type_sub_non2').val('');
					$('#work_sub').val('');
					$('#type_sub_non3').val('');
					$('#other_type').val('');
			        $('#hodgkin_don1').val('');
					
				    }
					</script>
              */?>
            </td>
          </tr>
          <tr>
            <th align="left">Ann Arbor stage :</th>
            <td colspan="3" > <br />
              <table width="100%" border="0" align="center">
                <tr>
                  <td>   <input type="radio" name="ann_arbor" id="ann_arbor1"   value="I"  >   I           </td>
                  <td>    <input type="radio" name="ann_arbor"  id="ann_arbor2"  value="II"  >   II   </td>
                </tr>
                <tr>
                  <td><input type="radio" name="ann_arbor" id="ann_arbor3"   value="III"  >   III </td>
                  <td><input type="radio" name="ann_arbor" id="ann_arbor4"  value="IV"  >   IV</td>
                </tr>

                <tr>
                  <th><b>Symptom</b></th>
                  <td><br /><input type="radio" name="symptom_ann"  value="A"  >  A  <br /><br />
                    <input type="radio" name="symptom_ann"  value="B"  > B <br /><br />
                  </td>
                </tr>
              </table>
            </td>
          </tr>
         <script src="jquery.min.js"></script>

    <tr>
      <th align="left">Extranodal sites :  (mark all that apply):</th>
      <td colspan="3" > <br />
        <br /> 
        <input type="checkbox" name="ext_none"   value="ext_done"  id="ext_none" >  none
        <div id="ext_none1"></div>
        <div id="extra_site">
          <br /> 
          <input type="checkbox" name="ext_wal"   value="Waldeyer's ring" id="ext_wal"  >  Waldeyer's ring &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_sin"   value="Sinonasal"  id="ext_sin">   Sinonasal  &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_sal"   value="Salivary gland"  id="ext_sal">  Salivary gland  &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_thy"   value="Thyroid"   id="ext_thy"  > Thyroid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_eye"   value="Eye/Ocular adnexa"   id="ext_eye"> Eye/Ocular adnexa<br /><br />
          <br />
          <input type="checkbox" name="ext_lung"   value="Lung/Pleura"   id="ext_lung">  Lung/Pleura &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?   //******   ��Ŵ����������������  ?>
          <input type="checkbox" name="ext_breast"   value="Breast" id="ext_breast" >  Breast   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_stomach"   value="Stomach"  id="ext_stomach"> Stomach  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_small"   value="Small intestine" id="ext_small" > Small intestine  &nbsp;
          <input type="checkbox" name="ext_testis"   value="Testis" id="ext_testis"  > Testis<br /><br />
          <br />
          <input type="checkbox" name="ext_brain"   value="Brain/CNS"  id="ext_brain" > Brain/CNS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_liver"   value="Liver"  id="ext_liver" > Liver  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_large"   value="Large intestine"   id="ext_large"> Large intestine  &nbsp;&nbsp;
          <input type="checkbox" name="ext_bone"   value="Bone marrow" id="ext_bone"  > Bone marrow  &nbsp;&nbsp;&nbsp;  
          <input type="checkbox" name="ext_spleen"   value="Spleen"   id="ext_spleen"> Spleen  <br /><Br /><Br />
          <input type="checkbox" name="ext_skin"   value="Skin/Subcutaneous"  id="ext_skin" > Skin/Subcutaneous<br /><br /><Br />
          <input type="checkbox" name="ext_other"   value="Others" onclick="show_ext(this.value);" id="ext_other"  > Others 
          <input type="text" name="ext_other_text"    size="50" id="ext_other_text" >  <br />
          *Enter each extranodal site on a new line. <br />
          ** Do not have ','(comma) in text.<br />
          *** Do not leave blank line in text. <br />

        </div>
        <br /><br />
        
      </td>
    </tr>

  <script type="text/javascript">
  $('#ext_none').click(function(){
    if($('#ext_none').is(':checked')){
        change_attr(true);
        clear_data_site();
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
            <input type="radio"   name="per_ecog"  value="0"  > 0  &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio"   name="per_ecog"  value="1"  >  1 &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio"   name="per_ecog"  value="2"  > 2 &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio"   name="per_ecog"  value="3"  > 3 &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio"   name="per_ecog"  value="4"  > 4  &nbsp;&nbsp;&nbsp;&nbsp;
          </td>
        </tr>
        <tr>
          <th align="left">LDH :</th>
          <td colspan="3" > <br />
           <input type="radio"   name="ldh" id="ldh1"  value="Normal"  >  Normal  &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio"   name="ldh" id="ldh2"  value="High"  >  High
           <br /><br />
         </tr>

         <tr>
          <th align="left">HIV positive :</th>
          <td colspan="3"><br />
           <input type="radio"   name="hiv_positive"  id="hiv_positive1" value="Yes"  >  Yes &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio"   name="hiv_positive" id="hiv_positive2"  value="No"  >  No     &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="radio"   name="hiv_positive"  id="hiv_positive3" value="Not done"  >  Not done        

         </td>
       </tr>
       <tr>
        <th align="left" width="33%">IPI :</th>
        <td colspan="3">
        

        </td>

      </tr>
      
      

      <tr>
       <th></th>
       <td colspan="3">
            

		<input type="text" name="" id="txt1" onkeyup="onaction();"><br>
<input type="text" name="" id="txt2" onkeyup="onaction();"><br>

<input type="checkbox" name="ext_wal" onclick="onaction();"  value="Waldeyer's ring" id="ext_wal9"  >  Waldeyer's ring <br>
<input type="checkbox" name="ext_sin" onclick="onaction();"  value="Sinonasal"  id="ext_sin9">   Sinonasal  <br>
<input type="checkbox" name="ext_sal" onclick="onaction();"  value="Salivary gland"  id="ext_sal9">  Salivary gland<br>

<select name="hodgkin_don" id="hodgkin_don9" onchange="onaction();" style="width:300px";>
    <option  value="">Please select..</option>
    <option value="01: Classical HL, Nodular sclerosis">01: Classical HL, Nodular sclerosis</option>
    <option value="02: Classical HL, Mixed cellularity">02: Classical HL, Mixed cellularity </option>
    <option value="03: Classical HL, Lymphocyte-rich">03: Classical HL, Lymphocyte-rich </option>
    <option value="04: Classical HL, Lymphocyte-depleted">04: Classical HL, Lymphocyte-depleted </option>
    <option value="05: HL, Nodular lymphocyte predominant">05: HL, Nodular lymphocyte predominant</option>
    <option value="06: HL, unclassifiable">06: HL, unclassifiable</option>
</select><br>

<input type="radio" name="type" onclick="onaction();" value="Done" id="type9"> Hodgkin lymphoma (HL)  <br />
<input type="radio" name="type" onclick="onaction();" value="Non-Hodgkin"  id="type10"  >   Non-Hodgkin lymphoma (NHL) <br />

<button  type="submit" id="save"  value="save" disabled>
    Save
</button>
<button  type="submit" id="drafts" name="drafts" value="Save drafts"  />
    Save drafts
</button>
<button  type='reset' name='clear' value='Clear'>
    Clear
</button>

<script src="jquery.min.js"></script>
<script type="text/javascript">
<!--
		function onaction(){
			document.getElementById('save').disabled = verify_input();
		}

        function verify_input(){
            return  check_input_text()||
             ! check_checkbox()||
             ! check_radio()||
             ! check_selected();
        }

        function check_input_text(){
            return document.getElementById('txt1').value=="" ||
             document.getElementById('txt2').value=="";
        }

        function check_checkbox(){
            return $('#ext_wal9:checked').val()||
              $('#ext_sin9:checked').val()||
              $('#ext_sal9:checked').val();
        }

        function check_radio(){
            return $('#type9:checked').val() || $('#type10:checked').val();
        }

        function check_selected(){
            return $('#hodgkin_don9').val();
        }
//-->
</script>
       </td>
     </tr>
     <tr>
        <td colspan="3">
          <span id ="alert">
            
          </span>
        </td>
     </tr>
   </table></center>
 </p>
</div>


</FORM>
<?
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
<? include "modules/index/footer.php"; ?>


<script language="javascript">
  $( "input[name='patient_initials']" ).keyup(function() {
    changeInput();    
  });

  $( "input[name='date_of_birth']" ).keyup(function() {
    changeInput();    
  });

  function changeInput(){
    if(validateForm()){
      enableSaveButton();
    }else{
      disableSaveButton();
    }
  }
  function validateForm(){
    var patient_initials ="input[name='patient_initials']".val();
    var date_of_birth ="input[name='date_of_birth']".val();
    var result = patient_initials.length>0 && date_of_birth.length>0;
    return result;
  }
  function disableSaveButton(){
    $('#save').prop( "disabled", true );
    $('#alert').text("");
  }

  function enableSaveButton(){
    $('#save').prop( "disabled", false );
    $('#alert').text("���ͺ�");
  }

  
</script>