<?php
require_once("includes/class.mysql.php");
require_once("includes/array.in.php");
require_once("includes/class.ban.php");
require_once("includes/class.calendar.php");
require_once("includes/function.in.php");
require_once 'includes/model.php';

require_once("includes/config.in.php");
$db = New DB();
$db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
$theme = getTheme($db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="th" lang="th">
    <head>
        <title>ระบบลงทะเบียนข้อมูล ของ lymphoma</title>
        <meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
        <link rel="stylesheet" type="text/css" href="css/<?php echo $theme; ?>" media="screen" />
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
            function makevisible(cur, which) {
                if (which == 0)
                    cur.filters.alpha.opacity = 100
                else
                    cur.filters.alpha.opacity = 40
            }
        </script>
        
        <script language="JavaScript">
            
            function MM_displayStatusMsg(msgStr) { //v1.0
                status = msgStr;
                document.MM_returnValue = true;
            }
            //-->
        </script>
       
    </head>
    <body>
        <?php
//หากมีการเรียกไฟล์นี้โดยตรง
        if (eregi("mainfile.php", $PHP_SELF)) {
            Header("Location: index.php");
            die();
        }

//ตรวจสอบว่ามีโมดูลหรือไม่ (โมดูล User)
        function GETMODULE($name, $file) {
            global $MODPATH, $MODPATHFILE;
            if (!$name) {
                $name = "index";
            }
            if (!$file) {
                $file = "index";
            }
            $modpathfile = "modules/" . $name . "/" . $file . ".php";
            if (file_exists($modpathfile)) {
                $MODPATHFILE = $modpathfile;
                $MODPATH = "modules/" . $name . "/";
            } else {
                die("
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
