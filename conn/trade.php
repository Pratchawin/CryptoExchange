<?php
include "../conn/con_db.php";
//เเสดงจำนวนเงินในบัญชี
function get_money_in_account($u_id)
{
    $sql_get_money_inacc = "select money from bank_account where u_id='$u_id'";
    $ckk_rs = mysqli_query(conn(), $sql_get_money_inacc);
    if (mysqli_num_rows($ckk_rs) > 0) {
        $money = mysqli_fetch_assoc($ckk_rs);
        return $money["money"];
    } else {
        return 0;
    }
}
//check login
function check_login($u_id, $buy_coin_price, $coin_price, $amount)
{
    if (isset($u_id)) {
        if ($buy_coin_price == 0) {
            echo "<p style='color:red; text-align:right; margin-right:10px; margin-top:10px;'>ยอดเงินที่ระบุไม่ถูกต้อง</p>";
        } else {
            $con = conn();
            $sql_get_money_in_acc = "select money from bank_account where u_id='$u_id'";
            $rs_my_money = mysqli_query($con, $sql_get_money_in_acc);
            $row = mysqli_fetch_assoc($rs_my_money);
            $balance = $row["money"] - $buy_coin_price;
            echo "ยอดเงินคงเหลือ:", $balance;
            echo "ราคาเหรียญ==>", $coin_price;
            $fmt_coin_price = floatval($coin_price);
            $amount = number_format($buy_coin_price / $fmt_coin_price, 8);
            echo "จำนวนเหรียญที่ซื้อ", $amount;
            //update ยอดเงิน
            if ($balance <= 0) {
                echo "ยอดเงินของคุณไม่เพียงพอ";
            } else {
                $sql_update_balance = "update bank_account set money='$balance' where u_id='$u_id'";
                $ckk_update_balance = mysqli_query($con, $sql_update_balance);
                if ($ckk_update_balance == true) {
                    $sql_buy_coin = "insert into buy_coin(u_id,price,amount,open_price,coin_id) values('$u_id','$coin_price','$amount','$buy_coin_price','02')";
                    $ckk_data = mysqli_query($con, $sql_buy_coin);
                    if ($ckk_data == true) {
                        echo "ดำเนินการเสร็จสิ้น";
                        mysqli_close($con);
                        echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/trade.php'>";
                    }
                }
            }
        }
    } else {
        //ไม่ได้ล็อคอิน ให้ไปหน้าล็อคอิน
        echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/webpage/login.php'>";
    }
}
//เเสดงคำสั่งซื้อด้านบน
function show_buy_order($coin_id)
{
    $con = conn();
    $sql_get_buy_order = "select u_id, price, amount, coin_id, open_price from buy_coin where coin_id='$coin_id'";
    $rs = mysqli_query($con, $sql_get_buy_order);
    if (mysqli_num_rows($rs) > 0) {
        while ($buy = mysqli_fetch_assoc($rs)) {
            $total = number_format($buy["open_price"], 2);
            echo "
                    <tr>
                        <td class='tr-bid-set-trade-price'>" . $total . "</td>
                        <td class='tr-bid-set-trade-price'>" . number_format($buy["amount"],8) . "</td>
                        <td class='tr-bid-set-trade-total'>" . number_format($buy["price"], 2) . "</td>
                    </tr>
                ";
        }
    }
}
//เเสดงจำนวนเหรียญในกระเป๋าตัง
function get_coin_in_wellet($u_id,$coin_id)
{
    /* echo "UID=>",$u_id;
    echo "CID=>",$coin_id; */
    $con = conn();
    $sql_get_my_coin = "select u_id, coin_id, amount from my_coin where u_id='$u_id' and coin_id='$coin_id'";
    $rs_coin_data = mysqli_query($con, $sql_get_my_coin);
    if (mysqli_num_rows($rs_coin_data) > 0) {
        $data = mysqli_fetch_assoc($rs_coin_data);
        return number_format($data["amount"], 8);
    } else {
        return "0.00000000";
    }
}



