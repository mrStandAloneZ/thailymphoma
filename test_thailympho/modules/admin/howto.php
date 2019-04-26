<?
$date_today = date("d-m-Y [H:i:s]");
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<style type="text/css">
<!--
.style1 {font-size: 16px}
-->
</style>


  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="3">
      <td width="30" align="left" bgcolor="#FFFFFF">
        <p><h1>คู่มือการใช้งานผู้ดูแล</h1></p></td>
    <tr>
      <td align="left" bgcolor="#FFFFFF">
        <p class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เนื่องจากการใช้งานโปรแกรมจัดตารางการทำงานของพยาบาล  จำเป็นต้องมีผู้ดูแล(admin) เพื่อให้สะดวกต่อการใช้งาน  ผู้จัดทำจึงได้ทำคู่มือการใช้งานของผู้ดูแล(admin)ขึ้น  เพื่อให้ผู้ดูแล(admin)เข้าใจการใช้งานโปรแกรมจัดตารางการทำงานของพยาบาล  มีรายละเอียดดังต่อไปนี้<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	หน้า  login  ของผู้ดูแล(admin)  โดยในหน้านี้จะมีฟอร์มให้ป้อนชื่อผู้ดูแล(admin) และ  รหัสผ่าน  สำหรับเข้าใช้งาน  เพื่อป้องกันบุคคลที่ไม่เกี่ยวข้องเข้ามาแอบดูข้อมูล  แสดงดังภาพที่  1-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/25.jpg" alt="login" width="1000" height="201"></p>
      <p align="center" class="style1">ภาพที่  1-1  หน้า login ของผู้ดูแล(admin)</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.  ผู้ดูแล(admin)  สามารถจัดตารางการทำงานของพยาบาล  โดยผ่านเมนู  เพิ่มตารางการทำงาน  แสดงดังภาพที่  2-1   โดยให้เลือกวันเดือนปี  ที่ต้องการจะเพิ่มข้อมูลก่อนการเลือกชื่อผู้ปฏิบัติงาน  เลือกชื่อผู้ปฏิบัติงานโดยการคลิกที่ชื่อผู้ปฏิบัติงานตามที่ต้องการ  และถ้าต้องการเลือกมากกว่า  1 คน  ให้ผู้ดูแล(admin)กด  ctrl  ค้างไว้  เพื่อเลือกคนถัดไป</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/11.jpg" width="1000" height="500"><br>
        <br>ภาพที่  2-1  เพิ่มตารางการทำงานของพยาบาล</p>
      <p class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เมื่อเลือกผู้ปฏิบัติงานที่ต้องการแล้ว  ให้กดปุ่ม   เพิ่มรายการในปฏิทิน   โปรแกรมจะแสดงตัวอย่างข้อมูลที่เลือกให้ดูอีกครั้งเพื่อตรวจสอบความถูกต้องของข้อมูลที่จัดทำขึ้น  ดังแสดงในภาพที่   2  ถ้าข้อมูลที่ผู้ดูแล  (admin) เลือกเป็นข้อมูลซ้ำกัน   โปรแกรมจะให้กลับมาเลือกผู้ปฏิบัติงานอีกครั้งหนึ่ง  แต่ถ้าผู้ดูแล(admin)    เลือกข้อมูลถูกต้องแล้วโปรแกรมถึงจะยอมให้เพิ่มตารางการทำงานนั้นเอง</p>      <p align="center" class="style1"><img src="http://localhost/calendar/images/12.jpg" width="1000" height="609"></p>
      <p align="center" class="style1">ภาพที่  2-2  หน้าพรีวิวก่อนยืนยัน</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.  แจ้งข่าวให้สมาชิก  ผู้ดูแล(admin)  สามารถแจ้งข่าวถึงสมาชิกได้ในเมนู   แจ้งข่าวถึงสมาชิก   ดังแสดงในภาพที่  3-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/13.jpg" width="1000" height="618"></p>
      <p align="center" class="style1">ภาพที่  3-1  แจ้งข่าวถึงสมาชิก</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.	 ข่าวสารโรงพยาบาล
ผู้ดูแลสามารถจัดการข่าวสารของโรงพยาบาลได้  สามารถเพิ่ม  ลบ  แก้ไข  ได้  ข้อมูลข่าวสารของโรงพยาบาลนี้จะไปแสดงหน้า  member  ด้วย  ดังแสดงในภาพที่  4-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/14.jpg" width="1000" height="500"></p>
      <p align="center" class="style1">ภาพที่  4-1  กิจกรรมโรงพยาบาล</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.	 กิจกรรมโรงพยาบาล
ผู้ดูแล(admin)  สามารถจัดการเพิ่ม  ลบ  แก้ไข  ข้อมูล  กิจกรรมของโรงพยาบาลได้ตามต้องการ  ดังแสดงในภาพที่  5-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/15.jpg" width="1000" height="368" /></p>
      <p align="center" class="style1">ภาพที่  5-1  กิจกรรมโรงพยาบาล</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.	  ตารางประจำเดือน  
