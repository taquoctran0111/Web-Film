<?php
require_once('../header.php');
require_once('../config/config.php');
require_once('../../autoload/Autoload.php');
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
$filmname = Input::post('filmname');
$episodename = Input::post('episodename');

$queryidfilm = "SELECT tbl_films.id from tbl_films WHERE tbl_films.name = '$filmname'";
$runqueryidfilm = mysqli_query($conn, $queryidfilm);
$resultidfilm = mysqli_fetch_assoc($runqueryidfilm);

$querytypemovie = "SELECT tbl_films.typemovie from tbl_films WHERE tbl_films.name = '$filmname'";
$runquerytypemovie = mysqli_query($conn,$querytypemovie);
$resulttypemovie = mysqli_fetch_assoc($runquerytypemovie);
$typemovie = $resulttypemovie['typemovie'];
if (Input::hasPost('addepisode')) {
    if($resultidfilm!=''){
        if($typemovie == '2'){
            $filmid = $resultidfilm["id"];
            $success = $DB->create('tbl_episodes', [
                'film_id' => $filmid,
                'episode_name' => $episodename,
            ]);
            if ($success === true) {
                $alertSuccess = "Add episode success!";
            } else {
                $error = "Add episode fail!";
            }
        }
       else{
           $error = "Require series film!";
       }
    }
    else{
        $error = "Film don't exist!";
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
                    <h2 style="font-size: 25px;">Add Episode</h2>
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
                <form action="" method="post" class="editfilm">
                    <div class="groupform">
                        <label for="inputName">Film name</label>
                        <input type="text" id="inputFilmName" name="filmname" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputotherName">Episode name</label>
                        <input type="text" id="inputEpisodeName" name="episodename" style="width: 20em;" required>
                    </div>
                    <button type="submit" class="btn" name="addepisode" style="margin-top: 2em;">Add episode</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>