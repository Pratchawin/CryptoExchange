<!DOCTYPE html>
<html lang="en">
<?php include '../conn/con_db.php'; ?>
<?php session_start(); ?>

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
        $ckk_login = "";
        $conn_db = conn();
        $ckk_error = "";
        if (isset($_POST["btn-login"])) {
            @$email = $_POST["lg_email"];
            @$pwd = $_POST["lg_pass"];
            if ($email == "admin@gmail.com" and $pwd == "admin123") {
                echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/backend/dashboard.php'>";
            } else {
                $sql_login = "select u_id,email, pwd, full_name from tbl_register where email='$email' and pwd='$pwd'";
                $result = mysqli_query($conn_db, $sql_login);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION["u_id"] = $row["u_id"];
                    $_SESSION["full_name"] = $row["full_name"];
                    echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/wellet.php'>";
                } else {
                    $ckk_error = "<p style='color:red; text-align:right; margin-top:10px;'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>";
                    echo "<meta http-equiv='refresh' content='3;url=http://localhost/crypto/webpage/login.php'>";
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
                        <form action="login.php" class="ar-form-login" method="POST">
                            <center>
                                <h2>LOGIN</h2>
                            </center>
                            <div class="ar-bx-inp-email">
                                <div class="ar-inp-title">
                                    <label for="">Email:</label>
                                </div>
                                <input type="email" class="inp-email-and-pass" name="lg_email" id="" placeholder="Email">
                            </div>
                            <div class="ar-bx-inp-pass">
                                <div class="ar-inp-title">
                                    <label for="">Password:</label>
                                </div>
                                <input type="password" class="inp-email-and-pass" name="lg_pass" id="" placeholder="Password">
                                <?php echo $ckk_error; ?>
                            </div>
                            <div class="ar-btn-login-and-regis">
                                <div class="ar-btn-login">
                                    <input type="submit" value="Login" name="btn-login" class="btn-login-and-register">
                                </div>
                                <div class="ar-btn-register">
                                    <button class="btn-register"><a href="register.php">Register</a></button>
                                </div>
                            </div>
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