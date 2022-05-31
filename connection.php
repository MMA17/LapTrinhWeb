<?php
    $server_username = "hoangviet";
    $server_password ="123456";
    $server_host = "103.69.194.222";
    $server_dbname = "ltweb";

    $conn = mysqli_connect($server_host,$server_username,$server_password,$server_dbname) or die ("Chưa kết nối được DataBase");
?>
