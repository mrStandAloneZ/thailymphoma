<? 
if(!session_is_registered("login_true")) {
//  url=index.php คำสั่งนี้จะให้ไปหน้าที่จะต้องกรอก user,pwd ถ้าอยู่โฟล์เดอร์อื่นให้เรียกให้ถูกนะครับ
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>โปรแกรมจัดตารางการทำงานของพยาบาล</a></h1>
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
<script type="text/javascript">
function showemotion() {
	emotion1.style.display = 'none';
	emotion2.style.display = '';
}
function closeemotion() {
	emotion1.style.display = '';
	emotion2.style.display = 'none';
}

function emoticon(theSmilie) {

	document.form2.COMMENT.value += ' ' + theSmilie + ' ';
	document.form2.COMMENT.focus();
}
</script>
<? include "modules/index/header.php" ; ?>
<?
$_GET['id'] = intval($_GET['id']);
//แสดงข่าวสาร/ประชาสัมพันธ์ 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[news] = $db->select_query("SELECT * FROM ".TB_NEWS." WHERE id='$_GET[id]' ");
$arr[news] = $db->fetch($res[news]);
$db->closedb ();
if(!$arr[news][id]){
	echo "<BR><BR><BR><BR><CENTER><IMG SRC=\"images/icon/notview.gif\" BORDER=\"0\" ><BR><BR><B>ไม่มีรายการข่าวสาร/ประชาสัมพันธ์นี้</B></CENTER><BR><BR><BR><BR>";
}else{
	$FileNewsTopic = "content/newsdata/".$arr[news][post_date].".txt";
	$file_open = @fopen($FileNewsTopic, "r");
	$content = @fread ($file_open, @filesize($FileNewsTopic));
	$Detail = stripslashes(FixQuotes($content));
	//ทำการเพิ่มจำนวนคนเข้าชม
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$q[Pageview] = "UPDATE ".TB_NEWS." SET pageview = pageview+1 WHERE id = '".$_GET[id]."' ";
	$sql[Pageview] = mysql_query ( $q[Pageview] ) or sql_error ( "db-query",mysql_error() );
	//ชื่อหมวดหมู่ 
	$res[category] = $db->select_query("SELECT * FROM ".TB_NEWS_CAT." WHERE id='".$arr[news][category]."' "); 
	$arr[category] = $db->fetch($res[category]);
	$db->closedb ();
?>
<div id="center">
				<p>
                <h1><?=$arr[news][topic];?></h1>
				<h2><?=$arr[category][category_name];?></h2>
				<?= ThaiTimeConvert($arr[news][post_date],"1","");?>
<?
if($_SESSION['admin_user']){
	//Admin Login Show Icon
?>
				  <a href="index.php?name=admin&file=news&op=news_edit&id=<? echo $arr[news][id];?>"><img src="images/admin/edit.gif" border="0" alt="แก้ไข" ></a> 
				  <a href="javascript:Confirm('index.php?name=admin&file=news&op=news_del&id=<? echo $arr[news][id];?>&prefix=<? echo $arr[news][post_date];?>','คุณมั่นใจในการลบหัวข้อนี้ ?');"><img src="images/admin/trash.gif"  border="0" alt="ลบ" ></a>
<?
}
?>						
				<br /><br />
					<?=$Detail;?>
				<br /><br />
					<div align="right">เข้าชม : <?=$arr[news][pageview];?></div>
<?
}
?>
        </p>
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>
<? include "modules/index/footer.php"; ?>
<? } ?>