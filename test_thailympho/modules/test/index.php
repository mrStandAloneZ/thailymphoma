    <? include "modules/index/header.php" ; ?>
    <div id="center"><?
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res[theme] = $db->select_query("SELECT * FROM ".TB_THEME." WHERE enable = 1 "); 
	while($arr[theme] = $db->fetch($res[theme])){
?>
    <p>
        <h1>ข่าวสาร โรงพยาบาล</h1>
</p>
<?=$arr[theme][name];?>
<?
}
$db->closedb ();
?>

            </div>
        
        <!-- sidebar -->
        
        <div class="x"></div>
        <div class="break"></div>

    </div>
    <? include "modules/index/footer.php"; ?>