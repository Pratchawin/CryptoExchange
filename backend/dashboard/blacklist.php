<!DOCTYPE html>
<html lang="en">

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
                        <div class="ar-dash-main-content">
                            <div class="bx-title">
                                <h3>บัญชีที่ถูกระงับ</h3>
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
                                        <th>E-mail</th>
                                        <th>วันที่สมัคร</th>
                                        <th>การยืนยันตัวตน</th>
                                        <th>ดำเนินการ</th>
                                    </tr>
                                    <tr>
                                        <td class="dash-td-nw-data us-no">1</td>
                                        <td class="dash-td-nw-data us-name">นายสมมตุ คงรวย</td>
                                        <td class="dash-td-nw-data us-mail">64309010005@htc.ac.th</td>
                                        <td class="dash-td-nw-data us-date">12/4/2022</td>
                                        <td class="dash-td-nw-data us-auth">ยังไม่ยืนยันตัวตน</td>
                                        <td class="dash-td-nw-data us-readmore"><button class="btn-check-data"><a href="" class="a-linke-ckk-udata">ปลดบล็อก</a></button></td>
                                    </tr>
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