<?
session_start();
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
session_unregister("admin_user");
session_unregister("admin_pwd");
?>
<TABLE width="95%" style="margin:auto;">
				<TR>
					<TD>
                    <BR><BR>
                    <CENTER><IMG SRC="images/login-redirection-loader.gif" BORDER="0"><BR><BR>
                    <FONT COLOR="#336600"><B>ได้ทำการออกจากระบบเรียบร้อยแล้ว</B></FONT>
                    <meta http-equiv='refresh' content='3; url=index.php?name=index'>
                    </CENTER>
                    <BR><BR>
					</TD>
				</TR>
			</TABLE>