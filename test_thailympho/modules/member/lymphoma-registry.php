
<?
session_start();


?>
<?

?>


<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_institute = "-1";
if (isset($_SESSION['username'])) {
  $colname_institute = $_SESSION['username'];
}



$institute_i = $row_institute['institute'];

$ins_max = "-1";
if (isset($institute_i)) {
  $ins_max = $institute_i;
}



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Insert Lymphoma Registry -- ThaiLymphoma.org</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #eeeeee;
}
-->
</style>
<style>
.contentbox {width:400px; overflow:hidden;}
</style>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/div.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/lib/prototype.js" type="text/javascript"></script>
<script src="Scripts/src/scriptaculous.js" type="text/javascript"></script>
<script src="Scripts/src/effects.js" type="text/javascript"></script>
<script src="Scripts/src/unittest.js" type="text/javascript"></script>
<script language="javascript" src="include/common.js"></script>
<script language="javascript" src="include/registry.js"></script>
<style type="text/css">
<!--
a:link {
	text-decoration: underline;
}
a:visited {
	text-decoration: underline;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: underline;
}
-->
</style>
</head>
<body>
<div id="outer-wrapper">
    <div id="top-banner">
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','780','height','148','src','../flash/logo','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','menu','false','movie','../flash/logo' ); //end AC code
      </script>
      <noscript>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="780" height="148">
        <param name="movie" value="../flash/logo.swf" />
        <param name="quality" value="high" />
        <param name="menu" value="false" />
        <embed src="../flash/logo.swf" width="780" height="148" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" menu="false"></embed>
      </object>
      </noscript>
    </div>
<!--end of top flash -->
    <div id="main-wrapper">
	<table width="780" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="186" valign="top" background="../images/backgnd-left.gif">
    <table width="186" border="0" cellspacing="0" cellpadding="0" id="left">
  <tr>
    <td><img src="../images/top-left.gif" width="186" height="41"></td>
  </tr>
  <tr>
    <td align="center" style="padding-top:10px"><a href="index.php"><img src="../images/menu0.gif" alt="Home" width="186" height="30" border="0" onMouseOver="src='../images/menu0-over.gif';" onMouseOut="src='../images/menu0.gif';"></a></td>
  </tr>
  <tr>
    <td align="center" style="padding-top:4px"><a href="knowledge-about-lymphoma.php"><img src="../images/menu1.gif" alt="knowledge about lymphoma" width="186" height="30" border="0" onMouseOver="src='../images/menu1-over.gif';" onMouseOut="src='../images/menu1.gif';"></a></td>
  </tr>
  <tr>
    <td align="center" style="padding-top:4px"><a href="donation.php"><img src="../images/menu2.gif" alt="donation" width="186" height="30" border="0"  onMouseOver="src='../images/menu2-over.gif';" onMouseOut="src='../images/menu2.gif';"></a></td>
  </tr>
  <tr>
    <td align="center" style="padding-top:4px"><a href="e-newsletter.php"><img src="../images/menu3.gif" alt="e-newsletter" width="186" height="30" border="0"  onMouseOver="src='../images/menu3-over.gif';" onMouseOut="src='../images/menu3.gif';"></a></td>
  </tr>
  <tr>
    <td align="center" style="padding-top:4px"><a href="calendar.php"><img src="../images/menu4.gif" alt="calendar" width="186" height="30" border="0"  onMouseOver="src='../images/menu4-over.gif';" onMouseOut="src='../images/menu4.gif';"></a></td>
  </tr>
  <? if($_SESSION['username'] == ''){?>
  <tr>
    <td align="center" style="padding-top:4px"><a href="member-register.php"><img src="../images/menu5.gif" alt="new member register" width="186" height="30" border="0"  onMouseOver="src='../images/menu5-over.gif';" onMouseOut="src='../images/menu5.gif';"></a></td>
  </tr>
  <? } ?>
  <tr>
    <td align="center" style="padding-top:4px"><a href="member.php"><img src="../images/menu6.gif" alt="member" width="186" height="30" border="0"  onMouseOver="src='../images/menu6-over.gif';" onMouseOut="src='../images/menu6.gif';"></a></td>
  </tr>
  <? if(substr($_SESSION['role'],0,1) == 'm' ){?>
  <tr>
    <td align="left" style="padding:5px;padding-left:20px">
    	<span class="subHeaderTextWhite">Menu</span><br>
        <table width="160" border="0" cellspacing="4" cellpadding="0">
  
  <tr>
    <td><a href="edit-profile.php" class="smallTextWhite">Edit Profile</a></td>
  </tr>
  <tr>
    <td><a href="log-out.php" class="smallTextWhite">Logout</a></td>
  </tr>
</table>
</td>
</tr>
  <? } ?>
  <? if(substr($_SESSION['role'],0,1) == 'a' || substr($_SESSION['role'],0,1) == 'd'){ ?>
  <tr>
    <td align="left" style="padding:5px;padding-left:20px">
    	<span class="subHeaderTextWhite">Menu</span><br>
        <table width="160" border="0" cellspacing="4" cellpadding="0">
  <tr>
    <td><a href="view-registry.php" class="smallTextWhite">View Lymphoma Registry</a></td>
  </tr>
  <tr>
    <td><a href="lymphoma-registry.php" class="smallTextWhite">Insert Lymphoma Registry</a></td>
  </tr>
  <tr>
	<td><a href="view-draft.php" class="smallTextWhite">View Draft Registry</a></td>
  </tr>
  <tr>
    <td><a href="list-followup-registry.php" class="smallTextWhite">Update Follow Up Registry</a></td>
  </tr>
      <tr>
    <td><a href="view-pathology.php" class="smallTextWhite">Pathology Consensus Review</a></td>
  </tr>
  <tr>
	<td><a href="contact-list.php" class="smallTextWhite">Contact List</a></td>
  </tr>
  <tr>
	<td><a href="manage-data-manager.php" class="smallTextWhite">Manage Data Manager</a></td>
  </tr>
  <tr>
    <td><a href="edit-profile.php" class="smallTextWhite">Edit Profile</a></td>
  </tr>
  <tr>
    <td><a href="inbox.php" class="smallTextWhite">Inbox</a></td>
  </tr>
  <tr>
    <td><a href="sentbox.php" class="smallTextWhite">Sent Box</a></td>
  </tr>
  <tr>
    <td><a href="send-messege.php" class="smallTextWhite">Send Messege</a></td>
  </tr>
  <tr>
	<td><a href="../manual/manual.pdf" target="_blank" class="smallTextWhite"> Lymphoma Registry Manual</a></td>
  </tr>
<tr>
	<td><a href="../manual/manual2.pdf" target="_blank" class="smallTextWhite">Follow Up Registry Manual </a></td>
  </tr>
  <tr>
    <td><a href="log-out.php" class="smallTextWhite">Logout</a></td>
  </tr>
</table>
<? if(substr($_SESSION['role'],0,1) == 'a'){?>
<br><span class="subHeaderTextWhite">Administrative Menu</span><br>
        <table width="160" border="0" cellspacing="4" cellpadding="0">
  <tr>
    <td><a href="manage-exec-member.php" class="smallTextWhite">Manage Executive Member</a></td>
  </tr>
  <tr>
    <td><a href="manage-institute.php" class="smallTextWhite">Manage Institute</a></td>
  </tr>
  <tr>
    <td><a href="manage-content.php" class="smallTextWhite">Manage Content</a></td>
  </tr>
  <tr>
    <td><a href="manage-enewsletter.php" class="smallTextWhite">Manage e-Newsletter</a></td>
  </tr>
  <tr>
    <td><a href="send-news.php" class="smallTextWhite">Send News to Member</a></td>
  </tr>
  <tr>
    <td><a href="manage-calendar.php" class="smallTextWhite">Manage Calendar</a></td>
  </tr>
  <tr>
    <td><a href="manage-donation.php" class="smallTextWhite">Manage Donation</a></td>
  </tr>
  <tr>
    <td><a href="manage-fund.php" class="smallTextWhite">Manage Fund</a></td>
  </tr>
</table>
<? } ?>

</td>
  </tr>
  <? } ?>
  <tr>
    <td align="center" style="padding-top:4px"><a href="about-us.php"><img src="../images/menu7.gif" alt="about us" width="186" height="30" border="0"  onMouseOver="src='../images/menu7-over.gif';" onMouseOut="src='../images/menu7.gif';"></a></td>
  </tr>
  
  <tr>
    <td align="center" style="padding-top:4px"><a href="contact-us.php"><img src="../images/menu8.gif" alt="contact us" width="186" height="30" border="0"  onMouseOver="src='../images/menu8-over.gif';" onMouseOut="src='../images/menu8.gif';"></a></td>
  </tr>
  <tr>
    <td align="center" style="padding-top:4px;padding-bottom:10px"><a href="web-links.php"><img src="../images/menu9.gif" alt="web link" width="186" height="30" border="0"  onMouseOver="src='../images/menu9-over.gif';" onMouseOut="src='../images/menu9.gif';"></a></td>
  </tr>
  <tr>
    <td height="<? if(substr($_SESSION['role'],0,1) == 'a'){echo '100';}elseif(substr($_SESSION['role'],0,1) == 'd'){echo '200';}else{echo '300';} ?>">&nbsp;</td>
  </tr>
