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
//Post Action
if($_GET[action] == "post"){
	//Check data
	if(!$_POST[topic] OR !$_POST[change_date] OR !$_POST[change_month] OR !$_POST[change_year]){
		echo "<script language='javascript'>" ;
		echo "alert('��ҹ��͡���������ú��ǹ ��سҵ�Ǩ�ͺ')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
	//��ẹ�ɳ�
	checkban($_POST[topic]);
	checkban($_POST[detail]);
	checkban($_POST[post_name]);

	//Check Member
	if($_SESSION['login_true']){$ISMember = $_SESSION['login_true'];}else{$ISMember = "";}
	//Add Topic
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$db->add_db(TB_WEBBOARD,array(
		"category"=>"".$_POST[category]."",
		"topic"=>"".htmlspecialchars($_POST[topic])."",
		"change_date"=>"".htmlspecialchars($_POST[change_date])."",
		"change_month"=>"".htmlspecialchars($_POST[change_month])."",
		"change_year"=>"".htmlspecialchars($_POST[change_year])."",
		"detail"=>"".htmlspecialchars($_POST[detail])."",
		"post_name"=>"".htmlspecialchars($_POST[post_name])."",
		"is_member"=>"$ISMember",
		"ip_address"=>"".IPADDRESS."",
		"post_date"=>"".TIMESTAMP."",
		"update_date"=>"".TIMESTAMP."",
		"enable_comment"=>"$_POST[ENABLE_COMMENT]"
	)); 
	$db->closedb();
	$PostComplete = True ;
}
?>
<script type="text/javascript">
function showemotion() {
	emotion1.style.display = 'none';
	emotion2.style.display = '';
}
function closeemotion() {
	emotion1.style.display = '';
	emotion2.style.display = 'none';
}

function emoticon(theSmilie) {

	document.form2.detail.value += ' ' + theSmilie + ' ';
	document.form2.detail.focus();
}
</script>

<?
//�ʴ��š��Post
if($PostComplete){
	//Complete
?>
<BR><BR>
<TABLE width=90% align=center>
<TR>
	<TD><CENTER><IMG SRC="images/login-redirection-loader.gif" BORDER="0"></CENTER></TD>
</TR>
<TR>
	<TD><CENTER><B>�����š�з����ӡ���������º��������</B><BR><BR>
	<A HREF="?name=change">��ԡ��������ʹ���¡�÷�����</A>
	</CENTER></TD>
</TR>
</TABLE><BR><BR>
<?
}else{
	//Not Complete
?>
<FORM name="form2" METHOD=POST ACTION="index.php?name=change&file=post&action=post" enctype="multipart/form-data" >
<TABLE width="95%" align="center">
<TR>
	<TD width=150 align=right><IMG SRC="images/bullet.gif" BORDER="0" ALIGN="absmiddle"> <B>��Ǵ���� : </B></TD>
	<TD>
	<SELECT NAME="category">
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[BoardCat] = $db->select_query("SELECT * FROM ".TB_WEBBOARD_CAT." WHERE id = 1 ");
while($arr[BoardCat] = $db->fetch($res[BoardCat])){
	echo "<OPTION value=\"".$arr[BoardCat][id]."\">".$arr[BoardCat][category_name]."</OPTION>\n";
}
$db->closedb();
?>
	</SELECT>
	</TD>
</TR>
<TR>
	<TD width=150 align=right> <B>�ѹ����ͧ����š : </B></TD>
	<TD>
	<select name="change_date" id="date">
    				<option value="" selected>�ѹ</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
          </select>
&nbsp;
          <select name="change_month" id="month">
          		<option value="" selected>��͹</option>
                <option value="���Ҥ�">���Ҥ�</option>
                <option value="����Ҿѹ��">����Ҿѹ��</option>
                <option value="�չҤ�">�չҤ�</option>
                <option value="����¹">����¹</option>
                <option value="����Ҥ�">����Ҥ�</option>
                <option value="�Զع�¹">�Զع�¹</option>
                <option value="�á�Ҥ�">�á�Ҥ�</option>
                <option value="�ԧ�Ҥ�">�ԧ�Ҥ�</option>
                <option value="�ѹ��¹">�ѹ��¹</option>
                <option value="���Ҥ�">���Ҥ�</option>
                <option value="��Ȩԡ�¹">��Ȩԡ�¹</option>
                <option value="�ѹ�Ҥ�">�ѹ�Ҥ�</option>
              </select>
&nbsp;��&nbsp;<input type="text" name="change_year" id="year" maxlength="4"  />
	</TD>
</TR>
<TR>
	<TD width=150 align=right><IMG SRC="images/bullet.gif" BORDER="0" ALIGN="absmiddle"> <B>��Ǣ�� : </B></TD>
	<TD><INPUT TYPE="text" NAME="topic" style="width:300" class="inputform"></TD>
</TR>
<TR>
	<TD width=150 align=right valign=top><IMG SRC="images/bullet.gif" BORDER="0" ALIGN="absmiddle"> <B>��������´ : </B></TD>
	<TD><TEXTAREA NAME="detail" ROWS="10" style="width:350" class="textareaform"></TEXTAREA></TD>
</TR>
<TR>
	<TD width=150 align=right><IMG SRC="images/bullet.gif" BORDER="0" ALIGN="absmiddle"> <B>���ͧ͢��ҹ : </B></TD>
	<TD><input type="hidden" name="ENABLE_COMMENT" id="checkbox" checked="checked" value="1" />&nbsp;<INPUT TYPE="text" NAME="post_name" style="width:150" class="inputform" 
    <? if($_SESSION['login_true']){echo "value=\"".$_SESSION['login_true']."\" readonly style=\"color: #FF0000\" ";};?>></TD>
</TR>
<TR>
	<TD width=150 align=right><B></B></TD>
	<TD><INPUT TYPE="submit" value=" ��駡�з�� " > </TD>
</TR>
</TABLE>
</FORM>
<?
}
//������ʴ��ſ���� Post
?>

			<BR><BR>
			<!-- change -->
        </p>
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>
<? include "modules/index/footer.php"; ?>
<? } ?>