//ยังไม่เสร็จ
function show_sell_order($coin_id)
{
    $con = conn();
    $sql_get_sell_data = "select price,amount from sale_coin where coin_id='$coin_id'";
    $rs_sell_data = mysqli_query($con, $sql_get_sell_data);
    if (mysqli_num_rows($rs_sell_data) > 0) {
        while ($rs_data = mysqli_fetch_assoc($rs_sell_data)) {
            $total = ($rs_data["price"] * $rs_data["amount"]);
            echo "
                <tr>
                    <td class='tr-ask-set-trade-price'>" . number_format($rs_data["price"], 2) . "</td>
                    <td class='tr-ask-set-trade-amount'>" . number_format($rs_data["amount"], 8) . "</td>
                    <td class='tr-ask-set-trade-total'>" . number_format($total, 2) . "</td>
                </tr>
            ";
        }
    } else {
        echo "";
    }
}
//ซื้อเหรียญ
function buy_coin($u_id, $coin_id, $amount, $price, $now_price, $money)
{
    echo "u_id", $u_id,"<br>";
    echo "coin id:", $coin_id,"<br>";
    echo "amount:", $amount,"<br>";
    echo "price:", $price,"<br>";
    echo "now_price", $now_price,"<br>";
    echo "my money:",$money,"<br>"; 
    $ins_amount=$price/$now_price;
    echo "new amount:",$ins_amount,"<br>";
    $con = conn();

    $sql_ins_to_buy_coin="insert into buy_coin(u_id,price,amount,open_price,coin_id) values('$u_id','$price','$ins_amount','$amount','$coin_id')";
    mysqli_query($con, $sql_ins_to_buy_coin);
    $reduce=$money-$price;
    $sql_update_money="update bank_account set money=$reduce where u_id=$u_id";
    $rs_update_mon=mysqli_query($con, $sql_update_money);
    if($rs_update_mon==true){
        buy_coin_now($price,$coin_id, $u_id,$money);
    }else{
        echo "cant update data...";
    }
}