</table>    </td>
    <td width="594" valign="top" background="../images/backgnd-center2.gif"><table width="594" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../images/member-header2.gif" width="594" height="41"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="headerTextBlack" style="padding:5px;padding-left:30px"><img src="../images/bullet-big.gif" width="16" height="16">&nbsp; Insert Lymphoma Registry</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>

	  <form action="confirm-registry.php" method="post" name="regist_form" id="regist_form" onSubmit="return validate_data(document.regist_form);">
      <tr>
        <td>
        
        <!-- -->
        <table width="580" border="0" cellpadding="0" cellspacing="5" class="smallTextGray">
        
        <tr>
          <td width="190" align="right" valign="middle" >Date of record:</td>
          <td width="390" align="left"><select name="record_date" class="smallTextBlack" id="record_date">
          	<option value='-1'>dd</option>
         
            <? 
			if(isset($_GET['e']) && isset($_POST['record_date'])){
				for($i=1;$i<=31;$i++){
					if($_POST['record_date'] == str_pad($i, 2, "0", STR_PAD_LEFT)){
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'" selected>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}else{
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}
			}else{
				for($i=1;$i<=31;$i++){
					if(date('d') == str_pad($i, 2, "0", STR_PAD_LEFT)){
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'" selected>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}else{
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}
			
			}
			
			?>
           </select>
           -
           <select name="record_month" class="smallTextBlack" id="record_month">
              <option value='-1' >mm</option>
             <?
              if(isset($_GET['e']) && isset($_POST['record_month'])){
				for($i=1;$i<=12;$i++){
					if($_POST['record_month'] == str_pad($i, 2, "0", STR_PAD_LEFT)){
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'" selected>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}else{
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}
			}else{
				for($i=1;$i<=12;$i++){
					if(date('m') == str_pad($i, 2, "0", STR_PAD_LEFT)){
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'" selected>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}else{
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}
			
			}
            ?>
            </select>
            -
            <select name="record_year" class="smallTextBlack" id="record_year">
  <option selecte value='-1'>yyyy</option>
  <? 
			 $year=date("Y")+563;
			 
			 if(isset($_GET['e']) && isset($_POST['record_year'])){
				for($i=0;$i<120;$i++){
					$year_t = sprintf('%s',$year-543);
					if($year_t ==  $_POST['record_year']){
						echo "<option value='".($year-543)."' selected>$year</option>\n";
					}else{
						echo "<option value='".($year-543)."'>$year</option>\n";
					}
					$year -=1;
					}
			 }else{
				for($i=0;$i<120;$i++){
					$year_t = sprintf('%s',$year-543);
					if($year_t == date('Y')){
						echo "<option value='".($year-543)."' selected>$year</option>\n";
					}else{
						echo "<option value='".($year-543)."'>$year</option>\n";
					}
					$year -=1;
					}
			 }
			?>
</select> &nbsp;&nbsp;&nbsp; <span class="smallTextBlue">(Example: 31-12-(พ.ศ.)2500)</span></td>
        </tr>
        
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_record_date" style="display:none">Invalid date of record</div>          </td>
        </tr>
        
        <tr>
          <td colspan="2" align="center"><img src="../images/line.gif" width="480" height="1"></td>
          </tr>
        <tr>
          <td colspan="2" class="smallTextBlack" style="padding-left:40px"><strong> Identification and Baseline Data
            <? if(isset($_POST['draft_id'])){?>
            <input name="draft_id" type="hidden" id="draft" value=<? echo $_POST['draft_id'];?>>
            <? } ?>
          </strong></td>
          </tr>
        <? if(substr($_SESSION['role'],0,1) == 'a'){?>
        <tr>
          <td align="right" valign="top"   style="padding-top:3px">Code: </td>
          <td align="left"><select name="institute" class="smallTextBlack" id="select" onChange="new Ajax.Updater('nextnumber', 'getnextnumber.php?institute='+document.regist_form.institute.value,{asynchronous:true,evalscripts:true});">
            <option value="-1">--</option>
            
	        <?php do { ?>
            <? if(isset($_GET['e']) && isset($_POST['institute'])){
			
					if($_POST['institute'] == $row_all_institute['institute']){
						echo '<option value="'.$row_all_institute['institute'].'" selected>'.$row_all_institute['fullname'].'</option>';
					}else{
						echo '<option value="'.$row_all_institute['institute'].'">'.$row_all_institute['fullname'].'</option>';
					}
				}else{
					echo '<option value="'.$row_all_institute['institute'].'">'.$row_all_institute['fullname'].'</option>';
				}
            
            ?>
            <?php } while ($row_all_institute = mysql_fetch_assoc($all_institute)); ?>
          </select>
            <span class="smallTextGreen" id="nextnumber" ><strong>XXXXX</strong>
            <input type="hidden" name="next_cd" id="next_cd" value="XXXXX"></span>
            &nbsp;&nbsp;&nbsp;
              <script language="javascript">
			  new Ajax.Updater('nextnumber', 'getnextnumber.php?institute='+document.regist_form.institute.value,{asynchronous:true,evalscripts:true});
              </script>
            
            <span class="smallTextBlue">(Example: CU00001)</span></td>
        </tr>
        <? }else{ ?>
        <tr>
          <td align="right" valign="top">Code: </td>
          <td align="left" class="smallTextGreen"><strong><?php echo $row_institute['institute']; ?><?php echo str_pad($row_max['next_row'], 5, "0", STR_PAD_LEFT); ?>
              <input type="hidden" name="institute" id="institute" value="<?php echo $row_institute['institute']; ?>">
              <input type="hidden" name="next_cd" id="next_cd" value="<?php echo str_pad($row_max['next_row'], 5, "0", STR_PAD_LEFT); ?>">
          </strong></td>
          </tr>
        <? } ?>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_code" style="display:none">Invalid code</div>          </td>
        </tr>
        <tr>
          <td align="right" > Patient's initials:</td>
          <td align="left"><input name="patient_ini" type="text" class="smallTextBlack" size="2" maxlength="2" id="patient_ini" value="<? if(isset($_GET['e'])&& isset($_POST['patient_ini'])){echo $_POST['patient_ini'];}else{echo '';}?>"></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_initial" style="display:none">Invalid patient's initials</div>          </td>
        </tr>
        <tr>
          <td align="right" > Gender:</td>
          <td align="left"> 
          <input name="gender" type="radio" id="genderm" value="m" <? if(isset($_GET['e']) && isset($_POST['gender'])){if($_POST['gender'] == 'm')echo 'checked';}?>>
            Male 
          <input name="gender" type="radio" id="genderf" value="f" <? if(isset($_GET['e']) && isset($_POST['gender'])){if($_POST['gender'] == 'f')echo 'checked';}?>>
            Female</td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_gender" style="display:none">Please select gender</div>          </td>
        </tr>
        <tr>
          <td align="right"> ID:</td>
          <td align="left"><input name="pid" type="password" class="smallTextBlack" size="15" maxlength="13" id="pid" >
          &nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="pid_unknown" type="checkbox" id="checkbox" value="y" onMouseUp="if(!this.checked){document.regist_form.pid.disabled = true; document.regist_form.c_pid.disabled = true;document.regist_form.pid.value = ''; document.regist_form.c_pid.value = '';}else{document.regist_form.pid.disabled = false; document.regist_form.c_pid.disabled = false;}" > 
            Unknown</td>
        </tr>
        <tr>
          <td align="right">Confirm ID:</td>
          <td align="left"><input name="c_pid" type="password" class="smallTextBlack" size="15" maxlength="13" id="c_pid"></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_id" style="display:none">Invalid ID</div>          </td>
        </tr>
        <tr>
          <td align="right">HN:</td>
          <td align="left"><input name="hn" type="password" class="smallTextBlack" size="15" maxlength="13" id="hn">
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="smallTextBlue">(Example: 5-19-42/48 = 5194248)</span></td>
        </tr>
        <tr>
          <td align="right">Confirm HN:</td>
          <td align="left"><input name="c_hn" type="password" class="smallTextBlack" size="15" maxlength="13" id="c_hn"></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_hn" style="display:none">Invalid HN</div>          </td>
        </tr>
        <tr>
          <td align="right">Date of birth:</td>
          <td align="left"><select name="birth_date" class="smallTextBlack" id="birth_date" onChange="update_age();">
            <option value='-1' >dd</option>
            <? 
			if(isset($_GET['e']) && isset($_POST['birth_date'])){
				for($i=1;$i<=31;$i++){
					if($_POST['birth_date'] == str_pad($i, 2, "0", STR_PAD_LEFT)){
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'" selected>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}else{
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}
			}else{
				for($i=1;$i<=31;$i++){
					echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}

			
			?>
          </select>
            -
<select name="birth_month" class="smallTextBlack" id="birth_month" onChange="update_age();">
  <option value='-1' selected>mm</option>
   <? 
			if(isset($_GET['e']) && isset($_POST['birth_month'])){
				for($i=1;$i<=12;$i++){
					if($_POST['birth_month'] == str_pad($i, 2, "0", STR_PAD_LEFT)){
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'" selected>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}else{
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}
			}else{
				for($i=1;$i<=12;$i++){
					echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}

			
			?>
</select>
-
<select name="birth_year" class="smallTextBlack" id="birth_year" onChange="update_age();">
  <option selecte value='-1'>yyyy</option>
 <? 
			 $year=date("Y")+563;
			 
			 if(isset($_GET['e']) && isset($_POST['birth_year'])){
				for($i=0;$i<120;$i++){
					$year_t = sprintf('%s',$year-543);
					if($year_t ==  $_POST['birth_year']){
						echo "<option value='".($year-543)."' selected>$year</option>\n";
					}else{
						echo "<option value='".($year-543)."'>$year</option>\n";
					}
					$year -=1;
					}
			 }else{
				for($i=0;$i<120;$i++){
					echo "<option value='".($year-543)."'>$year</option>\n";
					$year -=1;
					}
			 }
			?>
</select>
<span class="smallTextBlack" id="nextnumber3" > </span> &nbsp;&nbsp;&nbsp; <span class="smallTextBlue">(Example: 31-12-(พ.ศ.)2500)</span></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_birthdate" style="display:none">Invalid date of birth</div>          </td>
        </tr>
        <tr>
          <td align="right"> Current address:</td>
          <td align="left">
              <select name="address" class="smallTextBlack" id="address">
                <option value='-1'>Please select..</option>
                <?php do { ?>
				<?
				if(isset($_GET['e']) && isset($_POST['address'])){
					if($_POST['address'] == $row_province['province_id']){
						echo "<option value='".$row_province['province_id']."' selected>".$row_province['province_name']."</option>" ;
					}else{
						echo "<option value='".$row_province['province_id']."'>".$row_province['province_name']."</option>" ;
					}
				}else{
					echo "<option value='".$row_province['province_id']."'>".$row_province['province_name']."</option>" ;
				}
				?>
                 <?php } while ($row_province = mysql_fetch_assoc($province)); ?>
                 </select>
              
            <span class="smallTextBlue">  &nbsp;&nbsp;&nbsp; (in the last 6 months)</span></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_address" style="display:none">Please select current address</div>          </td>
        </tr>
        <tr>
          <td align="right" valign="top" style="padding-top:9px"> Mode of payment:</td>
          <td align="left" bgcolor="#EFEFEF"><table width="100%" border="0" cellpadding="0" cellspacing="5" class="smallTextGray">
            <tr>
              <td width="33%"><input name="payment" type="radio" value="1" <? if(isset($_GET['e']) && isset($_POST['payment'])){if($_POST['payment'] == '1')echo 'checked';}?>>
                1. Government</td>
              <td width="33%"><input name="payment" type="radio" value="2" <? if(isset($_GET['e']) && isset($_POST['payment'])){if($_POST['payment'] == '2')echo 'checked';}?>>
                2. Social security</td>
              <td><input name="payment" type="radio" value="3" <? if(isset($_GET['e']) && isset($_POST['payment'])){if($_POST['payment'] == '3')echo 'checked';}?>>
                3. Private insurance</td>
            </tr>
            <tr>
              <td><input name="payment" type="radio" value="4" <? if(isset($_GET['e']) && isset($_POST['payment'])){if($_POST['payment'] == '4')echo 'checked';}?>>
                4. UC (30 baht) </td>
              <td><input name="payment" type="radio" value="5" <? if(isset($_GET['e']) && isset($_POST['payment'])){if($_POST['payment'] == '5')echo 'checked';}?>>
                5. Out of pocket </td>
              <td><input name="payment" type="radio" value="6" <? if(isset($_GET['e']) && isset($_POST['payment'])){if($_POST['payment'] == '6')echo 'checked';}?>>
                6. Other</td>
            </tr>
          </table>            </td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_payment" style="display:none">Please select mode of payment</div>          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><img src="../images/line.gif" width="480" height="1"></td>
          </tr>
        <tr>
          <td colspan="2"  style="padding-left:40px" class="smallTextBlack"> <strong>Lymphoma Database</strong></td>
          </tr>
        <tr>
          <td align="right" valign="middle"> Date of biopsy report:</td>
          <td align="left"><select name="biopsy_date" class="smallTextBlack" id="biopsy_date" onChange="update_age();">
            <option value='-1' >dd</option>
             <? 
			if(isset($_GET['e']) && isset($_POST['biopsy_date'])){
				for($i=1;$i<=31;$i++){
					if($_POST['biopsy_date'] == str_pad($i, 2, "0", STR_PAD_LEFT)){
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'" selected>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}else{
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}
			}else{
				for($i=1;$i<=31;$i++){
					echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}

			
			?>
          </select>
-
<select name="biopsy_month" class="smallTextBlack" id="biopsy_month" onChange="update_age();">
  <option value='-1' >mm</option>
  <? 
			if(isset($_GET['e']) && isset($_POST['biopsy_month'])){
				for($i=1;$i<=12;$i++){
					if($_POST['biopsy_month'] == str_pad($i, 2, "0", STR_PAD_LEFT)){
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'" selected>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}else{
						echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}
			}else{
				for($i=1;$i<=12;$i++){
					echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).'">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</option>';
					}
					
				}

			
			?>
</select>
-
<select name="biopsy_year" class="smallTextBlack" id="biopsy_year" onChange="update_age();">
  <option selecte value='-1'>yyyy</option>
  <? 
			 $year=date("Y")+563;
			 
			 if(isset($_GET['e']) && isset($_POST['biopsy_year'])){
				for($i=0;$i<120;$i++){
					$year_t = sprintf('%s',$year-543);
					if($year_t ==  $_POST['biopsy_year']){
						echo "<option value='".($year-543)."' selected>$year</option>\n";
					}else{
						echo "<option value='".($year-543)."'>$year</option>\n";
					}
					$year -=1;
					}
			 }else{
				for($i=0;$i<120;$i++){
					echo "<option value='".($year-543)."'>$year</option>\n";
					$year -=1;
					}
			 }
			?>
</select>
<span class="smallTextBlack" id="nextnumber2" > </span> &nbsp;&nbsp;&nbsp; <span class="smallTextBlue">(Example: 31-12-(พ.ศ.)2500)</span></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_biopsy_date" style="display:none">Invalid date of biopsy report</div>          </td>
        </tr>
        <tr>
          <td align="right"> Pathology No.:</td>
          <td align="left"><input name="path_no" type="password" class="smallTextBlack" size="15" maxlength="11" id="path_no">
            <span class="smallTextBlack" id="nextnumber4" > </span> &nbsp;&nbsp;&nbsp; <span class="smallTextBlue">(Example: SP47-0007/47 = SP47000747)</span></td>
        </tr>
        <tr>
          <td align="right">Confirm Pathology No.:</td>
          <td align="left"><input name="c_path_no" type="password" class="smallTextBlack" size="15" maxlength="11" id="c_path_no"></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_pathology" style="display:none">Invalid pathology no.</div>          </td>
        </tr>
        <tr>
          <td align="right" valign="middle" >Biopsy site</td>
          <td align="left">
              <select name="biopsy_site" class="smallTextBlack" id="biopsy_site">
                <option selected value='-1'>Please select...</option>
                <?php do { ?>
				<?
				if(isset($_GET['e']) && isset($_POST['biopsy_site'])){
					if($_POST['biopsy_site'] == $row_biopsy_site['biopsy_id']){
						echo "<option value='".$row_biopsy_site['biopsy_id']."' selected>".$row_biopsy_site['biopsy_name']."</option>" ;
					}else{
						echo "<option value='".$row_biopsy_site['biopsy_id']."'>".$row_biopsy_site['biopsy_name']."</option>" ;
					}
				}else{
					echo "<option value='".$row_biopsy_site['biopsy_id']."'>".$row_biopsy_site['biopsy_name']."</option>" ;
				}
				?>
                 <?php } while ($row_biopsy_site = mysql_fetch_assoc($biopsy_site)); ?> 
              </select>                        </td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_biopsy_site" style="display:none">Please select biopsy site</div>          </td>
        </tr>
        <tr>
          <td align="right" valign="top" style="padding-top:9px">Type:</td>
          <td align="left" bgcolor="#EFEFEF"><table width="100%" border="0" cellpadding="0" cellspacing="5" class="smallTextGray">
            <tr>
              <td width="43%" align="left"><input type="radio" name="hl" id="radio3" value="hl" onClick="if(this.checked){enable_hodgkin(); }"  <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] == 'hl')echo 'checked';}?>> 
                Hodgkin lymphoma (HL)</td>
              <td align="left">
                  <select name="hodgkin_list" class="smallTextBlack" <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] != 'hl')echo 'disabled';}else{echo 'disabled';}?>>
                    <option value='-1' >Please select...</option>
                    <?php do { ?>
					<?
				if(isset($_GET['e']) && isset($_POST['hodgkin_list'])){
					if($_POST['hodgkin_list'] == $row_hl['hl_id']){
						echo "<option value='".$row_hl['hl_id']."' selected>".$row_hl['hl_name']."</option>" ;
					}else{
						echo "<option value='".$row_hl['hl_id']."'>".$row_hl['hl_name']."</option>" ;
					}
				}else{
					echo "<option value='".$row_hl['hl_id']."'>".$row_hl['hl_name']."</option>" ;
				}
				?>
                  <?php } while ($row_hl = mysql_fetch_assoc($hl)); ?>
                  </select>                  </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEDEDE">
            <tr>
              <td background="../images/bg2.gif"><table width="100%" border="0" cellpadding="0" cellspacing="5" class="smallTextGray">
                <tr>
                  <td width="43%" align="left"><input type="radio" name="hl" id="radio4" value="nhl"  onClick="if(this.checked){enable_non_hodgkin();}"   <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] == 'nhl')echo 'checked';}?>>
      Non-Hodgkin lymphoma (NHL)</td>
                  <td width="57%" align="left"> Immunophenotype:
                      
                        <select name="immunophenotype" class="smallTextBlack" id="immunophenotype" <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] != 'nhl')echo 'disabled';}else{echo 'disabled';}?>>
                          <option value="-1" >Please select...</option>
                          <?php do { ?>
						  <?
							if(isset($_GET['e']) && isset($_POST['immunophenotype'])){
								if($_POST['immunophenotype'] == $row_immu['nhl_id']){
									echo "<option value='".$row_immu['nhl_id']."' selected>".$row_immu['nhl_name']."</option>" ;
								}else{
									echo "<option value='".$row_immu['nhl_id']."'>".$row_immu['nhl_name']."</option>" ;
								}
							}else{
								echo "<option value='".$row_immu['nhl_id']."'>".$row_immu['nhl_name']."</option>" ;
							}
							?>
                            <?php } while ($row_immu = mysql_fetch_assoc($immu)); ?>
                          </select>                        </td>
                </tr>
                <tr align="center">
                  <td colspan="2"><table width="98%" border="0" cellpadding="0" cellspacing="5" bgcolor="#BBBBBB" class="smallTextGray">
                      <tr>
                        <td width="37%" align="left"><input name="in_nhl" type="radio" value="1"  onclick="enable_who()" <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] == 'nhl'){if($_POST['in_nhl'] == 1)echo 'checked';}else{echo 'disabled';}}else{echo 'disabled';}?>>
                          WHO classification</td>
                        <td align="left">&nbsp;</td>
                      </tr>
                      <tr align="center">
                        <td colspan="2" align="left" style="padding-left:60px"><div class="contentbox"><select name="who" class="smallTextBlack" id="who" <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] == 'nhl'){if($_POST['in_nhl'] != 1)echo 'disabled';}}else{echo 'disabled';}?>>
                            <option value="-1" class="contentbox">Please select...</option>
                           <?php do { ?>
						  <?
							if(isset($_GET['e']) && isset($_POST['who'])){
								if($_POST['who'] == $row_who['who_id']){
									echo "<option value='".$row_who['who_id']."' selected><div class='contentbox'>".$row_who['who_name']."</div></option>" ;
								}else{
									echo "<option value='".$row_who['who_id']."'><div class='contentbox'>".$row_who['who_name']."</div></option>" ;
																	if($row_who['who_id']  == 34){ 
									echo "<option value='60' >--**New entity**--</option>";
							}
								}
							}else{
								echo "<option value='".$row_who['who_id']."'><div class='contentbox'>".$row_who['who_name']."</div></option>" ;
								if($row_who['who_id']  == 34){ 
									echo "<option value='60' >--**New entity**--</option>";
							}
							}
						?>
                            <?php } while ($row_who = mysql_fetch_assoc($who)); ?>
                          </select>  </div>                        </td>
                        </tr>
                      </table>
                      <table width="98%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left">&nbsp;</td>
                      </tr>
                      </table>
                      <table width="98%" border="0" cellpadding="0" cellspacing="5" bgcolor="#BBBBBB" class="smallTextGray">
                      <tr>
                        <td align="left"><input name="in_nhl" type="radio" value="2"  onclick="enable_working()" <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] == 'nhl'){if($_POST['in_nhl'] == 2)echo 'checked';}else{echo 'disabled';}}else{echo 'disabled';}?>>
