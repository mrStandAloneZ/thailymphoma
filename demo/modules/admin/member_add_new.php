<?php 
session_start() ;

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$max_id=$_POST['max_id'];
$fullname=$_POST['fullname'];
$sex=$_POST['sex'];    			
$age=$_POST['age'];
$hospital_name=$_POST['hospital_name'];
$codehos=$_POST['codehos'];
$address_office=$_POST['address_office'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$user=$_POST['user_name'];
$password=$_POST['pwd_name1'];
$hostpital_engname =$_POST["hostpital_engname"];

								
if($fullname==""  || $user_name=="" || $pwd_name1=="" || $email=="") {
		echo "<script language='javascript'>" ;
		echo "alert('��ҹ��ͧ��͡���������ҧ���µ������˹���� !')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
}  

// ��ҡ�͡���������١��ͧ
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)$",$email)){
		echo "<script language='javascript'>" ;
		echo "alert('��سҡ�͡���������١��ͧ���¤�Ѻ !')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
}
 else {
if((isset($ok)) and ($ok!="ok_pass")) {
echo "<meta http-equiv='refresh' content='0; url=admin.php?name=admin&file=signup'>" ;
}

$signup = date("j/n/").(date("Y")+543) ;

$fullname = htmlspecialchars($fullname) ;
$address_office = htmlspecialchars($_POST['address_office']) ;
$tel = htmlspecialchars($_POST['tel']) ;


// ��Ǩ�ͺ����ժ��� user �����������ѧ
$sql = "select user from ".TB_MEMBER." where user='$user_name'" ;
$result = mysql_query($sql) ;
$numrow = mysql_num_rows($result) ;
if($numrow!=0) {
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'>���ɴ��¤�Ѻ user $user_name ��� ���ռ��������Ǥ�Ѻ ��س�����¹���� Login ����<br><br><input type='button' value='��Ѻ��ͧ����' onclick='history.back();'></center>" ;
	showerror($showmsg);
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


//echo "insert into ".TB_MEMBER." (member_id,user,password,fullname,sex,age,hospital_name,codehos,address_office,work,tel_office,tel,email)
//values('$max_id','$user','$password','$fullname','$sex','$age','$hospital_name','$codehos','$address_office','$work','$tel_office','$tel','$email')";


$result = mysql_query("insert into ".TB_MEMBER." (member_id,user,password,fullname,sex,age,hospital_name,hostpital_engname,codehos,address_office,work,tel_office,tel,email)
values('$max_id','$user','$password','$fullname','$sex','$age','$hospital_name','$hostpital_engname','$codehos','$address_office','$work','$tel_office','$tel','$email')")  or die("�������ö�ѹ�֡�������� �ô��Ǩ�ͺ�����Դ��Ҵ ���͵Դ��� �����������");
if($result) {

echo "<TABLE width='90%' align=center cellSpacing=0 cellPadding=0 border=0><TR><TD><BR><BR><BR><BR>";
echo "<center><BR><BR><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"><BR><BR></center>";
echo "<center><font size=\"3\" face='MS Sans Serif'><b>������Ҫԡ ��������º��������</b></font><BR><BR><BR><BR><BR><BR><BR><BR></center>" ;
echo "<meta http-equiv='refresh' content='5; url=admin.php?name=admin&file=signup'>" ;
echo "</TD></TR></TABLE>";

}
}
 }
 }
?>