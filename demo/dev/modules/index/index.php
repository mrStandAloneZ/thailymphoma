<?php
if (!isset($_SESSION['login_true'])) {
//  url=index.php ����觹�������˹�ҷ��е�ͧ��͡ user,pwd �����������������������¡���١�Ф�Ѻ
    ?>
    <div id='wrapper'>
        <div id='logo'>
            <h1><a href='index.php'><img src='images/logo.jpg' width='940' height='140' /></a></h1>
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
                    <meta http-equiv='refresh' content='3;url=index.php?name=member&amp;file=login'>
                </p>
            </div>

            <!-- sidebar -->

            <div class='x'></div>
            <div class='break'></div>

        </div>
        <?php
        include 'modules/index/footer.php';
    } else {
        include "modules/index/header.php";
        $code_admin = "admin";
        $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);

        $sqlYear = " SELECT MIN( YEAR(dateofrecord) )  as years"
                . " FROM  web_add_data ";
        $resultYear = mysql_query($sqlYear) or die("Err Can not to result");
        $startYear = mysql_fetch_array($resultYear);
        $sqlMember = "select member_id, work, hospital_name, fullname, codehos  "
                . " from " . TB_MEMBER . " "
                . " where user='" . $_SESSION['login_true'] . "' LIMIT 1"
        ;
        $result = mysql_query($sqlMember) or die("Err Can not to result");
        $dbarr = mysql_fetch_array($result);
        $member_id = $dbarr['member_id'];
        $work = $dbarr['work'];
        $hospital_name = $dbarr['hospital_name'];
        $fullname = $dbarr['fullname'];
        $codehos = $dbarr['codehos'];

        ///////////institute/////////
        $sqInstitute = " SELECT  `hostpital_engname` ,  `codehos`  "
                . " FROM  `web_member` "
                . " ORDER BY  `codehos` ASC ";
        $resultInstitute = mysql_query($sqInstitute) or die("Err Can not to result");
        while ($rows = $db->fetch($resultInstitute)) {
            $arrInstitute[] = array(
                'hostpital_engname' => $rows['hostpital_engname']
                , 'codehos' => $rows['codehos']
            );
        }
        ?>

        <!-- main content -->
        <div id="left">
            <h1>�Թ�յ�͹�Ѻ</h1><h2><?php echo $fullname; ?></h2>�����ç��Һ�ŷ���ѧ�Ѵ <?php echo $hospital_name; ?>&nbsp;&nbsp;���˹� <?php echo $work; ?><p>

                <?php
                $fileHTML = "html/systemtalk.html";
                $fileHTMLOpen = @fopen($fileHTML, "r");
                $HTMLContent = @fread($fileHTMLOpen, @filesize($fileHTML));
                @fclose($fileHTMLOpen);
                $HTMLContent = stripslashes($HTMLContent);
                echo $HTMLContent;
                ?>
            </p>


            <h1>ʶҹС��ŧ����¹������</h1>

            <div class="post-options">

            </div>
            <div class="x"></div>


        </div>

        <!-- sidebar -->
        <div id="right">


            <h2></h2>


        </div>
        <div id="center">
            <?php
            require_once "includes/add_data.php";
            $bg = "#fa4b4b"; //��˹����������
            // ������Դ��Ͱҹ������v
            mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("�Դ��Ͱҹ�����������");

// ���͡�ҹ������
            mysql_select_db(DB_NAME) or die("���͡�ҹ�����������");

//��͡������--���ͤ���
            ?>
            <center>
                <form method='get' action='index.php'>
                    <table border=0>
                        <tr bgcolor="<?php echo $bg ?>">
                            <td>Search  Data
                                <select name='field_search' size='1'>
                                    <option value='patient_initials'>Patient Initials</option>
                                    <option value='sex'>gender</option>
                                    <option value='province'>Current  Address :  Province</option>
                                    <option value='hn'>HN</option>
                                    <?php if ($member_id == $code_admin) { ?>
                                        <option value='centre'>Code</option>
                                    <?php } ?>
                                    <input type='text' name='search' >
                                    <input type='submit' value='Search' ></form></td></Table>
                                    <?php
                                    $search = "";
                                    $field_search = "";
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                    }
                                    if (isset($_GET['field_search'])) {
                                        $field_search = $_GET['field_search'];
                                    }

