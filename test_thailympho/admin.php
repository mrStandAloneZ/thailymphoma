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
				<li><a href='admin.php?name=admin&file=main' title=''>˹����ѡ</a></li>
				<li><a href='admin.php?name=admin&file=data_all' title=''>�����ŷ�����</a></li>
				<li><a href='admin.php?name=admin&file=signup' title=''>������Ҫԡ</a></li>
				<li><a href='admin.php?name=admin&file=member' title=''>��Ҫԡ������</a></li>
				<li><a href='admin.php?name=admin&file=logout' title=''>�͡�ҡ�����</a></li>
				 ";}; ?>
            </ul>
<div id="center_admin">

<? include ("".$MODPATHFILE.""); ?>
</div>
