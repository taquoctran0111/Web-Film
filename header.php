<?php
require_once('./config/config_login_fb.php');
require_once('./autoload/Autoload.php');
if (Input::hasPost('btnsearch')) {
    $search = Input::post('search');
    if($search != ''){
        Redirect::url('filmsearch.php?search_input=' . $search);
    }
    else{
        Redirect::url('');
    }
}
if(Auth::customer()){
    $iduser = Auth::customer()->id;
    $queryuser = "SELECT * FROM tbl_users WHERE id = $iduser";
    $runqueryuser = mysqli_query($conn, $queryuser);
    $resultuser = mysqli_fetch_array($runqueryuser);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/grid2.css">
    <link rel="stylesheet" href="assets/css/rankmovie.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Start Header -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="./index.php" class="logo">
                    <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
                </a>
                <form class="search" method="post">
                    <input type="text" id="search" name="search" placeholder="T??m ki???m" autocomplete="off">
                    <button type="submit" name="btnsearch" id="btnsearch" style="background-color: #000; display: flex; border: none">
                        <i class="fa fa-search" style="position: absolute;top: 25%;left: 93%;color: gray;"></i>
                    </button>
                </form>
                <ul class="nav-menu" id="nav-menu">
                    <li class="menu-dropdown">
                        <a href="#">Th??? lo???i</a>
                        <ul class="menu-area">
                            <ul>
                                <li><a href="category_detail.php?category_id=1">H??nh ?????ng</a></li>
                                <li><a href="category_detail.php?category_id=2">T??nh c???m</a></li>
                                <li><a href="category_detail.php?category_id=3">H??i h?????c</a></li>
                                <li><a href="category_detail.php?category_id=4">Khoa h???c</a></li>
                                <li><a href="category_detail.php?category_id=5">Ki???m hi???p</a></li>
                            </ul>
                            <ul>
                                <li><a href="category_detail.php?category_id=6">Ho???t h??nh</a></li>
                                <li><a href="category_detail.php?category_id=7">Gia ????nh</a></li>
                                <li><a href="category_detail.php?category_id=8">T??m l??</a></li>
                                <li><a href="category_detail.php?category_id=9">Trinh th??m</a></li>
                                <li><a href="category_detail.php?category_id=10">Vi???n t?????ng</a></li>
                            </ul>
                            <ul>
                                <li><a href="category_detail.php?category_id=11">Kinh d???</a></li>
                                <li><a href="category_detail.php?category_id=12">V?? thu???t</a></li>
                                <li><a href="category_detail.php?category_id=13">C??? trang</a></li>
                                <li><a href="category_detail.php?category_id=14">Phi??u l??u</a></li>
                                <li><a href="category_detail.php?category_id=15">H???c ???????ng</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">Qu???c gia</a>
                        <ul class="menu-area">
                            <ul>
                                <li><a href="menu_film.php?nation_id=1">Vi???t nam</a></li>
                                <li><a href="menu_film.php?nation_id=2">Nh???t b???n</a></li>
                                <li><a href="menu_film.php?nation_id=3">Trung Qu???c</a></li>
                            </ul>
                            <ul>
                                <li><a href="menu_film.php?nation_id=4">M???</a></li>
                                <li><a href="menu_film.php?nation_id=5">Anh</a></li>
                                <li><a href="menu_film.php?nation_id=6">H??n Qu???c</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="menu-dropdown"><a href="menu_film.php?type_movie=1">Phim l???</a></li>
                    <li class="menu-dropdown"><a href="menu_film.php?type_movie=2">Phim b???</a></li>
                    <li class="menu-dropdown"><a href="menu_film.php?type_movie=3">Chi???u r???p</a></li>
                    <?php if (!Auth::customer() && !isset($_SESSION['access_token'])) : ?>
                        <a href="login.php" class="btn btn-hover" id="btn-login">
                            <span>????ng nh???p</span>
                        </a>
                    <?php elseif (isset($_SESSION['access_token'])) : ?>
                        <p style="margin-right: 5px">Xin ch??o
                            <li class="menu-dropdown" style="margin-right: 5px;">
                                <a href="#"><?php echo $user->getField('name'); ?></a>
                                <ul class="menu-area">
                                    <ul>
                                        <li><a href="#">Thay ?????i th??ng tin</a></li>
                                        <li><a href="logout.php">????ng xu???t</a></li>
                                    </ul>
                                </ul>
                            </li>
                            <div class="imguser" style="width: 40px; height: 30px; margin-bottom: 10px" >
                                <img src="<?= $userpic['url']; ?>" alt="" style="width: 100%; border-radius: 50%">
                            </div>
                        </p>
                    <?php elseif (isset($_SESSION['customer'])) : ?>
                        <p style="margin-right: 5px">Xin ch??o
                            <li class="menu-dropdown" style="margin-right: 5px;">
                                <a href="#"><?= Auth::customer()->fullname; ?></a>
                                <ul class="menu-area">
                                    <ul>
                                        <li><a href="info_account.php?userid=<?= Auth::customer()->id; ?>">Thay ?????i th??ng tin</a></li>
                                        <li><a href="logout.php">????ng xu???t</a></li>
                                    </ul>
                                </ul>
                            </li>
                            <div class="imguser" style="width: 40px; height: 30px; margin-bottom: 10px" >
                                <img src="<?= $resultuser['avatar']; ?>" alt="" style="width: 100%; border-radius: 50%">
                            </div>
                        </p>
                        
                    <?php endif ?>
                    </li>
                </ul>
                <!-- MOBILE MENU TOGGLE -->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
    </div>