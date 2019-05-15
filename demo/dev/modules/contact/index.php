<? 
$signup = date("j/n/").(date("Y")+543) ;
if(!session_is_registered("login_true")) {
//  url=index.php คำสั่งนี้จะให้ไปหน้าที่จะต้องกรอก user,pwd ถ้าอยู่โฟล์เดอร์อื่นให้เรียกให้ถูกนะครับ
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>ระบบลงทะเบียนข้อมูล adult acute leukemia – registry</a></h1>
		</div>
		
		<div id='content'>
			
			<div class='x'></div>
			<!-- main content -->
			<div id='login'>
            	<div class='space'></div>
                <div class='space'></div>
				<h1>กรุณา Login เข้าสู่ระบบ</h1>
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
                    <h1>ติดต่อผู้ดูแลระบบ</h1>
					<FORM METHOD=POST ACTION="index.php?name=contact&amp;file=contact">
					<TABLE width="80%" align="center">
					<TR>
						<TD align="right"><B>หัวข้อ : </B></TD>
						<TD><INPUT TYPE="text" NAME="subject" size="40" value="<?=$_POST[SUBJECT];?>"></TD>
					</TR>
					<TR>
						
					</TR>
					<TR>
						<TD align="right" valign="top"><B>ข้อความ : </B></TD>
						<TD><TEXTAREA NAME="detail" ROWS="5" COLS="40"><?=$_POST[DETAIL];?></TEXTAREA></TD>
					</TR>
					<TR>
						<TD align="right" valign="top"><B></B></TD>
						<TD><input type="hidden" name="name"  <?if($_SESSION['login_true']){echo "value=\"".$_SESSION['login_true']."\" readonly style=\"color: #FF0000\" ";};?> /><INPUT TYPE="submit" class="submit" value=" ส่งอีเมล์ "> </TD>
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