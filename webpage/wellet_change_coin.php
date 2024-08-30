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
                                $sql_get_mycoin = "select tbl_coin_data.coin_name, my_coin.coin_id, my_coin.price, my_coin.amount, my_coin.date_buy from my_coin, tbl_coin_data where tbl_coin_data.coin_id=my_coin.coin_id and my_coin.u_id=$u_id";
                                $rs_get_data = mysqli_query($con, $sql_get_mycoin);
                                if (mysqli_num_rows($rs_get_data) > 0) {
                                    $i = 0;
                                    while ($my_coin = mysqli_fetch_assoc($rs_get_data)) {
                                        $i++;
                                        $coin_id = $my_coin["coin_id"];
                                        echo "
                                            <tr>
                                                <td></td>
                                                <td class='wallet-coin-tr-coin set-wall-tr-txt' id='coin_name$i'>" .$my_coin["coin_name"] . "</td>
                                                <td class='wallet-coin-tr-amount set-wall-tr-txt' id='coin_amount$i'>" . number_format(floatval($my_coin["amount"]),8). "</td>
                                                <td class='set-wall-tr-txt2'>" . $my_coin["date_buy"] . "</td>
                                                <td class='wallet-coin-tr-total-price set-wall-tr-txt' id='coin_price$i'>0000</td>
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
                            <p><a href="excel.php?status=excel&u_id=<?php echo $u_id; ?>">ออกใบกำกับภาษี</a></p>
                            <p class="ch-coin-link"><a href="wellet_change_coin.php">แลกเปลี่ยนสกุลเงิน</a></p>
                        </div>
                        <div class="ar-wallet-history-tbl">
                            <div class="ar-form-exchan-coin">
                                <?php
                                //เเลกเปลี่ยนเหรียญในระบบ
                                function get_all_coin_data()
                                {
                                    $con = conn();
                                    $sql_ex_coin = "select coin_id, coin_name, coin_amount, currency, img_coin from tbl_coin_data";
                                    $rs_sql_ex_coin = mysqli_query($con, $sql_ex_coin);
                                    $c_name = '';
                                    if (mysqli_num_rows($rs_sql_ex_coin) > 0) {
                                        $i = 0;
                                        while ($c_data = mysqli_fetch_assoc($rs_sql_ex_coin)) {
                                            $i += 1;
                                            $c_name = $c_data["coin_name"];
                                            $amount = $c_data["coin_amount"];
                                            echo "
                                            <tr class='tbl-set-border'>
                                                <td class='tbl-set-border' id='coinName$i'>$c_name</td>
                                                <td class='tbl-set-border set-price-tag' id='price$i'>700000</td>
                                                <td class='tbl-set-border set-amount-tag' id='coinAmount$i'>$amount</td>
                                                <th class='tbl-set-border set-amount-tag' id='totalPrice$i'>1000000</th>
                                            </tr>
                                            ";
                                        }
                                    } else {
                                        echo "";
                                    }
                                }
                                ?>
                                <div class="ar-form-ex-chan-left">
                                    <form action="wellet_change_coin.php" method="get">
                                        <div class="ar-frm-wrap-inp-data">
                                            <label for="">เลือกสกุลเงินที่ต้องการเเลกเปลี่ยน:</label>
                                            <select name="currency_exchan_coin" id="" class="scl-coin-toex">
                                                <option value="32.64">THB</option>
                                            </select>
                                        </div>
                                        <div class="show-icon-echan">
                                            <i class="fa-sharp fa-solid fa-arrow-right-arrow-left set-icon-size"></i>
                                        </div>
                                        <div class="ar-frm-wrap-inp-data">
                                            <label for="">เลือกสกุลเงินดิจิทัลที่ต้องการเเลกเปลี่ยน:</label>
                                                <?php
                                                get_exchange_coin();
                                                function get_exchange_coin()
                                                {
                                                    $con = conn();
                                                    $sql_ex_coin = "select coin_id, coin_name, coin_amount, currency, img_coin from tbl_coin_data";
                                                    $rs_sql_ex_coin = mysqli_query($con, $sql_ex_coin);
                                                    $c_name = '';
                                                    $c_id = '';
                                                    $i=0;
                                                    echo "<select name='exchan_coin' id='mySelect' class='scl-coin-toex' onchange='sclCoin($i)'>";
                                                    if (mysqli_num_rows($rs_sql_ex_coin) > 0) {
                                                        while ($c_data = mysqli_fetch_assoc($rs_sql_ex_coin)) {
                                                            $i += 1;
                                                            $c_id = $c_data["coin_id"];
                                                            $c_name = $c_data["coin_name"];
                                                            echo "<option class='opt-scl-coin' value='$c_name' id='optPrice$i'>$c_name</option>";
                                                        }
                                                    } else {
                                                        echo "";
                                                    }
                                                    echo "</select>";
                                                }
                                                ?>
                                        </div>
                                        <div class="ar-frm-wrap-inp-data">
                                            <p>ระบุจำนวนเงินที่ต้องเเลกเปลี่ยน:</p>
                                            <input type="text" name="inp_money" id="" class="inp-np-mon" placeholder="ระบุยอดเงินที่ต้องการจ่าย">
                                        </div>
                                        <div class="ar-frm-wrap-inp-data">
                                            <p>ราคาเหรียญ:</p>
                                            <input type="text" name="inp_coin_price" value="" id="coinPrice" class="inp-np-mon">
                                            <input type="text" name="coin_name" value="" id="coinName" style="display:none;">
                                        </div>
                                        <div class="ar-frm-wrap-inp-data">
                                            <input type="submit" value="เเลกเปลี่ยน" id="formValue" name="btnexchan" class="btn-exchan-coin">
                                        </div>
                                        <?php
                                        $con = conn();
                                        $get_my_mon = "select money from bank_account where u_id=$u_id";
                                        @$btn_exchan = $_GET["btnexchan"];
                                        @$currency = $_GET["currency_exchan_coin"];
                                        @$coin_id = $_GET["exchan_coin"];
                                        @$inp_money = $_GET["inp_money"];
                                        @$coin_name = $_GET["coin_name"];
                                        $inp_coin_price = 1;
                                        if (isset($btn_exchan)) {
                                            @$inp_coin_price = $_GET["inp_coin_price"];
                                            $ex_mon_in_acc = mysqli_query($con, $get_my_mon);
                                            $my_mon_data = mysqli_fetch_assoc($ex_mon_in_acc);
                                            $money = $my_mon_data["money"];
                                            /* echo "money:", $money, "<br>";
                                            echo "coin_name:", $coin_name, "<br>";
                                            echo "currency:", $currency, "<br>";
                                            echo "coin price:", $inp_coin_price, "<br>";
                                            echo "input money:", $inp_money, "<br>"; */
                                            if ($money < $inp_money) {
                                                echo "ไม่สามารถเเลกเปลี่ยนได้โปรดตรวจสอบยอดเงินของคุณ";
                                            } else {
                                                //ดึง coin id
                                                $sql_get_coin_id = "select coin_id from tbl_coin_data where coin_name='$coin_name'";
                                                $rs_c_name = mysqli_query($con, $sql_get_coin_id);
                                                $bf_coin_id = mysqli_fetch_assoc($rs_c_name);
                                                $get_bf_coin_id = $bf_coin_id["coin_id"];
                                                //echo "Coin id", $get_bf_coin_id, "<br>";
                                                $sql_get_old_coin = "select amount from my_coin where u_id=$u_id and coin_id=$get_bf_coin_id";
                                                $rs_old_coin2 = mysqli_query($con, $sql_get_old_coin);
                                                if ($rs_old_coin2 == true) {
                                                    $total = (floatval($inp_money) / floatval($inp_coin_price));
                                                    $old_coin = mysqli_fetch_assoc($rs_old_coin2);
                                                    if ($old_coin == null) {
                                                        //echo "not found";
                                                        $sql_ins_to_my_coin = "insert into my_coin(u_id,coin_id,price,amount,open_price) values('$u_id','$get_bf_coin_id','$inp_coin_price','$total','$inp_money')";
                                                        $ckk_rs_ins_to_my_coin = mysqli_query($con, $sql_ins_to_my_coin);
                                                        if ($ckk_rs_ins_to_my_coin == true) {
                                                            $upd_my_mon = $money - $inp_money;
                                                            $upd_my_mon = "update bank_account set money='$upd_my_mon' where u_id=$u_id";
                                                            mysqli_query($con, $upd_my_mon);
                                                            echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/wellet_change_coin.php'>";
                                                        } else {
                                                            echo "Error", mysqli_error($con);
                                                        }
                                                    } else {
                                                        //echo "old coin", $old_coin["amount"];
                                                        $new_coin = $old_coin["amount"] + $total;
                                                        //echo "update new coin:", $new_coin;
                                                        $sql_upd_coin_amount = "update my_coin set amount='$new_coin' where u_id=$u_id and coin_id=$get_bf_coin_id";
                                                        $rs_upd_new_coin = mysqli_query($con, $sql_upd_coin_amount);
                                                        if ($rs_upd_new_coin == true) {
                                                            $upd_my_mon = $money - $inp_money;
                                                            $upd_my_mon = "update bank_account set money='$upd_my_mon' where u_id=$u_id";
                                                            mysqli_query($con, $upd_my_mon);
                                                            echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/wellet_change_coin.php'>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>
                                <div class="ar-form-ex-chan-right">
                                    <table class="tbl-compare-coin">
                                        <tr class="tbl-set-border">
                                            <th class="tbl-set-border">Coin</th>
                                            <th class="tbl-set-border">Price</th>
                                            <th class="tbl-set-border">Amount</th>
                                            <th class="tbl-set-border">Total</th>
                                        </tr>
                                        <?php
                                        get_all_coin_data();
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../javascript/wellet.js"></script>

</html>