<?
	session_start();
	require_once("mainfile.php");
	$PHP_SELF = "admin.php";
	GETMODULE($_GET[name],$_GET[file]);
?>
            <ul class="menuadmin" id="jMenu">
                <? if($_SESSION['admin_user']){echo " 
			";}; ?>
                <? if($_SESSION['admin_user']){echo " 
				<li><a href='admin.php?name=admin&file=main' title=''>หน้าหลัก</a></li>
				<li><a href='admin.php?name=admin&file=data_all' title=''>ข้อมูลทั้งหมด</a></li>
				<li><a href='admin.php?name=admin&file=signup' title=''>เพิ่มสมาชิก</a></li>
				<li><a href='admin.php?name=admin&file=member' title=''>สมาชิกทั้งหมด</a></li>
				<li><a href='admin.php?name=admin&file=logout' title=''>ออกจากโปรแกรม</a></li>
				 ";}; ?>
            </ul>
<div id="center_admin">

<? include ("".$MODPATHFILE.""); ?>
</div>
