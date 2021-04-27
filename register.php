<?php
include('./autoload/Autoload.php');
if (Input::hasPost('register')) {
    $emailq = Input::post('email');
    $sql = "SELECT * FROM  tbl_users WHERE email = '$emailq'";
    $isSetEmail = $DB->query($sql);
    if (!is_array($isSetEmail)) {
        if (Input::post('password') == Input::post('repassword')) {
            $created = $DB->create('tbl_users', [
                'username'    => Input::post('username'),
                'password' => md5(Input::post('password')),
                'fullname'   => Input::post('fullname'),
                'email'    => Input::post('email'),
                'usertype_id' => '2'
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
?>
<form class="input-group" action = "" id="register" method="post">
    <?php if (isset($success)) : ?>
        <div style="color:blue;width: 100%; font-size:12px">
            <?= $success ?>
        </div>
    <?php endif ?>
    <?php if (isset($error)) : ?>
        <div style="color:red;width: 100%; font-size:12px">
            <?= $error ?>
        </div>
    <?php endif ?>
    <input type="text" class="input-field" placeholder="Tên đăng nhập" name="username" id="" required>
    <input type="password" class="input-field" placeholder="Mật khẩu" name="password" id="" required>
    <input type="password" class="input-field" placeholder="Nhập lại mật khẩu" name="repassword" id="" required>
    <input type="text" class="input-field" placeholder="Họ tên" name="fullname" id="" required>
    <input type="email" class="input-field" placeholder="Email" name="email" id="" required>
    <button type="submit" class="submit-btn" name="register">Đăng ký</button>
</form>