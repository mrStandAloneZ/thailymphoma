<?php 
session_start() ;

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$name=$_POST['name'];
$namel=$_POST['namel'];
$email=$_POST['email'];
$work=$_POST['work'];

//(member_id,name,date,month,year,age,sex,address,amper,province,zipcode,phone,education,work,user,password,email,signup)

// ��Ǩ�ͺ �óշ�����¡˹�ҹ����������·���͡���������ú
if($name=="" || $namel=="" || $province=="" || $user_name=="" || $pwd_name1=="" || $email=="") {
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>��ҹ��ͧ��͡���������ҧ���µ������˹����</b></font><br><br>
<input type='button' value='��Ѻ��ͧ����' onclick='history.back();'></center>" ;
	showerror($showmsg);
}  

// ��ҡ�͡���������١��ͧ
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)$",$email)){
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>��سҡ�͡���������١��ͧ���¤�Ѻ</b></font><br><br>
<input type='button' value='��Ѻ��ͧ����' onclick='history.back();'></center>" ;
	showerror($showmsg);
}
 else {
if((isset($ok)) and ($ok!="ok_pass")) {
echo "<meta http-equiv='refresh' content='0; url=?name=member'>" ;
}

$signup = date("j/n/").(date("Y")+543) ;

$name = htmlspecialchars($name) ;
$address = htmlspecialchars($_POST['address']) ;
$zipcode = htmlspecialchars($_POST['zipcode']) ;
$phone = htmlspecialchars($_POST['phone']) ;

// ��Ǩ�ͺ����ժ��� user �����������ѧ
$sql = "select user from ".TB_MEMBER." where user='$user_name'" ;
$result = mysql_query($sql) ;
$numrow = mysql_num_rows($result) ;
if($numrow!=0) {
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'>���ɴ��¤�Ѻ user $user_name ��� ���ռ��������Ǥ�Ѻ ��س�����¹���� Login ����<br><br><input type='button' value='��Ѻ��ͧ����' onclick='history.back();'></center>" ;
	showerror($showmsg);
//	echo"<meta http-equiv=\"refresh\" content=\"3;URL=?name=member\" />";
} else {

	//Check Pic Size
	$FILE = $_FILES['FILE'];
	if ( $FILE['size'] > _MEMBER_LIMIT_UPLOAD ) {
	$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>��Ҵ�ٻ���Ṻ���բ�Ҵ�Թ ".(_MEMBER_LIMIT_UPLOAD/1024)." kB ��سҵ�Ǩ�ͺ�ٻ�Ҿ�ͧ��ҹ</b></font><br><br>
	<input type='button' value='��Ѻ��ͧ����' onclick='history.back();'></center>" ;
	showerror($showmsg);
	} else {
	//�ŧ���ʡ�� ��зӡ�� upload
	if ( $FILE['type'] == "image/gif" )
			{$Filename = TIMESTAMP.".gif";}
	if ( $FILE['type'] == "image/png" )
			{$Filename = TIMESTAMP.".png";}
	elseif (($FILE['type']=="image/jpg")||($FILE['type']=="image/jpeg")||($FILE['type']=="image/pjpeg"))
			{$Filename = TIMESTAMP.".jpg";}
	@copy ($FILE['tmp_name'] , "member_pic/".$Filename );

// ����ѧ����ռ������� user ���

$sql = "select * from ".TB_MEMBER." order by id desc" ;
$result = mysql_query($sql) ;
$num_result  = mysql_num_rows($result) ;
$dbarr = mysql_fetch_row($result) ;
$member_db = $dbarr[0]+1 ; // �Ӥ�� id ���������Ѻ���������Ҫԡ������1

if($member_db>=100) {
$member_in = "0$member_db" ;
}
else {
if($member_db >=10) {
$member_in = "00$member_db" ;
}
else {
$member_in = "000$member_db" ;
}
}
	
$member_id = "$yourcode$member_in" ; // ������Ҫԡ�� ip0001
$result = mysql_query("insert into ".TB_MEMBER." (member_id,name,date,month,year,age,sex,address,amper,province,zipcode,phone,education,work,user,password,email,signup,member_pic,dtnow,lastlog)

values('$member_id','$name','$date','$month','$year','$age','$sex','$address','$amper','$province','$zipcode','$phone','$education','$work','$user_name','$pwd_name1','$email','$signup','$Filename','','')")  or die("�������ö�ѹ�֡�������� �ô��Ǩ�ͺ�����Դ��Ҵ ���͵Դ��� webmaster: mt761@hotmail.com");
if($result) {
$login_true = $user_name ;
session_register("login_true") ;
echo "<center><font size=\"3\" face='MS Sans Serif'><b>�ͺ�س�ҡ��Ѻ ����Ѻ���ŧ����¹����Ҫԡ</b></font></center>" ;
sendmail_welcome($member_id ,$name, $user_name , $pwd_name1 , $email ,$home) ;  // ���������١��� ���¡�ѧ�������ӧҹ
echo "<meta http-equiv='refresh' content='5; url=?name=member&file=member_detail'>" ;
}
}
 }
 }
?>