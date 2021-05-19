<?php 
    require_once('../header.php');
    require_once('../../autoload/Autoload.php');
    if (!Auth::user()) {
        Redirect::url('admin/account/login.php');
    }
?>
<div class="containerr">
    <?php require_once('../navigation/navigation.php')?>
    <div class="main">
        <?php require_once('../topbar/topbar.php')?>
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1,042</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1,042</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1,042</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1,042</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                    <a href="#" class = "btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Name</td>
                            <td>Name</td>
                            <td>Name</td>
                            <td>Name</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customer</h2>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <td><div class="imgBx"><img src="../assets/images/avatar.jpg"></div></td>
                            <td><h4>David</h4></td>
                        </tr>
                        <tr>
                            <td><div class="imgBx"><img src="../assets/images/avatar.jpg"></div></td>
                            <td><h4>David</h4></td>
                        </tr>
                        <tr>
                            <td><div class="imgBx"><img src="../assets/images/avatar.jpg"></div></td>
                            <td><h4>David</h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>