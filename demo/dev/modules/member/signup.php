<?
$date_today = date("d-m-Y [H:i:s]");
//�к���Ҫԡ

?>
<html>
<head>
<title>�к���Ѥ���Ҫԡ</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="720"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="2" valign="top"><IMG src="images/fader.gif" border=0></td>
    <td><h2><IMG src="images/topfader.gif" border=0><br>
&nbsp;&nbsp;<IMG SRC="images/menu/textmenu_member.gif" BORDER="0"><br>
    </h2></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <TR>
        <TD height="1" class="dotline"></TD>
      </TR>
      <tr>
        <td> </td>
      </tr>
      <tr>
        <td>
          <form name ="checkForm" action="?name=member&file=member_add_new" method="post" onSubmit="return check()"  enctype="multipart/form-data">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="3">
              <tr>
                <td colspan="2">
                  <p align="center"> <strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;��سҡ�͡��������´����Ѻ��Ѥ���Ҫԡ&nbsp;&nbsp;</font></strong></p></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                  <p><strong><font color="#0000FF" size="1" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/admin/user.gif" ></font></strong></p></td>
                <td bgcolor="#FFFFFF"><strong><font color="#0000FF" size="1" face="MS Sans Serif, Tahoma, sans-serif">��������ǹ��Ǽ����Ѥ�</font></strong></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">
                  <p><font size="1"><strong><font face="MS Sans Serif, Tahoma, sans-serif"> &nbsp;&nbsp;���� ���ʡ�� : </font></strong></font></p></td>
                <td bgcolor="#FFFFFF"><input name="name" type="text" id="name" size="30">
&nbsp; <font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"> <strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;�ѹ/��͹/���Դ : </font></strong></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <select name="date" id="date">
                    <option value=1 selected>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>
                  </select>
&nbsp;
              <select name="month" id="month">
                <option value="1" selected>���Ҥ�</option>
                <option value=2>����Ҿѹ��</option>
                <option value=3>�չҤ�</option>
                <option value=4>����¹</option>
                <option value=5>����Ҥ�</option>
                <option value=6>�Զع�¹</option>
                <option value=7>�á�Ҥ�</option>
                <option value=8>�ԧ�Ҥ�</option>
                <option value=9>�ѹ��¹</option>
                <option value=10>���Ҥ�</option>
                <option value=11>��Ȩԡ�¹</option>
                <option value=12>�ѹ�Ҥ�</option>
              </select>
&nbsp;
              <SELECT name="year" size="1" class="size11" id="year">
                <OPTION  value="" selected>�.�.</OPTION>
                <OPTION  value="2480">2480</OPTION>
                <OPTION  value="2481">2481</OPTION>
                <OPTION  value="2482">2482</OPTION>
                <OPTION  value="2483">2483</OPTION>
                <OPTION  value="2484">2484</OPTION>
                <OPTION  value="2485">2485</OPTION>
                <OPTION  value="2486">2486</OPTION>
                <OPTION  value="2487">2487</OPTION>
                <OPTION  value="2488">2488</OPTION>
                <OPTION  value="2489">2489</OPTION>
                <OPTION  value="2490">2490</OPTION>
                <OPTION  value="2491">2491</OPTION>
                <OPTION  value="2492">2492</OPTION>
                <OPTION  value="2493">2493</OPTION>
                <OPTION  value="2494">2494</OPTION>
                <OPTION  value="2495">2495</OPTION>
                <OPTION  value="2496">2496</OPTION>
                <OPTION  value="2497">2497</OPTION>
                <OPTION  value="2498">2498</OPTION>
                <OPTION  value="2499">2499</OPTION>
                <OPTION  value="2500">2500</OPTION>
                <OPTION  value="2501">2501</OPTION>
                <OPTION  value="2502">2502</OPTION>
                <OPTION  value="2503">2503</OPTION>
                <OPTION  value="2504">2504</OPTION>
                <OPTION  value="2505">2505</OPTION>
                <OPTION  value="2506">2506</OPTION>
                <OPTION  value="2507">2507</OPTION>
                <OPTION  value="2508">2508</OPTION>
                <OPTION  value="2509">2509</OPTION>
                <OPTION  value="2510">2510</OPTION>
                <OPTION  value="2511">2511</OPTION>
                <OPTION  value="2512">2512</OPTION>
                <OPTION  value="2513">2513</OPTION>
                <OPTION  value="2514">2514</OPTION>
                <OPTION  value="2515">2515</OPTION>
                <OPTION  value="2516">2516</OPTION>
                <OPTION  value="2517">2517</OPTION>
                <OPTION  value="2518">2518</OPTION>
                <OPTION  value="2519">2519</OPTION>
                <OPTION  value="2520">2520</OPTION>
                <OPTION  value="2521">2521</OPTION>
                <OPTION  value="2522">2522</OPTION>
                <OPTION  value="2523">2523</OPTION>
                <OPTION  value="2524">2524</OPTION>
                <OPTION  value="2525">2525</OPTION>
                <OPTION  value="2526">2526</OPTION>
                <OPTION  value="2527">2527</OPTION>
                <OPTION  value="2528">2528</OPTION>
                <OPTION  value="2529">2529</OPTION>
                <OPTION  value="2530">2530</OPTION>
                <OPTION  value="2531">2531</OPTION>
                <OPTION  value="2532">2532</OPTION>
                <OPTION  value="2533">2533</OPTION>
                <OPTION  value="2534">2534</OPTION>
                <OPTION  value="2535">2535</OPTION>
                <OPTION  value="2536">2536</OPTION>
                <OPTION  value="2537">2537</OPTION>
                <OPTION  value="2538">2538</OPTION>
                <OPTION  value="2539">2539</OPTION>
                <OPTION  value="2540">2540</OPTION>
                <OPTION  value="2541">2541</OPTION>
                <OPTION  value="2542">2542</OPTION>
                <OPTION  value="2543">2543</OPTION>
                <OPTION  value="2544">2544</OPTION>
                <OPTION  value="2545">2505</OPTION>
                <OPTION  value="2546">2546</OPTION>
                <OPTION  value="2547">2547</OPTION>
                <OPTION  value="2548">2548</OPTION>
                <OPTION  value="2549">2549</OPTION>
                <OPTION  value="2550">2550</OPTION>
                <OPTION  value="2551">2551</OPTION>
              </SELECT>
                </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>���� : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="age" type="text" id="age" size="5">
