

	<style type="text/css">





	select {
    width: 90%;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
        background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; 
}
input[type=text]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=password]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
button  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=button]  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}

input[type=submit]  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#aa2125;

}

textarea{
      width: 80%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
}
</style>
<div id="wrapper">


	<div id="content"  style="background-color:#f7f7f7;">
		<div id="logo">
			<h1><a href="index.php"><img src="images/logo2.jpg" width="955" height="140" /></a></h1>
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

							<input type="submit" class="submit" name="login_member" value="Login" style="background-color:#aa2125;color:#FFFFFF;cursor:pointer;width:120px;" />
						</p>
					</form>
				</p>
			</div>

			<!-- sidebar -->

			<div class="x"></div>
			<div class="break"></div>

		</div>
		<a href="admin.php?name=admin&file=login">[admin]</a><?php include "modules/index/footer.php";?>
