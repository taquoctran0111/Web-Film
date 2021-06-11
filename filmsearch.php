<?php
require_once('./autoload/Autoload.php');
require_once('./config/config2.php');
if (isset($_GET['search_input'])) {
    $search_input = $_GET['search_input'];
}
$query = "SELECT * FROM tbl_films WHERE tbl_films.name LIKE '%$search_input%'";
$runquery = $DB->query($query);
// $runquery = mysqli_query($conn,$query);
$title = "Phim hay";
require_once("header.php");

?>
<div class="section" style="padding-top: 2.5em">
    <div class="container">
        <div class="section-header">
            Kết quả tìm kiếm cho '<?php echo $search_input ?>'
        </div>
        <?php if(is_array($runquery)): ?>
        <div class="grid-container-theater">
            <?php foreach ($runquery as $value) : ?>
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
        <?php else:?>
        <div class="grid-container-theater">
            <h1>Không tìm thấy phim yêu cầu!</h1>
        </div>
        <?php endif?>
    </div>
</div>
<?php require_once("footer.php") ?>