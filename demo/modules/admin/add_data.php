<!-- main content -->
<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<? date_default_timezone_set("Asia/Bangkok"); ?>

	   <?php include"includes/add_data.php"; ?>
               <?  
					$max = mysql_query("select max(code_id) from  web_add_data");
					echo $total_max= mysql_result($max,0);
				 mysql_close();  
					?>

<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
//$login_true=$_SESSION['login_true'];
$result = mysql_query("select * from ".TB_ADD_DATA." where id='$id' order by id DESC") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;    			
?>
 <?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$codehos= $dbarr["codehos"];
?>
<!-- main content -->
<center>
    <p>

	<center>
				<h1>Acute  leukemia registry  form</h1></center>
				<p>
            <form id="form1" name="form1" method="post" action="?name=member&file=show_add_data">
			   <center><table width="100%" border="0" align="center">       
                 <tr>
                    <th align="left" width="19%"><strong>Code : </strong></th>
                       <?   
                		//  เพิ่มค่าบวกหนึ่งของหมายเลข job 
						$sql = "select * from ".TB_ADD_DATA." order by id" ;    					
						$result = mysql_query($sql) ;
						$num_result  = mysql_num_rows($result) ;
						$dbarr = mysql_fetch_row($result) ;
						$code_id = $dbarr[0]+1 ; // นำค่า id มาเพิ่มให้กับค่า   + 1
						$job_in = "$num_result" +1;
					$code_id = "$codehos$job_in" ; // หมายเลขใบงาน ของงานซ่อม หรือ หมายเลข job นั้นเอง      
					
				?>
                    <td width="23%"><strong><input type="text" name="code_id"  size="5"id="textfield" value="<? echo $code_id;?><? $dbarr[code_id];?>" readonly="readonly" /></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">อักษรตัวแรกของชื่อและนามสกุล(ภาษาอังกฤษ) :<? echo $job_in;?></th>
                    <td width="23%"> <input type="text" name="fl" size="2"  maxlength="2"/></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">เพศ:</th>
                    <td width="23%"><input  type="radio" name="sex" value="ชาย" />&nbsp;ชาย  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" name="sex" value="หญิง" />&nbsp;&nbsp;หญิง  </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Date of birth: DD/MM/YYYY</th>
                    <td width="23%">  <select name="d_birth" id="d_birth" style="width:100px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_birth" id="m_birth" style="width:100px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_birth"  id="y_birth" style="width:100px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT></td>
                  </tr>
                  <? $date_birth = $d_birth + $m_birth + $y_birth;?>
                  <tr>
                    <th align="left" width="19%"><strong>ภูมิลำเนา : </strong></th>
                    <td width="23%">  <select name="province" id="province" style="width:150px;>
                    <option  value="" selected>กรุณาเลือกจังหวัด</OPTION>
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
                    <input type="radio" name="treatment" value="เบิกราชการ"> เบิกราชการ &nbsp;&nbsp;&nbsp;
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
                    <option value='ราชการ'>ราชการ</option>
                    <option value='รัฐวิสาหกิจ'>รัฐวิสาหกิจ </option>
                    <option value='ค้าขาย'>ค้าขาย </option>
                    <option value='แม่บ้าน'>แม่บ้าน</option>
                    <option value='อิสระ'>อิสระ </option>
                    <option value='พนักงานเอกชน'>พนักงานเอกชน</option>
                    <option value='ลูกจ้างทั่วไป'>ลูกจ้างทั่วไป</option>
                  </select> 
                    </td>
                  </tr>
                  <tr>
                    <th colspan="2" align="center"><font size="+1" color="#0000FF"><b>Leukemia  diagnosis </b></font></th>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>Date of 1 st diagnostic: DD/MM/YYYY(พ.ศ.) </strong>: </th>
                    <td width="23%"><select name="d_diagnostic" id="d_diagnostic" style="width:100px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_diagnostic" id="m_diagnostic" style="width:100px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_diagnostic"  id="y_diagnostic" style="width:100px;">
              <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Diagnosis: </th>
                    <td width="23%">
                    <input type="radio" name="diagnosis" value="AML"> AML  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="diagnosis" value="APL"> APL   &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="diagnosis" value="Mixed-phenotypic acute leukemia">Mixed-phenotypic acute leukemia   
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">Cytogenetics: </th>
                    <td width="23%">
                   <input type="radio"  name="cytogenetics" value="Done" />Done:  <input  name="cytogenetics_i"  value="" type="text" /> <br /><br />
                    <input type="radio" name="cytogenetics" value="Not done" />&nbsp;&nbsp; Not  done
                    </td>
                  </tr> 
                   <tr>
                    <th align="left" width="19%">CBC(At diagnosis): </th>
                    <td width="23%">
                    WBC : <input name="cbc" type="text" value="" id="cbc" />  ML        <br /><br />
                   Blast :   <input name="cbci" type="text" value="" id="cbci" /> %        <br /><br />
                   Hb :   &nbsp;  <input name="cbcii" type="text" value="" id="cbcii" /> g/dL      <br />   <br />
                    Plt :  &nbsp;  <input name="cbciii" type="text" value="" id="cbciii" />  ML         
                    </td>
                  </tr>
                     <tr>
                    <th align="left" width="19%">%Blast in BM at diagnosis: </th>
                    <td width="23%">
                   	   <input  type="radio"  name="bm_don" value="done"/>done<input type="text" name="bmi" value=""  />  %            <input  type="radio"  name="bm_don"  value="not don" /> not  done   </td>
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
                    <input  name="organ_ivvv" type="checkbox" value="1" />  Others     <input name="organ_vvvv" type="text" value="" /><br /><br />
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
                       <input type="checkbox"   name="capi" value="DIC" /> DIC
                       <input type="checkbox"   name="capii" value="SVC  syndrome" /> SVC  syndrome
                    </td>
                  </tr>
                  <tr>
                  			<th colspan="2" align="center"><font size="+1" color="#0000FF"><b>Acute  leukemia  registy  form-follow up  data  for  non-APL  AML (2nd entry)</b></font></th>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Initial  Induction</th>
                    <td width="23%">
                   	  <input type="radio"   name="initial" value="7+3 regimen" /> 7+3 regimen  <br /><br />
                      <input type="radio"   name="initial" value="7+3  flat dose" /> 7+3  flat dose  <br /><br />
                       <input type="radio"   name="initial" value="< 7 + 3[เช่น 5+2  , 7+1]" /> < 7 + 3[เช่น 5+2  , 7+1]  <br /><br />
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
                    <td width="23%">
                   	   <input type="radio"   name="reponse_i" value="Complete  remission" /> Complete  remission  <br /><br />
                       <input type="radio"   name="reponse_i" value="Not  in CR" /> Not  in CR   <br /><br />
                       <input type="radio"   name="reponse_i" value="Cannot  evaluation" /> Cannot  evaluation   <br /><br />
                       <input type="radio"   name="reponse_i" value="% Blast  after  induction" />% Blast  after  induction<input  type="text" name="response_i_i" value="" />%
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Second induction(in case not in CR from first induction)</th>
                    <td width="23%">
                   	   <input type="radio"   name="second" value="Yes" />  Yes  &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio"   name="second" value="No" />  No  <br /><br />
                       <input type="radio"   name="secondi" value="7 + 3 regimen" />  7 + 3 regimen      <br /><br />
                       <input type="radio"   name="secondi" value="7 + 3 flat dose" />  7 + 3 flat dose  <br /><br />
                       <input type="radio"   name="secondi" value="< 7 + 3 [เช่น 5+2,7+1]" />  < 7 + 3 [เช่น 5+2,7+1]    <br /><br />
                       <input type="radio"   name="secondi" value="High  dose  Ara-C(HIDAC)" /> High  dose  Ara-C(HIDAC)   <br /><br />
                       <input type="radio"   name="secondi" value="FLAG +- Ida" />  FLAG +- Ida   <br /><br />
                       <input type="radio"   name="secondi" value="Other" />  Other  <input type="text"  name="secondii"  value="" /> <br />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 2nd  Induction</th>
                    <td width="23%"><br />
                   	   <input type="radio"   name="responseii" value="Complete  remission" /> Complete  remission  <br /><br />
                       <input type="radio"   name="responseii" value="Not  in CR" /> Not  in CR   <br /><br />
                       <input type="radio"   name="responseii" value="Cannot  evaluation" /> Cannot  evaluation   <br /><br />
                       <input type="radio"   name="responseii" value="% Blast after induction" />% Blast  after  induction
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Post-remission  treatment [CR after 1-2 induction cycles] or bridging(เลือกได้มากกว่า 1 ขึ้แ และกรุณาเลือกจำนวน cycle ที่ให้ )</th>
                    <td width="23%">
                    <br />
                   	   <input type="checkbox"   name="post_remission" value="7+3 regimen" /> 7+3 regimen &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                        </select>   <br /><br />
                       <div align="left">Stem cell transplantion</div> <br />
                      <input type="checkbox" name="post_remissionivv" value="Yes" /> &nbsp;Yes    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="checkbox" name="post_remissionivv" value="No" /> &nbsp;No <br /><br />
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
                       <select name="d_relapsed" id="d_relapsed" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_relapsed" id="m_relapsed" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_relapsed"  id="y_relapsed" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="yeari" value="Dead date" />  Dead date: DD/MM/YYYY(พ.ศ.)    &nbsp;&nbsp;&nbsp;
                        <select name="d_dead" id="d_dead" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_dead" id="m_dead" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_dead"  id="y_dead" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="yeari" value="Alive  but loss to follow up" />  Alive  but loss to follow up  
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">2 - year follow up</th>
                    <td width="23%">
                   	   <input type="radio"   name="yearii"  value="Still in remission" /> Still in remission  <br /><br />
                       <input type="radio"   name="yearii" value="Relapsed date" /> Relapsed date: DD/MM/YYYY(พ.ศ.)   
                              <select name="d_relapsed2" id="d_relapsed2" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_relapsed2" id="m_relapsed2" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_relapsed2"  id="y_relapsed2" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="yearii" value="Dead date" />  Dead: date: DD/MM/YYYY(พ.ศ.)   &nbsp;&nbsp;&nbsp;
                              <select name="d_dead2" id="d_dead2" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_dead2" id="m_dead2" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_dead2"  id="y_dead2" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="yearii" value="Alive  but loss to follow up" />  Alive  but loss to follow up <br /><br />
                     <input type="radio"   name="yearii" value="Date  of  last  follow up" />  Date  of  last  follow up:  DD/MM/YYYY(พ.ศ.)   <br /><br />
                     <select name="d_last" id="d_last" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_last" id="m_last" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_last"  id="y_last" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                    </td>
                  </tr>
                  <tr>
                  			<th colspan="2" align="center"> <font color="#0000FF" size="+1">Acute  leukemia  registy form- Follow up  data for APL (2nd entry)</font></th>
                         
                  </tr>
                  <tr>
                    <th align="left" width="19%">Initial induction</th>
                    <td width="23%">
                   	   <input type="radio"   name="initial_induction"  value="ATRA + Chemotherapy" />  ATRA + Chemotherapy<br /><br />
                       <input type="radio"   name="initial_induction" value="As2O3" /> As2O3<br /><br />
                       <input type="radio"   name="initial_induction" value="As2O3 + Chemotherapy" />  As2O3 + Chemotherapy   <br /><br />
                       <input type="radio"   name="initial_induction" value="" />  Other  <input type="text"  name="initial_induction_i" value="" /> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Anthracycline</th>
                    <td width="23%">
                   	   <input type="radio"   name="anthracycline"  value="Doxorubicin" /> Doxorubicin<br /><br />
                       <input type="radio"   name="anthracycline" value="Idarubicin" />  Idarubicin<br /><br />
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">differentiatine  syndrome</th>
                    <td width="23%">
                   	   <input type="radio"   name="differentiatine"  value="Yes" /> Yes<br /><br />
                       <input type="radio"   name="differentiatine" value="No" />  No<br /><br />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to Induction</th>
                    <td width="23%">
                   	   <input type="radio"   name="response_i"  value="Complete remisson" /> Complete remisson<br /><br />
                       <input type="radio"   name="response_i"  value="Not in CR" /> Not in CR<br /><br />
                       <input type="radio"   name="response_i" value="Cannot evaluate" /> Cannot evaluate <br /><br />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Second induction [in case of 1st induction resulted in <= PR]</th>
                    <td width="23%">
                   	   <input type="radio"   name="second_induction"  value="As2O3" /> As2O3<br /><br />
                       <input type="radio"   name="second_induction"   value="High dose Ara-C(HIDAC)" /> High dose Ara-C(HIDAC) <br /><br />
                       <input type="radio"   name="second_induction"  value="other" /> Other<input type="text" name="second_induction_i" value="" />
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
                   	   <input   type="radio"   name="consolidation"  value="Yes" /> Yes  &nbsp;&nbsp;&nbsp;
                       <input type="radio"   name="consolidation"   value="No" /> No <br /><br />
                       
                       <input type="checkbox"   name="consolidation_i"  value="ATRA" /> ATRA  &nbsp;&nbsp;&nbsp;&nbsp;
                       			<select name="consolidation_ii" id="consolidation_ii" style="width:150px;">
                        		<option value="" selected>กรุณาเลือก cycles</option>
		                        <option value='1'>1 cycles</option>
        		                <option value='2'>2  cycles</option>
                		        <option value='3'>3  cycles</option>
                       			<option value='4'>4 cycles</option>
                        		</select>  <br /><br />
                        <input type="checkbox"  name="consolidation_iv"  value="As2O3"  /> As2O3   &nbsp;&nbsp;&nbsp;
                     	<select name="consolidation_vv" id="consolidation_vv" style="width:150px;">
                        		<option value="" selected>กรุณาเลือก cycles</option>
		                        <option value='1'>1 cycles</option>
        		                <option value='2'>2  cycles</option>
                		        <option value='3'>3  cycles</option>
                       			<option value='4'>4 cycles</option>
                        		</select><br /><br />
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
                    <th colspan="2" align="center"><font size="+1" color="#0000FF">Acute  leukemia registry form-follow up data APL  AML(3nd entry)                    </font></th>
                  </tr>
                   <tr>
                    <th align="left" width="19%">1 - year follow up</th>
                    <td width="23%">
                    <br />
                   	   <input type="radio"   name="year_followi"  value="Still in remission" />  Still in remission  <br /><br />
   	                    <input type="radio"   name="year_followi"   value="Relapsed date" /> Relapsed date: DD/MM/YYYY(พ.ศ.) 
                          <select name="d_year_follow1" id="d_year_follow1" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_year_follow1" id="m_year_follow1" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_year_follow1"  id="y_year_follow1" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                        <br />
                       <input type="radio"   name="year_followi"   value="Dead: date" />  Dead date: DD/MM/YYYY(พ.ศ.)  &nbsp;&nbsp;&nbsp;
                         <select name="d_year_dead" id="d_year_dead" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_year_dead" id="m_year_dead" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_year_dead"  id="y_year_dead" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="year_followi"   value="Alive but loss to follow up" /> Alive but loss to follow up<br /><br />
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">2 - year follow up</th>
                    <td width="23%">
                    <br />
                   	   <input type="radio"   name="year_follow_up"  value="Still in remission" />  Still in remission  <br /><br />
   	                    <input type="radio"   name="year_follow_up"   value="Relapsed date" /> Relapsed date: DD/MM/YYYY(พ.ศ.) 
                            <select name="d_year_follow_ii" id="d_year_follow_ii" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_year_follow_ii" id="m_year_follow_ii" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_year_follow_ii"  id="y_year_follow_ii" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                        <br />
                       <input type="radio"   name="year_follow_up"   value="Dead date" />  Dead: date: DD/MM/YYYY(พ.ศ.)  &nbsp;&nbsp;&nbsp;
                       <select name="d_year_dead_ii" id="d_year_dead_ii" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_year_dead_ii" id="m_year_dead_ii" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_year_dead_ii"  id="y_year_dead_ii" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="year_follow_up"   value="Alive but loss to follow up" />   Alive but loss to follow up<br /><br />
                       <input type="radio"   name="year_follow_up"   value="date of last follow up" />  date of last follow up:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <select name="d_follow_last" id="d_follow_last" style="width:60px;">
                    <option value='' selected>วัน</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select> 
                  <select name="m_follow_last" id="m_follow_last" style="width:90px;">
                <option value="" selected>เดือน</option>
                <option value=1>มกราคม</option>
                <option value=2>กุมภาพันธ์</option>
                <option value=3>มีนาคม</option>
                <option value=4>เมษายน</option>
                <option value=5>พฤษภาคม</option>
                <option value=6>มิถุนายน</option>
                <option value=7>กรกฎาคม</option>
                <option value=8>สิงหาคม</option>
                <option value=9>กันยายน</option>
                <option value=10>ตุลาคม</option>
                <option value=11>พฤศจิกายน</option>
                <option value=12>ธันวาคม</option>
              </select>
                <SELECT name="y_follow_last"  id="y_follow_last" style="width:70px;">
                <OPTION  value="" selected>ปี</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br /><br />
                    </td>
                  </tr>
                 <tr>
                 <th></th>
                 <td><input type="submit"  /></td>
                 </tr>
                   
              </table></center>
                </p>
               </center>
			
		
</FORM>


			<BR><BR>
			<!-- change -->
   
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>

