<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title></title>
</head>
<body>
<? include "modules/index/header.php" ; ?>
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$bb=$dbarr['member_id']; 
$cc=$dbarr['adviser_id'];
$dd=$dbarr['typemember'];
$ty=$dbarr['typepa'];
?>
<?php
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "root";	//���ͼ����
$password = "password";	 //���ʼ�ҹ
$dbname = "tumect";	//���Ͱҹ������
$tblname = "web_addnew";	//���͵��ҧ


// ������Դ��Ͱҹ������
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

if($dd =='100'){
// ����� SQL ���������ӧҹ
$sql = "update web_addnew set status='$status'   where id='$id'";	// ��˹������ SQL �����ʴ�������
		mysql_query("SET NAMES tis620");     //   ��˹�����ҷ���繷֡�� tis620 ����������¹���ͧ
} elseif($dd == '200'){
	// ����� SQL ���������ӧҹ
$sql = "update web_addnew set status='$status1'   where id='$id'";	// ��˹������ SQL �����ʴ�������
		mysql_query("SET NAMES tis620");     //   ��˹�����ҷ���繷֡�� tis620 ����������¹���ͧ
} elseif($dd =='300'){
		// ����� SQL ���������ӧҹ
$sql = "update web_addnew set status='$status2'   where id='$id'";	// ��˹������ SQL �����ʴ�������
		mysql_query("SET NAMES tis620");     //   ��˹�����ҷ���繷֡�� tis620 ����������¹���ͧ
} else{
			// ����� SQL ���������ӧҹ
$sql = "update web_addnew set status='$status3'   where id='$id'";	// ��˹������ SQL �����ʴ�������
		mysql_query("SET NAMES tis620");     //   ��˹�����ҷ���繷֡�� tis620 ����������¹���ͧ
	}
$dbquery = mysql_db_query($dbname, $sql);
echo $status;
echo $status1;
echo $status2;
echo $status3;
echo $id;
	
?>
</body>
</html>