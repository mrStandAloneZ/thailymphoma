<?
$date_today = date("d-m-Y [H:i:s]");
//ระบบสมาชิก

?>
<html>
<head>
<title>ระบบสมัครสมาชิก</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="720"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="2" valign="top"><IMG src="images/fader.gif" border=0></td>
    <td><h2><IMG src="images/topfader.gif" border=0><br>
&nbsp;&nbsp;<IMG SRC="images/menu/textmenu_member.gif" BORDER="0"><br>
    </h2></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <TR>
        <TD height="1" class="dotline"></TD>
      </TR>
      <tr>
        <td> </td>
      </tr>
      <tr>
        <td>
          <form name ="checkForm" action="?name=member&file=member_add_new" method="post" onSubmit="return check()"  enctype="multipart/form-data">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="3">
              <tr>
                <td colspan="2">
                  <p align="center"> <strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;กรุณากรอกรายละเอียดสำหรับสมัครสมาชิก&nbsp;&nbsp;</font></strong></p></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                  <p><strong><font color="#0000FF" size="1" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/admin/user.gif" ></font></strong></p></td>
                <td bgcolor="#FFFFFF"><strong><font color="#0000FF" size="1" face="MS Sans Serif, Tahoma, sans-serif">ข้อมูลส่วนตัวผู้สมัคร</font></strong></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                  <p><font size="1"><strong><font face="MS Sans Serif, Tahoma, sans-serif"> &nbsp;&nbsp;ชื่อ นามสกุล : </font></strong></font></p></td>
                <td bgcolor="#FFFFFF"><input name="name" type="text" id="name" size="30">
&nbsp; <font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"> <strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;วัน/เดือน/ปีเกิด : </font></strong></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <select name="date" id="date">
                    <option value=1 selected>1</option>
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
&nbsp;
              <select name="month" id="month">
                <option value="1" selected>มกราคม</option>
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
&nbsp;
              <SELECT name="year" size="1" class="size11" id="year">
                <OPTION  value="" selected>พ.ศ.</OPTION>
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
              </SELECT>
                </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>อายุ : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="age" type="text" id="age" size="5">