&nbsp; �� <font color="#FF0000">&nbsp;**</font></font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>�� : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="sex" type="radio" value="���" checked>
              ��� &nbsp;
              <input name="sex" type="radio" value="˭ԧ">
              ˭ԧ </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1">&nbsp;&nbsp;<font face="MS Sans Serif, Tahoma, sans-serif"><strong>������� : </strong></font></font></td>
                <td bgcolor="#FFFFFF"><input name="address" type="text" id="address" size="50" maxlength="150"></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;�����/ࢵ : </font></strong></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="amper" type="text" id="amper" size="30">
                </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;�ѧ��Ѵ : </font></strong></td>
                <td bgcolor="#FFFFFF">
                  <select name="province" id="province" >
                    <option value="" selected>���͡�ѧ��Ѵ</option>
                    <option value="��к��">��к�� </option>
                    <option value="��ا෾��ҹ��">��ا෾��ҹ��</option>
                    <option value="�ҭ������">�ҭ������ </option>
                    <option value="����Թ���">����Թ��� </option>
                    <option value="��ᾧྪ�">��ᾧྪ� </option>
                    <option value="�͹��">�͹��</option>
                    <option value="�ѹ�����">�ѹ�����</option>
                    <option value="���ԧ���">���ԧ��� </option>
                    <option value="��¹ҷ">��¹ҷ </option>
                    <option value="�������">������� </option>
                    <option value="�����">����� </option>
                    <option value="�ź���">�ź��� </option>
                    <option value="��§����">��§���� </option>
                    <option value="��§���">��§��� </option>
                    <option value="��ѧ">��ѧ </option>
                    <option value="��Ҵ">��Ҵ </option>
                    <option value="�ҡ">�ҡ </option>
                    <option value="��ù�¡">��ù�¡ </option>
                    <option value="��û��">��û�� </option>
                    <option value="��þ��">��þ�� </option>
                    <option value="����Ҫ����">����Ҫ���� </option>
                    <option value="�����ո����Ҫ">�����ո����Ҫ </option>
                    <option value="������ä�">������ä� </option>
                    <option value="��Ҹ����">��Ҹ���� </option>
                    <option value="��ҹ">��ҹ </option>
                    <option value="�������">������� </option>
                    <option value="���������">���������</option>
                    <option value="��ШǺ���բѹ��">��ШǺ���բѹ�� </option>
                    <option value="�����ҹ�">�����ҹ� </option>
                    <option value="��Ҩչ����">��Ҩչ���� </option>
                    <option value="�ѵ�ҹ�">�ѵ�ҹ� </option>
                    <option value="�����">����� </option>
                    <option value="��й�������ظ��">��й�������ظ�� </option>
                    <option value="�ѧ��">�ѧ�� </option>
                    <option value="�ԨԵ�">�ԨԵ� </option>
                    <option value="��ɳ��š">��ɳ��š </option>
                    <option value="ྪú���">ྪú��� </option>
                    <option value="ྪú�ó�">ྪú�ó� </option>
                    <option value="���">��� </option>
                    <option value="�ѷ�ا">�ѷ�ا </option>
                    <option value="����">���� </option>
                    <option value="�����ä��">�����ä�� </option>
                    <option value="�ء�����">�ء����� </option>
                    <option value="�����ͧ�͹">�����ͧ�͹ </option>
                    <option value="��ʸ�">��ʸ� </option>
                    <option value="����">���� </option>
                    <option value="�������">������� </option>
                    <option value="�йͧ">�йͧ </option>
                    <option value="���ͧ">���ͧ </option>
                    <option value="�Ҫ����">�Ҫ����</option>
                    <option value="ž����">ž���� </option>
                    <option value="�ӻҧ">�ӻҧ </option>
                    <option value="�Ӿٹ">�Ӿٹ </option>
                    <option value="���">��� </option>
                    <option value="�������">�������</option>
                    <option value="ʡŹ��">ʡŹ��</option>
                    <option value="ʧ���">ʧ��� </option>
                    <option value="��ط��Ҥ�">��ط��Ҥ� </option>
                    <option value="��طû�ҡ��">��طû�ҡ�� </option>
                    <option value="��ط�ʧ����">��ط�ʧ���� </option>
                    <option value="������">������ </option>
                    <option value="��к���">��к��� </option>
                    <option value="�ԧ�����">�ԧ����� </option>
                    <option value="��⢷��">��⢷�� </option>
                    <option value="�ؾ�ó����">�ؾ�ó���� </option>
                    <option value="����ɮ��ҹ�">����ɮ��ҹ� </option>
                    <option value="���Թ���">���Թ��� </option>
                    <option value="ʵ��">ʵ�� </option>
                    <option value="˹ͧ���">˹ͧ��� </option>
                    <option value="˹ͧ�������">˹ͧ������� </option>
                    <option value="�ӹҨ��ԭ">�ӹҨ��ԭ </option>
                    <option value="�شøҹ�">�شøҹ� </option>
                    <option value="�صôԵ��">�صôԵ�� </option>
                    <option value="�ط�¸ҹ�">�ط�¸ҹ� </option>
                    <option value="�غ��Ҫ�ҹ�">�غ��Ҫ�ҹ�</option>
                    <option value="��ҧ�ͧ">��ҧ�ͧ </option>
                    <option value="����">����</option>
                  </select>
                  <font color="#FF0000">&nbsp; <font size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font></font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1">&nbsp;<font face="MS Sans Serif, Tahoma, sans-serif">&nbsp;<strong>������ɳ��� : </strong></font></font></td>
                <td bgcolor="#FFFFFF"><input name="zipcode" type="text" id="zipcode"></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1">&nbsp;&nbsp;<font face="MS Sans Serif, Tahoma, sans-serif"><strong>�������Ѿ�� : </strong></font></font></td>
                <td bgcolor="#FFFFFF"><input name="phone" type="text" id="phone"></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>����֡�� : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <select name="education"  >
                    <option selected value="">���͡�дѺ����֡��</option>
                    <option value="��ж��֡��">��ж��֡��</option>
                    <option value="�Ѹ���֡�ҵ͹��">�Ѹ���֡�ҵ͹��</option>
                    <option value="�Ѹ���֡�ҵ͹����">�Ѹ���֡�ҵ͹����</option>
                    <option value="�Ҫ���֡�� / ����Ҫվ">�Ҫ���֡�� / ����Ҫվ</option>
                    <option value="��ԭ�ҵ��">��ԭ�ҵ��</option>
                    <option value="��ԭ���">��ԭ���</option>
                    <option value="�٧���һ�ԭ���">�٧���һ�ԭ���</option>
                  </select>
                </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>�Ҫվ : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <select name="work">
                    <option value="" selected>���͡�Ҫվ</option>
                    <option value="�ѡ���¹/�ѡ�֡��">�ѡ���¹/�ѡ�֡��</option>
                    <option value="��áԨ��ǹ���">��áԨ��ǹ���</option>
                    <option value="ᾷ��/��Һ��">ᾷ��/��Һ��</option>
                    <option value="���/�Ҩ����">���/�Ҩ����</option>
                    <option value="�ѡ������/���¤���">�ѡ������/���¤���</option>
                    <option value="����������">����������</option>
                    <option value="���ǡ�/��ҧ">���ǡ�/��ҧ</option>
                    <option value="��ѡ�ҹ�ѭ��/����Թ">��ѡ�ҹ�ѭ��/����Թ</option>
                    <option value="��õ�Ҵ/��â��">��õ�Ҵ/��â��</option>
                    <option value="�Ѻ�Ҫ���">�Ѻ�Ҫ���</option>
                    <option value="����֡��">����֡��</option>
                    <option value="��ѡ�ҹ�Ѱ����ˡԨ">��ѡ�ҹ�Ѱ����ˡԨ</option>
                    <option value="��������/���Ѵ���">��������/���Ѵ���</option>
                    <option value="��ѡ�ҹ�����">��ѡ�ҹ�����</option>
                    <option value="��ԡ�÷�ͧ�����">��ԡ�÷�ͧ�����</option>
                    <option value="�͡Ẻ/��䫹�">�͡Ẻ/��䫹�</option>
                    <option value="��ѡ�ҹ�ç�ҹ">��ѡ�ҹ�ç�ҹ</option>
                    <option value="�ѡ�Ԫҡ��/�ѡ�Ԩ�¤鹤���">�ѡ�Ԫҡ��/�ѡ�Ԩ�¤鹤���</option>
                    <option value="��������ǹ��/�ѡ����">��������ǹ��/�ѡ����</option>
                    <option value="����/�ѡ�ʴ�/�ѡ�����">����/�ѡ�ʴ�/�ѡ�����</option>
                    <option value="��ҧ�ҹ">��ҧ�ҹ</option>
                    <option value="�����ӧҹ">�����ӧҹ</option>
                    <option value="����">����</option>
                  </select>
                </font></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF"><font size="1"><strong><font face="MS Sans Serif, Tahoma, sans-serif">�ٻ��Ҫԡ : </font></strong></font></td>
                <td bgcolor="#FFFFFF"><input type="file" name="FILE" style="width:250" class="inputform"> 
                  <br>
                  Limit <?=(_MEMBER_LIMIT_UPLOAD/1024);?> kB ��Ҵ�й� ���ҧ x ��� = 100 x 80 pixels</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font color="#0000FF"><strong><font color="#0000FF" size="1" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/admin/user.gif" ></font> </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp; </font><font color="#0000FF"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">������㹡���������к�</font></strong></font><font size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp; </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1"><strong>&nbsp;&nbsp;<font face="MS Sans Serif, Tahoma, sans-serif">Login Name : </font></strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="user_name" type="text" id="user_name" size="20" maxlength="30">
                  <font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;**<strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;���ͷ����ʴ����������к�����ʵ��з�� (�����ѧ�����ҹ��)</font></strong></font> </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif">&nbsp;&nbsp;<strong>Password : </strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="pwd_name1" type="password" id="pwd_name1" size="20" maxlength="30">
