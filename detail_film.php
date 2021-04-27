<?php 
    $title = "Phim hay";
    require_once("header.php");
    $server = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "db_movies";

    $conn = mysqli_connect($server, $username, $password, $dbname);
    $query = "SELECT * FROM tbl_films";
    $result = mysqli_query($conn, $query);
    $r=mysqli_fetch_assoc($result);
      
?>
<div class="section" style="padding-top: 2.5em">
    <div class="container-detail" style="padding-left: 10em ; ">
        <div class="detail-movie">
            <div class="watch-area">
                <video width="100%" height="50%" controls autoplay>
                    <source src="assets/video/film122-1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="rating-area">
                <p style="color: #777">Đánh giá phim: </p>
                <input type="radio" name="rate" id="rate-1">
                <label for="rate-1" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-2">
                <label for="rate-2" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-3">
                <label for="rate-3" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-4">
                <label for="rate-4" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-5">
                <label for="rate-5" class="fa fa-star"></label>
            </div>
            <div class="infor-film">
                <h2><?=$r['name']?></h2>
                <p>Lượt xem: <?=$r['num_view']?></p>
                <div class="film-infor-tab">
                    <p id = "infor" class = "btn-infor">Thông tin</p>
                    <p id = "comment" class = "btn-comment" style = "margin-left: 20px; cursor: pointer;">Bình luận</p>
                </div>
                <hr class = "style-one">
                <?php
                      $nation_id = $r['nation_id'];
                      $sql = "select * from tbl_nations where `id` = '$nation_id'";
                      $query=mysqli_query($conn,$sql);
                      $r2=mysqli_fetch_assoc($query);
                ?>
                <div class="film-content">
                    <p>Quốc gia: <?=$r2['name']?></p>
                    <p>Năm sản xuất: <?=$r['year']?></p>
                    <p>Chất lượng: <?=$r['quality']?></p>
                    <p>Âm thanh: <?=$r['subtitle']?></p>
                    <p>Thời lượng: <?=$r['duration']?> phút</p>
                    <p>Trạng thái: <?=$r['status']?></p>
                    <p>Tên khác: <?=$r['sub_name']?></p>
                    <?php
                        $category_id = $r['category_id'];
                        $sql = "select * from tbl_categories where `id` = '$category_id'";
                        $query=mysqli_query($conn,$sql);
                        $r3=mysqli_fetch_assoc($query);
                    ?>
                    
                    <p>Thể loại: <a href="category_detail.php" class = "category-redirect">Phim <?=$r3['name']?></a></p>
                    <p style="margin-top: 10px;"><?=$r['description']?></p>
                </div>
                <div class="film-comment">
                    <p>Éo có bình luận nào :v</p>
                </div>
            </div>
        </div>
        <div class="side-bar">
            <div class="film-side-bar">
                <a href="#" class="left"><img src="assets/images/images-grid/hainguoixala.jpg" alt=""></a>
                <div class="info-film-side-bar">
                    <a href="#">Hai người xa lạ</a>
                    <p>97 phút</p>
                    <p>1.4K lượt xem</p>
                </div>
            </div>
            <div class="film-side-bar">
                <a href="#" class="left"><img src="assets/images/images-grid/hainguoixala.jpg" alt=""></a>
                <div class="info-film-side-bar">
                    <a href="#">Hai người xa lạ</a>
                    <p>97 phút</p>
                    <p>1.4K lượt xem</p>
                </div>
            </div>
            <div class="film-side-bar">
                <a href="#" class="left"><img src="assets/images/images-grid/hainguoixala.jpg" alt=""></a>
                <div class="info-film-side-bar">
                    <a href="#">Hai người xa lạ</a>
                    <p>97 phút</p>
                    <p>1.4K lượt xem</p>
                </div>
            </div>
            <div class="film-side-bar">
                <a href="#" class="left"><img src="assets/images/images-grid/hainguoixala.jpg" alt=""></a>
                <div class="info-film-side-bar">
                    <a href="#">Hai người xa lạ</a>
                    <p>97 phút</p>
                    <p>1.4K lượt xem</p>
                </div>
            </div>
            <div class="film-side-bar">
                <a href="#" class="left"><img src="assets/images/images-grid/hainguoixala.jpg" alt=""></a>
                <div class="info-film-side-bar">
                    <a href="#">Hai người xa lạ</a>
                    <p>97 phút</p>
                    <p>1.4K lượt xem</p>
                </div>
            </div>
            <div class="film-side-bar">
                <a href="#" class="left"><img src="assets/images/images-grid/hainguoixala.jpg" alt=""></a>
                <div class="info-film-side-bar">
                    <a href="#">Hai người xa lạ</a>
                    <p>97 phút</p>
                    <p>1.4K lượt xem</p>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("infor").addEventListener("click", function() {
        document.querySelector(".film-comment").style.display = "none";
        document.querySelector(".film-content").style.display = "block";
        document.querySelector(".btn-infor").style = "border-bottom: 2px solid #40a5ca; ";
        document.querySelector(".btn-comment").style = "border: none; margin-left: 20px;cursor: pointer;";
    })
    document.getElementById("comment").addEventListener("click", function() {
        document.querySelector(".film-content").style.display = "none";
        document.querySelector(".film-comment").style.display = "block";
        document.querySelector(".btn-comment").style = "border-bottom: 2px solid #40a5ca; margin-left: 20px; ";
        document.querySelector(".btn-infor").style = "border: none";
    })
</script>
<?php require_once 'footer.php'; ?>