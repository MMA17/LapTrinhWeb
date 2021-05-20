<?php
    $server_username = "root";
    $server_password ="";
    $server_host = "localhost";
    $server_dbname = "ltweb1";

    $conn = mysqli_connect($server_host,$server_username,$server_password,$server_dbname) or die ("Chưa kết nối được DataBase");
?>