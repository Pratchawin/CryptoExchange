<!DOCTYPE html>
<html lang="en">
<?php
session_start();
@$full_name = $_SESSION["full_name"];
@$u_id = $_SESSION["u_id"];
?>
<?php
include '../built_in_func/ckk_login.php';
?>
<?php
@$ckk_status = $_GET["status"];
if ($ckk_status == "logout") {
    $ckk_succ = session_unset();
    if ($ckk_succ == true) {
        echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/login.php'>";
    }
}
?>

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
    <link rel="stylesheet" href="../style/deposit.css">
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
                <?php
                if (isset($_SESSION["u_id"])) {
                    echo "<div class='ar-dottrade-user-status'>
                        <a href='wellet.php' class='dottrade-link-navtop wll-for-name'>
                            $full_name
                        </a>
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
                <?php
                show_btn_logout();
                ?>
            </div>
        </div>
        <div class="ar-dottrade-content-top">
            <div class="ar-wellet-container">
                <div class="ar-wallet-content-history2">
                    <div class="wallet-bx-content-2">
                        <form action="" class="form-cradit-card">
                            <div class="ar-card-name">
                                <p>ชื่อบัตร</p>
                                <input class="inp-card-name" type="text" name="c_name" id="" placeholder="ชื่อบัตร">
                            </div>
                            <div class="ar-card-number">
                                <p>หมายเลขบัตร</p>
                                <input class="inp-card-name" type="text" name="c_num" id="" placeholder="หมายเลขบัตร">
                            </div>
                            <div class="ar-card-date-expire">
                                <div>
                                    <p>วันหมดอายุ</p>
                                    <input class="inp-dt-xpir" type="text" name="c_exp" id="" placeholder="วันหมดอายุ">
                                </div>
                                <div>
                                    <p>รหัสหลังบัตร</p>
                                    <input class="inp-dt-xpir" type="text" name="c_pass" id="" placeholder="****">
                                </div>
                            </div>
                            <div class="ar-card-number">
                                <p>ระบุจำนวนเงิน</p>
                                <input class="inp-card-name" type="text" name="c_amount" id="" placeholder="จำนวนเงิน">
                            </div>
                            <div class="ar-card-number">
                                <input type="checkbox" name="c_ckk" id="" value="1" style="padding-top: 5px;">
                                <label for="">ฉันได้อ่านข้อตกลงเเละเงื่อนไขการชำระเงิน</label>
                            </div>
                            <div class="ar-card-number">
                                <input class="btn-conf" type="submit" value="ชำระเงิน" name="btn_conf" id="" placeholder="จำนวนเงิน">
                            </div>
                            <?php
                            @$ckk_commit = $_GET["c_ckk"];
                            @$monney = $_GET["c_amount"];
                            if (isset($_GET["btn_conf"])) {
                                if ($ckk_commit == 1) {
                                    deposit($monney, $u_id);
                                    //echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/wellet.php'>";
                                }
                            }
                            function deposit($money, $u_id)
                            {
                                include '../conn/con_db.php';
                                $con = conn();
                                $ins_to_bank_acc = "insert into bank_account(money) values('$money') where u_id=$u_id";
                                $ckk_rs = mysqli_query($con, $ins_to_bank_acc);
                                if ($ckk_rs == true) {
                                    //echo "<meta http-equiv='refresh' content='5;url=http://localhost/crypto/webpage/wellet.php'>";
                                } else {
                                    $get_old_coin = "select money from bank_account where u_id=$u_id";
                                    $rs_data = mysqli_query($con, $get_old_coin);
                                    if (mysqli_num_rows($rs_data) > 0) {
                                        $old_money = mysqli_fetch_assoc($rs_data);
                                        $new_mon = $old_money["money"] + $money;
                                        $upd_my_mon = "update bank_account set money='$new_mon' where u_id=$u_id";
                                        mysqli_query($con, $upd_my_mon);
                                        //เพิ่มไปยังประวัติการเติมเงิน
                                        $sql_ins_to_his = "insert into tbl_history(u_id, coin, amount, price, total) values('$u_id','THB','$money','$money','$money')";
                                        mysqli_query($con, $sql_ins_to_his);
                                    }else{
                                        $st_deposit="insert into bank_account(u_id, money) values('$u_id','$money')";
                                        mysqli_query($con,$st_deposit);
                                    }
                                    //echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/wellet.php'>";
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../javascript/market.js"></script>

</html>