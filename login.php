<?php
require_once('./autoload/Autoload.php');
require_once('./config/config_login_fb.php');
if (Input::hasPost('login')) {

    $username = Input::post('username');
    $password = md5(Input::post('password'));


    $sql = "SELECT * FROM tbl_users WHERE username = '$username' && password = '$password'";

    $data = $DB->query($sql);

    if (is_array($data)) {

        Session::put('customer', $data);
        Redirect::url('');
    }

    $error = "Sai tên đăng nhập hoặc mật khẩu";
}

$title = "Đăng nhập";
require_once("header.php");
?>
<div class="container-login">
    <div class="form-login">
        <form action="" method="post" style="position: relative;">
            <p>Đăng nhập</p>
            <?php if (isset($error)) : ?>
                <div class = "error">
                    <?= $error ?>
                </div>
            <?php endif ?>
            <img src="assets/images/icon/user-solid-24.png" class="user-icon" alt="">
            <input type="text" name="username" placeholder="Tên đăng nhập" required><br>
            <img src="assets/images/icon/lock-solid-24.png" class="lock-icon" alt="">
            <input type="password" name="password" id="" placeholder="Mật khẩu" required><br>
            <button type="submit" name="login">Đăng nhập</button><br>
            <a href="register.php" class="register-link">Bạn chưa có tài khoản?</a><br>
            <div class="social-icons">
                <a href="<?php echo $login_url;?>"><img src="assets/images/login-reg-img/fb.png"></a>
                <a href="#"><img src="assets/images/login-reg-img/gp.png"></a>
            </div>
        </form>
    </div>
</div>
<?php require_once("footer.php") ?>