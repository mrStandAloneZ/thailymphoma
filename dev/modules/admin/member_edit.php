<!-- main content -->
<?php
require_once("includes/config.in.php");
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);

// ������Դ��Ͱҹ������
$connect = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
$db = mysql_select_db(DB_NAME) or die("���͡�ҹ�����������");

// ����� SQL ���������ӧҹ
$sql = "select * from " . TB_MEMBER . " where id ='$id'";
$dbquery = mysql_query($sql, $connect) or die("�觤���������");
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
<?php
echo "<Center>";
echo "<B><Font size=4 color=blue>���ʻ�Шӵ����Ҫԡ </Font><Font size=4 color=red> " . $member_id . "</Font></B>";
echo "<Font size=4>";
echo "<Form action=\"admin.php?name=admin&file=member_edit_add\" method=\"post\">";  // �觤����ѻഷ
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

echo "</Table>";
echo "<Br><Input type=\"Submit\" value=\"&nbsp;���&nbsp;\">";
echo "</Form>";
echo "<Form action=\"index.php\" method=\"post\">";
echo "<Input type=\"Submit\" value=\"&nbsp;¡��ԡ&nbsp;\">";
echo "</Form>";
echo "</Font>";
echo "</Center>";

require_once("includes/add_data.php");
?>
