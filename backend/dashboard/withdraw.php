<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/set_spack.css">
    <link rel="stylesheet" href="../style/add_new_coin.css">
    <link rel="stylesheet" href="../style/with_draw.css">
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
                                        <table class="tbl-show-with-data">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อ-นามสกุล</th>
                                                <th>วันที่ร้องขอ</th>
                                                <th>จำนวนเงิน</th>
                                                <th>เลขที่บัญชี</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                            <?php
                                            include "../connect_db/condb.php";
                                            $conn=conndb();
                                            $sql_scl_withdraw="select with_id,name,amount,bn_acc,u_id,bn_name,date_with from tbl_withdraw";
                                            $rs_exe_sql=mysqli_query($conn, $sql_scl_withdraw);
                                            $count=0;
                                            if(mysqli_num_rows($rs_exe_sql)>0){
                                                while($data=mysqli_fetch_assoc($rs_exe_sql)){
                                                    $count+=1;
                                                    $with_id=$data["with_id"];
                                                    echo "
                                                        <tr>
                                                            <td class='number'>$count</td>
                                                            <td class='set-pdd'>".$data["name"]."</td>
                                                            <td class='set-pdd number'>".$data["date_with"]."</td>
                                                            <td class='set-pdd number'>".$data["amount"]."</td>
                                                            <td class='set-pdd number'>".$data["bn_acc"]."</td>
                                                            <td class='set-pdd btn-conf'><a href='withdraw.php?with_id=$with_id''>ดำเนินการ</a></td>
                                                        </tr>
                                                    ";
                                                }
                                            }else{
                                                echo "";
                                            }
                                            @$del_conf=$_GET["with_id"];
                                            if(isset($del_conf)){
                                                $sql_del_out="delete from tbl_withdraw where with_id=$del_conf";
                                                $ckk=mysqli_query($conn, $sql_del_out);
                                                if($ckk==true){
                                                    echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/backend/dashboard/withdraw.php'>";
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
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