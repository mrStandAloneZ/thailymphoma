<?

//หากมีการเรียกไฟล์นี้โดยตรง
if (eregi("config.in.php",$PHP_SELF)) {
    Header("Location: ../index.php");
    die();
}

//Web Config


/*
function setSessionTime($_timeSecond){
 if(!isset($_SESSION['ses_time_life'])){
  $_SESSION['ses_time_life']=time();
 }
 if(isset($_SESSION['ses_time_life']) && time()-$_SESSION['ses_time_life']>$_timeSecond){
  if(count($_SESSION)>0){
   foreach($_SESSION as $key=>$value){
    unset($key);
    unset($_SESSION[$key]);
   }
  }
 }
}
// การใช้งาน
setSessionTime(60*60);
*/



ini_set("session.gc_maxlifetime", 25000); // เวลากันเข้าสู่ระบบ
define("WEB_URL","'http://localhost:8888") ;
define("WEB_EMAIL","sommaphun.t@gmail.com") ;
define("TIMESTAMP",time()) ;

//Capcha ตัวหนังสือยืนยันการโพสข้อความ
define("USE_CAPCHA", false); //ใช้การป้องกันการโพสสแปม   true , false
define("CAPCHA_TYPE","2"); //รูปแบบของตัวอักษร 1 = แบบสวยงาม , 2 = แบบธรรมดา
define("CAPCHA_NUM","4"); //จำนวนตัวอักษร
define("CAPCHA_WIDTH","80"); //ขนาดความกว้าง
define("CAPCHA_HEIGHT","25"); //ขนาดความสูง

/*
CAPCHA_TYPE แบบที่ 1 ต้องเซ็ทค่าดังนี้
 กรณีที่ตัวอักษรไม่ขึ้นให้เข้าไปแก้ที่ไฟล์ capcha/CaptchaSecurityImages.php บรรทัดที่ 6 ให้ใส่ path ให้ถูกต้อง หากต้องการทราบ path ให้เปิดไฟล์ phpinfo.php เพื่อตรวจสอบ path ของโปรแกรม 
*/

//Calendar
define("USE_THAIYEAR", true); //แสดงผลเป็น พ.ศ. ใน calendar   true , false


//MySQL Connect
define("DB_HOST","db");
define("DB_NAME","thailympho_dbp");
define("DB_USERNAME","thailympho_dbp");
define("DB_PASSWORD","VB-D#ThaAi#LogCe&");

//MySQL table
define("TB_ADD_DATA","web_add_data1");
define("TB_ADMIN","web_admin1");
define("TB_EVENT","web_event1");
define("TB_MEMBER","web_member1");
define("TB_MAIL","web_mail1");
define("TB_THEME","web_theme1");

//Permission Name

define("_ADD_DATA","ลงทะเบียนข้อมูล");
define("_ADMIN","ผู้ดูแลระบบ");
define("_CONTACT","อีเมล์ติดต่อในโปรแกรม");
define("_EDITORTALK","ข่าวสารหน้าโปรแกรม");
define("_MINEPASS","รหัสผ่านผู้ดูแลระบบ");
define("_MEMBER","ระบบสมาชิก");
define("_THEMES","รูปแบบโปรแกรม");
define("_ADDNEW","คำร้องขอ");

//Icon Size
define("_IKNOW_W","80"); //ไอคอนความรู้กว้าง
define("_IKNOW_H","60"); //ไอคอนความรู้สูง 

//Show Topic
define("_NEWS_COL","2"); //จำนวนคอลัมน์ในการแสดงข่าวสาร
define("_KNOW_COL","2"); //จำนวนคอลัมน์ในการแสดงสาระความรู้

//Webboard control
define("_NUM_ID","5"); //การแสดงหัวข้อโดยแสดงจำนวนกี่หลัก เช่น ตั้งค่าเป็น 5 ก็จะแสดง 00001 , 00015 เป็นต้น
define("_SHOW_BOARD_PIN","5"); //การจำนวนกระทู้ปักหมุด
define("_PERPAGE_BOARD","20"); //จำนวนกระทู้ที่แสดงหน้าบอร์ดแต่ละหมวด
define("_ENABLE_BOARD_UPLOAD",true); //ให้มีการอัพโหลดรูปได้  true , false
define("_WEBBOARD_LIMIT_UPLOAD","102400"); //ขนาดไฟล์รูปที่อัพโหลดได้ 
define("_WEBBOARD_LIMIT_PICWIDTH","500"); //ขนาดไฟล์รูปที่อัพโหลดได้ 
define("_MEMBER_LIMIT_UPLOAD","51200"); //ขนาดไฟล์รูปสมาชิิกที่อัพโหลดได้ 
define("_MEMBER_LIMIT_PICWIDTH","100"); //ขนาดความก้ว้างไฟล์รูปสมาชิก 



define("_MNAME",$_GET['name']) ;
define("_MFILE",$_GET['file']) ;

//ตรวจสอบ IP
if ($_SERVER['HTTP_CLIENT_IP']) {
$IPADDRESS = $_SERVER['HTTP_CLIENT_IP'];
} elseif (ereg("[0-9]",$_SERVER["HTTP_X_FORWARDED_FOR"] )) {
$IPADDRESS = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
$IPADDRESS = $_SERVER["REMOTE_ADDR"];
}
define("IPADDRESS",$IPADDRESS) ;


//ผู้ดูแลระบบไม่ผ่านสิทธิการใช้งาน
$PermissionFalse .= "<BR><BR>";
$PermissionFalse .= "<CENTER><A HREF=\"admin.php?name=admin&file=main\"><IMG SRC=\"images/icon/member.png\" BORDER=\"0\"></A><BR><BR>";
$PermissionFalse .= "<FONT COLOR=\"#336600\"><B>ท่านไม่ได้รับอนุญาตให้ใช้งานส่วนนี้ได้</B></FONT><BR><BR>";
$PermissionFalse .= "<A HREF=\"admin.php?name=admin&file=main\"><B>หน้าหลักผู้ดูแลระบบ</B></A>";
$PermissionFalse .= "</CENTER>";
$PermissionFalse .= "<BR><BR>";

// ส่วนของระบบสมาชิก
$home = "http://localhost:8888" ; // url เว็บไซด์ของคุณ เวลาที่ต้องการเรียก
$admin_email = "thanagon.p@hotmail.com" ; // อีเมล์ของคุณ
$yourcode = "lym" ; // รหัสนำหน้าหมายเลขสมาชิกของคุณ เช่น ip00001 , abc00005
$member_num_show = 5 ;  // จำนวนของสมาชิกที่ต้องการให้แสดงต่อ  1 หน้า ในระบบของ admin 
$member_num_show_last = 5 ;  // จำนวนของสมาชิกล่าสุดที่ต้องการให้แสดง
$member_num_last = 1 ;  // จำนวนของสมาชิกล่าสุดที่ต้องการให้แสดงหน้าแรก

$bkk= mktime(gmdate("H")+7,gmdate("i")+0,gmdate("s"),
	gmdate("m") ,gmdate("d"),gmdate("Y"));
$datetimeformat="j/m/y - H:i";
$now = date($datetimeformat,$bkk);
$kiko = 'kiko';
?>
