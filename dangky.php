<!DOCTYPE html>
<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
if (isset($_SESSION['username'])) {
    header('Location: account.php');
}
?>
<html>

<head>
    <title>Đăng ký tài khoản</title>
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
        // Kiểm tra có dữ liệu imageupload trong $_FILES không
        // Nếu không có thì dừng
        // if (!isset($_FILES["imageupload"])) {
        //     echo "Dữ liệu không đúng cấu trúc";
        //     die;
        // }
        // Kiểm tra dữ liệu có bị lỗi không
        if ($_FILES["imageupload"]['error'] != 0) {
            echo "Dữ liệu upload bị lỗi";
            die;
        }
        // Đã có dữ liệu upload, thực hiện xử lý file upload
        //Thư mục bạn sẽ lưu file upload
        $target_dir    = "uploads/";
        //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
        $target_file   = $target_dir . basename($_FILES["imageupload"]["name"]);
        $allowUpload   = true;
        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Cỡ lớn nhất được upload (bytes)
        $maxfilesize   = 800000;
        //Những loại file được phép upload
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
        //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
        $check = getimagesize($_FILES["imageupload"]["tmp_name"]);
        if ($check !== false) {
            $allowUpload = true;
        } else {
            echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Sai định dạng ảnh.
              </div>';
            $allowUpload = false;
        }
        // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
        // Bạn có thể phát triển code để lưu thành một tên file khác
        if (file_exists($target_file)) {
            echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Đổi tên file ảnh.
              </div>';
            $allowUpload = false;
        }
        // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
        if ($_FILES["imageupload"]["size"] > $maxfilesize) {
            echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              File ảnh quá lớn.
              </div>';
            $allowUpload = false;
        }
        // Kiểm tra kiểu file
        if (!in_array($imageFileType, $allowtypes)) {
            echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              File không đúng định dạng!!!
              </div>';
            $allowUpload = false;
        }
        if ($allowUpload) {
            if (move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_file)) {
                $username = $_POST["username"];
                $password = $_POST["pwd"];
                $name = $_POST["name"];
                $phonenum = $_POST["phonenumber"];
                if ($username == "" || $password == "" || $name == "" || $phonenum == "") {
                    echo "Không được bỏ trống thông tin!";
                } else {
                    // kiem tra tai khoan ton tai hay chua
                    $sql = "select * from users where username='$username'";
                    $check = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($check) > 0) {
                        echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Tài khoản đã tồn tại.
                        </div>';
                    } else {
                        $sql = "INSERT INTO users 
                    (username,password,name,phonenum,image) 
                    values 
                    ('$username','$password','$name','$phonenum','$target_file')";
                        mysqli_query($conn, $sql);
                        echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Đăng ký tài khoản thành công! <br> Bạn có thể đăng nhập ngay bây giờ.
                            </div>';
                    }
                }
            }
        }
    }
    ?>
    <div class="jumbotron text-center">
        <h1 class="text-danger"><b>MISS TEEN VIETNAM</b></h1>
        <h2 class="text-danger">ĐĂNG KÝ TÀI KHOẢN</h2>
    </div>
    <div class="container" style="width: 600px;">
        <form action="dangky.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" class="form-control" style="width: 600px;" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="password" class="form-control" style="width: 600px;" name="pwd" id="pwd" required>
            </div>
            <div class="form-group">
                <label for="name">Họ và Tên: </label>
                <input type="text" class="form-control" style="width: 600px;" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="phonmenumber">Số Điện Thoại: </label>
                <input type="tel" class="form-control" style="width: 600px;" name="phonenumber" id="phonenumber" required>
            </div>
            <div class="form-group">
                <label for="image">Chọn ảnh đại diện:</label>
                <input type="file" class="form-control" style="width: 600px;" name="imageupload" id="imageupload" required>
            </div>
            <div class="form-group" style="text-align: center;">
                <button type="submit" class="btn btn-danger m-3" name="btn_submit">Đăng Ký</button>
                <p>Đã có tài khoản?<a href="./dangnhap.php"> Đăng nhập ngay!</a></p>
            </div>

        </form>
    </div>
</body>

</html>