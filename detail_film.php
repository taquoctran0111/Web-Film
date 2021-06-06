<?php
include('./autoload/Autoload.php');
include './config/config2.php';
$title = "Phim hay";
require_once("header.php");

if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];
}
$sql_detail_film = "SELECT * FROM tbl_films WHERE id = '$film_id'";
$query_detail_film = mysqli_query($conn, $sql_detail_film);
$r_detail_film = mysqli_fetch_assoc($query_detail_film);

$nation_id = $r_detail_film['nation_id'];
$sql_nation = "SELECT * FROM tbl_nations WHERE id = '$nation_id'";
$query_nation = mysqli_query($conn, $sql_nation);
$r_nation = mysqli_fetch_assoc($query_nation);

$sql_category = "SELECT tbl_categories.name, tbl_categories.id FROM tbl_categories INNER JOIN tbl_listcategory ON tbl_categories.id = tbl_listcategory.category_id AND tbl_listcategory.film_id = '$film_id'";
$r_category = $DB->query($sql_category);

$sql_category_id = "SELECT category_id FROM tbl_listcategory WHERE film_id = '$film_id'";
$r_categor_id = $DB->query($sql_category_id);
$category_id = $r_categor_id[0]->category_id;

$sql_same_movie = "SELECT * FROM tbl_films JOIN tbl_listcategory ON tbl_films.id = tbl_listcategory.film_id AND tbl_listcategory.category_id = '$category_id' LIMIT 6";
$same_movie = $DB->query($sql_same_movie);

$sqlComment = "SELECT * FROM tbl_comments WHERE film_id = '$film_id'";
$queryComment = mysqli_query($conn, $sqlComment);

if(Auth::customer()){
    $user_name = Auth::customer()->fullname;
}
else{
    $user_name = "Khách";
}
?>
<div class="section" style="padding-top: 2.5em">
    <div class="container-detail" style="padding-left: 10em ; ">
        <div class="detail-movie">
            <div class="watch-area">
                <video width="100%" height="50%" controls autoplay>
                    <source src="<?= $r_detail_film['video'] ?>" type="video/mp4">
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
                <h2><?= $r_detail_film['name'] ?></h2>
                <p>Lượt xem: <?= $r_detail_film['num_view'] ?></p>
                <div class="film-infor-tab">
                    <p id="infor" class="btn-infor">Thông tin</p>
                    <p id="comment" class="btn-comment" style="margin-left: 20px; cursor: pointer;">Bình luận</p>
                </div>
                <hr class="style-one">
                <div class="film-content">
                    <p>Quốc gia: <?= $r_nation['name'] ?></p>
                    <p>Năm sản xuất: <?= $r_detail_film['year'] ?></p>
                    <p>Chất lượng: <?= $r_detail_film['quality'] ?></p>
                    <p>Âm thanh: <?= $r_detail_film['subtitle'] ?></p>
                    <p>Thời lượng: <?= $r_detail_film['duration'] ?> phút</p>
                    <p>Trạng thái: <?= $r_detail_film['status'] ?></p>
                    <p>Tên khác: <?= $r_detail_film['sub_name'] ?></p>
                    <p>Thể loại: <?php foreach ($r_category as $value) : ?> <a href="category_detail.php?category_id=<?= $value->id ?>" class="category-redirect">
                                <?php
                                        echo $value->name;
                                ?></a>,
                        <?php endforeach; ?>
                    <p style="margin-top: 10px;"><?= $r_detail_film['description'] ?></p>
                </div>
                <form method="POST" id="commentForm" class="film-comment">
                    <input type="hidden" name="filmid" id="filmid" value="<?php echo $film_id ?>" />
                    <input type="hidden" name="name" id="name" value="<?php echo $user_name ?>" />
                    <div class="send-comment">
                        <img src="assets/images/user.png" alt="" style="width: 9%;">
                        <input type="text" id="comment" name="comment" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="commentId" id="commentId" value="0" />
                        <button type="submit" name="submit" id="submit" hidden></button>
                    </div>
                    <div id="showComments"></div>
                </form>

            </div>
        </div>
        <div class="side-bar">
            <?php foreach ($same_movie as $value1) : ?>
                <div class="film-side-bar">
                    <a href="detail_film.php?film_id=<?= $value1->id ?>" class="left"><img src="<?= $value1->image_horizontal ?>" alt=""></a>
                    <div class="info-film-side-bar">
                        <a href="detail_film.php?film_id=<?= $value1->id ?>"><?= $value1->name ?></a>
                        <p><?= $value1->duration ?> phút</p>
                        <p><i class="fa fa-eye"></i><?= $value1->num_view ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
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
<script src="comment/comment.js"></script>
<?php require_once 'footer.php'; ?>