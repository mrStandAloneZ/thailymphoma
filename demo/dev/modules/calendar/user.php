    <?
$todate = date("Y-m-d");

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[event] = $db->select_query("SELECT * FROM ".TB_CALENDAR." WHERE date_event = '$todate' ");
$arr[event] = $db->fetch($res[event]);
$db->closedb ();

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;


// ������Ѵ���
$cat1 = $arr[event][cat1];
$nameme   = $dbarr['name'];
$pos = strpos($cat1, $nameme);   //    strpos  ���º��º
// ���˹��
if ($pos === false) {
} else {
    echo "  $nameme <font color='#f5ad30'> �ѹ���س�ӧҹ���˹� </font> ���˹�� ";
}

$cat2 = $arr[event][cat2];
$pos = strpos($cat2, $nameme);
//���
if ($pos === false) {
} else {
    echo "  $nameme <font color='#f5ad30'> �ѹ���س�ӧҹ���˹� </font> ��� ";
}

$cat3 = $arr[event][cat3];
$pos = strpos($cat3, $nameme);
//����
if ($pos === false) {
} else {
    echo "  $nameme <font color='#f5ad30'> �ѹ���س�ӧҹ���˹�  </font> ����";
}

$cat4 = $arr[event][cat4];
$pos = strpos($cat4, $nameme);
//�֡
if ($pos === false) {
} else {
    echo "  $nameme <font color='#f5ad30'> �ѹ���س�ӧҹ���˹� </font> �֡";
}

$cat5 = $arr[event][cat5];
$pos = strpos($cat5, $nameme);
//�֡
if ($pos === false) {
} else {
    echo " $nameme <font color='#f5ad30'>�ѹ���س�ӧҹ���˹� </font> ��ش ";
}
?>