&nbsp; ปี <font color="#FF0000">&nbsp;**</font></font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>เพศ : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="sex" type="radio" value="ชาย" checked>
              ชาย &nbsp;
              <input name="sex" type="radio" value="หญิง">
              หญิง </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1">&nbsp;&nbsp;<font face="MS Sans Serif, Tahoma, sans-serif"><strong>ที่อยู่ : </strong></font></font></td>
                <td bgcolor="#FFFFFF"><input name="address" type="text" id="address" size="50" maxlength="150"></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;อำเภอ/เขต : </font></strong></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="amper" type="text" id="amper" size="30">
                </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;จังหวัด : </font></strong></td>
                <td bgcolor="#FFFFFF">
                  <select name="province" id="province" >
                    <option value="" selected>เลือกจังหวัด</option>
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
                  </select>
                  <font color="#FF0000">&nbsp; <font size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font></font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1">&nbsp;<font face="MS Sans Serif, Tahoma, sans-serif">&nbsp;<strong>รหัสไปรษณีย์ : </strong></font></font></td>
                <td bgcolor="#FFFFFF"><input name="zipcode" type="text" id="zipcode"></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1">&nbsp;&nbsp;<font face="MS Sans Serif, Tahoma, sans-serif"><strong>เบอร์โทรศัพท์ : </strong></font></font></td>
                <td bgcolor="#FFFFFF"><input name="phone" type="text" id="phone"></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>การศึกษา : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <select name="education"  >
                    <option selected value="">เลือกระดับการศึกษา</option>
                    <option value="ประถมศึกษา">ประถมศึกษา</option>
                    <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                    <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
                    <option value="อาชีวศึกษา / สายอาชีพ">อาชีวศึกษา / สายอาชีพ</option>
                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                    <option value="ปริญญาโท">ปริญญาโท</option>
                    <option value="สูงกว่าปริญญาโท">สูงกว่าปริญญาโท</option>
                  </select>
                </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>อาชีพ : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <select name="work">
                    <option value="" selected>เลือกอาชีพ</option>
                    <option value="นักเรียน/นักศึกษา">นักเรียน/นักศึกษา</option>
                    <option value="ธุรกิจส่วนตัว">ธุรกิจส่วนตัว</option>
                    <option value="แพทย์/พยาบาล">แพทย์/พยาบาล</option>
                    <option value="ครู/อาจารย์">ครู/อาจารย์</option>
                    <option value="นักกฎหมาย/ทนายความ">นักกฎหมาย/ทนายความ</option>
                    <option value="คอมพิวเตอร์">คอมพิวเตอร์</option>
                    <option value="วิศวกร/ช่าง">วิศวกร/ช่าง</option>
                    <option value="พนักงานบัญชี/การเงิน">พนักงานบัญชี/การเงิน</option>
                    <option value="การตลาด/การขาย">การตลาด/การขาย</option>
                    <option value="รับราชการ">รับราชการ</option>
                    <option value="ที่ปรึกษา">ที่ปรึกษา</option>
                    <option value="พนักงานรัฐวิสาหกิจ">พนักงานรัฐวิสาหกิจ</option>
                    <option value="ผู้บริหาร/ผู้จัดการ">ผู้บริหาร/ผู้จัดการ</option>
                    <option value="พนักงานทั่วไป">พนักงานทั่วไป</option>
                    <option value="บริการท่องเที่ยว">บริการท่องเที่ยว</option>
                    <option value="ออกแบบ/ดีไซน์">ออกแบบ/ดีไซน์</option>
                    <option value="พนักงานโรงงาน">พนักงานโรงงาน</option>
                    <option value="นักวิชาการ/นักวิจัยค้นคว้า">นักวิชาการ/นักวิจัยค้นคว้า</option>
                    <option value="สื่อสารมวนชน/นักข่าว">สื่อสารมวนชน/นักข่าว</option>
                    <option value="ดารา/นักแสดง/นักดนตรี">ดารา/นักแสดง/นักดนตรี</option>
                    <option value="ว่างงาน">ว่างงาน</option>
                    <option value="ไม่ได้ทำงาน">ไม่ได้ทำงาน</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                  </select>
                </font></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF"><font size="1"><strong><font face="MS Sans Serif, Tahoma, sans-serif">รูปสมาชิก : </font></strong></font></td>
                <td bgcolor="#FFFFFF"><input type="file" name="FILE" style="width:250" class="inputform"> 
                  <br>
                  Limit <?=(_MEMBER_LIMIT_UPLOAD/1024);?> kB ขนาดแนะนำ กว้าง x ยาว = 100 x 80 pixels</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font color="#0000FF"><strong><font color="#0000FF" size="1" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/admin/user.gif" ></font> </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp; </font><font color="#0000FF"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">ข้อมูลในการเข้าสู่ระบบ</font></strong></font><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp; </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1"><strong>&nbsp;&nbsp;<font face="MS Sans Serif, Tahoma, sans-serif">Login Name : </font></strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="user_name" type="text" id="user_name" size="20" maxlength="30">
                  <font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;**<strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;ชื่อที่จะแสดงเมื่อเข้าระบบและโพสต์กระทู้ (ภาษาอังกฤษเท่านั้น)</font></strong></font> </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>Password : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="pwd_name1" type="password" id="pwd_name1" size="20" maxlength="30">
&nbsp;<font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font> </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">Re-password : </font></strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="pwd_name2" type="password" id="pwd_name2" size="20" maxlength="30">
&nbsp;<font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font> </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1"><strong><font face="MS Sans Serif, Tahoma, sans-serif">Email : </font></strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="email" type="text" id="email" size="20">
&nbsp;<font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font></font></td>
              </tr>
