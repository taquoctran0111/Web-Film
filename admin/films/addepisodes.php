<?php
require_once('../header.php');
require_once('../config/config.php');
require_once('../../autoload/Autoload.php');
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
if (isset($_GET['id_film'])) {
    $filmid = $_GET['id_film'];
}

$episodename = Input::post('episodename');

$querynamefilm = "SELECT tbl_films.name from tbl_films WHERE tbl_films.id = '$filmid'";
$runquerynamefilm = mysqli_query($conn, $querynamefilm);
$resultnamefilm = mysqli_fetch_assoc($runquerynamefilm);

$querytypemovie = "SELECT tbl_films.typemovie from tbl_films WHERE tbl_films.id = '$filmid'";
$runquerytypemovie = mysqli_query($conn, $querytypemovie);
$resulttypemovie = mysqli_fetch_assoc($runquerytypemovie);
$typemovie = $resulttypemovie['typemovie'];

$queryepisodename = "SELECT tbl_episodes.episode_name FROM tbl_episodes WHERE tbl_episodes.episode_name = '$episodename' AND tbl_episodes.film_id = '$filmid'";
$runepisodename = mysqli_query($conn, $queryepisodename);
$resultepisodename = mysqli_fetch_assoc($runepisodename);

$querylistepisode = "SELECT tbl_episodes.episode_name FROM tbl_episodes WHERE tbl_episodes.film_id = '$filmid'";
$resultlistepisode = $DB->query($querylistepisode);

if (Input::hasPost('addepisode')) {
    if ($typemovie == '2') {
        if($resultepisodename == ''){
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
            $error = "Episode is exist!";   
        }
    } else {
        $error = "Require series film!";
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
                    <div>
                        <a href="../films/episodes.php" class="btn">Back</a>
                    </div>
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
                        <input type="text" id="inputFilmName" name="filmname" style="width: 20em;" value="<?php echo $resultnamefilm['name'] ?>" required disabled>
                    </div>
                    <div class="groupform">
                        <label for="inputotherName">Episode Film</label>
                        <input type="text" id="inputEpisodeFilm" name="episodefilm" value = "<?php
                            foreach($resultlistepisode as $value){
                                echo $value->episode_name . ', ';
                            }
                        ?>" style="width: 20em;" required disabled>
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