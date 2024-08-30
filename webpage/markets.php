<!DOCTYPE html>
<html lang="en">
<?php
session_start();
@$full_name = $_SESSION["full_name"];
@$u_id = $_SESSION["u_id"];
?>
<?php
include '../built_in_func/ckk_login.php';
include '../conn/con_db.php';
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
</head>

<body>
    <div class="ar-dottrade-crypto-container">
        <div class="ar-dottrade-nav-top">
            <div class="ar-dottrade-nav-top-logo">
                <div class="dottrade-logo">
                    <a href="../index.php" class="dottrade-logo-link"><h1>DOT TRADE</h1></a>
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
        <div class="ar-dottrade-container">
            <div class="ar-dottrade-content">
                <div class="ind-bx-content-2">
                    <div class="ar-dtt-title">
                        <p class="ar-dtt-set-font-size">Markets</p>
                    </div>
                    <div class="ar-market-link-top">
                        <a href="" class="market-link-list">All coin</a>
                        <a href="" class="market-link-list">Metavers</a>
                    </div>
                    <div class="ar-dtt-content">
                        <table class="tbl-ind-show-market-cap">
                            <tr>
                                <th></th>
                                <th class="tbl-dtt-ind-th ind-set-font-size market-set-tbl-title cnn-name">Coin</th>
                                <th class="tbl-dtt-ind-th ind-set-font-size market-set-tbl-title cnn-last-price">Last Price</th>
                                <th class="tbl-dtt-ind-th ind-set-font-size market-set-tbl-title cnn-24change">24h Change</th>
                                <th class="tbl-dtt-ind-th ind-set-font-size market-set-tbl-title cnn-market-cap">Volumn</th>
                                <th class="tbl-dtt-ind-th ind-set-font-size market-set-tbl-title market-oth-btn">#</th>
                            </tr><!-- 
                            <tr class="tr-dtt-ind-set-margin-top">
                                <td class="td-dtt-market-data" id="btcsymbol">BTC</td>
                                <td class="td-dtt-market-data" id="btclastprice">29,000 USTD</td>
                                <td class="td-dtt-market-data" id="btcchange">-5.5%</td>
                                <td class="td-dtt-market-data cnn-market-cap" id="btcvolume">1,000M</td>
                                <td class="td-dtt-market-data cnn-market-trade"><a href="trade.php?coin_name=BTC" class="market-trade">Trade</a></td>
                            </tr> -->
                            <?php
                                $conn=conn();
                                $sql_get_all_coin="select coin_id,coin_name,date_add,open_price,coin_amount,coin_detail,currency,img_coin from tbl_coin_data";
                                $rs_all_coin=mysqli_query($conn,$sql_get_all_coin);
                                $i=0;
                                if(mysqli_num_rows($rs_all_coin)>0){
                                    while($data=mysqli_fetch_assoc($rs_all_coin)){
                                        $coin=$data["coin_name"];
                                        $coin_id=$data["coin_id"];
                                        $coin_img=$data["img_coin"];
                                        $i+=1;
                                        echo "<tr class='tr-dtt-ind-set-margin-top'>
                                        <td class='td-dtt-market-data'><img width='30px' src='../coin_img/$coin_img' alt=''></td>
                                        <td class='td-dtt-market-data' id='btcsymbol$i'>".$data["coin_name"]."</td>
                                        <td class='td-dtt-market-data' id='btclastprice$i'>00000 USTD</td>
                                        <td class='td-dtt-market-data' id='btcchange$i'>0%</td>
                                        <td class='td-dtt-market-data cnn-market-cap' id='btcvolume$i'>0000</td>
                                        <td class='td-dtt-market-data cnn-market-trade'><a href='trade.php?coin_name=$coin&coin_id=$coin_id' class='market-trade'>Trade</a></td>
                                    </tr>";
                                    }
                                }else{
                                    echo "";
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="ind-bx-content-3">
                    

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