<?php
require_once('../../autoload/Autoload.php');
require_once('../header.php');
require_once('../config/config.php');
if(isset($_GET['id_user'])){
    $id = $_GET['id_user'];
}
$query = "SELECT * FROM tbl_users WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data_user = mysqli_fetch_array($result); 
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
                <div class="editfilm">
                    <div class="groupform">
                        <label for="inputName">Name</label>
                        <input type="text" id="inputName" name="name" value="<?=$data_user['username']?>" style="width: 20em;">
                    </div>
                    <div class="groupform">
                        <label for="inputPassword">Password</label>
                        <input type="password" id="inputPassword" name="password" value="<?=$data_user['password']?>" style="width: 20em;">
                    </div>
                    <div class="groupform">
                        <label for="inputnameDisplay">Display name</label>
                        <input type="text" id="inputnameDisplay" name="nameDisplay" value="<?=$data_user['fullname']?>" style="width: 20em;">
                    </div>
                    <div class="groupform">
                        <label for="inputEmail">Email</label>
                        <input type="text" id="inputEmail" name="email" value="<?=$data_user['email']?>" style="width: 20em;">
                    </div>
                </div>
                <div class="btnAdd">
                    <a href="#" class ="btn" style="margin-left: 12em; margin-top: 20px;">Edit customer</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>