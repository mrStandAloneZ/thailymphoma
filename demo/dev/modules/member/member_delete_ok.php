
<?php
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "root";	//���ͼ����
$password = "password";	 //���ʼ�ҹ
$dbname = "cml";	//���Ͱҹ������
$tblname = "web_member";	//���͵��ҧ

// ������Դ��Ͱҹ������
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

// ����� SQL ���������ӧҹ
$sql = "delete from web_member where id='$id'";	// ��˹������ SQL ����ź������

$dbquery = mysql_db_query($dbname, $sql);

echo "<BR><BR><CENTER><Font Size=4><B>ź�����Ţͧ<Font color=red>id=  ".$fullname. " </Font>���º��������</B><Br>";
echo "<Br><A Href=\"admin.php?name=admin&file=member\">��Ѻ�˹����ѡ</A></CENTER>";	// ����ͧ���� / ˹�� " ���������Դ error ������ѹ

?>