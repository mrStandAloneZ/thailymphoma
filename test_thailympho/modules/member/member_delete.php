

<? include "modules/index/header.php" ; ?>
<?
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "root";	//���ͼ����
$password = "password";	 //���ʼ�ҹ
$dbname = "tumect";	//���Ͱҹ������
$tblname = "web_addnew";	//���͵��ҧ

// ������Դ��Ͱҹ������
$connect = mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
$db = mysql_select_db($dbname) or die("���͡�ҹ�����������");

// ����� SQL ���������ӧҹ
$sql = "select * from $tblname where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die ("�觤���������");

$result = mysql_fetch_array($dbquery);
	
				$id = $result[id];
				$date = $result[date];
				$month = $result[month];
				$year = $result[year];
				$title = $result[title];
				$status=	 $result[status];

echo "<Center>";
echo "<B><Font size=4 color=blue>�׹�ѹ���ź Id </Font><Font size=4 color=red> ".$id."</Font></B>";
echo "<Font size=4>";
echo "<Form action=\"index.php?name=member&file=member_delete_ok\" method=\"post\">";	 // �觤����ѻഷ
echo "<Input type=\"hidden\" name=\"id\" Size=\"20\" value=\"$id\">";
echo "<Table bgcolor=yellow>";
echo "</Table>";
echo "<Br><Input type=\"Submit\" value=\"&nbsp;��ŧ&nbsp;\">";
echo "</Form>";
echo "<Form action=\"index.php\" method=\"post\">";
echo "<Input type=\"Submit\" value=\"&nbsp;¡��ԡ&nbsp;\">";
echo "</Form>";
echo "</Font>";
echo "</Center>";
?>