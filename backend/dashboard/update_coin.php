<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/set_spack.css">
    <link rel="stylesheet" href="../style/add_new_coin.css">
    <link rel="stylesheet" href="../style/update_coin.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="ar-dash-container">
        <div class="dash-navleft">
            <div class="ar-bx-list">
                <?php
                include 'navleft.php';
                ?>
            </div>
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
                            <h3>เเก้ไขข้อมูลเหรียญ</h3>
                        </div>
                        <div class="ar-spac">

                        </div>
                        <div class="ar-dash-main-content">
                            <div class="ar-form-add-coin">
                                <div class="ar-show-coin-befor-update2">
                                    <?php
                                    include '../connect_db/condb.php';
                                    $conn = conndb();
                                    $coin_id = $_GET["coin_id"];
                                    $sql_get_coin_data = "select coin_name, date_add, open_price, coin_amount, coin_detail, currency, img_coin from tbl_coin_data where coin_id='$coin_id'";
                                    $rs_data = mysqli_query($conn, $sql_get_coin_data);
                                    $coin = mysqli_fetch_assoc($rs_data);
                                    echo "";

                                    $coin_name = $coin["coin_name"];
                                    $img_coin = $coin["img_coin"];
                                    $date_add = $coin["date_add"];
                                    $opn_price = number_format($coin["open_price"], 2);
                                    $coin_amount = number_format($coin["coin_amount"], 2);
                                    $coin_detail = $coin["coin_detail"];
                                    $currency = $coin["currency"];
                                    ?>
                                    <div>
                                        <center><img src="../../coin_img/<?php echo $img_coin; ?>" alt="" width="100px"></center>
                                    </div>
                                    <table>
                                        <tr>
                                            <td class="set-pdd-left">
                                                <p>ชื่อเหรียญ: </p>
                                            </td>
                                            <td class="set-pdd-left"><?php echo $coin_name; ?></td>
                                        </tr>
                                        <tr class="set-tr-pdd">
                                            <td class="set-pdd-left">
                                                <p>ราคาที่เปิดตัว: </p>
                                            </td>
                                            <td class="set-pdd-left"> <?php echo $opn_price; ?> บาท</td>
                                        </tr>
                                        <tr class="set-tr-pdd">
                                            <td class="set-pdd-left">
                                                <p>จำนวนเหรียญ: </p>
                                            </td>
                                            <td class="set-pdd-left"><?php echo $coin_amount; ?> เหรียญ</td>
                                        </tr>
                                        <tr class="set-tr-pdd">
                                            <td class="set-pdd-left">
                                                <p>ข้อมูลเหรียญ: </p>
                                            </td>
                                            <td class="set-pdd-left"><?php echo $coin_detail; ?></td>
                                        </tr>
                                        <tr class="set-tr-pdd">
                                            <td class="set-pdd-left">
                                                <p>สกุลเงิน: </p>
                                            </td>
                                            <td class="set-pdd-left"><?php echo $currency; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="ar-show-form-upd-coin">
                                    <div class="ar-inp-coin-data">
                                        <table>
                                            <tr>
                                                <td class="set-form-ad-nc">ชื่อเหรียญ:</td>
                                                <td class="set-form-ad-nc inp-coin-data">
                                                    <form action="update_coin.php" method="get">
                                                        <input class="inp-coin-data-txt" type="text" name="upd_coin_name" id="">
                                                        <input class="set-hide-inp" type="text" name="coin_id" value="<?php echo @$_GET["coin_id"]; ?>">
                                                        <input type="submit" value="บันทึก" name="btn_chang_coin_name" class="btn-add-coin btn-bg-cl">
                                                        <?php
                                                        if (isset($_GET["btn_chang_coin_name"])) {
                                                            $inp_coin = $_GET["upd_coin_name"];
                                                            edit_coin_data($inp_coin, "coin_name");
                                                        }
                                                        function edit_coin_data($inp_data, $field_name)
                                                        {
                                                            $condb = conndb();
                                                            $set_upd_coin_id = $_GET["coin_id"];
                                                            $sql_upd_data = "update tbl_coin_data  set $field_name='$inp_data' where coin_id='$set_upd_coin_id'";
                                                            mysqli_query($condb, $sql_upd_data);
                                                            //echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/backend/dashboard/update_coin.php?coin_id=" . $set_upd_coin_id . "'>";
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">ราคาที่เปิดตัว:</td>
                                                <td class="set-form-ad-nc inp-coin-data">
                                                    <form action="update_coin.php" method="get">
                                                        <input class="inp-coin-data-txt" type="text" name="upd_coin_name" id="">
                                                        <input class="set-hide-inp" type="text" name="coin_id" value="<?php echo @$_GET["coin_id"]; ?>">
                                                        <input type="submit" value="บันทึก" name="btn_open_price" class="btn-add-coin btn-bg-cl">
                                                        <?php
                                                        if (isset($_GET["btn_open_price"])) {
                                                            $inp_coin = $_GET["upd_coin_name"];
                                                            edit_coin_data($inp_coin, "open_price");
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">จำนวนเหรียญ:</td>
                                                <td class="set-form-ad-nc inp-coin-data">
                                                    <form action="update_coin.php" method="get">
                                                        <input class="inp-coin-data-txt" type="text" name="upd_coin_name" id="">
                                                        <input class="set-hide-inp" type="text" name="coin_id" value="<?php echo @$_GET["coin_id"]; ?>">
                                                        <input type="submit" value="บันทึก" name="btn_coin_amount" class="btn-add-coin btn-bg-cl">
                                                        <?php
                                                        if (isset($_GET["btn_coin_amount"])) {
                                                            $inp_coin = $_GET["upd_coin_name"];
                                                            edit_coin_data($inp_coin, "coin_amount");
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">ข้อมูลเหรียญ:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="set-form-ad-nc inp-coin-data">
                                                    <form action="update_coin.php" method="get">
                                                        <textarea class="ar-txt-area-inp-coin-data set-txt-inp-pdd" name="coin_detail" id="" cols="30" rows="10"></textarea>
                                                        <input class="set-hide-inp" type="text" name="coin_id" value="<?php echo @$_GET["coin_id"]; ?>">
                                                        <input type="submit" value="บันทึก" name="btn_coin_dt" class="btn-add-coin btn-bg-cl">
                                                        <?php
                                                        if (isset($_GET["btn_coin_dt"])) {
                                                            $inp_coin = $_GET["coin_detail"];
                                                            edit_coin_data($inp_coin, "coin_detail");
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>สกุลเงิน:</td>
                                                <td class="set-form-ad-nc inp-coin-data">
                                                    <form action="update_coin.php" method="get">
                                                        <select name="get_current" id="">
                                                            <option value="bath">Bath</option>
                                                            <option value="usd">USD</option>
                                                            <option value="busd">BUSD</option>
                                                        </select>
                                                        <input class="set-hide-inp" type="text" name="coin_id" value="<?php echo @$_GET["coin_id"]; ?>">
                                                        <input type="submit" value="บันทึก" name="btn_currency" class="btn-add-coin btn-bg-cl">
                                                        <?php
                                                        if (isset($_GET["btn_currency"])) {
                                                            $inp_coin = $_GET["get_current"];
                                                            edit_coin_data($inp_coin, "currency");
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">รูป:</td>
                                                <td class="set-form-ad-nc inp-coin-data">
                                                    <form action="update_coin.php" method="get" enctype="multipart/form-data">
                                                        <input type="file" name="coin_file">
                                                        <input class="set-hide-inp" type="text" name="coin_id" value="<?php echo @$_GET["coin_id"]; ?>">
                                                        <input type="submit" value="บันทึก" name="btn_up_img" class="btn-add-coin btn-bg-cl">
                                                        <?php
                                                        @$file_name = $_FILES["coin_file"]["name"];
                                                        @$file_tmp = $_FILES["coin_file"]['tmp_name'];
                                                        if (isset($_GET["btn_up_img"])) {
                                                            $date_time = time();
                                                            $fmt_file_name = $date_time . $file_name;
                                                            echo "file name", $file_name;
                                                            echo "$fmt_file_name", $fmt_file_name;
                                                            move_uploaded_file($file_tmp, "../../coin_img/" . $fmt_file_name);
                                                            edit_coin_data($fmt_file_name, "img_coin");
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
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