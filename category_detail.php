<?php
require_once('./autoload/Autoload.php');
require_once('./config/config2.php');
$title = "Phim hành động";
require_once("header.php");
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
}
$query_title = "SELECT * FROM tbl_categories WHERE id = '$category_id'";
$q_title = mysqli_query($conn, $query_title);
$result_title = mysqli_fetch_array($q_title);
?>
<div class="section" style="padding-top: 2.5em">
    <div class="container">
        <div class="section-header">
            Phim <?= $result_title['name'] ?>
        </div>
        <?php
        $query_film = "SELECT * FROM tbl_films JOIN tbl_listcategory ON tbl_films.id = tbl_listcategory.film_id AND tbl_listcategory.category_id = '$category_id'";
        $data_films = $DB->query($query_film);
        ?>
        <div class="grid-container-theater">
            <?php foreach ($data_films as $value) : ?>
                <a href="detail_film.php?film_id=<?= $value->id ?>" class="item-theater">
                    <img src="<?= $value->image_vertical ?>">
                    <div class="grid-content">
                        <div class="grid-title">
                            <?= $value->quality ?>
                        </div>
                        <div class="grid-infos">
                            <div class="grid-info1">
                                <span><?= $value->name ?></span>
                            </div>
                            <div class="grid-info">
                                <span><?= $value->subtitle ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php require_once("footer.php") ?>