Working formulation</td>
                        <td align="left">&nbsp;</td>
                      </tr>
                      <tr align="center">
                        <td colspan="2" align="left" style="padding-left:50px"><select name="working" class="smallTextBlack" id="working" <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] == 'nhl'){if($_POST['in_nhl'] != 2)echo 'disabled';}}else{echo 'disabled';}?>>
                          <option value='-1' >Please select...</option>
                          <?php do { ?>
						  <?
							if(isset($_GET['e']) && isset($_POST['working'])){
								if($_POST['working'] == $row_working['working_id']){
									echo "<option value='".$row_working['working_id']."' selected>".$row_working['working_name']."</option>" ;
								}else{
									echo "<option value='".$row_working['working_id']."'>".$row_working['working_name']."</option>" ;
								}
							}else{
								echo "<option value='".$row_working['working_id']."'>".$row_working['working_name']."</option>" ;
							}
							?>
                            <?php } while ($row_working = mysql_fetch_assoc($working)); ?>

                                </select></td>
                        </tr>
                  </table>
                  <table width="98%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left">&nbsp;</td>
                      </tr>
                      </table>
                      <table width="98%" border="0" cellpadding="0" cellspacing="5" bgcolor="#BBBBBB" class="smallTextGray">
                      <tr>
                        <td align="left"><input name="in_nhl" type="radio" value="99"   onclick="enable_other_type()" <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] == 'nhl'){if($_POST['in_nhl'] == 99)echo 'checked';}else{echo 'disabled';}}else{echo 'disabled';}?>>
                          99 Other type</td>
                        <td align="left">&nbsp;</td>
                      </tr>
                      <tr align="center">
                        <td colspan="2" align="left" style="padding-left:50px"><textarea name="other_type" cols="50" rows="4" class="smallTextBlack" id="other_type" onFocus="if(this.value =='Please specify...'){this.value = '';}" <? if(isset($_GET['e']) && isset($_POST['hl'])){if($_POST['hl'] == 'nhl'){if($_POST['in_nhl'] != 99)echo 'disabled';}}else{echo 'disabled';}?>><? if(isset($_GET['e']) && isset($_POST['other_type'])){echo $_POST['other_type'];}else{echo 'Please specify...';}?></textarea></td>
                      </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table> </td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_type" style="display:none">Invalid type</div>          </td>
        </tr>        
        <tr>
          <td align="right" valign="top"  style="padding-top:9px"> Ann Arbor stage:</td>
          <td align="left" bgcolor="#EFEFEF"><table width="400" border="0" cellpadding="0" cellspacing="4" class="smallTextGray">
            <tr>
              <td><input name="ann_arbor" type="radio" value="1" onClick="update_stage('1');"  <? if(isset($_GET['e']) && isset($_POST['ann_arbor'])){if($_POST['ann_arbor'] == '1')echo 'checked';}?>>
      IA</td>
              <td><input name="ann_arbor" type="radio" value="2" onClick="update_stage('2');" <? if(isset($_GET['e']) && isset($_POST['ann_arbor'])){if($_POST['ann_arbor'] == '2')echo 'checked';}?>>
      IB</td>
              <td><input name="ann_arbor" type="radio" value="3" onClick="update_stage('3');" <? if(isset($_GET['e']) && isset($_POST['ann_arbor'])){if($_POST['ann_arbor'] == '3')echo 'checked';}?>>
      IIA</td>
              <td><input name="ann_arbor" type="radio" value="4" onClick="update_stage('4');" <? if(isset($_GET['e']) && isset($_POST['ann_arbor'])){if($_POST['ann_arbor'] == '4')echo 'checked';}?>>
