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
    <link rel="stylesheet" href="../style/trade.css">
</head>
<?php
session_start();
@$full_name = $_SESSION["full_name"];
@$u_id = $_SESSION["u_id"];
@$get_coin_name = $_GET["coin_name"];
@$get_coin_id = $_GET["coin_id"];
/* echo "C_NAME:",$get_coin_name;
echo "C_ID:",$get_coin_id; */
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

<body>
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
                <?php
                show_btn_logout();
                ?>
            </div>
        </div>
        <div class="ar-dottrade-content-top">
            <div class="ar-trade-show-all-data">

            </div>
        </div>
        <div class="ar-dot-trade-area-container">
            <div class="ar-dottrade-grf">
                <div class="ar-dottrade-content-left">
                    <div class="ar-dottrade-bid-list">
                        <table class="ar-tbl-dottrade-left">
                            <tr>
                                <th class="dottrade-set-border set-th-trade-price">Price</th>
                                <th class="dottrade-set-border set-th-trade-amount">Amount</th>
                                <th class="dottrade-set-border set-th-trade-total">Total</th>
                            </tr>
                            <?php
                            include "../conn/trade.php";
                            show_buy_order($get_coin_id);
                            ?>
                        </table>
                    </div>
                    <div class="ar-show-current-price">
                        <p class="show-current-price-set-txt" id="show_btc_price"></p>
                    </div>
                    <div class="ar-dottrade-ask-list">
                        <table class="ar-tbl-dottrade-left">
                            <tr>
                                <th class="dottrade-set-border set-th-trade-price">Price</th>
                                <th class="dottrade-set-border set-th-trade-amount">Amount</th>
                                <th class="dottrade-set-border set-th-trade-total">Total</th>
                            </tr>
                            <?php
                            show_sell_order($get_coin_id);
                            ?>
                        </table>
                    </div>
                </div>
                <div class="ar-dottrade-content-center">
                    <div class="ar-show-trade-title">
                        <div class="trade-title-list">
                            <p style="display: none;" id='get_coin_name2'><?php echo $get_coin_name; ?></p>
                            <p><?php echo $get_coin_name; ?>/USD</p>
                            <p id='c_price_usd'>29,999</p>
                        </div>
                        <div class="trade-title-list">
                            <p><?php echo $get_coin_name; ?>/THB</p>
                            <p id="c_price_thb">฿800,000</p>
                        </div>
                        <div class="trade-title-list">
                            <p>24h Change</p>
                            <p id="p_chang"></p>
                        </div>
                        <div class="trade-title-list">
                            <p>24h Hight</p>
                            <p id="hight_price">30,000 USTD</p>
                        </div>
                        <div class="trade-title-list">
                            <p>24h Low</p>
                            <p id="low_price">28,000 USTD</p>
                        </div>
                        <div class="trade-title-list">
                            <p>24h Volumn</p>
                            <p id="c_volume">1,000M</p>
                        </div>
                    </div>
                    <div class="ar-show-graf-content">
                        <div class="set-graf">
                            <div class="tradingview-widget-container">
                                <div id="tradingview_74048" style="height: 310px;"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BITFINEX-IOTUSD/" rel="noopener" target="_blank"><span class="blue-text"><?php echo $get_coin_name; ?> Chart</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                <script type="text/javascript">
                                    new TradingView.widget({
                                        "autosize": true,
                                        "symbol": "BINANCE:<?php echo $get_coin_name ?>USD",
                                        "interval": "D",
                                        "timezone": "Europe/Zurich",
                                        "theme": "light",
                                        "style": "1",
                                        "locale": "en",
                                        "toolbar_bg": "#f1f3f6",
                                        "enable_publishing": false,
                                        "hide_side_toolbar": false,
                                        "allow_symbol_change": true,
                                        "studies": [],
                                        "container_id": "tradingview_74048"
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="ar-show-spot-link-content">
                        <a href="" class="link-ctn-show-spot-link">Spot</a>
                    </div>
                    <div class="ar-show-spot-title">
                        <a href="" class="trade-limit-title">Limit</a>
                        <a href="" class="trade-limit-title">Market</a>
                    </div>
                    <div class="ar-show-ar-buy-and-sele-content">
                        <div class="ar-buy-coin-bx">
                            <form action="trade.php" method="GET">
                                <div class="ar-show-account-balance set-inline-bx">
                                    <p class="acc-balance-txt">THB</p>
                                    <p class="mon-ney-inacc">ยอดเงินที่มีในบัญชี
                                        <?php
                                        $conn_db = conn();
                                        echo number_format(get_money_in_account($u_id), 2);
                                        $my_money = get_money_in_account($u_id);
                                        ?> บาท
                                    </p>
                                </div>
                                <div class="ar-bx-buy-coin">
                                    <input type="text" name="buy_coin_price" class="set-inp-buy-coin-price" id="" placeholder="price">
                                    <input type="text" name="coin_name" value="<?php echo $get_coin_name; ?>" style="display:none;" />
                                    <input type="text" name="coin_id" value="<?php echo $get_coin_id; ?>" style="display:none;" />
                                    <input type="text" name="my_mon" value="<?php echo $my_money; ?>" style="display:none;" />
                                </div>
                                <div class="ar-bx-buy-coin">
                                    <input type="text" name="coin_price" style="display: none;" id="btc_inp_price" placeholder="btc price">
                                </div>
                                <div class="ar-bx-sale-coin">
                                    <input type="text" name="amount" class="set-inp-buy-coin-amount" id="" placeholder="coin price">
                                </div>
                                <div class="ar-bc-buy-show-total">
                                    <p><?php echo $get_coin_name; ?></p>
                                </div>
                                <div class="ar-set-btn-buy-coin">
                                    <input type="submit" value="Buy" class="btn-buy-coin" name="btn_buy_coin">

                                </div>
                                <?php
                                if (isset($_GET["btn_buy_coin"])) {
                                    @$price = $_GET["buy_coin_price"];
                                    @$coin_amount = $_GET["amount"];
                                    @$now_price = $_GET["coin_price"];
                                    @$mymon = $_GET["my_mon"];
                                    $con=conn();
                                    //เพิ่มไปยังตารางสำเร็จ
                                    date_default_timezone_set("America/New_York");
                                    $create_time=date("h:i:sa");
                                    $new_amount=($price/721311);
                                    $sql_seccess_tran = "insert into tbl_tran_succ(coin_id,price,amount, time_succ) values('$get_coin_id','$now_price','$new_amount','$create_time')";
                                    $ckk_trans = mysqli_query($con, $sql_seccess_tran);
                                    if ($ckk_trans == true) {
                                        echo "success==>>>>>>";
                                    } else {
                                        echo "Error", mysqli_error($con);
                                    }
                                    if ($price <= "0" or $now_price <= "0") {
                                        echo "จำนวนเงินไม่ถูกต้อง";
                                    } else {
                                        buy_coin($u_id, $get_coin_id, $coin_amount, $price, $now_price, $mymon);
                                        echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/trade.php?coin_name=$get_coin_name&coin_id=$get_coin_id'>";
                                    }
                                }
                                ?>
                            </form>
                        </div>
                        <div class="ar-sale-coin-bx">
                            <form action="trade.php" method="GET">
                                <div class="ar-show-account-balance set-inline-bx">
                                    <p class="acc-balance-txt"><?php echo $get_coin_name; ?></p>
                                    <p class="mon-ney-inacc2">
                                        <?php
                                        $conn_db = conn();
                                        $coin_in_wel = get_coin_in_wellet($u_id, $get_coin_id);
                                        echo $coin_in_wel;
                                        ?>
                                    </p>
                                </div>
                                <div class="ar-bx-buy-coin">
                                    <input type="text" name="amount" class="set-inp-buy-coin-price" id="" placeholder="amount">
                                    <input type="text" name="coin_name" value="<?php echo $get_coin_name; ?>" style="display:none;" />
                                    <input type="text" name="coin_id" value="<?php echo $get_coin_id; ?>" style="display:none;" />
                                    <input type="text" name="my_mon" value="<?php echo $my_money; ?>" style="display:none;" />
                                </div>
                                <div class="ar-bx-sale-coin">
                                    <input type="text" name="sell_price" class="set-inp-buy-coin-amount" id="" placeholder="price">
                                </div>
                                <div class="ar-bc-buy-show-total">
                                    <p>THB</p>
                                </div>
                                <div class="ar-set-btn-sale-coin">
                                    <input type="submit" value="Sell" name="btn_sell_coin" class="btn-sale-coin">
                                </div>
                            </form>
                            <?php
                            if (isset($_GET["btn_sell_coin"])) {
                                $num_coin = $_GET["amount"];
                                $sell = $_GET["sell_price"];
                                $my_coin = get_coin_in_wellet($u_id, $get_coin_id);
                                sell_coin($u_id, $num_coin, $sell, $get_coin_id, $coin_in_wel, $my_coin);
                                echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/trade.php?coin_name=$get_coin_name&coin_id=$get_coin_id'>";
                            }
                            ?>
                        </div>
                    </div>

                </div>
                <div class="ar-dottrade-content-right">
                    <div class="ar-show-coin-list">
                        <table class="ar-tbl-right-show-other-coin">
                            <tr>
                                <th class="dottrade-set-border set-th-trade-price">Coin</th>
                                <th class="dottrade-set-border set-th-trade-amount">Price</th>
                                <th class="dottrade-set-border set-th-trade-total">Change</th>
                            </tr>
                        </table>
                        <table class="ar-tbl-right-show-other-coin" id="tbl_main_coin">
                            <tr>
                                <th class="dottrade-set-border set-th-trade-price">Coin</th>
                                <th class="dottrade-set-border set-th-trade-amount">Price</th>
                                <th class="dottrade-set-border set-th-trade-total">Change</th>
                            </tr>
                        </table>
                    </div>
                    <div class="ar-merket-overview">
                        <p class="show-market-overview-set-txt">Market</p>
                    </div>
                    <div class="merket-over-view">
                        <table class="ar-tbl-right-show-other-coin">
                            <tr>
                                <th class="dottrade-set-border set-th-trade-price">Price</th>
                                <th class="dottrade-set-border set-th-trade-amount">Amount</th>
                                <th class="dottrade-set-border set-th-trade-total">Time</th>
                            </tr>
                            <?php
                                $con=conn();
                                $sql_get_succ_tran="select price, amount, time_succ from tbl_tran_succ where coin_id=$get_coin_id";
                                $rs_success=mysqli_query($con, $sql_get_succ_tran);
                                if(mysqli_num_rows($rs_success)>0){
                                    while($trans=mysqli_fetch_assoc($rs_success)){
                                        echo "
                                            <tr>
                                                <td class='tr-ask-set-trade-price'>".$trans["price"]."</td>
                                                <td class='tr-ask-set-trade-amount'>".$trans["amount"]."</td>
                                                <td class='tr-ask-set-trade-total'>".$trans["time_succ"]."</td>
                                            </tr>
                                        ";
                                    }
                                }else{
                                    echo "";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="ar-dottrade-footer-ctn">

        </div>
    </div>
</body>
<script src="../javascript/trade.js"></script>

</html>