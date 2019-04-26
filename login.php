	<?
	session_start();
	require_once("mainfile.php");
	$PHP_SELF = "index.php";
	GETMODULE($_GET[name],$_GET[file]);
	if(!session_is_registered("login_true")) {
	?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="th" lang="th">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="prettyphoto/css/prettyPhoto.css" media="screen" />
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/java.js"></script>
	<script type="text/javascript" src="pngFix/jquery.pngFix.js"></script>
	<script type="text/javascript" src="prettyphoto/js/jquery.prettyPhoto.js"></script>
	<!--[if IE 6]>
	<style>
		#pitch .infoline {margin-top:-74px;}
		.post-options {margin:-55px 0 40px 138px;}
	</style>
	<![endif]-->
</head>
<body>
	<div id="wrapper">
		<div id="logo">
			<h1><a href="index.html"></a></h1>
		</div>
		
		<div id="content">
        
<form method="post" action="check_login.php">
<p>
    <label for="user_login" id="lname">Username:</label>
    <input type="text" class="text" name="user_login" id="name" />
</p>

<p>
    <label for="pwd_login" id="lemail">Password:</label>
    <input type="text" class="text" name="pwd_login" id="email" />
</p>
<div class="x"></div>

<input type="submit" class="submit" name="login_member" value="Login" />
						
</form>
		</div>
</body>
</html>
	<? 
	} else { 
	echo"<meta http-equiv='refresh' content='1;url=index.php'>" ;
	} ?>