IIB</td>
              <td><input name="ann_arbor" type="radio" value="5" onClick="update_stage('5');" <? if(isset($_GET['e']) && isset($_POST['ann_arbor'])){if($_POST['ann_arbor'] == '5')echo 'checked';}?>>
IIIA</td>
              <td><input name="ann_arbor" type="radio" value="6" onClick="update_stage('6');" <? if(isset($_GET['e']) && isset($_POST['ann_arbor'])){if($_POST['ann_arbor'] == '6')echo 'checked';}?>>
IIIB</td>
              <td><input name="ann_arbor" type="radio" value="7" onClick="update_stage('7');" <? if(isset($_GET['e']) && isset($_POST['ann_arbor'])){if($_POST['ann_arbor'] == '7')echo 'checked';}?>>
IVA</td>
              <td><input name="ann_arbor" type="radio" value="8" onClick="update_stage('8');" <? if(isset($_GET['e']) && isset($_POST['ann_arbor'])){if($_POST['ann_arbor'] == '8')echo 'checked';}?>>
IVB</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_ann_arbor" style="display:none">Please select Ann Arbor stage</div>          </td>
        </tr>
        <tr>
          <td align="right" valign="top" style="padding-top:9px"> Extranodal sites:<br>
            <span class="smallTextBlue">(mark all that apply) </span></td>
          <td align="left" bgcolor="#EFEFEF"><table width="420" border="0" cellpadding="0" cellspacing="4" class="smallTextGray">
            <tr align="left">
              <td colspan="4"><input name="ex_none" type="checkbox" id="checkbox3" onClick="if(this.checked){disable_all_site();}else{enable_all_site();} update_extra();" value="1"  <? if(isset($_GET['e']) && isset($_POST['ex_none'])){if($_POST['ex_none'] != '0')echo 'checked'; else echo 'disabled';}?> >
