<!-- main content -->
<?
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
input[type=text]  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=password]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
button  {
    width: 80px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=button]  {
    width: 80px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}

input[type=Submit]  {
    width: 80px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}

textarea{
      width: 80%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
}
</style>
<?
//��˹���������͹����ҹ
$hostname = "localhost";	//������ʵ�
$user = "thailympho_dbp";	//���ͼ����
$password = "VB-D#ThaAi#LogCe&";	 //���ʼ�ҹ
$dbname = "thailympho_dbp";	//���Ͱҹ������
$tblname = "web_member1";	//���͵��ҧ 

// ������Դ��Ͱҹ������
$connect = mysql_connect($hostname, $user, $password) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
$db = mysql_select_db($dbname) or die("���͡�ҹ�����������");

// ����� SQL ���������ӧҹ
$sql = "select * from $tblname where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die ("�觤���������");
$result = mysql_fetch_array($dbquery);
		$id = $result[id];
		$member_id = $result[member_id];
		$user = $result[user];
		$password = $result[password];
		$fullname = $result[fullname];
		$sex = $result[sex];
		$age = $result[age];
		$hospital_name = $result[hospital_name];
     	$codehos = $result[codehos];
		$address_office = $result[address_office];
		$work = $result[work];
		$tel_office = $result[tel_office];
		$tel = $result[tel];
		$email = $result[email];
	
?>
<br><br />
<?

echo "<Center>";
echo "<B><Font size=4 color=blue>���ʻ�Шӵ����Ҫԡ </Font><Font size=4 color=red> ".$member_id."</Font></B>";
echo "<Font size=4>";
echo "<Form action=\"admin.php?name=admin&file=member_edit_add\" method=\"post\">";	 // �觤����ѻഷ
echo "<Input type=\"hidden\" name=\"id\" Size=\"20\" value=\"$id\">";
echo "<Table>";
echo "<Tr><Td align = right>������Ҫԡ:</Td><td><Input type=\"text\" name=\"member_id\" Size=\"50\" value=\"$member_id\"></td></tr>";
echo "<Tr><Td align = right>����-���ʡ�� : </Td> <Td><Input type=\"text\" name=\"fullname\" Size=\"50\" value=\"$fullname\"></Td></Tr>";
echo "<Tr><Td align = right>�� : </Td> <Td><Input type=\"text\" name=\"sex\" Size=\"50\" value=\"$sex\"></Td></Tr>";
echo "<Tr><Td align = right>���� : </Td> <Td><Input type=\"text\" name=\"age\" Size=\"50\" value=\"$age\"></Td></Tr>";
echo "<Tr><Td align = right>�ç��Һ�� :</Td> <Td><Input type=\"text\" name=\"hospital_name\" Size=\"20\" value=\"$hospital_name\"> </Td></Tr>";
echo "<Tr><Td align = right>�����ç��Һ�� : </Td> <Td><Input type=\"text\" name=\"codehos\" Size=\"50\" value=\"$codehos\"></Td></Tr>";
echo "<Tr><Td align = right>��������ç��Һ�� : </Td> <Td><Input type=\"text\" name=\"address_office\" Size=\"50\" value=\"$address_office\"></Td></Tr>";
echo "<Tr><Td align = right>���˹� : </Td> <Td><Input type=\"text\" name=\"work\" Size=\"20\" value=\"$work\"></Td></Tr>";
echo "<Tr><Td align = right>������ : </Td> <Td><Input type=\"text\" name=\"tel_office\" Size=\"20\" value=\"$tel_office\"></Td></Tr>";
echo "<Tr><Td align = right>��Ͷ�� : </Td> <Td><Input type=\"text\" name=\"tel\" Size=\"20\" value=\"$tel\"></Td></Tr>";
echo "<Tr><Td align = right>email  :</Td> <Td><Input type=\"text\" name=\"email\" Size=\"20\" value=\"$email\"></Td></Tr>";
echo "<Tr><Td align = right><u>Username</u>  </Td> <Td><Input type=\"text\" name=\"user\" Size=\"20\" value=\"$user\"></Td></Tr>";
echo "<Tr><Td align = right><u>Password</u>  </Td> <Td><Input type=\"text\" name=\"pass\" Size=\"20\" value=\"$password\"></Td></Tr>";
echo "</Table><table><tr><td align='right'><br><br>";
echo "<Input type=\"Submit\" value=\"&nbsp;���&nbsp;\" style=\"background-color:#7a5037;color:#FFFFFF;cursor:pointer;\">";
echo "</td>";
echo "<td><br><br>";
echo "<Input type=\"button\" value=\"&nbsp;¡��ԡ&nbsp;\"  onclick=\"window.location='http://thailymphomaregistry.org/admin.php?name=admin&file=member'\"  style=\"background-color:#7a5037;color:#FFFFFF;cursor:pointer\">";
echo "</td></tr></table><br><br>";
echo "</form>";
echo "</Center>";

  require_once("includes/add_data.php");
?>
