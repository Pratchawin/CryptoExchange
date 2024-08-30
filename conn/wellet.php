<?php
    function get_balance($u_id, $condb){
        $sql_get_data="select money from bank_account where u_id='$u_id'";
        $u_ex=mysqli_query($condb,$sql_get_data);
        if(mysqli_num_rows($u_ex)>0){
            $balance=mysqli_fetch_assoc($u_ex);
            return $balance["money"];
        }else{
            echo mysqli_error($condb);
            return "0";
        }
    }
    function show_user_hidtory($u_id, $condb){
        $sql_get_history="select his_id,date_ac,coin,amount,price,total from tbl_history where u_id='$u_id' and status=1 order by his_id desc";
        $sql_exe=mysqli_query($condb, $sql_get_history);
        if(mysqli_num_rows($sql_exe)>0){
            while($his_data=mysqli_fetch_assoc($sql_exe)){
                echo "
                <tr>
                <td class='wellet-his-td-data'>".$his_data["date_ac"]."</td>
                <td class='wellet-his-td-data'>".$his_data["coin"]."</td>
                <td class='wellet-his-td-data'>".$his_data["amount"]." BTC</td>
                <td class='wellet-his-td-data'>".$his_data["amount"]." BTC</td>
                <td class='wellet-his-td-data'>0</td>
                <td class='wellet-his-td-data'>".number_format($his_data["total"],2)." THB</td>
            </tr>
                ";
            }
        }else{
            echo "";
        }
    }
