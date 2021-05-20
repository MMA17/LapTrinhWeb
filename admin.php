<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<html>

<head>
    <title>Quản lý thí sinh</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/loader.gif">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="social">
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="google"><i class="fa fa-google"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="youtube"><i class="fa fa-youtube"></i></a>
    </div>
    <?php
    require_once("connection.php");
    if (isset($_POST['btn_submit'])) {
        $username  = $_POST['username'];
        $username = trim(addslashes(strip_tags($username)));
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $check = mysqli_query($conn, $sql);
        if (mysqli_num_rows($check) == 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" style="position: fixed;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Xóa thất bại!
                    </div>';
        } else {
            $sql = "DELETE FROM users WHERE username = '$username'";
            mysqli_query($conn,$sql);
            echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Xóa thành công!
                    </div>';
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
    <div class="jumbotron text-center">
        <h1 class="text-danger"><b>MISS TEEN VIETNAM</b></h1>
        <h2 class="text-danger">QUẢN LÝ THÍ SINH</h2>
    </div>
    <div class="container" style="width: 800px;">
    <input id="searchUser" type="text" class="form-control" style="width: 800px;" placeholder="Tìm kiếm thí sinh theo tên, số điện thoại,..."><br>
        <form action="admin.php" method="POST">
            <div class="form-group">
                <label for="username">Tên tài khoản:</label>
                <input type="text" class="form-control" style="width: 800px;" name="username" id="username" required>
            </div>
            <div class="form-group my-4" style="text-align: center;">
                <button type="submit" class="btn btn-danger mb-3" name="btn_submit">Xóa</button>
            </div>
        </form>
        <?php
        require_once("connection.php");
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($connection));
            exit();
        }
        echo "<table class=\"table table-bordered table-striped table-hover\" style=\"width: 100%\">";
        echo '<thead><tr><th>Tên tài khoản</th><th>Tên thí sinh</th><th>Số điện thoại</th><th>Đường dẫn ảnh</th></tr></thead>';
        echo "<tbody id = \"myTable\" >";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>" . $row['username'] . "</td><td>" . $row['name'] . "</td><td>" . $row['phonenum'] . "</td><td>" . $row['image'] . "</td></tr>";
        }
        echo "</tbody></table>";
        ?>
    </div>
    <script>
        $(document).ready(function() {
            $("#searchUser").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>