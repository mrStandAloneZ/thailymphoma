<!-- main content -->
<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
?>
<? date_default_timezone_set("Asia/Bangkok"); ?>

	   <?php include"includes/add_data.php"; ?>
               <?  
					$max = mysql_query("select max(code_id) from  web_add_data");
					echo $total_max= mysql_result($max,0);
				 mysql_close();  
					?>

<?
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
//$login_true=$_SESSION['login_true'];
$result = mysql_query("select * from ".TB_ADD_DATA." where id='$id' order by id DESC") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;    			
?>
 <?php
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$result = mysql_query("select * from ".TB_MEMBER." where user='$login_true'") or die ("Err Can not to result") ;
$dbarr = mysql_fetch_array($result) ;
$codehos= $dbarr["codehos"];
?>
<!-- main content -->
<center>
    <p>

	<center>
				<h1>Acute  leukemia registry  form</h1></center>
				<p>
            <form id="form1" name="form1" method="post" action="?name=member&file=show_add_data">
			   <center><table width="100%" border="0" align="center">       
                 <tr>
                    <th align="left" width="19%"><strong>Code : </strong></th>
                       <?   
                		//  ������Һǡ˹�觢ͧ�����Ţ job 
						$sql = "select * from ".TB_ADD_DATA." order by id" ;    					
						$result = mysql_query($sql) ;
						$num_result  = mysql_num_rows($result) ;
						$dbarr = mysql_fetch_row($result) ;
						$code_id = $dbarr[0]+1 ; // �Ӥ�� id ���������Ѻ���   + 1
						$job_in = "$num_result" +1;
					$code_id = "$codehos$job_in" ; // �����Ţ㺧ҹ �ͧ�ҹ���� ���� �����Ţ job ����ͧ      
					
				?>
                    <td width="23%"><strong><input type="text" name="code_id"  size="5"id="textfield" value="<? echo $code_id;?><? $dbarr[code_id];?>" readonly="readonly" /></strong></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">�ѡ�õ���á�ͧ������й��ʡ��(�����ѧ���) :<? echo $job_in;?></th>
                    <td width="23%"> <input type="text" name="fl" size="2"  maxlength="2"/></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">��:</th>
                    <td width="23%"><input  type="radio" name="sex" value="���" />&nbsp;���  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" name="sex" value="˭ԧ" />&nbsp;&nbsp;˭ԧ  </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Date of birth: DD/MM/YYYY</th>
                    <td width="23%">  <select name="d_birth" id="d_birth" style="width:100px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_birth" id="m_birth" style="width:100px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_birth"  id="y_birth" style="width:100px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT></td>
                  </tr>
                  <? $date_birth = $d_birth + $m_birth + $y_birth;?>
                  <tr>
                    <th align="left" width="19%"><strong>�������� : </strong></th>
                    <td width="23%">  <select name="province" id="province" style="width:150px;>
                    <option  value="" selected>��س����͡�ѧ��Ѵ</OPTION>
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
                  </select></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%"> �Է�ԡ���ѡ�� :</th>
                    <td width="23%"> 
                    <input type="radio" name="treatment" value="�ԡ�Ҫ���"> �ԡ�Ҫ��� &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="treatment" value="ʻʪ."> ʻʪ.   &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="treatment" value="��Сѹ�ѧ��">  ��Сѹ�ѧ��   &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="treatment" value="�����ͧ">  �����ͧ  
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">�Ҫվ : </th>
                    <td width="23%">
                    <select name="career" id="career" style="width:150px;">
                    <option value="" selected>���͡�Ҫվ</option>
                    <option value='�Ҫ���'>�Ҫ���</option>
                    <option value='�Ѱ����ˡԨ'>�Ѱ����ˡԨ </option>
                    <option value='��Ң��'>��Ң�� </option>
                    <option value='����ҹ'>����ҹ</option>
                    <option value='�����'>����� </option>
                    <option value='��ѡ�ҹ�͡��'>��ѡ�ҹ�͡��</option>
                    <option value='�١��ҧ�����'>�١��ҧ�����</option>
                  </select> 
                    </td>
                  </tr>
                  <tr>
                    <th colspan="2" align="center"><font size="+1" color="#0000FF"><b>Leukemia  diagnosis </b></font></th>
                  </tr>
                  <tr>
                    <th align="left" width="19%"><strong>Date of 1 st diagnostic: DD/MM/YYYY(�.�.) </strong>: </th>
                    <td width="23%"><select name="d_diagnostic" id="d_diagnostic" style="width:100px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_diagnostic" id="m_diagnostic" style="width:100px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_diagnostic"  id="y_diagnostic" style="width:100px;">
              <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT></td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Diagnosis: </th>
                    <td width="23%">
                    <input type="radio" name="diagnosis" value="AML"> AML  &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="diagnosis" value="APL"> APL   &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="diagnosis" value="Mixed-phenotypic acute leukemia">Mixed-phenotypic acute leukemia   
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">Cytogenetics: </th>
                    <td width="23%">
                   <input type="radio"  name="cytogenetics" value="Done" />Done:  <input  name="cytogenetics_i"  value="" type="text" /> <br /><br />
                    <input type="radio" name="cytogenetics" value="Not done" />&nbsp;&nbsp; Not  done
                    </td>
                  </tr> 
                   <tr>
                    <th align="left" width="19%">CBC(At diagnosis): </th>
                    <td width="23%">
                    WBC : <input name="cbc" type="text" value="" id="cbc" />  ML        <br /><br />
                   Blast :   <input name="cbci" type="text" value="" id="cbci" /> %        <br /><br />
                   Hb :   &nbsp;  <input name="cbcii" type="text" value="" id="cbcii" /> g/dL      <br />   <br />
                    Plt :  &nbsp;  <input name="cbciii" type="text" value="" id="cbciii" />  ML         
                    </td>
                  </tr>
                     <tr>
                    <th align="left" width="19%">%Blast in BM at diagnosis: </th>
                    <td width="23%">
                   	   <input  type="radio"  name="bm_don" value="done"/>done<input type="text" name="bmi" value=""  />  %            <input  type="radio"  name="bm_don"  value="not don" /> not  done   </td>
                  </tr> 
                     <tr>
                    <th align="left" width="19%">Organ involvement(extramedullary  diseases)���͡���ҡ���� 1 ��� </th>
                    <td width="23%"><br />
                    <input  name="organ" type="checkbox" value="Hepatomegaly" />  Hepatomegaly        <br /><br />
                    <input  name="organ_i" type="checkbox" value="Splenomegaly" />  Splenomegaly        <br /><br />
                    <input name="organ_ii" type="checkbox" value="Lymphadenopathy" />  Lymphadenopathy    <br /><br />
                    <input  name="organ_iv" type="checkbox" value="Skin" />   Skin       <br /><br />
                    <input  name="organ_vv" type="checkbox" value="Gum" />   Gum     <br /><br />
                    <input  name="organ_ivv" type="checkbox" value="Testes" />  Testes     <br /><br />
                   	<input  name="organ_vvv" type="checkbox" value="CNS" />  CNS   <br /><br />
                    <input  name="organ_ivvv" type="checkbox" value="1" />  Others     <input name="organ_vvvv" type="text" value="" /><br /><br />
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">ECOG</th>
                    <td width="23%">
                   	   <input type="radio"   name="ecog" value="0" /> 0 &nbsp;&nbsp;&nbsp;
                       <input type="radio"   name="ecog" value="1" /> 1 &nbsp;&nbsp;&nbsp;
					   <input type="radio"   name="ecog" value="2" /> 2 &nbsp;&nbsp;&nbsp;
                       <input type="radio"   name="ecog" value="3" /> 3 &nbsp;&nbsp;&nbsp;
                       <input type="radio"   name="ecog" value="4" /> 4 &nbsp;&nbsp;&nbsp;
                    </td>
                  </tr>
                 <tr>
                    <th align="left" width="19%">Complications  at  Presentation ���͡���ҡ���� 1 ���</th>
                    <td width="23%">
                   	   <input type="checkbox"   name="cap" value="Tumor lysis syndrome" /> Tumor lysis syndrome   
                       <input type="checkbox"   name="capi" value="DIC" /> DIC
                       <input type="checkbox"   name="capii" value="SVC  syndrome" /> SVC  syndrome
                    </td>
                  </tr>
                  <tr>
                  			<th colspan="2" align="center"><font size="+1" color="#0000FF"><b>Acute  leukemia  registy  form-follow up  data  for  non-APL  AML (2nd entry)</b></font></th>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Initial  Induction</th>
                    <td width="23%">
                   	  <input type="radio"   name="initial" value="7+3 regimen" /> 7+3 regimen  <br /><br />
                      <input type="radio"   name="initial" value="7+3  flat dose" /> 7+3  flat dose  <br /><br />
                       <input type="radio"   name="initial" value="< 7 + 3[�� 5+2  , 7+1]" /> < 7 + 3[�� 5+2  , 7+1]  <br /><br />
                       <input type="radio"   name="initial" value="Palliative care (including  low  dose  chemotherapy/hydroxyurea/azacytidine-decitabine)" /> Palliative care (including  low  dose  chemotherapy/hydroxyurea/azacytidine-decitabine) <br /><br />
                       <input type="radio"   name="initial" value="Clinical trial" /> Clinical trial 
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">Anthracycline</th>
                    <td width="23%">
                   	   <input type="radio"   name="anthracycline" value="Doxorubicin" /> Doxorubicin
                       <input type="radio"   name="anthracycline" value="Idarubicin" /> Idarubicin
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Response to 1 st  Induction</th>
                    <td width="23%">
                   	   <input type="radio"   name="reponse_i" value="Complete  remission" /> Complete  remission  <br /><br />
                       <input type="radio"   name="reponse_i" value="Not  in CR" /> Not  in CR   <br /><br />
                       <input type="radio"   name="reponse_i" value="Cannot  evaluation" /> Cannot  evaluation   <br /><br />
                       <input type="radio"   name="reponse_i" value="% Blast  after  induction" />% Blast  after  induction<input  type="text" name="response_i_i" value="" />%
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">Second induction(in case not in CR from first induction)</th>
                    <td width="23%">
                   	   <input type="radio"   name="second" value="Yes" />  Yes  &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio"   name="second" value="No" />  No  <br /><br />
                       <input type="radio"   name="secondi" value="7 + 3 regimen" />  7 + 3 regimen      <br /><br />
                       <input type="radio"   name="secondi" value="7 + 3 flat dose" />  7 + 3 flat dose  <br /><br />
                       <input type="radio"   name="secondi" value="< 7 + 3 [�� 5+2,7+1]" />  < 7 + 3 [�� 5+2,7+1]    <br /><br />
                       <input type="radio"   name="secondi" value="High  dose  Ara-C(HIDAC)" /> High  dose  Ara-C(HIDAC)   <br /><br />
                       <input type="radio"   name="secondi" value="FLAG +- Ida" />  FLAG +- Ida   <br /><br />
                       <input type="radio"   name="secondi" value="Other" />  Other  <input type="text"  name="secondii"  value="" /> <br />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to 2nd  Induction</th>
                    <td width="23%"><br />
                   	   <input type="radio"   name="responseii" value="Complete  remission" /> Complete  remission  <br /><br />
                       <input type="radio"   name="responseii" value="Not  in CR" /> Not  in CR   <br /><br />
                       <input type="radio"   name="responseii" value="Cannot  evaluation" /> Cannot  evaluation   <br /><br />
                       <input type="radio"   name="responseii" value="% Blast after induction" />% Blast  after  induction
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Post-remission  treatment [CR after 1-2 induction cycles] or bridging(���͡���ҡ���� 1 ���� ��С�س����͡�ӹǹ cycle ������ )</th>
                    <td width="23%">
                    <br />
                   	   <input type="checkbox"   name="post_remission" value="7+3 regimen" /> 7+3 regimen &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <select name="post_remissioni_i" id="post_remissioni_i" style="width:150px;">
                        <option value="" selected>��س����͡ cycles</option>
                        <option value='1'>1 cycles</option>
                        <option value='2'>2 cycles</option>
                        <option value='3'>3  cycles</option>
                       <option value='4'>4 cycles</option>
                        </select>  <br /><br />
                       <input type="checkbox"   name="post_remissionii" value="7+3 regimen" /> 7+3 flat  dose &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <select name="post_remissionii_i" id="post_remissionii_i" style="width:150px;">
                        <option value="" selected>��س����͡ cycles</option>
                        <option value='1'>1 cycles</option>
                        <option value='2'>2  cycles</option>
                        <option value='3'>3  cycles</option>
                       <option value='4'>4 cycles</option>
                        </select>   <br /><br />
                         <input type="checkbox"   name="post_remissioniv" value="< 7+3 [�� 5+2, 7+1]" /> < 7+3 [�� 5+2, 7+1]  &nbsp;&nbsp;
                    <select name="post_remissioniv_iv" id="post_remissioniv_iv" style="width:150px;">
                        <option value="" selected>��س����͡ cycles</option>
                        <option value='1'>1 cycles</option>
                        <option value='2'>2  cycles</option>
                        <option value='3'>3  cycles</option>
                       <option value='4'>4 cycles</option>
                        </select>  <br /><br />
                         <input type="checkbox"   name="post_remissionvv" value="HIDAC" /> HIDAC  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <select name="post_remissionvv_vv" id="post_remissionvv_vv" style="width:150px;">
                        <option value="" selected>��س����͡ cycles</option>
                        <option value='1'>1 cycles</option>
                        <option value='2'>2 cycles</option>
                        <option value='3'>3  cycles</option>
                       <option value='4'>4 cycles</option>
                        </select>   <br /><br />
                       <div align="left">Stem cell transplantion</div> <br />
                      <input type="checkbox" name="post_remissionivv" value="Yes" /> &nbsp;Yes    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="checkbox" name="post_remissionivv" value="No" /> &nbsp;No <br /><br />
                    </td>
                  </tr>
                  <tr>
                    <th colspan="2" align="center"><font size="+1" color="#0000FF">Acute leukemia registry form-follow up data for non-APL AML (3nd entry)</font></th>
                  </tr>
                    <tr>
                    <th align="left" width="19%">1 - year follow up</th>
                    <td width="23%">
                    <br />
                   	   <input type="radio"   name="yeari"  value="Still in remission" /> Still in remission  <br /><br />
                       <input type="radio"   name="yeari" value="Relapsed date" /> Relapsed date: DD/MM/YYYY(�.�.)   
                       <select name="d_relapsed" id="d_relapsed" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_relapsed" id="m_relapsed" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_relapsed"  id="y_relapsed" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="yeari" value="Dead date" />  Dead date: DD/MM/YYYY(�.�.)    &nbsp;&nbsp;&nbsp;
                        <select name="d_dead" id="d_dead" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_dead" id="m_dead" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_dead"  id="y_dead" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="yeari" value="Alive  but loss to follow up" />  Alive  but loss to follow up  
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">2 - year follow up</th>
                    <td width="23%">
                   	   <input type="radio"   name="yearii"  value="Still in remission" /> Still in remission  <br /><br />
                       <input type="radio"   name="yearii" value="Relapsed date" /> Relapsed date: DD/MM/YYYY(�.�.)   
                              <select name="d_relapsed2" id="d_relapsed2" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_relapsed2" id="m_relapsed2" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_relapsed2"  id="y_relapsed2" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="yearii" value="Dead date" />  Dead: date: DD/MM/YYYY(�.�.)   &nbsp;&nbsp;&nbsp;
                              <select name="d_dead2" id="d_dead2" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_dead2" id="m_dead2" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_dead2"  id="y_dead2" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="yearii" value="Alive  but loss to follow up" />  Alive  but loss to follow up <br /><br />
                     <input type="radio"   name="yearii" value="Date  of  last  follow up" />  Date  of  last  follow up:  DD/MM/YYYY(�.�.)   <br /><br />
                     <select name="d_last" id="d_last" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_last" id="m_last" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_last"  id="y_last" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                    </td>
                  </tr>
                  <tr>
                  			<th colspan="2" align="center"> <font color="#0000FF" size="+1">Acute  leukemia  registy form- Follow up  data for APL (2nd entry)</font></th>
                         
                  </tr>
                  <tr>
                    <th align="left" width="19%">Initial induction</th>
                    <td width="23%">
                   	   <input type="radio"   name="initial_induction"  value="ATRA + Chemotherapy" />  ATRA + Chemotherapy<br /><br />
                       <input type="radio"   name="initial_induction" value="As2O3" /> As2O3<br /><br />
                       <input type="radio"   name="initial_induction" value="As2O3 + Chemotherapy" />  As2O3 + Chemotherapy   <br /><br />
                       <input type="radio"   name="initial_induction" value="" />  Other  <input type="text"  name="initial_induction_i" value="" /> 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Anthracycline</th>
                    <td width="23%">
                   	   <input type="radio"   name="anthracycline"  value="Doxorubicin" /> Doxorubicin<br /><br />
                       <input type="radio"   name="anthracycline" value="Idarubicin" />  Idarubicin<br /><br />
                    </td>
                  </tr>
                  <tr>
                    <th align="left" width="19%">differentiatine  syndrome</th>
                    <td width="23%">
                   	   <input type="radio"   name="differentiatine"  value="Yes" /> Yes<br /><br />
                       <input type="radio"   name="differentiatine" value="No" />  No<br /><br />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Response to Induction</th>
                    <td width="23%">
                   	   <input type="radio"   name="response_i"  value="Complete remisson" /> Complete remisson<br /><br />
                       <input type="radio"   name="response_i"  value="Not in CR" /> Not in CR<br /><br />
                       <input type="radio"   name="response_i" value="Cannot evaluate" /> Cannot evaluate <br /><br />
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Second induction [in case of 1st induction resulted in <= PR]</th>
                    <td width="23%">
                   	   <input type="radio"   name="second_induction"  value="As2O3" /> As2O3<br /><br />
                       <input type="radio"   name="second_induction"   value="High dose Ara-C(HIDAC)" /> High dose Ara-C(HIDAC) <br /><br />
                       <input type="radio"   name="second_induction"  value="other" /> Other<input type="text" name="second_induction_i" value="" />
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">Response to 2nd Induction</th>
                    <td width="23%">
                   	   <input type="radio"   name="response_ii"  value="Complete remission" /> Complete remission<br /><br />
                       <input type="radio"   name="response_ii"   value="Not in CR" /> Not in CR <br /><br />
                       <input type="radio"   name="response_ii"  value="Cannot evaluation" /> Cannot evaluation 
                    </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Consolidation(���͡���ҡ���� 1 ���)</th>
                    <td width="23%">
                    <br />
                   	   <input   type="radio"   name="consolidation"  value="Yes" /> Yes  &nbsp;&nbsp;&nbsp;
                       <input type="radio"   name="consolidation"   value="No" /> No <br /><br />
                       
                       <input type="checkbox"   name="consolidation_i"  value="ATRA" /> ATRA  &nbsp;&nbsp;&nbsp;&nbsp;
                       			<select name="consolidation_ii" id="consolidation_ii" style="width:150px;">
                        		<option value="" selected>��س����͡ cycles</option>
		                        <option value='1'>1 cycles</option>
        		                <option value='2'>2  cycles</option>
                		        <option value='3'>3  cycles</option>
                       			<option value='4'>4 cycles</option>
                        		</select>  <br /><br />
                        <input type="checkbox"  name="consolidation_iv"  value="As2O3"  /> As2O3   &nbsp;&nbsp;&nbsp;
                     	<select name="consolidation_vv" id="consolidation_vv" style="width:150px;">
                        		<option value="" selected>��س����͡ cycles</option>
		                        <option value='1'>1 cycles</option>
        		                <option value='2'>2  cycles</option>
                		        <option value='3'>3  cycles</option>
                       			<option value='4'>4 cycles</option>
                        		</select><br /><br />
                  </td>
                  </tr>
                    <tr>
                    <th align="left" width="19%">Maintenance</th>
                    <td width="23%">
                    <br />
                   	   <input type="radio"   name="maintenance"  value="Yes" /> Yes<br /><br />
                       <input type="radio"   name="maintenance"   value="No" /> No <br /><br />
                    </td>
                  </tr>
                   <tr>
                    <th colspan="2" align="center"><font size="+1" color="#0000FF">Acute  leukemia registry form-follow up data APL  AML(3nd entry)                    </font></th>
                  </tr>
                   <tr>
                    <th align="left" width="19%">1 - year follow up</th>
                    <td width="23%">
                    <br />
                   	   <input type="radio"   name="year_followi"  value="Still in remission" />  Still in remission  <br /><br />
   	                    <input type="radio"   name="year_followi"   value="Relapsed date" /> Relapsed date: DD/MM/YYYY(�.�.) 
                          <select name="d_year_follow1" id="d_year_follow1" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_year_follow1" id="m_year_follow1" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_year_follow1"  id="y_year_follow1" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                        <br />
                       <input type="radio"   name="year_followi"   value="Dead: date" />  Dead date: DD/MM/YYYY(�.�.)  &nbsp;&nbsp;&nbsp;
                         <select name="d_year_dead" id="d_year_dead" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_year_dead" id="m_year_dead" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_year_dead"  id="y_year_dead" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="year_followi"   value="Alive but loss to follow up" /> Alive but loss to follow up<br /><br />
                    </td>
                  </tr>
                   <tr>
                    <th align="left" width="19%">2 - year follow up</th>
                    <td width="23%">
                    <br />
                   	   <input type="radio"   name="year_follow_up"  value="Still in remission" />  Still in remission  <br /><br />
   	                    <input type="radio"   name="year_follow_up"   value="Relapsed date" /> Relapsed date: DD/MM/YYYY(�.�.) 
                            <select name="d_year_follow_ii" id="d_year_follow_ii" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_year_follow_ii" id="m_year_follow_ii" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_year_follow_ii"  id="y_year_follow_ii" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                        <br />
                       <input type="radio"   name="year_follow_up"   value="Dead date" />  Dead: date: DD/MM/YYYY(�.�.)  &nbsp;&nbsp;&nbsp;
                       <select name="d_year_dead_ii" id="d_year_dead_ii" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_year_dead_ii" id="m_year_dead_ii" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_year_dead_ii"  id="y_year_dead_ii" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br />
                       <input type="radio"   name="year_follow_up"   value="Alive but loss to follow up" />   Alive but loss to follow up<br /><br />
                       <input type="radio"   name="year_follow_up"   value="date of last follow up" />  date of last follow up:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <select name="d_follow_last" id="d_follow_last" style="width:60px;">
                    <option value='' selected>�ѹ</option>
                    <option value=1>1</option>
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
                  <select name="m_follow_last" id="m_follow_last" style="width:90px;">
                <option value="" selected>��͹</option>
                <option value=1>���Ҥ�</option>
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
                <SELECT name="y_follow_last"  id="y_follow_last" style="width:70px;">
                <OPTION  value="" selected>��</OPTION>
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
                <OPTION  value="2552">2552</OPTION>
                <OPTION  value="2553">2553</OPTION>
                <OPTION  value="2554">2554</OPTION>
                <OPTION  value="2555">2555</OPTION>
                <OPTION  value="2556">2556</OPTION>
                <OPTION  value="2557">2557</OPTION>
                <OPTION  value="2558">2558</OPTION>
                <OPTION  value="2559">2559</OPTION>
                <OPTION  value="2560">2560</OPTION>
                <OPTION  value="2561">2561</OPTION>
              </SELECT>
                       <br /><br />
                    </td>
                  </tr>
                 <tr>
                 <th></th>
                 <td><input type="submit"  /></td>
                 </tr>
                   
              </table></center>
                </p>
               </center>
			
		
</FORM>


			<BR><BR>
			<!-- change -->
   
        </div>
    
    <!-- sidebar -->
    
    <div class="x"></div>
    <div class="break"></div>

</div>

