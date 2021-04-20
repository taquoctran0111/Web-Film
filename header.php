<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/grid2.css">
    <link rel="stylesheet" href="assets/css/rankmovie.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Start Header -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="#" class="logo">
                    <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
                </a>
                <ul class="nav-menu" id="nav-menu">
                    <li><a href="#">Thể loại</a></li>
                    <li><a href="#">Quốc gia</a></li>
                    <li><a href="#">Phim lẻ</a></li>
                    <li><a href="#">Phim bộ</a></li>
                    <li><a href="#">Chiếu rạp</a></li>
                    <li>
                        <a href="#" class="btn btn-hover">
                            <span>Đăng nhập</span>
                        </a>
                    </li>
                </ul>
                <!-- MOBILE MENU TOGGLE -->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup">
        <div class="popup-content">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Đăng nhập</button>
                <button type="button" class="toggle-btn" onclick="register()">Đăng kí</button>
            </div>
            <div class="social-icons">
                <a href="#"><img src="assets/images/login-reg-img/fb.png"></a>
                <a href="#"><img src="assets/images/login-reg-img/gp.png"></a>
                <a href="#"><img src="assets/images/login-reg-img/tw.png"></a>
            </div>
            <form class = "input-group" action="get" id = "login">
                <input type="text" class = "input-field" placeholder="Tên đăng nhập" name="" id="" required>
                <input type="password" class = "input-field" placeholder="Mật khẩu" name="" id="" required>
                <input type="checkbox" class = "checkbox" name="" id=""><span>Nhớ mật khẩu</span>
                <button type="submit" class = "submit-btn">Đăng nhập</button>
            </form>
            <form class = "input-group" action="get" id = "register">
                <input type="text" class = "input-field" placeholder="Tên đăng nhập" name="" id="" required>
                <input type="password" class = "input-field" placeholder="Mật khẩu" name="" id="" required>
                <input type="password" class = "input-field" placeholder="Nhập lại mật khẩu" name="" id="" required>
                <input type="text" class = "input-field" placeholder="Họ tên" name="" id="" required>
                <input type="email" class = "input-field" placeholder="Email" name="" id="" required>
                <button type="submit" class = "submit-btn">Đăng ký</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "125px"
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px"
        }
    </script>
    <!-- End Header -->