
<?php
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "root";	//���ͼ����
$password = "password";	 //���ʼ�ҹ
$dbname = "aml-all";	//���Ͱҹ������
$tblname = "web_member";	//���͵��ҧ
if($user == "" || $password == "" || $fullname == "" || $hospital_name == "" || $email == "")
		{
			echo "<center><Font Size=4><B>�����䢢����żԴ��Ҵ���ͧ�ҡ���������ú </B></center>";
			echo "<center><Br><A Href=\"index.php\"> <b>��Ѻ�˹���á</b> </A></center>";

		}
		else
		{

// ������Դ��Ͱҹ������
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

// ����� SQL ���������ӧҹ
$sql = "update web_member set user='$user', password='$password', member_id='$member_id',  fullname='$fullname', sex='$sex' , age='$age' , hospital_name='$hospital_name' , codehos='$codehos' , address_office='$address_office' , work='$work' , tel_office='$tel_office',tel='$tel',email='$email'  where id='$id'";	// ��˹������ SQL �����ʴ�������
mysql_query("SET NAMES tis620");
$dbquery = mysql_db_query($dbname, $sql);
			echo "<center><font size=4>��س��ͫѡ���� ��ҡ��ѧ�ӷ�ҹ��Ѻ���˹�Ҩ���ѡ  �ͧ�����</font></center>";
		}

?>
<meta http-equiv='refresh' content='1; url=?name=admin&file=member'>