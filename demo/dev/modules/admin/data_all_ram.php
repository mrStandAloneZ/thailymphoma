<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
          <?php

$codehos=RAM ;
?>

<!-- main content -->
			<div id="left">
                <h1>ʶҹС��ŧ����¹������ �ͧ RAM</h1>
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
  require_once("includes/add_data.php");

// ������Դ��Ͱҹ������v
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");


// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

//��͡������--���ͤ���
echo"<CENTER>";
echo"<Form method='post' action='?name=admin&file=data_all_ram'> <Table border=0>
<Tr bgcolor=$bg><Td>Search  Data <Select name='field_search'size='1'> 
<Option value='centre'>Code</option>
<Option value='patient_initials'>Patient Initials</option>
<Option value='sex'>genden</option> 
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
	$sql = "select * from $tblname where codehos='$codehos' ";

	
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
	$sql2 = "select * from $tblname where  $field_search like '%$search%'  and codehos='$codehos' order by id limit  $Gopage,$Pagesize";	
	echo "<center><Font color=blue> �ʴ��š�ä��Ң����ŷ���դ���� </Font><Font color=red>".$search." </Font></Font></center><br>&nbsp;";
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
	";  


//show search

$dbquery2= mysql_db_query($dbname,$sql2);
$numrows = mysql_num_rows($dbquery2);
$count=0;
if($num_rows==0)
	{
	echo "<Table border=1>";
	echo "<Tr bgcolor='ffffff'><Td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<center><b>����բ����� !&nbsp;</b></center> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</Td></Tr>";
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
	echo "<Br><center>�鹾� <Font color=red>".$numrows." �á����</font></center><br>";
}
else
{
	echo "<center><Br>�����ŷ����� <Font color=red>".$num_rows." �á����</font><br></center>";
}
	echo "<CENTER><Br>˹�ҷ�� ".$Checkpage." / " .$Maxcount."<Br>";
if($num_rows>10)
{
	If ($Checkpage>1)		//����ʴ�˹�ҷ���ҡ���� 1 ���� Previous
		{
		echo "[ <A Href=".$Scriptname."?name=admin&file=data_all_ram&Page=".($Checkpage-1)."&Pagesize=".$Pagesize.">��Ѻ�˹�ҷ������</A> ]";
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
		$Ref="<A Href=".$Scriptname."?name=admin&file=data_all_ram&Page=".$N."&Pagesize=".$Pagesize.">".$Pad.$N."</A>";
		echo "  ".$Ref."  ";
	} 
	echo "]";
If ($Checkpage<$Maxcount)		//����ʴ�˹�ҷ����¡���˹���٧�ش ���� Next
	{
	echo "[<A Href=".$Scriptname."?name=admin&file=data_all_ram&Page=".($Checkpage+1)."&Pagesize=".$Pagesize.">˹�ҶѴ�</A> ]";
	}
echo"</CENTER>";
}
echo "</Table>";

mysql_close();	// �Դ�����������
?>

			
			
			<!-- sidebar -->
		  <h3 align="center">0 = No Data, 1 = Incomplete  ,  2 = Complete  ,  3=  Approve </h3>
           
          	 <?
 		if($codehos == "RAM"){
		echo "<a href='report/excel-ram.php'><font color=\"red\"><b>	REPORT  EXCEL  DOWNLOAD </b></font></a>";
		} 		
	?>	

            <br />
         <h3 align="center"></h3>
     
			</div>
            <h1></h1>
     
			</div>
			
          
          
        </TABLE>
