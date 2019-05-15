<?
require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/array.in.php");
require_once("includes/class.ban.php");
require_once("includes/class.calendar.php");
require_once("includes/function.in.php");

$db = New DB();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="th" lang="th">
<head>
	<title>ระบบลงทะเบียนข้อมูล ของ lymphoma</title>
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <?
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);




$objConnect = mysql_connect("125.2.2.1",DB_USERNAME,DB_PASSWORD);

if($objConnect)
{
	echo "MySQL Connected";
}
else
{
	echo " ( จบแล้ว ! การเชื่อต่อผิดพลาด : ".mysql_error()." )";
}


	
	
	$res[theme] = $db->select_query("SELECT * FROM ".TB_THEME.""); 
	while($arr[theme] = $db->fetch($res[theme])){
	?>
	<link rel="stylesheet" type="text/css" href="css/<?=$arr[theme][name_theme];?>" media="screen" />
	<?
    }
    $db->closedb ();
    ?>
	<link rel="stylesheet" type="text/css" href="css/calendar.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="prettyphoto/css/prettyPhoto.css" media="screen" />
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/core.js"></script>
	<script type="text/javascript" src="pngFix/jquery.pngFix.js"></script>
	<script type="text/javascript" src="prettyphoto/js/jquery.prettyPhoto.js"></script>
	<!--[if IE 6]>
	<style>
		#pitch .infoline {margin-top:-74px;}
		.post-options {margin:-55px 0 40px 138px;}
	</style>
	<![endif]-->
    
	<script type="text/javascript" src="highslide/highslide.js"></script>
    <script type="text/javascript" src="highslide/highslide-html.js"></script>
    <script type="text/javascript">    
        hs.graphicsDir = 'highslide/graphics/';
        hs.outlineType = 'rounded-white';
        hs.outlineWhileAnimating = true;
        hs.objectLoadTime = 'after';
    </script>
    <script type="text/javascript" src="js/java.js"></script>
    <script type="text/javascript" src="js/datepicker.js"></script>
    <script language="JavaScript1.2">
function makevisible(cur,which){
  if (which==0)
    cur.filters.alpha.opacity=100
  else
    cur.filters.alpha.opacity=40
}
</script>
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script language="JavaScript">
<!--
function MM_displayStatusMsg(msgStr) { //v1.0
  status=msgStr;
  document.MM_returnValue = true;
}
//-->
</script>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_jumpMenuGo(selName,targ,restore){ //v3.0
  var selObj = MM_findObj(selName); if (selObj) MM_jumpMenu(targ,selObj,restore);
}
//-->
</script>
</head>
<body>
<?
//หากมีการเรียกไฟล์นี้โดยตรง
if (eregi("mainfile.php",$PHP_SELF)) {
    Header("Location: index.php");
    die();
}

//ตรวจสอบว่ามีโมดูลหรือไม่ (โมดูล User)
function GETMODULE($name,$file){
	global $MODPATH, $MODPATHFILE ;
	if(!$name){$name = "index";}
	if(!$file){$file = "index";}
$modpathfile="modules/".$name."/".$file.".php";
if (file_exists($modpathfile)) {
	$MODPATHFILE = $modpathfile;
	$MODPATH = "modules/".$name."/";
	}else{
	die ("
		 <meta http-equiv='refresh' content='3;url=index.php'>
		<center>
		<h1>ERROR 404</h1>
		ไม่มีหน้าที่ท่านต้องการเข้าชม...<br>
		 รอสักครู่ ระบบจะนำท่านกลับไปยังหน้าหลัก...<br>
		 <br><br><br><br><br><br>
		 <img src='images/login-redirection-loader.gif' alt='Clean and Simple' />
		 </center>
		");
	}
}







?>
