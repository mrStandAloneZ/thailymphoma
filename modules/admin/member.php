<?php
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);



?>

<style type="text/css">





	select {
    width: 90%;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
        background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; 
}
input {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
textarea{
      width: 100%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #f6f6f6;
 font-size: 15px;
  color:#18222e;
}
</style>
<br /><br />
<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
          
  <tr>
                    <td >    
                        <div align="center"> 
                        <?php
  require_once("includes/member.php");

// ������Դ��Ͱҹ������v
mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db($dbname) or die("���͡�ҹ�����������");

//��͡������--���ͤ���
echo"<CENTER><Br>";
echo"<Form method='post' action='admin.php?name=admin&file=member'>       
<Table border=0><Tr bgcolor=$bg><Td>���Ң�����		
			<Select name='field_search'size='1'>                                    
				<Option value='member_id'>������Ҫԡ</option>											
				<Option value='fl'>�ѡ����ͧ͢������й��ʡ��</option>                         
				<Option value='fullname'>����-ʡ��</option>					
				<Option value='sex'>��</option>							
				<Option value='date_birth'>�ѹ�Դ</option>	
				<Option value='province'>��������</option>							
				<Option value='treatment'>�Է�ԡ���ѡ��</option>							
				<Option value='career'>�Ҫվ</option>		</Select>					
<Input type='text' name='search' >						
<Input type='submit' value='�ӡ�ä���' style='background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;'></Form>
<Td><form method= 'post' action= 'admin.php?name=admin&file=signup'><Input type='submit' value='&nbsp;&nbsp;������ª���&nbsp;&nbsp;'  style='background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;' > </form></Td></Td></Table>";
if($search=="")//����Ҫ�ͧsearch�բ��������
{
	$sql2 = "select * from $tblname order by codehos asc";
	$set=0;
}
else
{
	$sql2 = " where $field_search like '%$search%'";
	$set=1;
}

// ����� SQL ���������ӧҹ
	$sql = "select * from $tblname";

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
	$sql2 = "select * from $tblname where $field_search like '%$search%' order by codehos asc";	
	echo "<Font color=blue> �ʴ��š�ä��Ң����ŷ���դ���� </Font><Font color=red>".$search." </Font><Font  color=blue>㹿�Ŵ� <Font color=red>".$field_search." </Font><br>&nbsp;";
}
else
{
		
					$sql2 = "select * from $tblname   order by codehos asc";	 

}


//�������ǹ��ǵ��ҧ
$bg="pink";	//��˹����������
echo "<Table border=1><Tr bgcolor='#d78611'> 
			<Td><center>�ӴѺ���</center></Td>
			<Td><center>������Ҫԡ</center></Td>	
			<Td><center>����-���ʡ�� </center></Td>
			<Td><center>�ç��Һ��</center></Td>
			<Td><center>���˹� </center></Td>        
			<Td><center>������</center></Td> 
			<Td><center>��Ͷ�� </center></Td> 
			<Td><center>username </center></Td> 
			<Td><center>password </center></Td> 
			 <Td><center>edit</center></Td>	
			 <Td><center>Delete</center></Td>";  


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
 $ik=0;

While  ($Recs<=$num_rows)	// �ʴ��á���촨ӹǹ����Թ�ӹǹ�á���촵��˹��
	{		
			if($count<$numrows)
		   {
				$Number = $Gopage+$Recs+1;	// ������ʴ��á���촷�������
				$result = mysql_fetch_array($dbquery2);
				$id = $result[id];
				$member_id = $result[member_id];
				$fullname = $result[fullname];
				$hospital_name = $result[hospital_name];
				$work = $result[work];
				$tel_office = $result[tel_office];
				$tel=$result[tel];
				
				$user=$result[user];
				$password=$result[password];
				
				
				$tyhop = $result[codehos];
				$ik++;
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
	echo "<Tr bgcolor='#e7d7c0'>                   
			   <Td Td align = center>$ik</Td> 
			   <Td><center>$member_id</center></Td>
			   <Td><center>$fullname</center></Td> 
			   <Td align='left'>&nbsp;$tyhop&nbsp;:&nbsp;$hospital_name</Td>    
			   <Td><center>$work<center></Td>
			   <Td><center>$tel_office</center></Td>          
			   <Td><center>$tel<center></Td>
			    <Td><center>$user<center></Td>
				 <Td><center>$password<center></Td>
			   <Td><center><A Href='admin.php?name=admin&file=member_edit&id=$id'>���</center></A></Td>      
			    <Td><center><A Href='?name=admin&file=member_delete&id=$id'>ź</a></center></Td>        
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
	
if($num_rows>10)
{
	If ($Checkpage>1)		//����ʴ�˹�ҷ���ҡ���� 1 ���� Previous
		{
		
		}
	
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

	} 

If ($Checkpage<$Maxcount)		//����ʴ�˹�ҷ����¡���˹���٧�ش ���� Next
	{
	
	}
echo"</CENTER>";
}
echo "</Table>";

mysql_close();	// �Դ�����������
?>
                          <p><br>
                          
</p>
                  
                      </div></td>
                  </tr>
              </TD>
          </TR>
        </TABLE>
