<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
</HEAD>

<BODY>
<CENTER><B></B>
<? include "modules/index/header.php" ; ?>
<?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$bb=$dbarr['member_id']; 
$cc=$dbarr['adviser_id'];
$dd=$dbarr['typemember'];
$ty=$dbarr['typepa'];
?>
<br><br>
<?php
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "root";	//���ͼ����
$password = "password";	 //���ʼ�ҹ
$dbname = "tumect";	//���Ͱҹ������
$tblname = "web_addnew";	//���͵��ҧ


// ������Դ��Ͱҹ������
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");


// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

?>

<? if($dd =='200'  || $dd =='300' || $dd == '400') {?>
<?
//��͡������--���ͤ���
echo"<CENTER><Br>";
echo"<Form method='post' action='index.php?name=member&file=detailmember_no_approve'>                              
<Table border=0><Tr bgcolor=$bg><Td>���Ң�����		
<Select name='field_search'size='1'>                                              
<Option value='title'>��Ǣ������ͧ</option>		</Select>	              			
<Select name='search'size='1'>                                              
<Option value='���͹�š�����¹'>���͹�š�����¹</option>		
<Option value='�͡�Ѻ����֡�ҵ��'>�͡�Ѻ����֡�ҵ��</option>	
<Option value='title'>���͹�š�����¹</option>	
<Option value='title'>���͹�š�����¹</option>	

</Select>	        
<Input type='submit' value='�ӡ�ä���' ></Form> 	</Td></Table>";
if($search=="")//����Ҫ�ͧsearch�բ��������
{
	$sql2 = "select * from $tblname order by id limit  $Gopage,$Pagesize";
	$set=0;
}
else
{
	$sql2 = " where status='�ѧ���͹��ѵ�' and $field_search like '%$search%'";
	$set=1;
}
?>
<? } else{}?>
<?

if($dd =='100' )
{
// ����� SQL ���������ӧҹ
	$sql = "select * from $tblname where member_id='$bb' and status='�ѧ���͹��ѵ�'  ";
}    
		elseif ($dd =='200')
		{ 	$sql = "select * from $tblname where adviser_id='$cc' and status='�ѧ���͹��ѵ�' "; }
		elseif ($dd =='300')
		{  $sql = "select * from $tblname where typepa='$ty' and status='�ѧ���͹��ѵ�' ";   }
else {
		$sql = "select * from $tblname where   status='���˹���Ҥ͹��ѵ�'";

}
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
	$sql2 = "select * from $tblname where status='�ѧ���͹��ѵ�' and $field_search like '%$search%' order by id limit  $Gopage,$Pagesize";	
	echo "<Font color=blue> �ʴ��š�ä��Ң����ŷ���դ���� </Font><Font color=red>".$search." </Font><Font  color=blue>ʶҹ� <Font color=red>�ѧ���͹��ѵ�</Font><br>&nbsp;";
}
else
{
	
if($dd =='100')
{
$sql2 = "select * from $tblname  where member_id='$bb'  and status='�ѧ���͹��ѵ�' order by id limit  $Gopage,$Pagesize";	 
}
		elseif($dd =='200')
		{  	$sql2 = "select * from $tblname  where adviser_id='$cc' and status ='�ѧ���͹��ѵ�'order by id limit  $Gopage,$Pagesize";	   }
		elseif ($dd =='300')
			{  	$sql2 = "select * from $tblname  where typepa='$ty' and status='�ѧ���͹��ѵ�'  order by id limit  $Gopage,$Pagesize";	   }
else {
	$sql2 = "select * from $tblname  where    status='���˹���Ҥ͹��ѵ�' order by id limit  $Gopage,$Pagesize";	 

}
}
?>
<? //�������ǹ��ǵ��ҧ ?>

