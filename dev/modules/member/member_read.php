<?php
#### ʤ��껹����㹡���� �����͡�Թ�����ѧ ����ʤ��껹��������˹�ҷ��س��ͧ�������� ####
session_start() ;
if(!session_is_registered("login_true")) {
//  url=index.php ����觹�������˹�ҷ��е�ͧ��͡ user,pwd �����������������������¡���١�Ф�Ѻ
	echo "<center><font size='3'>���� �س�ѧ���������Ҫԡ �ҡ�д���������´��Ҫԡ��ҹ��蹵�ͧ��Ѥ���Ҫԡ��� login ��͹��Ѻ ���ѡ���� �к��ӹӤس价��˹��ŧ����¹</font></font>";
	echo "<meta http-equiv='refresh' content='2;url=?name=member'>" ; 
} else {
### ������� ###
//�к���Ҫԡ����� maxsite 1.10 �Ѳ���� www.narongrit.net

?>

<html>
<head>

<!-- ���� ᶺ�� -->
<script language="javascript"> 
function mOvr(src,clrOver){ 
if (!src.contains(event.fromElement)){ 
src.style.cursor = 'hand'; 
src.bgColor = clrOver; 
} 
} 
function mOut(src,clrIn){ 
if (!src.contains(event.toElement)){ 
src.style.cursor = 'default'; 
src.bgColor = clrIn; 
} 
} 
</script> 

<title>���ʴդ�Ѻ��Ҫԡ���� ��� ��Ҫԡ��ҷء��ҹ</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$id=$_GET['id'];

$result = mysql_query("select * from member where id='$id'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;


?>
<table width="720"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="32" rowspan="2" valign="top"><IMG src="images/fader.gif" border=0></td>
    <td width="688"><h2><IMG src="images/topfader.gif" border=0><br>
&nbsp;&nbsp;<IMG SRC="images/menu/textmenu_member.gif" BORDER="0"></h2>
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="5">
      <tr>
        <td colspan="5"><strong><font size="4"><img src="images/human.gif" > <font color="#FF3300"><u><font color="#0000FF">�ʴ���������´�ͧ <?php echo $dbarr['user'] ; ?>
        </font></u></font></font></strong></td>
      <tr>
        <td width="30%" align="right"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">�����Ţ��Ҫԡ : </font></strong></td>
        <td width="22%">
          <div align="left"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dbarr['member_id'] ; ?></font></div></td>
        <td width="11%" align="right"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">�ٻ��Ҫԡ : </font></strong></td>
        <td width="37%" rowspan="5" valign="top">
          <div align="left">
		  <?
					//Show Picture
					if($dbarr[member_pic]){
						$postpicupload = @getimagesize ("member_pic/".$dbarr[member_pic]."");
						if ( $postpicupload[0] > _MEMBER_LIMIT_PICWIDTH ) {
							$PicUpload = "<img src='member_pic/".$dbarr[member_pic]."' width='"._MEMBER_LIMIT_PICWIDTH."' border=\"1\" ALIGN='absmiddle' class='membericon'>";
							}else{
							$PicUpload = "<img src='member_pic/".$dbarr[member_pic]."' border=\"1\" ALIGN='absbottom' class='membericon'>";
							}
						echo $PicUpload ;
					}else{ echo "<img src='member_pic/member_nrr.gif' border='1' ALIGN='absbottom' class='membericon'> "; };
					?>		  
		  </div>
          <div align="left"></div></td>
      </tr>
      <tr>
        <td width="30%" align="right"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">Username : </font></strong></td>
        <td>
          <div align="left"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dbarr['user'] ; ?></font></div></td>
        <td width="11%" align="right"><strong></strong></td>
        </tr>
      <tr>
        <td width="30%" align="right"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">����-���ʡ�� : </font></strong></td>
        <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dbarr['name'] ; ?></font></td>
        <td width="11%" align="right">&nbsp;</td>
        </tr>
      <tr>
        <td width="30%" align="right"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">�� :</font></strong></td>
        <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dbarr['sex'] ; ?></font></td>
        <td width="11%" align="right">&nbsp;</td>
        <tr>
        <td width="30%" align="right"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">�ѧ��Ѵ : </font></strong></td>
        <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dbarr['province'] ; ?></font></td>
        <td width="11%" align="right">&nbsp;</td>
        <tr>
        <td width="30%" align="right"><font size="1" face="MS Sans Serif, Tahoma, sans-serif"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">email : </font></strong></font></td>
        <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dbarr['email'] ;?></font></td>
        <td width="11%" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      <tr>
        <td width="30%" align="right"><font size="1" face="MS Sans Serif, Tahoma, sans-serif"><strong>��Ѥ������ : </strong></font></td>
        <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dbarr['signup'] ; ?></font></td>
        <td width="11%" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      <tr>
        <td align="right"><font size="1" face="MS Sans Serif, Tahoma, sans-serif"><strong>Login ����ش����� : </strong></font></td>
        <td><?php echo $dbarr['lastlog'] ; ?></a></font></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      <tr>
        <td width="30%" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="11%">&nbsp;</td>
        <td>&nbsp;</td>
      </table></td>
  </tr>
</table>
<td valign="top"><div align="center">
  </div></td>
</body>
</html>
<? } ?>