<?php
require_once('../../autoload/Autoload.php');
require_once('../header.php');
require_once('../config/config.php');
if(isset($_GET['id_film'])){
    $id = $_GET['id_film'];
}
$query = "SELECT * FROM tbl_films WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data_film = mysqli_fetch_array($result); 
?>
<div class="containerr">
    <?php require_once('../navigation/navigation.php') ?>
    <div class="main">
        <?php require_once('../topbar/topbar.php') ?>
        <div class="detailsFilm">
            <div class="recentFilms">
                <div class="filmHeader">
                    <h2 style="font-size: 25px;">Edit Film</h2>
                </div>
                <div class="editfilm">
                    <div class="groupform">
                        <label for="inputName">Name</label>
                        <input type="text" id="inputName" name="name" value="<?=$data_film['name']?>" style="width: 20em;">
                    </div>
                    <div class="groupform">
                        <label for="inputotherName">Other name</label>
                        <input type="text" id="inputotherName" name="otherName" value="<?=$data_film['sub_name']?>" style="width: 20em;">
                    </div>
                    <div class="groupform">
                        <label for="inputYear">Year</label>
                        <input type="text" id="inputYear" name="year" value="<?=$data_film['year']?>">
                    </div>
                    <div class="groupform">
                        <label for="taDescription">Description</label>
                        <textarea name="description" id="taDescription" cols="60" rows="7"><?=$data_film['description']?></textarea>
                    </div>
                    <div class="groupform">
                        <label for="inputDuration">Durations(m)</label>
                        <input type="text" id="inputDuration" name="duration" value="<?=$data_film['duration']?>">
                    </div>
                    <div class="groupform">
                        <label for="inputSubtitle">Subtitle</label>
                        <input type="text" id="inputSubtitle" name="subtitle" value="<?=$data_film['subtitle']?>">
                    </div>
                    <div class="groupform">
                        <label for="inputQuality">Quality</label>
                        <input type="text" id="inputQuality" name="quality" value="<?=$data_film['quality']?>">
                    </div>
                    <div class="groupform">
                        <label for="inputIMGhorizontal">Image horizontal</label>
                        <input type="text" id="inputIMGhorizontal" name="imagehorizontal">
                    </div>
                    <div class="groupform">
                        <label for="inputQuality">Image vertical</label>
                        <input type="text" id="inputIMGvertical" name="imagevertical">
                    </div>
                    <div class="groupform">
                        <label for="inputVideo">Video</label>
                        <input type="text" id="inputVideo" name="video">
                    </div>
                </div>
                <div class="btnAdd">
                    <a href="#" class ="btn" style="margin-left: 12em; margin-top: 20px;">Edit film</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>