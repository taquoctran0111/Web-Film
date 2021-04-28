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
</head>

<body>
    <!-- Start Header -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="./index.php" class="logo">
                    <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
                </a>
                <ul class="nav-menu" id="nav-menu">
                    <li class="menu-dropdown">
                        <a href="#">Thể loại</a>
                        <ul class="menu-area">
                            <ul>
                                <li><a href="./category_detail.php">Hành động</a></li>
                                <li><a href="#">Tình cảm</a></li>
                                <li><a href="#">Hài hước</a></li>
                                <li><a href="#">Khoa học</a></li>
                                <li><a href="#">Kiếm hiệp</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Hoạt hình</a></li>
                                <li><a href="#">Gia đình</a></li>
                                <li><a href="#">Tâm lý</a></li>
                                <li><a href="#">Trinh thám</a></li>
                                <li><a href="#">Viễn tưởng</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Kinh dị</a></li>
                                <li><a href="#">Võ thuật</a></li>
                                <li><a href="#">Cổ trang</a></li>
                                <li><a href="#">Thể thao</a></li>
                                <li><a href="#">Học đường</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">Quốc gia</a>
                        <ul class="menu-area">
                            <ul>
                                <li><a href="#">Việt nam</a></li>
                                <li><a href="#">Nhật bản</a></li>
                                <li><a href="#">Trung Quốc</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Mỹ</a></li>
                                <li><a href="#">Anh</a></li>
                                <li><a href="#">Hàn Quốc</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="menu-dropdown"><a href="#">Phim lẻ</a></li>
                    <li class="menu-dropdown"><a href="#">Phim bộ</a></li>
                    <li class="menu-dropdown"><a href="#">Chiếu rạp</a></li>
                    <li>
                        <?php if (!Auth::customer()) : ?>
                            <a href="login.php" class="btn btn-hover" id="btn-login">
                                <span>Đăng nhập</span>
                            </a>
                        <?php else : ?>
                            <p style = "margin-right: 5px">Xin chào 
                    <li class="menu-dropdown">
                        <a href="#"><?= Auth::customer()->fullname ?></a>
                        <ul class="menu-area">
                            <li><a href="#">Thay đổi thông tin</a></li>
                            <li><a href="logout.php">Đăng xuất</a></li>
                        </ul>
                    </li>
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