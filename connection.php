<?php
    $server_username = "hoangviet";
    $server_password ="password";
    $server_host = "103.69.194.221";
    $server_dbname = "ltweb";

    $conn = mysqli_connect($server_host,$server_username,$server_password,$server_dbname) or die ("Chưa kết nối được DataBase");
?>
