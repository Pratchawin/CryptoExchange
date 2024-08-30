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
    <link rel="stylesheet" href="../style/ckk_user_data.css">
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
                <?php
                $u_id = $_GET["ckk_user_id"];
                $u_name = "";
                $u_addr = "";
                $phone = "";
                $email = "";
                $u_card_id = "";
                $img_file = "";
                $h_file = "";
                $u_img = "";
                $conn = conndb();
                $sql_get_user_data = "select name, addr, phone, email, u_id_card, uid_file, h_file, u_profile from tbl_user_data where tbl_user_data.u_id='$u_id'";
                $rs_data = mysqli_query($conn, $sql_get_user_data);
                if (mysqli_num_rows($rs_data) > 0) {
                    $ud = mysqli_fetch_assoc($rs_data);
                    $u_name = $ud["name"];
                    $u_addr = $ud["addr"];
                    $phone = $ud["phone"];
                    $email = $ud["email"];
                    $u_card_id = $ud["u_id_card"];
                    $img_file = $ud["uid_file"];
                    $h_file = $ud["h_file"];
                    $u_img = $ud["u_profile"];
                } else {
                    echo "Error=>", mysqli_error($conn);
                }
                ?>
                <div class="ar-dash-content">
                    <div class="dash-content-list">
                        <div class="ar-dash-main-content">
                            <div class="bx-title">
                                <h3>ตรวจสอบข้อมูล</h3>
                            </div>
                            <div class="ar-spac">

                            </div>
                            <div class="ar-show-tbl-new-list">
                                <div class="ar-show-all-u-data">
                                    <div class="ar-show-udataleft">
                                        <div class="ar-show-uname">
                                            <p><b>ชื่อ:</b><?php echo $u_name; ?></p>
                                        </div>
                                        <div class="ar-show-uname">
                                            <p><b>ที่อยู่:</b><?php echo $u_addr; ?></p>
                                        </div>
                                        <div class="ar-show-uname">
                                            <p><b>เบอร์โทร:</b><?php echo $phone; ?></p>
                                        </div>
                                        <div class="ar-show-uname">
                                            <p><b>อีเมล:</b><?php echo $email; ?></p>
                                        </div>
                                        <div class="ar-show-uname">
                                            <p><b>รหัสบัตรประชาชน:</b><?php echo $u_card_id; ?></p>
                                        </div>
                                        <div class="ar-show-uname">
                                            <p><b>ธนาคาร:</b><?php echo $u_card_id; ?></p>
                                        </div>
                                        <div class="ar-show-uname">
                                            <p><b>บัญชี:</b><?php echo $u_card_id; ?></p>
                                        </div>
                                    </div>
                                    <div class="ar-show-udataright">
                                        <div class="ar-show-uname">
                                            <center>
                                                <p>รูปถ่าย</p>
                                            </center>
                                            <img src="../../img_uid/<?php echo $img_file; ?>" alt="" width="150px">
                                        </div>
                                    </div>
                                    <div class="ar-show-udataright">
                                        <div class="ar-show-uname">
                                            <center>
                                                <p>สำเนาทะเบียนบ้าน</p>
                                            </center>
                                            <img src="../../img_house_id/<?php echo $h_file; ?>" alt="" width="500px">
                                        </div>
                                    </div>
                                    <div class="ar-show-udataright">
                                        <div class="ar-show-uname">
                                            <center>
                                                <p>รูปบัตรประชาชน</p>
                                            </center>
                                            <img src="../../img_uid/<?php echo $img_file ?>" alt="" width="400px">
                                        </div>
                                        <div class="btn-conf-udata">

                                            <button><a href="ckk_user_data.php?ckk_user_id=<?php echo $u_id; ?>&ckk_btn_conf=true">ยืนยันตัวตน</a></button>
                                            <?php
                                            if (isset($_GET["ckk_btn_conf"])) {
                                                $sql_update_user_auth = "update tbl_register set authen='1' where u_id=$u_id";
                                                $ckk_rs = mysqli_query($conn, $sql_update_user_auth);
                                                if ($ckk_rs == true) {
                                                    echo "<p style='color:green;'>ดำเนินการเรียบร้อย</p>";
                                                    echo "<meta http-equiv='refresh' content='3;url=http://localhost/crypto/backend/dashboard/user_list.php'>";
                                                }
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="">
                                        <div class="ar-show-bank-account">
                                            <center>
                                                <p>สมุดบัญชีธนาคาร</p>
                                            </center>
                                            <img src="../../img_user/<?php echo $u_img; ?>" alt="" width="400px">
                                        </div>
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