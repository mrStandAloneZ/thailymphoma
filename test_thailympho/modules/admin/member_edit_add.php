
<?php
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user_db = "thailympho_dbp";	//���ͼ����
$password_db = "VB-D#ThaAi#LogCe&";	 //���ʼ�ҹ
$dbname = "thailympho_dbp";	//���Ͱҹ������
$tblname = "web_member1";	//���͵��ҧ 
if($user == "" || $pass == "" || $fullname == "" || $hospital_name == "" || $email == "")
		{
			echo "<center><Font Size=4><B>�����䢢����żԴ��Ҵ���ͧ�ҡ���������ú </B></center>";
			echo "<center><Br><A Href=\"index.php\"> <b>��Ѻ�˹���á</b> </A></center>";

		}
		else
		{

// ������Դ��Ͱҹ������
mysql_connect($hostname, $user_db, $password_db) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

// ����� SQL ���������ӧҹ
$sql = "update $tblname set user='$user', password='$pass', member_id='$member_id',  fullname='$fullname', sex='$sex' , age='$age' , hospital_name='$hospital_name' , codehos='$codehos' , address_office='$address_office' , work='$work' , tel_office='$tel_office',tel='$tel',email='$email'  where id='$id'";	// ��˹������ SQL �����ʴ�������
mysql_query("SET NAMES tis620");
$dbquery = mysql_db_query($dbname, $sql);
			echo "<center><font size=4>��س��ͫѡ���� ��ҡ��ѧ�ӷ�ҹ��Ѻ���˹�Ҩ���ѡ  �ͧ�����</font></center>";
		}

?>
<meta http-equiv='refresh' content='1; url=?name=admin&file=member'>