<? 
$signup = date("j/n/").(date("Y")+543) ;
if(!session_is_registered("login_true")) {
//  url=index.php ����觹�������˹�ҷ��е�ͧ��͡ user,pwd �����������������������¡���١�Ф�Ѻ
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>�к�ŧ����¹������ adult acute leukemia � registry</a></h1>
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
                    <h1>�Դ��ͼ������к�</h1>
					<FORM METHOD=POST ACTION="index.php?name=contact&amp;file=contact">
					<TABLE width="80%" align="center">
					<TR>
						<TD align="right"><B>��Ǣ�� : </B></TD>
						<TD><INPUT TYPE="text" NAME="subject" size="40" value="<?=$_POST[SUBJECT];?>"></TD>
					</TR>
					<TR>
						
					</TR>
					<TR>
						<TD align="right" valign="top"><B>��ͤ��� : </B></TD>
						<TD><TEXTAREA NAME="detail" ROWS="5" COLS="40"><?=$_POST[DETAIL];?></TEXTAREA></TD>
					</TR>
					<TR>
						<TD align="right" valign="top"><B></B></TD>
						<TD><input type="hidden" name="name"  <?if($_SESSION['login_true']){echo "value=\"".$_SESSION['login_true']."\" readonly style=\"color: #FF0000\" ";};?> /><INPUT TYPE="submit" class="submit" value=" �������� "> </TD>
					</TR>
					</TABLE>
					</FORM>
<?
//}
?>
					<BR><BR>
</p>
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>
<? include "modules/index/footer.php"; ?>
<? } ?>