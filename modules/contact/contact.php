<? 
if(!session_is_registered("login_true")) {
//  url=index.php ����觹�������˹�ҷ��е�ͧ��͡ user,pwd �����������������������¡���١�Ф�Ѻ
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>�к�ŧ����¹������ adult acute leukemia � registry</a></h1>
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
	echo "<meta http-equiv='refresh' content='5;url=index.php?name=member&amp;file=login'>" ; 
	echo "	</p>
                </div>
			
			<!-- sidebar -->
			
			<div class='x'></div>
			<div class='break'></div>

		</div> " ;
 include 'modules/index/footer.php'; 
} else {
?>
<? include "modules/index/header.php" ; ?>
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
    width: 150px;
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
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=button]  {
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
      width: 80%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
}
</style>
    <div id="center">
    <p>
<?php 
session_start() ;

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$signup = date("j/n/").(date("Y")+543) ;
$subject=$_POST['subject'];
$yourmail=$_POST['yourmail'];
$detail=$_POST['detail'];
$name=$_POST['name'];

//(member_id,name,date,month,year,age,sex,address,amper,province,zipcode,phone,education,work,user,password,email,signup)

// ��Ǩ�ͺ �óշ�����¡˹�ҹ����������·���͡���������ú
if($subject==""  || $detail=="") {
	
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>��ҹ��ͧ��͡���������ҧ���µ������˹����</b></font><br><br>
<input type='button' value='��Ѻ��ͧ����' onclick='history.back();'></center>" ;
   showerror($showmsg);  
} 
$result = mysql_query("insert into ".TB_MAIL." (subject,yourmail,detail,name,signup)
values('$subject','$yourmail','$detail','$name','$signup')")  or die("�������ö�ѹ�֡�������� �ô��Ǩ�ͺ�����Դ��Ҵ ���͵Դ��� webmaster");
if($result) {
echo "<center><img src='images/login-redirection-loader.gif' alt='login-redirection-loader' />
<br><br><br><br><font size=\"3\" face='MS Sans Serif'><b>�ͺ�س�ҡ��Ѻ </b></font></center>" ;
echo "<meta http-equiv='refresh' content='5; url=index.php'>" ;
 }
?>
					<BR><BR>
</p>
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>
<? include "modules/index/footer.php"; ?>
<? } ?>