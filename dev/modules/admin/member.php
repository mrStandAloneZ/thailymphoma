<?php
require_once("includes/config.in.php");
// ������Դ��Ͱҹ������v
mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
mysql_select_db(DB_NAME) or die("���͡�ҹ�����������");

CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
$page = $_REQUEST["page"];
if ($page == "") {
    $Gopage = 1;
} else {
    $Gopage = $page;
}
?>
<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
    <TR>
        <td><b><a href="admin.php?name=admin&file=main">HOME</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b><a href="admin.php?name=admin&file=member">��Ҫԡ������</b></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <B><a href="admin.php?name=admin&file=signup">������Ҫԡ</a></B> </td>

    <BR>
    <tr>
        <td >    
            <div align="center"> 
                <?php
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
<Input type='submit' value='�ӡ�ä���' ></Form>
<Td><form method= 'post' action= 'admin.php?name=admin&file=signup'><Input type='submit' value='&nbsp;&nbsp;������ª���&nbsp;&nbsp;' > </form></Td></Td></Table>";
                $sql2 = " select *  "
                        . " from " . TB_MEMBER . ""
                        . " order by id limit  $Gopage,$Pagesize";
                $set = 0;
                if ($search) {
                    $sql2 . " where $field_search like '%$search%'";
                    $set = 1;
                }

// ����� SQL ���������ӧҹ
                $sql = " select *  "
                        . " from " . TB_MEMBER . "";

                $dbquery = mysql_db_query(DB_NAME, $sql);


// �Ҩӹǹ�á���촢�����㹵��ҧ
                $num_rows = mysql_num_rows($dbquery);


// �Ҩӹǹ��Ŵ�㹵��ҧ
                $num_fields = mysql_num_fields($dbquery);



                $Pagesize = $HTTP_GET_VARS["Pagesize"]; //�Ѻ��Ҩӹǹ�á���촨ҡ Query String
                $Pagesize = 10; //��˹��ӹǹ�á����� 1 ˹��
                $Maxcount = ceil($num_rows / $Pagesize); //������Ҩӹǹ˹�ҷ�����
                $Gopage = (($Gopage - 1) * $Pagesize) + $Recs; //����á�˹�˹�ҷ���� ���͡�˹��á���촷��д֧���������ʴ�
                $Recs = 0;
                $Checkpage = ($Gopage / $Pagesize) + 1;
                If ($Checkpage == $Maxcount) {//��Ǩ�ͺ˹���ش����
                    $Newsize = $num_rows % $Pagesize;
                    if ($Newsize == 0) {
                        $Newsize = 10;
                    }
                    $Pagesize = $Newsize;
                }
                if ($set == 1) {
                    $sql2 = "";
                    $sql2 = "select * from " . TB_MEMBER . " where $field_search like '%$search%' order by id limit  $Gopage,$Pagesize";

                    echo "<Font color=blue> �ʴ��š�ä��Ң����ŷ���դ���� </Font><Font color=red>" . $search . " </Font><Font  color=blue>㹿�Ŵ� <Font color=red>" . $field_search . " </Font><br>&nbsp;";
                } else {
                    $sql2 = "";
                    $sql2 = "select * from " . TB_MEMBER . "   order by id limit  $Gopage,$Pagesize";
                }

//�������ǹ��ǵ��ҧ
                $bg = "pink"; //��˹����������
                echo "<Table border=1><Tr bgcolor=$bg> 
			<Td><center>�ӴѺ���</center></Td>
			<Td><center>������Ҫԡ</center></Td>	
			<Td><center>����-���ʡ�� </center></Td>
			<Td><center>�ç��Һ��</center></Td>
                        <Td><center>�����ç��Һ��</center></Td>
			<Td><center>���˹� </center></Td>        
			<Td><center>������</center></Td> 
			<Td><center>��Ͷ�� </center></Td> 
			 <Td><center>edit</center></Td>	
			 <Td><center>Delete</center></Td>";


