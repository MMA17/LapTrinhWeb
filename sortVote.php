<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
        require_once("connection.php");
        $q = intval($_GET['q']);
        if ($q == 1) {
            $q = "ASC";
        }
        else {
            $q = "DESC";
        }
        if (!$conn) {
        die('Could not connect: ' . mysqli_error($con));
        }
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
        $sql="SELECT users.username, users.name, users.bio, images.path, images.votes FROM users INNER JOIN images ON users.username=images.username 
        ORDER BY votes " . $q . " LIMIT $start, $limit";
        $result = mysqli_query($conn,$sql);
    ?>
    <div class="container row m-auto" id="txtHint">
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
    </script>
</body>
</html>