function buy_coin_now($price2,$coin_id,$u_id,$my_mon){
    $con=conn();//ดึงข้อมูลจากตารางขายทั้งหมด
    echo "input price=>>",$price2,"<br>";
    $scl_coin_sale_price="select price, amount, sale_price, u_id from sale_coin where sale_price=$price2";
    $rs_data=mysqli_query($con,$scl_coin_sale_price);
    $ft_buy_data=mysqli_fetch_assoc($rs_data);
    $sale_uid=$ft_buy_data["u_id"];
    $amount=$ft_buy_data["amount"];
    $opn_price=$ft_buy_data["sale_price"];
    //ดึงยอดเงินผู้ขาย
    echo "sale uid==>",$ft_buy_data["u_id"];
    $get_sale_mon_data4="select money from bank_account where u_id=$sale_uid";
    $rs_data4=mysqli_query($con, $get_sale_mon_data4);
    $sale_mon_data4=mysqli_fetch_assoc($rs_data4);
    echo "ยอดเงินผู้ขาย",$sale_mon_data4["money"];
    if($rs_data==true){
        echo "amount==>",$amount,"<br>";
        echo "total==>",$opn_price,"<br>";
        echo "พบราคาขาย","<br>";
        //ดึงจำนวนเหรียญ
        $sql_get_mycoin="select amount from my_coin where coin_id=$coin_id and u_id=$u_id";
        if(mysqli_num_rows(mysqli_query($con,$sql_get_mycoin))>0){
            $ckk_data=mysqli_fetch_assoc(mysqli_query($con,$sql_get_mycoin));
            echo "DATA===>",$ckk_data["amount"];
            $new_amount2=$ckk_data["amount"]+$amount;
            echo "NEW AMOUNR=>>",$new_amount2;
            //เพิ่มจำนวนเหรียญ
            $update_my_coin="update my_coin set amount='$new_amount2' where u_id=$u_id and coin_id=$coin_id";
            mysqli_query($con, $update_my_coin);
            $total22=$price2+$sale_mon_data4["money"];
            echo "Total price:",$total22;
            //เพิ่มจำนวนเงินผู้ขาย
            $upd_my_mon_of_sale="update bank_account set money='$total22' where u_id=$sale_uid";
            mysqli_query($con, $upd_my_mon_of_sale);
            //ลบข้อมูลในตาราง buy coin
            $del_coin_intbl="delete from buy_coin where price=$price2";
            $rs_del_coin=mysqli_query($con, $del_coin_intbl);
            if($rs_del_coin!=true){
                echo "Error",mysqli_error($con);
            }
            //ลบข้อมูลในตาราง sall coin
            $del_coin_intbl1="delete from sale_coin where sale_price=$price2";
            $rs_del_coin=mysqli_query($con, $del_coin_intbl1);
            if($rs_del_coin!=true){
                echo "Error",mysqli_error($con);
            } 
            //เพิ่มข้อมูลไปยังประวัติการสั่งซื้ัอ
            $fmt_opn_price=$opn_price;
            $ins_to_his="insert into tbl_history(u_id,coin,amount,price,total,status) values('$u_id','BTC','$amount','$fmt_opn_price','$fmt_opn_price','1')";
            mysqli_query($con, $ins_to_his); 
        }else{
            $insert_into_my_coin="insert into my_coin(u_id,coin_id,price,amount,open_price) values('$u_id','$coin_id','$opn_price','$amount','$opn_price')";
            mysqli_query($con, $insert_into_my_coin);
        }
    }else{
        echo "ไม่พบราคาขาย";
    }
}

