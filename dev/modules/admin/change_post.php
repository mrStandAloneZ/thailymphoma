<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
    <TR>
        <TD>
&nbsp;&nbsp;&nbsp;<h1>&nbsp;&nbsp;&nbsp;&nbsp;������Ǣ�͡���š����¹���</h1>
<?
//Post Action
if($_GET[action] == "post"){
	//Check data
	if(!$_POST[topic] OR !$_POST[category] OR !$_POST[detail] OR !$_POST[post_name]){
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
	<TD><CENTER><B>��������Ǣ����ӡ���������º��������</B><BR><BR>
	<A HREF="admin.php?name=admin&amp;file=change">��ԡ��������ʹ���¡�÷�����</A>
	</CENTER></TD>
</TR>
</TABLE><BR><BR>
<?
}else{
	//Not Complete
?>
<FORM name="form2" METHOD=POST ACTION="admin.php?name=admin&file=change_post&action=post" enctype="multipart/form-data" >
<TABLE width="95%" align="center">
<TR>
	<TD width=150 align=right><IMG SRC="images/bullet.gif" BORDER="0" ALIGN="absmiddle"> <B>��Ǵ���� : </B></TD>
	<TD>
	<SELECT NAME="category">
	<OPTION value="">-- ��س����͡��Ǵ���� --</OPTION>
<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[BoardCat] = $db->select_query("SELECT * FROM ".TB_WEBBOARD_CAT." ORDER BY sort ");
while($arr[BoardCat] = $db->fetch($res[BoardCat])){
	echo "<OPTION value=\"".$arr[BoardCat][id]."\">".$arr[BoardCat][category_name]."</OPTION>\n";
}
$db->closedb();
?>
	</SELECT>
	</TD>
</TR>
<TR>
	<TD width=150 align=right> <B>�ѹ����ͧ����š���ͨ�ҧ : </B></TD>
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
&nbsp;��&nbsp;<input type="text" name="change_year" id="" maxlength="4"  />
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
	<TD><input type="hidden" name="ENABLE_COMMENT" id="checkbox" checked="checked" value="1" />&nbsp;<INPUT TYPE="text" NAME="post_name" style="width:150" class="inputform" <?if($_SESSION['admin_user']){echo "value=\"".$_SESSION['admin_user']."\" readonly style=\"color: #FF0000\" ";};?>></TD>
</TR>
<TR>
	<TD width=150 align=right><B></B></TD>
	<TD><INPUT TYPE="submit" value=" �����Ǣ�� " > </TD>
</TR>
</TABLE>
</FORM>
<?
}
//������ʴ��ſ���� Post
?>
        </TD>
    </TR>
</TABLE>