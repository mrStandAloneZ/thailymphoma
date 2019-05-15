<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test2</title>
</head>

<body>
<? 
		$massage = "ทดสอบ ภาษาไทย";
		
		$tis620 = iconv("utf-8", "tis-620", $massage);
		$utf8 = iconv("tis-620", "utf-8", $tis620);

		echo "test<br>";
		
		echo "ทดสอบ". $tis620;  
		echo "<br>ทดสอบ". $utf8;




?>

</body>
</html>