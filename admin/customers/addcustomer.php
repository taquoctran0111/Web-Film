<?php
require_once('../../autoload/Autoload.php');
require_once('../header.php');
require_once('../config/config.php');
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
if (Input::hasPost('add')) {

    $sql = "Select * FROM  tbl_users WHERE email = '" . Input::post('email') . '\'';
    $isSetEmail = $DB->query($sql);

    $sql2 = "Select * FROM  tbl_users WHERE username = '" . Input::post('username') . '\'';
    $isSetUsername = $DB->query($sql2);

    $password = Input::post('password');
    $repassword = Input::post('repassword');

    $folderAvatar = $_SERVER['DOCUMENT_ROOT'] . '/WebFilmFast/assets/images/avatar/';
    $imageAvatar = "assets/images/empty.jpg";

    if ($_FILES['imageavatar']['name'] != '') {
        $fileAvatar = $_FILES['imageavatar']['name'];
        $filetmpAvatar = $_FILES['imageavatar']['tmp_name'];
        move_uploaded_file($filetmpAvatar, $folderAvatar . $fileAvatar);
        $imageAvatar = "assets/images/avatar/" . $fileAvatar;
    }

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
                    'avatar' => $imageAvatar
                ]);
                if ($created) {
                    $success = 'Đăng ký tài khoản thành công';
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
?>
<div class="containerr">
    <?php require_once('../navigation/navigation.php') ?>
    <div class="main">
        <?php require_once('../topbar/topbar.php') ?>
        <div class="detailsFilm">
            <div class="recentFilms">
                <div class="filmHeader">
                    <h2 style="font-size: 25px;">Add Customer</h2>
                </div>
                <?php if (isset($success)) : ?>
                    <div class="success">
                        <?= $success ?>
                    </div>
                <?php endif ?>
                <?php if (isset($error)) : ?>
                    <div class="error">
                        <?= $error ?>
                    </div>
                <?php endif ?>
                <form class="editfilm" method="post" enctype="multipart/form-data">
                    <div class="groupform">
                        <label for="inputName">Username</label>
                        <input type="text" id="inputName" name="username" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputPassword">Password</label>
                        <input type="password" id="inputPassword" name="password" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputPassword">RePassword</label>
                        <input type="password" id="inputPassword" name="repassword" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputnameDisplay">Display name</label>
                        <input type="text" id="inputnameDisplay" name="fullname" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputEmail">Email</label>
                        <input type="email" id="inputEmail" name="email" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputAvatar">Avatar</label>
                        <img src="../../assets/images/empty.jpg" alt="" style="width: 10em; height: 10em">
                        <input type="file" id="inputAvatar" name="imageavatar">
                    </div>
                    <button class="btn" type="submit" name="add" style="margin-top: 20px;">Add customer</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>