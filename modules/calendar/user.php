    <?
$todate = date("Y-m-d");

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[event] = $db->select_query("SELECT * FROM ".TB_CALENDAR." WHERE date_event = '$todate' ");
$arr[event] = $db->fetch($res[event]);
$db->closedb ();

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;


// โปรแกรมจัดการ
$cat1 = $arr[event][cat1];
$nameme   = $dbarr['name'];
$pos = strpos($cat1, $nameme);   //    strpos  เปรียบเทียบ
// หัวหน้า
if ($pos === false) {
} else {
    echo "  $nameme <font color='#f5ad30'> วันนี้คุณทำงานตำแหน่ง </font> หัวหน้า ";
}

$cat2 = $arr[event][cat2];
$pos = strpos($cat2, $nameme);
//เช้า
if ($pos === false) {
} else {
    echo "  $nameme <font color='#f5ad30'> วันนี้คุณทำงานตำแหน่ง </font> เช้า ";
}

$cat3 = $arr[event][cat3];
$pos = strpos($cat3, $nameme);
//บ่าย
if ($pos === false) {
} else {
    echo "  $nameme <font color='#f5ad30'> วันนี้คุณทำงานตำแหน่ง  </font> บ่าย";
}

$cat4 = $arr[event][cat4];
$pos = strpos($cat4, $nameme);
//ดึก
if ($pos === false) {
} else {
    echo "  $nameme <font color='#f5ad30'> วันนี้คุณทำงานตำแหน่ง </font> ดึก";
}

$cat5 = $arr[event][cat5];
$pos = strpos($cat5, $nameme);
//ดึก
if ($pos === false) {
} else {
    echo " $nameme <font color='#f5ad30'>วันนี้คุณทำงานตำแหน่ง </font> หยุด ";
}
?>