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
                            <h3>อัปโหลดข้อมูลข่าวสาร</h3>
                        </div>
                        <div class="ar-spac">
                        </div>
                        <div class="ar-dash-main-content">
                            <div class="ar-form-upd-new-data">
                                <form action="upload_news.php" enctype="multipart/form-data" method="post">
                                    <div class="ar-form-upd-new set-form-data">
                                        <p>หัวข้อข่าว:</p>
                                        <input type="text" name="title" id="" class="inp-new-data">
                                    </div>
                                    <div class="link-to-oth-web set-form-data">
                                        <p>ลิงค์ข้อมูลข่าวสาร:</p>
                                        <input type="text" name="link" id="" class="inp-new-data">
                                    </div>
                                    <div class="new-detail set-form-data">
                                        <p>ข้อมูลข่าวสาร:</p>
                                        <textarea class="txt-inp-news-detail" name="new_detail" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="ar-news-image set-form-data">
                                        <p>รูปข้อมูลข่าวสาร:</p>
                                        <input type="file" name="news_img" id="">
                                    </div>
                                    <div class="ar-btn-upload-news set-form-data">
                                        <input type="submit" class="btn-upd-new" name="btn_upd_news" value="อัปโหลด">
                                        <input type="submit" class="btn-cl-new" value="ยกเลิก">
                                    </div>
                                </form>
                                <?php
                                @$title = $_POST["title"];
                                @$link = $_POST["link"];
                                @$new_detail = $_POST["new_detail"];
                                @$file_name = $_FILES["news_img"]["name"];
                                @$file_tmp = $_FILES['news_img']['tmp_name'];
                                //echo "News file name:",$file_name;

                                if (isset($_POST["btn_upd_news"])) {
                                    $conn = conndb();
                                    $t = time();
                                    $fmt_file_name = $t . $file_name;
                                    $sql_create_news = "insert into news_data(title,link,detail,img_file) values('$title','$link','$new_detail','$fmt_file_name')";
                                    $rs_data = mysqli_query($conn, $sql_create_news);
                                    move_uploaded_file($file_tmp, "../../news_img/" . $fmt_file_name);
                                    if ($rs_data == true) {
                                        echo "<div class='ar-btn-upload-news set-form-data'><p style='color:green;'>****อัปโหลดข้อมูลข่าวสารเรียบร้อย****</p></div>";
                                        echo "<meta http-equiv='refresh' content='3;url=http://localhost/crypto/backend/dashboard/news_all.php'>";
                                    } else {
                                        echo "Error", mysqli_error($conn);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>