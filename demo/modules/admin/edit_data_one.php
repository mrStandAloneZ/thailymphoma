<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>

<? include "modules/index/header.php" ; ?>
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
//$login_true=$_SESSION['login_true'];
$result = mysql_query("select * from ".TB_ADD_DATA." where id='$id' order by id DESC") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;    			
?>
<?    //   code ปฏิทินภาษาไทย  แปลง คศ เป็น พศ เป็นการเรียกไฟล์มาใช้งาน                		?>
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
								$('#date_assessment').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_start').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_transplantation').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								
								$('#mybirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								$('#date_of_diagnosis').calendarsPicker({calendar: $.calendars.instance('thai','th')});
								
							});
				</script>
<!-- main content -->
			<div id="center">
				<h1>แก้ไขข้อมูล  Lymphoma Registry </h1>
				<p>
			   <center>
                   <form name ="checkForm" action="?name=member&file=edit_data_add_one" method="post" onSubmit="return check();"  enctype="multipart/form-data">
          	   <center><table width="100%" border="0" align="center">
                 <tr>
                    <th align="left" width="33%"><br /><strong>Centre : </strong><br /></th>
                       <th align="left" width="22%"><br /><strong><input name="centre"  value="<? echo "$dbarr[centre]"; ?>"  size="10"  readonly="readonly"/> </strong><br /></th>
                       <input type="hidden" name="codehos"  value="<? echo "$dbarr[codehos]"; ?>"  size="10"  readonly="readonly"/> 
                    <th align="left" width="17%"><br /><strong>Subject : </strong><br /></th>
                    
				
                    <td width="28%"><br /><strong><input type="text" name="subject"  size="5" value="<? echo "$dbarr[subject]" ; ?>" readonly /></strong><br /></td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Patient Initials :</th>
                    <td colspan="3"><br /> <input type="text" name="patient_initials" size="20"  value="<? echo "$dbarr[patient_initials]"; ?>" maxlength="2"/><br /><br />     </td>
                  </tr>
                  <tr>
                    <th align="left" width="33%">Date of record: </th>
                    <td colspan="3"> <br /><input type="text" name="date_of_record" id="date_of_record"size="20"  value="<? echo "$dbarr[date_of_record]"; ?>"/><br /><br />    </td>
                  </tr>
                  <tr>
                  <th colspan="4">Participant Demographic data:</th>
                  </tr>
                   <tr>
                    <th align="left" width="33%">Gender:</th>
                    <td colspan="3"> <br />
                    <input type="radio"   name="sex"  value="Mele" <? if($dbarr[sex]== 'Mele') echo"checked"; ?> >  Mele  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio"   name="sex"  value="Female" <? if($dbarr[sex]== 'Female') echo"checked"; ?> >  Female<br /><br />
                    </td>
                  </tr>
                  <tr>
                    <th align="left">ID :</th>
                    <td colspan="3" > <br />
                    <input type="radio" name="id_card1" id="id_card2"  value="Done"  onclick="document.getElementById('id_card1').disabled=false"> <input type="password" size="20"  name="id_card" id="id_card1" maxlength="13" value="<? echo "$dbarr[id_card]"; ?>"  >   &nbsp;&nbsp;&nbsp;
                   
                    or &nbsp;&nbsp;&nbsp; <input type="radio"   name="id_card1"  id="id_card1" value="Unknown" onclick="document.getElementById('id_card1').disabled=true" >   Unknown  <br /><br />
                    </td>
                  </tr>
                  <tr>
                    <th align="left">Confirm ID::</th>
                    <td colspan="3" > <br />
                    <input type="password" size="20"  name="id_card_confirm" value="<? echo "$dbarr[id_card_confirm]"; ?>"  maxlength="13"  ><br /><br /></td>
                  </tr>
                     <tr>
                    <th align="left">HN :</th>
                    <td colspan="3" > <br />
                    <input type="text" size="20"  name="hn" maxlength="20"  value="<? echo "$dbarr[hn]"; ?>" ><br /><br /></td>
                  </tr>
                    <tr>
                    <th align="left">Confirm HN :</th>
                    <td colspan="3" > <br />
                    <input type="text" size="20"  name="hn_confirm" maxlength="20"  value="<? echo "$dbarr[hn_confirm]"; ?>" ><br /><br /></td>
                  </tr>
                  <tr>
                    <th align="left">Date of Birth:</th>
                    <td colspan="3" > <br />
                    <input type="text" id="mybirth" size="8"  name="date_of_birth" value="<? echo "$dbarr[date_of_birth]"; ?>" maxlength="10"  >
                     (dd/mm/2500)<br /><br />
                  </tr>
                   <tr>
                    <th align="left">Current address  :(in the last 6 months)</th>
                    <td colspan="3" > <br />
                      <select name="province" id="province" style="width:150px;>
                    	<option  value="">กรุณาเลือกจังหวัด</option>
                    <option name="province" value="<? echo "$dbarr[province]"; ?>"><? echo "$dbarr[province]"; ?></option>
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
                    <option value="บึงกาฬ">บึงกาฬ </option>
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
                  </select>  เลือก drop down  และสามารถกดอักษรตัวแรกของจังหวัดเพื่อความรวมเร็ว <br />และอย่าลืมเปลี่ยนเป็นภาษาไทยด้วยครับ&nbsp;&nbsp;เพื่อเพิ่มความรวดเร็วในการค้นหา<br /><br /></td>
                  </tr>
                  <tr>
                    <th align="left">Mode of payment::</th>
                    <td colspan="3" ><br />
                     <input type="radio"  name="payment"   value="Government"  <? if($dbarr[payment]== 'Government') echo"checked"; ?>>  1. Government  <br /><br />
                    <input type="radio"  name="payment"   value="Social security" <? if($dbarr[payment]== 'Social security') echo"checked"; ?> >  2. Social security<br /><br />
                    <input type="radio"  name="payment"   value="Private insurance"  <? if($dbarr[payment]== 'Private insurance') echo"checked"; ?>> 3. Private insurance<br /><br />
                    <input type="radio"  name="payment"   value="UC (30 baht)" <? if($dbarr[payment]== 'UC (30 baht)') echo"checked"; ?> >  4.  UC (30 baht)<br /><br />
                    <input type="radio"  name="payment"   value="Out of pocket" <? if($dbarr[payment]== 'Out of pocket') echo"checked"; ?> >  5. Out of pocket<br /><br />
                    <input type="radio"  name="payment"   value="Other: specify" <? if($dbarr[payment]== 'Other: specify') echo"checked"; ?> onclick="show_payment(this.value);"   >  6. Other <br /><br />
                    
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
                   <input type="text" name="date_bio_report" id="date_bio_report"  value="<? echo "$dbarr[date_bio_report]"; ?>"  size="10"/><br /><br /></td>
                  </tr>
                  <tr>
                    <th align="left">Pathology No.:</th>
                    <td colspan="3" > <br />
                    <input type="text" size="10"  name="pathology"  value="<? echo "$dbarr[pathology]"; ?>"  >  (Example: SP47-0007/47 = SP47000747)<br /><br /></td>
                  </tr>
                  <tr>
                    <th align="left">Confirm Pathology No.:</th>
                    <td colspan="3" > <br />
                     <input type="text" size="10"  name="pathology_confirm"  value="<? echo "$dbarr[pathology_confirm]"; ?>"  >  (Example: SP47-0007/47 = SP47000747)><br /><br /></td>
                  </tr>
                  <tr>
                    <th align="left">Biopsy site  :</th>
                    <td colspan="3" > <br />
                    <input type="text" size="8"  name="biopsy_site" maxlength="10"  value="<? echo "$dbarr[biopsy_site]"; ?>" ><br /><br /></td>
                  </tr>
                   <tr>
                    <th align="left">Type:</th>
                    <td colspan="3" > <br />
                      <input type="radio" name="type"  value="Done"  id="type1"<? if($dbarr[type]== 'Done') echo"checked"; ?> onclick="show_Hodgkin(this.value);"  > Hodgkin lymphoma (HL)	<br />
                       <table width="300" border="0" cellpadding="0" cellspacing="0" id="Hodgkin1" style="display:none">
				<tr>
				<td>
                   <select name="hodgkin_don" id="hodgkin_don" style="width:300px;>
                    	<option  value=""><? echo "$dbarr[hodgkin_don]"; ?></option>
                        
                    <option  value="<? echo "$dbarr[hodgkin_don]"; ?>" ><? echo "$dbarr[hodgkin_don]"; ?></option>
                    <option value="">Please select..</option>
                    <option value="01: Classical HL, Nodular sclerosis">01: Classical HL, Nodular sclerosis</option>
                    <option value="02: Classical HL, Mixed cellularity">02: Classical HL, Mixed cellularity </option>
                    <option value="03: Classical HL, Lymphocyte-rich">03: Classical HL, Lymphocyte-rich </option>
                    <option value="04: Classical HL, Lymphocyte-depleted">04: Classical HL, Lymphocyte-depleted </option>
                    <option value="05: HL, Nodular lymphocyte predominant">05: HL, Nodular lymphocyte predominant</option>
                    <option value="06: HL, unclassifiable">06: HL, unclassifiable</option>
                  </select> 
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_Hodgkin(id) {
						if(id == "Done") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("Hodgkin1").style.display = "";
						document.getElementById("Hodgkin2").style.display = "none";
						} else if(id != "Done") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("Hodgkin1").style.display = "none";
						document.getElementById("Hodgkin2").style.display = "";
						}
						}
				</script> <br />
					<input type="radio"   name="type" value="Unknown"  onclick="show_type(this.value);"  <? if($dbarr[type]== 'Unknown') echo"checked"; ?> >   Non-Hodgkin lymphoma (NHL) <br /><br />
                    
                             <table width="500" border="0" cellpadding="0" cellspacing="0" id="type1" style="display:none">
				<tr>
				<td>
                  &nbsp;&nbsp;   <input type="radio" name="type_sub_non"   value="WHO classification"  <? if($dbarr[type_sub_non]== 'WHO classification') echo"checked"; ?> >  WHO classification  <br /><br />
                    &nbsp;&nbsp;   <input type="radio" name="type_sub_non"   value="Working formulation"  <? if($dbarr[type_sub_non]== 'Working formulation') echo"checked"; ?> >  Working formulation  <br /><br />
                    &nbsp;&nbsp;   <input type="radio" name="type_sub_non"   value="99 Other type" <? if($dbarr[type_sub_non]== '99 Other type') echo"checked"; ?> >  99 Other type  <br /><br />
                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_type(id) {
						if(id == "Unknown") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("type1").style.display = "";
						document.getElementById("type2").style.display = "none";
						} else if(id != "Unknown") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("type1").style.display = "none";
						document.getElementById("type2").style.display = "";
						}
						}
				</script> 
                 
                   </td>
                  </tr>
                   <tr>
                    <th align="left">Ann Arbor stage :</th>
                    <td colspan="3" > <br />
                    <input type="radio" name="ann_arbor"   value="IA"  <? if($dbarr[ann_arbor]== 'IA') echo"checked"; ?> >   IA  <br /><br />
                    <input type="radio" name="ann_arbor"   value="IB" <? if($dbarr[ann_arbor]== 'IB') echo"checked"; ?> >   IB <br /><br />
                    <input type="radio" name="ann_arbor"   value="IIA" <? if($dbarr[ann_arbor]== 'IIA') echo"checked"; ?> >   IIA <br /><br />
                    <input type="radio" name="ann_arbor"   value="IIB" <? if($dbarr[ann_arbor]== 'IIB') echo"checked"; ?> >   IIB<br /><br />
                    <input type="radio" name="ann_arbor"   value="IIIA"<? if($dbarr[ann_arbor]== 'IIIA') echo"checked"; ?>  >   IIIA<br /><br />
                    <input type="radio" name="ann_arbor"   value="IIIB" <? if($dbarr[ann_arbor]== 'IIIB') echo"checked"; ?> >  IIIB<br /><br />
                    <input type="radio" name="ann_arbor"   value="IVA" <? if($dbarr[ann_arbor]== 'IVA') echo"checked"; ?> >   IVA<br /><br />
                    <input type="radio" name="ann_arbor"   value="IVB" <? if($dbarr[ann_arbor]== 'IVB') echo"checked"; ?> >   IVB<br /><br />
                    </td>
                  </tr>
					<tr>
                    <th align="left">Extranodal sites :  (mark all that apply:</th>
                    <td colspan="3" > <br />
                    
                    <input type="checkbox" name="ext_none"   value="none"   <? if($dbarr[ext_none]== 'none') echo"checked"; ?> >  none <br /><br />
                    <input type="checkbox" name="ext_wal"   value="Waldeyer's ring" <? if($dbarr[ext_wal]== "Waldeyer's ring") echo"checked"; ?> >   Waldeyer's ring  <br /><br />
                    <input type="checkbox" name="ext_sin"   value="Sinonasal" <? if($dbarr[ext_sin]== 'Sinonasal') echo"checked"; ?> >   Sinonasal<br /><br />
                    <input type="checkbox" name="ext_sal"   value="Salivary gland" <? if($dbarr[ext_sal]== 'Salivary gland') echo"checked"; ?> >   Salivary gland	<br /><br />
                    <input type="checkbox" name="ext_thy"   value="Thyroid" <? if($dbarr[ext_thy]== 'Thyroid') echo"checked"; ?> > Thyroid<br /><br />
                    <input type="checkbox" name="ext_eye"   value="Eye/Ocular adnexa" <? if($dbarr[ext_eye]== 'Eye/Ocular adnexa') echo"checked"; ?> >  Eye/Ocular adnexa<br /><br />
                    <input type="checkbox" name="ext_breast"   value="Breast" <? if($dbarr[ext_breast]== 'Breast') echo"checked"; ?> >   Breast<br /><br />
                    <input type="checkbox" name="ext_stomach"   value="Stomach" <? if($dbarr[ext_stomach]== 'Stomach') echo"checked"; ?> >  Stomach<br /><br />
                    <input type="checkbox" name="ext_small"   value="Small intestine"  <? if($dbarr[ext_small]== 'Small intestine') echo"checked"; ?> > Small intestine<br /><br />
                    <input type="checkbox" name="ext_testis"   value="Testis" <? if($dbarr[ext_testis]== 'Testis') echo"checked"; ?> >  Testis<br /><br />
                    <input type="checkbox" name="ext_brain"   value="Brain/CNS"<? if($dbarr[ext_brain]== 'Brain/CNS') echo"checked"; ?> >   Brain/CNS<br /><br />
                    <input type="checkbox" name="ext_liver"   value="Liver" <? if($dbarr[ext_liver]== 'Liver') echo"checked"; ?> >  Liver<br /><br />
                    <input type="checkbox" name="ext_large"   value="Large intestine"<? if($dbarr[ext_large]== 'Large intestine') echo"checked"; ?> >  Large intestine<br /><br />
                    <input type="checkbox" name="ext_bone"   value="Bone marrow" <? if($dbarr[ext_bone]== 'Bone marrow') echo"checked"; ?> >  Bone marrow<br /><br />
                    <input type="checkbox" name="ext_spleen"   value="Spleen"<? if($dbarr[ext_spleen]== 'Spleen') echo"checked"; ?> >   Spleen<br /><br />
                    <input type="checkbox" name="ext_skin"   value="Skin/Subcutaneous" <? if($dbarr[ext_skin]== 'Skin/Subcutaneous') echo"checked"; ?> >  Skin/Subcutaneous<br /><br />
                    <input type="checkbox" name="ext_other"   value="Others" onclick="show_ext(this.value);"  <? if($dbarr[ext_other]== 'Others') echo"checked"; ?> > Others<br /><br />
                     <table width="500" border="0" cellpadding="0" cellspacing="0" id="ext1" style="display:none">
				<tr>
				<td>
                <input type="text" name="ext_other_text"   value="<? echo "$dbarr[ext_other_text]"; ?>"  size="50" >  

                 </td>
				</tr>
				</table>
					<script language="javascript">
						function show_ext(id) {
						if(id == "Others") { // ??????? radio button 1 ?????? table 1 ??? ??? table 2 
						document.getElementById("ext1").style.display = "";
						document.getElementById("ext2").style.display = "none";
						} else if(id != "Others") { // ??????? radio button 2 ?????? table 2 ??? ??? table 1 
						document.getElementById("ext1").style.display = "none";
						document.getElementById("ext2").style.display = "";
						}
						}
				</script> 
                    </td>
                  </tr>



                  <tr>
                    <th align="left">Performance status (ECOG):</th>
                    <td colspan="3" > <br />
                    <input type="radio"   name="per_ecog"  value="0"  <? if($dbarr[per_ecog]== '0') echo"checked"; ?> > 0<br /><br />
                    <input type="radio"   name="per_ecog"  value="1"  <? if($dbarr[per_ecog]== '1') echo"checked"; ?> >  1<br /><br /> 
                    <input type="radio"   name="per_ecog"  value="2"  <? if($dbarr[per_ecog]== '2') echo"checked"; ?> > 2<br /><br />
                    <input type="radio"   name="per_ecog"  value="3"   <? if($dbarr[per_ecog]== '3') echo"checked"; ?>> 3<br /><br />
                    <input type="radio"   name="per_ecog"  value="4" <? if($dbarr[per_ecog]== '4') echo"checked"; ?>  > 4 <br /><br />
                    </td>
                  </tr>
                  
                  
             		<tr>
                    <th align="left">LDH :</th>
                    <td colspan="3" > <br />
                   <input type="radio"   name="ldh"  value="Normal"   <? if($dbarr[ldh]== 'Normal') echo"checked"; ?>  >  Normal  &nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="radio"   name="ldh"  value="High"  <? if($dbarr[ldh]== 'High') echo"checked"; ?>  >  High
                   <br /><br />
                  </tr>
                 
                  <tr>
                    <th align="left">HIV positive: :</th>
                    <td colspan="3"><br />
                		 <input type="radio"   name="hiv_positive"  value="Yes"  <? if($dbarr[hiv_positive]== 'Yes') echo"checked"; ?> >  Yes  	<br /><br />
                         <input type="radio"   name="hiv_positive"  value="No" <? if($dbarr[hiv_positive]== 'No') echo"checked"; ?> >  No		<br /><br /> 
                         <input type="radio"   name="hiv_positive"  value="Not done" <? if($dbarr[hiv_positive]== 'Not done') echo"checked"; ?>  >  Not done		<br /><br />
                    
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="33%">IPI :</th>
                    <td colspan="3">
                    </td>
               
                  </tr>
                 
               
                
                  <tr>
                  <th colspan="4" align="center">    
                  <br /><br />
                             <input name="id" type="hidden" id="id" value="<?php echo "$dbarr[id]" ; ?>">
                <input type="submit" name="Submit" value="Update Data" size="20">
                        </td>
                  </tr>  
              </table></center>
                        
                       
                 
                
           
 
    
       </form>
			
              </center>
                </p>
                </div>
			
			<!-- sidebar -->
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
		<? include "modules/index/footer.php"; ?>