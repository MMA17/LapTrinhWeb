<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <title>Đăng Nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
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
                '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Đăng nhập thành công!!!
                </div>';
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
        <div class="jumbotron text-center">
            <h1 class="text-danger"><b>MISS TEEN VIETNAM</b></h1>
            <h2 class="text-danger">ĐĂNG NHẬP</h2>
        </div>
        <div class="container" style="width: 600px;">
            <form action="dangnhap.php" method="POST">
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" class="form-control" style="width: 600px;" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label>Mật Khẩu</label>
                    <input type="password" class="form-control" style="width: 600px;" name="pwd" id="pwd" required>
                </div>
                <div class="form-group my-4" style="text-align: center;">
                    <button type="submit" class="btn btn-danger mb-3" name="btn_submit">Đăng Nhập</button>
                    <p>Chưa có tài khoản?<a href="./dangky.php"> Đăng ký ngay!</a></p>
                </div>
            </form>
        </div>
</body>

</html>