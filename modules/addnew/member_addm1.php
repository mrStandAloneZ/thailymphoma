
<?
session_start() ;
if(!session_is_registered("login_true")) {
exit() ;
echo " bgcolor=FFFFFF";
}
### ������� ###
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title></title>
</head>
<body>
<h1>�ѹ�֡��������������</h1>
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_ADMIN." where username='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
?>


  <?  	
												mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");
												
												// ���͡�ҹ������
												mysql_select_db($dbname) or die("���͡�ҹ�����������");
												
												// ����� SQL ���������ӧҹ
												$sql = "insert into $tblname (date, month,year,Title,Title1,name,idname,saka,pa,class,room,detail,idcard,hand) values ('$date', '$month','$year','$Title','$Title1','$name','$idname','$saka','$pa','$class','$room','$detail','$idcard','$hand')";		
											$dbquery = mysql_db_query($dbname, $sql);

// �Դ��õԴ��Ͱҹ������
mysql_close();


	

?>
				
								   
</body>
</html>
   
