<?php
require_once('./autoload/Autoload.php');
require_once('./config/config2.php');

if (isset($_GET['nation_id'])) {
    $nation_id = $_GET['nation_id'];
    $query = "SELECT * FROM tbl_films WHERE nation_id = '$nation_id'";
    $q = $DB->query($query);
    $query_title = "SELECT * FROM tbl_nations WHERE id = '$nation_id'";
    $q_title = $DB->query($query_title);
    $title = $q_title[0]->name;
}
elseif(isset($_GET['type_movie'])){
    $type_movie = $_GET['type_movie'];
    $query = "SELECT * FROM tbl_films WHERE typemovie = '$type_movie'";
    $q = $DB->query($query);
    $query_title = "SELECT * FROM tbl_typemovies WHERE id = '$type_movie'";
    $q_title = $DB->query($query_title);
    $title = $q_title[0]->name;
}
else{
    echo "Fail";
}

require_once("header.php");
?>
<div class="section" style="padding-top: 2.5em">
    <div class="container">
        <div class="section-header">
            <?=$title?>
        </div>
        <div class="grid-container-theater">
            <?php foreach ($q as $value) : ?>
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