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
<TABLE width="100%" align=center cellSpacing=5 cellPadding=0 border=0>
<?
$_GET['id'] = intval($_GET['id']);
//�ʴ���ԷԹ
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[event] = $db->select_query("SELECT id, date_event, cat1, cat2, cat3, cat4, cat5, UNIX_TIMESTAMP(date_event) AS date_event2  FROM ".TB_CALENDAR." WHERE id='$_GET[id]' ");
$arr[event] = $db->fetch($res[event]);
$db->closedb ();
?>
				<TR>
					<TD>
					<B><IMG SRC="images/icon/calendar.gif" WIDTH="16" HEIGHT="15" BORDER="0" ALIGN="absmiddle"> <FONT COLOR="#990000"><?= ThaiTimeConvert($arr[event][date_event2],"1","");?></FONT><BR><BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$arr[event][date_event];?></B><BR>
					<BR>
					</TD>
				</TR>
				<TR>
					<TD>
					<BR>
					<?=$cat1;?>
					<BR><BR>
					<BR><BR>
					</TD>
				</TR>
				<TR>
					<TD>
					<BR>
					<B>ŧ��С������� : </B><?= ThaiTimeConvert($arr[event][post_date],"1","");?>
<?
if($_SESSION['admin_user']){
	//Admin Login Show Icon
?>
				  <a href="?name=admin&file=editevent&id=<? echo $arr[event][id];?>"><img src="images/admin/edit.gif" border="0" alt="���" ></a> 
				  <a href="javascript:Confirm('?name=admin&file=delevent&id=<? echo $arr[event][id];?>','�س����㹡��ź��ԷԹ��Ǣ�͹�� ?');"><img src="images/admin/trash.gif"  border="0" alt="ź" ></a>
<?
}
?>	
					</TD>
				</TR>
			</TABLE>
<? } ?>