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

    if (!is_array($isSetEmail)) {
        if (Input::post('password') == Input::post('repassword')) {
            $created = $DB->create('tbl_users', [
                'username'    => Input::post('username'),
                'password' => md5(Input::post('password')),
                'email'   =>  Input::post('email'),
                'fullname'    => Input::post('fullname'),
                'usertype_id'    => '2',
            ]);
            if ($created) {
                $success = 'Register Success';
            } else {
                $error = 'Register Fail';
            }
        } else {
            $error = 'Passwords are not the same!';
        }
    } else {
        $error = "Email already exist";
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
                <form class="editfilm" method="post">
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
                    <button class="btn" type="submit" name="add" style="margin-top: 20px;">Add customer</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>