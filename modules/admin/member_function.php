<?php 
$date = date("j") ;
$month = date("n") ;
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

//mysql_select_db($db) ;
//mysql_query("set NAMES tis620");	//���͡������

?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Send mail For member</title>
<body background="../image/bg_member.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>      <TABLE width="100%" align="center" cellSpacing="0" cellPadding="0" border="0">
        <TR>
          <TD><B><IMG SRC="images/icon/plus.gif" BORDER="0" ALIGN="absmiddle"> <A HREF="?name=admin&file=main">˹����ѡ�������к�</A> &nbsp;&nbsp;<IMG SRC="images/icon/arrow_wap.gif" BORDER="0" ALIGN="absmiddle">&nbsp;&nbsp; <a href="?name=admin&file=member">�к���Ҫԡ</a> &nbsp;&nbsp;<IMG SRC="images/icon/arrow_wap.gif" BORDER="0" ALIGN="absmiddle">&nbsp;&nbsp; <a href="?name=admin&file=member&file=member_mail">����Ŷ֧��Ҫԡ</a></B> <BR>
              <BR>
              <?php
function form_edit() { // �ѧ����Ẻ����㹡�úѹ�֡��ͤ������� 
 ?>
              <form name="form1" method="post" action="?name=admin&file=member&file=member_program_mail">
                <table width="450" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#6666FF">
                  <tr>
                    <td colspan="2" bgcolor="#6666FF"><div align="center"><font color="#FFFFFF" size="3" face="MS Sans Serif, Tahoma, sans-serif"><strong>&nbsp;�ѹ�֡��ͤ���㹡���������¾��ѹ�Դ </strong></font></div></td>
                  </tr>
                  <tr bgcolor="#FFFFFF">
                    <td> <font size="3" face="MS Sans Serif, Tahoma, sans-serif">��Ǣ��</font></td>
                    <td>
                      <input name="subject" type="text" size="50" maxlength="150">
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">��ͤ���</font></td>
                    <td bgcolor="#FFFFFF"> <font size="3" face="MS Sans Serif, Tahoma, sans-serif">
                      <textarea name="message" cols="50" rows="10" id="message"></textarea>
                    </font></td>
                  </tr>
                  <tr>
                    <td colspan="2" bgcolor="#FFFFFF"><div align="center">
                        <input name="submit" type="submit" id="submit" value="�Ѵ�红�ͤ���">
&nbsp;
                <input name="clear" type="reset" id="clear" value= " ������ ">
                <input name="click" type="hidden" id="click" value="click">
                    </div></td>
                  </tr>
                </table>
            </form></TD>
        </TR>
      </TABLE></td>
  </tr>
</table>
<p>
  <?php
 }  // ���ѧ����Ẻ�����

$subject=$_POST['subject'];
$message=$_POST['message'];

function checkmessage($subject,$message) { //function �ѹ�֡��ͤ������� ���� ���
if(isset($message) and isset($subject)) {
$message = htmlspecialchars($message) ;
$message = nl2br($message) ;

$result = mysql_query("select count(*) from ".TB_MAIL."") ;
$count = mysql_result($result,0) ;
if($count==0) {
$result = mysql_query("insert into ".TB_MAIL." (subject,form_mail) values ('$subject','$message')") ;
if($result) {
echo "<meta http-equiv='refresh' content='0; url=?name=admin&file=member&file=member_mail'>" ;
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else {
echo "���˵آѴ��ͧ�ҧ���ҧ �������ö�ѹ�֡���������Ѻ" ;
}
} // ����õ�Ǩ�ͺ ����ѧ����բ�ͤ���
else { // ����Դ�բ�ͤ���㹰ҹ���������� ���ͧ�������¹���� �������
$result = mysql_query("update ".TB_MAIL." set form_mail='$message',subject='$subject'") ;
if($result) {
echo "<meta http-equiv='refresh' content='0; url=?name=admin&file=member&file=member_mail'>" ;
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
} // ������բ�ͤ�����������

} // ������բ�ͤ���
}// �� function �ѹ�֡��ͤ���

// ��������¾��ѹ�ӡԴ 
function sendemail($admin_email) { 
$date = date("j") ;
$month = date("n") ;
$from = "From:\"$admin_email\"<$admin_email>\r\n" ;

$result_mail = mysql_query("select * from ".TB_MAIL."") or die ("Err program") ;
$mail_arr = mysql_fetch_array($result_mail) ;

$subject = $mail_arr['subject'] ;

$message = $mail_arr['form_mail'] ;
$message = eregi_replace("<br />","",$message) ;

$result = mysql_query("select * from ".TB_MEMBER." where date='$date' and month='$month'") or die ("Err Program") ;
$num = mysql_num_rows($result) ;
if($num==0) {
echo "<br><br><center><font size='3' face='MS Sans Serif'><b>�����´��¤�Ѻ �������Ҫԡ����Դ�ѹ����Ѻ �֧�������ö���������</b>" ;
}
else {
while($dbarr = mysql_fetch_array($result)) {
$email_member = $dbarr['email'] ;
$send = mail($email_member,$subject,$message,$from) ;
}
if($send) {
echo "<br><br><center><font size='3' face='MS Sans Serif'><b>�к���Ѵ�������������Ҫԡ���º�������Ǥ�Ѻ</b></font></center>" ;
echo "<br><br><center><a href='?name=admin&file=member&file=member_mail'><font size='2' face='MS Sans Serif'><b>��Ѻ���˹���������</b></font></a></center>" ;
}
else {
echo "<br><br><center><font size='3' face='MS Sans Serif'><b>�������ö����������Ѻ</b></font></center>" ;
}
}
}

function sendmail_total($subject_total ,$message_total,$admin_email) {
$from = "From:\"$admin_email\"<$admin_email>" ;

$subject_total= $_POST['subject_total'] ;
$message_total = $_POST['message_total'] ;
$result = mysql_query("select email from ".TB_MEMBER."") ;
while($dbarr = mysql_fetch_array($result)) {
$send = mail($dbarr['email'],$subject_total,$message_total,$from) ;
}

if($send) {
echo "<br><br><center><font size='2' face='MS Sans Serif'><b>�����������Ҫԡ���������º�������Ǥ�Ѻ</b></font></center>" ;
echo "<meta http-equiv='refresh' content='2;url=?name=admin&file=member&file=member_mail'>" ;
//exit() ;
}
else {
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>���˵آѴ��ͧ�������ö�����������Ҫԡ���Ѻ</b></font><br><br>
<input type='button' value='��Ѻ��ͧ����' onclick='history.back();'></center>" ;
	showerror($showmsg);
}
}

 ?>
</p>
</body>

