<?php include("global.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php
	if($_POST['email']){
		$q="INSERT INTO `newsletter` ( `letter_id` , `letter_email` , `letter_active` ) 
VALUES (
'', '".$_POST['email']."', '1'
);";
		$db->query($q);
		al('ทำการสมัครรับข่าวสารเรียบร้อยแล้ว');
?>
		<script language="javascript">
			top.document.newsletter.email.value="";
		</script>
<?php		
	}
?>
</head>

<body>
</body>
</html>