&nbsp;<font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font> </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1" face="MS Sans Serif, Tahoma, sans-serif"><strong><font size="1" face="MS Sans Serif, Tahoma, sans-serif">Re-password : </font></strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="pwd_name2" type="password" id="pwd_name2" size="20" maxlength="30">
&nbsp;<font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font> </font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF"><font size="1"><strong><font face="MS Sans Serif, Tahoma, sans-serif">Email : </font></strong></font></td>
                <td bgcolor="#FFFFFF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
                  <input name="email" type="text" id="email" size="20">
&nbsp;<font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font></font></td>
              </tr>
<?
if(USE_CAPCHA){
?>
					<TR>
						<TD align="right">
						<?if(CAPCHA_TYPE == 1){ 
							echo "<img src=\"capcha/CaptchaSecurityImages.php?width=".CAPCHA_WIDTH."&height=".CAPCHA_HEIGHT."&characters=".CAPCHA_NUM."\" width=\"".CAPCHA_WIDTH."\" height=\"".CAPCHA_HEIGHT."\" align=\"absmiddle\" />";
						}else if(CAPCHA_TYPE == 2){ 
							echo "<img src=\"capcha/val_img.php?width=".CAPCHA_WIDTH."&height=".CAPCHA_HEIGHT."&characters=".CAPCHA_NUM."\" width=\"".CAPCHA_WIDTH."\" height=\"".CAPCHA_HEIGHT."\" align=\"absmiddle\" />";
						};?>
						</TD>
						<TD><input name="security_code" type="text" id="security_code" maxlength="6" >&nbsp;<font color="#FF0000" size="2" face="MS Sans Serif, Tahoma, sans-serif">**</font>&nbsp;<b><font color="#FF0000" face="MS Sans Serif, Tahoma, sans-serif">��������׹�ѹ��ͧ�ѹ spam</font></b></TD>
					</TR>
<?
}
?>

              <tr>
                <td align="right" bgcolor="#FFFFFF"></td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF"><font color="#0000FF">��������´��ҧ�ж١��价ҧ����� <br>
              �ҡ������ Inbox ����ͧ�ٷ�� Junk E-Mail �Ф�Ѻ&nbsp;</font><font color="#0000FF" size="2">&nbsp;</font><font color="#0000FF" size="1"><font face="MS Sans Serif, Tahoma, sans-serif"><strong>&nbsp; </strong></font></font></td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td width="30%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">
                  <input type="submit" name="Submit" value="��Ѥ���Ҫԡ">
                  <input type="hidden" name="signup" value="date()">
