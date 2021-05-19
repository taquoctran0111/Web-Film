<?php
require_once('../header.php');
require_once('../config/config.php');

$query = "SELECT * FROM tbl_films";
$result = mysqli_query($conn, $query);
?>
<div class="containerr">
    <?php require_once('../navigation/navigation.php') ?>
    <div class="main">
        <?php require_once('../topbar/topbar.php') ?>
        <div class="detailsFilm">
            <div class="recentFilms">
                <div class="filmHeader">
                    <h2 style="font-size: 25px;">List Films</h2>
                    <a href="#" class = "btn">Add film</a>
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
                                    <a href="editfilm.php?id_film=<?=$row['id']?>">
                                        <b class='badge badge-warning status-Content'  style="padding: 10px">Edit</b>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="#">
                                        <b class='badge badge-danger status-Content'  style="padding: 10px">Delete</b>
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