
<?php
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "root";	//���ͼ����
$password = "password";	 //���ʼ�ҹ
$dbname = "cml";	//���Ͱҹ������
$tblname = "web_add_data";	//���͵��ҧ

// ������Դ��Ͱҹ������
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

// ����� SQL ���������ӧҹ
$sql = "delete from web_add_data where id='$id'";	// ��˹������ SQL ����ź������

$dbquery = mysql_db_query($dbname, $sql);

echo "<BR><BR><CENTER><Font Size=4><B>ź�����Ţͧ<Font color=red>  ".$fullname. "</Font>���º��������</B><Br>";
echo "<Br><A Href=\"index.php\">��Ѻ�˹����ѡ</A></CENTER>";	// ����ͧ���� / ˹�� " ���������Դ error ������ѹ

?>

<? include "modules/index/footer.php"; ?>