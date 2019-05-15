<?php
$date_today = date("d-m-Y [H:i:s]");
$user_login = $_POST['user_login'];
$pwd_login = $_POST['pwd_login'];

if (isset($user_login) and isset($pwd_login)) {
    $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
    $sqlLogin = " SELECT user,password from " . TB_MEMBER . " where user='$user_login' AND password='" . $pwd_login . "' ";
   
    $result = mysql_query($sqlLogin);
    $num = mysql_num_rows($result);
    if ($num <= 0) {
        ?>
        <div id='wrapper'>


            <div id='content'>
                <div id='logo'>
                    <h1><a href='index.php'>ระบบลงทะเบียนข้อมูล  lymphoma</a></h1>
                </div>
                <div class='x'></div>
                <!-- main content -->
                <div id='login'>
                    <div class='space'></div>
                    <div class='space'></div>
                    <br>โปรดตรวจสอบ Username และ Password อีกครั้ง <br> รอสักครู่ โปรแกรมจะนำกลับไปหน้า Login ใหม่..  <br>หรือถ้ายังไม่ username ให้ติดต่อได้ที่ เบิร์ด สมาคมโลหิต<br>
                    <p>
                        <img src='images/login-redirection-loader.gif' alt='login-redirection-loader' />
                        <meta http-equiv=\"refresh\" content=\"3;URL=index.php?name=member&amp;file=login\" />
                    </p>
                </div>

                <!-- sidebar -->

                <div class='x'></div>
                <div class='break'></div>

            </div>
            <?php
            include 'modules/index/footer.php';
        } else {

            mysql_query("UPDATE " . TB_MEMBER . " SET lastlog='$date_today' WHERE user='$user_login'");
            mysql_query("UPDATE " . TB_MEMBER . " SET dtnow='$date_today' WHERE user='$user_login'");
            ?>
            <div id='wrapper'>


                <div id='content'>
                    <div id='logo'>
                        <h1><a href='index.html'>ระบบลงทะเบียนข้อมูล lymphoma</a></h1>
                    </div>
                    <div class='x'></div>
                    <!-- main content -->
                    <div id='login'>
                        <div class='space'></div>
                        <div class='space'></div>
                        <p>
                            <img src='images/login-redirection-loader.gif' alt='login-redirection-loader' /><br /><br />
                            <label>กำลังเข้าสู่โปรแกรม รอสักครู่โปรแกรมจะนำท่านไปยังหน้าหลัก...</label>

                        </p>
                    </div>

                    <!-- sidebar -->

                    <div class='x'></div>
                    <div class='break'></div>

                </div>
                <?php
                include 'modules/index/footer.php';

                $login_true = $user_login;
                $_SESSION['login_true'] = $user_login;
            }
            echo "<meta http-equiv=refresh content='3;URL=index.php'>";
        }