none </td>
              </tr>
            <tr align="left">
              <td width="128"><input type="checkbox" name="ex_1" value="1" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();} update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_1'])){if($_POST['ex_1'] != '0')echo 'checked';} if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none']) && $_POST['ex_none'] == '1')echo 'disabled';?>>
                Waldeyer's ring</td> 
              <td width="96"><input type="checkbox" name="ex_2"  value="2" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_2'])){if($_POST['ex_2'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none']) &&$_POST['ex_none'] == '1')echo 'disabled';?>>
Sinonasal</td>
              <td width="99"><input type="checkbox" name="ex_3" value="3" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_3'])){if($_POST['ex_3'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none']) &&$_POST['ex_none'] == '1')echo 'disabled';?>>
Salivary gland</td>
              <td width="77"><input type="checkbox" name="ex_4" value="4" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_4'])){if($_POST['ex_4'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
Thyroid</td>
              </tr>
            <tr align="left">
              <td><input type="checkbox" name="ex_5" value="5" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_5'])){if($_POST['ex_5'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
Eye/Ocular adnexa</td>
              <td><input type="checkbox" name="ex_6" value="6" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_6'])){if($_POST['ex_6'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
Lung/Pleura</td>
              <td><input type="checkbox" name="ex_7" value="7" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_7'])){if($_POST['ex_7'] != '0')echo 'checked';}   if(isset($_GET['e']))if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>> 
                Breast</td>
              <td><input type="checkbox" name="ex_8" value="8" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST[''])){if($_POST['ex_8'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none']== '1')echo 'disabled';?>> 
                Stomach</td>
              </tr>
            <tr align="left">
              <td><input type="checkbox" name="ex_9" value="9" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_9'])){if($_POST['ex_9'] != '0')echo 'checked';}  if(isset($_GET['e']))if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
                Small intestine</td>
              <td><input type="checkbox" name="ex_10" value="10" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_10'])){if($_POST['ex_10'] != '0')echo 'checked';}   if(isset($_GET['e']))if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
                Testis</td>
              <td><input type="checkbox" name="ex_11" value="11" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_11'])){if($_POST['ex_11'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
                Brain/CNS</td>
              <td><input type="checkbox" name="ex_12" value="12" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_12'])){if($_POST['ex_12'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
                Liver</td>
              </tr>
            <tr align="left">
              <td><input type="checkbox" name="ex_13" value="13" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_13'])){if($_POST['ex_13'] != '0')echo 'checked';}   if(isset($_GET['e']))if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
                Large intestine</td>
              <td><input type="checkbox" name="ex_14" value="14" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_14'])){if($_POST['ex_14'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
                Bone</td>
              <td><input type="checkbox" name="ex_15" value="15" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_15'])){if($_POST['ex_15'] != '0')echo 'checked';}   if(isset($_GET['e']))if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
                Bone marrow</td>
              <td><input type="checkbox" name="ex_16" value="16" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_16'])){if($_POST['ex_16'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  &&$_POST['ex_none'] == '1')echo 'disabled';?>>
                Spleen</td>
              </tr>
            
            <tr align="left">
              <td><input type="checkbox" name="ex_17" value="17" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_17'])){if($_POST['ex_17'] != '0')echo 'checked';}  if(isset($_GET['e'])) if(isset($_GET['e']) && isset($_POST['ex_none'])  && $_POST['ex_none'] == '1')echo 'disabled';?>>
                Skin/Subcutaneous</td>
              <td colspan="3">&nbsp;</td>
              </tr>
              <tr align="left">
              <td colspan="4"><table width="400" border="0" cellpadding="0" cellspacing="0" class="smallTextGray">
    <tr>
      <td width="60" valign="top"><input type="checkbox" name="ex_other" value="1" onClick="if(this.checked){disable_ex_none();}else{enable_ex_none();} if(this.checked){enable_ex_other_box();}else{disable_ex_other_box();}update_extra();" <? if(isset($_GET['e']) && isset($_POST['ex_other'])){if($_POST['ex_other'] != '0')echo 'checked';}   if(isset($_GET['e']) && isset($_POST['ex_none']) && $_POST['ex_none'] == '1')echo 'disabled';?>>
Others</td>
      <td><textarea name="ex_other_box" cols="40" rows="4" class="smallTextBlack" id="textfield2" onChange="update_extra();"  <? if(isset($_GET['e']) && isset($_POST['ex_other'])){if($_POST['ex_other'] == '0'){echo 'disabled';} }else{echo 'disabled'; }?>><? if(isset($_GET['e']) && isset($_POST['ex_other_box'])){echo $_POST['ex_other_box'];}?></textarea></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td class="smallTextRed" style="padding-top:4px">*Enter each <span style="padding-top:9px">extranodal site</span> on a new line.<br>
        ** Do not have ','(comma) in text.<br>
        *** Do not leave blank line in text.</td>
    </tr>
  </table></td>
              </tr>
          </table> </td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_ex" style="display:none">Please select at least 1 extranodal site or select none</div>          </td>
        </tr>
        <tr>
          <td align="right">Performance status (ECOG):</td>
          <td align="left" bgcolor="#EFEFEF">
          <table width="399" border="0" cellpadding="0" cellspacing="4" class="smallTextGray">
            <tr>
              <td width="20%"><input name="perf_stts" type="radio" value="0" onClick="update_perf(0);" <? if(isset($_GET['e']) && isset($_POST['perf_stts'])){if($_POST['perf_stts'] == '0')echo 'checked';}?>>
0</td>
              <td width="20%"><input name="perf_stts" type="radio" value="1" onClick="update_perf(1);" <? if(isset($_GET['e']) && isset($_POST['perf_stts'])){if($_POST['perf_stts'] == '1')echo 'checked';}?>>
1</td>
              <td width="20%"><input name="perf_stts" type="radio" value="2" onClick="update_perf(2);" <? if(isset($_GET['e']) && isset($_POST['perf_stts'])){if($_POST['perf_stts'] == '2')echo 'checked';}?>>
2</td>
              <td width="20%"><input name="perf_stts" type="radio" value="3" onClick="update_perf(3);" <? if(isset($_GET['e']) && isset($_POST['perf_stts'])){if($_POST['perf_stts'] == '3')echo 'checked';}?>>
3</td>
              <td width="20%"><input name="perf_stts" type="radio" value="4" onClick="update_perf(4);" <? if(isset($_GET['e']) && isset($_POST['perf_stts'])){if($_POST['perf_stts'] == '4')echo 'checked';}?>>
4</td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_ecog" style="display:none">Please select perfoemance status(ECOG)</div>          </td>
        </tr>
        <tr>
          <td align="right">LDH:</td>
          <td align="left" bgcolor="#EFEFEF">
            <table width="320" border="0" cellpadding="0" cellspacing="4" class="smallTextGray">
            <tr>
              <td width="25%"><input name="ldh" type="radio" value="0" onClick="update_ldh(0);"  <? if(isset($_GET['e']) && isset($_POST['ldh'])){if($_POST['ldh'] == '0')echo 'checked';}?>>
Normal</td>
              <td width="25%"><input name="ldh" type="radio" value="1" onClick="update_ldh(1);"  <? if(isset($_GET['e']) && isset($_POST['ldh'])){if($_POST['ldh'] == '1')echo 'checked';}?>>
High</td>
              <td width="25%">&nbsp;</td>
              <td width="25%">&nbsp;</td>
              </tr>
          </table>            </td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_ldh" style="display:none">Please select LDH</div>          </td>
        </tr>
        <tr>
          <td align="right"> HIV positive:</td>
          <td align="left" bgcolor="#EFEFEF">
          <table width="320" border="0" cellpadding="0" cellspacing="4" class="smallTextGray">
            <tr>
              <td width="25%"><input type="radio" name="hiv" id="hiv" value="y" <? if(isset($_GET['e']) && isset($_POST['hiv'])){if($_POST['hiv'] == 'y')echo 'checked';}?>>
Yes</td>
              <td width="25%"><input type="radio" name="hiv" id="hiv" value="n" <? if(isset($_GET['e']) && isset($_POST['hiv'])){if($_POST['hiv'] == 'n')echo 'checked';}?>>
No</td>
              <td width="25%"><input type="radio" name="hiv" id="hiv" value="nd" <? if(isset($_GET['e']) && isset($_POST['hiv'])){if($_POST['hiv'] == 'nd')echo 'checked';}?>>
Not done</td>
              <td width="25%">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td  align="right" valign="middle" ></td>
          <td  align="left" class="smallTextRed">
         	 <div id="invalid_hiv" style="display:none">Please select HIV positive</div>          </td>
        </tr>
        <tr>
          <td align="right" valign="top">IPI:</td>
          <td align="left">
          <div class="smallTextGreen" style="padding-bottom:5px;display:none"  id="div_age">
          <table width="350" border="0" cellpadding="0" cellspacing="0" class="smallTextGreen">
          <tr>
          <td width="180">
          <span id="age_point">Age : N/A</span>          </td>
          <td>
          <span id="age_desc">(Wait for parameter)</span>          </td>
          </tr>
          </table>
          </div>
          <div class="smallTextGreen" style="padding-bottom:5px;display:none"  id="div_ldh">
          <table width="300" border="0" cellpadding="0" cellspacing="0" class="smallTextGreen">
            <tr>
              <td width="180"><span id="ldh">Serum LDH : N/A</span> </td>
              <td><span id="ldh_desc">(Wait for parameter)</span> </td>
            </tr>
          </table>
          </div>
          <div class="smallTextGreen" style="padding-bottom:5px;display:none" id="div_perf">
          <table width="300" border="0" cellpadding="0" cellspacing="0" class="smallTextGreen">
            <tr>
              <td width="180"><span id="perf">Performance status : N/A</span> </td>
              <td><span id="perf_desc">(Wait for parameter)</span> </td>
            </tr>
          </table>
          </div>
          <div class="smallTextGreen" style="padding-bottom:5px;display:none"  id="div_stage">
          <table width="300" border="0" cellpadding="0" cellspacing="0"  class="smallTextGreen">
            <tr>
              <td width="180"><span id="stage">Stage : N/A</span> </td>
              <td><span id="stage_desc">(Wait for parameter)</span> </td>
            </tr>
          </table>
          </div>
          <div class="smallTextGreen" style="padding-bottom:5px;display:none" id="div_extra">
          <table width="300" border="0" cellpadding="0" cellspacing="0"  class="smallTextGreen">
            <tr>
              <td width="180"><span id="extra">Extranodal Involvement: N/A</span> </td>
              <td><span id="extra_desc">(Wait for parameter)</span> </td>
            </tr>
          </table>
          </div>
          <div class="smallTextGreen" onfocus="MM_validateForm('patient_ini','','NisEmail');return document.MM_returnValue">
          <table width="360" border="0" cellpadding="0" cellspacing="0" class="smallTextGreen">
            <tr>
              <td width="180"><span id="result"><strong>Result: N/A</strong></span></td>
              <td><span id="result_desc"><strong>(Wait for more parameters)</strong></span> </td>
            </tr>
          </table>
          </div>          </td>
        </tr>
        
      <tr>
          <td colspan="2" align="center" style="padding-top:20px"><input name="Submit" type="submit" class="button" id="Submit" value="Submit" >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Button" type="button" class="button" id="Button" value="Save Draft" onClick="document.regist_form.action='insert-draft.php'; if(draftVerify(document.regist_form)){submit();}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Submit2" type="button" class="button" value="Cancel" onClick="window.history.back();"></td>
      </tr>
	  <tr>
          <td colspan="2" align="left" class="smallTextRed" style="padding-top:10px">*In order to save draft, you must fill Patient's Initiials, Date of Record and Date of Birth. </td>
        </tr>
      </table>
        <!-- -->
        </td>
      </tr>
      </form>
      <tr>
        <td style="padding-left:30px">&nbsp;</td>
      </tr>
      </table>
      </td>
    </tr>
</table>
</div>
<table width="780" height="74" border="0" cellpadding="0" cellspacing="0" background="../images/backgnd-below.gif" class="smallTextBlack">
  <tr>
    <td valign="top" style="padding-top:20px;padding-left:10px;"><strong>ชมรมโรคมะเร็งต่อมน้ำเหลือง</strong><br>
  สาขาวิชาโลหิตวิทยา  ภาควิชาอายุรศาสตร์ คณะแพทยศาสตร์จุฬาลงกรณ์มหาวิทยาลัย<br>
  เขตปทุมวัน กทม. 10330 
  โทรศัพท์ 02-256-4564   โทรสาร 02-253-9466 
  อีเมลล์:  <a href="mailto:webmaster@thailymphoma.org" class="smallTextBlack">webmaster@thailymphoma.org</a></td>
  </tr>
</table>
</div>
</body>
</html>
<? if(isset($_GET['e']) && isset($_POST['perf_stts']) && isset($_POST['ldh']) && isset($_POST['ann_arbor']) && isset($_POST['perf_stts'])){?>
		<script language="javascript">
		update_age();
		update_perf(<? echo $_POST['perf_stts'];?>);
        update_ldh(<? echo $_POST['ldh'];?>);
		update_stage('<? echo $_POST['ann_arbor'];?>');
		update_extra();
        </script>
        <? } ?>
<?php
mysql_free_result($institute);
mysql_free_result($max);
mysql_free_result($all_institute);
mysql_free_result($province);
mysql_free_result($biopsy_site);
mysql_free_result($hl);
mysql_free_result($immu);
mysql_free_result($who);
mysql_free_result($working);
?>