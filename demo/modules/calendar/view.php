<? 
if(!session_is_registered("login_true")) {
//  url=index.php ����觹�������˹�ҷ��е�ͧ��͡ user,pwd �����������������������¡���١�Ф�Ѻ
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>������Ѵ���ҧ��÷ӧҹ�ͧ��Һ��</a></h1>
		</div>
		
		<div id='content'>
			
			<div class='x'></div>
			<!-- main content -->
			<div id='login'>
            	<div class='space'></div>
                <div class='space'></div>
				<h1>��س� Login �������к�</h1>
				<p>
				<img src='images/login-redirection-loader.gif' alt='login-redirection-loader' />
				";
	echo "<meta http-equiv='refresh' content='5;url=index.php?name=member&amp;file=login'>" ; 
	echo "	</p>
                </div>
			
			<!-- sidebar -->
			
			<div class='x'></div>
			<div class='break'></div>

		</div> " ;
 include 'modules/index/footer.php'; 
} else {
?>
<? include "modules/index/header.php" ; ?>
	<div id="center">
    <p>
    <?
$_GET['id'] = intval($_GET['id']);
//�ʴ���ԷԹ
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[event] = $db->select_query("SELECT id, date_event, cat1, cat2, cat3, cat4, cat5, UNIX_TIMESTAMP(date_event) AS date_event2  FROM ".TB_CALENDAR." WHERE id='$_GET[id]' ");
$arr[event] = $db->fetch($res[event]);
$db->closedb ();
?>
<h1>���ҧ��Ժѵԧҹ��Ш��ѹ</h1>
<table id="calendar">
<tr><td class="calendarHeader" colspan="6" align="center" ><?= ThaiTimeConvert($arr[event][date_event2],"1","");?></td></tr>
<tr>
<td class="calendarHeader" width="120px">���˹����	&frasl; ����</td>
<td class="calendarHeader" width="120px">08.00 - 16.00</td>
<td class="calendarHeader" width="120px">08.00 - 16.00</td>
<td class="calendarHeader" width="120px">16.00 - 00.00</td>
<td class="calendarHeader" width="120px">00.00 - 08.00</td>
<td class="calendarHeader" width="120px"> 2�ѹ </td>
</tr>
<tr><td class="calendarHeader">���˹�����</td><td bgcolor="#c0f573"><?=$arr[event][cat1];?></td><td></td><td></td><td></td><td></td></tr>
<tr><td class="calendarHeader">������</td><td></td><td bgcolor="#c0f573"><?=$arr[event][cat2];?></td><td></td><td></td><td></td></tr>
<tr><td class="calendarHeader">��ú���</td><td></td><td></td><td bgcolor="#c0f573"><?=$arr[event][cat3];?></td><td></td><td></td></tr>
<tr><td class="calendarHeader">��ô֡</td><td></td><td></td><td></td><td bgcolor="#c0f573"><?=$arr[event][cat4];?></td><td></td></tr>
<tr><td class="calendarHeader">��ش�ҹ</td><td></td><td></td><td></td><td></td><td bgcolor="#c0f573"><?=$arr[event][cat5];?></td></tr>
</table>
        </p>
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>
<? include "modules/index/footer.php"; ?>
<? } ?>