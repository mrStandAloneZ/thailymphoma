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
<br />
<? include "modules/index/header.php" ; ?>
<?
$_GET['id'] = intval($_GET['id']);
//แสดงสาระน่ารู้ 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[knowledge] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE." WHERE id='$_GET[id]' ");
$arr[knowledge] = $db->fetch($res[knowledge]);
$db->closedb ();
if(!$arr[knowledge][id]){
	echo "<BR><BR><BR><BR><CENTER><IMG SRC=\"images/icon/notview.gif\" BORDER=\"0\" ><BR><BR><B>ไม่มีรายการสาระน่ารู้นี้</B></CENTER><BR><BR><BR><BR>";
}else{
	$FileNewsTopic = "content/knowledgedata/".$arr[knowledge][post_date].".txt";
	$file_open = @fopen($FileNewsTopic, "r");
	$content = @fread ($file_open, @filesize($FileNewsTopic));
	$Detail = stripslashes(FixQuotes($content));
	//ทำการเพิ่มจำนวนคนเข้าชม
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$q[Pageview] = "UPDATE ".TB_KNOWLEDGE." SET pageview = pageview+1 WHERE id = '".$_GET[id]."' ";
	$sql[Pageview] = mysql_query ( $q[Pageview] ) or sql_error ( "db-query",mysql_error() );
	//ชื่อหมวดหมู่ 
	$res[category] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE_CAT." WHERE id='".$arr[knowledge][category]."' "); 
	$arr[category] = $db->fetch($res[category]);
	$db->closedb ();
?>
<!-- main content -->
			<div id="center">
				<h1><?=$arr[knowledge][topic];?></h1>
				<p>
				<TR>
					<TD>
                    <h2><?=$arr[category][category_name];?></h2>
					<BR>
					<?= ThaiTimeConvert($arr[knowledge][post_date],"1","");?>
<?
if($_SESSION['admin_user']){
	//Admin Login Show Icon
?>
				  <a href="admin.php?name=admin&file=knowledge&op=article_edit&id=<? echo $arr[knowledge][id];?>"><img src="images/admin/edit.gif" border="0" alt="แก้ไข" ></a> 
				  <a href="javascript:Confirm('admin.php?name=admin&file=knowledge&op=article_del&id=<? echo $arr[knowledge][id];?>&prefix=<? echo $arr[knowledge][post_date];?>','คุณมั่นใจในการลบหัวข้อนี้ ?');"><img src="images/admin/trash.gif"  border="0" alt="ลบ" ></a>
<?
}
?>					
					<BR><BR>
					</TD>
				</TR>
				<TR>
					<TD>
					<BR>
					<?=$Detail;?>
					<BR><BR>
					เข้าชม : <?=$arr[knowledge][pageview];?>
					<BR><BR>
					</TD>
				</TR>				
<?
}
?>
			</TABLE>
			<BR><BR>
			
<?
if($arr[knowledge][enable_comment]){

	//Check Comment
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res[comment] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE_COMMENT." WHERE knowledge_id='".$arr[knowledge][id]."' ORDER BY id ");
	$count=0;
	while($arr[comment] = $db->fetch($res[comment])){
		$count  ++;
?>
			<TABLE width=80% align="center" >
			<TR>
				<TD><h2>ความคิดเห็นที่ <?=$count;?></h2>
				<?if($_SESSION['admin_user']){echo " <A HREF=\"?name=knowledge&file=delete_comment&id=".$_GET[id]."&comment=".$arr[comment][id]."\"><IMG SRC=\"images/admin/trash.gif\" WIDTH=\"20\" HEIGHT=\"20\" BORDER=\"0\" ALIGN=\"absmiddle\"></A>";};?>
				<BR><?= ThaiTimeConvert($arr[comment][post_date],"1","1");?>
				</TD>
			</TR>
			<TR>
				<TD><?=banword(CHANGE_EMOTICON(BBCODE($arr[comment][comment])));?></TD>
			</TR>
			<TR>
				<TD><B><FONT COLOR="#990000">โดย : </FONT></B> <?=$arr[comment][name];?> &nbsp;&nbsp; <FONT COLOR="#990000"><B>ไอพี : </B></FONT><?=$arr[comment][ip];?>
				</TD>
			</TR>
			</TABLE>
			<BR>
<?
	}
	$db->closedb ();
?>
			<!-- Enable Comment -->
						<FORM NAME="form2" METHOD=POST ACTION="index.php?name=knowledge&file=comment&id=<?=$_GET[id];?>">
						<TABLE width="450" align="center">
						<TR>
							<TD width="80" align="right"><B>ชื่อ/Email : </B></TD>
							<TD><INPUT TYPE="text" NAME="NAME" style="width:300;" <?if($_SESSION['login_true']){echo "value=\"".$_SESSION['login_true']."\" readonly ";};?>></TD>
						</TR>
						<TR>
							<TD width="80" align="right" valign=top><B>ความคิดเห็น : </B></TD>
							<TD><TEXTAREA NAME="COMMENT" ROWS="7" COLS="50%" style="width:300;"></TEXTAREA></TD>
						</TR>
						<TR>
							<TD width="80" align="right" valign=top></TD>
							<TD><INPUT TYPE="submit" value=" แสดงความคิดเห็น " class="submit"><BR>
							<BR>กรุณาใช้คำพูดที่สุภาพ และอย่าใช้คำพูดที่พาดพิงถึงบุคคลอื่นให้เสียหาย ขอขอบคุณที่ให้ความร่วมมือ
							</TD>
						</TR>
						</TABLE>
						</FORM>
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