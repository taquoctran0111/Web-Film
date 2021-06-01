<?php
require_once('../../autoload/Autoload.php');
require_once('../header.php');
require_once('../config/config.php');
$queryNation = "SELECT * FROM tbl_nations";
$resultNation = mysqli_query($conn, $queryNation);

$queryTypeMovie = "SELECT * FROM tbl_typemovies";
$resultTypeMovie = mysqli_query($conn, $queryTypeMovie);
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
if (Input::hasPost('add')) {
    $folderHorizontal = $_SERVER['DOCUMENT_ROOT'] . '/WebFilmFast/assets/images/image-horizontal/';
    $folderVertical = $_SERVER['DOCUMENT_ROOT'] . '/WebFilmFast/assets/images/image-vertical/';

    $fileImageHorizontal = $_FILES['imagehorizontal']['name'];
    $filetmpImageHorizontal = $_FILES['imagehorizontal']['tmp_name'];
    move_uploaded_file($filetmpImageHorizontal, $folderHorizontal . $fileImageHorizontal);

    $fileImageVertical = $_FILES['imagevertical']['name'];
    $filetmpImageVertical = $_FILES['imagevertical']['tmp_name'];
    move_uploaded_file($filetmpImageVertical, $folderVertical . $fileImageVertical);


    $name = Input::post('name');
    $subname = Input::post('otherName');
    $year = Input::post('year');
    $nation = Input::post('nation');
    $typemovie = Input::post('typemovie');
    $description = Input::post('description');
    $duration = Input::post('duration');
    $subtitle = Input::post('subtitle');
    $quality = Input::post('quality');
    $imageHorizontal = "assets/images/image-horizontal/" . $fileImageHorizontal;
    $imageVertical = "assets/images/image-vertical/" . $fileImageVertical;
    $success = $DB->create('tbl_films', [
        'name' => $name,
        'sub_name' => $subname,
        'year' => $year,
        'nation_id' => $nation,
        'typemovie' => $typemovie,
        'description' => $description,
        'duration' => $duration,
        'subtitle' => $subtitle,
        'quality' => $quality,
        'image_horizontal' => $imageHorizontal,
        'image_vertical' => $imageVertical,
    ]);
    if ($success === true) {
        $alertSuccess = "Add film success";
    } else {
        $error     = "Add film fail";
    }
}
?>
<div class="containerr">
    <?php require_once('../navigation/navigation.php') ?>
    <div class="main">
        <?php require_once('../topbar/topbar.php') ?>
        <div class="detailsFilm">
            <div class="recentFilms">
                <div class="filmHeader">
                    <h2 style="font-size: 25px;">Add Film</h2>
                </div>
                <?php if (isset($alertSuccess)) : ?>
                    <div class="success">
                        <?= $alertSuccess ?>
                    </div>
                <?php endif ?>
                <?php if (isset($error)) : ?>
                    <div class="error">
                        <?= $error ?>
                    </div>
                <?php endif ?>
                <form class="editfilm" method="post" enctype="multipart/form-data">
                    <div class="groupform">
                        <label for="inputName">Name</label>
                        <input type="text" id="inputName" name="name" style="width: 20em;">
                    </div>
                    <div class="groupform">
                        <label for="inputotherName">Other name</label>
                        <input type="text" id="inputotherName" name="otherName" style="width: 20em;">
                    </div>
                    <div class="groupform">
                        <label for="inputYear">Year</label>
                        <input type="text" id="inputYear" name="year">
                    </div>
                    <div class="groupform">
                        <label for="nation">Nation</label>
                        <select name="nation" id="nation" style="padding: 3px 8px; outline: none;">
                            <option value="default1" selected hidden>Chose nation</option>
                            <?php while ($rowNation = mysqli_fetch_array($resultNation)) : ?>
                                <option value="<?= $rowNation['id'] ?>"><?php echo $rowNation['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="groupform">
                        <label for="typemovie">Type movie</label>
                        <select name="typemovie" id="typemovie" style="padding: 3px 8px; outline: none;">
                            <option value="default2" selected hidden>Chose type movie</option>
                            <?php while ($rowTypeMovie = mysqli_fetch_array($resultTypeMovie)) : ?>
                                <option value="<?= $rowTypeMovie['id'] ?>"><?php echo $rowTypeMovie['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="groupform">
                        <label for="taDescription">Description</label>
                        <textarea name="description" id="taDescription" cols="60" rows="7"></textarea>
                    </div>
                    <div class="groupform">
                        <label for="inputDuration">Durations(m)</label>
                        <input type="text" id="inputDuration" name="duration">
                    </div>
                    <div class="groupform">
                        <label for="inputSubtitle">Subtitle</label>
                        <input type="text" id="inputSubtitle" name="subtitle">
                    </div>
                    <div class="groupform">
                        <label for="inputQuality">Quality</label>
                        <input type="text" id="inputQuality" name="quality">
                    </div>
                    <div class="groupform">
                        <label for="inputIMGhorizontal">Image horizontal</label>
                        <img src="../../assets/images/empty.jpg" alt="" style="width: 17em; height: 10em">
                        <input type="file" id="inputIMGhorizontal" name="imagehorizontal">
                        <!-- <input type="submit" value="Edit Image" name="uploadHorizontal"> -->
                    </div>
                    <div class="groupform">
                        <label for="inputQuality">Image vertical</label>
                        <img src="../../assets/images/empty.jpg" alt="" style="width: 11em; height: 15em">
                        <input type="file" id="inputQuality" name="imagevertical">
                        <!-- <input type="button" value="Edit Image" name="uploadVertical"> -->
                    </div>
                    <div class="groupform">
                        <label for="inputVideo">Video</label>
                        <input type="text" id="inputVideo" name="video">
                    </div>
                    <button type="submit" class="btn" name="add">Add film</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>