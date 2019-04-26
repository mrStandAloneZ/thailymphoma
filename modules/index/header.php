
<div id="wrapper">
		<div id="logo">
		
</div>
			<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='".$_SESSION['login_true']."'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
?>
		<div id="content">
        <table cellpadding="0" cellspacing="0"><tr bgcolor="#ffffff"><td ><a href="index.php"><img src="images/logo2.jpg" width="977" height="140" /></a></td></tr>
		<tr><td height="2" bgcolor="#ffe6ec"></td></tr>
		<tr><td>

		<!-- main menu -->
			<ul class="menu" id="jMenu">
				<li class="current"><a href="index.php">หน้าหลัก</a></li>
                <li class="current"><a href="index.php?name=knowledge&amp;file=index">คู่มือการใช้งาน</a></li>
				<li><a href="#">ส่วนสมาชิก</a>
			 <!--	<ul>
                    	<li><a href="index.php?name=member&amp;file=member_detail">ดูข้อมูลส่วนตัว</a></li>
                      	<li><a href="index.php?name=member&amp;file=member_edit">แก้ไขข้อมูลส่วนตัว</a></li>
						<li><a href="index.php?name=member&amp;file=change_password">แก้ไขรหัสผ่าน</a></li>
					</ul>
			-->
					<ul>
                    	<li><a href="index.php?name=member&amp;file=member_detail">ดูข้อมูลส่วนตัว</a></li>
                      	<li><a href="#"><font color="#CCCCCC">แก้ไขข้อมูลส่วนตัว</font></a></li>
						<li><a href="#" ><font color="#CCCCCC">แก้ไขรหัสผ่าน</font></a></li>
					</ul>
				</li>
                	<li><a href="index.php?name=member&amp;file=add_data_pageone">Registry </a>
					
				</li> 
				<li><a href="index.php?name=contact">ติดต่อผู้ดูแล</a></li>
                 <li><a href="index.php?name=member&amp;file=logout">ออกจากโปรแกรม</a></li>
			</ul>
			<div class="x"></div>
     <br />