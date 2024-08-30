<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOTTRADE</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/navtop.css">
    <link rel="stylesheet" href="style/footer.css">
</head>

<body>
    <div class="ar-dottrade-crypto-container">
        <div class="ar-dottrade-nav-top">
            <div class="ar-dottrade-nav-top-logo">
                <div class="dottrade-logo">
                    <a href="index.php" class="dottrade-logo-link"><h1>DOT TRADE</h1></a>
                </div>
            </div>
            <div class="ar-dtt-navtop-link">
                <div class="ar-navtop-link-list">
                    <a href="webpage/markets.php" class="dottrade-link-navtop">Markets</a>
                </div>
                <div class="ar-navtop-link-list">
                    <a href="webpage/trade.php?coin_name=BTC&coin_id=29" class="dottrade-link-navtop">Trade</a>
                </div>
                <div class="ar-navtop-link-list">
                    <a href="webpage/news.php" class="dottrade-link-navtop">News</a>
                </div>
                <div class="ar-nav-top-white-space">

                </div>
                <div class="ar-dottrade-user-status">
                    <a href="webpage/wellet.php" class="dottrade-link-navtop">Wellet</a>
                </div>
                <div class="ar-dottrade-user-status">
                    <a href="webpage/deposit.php" class="dottrade-link-navtop">Deposit</a>
                </div>
                <div class="ar-dottrade-user-status">
                    <a class="dottrade-link-navtop" href="webpage/history.php">History</a>
                </div>
                <div class="ar-dottrade-user-status">
                    <a href="webpage/setting.php" class="dottrade-link-navtop">Setting</a>
                </div>
                <div class="ar-dottrade-user-status">
                    <a href="webpage/login.php" class="dottrade-link-navtop">Login</a>
                </div>
            </div>
        </div>
        <div class="ar-dottrade-content-top">
            <div class="ar-dottrade-bg-color">
                <div class="ar-webtrade-content-top">
                    <div class="ar-dottrade-content-txt">
                        <p class="ctn-txt-title-set-color">DOT TRADE เว็บไซต์ซื้อขาย Cryptocurrency
                            ที่มีจำนวนเหรียญมากที่สุด ที่จะเข้ามาเปลี่ยนรูปแบบการชำระเงินของคุณให้เปลี่ยนไป</p>
                        <button class="btn-trade-now ind-set-font-size"><a href="webpage/trade.php?coin_name=BTC&coin_id=29" style="color: white; text-decoration:none;">Trade now</a></button>
                    </div>
                    <div class="ar-dottrade-content-image">
                        <img src="image_file/01.png" alt="" class="dottrade-pc-mobile-trade">
                    </div>
                </div>
                <div class="ar-show-top-coin-btc-eth-ustd">
                    <div class="show-top-coin-bx-list">
                        <table>
                            <tr>
                                <td id="btcsymbol" class="ind-td-price-title">BTC</td>
                                <td id="btclastprice" class="ind-td-price-title"></td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">Change:</td>
                                <td id="btcchange" class="ind-td-price">5000</td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">24h High:</td>
                                <td id="btc24h" class="ind-td-price">5000</td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">24h Low:</td>
                                <td id="btc24l" class="ind-td-price">5000</td>
                            </tr>
                        </table>
                    </div>
                    <div class="show-top-coin-bx-list">
                        <table>
                            <tr>
                                <td id="glmsymbol" class="ind-td-price-title">LRC</td>
                                <td id="glmlastprice" class="ind-td-price-title"></td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">Change:</td>
                                <td id="glmchange" class="ind-td-price">5000</td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">24h High:</td>
                                <td id="glm24h" class="ind-td-price">5000</td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">24h Low:</td>
                                <td id="glm24l" class="ind-td-price">5000</td>
                            </tr>
                        </table>
                    </div>
                    <div class="show-top-coin-bx-list">
                        <table>
                            <tr>
                                <td id="ethsymbol" class="ind-td-price-title">ETH</td>
                                <td id="ethlastprice" class="ind-td-price-title"></td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">Change:</td>
                                <td id="ethchange" class="ind-td-price">5000</td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">24h High:</td>
                                <td id="eth24h" class="ind-td-price">5000</td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">24h Low:</td>
                                <td id="eth24l" class="ind-td-price">5000</td>
                            </tr>
                        </table>
                    </div>
                    <div class="show-top-coin-bx-list">
                        <table>
                            <tr>
                                <td id="ltcsymbol" class="ind-td-price-title">LTC</td>
                                <td id="ltclastprice" class="ind-td-price-title"></td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">Change:</td>
                                <td id="ltcchange" class="ind-td-price">5000</td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">24h High:</td>
                                <td id="ltc24h" class="ind-td-price">5000</td>
                            </tr>
                            <tr>
                                <td class="ind-td-price">24h Low:</td>
                                <td id="ltc24l" class="ind-td-price">5000</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="ar-dottrade-container">
            <div class="ar-dottrade-content">
                <div class="ind-bx-content-1">
                    <div class="ar-dtt-title">
                        <p class="ar-dtt-set-font-size">DOT TRADE</p>
                    </div>
                    <div class="ar-dottrade-content">
                        <ul>
                            <li class="li-dtt-content-list">เว็บไซต์ซื้อขาย cryptocurrencies ที่มากที่สุด</li>
                            <li class="li-dtt-content-list">สามารถเทรดได้ตลอด 24 ชั่วโมง</li>
                            <li class="li-dtt-content-list">มีระบบการเทรดที่มีเครื่องมือในการวิเคราะห์กราฟ</li>
                        </ul>
                    </div>
                </div>
                <div class="ind-bx-content-2">
                    <div class="ar-dtt-title">
                        <p class="ar-dtt-set-font-size">Popular cryptocurrencies</p>
                    </div>
                    <div class="ar-dtt-content">
                        <table class="tbl-ind-show-market-cap">
                            <tr>
                                <th class="tbl-dtt-ind-th ind-set-font-size cnn-name">Name</th>
                                <th class="tbl-dtt-ind-th ind-set-font-size th-cnn-last-price">Last Price</th>
                                <th class="tbl-dtt-ind-th ind-set-font-size ">24h Change</th>
                                <th class="tbl-dtt-ind-th ind-set-font-size th-cnn-market-cap">Market Cap</th>
                            </tr>
                        </table>
                        <table class="tbl-ind-show-market-cap" id="tbl_main_coin">

                        </table>
                        <div class="ar-see-more">
                            <a href="" class="link-see-more">ดูเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                <div class="ind-bx-content-3">
                    <div class="ar-dtt-title">
                        <p class="ar-dtt-set-font-size">วิธีการซื้อขายเหรียญคริปโต</p>
                    </div>
                    <div class="ar-dtt-content">
                        <div class="ar-show-yt-video-and-txt">
                            <div class="dtt-show-video">
                                <iframe width="500" height="345" src="https://www.youtube.com/embed/1sPV1PK55X8">
                                </iframe>
                            </div>
                            <div class="dtt-video-txt">
                                <p class="dtt-video-title"></p>
                                <p class="ind-set-font-size video-set-margin">1. สมัครสมาชิกกับ Dottrade เเละยืนยันตัวตน
                                </p>
                                <p class="ind-set-font-size video-set-margin">2. รอการยืนยันตัวตนจากบริษัท</p>
                                <p class="ind-set-font-size video-set-margin">3. เพิ่มบัญชีธนาคารที่ใช้ทำธุรกรรมทางการเงิน</p>
                                <p class="ind-set-font-size video-set-margin">4. เติมเงินเข้า Wallet</p>
                                <p class="ind-set-font-size video-set-margin">5. เลือกสกุลเงินดิจิตอลที่ชื่นชอบ</p>
                                <p class="ind-set-font-size video-set-margin">6. เริ่มทำการซื้อ-ขาย</p>
                                <p class="ind-set-font-size video-set-margin">7. ถอนเงินเข้าบัญชี</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ind-bx-content-3">
                    <div class="ar-dtt-title">
                        <p class="ar-dtt-set-font-size">What is Bitcoin </p>
                    </div>
                    <div class="ar-dtt-content">
                        <div class="ar-show-yt-video-and-txt">
                            <div class="dtt-video-txt2">
                                <p class="ind-set-font-size video-set-margin">
                                    บิตคอยน์ (Bitcoin) หรือ BTC คือสกุลเงินดิจิทัล (Cryptocurrency)
                                    สกุลแรกของโลกที่ถูกสร้างขึ้นบน “บล็อกเชน” (Blockchain)
                                    ซึ่งเป็นเทคโนโลยีที่ใช้สำหรับตรวจสอบธุรกรรมใด ๆ ที่เกี่ยวข้องกับบิตคอยน์
                                    หัวใจของบิตคอยน์คือ “การกระจายศูนย์” (Decentralized)
                                    ที่ปราศจากการควบคุมจากตัวกลางหรือการกำกับดูแลของรัฐบาลและธนาคารใด ๆ

                                    ธุรกรรมที่เกี่ยวข้องกับบิตคอยน์แต่ละรายการถูกบันทึกไว้ในบัญชีแยกประเภทแบบกระจายศูนย์
                                    ทำให้ธุรกรรมใด ๆ ยากที่จะย้อนกลับ ดัดแปลง หรือทำลายทิ้ง

                                    ปัจจุบันบิตคอยน์มีมูลค่าและส่วนแบ่งตลาดสูงที่สุดในตลาดคริปโตฯ
                                    ด้วยปริมาณการซื้อขายอย่างมหาศาลในแต่ละวัน

                                    จำนวนบิตคอยน์มีอยู่จำกัดที่ประมาณ 21 ล้านเหรียญ ซึ่งล่าสุด ณ เดือนกุมภาพันธ์ 2022
                                    บิตคอยน์ถูกขุดไปแล้วกว่า 18.97 ล้านเหรียญ หรือราว 90% ของจำนวนบิตคอยน์ทั้งหมด
                                    โดยคาดว่าบิตคอยน์จะถูกขุดหมดประมาณปี 2140
                                </p>
                            </div>
                            <div class="dtt-show-video-right">
                                <iframe width="500" height="345" src="https://www.youtube.com/embed/2dDIBUVVWGE">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ar-dottrade-footer-content">
            <div class="ar-dtt-footer">
                <div class="ar-footer-title">
                    <h1 class="footer-set-font">Footer</h1>
                </div>
                <div class="ar-footer-content">

                </div>
            </div>
        </div>
    </div>
</body>
<script src="javascript/index.js"></script>

</html>