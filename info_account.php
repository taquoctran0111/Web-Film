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
    $username   = Input::post('username');
    $oldpassword = md5(Input::post('oldpassword'));
    $newpassword   = md5(Input::post('newpassword'));
    $renewpassword = md5(Input::post('renewpassword'));
    $fullname  = Input::post('fullname');
    $email   = Input::post('email');
    if ($resultuser['password'] == $oldpassword) {
        if ($newpassword == $renewpassword) {
            $success = $DB->update('tbl_users', [
                'username'   => $username,
                'password'   => $newpassword,
                'fullname'  => $fullname,
                'email'   => $email,
            ], $userid);

            if ($success === true) {
                $alertSuccess = "Edit success";
            } else {
                $alertErr = $success;
            }
        } else {
            $alertErr = "Passwords are not the same!";
        }
    } else {
        $alertErr = "Old password not match!";
    }
}
$title = "Đăng ký";
require_once("header.php");
?>
<div class="container-login">
    <div class="form-login">
        <form action="" method="post" style="position: relative;">
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
            <button type="submit" name="update">Thay đổi</button><br>
        </form>
    </div>
</div>
<?php require_once("footer.php") ?>