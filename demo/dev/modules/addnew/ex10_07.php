<?php
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "root";	//���ͼ����
$password = "password";	 //���ʼ�ҹ
$dbname = "phonebookpm";	//���Ͱҹ������
$tblname = "phone";	//���͵��ҧ
		if($sex == "" || $name == "" || $address == "" || $phone == "" || $mail == "")
		{
			echo "<center><Font Size=4><B>��ҹ��͡���������ú </B></center>";
			echo "<center><Br><A Href=\"Ex10_06.php\"> <b>��Ѻ仡�͡������</b> </A></center>";
			echo "<center><Br><A Href=\"index.php\"> <b>��Ѻ�˹���á</b> </A></center>";

		}
		else
		{

// ������Դ��Ͱҹ������
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");
$sql = "select * from $tblname";
$dbquery = mysql_db_query($dbname, $sql);

// ���ҧid����ѹẺAuto
$num_rows = mysql_num_rows($dbquery);
$ids=$num_rows+1;
$sql = "ALTER TABLE `phone` pack_keys=0 checksum=0 delay_key_write=0 auto_increment=$ids";
$dbquery = mysql_db_query($dbname, $sql);


// ����� SQL ���������ӧҹ
$sql = "insert into $tblname (sex, name, address, phone, mail) values ('$sex','$name', '$address', '$phone', '$mail')";	// ��˹������ SQL ��������������Ẻ����㹤���� SQL
$dbquery = mysql_db_query($dbname, $sql);

// �Դ��õԴ��Ͱҹ������
mysql_close();

header("Location:index.php");
		}

?>
