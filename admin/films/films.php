<?php
require_once('../header.php');
require_once('../config/config.php');
require_once('../../autoload/Autoload.php');
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
$query = "SELECT * FROM tbl_films";
$result = mysqli_query($conn, $query);
$data = $DB->query($query);
?>
<div class="containerr">
    <?php require_once('../navigation/navigation.php') ?>
    <div class="main">
        <?php require_once('../topbar/topbar.php') ?>
        <div class="detailsFilm">
            <div class="recentFilms">
                <div class="filmHeader">
                    <h2 style="font-size: 25px;">List Films</h2>
                    <div>
                        <a href="../films/addfilm.php" class="btn">Add film</a>
                        <a href="../films/episodes.php" class="btn">Film Episodes</a>
                    </div>
                </div>
                <table id="films_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Other Name</td>
                            <td>Status</td>
                            <td>Year</td>
                            <td>Durations(m)</td>
                            <td>Views</td>
                            <td>Quality</td>
                            <td>Acction</td>
                            <td>Acction</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) : ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['sub_name'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['year'] ?></td>
                                <td><?= $row['duration'] ?></td>
                                <td><?= $row['num_view'] ?></td>
                                <td><?= $row['quality'] ?></td>
                                <td class="text-center">
                                    <a href="editfilm.php?id_film=<?= $row['id'] ?>">
                                        <b class='badge badge-warning status-Content' style="padding: 10px">Edit</b>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="#">
                                        <b class='badge badge-danger status-Content' type="button" style="padding: 10px" data-toggle="modal" data-target="#exampleModal-<?= $row['id'] ?>">Delete</b>
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
<?php if (is_array($data)) : ?>
    <?php foreach ($data as $item) : ?>
        <div class="modal fade" id="exampleModal-<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete film</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you want delete film?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="../films/deletefilm.php?id=<?= $item->id ?>" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
<?php require_once('../footer.php') ?>
<script>
    $(document).ready(function() {
        $('#films_data').DataTable();
    });
</script>