<?  if($dd =='100' ){?>
<?
$bg="pink";	//��˹����������
echo "<Table border=1><Tr bgcolor=$bg>    														<Td>�ӴѺ���</Td>																			<Td><center>�ѹ���</center></Td>													                             <Td>��͹</Td>                                              <Td>��</Td>                                               <Td><center>����ͧ</center></Td>                                  
<Td>ʶҹ�</Td>                                                 <Td>��������´</Td>					<td>¡��ԡ����ͧ</td>							                 ";  ?>
 
<?  }elseif($dd =='200') {?>
<?
$bg="pink";	//��˹����������
echo "<Table border=1><Tr bgcolor=$bg>    														<Td>�ӴѺ���</Td>																			<Td><center>�ѹ���</center></Td>													                             <Td>��͹</Td>                                              <Td>��</Td>                                               <Td><center>����ͧ</center></Td>                                  
<Td>ʶҹ�</Td>                                                 <Td>��������´</Td>							                 ";  
?>
<?  }elseif($dd =='300') {?>
<?
$bg="pink";	//��˹����������
echo "<Table border=1><Tr bgcolor=$bg>    														<Td>�ӴѺ���</Td>																			<Td><center>�ѹ���</center></Td>													                             <Td>��͹</Td>                                              <Td>��</Td>                                               <Td><center>����ͧ</center></Td>                                  
<Td>ʶҹ�</Td>                                                 <Td>��������´</Td>							                 ";  
?>
<?  }else { ?>
<?
$bg="pink";	//��˹����������
echo "<Table border=1><Tr bgcolor=$bg>    														<Td>�ӴѺ���</Td>																			<Td><center>�ѹ���</center></Td>													                             <Td>��͹</Td>                                              <Td><center>��</center></Td>                                               <Td><center>����ͧ</center></Td>                                  
<Td><center>ʶҹ�</center></Td>                                                 <Td>��������´</Td>								                  ";  
}
?>
<?
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
				$date = $result[date];
				$month = $result[month];
				$year = $result[year];
				$title = $result[title];
				$status=	 $result[status];
			If ($bg=="skyblue")
				{
				$bg="skyblue";		
				}
			Else
				{
				$bg="skyblue";
				}
				?>
   <?				
   if($dd =='100'){
		//show data
	echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
	echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td>$date</Td>
			   <Td>$month</Td> 
			   <Td>$year</Td>    
			   <Td>$title</Td>
			   <Td><center>$status</center></Td>          
			   <Td><center><A Href='index.php?name=member&file=title_old&id=$id'>��</center></A></Td>      
			   <Td><center><A Href=\"index.php?name=member&file=member_delete&id=$id\">Delete</A></center></Td>"; //�ʴ����������п�Ŵ� 
	
  ?>
<? } elseif($dd =='200'){ 
			echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
			echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td>$date</Td>
			   <Td>$month</Td> 
			   <Td>$year</Td>    
			   <Td>$title</Td>
			   <Td><center>$status</center></Td>          
			   <Td><center><A Href='index.php?name=member&file=title_old&id=$id'>��</center></A></Td>   "; //�ʴ����������п�Ŵ� 
?>
<? } elseif($dd =='300'){ 
			echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
			echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td>$date</Td>
			   <Td>$month</Td> 
			   <Td>$year</Td>    
			   <Td>$title</Td>
			   <Td><center>$status</center></Td>          
			   <Td><center><A Href='index.php?name=member&file=title_old&id=$id'>��</center></A></Td>   "; //�ʴ����������п�Ŵ� 
?>
        <? }  else { ?>
      <?
				//show data
	echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
	echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td>$date</Td>
			   <Td>$month</Td> 
			   <Td>$year</Td>    
			   <Td>$title</Td>
			   <Td><center>$status</center></Td>          
			   <Td><center><A Href='index.php?name=member&file=title_old&id=$id'>��</center></A></Td>   "; //�ʴ����������п�Ŵ� 
            
		} ?>
    
		<?	   
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
		echo "[ <A Href=".$Scriptname."?Page=".($Checkpage-1)."&Pagesize=".$Pagesize.">��Ѻ�˹�ҷ������</A> ]";
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
		$Ref="<A Href=".$Scriptname."?Page=".$N."&Pagesize=".$Pagesize.">".$Pad.$N."</A>";
		echo "  ".$Ref."  ";
	} 
	echo "]";
If ($Checkpage<$Maxcount)		//����ʴ�˹�ҷ����¡���˹���٧�ش ���� Next
	{
	echo "[<A Href=".$Scriptname."?Page=".($Checkpage+1)."&Pagesize=".$Pagesize.">˹�ҶѴ�</A> ]";
	}
echo"</CENTER>";
}
echo "</Table>";

mysql_close();	// �Դ�����������
?>
<?  include "modules/index/footer.php" ; ?>