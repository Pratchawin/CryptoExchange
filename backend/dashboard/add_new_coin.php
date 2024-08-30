<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/set_spack.css">
    <link rel="stylesheet" href="../style/add_new_coin.css">
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
                            <h3>เพิ่มเหรียญเข้ากระดานเทรด</h3>
                        </div>
                        <div class="ar-spac">

                        </div>
                        <div class="ar-dash-main-content">
                            <div class="ar-form-add-coin">
                                <form action="add_new_coin.php" method="POST" enctype="multipart/form-data">
                                    <div class="ar-inp-coin-data">
                                        <table>
                                            <tr>
                                                <td class="set-form-ad-nc">ขื่อเหรียญ</td>
                                                <td class="set-form-ad-nc inp-coin-data"><input class="inp-coin-data-txt" type="text" name="coin_name" id=""></td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">วันที่เพิ่ม</td>
                                                <td class="set-form-ad-nc inp-coin-data"><?php echo date("d/m/y") ?></td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">ราคาที่เปิดตัว</td>
                                                <td class="set-form-ad-nc inp-coin-data"><input class="inp-coin-data-txt" type="text" name="opn_price" id=""> THB</td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">จำนวนเหรียญ</td>
                                                <td class="set-form-ad-nc inp-coin-data"><input class="inp-coin-data-txt" type="text" name="amount" id=""></td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">ข้อมูลเหรียญ</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="set-form-ad-nc inp-coin-data"><textarea class="ar-txt-area-inp-coin-data" name="coin_detail" id="" cols="30" rows="10"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>สกุลเงิน</td>
                                                <td class="set-form-ad-nc inp-coin-data">
                                                    <select name="get_current" id="">
                                                        <option value="THB">THB</option>
                                                        <option value="USD">USD</option>
                                                        <option value="BUSD">BUSD</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc">รูป</td>
                                                <td class="set-form-ad-nc inp-coin-data"><input type="file" name="coin_image" id=""></td>
                                            </tr>
                                            <tr>
                                                <td class="set-form-ad-nc"></td>
                                                <td class="set-form-ad-nc inp-coin-data">
                                                    <input type="submit" value="เพิ่มเหรียญ" name="btn_add_coin" class="btn-add-coin btn-bg-cl">
                                                    <input type="submit" value="ยกเลิก" class="btn-add-coin btn-bg-ccl-cl">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php
                                    include "../connect_db/condb.php";
                                    @$coin_name = $_POST["coin_name"];
                                    @$opn_price = $_POST["opn_price"];
                                    @$amount = $_POST["amount"];
                                    @$coin_detail = $_POST["coin_detail"];
                                    @$slc_cur = $_POST["get_current"];
                                    @$btn_add_coin = $_POST["btn_add_coin"];
                                    @$file_name = $_FILES["coin_image"]["name"];
                                    @$file_tmp = $_FILES['coin_image']['tmp_name'];
                                    if (isset($btn_add_coin)) {
                                        $conn = conndb();
                                        /* echo "coin name:", $coin_name, "<br>";
                                        echo "open price:", $opn_price, "<br>";
                                        echo "amount:", $amount, "<br>";
                                        echo "coin_detail:", $coin_detail, "<br>";
                                        echo "select conrency:", $slc_cur, "<br>"; */
                                        $sql_insert_data = "insert into tbl_coin_data(coin_name,open_price,coin_amount,coin_detail,currency,img_coin) 
                                        values('$coin_name','$opn_price','$amount','$coin_detail','$slc_cur','$file_name')";
                                        $ckk_result = mysqli_query($conn, $sql_insert_data);
                                        if ($ckk_result == true) {
                                            move_uploaded_file($file_tmp, "../../coin_img/" . $file_name);
                                            echo "insert data success";
                                            echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/backend/dashboard/add_new_coin.php'>";
                                        } else {
                                            echo "Have error:", mysqli_error($conn);
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
</body>

</html>