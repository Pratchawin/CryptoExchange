<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/dashboard.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>
<?php
include '../conn/con_db.php';
?>

<body>
    <div class="ar-dash-container">
        <div class="dash-navleft">
            <div class="ar-bx-list">
                <div class="bx-link-oth-page">
                    <div class="dash-link-icon">
                        <p class="dash-link-oth-page"><i class="fa-solid fa-house ds-set-font-size"></i></p>
                    </div>
                    <div class="dash-link-oth-page">
                        <a href="dashboard.php" class="dash-link-oth-page">Dashboard</a>
                    </div>
                </div>
                <div class="bx-link-oth-page">
                    <div class="dash-link-icon">
                        <p class="dash-link-oth-page"><i class="fa-regular fa-clock ds-set-font-size"></i></p>
                    </div>
                    <div class="dash-link-oth-page">
                        <a href="dashboard/dash_new_user.php" class="dash-link-oth-page">รอยืนยัน</a>
                    </div>
                </div>
                <div class="bx-link-oth-page">
                    <div class="dash-link-icon">
                        <p class="dash-link-oth-page"><i class="fa-brands fa-bitcoin ds-set-font-size"></i></p>
                    </div>
                    <div class="dash-link-oth-page">
                        <a href="dashboard/add_new_coin.php" class="dash-link-oth-page">เพิ่มเหรียญ Crypto</a>
                    </div>
                </div>
                <div class="bx-link-oth-page">
                    <div class="dash-link-icon">
                        <p class="dash-link-oth-page"><i class="fa-solid fa-list ds-set-font-size"></i></p>
                    </div>
                    <div class="dash-link-oth-page">
                        <a href="dashboard/user_list.php" class="dash-link-oth-page">รายชื่อผู้ใช้</a>
                    </div>
                </div>
                <div class='bx-link-oth-page'>
                    <div class='dash-link-icon'>
                        <p class='dash-link-oth-page'><i class='fa-solid fa-down-long ds-set-font-size'></i></p>
                    </div>
                    <div class='dash-link-oth-page'>
                        <a href='dashboard/coin_list.php' class='dash-link-oth-page'>เหรียญในระบบ</a>
                    </div>
                </div>
                <div class='bx-link-oth-page'>
                    <div class='dash-link-icon'>
                        <p class='dash-link-oth-page'><i class='fa-sharp fa-solid fa-upload ds-set-font-size'></i></p>
                    </div>
                    <div class='dash-link-oth-page'>
                        <a href='dashboard/upload_news.php' class='dash-link-oth-page'>อัปโหลดข้อมูลข่าวสาร</a>
                    </div>
                </div>
                <div class='bx-link-oth-page'>
                    <div class='dash-link-icon'>
                        <p class='dash-link-oth-page'><i class='fa-sharp fa-solid fa-newspaper ds-set-font-size'></i></p>
                    </div>
                    <div class='dash-link-oth-page'>
                        <a href='dashboard/news_all.php' class='dash-link-oth-page'>ข่าวสาร</a>
                    </div>
                </div>
                <div class='bx-link-oth-page'>
                <div class='dash-link-icon'>
                    <p class='dash-link-oth-page'><i class='fa-sharp fa-solid fa-money-bill ds-set-font-size'></i></p>    
                </div>
                <div class='dash-link-oth-page'>
                    <a href='dashboard/withdraw.php' class='dash-link-oth-page'>ร้องขอถอนเงิน</a>
                </div>
            </div>
            </div>
        </div>
        <div class="dash-content">
            <div class="dash-top-link">
                <div class="ar-dash-top-manue">
                    <div class="ar-manue-list">
                        <p>Admin</p>
                    </div>
                    <div class="ar-manue-list">
                        <a href="../webpage/login.php">Logout</a>
                    </div>
                </div>
                <div class="ar-dash-content">
                    <div class="dash-content-list">
                        <div class="ar-dash-title">
                            <h3>Dashboard</h3>
                        </div>
                        <div class="ar-dash-main-content">
                            <div class="ar-dash-bx-title-and-data">
                                <div class="bx-data-overview">
                                    <div class="box-show-ovr-list">
                                        <div class="bx1">
                                            <div class="bx-ovr-list">
                                                <p>จำนวนผู้ใช้งานระบบ</p>
                                                <p>
                                                    <?php
                                                    get_member_data();
                                                    function get_member_data()
                                                    {
                                                        $con = conn();
                                                        $sql_get_count_member = "select u_id from tbl_register";
                                                        $rs_ckk_data = mysqli_query($con, $sql_get_count_member);
                                                        $cout_data = mysqli_num_rows($rs_ckk_data);
                                                        echo $cout_data," คน";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="bx-ovr-list">
                                                <p>จำนวนเหรียญในระบบ</p>
                                                <?php
                                                echo "<p style='font-size:20px;'>" . get_coin_data() . "</p>";
                                                function get_coin_data()
                                                {
                                                    $con = conn();
                                                    $sql_get_count_member = "select coin_id from tbl_coin_data";
                                                    $rs_ckk_data = mysqli_query($con, $sql_get_count_member);
                                                    $cout_data = mysqli_num_rows($rs_ckk_data);
                                                    echo $cout_data, " เหรียญ";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="bx1">
                                            <div class="bx-ovr-list">
                                                <p>จำนวนการทำธุรกรรม</p>
                                                <p>
                                                    <?php
                                                    get_trans_sac();
                                                    function get_trans_sac()
                                                    {
                                                        $con = conn();
                                                        $sql_get_count_member = "select u_id from tbl_history";
                                                        $rs_trns_count = mysqli_query($con, $sql_get_count_member);
                                                        $tens_data = mysqli_num_rows($rs_trns_count);
                                                        echo $tens_data," ครั้ง/วัน";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="bx-ovr-list">
                                                <p>จำนวนเงินหมุนเวียนในระบบ</p>
                                                <p>
                                                    <?php
                                                    get_turnover_amount();
                                                    function get_turnover_amount()
                                                    {
                                                        $con = conn();
                                                        $sql_get_turnover_amount = "select amount from tbl_history";
                                                        $rs_ckk_turnover = mysqli_query($con, $sql_get_turnover_amount);
                                                        $sum=0;
                                                        if (mysqli_num_rows($rs_ckk_turnover) > 0) {
                                                            while ($data = mysqli_fetch_assoc($rs_ckk_turnover)) {
                                                                if($data["amount"]<0){
                                                                    echo "";
                                                                }else{
                                                                    $sum+=$data["amount"];
                                                                    
                                                                }
                                                            }
                                                            echo number_format($sum, 2), " THB";
                                                        } else {
                                                            echo "0";
                                                        }
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- <div class="overview-total-value">
                                            <h1>BTC=1000</h1>
                                            <h1>THB=500000000</h1>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="ar-dash-bx-title-and-data2">
                                <div class="bx-title">
                                    <h4>รายการสมัครใหม่</h4>
                                </div>
                                <div class="bx-data-overview">
                                    <div class="box-show-ovr-list2">
                                        <table class="tbl-dash-show-new-member">
                                            <tr>
                                                <th class="dash-no">ลำดับ</th>
                                                <th class="dash-name">ชื่อ</th>
                                                <th class="dash-email">อีเมล</th>
                                                <th class="dash-date">วันที่สมัคร</th>
                                                <th class="dash-authen">การยันยันตัวตน</th>
                                            </tr>
                                            <?php
                                            $con = conn();
                                            $sql_new_regis = "select u_id, full_name, email, pwd, authen,date_regis, confirm from tbl_register where authen=0";
                                            $rs_regis_data = mysqli_query($con, $sql_new_regis);
                                            if (mysqli_num_rows($rs_regis_data) > 0) {
                                                $count = 0;
                                                while ($data = mysqli_fetch_assoc($rs_regis_data)) {
                                                    $count += 1;
                                                    $name = $data["full_name"];
                                                    $email = $data["email"];
                                                    $pwd = $data["pwd"];
                                                    $authen = $data["authen"];
                                                    $conf = $data["confirm"];
                                                    $date_regis = $data["date_regis"];
                                                    echo "
                                                            <tr>
                                                                <td class='dash-td-data-list'>$count</td>
                                                                <td class='dash-td-data-list td-name'>$name</td>
                                                                <td class='dash-td-data-list td-email'>$email</td>
                                                                <td class='dash-td-data-list td-date'>$date_regis</td>
                                                                <td class='dash-td-data-list td-auth dash-set-f-color'>ยังไม่ยืนยัน</td>
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
                            <div class="ar-dash-bx-title-and-data2">
                                <div class="bx-title">
                                    <h4>รายชื่อเหรียญ</h4>
                                </div>
                                <div class="bx-data-overview">
                                    <div class="box-show-ovr-list">
                                        <table class="tbl-dash-show-new-member">
                                            <tr>
                                                <th class="dash-no">ลำดับ</th>
                                                <th class="dash-no"></th>
                                                <th class="dash-name">ชื่อ</th>
                                                <th class="dash-email">ราคาเปิดตัวครั้งเเรก</th>
                                                <th class="dash-email">วันที่เพิ่ม</th>
                                                <th class="dash-email">ดำเนินการ</th>
                                            </tr>
                                            <?php
                                            $i = 0;
                                            $coin_id_prm = "";
                                            $img_coin = "";
                                            $sql_get_all_coin = "select coin_id, coin_name, open_price, date_add, img_coin, coin_amount, open_price from tbl_coin_data";
                                            $rs_ds_coin = mysqli_query($con, $sql_get_all_coin);
                                            if (mysqli_num_rows($rs_ds_coin) > 0) {
                                                while ($c_data = mysqli_fetch_assoc($rs_ds_coin)) {
                                                    $coin_id_prm = $c_data["coin_id"];
                                                    $i += 1;
                                                    $img_coin = $c_data["img_coin"];
                                                    $c_name = $c_data["coin_name"];
                                                    $amount = number_format(floatval($c_data["coin_amount"]), 2);
                                                    $time = $c_data["date_add"];
                                                    $open_price=$c_data["open_price"];
                                                    echo "
                                                        <tr>
                                                            <td class='dash-td-data-list'>$i</td>
                                                            <td class='dash-td-data-list'><img src='../coin_img/$img_coin' alt='' width='50px'></td>
                                                            <td class='dash-td-data-list td-name'>$c_name</td>
                                                            <td class='dash-td-data-list td-date'>$open_price THB</td>
                                                            <td class='dash-td-data-list td-date'>$time</td>
                                                            <td class='dash-td-data-list td-date'><button class='btn-ds-edt-coin'><a class='ds-edt-link' href='../backend/dashboard/update_coin.php?coin_id=$coin_id_prm'>เเก้ไข</a></button></td>
                                                        </tr>
                                                    ";
                                                }
                                            }
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
    </div>
</body>

</html>