<!DOCTYPE html>
<html lang="en">
<?php
include '../conn/con_db.php';
?>
<?php
session_start();
@$full_name = $_SESSION["full_name"];
@$u_id = $_SESSION["u_id"];
?>
<?php
include '../built_in_func/ckk_login.php';
ckk_login();
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
                    <a href="wellet.php" class="dottrade-link-navtop wll-for-name"><?php echo $full_name; ?></a>
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
                <?php
                show_btn_logout();
                ?>
            </div>
        </div>
        <div class="ar-dottrade-content-top">
            <div class="ar-wellet-container">
                <div class="ar-wallet-content">
                    <div class="wallet-bx-content-2">
                        <div class="ar-dtt-title">
                            <p class="ar-wellet-title-size">Wallet</p>
                        </div>
                        <div class="ar-wallet-total-top">
                            <p class="wallet-total-price">ยอดเงินในบัญชี</p>
                        </div>
                        <div class="ar-wallet-content2">
                            <div class="ar-show-btc-wall">
                                <p class="conv-money-to-btc-coin" id="con_to_btc">
                                    0.00000000 BTC
                                </p>
                                <p style="display: none;" id="th_static">
                                    <?php
                                    include "../conn/wellet.php";
                                    echo get_balance($u_id, conn());
                                    ?>
                                </p>
                                <p id="th_bath" style="display: none;"><?php echo get_balance($u_id, conn()), "฿"; ?></p>
                                <p class="conv-money-to-btc-coin-thb" id="th_bath">
                                    <?php
                                    $value = get_balance($u_id, conn());
                                    echo number_format($value, 2), " ฿";
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="ar-wallet-content3">
                            <div class="ar-btn-withdraw-and-btn-deposit">
                                <button class="btn-set-dep-and-with"><a href="deposit.php" class="wellet-set-link-dep-and-withd">Deposit</a></button>
                                <button class="btn-set-dep-and-with"><a href="withdraw_to_acc.php" class="wellet-set-link-dep-and-withd">Withdraw</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="ind-wallet-bx-content-3">
                        <div class="ar-tbl-show-coin-in-wallet">
                            <table class="tbl-in-wallet">
                                <tr>
                                    <th></th>
                                    <th class="wallet-coin-title">Coin</th>
                                    <th class="wallet-coin-total">Total</th>
                                    <th class="wallet-coin-inorder2">Date buy</th>
                                    <th class="wallet-coin-inorder2">Price</th>
                                    <th></th>
                                </tr>
                                <?php
                                $con = conn();
                                $sql_get_mycoin = "select my_coin.my_coin_id, my_coin.u_id, my_coin.coin_id, my_coin.price, my_coin.amount, my_coin.open_price, my_coin.date_buy,tbl_coin_data.coin_name from my_coin, tbl_coin_data where tbl_coin_data.coin_id=my_coin.coin_id and u_id='$u_id'";
                                $rs_get_data = mysqli_query($con, $sql_get_mycoin);
                                if (mysqli_num_rows($rs_get_data) > 0) {
                                    $i=0;
                                    while ($my_coin = mysqli_fetch_assoc($rs_get_data)) {
                                        $i++;
                                        $coin_id = $my_coin["coin_id"];
                                        echo "
                                            <tr>
                                            <td></td>
                                            <td class='wallet-coin-tr-coin set-wall-tr-txt' id='coinName$i'>" . $my_coin["coin_name"] . "</td>
                                            <td class='wallet-coin-tr-amount set-wall-tr-txt' id='coin_amount$i'>" . $my_coin["amount"] . "</td>
                                            <td class='set-wall-tr-txt2'>" . $my_coin["date_buy"] . "</td>
                                            <td class='wallet-coin-tr-total-price set-wall-tr-txt' id='coin_price$i'>". $my_coin["open_price"] . "</td>
                                            <td class='wallet-coin-tr-total-price set-wall-tr-txt'><button class='btn-wihtdraw'><a href='withdraw.php?coin_id=$coin_id'>โอนเหรียญ</a></button></td>
                                        </tr>
                                            ";
                                    }
                                } else {
                                    echo "";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="ar-wallet-content-history">
                    <div class="wallet-bx-content-2">
                        <div class="ar-dtt-title">
                            <p class="ar-wellet-his-size">ประวัติการทำธุรกรรม</p>
                        </div>
                        <div class="tax-invoice">
                            <p><a href="excel.php?status=excel&u_id=<?php echo $u_id;?>">ออกใบกำกับภาษี</a></p>
                            <p class="ch-coin-link"><a href="wellet_change_coin.php">แลกเปลี่ยนสกุลเงิน</a></p>
                        </div>
                        <div class="ar-wallet-history-tbl">
                            <table class="ar-tbl-wellet-history-list">
                                <tr>
                                    <th class="wellet-his-th-title-set-size set-date-transaction">วันที่ทำรายการ</th>
                                    <th class="wellet-his-th-title-set-size set-date-transaction">ชื่อเหรียญ</th>
                                    <th class="wellet-his-th-title-set-size set-date-transaction">จำนวน</th>
                                    <th class="wellet-his-th-title-set-size set-date-transaction">ราคา</th>
                                    <th class="wellet-his-th-title-set-size set-date-transaction">ค่า fee</th>
                                    <th class="wellet-his-th-title-set-size set-date-transaction">รวม</th>
                                </tr>
                                <?php
                                show_user_hidtory($u_id, conn());
                                ?>
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
<script src="../javascript/wellet.js"></script>

</html>