<!DOCTYPE html>
<?php
    session_start();
?>
<html>

<head>
    <title>MISS TEEN VIETNAM 2021</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/loader.gif">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/javascript.js"></script>
</head>

<body>
    <!-- Pre Loader -->
    <div class="load">
        <img src="images/loader.gif">
    </div>

    <!-- Image Modal - Phong to anh  -->
    <div id="myModal" class="modal" onclick="this.style.display='none'">
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    
    <div class="modal fade" id="voteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Chúc mừng bạn đã bình chọn thành công!</h4>
                </div>
                <div class="modal-body">
                    <p>Cám ơn bạn đã tham gia chương trình.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>        
        </div>
    </div>

    <div class="social">
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="google" target="_blank"><i class="fa fa-google"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/MISS-TEEN-VietNam-102237985334298" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>
    </div>
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
                <form action="timkiem.php" class="form-inline my-2 my-lg-0" method="POST">
                    <input class="form-control mr-sm-2" id="searchBox" name="searchBox" type="search" placeholder="Nhập tên thí sinh" aria-label="Search" required>
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="btn_submit">Tìm kiếm</button>
                </form>
            </div>
    </nav>
    <div class="jumbotron">
        
        <div class="text-center">
            <h1 class="text-danger"><b>MISS TEEN VIETNAM</b></h1>
            <p>Chào mừng bạn đến với cuộc thi Next Top Model Việt Nam!!!<br> Bình chọn cho thí sinh bạn yêu thích! Hoặc đăng ký tham gia chương trình ngay.</p>

            <a href="./dangky.php"><button class="btn btn-danger mt-3 px-4"><b>Tham gia ngay!</b></button></a>
        </div>
    </div>
    <div class="container">
    <?php 
        if (isset($_SESSION['name'])) {
            echo "<h5 class='text-danger'style='display:inline-block'> Xin Chào, ";
            echo $_SESSION['name'] . "! ";
            echo "Bạn đang có <b><u>" . $_SESSION['votes'] . "</u></b> lượt bình chọn.";
            echo "</h5>";
        }    
    ?>
    </div>
    <?php 
        require_once("connection.php");
        // Phan trang cho website
        $result = mysqli_query($conn, 'select count(username) as total from users');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 9;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $result = mysqli_query($conn, "SELECT users.username, users.name, users.bio, images.path, images.votes FROM users INNER JOIN images 
                                        ON users.username=images.username LIMIT $start, $limit");
 
    ?>
    <div class="container my-3">
        <form>
            <select name="users" onchange="showUser(this.value)">
                    <option value="">Sắp xếp theo:</option>
                    <option value="1">Số lượt bình chọn tăng dần</option>
                    <option value="2">Số lượt bình chọn giảm dần</option>
            </select>
        </form>
    </div>
    <div id="sortVote">
    <div class="container row m-auto">
            <?php
            // Render ra users trong db
                if (!$result) {
                    echo "Không connect được DB " . mysqli_error($conn);
                }
                else {
                    while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="card border-light col-md-4 bg-white mt-3">';
                    echo "<img class=\"card-img-top myImg\" src=\"" . $row['path'] . "\" style=\"width: 100%; height: 400px\">";
                    echo '<div class="card-body">';
                    echo '<h4>' . $row['name'] . '</h4>';
                    echo '<p class="card-text">' . $row['bio'] .  '</p>';
                    echo '<button class="btn btn-danger vote" data-toggle="modal" data-target="#voteModal">Bình chọn</button>';
                    echo '<button class="btn btn-light ml-3">' . $row['votes'] . '</button> <span>Bình chọn</span> ';
                    echo '</div></div>';
                    }
                }
                
            ?>
    </div>
    <div class="pagination my-5" style="margin-left: 48%;">
           <?php 
           // Danh so cho trang
            if ($current_page > 1 && $total_page > 1){
                echo '<li class="page-item"><a class="page-link text-danger" href="index.php?page='.($current_page-1).'">Previous</a></li>';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<li class="page-item"><a class="page-link text-danger">'  . $i .  '</a></li>';
                }
                else{
                    echo '<li class="page-item"><a class="page-link text-danger" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<li class="page-item"><a class="page-link text-danger" href="index.php?page=' . ($current_page+1) . '">Next</a></li>';
            }
           ?>
    </div>
    </div>
    <script>
        // Image Modal
        var modal = document.getElementById("myModal");
        // Get the image and insert it inside the modal
        var img = document.getElementsByClassName("myImg");
        var modalImg = document.getElementById("img01");
        //var captionText = document.getElementById("caption");
        var l = document.getElementsByClassName("myImg").length;
        for (var i = 0; i < l; i++) {
            img[i].onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
            }
        }
        function showUser(str) {
        if (str == "") {
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sortVote").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET","sortVote.php?q="+str,true);
            xmlhttp.send();
        }
        }
    </script>
</body>
<footer class="container-fluid bg-light">
    <div>
        <p class="text-center p-5">Có bất kỳ thắc mắc gì hãy liên hệ ban quản lý chương trình!<br>2020-2021</p>
    </div>
</footer>

</html>