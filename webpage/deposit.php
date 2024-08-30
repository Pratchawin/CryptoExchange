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
                <div class="ar-wallet-content-history">
                    <div class="wallet-bx-content-3">
                        <div class="ar-dtt-title">
                            <p class="ar-wellet-title-size">Deposit</p>
                            <p class="ar-wellet-his-size">ขั้นตอนการฝากเงิน</p>
                        </div>
                        <div class="ar-deposit-set-content">
                            <div class="ar-how-to-deposit-monney">
                                <p class="step-deposit-monney">1.ท่านจะต้องสมัครสมาชิกเเละยืนยันตัวตน</p>
                                <p class="step-deposit-monney">2.ท่านสามารถฝากถอนเงินได้ผ่าน Paypal</p>
                                <p class="step-deposit-monney">3.สามารถใช้บัตรเครดิตได้</p>
                                <p class="step-deposit-monney">4.ระบุจำนวนเงินที่ต้องการฝาก</p>
                                <p class="step-deposit-monney">5.ทำการยืนยันการฝากเงิน</p>
                                <p class="step-deposit-monney">6.รอเงินเข้าสู่ระบบ</p>
                            </div>
                            <div class="ar-show-paypal-app">
                                <div class="ar-set-payment-bx">
                                    <div id="smart-button-container">
                                        <div class="ar-show-btn-deposit">
                                            <button class="btn-deposit-coin"><a href="deposit.php?ckk_login=false" class="a-link-deposit">กดเพื่อฝากเงิน</a></button>
                                        </div>
                                        <div style="text-align: center;">
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </div>
                                    <script id="paypal-button-container" src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=THB" data-sdk-integration-source="button-factory"></script>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="deposit-user-auten">
                            <p class="set-font-size">ขั้นตอนการยืนยันตัวตนมีดังนี้</p>
                            <p class="step-deposit-monney">1.ต้องสมัครสมาชิกกับ DOTTRADE</p>
                            <p class="step-deposit-monney">2.ทำการยืนยันตัวตนด้วยบัตรประชาชนเเละสำเนาทะเบียนบ้าน</p>
                            <p class="step-deposit-monney">3.เมื่อส่งข้อมูลเเล้วรอการยืนยันจาก DOTTRADE ภายใน 3-7 วัน</p>
                            <p class="step-deposit-monney">4.ระบุบัญชี Paypal ที่ใช้ในการทำธุรกรรม</p>
                            <p class="step-deposit-monney">5.ทำการฝากเงินเข้าบัญชี</p>
                            <p class="step-deposit-monney">6.สามารถซื้อขายเเลกเปลี่ยนสกุลเงิน</p>
                            <p class="step-deposit-monney">7.เมื่อทำการถอนเงินจะได้รับเงินคืนภายใน 1-7 วัน</p>
                            <p class="step-deposit-monney">8.หากมีปัญหาเกิดขึ้นกรุณาโปรดติดต่อทางเจ้าหน้าที่</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../javascript/market.js"></script>
</html>
<?php
    @$ckk_login=$_GET["ckk_login"];
    if(isset($ckk_login)){
        if(ckk_login_deposit($u_id)){
            if(ckk_user_identity_verification($u_id)){
                echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/paypal_page.php?u_id=123'>";
            }else{
                echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/setting.php'>";
            }
        }else{
            echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/login.php'>";
        }
    }
?>