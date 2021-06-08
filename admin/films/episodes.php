<?php
require_once('../header.php');
require_once('../config/config.php');
require_once('../../autoload/Autoload.php');
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
$query = "SELECT tbl_episodes.episode_name, tbl_episodes.film_id, tbl_episodes.episode_id, tbl_films.name FROM tbl_episodes INNER JOIN tbl_films ON tbl_films.id = tbl_episodes.film_id";
$result = mysqli_query($conn, $query);
// $data = $DB->query($query);
?>
<div class="containerr">
    <?php require_once('../navigation/navigation.php') ?>
    <div class="main">
        <?php require_once('../topbar/topbar.php') ?>
        <div class="detailsFilm">
            <div class="recentFilms">
                <div class="filmHeader">
                    <h2 style="font-size: 25px;">Film Episodes</h2>
                </div>
                <table id="films_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Film ID</td>
                            <td>Film Name</td>
                            <td>Acction</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) : ?>
                            <tr>
                                <td><?= $row['episode_id'] ?></td>
                                <td><?= $row['film_id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td class="text-center">
                                    <a href="addepisodes.php?id_film=<?= $row['film_id'] ?>">
                                        <b class='badge badge-warning status-Content' style="padding: 10px">Add episode</b>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>
<script>
    $(document).ready(function() {
        $('#films_data').DataTable();
    });
</script>