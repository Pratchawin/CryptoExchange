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
    <link rel="stylesheet" href="../style/news.css">
    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>
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
            <div class="ar-wellet-container">
                <div class="ar-wallet-content-history">
                    <div class="wallet-bx-content-2">
                        <div class="ar-dtt-title">
                            <p class="ar-wellet-his-size">ข้อมูลข่าวสารประจำวัน</p>
                        </div>
                        <div class="ar-news-list">
                            <?php
                                include "../conn/con_db.php";
                                $conn=conn();
                                $sql_get_news_list="select news_id,title,link,detail,img_file,date_add from news_data";
                                $rs_data=mysqli_query($conn, $sql_get_news_list);
                                if(mysqli_num_rows($rs_data)>0){
                                    while($news_data=mysqli_fetch_assoc($rs_data)){
                                        echo "
                                            <div class='bx-news-img-and-desc'>
                                                <a href='".$news_data["link"]."' class='set-link-inpage'>
                                                    <div class='news-img-bx'>
                                                        <img src='../news_img/".$news_data["img_file"]."' alt='' class='news-img'>
                                                    </div>
                                                    <div class='news-detail'>
                                                        <p class='news-title'>".$news_data["title"]."</p>
                                                        <p class='new-details'>".$news_data["detail"]."</p>
                                                    </div>
                                                </a>
                                            </div> 
                                        ";
                                    }
                                }
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
<script src="../javascript/market.js"></script>

</html>