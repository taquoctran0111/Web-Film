<?php
include('./autoload/Autoload.php');
include './config/config2.php';
$title = "Phim hay";
require_once("header.php");

if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
$sql1 = "SELECT * FROM tbl_films WHERE id = '$film_id'";
$query_detail_film = mysqli_query($conn, $sql1);
$r_detail_film = mysqli_fetch_assoc($query_detail_film);

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
                <?php
                $nation_id = $r_detail_film['nation_id'];
                $sql2 = "SELECT * FROM tbl_nations WHERE id = '$nation_id'";
                $query_nation = mysqli_query($conn, $sql2);
                $r_nation = mysqli_fetch_assoc($query_nation);
                ?>
                <div class="film-content">
                    <p>Quốc gia: <?= $r_nation['name'] ?></p>
                    <p>Năm sản xuất: <?= $r_detail_film['year'] ?></p>
                    <p>Chất lượng: <?= $r_detail_film['quality'] ?></p>
                    <p>Âm thanh: <?= $r_detail_film['subtitle'] ?></p>
                    <p>Thời lượng: <?= $r_detail_film['duration'] ?> phút</p>
                    <p>Trạng thái: <?= $r_detail_film['status'] ?></p>
                    <p>Tên khác: <?= $r_detail_film['sub_name'] ?></p>
                    <?php
                    $sql3 = "SELECT tbl_categories.name FROM tbl_categories INNER JOIN tbl_listcategory ON tbl_categories.id = tbl_listcategory.category_id AND tbl_listcategory.film_id = '$film_id'";
                    $r_category = $DB->query($sql3);
                    ?>
                    <p>Thể loại: <?php foreach ($r_category as $value) : ?> <a href="category_detail.php?category_id=1" class="category-redirect">
                                <?php
                                        echo $value->name;
                                ?></a>,
                        <?php endforeach; ?>
                    <p style="margin-top: 10px;"><?= $r_detail_film['description'] ?></p>

                </div>
                <div class="film-comment">
                    <p>Éo có bình luận nào :v</p>
                </div>
            </div>
        </div>
        <?php
        $sql5 = "SELECT category_id FROM tbl_listcategory WHERE film_id = '$film_id'";
        $category = $DB->query($sql5);
        $a = $category[0]->category_id;
        $sql4 = "SELECT * FROM tbl_films JOIN tbl_listcategory ON tbl_films.id = tbl_listcategory.film_id AND tbl_listcategory.category_id = '$a' LIMIT 6";
        //echo("DEBUG:" . $sql4);
        $same_movie = $DB->query($sql4);
        ?>
        <div class="side-bar">
            <?php foreach ($same_movie as $value1) : ?>
                <div class="film-side-bar">
                    <a href="detail_film.php?film_id=<?=$value1->id?>" class="left"><img src="<?=$value1->image_horizontal?>" alt=""></a>
                    <div class="info-film-side-bar">
                        <a href="detail_film.php?film_id=<?=$value1->id?>"><?=$value1->name?></a>
                        <p><?=$value1->duration?> phút</p>
                        <p><i class="fa fa-eye"></i><?=$value1->num_view?></p>
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
<?php require_once 'footer.php'; ?>