

<?
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "root";	//���ͼ����
$password = "password";	 //���ʼ�ҹ
$dbname = "cml";	//���Ͱҹ������
$tblname = "web_member";	//���͵��ҧ

// ������Դ��Ͱҹ������
$connect = mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
$db = mysql_select_db($dbname) or die("���͡�ҹ�����������");

// ����� SQL ���������ӧҹ
$sql = "select * from $tblname where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die ("�觤���������");

$result = mysql_fetch_array($dbquery);
	
				$id = $result[id];
				$member_id = $result[member_id];
				$user = $result[user];
				$password = $result[password];
				$fullname = $result[fullname];
		

echo "<Center>";
echo "<Font size=4>";
echo "<Form action=\"admin.php?name=admin&file=member_delete_ok\" method=\"post\">";	 // �觤����ѻഷ
echo "<Input type=\"hidden\" name=\"id\" Size=\"20\" value=\"$id\">";
echo "<Table height=500>";
echo "<tr><td><B><Font size=4 color=blue><center>�׹�ѹ���ź  </Font><Font size=4 color=red> ".$fullname."</Font></center></B></td>  </tr>";
echo "</Table>";
echo "<Br><Input type=\"Submit\" value=\"&nbsp;��ŧ&nbsp;\">";
echo "</Form><br>";
echo "<Form action=\"index.php\" method=\"post\">";
echo "<Input type=\"Submit\" value=\"&nbsp;¡��ԡ&nbsp;\">";
echo "</Form>";
echo "</Font>";
echo "</Center>";

?>

<? include "modules/index/footer.php"; ?>