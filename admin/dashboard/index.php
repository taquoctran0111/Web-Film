<?php
require_once('../header.php');
require_once('../../autoload/Autoload.php');
require_once('../config/config.php');
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
$queryCountUser = "SELECT COUNT(*) FROM tbl_users WHERE usertype_id = '2'";
$countUser = mysqli_query($conn, $queryCountUser);
$count_user = mysqli_fetch_array($countUser);

$queryCountFilm = "SELECT COUNT(*) FROM tbl_films";
$countFilm = mysqli_query($conn, $queryCountFilm);
$count_film = mysqli_fetch_array($countFilm);

$queryCountView = "SELECT SUM(num_view) FROM tbl_films";
$countView = mysqli_query($conn, $queryCountView);
$count_view = mysqli_fetch_array($countView);

$query_like = "SELECT COUNT(*) FROM tbl_rating";
$countLike = mysqli_query($conn, $query_like);
$count_like = mysqli_fetch_array($countLike);

$queryRecentFilms = "SELECT * FROM tbl_films ORDER BY id DESC LIMIT 5";
$resultRecentFilm = mysqli_query($conn, $queryRecentFilms);

$queryUser = "SELECT * FROM tbl_users WHERE usertype_id = '2' LIMIT 4";
$data_user = mysqli_query($conn, $queryUser);

?>
<div class="containerr">
    <?php require_once('../navigation/navigation.php') ?>
    <div class="main">
        <?php require_once('../topbar/topbar.php') ?>
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers"><?= $count_user['COUNT(*)'] ?></div>
                    <div class="cardName">Users</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers"><?= $count_film['COUNT(*)'] ?></div>
                    <div class="cardName">Films</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers"><?= $count_view['SUM(num_view)'] ?></div>
                    <div class="cardName">Total Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers"><?= $count_like[0] ?></div>
                    <div class="cardName">Total Likes</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Films</h2>
                    <a href="../films/films.php" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                        <td>Name</td>
                        <td>Status</td>
                        <td>Year</td>
                        <td>Quality</td>
                        <td>Views</td>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($resultRecentFilm)) : ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['year'] ?></td>
                                <td><?= $row['quality'] ?></td>
                                <td><?= $row['num_view'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Users</h2>
                </div>
                <?php while ($row1 = mysqli_fetch_array($data_user)) : ?>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="imgBx"><img src="../../<?=$row1['avatar']?>"></div>
                            </td>
                            <td>
                                <h4><?=$row1['fullname']?></h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>