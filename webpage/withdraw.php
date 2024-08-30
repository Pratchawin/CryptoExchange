<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="../style/withdraw.css">
    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>
<?php
session_start();
@$full_name = $_SESSION["full_name"];
@$u_id = $_SESSION["u_id"];
@$get_coin_id = $_GET["coin_id"];
//echo "C_ID:", $get_coin_id;
?>

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
                <?php
                if (isset($_SESSION["u_id"])) {
                    echo "<div class='ar-dottrade-user-status'>
                    <a href='wellet.php' class='dottrade-link-navtop wll-for-name'>$full_name</a>
                    </div>";
                } else {
                    echo "";
                }
                ?>
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
                    <a href="login.php" class="dottrade-link-navtop">Logout</a>
                </div>
            </div>
        </div>
        <div class="ar-dottrade-content-top">
            <div class="ar-wellet-container">
                <div class="ar-wallet-content-history">
                    <div class="wallet-bx-content-2">
                        <div class="ar-dtt-title">
                            <p class="ar-wellet-title-size"></p>
                            <p class="ar-wellet-his-size">โอนเหรียญไปยังบัญชีอื่น</p>
                        </div>
                        <div class="ar-wallet-history-tbl">
                            <div class="ar-show-form-withdraw">
                                <div class="form-withdraw-img-and-inp">
                                    <div class="coin-image">
                                        <?php
                                        include "../conn/con_db.php";
                                        $con = conn();
                                        @$get_coin_id = $_GET["coin_id"];
                                        $sql_get_img = "select img_coin from tbl_coin_data where coin_id='$get_coin_id'";
                                        $rs_get_img = mysqli_query($con, $sql_get_img);
                                        $coin_img = mysqli_fetch_assoc($rs_get_img);
                                        echo "<img src='../coin_img/", $coin_img["img_coin"], "' alt='' class='wth-coin-image'>";
                                        ?>
                                    </div>
                                    <div class="ar-create-my-coin-addr">
                                        <form action="withdraw.php" style="margin-top:10px;">
                                            <div class="ar-show-addr">
                                                <?php
                                                //echo "UID",$u_id;
                                                $amount2 = '';
                                                if (isset($_GET["btn_create_coin_acc"])) {
                                                    $sql_generate_byte = bin2hex(random_bytes(16));
                                                    echo "<p style='padding-top:5px; padding-right:10px;'>", $sql_generate_byte, "</p>";
                                                    $sql_upd_coin_acc = "update my_coin set coin_acc='$sql_generate_byte' where u_id=$u_id and coin_id=$get_coin_id";
                                                    mysqli_query($con, $sql_upd_coin_acc);
                                                } else {
                                                    $sql_get_coin_acc = "select coin_acc, amount from my_coin where u_id=$u_id";
                                                    $rs_u_acc_id = mysqli_query($con, $sql_get_coin_acc);
                                                    $coin_data = mysqli_fetch_assoc($rs_u_acc_id);
                                                    echo "<p class='show-recip-addr'>", $coin_data["coin_acc"], "</p>";
                                                }

                                                ?>
                                                <input class="btn-create" name="btn_create_coin_acc" type="submit" value="create">
                                            </div>
                                            <div>
                                                <!-- <center><label for="">จำนวนเหรียญ: <?php
                                                    /* get_amount($u_id);
                                                    function get_amount($u_id){
                                                        $con=conn();
                                                        $sql_get_amount="select amount from my_coin where u_id=$u_id";
                                                        $rs_amount=mysqli_query($con, $sql_get_amount);
                                                        $amount_data=mysqli_fetch_assoc($rs_amount);
                                                        echo $amount_data["amount"];
                                                    } */
                                                 ?></label></center> -->
                                            </div>
                                            <input type="text" style="display: none;" name="coin_id" id="" value="<?php echo $get_coin_id; ?>">
                                        </form>
                                    </div>
                                    <div class="ar-send-coin-to-oth">
                                        <form action="withdraw.php" style="margin-top:10px;">
                                            <input type="text" style="display: none;" name="coin_id" id="" value="<?php echo $get_coin_id; ?>">
                                            <div>
                                                <p class="send-coin-title">Address:</p>
                                            </div>
                                            <div class="ar-inp-data">
                                                <input type="text" name="recip" id="" class="inp-addr-data" placeholder="fdg985342...">
                                            </div>
                                            <div class="ar-bx-coin-amount">
                                                <p class="send-coin-title">Amount:</p>
                                            </div>
                                            <div class="ar-inp-data">
                                                <input type="text" name="amount" id="" class="inp-addr-data" placeholder="0.10000000">
                                            </div>
                                            <div class="ar-btn-send-coin">
                                                <input type="submit" value="Send coin" class="btn-send-coin" name="btn_trans">
                                            </div>
                                            <?php
                                            @$recip = $_GET["recip"];
                                            @$amount = $_GET["amount"];
                                            /* echo "addr:", $recip, "<br>";
                                            echo "amount:", $amount, "<br>"; */
                                            if (isset($_GET["btn_trans"])) {
                                                //ถ้าเจอ addr ผู้รับให้ดึงข้อมูลจำนวนเหรียญ
                                                $sql_get_old_amount = "select amount from my_coin where coin_acc='$recip'";
                                                $rs_data = mysqli_query($con, $sql_get_old_amount);
                                                $old_amount = mysqli_fetch_assoc($rs_data);
                                                //+จำนวนเหรียญเเละอัปเดทจำนวนเหรียญ
                                                $new_amount = $old_amount["amount"] + $amount;
                                                $sql_ins_to_resip = "update my_coin set amount='$new_amount' where coin_acc='$recip'";
                                                $ckk_data = mysqli_query($con, $sql_ins_to_resip);
                                                if ($ckk_data == true) {
                                                    //update coin amount
                                                    $upd_my_coin = "select amount from my_coin where coin_id=$get_coin_id and u_id=$u_id";
                                                    $rs_bf_upd = mysqli_query($con, $upd_my_coin);
                                                    $amount_bf = mysqli_fetch_assoc($rs_bf_upd);
                                                    //total coin
                                                    $upd_my_coin = $amount_bf["amount"] - $amount;
                                                    $sql_update_my_coin = "update my_coin set amount='$upd_my_coin' where u_id=$u_id and coin_id=$get_coin_id";
                                                    mysqli_query($con, $sql_update_my_coin);
                                                    echo "<p class='show-status'>โอนเหรียญเรียบร้อย</p>";
                                                    echo "<meta http-equiv='refresh' content='3;url=http://localhost/crypto/webpage/wellet.php'>";
                                                } else {
                                                    echo "error", mysqli_error($con);
                                                }
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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