ตารางประจำเดือน  จะแสดงจำนวนวันที่ของแต่ละเดือน และ สามารถเลือกโดยการคลิกวันที่ที่ต้องการดู  จะแสดงรายละเอียดของวันที่เลือกว่ามีใครอยู่เวรไหนบ้าง  แสดงดังภาพที่  6-1  และ ภาพที่  6-2  และสามารถเลื่อนดูในเดือนถัดไป  หรือย้อนกลับดูเดือนก่อนหน้า ได้เช่นกัน</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/16.jpg" width="1000" height="501" /></p>
      <p align="center" class="style1">ภาพที่  6-1  ตารางประจำเดือน</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/17.jpg" width="981" height="523" /></p>
      <p align="center" class="style1">ภาพที่  6-2  ตารางปฏิบัติงานประจำวัน</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.	 หมวดหมู่การทำงาน
หมวดหมู่การทำงานจะแสดงรายละเอียดของหมวดหมู่การทำงานว่ามีอะไรบ้าง  สามารถ แก้ไขชื่อหมวดหมู่  ดังแสดงในภาพที่  7-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/18.jpg" width="1000" height="366" /></p>
      <p align="center" class="style1">ภาพที่  7-1  หมวดหมู่การทำงาน</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.	 เพิ่มหัวข้อการแลกเปลี่ยนเวร
ถ้าต้องการเพิ่มการแลกเปลี่ยนเวร   หรือ  ต้องการเพิ่มการจ้างพยาบาลพิเศษ  จำเป็นต้องเข้ามาใช้งานในเมนู  จัดการแลกเปลี่ยนเวร  แล้วเลือก  เพิ่มหัวข้อการแลกเปลี่ยนเวร  ดังแสดงในภาพที่  8-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/19.jpg" width="1000" height="498" /></p>
      <p align="center" class="style1">ภาพที่  7-1  เพิ่มหัวข้อการแลกเปลี่ยนเวร</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 9.	 ตารางการแลกเปลี่ยนเวรทั้งหมด
ในหน้านี้จะแสดงการแลกเปลี่ยนเวรทั้งหมด  ผู้ดูแล(admin)  สามารถเข้ามาตรวจสอบการแลกเปลี่ยนได้ในเมนู  ตารางการแลกเปลี่ยนเวรทั้งหมด  ดังแสดงในภาพที่  9-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/21.jpg" width="1000" height="528" /></p>
      <p align="center" class="style1">ภาพที่   9-1   ตารางการแลกเปลี่ยนทั้งหมด</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.	เพิ่มระบบสมาชิก
การเพิ่มสมาชิก  ผู้ดูแล(admin)  สามารถเพิ่มได้ผู้ผู้เดียว  โดยข้อมูลที่จะนำมากรอกลงในเมนูการเพิ่มระบบสมาชิก  จะมาจากสมาชิกกรอกรายละเอียดลงในเอกสาร  แล้วนำมาให้ผู้ดูแล(admin)  รูปแบบบการเพิ่มระบบสมาชิกจะแสดงดังภาพที่  10-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/22.jpg" width="1000" height="609" /></p>
      <p align="center" class="style1">ภาพที่  10-1  เพิ่มสมาชิก</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.	 ดูรายละเอียดสมาชิกทั้งหมด
ผู้ดูแล(admin)  สามารถดูข้อมูลของสมาชิกทั้งหมดได้ในเมนู ดูรายละเอียดสมาชิกทั้งหมด  และสามารถแก้ไขข้อมูลของสมาชิก  ดังแสดงในภาพที่  11-1  และ  11-2</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/23.jpg" width="1000" height="622" /></p>
      <p align="center" class="style1">ภาพที่  11-1  รายละเอียดสมาชิกทั้งหมด</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/24.jpg" width="1000" height="611" /></p>
      <p align="center" class="style1">ภาพที่  11-2  แก้ไขข้อมูลของสมาชิก</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.	 สมาชิกติดต่อผู้ดูแล
ผู้ดูแล(admin)สามารถเข้ามาตรวจสอบข้อมูลที่สมาชิกส่งถึงผู้ดูแล(admin)   เช่น  มีข้อสงสัยในการใช้งาน  แสดงดังภาพที่  12-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/26.jpg" width="1000" height="532" /></p>
      <p align="center" class="style1">ภาพที่  12-1  สมาชิกติดต่อผู้ดูแล(admin)</p>
      <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13.	 หน้าจัดการผู้ดูแล
ในหน้านี้ผู้ดูแลสามารถ  เพิ่ม แก้ไข ข้อมูลส่วนตัว หรือ จะเพิ่มผู้ดูแลก็ได้  และสามารถระบุความสามารถในการจัดการโปรแกรมให้กับผู้ดูแลที่เพิ่มใหม่  แสดงดังภาพที่  13-1</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/27.jpg" width="1000" height="324" /></p>
      <p align="center" class="style1">ภาพที่  13-1  หน้าจัดการผู้ดูแลระบบ</p>
      <p align="center" class="style1"><img src="http://localhost/calendar/images/28.jpg" width="1000" height="609" /><br />
      </p>
      <p align="center" class="style1">&nbsp;ภาพที่  13-2  เพิ่มระดับความสามารถในการจัดการโปรแกรมของผู้ดูแล</p></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</td>
      </tr>
    </table>