//show search

                $dbquery2 = mysql_db_query(DB_NAME, $sql2);
                $numrows = mysql_num_rows($dbquery2);
                $count = 0;
                if ($num_rows == 0) {
                    echo "<Table border=1>";
                    echo "<Tr bgcolor='ffffff'><Td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>����բ����� !&nbsp;</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</Td></Tr>";
                    echo "</Table>";
                } else {
                    While ($Recs <= $Pagesize) { // �ʴ��á���촨ӹǹ����Թ�ӹǹ�á���촵��˹��
                        if ($count < $numrows) {
                            $Number = $Gopage + $Recs + 1; // ������ʴ��á���촷�������
                            $result = mysql_fetch_array($dbquery2);
                            $id = $result[id];
                            $member_id = $result[member_id];
                            $fullname = $result[fullname];
                            $hospital_name = $result[hospital_name];
                            $hospitalCode = $result[codehos];
                            $work = $result[work];
                            $tel_office = $result[tel_office];
                            $tel = $result[tel];
                            If ($bg == "skyblue") {
                                $bg = "skyblue";
                            } Else {
                                $bg = "skyblue";
                            }
                            //show data
                            echo "<? echo (($Gopage-1)*$Pagesize)+$Recs; ?> ";
                            echo "<Tr bgcolor=$bg>                   
			   <Td Td align = center>$id</Td> 
			   <Td><center>$member_id</center></Td>
			   <Td><center>$fullname</center></Td> 
			   <Td><center>$hospital_name<center></Td>  
                               <Td><center>$hospitalCode<center></Td>  
			   <Td><center>$work<center></Td>
			   <Td><center>$tel_office</center></Td>          
			   <Td><center>$tel<center></Td>
			   <Td><center><A Href='admin.php?name=admin&file=member_edit&id=$id'>���</center></A></Td>      
			    <Td><center><A Href='?name=admin&file=member_delete&id=$id'>ź</a></center></Td>        
			  "; //�ʴ����������п�Ŵ� 

                            $count++;
                        }
                        $Recs++;
                    }//end while
                }
                echo "</Table>";
                if ($set == 1) {
                    echo "<Br>�鹾� <Font color=red>" . $numrows . " �á����</font><br>";
                } else {
                    echo "<Br>�����ŷ����� <Font color=red>" . $num_rows . " �á����</font><br>";
                }
                echo "<CENTER><Br>˹�ҷ�� " . $Checkpage . " / " . $Maxcount . "<Br>";
                if ($num_rows > 10) {

                    If ($Checkpage > 1) {  //����ʴ�˹�ҷ���ҡ���� 1 ���� Previous
                        echo "[ <A Href=" . $Scriptname . "?name=admin&file=member&Page=" . ($Checkpage - 1) . "&Pagesize=" . $Pagesize . ">��Ѻ�˹�ҷ������</A> ]";
                    }
                    echo "[";
                    $Pad = "";
                    //�Ѻ��Ҫ���ʤ�Ի�����͹���������ǹ˹�觢ͧ�����ҧ�ԧ
                    $Scriptname = ${"Script_Name"};
                    for ($N = 1; $N <= $Maxcount; $N = $N + 1) {
                        if ($N >= 10) {
                            $Pad = "";
                        }
                        //��˹������Ţ˹��������ҧ�ԧ����
                        $Ref = "<A Href=" . $Scriptname . "?name=admin&file=member&page=" . $N . "&Pagesize=" . $Pagesize . ">" . $Pad . $N . "</A>";
                        echo "  " . $Ref . "  ";
                    }
                    echo "]";
                    If ($Checkpage < $Maxcount) {  //����ʴ�˹�ҷ����¡���˹���٧�ش ���� Next
                        echo "[<A Href=" . $Scriptname . "?name=admin&file=member&page=" . ($Checkpage + 1) . "&Pagesize=" . $Pagesize . ">˹�ҶѴ�</A> ]";
                    }
                    echo"</CENTER>";
                }
                echo "</Table>";

                mysql_close(); // �Դ�����������
                ?>
                <p><br>

                </p>

            </div></td>
    </tr>
</TD>
</TR>
</TABLE>
