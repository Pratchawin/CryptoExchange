<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/coin_list.css">
    <link rel="stylesheet" href="../style/set_spack.css">
    <link rel="stylesheet" href="../style/upload_news.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/9d0fdde958.js" crossorigin="anonymous"></script>
</head>
<?php
include '../connect_db/condb.php';
?>

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
                <div class="ar-dash-content">
                    <div class="dash-content-list">
                        <div class="ar-dash-title">
                            <h3>เเก้ไขข้อมูลข่าวสาร</h3>
                        </div>
                        <div class="ar-spac">
                        </div>
                        <?php
                        $conn = conndb();
                        @$new_id = $_GET["n_id"];
                        echo "news id:", $new_id;
                        $sql_old_news_data = "select title,link,detail,img_file from news_data where news_id=$new_id";
                        $rs_data = mysqli_query($conn, $sql_old_news_data);
                        $title = '';
                        $link = '';
                        $detail = '';
                        $img_file = '';
                        if (mysqli_num_rows($rs_data) > 0) {
                            $news_data = mysqli_fetch_assoc($rs_data);
                            $title = $news_data["title"];
                            $link = $news_data["link"];
                            $detail = $news_data["detail"];
                            $img_file = $news_data["img_file"];
                        } else {
                            echo "Error", mysqli_error($conn);
                        }
                        ?>
                        <div class="ar-dash-main-content">
                            <div class="ar-form-upd-new-data">
                                <form action="update_news.php" method="get">
                                    <div class="ar-form-upd-new set-form-data">
                                        <p>หัวข้อข่าว:<?php echo $title; ?></p>
                                        <form action="">
                                            <input type="text" name="upd_title" id="" class="inp-new-data">
                                            <input type="text" name="n_id" id="" style="display:none;" value="<?php echo $new_id; ?>">
                                            <input type="submit" value="บันทึก" name="btn_upd_title">
                                            <?php
                                            @$upd_title = $_GET["upd_title"];
                                            if (isset($_GET["btn_upd_title"])) {
                                                $sql_upd_title = "update news_data set title='$upd_title' where news_id=$new_id";
                                                $ckk_update = mysqli_query($conn, $sql_upd_title);
                                                if ($ckk_update == true) {
                                                    echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/backend/dashboard/update_news.php?n_id=$new_id'>";
                                                } else {
                                                    echo "Error";
                                                }
                                            }
                                            ?>
                                        </form>
                                    </div>
                                    <div class="link-to-oth-web set-form-data">
                                        <p>ลิงค์ข้อมูลข่าวสาร:<?php echo $link; ?></p>
                                        <form action="update_news.php" method="get">
                                            <input type="text" name="upd_link" id="" class="inp-new-data">
                                            <input type="text" name="n_id" id="" style="display:none;" value="<?php echo $new_id; ?>">
                                            <input type="submit" value="บันทึก" name="btn_upd_link">
                                            <?php
                                            @$upd_title = $_GET["upd_link"];
                                            if (isset($_GET["btn_upd_link"])) {
                                                $sql_upd_title = "update news_data set link='$upd_title' where news_id=$new_id";
                                                $ckk_update = mysqli_query($conn, $sql_upd_title);
                                                if ($ckk_update == true) {
                                                    echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/backend/dashboard/update_news.php?n_id=$new_id'>";
                                                } else {
                                                    echo "Error";
                                                }
                                            }
                                            ?>
                                        </form>
                                    </div>
                                    <div class="new-detail set-form-data">
                                        <p>ข้อมูลข่าวสาร: <?php echo $detail; ?></p>
                                        <form action="update_news.php" method="get">
                                            <textarea class="txt-inp-news-detail" name="new_detail" id="" cols="30" rows="10"></textarea>
                                            <input type="text" name="n_id" id="" style="display:none;" value="<?php echo $new_id; ?>">
                                            <input type="submit" value="บันทึก" name="btn_upd_dtl">
                                            <?php
                                            @$upd_title = $_GET["new_detail"];
                                            if (isset($_GET["btn_upd_dtl"])) {
                                                $sql_upd_title = "update news_data set detail='$upd_title' where news_id=$new_id";
                                                $ckk_update = mysqli_query($conn, $sql_upd_title);
                                                if ($ckk_update == true) {
                                                    echo "<meta http-equiv='refresh' content='0;url=http://localhost/crypto/backend/dashboard/update_news.php?n_id=$new_id'>";
                                                } else {
                                                    echo "Error";
                                                }
                                            }
                                            ?>
                                        </form>
                                    </div>
                                    <div class="ar-news-image set-form-data">
                                        <p>รูปข้อมูลข่าวสาร:</p>
                                        <div class="">
                                            <img src="../../news_img/<?php echo $img_file; ?>" alt="" width="500px">
                                        </div>
                                        <form action="update_news.php" enctype="multipart/form-data" method="post">
                                            <input type="file" name="upd_img_file" id="">
                                            <input type="text" name="n_id" id="" style="display:none;" value="<?php echo $new_id; ?>">
                                            <input type="submit" value="บันทึก" name="btn_upd_img_file">
                                            <?php
                                            @$file_name = $_FILES["upd_img_file"]["name"];
                                            @$file_tmp = $_FILES['upd_img_file']['tmp_name'];
                                            $new_file_name = $file_name;
                                            if (isset($_GET["btn_upd_img_file"])) {
                                                move_uploaded_file($file_tmp, "../../news_img/" . $new_file_name);
                                                $sql_upd_title = "update news_data set img_file='$new_file_name' where news_id='$new_id'";
                                                $ckk_update = mysqli_query($conn, $sql_upd_title);
                                            }
                                            ?>
                                        </form>
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