<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["name"]);
header("Location:dangnhap.php");
?>