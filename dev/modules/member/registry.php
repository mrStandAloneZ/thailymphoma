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
$codehos=$dbarr['codehos'];
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
                <h1>ʶҹС��ŧ����¹������</h1>
             
                      <div class="post-options">
              
            </div>
				<div class="x"></div>
      
		
			</div>
			
			<!-- sidebar -->
			<div id="right">
			
		
				<h2></h2>
			
			
			</div>
            <div id="center">
            <?php
  require_once("includes/add_data.php");

// ������Դ��Ͱҹ������v
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");


// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

//��͡������--���ͤ���
echo"<CENTER>";
echo"<Form method='post' action='?name=member&file=index'> <Table border=0>
<Tr bgcolor=$bg><Td>Search  Data <Select name='field_search'size='1'> 
<Option value='subject'>Subject No.</option>
<Option value='patient_initials'>Patient Initials</option>
<Option value='sex'>gender</option> 
<Option value='province'>Current  Address :  Province</option> 
<Option value='hn'>HN</option>
<Input type='text' name='search' >	 
<Input type='submit' value='Search' ></Form></Td></Table>";
if($search=="")//����Ҫ�ͧsearch�բ��������
{
	$sql2 = "select * from $tblname  where codehos='$codehos' order by id limit  $Gopage,$Pagesize";
	$set=0;
}
else
{
	$sql2 = " where $field_search like '%$search%'";
	$set=1;
}


// ����� SQL ���������ӧҹ
	$sql = "select * from $tblname where codehos='$codehos'  ";

	
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
$Pagesize=100; //��˹��ӹǹ�á����� 1 ˹��
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
	$sql2 = "select * from $tblname where  $field_search like '%$search%'  and codehos='$codehos' order by id  limit  $Gopage,$Pagesize";	
	echo "<Font color=blue> �ʴ��š�ä��Ң����ŷ���դ���� </Font><Font color=red>".$search." </Font></Font><br>&nbsp;";
}
else
{
					$sql2 = "select * from $tblname  where codehos='$codehos' order by id  limit  $Gopage,$Pagesize";	 
				
}

//�������ǹ��ǵ��ҧ
$bg="pink";	//��˹����������
echo "<Table border=0><Tr bgcolor=$bg>
	<Td><center>Subject</center></Td>
	<Td><center>Code</center></Td>
	<Td><center>Patient Initials</center></Td>
	<Td><center>Date of Birth</center></Td>
	<Td><center>Date of record</center></Td>
   	<Td><center>Date of last Contact</center></Td>
	<td><center>Pathology Consensus</center></td>
	<Td><center>Edit</center></Td>
	<td><center>Follow up</center></td>
	
	<br>
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
				$result = mysql_fetch_array($dbquery2);
				$id = $result[id];
				$subject = $result[subject];
				$centre = $result[centre];
				$d_record = $result[d_record];
				$m_record = $result[m_record];
				$y_record = $result[y_record];
				$date_of_record = $result[date_of_record];
				$patient_initials = $result[patient_initials];
				$date_last_contact_follow=	 $result[date_last_contact_follow];
				$date_of_birth=	 $result[date_of_birth];
   				$date_bio_report=	 $result[date_bio_report];
			
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
			   <Td Td align = center>$Number</Td> 
			    <Td Td align = center>$centre</Td> 
				<Td><center>$patient_initials</center></Td>
				<Td><center>$date_of_birth</center></Td>  
			   <Td><center>$d_record/$m_record/$y_record</center></Td>
			  
			   <Td><center>$date_last_contact_follow</center></Td>   
			   <td><center><A href='index.php?name=member&file=pathology&id=$id'>Pathology </center></a>			</td>   
			  <td><center><A href='index.php?name=member&file=edit_data_one&id=$id'>Edit</center></a></Td>      
			<td><center><A href='index.php?name=member&file=follow_up&id=$id'>Follow up</center></a>			</td> 
			
			  "; //�ʴ����������п�Ŵ� 
		       $count++;										
		    }
		$Recs++;		
    }//end while
}
	echo "</Table>";
if($set==1)
{
	echo "<Br>�鹾� <Font color=red>".$numrows." Record</font><br>";
}
else
{
	echo "<Br>�����ŷ����� <Font color=red>".$num_rows." Record</font><br>";
}
	echo "<CENTER><Br>˹�ҷ�� ".$Checkpage." / " .$Maxcount."<Br>";
if($num_rows>10)
{
	If ($Checkpage>1)		//����ʴ�˹�ҷ���ҡ���� 1 ���� Previous
		{
		echo "[ <A Href=".$Scriptname."?name=member&file=registry&Page=".($Checkpage-1)."&Pagesize=".$Pagesize.">��Ѻ�˹�ҷ������</A> ]";
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
		$Ref="<A Href=".$Scriptname."?name=member&file=registry&Page=".$N."&Pagesize=".$Pagesize.">".$Pad.$N."</A>";
		echo "  ".$Ref."  ";
	} 
	echo "]";
If ($Checkpage<$Maxcount)		//����ʴ�˹�ҷ����¡���˹���٧�ش ���� Next
	{
	echo "[<A Href=".$Scriptname."?name=member&file=registry&Page=".($Checkpage+1)."&Pagesize=".$Pagesize.">˹�ҶѴ�</A> ]";
	}
echo"</CENTER>";
}
echo "</Table>";

mysql_close();	// �Դ�����������
?>
            <br />

			
			
			<!-- sidebar -->

            <div id="left">
          

            <br />
         <h3 align="center"></h3>
     
			</div>
            <h1></h1>
     
			</div>
			 <?
 		if($codehos == "CMU"){
		echo "<a href='report/excel.php'><font color=\"red\"><b>	REPORT  EXCEL  DOWNLOAD </b></font></a>";
		} else if($codehos == "RAM"){
			echo "<a href='report/excel-ram.php'>	REPORT  EXCEL  DOWNLOAD </a>";
			}  else if($codehos == "PMK"){
				echo "<a href='report/excel-pmk.php'>	REPORT  EXCEL  DOWNLOAD </a>";
			}  else if($codehos == "CU"){
				echo "<a href='report/excel-cu.php'>	REPORT  EXCEL  DOWNLOAD </a>";
			}  else if($codehos == "KKU"){
				echo "<a href='report/excel-kku.php'>	REPORT  EXCEL  DOWNLOAD </a>";
			}  else if($codehos == "PSU"){
				echo "<a href='report/excel-psu.php'>	REPORT  EXCEL  DOWNLOAD </a>";
			}  else if($codehos == "SI"){
				echo "<a href='report/excel-si.php'>	REPORT  EXCEL  DOWNLOAD </a>";
			}  else if($codehos == "RVJ"){
				echo "<a href='report/excel-rvj.php'>	REPORT  EXCEL  DOWNLOAD </a>";
			}  else  if($codehos == "TU"){
				echo "<a href='report/excel-tu.php'>	REPORT  EXCEL  DOWNLOAD </a>";
			} 
				
				
				
				
	?>		
			<div class="x"></div>
			<div class="break"></div>

		</div>
        


			<? include "modules/index/footer.php"; ?>
<? } ?>