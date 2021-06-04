<?php
require_once('../../autoload/Autoload.php');
require_once('../header.php');
require_once('../config/config.php');
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
if (isset($_GET['id_film'])) {
    $id = $_GET['id_film'];
}
$query = "SELECT * FROM tbl_films WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data_film = mysqli_fetch_array($result);

$idNation = $data_film['nation_id'];
$queryNationFilm = "SELECT * FROM tbl_nations WHERE id = '$idNation'";
$resultNationFilm = mysqli_query($conn, $queryNationFilm);
$dataNationFilm = mysqli_fetch_array($resultNationFilm);

$idTypeMovie = $data_film['typemovie'];
$queryTypeMovieFilm = "SELECT * FROM tbl_typemovies WHERE id = '$idTypeMovie'";
$resultTypeMovieFilm = mysqli_query($conn, $queryTypeMovieFilm);
$dataTypeMovieFilm = mysqli_fetch_array($resultTypeMovieFilm);

$queryNation = "SELECT * FROM tbl_nations";
$resultNation = mysqli_query($conn, $queryNation);

$queryTypeMovie = "SELECT * FROM tbl_typemovies";
$resultTypeMovie = mysqli_query($conn, $queryTypeMovie);

$sql_category = "SELECT tbl_categories.name, tbl_categories.id FROM tbl_categories INNER JOIN tbl_listcategory ON tbl_categories.id = tbl_listcategory.category_id AND tbl_listcategory.film_id = '$id'";
$r_category = $DB->query($sql_category);
// print_r($r_category[0]->id);

$deleteCategory = "DELETE FROM tbl_listcategory WHERE film_id = '$id'";


$queryCategories = "SELECT * FROM tbl_categories";
$resultCategories = mysqli_query($conn, $queryCategories);

