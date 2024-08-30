<!DOCTYPE html>
<html lang="en">
<?php include '../connect_db/condb.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/dash_new_user.css">
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
                        <div class="ar-dash-main-content">
                            <div class="bx-title">
                                <h3>รอยืนยัน</h3>
                                <form action="">
                                    <input type="text" name="" id="" class="inp-find-user-name" placeholder="ชื่อผู้ใช้">
                                    <input type="button" value="ค้นหา" class="ds-btn-find">
                                </form>
                            </div>
                            <div class="ar-spac">

                            </div>
                            <div class="ar-show-tbl-new-list">
                                <table class="tbl-dash-new-user">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ</th>
                                        <th style="text-align: left;">E-mail</th>
                                        <th>วันที่สมัคร</th>
                                        <th>การยืนยันตัวตน</th>
                                        <th>ดำเนินการ</th>
                                    </tr>
                                    <?php
                                    $conn = conndb();
                                    $sql_get_new_user = "select * from tbl_register where authen=0";
                                    $rs_userdata = mysqli_query($conn, $sql_get_new_user);
                                    $i = 0;
                                    $alert_authen = "";
                                    if (mysqli_num_rows($rs_userdata) > 0) {
                                        while ($u_data = mysqli_fetch_assoc($rs_userdata)) {
                                            $u_id = $u_data["u_id"];
                                            if ($u_data['authen'] == "0") {
                                                $alert_authen = "<p style='color:red; margin-top:10px;'>ยังไม่ยืนยันตัวตน</p>";
                                            } else {
                                                $alert_authen = "<p style='color:green; margin-top:10px;'>ยืนยันตัวตนเเล้ว</p>";
                                            }
                                            $i += 1;
                                            echo "
                                                <tr>
                                                    <td class='dash-td-nw-data us-no'>$i</td>
                                                    <td class='dash-td-nw-data us-name'>" . $u_data['full_name'] . "</td>
                                                    <td class='dash-td-nw-data us-mail'>" . $u_data['email'] . "</td>
                                                    <td class='dash-td-nw-data us-date'>" . $u_data['date_regis'] . "</td>
                                                    <td class='dash-td-nw-data us-auth'>" . $alert_authen . "</td>
                                                    <td class='dash-td-nw-data us-readmore'><button class='btn-check-data'><a href='ckk_user_data.php?ckk_user_id=$u_id' class='a-linke-ckk-udata'>ตรวจสอบข้อมูล</a></button></td>
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
                </div>
            </div>
        </div>
    </div>
</body>

</html>