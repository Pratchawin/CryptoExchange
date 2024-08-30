<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
include '../conn/con_db.php';
$con = conn();
$u_id = $_GET["u_id"];
$sql_get_user_data = "select name, addr, phone, email from tbl_user_data where u_id=$u_id";
$rs_data = mysqli_query($con, $sql_get_user_data);
$data = mysqli_fetch_assoc($rs_data);
$t = date('d/m/y');
$name = $data["name"];
$addr = $data["addr"];
$rand_num=rand(1,100);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div>
        <div border="1">
            <div>
                <table>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h3>ใบเสร็จรับเงิน/ใบกำกับภาษี</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><b>วันที่:</b> <?php echo $t; ?></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><b>เลมที่:</b>00<?php echo $rand_num;?></td>
                        <td style="text-align: right;"><b>เลขที่:</b>RC928</td>
                    </tr>
                    <tr>
                        <td style="margin-top:10px;"><b>ชื่อผู้ขาย:</b> บริษัท ดอทเทรด</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>ที่อยู่:</b>เลขที่ 19/5 ม.2 ต.ควนรู อ.รัตภูมิ จ.สงขลา</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>เลขประจำตัวผู้เสียภาษี:</b>01234567890123</td>
                        <td><b>โทรศัพท์:</b>0980198795</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="margin-top:10px;"><b>ชื่อผู้ซื้อ:</b><?php echo $name; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>ที่อยู่:</b> <?php echo $addr; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>เลขประจำตัวผู้เสียภาษี:</b>1092300098712</td>
                        <td><b>โทรศัพท์:</b>0812322222</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <table border="1" style="margin-top:10px;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ลำดับ</th>
                            <th style="text-align: center;">รายการ</th>
                            <th>จำนวน</th>
                            <th style="text-align: center;">หน่วยละ</th>
                            <th style="text-align: center;">จำนวนเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = conn();
                        $sql_get_his_data = "select coin, amount, price, total from tbl_history where status=1 and u_id=$u_id";
                        $rs_his = mysqli_query($con, $sql_get_his_data);
                        $tt=0;
                        if (mysqli_num_rows($rs_his) > 0) {
                            $i=0;
                            while ($his_data = mysqli_fetch_assoc($rs_his)) {
                                $i+=1;
                                $coin = $his_data["coin"];
                                $amount = $his_data["amount"];
                                $price = number_format($his_data["price"],2);
                                $total = number_format($his_data["total"]);
                                $tt+=$his_data["price"];
                                $vat=($tt*7)/100;
                                $vat_total=$vat+$tt;
                                echo "
                                    <tr>
                                        <td style='padding:4px; text-align:center;'>$i</td>
                                        <td style='padding:4px;'>buy $coin</td>
                                        <td style='padding:4px;'>$amount</td>
                                        <td style='padding:4px;'>$price</td>
                                        <td style='padding:4px;'>$price</td>
                                    </tr>
                                ";
                            }
                        } else {
                            echo "Error",mysqli_error($con);
                        }
                        ?>
                    </tbody>
                </table>
                <div>
                    <table style="margin-top: 10px;">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>มูลค่ารวมก่อนเสียภาษี</td>
                            <td><?php echo number_format($tt,2);?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>ภาษีมูลค่าเพิ่ม (VAT)</td>
                            <td><?php echo number_format($vat,2);?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>ยอดรวม</td>
                            <td><?php echo number_format($vat_total,2);?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>