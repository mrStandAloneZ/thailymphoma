<?php
//if(!session_is_registered("login_true")) 
if (!isset($_SESSION["login_true"])) {
//  url=index.php คำสั่งนี้จะให้ไปหน้าที่จะต้องกรอก user,pwd ถ้าอยู่โฟล์เดอร์อื่นให้เรียกให้ถูกนะครับ
    echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>Acute leukemia registry form</a></h1>
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
    <?php include "modules/index/header.php"; ?>
    <div id="center">
        <p>
            <?php date_default_timezone_set("Asia/Bangkok"); ?>
            <?php include"includes/add_data.php"; ?>
            <?php
            $max = mysql_query("select max(member_id) from  web_add_data");
            $total_max = mysql_result($max, 0);
            mysql_close();
            ?>
            <?php
            $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);

            $result = mysql_query("select * from " . TB_MEMBER . " where user='$login_true'") or die("Err Can not to result");
            $dbarr = mysql_fetch_array($result);
            $codehos = $dbarr["codehos"];
            ?>
        <form id="form1" name="form1" method="post" action="?name=member&file=show_add_data">

            <div id="center">
                <h1>Acut acure leukemia registry  form</h1>
                <p>

                <center><table width="100%" border="0" align="center">
                        <tr>
                            <th align="left" width="19%"><strong>Code : </strong></th>
                            <?php
                            //  เพิ่มค่าบวกหนึ่งของหมายเลข job 
                            $sql = "select * from " . TB_ADD_DATA . " order by id";
                            $result = mysql_query($sql);
                            $num_result = mysql_num_rows($result);
                            $dbarr = mysql_fetch_row($result);
                            $code_id = $dbarr[0] + 1; // นำค่า id มาเพิ่มให้กับค่า   + 1
                            $job_in = "$num_result" + 1;
                            $code_id = "$codehos$job_in";       // 

                            /*
                              $hostnameDB = "localhost";
                              $userDB = "root";
                              $passwordDB = "password";
                              $dbname = "aml-all";
                              mysql_connect($hostnameDB, $userDB, $passwordDB) or die("No Connect Server");
                              mysql_select_db($dbname) or die("No Connect Database!");
                              $max = mysql_query("select max(code_id) from web_add_data");
                              echo $total_max = mysql_result($max,0);
                              mysql_close();
                             */
                            ?>
                            <td width="23%"><strong><input type="text" name="code_id"  size="5"id="textfield" value="<?php echo $code_id; ?>" readonly="readonly" /></strong></td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">อักษรตัวแรกของชื่อและนามสกุล(ภาษาอังกฤษ) :</th>
                            <td width="23%"> <input type="text" name="fl" size="2"  maxlength="2"/>     </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">เพศ:</th>
                            <td width="23%"><input  type="radio" name="sex" value="ชาย" />&nbsp;ชาย  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" name="sex" value="หญิง" />&nbsp;&nbsp;หญิง  </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Date of birth: DD/MM/YYYY</th>
                            <td width="23%"> วันที่ <input  type="text" name="d_birth" value="" size="3" maxlength="2" /> เดือน <input  type="text" name="m_birth" value="" maxlength="2" size="3" /> ปี <input  type="text" maxlength="4" name="y_birth" value="" size="3" />
                            </td>
                        </tr>
                        <?php $date_birth = $d_birth + $m_birth + $y_birth; ?>
                        <tr>
                            <th align="left" width="19%"><strong>ภูมิลำเนา : </strong></th>
                            <td width="23%">  <select name="province" id="province" style="width:150px;">
                                    <option  value=""selected>กรุณาเลือกจังหวัด</option>>
                                    <option value="กระบี่">กระบี่ </option>
                                    <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                    <option value="กาญจนบุรี">กาญจนบุรี </option>
                                    <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                    <option value="กำแพงเพชร">กำแพงเพชร </option>
                                    <option value="ขอนแก่น">ขอนแก่น</option>
                                    <option value="จันทบุรี">จันทบุรี</option>
                                    <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                    <option value="ชัยนาท">ชัยนาท </option>
                                    <option value="ชัยภูมิ">ชัยภูมิ </option>
                                    <option value="ชุมพร">ชุมพร </option>
                                    <option value="ชลบุรี">ชลบุรี </option>
                                    <option value="เชียงใหม่">เชียงใหม่ </option>
                                    <option value="เชียงราย">เชียงราย </option>
                                    <option value="ตรัง">ตรัง </option>
                                    <option value="ตราด">ตราด </option>
                                    <option value="ตาก">ตาก </option>
                                    <option value="นครนายก">นครนายก </option>
                                    <option value="นครปฐม">นครปฐม </option>
                                    <option value="นครพนม">นครพนม </option>
                                    <option value="นครราชสีมา">นครราชสีมา </option>
                                    <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                    <option value="นครสวรรค์">นครสวรรค์ </option>
                                    <option value="นราธิวาส">นราธิวาส </option>
                                    <option value="น่าน">น่าน </option>
                                    <option value="นนทบุรี">นนทบุรี </option>
                                    <option value="บุรีรัมย์">บุรีรัมย์</option>
                                    <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                    <option value="ปทุมธานี">ปทุมธานี </option>
                                    <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                    <option value="ปัตตานี">ปัตตานี </option>
                                    <option value="พะเยา">พะเยา </option>
                                    <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                    <option value="พังงา">พังงา </option>
                                    <option value="พิจิตร">พิจิตร </option>
                                    <option value="พิษณุโลก">พิษณุโลก </option>
                                    <option value="เพชรบุรี">เพชรบุรี </option>
                                    <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                    <option value="แพร่">แพร่ </option>
                                    <option value="พัทลุง">พัทลุง </option>
                                    <option value="ภูเก็ต">ภูเก็ต </option>
                                    <option value="มหาสารคาม">มหาสารคาม </option>
                                    <option value="มุกดาหาร">มุกดาหาร </option>
                                    <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                    <option value="ยโสธร">ยโสธร </option>
                                    <option value="ยะลา">ยะลา </option>
                                    <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                    <option value="ระนอง">ระนอง </option>
                                    <option value="ระยอง">ระยอง </option>
                                    <option value="ราชบุรี">ราชบุรี</option>
                                    <option value="ลพบุรี">ลพบุรี </option>
                                    <option value="ลำปาง">ลำปาง </option>
                                    <option value="ลำพูน">ลำพูน </option>
                                    <option value="เลย">เลย </option>
                                    <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                    <option value="สกลนคร">สกลนคร</option>
                                    <option value="สงขลา">สงขลา </option>
                                    <option value="สมุทรสาคร">สมุทรสาคร </option>
                                    <option value="สมุทรปราการ">สมุทรปราการ </option>
                                    <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                    <option value="สระแก้ว">สระแก้ว </option>
                                    <option value="สระบุรี">สระบุรี </option>
                                    <option value="สิงห์บุรี">สิงห์บุรี </option>
                                    <option value="สุโขทัย">สุโขทัย </option>
                                    <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                    <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                    <option value="สุรินทร์">สุรินทร์ </option>
                                    <option value="สตูล">สตูล </option>
                                    <option value="หนองคาย">หนองคาย </option>
                                    <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                    <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                    <option value="อุดรธานี">อุดรธานี </option>
                                    <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                    <option value="อุทัยธานี">อุทัยธานี </option>
                                    <option value="อุบลราชธานี">อุบลราชธานี</option>
                                    <option value="อ่างทอง">อ่างทอง </option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th align="left" width="19%"> สิทธิการรักษา :</th>
                            <td width="23%"> 
                                <input type="radio" name="treatment" value="เบิกราชการ/รัฐวิาหกิจ"> เบิกราชการ/รัฐวิาหกิจ &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="treatment" value="สปสช."> สปสช.   &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="treatment" value="ประกันสังคม">  ประกันสังคม   &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="treatment" value="จ่ายเอง">  จ่ายเอง  
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">อาชีพ : </th>
                            <td width="23%">
                                <select name="career" id="career" style="width:150px;">
                                    <option value="" selected>เลือกอาชีพ</option>
                                    <option value='นักเรียน นักศึกษา'>นักเรียน นักศึกษา </option>
                                    <option value='ราชการ'>ราชการ</option>
                                    <option value='รัฐวิสาหกิจ'>รัฐวิสาหกิจ </option>
                                    <option value='ค้าขาย'>ค้าขาย </option>
                                    <option value='เกษตรกร'>เกษตรกร</option>
                                    <option value='แม่บ้าน'>แม่บ้าน</option>
                                    <option value='อิสระ'>อิสระ </option>
                                    <option value='พนักงานเอกชน'>พนักงานเอกชน</option>
                                    <option value='ลูกจ้างทั่วไป'>ลูกจ้างทั่วไป</option>
                                    <option value='ว่างงาน'>ว่างงาน</option>
                                    <option value='นักบวช'>นักบวช</option>
                                    <option value='อื่นๆ'>อื่นๆ</option>
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" align="center"><font size="+1" color="#0000FF"><b>Leukemia  diagnosis </b></font></th>
                        </tr>
                        <tr>
                            <th align="left" width="19%"><strong>Date of 1 st diagnosis: DD/MM/YYYY(พ.ศ.) </strong>: </th>
                            <td width="23%">วันที่ <input  name="d_diagnostic"  value="" type="text" maxlength="2" size="2" /> เดือน <input  name="m_diagnostic"  value="" type="text"  size="2" maxlength="2"/> ปี  <input  name="y_diagnostic"  value="" type="text"  size="3" maxlength="4"/>
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Diagnosis (เลือกได้มากกว่า 1 ข้อ): </th>
                            <td width="23%">
                                <input type="radio" name="diagnosis" value="AML"> AML  &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="diagnosis" value="APL"> APL   &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="diagnosis" value="Mixed-phenotypic acute leukemia">Mixed-phenotypic acute leukemia   &nbsp;&nbsp;&nbsp;  <br /><br />
                                <input type="radio" name="diagnosis_i" value="De novo"> De novo   &nbsp;&nbsp;  
                                <input type="radio" name="diagnosis_i" value="Secondary">Secondary   &nbsp;&nbsp;&nbsp;   

                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Cytogenetics: </th>
                            <td width="23%">

                                <input type="radio" name="cytogenetics" id="cytogenetics"  value="Not done"  onclick="document.getElementById('cytogenetics_i').disabled = true">Not done
                                <input type="radio" name="cytogenetics" id="cytogenetics"  value="Done"  onclick="document.getElementById('cytogenetics_i').disabled = false">Done
                                <input id="cytogenetics_i" name="cytogenetics_i" type="text"  size="5"   />%

                            </td>
                        </tr> 
                        <tr>
                            <th align="left" width="19%">CBC(At diagnosis): </th>
                            <td width="23%">
                                WBC : <input name="cbc" type="text" value="" id="cbc" />  ML/micro litre        <br /><br />
                                Blast :   <input name="cbci" type="text" value="" id="cbci" /> %        <br /><br />
                                Hb :   &nbsp;  <input name="cbcii" type="text" value="" id="cbcii" /> g/dL      <br />   <br />
                                Plt :  &nbsp;  <input name="cbciii" type="text" value="" id="cbciii" />  ML/micro litre         
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">%Blast in BM at diagnosis: </th>
                            <td width="23%">

                                <input type="radio" name="bm_don" id="bm_don"  value="Done"  onclick="document.getElementById('bmi').disabled = false">Done <input id="bmi" name="bmi" type="text"  size="5"   />%
                                <input type="radio" name="bm_don" id="bm_don"  value="not don"  onclick="document.getElementById('bmi').disabled = true">Not done

                            </td>
                        </tr> 
                        <tr>
                            <th align="left" width="19%">Organ involvement(extramedullary  diseases)เลือกได้มากกว่า 1 ข้อ </th>
                            <td width="23%"><br />
                                <input  name="organ" type="checkbox" value="Hepatomegaly" />  Hepatomegaly        <br /><br />
                                <input  name="organ_i" type="checkbox" value="Splenomegaly" />  Splenomegaly        <br /><br />
                                <input name="organ_ii" type="checkbox" value="Lymphadenopathy" />  Lymphadenopathy    <br /><br />
                                <input  name="organ_iv" type="checkbox" value="Skin" />   Skin       <br /><br />
                                <input  name="organ_vv" type="checkbox" value="Gum" />   Gum     <br /><br />
                                <input  name="organ_ivv" type="checkbox" value="Testes" />  Testes     <br /><br />
                                <input  name="organ_vvv" type="checkbox" value="CNS" />  CNS   <br /><br />
                                <input name="organ_ivvv" type="checkbox" value="1" onclick="show_organ(this.value);"> &nbsp;Other

                                <table width="300" border="0" cellpadding="0" cellspacing="0" id="organ_1" style="display:none">
                                    <tr>
                                        <td><input name="organ_vvvv" type="text" value="" /></td>
                                    </tr>
                                </table>
                                <br>
                                <script language="javascript">
                                    function show_organ(id) {
                                        if (id == 1) { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2 
                                            document.getElementById("organ_1").style.display = "";
                                            document.getElementById("organ_2").style.display = "none";
                                        } else if (id == 2) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
                                            document.getElementById("organ_1").style.display = "none";
                                            document.getElementById("organ_2").style.display = "";
                                        }
                                    }
                                </script>
                                <br />
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">ECOG</th>
                            <td width="23%">
                                <input type="radio"   name="ecog" value="0" /> 0 &nbsp;&nbsp;&nbsp;
                                <input type="radio"   name="ecog" value="1" /> 1 &nbsp;&nbsp;&nbsp;
                                <input type="radio"   name="ecog" value="2" /> 2 &nbsp;&nbsp;&nbsp;
                                <input type="radio"   name="ecog" value="3" /> 3 &nbsp;&nbsp;&nbsp;
                                <input type="radio"   name="ecog" value="4" /> 4 &nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Complications  at  Presentation เลือกได้มากกว่า 1 ข้อ</th>
                            <td width="23%">
                                <input type="checkbox"   name="cap" value="Tumor lysis syndrome" /> Tumor lysis syndrome   
                                <input type="checkbox"   name="capi" value="Leukostasis" /> Leukostasis
                                <input type="checkbox"   name="capii" value="DIC" /> DIC
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" align="center"><font size="+1" color="#0000FF"><b>Acute  leukemia  registry  form-follow up  data  for  non-APL  AML (2nd entry)</b></font></th>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Initial  Induction</th>
                            <td width="23%">
                                <input type="radio"   name="initial" value="7+3 regimen" /> 7+3 regimen  <br /><br />
                                <input type="radio"   name="initial" value="7+3  flat dose" /> 7+3  flat dose  <br /><br />
                                <input type="radio"   name="initial" value="< 7 + 3[เช่น 5+2 ,7+1]" /> < 7 + 3[เช่น 5+2  , 7+1]  <br /><br />
                                <input type="radio"   name="initial" value="Palliative care (including  low  dose  chemotherapy/hydroxyurea/azacytidine-decitabine)" /> Palliative care (including  low  dose  chemotherapy/hydroxyurea/azacytidine-decitabine) <br /><br />
                                <input type="radio"   name="initial" value="Clinical trial" /> Clinical trial 
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Anthracycline</th>
                            <td width="23%">
                                <input type="radio"   name="anthracycline" value="Doxorubicin" /> Doxorubicin
                                <input type="radio"   name="anthracycline" value="Idarubicin" /> Idarubicin
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Response to 1 st  Induction</th>
                            <td width="23%"><br />
                                <input type="radio" name="reponse_i" id="reponse_i"  value="Complete  remission"  onclick="document.getElementById('response_i_i').disabled = true">Complete  remission  <br /><br />
                                <input type="radio" name="reponse_i" id="reponse_i"  value="Not  in CR"  onclick="document.getElementById('response_i_i').disabled = false">Not  in CR  % Blast  after  induction <input id="response_i_i" name="response_i_i" type="text"  size="5"   />% <br /><br />
                                <input type="radio" name="reponse_i" id="reponse_i"  value="Cannot  evaluation"  onclick="document.getElementById('response_i_i').disabled = true">Cannot  evaluation<br /><br />

                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Second induction(in case not in CR from first induction)</th>
                            <td width="23%">                 <br />
                                <input name="second" type="radio" value="Yes" onclick="show_second(this.value);">Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="second" type="radio" value="No" onclick="show_second(this.value);">No
                                </p>
                                <table width="300" border="0" cellpadding="0" cellspacing="0" id="second1" style="display:none" >
                                    <tr>
                                        <td> 		
                                            <input type="radio"   name="secondi" value="7 + 3 regimen" />  7 + 3 regimen   <br /><br />
                                            <input type="radio"   name="secondi" value="7 + 3 flat dose" />  7 + 3 flat dose  <br /><br />
                                            <input type="radio"   name="secondi" value="< 7 + 3 [เช่น 5+2,7+1]" />  < 7 + 3 [เช่น 5+2,7+1]    <br /><br />
                                            <input type="radio"   name="secondi" value="High  dose  Ara-C(HIDAC)" /> High  dose  Ara-C(HIDAC)   <br /><br />
                                            <input type="radio"   name="secondi" value="FLAG +- Ida" />  FLAG +- Ida   <br /><br />
                                            <input type="radio"   name="secondi" value="Other" />  Other <input type="text"  name="secondii"  value="" />
                                        </td>
                                    </tr>
                                </table>
                                <script language="javascript">
                                    function show_second(id) {
                                        if (id == "Yes") { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2 
                                            document.getElementById("second1").style.display = "";
                                            document.getElementById("second2").style.display = "none";
                                        } else if (id == "No") { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
                                            document.getElementById("second1").style.display = "none";
                                            document.getElementById("second2").style.display = "";
                                        }
                                    }
                                </script>        

                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Response to 2nd  Induction</th>
                            <td width="23%"><br />
                                <input type="radio" name="responseii" id="responseii"  value="Complete  remission"  onclick="document.getElementById('responseii_i').disabled = true">Complete  remission  <br /><br />
                                <input type="radio" name="responseii" id="responseii"  value="Not  in CR"  onclick="document.getElementById('responseii_i').disabled = false">Not  in CR  % Blast  after  induction <input id="responseii_i" name="response_i_i" type="text"  size="5"   />% <br /><br />
                                <input type="radio" name="responseii" id="responseii"  value="Cannot  evaluation"  onclick="document.getElementById('responseii_i').disabled = true">Cannot  evaluation<br /><br />

                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Post-remission  treatment [CR after 1-2 induction cycles] or bridging(เลือกได้มากกว่า 1 และกรุณาเลือกจำนวน cycle ที่ให้ )</th>
                            <td width="23%">
                                <br />                
                                <input name="post_remissionivv" type="radio" value="Yes" onclick="show_post(this.value);">Yes  &nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="post_remissionivv" type="radio" value="No" onclick="show_post(this.value);">No
                                </p>
                                <table width="350" border="0" cellpadding="0" cellspacing="0" id="post1" style="display:none">
                                    <tr>
                                        <td>
                                            <input type="checkbox"   name="post_remission" value="7+3 regimen"/> 7+3 regimen  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <select name="post_remissioni_i" id="post_remissioni_i" style="width:150px;">
                                                <option value="" selected>กรุณาเลือก cycles</option>
                                                <option value='1'>1 cycles</option>
                                                <option value='2'>2 cycles</option>
                                                <option value='3'>3  cycles</option>
                                                <option value='4'>4 cycles</option>
                                            </select>  <br /><br />
                                            <input type="checkbox"   name="post_remissionii" value="7+3 regimen" /> 7+3 flat  dose &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <select name="post_remissionii_i" id="post_remissionii_i" style="width:150px;">
                                                <option value="" selected>กรุณาเลือก cycles</option>
                                                <option value='1'>1 cycles</option>
                                                <option value='2'>2  cycles</option>
                                                <option value='3'>3  cycles</option>
                                                <option value='4'>4 cycles</option>
                                            </select>   <br /><br />
                                            <input type="checkbox"   name="post_remissioniv" value="< 7+3 [เช่น 5+2, 7+1]" /> < 7+3 [เช่น 5+2, 7+1]  &nbsp;&nbsp;
                                            <select name="post_remissioniv_iv" id="post_remissioniv_iv" style="width:150px;">
                                                <option value="" selected>กรุณาเลือก cycles</option>
                                                <option value='1'>1 cycles</option>
                                                <option value='2'>2  cycles</option>
                                                <option value='3'>3  cycles</option>
                                                <option value='4'>4 cycles</option>
                                            </select>  <br /><br />
                                            <input type="checkbox"   name="post_remissionvv" value="HIDAC" /> HIDAC  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <select name="post_remissionvv_vv" id="post_remissionvv_vv" style="width:150px;">
                                                <option value="" selected>กรุณาเลือก cycles</option>
                                                <option value='1'>1 cycles</option>
                                                <option value='2'>2 cycles</option>
                                                <option value='3'>3  cycles</option>
                                                <option value='4'>4 cycles</option>
                                            </select> 

                                        </td>
                                    </tr>
                                </table>

                                <script language="javascript">
                                    function show_post(id) {
                                        if (id == "Yes") { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2 
                                            document.getElementById("post1").style.display = "";
                                            document.getElementById("post2").style.display = "none";
                                        } else if (id == "No") { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
                                            document.getElementById("post1").style.display = "none";
                                            document.getElementById("post2").style.display = "";
                                        }
                                    }
                                </script> 
                                Stem cell transplantion<br /><br />
                                <input type="radio" name="post_yn" id="post_yn"  value="Yes">Yes  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="post_yn" id="post_yn"  value="No">No  <br />

                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" align="center"><font size="+1" color="#0000FF">Acute leukemia registry form-follow up data for non-APL AML (3nd entry)</font></th>
                        </tr>
                        <tr>
                            <th align="left" width="19%">1 - year follow up</th>
                            <td width="23%">
                                <br />
                                <input type="radio"   name="yeari"  value="Still in remission" /> Still in remission  <br /><br />
                                <input type="radio"   name="yeari" value="Relapsed date" /> Relapsed date: DD/MM/YYYY(พ.ศ.)   
                                วันที่ <input  type="text" name="d_relapsed" value="" size="3" maxlength="2" /> เดือน <input  type="text" name="m_relapsed" value="" maxlength="2" size="3" /> ปี <input  type="text" maxlength="4" name="y_relapsed" value="" size="3" />
                                <br /><br />
                                <input type="radio"   name="yeari" value="Dead date" />  Dead date: DD/MM/YYYY(พ.ศ.)    &nbsp;&nbsp;&nbsp;&nbsp;
                                วันที่ <input  type="text" name="d_dead" value="" size="3" maxlength="2" /> เดือน <input  type="text" name="m_dead" value="" maxlength="2" size="3" /> ปี <input  type="text" maxlength="4" name="y_dead" value="" size="3" />
                                <br /><br />
                                <input type="radio"   name="yeari" value="Alive  but loss to follow up" />  Alive  but loss to follow up  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                วันที่ <input  type="text" name="d_dead" value="" size="3" maxlength="2" /> เดือน <input  type="text" name="m_dead" value="" maxlength="2" size="3" /> ปี <input  type="text" maxlength="4" name="y_dead" value="" size="3" /><br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">2 - year follow up</th>
                            <td width="23%"><br />
                                <input type="radio"   name="yearii"  value="Still in remission" /> Still in remission  <br /><br />
                                <input type="radio"   name="yearii" value="Relapsed date" /> Relapsed date: DD/MM/YYYY(พ.ศ.)   
                                วันที่ <input  type="text" name="d_relapsed2" value="" size="3" maxlength="2" /> เดือน <input  type="text" name="m_relapsed2" value="" maxlength="2" size="3" /> ปี <input  type="text" maxlength="4" name="y_relapsed2" value="" size="3" /> <br /><br />
                                <input type="radio"   name="yearii" value="Dead date" />  Dead: date: DD/MM/YYYY(พ.ศ.)   &nbsp;&nbsp;&nbsp;
                                วันที่ <input  type="text" name="d_dead2" value="" size="3" maxlength="2" /> เดือน <input  type="text" name="m_dead2" value="" maxlength="2" size="3" /> ปี <input  type="text" maxlength="4" name="y_dead2" value="" size="3" />
                                <br /><br />
                                <input type="radio"   name="yearii" value="Alive  but loss to follow up" />  Alive  but loss to follow up: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     วันที่ <input  type="text" name="d_last" value="" size="3" maxlength="2" /> เดือน <input  type="text" name="m_last" value="" maxlength="2" size="3" /> ปี <input  type="text" maxlength="4" name="y_last" value="" size="3" />
                                <br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" align="center"> <font color="#0000FF" size="+1">Acute  leukemia  registry form- Follow up  data for APL (2nd entry)</font></th>

                        </tr>
                        <tr>
                            <th align="left" width="19%">Initial induction</th>
                            <td width="23%"><br />
                                <input type="radio" name="initial_induction" id="initial_induction"  value="ATRA + Chemotherapy"  onclick="document.getElementById('initial_induction_i').disabled = true">ATRA + Chemotherapy<br /><br />
                                <input type="radio" name="initial_induction" id="initial_induction"  value="ATO"  onclick="document.getElementById('initial_induction_i').disabled = true">ATO  <br /><br />
                                <input type="radio" name="initial_induction" id="initial_induction"  value="ATO + Chemotherapy"  onclick="document.getElementById('initial_induction_i').disabled = true">ATO + Chemotherapy <br /><br />
                                <input type="radio" name="initial_induction" id="initial_induction"  value="Other"  onclick="document.getElementById('initial_induction_i').disabled = false">Other  <input id="initial_induction_i" name="initial_induction_i" type="text"  size="20"   />
                                <br /><br />   
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Anthracycline</th>
                            <td width="23%"><br />
                                <input name="anthracycline_y" type="radio" value="Yes" onclick="show_anthracycline(this.value);">Yes  &nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="anthracycline_y" type="radio" value="No" onclick="show_anthracycline(this.value);">No
                                </p>
                                <table width="300" border="0" cellpadding="0" cellspacing="0" id="anthracycline_1" style="display:none">
                                    <tr>
                                        <td>
                                            <input type="radio"   name="anthracycline_i" value="Doxorubicin"/> Doxorubicin  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
                                            <input type="radio"   name="anthracycline_i" value="Idarubicin" /> Idarubicin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
                                        </td>
                                    </tr>
                                </table>

                                <script language="javascript">
                                    function show_anthracycline(id) {
                                        if (id == "Yes") { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2 
                                            document.getElementById("anthracycline_1").style.display = "";
                                            document.getElementById("anthracycline_2").style.display = "none";
                                        } else if (id == "No") { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
                                            document.getElementById("anthracycline_1").style.display = "none";
                                            document.getElementById("anthracycline_2").style.display = "";
                                        }
                                    }
                                </script>                            
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">differentiating  syndrome</th>
                            <td width="23%"><br />
                                <input type="radio"   name="differentiatine"  value="Yes" /> Yes<br /><br />
                                <input type="radio"   name="differentiatine" value="No" />  No<br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Response to Induction</th>
                            <td width="23%"><br />
                                <input type="radio"   name="response_i"  value="Complete remisson" /> Complete remisson<br /><br />
                                <input type="radio"   name="response_i"  value="Not in CR" /> Not in CR<br /><br />
                                <input type="radio"   name="response_i" value="Cannot evaluate" /> Cannot evaluate <br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Second induction [in case of 1st induction resulted in <= PR]</th>
                            <td width="23%"><br />    
                                <input type="radio" name="second_induction" id="second_induction"  value="ATO"  onclick="document.getElementById('second_induction_i').disabled = true">ATO<br /><br />
                                <input type="radio" name="second_induction" id="second_induction"  value="High dose Ara-C(HIDAC)"  onclick="document.getElementById('second_induction_i').disabled = true">High dose Ara-C(HIDAC)<br /><br />
                                <input type="radio" name="second_induction" id="second_induction"  value="Other"  onclick="document.getElementById('second_induction_i').disabled = false">Other  <input id="second_induction_i" name="second_induction_i" type="text"  size="20"   /><br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Response to 2nd Induction</th>
                            <td width="23%">
                                <input type="radio"   name="response_ii"  value="Complete remission" /> Complete remission<br /><br />
                                <input type="radio"   name="response_ii"   value="Not in CR" /> Not in CR <br /><br />
                                <input type="radio"   name="response_ii"  value="Cannot evaluation" /> Cannot evaluation 
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Consolidation(เลือกได้มากกว่า 1 ข้อ)</th>
                            <td width="23%">
                                <br />

                                <input name="consolidation" type="radio" value="Yes" onclick="show_table(this.value);">Yes

                                <input name="consolidation" type="radio" value="No" onclick="show_table(this.value);">No
                                </p>
                                <table width="300" border="0" cellpadding="0" cellspacing="0" id="table_1" style="display:none">
                                    <tr>
                                        <td>
                                            <input type="checkbox"   name="consolidation_i"  value="ATRA" /> ATRA  &nbsp;&nbsp;&nbsp;&nbsp;                		
                                        </td>
                                        <td>					<select name="consolidation_ii" id="consolidation_ii" style="width:150px;">
                                                <option value="" selected>กรุณาเลือก cycles</option>
                                                <option value='1'>1 cycles</option>
                                                <option value='2'>2  cycles</option>
                                                <option value='3'>3  cycles</option>
                                                <option value='4'>4 cycles</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>    <input type="checkbox"  name="consolidation_iv"  value="As2O3"  /> As2O3   &nbsp;&nbsp;&nbsp;</td>
                                        <td>	<select name="consolidation_vv" id="consolidation_vv" style="width:150px;">
                                                <option value="" selected>กรุณาเลือก cycles</option>
                                                <option value='1'>1 cycles</option>
                                                <option value='2'>2  cycles</option>
                                                <option value='3'>3  cycles</option>
                                                <option value='4'>4 cycles</option>
                                            </select></td>
                                    </tr>
                                </table>
                                <table width="300" border="0" cellpadding="0" cellspacing="0" >

                                </table>
                                <script language="javascript">
                                    function show_table(id) {
                                        if (id == "Yes") { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2 
                                            document.getElementById("table_1").style.display = "";
                                            document.getElementById("table_2").style.display = "none";
                                        } else if (id == "No") { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
                                            document.getElementById("table_1").style.display = "none";
                                            document.getElementById("table_2").style.display = "";
                                        }
                                    }
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Response  to  consolidation:  PML/RARA  result</th>
                            <td width="23%">
                                <br />
                                <input type="radio"   name="response_co"  value="Positive" />Positive &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio"   name="response_co"   value="Negative" /> Negative &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio"   name="response_co"   value="Not done" /> Not done <br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">Maintenance</th>
                            <td width="23%">
                                <br />
                                <input type="radio"   name="maintenance"  value="Yes" /> Yes<br /><br />
                                <input type="radio"   name="maintenance"   value="No" /> No <br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" align="center"><font size="+1" color="#0000FF">Acute  leukemia registry form-follow up data  for  APL (3rd entry)</font></th>
                        </tr>
                        <tr>
                            <th align="left" width="19%">1 - year follow up</th>
                            <td width="23%">
                                <br />
                                <input type="radio"   name="year_followi"  value="Still in remission" />  Still in remission  <br /><br />
                                <input type="radio"   name="year_followi"   value="Relapsed date" /> Relapsed date: DD/MM/YYYY(พ.ศ.)  &nbsp;&nbsp;&nbsp;&nbsp;
                                วัน	<input name="d_year_follow1" id="d_year_follow1" value=""  size="3" maxlength="2"/>&nbsp;&nbsp;
                                เดือน   <input name="m_year_follow1"  id="m_year_follow1" value="" size="3"  maxlength="2" />&nbsp;&nbsp;
                                ปี     <input  name="y_year_follow1" id="y_year_follow1" value="" size="4"  maxlength="4" />
                                <br /><br />
                                <input type="radio"   name="year_followi"   value="Dead: date" />  Dead date: DD/MM/YYYY(พ.ศ.)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                วัน	<input name="d_year_dead" id="d_year_dead" value=""  size="3" maxlength="2"/>&nbsp;&nbsp;
                                เดือน   <input name="m_year_dead"  id="m_year_dead" value="" size="3"  maxlength="2" />&nbsp;&nbsp;
                                ปี     <input  name="y_year_dead" id="y_year_dead" value="" size="4"  maxlength="4" />  
                                <br /><br />
                                <input type="radio"   name="year_followi"   value="Alive but loss to follow up" /> Alive but loss to follow up : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                วัน    <input name="d_year_alive1" id="d_year_alive1" value=""  size="3" maxlength="2"/>&nbsp;&nbsp;
                                เดือน   <input name="m_year_alive1"  id="m_year_alive1" value="" size="3"  maxlength="2" />&nbsp;&nbsp;
                                ปี     <input  name="y_year_alive1" id="y_year_alive1" value="" size="4"  maxlength="4" />
                                <br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th align="left" width="19%">2 - year follow up</th>
                            <td width="23%">
                                <br /><br />
                                <input type="radio"   name="year_follow_up"  value="Still in remission" />  Still in remission  <br /><br />
                                <input type="radio"   name="year_follow_up"   value="Relapsed date" /> Relapsed date: DD/MM/YYYY(พ.ศ.) &nbsp;&nbsp;&nbsp;&nbsp;
                                วัน	<input name="d_year_follow_ii" id="d_year_follow_ii" value=""  size="3" maxlength="2"/>&nbsp;&nbsp;
                                เดือน   <input name="m_year_follow_ii"  id="m_year_follow_ii" value="" size="3"  maxlength="2" />&nbsp;&nbsp;
                                ปี     <input  name="y_year_follow_ii" id="y_year_follow_ii" value="" size="4"  maxlength="4" />        
                                <br /><br />
                                <input type="radio"   name="year_follow_up"   value="Dead date" />  Dead date: DD/MM/YYYY(พ.ศ.)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                วัน	<input name="d_year_dead_ii" id="d_year_dead_ii" value=""  size="3" maxlength="2"/>&nbsp;&nbsp;
                                เดือน <input name="m_year_dead_ii"  id="m_year_dead_ii" value="" size="3"  maxlength="2" />&nbsp;&nbsp;
                                ปี     <input  name="y_year_dead_ii" id="y_year_dead_ii" value="" size="4"  maxlength="4" />
                                <br /><br />
                                <input type="radio"   name="year_follow_up"   value="Alive but loss to follow up" />   Alive but loss to follow up: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                วัน	<input name="d_follow_last" id="d_follow_last" value=""  size="3" maxlength="2"/>&nbsp;&nbsp;
                                เดือน <input name="m_follow_last"  id="m_follow_last" value="" size="3"  maxlength="2" />&nbsp;&nbsp;
                                ปี     <input  name="y_follow_last" id="y_follow_last" value="" size="4"  maxlength="4" />       
                                <br /><br />
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit"  /></td>
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

