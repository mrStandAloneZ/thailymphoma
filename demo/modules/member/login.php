<div id="wrapper">


	<div id="content">
		<div id="logo">
			<h1><a href="index.php"><img src="images/logo2.jpg" width="940" height="140" /></a></h1>
		</div>
		<div class="x"></div>
		<!-- main content -->
		<center><h1>ระบบลงทะเบียนข้อมูลของ The Thai Lymphoma Study Group<br />
			(Thai Lymphoma Registry)
		</h1></center>

		<div id="login">
			<div class="space"></div>
			<div class="space">Login เข้าสู่ระบบ</div>

			<p>
				<form method="post" action="index.php?name=member&amp;file=login_check">
					<p>
						<label for="user_login" id="lname">USERNAME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="text" class="text" name="user_login" id="name" />
						<p>
							<label for="pwd_login" id="lemail">PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<input type="password" class="text" name="pwd_login" id="email" />

							<div class="x"></div>

							<input type="submit" class="submit" name="login_member" value="Login" />
						</p>
					</form>
				</p>
			</div>

			<!-- sidebar -->

			<div class="x"></div>
			<div class="break"></div>

		</div>
		<a href="admin.php?name=admin&file=login">[admin]</a><?php include "modules/index/footer.php";?>