// ����� SQL ���������ӧҹ
                                    $sql_codehos = "where codehos='$codehos'";
                                    $sql = "select * from $tblname  " . $sql_codehos;
                                    if ($member_id == $code_admin) {
                                        $sql = "select * from $tblname";
                                        $codehos = '';
                                    }
                                    $dbquery = mysql_query($sql);

// �Ҩӹǹ�á���촢�����㹵��ҧ
                                    $num_rows = mysql_num_rows($dbquery);

// �Ҩӹǹ��Ŵ�㹵��ҧ
                                    $num_fields = mysql_num_fields($dbquery);

                                    $go_page = 1;
                                    if (isset($_GET['Page'])) {
                                        $go_page = $_GET['Page'];
                                    }
                                    $recs = 0;
                                    $page_size = 100; //��˹��ӹǹ�á����� 1 ˹��
                                    $max_count = ceil($num_rows / $page_size); //������Ҩӹǹ˹�ҷ�����
                                    $go_page = (($go_page - 1) * $page_size) + $recs; //����á�˹�˹�ҷ���� ���͡�˹��á���촷��д֧���������ʴ�
                                    $Checkpage = ($go_page / $page_size) + 1;
                                    if ($Checkpage == $max_count) { //��Ǩ�ͺ˹���ش����
                                        $Newsize = $num_rows % $page_size;
                                        if ($Newsize == 0) {
                                            $Newsize = 10;
                                        }
                                        $page_size = $Newsize;
                                    }
                                    $search_data = "";
                                    if ($search != '') {
                                        if ($member_id != $code_admin) {
                                            $search_data = " and ";
                                        } else {
                                            $search_data = " where ";
                                        }
                                        $search_data .= " $field_search  like '%$search%'";
                                        echo "<Font color=blue> �ʴ��š�ä��Ң����ŷ���դ���� </Font><Font color=red>" . $search . " </Font></Font><br>&nbsp;";
                                    }

                                    $sql2 = $sql . $search_data . " order by id  limit  $go_page,$page_size";
//�������ǹ��ǵ��ҧ
                                    ?><table border="0"><tr bgcolor="<?php echo $bg; ?>">
                                            <td align="center">Subject</td>
                                            <td align="center">Code</td>
                                            <td align="center">Patient Initials</td>
                                            <td align="center">Date of Birth</td>
                                            <td align="center">Date of record</td>
                                            <td align="center">Date of record follow up</td>
                                            <td align="center">Pathology Consensus</td>
                                            <td align="center">Status 1<br>(First  entry)</td>
                                            <td align="center">Follow up</td>
                                            <td align="center">Follow up<br>Status 1</td>
                                            <td align="center">Follow up<br>Status 2</td>
                                            <td align="center">View</td>
                                            <td align="center">Edit</td>
                                            <td align="center">Delete</td>

                                        <br>

                                        <?php
