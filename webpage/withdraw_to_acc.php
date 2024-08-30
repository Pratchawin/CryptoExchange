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
echo "C_ID:", $get_coin_id;
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
                    <a href="login.php" class="dottrade-link-navtop">Login</a>
                </div>
            </div>
        </div>
        <div class="ar-dottrade-content-top">
            <div class="ar-wellet-container">
                <div class="ar-wallet-content-history">
                    <div class="wallet-bx-content-2">
                        <div class="ar-dtt-title">
                            <p class="ar-wellet-title-size"></p>
                            <p class="ar-wellet-his-size">ถอนเงินเข้าบัญชีธนาคาร</p>
                        </div>
                        <div class="ar-wallet-history-tbl">
                            <div class="ar-show-form-withdraw">
                                <div class="form-withdraw-img-and-inp">
                                    <div class="coin-image">
                                        <?php
                                        include "../conn/con_db.php";
                                        $con = conn();
                                        ?>
                                    </div>
                                    <div class="ar-send-coin-to-oth">
                                        <div class="width-draw-to-bank-acc">
                                            <i class="fa-sharp fa-solid fa-money-bill-wave set-icon-mon"></i>
                                            <?php
                                                $sql_old_mon="select u_id, money from bank_account where u_id=$u_id";
                                                $rs_old_mon=mysqli_query($con, $sql_old_mon);
                                                $data=mysqli_fetch_assoc($rs_old_mon);
                                                echo "<div style='margin-top:10px; font-size:18px;'>ยอดเงิน: ",number_format($data["money"],2)," THB</div>";
                                            ?>
                                        </div>
                                        <form action="withdraw_to_acc.php" style="margin-top:10px;">
                                            <input type="text" style="display: none;" name="coin_id" id="" value="<?php echo $get_coin_id; ?>">
                                            <div>
                                                <p class="send-coin-title">ชื่อ-นามสกุล</p>
                                            </div>
                                            <div class="ar-inp-data">
                                                <input type="text" name="name" id="" class="inp-addr-data" placeholder="ชื่อ-นามสกุล">
                                            </div>
                                            <div class="ar-bx-coin-amount">
                                                <p class="send-coin-title">จำนวนเงิน</p>
                                            </div>
                                            <div class="ar-inp-data">
                                                <input type="text" name="amount" id="" class="inp-addr-data" placeholder="จำนวนเงิน">
                                            </div>
                                            <div class="ar-bx-coin-amount">
                                                <p class="send-coin-title">ชื่อธนาคาร</p>
                                            </div>
                                            <div class="ar-inp-data">
                                                <input type="text" name="bn_name" id="" class="inp-addr-data" placeholder="ชื่อบัญชีธนาคาร">
                                            </div>
                                            <div class="ar-bx-coin-amount">
                                                <p class="send-coin-title">เลขที่บัญชี</p>
                                            </div>
                                            <div class="ar-inp-data">
                                                <input type="text" name="bn_acc" id="" class="inp-addr-data" placeholder="เลขที่บัญชี">
                                            </div>
                                            <div class="ar-btn-send-coin">
                                                <input type="submit" value="ยืนยันการถอนเงิน" class="btn-send-coin" name="btn_conf_withdraw">
                                            </div>
                                            <?php
                                                @$btn_conf=$_GET["btn_conf_withdraw"];
                                                @$name=$_GET["name"];
                                                @$amount=$_GET["amount"];
                                                @$bn_name=$_GET["bn_name"];
                                                @$bn_acc=$_GET["bn_acc"];
                                                if(isset($btn_conf)){
                                                    $sql_old_mon="select u_id, money from bank_account where u_id=$u_id";
                                                    $rs_old_mon=mysqli_query($con, $sql_old_mon);
                                                    $data=mysqli_fetch_assoc($rs_old_mon);
                                                    $old_mon=$data["money"];
                                                    $total_mon=($data["money"]-$amount);
                                                    $ins_to_his="-".$amount;
                                                    //echo "จำนวนติดลบ",$ins_to_his;
                                                    if($amount>$old_mon){
                                                        echo "<p style='text-align:right; margin-right:50px; margin-top:10px;color:red;'>*****ยอดเงินไม่ถูกต้อง*****</p>";
                                                    }else{
                                                        $sql_send_coin="insert into tbl_withdraw(name,amount,bn_acc,u_id,bn_name) values('$name','$amount','$bn_acc','$bn_name','$u_id')";
                                                        $ckk_rs=mysqli_query($con,$sql_send_coin);
                                                        if($ckk_rs==true){
                                                            $sql_upd_mon="update bank_account set money='$total_mon' where u_id=$u_id";
                                                            $ckk_rs_upd_mon=mysqli_query($con, $sql_upd_mon);
                                                            if($ckk_rs_upd_mon==true){
                                                                $sql_ins_to_his="insert into tbl_history(u_id,coin,amount,price,total) values('$u_id','THB','$ins_to_his','$ins_to_his','$ins_to_his')";
                                                                $ckk_error=mysqli_query($con, $sql_ins_to_his);
                                                                if($ckk_error!=true){
                                                                    echo "Error:",mysqli_error($con);
                                                                }
                                                                echo "<p style='text-align:right; margin-right:50px; margin-top:10px;color:green;'>*****โอนเงินเรียบร้อย*****</p>";
                                                                echo "<meta http-equiv='refresh' content='2;url=http://localhost/crypto/webpage/wellet.php'>";
                                                            }else{
                                                                echo "";
                                                            }
                                                        }
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
    </div>
</body>
<script src="../javascript/market.js"></script>

</html>