<?php
// ��˹� �ѹ���� �Ѩ�غѹ ����ͧ������
$date = date("j") ;
$month = date("n") ;

$click=$_POST['click'];
//$click2=$_POST['click2']

if(isset($click)and $click=="click") {
include("member_function.php") ;
}
else {
echo "<meta http-equiv='refresh' content='0; url=?name=admin&file=member&file=member_mail'>" ;
exit() ;
}
mysql_query("set NAMES tis620");	//���͡������

$sendmail=$_POST['sendmail'];
$edit=$_POST['edit'];

if(isset($sendmail)) { // ���������
$result = mysql_query("select * from ".TB_MAIL."") ;
$row = mysql_num_rows($result) ;
if($row == 0) { // ��Ǩ�ͺ����բ�ͤ��������ѧ ������������͡�ѹ�֡ŧ�ҹ������
echo "<br><center><font size='3' face='MS Sans Serif'>��سҡ�͡��ͤ�������ͧ����觡�͹��Ѻ ���Т�й���ѧ����բ�ͤ�������㹰ҹ������</font><br><br></center>" ;
form_edit() ; // �ʴ�������ҡ�ѧ����
}
else {
if(empty($edit) and isset($sendmail)) {
sendemail($admin_email) ;
}
}
}

if(isset($edit)) {
echo "<br><center><font size='3' face='MS Sans Serif'>��سҺѹ�֡��ͤ����ͧ��ҹŧ���ҹ������</font></center><br><br>" ;
form_edit() ;
}

// ��Һѹ�֡��ͤ��� 
if(isset($subject) and isset($message)) {
checkmessage($subject,$message) ;
}

	$subject_total=$_POST['subject_total'];
	$message_total=$_POST['message_total'];

// �������������Ҫԡ������
if(isset($subject_total) and isset($message_total)) {
sendmail_total($subject_total,$message_total,$admin_email) ;
}

?>
