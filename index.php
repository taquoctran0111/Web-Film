<?php
require_once('./autoload/Autoload.php');
require_once('./config/config2.php');
$sql_banner1 = "SELECT * FROM tbl_films WHERE id = '2'";
$banner1 = $DB->query($sql_banner1);
$sql_banner2 = "SELECT * FROM tbl_films WHERE id = '3'";
$banner2 = $DB->query($sql_banner2);
$sql_banner3 = "SELECT * FROM tbl_films WHERE id = '4'";
$banner3 = $DB->query($sql_banner3);
$sql_new_film = "SELECT * FROM tbl_films ORDER BY id DESC LIMIT 8";
$data_new_films = mysqli_query($conn, $sql_new_film);
$sql_suggest_film = "SELECT * FROM tbl_films ORDER BY num_view DESC LIMIT 6";
$data_film_suggest = mysqli_query($conn, $sql_suggest_film);
$sql_theater_film = "SELECT * FROM tbl_films WHERE typemovie = '3' LIMIT 10";
$data_films_theater = mysqli_query($conn, $sql_theater_film);
$sql_single_highview = "SELECT * FROM tbl_films WHERE typemovie = '3' ORDER BY num_view DESC LIMIT 1";
$data_film_single_highview = mysqli_query($conn, $sql_single_highview);
$sql_single_film = "SELECT * FROM tbl_films WHERE typemovie = '3' LIMIT 8";
$data_film_single = mysqli_query($conn, $sql_single_film);
$sql_seri_highview = "SELECT * FROM tbl_films WHERE typemovie = '2' ORDER BY num_view DESC LIMIT 1";
$data_film_seri_highview = mysqli_query($conn, $sql_seri_highview);
$sql_seri_film = "SELECT * FROM tbl_films WHERE typemovie = '2' LIMIT 8";
$data_film_seri = mysqli_query($conn, $sql_seri_film);
$sql_rank_film = "SELECT * FROM tbl_films ORDER BY num_view DESC LIMIT 5";
$data_rank_film = mysqli_query($conn, $sql_rank_film);
$rank = 1;
$title = "Trang chủ";
require_once("header.php");
?>
<!-- Start container -->
<!-- HERO SECTION -->
<div class="hero-section">
    <!-- HERO SLIDE -->
    <div class="hero-slide">
        <div class="owl-carousel carousel-nav-center" id="hero-carousel">
            <!-- SLIDE ITEM -->
            <div class="hero-slide-item">
                <?php foreach ($banner1 as $values1) : ?>
                    <img src="<?= $values1->image_horizontal ?>" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                <?= $values1->name; ?>
                            </div>
                            <div class="movie-infos top-down delay-2">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span><?= $values1->duration ?> phút</span>
                                </div>
                                <div class="movie-info">
                                    <span><?= $values1->quality ?></span>
                                </div>
                            </div>
                            <div class="item-content-description top-down delay-4">
                                <?= $values1->description ?>
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="detail_film.php?film_id=<?= $values1->id ?>" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Xem ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- END SLIDE ITEM -->
            <!-- SLIDE ITEM -->
            <div class="hero-slide-item">
                <?php foreach ($banner2 as $values2) : ?>
                    <img src="<?= $values2->image_horizontal ?>" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                <?= $values2->name; ?>
                            </div>
                            <div class="movie-infos top-down delay-2">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span><?= $values2->duration ?> phút</span>
                                </div>
                                <div class="movie-info">
                                    <span><?= $values2->quality ?></span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                            <div class="item-content-description top-down delay-4">
                                <?= $values2->description ?>
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="detail_film.php?film_id=<?= $values2->id ?>" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Xem ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- END SLIDE ITEM -->
            <!-- SLIDE ITEM -->
            <div class="hero-slide-item">
                <?php foreach ($banner3 as $values3) : ?>
                    <img src="<?= $values3->image_horizontal ?>" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                <?= $values3->name; ?>
                            </div>
                            <div class="movie-infos top-down delay-2">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span><?= $values3->duration ?> phút</span>
                                </div>
                                <div class="movie-info">
                                    <span><?= $values3->quality ?></span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                            <div class="item-content-description top-down delay-4">
                                <?= $values3->description ?>
                            </div>
                            <div class="item-action top-down delay-6">
                                <a href="detail_film.php?film_id=<?= $values3->id ?>" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Xem ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- END SLIDE ITEM -->
        </div>
    </div>
    <!-- END HERO SLIDE -->
    <!-- TOP MOVIES SLIDE -->
    <div class="top-movies-slide">
        <div class="owl-carousel" id="top-movies-slide">
            <!-- MOVIE ITEM -->
            <?php while ($result_new_film = $data_new_films->fetch_assoc()) : ?>
                <a href="detail_film.php?film_id=<?= $result_new_film['id'] ?>" class="movie-item">
                    <img src="<?= $result_new_film['image_vertical'] ?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?= $result_new_film['name'] ?>
                        </div>
                        <div class="movie-infos">
                            <!-- <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span>9.5</span>
                            </div> -->
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?= $result_new_film['duration'] ?> phút</span>
                            </div>
                            <div class="movie-info">
                                <span><?= $result_new_film['quality'] ?></span>
                            </div>
                            <div class="movie-info">
                                <span><?= $result_new_film['year'] ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>
            <!-- END MOVIE ITEM -->
        </div>
    </div>
    <!-- END TOP MOVIES SLIDE -->