if (Input::hasPost('edit')) {
    $folderHorizontal = $_SERVER['DOCUMENT_ROOT'] . '/WebFilmFast/assets/images/image-horizontal/';
    $folderVertical = $_SERVER['DOCUMENT_ROOT'] . '/WebFilmFast/assets/images/image-vertical/';
    $imageHorizontal = $data_film['image_horizontal'];
    $imageVertical = $data_film['image_vertical'];

    if ($_FILES['imagehorizontal']['name'] != '') {
        $fileImageHorizontal = $_FILES['imagehorizontal']['name'];
        $filetmpImageHorizontal = $_FILES['imagehorizontal']['tmp_name'];
        move_uploaded_file($filetmpImageHorizontal, $folderHorizontal . $fileImageHorizontal);
        $imageHorizontal = "assets/images/image-horizontal/" . $fileImageHorizontal;
    }
    if ($_FILES['imagevertical']['name'] != '') {
        $fileImageVertical = $_FILES['imagevertical']['name'];
        $filetmpImageVertical = $_FILES['imagevertical']['tmp_name'];
        move_uploaded_file($filetmpImageVertical, $folderVertical . $fileImageVertical);
        $imageVertical = "assets/images/image-vertical/" . $fileImageVertical;
    }

    $deleteCategory = "DELETE FROM tbl_listcategory WHERE film_id = '$id'";
    $run_delete = mysqli_query($conn, $deleteCategory);
    $category = $_POST['categories'];
    foreach ($category as $value) {
        $query = "INSERT INTO tbl_listcategory(film_id, category_id) VALUES ('$id','$value')";
        $query_run = mysqli_query($conn, $query);
    }


    $name = Input::post('name');
    $subname = Input::post('otherName');
    $year = Input::post('year');
    $nation = Input::post('nation');
    $typemovie = Input::post('typemovie');
    $description = Input::post('description');
    $duration = Input::post('duration');
    $subtitle = Input::post('subtitle');
    $quality = Input::post('quality');
   
    $success = $DB->update('tbl_films', [
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
    ], $id);
    if ($success === true) {
        $alertSuccess = "Update film success";
    } else {
        $error     = "Update film fail";
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
                    <h2 style="font-size: 25px;">Edit Film</h2>
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
                        <input type="text" id="inputName" name="name" value="<?= $data_film['name'] ?>" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputotherName">Other name</label>
                        <input type="text" id="inputotherName" name="otherName" value="<?= $data_film['sub_name'] ?>" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputYear">Year</label>
                        <input type="text" id="inputYear" name="year" value="<?= $data_film['year'] ?>" required>
                    </div>
                    <div class="groupform">
                        <label for="nation">Nation</label>
                        <select name="nation" id="nation" style="padding: 3px 8px; outline: none;">
                            <option value="<?= $dataNationFilm['id'] ?>" selected hidden><?= $dataNationFilm['name'] ?></option>
                            <?php while ($rowNation = mysqli_fetch_array($resultNation)) : ?>
                                <option value="<?= $rowNation['id'] ?>"><?php echo $rowNation['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="groupform">
                        <label for="typemovie">Type movie</label>
                        <select name="typemovie" id="typemovie" style="padding: 3px 8px; outline: none;">
                            <option value="<?= $dataTypeMovieFilm['id'] ?>" selected hidden><?= $dataTypeMovieFilm['name'] ?></option>
                            <?php while ($rowTypeMovie = mysqli_fetch_array($resultTypeMovie)) : ?>
                                <option value="<?= $rowTypeMovie['id'] ?>"><?php echo $rowTypeMovie['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="groupform">
                        <label for="typemovie">Categories</label>
                        <select name="categories[]" id="categories" style="padding: 3px 8px; outline: none; width: 250px" multiple>
                            <?php foreach ($r_category as $value) : ?>
                                <option value="<?= $value->id ?>" selected hidden><?= $value->name ?></option>
                            <?php endforeach ?>
                            <?php while ($rowCategories = mysqli_fetch_array($resultCategories)) : ?>
                                <option value="<?= $rowCategories['id'] ?>"><?php echo $rowCategories['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="groupform">
                        <label for="taDescription">Description</label>
                        <textarea name="description" id="taDescription" cols="50" rows="7"><?= $data_film['description'] ?></textarea>
                    </div>
                    <div class="groupform">
                        <label for="inputDuration">Durations(m)</label>
                        <input type="text" id="inputDuration" name="duration" value="<?= $data_film['duration'] ?> " required>
                    </div>
                    <div class="groupform">
                        <label for="inputSubtitle">Subtitle</label>
                        <input type="text" id="inputSubtitle" name="subtitle" value="<?= $data_film['subtitle'] ?>" required>
                    </div>
                    <div class="groupform">
                        <label for="inputQuality">Quality</label>
                        <input type="text" id="inputQuality" name="quality" value="<?= $data_film['quality'] ?>" required>
                    </div>
                    <div class="groupform">
                        <label for="inputIMGhorizontal">Image horizontal</label>
                        <img src="../../<?= $data_film['image_horizontal'] ?>" alt="" style="width: 17em; height: 10em">
                        <input type="file" id="inputIMGhorizontal" name="imagehorizontal">
                        <!-- <input type="submit" value="Edit Image" name="uploadHorizontal"> -->
                    </div>
                    <div class="groupform">
                        <label for="inputQuality">Image vertical</label>
                        <img src="../../<?= $data_film['image_vertical'] ?>" alt="" style="width: 11em; height: 15em">
                        <input type="file" id="inputQuality" name="imagevertical">
                        <!-- <input type="button" value="Edit Image" name="uploadVertical"> -->
                    </div>
                    <div class="groupform">
                        <label for="inputVideo">Video</label>
                        <input type="text" id="inputVideo" name="video">
                    </div>
                    <button type="submit" class="btn" name="edit">Edit film</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>
<script>
    $(document).ready(function() {
        $('#categories').chosen();
    })
</script>