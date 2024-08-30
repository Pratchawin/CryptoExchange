<?php
    function conn(){
        $servername = "localhost";
        $username = "root";
        $password = "123456";
        $dbname = "crypto_db";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        return $conn;
    }
?>