</div>
<!-- END HERO SECTION -->

<!-- LATEST MOVIES SECTION -->
<div class="section">
    <div class="container">
        <div class="section-header">
            Phim đề cử
        </div>
        <div class="movies-slide carousel-nav-center owl-carousel">
            <!-- MOVIE ITEM -->
            <?php while ($result_film_suggest = $data_film_suggest->fetch_assoc()) : ?>
                <a href="detail_film.php?film_id=<?= $result_film_suggest['id'] ?>" class="movie-item">
                    <img src="<?= $result_film_suggest['image_vertical'] ?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?= $result_film_suggest['name'] ?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span>9.5</span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?= $result_film_suggest['duration'] ?> phút</span>
                            </div>
                            <div class="movie-info">
                                <span><?= $result_film_suggest['quality'] ?></span>
                            </div>
                            <div class="movie-info">
                                <span>16+</span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>
            <!-- END MOVIE ITEM -->
        </div>
    </div>
</div>
<!-- END LATEST MOVIES SECTION -->
<!-- START MOVIES THEATER -->
<div class="section">
    <div class="container">
        <div class="section-header">
            Phim chiếu rạp
        </div>
        <div class="grid-container-theater">
            <?php while ($row = $data_films_theater->fetch_assoc()) : ?>
                <a href="detail_film.php?film_id=<?= $row['id'] ?>" class="item-theater">
                    <img src="<?= $row['image_vertical'] ?>">
                    <div class="grid-content">
                        <div class="grid-title">
                            <?= $row['quality'] ?>
                        </div>
                        <div class="grid-infos">
                            <div class="grid-info1">
                                <span><?= $row['name'] ?></span>
                            </div>
                            <div class="grid-info">
                                <span><?= $row['subtitle'] ?></span>
                            </div>

                        </div>
                    </div>
                </a>
            <?php endwhile ?>
        </div>
    </div>
</div>

<!-- END MOVIES THEATER -->
<!-- START SINGLE FILM SECTION -->
<div class="section">
    <div class="container">
        <div class="section-header">
            Phim lẻ mới
        </div>
        <div class="grid-container">
            <?php while ($row3 = $data_film_single_highview->fetch_assoc()) : ?>
                <a href="detail_film.php?film_id=<?= $row3['id'] ?>" class="item1">
                    <img src="<?= $row3['image_horizontal'] ?>">
                    <div class="grid-content">
                        <div class="grid-title">
                            <?= $row3['quality'] ?>
                        </div>
                        <div class="grid-infos">
                            <div class="grid-info">
                                <span><?= $row3['name'] ?></span>
                            </div>
                            <div class="grid-info">
                                <span><?= $row3['sub_name'] ?></span>
                            </div>
                            <div class="grid-info">
                                <i class="fa fa-eye"></i>
                                <span><?= $row3['num_view'] ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>
            <?php while ($row1 = $data_film_single->fetch_assoc()) : ?>
                <a href="detail_film.php?film_id=<?= $row1['id'] ?>" class="item2">
                    <img src="<?= $row1['image_horizontal'] ?>">
                    <div class="grid-content">
                        <div class="grid-title">
                            <?= $row1['quality'] ?>
                        </div>
                        <div class="grid-infos">
                            <div class="grid-info">
                                <span><?= $row1['name'] ?></span>
                            </div>
                            <div class="grid-info">
                                <i class="fa fa-eye"></i>
                                <span><?= $row1['num_view'] ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>
        </div>
    </div>
