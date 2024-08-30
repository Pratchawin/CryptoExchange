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

    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>

<body class="wallet-set-bg">
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
        <div class="ar-dottrade-content-top">
            <div class="ar-wellet-container">
                <div class="ar-wallet-content">
                    <div class="wallet-bx-content-2">
                        <div class="ar-dtt-title">
                            <p class="ar-wellet-title-size">Wallet</p>
                        </div>
                        <div class="ar-wallet-total-top">
                            <p class="wallet-total-price">มูลค่าทั้งหมด</p>
                        </div>
                        <div class="ar-wallet-content2">
                            <div class="ar-show-btc-wall">
                                <p class="conv-money-to-btc-coin">
                                    0.064500000 BTC
                                </p>
                                <p class="conv-money-to-btc-coin-thb">
                                    =51,535.5 THB
                                </p>
                            </div>
                            <div class="ar-show-thb-wall">
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
                                    <th class="wallet-coin-inorder">In order</th>
                                    <th class="wallet-coin-price">Price</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="wallet-coin-tr-coin set-wall-tr-txt">XRP</td>
                                    <td class="wallet-coin-tr-amount set-wall-tr-txt">11.96000000</td>
                                    <td class="wallet-coin-tr-total-coin set-wall-tr-txt">0 XRP</td>
                                    <td class="wallet-coin-tr-total-price set-wall-tr-txt">150.33 THB</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="wallet-coin-tr-coin set-wall-tr-txt">ENS</td>
                                    <td class="wallet-coin-tr-amount set-wall-tr-txt">5.96000000</td>
                                    <td class="wallet-coin-tr-total-coin set-wall-tr-txt">0 ENS</td>
                                    <td class="wallet-coin-tr-total-price set-wall-tr-txt">2,175 THB</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="wallet-coin-tr-coin set-wall-tr-txt">BTC</td>
                                    <td class="wallet-coin-tr-amount set-wall-tr-txt">0.00851428</td>
                                    <td class="wallet-coin-tr-total-coin set-wall-tr-txt">0 BTC</td>
                                    <td class="wallet-coin-tr-total-price set-wall-tr-txt">5,960 THB</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="wallet-coin-tr-coin set-wall-tr-txt">ENJ</td>
                                    <td class="wallet-coin-tr-amount set-wall-tr-txt">980.00000000</td>
                                    <td class="wallet-coin-tr-total-coin set-wall-tr-txt">0 ENJ</td>
                                    <td class="wallet-coin-tr-total-price set-wall-tr-txt">19,600 THB</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="wallet-coin-tr-coin set-wall-tr-txt">APE</td>
                                    <td class="wallet-coin-tr-amount set-wall-tr-txt">100.00000000</td>
                                    <td class="wallet-coin-tr-total-coin set-wall-tr-txt">0 APE</td>
                                    <td class="wallet-coin-tr-total-price set-wall-tr-txt">23,500 THB</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="ar-wallet-content-history">
                    <div class="wallet-bx-content-2">
                        <div class="ar-dtt-title">
                            <p class="ar-wellet-title-size">History</p>
                            <p class="ar-wellet-his-size">ประวัติการทำธุรกรรม</p>
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
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                                <tr>
                                    <td class="wellet-his-td-data">24/10/2022</td>
                                    <td class="wellet-his-td-data">btc</td>
                                    <td class="wellet-his-td-data">0.500000 BTC</td>
                                    <td class="wellet-his-td-data">350,000 บาท</td>
                                    <td class="wellet-his-td-data">875</td>
                                    <td class="wellet-his-td-data">0.471790</td>
                                </tr>
                            </table>
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