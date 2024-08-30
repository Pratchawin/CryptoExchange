<?php
    function update_coin_data($coin_id, $feild_name, $condb, $inp_data){
        $sql_upd_data="update tbl_coin_data  set coin_name='$inp_data' where coin_id='$coin_id'";
        $rs_data=mysqli_query($condb, $sql_upd_data);
        if($rs_data==true){
            echo "Update success";
            return true;
        }
    }
?>