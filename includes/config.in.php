<?

//�ҡ�ա�����¡������µç
if (eregi("config.in.php",$PHP_SELF)) {
    Header("Location: ../index.php");
    die();
}

//Web Config


/*
function setSessionTime($_timeSecond){
�if(!isset($_SESSION['ses_time_life'])){
��$_SESSION['ses_time_life']=time();
�}
�if(isset($_SESSION['ses_time_life']) && time()-$_SESSION['ses_time_life']>$_timeSecond){
��if(count($_SESSION)>0){
���foreach($_SESSION as $key=>$value){
����unset($key);
����unset($_SESSION[$key]);
���}
��}
�}
}
// �����ҹ
setSessionTime(60*60);
*/



ini_set("session.gc_maxlifetime", 25000); // ���ҡѹ�������к�
define("WEB_URL","'http://localhost:8888") ;
define("WEB_EMAIL","sommaphun.t@gmail.com") ;
define("TIMESTAMP",time()) ;

//Capcha ���˹ѧ����׹�ѹ����ʢ�ͤ���
define("USE_CAPCHA", false); //���û�ͧ�ѹ��������   true , false
define("CAPCHA_TYPE","2"); //�ٻẺ�ͧ����ѡ�� 1 = Ẻ��§�� , 2 = Ẻ������
define("CAPCHA_NUM","4"); //�ӹǹ����ѡ��
define("CAPCHA_WIDTH","80"); //��Ҵ�������ҧ
define("CAPCHA_HEIGHT","25"); //��Ҵ�����٧

/*
CAPCHA_TYPE Ẻ��� 1 ��ͧ�緤�Ҵѧ���
 �óշ�����ѡ��������������������� capcha/CaptchaSecurityImages.php ��÷Ѵ��� 6 ������ path ���١��ͧ �ҡ��ͧ��÷�Һ path ����Դ��� phpinfo.php ���͵�Ǩ�ͺ path �ͧ����� 
*/

//Calendar
define("USE_THAIYEAR", true); //�ʴ����� �.�. � calendar   true , false


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

define("_ADD_DATA","ŧ����¹������");
define("_ADMIN","�������к�");
define("_CONTACT","������Դ���������");
define("_EDITORTALK","�������˹�������");
define("_MINEPASS","���ʼ�ҹ�������к�");
define("_MEMBER","�к���Ҫԡ");
define("_THEMES","�ٻẺ�����");
define("_ADDNEW","����ͧ��");

//Icon Size
define("_IKNOW_W","80"); //�ͤ͹���������ҧ
define("_IKNOW_H","60"); //�ͤ͹��������٧ 

//Show Topic
define("_NEWS_COL","2"); //�ӹǹ�������㹡���ʴ��������
define("_KNOW_COL","2"); //�ӹǹ�������㹡���ʴ����Ф������

//Webboard control
define("_NUM_ID","5"); //����ʴ���Ǣ�����ʴ��ӹǹ�����ѡ �� ��駤���� 5 ����ʴ� 00001 , 00015 �繵�
define("_SHOW_BOARD_PIN","5"); //��èӹǹ��з��ѡ��ش
define("_PERPAGE_BOARD","20"); //�ӹǹ��з�����ʴ�˹�Һ���������Ǵ
define("_ENABLE_BOARD_UPLOAD",true); //����ա���Ѿ��Ŵ�ٻ��  true , false
define("_WEBBOARD_LIMIT_UPLOAD","102400"); //��Ҵ����ٻ����Ѿ��Ŵ�� 
define("_WEBBOARD_LIMIT_PICWIDTH","500"); //��Ҵ����ٻ����Ѿ��Ŵ�� 
define("_MEMBER_LIMIT_UPLOAD","51200"); //��Ҵ����ٻ��Ҫ�ԡ����Ѿ��Ŵ�� 
define("_MEMBER_LIMIT_PICWIDTH","100"); //��Ҵ��������ҧ����ٻ��Ҫԡ 



define("_MNAME",$_GET['name']) ;
define("_MFILE",$_GET['file']) ;

//��Ǩ�ͺ IP
if ($_SERVER['HTTP_CLIENT_IP']) {
$IPADDRESS = $_SERVER['HTTP_CLIENT_IP'];
} elseif (ereg("[0-9]",$_SERVER["HTTP_X_FORWARDED_FOR"] )) {
$IPADDRESS = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
$IPADDRESS = $_SERVER["REMOTE_ADDR"];
}
define("IPADDRESS",$IPADDRESS) ;


//�������к�����ҹ�Է�ԡ����ҹ
$PermissionFalse .= "<BR><BR>";
$PermissionFalse .= "<CENTER><A HREF=\"admin.php?name=admin&file=main\"><IMG SRC=\"images/icon/member.png\" BORDER=\"0\"></A><BR><BR>";
$PermissionFalse .= "<FONT COLOR=\"#336600\"><B>��ҹ������Ѻ͹حҵ�����ҹ��ǹ�����</B></FONT><BR><BR>";
$PermissionFalse .= "<A HREF=\"admin.php?name=admin&file=main\"><B>˹����ѡ�������к�</B></A>";
$PermissionFalse .= "</CENTER>";
$PermissionFalse .= "<BR><BR>";

// ��ǹ�ͧ�к���Ҫԡ
$home = "http://localhost:8888" ; // url ���䫴�ͧ�س ���ҷ���ͧ������¡
$admin_email = "thanagon.p@hotmail.com" ; // ������ͧ�س
$yourcode = "lym" ; // ���ʹ�˹�������Ţ��Ҫԡ�ͧ�س �� ip00001 , abc00005
$member_num_show = 5 ;  // �ӹǹ�ͧ��Ҫԡ����ͧ�������ʴ����  1 ˹�� ��к��ͧ admin 
$member_num_show_last = 5 ;  // �ӹǹ�ͧ��Ҫԡ����ش����ͧ�������ʴ�
$member_num_last = 1 ;  // �ӹǹ�ͧ��Ҫԡ����ش����ͧ�������ʴ�˹���á

$bkk= mktime(gmdate("H")+7,gmdate("i")+0,gmdate("s"),
	gmdate("m") ,gmdate("d"),gmdate("Y"));
$datetimeformat="j/m/y - H:i";
$now = date($datetimeformat,$bkk);
$kiko = 'kiko';
?>
