<?php
require_once('./autoload/Autoload.php');
if (Input::hasPost('register')) {

    $sql1 = "Select * FROM  tbl_users WHERE email = '" . Input::post('email') . '\'';
    $isSetEmail = $DB->query($sql1);

    $sql2 = "Select * FROM  tbl_users WHERE username = '" . Input::post('username') . '\'';
    $isSetUsername = $DB->query($sql2);

    $password = Input::post('password');
    $repassword = Input::post('repassword');

    if(!is_array($isSetUsername)){
        if (!is_array($isSetEmail)) {
            if(strlen($password) < 8){
                $error = "Mật khẩu phải có ít nhất 8 kí tự!";
            }
            elseif(!preg_match("#[0-9]+#",$password)){
                $error = "Mật khẩu phải có ít nhất một số!";
            }
            elseif(!preg_match("#[A-Z]+#",$password)){
                $error = "Mật khẩu phải có ít nhất một chữ hoa!";
            }
            elseif(!preg_match("#[a-z]+#",$password)){
                $error = "Mật khẩu phải có ít nhất một chữ thường!";
            }
            elseif ($password == $repassword) {
                $created = $DB->create('tbl_users', [
                    'username'    => Input::post('username'),
                    'password' => md5(Input::post('password')),
                    'email'   =>  Input::post('email'),
                    'fullname'    => Input::post('fullname'),
                    'usertype_id'    => '2',
                    'avatar' => "assets/images/user.png",
                ]);
                if ($created) {
                    $success = 'Đăng ký tài khoản thành công';
                    Redirect::url("login.php");
                } else {
                    $error = 'Đăng ký tài khoản không thành công, vui lòng thử lại';
                }
            } else {
                $error = 'Mật khẩu không giống nhau!';
            }
        } else {
            $error = "Email đã tồn tại vui lòng sử dụng email khác";
        }
    }
    else{
        $error = "Tên đăng nhập đã được sử dụng!";
    }
}
$title = "Đăng ký";
require_once("header.php");
?>
<div class="container-login">
    <div class="form-login">
        <form action="" method="post" style="position: relative;">
            <p>Đăng ký</p>
            <?php if (isset($success)) : ?>
                <div class = "success">
                    <?= $success ?>
                </div>
            <?php endif ?>
            <?php if (isset($error)) : ?>
                <div class = "error">
                    <?= $error ?>
                </div>
            <?php endif ?>
            <img src="assets/images/icon/user-solid-24.png" class="user-icon" alt="">
            <input type="text" name="username" placeholder="Tên đăng nhập" required><br>
            <img src="assets/images/icon/lock-solid-24.png" class="lock-icon" alt="">
            <input type="password" name="password" id="" placeholder="Mật khẩu" required><br>
            <img src="assets/images/icon/lock-solid-24.png" class="lock-icon-2" alt="" style="top: 194px">
            <input type="password" name="repassword" id="" placeholder="Nhập lại mật khẩu" required><br>
            <img src="assets/images/icon/message-minus-solid-24.png" class="name-icon" alt="" style = "top: 248px">
            <input type="text" name="fullname" placeholder="Tên hiển thị" required><br>
            <img src="assets/images/icon/email.png" class="email-icon" alt="" style="top: 298px">
            <input type="email" name="email" id="" placeholder="Email" required><br>
            <button type="submit" name="register">Đăng ký</button><br>
        </form>
    </div>
</div>
<?php require_once("footer.php") ?>