//ขายเหรียญ
function sell_coin($u_id, $num_coin, $sell, $coin_id, $ckk_num_coin, $my_coin)
{
    /* echo "uid:", $u_id, "<br>";
    echo "coin id:",$coin_id,"<br>";
    echo "amount:", $num_coin, "<br>";
    echo "sell:", $sell, "<br>";
    echo "my coin:", $my_coin, "<br>"; */
    $sum = ($num_coin * floatval($sell));
   //echo "total:", $sum, "<br>";
    if($num_coin<="0" or $sell<="0"){
        echo "โปรดตรวจสอบข้อมูลให้ถูกต้อง";
    }else{
        $con = conn();
        $reduc_coin=$my_coin-$num_coin;
        //echo "จำนวนเหรียญที่เหลือ:",$reduc_coin;
        $sql_upd_my_coin="update my_coin set amount=$reduc_coin where u_id=$u_id and coin_id=$coin_id";
        $rs_upd_coin=mysqli_query($con,$sql_upd_my_coin);
        $sql_insert_into_sale="insert into sale_coin(u_id,coin_id,price,amount,sale_price) values('$u_id','$coin_id','$sell','$num_coin','$sum')";
        $rs_ckk_ins_data=mysqli_query($con, $sql_insert_into_sale);
    }
}
function sell_and_buy_coin($sell_price,$price,$u_id, $coin_id,$amount){//ราคาเหรียญ
    $con=conn();//buy coin
    $tbl_buy_coin="select u_id, buy_id, price, amount, open_price, coin_id from buy_coin where coin_id=$coin_id and open_price='$sell_price'";
    $rs_buy_coin=mysqli_query($con,$tbl_buy_coin);
    if(mysqli_num_rows($rs_buy_coin)>0){
        $buy_data=mysqli_fetch_assoc($rs_buy_coin);
        /* echo "u_id",$buy_data["u_id"],"<br>";
        echo "coin_id",$buy_data["coin_id"],"<br>";
        echo "buy_id",$buy_data["buy_id"],"<br>";
        echo "price",$buy_data["price"],"<br>";
        echo "amount",$buy_data["amount"],"<br>";
        echo "open_price",$buy_data["open_price"],"<br>"; */

        $get_my_mon="select money from bank_account where u_id=$u_id";
        $my_mon=mysqli_query($con, $get_my_mon);
        $my_mon_data=mysqli_fetch_assoc($my_mon);
        //echo "my mon:",$my_mon_data["money"],"<br>";
        $upd_mon=$my_mon_data["money"]+$price;
        //echo "Total:",$upd_mon,"<br>";
        $upd_my_mon="update bank_account set money='$upd_mon' where u_id=$u_id";
        $ckk_upd_my_mon=mysqli_query($con,$upd_my_mon);
        if($ckk_upd_my_mon==true){
            $get_my_coin="select amount from my_coin where u_id='$u_id' and coin_id='$coin_id'";
            $rs_my_coin_data=mysqli_query($con,$get_my_coin);
            $my_coin_data=mysqli_fetch_assoc($rs_my_coin_data);
            //echo "amount:",$my_coin_data["amount"],"<br>";
            $new_amount=$my_coin_data["amount"]-$amount;
            //echo "update amount:",$new_amount,"<br>";
            $sql_upd_my_coin="update my_coin set amount='$new_amount' where u_id=$u_id and coin_id=$coin_id";
            $ckk_update_c=mysqli_query($con, $sql_upd_my_coin);
            if($ckk_update_c==true){
                $sql_get_buy_data="select u_id,price,amount,open_price,coin_id from buy_coin where open_price=$sell_price and coin_id=$coin_id";
                $rs_buy_data1=mysqli_query($con, $sql_get_buy_data);
                $rs_buy_data2=mysqli_fetch_assoc($rs_buy_data1);
                /* echo "=================================","<br>";
                echo "buy price data:",$rs_buy_data2["price"],"<br>";
                echo "from u_id:",$rs_buy_data2["u_id"],"<br>";
                echo "amount:",$rs_buy_data2["amount"],"<br>";
                echo "open price:",$rs_buy_data2["open_price"],"<br>";
                echo "coin id:",$rs_buy_data2["coin_id"],"<br>"; */
                //ดึงค่าเงินผู้ขาย
                $buy_u_id=$rs_buy_data2["u_id"];
                $get_my_mon_buy="select money from bank_account where u_id=$buy_u_id";
                $rs_buy_mon1=mysqli_query($con, $get_my_mon_buy);
                $data_buy_mon1=mysqli_fetch_assoc($rs_buy_mon1);
                /* echo "=========","<br>";
                echo "BUY DATA:",$data_buy_mon1["money"]; */
                $buy_total=$data_buy_mon1["money"]+$rs_buy_data2["price"];
                $update_buy_data="update bank_account set money=$buy_total where u_id=$buy_u_id";
                $ckk_upd_buy_coin_data=mysqli_query($con,$update_buy_data);
                if($ckk_upd_buy_coin_data==true){
                    $sql_get_buy_coin_data2="select amount, u_id, coin_id from my_coin where u_id=$buy_u_id and coin_id=$coin_id";
                    $rs_ckk_buy_coin_data2=mysqli_query($con, $sql_get_buy_coin_data2);
                    $buy_coin_data2=mysqli_fetch_assoc($rs_ckk_buy_coin_data2);
                    /* echo "=============================","<br>";
                    echo "amount:",$buy_coin_data2["amount"],"<br>"; */
                    $upd_new_buy_amount2=$buy_coin_data2["amount"]-$amount;
                    //echo "new_amount",$upd_new_buy_amount2;
                    $upd_buy_coin_amount="update my_coin set amount='$upd_new_buy_amount2'";
                    mysqli_query($con,$upd_buy_coin_amount);
                }else{
                    echo "Error",mysqli_error($con);
                }
            }
        }
    }else{
        echo "Error:",mysqli_error($con);
    }
}


