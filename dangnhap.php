<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <title>Đăng Nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/loader.gif">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/javascript.js"></script>
    <style>
        .social {
            position: fixed;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            z-index: 2;
        }

        .social a {
            display: block;
            text-align: center;
            padding: 16px;
            transition: all 0.3s ease;
            color: white;
            font-size: 20px;
            background-color: #dc3545;
        }
        .social a:hover {
            background-color: #c91e1e;
        }
    </style>
</head>

<body>
    <!-- Pre Loader -->
    <div class="load"">
        <img src="images/loader.gif">
    </div>
    <div class="social">
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="google"><i class="fa fa-google"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="youtube"><i class="fa fa-youtube"></i></a>
    </div>
    <?php
    require_once("connection.php");
    if (isset($_POST["btn_submit"])) {
        $username = $_POST["username"];
        $password = $_POST["pwd"];
        $username = addslashes(strip_tags($username));
        $password = addslashes(strip_tags($password));
        if ($username == "" || $password == "") {
            echo"Không được bỏ trống thông tin";
        }
        else {
            $sql = "select * from users where username = '$username' and password = '$password'";
            $check = mysqli_query($conn,$sql);
            if (mysqli_num_rows($check) == 0) {
                echo '<div class="alert alert-danger alert-dismissible fade show" style="position: fixed;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Tài khoản hoặc mật khẩu sai!
              </div>';
            }
            else {
                $result = mysqli_fetch_array($check);
                $_SESSION['name'] = $result['name'];
                $_SESSION['phonenum'] = $result['phonenum'];
                $_SESSION['username'] = $username;
                $_SESSION['votes'] = $result['votes'];
                header('Location: index.php');
            }
        }
    }
    ?>
    <nav class="navbar sticky-top navbar-expand-lg px-5" style="background-color:#e9ecef">
            <a href="index.php"><img src="images/logo.png" class="navbar-brand" style="height:70px;width:auto"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars fa-2x"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto" style="font-size: 1.5rem">
                    <li class="nav-item active">
                        <a class="nav-link text-danger p-2" href="index.php"><b>Trang Chủ</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger p-2" href="dangnhap.php"><b>Thể Lệ</b></a>
                    </li>
                    <?php 
                    if (!isset($_SESSION['username'])) {

                    echo'<li class="nav-item">
                        <a class="nav-link text-danger p-2" href="dangky.php"><b>Đăng Ký</b></a>
                    </li>';
                    
                    echo'<li class="nav-item">
                        <a class="nav-link text-danger p-2" href="dangnhap.php"><b>Đăng Nhập</b></a>
                    </li>';
                    }
                    else {
                        echo'<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-danger p-2" href="#" id="navbarDropdown" role="button" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>' . $_SESSION['name'] . ' </b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="account.php">Thông tin cá nhân</a>
                                <a class="dropdown-item" href="dangxuat.php">Đăng xuất</a>
                            </div>
                        </li>';
                    }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" id="searchBox" type="search" placeholder="Nhập tên thí sinh" aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>
    </nav>
    <div class="jumbotron"">
        <div class="text-center">
            <h1 class="text-danger"><b>MISS TEEN VIETNAM</b></h1>
            <h2 class="text-danger">ĐĂNG NHẬP</h2>
        </div>
    </div>
        <div class="container" style="width: 600px;">
            <form action="dangnhap.php" method="POST">
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" class="form-control" style="width: 600px;" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" style="width: 600px;" name="pwd" id="pwd" required>
                </div>
                <div class="form-group my-4" style="text-align: center;">
                    <button type="submit" class="btn btn-danger mb-3" name="btn_submit">Đăng Nhập</button>
                    <p>Chưa có tài khoản?<a href="./dangky.php"> Đăng ký ngay!</a></p>
                    <p>Quên mật khẩu?<a href="#"> Tìm lại mật khẩu.</a></p>
                </div>
            </form>
        </div>
</body>

</html>