<?php
$forget=$_POST['forget'];
if(isset($forget) and $forget=="forget") {
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

//�к���Ҫԡ����� maxsite 1.10 �Ѳ���� www.narongrit.net
$user_login=$_POST['user_login'];
$result = mysql_query("select user from ".TB_MEMBER." where user='$user_login' ") or die("Err Database") ;
$numrow = mysql_num_rows($result) ;

if($numrow==0) {
$status = "<center><font size='3' face='MS Sans Serif'><b>����ժ��� $user_login ����㹰ҹ�����Ť�Ѻ</b></font></center>" ;
}
else {

$result = mysql_query("select * from ".TB_MEMBER." where user='$user_login' ") ;
$dbarr = mysql_fetch_array($result) ;
$email = $dbarr['email'] ;
if($result) {
$from = "From:\"$admin_email\"<$admin_email>" ;
$subject = "��������ʼ�ҹ㹡���������к��ͧ�س�Ф�Ѻ" ;
$message = "���ʴդ�Ѻ �س $dbarr[name]

username 㹡���������к��ͧ�س��� $dbarr[user]
password 㹡���������к��ͧ�س��� $dbarr[password]

�͢ͺ�س�ҡ��Ѻ �������ǹ˹�觢ͧ����ҹ  $home " ;

if(mail($email,$subject,$message,$from)) {
$status = "<br><br><center><font size='3' face='MS Sans Serif'><b>��й���к��ͧ����������ʼ�ҹ�ͧ�س价ҧ������ $email ���º�������Ǥ�Ѻ<br>
���ѡ���� �к��йӷ�ҹ��Ѻ��ѧ˹����ѡ</b></font></center><br><br>" ;
echo "<meta http-equiv='refresh' content='2; url =index.php'>" ;
}
else {
$status = "<center><font size='3' face='MS Sans Serif'><b>�к��������ö�������������ҹ��</b></font></center>" ;
}
}
}

}
else {
$status = "" ;
}

?>



<html>
<head>
<title>Member zone</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td width="32" valign="top"><IMG src="images/fader.gif" border=0></td>
    <td width="688"><p><IMG src="images/topfader.gif" border=0><br>
&nbsp;&nbsp;<IMG SRC="images/menu/textmenu_member.gif" BORDER="0"></p>
	<form action="?name=member&file=forget_pwd" method="post">
              
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
		            <tr valign="top"> 
                  <td colspan="2"> 
                    
                     
                      
                       <div align="center"><p><font color="#000000" size="2"><strong><?php echo $status ; ?></strong></font></p>
                      <p><font color="#000000" size="2"><strong>��سҡ�͡ 
                    username ���㹡���������к����¤�Ѻ</strong></font></p>
                    </div></td>
      </tr>
	
      <tr> 
                  
            <td align="right" bgcolor="#FFFFFF"><font size="2"><strong>username</strong></font></td>
        <td bgcolor="#FFFFFF"><input name="user_login" type="text" id="user_login"></td>
      </tr>
	  <tr> 
                  
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
				            <td bgcolor="#FFFFFF"> 
            <input type="submit" name="Submit" value="send password">
            <input name="forget" type="hidden" id="forget" value="forget">
            &nbsp; </td>
      </tr>
	        <tr> 
                  <td colspan="2" bgcolor="#FFFFFF"><div align="center">
                    <p>&nbsp;</p>
                    <p><strong><font color="#FF0000" size="1" face="MS Sans Serif, Tahoma, sans-serif">�к��������ʼ�ҹ价ҧ����Ţͧ�س �ҡ��辺� inbox ����Ǩ�ͺ� junk box ��Ѻ </font></strong></p>
                    <p><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif"><br>
                      <br>
                        </font></strong></p>
                  </div></td>
      </tr>
	  
    </table>
	
</form>
	</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
