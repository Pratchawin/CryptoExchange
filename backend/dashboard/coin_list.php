<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/coin_list.css">
    <link rel="stylesheet" href="../style/set_spack.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="ar-dash-container">
        <div class="dash-navleft">
            <?php
            include 'navleft.php';
            ?>
        </div>
        <div class="dash-content">
            <div class="dash-top-link">
                <div class="ar-dash-top-manue">
                    <div class="ar-manue-list">
                        <p>Admin</p>
                    </div>
                    <div class="ar-manue-list">
                        <a href="../../webpage/login.php">Logout</a>
                    </div>
                </div>
                <div class="ar-dash-content">
                    <div class="dash-content-list">
                        <div class="ar-dash-title">
                            <h3>เหรียญในกระดาน</h3>
                        </div>
                        <div class="ar-spac">
                        </div>
                        <div class="ar-dash-main-content">
                            <table class="tbl-show-coin-list">
                                <tr>
                                    <th class="c-list-no">ลำดับ</th>
                                    <th class="c-list-img">รูป</th>
                                    <th class="c-list-name">ชื่อเหรียญ</th>
                                    <th class="c-list-price">ราคาเปิดตัว</th>
                                    <th class="c-list-date">วันที่เพิ่ม</th>
                                    <th class="c-list-curren">สกุลเงินที่ใช้เเลกเปลี่ยน</th>
                                    <th class="th-btn-exe">ดำเนินการ</th>
                                </tr>
                                <?php
                                include "../connect_db/condb.php";
                                $conn = conndb();
                                $sql_get_coin_data = "select coin_name,coin_id, img_coin, open_price, date_add from tbl_coin_data";
                                $rs_coin_data = mysqli_query($conn, $sql_get_coin_data);
                                $count = 0;
                                if (mysqli_num_rows($rs_coin_data) > 0) {
                                    while ($coin_data = mysqli_fetch_assoc($rs_coin_data)) {
                                        $count += 1;
                                        $coin_img = $coin_data["img_coin"];
                                        $coin_n=$coin_data["coin_name"];
                                        $opn_price=$coin_data["open_price"];
                                        $date_add=$coin_data["date_add"];
                                        echo "
                                            <tr>
                                                <td class='td-coin-line-set'>" . $count . "</td>
                                                <td class='td-coin-line-set'><img src='../../coin_img/$coin_img' alt='' class='btc-image'></td>
                                                <td class='td-coin-line-set'>$coin_n</td>
                                                <td class='td-coin-line-set'>$opn_price</td>
                                                <td class='td-coin-line-set'>$date_add</td>
                                                <td class='td-coin-line-set'>THB</td>
                                                <td class='td-coin-line-set'>
                                                    <button><a href='coin_list.php?delete=" . $coin_data["coin_id"] . "'>delete</a></button>
                                                    <button><a href='update_coin.php?coin_id=" . $coin_data["coin_id"] . "'>update</a></button>
                                                </td>
                                            </tr>
                                            ";
                                    }
                                } else {
                                    echo "";
                                }
                                if (isset($_GET["delete"])) {
                                    $coin_id = $_GET["delete"];
                                    //call function
                                    delete_coin($coin_id);
                                }
                                function delete_coin($coin_id)
                                {
                                    $conn = conndb();
                                    $sql_delete_coin = "delete from tbl_coin_data where coin_id='$coin_id'";
                                    $ckk_rs = mysqli_query($conn, $sql_delete_coin);
                                    if ($ckk_rs == true) {
                                        echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/backend/dashboard/coin_list.php'>";
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
</body>

</html>