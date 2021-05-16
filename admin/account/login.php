<?php
require_once('../../autoload/Autoload.php');
if (Input::hasPost('login')) {

    $username = Input::post('username');
    $password = md5(Input::post('password'));


    $sql = "SELECT * FROM tbl_users WHERE username = '$username' && password = '$password' && usertype_id = '1'";

    $data = $DB->query($sql);

    if (is_array($data)) {

        Session::put('user', $data);
        Redirect::url('admin/dashboard');
    }

    $error = "*Sai tên đăng nhập hoặc mật khẩu";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<div class="container-login">
    <div class="form-login">
        <form action="" method="post" style="position: relative;">
            <p>Đăng nhập</p>
            <?php if (isset($error)) : ?>
                <div class="error">
                    <?= $error ?>
                </div>
            <?php endif ?>
            <input type="text" name="username" placeholder="Tên đăng nhập" required><br>
            <input type="password" name="password" id="" placeholder="Mật khẩu" required><br>
            <button type="submit" name="login">Đăng nhập</button><br>
        </form>
    </div>
</div>
</body>
</html>