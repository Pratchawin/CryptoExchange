<?php
    function ckk_login(){
        if(!isset($_SESSION["u_id"])){
            echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/login.php'>";
        }
    }
    function show_btn_logout(){
        if(isset($_SESSION["u_id"])){
            echo"
            <div class='ar-dottrade-user-status'>
                <a href='wellet.php?status=logout' class='dottrade-link-navtop'>Logout</a>
            </div>
        ";
        }else{
            echo"
            <div class='ar-dottrade-user-status'>
                <a href='login.php' class='dottrade-link-navtop'>Login</a>
            </div>
        ";
        }
    }
    function ckk_login_deposit($u_id){
        if(!isset($u_id)){
            echo "<meta http-equiv='refresh' content='5;url=http://localhost/crypto/webpage/login.php'>";
        }else{
            return true;
        }
    }
    function ckk_user_identity_verification($u_id){
        include '../conn/con_db.php';
        $conn=conn();
        $sql_ckk_user_authen="select authen from tbl_register where u_id=$u_id";
        $result=mysqli_query($conn, $sql_ckk_user_authen);
        if(mysqli_num_rows($result) > 0){
            $ckk_uid=mysqli_fetch_assoc($result);
            //echo $ckk_uid["authen"];
            if($ckk_uid["authen"]=="0"){
                echo "กรุณาโปรดยืนยันตัวตนก่อนฝากเงิน";
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
?>