<?
if(USE_CAPCHA){
?>
					<TR>
						<TD align="right">
						<?if(CAPCHA_TYPE == 1){ 
							echo "<img src=\"capcha/CaptchaSecurityImages.php?width=".CAPCHA_WIDTH."&height=".CAPCHA_HEIGHT."&characters=".CAPCHA_NUM."\" width=\"".CAPCHA_WIDTH."\" height=\"".CAPCHA_HEIGHT."\" align=\"absmiddle\" />";
						}else if(CAPCHA_TYPE == 2){ 
							echo "<img src=\"capcha/val_img.php?width=".CAPCHA_WIDTH."&height=".CAPCHA_HEIGHT."&characters=".CAPCHA_NUM."\" width=\"".CAPCHA_WIDTH."\" height=\"".CAPCHA_HEIGHT."\" align=\"absmiddle\" />";
						};?>
						</TD>
						<TD><input name="security_code" type="text" id="security_code" maxlength="6" >&nbsp;<font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font>&nbsp;<b><font color="#FF0000" face="MS Sans Serif, Tahoma, sans-serif">ใส่รหัสยืนยันป้องกัน spam</font></b></TD>
					</TR>
<?
}
?>

              <tr>
                <td align="right" bgcolor="#FFFFFF"></td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><font color="#0000FF">รายละเอียดต่างๆจะถูกส่งไปทางอีเมล <br>
              หากไม่เจอใน Inbox ให้ลองดูที่ Junk E-Mail นะครับ&nbsp;</font><font color="#0000FF" size="2">&nbsp;</font><font color="#0000FF" size="1"><font face="MS Sans Serif, Tahoma, sans-serif"><strong>&nbsp; </strong></font></font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">
                  <input type="submit" name="Submit" value="สมัครสมาชิก">
                  <input type="hidden" name="signup" value="date()">
&nbsp;
              <input type="reset" name="Submit2" value=" เคลียร์">
              <input name="ok" type="hidden" id="ok2" value="ok_pass">
                </td>
              </tr>
            </table>
            <script language="javascript">

function check() {
if(document.checkForm.name.value=="") {
alert("กรุณากรอกชื่อ-นามสกุลด้วยครับ") ;
document.checkForm.name.focus() ;
return false ;
}
else if(document.checkForm.year.value=="") {
alert("กรุณากรอก วัน/เดือน/ปีเกิด ให้ครบถ้วนด้วยนะครับ") ;
document.checkForm.year.focus() ;
return false ;
}
else if(isNaN(document.checkForm.year.value)) {
alert("ปีเกิดของท่าน กรุณากรอกเฉพาะตัวเลขนะครับ") ;
document.checkForm.year.focus() ;
return false ;
}
else if(document.checkForm.age.value=="") {
alert("กรุณากรอกอายุด้วยครับ") ;
document.checkForm.age.focus() ;
return false ;
}else if(isNaN(document.checkForm.age.value)) {
alert("กรุณากรอกอายุด้วยตัวเลขเท่านั้นครับ") ;
document.checkForm.age.focus() ;
return false ;
}
else if(document.checkForm.province.selectedIndex==0) {
alert("กรุณาระบุจังหวัดที่ท่านอยู่ด้วยครับ") ;
return false ;
}
else if(isNaN(document.checkForm.zipcode.value)) {
alert("รหัสไปรษณีย์ต้องเป็นตัวเลขครับ") ;
document.checkForm.zipcode.focus() ;
return false ;
}
else if(document.checkForm.user_name.value=="") {
alert("กรุณาระบุชื่อที่ท่านต้องการใช้ในการเข้าระบบด้วยครับ") ;
document.checkForm.user_name.focus() ;
return false ;
}
else if(document.checkForm.pwd_name1.value=="") {
alert("กรุณากรอกรหัสผ่านที่ต้องการด้วยครับ") ;
document.checkForm.pwd_name1.focus() ;
return false ;
}
else if(document.checkForm.pwd_name2.value=="") {
alert("กรุณายืนยันรหัสผ่านอีกครั้ง") ;
document.checkForm.pwd_name2.focus() ;
return false ;
}
else if(document.checkForm.pwd_name1.value != document.checkForm.pwd_name2.value) {
alert("รหัสผ่านทั้งสองไม่ตรงกัน กรุณายืนยันรหัสผ่านให้ถูกต้องด้วยครับ") ;
document.checkForm.pwd_name2.focus() ;
return false ;
}
else if(document.checkForm.email.value=="") {
alert("กรุณากรอกอีเมล์ด้วยนะครับ") ;
return false ;
}
else if(checkForm.email.value.indexOf('@')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(checkForm.email.value.indexOf('.')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}

else 
return true ;
}

    </script>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