</div>
<!-- END SINGLE FILM SECTION -->

<!-- START SERIES FILM SECTION -->
<div class="section">
    <div class="container">
        <div class="section-header">
            Phim bộ mới
        </div>
        <div class="grid-container">
            <?php while ($row4 = $data_film_seri_highview->fetch_assoc()) : ?>
                <a href="detail_film.php?film_id=<?= $row4['id'] ?>" class="item1">
                    <img src="<?= $row4['image_horizontal'] ?>">
                    <div class="grid-content">
                        <div class="grid-title">
                            <?= $row4['quality'] ?>
                        </div>
                        <div class="grid-infos">
                            <div class="grid-info">
                                <span><?= $row4['name'] ?></span>
                            </div>
                            <div class="grid-info">
                                <span><?= $row4['sub_name'] ?></span>
                            </div>
                            <div class="grid-info">
                                <i class="fa fa-eye"></i>
                                <span><?= $row4['num_view'] ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>
            <?php while ($row2 = $data_film_seri->fetch_assoc()) : ?>
                <a href="detail_film.php?film_id=<?= $row2['id'] ?>" class="item2">
                    <img src="<?= $row2['image_horizontal'] ?>">
                    <div class="grid-content">
                        <div class="grid-title">
                            <?= $row2['quality'] ?>
                        </div>
                        <div class="grid-infos">
                            <div class="grid-info">
                                <span><?= $row2['name'] ?></span>
                            </div>
                            <div class="grid-info">
                                <i class="fa fa-eye"></i>
                                <span><?= $row2['num_view'] ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>
        </div>
    </div>
</div>
<!-- END SERIES FILM SECTION -->
<!-- START RANK FILMS -->
<div class="section">
    <div class="container">
        <div class="section-header">
            Bảng xếp hạng
        </div>
        <div class="list-rank">
            <?php while ($rank < 6 && $row5 = $data_rank_film->fetch_assoc()) : ?>
                <div class="rank-movie">
                    <p><?= $rank++ ?></p>
                    <a href="detail_film.php?film_id=<?= $row5['id'] ?>"><img src="<?= $row5['image_vertical'] ?>" alt=""></a>
                </div>
            <?php endwhile ?>
        </div>

    </div>
</div>
<!-- END RANK FILMS -->
<!-- PRICING SECTION -->
<div class="section">
    <div class="container">
        <div class="pricing">
            <div class="pricing-header">
                Fl<span class="main-color">i</span>x pricing
            </div>
            <div class="pricing-list">
                <div class="row">
                    <div class="col-4 col-md-12 col-sm-12">
                        <div class="pricing-box">
                            <div class="pricing-box-header">
                                <div class="pricing-name">
                                    Basic
                                </div>
                                <div class="pricing-price">
                                    Free
                                </div>
                            </div>
                            <div class="pricing-box-content">
                                <p>Originals</p>
                                <p>Swich plans anytime</p>
                                <p><del>65+ top Live</del></p>
                                <p><del>TV Channels</del></p>
                            </div>
                            <div class="pricing-box-action">
                                <a href="#" class="btn btn-hover">
                                    <span>Đăng ký ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-12 col-sm-12">
                        <div class="pricing-box hightlight">
                            <div class="pricing-box-header">
                                <div class="pricing-name">
                                    Premium
                                </div>
                                <div class="pricing-price">
                                    $35.99 <span>/month</span>
                                </div>
                            </div>
                            <div class="pricing-box-content">
                                <p>Originals</p>
                                <p>Swich plans anytime</p>
                                <p><del>65+ top Live</del></p>
                                <p><del>TV Channels</del></p>
                            </div>
                            <div class="pricing-box-action">
                                <a href="#" class="btn btn-hover">
                                    <span>Đăng ký ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-12 col-sm-12">
                        <div class="pricing-box">
                            <div class="pricing-box-header">
                                <div class="pricing-name">
                                    VIP
                                </div>
                                <div class="pricing-price">
                                    $65.99 <span>/month</span>
                                </div>
                            </div>
                            <div class="pricing-box-content">
                                <p>Originals</p>
                                <p>Swich plans anytime</p>
                                <p><del>65+ top Live</del></p>
                                <p><del>TV Channels</del></p>
                            </div>
                            <div class="pricing-box-action">
                                <a href="#" class="btn btn-hover">
                                    <span>Đăng ký ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PRICING SECTION -->

<?php require_once("footer.php") ?>