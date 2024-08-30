<!DOCTYPE html>
<html lang="en">
<?php include '../conn/con_db.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOTTRADE</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/navtop.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/market.css">
    <link rel="stylesheet" href="../style/wallet.css">
    <link rel="stylesheet" href="../style/login.css">
    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>

<body class="wallet-set-bg">
    <div class="ar-dottrade-crypto-container">
        <div class="ar-dottrade-nav-top">
            <div class="ar-dottrade-nav-top-logo">
                <div class="dottrade-logo">
                    <a href="../index.php" class="dottrade-logo-link">
                        <h1>DOT TRADE</h1>
                    </a>
                </div>
            </div>
            <div class="ar-dtt-navtop-link">
                <div class="ar-navtop-link-list">
                    <a href="markets.php" class="dottrade-link-navtop">Markets</a>
                </div>
                <div class="ar-navtop-link-list">
                    <a href="trade.php?coin_name=BTC&coin_id=29" class="dottrade-link-navtop">Trade</a>
                </div>
                <div class="ar-navtop-link-list">
                    <a href="news.php" class="dottrade-link-navtop">News</a>
                </div>
                <div class="ar-nav-top-white-space">

                </div>
                <div class="ar-dottrade-user-status">
                    <a href="wellet.php" class="dottrade-link-navtop">Wellet</a>
                </div>
                <div class="ar-dottrade-user-status">
                    <a href="deposit.php" class="dottrade-link-navtop">Deposit</a>
                </div>
                <div class="ar-dottrade-user-status">
                    <a href="history.php" class="dottrade-link-navtop">History</a>
                </div>
                <div class="ar-dottrade-user-status">
                    <a href="setting.php" class="dottrade-link-navtop">Setting</a>
                </div>
                <div class="ar-dottrade-user-status">
                    <a href="login.php" class="dottrade-link-navtop">Login</a>
                </div>
            </div>
        </div>
        <?php
        $success="";
        @$fname = $_POST["fname"];
        @$lname=$_POST["lname"];
        @$name=$fname." ".$lname;
        @$email = $_POST["email"];
        @$pwd = $_POST["pwd"];
        @$confirm=$_POST["confirm"];
        $authen = 0;
        $ckk_name="";
        $ckk_email="";
        $ckk_pwd="";
        $ckk_dd_name="";
        $ckk_conf="";
        $conn = conn();
        if(isset($_POST["btn_regis"])){
            if($name==""){
                $ckk_name="<p style='color:red; text-align:right; margin-top:10px;'>โปรดระบุชื่อของคุณ</p>";
            }else{
                $ckk_name="";
            }
            if($email==""){
                $ckk_email="<p style='color:red; text-align:right; margin-top:10px;'>โปรดระบุอีเมลของคุณ</p>";
            }
            if($pwd==""){
                $ckk_pwd="<p style='color:red; text-align:right; margin-top:10px;'>โปรดระบุรหัสผ่านของคุณ</p>";
            }
            if($confirm==""){
                $ckk_conf="<p style='color:red; text-align:right; margin-top:10px;'>โปรดกดยืนยันข้อตกลง</p>";
            }
            if($name != "" and $email != "" and $pwd != "" and $confirm != ""){
                $sql_ckk_user_data="select email from tbl_register where email='$email'";
                $result=mysqli_query($conn,$sql_ckk_user_data);
                if(mysqli_num_rows($result)>0){
                    $ckk_dd_name="<p style='color:red; text-align:right; margin-top:10px;'>คุณได้สมัครสมาชิกเเล้ว</p>";
                }else{
                    $sql_regis = "insert into tbl_register(full_name,email,pwd,authen,confirm) values('$name', '$email', '$pwd','$authen', '$confirm')";
                    if (mysqli_query($conn, $sql_regis)) {
                        $success = "<p style='color:green; text-align:right; margin-top:10px;'>สมัครสมาชิกเรียบร้อย</p>";
                        echo "<meta http-equiv='refresh' content='3;url=http://localhost/crypto/webpage/register.php'>";
                    }
                    mysqli_close($conn);
                }
            }
        }
        ?>
        <div class="ar-dottrade-content-top">
            <div class="ar-login-container">
                <div class="login-img-and-form">
                    <div class="ar-dottrad-img">
                        <img src="../image_file/regis.jpg" alt="">
                    </div>
                    <div class="ar-form-login">
                        <form action="register.php" class="ar-form-login" method="POST">
                            <center>
                                <h2>REGISTER</h2>
                            </center>
                            <div class="ar-bx-inp-email">
                                <div class="ar-inp-title">
                                    <label for="">ชื่อ-นามสกุล:</label>
                                </div>
                                <div class="ar-regis-inp-fname-lname">
                                    <input type="text" class="inp-email-and-pass" name="fname" id="" placeholder="ชื่อ">
                                    <input type="text" class="inp-email-and-pass" name="lname" id="" placeholder="นามสกุล">
                                </div>
                                <?php echo $ckk_name;?>
                            </div>
                            <div class="ar-bx-inp-email">
                                <div class="ar-inp-title">
                                    <label for="">อีเมล:</label>
                                </div>
                                <input type="email" class="inp-email-and-pass" name="email" id="" placeholder="example@gmail.com">
                                <?php echo $ckk_email;?>
                            </div>
                            <div class="ar-bx-inp-pass">
                                <div class="ar-inp-title">
                                    <label for="">รหัสผ่าน:</label>
                                </div>
                                <input type="password" class="inp-email-and-pass" name="pwd" id="" placeholder="รหัสผ่าน 8 ตัวขึ้นไป">
                                <?php echo $ckk_pwd;?>
                            </div>
                            <div class="ar-bx-inp-pass">
                                <input type="checkbox" name="confirm" id="" value="1"> ฉันได้อ่านข้อตกลงเเละยินยอม  
                                <?php echo $ckk_conf;?>
                            </div>
                            <div class="ar-btn-login-and-regis">
                                <div class="ar-btn-login">
                                    <input type="submit" value="Confirm" class="btn-login-and-register" name="btn_regis">
                                </div>
                            </div>
                            <div class="ar-btn-register">
                                <button class="btn-register"><a href="login.php">Back</a></button>
                            </div>
                            <?php echo $success; echo $ckk_dd_name;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="ar-dottrade-footer-content">
            <div class="ar-dtt-footer">
                <div class="ar-footer-title">
                    <h1 class="footer-set-font">Footer</h1>
                </div>
                <div class="ar-footer-content">
                    <h1 class="footer-set-font">ctn</h1>
                </div>
            </div>
        </div> -->
    </div>
</body>
<script src="../javascript/market.js"></script>

</html>