//show search

                                        $dbquery2 = mysql_query($sql2);
                                        $numrows = mysql_num_rows($dbquery2);
                                        $count = 0;
                                        if ($num_rows == 0) {
                                            echo "<Table border=1>";
                                            echo "<tr bgcolor='ffffff'><td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>����բ����� !&nbsp;</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td></tr>";
                                            echo "</Table>";
                                        } else {
                                            while ($recs <= $page_size) { // �ʴ��á���촨ӹǹ����Թ�ӹǹ�á���촵��˹��
                                                if ($count < $numrows) {
                                                    $Number = $go_page + $recs + 1; // ������ʴ��á���촷�������
                                                    $result = mysql_fetch_array($dbquery2);
                                                    ////////////   registry  lymphoma
                                                    $id = $result['id'];
                                                    $dateofrecord = $result['dateofrecord'];
                                                    $subject = $result['subject'];
                                                    $centre = $result['centre'];
                                                    $d_record = $result['d_record'];
                                                    $m_record = $result['m_record'];
                                                    $y_record = $result['y_record'];
                                                    $date_of_record = $result['date_of_record'];
                                                    $patient_initials = $result['patient_initials'];
                                                    $sex = $result['sex'];
                                                    $id_card = $result['id_card'];
                                                    $hn = $result['hn'];
                                                    $date_of_birth = $result['date_of_birth'];
                                                    $province = $result['province'];
                                                    $payment = $result['payment'];
                                                    $date_bio_report = $result['date_bio_report'];
                                                    $pathology = $result['pathology'];
                                                    $biopsy_site = $result['biopsy_site'];
                                                    $type = $result['type'];
                                                    $hodgkin_don = $result['hodgkin_don'];
                                                    $type_non = $result['type_non'];
                                                    $type_sub_non = $result['type_sub_non'];
                                                    $who_sub = $result['who_sub'];
                                                    $work_sub = $result['work_sub'];
                                                    $other_type = $result['other_type'];
                                                    $ann_arbor = $result['ann_arbor'];
                                                    $symptom_ann = $result['symptom_ann'];
                                                    $ext_none = $result['ext_none'];
                                                    $ext_wal = $result['ext_wal'];
                                                    $ext_sin = $result['ext_sin'];
                                                    $ext_sal = $result['ext_sal'];
                                                    $ext_thy = $result['ext_thy'];
                                                    $ext_eye = $result['ext_eye'];
                                                    $ext_lung = $result['ext_lung'];
                                                    $ext_breast = $result['ext_breast'];
                                                    $ext_stomach = $result['ext_stomach'];
                                                    $ext_small = $result['ext_small'];
                                                    $ext_testis = $result['ext_testis'];
                                                    $ext_brain = $result['ext_brain'];
                                                    $ext_liver = $result['ext_liver'];
                                                    $ext_large = $result['ext_large'];
                                                    $ext_bone = $result['ext_bone'];
                                                    $ext_spleen = $result['ext_spleen'];
                                                    $ext_skin = $result['ext_skin'];
                                                    $ext_other = $result['ext_other'];
                                                    $ext_other_text = $result['ext_other_text'];
                                                    $per_ecog = $result['per_ecog'];
                                                    $ldh = $result['ldh'];
                                                    $hiv_positive = $result['hiv_positive'];
                                                    /////// Patient Initials
                                                    if ($patient_initials != "" && $sex != "" && $id_card != "" && $hn != "" && $date_of_birth != "" && $province != "" && $payment != "" && $date_bio_report != "" && $pathology != "" && $biopsy_site != "" && $type != "" && $ann_arbor != "" && $symptom_ann != "" && $per_ecog != "" && $ldh != "" && $hiv_positive != "") {
                                                        $general_show = "complete";
                                                    } else if ($patient_initials != "") {
                                                        $general_show = "incomplete";
                                                    } else {
                                                        $general_show = "No Data";
                                                    }
                                                    //*******status2  follow
                                                    $result_follow = $result['result_follow'];
                                                    $result_cause_follow = $result['result_cause_follow'];
                                                    $progression_follow = $result['progression_follow'];
                                                    $salvage_follow = $result['salvage_follow'];
                                                    $surgery_follow = $result['surgery_follow'];
                                                    $stem_cell_follow = $result['stem_cell_follow'];
                                                    $date_last_contact_follow = $result['date_last_contact_follow'];
                                                    $status_follow = $result['status_follow'];
                                                    // $status_follow2 = $result['status_follow2'];
                                                    ///////
                                                    if ($result_follow != "" && $progression_follow != "" && $salvage_follow != "" && $stem_cell_follow != "" && $date_last_contact_follow != "" && $status_follow != "") {
                                                        $status2_follow = "complete";
                                                    } else if ($patient_initials != "") {
                                                        $status2_follow = "incomplete";
                                                    } else {
                                                        $status2_follow = "No Data";
                                                    }
                                                    //********Pathology *****
                                                    $date_bio_report_pathology = $result['date_bio_report_pathology'];
                                                    $pathology_pathology = $result['pathology_pathology'];
                                                    $biopsy_site_pathology = $result['biopsy_site_pathology'];
                                                    $type_pathology = $result['type_pathology'];
                                                    $type_hodgkin_pathology = $result['type_hodgkin_pathology'];
                                                    $immunophenotype_pathology = $result['immunophenotype_pathology'];
                                                    $type_sub_non_pathology = $result['type_sub_non_pathology'];
                                                    $who_sub_pathology = $result['who_sub_pathology'];
                                                    $other_type_pathology = $result['other_type_pathology'];

                                                    if ($date_bio_report_pathology != "" && $pathology_pathology != "" && $biopsy_site_pathology != "" && $type_pathology != "") {
                                                        $status_pathology = "yes";
                                                    } else if ($date_bio_report_pathology == "" || $pathology_pathology == "" || $biopsy_site_pathology == "" || $type_pathology == "") {
                                                        $status_pathology = "no";
                                                    }

                                                    ///****************
                                                    if ($bg == "#ffb54c") {
                                                        $bg = "#ffb54c";
                                                    } else {
                                                        $bg = "#ffb54c";
                                                    }
                                                    //show data
                                                    $date_of_birth = new DateTime($date_of_birth);
                                                    $date_today_now = new DateTime();
                                                    $dateofrecord = new DateTime($dateofrecord);

                                                    $ymd_birth = $date_of_birth->format("d-m-Y");
                                                    $mage = ($dateofrecord->format("d-m-Y") - $date_of_birth->format("d-m-Y"));
                                                    $obj_now = new Datetime();
                                                    $obj_date_last_contact_follow = new Datetime($date_last_contact_follow);
                                                    $cal = $obj_now->format('Ymd') - ($obj_date_last_contact_follow->format('Ymd') - 5430000);
                                                    $status_follow_2 = "Update";
                                                    if ($cal >= 10000) {
                                                        $status_follow_2 = "No Update";
                                                    }
                                                    ?>
                                                    <tr bgcolor="<?php echo $bg; ?>">
                                                        <td align="center"><?php echo $Number; ?></td>
                                                        <td align="center"><?php echo $centre; ?></td>
                                                        <td align="center"><?php echo strtoupper($patient_initials); ?></td>
                                                        <td align="center"><?php echo $date_of_birth->format("d-m-Y"); ?></td>
                                                        <td align="center"><?php echo $dateofrecord->format("d-m-Y"); ?></td>
                                                        <td align="center"><?php echo $date_last_contact_follow; ?></td>
                                                        <td align="center"><a href="index.php?name=member&file=pathology&id=<?php echo $id; ?>"><?php echo $status_pathology; ?> </a>          </td>
                                                        <td align="center"><?php echo $general_show; ?></td>
                                                        <td align="center"><a href="index.php?name=member&file=follow_up&id=<?php echo $id; ?>">Follow up</a>          </td>
                                                        <td align="center"><?php echo $status2_follow; ?></td>
                                                        <td align="center"><?php echo $status_follow_2; ?> </td>
                                                        <td align="center"><a href="index.php?name=member&file=view_data_one&id=<?php echo $id; ?>">View</a></td>
                                                        <td align="center"><a href="index.php?name=member&file=edit_data_one&id=<?php echo $id; ?>">Edit</a></td>
                                                        <td align="center"><a onclick='confirmDelete("<?php echo $id; ?>", "<?php echo $centre; ?>")'>Delete</a></td>
                                                        <?php
//�ʴ����������п�Ŵ�
                                                        $count++;
                                                    }
                                                    $recs++;
                                                } //end while
                                            }
                                            ?>
                                    </table>
                                    <?php
                                    if ($search != '') {
                                        echo "<Br>�鹾� <Font color=red>" . $numrows . " Record</font><br>";
                                    } else {
                                        echo "<Br>�����ŷ����� <Font color=red>" . $num_rows . " Record</font><br>";
                                    }
                                    $Scriptname = "index.php";
                                    echo "<CENTER><Br>˹�ҷ�� " . $Checkpage . " / " . $max_count . "<Br>";
                                    if ($num_rows > $page_size) {
                                        if ($Checkpage > 1) { //����ʴ�˹�ҷ���ҡ���� 1 ���� Previous
                                            echo "[ <A Href=" . $Scriptname . "?Page=" . ($Checkpage - 1) . ">��Ѻ�˹�ҷ������</A> ]";
                                        }
                                        echo "[";
                                        $Pad = "";
                                        //�Ѻ��Ҫ���ʤ�Ի�����͹���������ǹ˹�觢ͧ�����ҧ�ԧ
                                        for ($N = 1; $N <= $max_count; $N = $N + 1) {
                                            if ($N >= 10) {
                                                $Pad = "";
                                            }
                                            //��˹������Ţ˹��������ҧ�ԧ����
                                            $Ref = "<A Href=" . $Scriptname . "?Page=" . $N . ">" . $Pad . $N . "</A>";
                                            echo "  " . $Ref . "  ";
                                        }
                                        echo "]";
                                        if ($Checkpage < $max_count) { //����ʴ�˹�ҷ����¡���˹���٧�ش ���� Next
                                            echo "[<A Href=" . $Scriptname . "?Page=" . ($Checkpage + 1) . ">˹�ҶѴ�</A> ]";
                                        }
                                        echo "</CENTER>";
                                    }
                                    echo "</Table>";

                                    mysql_close(); // �Դ�����������
                                    ?>
                                    <br />



                                    <!-- sidebar -->

                                    <div id="left">


                                        <br />
                                        <h3 align="center"></h3>

                                    </div>
                                    <h1></h1>

                                    </div>
                                    <table width="100%" border="0" cellpadding="3" cellspacing="4"
                                           class="smallTextBlack">
                                        <form action="report/new_export.php" method="post" name="export" id="export" onSubmit="return checkDate();">

                                            <tr>
                                                <td>
                                                    <strong>Filter by institute</strong>
                                                    <select name="institute" class="smallTextBlack" id="jumpMenu" style="width:100px;" >
                                                        <option value="ALL" selected>all</option>
                                                        <?php if ($arrInstitute) foreach ($arrInstitute as $theHostpitalItem): ?>
                                                                <option value="<?php echo $theHostpitalItem['codehos'] ?>"><?php echo $theHostpitalItem['codehos'] ?> ( <?php echo $theHostpitalItem['hostpital_engname'] ?> )</option>
                                                            <?php endforeach; ?>
                                                    </select></td>
                                            </tr>                                                            <tr>
                                                <td><strong>Filter by record date form</strong>
                                                    <select name="minmonth" class="smallTextBlack" id="minmonth" style="width:60px;" >
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>

                                                    <?php $minYear = intval(trim($startYear[0])) - 49; ?>
                                                    <?php $currentYear = date('Y') + 543 ?>
                                                    <?php $maxYear = date('Y') + 543 + 10 ?>

                                                    <select name="minyear" class="smallTextBlack" id="minyear"style="width:100px;" >
                                                        <?php for ($yearCount = $minYear; $yearCount <= $currentYear; $yearCount++) : ?>
                                                            <option value="<?php echo $yearCount ?>"><?php echo $yearCount ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                    <strong>to</strong>
                                                    <select name="maxmonth" class="smallTextBlack" id="maxmonth" style="width:60px;">
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                    <select name="maxyear" class="smallTextBlack" id="maxyear" style="width:100px;">
                                                        <?php for ($maxYearCount = $maxYear; $maxYearCount >= $minYear; $maxYearCount--) : ?>
                                                            <option value="<?php echo $maxYearCount ?>"><?php echo $maxYearCount ?></option>
                                                        <?php endfor; ?>                                                       
                                                    </select>
                                                    <span class="smallTextBlue"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Submit" type="submit" class="button" id="button" value="Export"></td>
                                            </tr>
                                        </form>
                                    </table>
                            </td>
                        </tr>
                    </table>

                    <script type="text/javascript">
                        function confirmDelete(id, code) {
                            if (confirm('Are you sure you want to delete ' + code + " ?")) {
                                window.location.replace(window.location + "?name=member&file=delete_data_one&id=" + id);
                                // window.location.pathname+"id";
                            }
                        }
                        function checkDate() {
                            var mindate = document.getElementById('minyear').value + document.getElementById('minmonth').value;
                            var maxdate = document.getElementById('maxyear').value + document.getElementById('maxmonth').value;
                            if (mindate > maxdate) {
                                alert('������͡�ѹ���ͧ��ҹ���١��ͧ ��سҵ�Ǩ�ͺ');
                                return false;
                            }
                            return true;
                        }
                    </script>
                    <div class="x"></div>
                    <div class="break"></div>

                    </div>



                    <?php
                    include "footer.php";
                }?>