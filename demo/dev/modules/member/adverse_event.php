<? 
if(!session_is_registered('login_true')) {
//  url=index.php ����觹�������˹�ҷ��е�ͧ��͡ user,pwd �����������������������¡���١�Ф�Ѻ
	
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'><img src='images/logo.jpg' width='940' height='140' /></a></h1>
		</div>
		
		<div id='content'>
			
			<div class='x'></div>
			<!-- main content -->
			<div id='login'>
            	<div class='space'></div>
                <div class='space'></div>
				<h1>��س� Login �������к�</h1>
				<p>
				<img src='images/login-redirection-loader.gif' alt='login-redirection-loader' />
				";
	echo "<meta http-equiv='refresh' content='3;url=index.php?name=member&amp;file=login'>" ; 
	echo "	</p>
                </div>
			
			<!-- sidebar -->
			
			<div class='x'></div>
			<div class='break'></div>

		</div> " ;
 include 'modules/index/footer.php'; 
} 
else 
{
?>

<? include "modules/index/header.php" ; ?>
	<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ; 
$member_id=$dbarr['member_id']; 
$work=$dbarr['work'];
$hospital_name=$dbarr['hospital_name'];
$fullname=$dbarr['fullname'];
?>


<!-- main content -->
			<div id="left">
				<h1>�Թ�յ�͹�Ѻ</h1><h2><? echo $fullname;?></h2>�����ç��Һ�ŷ���ѧ�Ѵ <? echo $hospital_name;?>&nbsp;&nbsp;���˹� <? echo $work;?><p>
				
				<?
					$FileHtml = "html/systemtalk.html";
					$FileHtmlOpen = @fopen($FileHtml, "r");
					$HtmlContent = @fread ($FileHtmlOpen, @filesize($FileHtml));
					@fclose ($FileHtmlOpen);
					$HtmlContent = stripslashes($HtmlContent);
					echo $HtmlContent;
				?>
                </p>
                <h1> Adverse  Event  Log</h1>
             
                      <div class="post-options">
              
            </div>
				<div class="x"></div>
      
		
			</div>
              
			<!-- sidebar -->
			<div id="right">
			
		
				<h2></h2>
			
			
			</div>
            <div id="center">
            	
            <br /><?php
  require_once("includes/event.php");

// ������Դ��Ͱҹ������v
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");


// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

//��͡������--���ͤ���
echo"<CENTER>";
echo"<Form method='post' action='?name=member&file=adverse_event'> <Table border=0>
<Tr bgcolor=$bg><Td>Search  Data 
<Select name='field_search'size='1'> 
<Option value='subject'>Subject No.</option>
<Option value='patient_initials'>Patient Initials</option>
<Option value='start_date'>start  date</option> 
<Option value='stop_date'>stop  date</option> 
<Option value='sae'>SAE</option>
<Option value='cocomitant'>Cocomitant Medication given?</option>
<Option value='severity'>Severity</option> 
<Option value='action'> Action</option>  
<Option value='outcome'>Outcome</option> 

<Input type='text' name='search' >	 
<Input type='submit' value='Search' ></Form></Td></Table>";
if($search=="")//����Ҫ�ͧsearch�բ��������
{
	$sql2 = "select * from $tblname  where member_id='$member_id' order by id limit  $Gopage,$Pagesize";
	$set=0;
}
else
{
	$sql2 = " where $field_search like '%$search%'";
	$set=1;
}


// ����� SQL ���������ӧҹ
	$sql = "select * from $tblname where member_id='$member_id' ";

	
$dbquery = mysql_db_query($dbname, $sql);


// �Ҩӹǹ�á���촢�����㹵��ҧ
$num_rows = mysql_num_rows($dbquery);


// �Ҩӹǹ��Ŵ�㹵��ҧ
$num_fields = mysql_num_fields($dbquery);


$Gopage=$HTTP_GET_VARS["Page"];
if ($Gopage=="")
	{
		$Gopage=1;
	} 
$Pagesize=$HTTP_GET_VARS["Pagesize"];//�Ѻ��Ҩӹǹ�á���촨ҡ Query String
$Pagesize=10; //��˹��ӹǹ�á����� 1 ˹��
$Maxcount=ceil($num_rows/$Pagesize);	//������Ҩӹǹ˹�ҷ�����
$Gopage=(($Gopage-1)*$Pagesize)+$Recs;//����á�˹�˹�ҷ���� ���͡�˹��á���촷��д֧���������ʴ�
$Recs=0;
$Checkpage= ($Gopage/$Pagesize)+1;	 
If ($Checkpage==$Maxcount)//��Ǩ�ͺ˹���ش����
	{
		$Newsize=$num_rows % $Pagesize;
		if ($Newsize==0)
			{
				$Newsize=10;
			}
		$Pagesize=$Newsize;
	}
if($set==1)
{
	$sql2 = "select * from $tblname where  $field_search like '%$search%'  and member_id='$member_id' order by id limit  $Gopage,$Pagesize";	
	echo "<Font color=blue> �ʴ��š�ä��Ң����ŷ���դ���� </Font><Font color=red>".$search." </Font></Font><br>&nbsp;";
}
else
{
					$sql2 = "select * from $tblname  where member_id='$member_id' order by id  limit  $Gopage,$Pagesize";	 
				
}

//�������ǹ��ǵ��ҧ
$bg="pink";	//��˹����������
echo "<Table border=0  >
		<Tr bgcolor=$bg>
	<Td><center>AE</center></Td>
	<Td><center>name</center></Td>
	<Td><center>Event Name  <br>
			   (Plaese give Diagnosis if known)  </center>
	</Td>
	<Td>Start date    
			
				</Td>
	<Td>Stop date   
				
				</Td>
	<td><center>SAE</center></td>
	<Td><center>Cocomitant Medication given?</center></Td>
   	<Td><center>Severity  </center>   <br>
				0 = Mild
				1=Moderate
				2=Severe
			</Td>
	<Td><center>Action </center> <br>
			0=None  <br>
			1= Temporarily  
     			Interupted  <br>
			2=Permanent
    			Withdrawn
		</Td>
	<Td><center>Outcome </center> <br>
			0=Resolved  <br>
			1=Resolved with sequelae  <br>
			2=Not resolved
	</Td>
	<td>Relaionship to current drug   <br>
			0=Definitely  <br>
			1=Probably  <br>
			2=Possibly  <br>
			3=Unlikely  <br>
			4=Not related  <br>
			5=Not assessable  
</td>
	<td><center>Update</center></td>
	";  


//show search

$dbquery2= mysql_db_query($dbname,$sql2);
$numrows = mysql_num_rows($dbquery2);
$count=0;
if($num_rows==0)
	{
	echo "<Table border=1>";
	echo "<Tr bgcolor='ffffff'><Td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>����բ����� !&nbsp;</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</Td></Tr>";
	echo "</Table>";
	}
else
 { 
While  ($Recs<=$Pagesize)	// �ʴ��á���촨ӹǹ����Թ�ӹǹ�á���촵��˹��
	{		
			if($count<$numrows)
		   {
			   $Number = $Gopage+$Recs+1;	// ������ʴ��á���촷�������
				$id = $Gopage+$Recs+1;	// ������ʴ��á���촷�������
				$result = mysql_fetch_array($dbquery2);
				$id = $result[id];
				$patient_initials = $result[patient_initials];
				$event_name = $result[event_name];
				$start_date = $result[start_date];
				$stop_date = $result[stop_date];
				$sae = $result[sae];
				$cocomitant = $result[cocomitant];
				$severity=	$result[severity];
				$action= $result[action];
   				$outcome= $result[outcome];
				$relaionship= $result[relaionship];
			
			If ($bg=="skyblue")
				{
				$bg="skyblue";		
				}
			Else
				{
				$bg="skyblue";
				}
		//show data
	echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
	echo "<Tr bgcolor=$bg>                   
			   <Td  align = center>$Number</Td> 
			   <Td  align = center>$patient_initials</Td> 
			   <Td><center>$event_name</center></Td>
			   <Td><center>$start_date</center></Td> 
			   <Td><center>$stop_date</center></Td>    
			   <td><center>$sae</center></td>
			   <Td><center>$cocomitant</center></Td>
			   <Td><center>$severity</center></Td>       
			   <Td><center>$action</center></Td>      
   			   <Td><center>$outcome</center></Td>
			   <Td><center>$relaionship</center></Td>       
			  <td><center>     
			   <A href='index.php?name=member&file=edit_data_event&id=$id&centre=$centre&subject=$subject'>Edit</center></a>
			   </td> 
		       
			  "; //�ʴ����������п�Ŵ� 
		       $count++;										
		    }
		$Recs++;		
    }//end while
}
	echo "</Table>";
if($set==1)
{
	echo "<Br>�鹾� <Font color=red>".$numrows." �á����</font><br>";
}
else
{
	echo "<Br>�����ŷ����� <Font color=red>".$num_rows." �á����</font><br>";
}
	echo "<CENTER><Br>˹�ҷ�� ".$Checkpage." / " .$Maxcount."<Br>";
if($num_rows>10)
{
	If ($Checkpage>1)		//����ʴ�˹�ҷ���ҡ���� 1 ���� Previous
		{
		echo "[ <A Href=".$Scriptname."?name=member&file=adverse_event&Page=".($Checkpage-1)."&Pagesize=".$Pagesize.">��Ѻ�˹�ҷ������</A> ]";
		}
	echo "[";
	$Pad="";
	//�Ѻ��Ҫ���ʤ�Ի�����͹���������ǹ˹�觢ͧ�����ҧ�ԧ
	$Scriptname=${"Script_Name"};
	for ($N=1; $N<=$Maxcount; $N=$N+1)
	{
		 if ($N>=10)
			{
				$Pad="";
			} 
		//��˹������Ţ˹��������ҧ�ԧ����
		$Ref="<A Href=".$Scriptname."?name=member&file=adverse_event&Page=".$N."&Pagesize=".$Pagesize.">".$Pad.$N."</A>";
		echo "  ".$Ref."  ";
	} 
	echo "]";
If ($Checkpage<$Maxcount)		//����ʴ�˹�ҷ����¡���˹���٧�ش ���� Next
	{
	echo "[<A Href=".$Scriptname."?name=member&file=adverse_event&Page=".($Checkpage+1)."&Pagesize=".$Pagesize.">˹�ҶѴ�</A> ]";
	}
echo"</CENTER>";
}
echo "</Table>";

mysql_close();	// �Դ�����������
?>
 
			
			<!-- sidebar -->
		
            <div id="left">
          

            <br />
            <h1></h1>
     
			</div>
            <h1></h1>
     
			</div>
			
			<div class="x"></div>
			<div class="break"></div>

		</div>
	<? include "modules/index/footer.php"; ?>
<? } ?>