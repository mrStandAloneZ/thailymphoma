<? 
if(!session_is_registered("login_true")) {
//  url=index.php ����觹�������˹�ҷ��е�ͧ��͡ user,pwd �����������������������¡���١�Ф�Ѻ
	echo "
	<div id='wrapper'>
		<div id='logo'>
			<h1><a href='index.php'>������Ѵ���ҧ��÷ӧҹ�ͧ��Һ��</a></h1>
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
<!--
.style1 {font-size: 16px}
-->
</style>

	<div class="style1" id="center">
    <p><h1>�����͡����ҹ</h1>
	���͡����ҹ������Ѵ���ҧ��÷ӧҹ�ͧ��Һ�ŷ��١��ͧ ���Ѵ��������֧��Ѵ��˹�Ҥ����͡����ҹ���ͤ������㨷��ç�ѹ ����������´�ѧ���

<br /><br />

1. ��������ҹ������Ѵ���ҧ��÷ӧҹ�ͧ��Һ�� ���繵�ͧ�� user ��� password <br /><br />

2. ���������Ҷ֧˹����ѡ�ͧ����� �����ҹ�о���������´�ͧ��Ǣ�͢�������ç��Һ�� ��Ǣ�͡Ԩ�����ç��Һ�� ������١�������ҹ���ǹ��ҧ�ͧ�����<br /><br />

3. ˹�ҵ��ҧ��� ���ʴ����ҧ��û�Ժѵԧҹ�ͧ��Һ�� �����ҹ����ö���͡�������ѹ��Ժѵԧҹ��Ҽ����ҹ��ͧ��һ�Ժѵԧҹ�����˹�ͧ�ѹ���<br /><br />

4. ˹����Ҫԡ �����ҹ����ö���¡����������´��ǹ��� ������觢�������ǹ������Ѻ admin �����������Ŵѧ�����ŧ����������դ����١��ͧ������� �������ö��䢢����ŷ�����١��ͧ�����Ǣ����䢢�������ǹ��� ����բ����źҧ���ҧ�������ҹ�������ö����ͧ�� ���ͧ�ҡ�����Ŵѧ����� �繢������Ӥѭ �� ���˹� ����ѵԡ�÷ӧҹ ��м����ҹ����ö����¹���ʼ�ҹ�������˹��������ʼ�ҹ
<br /><br />
5. ���٢�����СԨ���� ���ʴ������šԨ����������âͧ�ҧ�ç��Һ���������ҹ�Ѻ��Һ����������ҹ��<br /><br />

6. ���ٵԴ��ͼ����� �з�˹�ҷ���������ҹ����ö�Դ��ͼ����ż�ҹ����� ����ͼ����ҹ�ջѭ�Ң��ʧ�������ǡѺ�����ŵ�ҧ�ͧ�����<br /><br />

7. �����͡�ҡ�к� ��ѧ�ҡ�������ҹ��ԡ��ҹ��������� ��è��͡�ҡ����� �¡�����͡�����͡�ҡ�к� ����  �Դ��������  ������Դ�������������� ���ͤ�����ʹ��¢ͧ������<br /><br />
</p>
        </div>
    
<!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>
<? include "modules/index/footer.php"; ?>
<? } ?>