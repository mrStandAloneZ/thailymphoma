
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
				<li class="current"><a href="index.php">˹����ѡ</a></li>
                <li class="current"><a href="index.php?name=knowledge&amp;file=index">�����͡����ҹ</a></li>
				<li><a href="#">��ǹ��Ҫԡ</a>
			 <!--	<ul>
                    	<li><a href="index.php?name=member&amp;file=member_detail">�٢�������ǹ���</a></li>
                      	<li><a href="index.php?name=member&amp;file=member_edit">��䢢�������ǹ���</a></li>
						<li><a href="index.php?name=member&amp;file=change_password">������ʼ�ҹ</a></li>
					</ul>
			-->
					<ul>
                    	<li><a href="index.php?name=member&amp;file=member_detail">�٢�������ǹ���</a></li>
                      	<li><a href="#"><font color="#CCCCCC">��䢢�������ǹ���</font></a></li>
						<li><a href="#" ><font color="#CCCCCC">������ʼ�ҹ</font></a></li>
					</ul>
				</li>
                	<li><a href="index.php?name=member&amp;file=add_data_pageone">Registry </a>
					
				</li> 
				<li><a href="index.php?name=contact">�Դ��ͼ�����</a></li>
                 <li><a href="index.php?name=member&amp;file=logout">�͡�ҡ�����</a></li>
			</ul>
			<div class="x"></div>
     <br />