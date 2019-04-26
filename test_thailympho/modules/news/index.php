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
	<? include "modules/index/header.php" ; ?>
    <div id="center">
    <p>
        <h1>ข่าวสาร โรงพยาบาล</h1>
			<form name="categoty">
			  <select name="category" onchange="MM_jumpMenu('parent',this,0)">
				<option value="?name=news">-- หมวดหมู่ทั้งหมด --</option>
<?
$_GET['category'] = intval($_GET['category']);
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM ".TB_NEWS_CAT." ORDER BY sort  ");
while($arr[category] = $db->fetch($res[category])){
	echo "<option value=\"?name=news&category=".$arr[category][id]."\" ";
	if($_GET[category] == $arr[category][id]){
		echo " Selected";
	}
	echo ">".$arr[category][category_name]."</option>\n";
}
$db->closedb ();
?>
			  </select>
			</form>
			<br /><br />
<?
//แสดงข่าวสาร/ประชาสัมพันธ์ 
if($_GET[category]){
	$SQLwhere = " category='".$_GET[category]."' ";
	$SQLwhere2 = " WHERE category='".$_GET[category]."' ";
}
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$limit = 20 ;
$SUMPAGE = $db->num_rows(TB_NEWS,"id","$SQLwhere");
$page=$_GET[page];
if (empty($page)){
	$page=1;
}
$rt = $SUMPAGE%$limit ;
$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
$goto = ($page-1)*$limit ;

$res[news] = $db->select_query("SELECT * FROM ".TB_NEWS." $SQLwhere2 ORDER BY id DESC LIMIT $goto, $limit ");
$count=0;
while($arr[news] = $db->fetch($res[news])){
	//ชื่อหมวดหมู่ 
	$res[category] = $db->select_query("SELECT category_name FROM ".TB_NEWS_CAT." WHERE id='".$arr[news][category]."' "); 
	$arr[category] = $db->fetch($res[category]);
?>
			<div class="products_box_news">
			<?= ThaiTimeConvert($arr[news][post_date],"","");?> : <A HREF="index.php?name=news&file=readnews&id=<?=$arr[news][id];?>" >
            <B><?=$arr[news][topic];?></B></A><?NewsIcon(TIMESTAMP, $arr[news][post_date], "images/icon_new.gif");?>
            </div>
<?
$count++;
if (($count%_NEWS_COL) == 0) { $count=0; }
}
$db->closedb ();
//จบการแสดงข่าวสาร
?>
<br />
				<?
				SplitPage($page,$totalpage,"index.php?name=news&category=".$_GET[category]."");
				echo $ShowSumPages ;
				echo "<BR>";
				echo $ShowPages ;
				?>
            </p>
            </div>
        
        <!-- sidebar -->
        
        <div class="x"></div>
        <div class="break"></div>

    </div>
    <? include "modules/index/footer.php"; ?>
	<? } ?>