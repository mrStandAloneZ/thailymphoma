<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<style type="text/css">
<!--
.calendar { 
    width:220;
    background-color: #FFFFFF;
}
-->
</style>
<TABLE width="90%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD>
					<h1>ตารางปฎิบัติงานประจำเดือน</h1>
                    <A HREF="?name=admin&file=member_category"><IMG SRC="images/admin/folders.gif"  BORDER="0" align="absmiddle"> รายการหมวดหมู่</A> &nbsp;&nbsp;&nbsp;<A HREF="?name=admin&file=member_category&op=newscat_add"><!--<IMG SRC="images/admin/opendir.gif"  BORDER="0" align="absmiddle"> เพิ่มหมวดหมู่--></A><BR><BR>
						<CENTER>
						<?
		// If no month/year set, use current month/year
		 $d = getdate(time());
		$month=$_GET['month'];
		$year=$_GET['year'];
		if ($month == "")
		{
			$month = $d["mon"];
		}
		if ($year == "")
		{
			$year = $d["year"];
		}
		$cal = new MyCalendar;
		echo $cal->getMonthView($month, $year);
		?>
						</CENTER>
						<BR><BR>
					</TD>
				</TR>
			</TABLE>