<?php
require_once('./autoload/Autoload.php');
if (Input::hasPost('login')) {

    $username = Input::post('username');
    $password = md5(Input::post('password'));

    $sql = "SELECT * FROM tbl_users WHERE username = '$username' && password = '$password'";

    $data = $DB->query($sql);

    if (is_array($data)) {
        $success= "Đăng nhập thành công!";
    }
    $error = "Sai tên đăng nhập hoặc mật khẩu";
}

?>
<div class="popup">
    <div class="popup-content">
        <i class="fa fa-times-circle-o" id="close"></i>
        <div class="button-box">
            <div id="btn1"></div>
            <button type="button" class="toggle-btn" onclick="login()">Đăng nhập</button>
            <button type="button" class="toggle-btn" onclick="register()">Đăng kí</button>
        </div>
        <div class="social-icons">
            <a href="#"><img src="assets/images/login-reg-img/fb.png"></a>
            <a href="#"><img src="assets/images/login-reg-img/gp.png"></a>
            <a href="#"><img src="assets/images/login-reg-img/tw.png"></a>
        </div>
        <?php if (isset($success)) : ?>
            <div style="margin-left: 45px; color:blue;width: 100%; font-size:12px">
                <?= $success ?>
            </div>
        <?php endif ?>
        <?php if (isset($error)) : ?>
            <div style="margin-left: 45px; color:red;width: 100%; font-size:12px">
                <?= $error ?>
            </div>
        <?php endif ?>
        <form class="input-group" action = "index.php" id="login" method="post">
            <input type="text" class="input-field" placeholder="Tên đăng nhập" name="username" id="" required>
            <input type="password" class="input-field" placeholder="Mật khẩu" name="password" id="" required>
            <input type="checkbox" class="checkbox" name="" id=""><span>Nhớ mật khẩu</span>
            <button type="submit" class="submit-btn" name="login">Đăng nhập</button>
        </form>
        <?php require_once("register.php") ?>
    </div>
</div>
<script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn1");

    function register() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "125px"
    }

    function login() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px"
    }
    document.getElementById("btn-login").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "flex";
    })
    document.getElementById("close").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "none";
    })
</script>