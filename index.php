<?
    date_default_timezone_set("Asia/Bangkok");
	session_start();
	require_once("mainfile.php");
	$PHP_SELF = "index.php";
	GETMODULE($_GET[name],$_GET[file]);
?>
<? include ("".$MODPATHFILE.""); ?>
