<? 
if(!session_is_registered("login_true")) {
//  url=index.php ����觹�������˹�ҷ��е�ͧ��͡ user,pwd �����������������������¡���١�Ф�Ѻ
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>�к������èѴ��â��͡��ü�ҹ�ҹ����¹</a></h1>
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
	<A HREF="">��ԡ��������ʹ���¡�÷�����</A>
	</CENTER></TD>
</TR>
</TABLE><BR><BR>
<?
}else{
	//Not Complete
?>
<? date_default_timezone_set("Asia/Bangkok"); ?>
	<? 
						$date_today = date("d/m/");
						$date_today1 = date("Y")+'543';
						$string = $date_today1;
						$date_small = $date_today.substr($string,2);
					?>
					<? 
						$date_todayone = date("d");
						$date_todaymonth = date("m");
						$date_today9 = date("Y")+'543';
						$string1 = $date_today9;
						$date_small9 = substr($string1,2).$date_todaymonth.$date_todayone;
					?>
				<? 
				$date_today11 = date("d");
				$m_today12 = date("m");
				?>
<FORM name="form2" METHOD=POST ACTION="?name=member&file=show_member_add_new" enctype="multipart/form-data" >
<TABLE width="100%" align="center">
<TR>
	<TD colspan="2" ><h1><center>����ͧ�ͷ����</center></h1></TD>
	</TR>
<TR>
	<TD colspan="2" align=right><B>����Է�����෤����վ�Ш�����Ҿ�й���˹��</B>	  </TD>
	</TR>
<TR>
	<TD colspan="2" align=right><B>�ѹ���..<? echo $date_today11; ?>....��͹....<? echo $m_today12; ?>.....�.�. ..<? echo $date_today9; ?>......</B>	  </TD>
	</TR>
   
    <TR>
	<TD colspan="2" align=lift><B>����ͧ :  ���͹�š�����¹ </B></TD>
	</TR>
<TR>
	<TD colspan="2" > <B>���¹ �����/����ӹ�¡��........<input type="text" name="Title1"  width="300" class="inputform" />	</B></TD>
	</TR>
<TR>
	<TD colspan="2" align=lift><B>���¢�Ҿ��� : </B>
	  <input type="text" name="name"  width="300" class="inputform" />	  <b>�Ţ��Шӵ��:<input type="text" name="idname"  width="300" class="inputform" />	 </b></TD>
	</TR>
<TR>
	<TD colspan="2" align=lift valign=top> <B>�Ң��Ԫ� :  <input type="text" name="saka"  width="300" class="inputform" /></B><b>�Ҥ�Ԫ� : <input type="text" name="pa"  width="200" class="inputform" /></b><b>��鹻շ�� :  <input type="text" name="class" class="inputform" /> </b><b>��ͧ: <input type="text" name="room" class="inputform" /></b></TD>
	</TR>
<TR>
	<TD colspan="2" align="left" valign="top"><B>�դ������ʧ�� : ���͹�š�����¹�������ԪҴѧ��� </B> </TD>
    <tr>
		<td colspan="2" align="center"><textarea name="detail" rows="5" cols="60"><?=$_POST[DETAIL];?>
        </textarea></td>
      </tr>
	</TR>
    <tr>
    <td colspan="2"><br /><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�֧���¹�������ô�Ԩ�ó�</b></td>
    </tr>
    <tr>
    <td><b>�Ţ��Шӵ�Ǻѵû�ЪҪ�:</b></td>
    <td><input type="text" name="idcard"  width="300" class="inputform" /></td>
    </tr><br />
    <tr>
    <td align="right"></td>
    <td><br /><b>���ʴ������Ѻ���</b></td>
    </tr>
    <tr>
    <td align="right"><b>ŧ���� :</b></td>
    <td><input type="text" name="hand"  width="300" class="inputform" /></td>
     </tr>
<TR>
	<TD width=300 align=right><B></B></TD>
	<TD width="859"><INPUT TYPE="submit" value=" �׹�ѹ " > </TD>
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

<? } ?>