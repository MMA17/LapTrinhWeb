<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<html>

<head>
    <title>Quản lý thí sinh</title>
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
    <div class="jumbotron text-center">
        <h1 class="text-danger"><b>MISS TEEN VIETNAM</b></h1>
        <h2 class="text-danger">QUẢN LÝ THÍ SINH</h2>
    </div>
    <div class="container" style="width: 600px;">
        <form action="admin.php" method="POST">
            <div class="form-group">
                <label for="username">Tên tài khoản</label>
                <input type="text" class="form-control" style="width: 600px;" name="username" id="username" required>
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
</body>

</html>