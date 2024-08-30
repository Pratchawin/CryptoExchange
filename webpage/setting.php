<!DOCTYPE html>
<html lang="en">
<?php
session_start();
@$full_name = $_SESSION["full_name"];
@$u_id = $_SESSION["u_id"];
?>
<?php
include '../built_in_func/ckk_login.php';
ckk_login();
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
    <link rel="stylesheet" href="../style/setting.css">
    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>

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
                            <p class="ar-wellet-title-size">Setting</p>
                            <p class="ar-wellet-his-size">การตั้งค่าเเละการยืนยันตัวตน</p>
                        </div>
                        <?php
                            $show_resutl="";
                            if(isset($_POST["btn_upload"])){
                                @$fname=$_POST["fname"];
                                @$lname=$_POST["lname"];
                                @$addr=$_POST["addr"];
                                @$phone=$_POST["phone"];
                                @$email=$_POST["email"];
                                @$id_card=$_POST["id_card"];
                                @$conf=$_POST["conf"];
                                //check null
                                $ckk_name="";
                                $ckk_addr="";
                                $ckk_phone="";
                                $ckk_email="";
                                $ckk_uid="";
                                $ckk_conf="";
                                $ckk_upload_uimg="";
                                $ckk_upload_himg="";
                                $ckk_upload_uidimg="";
                                if($fname=="" and $lname==""){
                                    $ckk_name="<p style='color:red;'>*โปรดระบุชื่อเเละนามสกุลให้ครบ</p>";
                                }
                                if($addr==""){
                                    $ckk_addr="<p style='color:red;'>*โปรดระบุที่อยู่ของคุณ</p>";
                                }
                                if($phone==""){
                                    $ckk_phone="<p style='color:red;'>*โปรดระบุเบอร์โทรศัพท์</p>";
                                }
                                if($email==""){
                                    $ckk_email="<p style='color:red;'>*โปรดระบุอีเมล</p>";
                                }
                                if($id_card==""){
                                    $ckk_uid="<p style='color:red;'>*โปรดระบุเลขบัตรประชาชน</p>";
                                    
                                }elseif(strlen($id_card)<13){
                                    $ckk_uid="<p style='color:red;'>*โปรดกรอกเลขบัตรประชาชนให้ครบถ้วน</p>";
                                    
                                }
                                if($conf==""){
                                    $ckk_conf="<p style='color:red;'>*โปรดกดยินยอมข้อตกลง</p>";
                                }
                                if($_FILES['u_profile']['name']==""){
                                    $ckk_upload_uimg= "<p style='color:red;'>*โปรดอัปโหลดรูปภาพของคุณ</p>";
                                }
                                if($_FILES['house_id_file']['name']==""){
                                    $ckk_upload_himg= "<p style='color:red;'>*โปรดอัปโหลดสำเนาทะเบียนบ้าน</p>";
                                }
                                if($_FILES['uid_file']['name']==""){
                                    $ckk_upload_uidimg= "<p style='color:red;'>*โปรดอัปโหลดสำเนาบัตรประชาชน</p>";
                                }
                                if($fname!=="" and $lname!=="" and $addr!=="" and $phone !=="" and $email !=="" and $id_card!=="" and $conf!=="" and $_FILES['u_profile']['name']!==""){
                                    /* echo "fname",$fname;
                                    echo "lname",$lname;
                                    echo "addr",$addr;
                                    echo "phone",$phone;
                                    echo "email",$email;
                                    echo "id card",$id_card;
                                    echo "conf",$conf;    */
                                    $full_name=$fname." ".$lname;
                                    include '../conn/con_db.php';
                                    $conn=conn();
                                    $f_name1=upload_file('u_profile',"../img_user/");
                                    $f_name2=upload_file('house_id_file',"../img_house_id/");
                                    $f_name3=upload_file('uid_file',"../img_uid/");
                                    $sql_insert_data="insert into tbl_user_data(u_id,name,addr,phone,email,u_id_card,uid_file,h_file,u_profile,conf) values('$u_id','$full_name','$addr','$phone','$email','$id_card','$f_name3','$f_name2','$f_name1','$conf')";
                                    $ckk_result=mysqli_query($conn, $sql_insert_data);
                                    if($ckk_result==true){
                                        $show_resutl="<p style='color:green;'>อัปโหลดข้อมูลการยืนยันตัวตนเเล้วอาจใช้เวลา 1-3 วัน</p>";
                                    }
                                    echo "<meta http-equiv='refresh' content='5;url=http://localhost/crypto/webpage/setting.php'>";        
                                }
                                
                            }
                            function upload_file($name,$target){
                                /* echo "file name: ",$name,"<br>";
                                echo "target:",$target; */
                                $time=time();
                                @$file_name = $_FILES[$name]['name'];
                                @$file_tmp =$_FILES[$name]['tmp_name'];
                                $filename=$time.$file_name;
                                move_uploaded_file($file_tmp,$target.$filename);
                                return $filename;
                            }
                        ?>
                        <form action="setting.php" enctype="multipart/form-data" method="POST">
                            <div class="ar-wallet-history-tbl">
                                <div class="set-box">
                                    <div class="set-title">
                                        <p>ชื่อ-นามสกุล ตามประชาชน:</p>
                                    </div>
                                    <div class="set-form">
                                        <input type="text" name="fname" id="" class="set-inp-data fname">
                                        <input type="text" name="lname" id="" class="set-inp-data lname">
                                    </div>
                                    <div>
                                        <?php
                                            echo @$ckk_name;
                                        ?>
                                    </div>
                                </div>
                                <div class="set-box">
                                    <div class="set-title">
                                        <p>ที่อยู่:</p>
                                    </div>
                                    <div class="set-form">
                                        <input type="text" name="addr" id="" class="set-inp-data">
                                    </div>
                                    <div>
                                        <?php
                                            echo @$ckk_addr;
                                        ?>
                                    </div>
                                </div>
                                <div class="set-box">
                                    <div class="set-title">
                                        <p>เบอร์โทรศัพท์:</p>
                                    </div>
                                    <div class="set-form">
                                        <input type="text" name="phone" id="" class="set-inp-data">
                                    </div>
                                    <div>
                                        <?php
                                            echo @$ckk_phone;
                                        ?>
                                    </div>
                                </div>
                                <div class="set-box">
                                    <div class="set-title">
                                        <p>E-mail:</p>
                                    </div>
                                    <div class="set-form">
                                        <input type="text" name="email" id="" class="set-inp-data">
                                    </div>
                                    <div>
                                        <?php
                                            echo @$ckk_email;
                                        ?>
                                    </div>
                                </div>
                                <div class="set-box">
                                    <div class="set-title">
                                        <p>เลขบัตรประชาชน 13 หลัก:</p>
                                    </div>
                                    <div class="set-form">
                                        <input type="text" name="id_card" id="" class="set-inp-data">
                                    </div>
                                    <div>
                                        <?php
                                            echo @$ckk_uid;
                                        ?>
                                    </div>
                                    <div class="set-title">
                                        <p>รูปถ่ายบัตรประชาชน:</p>
                                    </div>
                                    <div class="set-form">
                                        <input type="file" name="uid_file" id="" class="set-inp-data-file">
                                    </div>
                                    <div>
                                        <?php
                                            echo @$ckk_upload_uidimg;
                                        ?>
                                    </div>
                                    <div class="set-title">
                                        <p>สำเนาทะเบียนบ้าน:</p>
                                    </div>
                                    <div class="set-form">
                                        <input type="file" name="house_id_file" id="" class="set-inp-data-file">
                                    </div>
                                    <div>
                                        <?php
                                            echo @$ckk_upload_himg;
                                        ?>
                                    </div>
                                    <div class="set-title">
                                        <p>สมุดบัญชีธนาคาร:</p>
                                    </div>
                                    <div class="set-form">
                                        <input type="file" name="u_profile" id="" class="set-inp-data-file">
                                    </div>
                                    <div>
                                        <?php
                                            echo @$ckk_upload_uimg;
                                        ?>
                                    </div>
                                </div>
                                <div class="ar-chh-bx">
                                    <input type="checkbox" name="conf" id="" value="1">
                                    <label for="">ข้าพเจ้าได้อ่านข้อตกลงเเละเงื่อนไขเป็นที่เรียบร้อย</label>
                                    <div>
                                        <?php
                                            echo @$ckk_conf;
                                            echo $show_resutl;
                                        ?>
                                    </div>
                                </div>
                                <div class="ar-btn-save-data">
                                    <input type="submit" value="อัปโหลดข้อมูล" name="btn_upload" class="set-btn-save">
                                    <input type="submit" value="ยกเลิก" class="set-btn-cancle">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../javascript/market.js"></script>

</html>