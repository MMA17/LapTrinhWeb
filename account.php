<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: dangnhap.php');
}
?>
<html>

<head>
  <title>NEXT TOP MODEL - Tài khoản</title>
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
  <?php
  require_once("connection.php");
  if (isset($_POST["btn_submit"])) {
    // Kiểm tra có dữ liệu imageupload trong $_FILES không
    // Nếu không có thì dừng
    if (!isset($_FILES["imageupload"])) {
      echo "Dữ liệu không đúng cấu trúc";
      die;
    }
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
      // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
      if (move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_file)) {
        $name = $_POST["name"];
        $phonenum = $_POST["phonenum"];
        $username =  $_SESSION["username"];
        $name = addslashes(strip_tags($name));
        $phonenum = addslashes(strip_tags($phonenum));
        $sql = "UPDATE users SET name = '$name', phonenum = '$phonenum', image = '$target_file' WHERE username = '$username'";
    mysqli_query($conn, $sql);
        echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Cập nhật thông tin thành công!!!
            </div>';
      } else {
        echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Cập nhật ảnh đại diện thất bại!!!
            </div>';
      }
    } else {
      echo '<div class="alert alert-success alert-dismissible fade show" style="position: fixed;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            File ảnh không đúng định dạng hoặc quá lớn!!!
            </div>';
    }
  }
  ?>
  <div class="jumbotron text-center">
    <h1 class="text-danger"><b>NEXT TOP MODEL</b></h1>
    <h2 class="text-danger">Thông tin tài khoản</h2>
  </div>
  <div class="container" style="width: 600px;">
    <?php
    if (isset($_SESSION['username'])) {
      echo " <h4 class='text-danger'>Xin chào, ";
      echo $_SESSION['name'];
      echo "! </h4>";
    }
    ?>
    <form action="account.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Họ và Tên:</label>
        <input type="text" class="form-control" style="width: 600px;" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="phonenum">Số Điện Thoại:</label>
        <input type="tel" class="form-control" style="width: 600px;" name="phonenum" id="phonenum" value="<?php echo $_SESSION['phonenum']; ?>" required>
      </div>
      <div class="form-group">
        <label for="image">Chọn ảnh đại diện:</label>
        <input type="file" class="form-control" style="width: 600px;" name="imageupload" id="imageupload" required>
      </div>
      <div class="form-group" style="text-align: center;">
        <button type="submit" class="btn btn-danger" name="btn_submit">Cập nhật</button>
        <a href="dangxuat.php" class="btn btn-danger">Đăng Xuất</a>
      </div>
    </form>
  </div>

</body>

</html>