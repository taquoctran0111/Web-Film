<?php
require_once('./autoload/Autoload.php');
require_once('config/config2.php');
if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];
}
$queryuser = "SELECT * FROM tbl_users WHERE id = '$userid'";
$runqueryuser = mysqli_query($conn, $queryuser);
$resultuser = mysqli_fetch_assoc($runqueryuser);
if (Input::hasPost('update')) {
    $folderAvatar = $_SERVER['DOCUMENT_ROOT'] . '/WebFilmFast/assets/images/avatar/';
    $imageAvatar = $resultuser['avatar'];

    if ($_FILES['imageavatar']['name'] != '') {
        $fileAvatar = $_FILES['imageavatar']['name'];
        $filetmpAvatar = $_FILES['imageavatar']['tmp_name'];
        move_uploaded_file($filetmpAvatar, $folderAvatar . $fileAvatar);
        $imageAvatar = "assets/images/avatar/" . $fileAvatar;
    }

    $password = Input::post('newpassword');

    $username   = Input::post('username');
    $oldpassword = md5(Input::post('oldpassword'));
    $newpassword   = md5(Input::post('newpassword'));
    $renewpassword = md5(Input::post('renewpassword'));
    $fullname  = Input::post('fullname');
    $email   = Input::post('email');

    if ($resultuser['password'] == $oldpassword) {
        if (strlen($password) < 8) {
            $alertErr = "Mật khẩu phải có ít nhất 8 kí tự!";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $alertErr = "Mật khẩu phải có ít nhất một số!";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $alertErr = "Mật khẩu phải có ít nhất một chữ hoa!";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $alertErr = "Mật khẩu phải có ít nhất một chữ thường!";
        }
        elseif ($newpassword == $renewpassword) {
            $success = $DB->update('tbl_users', [
                'username'   => $username,
                'password'   => $newpassword,
                'fullname'  => $fullname,
                'email'   => $email,
                'avatar' => $imageAvatar,
            ], $userid);

            if ($success === true) {
                $alertSuccess = "Cập nhật thành công";
            } else {
                $alertErr = $success;
            }
        } else {
            $alertErr = "Mật khẩu không giống nhau!";
        }
    } else {
        $alertErr = 'Mật khẩu cũ không đúng!';
    }
}
$title = "Thay đổi thông tin";
require_once("header.php");
?>
<div class="container-login">
    <div class="form-login" style="height: 35em;">
        <form action="" method="post" style="position: relative;" enctype="multipart/form-data">
            <p>Thay đổi thông tin</p>
            <?php if (isset($alertSuccess)) : ?>
                <div class="success">
                    <?= $alertSuccess ?>
                </div>
            <?php endif ?>
            <?php if (isset($alertErr)) : ?>
                <div class="error">
                    <?= $alertErr ?>
                </div>
            <?php endif ?>
            <img src="assets/images/icon/user-solid-24.png" class="user-icon" alt="">
            <input type="text" name="username" placeholder="Tên đăng nhập" value="<?php echo $resultuser['username'] ?>" required><br>
            <img src="assets/images/icon/lock-solid-24.png" class="lock-icon" alt="">
            <input type="password" name="oldpassword" id="" placeholder="Mật khẩu cũ" required><br>
            <img src="assets/images/icon/lock-solid-24.png" class="lock-icon-3" alt="">
            <input type="password" name="newpassword" id="" placeholder="Mật khẩu mới" required><br>
            <img src="assets/images/icon/lock-solid-24.png" class="lock-icon-2" alt="">
            <input type="password" name="renewpassword" id="" placeholder="Nhập lại mật khẩu" required><br>
            <img src="assets/images/icon/message-minus-solid-24.png" class="name-icon" alt="">
            <input type="text" name="fullname" placeholder="Tên hiển thị" value="<?php echo $resultuser['fullname'] ?>" required><br>
            <img src="assets/images/icon/email.png" class="email-icon" alt="">
            <input type="email" name="email" id="" placeholder="Email" value="<?php echo $resultuser['email'] ?>" required><br>
            <i class="fa fa-picture-o" aria-hidden="true" style="color: black; position: absolute; left: 70px; top: 406px; font-size: 18px; "></i>
            <input type="file" id="inputAvatar" name="imageavatar" style="color: black; background: white">

            <button type="submit" name="update">Cập nhật</button><br>
        </form>
    </div>
</div>
<?php require_once("footer.php") ?>