&nbsp;
              <input type="reset" name="Submit2" value=" ������">
              <input name="ok" type="hidden" id="ok2" value="ok_pass">
                </td>
              </tr>
            </table>
            <script language="javascript">

function check() {
if(document.checkForm.name.value=="") {
alert("��سҡ�͡����-���ʡ�Ŵ��¤�Ѻ") ;
document.checkForm.name.focus() ;
return false ;
}
else if(document.checkForm.year.value=="") {
alert("��سҡ�͡ �ѹ/��͹/���Դ ���ú��ǹ���¹Ф�Ѻ") ;
document.checkForm.year.focus() ;
return false ;
}
else if(isNaN(document.checkForm.year.value)) {
alert("���Դ�ͧ��ҹ ��سҡ�͡੾�е���Ţ�Ф�Ѻ") ;
document.checkForm.year.focus() ;
return false ;
}
else if(document.checkForm.age.value=="") {
alert("��سҡ�͡���ش��¤�Ѻ") ;
document.checkForm.age.focus() ;
return false ;
}else if(isNaN(document.checkForm.age.value)) {
alert("��سҡ�͡���ش��µ���Ţ��ҹ�鹤�Ѻ") ;
document.checkForm.age.focus() ;
return false ;
}
else if(document.checkForm.province.selectedIndex==0) {
alert("��س��кبѧ��Ѵ����ҹ������¤�Ѻ") ;
return false ;
}
else if(isNaN(document.checkForm.zipcode.value)) {
alert("������ɳ����ͧ�繵���Ţ��Ѻ") ;
document.checkForm.zipcode.focus() ;
return false ;
}
else if(document.checkForm.user_name.value=="") {
alert("��س��кت��ͷ���ҹ��ͧ�����㹡������к����¤�Ѻ") ;
document.checkForm.user_name.focus() ;
return false ;
}
else if(document.checkForm.pwd_name1.value=="") {
alert("��سҡ�͡���ʼ�ҹ����ͧ��ô��¤�Ѻ") ;
document.checkForm.pwd_name1.focus() ;
return false ;
}
else if(document.checkForm.pwd_name2.value=="") {
alert("��س��׹�ѹ���ʼ�ҹ�ա����") ;
document.checkForm.pwd_name2.focus() ;
return false ;
}
else if(document.checkForm.pwd_name1.value != document.checkForm.pwd_name2.value) {
alert("���ʼ�ҹ����ͧ���ç�ѹ ��س��׹�ѹ���ʼ�ҹ���١��ͧ���¤�Ѻ") ;
document.checkForm.pwd_name2.focus() ;
return false ;
}
else if(document.checkForm.email.value=="") {
alert("��سҡ�͡��������¹Ф�Ѻ") ;
return false ;
}
else if(checkForm.email.value.indexOf('@')==-1) {
alert("������ͧ�س���١��ͧ��Ѻ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(checkForm.email.value.indexOf('.')==-1) {
alert("������ͧ�س���١��ͧ��Ѻ") ;
document.checkForm.email.focus() ;
return false ;
}

else 
return true ;
}

    </script>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
