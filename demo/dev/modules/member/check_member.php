<?php
#### ʤ��껹����㹡���� �����͡�Թ�����ѧ ����ʤ��껹��������˹�ҷ��س��ͧ�������� ####
//�к���Ҫԡ����� maxsite 1.10 �Ѳ���� www.narongrit.net

session_start() ;
if(!session_is_registered("login_true")) {
$showmsg="<br><br><center><font size='3' face='MS Sans Serif'><b>������ ��ǹ�������Ѻ��Ҫԡ��ҹ��</b></font><br><br>���ѡ�����к��йӷ�ҹ��ѧ˹��ŧ����¹...";
	showerror($showmsg);
echo "<meta http-equiv='refresh' content='3;url=?name=member'>";
} else { // �����������ҷ���ͧ��õ�ͨҡ�ѹ���


} //����鴢�ҧ˹�ҹ�����������ҷ���ͧ��èӡѴ����ʴ�੾����Ҫԡ
### ������� ###
?>

