<?php
require_once('../../autoload/Autoload.php');
require_once('../header.php');
require_once('../config/config.php');
if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}
if (isset($_GET['id_user'])) {
    $id = $_GET['id_user'];
}
$query = "SELECT * FROM tbl_users WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data_user = mysqli_fetch_array($result);
$oldpassword = md5(Input::post('oldpassword'));

if (Input::hasPost('edit')) {
    $folderAvatar = $_SERVER['DOCUMENT_ROOT'] . '/WebFilmFast/assets/images/avatar/';
    $imageAvatar = $data_user['avatar'];

    if ($_FILES['imageavatar']['name'] != '') {
        $fileAvatar = $_FILES['imageavatar']['name'];
        $filetmpAvatar = $_FILES['imageavatar']['tmp_name'];
        move_uploaded_file($filetmpAvatar, $folderAvatar . $fileAvatar);
        $imageAvatar = "assets/images/avatar/" . $fileAvatar;
    }
    $username   = Input::post('username');
    $oldpassword = md5(Input::post('oldpassword'));
    $newpassword   = md5(Input::post('newpassword'));
    $renewpassword = md5(Input::post('renewpassword'));
    $fullname  = Input::post('fullname');
    $email   = Input::post('email');
    if($data_user['password'] == $oldpassword){
        if($newpassword == $renewpassword){
            $success = $DB->update('tbl_users', [
                'username'   => $username,
                'password'   => $newpassword,
                'fullname'  => $fullname,
                'email'   => $email,
                'avatar' => $imageAvatar,
            ], $id);
        
            if ($success === true) {
                $alertSuccess = "Edit success";
            } else {
                $alertErr = $success;
            }
        }
        else{
            $alertErr = "Passwords are not the same!";
        }  
    }
    else{
        $alertErr = "Old password not match!";
    }
   
}

$data   = $DB->find('tbl_users', $id);

if (!is_object($data)) {
    die('Không tồn tại người dùng');
}
?>

<div class="containerr">
    <?php require_once('../navigation/navigation.php') ?>
    <div class="main">
        <?php require_once('../topbar/topbar.php') ?>
        <div class="detailsFilm">
            <div class="recentFilms">
                <div class="filmHeader">
                    <h2 style="font-size: 25px;">Edit Customer</h2>
                </div>
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
                <form class="editfilm" method="post" enctype="multipart/form-data">
                    <div class="groupform">
                        <label for="inputName">Userame</label>
                        <input type="text" id="inputName" name="username" value="<?= $data_user['username'] ?>" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputPassword">Old password</label>
                        <input type="password" id="inputPassword" name="oldpassword"  style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputPassword">New password</label>
                        <input type="password" id="inputPassword" name="newpassword"  style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputPassword">Retype new password</label>
                        <input type="password" id="inputPassword" name="renewpassword" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputnameDisplay">Display name</label>
                        <input type="text" id="inputnameDisplay" name="fullname" value="<?= $data_user['fullname'] ?>" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputEmail">Email</label>
                        <input type="text" id="inputEmail" name="email" value="<?= $data_user['email'] ?>" style="width: 20em;" required>
                    </div>
                    <div class="groupform">
                        <label for="inputAvatar">Avatar</label>
                        <img src="../../<?= $data_user['avatar'] ?>" alt="" style="width: 10em; height: 10em">
                        <input type="file" id="inputAvatar" name="imageavatar">
                        <!-- <input type="button" value="Edit Image" name="uploadVertical"> -->
                    </div>
                    <button class="btn" type="submit" style="margin-top: 20px;" name="edit">Edit customer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>