<?php
        include "con_db.php";
        function deposit_money($u_id, $money=0){
            $ckk_acc="select money from bank_account where u_id='$u_id'";
            $result=mysqli_query(conn(),$ckk_acc);
            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
                $ckk_monney=$row["money"];
                /* echo "ค่าเงินบาท". $ckk_monney;
                echo "ยอดเงินในบัญชีคือ", $ckk_monney;   */
                if($money==0){
                    echo "ยอดเงินไม่ถูกต้อง";
                }elseif($money>0){
                    $new_balance=$ckk_monney+=$money;
                    $sql_update_balance="update bank_account set money = '$new_balance' where u_id='$u_id'";
                    mysqli_query(conn(),$sql_update_balance);
                    $sql_mew_his="insert into tbl_history(u_id,coin,amount,price,total) values('$u_id','THB','$money','$money','$money')";
                    mysqli_query(conn(), $sql_mew_his);
                }
            }else{
                $sql_new_uid="insert into bank_account(u_id,money) values($u_id, $money)";
                mysqli_query(conn(),$sql_new_uid);
            }
        }
?>